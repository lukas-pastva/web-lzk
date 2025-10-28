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
  
  //Ak je x = 1 tak sa len vytiahnu data z DB
  if ($x == "1"){
  
    $id = $_GET['id'];
    $id = strip_tags($id,'');

    if ( $id != NULL ) {
  
      $vytiahnutie = mysql_query("SELECT * FROM pictures WHERE id = '".$id."'");
      if ($vytiahnutie != NULL) $vytiahnutie=mysql_fetch_array($vytiahnutie);

      ?>
      <FORM ACTION="admin_pictures_update.php?x=3" ENCTYPE="multipart/form-data" METHOD="post">
       <CENTER>
        <TABLE BORDER="1" BORDERCOLOR="black">
         <B>UPRAVIT OBRAZOK</B>
         <TR ALIGN="center">
          <TD>TYP OBRAZKU:<BR>
           <SELECT NAME="sub_class" SIZE="1">
             <OPTION VALUE="">
            <OPTGROUP LABEL="Hip-Hop">
             <OPTION <?php  if($vytiahnutie['sub_class'] == "write" ) echo "SELECTED"; ?> VALUE="write">Write
             <OPTION <?php  if($vytiahnutie['sub_class'] == "sketches" ) echo "SELECTED"; ?> VALUE="sketches">Scketches
             <OPTION <?php  if($vytiahnutie['sub_class'] == "stickers" ) echo "SELECTED"; ?> VALUE="stickers">Stickers
            </OPTGROUP>
            <OPTGROUP LABEL="Ex-sports">
             <OPTION <?php  if($vytiahnutie['sub_class'] == "sk8" ) echo "SELECTED"; ?> VALUE="sk8">SK8
             <OPTION <?php  if($vytiahnutie['sub_class'] == "bike" ) echo "SELECTED"; ?> VALUE="bike">Bike
             <OPTION <?php  if($vytiahnutie['sub_class'] == "snb" ) echo "SELECTED"; ?> VALUE="snb">SNB
            </OPTGROUP>
            <OPTGROUP LABEL="Parties">
             <OPTION <?php  if($vytiahnutie['sub_class'] == "hip-hop_fest" ) echo "SELECTED"; ?> VALUE="hip-hop_fest">Hip-Hop Fest
             <OPTION <?php  if($vytiahnutie['sub_class'] == "dasemolina-theend" ) echo "SELECTED"; ?> VALUE="dasemolina-theend">Da Semolina End
             <OPTION <?php  if($vytiahnutie['sub_class'] == "dasemolinaxi" ) echo "SELECTED"; ?> VALUE="dasemolinaxi">Da Semolinaxi
             <OPTION <?php  if($vytiahnutie['sub_class'] == "hip-hopsummit1" ) echo "SELECTED"; ?> VALUE="hip-hopsummit1">Hip-Hop Summit 1
             <OPTION <?php  if($vytiahnutie['sub_class'] == "hip-hopsummit3" ) echo "SELECTED"; ?> VALUE="hip-hopsummit3">Hip-Hop Summit 3
             <OPTION <?php  if($vytiahnutie['sub_class'] == "jamza" ) echo "SELECTED"; ?> VALUE="jamza">Jam ZA
             <OPTION <?php  if($vytiahnutie['sub_class'] == "martin" ) echo "SELECTED"; ?> VALUE="martin">Martin
             <OPTION <?php  if($vytiahnutie['sub_class'] == "notakdavaj3" ) echo "SELECTED"; ?> VALUE="notakdavaj3">No Tak Davaj 3
             <OPTION <?php  if($vytiahnutie['sub_class'] == "ca2" ) echo "SELECTED"; ?> VALUE="ca2">CA uderground 2
             <OPTION <?php  if($vytiahnutie['sub_class'] == "ca4" ) echo "SELECTED"; ?> VALUE="ca4">CA uderground 4
            </OPTGROUP>
            <OPTGROUP LABEL="Haluze">
             <OPTION <?php  if($vytiahnutie['sub_class'] == "haluze" ) echo "SELECTED"; ?> VALUE="haluze">Haluze
            </OPTGROUP>
            <OPTGROUP LABEL="Kooperacia">
             <OPTION <?php  if($vytiahnutie['sub_class'] == "xtm" )    echo "SELECTED"; ?> VALUE="xtm">XTM crew
            </OPTGROUP>
           </SELECT>
          </TD>
         </TR>
         <TR ALIGN="center"><TD>MENO OBRAZKU:<BR><INPUT TYPE="text" NAME="author" SIZE="35" MAXLENGTH="128" VALUE="<?php  echo $vytiahnutie['author'] ?>"></TD></TR>
         <TR ALIGN="center"><TD>DATUM (DD-MM-RRRR):<BR><INPUT TYPE="text" NAME="date" SIZE="35" MAXLENGTH="64" VALUE="<?php  echo date('d-m-Y', ($vytiahnutie['date'])); ?>"></TD></TR>
         <TR ALIGN="center"><TD>POPIS OBRAZKU:<BR><TEXTAREA NAME="description" COLS="31" ROWS="5"><?php  echo $vytiahnutie['description'] ?></TEXTAREA>
         <INPUT TYPE="hidden" NAME="id" VALUE="<?php  echo $id; ?>">
         <TR ALIGN="center"><TD><INPUT TYPE="submit" VALUE="Upravit obrazok"></TD></TR>
        </TABLE>
       </CENTER>
      </FORM>
      <?php 
    }
  }
  
  //Ak je x = 2, tak sa zle zadala neaka hodnota.
  if ($x == "2"){
  
    ?>
     <FORM ACTION="admin_pictures_update.php?x=3" ENCTYPE="multipart/form-data" METHOD="post">
      <CENTER>
       <TABLE BORDER="1" BORDERCOLOR="black">
        <B>VLOZIT OBRAZOK</B>
        <TR ALIGN="center">
         <TD>TYP OBRAZKU:<BR>
          <SELECT NAME="sub_class" SIZE="1">
            <OPTION VALUE="">
           <OPTGROUP LABEL="Hip-Hop">
            <OPTION <?php  if($_POST['sub_class'] == "write" )    echo "SELECTED"; ?> VALUE="write">Write
            <OPTION <?php  if($_POST['sub_class'] == "sketches" ) echo "SELECTED"; ?> VALUE="sketches">Scketches
            <OPTION <?php  if($_POST['sub_class'] == "stickers" ) echo "SELECTED"; ?> VALUE="stickers">Stickers
           </OPTGROUP>
           <OPTGROUP LABEL="Ex-sports">
            <OPTION <?php  if($_POST['sub_class'] == "sk8" )  echo "SELECTED"; ?> VALUE="sk8">SK8
            <OPTION <?php  if($_POST['sub_class'] == "bike" ) echo "SELECTED"; ?> VALUE="bike">Bike
            <OPTION <?php  if($_POST['sub_class'] == "snb" )  echo "SELECTED"; ?> VALUE="snb">SNB
           </OPTGROUP>
           <OPTGROUP LABEL="Parties">
            <OPTION <?php  if($_POST['sub_class'] == "hip-hop_fest" )      echo "SELECTED"; ?> VALUE="hip-hop_fest">Hip-Hop Fest
            <OPTION <?php  if($_POST['sub_class'] == "dasemolina-theend" ) echo "SELECTED"; ?> VALUE="dasemolina-theend">Da Semolina End
            <OPTION <?php  if($_POST['sub_class'] == "dasemolinaxi" )      echo "SELECTED"; ?> VALUE="dasemolinaxi">Da Semolinaxi
            <OPTION <?php  if($_POST['sub_class'] == "hip-hopsummit1" )    echo "SELECTED"; ?> VALUE="hip-hopsummit1">Hip-Hop Summit 1
            <OPTION <?php  if($_POST['sub_class'] == "hip-hopsummit3" )    echo "SELECTED"; ?> VALUE="hip-hopsummit3">Hip-Hop Summit 3
            <OPTION <?php  if($_POST['sub_class'] == "jamza" )             echo "SELECTED"; ?> VALUE="jamza">Jam ZA
            <OPTION <?php  if($_POST['sub_class'] == "martin" )            echo "SELECTED"; ?> VALUE="martin">Martin
            <OPTION <?php  if($_POST['sub_class'] == "notakdavaj3" )       echo "SELECTED"; ?> VALUE="notakdavaj3">No Tak Davaj 3
            <OPTION <?php  if($_POST['sub_class'] == "ca2" )               echo "SELECTED"; ?> VALUE="ca2">CA uderground 2
            <OPTION <?php  if($_POST['sub_class'] == "ca4" )               echo "SELECTED"; ?> VALUE="ca4">CA uderground 4
           </OPTGROUP>
           <OPTGROUP LABEL="Haluze">
            <OPTION <?php  if($_POST['sub_class'] == "haluze" ) echo "SELECTED"; ?> VALUE="haluze">Haluze
           </OPTGROUP>
           <OPTGROUP LABEL="Kooperacia">
            <OPTION <?php  if($_POST['sub_class'] == "xtm" )    echo "SELECTED"; ?> VALUE="xtm">XTM crew
           </OPTGROUP>
          </SELECT>
         </TD>
        </TR>
        <TR ALIGN="center"><TD>MENO OBRAZKU:<BR><INPUT TYPE="text" NAME="author" SIZE="35" MAXLENGTH="128" VALUE="<?php  echo $_POST['author']; ?>"></TD></TR>
        <TR ALIGN="center"><TD>DATUM (DD-MM-RRRR):<BR><INPUT TYPE="text" NAME="date" SIZE="35" MAXLENGTH="64" VALUE="<?php  echo $_POST['date']; ?>"></TD></TR>
        <TR ALIGN="center"><TD>POPIS OBRAZKU:<BR><TEXTAREA NAME="description" COLS="31" ROWS="5"><?php  echo $_POST['description']; ?></TEXTAREA></TD></TR>
        <INPUT TYPE="hidden" NAME="id" VALUE="<?php  echo $id; ?>">
        <TR ALIGN="center"><TD><INPUT TYPE="submit" VALUE="Vlozit obrazok"></TD></TR>
       </TABLE>
      </CENTER>
     </FORM>
    <?php 
  }
  

  //Ak chceme odoslat data do DB
  if ($x == "3"){
    
    function sendBack(){
      ?>
       <FORM ACTION="admin_pictures_update.php?x=2" METHOD="post">
        <INPUT TYPE="hidden" NAME="sub_class"    VALUE="<?php  echo toSingleAp($_POST['sub_class']);   ?>">
        <INPUT TYPE="hidden" NAME="author"       VALUE="<?php  echo toSingleAp($_POST['author']);      ?>">
        <INPUT TYPE="hidden" NAME="date"         VALUE="<?php  echo toSingleAp($_POST['date']);        ?>">
        <INPUT TYPE="hidden" NAME="description"  VALUE="<?php  echo toSingleAp($_POST['description']); ?>">
        <INPUT TYPE="hidden" NAME="id"           VALUE="<?php  echo toSingleAp($_POST['id']); ?>">
        <INPUT TYPE="submit" VALUE="Naspet">
       </FORM>
      <?php 
    }
    
    if (! $_POST['sub_class'] ){
      echo "<CENTER>Nevybral si typ obrazka!<BR><BR>";
      sendBack();
    } else {
      
      if ( ! $_POST['author'] ){
        echo "<CENTER>Nezadal si meno obrazka!<BR><BR>";
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
  
              //Osejpovanie datumu.
              $date = $_POST["date"];
              $date = strip_tags($date,'');  
              list($DD, $MM, $YYYY) = split("-", $date);
              $date = mktime(0,0,0,$MM,$DD,$YYYY);  

              $description = $_POST["description"];
              $description = strip_tags($description,'');

              $destination = "foto/".$main_class."/".$sub_class."/";
              
              $id = $_POST['id'];
              $id = strip_tags($id,'');
              
              
              //F-cia, ktora upravi obrazok v DB
              function form ($main_class, $sub_class, $author, $date, $description, $destination, $id){

                $vlozenie = mysql_query("UPDATE pictures SET main_class = '".$main_class."', sub_class = '".$sub_class."', date = '".$date."', author = '".$author."', description = '".$description."', destination = '".$destination."' WHERE id ='".$id."' ");

                if ($vlozenie == true) {
                  echo "\r\n\t<CENTER>";
                  echo "\r\n\t<BR><BR>Vlastnotsi obrazka uspesne editovane.<BR><BR>";
                  /*
                  echo "\r\n\tObrazok s ID: ".$id." bol uspesne editovany.<BR><BR>";
                  echo "\r\n\tMain_class: <B>".$main_class."</B><BR>";
                  echo "\r\n\tSub_class: <B>".$sub_class."</B><BR>";
                  echo "\r\n\tAuthor: <B>".$author."</B><BR>";
                  echo "\r\n\tDate: <B>".$date."</B><BR>";
                  echo "\r\n\tDescription: <B>".$description."</B><BR>";
                  echo "\r\n\tDestination: <B>".$destination."</B><BR><BR>";
                  */
                  echo "\r\n\t</CENTER>";
               } else {
                 echo "Chyba! : ".mysql_error();
               }
             }
          
             form($main_class, $sub_class, $author, $date, $description, $destination, $id); 

            }
          }
        }
      }
    }         
  }

?>

   <TD ALIGN="center"><BR><DIV CLASS="cursor" ONCLICK="window.close();"><B><CENTER>ZATVOR OKNO</CENTER></B></DIV></TD></TR>
  </TABLE>
<?php 
// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
