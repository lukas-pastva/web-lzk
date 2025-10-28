<?php
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
  <TITLE>VLOZIT DO FORUM:</TITLE>
 </HEAD>
<BODY>
<?php

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

  $x = $_GET["x"];
  if ($x == "1") {

?>
<CENTER><B>Dolpnit spavu do FORA</B><BR>&nbsp;<BR></CENTER>
<CENTER>
 <FORM ACTION="admin_forum_insert.php" METHOD="post">
   NICK:<BR><INPUT TYPE="text" NAME="nick" ID="time"><BR>&nbsp;<BR>
   TEXT:<BR><TEXTAREA NAME="text" COLS="30" ROWS="10"></TEXTAREA><BR>&nbsp;<BR>
   <INPUT TYPE="submit">
 </FORM>
</CENTER>
<?php
  }
  
  $nick = $_POST["nick"];
  $nick = strip_tags($nick,'<b><u><i>');
  //$nick = wordwrap($nick, 18, "\r\n", 1);
  $nick = chunk_split($nick, 18, "\r\n");

  $text = $_POST["text"];
  $text = strip_tags($text,'<b><u><i>');
  //$text = wordwrap($text, 85, "\r\n", 1); 

  $ip = $_SERVER["REMOTE_ADDR"];
  $time = time();

  //Funkcia, ktora zapise prispevok do databazy.
  function zapisForum($time, $nick, $text, $ip){

    $text = chunk_split($text, 85, "\r\n");
    
    $vlozenie = mysql_query("insert into forum (time, nick, text, ip) values (".$time.",'".$nick."', '".$text."', '".$ip."')");
    if ($vlozenie == true) {
      echo "<CENTER>\r\n";
      echo "<BR><BR>Sprava bola uspesne vlozena.<BR>&nbsp;<BR>\r\n";
      echo "<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_forum_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_FORUM_INSERT_W.",height=".ADMIN_FORUM_INSERT_H.",left=10,titlebar=1'); window.close();\"><B>Zadaj dalsiu spravu<B></DIV><BR>\r\n";
      echo "</CENTER>";
    } else{
      echo "Chyba! : ".mysql_error();
    }
  }
  
  if ($text != null){ 
    zapisForum($time, $nick, $text, $ip); 
  }
  
  echo "\r\n<BR><CENTER><DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><B>ZATVOR OKNO</B></DIV></CENTER>\r\n";

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
