<?php
  function f($limit){
    
    include_once("definitions.php");
    if (! $limit) { $limit = ADMIN_CLANKY_POCET_ZOBRAZOVANYCH; }
    
    // -------------------------------------------------------------------------- //
    if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
    // -------------------------------------------------------------------------- //
  
        
      ?>
      <DIV CLASS="stranka">
       <H3>Admin_clanky</H3>
       <HR>
       <DIV CLASS="cursor" ONCLICK="window.open('admin_clanky_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=<? echo ADMIN_CLANKY_INSERT_W; ?>,height=<? echo ADMIN_CLANKY_INSERT_H; ?>,left=10,titlebar=1');"><B>DOPLNIT CLANOK</B></DIV>
       <HR>
      <?

      $all_text=mysql_query("SELECT * FROM clanky ORDER BY id DESC");

      //Vypis zoznamov stranok
      ?>
       <DIV CLASS="admin_msg">
        <DIV CLASS="clanok_autor">
         <CENTER>
      <?
      for ($x = ADMIN_CLANKY_POCET_ZOBRAZOVANYCH; ($x-ADMIN_CLANKY_POCET_ZOBRAZOVANYCH) < mysql_affected_rows($link); $x+=ADMIN_CLANKY_POCET_ZOBRAZOVANYCH){
        $nr+=1;
        if ( $limit != $x ){
          echo "\r\n\t<A HREF=\"site.php?x=90&limit=".$x."\"><B>".$nr."</B></A>";
        } else{
          echo "\r\n\t[".$nr."]";
        }
      }
      ?>
         </CENTER>
        </DIV>
       </DIV>
       <BR>
      <?

      
      for ($i = 0; $i < $limit; $i++){
       if ($sprava = mysql_fetch_array($all_text)){
        if ($i >= ($limit - ADMIN_CLANKY_POCET_ZOBRAZOVANYCH)){

          //**********************************************************************
          echo "\r\n\t<DIV CLASS=\"admin_msg\">";
          echo "\r\n\t<DIV CLASS=\"admin_msg_napis\">".$sprava["nadpis"]."</DIV><BR>";
        
          $obr = "./tmp/obr".$sprava['id'].".tmp";
          $handle = fopen($obr, "w");
          if(! fwrite($handle, $sprava['pic'] ) ){echo "Chyba tvorby obrazka!";}
          fclose($handle);
          ?><IMG SRC="<? echo $obr;?>" ALT="&nbsp;&nbsp;&nbsp;LZK" BORDER="0" WIDTH="70" HEIGHT="70"><BR><?
        
          //echo "\r\n\t<B>ID: </B>".$sprava["id"]."</B><BR>";
          echo "\r\n\t<B>datum: </B>".date('d.m.Y', ($sprava['date']))."</B><BR>";
          echo "\r\n\t<B>autor: </B>".$sprava["autor"]."<BR>";
          echo "\r\n\t<B>precitane: </B>".$sprava["precitane"]."</B><BR>";
          echo "\r\n\t<BR><B>hlavickovy text: </B>".$sprava["text_small"]."</B><BR>";
          echo "\r\n\t<BR><B>hlavny text: </B>".$sprava["text_big"]."</B><BR><HR>";

          if ( $_SESSION['typ_uzivatela'] == "admin" ){
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_clanky_update_image.php?x=1&id=".$sprava['id']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_CLANKY_UPDATE_IMAGE_W.",height=".ADMIN_CLANKY_UPDATE_IMAGE_H.",left=10,titlebar=1')\"><B>Zmenit obrazok</B></DIV>";        
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_clanky_update.php?x=1&id=".$sprava['id']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_CLANKY_UPDATE_W.",height=".ADMIN_CLANKY_UPDATE_H.",left=10,titlebar=1')\"><B>Uravit clanok</B></DIV>";
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_delete_from_db.php?x=clanky&amp;y=id&amp;z=".$sprava['id']."', '', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_DELETE_FROM_DB_W.",height=".ADMIN_DELETE_FROM_DB_H.",left=10,titlebar=1')\"><B>Vymazat clanok</B></DIV>";
          } 
        
          if ( ($_SESSION['typ_uzivatela'] == "moderator") && ($sprava['autor'] == $_SESSION['meno_uzivatela']) ){
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_clanky_update_image.php?x=1&id=".$sprava['id']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_CLANKY_UPDATE_IMAGE_W.",height=".ADMIN_CLANKY_UPDATE_IMAGE_H.",left=10,titlebar=1')\"><B>Zmenit obrazok</B></DIV>";        
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_clanky_update.php?x=1&id=".$sprava['id']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_CLANKY_UPDATE_W.",height=".ADMIN_CLANKY_UPDATE_H.",left=10,titlebar=1')\"><B>Uravit clanok</B></DIV>";
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_delete_from_db.php?x=clanky&amp;y=id&amp;z=".$sprava['id']."', '', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_DELETE_FROM_DB_W.",height=".ADMIN_DELETE_FROM_DB_H.",left=10,titlebar=1')\"><B>Vymazat clanok</B></DIV>";
          } 
          echo "\r\n\t</DIV><BR>";
          //**********************************************************************
        }
       }
      }
      ?>
      </DIV>
      <?    
    // -------------------------------------------------------------------------- //
    } else { echo "Na tuto stranku nemate opravneny pristup"; }
    // -------------------------------------------------------------------------- //
  }
?>
