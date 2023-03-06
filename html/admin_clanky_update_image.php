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
  <TITLE>Upravit obrazok v clanku</TITLE>
 </HEAD>
<BODY>
<?

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //


  $x = $_GET['x'];
  $x = strip_tags($x,'');

  if ( $x == "1"){
  
    $id = $_GET['id'];
    $id = strip_tags($id,'');

    ?>
    <CENTER><P><B>ZMENIT OBRAZOK</B></P><BR>
    <FORM ACTION="admin_clanky_update_image.php?x=2" ENCTYPE="multipart/form-data" METHOD="post">
      <INPUT type="file" name="pic">
      <INPUT type="hidden" value="<? echo $id; ?>" name="id">
      <INPUT type="submit" value="Odoslat">
    </FORM>
    <CENTER>
    <?
  
  } else if ( $x == "2" ){
  
    if ( !is_file($_FILES['pic']['tmp_name']) ){
      echo "<CENTER>Nevybral si ziadny obrazok!<BR><BR>";
    } else {
           
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
/*
        $pic_name = $_FILES['pic']['tmp_name'];
        $handle = fopen($pic_name, "rw");
        $pic = addslashes( fread( $handle, filesize( $pic_name ) ) );
        fclose($handle);
*/

        $edit = mysql_query("UPDATE clanky SET pic = '".$pic."' WHERE id ='".$id."' ");
        if ($edit == true) { echo "<BR><CENTER>Obrazok uspesne editovany.</CENTER>";}
        else { echo "Chyba! : ".mysql_error(); }
      }
  }
?>
   <BR><DIV CLASS="cursor" ONCLICK="window.close();"><B><CENTER>ZATVOR OKNO</CENTER></B></DIV>
<?

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
