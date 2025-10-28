<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<STYLE TYPE="text/css">
body {
	background-color: #C0C0C0;
}
</STYLE>
<LINK REL="stylesheet" TYPE="text/css" HREF="style.css">
<META HTTP-EQUIV="Content-Type"
	CONTENT="text/html; charset=windows-1250">
<TITLE>viewer</TITLE>
</HEAD>
<BODY>


  <?php
$sub_class = $_GET["sub_class"];
$order_by = $_GET["order_by"];
$id = $_GET["id"];

if ($order_by == 1) {
    $order = "author ASC";
}
if ($order_by == 2) {
    $order = "author DESC";
}
if ($order_by == 3) {
    $order = "date ASC";
}
if ($order_by == 4) {
    $order = "date DESC";
}

include_once ("definitions.php");

?>

  <TABLE ALIGN="center" BORDER="1">
   <?php

$all_text = psw_mysql_query("SELECT * FROM pictures WHERE id = '" . $id . "' ");

if ($all_text->num_rows > 0) {
    while ($vytiahnutie = $all_text->fetch_assoc()) {

        ?>
   <TR>
			<TD ALIGN="center"><B><?php echo $vytiahnutie["author"];  ?></B><BR>
     <?php echo $vytiahnutie["description"];  ?>
    </TD>
		</TR>
		<TR>
			<TD ALIGN="center"><IMG
				SRC="<?php echo $vytiahnutie["destination"].$vytiahnutie["name"]; ?>"
				BORDER="0" ALT="<?php echo $vytiahnutie["author"]; ?>"
				TITLE="<?php echo $vytiahnutie["author"]; ?>"></TD>
		</TR>
		<TR>
			<TD ALIGN="center">
     <?php
    }
}

$all_text = psw_mysql_query("SELECT * FROM pictures WHERE sub_class = '" . $sub_class . "' ORDER BY " . $order . " ");

if ($all_text->num_rows > 0) {
    while ($vyber = $all_text->fetch_assoc()) {

        $pole[$i] = $vyber['id'];
        if ($vyber['id'] == $id) {
            echo "\r\n\t<A HREF=\"\" ONCLICK=\"window.open('viewer.php?sub_class=" . $sub_class . "&amp;order_by=" . $order_by . "&amp;id=" . $vyber['id'] . "', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0'), window.close()\" TITLE=\"Obrazok s poradovym cislo " . ($i + 1) . ".\"><SPAN CLASS=\"small\"><B>" . ($i + 1) . "</B></SPAN></A>";
        } else {
            echo "\r\n\t<A HREF=\"\" ONCLICK=\"window.open('viewer.php?sub_class=" . $sub_class . "&amp;order_by=" . $order_by . "&amp;id=" . $vyber['id'] . "', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0'), window.close()\" TITLE=\"Obrazok s poradovym cislo " . ($i + 1) . ".\"><SPAN CLASS=\"small\">" . ($i + 1) . "</SPAN></A>";
        }
        $i ++;
    }
}
?>
    </TD>
		</TR>


	</TABLE>

	<DIV CLASS="viewer_ovl">

    <?php

    $previous = null;
    $actual;
    $next = null;

    for ($j = 0; $j < count($pole); $j ++) {
        if ($pole[$j] == $id) {
            $actual = $j;
        }
    }

    if ($actual > 0) {
        $previous = $pole[$actual - 1];
    }

    if ($actual < count($pole)) {
        $next = $pole[$actual + 1];
    }

    if ($previous != null) {
        echo "<IMG ONCLICK=\"window.open('viewer.php?sub_class=" . $sub_class . "&amp;order_by=" . $order_by . "&amp;id=" . $previous . "', '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0'), window.close()\" SRC=\"pics/viewer/leftarrow.gif\" HEIGHT=\"25\" BORDER=\"0\" ALT=\"previous\" TITLE=\"previous\">\r\n";
    }

    if ($next != null) {
        echo "<IMG ONCLICK=\"window.open('viewer.php?sub_class=" . $sub_class . "&amp;order_by=" . $order_by . "&amp;id=" . $next . "',     '_blank', 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=0,width=1000,height=600,left=10,titlebar=0'), window.close()\" SRC=\"pics/viewer/rightarrow.gif\" HEIGHT=\"25\" BORDER=\"0\" ALT=\"next\"    TITLE=\"next\">\r\n";
    }
    ?> 
  
  </DIV>

</BODY>
</HTML>
