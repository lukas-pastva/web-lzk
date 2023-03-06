<?php
  function f($limit){
  
    include_once("definitions.php");
    if (! $limit) { $limit = ADMIN_FORUM_POCET_ZOBRAZOVANYCH; }
      ?>
      <DIV CLASS="stranka">
       <H3>Admin_forum</H3>
      <?
    // -------------------------------------------------------------------------- //
    if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
    // -------------------------------------------------------------------------- //

      ?>
       <HR>
       <DIV CLASS="cursor" ONCLICK="window.open('admin_forum_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=<? echo ADMIN_FORUM_INSERT_W; ?>,height=<? echo ADMIN_FORUM_INSERT_H; ?>,left=10,titlebar=1');"><B>DOPLNIT SPRAVU</B></DIV>
       <HR>
      <?


      $all_text=mysql_query("SELECT * FROM forum ORDER BY id DESC");
    
      //Vypis zoznamov stranok
      ?>
       <DIV CLASS="admin_msg">
        <DIV CLASS="clanok_autor">
         <CENTER>
      <?
      for ($x = ADMIN_FORUM_POCET_ZOBRAZOVANYCH; ($x-ADMIN_FORUM_POCET_ZOBRAZOVANYCH) < mysql_affected_rows($link); $x+=ADMIN_FORUM_POCET_ZOBRAZOVANYCH){
        $nr+=1;
        if ( $limit != $x ){
          echo "\r\n\t<A HREF=\"site.php?x=91&limit=".$x."\"><B>".$nr."</B></A>";
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
          if ($i >= ($limit - ADMIN_FORUM_POCET_ZOBRAZOVANYCH)){
            echo "\r\n\t<DIV CLASS=\"admin_msg\">";
            echo "\r\n\tNick: <B>".$sprava["nick"]."</B><BR>";
            echo "\r\n\tDate: <B>".date('j.n.Y G:i:s', ($sprava['time']))."</B><BR>";
            echo "\r\n\tIP: <B>".$sprava['ip']."</B><BR>";
            //echo "\r\n\tID: <B>".$sprava['id']."</B><BR><BR>";
            echo "\r\n\t<B>Text:</B> ".$sprava["text"]."<BR><BR>";
            echo "\r\n\t<HR><DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_forum_update.php?id=".$sprava['id']."', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_FORUM_UPDATE_W.",height=".ADMIN_FORUM_UPDATE_H.",left=10,titlebar=1')\"><B>Uravit spravu</B></DIV>";
            echo "\r\n\t<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_delete_from_db.php?x=forum&amp;y=id&amp;z=".$sprava['id']."', '', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_DELETE_FROM_DB_W.",height=".ADMIN_DELETE_FROM_DB_H.",left=10,titlebar=1')\"><B>Vymazat spravu</B></DIV>";
            echo "\r\n\t</DIV><BR>";
          }
        }
      }
    // -------------------------------------------------------------------------- //
    } else { echo "Na tuto stranku nemate opravneny pristup"; }
    // -------------------------------------------------------------------------- //
    ?>
     </DIV>
    <?
  }
?>
