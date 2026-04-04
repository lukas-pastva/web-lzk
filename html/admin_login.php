<DIV CLASS="stranka">
<CENTER>
<?php 
  function f($dir){}
  
  $nick = isset($_POST["nick"]) ? $_POST["nick"] : '';
  $nick = strip_tags($nick,'');

  $pass = isset($_POST["pass"]) ? $_POST["pass"] : '';
  $pass = strip_tags($pass,'');

  function login($nick, $pass){
  
    $nick = strtolower($nick);
    $pass = strtolower($pass);
    
    $vybratie = mysql_query("SELECT * FROM users WHERE nick='".mysql_real_escape_string($nick)."'");
    $vybratie_pole = mysql_fetch_array($vybratie);

    if( $pass == $vybratie_pole['pass'] ){
      $user_type = $vybratie_pole['type'];
      if (! mysql_query("INSERT INTO user_login (time, user_id, ip) VALUES ('".time()."', '".$vybratie_pole['id']."', '".$_SERVER["REMOTE_ADDR"]."') ") ) {
        echo "Error".mysql_error();      
      }
    }

    if ( $user_type == "admin" ){
      $change_id = session_regenerate_id();
      session_register('meno_uzivatela');
      session_register('typ_uzivatela');
      $_SESSION['meno_uzivatela'] = $nick;
      $_SESSION['typ_uzivatela'] = "admin";
      echo "<BR>Vitaj ".htmlspecialchars($nick)." si prihlaseny na tejto sajte ako administrator!!!<BR>&nbsp;<BR>\r\n";
    }
    
    else if ( $user_type == "moderator" ){
      $change_id = session_regenerate_id();
      session_register('meno_uzivatela');
      session_register('typ_uzivatela');
      $_SESSION['meno_uzivatela'] = $nick;
      $_SESSION['typ_uzivatela'] = "moderator";
      echo "<BR>Vitaj ".$nick." si prihlaseny na tejto sajte ako moderator!!!<BR>&nbsp;<BR>\r\n";
    }
    
    else {
      echo htmlspecialchars($nick)." zadal si nespravne heslo, alebo nick, alebo oboje :)<BR>&nbsp;<BR>\r\n";
      echo "<A HREF=\"site.php\"><B>KLIKNI SEM PRE NAVRAT</B></A><BR>&nbsp;<BR>\r\n";
    }

  }
  if ($nick && $pass){ login ($nick, $pass); }

?>

</CENTER>
</DIV>
