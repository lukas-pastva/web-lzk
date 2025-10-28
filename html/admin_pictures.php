<?php
  function f($sub_class){
    if (! $sub_class) { $sub_class="none"; }
    $sub_class = strip_tags($sub_class);
    
    include_once ("definitions.php");

    ?>
    <DIV CLASS="stranka">
     <H3>Admin_obrazky</H3>
     <HR>  
     <?php
     // -------------------------------------------------------------------------- //
     if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
     // -------------------------------------------------------------------------- //
     ?>
     <DIV CLASS="cursor" ONCLICK="window.open('admin_pictures_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=<?php echo ADMIN_PICTURES_INSERT_W; ?>,height=<?php echo ADMIN_PICTURES_INSERT_H; ?>,left=10,titlebar=1');"><B>DOPLNIT OBRAZOK</B></DIV>
     <HR>
       <B>ZOBRAZIT TYP OBRAZKOV:</B>
       <FORM onchange="submit()" ACTION="site.php?x=94" METHOD="post">
        <SELECT NAME="sub_class" SIZE="1">
          <OPTION <?php if ($sub_class == "none")              echo "SELECTED"; ?> VALUE="">
         <OPTGROUP LABEL="Hip-Hop">
          <OPTION <?php if ($sub_class == "write")             echo "SELECTED"; ?> VALUE="write">Write
          <OPTION <?php if ($sub_class == "sketches")          echo "SELECTED"; ?> VALUE="sketches">Scketches
          <OPTION <?php if ($sub_class == "stickers")          echo "SELECTED"; ?> VALUE="stickers">Stickers
         </OPTGROUP>
         <OPTGROUP LABEL="Ex-sports">
          <OPTION <?php if ($sub_class == "sk8")               echo "SELECTED"; ?> VALUE="sk8">SK8
          <OPTION <?php if ($sub_class == "bike")              echo "SELECTED"; ?> VALUE="bike">Bike
          <OPTION <?php if ($sub_class == "snb")               echo "SELECTED"; ?> VALUE="snb">SNB
         </OPTGROUP>
         <OPTGROUP LABEL="Parties">
          <OPTION <?php if ($sub_class == "hip-hop_fest")      echo "SELECTED"; ?> VALUE="hip-hop_fest">Hip-Hop Fest
          <OPTION <?php if ($sub_class == "dasemolina-theend") echo "SELECTED"; ?> VALUE="dasemolina-theend">Da Semolina End
          <OPTION <?php if ($sub_class == "dasemolinaxi")      echo "SELECTED"; ?> VALUE="dasemolinaxi">Da Semolinaxi
          <OPTION <?php if ($sub_class == "hip-hopsummit1")    echo "SELECTED"; ?> VALUE="hip-hopsummit1">Hip-Hop Summit 1
          <OPTION <?php if ($sub_class == "hip-hopsummit3")    echo "SELECTED"; ?> VALUE="hip-hopsummit3">Hip-Hop Summit 3
          <OPTION <?php if ($sub_class == "jamza")             echo "SELECTED"; ?> VALUE="jamza">Jam ZA
          <OPTION <?php if ($sub_class == "martin")            echo "SELECTED"; ?> VALUE="martin">Martin
          <OPTION <?php if ($sub_class == "notakdavaj3")       echo "SELECTED"; ?> VALUE="notakdavaj3">No Tak Davaj 3
          <OPTION <?php if ($sub_class == "ca2")               echo "SELECTED"; ?> VALUE="ca2">CA uderground 2
          <OPTION <?php if ($sub_class == "ca4")               echo "SELECTED"; ?> VALUE="ca4">CA uderground 4
         </OPTGROUP>
         <OPTGROUP LABEL="Haluze">
          <OPTION <?php if ($sub_class == "haluze")            echo "SELECTED"; ?> VALUE="haluze">Haluze
         </OPTGROUP>
         <OPTGROUP LABEL="Kooperacia">
          <OPTION <?php if ($sub_class == "xtm")               echo "SELECTED"; ?> VALUE="xtm">XTM crew
         </OPTGROUP>
        </SELECT>
        
       </FORM>
     <BR>
     <?php
  
      $all_text=mysql_query("SELECT * FROM pictures WHERE sub_class='".$sub_class."' ORDER BY id DESC");
      
     echo "Pocet obrazkov v kategorii: <B>".mysql_affected_rows($link)."</B><HR><HR>";
      
      while ( ($sprava=mysql_fetch_array($all_text)) == true)
      {
        echo "\r\n\t<DIV CLASS=\"admin_msg\">";
        echo "<A HREF=\"".$sprava["destination"].$sprava["name"]."\" TARGET=\"new\"><IMG SRC=\"".$sprava["destination"]."small/".$sprava["name"]."\" HEIGHT=\"100\" BORDER=\"1\"></A><BR>";
        //echo "\r\n\tID: <B>".$sprava["id"]."</B><BR>";
        //echo "\r\n\tmain_class: <B>".$sprava["main_class"]."</B><BR>";
        //echo "\r\n\tsub_class: <B>".$sprava["sub_class"]."</B><BR>";
        echo "\r\n\tAutor: <B>".$sprava["author"]."</B><BR>";
        echo "\r\n\tPopis: <B>".$sprava["description"]."</B><BR>";
        echo "\r\n\tDatum: <B>".date('d.m.Y', ($sprava['date']))."</B><BR>";
        //echo "\r\n\tSize: <B>".$sprava["size"]."</B><BR>";
        echo "\r\n\tUmiestnenie: <B>".$sprava["destination"].$sprava["name"]."</B><BR>";
        
        echo "\r\n\t<HR><DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_pictures_update_image.php?id=".$sprava['id']."&x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_PICTURES_UPDATE_IMAGE_W.",height=".ADMIN_PICTURES_UPDATE_IMAGE_H.",left=10,titlebar=1')\"><B>Zmenit obrazok</B></DIV>";        
        echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_pictures_update.php?id=".$sprava['id']."&x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_PICTURES_UPDATE_W.",height=".ADMIN_PICTURES_UPDATE_H.",left=10,titlebar=1')\"><B>Uravit vlastnosti obrazka</B></DIV>";
        echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_pictures_delete.php?x=pictures&amp;y=id&amp;z=".$sprava['id']."', '', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_DELETE_FROM_DB_W.",height=".ADMIN_DELETE_FROM_DB_W.",left=10,titlebar=1')\"><B>Vymazat obrazok</B></DIV>";
        echo "\r\n\t</DIV><BR>";
      }
     // -------------------------------------------------------------------------- //
     } else { echo "Na tuto stranku nemate opravneny pristup"; }
     // -------------------------------------------------------------------------- //
    ?>  
    </DIV>
    <?php
  }
?>
