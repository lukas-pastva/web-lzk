<?php
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
  <TITLE>W.E.N.O. C.R.E.W.</TITLE>
 </HEAD>
<BODY>
<CENTER>
<?php
// -------------------------------------------------------------------------- //
  if ( ( $_SESSION['typ_uzivatela'] == "admin" ) || ( $_SESSION['typ_uzivatela'] == "moderator" )  ) {
// -------------------------------------------------------------------------- //

  $tabulka = $_GET["x"];
  $tabulka = strip_tags($tabulka,'');
  $stlpec  = $_GET["y"];
  $stlpec = strip_tags($stlpec,'');
  $hodnota = $_GET["z"];
  $hodnota = strip_tags($hodnota,'');
  $hard = $_GET["hard"];
  $hard = strip_tags($hard,'');


    function delete_from_db($tabulka, $stlpec, $hodnota, $hard){
    ?>
      <CENTER>
      <BR><BR>SKUTOCNE CHCETE ODSTRANIT ZAZNAM?<BR><BR>
      <SPAN CLASS="cursor" ONCLICK="window.open('admin_delete_from_db.php?x=<?php echo $tabulka; ?>&amp;y=<?php echo $stlpec; ?>&amp;z=<?php echo $hodnota; ?>&amp;hard=1', '', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=300,height=320,left=10,titlebar=1'); window.close();"><B>ANO</B></SPAN>
      &nbsp;&nbsp;&nbsp;
      <SPAN CLASS="cursor" ONCLICK="window.close();"><B>NIE</B></SPAN>
      </CENTER>
    <?php    
    }

    //f-cia, ktora vymaze z databazy s menom tabulky, menom co vymazat
    function delete_from_db_hard($tabulka, $stlpec, $hodnota){
    
      $delete=mysql_query("delete from ".$tabulka." where ".$stlpec." = ".$hodnota."");
      if (!$delete) { echo "error ". mysql_error(); } 
      else {
        echo "\r\n\t<BR><BR>Zaznam bol uspesne odstraneny.<BR>";
        echo "\r\n\t<BR><DIV CLASS=\"cursor\" ONCLICK=\"window.close();\"><B>ZATVOR OKNO</B></DIV>";
      }
    }
    
    if ($hard == "1") { delete_from_db_hard($tabulka, $stlpec, $hodnota); }
    if ($hard != "1") { delete_from_db($tabulka, $stlpec, $hodnota, $hard); }

// -------------------------------------------------------------------------- //
  } else { echo "Na tuto stranku nemate opravneny pristup"; }
// -------------------------------------------------------------------------- //

?>
</CENTER>
</BODY>
</HTML>
