<?php
  
  //Funkcia, ktora vypise clanky.
  function f($limit){
    
    echo '<DIV CLASS="stranka">';

    include_once ("definitions.php");
    $all_text=psw_mysql_query("SELECT * FROM clanky ORDER BY id DESC");
    $rows = 0;
	while($sprava = $all_text->fetch_assoc()) {
            $rows++;
          //***********************************
          ?>
          <DIV CLASS="clanok">
           <DIV CLASS="clanok_date">
            <?php echo date('d.m.Y', ($sprava['date']))."\n" ?>
           </DIV>
           <DIV CLASS="clanok_nadpis">
            <A HREF="site.php?x=1&id=<?php echo $sprava['id']; ?>" TARGET="_self"><?php echo $sprava['nadpis']."\n" ?></A>
           </DIV>
           <DIV CLASS="clanok_text">
            <?php echo $sprava['text_small']."\n" ?>
           </DIV>
           <DIV CLASS="clanok_autor">
            <?php echo "Precitane: <B>".$sprava['precitane']."</B>&nbsp;&nbsp;&nbsp;" ?>
            <?php echo $sprava['autor']."\n" ?>
           </DIV>
           <DIV CLASS="clanok_pic">
            <?php
             // Write article image into web-accessible tmp directory
             $obr = "tmp/obr".$sprava['id'].".tmp";
             $handle = @fopen($obr, "wb");
             if ($handle === false) {
               echo "Chyba tvorby obrazka!";
             } else {
               if (fwrite($handle, $sprava['pic']) === false) {
                 echo "Chyba tvorby obrazka!";
               }
               fclose($handle);
             }
            ?>
            <A HREF="site.php?x=1&id=<?php echo $sprava['id']; ?>"><IMG SRC="<?php echo $obr; ?>" ALT="&nbsp;&nbsp;&nbsp;LZK" BORDER="0"></A><BR>
           </DIV>
          </DIV>
          <BR>
          <?php
          //**************************************
              
    }

    ?>
    </DIV>
    <?php
  }
?>
