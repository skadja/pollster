<?php
	$vote = $_REQUEST['vote'];

	//get content of textfile
	$filename = "votes.txt";
	$content = file($filename);

	//put content in array
	$array = explode("||", $content[0]);
	$option1 = $array[0];
	$option2 = $array[1];

	if ($vote == 'option1') {
		$option1 = $option1 + 1;
	}
	if ($vote == 'option2') {
		$option2 = $option2 + 1;
	}

	$totalvote = $option1 + $option2;

	//insert votes to txt file
	$insertvote = $option1."||".$option2;
	$fp = fopen($filename,"w");
	fputs($fp,$insertvote);
	fclose($fp);

?>

<div id="has-voted" class="alert alert-success m-0 rounded-0 text-center d-none">
	<div class="d-flex align-items-center justify-content-center">
		<span class="fa-stack fa-lg mr-2">
			<i class="fas fa-circle fa-stack-2x text-white"></i>
			<i class="fas fa-check text-success fa-stack-1x fa-inverse"></i>
		</span>
		<div>
			Your vote has been registered!
		</div>
	</div>
</div>

<div class="mt-5">
	<?php if ($totalvote == 0) { ?>
		<canvas id="pollResults" class="d-none" width="300" height="300"></canvas>
		<span class="fa-stack fa-4x">
			<i class="fas fa-circle fa-stack-2x text-muted"></i>
			<i class="fas fa-chart-area fa-stack-1x fa-inverse"></i>
		</span>
		<div class="mt-3 mb-5 text-center">
			<div class="fa-lg font-montserrat">No registered votes yet.</div>
		</div>
	<?php } else { ?>
		<div id="canvas-wrap" class="mx-auto">
			<canvas id="pollResults" width="300" height="300"></canvas>
		</div>
		<div class="my-5 text-center">
			<div class="font-size-xxlg font-open-sans"><?php echo number_format($totalvote); ?></div>
			<div class="font-montserrat mt-2">Total votes</div>
		</div>
	<?php } ?>
</div>

<div class="py-4 border-top box-shadow-top">
	<div class="text-center py-2">
		<a class="toggle-results font-montserrat text-inherit py-3" href="javascript:void(0);">
			<i class="fas fa-chevron-circle-left fa-lg mr-1"></i> Back
		</a>
	</div>
</div>
