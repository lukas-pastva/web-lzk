<?php
  session_register('meno_uzivatela');
  session_register('stav');
  include_once ("definitions.php");
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
  $x = strip_tags($x,'');
  
  if ( $x == "1" ) {
  
    $id = $_GET['id'];
    $id = strip_tags($id,'');
  
    $vytiahnutie = mysql_query("SELECT * FROM clanky WHERE id = '".$id."'");
    if ($vytiahnutie != NULL) $vytiahnutie=mysql_fetch_array($vytiahnutie);

    //ZABEZPECENIE
    if ( ($_SESSION['typ_uzivatela'] == "moderator" ) && ($vytiahnutie['autor'] != $_SESSION['meno_uzivatela']) ){
      echo "Neopravneny pristup!!!"; exit;
    } else {
      
      ?>
      <TABLE BORDER="1" ALIGN="center" BORDERCOLOR="black">
       <FORM ACTION="admin_clanky_update.php?x=3" METHOD="post">
        <TR><TD ALIGN="center"><P><B>UPRAVIT CLANOK</B></P></TD></TR>
        
        <?php if ( $_SESSION['typ_uzivatela'] == "admin" ) {?>
          <TR><TD ALIGN="center"><B>AUTOR:</B><BR><INPUT TYPE="text" NAME="author" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $vytiahnutie['autor'] ?>"></TD></TR>
        <?php } 
         if ( $_SESSION['typ_uzivatela'] == "moderator" ) {?>
           <TR><TD ALIGN="center"><B>AUTOR:</B><BR><INPUT TYPE="hidden" NAME="author" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $vytiahnutie['autor']; ?>"><?php echo $_SESSION['meno_uzivatela']; ?></TD></TR>
         <?php } ?>
        
        <TR><TD ALIGN="center"><B>NADPIS CLANKU:</B><BR><INPUT TYPE="text" NAME="nadpis" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $vytiahnutie['nadpis']; ?>"></TD></TR>
        <TR><TD ALIGN="center"><B>DATUM (DD-MM-RRRR):</B><BR><INPUT TYPE="text" NAME="date" SIZE="65" MAXLENGTH="64" VALUE="<?php echo date('d-m-Y', ($vytiahnutie['date'])); ?>"></TD></TR>
        <!-- //<TR><TD ALIGN="center"><B>OBRAZOK</B> (max. velk. 64kB):<BR><INPUT TYPE="file" NAME="pic" SIZE="50" VALUE="<?php// echo $vytiahnutie['pic'] ?>"></TD></TR> -->
        <TR><TD ALIGN="center"><B>PRECITANE:</B><BR><INPUT TYPE="text" NAME="precitane" SIZE="65" VALUE="<?php echo $vytiahnutie['precitane']; ?>"></TD></TR>
        <TR><TD ALIGN="center" ><B>TEXT HLAVICKA:</B><BR><TEXTAREA NAME="text_small" COLS="77" ROWS="4"><?php echo $vytiahnutie['text_small']; ?></TEXTAREA></TD></TR>
        <TR><TD ALIGN="center" ><B>HLAVNY TEXT:</B><BR><TEXTAREA NAME="text_big" COLS="77" ROWS="15"><?php echo $vytiahnutie['text_big']; ?></TEXTAREA></TD></TR>
        <TR><TD ALIGN="center"><INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $vytiahnutie['id']; ?>"><INPUT TYPE="submit" VALUE="Upravit Clanok"></TD>
       </FORM>
      </TABLE>
      <?php
    
    }
  } else if ( $x == "2" ) {
    ?>
      <TABLE BORDER="1" ALIGN="center" BORDERCOLOR="black">
       <FORM ACTION="admin_clanky_update.php?x=3" METHOD="post">
        <TR><TD ALIGN="center"><P><B>UPRAVIT CLANOK</B></P></TD></TR>
        
        <?php if ( $_SESSION['typ_uzivatela'] == "admin" ) {?>
          <TR><TD ALIGN="center"><B>AUTOR:</B><BR><INPUT TYPE="text" NAME="author" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $_POST['author']; ?>"></TD></TR>
        <?php } 
         if ( $_SESSION['typ_uzivatela'] == "moderator" ) {?>
           <TR><TD ALIGN="center"><B>AUTOR:</B><BR><INPUT TYPE="hidden" NAME="author" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $_POST['author']; ?>"><?php echo $_POST['author']; ?></TD></TR>
         <?php } ?>
        
        <TR><TD ALIGN="center"><B>NADPIS CLANKU:</B><BR><INPUT TYPE="text" NAME="nadpis" SIZE="65" MAXLENGTH="128" VALUE="<?php echo $_POST['nadpis']; ?>"></TD></TR>
        <TR><TD ALIGN="center"><B>DATUM (DD-MM-RRRR):</B><BR><INPUT TYPE="text" NAME="date" SIZE="65" MAXLENGTH="64" VALUE="<?php echo date('d-m-Y', ($_POST['date'])); ?>"></TD></TR>
        <!-- //<TR><TD ALIGN="center"><B>OBRAZOK</B> (max. velk. 64kB):<BR><INPUT TYPE="file" NAME="pic" SIZE="50" VALUE="<?php// echo $vytiahnutie['pic'] ?>"></TD></TR> -->
        <TR><TD ALIGN="center"><B>PRECITANE:</B><BR><INPUT TYPE="text" NAME="precitane" SIZE="65" VALUE="<?php echo $_POST['precitane']; ?>"></TD></TR>
        <TR><TD ALIGN="center"><B>TEXT HLAVICKA:</B><BR><TEXTAREA NAME="text_small" COLS="77" ROWS="4"><?php echo $_POST['text_small']; ?></TEXTAREA></TD></TR>
        <TR><TD ALIGN="center"><B>HLAVNY TEXT:</B><BR><TEXTAREA NAME="text_big" COLS="77" ROWS="15"><?php echo $_POST['text_big']; ?></TEXTAREA></TD></TR>
        <TR><TD ALIGN="center"><INPUT TYPE="hidden" NAME="id" VALUE="<?php echo $_POST['id']; ?>"><INPUT TYPE="submit" VALUE="Upravit Clanok"></TD>
       </FORM>
      </TABLE>
    <?php
  } else if ( $x == "3" ){
  
      function sendBack(){
      ?>
       <FORM ACTION="admin_clanky_update.php?x=2" METHOD="post">
        <INPUT TYPE="hidden" NAME="nadpis"     VALUE="<?php echo toSingleAp($_POST['nadpis']);     ?>">
        <INPUT TYPE="hidden" NAME="author"     VALUE="<?php echo toSingleAp($_POST['author']);     ?>">
        <INPUT TYPE="hidden" NAME="date"       VALUE="<?php echo toSingleAp($_POST['date']);       ?>">
        <INPUT TYPE="hidden" NAME="precitane"  VALUE="<?php echo toSingleAp($_POST['precitane']);  ?>">
        <INPUT TYPE="hidden" NAME="text_small" VALUE="<?php echo toSingleAp($_POST['text_small']); ?>">
        <INPUT TYPE="hidden" NAME="text_big"   VALUE="<?php echo toSingleAp($_POST['text_big']);   ?>">
        <INPUT TYPE="hidden" NAME="id"         VALUE="<?php echo toSingleAp($_POST['id']);         ?>">
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
  
                  $author = $_POST["author"];
                  $author = strip_tags($author,'');
  
                  $nadpis = $_POST["nadpis"];
                  $nadpis = strip_tags($nadpis,'');    

                  $date = $_POST["date"];
                  $date = strip_tags($date,'');  
                  list($DD, $MM, $YYYY) = split("-", $date);
                  $date = mktime(0,0,0,$MM,$DD,$YYYY); 
        
                  $precitane = $_POST["precitane"];
                  $precitane = strip_tags($precitane,'');
        
                  $text_small = $_POST["text_small"];
        
                  $text_big = $_POST["text_big"];
        
                  $id = $_POST["id"];
                  $id = strip_tags($id,'');
        
                  //F-cia, ktora edituje clanok.
                  function form ($author, $nadpis, $date, $precitane, $text_small, $text_big, $id){

                    $vlozenie = mysql_query("UPDATE clanky SET autor = '".$author."', nadpis = '".$nadpis."', precitane = '".$precitane."', date = '".$date."', text_small = '".$text_small."', text_big = '".$text_big."' WHERE id ='".$id."' ");
                    if ($vlozenie == true) {
                      echo "\r\n\t<CENTER>";
                      echo "\r\n\t<BR><BR>Clanok s bol uspesne editovany.<BR><BR>";
                      /*
                      echo "\r\n\tClanok s ID: ".$id." bol uspesne editovany.<BR><BR>";
                      echo "\r\n\tAutor: <B>".$author."</B><BR>";
                      echo "\r\n\tNadpis: <B>".$nadpis."</B><BR>";
                      echo "\r\n\tDatum: <B>".$date."</B><BR>";
                      echo "\r\n\tPrecitane: <B>".$precitane."</B><BR>";
                      //echo "\r\n\tThumbnail: <B>".$pic."</B><BR>";
                      echo "\r\n\tText small: <B>".$text_small."</B><BR>";
                      echo "\r\n\tText big: <B>".$text_big."</B><BR>";
                      */
                      echo "\r\n\t</CENTER>";
                    } else {
                      echo "Chyba! : ".mysql_error();
                    }
                  }
        
                  form($author, $nadpis, $date, $precitane, $text_small, $text_big, $id); 
                  
                }
              }
            }
          }
        }
      }
    }
  }
?>
   <DIV CLASS="cursor" ONCLICK="window.close();"><B><CENTER>ZATVOR OKNO</CENTER></B></DIV>
<?php
// -------------------------------------------------------------------------- //
} else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //
?>
</BODY>
</HTML>
