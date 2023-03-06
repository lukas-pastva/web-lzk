<?
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
  <TITLE>VLOZIT OBRAZOK:</TITLE>
 </HEAD>
<BODY>
<?

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

  $x = $_GET["x"];
  if ($x == "1") {

?>
<FORM ACTION="admin_pictures_insert.php?x=3" ENCTYPE="multipart/form-data" METHOD="post">
 <CENTER>
  <TABLE BORDER="1" BORDERCOLOR="black">
    <B>VLOZIT OBRAZOK</B>
     <TR ALIGN="center">
       <TD>TYP OBRAZKU:<BR>
        <SELECT NAME="sub_class" SIZE="1">
          <OPTION VALUE="">
         <OPTGROUP LABEL="Hip-Hop">
          <OPTION VALUE="write">Write
          <OPTION VALUE="sketches">Scketches
          <OPTION VALUE="stickers">Stickers
         </OPTGROUP>
         <OPTGROUP LABEL="Ex-sports">
          <OPTION VALUE="sk8">SK8
          <OPTION VALUE="bike">Bike
          <OPTION VALUE="snb">SNB
         </OPTGROUP>
         <OPTGROUP LABEL="Parties">
          <OPTION VALUE="hip-hop_fest">Hip-Hop Fest
          <OPTION VALUE="dasemolina-theend">Da Semolina End
          <OPTION VALUE="dasemolinaxi">Da Semolinaxi
          <OPTION VALUE="hip-hopsummit1">Hip-Hop Summit 1
          <OPTION VALUE="hip-hopsummit3">Hip-Hop Summit 3
          <OPTION VALUE="jamza">Jam ZA
          <OPTION VALUE="martin">Martin
          <OPTION VALUE="notakdavaj3">No Tak Davaj 3
          <OPTION VALUE="ca2">CA uderground 2
          <OPTION VALUE="ca4">CA uderground 4
         </OPTGROUP>
         <OPTGROUP LABEL="Haluze">
          <OPTION VALUE="haluze">Haluze
         </OPTGROUP>
         <OPTGROUP LABEL="Kooperacia">
          <OPTION VALUE="xtm">XTM crew
         </OPTGROUP>
        </SELECT>
       </TD>
     </TR>
     <TR ALIGN="center"><TD>MENO OBRAZKU:<BR><INPUT TYPE="text" NAME="author" SIZE="35" MAXLENGTH="128"></TD></TR>
     <TR ALIGN="center"><TD>CESTA K SUBORU:<BR><INPUT TYPE="file" name="file" SIZE="20"></TD></TR>
     <TR ALIGN="center"><TD>DATUM (DD-MM-RRRR):<BR><INPUT TYPE="text" NAME="date" SIZE="35" MAXLENGTH="64"></TD></TR>
     <TR ALIGN="center"><TD>POPIS OBRAZKU:<BR><TEXTAREA NAME="description" COLS="31" ROWS="5"></TEXTAREA></TD></TR>
     <TR ALIGN="center"><TD><INPUT TYPE="submit" VALUE="Vlozit obrazok"></TD></TR>
  </TABLE>
 </CENTER>
</FORM>
<?
  }
  
  if ($x == "2") {

?>
<FORM ACTION="admin_pictures_insert.php?x=3" ENCTYPE="multipart/form-data" METHOD="post">
 <CENTER>
  <TABLE BORDER="1" BORDERCOLOR="black">
    <B>VLOZIT OBRAZOK</B>
     <TR ALIGN="center">
       <TD>TYP OBRAZKU:<BR>
        <SELECT NAME="sub_class" SIZE="1">
          <OPTION VALUE="">
         <OPTGROUP LABEL="Hip-Hop">
          <OPTION <? if($_POST['sub_class'] == "write" )    echo "SELECTED"; ?> VALUE="write">Write
          <OPTION <? if($_POST['sub_class'] == "sketches" ) echo "SELECTED"; ?> VALUE="sketches">Scketches
          <OPTION <? if($_POST['sub_class'] == "stickers" ) echo "SELECTED"; ?> VALUE="stickers">Stickers
         </OPTGROUP>
         <OPTGROUP LABEL="Ex-sports">
          <OPTION <? if($_POST['sub_class'] == "sk8" )  echo "SELECTED"; ?> VALUE="sk8">SK8
          <OPTION <? if($_POST['sub_class'] == "bike" ) echo "SELECTED"; ?> VALUE="bike">Bike
          <OPTION <? if($_POST['sub_class'] == "snb" )  echo "SELECTED"; ?> VALUE="snb">SNB
         </OPTGROUP>
         <OPTGROUP LABEL="Parties">
          <OPTION <? if($_POST['sub_class'] == "hip-hop_fest" )      echo "SELECTED"; ?> VALUE="hip-hop_fest">Hip-Hop Fest
          <OPTION <? if($_POST['sub_class'] == "dasemolina-theend" ) echo "SELECTED"; ?> VALUE="dasemolina-theend">Da Semolina End
          <OPTION <? if($_POST['sub_class'] == "dasemolinaxi" )      echo "SELECTED"; ?> VALUE="dasemolinaxi">Da Semolinaxi
          <OPTION <? if($_POST['sub_class'] == "hip-hopsummit1" )    echo "SELECTED"; ?> VALUE="hip-hopsummit1">Hip-Hop Summit 1
          <OPTION <? if($_POST['sub_class'] == "hip-hopsummit3" )    echo "SELECTED"; ?> VALUE="hip-hopsummit3">Hip-Hop Summit 3
          <OPTION <? if($_POST['sub_class'] == "jamza" )             echo "SELECTED"; ?> VALUE="jamza">Jam ZA
          <OPTION <? if($_POST['sub_class'] == "martin" )            echo "SELECTED"; ?> VALUE="martin">Martin
          <OPTION <? if($_POST['sub_class'] == "notakdavaj3" )       echo "SELECTED"; ?> VALUE="notakdavaj3">No Tak Davaj 3
          <OPTION <? if($_POST['sub_class'] == "ca2" )               echo "SELECTED"; ?> VALUE="ca2">CA uderground 2
          <OPTION <? if($_POST['sub_class'] == "ca4" )               echo "SELECTED"; ?> VALUE="ca4">CA uderground 4
         </OPTGROUP>
         <OPTGROUP LABEL="Haluze">
          <OPTION <? if($_POST['sub_class'] == "haluze" ) echo "SELECTED"; ?> VALUE="haluze">Haluze
         </OPTGROUP>
         <OPTGROUP LABEL="Kooperacia">
          <OPTION <? if($_POST['sub_class'] == "xtm" )    echo "SELECTED"; ?> VALUE="xtm">XTM crew
         </OPTGROUP>
        </SELECT>
       </TD>
     </TR>
     <TR ALIGN="center"><TD>MENO OBRAZKU:<BR><INPUT TYPE="text" NAME="author" SIZE="35" MAXLENGTH="128" VALUE="<? echo $_POST['author']; ?>"></TD></TR>
     <TR ALIGN="center"><TD>CESTA K SUBORU:<BR><INPUT TYPE="file" name="file" SIZE="20"></TD></TR>
     <TR ALIGN="center"><TD>DATUM (DD-MM-RRRR):<BR><INPUT TYPE="text" NAME="date" SIZE="35" MAXLENGTH="64" VALUE="<? echo $_POST['date']; ?>"></TD></TR>
     <TR ALIGN="center"><TD>POPIS OBRAZKU:<BR><TEXTAREA NAME="description" COLS="31" ROWS="5"><? echo $_POST['description']; ?></TEXTAREA></TD></TR>
     <TR ALIGN="center"><TD><INPUT TYPE="submit" VALUE="Vlozit obrazok"></TD></TR>
  </TABLE>
 </CENTER>
</FORM>
<?
  }
  
  
  //Ak sa posielal formular
  if ($_GET['x'] == "3"){
  
    function sendBack(){
      ?>
       <FORM ACTION="admin_pictures_insert.php?x=2" METHOD="post">
        <INPUT TYPE="hidden" NAME="sub_class"    VALUE="<? echo toSingleAp($_POST['sub_class']);   ?>">
        <INPUT TYPE="hidden" NAME="author"       VALUE="<? echo toSingleAp($_POST['author']);      ?>">
        <INPUT TYPE="hidden" NAME="date"         VALUE="<? echo toSingleAp($_POST['date']);        ?>">
        <INPUT TYPE="hidden" NAME="description"  VALUE="<? echo toSingleAp($_POST['description']); ?>">
        <INPUT TYPE="submit" VALUE="Naspet">
       </FORM>
      <?
    }
    
    if (! $_POST['sub_class'] ){
      echo "<CENTER>Nevybral si typ obrazka!<BR><BR>";
      sendBack();
    } else {
      
      if ( ! $_POST['author'] ){
        echo "<CENTER>Nezadal si meno obrazka!<BR><BR>";
        sendBack();
      } else {

        if ( ! is_file($_FILES['file']['tmp_name']) ){
          echo "<CENTER>Nevybral si ziadny obrazok!<BR><BR>";
          sendBack();
        } else {

          	if ( ($_FILES['file']['type'] != "image/jpeg" ) && ($_FILES['file']['type'] != "image/pjpeg" ) ) {
					     echo "<CENTER>Obrazok nie je vo formate jpeg, alebo ani nie je obrazok!<BR><BR>";
					     sendBack();
					  } else { 

                if ( ! $_POST['date'] ){
                  echo "<CENTER>Nevlozil si datum!<BR><BR>";
                  sendBack();
                } else {

                  if ( !isvaliddate($_POST['date']) ){
                    echo "<CENTER>Nezadal si datum v spravnom formate!<BR><BR>";
                    sendBack();
                  } else {

                    if ( ! $_POST['description'] ){
                      echo "<CENTER>Nevlozil si popis obrazka (lenivec).<BR><BR>";
                      sendBack();
                    } else {

                      $sub_class = $_POST['sub_class'];
                      $sub_class = strip_tags($sub_class,'');
    
                           if ($sub_class == "write")             $main_class = "hip-hop";
                      else if ($sub_class == "sketches")          $main_class = "hip-hop";
                      else if ($sub_class == "stickers")          $main_class = "hip-hop";
                      else if ($sub_class == "sk8")               $main_class = "exsports";
                      else if ($sub_class == "bike")              $main_class = "exsports";
                      else if ($sub_class == "snb")               $main_class = "exsports";
                      else if ($sub_class == "hip-hop_fest")      $main_class = "parties";
                      else if ($sub_class == "dasemolina-theend") $main_class = "parties";
                      else if ($sub_class == "dasemolinaxi")      $main_class = "parties";
                      else if ($sub_class == "hip-hopsummit1")    $main_class = "parties";
                      else if ($sub_class == "hip-hopsummit3")    $main_class = "parties";
                      else if ($sub_class == "jamza")             $main_class = "parties";
                      else if ($sub_class == "martin")            $main_class = "parties";
                      else if ($sub_class == "notakdavaj3")       $main_class = "parties";
                      else if ($sub_class == "ca2")               $main_class = "parties";
                      else if ($sub_class == "ca4")               $main_class = "parties";
                      else if ($sub_class == "haluze")            $main_class = "haluze";
                      else if ($sub_class == "xtm")               $main_class = "kooperacia";
        
                      $author = $_POST['author'];
                      $author = strip_tags($author,'');
  
                      $name = strtolower( $_FILES['file']['name'] );

                      //Osejpovanie datumu.
                      $date = $_POST["date"];
                      $date = strip_tags($date,'');  
                      list($DD, $MM, $YYYY) = split("-", $date);
                      $date = mktime(0,0,0,$MM,$DD,$YYYY);  

                      $description = $_POST["description"];
                      $description = strip_tags($description,'');

                      $destination = "foto/".$main_class."/".$sub_class."/";

                      //Nakopirovanie obrazka
                      $filename_norm = $destination.$_FILES['file']['name'];
                      $filename_small = $destination."small/".$_FILES['file']['name'];
                      
                      if ( ! move_uploaded_file( $_FILES['file']['tmp_name'], $filename_norm ) ){
                        echo "ERROR COPYING FILE!<BR><BR>";
                      }
                      if ( ! copy( $filename_norm, $filename_small ) ){
                        echo "ERROR COPYING small FILE!<BR><BR>";
                      }

                      //Zmeny rozliseni obrazkov
                      rename($filename_norm, strtolower($filename_norm)); 
                      rename($filename_small, strtolower($filename_small));
                      $filename_norm = strtolower($filename_norm);
                      $filename_small = strtolower($filename_small);

                      $dest_big = $filename_norm;
                      $dest_small = $filename_small;
                      $src_img = imagecreatefromjpeg($filename_norm);
                      $size_img = getimagesize($filename_norm);

                      //Praca s malym obrazkom
                      $small_height = SMALL_PICTURE_HEIGHT;
                      $small_width = $size_img[0] / ( $size_img[1] /100 );
                      $dst_img_small = imageCreateTrueColor($small_width,$small_height); 
                      imagecopyresized($dst_img_small, $src_img, 0, 0, 0, 0, $small_width, $small_height, $size_img[0], $size_img[1]);
                      imagejpeg($dst_img_small, $dest_small, SMALL_PICTURE_QUALITY);

                      //Praca s velkym obrazkom (len v pripade, ze je vacsi ako BIG_PICTURE_WIDTH v ose x)
                      $big_width = BIG_PICTURE_WIDTH;
                      if ( $size_img[0] > $big_width ){
                        $big_height = $size_img[1] / ( $size_img[0] / $big_width );
                        $dst_img_big = imageCreateTrueColor($big_width, $big_height); 
                        imagecopyresized($dst_img_big, $src_img, 0, 0, 0, 0, $big_width, $big_height, $size_img[0], $size_img[1]);
                        imagejpeg($dst_img_big, $dest_big, BIG_PICTURE_QUALITY);
                      } else {
                        $dst_img_big = imageCreateTrueColor($size_img[0], $size_img[1]); 
                        imagecopyresized($dst_img_big, $src_img, 0, 0, 0, 0, $size_img[0], $size_img[1], $size_img[0], $size_img[1]);
                        imagejpeg($dst_img_big, $dest_big, BIG_PICTURE_QUALITY);
                      }

                      $size = filesize($filename_norm);

                      //F-cia, ktora vlozi obrazok do DB
                      function form ($main_class, $sub_class, $author, $name, $size, $date, $description, $destination){

                        $vlozenie = mysql_query("insert into pictures (main_class, sub_class, author, name, date, size, description, destination) values ('".$main_class."', '".$sub_class."', '".$author."', '".$name."' , '".$date."', '".$size."', '".$description."', '".$destination."')");
                        if ($vlozenie == true) {
                          echo "\r\n\t<CENTER>";
                          echo "\r\n\t<BR><BR>Obrazok bol uspesne vlozeny.<BR><BR>";
                          /*
                          echo "\r\n\tObrazok bol uspesne vlozeny.<BR><BR>";
                          echo "\r\n\tMain_class: <B>".$main_class."</B><BR>";
                          echo "\r\n\tSub_class: <B>".$sub_class."</B><BR>";
                          echo "\r\n\tAuthor: <B>".$author."</B><BR>";
                          echo "\r\n\tName: <B>".$name."</B><BR>";
                          echo "\r\n\tDate: <B>".$date."</B><BR>";
                          echo "\r\n\tSize: <B>".$size."</B><BR>";
                          echo "\r\n\tDescription: <B>".$description."</B><BR>";
                          echo "\r\n\tDestination: <B>".$destination."</B><BR><BR>";
                          */
                          
                          echo "<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_pictures_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_PICTURES_INSERT_W.",height=".ADMIN_PICTURES_INSERT_H.",left=10,titlebar=1'); window.close();\"><B>Vloz dalsi obrazok.<B></DIV><BR>";
                          echo "\r\n\t</CENTER>";
                        } else {
                          echo "Chyba! : ".mysql_error();
                        }
                      }
                      form($main_class, $sub_class, $author, $name, $size, $date, $description, $destination); 

                    }
                  }
                }
              }
        }
      }
    }
  }


  echo "\r\n<BR><CENTER><DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><B>ZATVOR OKNO</B></DIV></CENTER>\r\n";

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
