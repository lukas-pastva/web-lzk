<?
  session_register('meno_uzivatela');
  session_register('stav');
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
  <TITLE>UPDATOVAT FORUM:</TITLE>
 </HEAD>
<BODY>

<?

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

   $id = $_GET["id"];
   $id = strip_tags($id,'');

   if ( ($id != null) ) {
      $updatovany_text_obj=mysql_query("select * from forum where id=".$id."");
      if ($updatovany_text_obj != NULL ) $updatovany_text=mysql_fetch_array($updatovany_text_obj);

?>
<CENTER>
  <B>Editovat spravu fora.</B><BR>&nbsp;<BR>
</CENTER>
<CENTER>
 <FORM ACTION="admin_forum_update.php" METHOD="post">
   <INPUT TYPE="hidden" NAME="id" VALUE="<? echo $updatovany_text['id']; ?>">
  <!-- DATUM:<BR><INPUT TYPE="text" NAME="time" ID="time" VALUE="<? //echo date('j.n.Y G:i:s', ($updatovany_text['time'])); ?>"><BR>&nbsp;<BR>-->
   NICK:<BR><INPUT TYPE="text" NAME="nick" ID="nick" VALUE="<? echo $updatovany_text['nick']; ?>"><BR>&nbsp;<BR>
   IP:<BR><INPUT TYPE="text" NAME="ip" ID="ip" VALUE="<? echo $updatovany_text['ip']; ?>"><BR>&nbsp;<BR>
   TEXT:<BR><TEXTAREA NAME="text" COLS="30" ROWS="10"><? echo $updatovany_text['text']; ?></TEXTAREA><BR>&nbsp;<BR>
   <INPUT TYPE="submit">
 </FORM>
</CENTER>

<?
   }
   $id = $_POST["id"];
   $id = strip_tags($id,'');

   if ( $id != null ) {
   /*
     $time = $_POST["time"];
     $time = strip_tags($time,'<b><u><i>');
     //$time = wordwrap($time, 85, "\r\n", 1);
     //$time = chunk_split($time, 85, "\r\n");
   */
     $text = $_POST["text"];
     $text = strip_tags($text,'<b><u><i>');
     //$text = wordwrap($text, 85, "\r\n", 1);
     //$text = chunk_split($text, 85, "\r\n");

     $nick = $_POST["nick"];
     $nick = strip_tags($nick,'<b><u><i>');
     //$nick = wordwrap($nick, 18, "\r\n", 1);
     //$nick = chunk_split($nick, 18, "\r\n");
     
     $ip = $_POST["ip"];
     $ip = strip_tags($ip,'');
     //$ip = wordwrap($ip, 18, "\r\n", 1);
     //$ip = chunk_split($ip, 18, "\r\n");



     //time = '".$time."', 

     $done = mysql_query("update forum set nick = '".$nick."' , text = '".$text."', ip = '".$ip."' where id ='".$id."' ");
     if (!$done) { echo "error". mysql_error(); } else {
      echo "\r\n\t<CENTER>";
      echo "\r\n\t<BR><BR>Správa bola uspesne upravena.<BR>&nbsp;<BR>";

      echo "\r\n\t</CENTER>";
     }
   } 
      echo "\r\n\t<BR><DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><CENTER><B>ZATVOR OKNO</B></CENTER></DIV>";

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
