<?php
	/*
	Database query to get poll info
	 */
	
	//get vote from form
	$vote = $_REQUEST['vote'];

	//log in to database
	if (!$db_conn = new mysqli('localhost', 'poll', 'poll', 'poll')) {
		echo "Could not connect to database<br>";
		exit;
	}

	if (!empty($vote)) {
		$vote = addslashes($vote);
		$query = "update poll_results set num_votes = num_votes + 1 where candidate = '$vote'";
		if (!($result = @$db_conn->query($query))) {
			echo "Could not connect to db<br>";
			exit;
		}
	}

	//get current results of poll
	$query = 'select * from poll_results';
	if (!($result = @$db_conn->query($query))) {
		echo 'Could not connect to db<br>';
		exit;
	}
	$num_candidates = $result->num_rows;
	//caculate total number of votes
	$total_votes = 0;
	while ($row = $result->fetch_object()) {
		$total_votes += $row->num_votes;
	}
	//reset result pointer
	$result->data_seek(0);

	/*
	Initial calculations for graph
	 */
	//set up constants
	$width = 500;
	$left_margin = 50;
	$right_margin = 50;
	$bar_height = 40;
	$bar_spacing = $bar_height/2;
	$font = 'c:/windows/fonts/arial.ttf';
	$title_size = 16;
	$main_size = 12;
	$small_size = 12;
	$text_indent = 10;

	//set up initial point to draw from
	$x = $left_margin + 60;
	$y = 50;
	$bar_unit = ($width-($x+$right_margin))/100;

	//caculate height
	$height = $num_candidates*($bar_height + $bar_spacing) + 50;

	/*
	set up base image
	 */
	//create a blank canvas
	$im = imagecreatetruecolor($width, $height);

	//allocate colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$blue = imagecolorallocate($im, 0, 64, 128);
	$black = imagecolorallocate($im, 0, 0, 0);
	$pink = imagecolorallocate($im, 255, 78, 243);

	$text_color = $black;
	$percent_color = $black;
	$bg_color = $white;
	$line_color = $black;
	$bar_color = $blue;
	$number_color = $pink;

	//create canvas to draw
	imagefilledrectangle($im, 0, 0, $width, $height, $bg_color);

	//draw outline around canvas
	imagerectangle($im, 0, 0, $width-1, $height-1, $line_color);

	//add title
	$title = 'Poll Results';
	$title_dimensions = imagettfbbox($title_size, 0, $font, $title);
	$title_length = $title_dimensions[2] - $title_dimensions[0];
	$title_height = abs($title_dimensions[7] - $title_dimensions[0]);
	$title_above_line = abs($title_dimensions[7]);
	$title_x = ($width - $title_length)/2;
	$title_y = ($y - $title_height)/2 + $title_above_line;
	imagettftext($im, $title_size, 0, $title_x, $title_y, $text_color, $font, $title);

	//draw a base line
	imageline($im, $x, $y-5, $x, $height-15, $line_color);

	/*
	Draw data into graph
	 */
	//get each line of db data and draw bars
	while ($row = $result->fetch_object()) {
		if ($total_votes>0) {
			$percent = intval(($row->num_votes/$total_votes)*100);
		} else {
			$percent = 0;
		}
		
		//display percent for this value
		$percent_dimensions = imagettfbbox($main_size, 0, $font, $percent.'%');
		$percent_length = $percent_dimensions[2] - $percent_dimensions[0];
		imagettftext($im, $main_size, 0, $width-$percent_length-$text_indent, $y+($bar_height/2), $percent_color, $font, $percent.'%');

		//length of bar for this value
		$bar_length = $x + ($percent * $bar_unit);

		//draw bar for this value
		imagefilledrectangle($im, $x, $y-2, $bar_length, $y+$bar_height, $bar_color);

		//draw title for this value
		imagettftext($im, $main_size, 0, $text_indent, $y+($bar_height/2), $text_color, $font, "$row->candidate");

		//draw outline showing 100%
		imagerectangle($im, $bar_length+1, $y-2, ($x+(100*$bar_unit)), $y+$bar_height, $line_color);

		//display numbers
		imagettftext($im, $small_size, 0, $x+(100*$bar_unit)-50, $y+($bar_height/2), $number_color, $font, $row->num_votes.'/'.$total_votes);

		//move down to next bar
		$y += $bar_height + $bar_spacing;


	}
	/*
	Display image
	 */
	header('Content-type: image/png');
	imagepng($im);

	/*
	clean up
	 */
	imagedestroy($im);




?>