<?php function f($x){

	$all_text = psw_mysql_query('select * from clanky where id = "'.$_REQUEST['id'].'"');

	if ($all_text->num_rows > 0) {
		while($sprava = $all_text->fetch_assoc()) {
			?>
<DIV CLASS="stranka">
	<DIV CLASS="clanok">
		<DIV CLASS="clanok_date">
		<? echo date('d.m.Y', ($sprava['date']))."\n" ?>
		</DIV>
		<DIV CLASS="clanok_nadpis">
		<? echo $sprava['nadpis']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_text">
		<? echo $sprava['text_big']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_autor">
		<? echo $sprava['autor']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_pic">
		<?
		$obr = "/tmp/obr".$sprava['id'].".tmp";

		$handle = fopen($obr, "w");
		if(! fwrite($handle, $sprava['pic'] ) ){echo "Chyba tvorby obrazka!";}
		fclose($handle);
		?>
			<IMG SRC="tmp/<? echo "obr".$sprava['id'].".tmp";?>" ALT="&nbsp;&nbsp;&nbsp;LZK" BORDER="0"><BR>
		</DIV>
	</DIV>
	<BR>
</DIV>
		<?

		
		
		        psw_mysql_query("UPDATE clanky SET precitane = '".($sprava['precitane']+1)."' WHERE id='".$sprava['id']."' ");

		}
	}

};
?>
