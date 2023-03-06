<?
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
  <TITLE>VLOZIT DO NEWS:</TITLE>
 </HEAD>
<BODY>
<?

// -------------------------------------------------------------------------- //  
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

  $x = $_GET["x"];
  if ($x == "1") {

?>
<CENTER>
<B>Dolpnit BLESKOVKU</B><BR>&nbsp;<BR>
 <FORM ACTION="admin_news_insert.php" METHOD="post">
   DATUM:<BR><INPUT TYPE="text" NAME="time" ID="time"><BR>&nbsp;<BR>
   TEXT:<BR><TEXTAREA NAME="text" COLS="20" ROWS="8"></TEXTAREA><BR>&nbsp;<BR>
   <INPUT TYPE="submit" VALUE="Vloz spravu">
 </FORM>
</CENTER>
<?
  }
  
  $text = $_POST["text"];
  $text = strip_tags($text,'<b><u><i>');

  $time = $_POST["time"];
  $time = strip_tags($time,'<b><u><i>');

  //F-cia, ktora prijme formular a vlozi ho do tabulky news.
  function form ($text, $time){
  
    //$text = chunk_split($text, 18, "\r\n");
    //$time = chunk_split($time, 16, "\r\n");

    $vlozenie = mysql_query("insert into news (time, text) values ('".$time."', '".$text."')");
    if ($vlozenie == true) { 

      echo "<CENTER>\r\n";
      echo "Správa bola uspesne vlozena.<BR>&nbsp;<BR>\r\n";
      echo "<DIV CLASS=\"cursor\" ONCLICK=\"window.open('admin_news_insert.php?x=1', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=".ADMIN_NEWS_INSERT_W.",height=".ADMIN_NEWS_INSERT_H.",left=10,titlebar=1'); window.close();\"><B>Vloz dalsiu spravu<B></DIV><BR>\r\n";
      echo "</CENTER>";
      
    } else {
      echo "Chyba! : ".mysql_error();
    }
  }


  if ($text != null){
    form($text, $time); 
  }
  
  echo "\r\n<BR><CENTER><DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><B>ZATVOR OKNO</B></DIV></CENTER>\r\n";

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</BODY>
</HTML>
