<?php

	//get content of textfile
	$filename = "votes.txt";
	$content = file($filename);

	//put content in array
	$array = explode("||", $content[0]);
	$option1 = $array[0];
	$option2 = $array[1];

	// reset values
	$option1 = 0;
	$option2 = 0;

	//insert votes to txt file
	$insertvote = $option1."||".$option2;
	$fp = fopen($filename,"w");
	fputs($fp,$insertvote);
	fclose($fp);

	//echo 'cleared';

?>
