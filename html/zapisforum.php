<DIV CLASS="zapisForum">


	<FORM ACTION="site.php?x=31" METHOD="post">
		<FIELDSET>
			<LEGEND>Posli spravu!</LEGEND>
			<B>Nick:</B><BR> <INPUT TYPE="text" NAME="nick" ID="nick" SIZE="26"
				MAXLENGTH="20"><BR> <B>.:Text Spravy:.</B><BR>
			<TEXTAREA NAME="text" cols="45" ROWS="10"></TEXTAREA>
     <? //<FORM ACTION="site.php?x=31" METHOD="post"><INPUT TYPE="hidden" NAME="prepni" VALUE="prepni"><INPUT TYPE="submit" VALUE="Spat na forum"></FORM> ?>
     <INPUT TYPE="submit"
				VALUE="         --->    Odoslat     <---         ">
		</FIELDSET>
	</FORM>

  
<?

function f($dir)
{}

$nick = $_POST["nick"];
$nick = strip_tags($nick, '<b><u><i>');
// $nick = chunk_split($nick, 18, "\r\n");

$text = $_POST["text"];
$text = strip_tags($text, '<b><u><i>');

$ip = $_SERVER["REMOTE_ADDR"];
$time = time();

// Funkcia, ktora zapise prispevok do databazy.
function zapisForum($time, $nick, $text, $ip)
{

    // $text = chunk_split($text, 85, "\r\n");
    include_once("definitions.php");

    $vlozenie = psw_mysql_query("insert into forum (time, nick, text, ip) values (" . $time . ",'" . $nick . "', '" . $text . "', '" . $ip . "')");
    header("Location: site.php?x=30");
}

if ($text != null) {
    zapisForum($time, $nick, $text, $ip);
}
?>

<?
$prepni = $_POST["prepni"];
$prepni = strip_tags($prepni, '');

if ($prepni == "prepni") {
    header("Location: site.php?x=30");
}
?>

</DIV>

