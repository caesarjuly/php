<?php
	//check values
	$button_text = $_REQUEST['button_text'];
	$color = $_REQUEST['color'];

	if (empty($button_text) || empty($color)) {
		echo 'Could not create image - form not filled out correctly';
		exit;
	}

	//start create image
	$im = imagecreatefrompng(filename)
	imagettfbbox(size, angle, fontfile, text);

	//because no pictures available ,code is not completed.
?>