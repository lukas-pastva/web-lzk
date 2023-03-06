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
  <TITLE>Upravit obrazok v obrazku</TITLE>
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
    <FORM ACTION="admin_pictures_update_image.php?x=2" ENCTYPE="multipart/form-data" METHOD="post">
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
      if ( ($_FILES['pic']['type'] != "image/jpeg" ) && ($_FILES['pic']['type'] != "image/pjpeg" ) ) {
			  echo "<CENTER>Obrazok nie je vo formate jpeg, alebo ani nie je obrazok!<BR><BR>";
		  } else {
        
        $id = $_POST['id'];
        
        $image_info = mysql_query("SELECT * FROM pictures WHERE id = '".$id."'");
        $image_info = mysql_fetch_array($image_info);
        $destination = $image_info['destination'];
        
        //Nakopirovanie obrazka
        $filename_norm = $destination.$_FILES['pic']['name'];
        $filename_small = $destination."small/".$_FILES['pic']['name'];
                      
        if ( ! move_uploaded_file( $_FILES['pic']['tmp_name'], $filename_norm ) ){
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
        $small_width = $size_img[0] / ( $size_img[1] /$small_height );
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

        $name = strtolower( $_FILES['pic']['name'] );

        $size = filesize($filename_norm);
        
        //Zapis do DB
        $edit = mysql_query("UPDATE pictures SET name = '".$name."', size = '".$size."' WHERE id ='".$id."' ");
        if ($edit == true) { echo "<BR><CENTER>Obrazok uspesne editovany.</CENTER>";}
        else { echo "Chyba! : ".mysql_error(); }
        
      }
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
