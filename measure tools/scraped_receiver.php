<?php
	$fp = fopen ("scrapedData.txt", "a") or die("can't open file");
	fputs ($fp, $_POST['str'].PHP_EOL);
	fclose ($fp);
?>