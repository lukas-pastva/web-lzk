<?php
  function f($limit){
  
    include_once("definitions.php");
    if (! $limit) { $limit = ADMIN_NEWS_POCET_ZOBRAZOVANYCH; }
    ?>
    <DIV CLASS="stranka">
     <H3>Admin_bleskovky</H3>
     <HR>
    <?php  
    // -------------------------------------------------------------------------- //  
      if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
    // -------------------------------------------------------------------------- //

      ?>
       <DIV CLASS="cursor" ONCLICK="window.open('admin_news_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=<?php echo ADMIN_NEWS_INSERT_W; ?>,height=<?php echo ADMIN_NEWS_INSERT_H; ?>,left=10,titlebar=1');"><B>DOPLNIT SPRAVU</B></DIV>
       <HR><HR>
      <?php

      $all_text=mysql_query("SELECT * FROM news ORDER BY nr DESC");
      
      //Vypis zoznamov stranok
      ?>
       <DIV CLASS="admin_msg">
        <DIV CLASS="clanok_autor">
         <CENTER>
      <?
      for ($x = ADMIN_NEWS_POCET_ZOBRAZOVANYCH; ($x-ADMIN_NEWS_POCET_ZOBRAZOVANYCH) < mysql_affected_rows($link); $x+=ADMIN_NEWS_POCET_ZOBRAZOVANYCH){
        $nr+=1;
        if ( $limit != $x ){
          echo "\r\n\t<A HREF=\"site.php?x=93&limit=".$x."\"><B>".$nr."</B></A>";
        } else{
          echo "\r\n\t[".$nr."]";
        }
      }
      ?>
         </CENTER>
        </DIV>
       </DIV>
       <BR>
      <?php
      
      for ($i = 0; $i < $limit; $i++){
        if ($sprava = mysql_fetch_array($all_text)){
          if ($i >= ($limit - ADMIN_NEWS_POCET_ZOBRAZOVANYCH)){
            echo "\r\n\t<DIV CLASS=\"admin_msg\">";
            //echo "\r\n\tNr: <B>".$sprava['nr']."</B><BR>\r\n";
            echo "\tTime: <B>".$sprava['time']."</B><BR>\r\n";
            echo "\t<BR><B>Text:</B> ".$sprava['text']."<BR><BR><HR>";
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_news_update.php?nr=".$sprava['nr']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_NEWS_UPDATE_W.",height=".ADMIN_NEWS_UPDATE_H.",left=10,titlebar=1')\"><B>Uravit spravu</B></DIV>\r\n\t";
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_delete_from_db.php?x=news&amp;y=nr&amp;z=".$sprava['nr']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_DELETE_FROM_DB_W.",height=".ADMIN_DELETE_FROM_DB_W.",left=10,titlebar=1')\"><B>Vymazat spravu</B></DIV>\r\n\t";
            echo "\r\n\t</DIV><BR>";
          }
        }
      }
    // -------------------------------------------------------------------------- //
      } else { echo "Na tuto stranku nemate opravneny pristup"; }
    // -------------------------------------------------------------------------- //
    ?>
    </DIV>
    <?php
  }
?>
