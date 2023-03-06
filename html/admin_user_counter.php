<DIV CLASS="stranka">
  <H3>ADMIN_USER_COUNTER</H3>
  <HR>

<?php
  function f($dir){}

// -------------------------------------------------------------------------- //
  if ( $_SESSION['typ_uzivatela'] == "admin" ) {
// -------------------------------------------------------------------------- //


     
          
      $all_text=mysql_query("SELECT S.nick, U.time, U.ip FROM user_login U, users S WHERE U.user_id = S.id ORDER BY U.time DESC");
      while ( ($sprava=mysql_fetch_array($all_text)) == true)
      {
        echo "\r\n\t<DIV CLASS=\"admin_msg\">";
        echo "\r\n\tNick: <B>".$sprava["nick"]."</B><BR>";
        echo "\r\n\tDate: <B>".date('j.n.Y G:i:s', ($sprava['time']))."</B><BR>";
        echo "\r\n\tIP: <B>".$sprava['ip']."</B><BR>";
        echo "\r\n\t</DIV><BR>";
      }



// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>

  
</DIV>
