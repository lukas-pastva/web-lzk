<?php function f($x){

	$all_text = psw_mysql_query('select * from clanky where id = "'.$_REQUEST['id'].'"');

	if ($all_text->num_rows > 0) {
		while($sprava = $all_text->fetch_assoc()) {
			?>
<DIV CLASS="stranka">
	<DIV CLASS="clanok">
		<DIV CLASS="clanok_date">
		<?php echo date('d.m.Y', ($sprava['date']))."\n" ?>
		</DIV>
		<DIV CLASS="clanok_nadpis">
		<?php echo $sprava['nadpis']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_text">
		<?php echo $sprava['text_big']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_autor">
		<?php echo $sprava['autor']."\n" ?>
		</DIV>
		<DIV CLASS="clanok_pic">
		<?php
		// Write article image into web-accessible tmp directory (robustly)
		$webPath = 'tmp/obr' . $sprava['id'] . '.tmp';
		$diskPath = __DIR__ . '/' . $webPath;
		$dirPath = dirname($diskPath);
		if (!is_dir($dirPath)) {
		    @mkdir($dirPath, 0775, true);
		}
		$writeOk = @file_put_contents($diskPath, $sprava['pic'], LOCK_EX);
		if ($writeOk === false && !file_exists($diskPath)) {
		    echo "Chyba tvorby obrazka!";
		}
		?>
			<IMG SRC="<?php echo $webPath; ?>" ALT="&nbsp;&nbsp;&nbsp;LZK" BORDER="0"><BR>
		</DIV>
	</DIV>
	<BR>
</DIV>
		<?php

		
		
		        psw_mysql_query("UPDATE clanky SET precitane = '".($sprava['precitane']+1)."' WHERE id='".$sprava['id']."' ");

		}
	}

};
?>
