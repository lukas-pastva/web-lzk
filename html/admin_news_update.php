<?
  session_register('meno_uzivatela');
  session_register('stav');
  include_once ("definitions.php");
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
  <TITLE>UPRAVIT BLESKOVKU</TITLE>
 </HEAD>
<BODY>

<?

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

   $nr = $_GET["nr"];
   $nr = strip_tags($nr,'');

   if ( ($nr != null) ) {
      $updatovany_text_obj=mysql_query("select * from news where nr=".$nr."");
      if ($updatovany_text_obj != NULL ) $updatovany_text=mysql_fetch_array($updatovany_text_obj);

?>
<CENTER>
  <B>UPRAVIT BLESKOVKU</B><BR>&nbsp;<BR>
</CENTER>
<CENTER>
 <FORM ACTION="admin_news_update.php" METHOD="post">
   <INPUT TYPE="hidden" NAME="nr" VALUE="<? echo $updatovany_text['nr']; ?>">
   DATUM:<BR><INPUT TYPE="text" NAME="time" ID="time" VALUE="<? echo $updatovany_text['time']; ?>"><BR>&nbsp;<BR>
   TEXT:<BR><TEXTAREA NAME="text" COLS="20" ROWS="8"><? echo $updatovany_text['text']; ?></TEXTAREA><BR>&nbsp;<BR>
   <INPUT TYPE="submit" VALUE="Uprav spravu">
 </FORM>
 <BR><DIV CLASS="cursor" ONCLICK="window.close();"><B>ZATVORIT OKNO</B></DIV>
</CENTER>

<?
   }
   $nr = $_POST["nr"];
   $nr = strip_tags($nr,'');
   
   if ( $nr != null ) {
     $text = $_POST["text"];
     $text = strip_tags($text,'<b><u><i>');
     //$text = wordwrap($text, 18, "\r\n", 1);
     //$text = chunk_split($text, 18, "\r\n");

     $time = $_POST["time"];
     $time = strip_tags($time,'<b><u><i>');
     //$time = wordwrap($time, 16, "\r\n", 1);
     //$time = chunk_split($time, 16, "\r\n");

     $done = mysql_query("update news set time = '".$time."' , text = '".$text."' where nr ='".$nr."' ");
     if (!$done) { echo "error". mysql_error(); } else {
      echo "<CENTER>";
      echo "<BR><BR>Správa bola uspesne upravena.<BR>&nbsp;<BR>\r\n";
      echo "<DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><B><CENTER>ZATVOR OKNO</CENTER></B></DIV>";
      echo "</CENTER>";
     }
   } 

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
