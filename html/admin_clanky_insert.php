<?php
  session_register('meno_uzivatela');
  session_register('stav');
  include_once("definitions.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
 <HEAD>
   <STYLE TYPE="text/css">
    body {
          background-color: #C0C0C0;
         }
   </STYLE>
  <LINK REL="stylesheet" TYPE="text/css" HREF="style.css">
  <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=windows-1250">
  <TITLE>VLOZIT CLANOK:</TITLE>
 </HEAD>
<BODY>
<?php

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

  $x = $_GET['x'];
  if ($x == "1") {

?>
<TABLE BORDER="1" ALIGN="center" BORDERCOLOR="black">
 <FORM ACTION="admin_clanky_insert.php" ENCTYPE="multipart/form-data" METHOD="post">
   <TR><TD ALIGN="center"><P><B>VLOZIT CLANOK</B></P></TD></TR>
   <TR><TD ALIGN="center"><B>NADPIS CLANKU:</B><BR><INPUT TYPE="text" NAME="nadpis" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $_POST['nadpis']; ?>"></TD></TR>

   <TR><TD ALIGN="center"><B>AUTOR:</B><BR><INPUT TYPE="<?php
   
     if ( $_SESSION['typ_uzivatela'] == "admin" ) { echo "text"; }
     if ( $_SESSION['typ_uzivatela'] == "moderator" ) { echo "hidden"; }
   
   ?>" NAME="author" SIZE="65" MAXLENGTH="128" VALUE="<?php
   
    if ( isset($_POST['author'] )){ echo $_POST['author'];  } 
    else { echo $_SESSION['meno_uzivatela']; }
    
    ?>"><?php if ( $_SESSION['typ_uzivatela'] == "moderator" ) { echo $_SESSION['meno_uzivatela']; } ?></TD></TR>

   <TR><TD ALIGN="center"><B>DATUM (DD-MM-RRRR):</B><BR><INPUT TYPE="text" NAME="date" SIZE="65" MAXLENGTH="64" VALUE="<?php echo $_POST['date']; ?>"></TD></TR>
   <TR><TD ALIGN="center"><B>OBRAZOK</B>:<BR><INPUT TYPE="file" NAME="pic" SIZE="50"></TD></TR>
   <TR><TD ALIGN="center"><B>PRECITANE:</B><BR><INPUT TYPE="text" NAME="precitane" SIZE="65" VALUE="<?php echo $_POST['precitane']; ?>"></TD></TR>
   <TR><TD ALIGN="center"><B>TEXT HLAVICKA: </B>(aspom 4 riadky)<BR><TEXTAREA NAME="text_small" COLS="77" ROWS="4"><?php echo $_POST['text_small']; ?></TEXTAREA></TD></TR>
   <TR><TD ALIGN="center"><B>HLAVNY TEXT:</B><BR><TEXTAREA NAME="text_big" COLS="77" ROWS="15"><?php echo $_POST['text_big']; ?></TEXTAREA></TD></TR>
   <TR><TD ALIGN="center"><INPUT TYPE="hidden" NAME="sended" VALUE="yes"><INPUT TYPE="submit" VALUE="Vlozit Clanok"></TD>
 </FORM>
</TABLE>

<?php
  }
  
  //Ak sa posielal formular
  if ($_POST['sended'] == "yes"){
    
    function sendBack(){
      ?>
       <FORM ACTION="admin_clanky_insert.php?x=1" METHOD="post">
        <INPUT TYPE="hidden" NAME="nadpis"     VALUE="<?php echo toSingleAp($_POST['nadpis']);     ?>">
        <INPUT TYPE="hidden" NAME="author"     VALUE="<?php echo toSingleAp($_POST['author']);     ?>">
        <INPUT TYPE="hidden" NAME="date"       VALUE="<?php echo toSingleAp($_POST['date']);       ?>">
        <INPUT TYPE="hidden" NAME="precitane"  VALUE="<?php echo toSingleAp($_POST['precitane']);  ?>">
        <INPUT TYPE="hidden" NAME="text_small" VALUE="<?php echo toSingleAp($_POST['text_small']); ?>">
        <INPUT TYPE="hidden" NAME="text_big"   VALUE="<?php echo toSingleAp($_POST['text_big']);   ?>">
        <INPUT TYPE="submit" VALUE="Naspet"><BR><BR>
       </FORM>
      <?php
    }

    if ( ! $_POST['nadpis'] ){
      echo "<CENTER>Nezadal si nadpis!<BR><BR>";
      sendBack();
    } else {

      if ( ! $_POST['author'] ){
        echo "<CENTER>Nezadal si autora!<BR><BR>";
        sendBack();
      } else {
    
        if ( ! $_POST['date'] ){
          echo "<CENTER>Nezadal si datum!<BR><BR>";
          sendBack();
        } else {

          if ( !isvaliddate($_POST['date']) ){
            echo "<CENTER>Nezadal si datum v spravnom formate!<BR><BR>";
            sendBack();
          } else {
          
            if ( !is_file($_FILES['pic']['tmp_name']) ){
              echo "<CENTER>Nevybral si ziadny obrazok!<BR><BR>";
              sendBack();
            } else {
            
                if ( ! $_POST['precitane'] ){
                  echo "<CENTER>Nezadal si pocet precitani!<BR><BR>";
                  sendBack();
                } else {
                
                  if ( ! $_POST['text_small'] ){
                    echo "<CENTER>Nezadal si hlavickovy text!<BR><BR>";
                    sendBack();
                  } else {
                 
                    if ( ! $_POST['text_big'] ){
                      echo "<CENTER>Nezadal si hlavny text!<BR><BR>";
                      sendBack();
                    } else {
   
                      $author = toSingleAp($_POST['author']);
                      $author = strip_tags($author,'');
  
                      $nadpis = toSingleAp($_POST['nadpis']);
                      $nadpis = strip_tags($nadpis,'');    

                      $date = toSingleAp($_POST['date']);
                      $date = strip_tags($date,'');  
                      list($DD, $MM, $YYYY) = split("-", $date);
                      $date = mktime(0,0,0,$MM,$DD,$YYYY); 

                      //Praca s obrazkom        
                        //Nakopirovanie obrazka
                        $filename = "./tmp/tmp.jpg";
                        if ( ! move_uploaded_file( $_FILES['pic']['tmp_name'], $filename ) ){
                          echo "ERROR COPYING FILE!<BR><BR>";
                        }
                        //Zmena rozlisenia obrazka
                        $src_img = imagecreatefromjpeg($filename);
                        $size_img = getimagesize($filename);
                        $height = CLANOK_PICTURE_WIDTH;
                        $width  = CLANOK_PICTURE_WIDTH;
                        $dst_img = imageCreateTrueColor($width, $height); 
                        
                        if ( $size_img[1] < $size_img[0] ){
                          imagecopyresized($dst_img, $src_img, 0, 0, ( ($size_img[0]-$size_img[1]) /2 ), 0, $width, $height, $size_img[1], $size_img[1]);
                        }
                        else{
                          imagecopyresized($dst_img, $src_img, 0, 0, 0, ( ($size_img[1]-$size_img[0]) /2 ), $width, $height, $size_img[0], $size_img[0]);
                        }
                        
                        imagejpeg($dst_img, $filename, CLANOK_PICTURE_QUALITY);

                        //Nacitane obrazka do DB
                        $handle = fopen($filename, "rw");
                        $pic = addslashes( fread( $handle, filesize( $filename ) ) );
                        fclose($handle);
                        unlink($filename);
                      //********************************************************

                      $precitane = toSingleAp($_POST['precitane']);
                      $precitane = strip_tags($precitane,'');
        
                      $text_small = toSingleAp($_POST['text_small']);
        
                      $text_big = toSingleAp($_POST['text_big']);
        
        
                      //F-cia, ktora prijme formular a vlozi ho do tabulky clanky.
                      function form ($author, $nadpis, $date, $precitane, $pic, $text_small, $text_big){
 
                        $vlozenie = mysql_query("insert into clanky (autor, nadpis, date, text_small, text_big, precitane, pic) values ('".$author."', '".$nadpis."', '".$date."', '".$text_small."', '".$text_big."', '".$precitane."', '".$pic."')"); 
                        if ($vlozenie == true) {
                          echo "\r\n\t<CENTER>";
                          echo "\r\n\t<BR><BR>Clanok bol uspesne vlozeny.<BR><BR>";
                          
                          /*
                          echo "\r\n\tAutor: <B>".$author."</B><BR>";
                          echo "\r\n\tNadpis: <B>".$nadpis."</B><BR>";
                          echo "\r\n\tDatum: <B>".$date."</B><BR>";
                          echo "\r\n\tPrecitane: <B>".$precitane."</B><BR>";
                          //echo "\r\n\tThumbnail: <B>".$pic."</B><BR>";
                          echo "\r\n\tText small: <B>".$text_small."</B><BR>";
                          echo "\r\n\tText big: <B>".$text_big."</B><BR>";
                          */
                          
                          echo "<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_clanky_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_CLANKY_INSERT_W.",height=".ADMIN_CLANKY_INSERT_H.",left=10,titlebar=1'); window.close();\"><B>Vloz dalsi clanok<B></DIV><BR>";
                          echo "\r\n\t</CENTER>";
                        } else {
                          echo "Chyba! : ".mysql_error();
                        }
                        //********************************************************
                        //Vlozenie " VIAC na koniec hlavickoveho textu."
                        $id = mysql_query("SELECT id FROM clanky ORDER BY id DESC");  
                        $id = mysql_fetch_array($id);
                        $id = $id['id'];
                        $text_small = $text_small."<BR><A HREF=\'site.php?x=1&id=".$id."\'><B>VIAC...</B></A>";
                        mysql_query("UPDATE clanky SET text_small = '".$text_small."' WHERE id ='".$id."' ");
                        //********************************************************
                      }
        
                      form($author, $nadpis, $date, $precitane, $pic, $text_small, $text_big); 
                      
                    }
                  }
                }
              }
          }
        }
      }
    }
  }

?>


   <DIV CLASS="cursor" ONCLICK="window.close();"><B><CENTER>ZATVORIT OKNO</CENTER></B></DIV>

<?php
// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>         
    
