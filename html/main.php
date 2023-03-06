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
            <? echo date('d.m.Y', ($sprava['date']))."\n" ?>
           </DIV>
           <DIV CLASS="clanok_nadpis">
            <A HREF="site.php?x=1&id=<? echo $sprava['id']; ?>" TARGET="_self"><? echo $sprava['nadpis']."\n" ?></A>
           </DIV>
           <DIV CLASS="clanok_text">
            <? echo $sprava['text_small']."\n" ?>
           </DIV>
           <DIV CLASS="clanok_autor">
            <? echo "Precitane: <B>".$sprava['precitane']."</B>&nbsp;&nbsp;&nbsp;" ?>
            <? echo $sprava['autor']."\n" ?>
           </DIV>
           <DIV CLASS="clanok_pic">
            <?
             $obr = "/tmp/obr".$sprava['id'].".tmp";
             $handle = fopen($obr, "w");
             if(! fwrite($handle, $sprava['pic'] ) ){echo "Chyba tvorby obrazka!";}
             fclose($handle);
            ?>
            <A HREF="site.php?x=1&id=<? echo $sprava['id']; ?>"><IMG SRC="<? echo $obr;?>" ALT="&nbsp;&nbsp;&nbsp;LZK" BORDER="0"></A><BR>
           </DIV>
          </DIV>
          <BR>
          <?
          //**************************************
              
    }

    ?>
    </DIV>
    <?
  }
?>
