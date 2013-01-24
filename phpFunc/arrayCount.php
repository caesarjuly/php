<?php
	include 'utils.php';
	$garden = array("cabbage", "peppers", "turnips", "carrots");
	eh(count($garden));
	
	$locations = array("Italy", "Amsterdam", array("Boston", "Des Moines"), "Miami");
	eh(count($locations, 1));
	
	$states = array("Ohio", "Iowa", "Arizona", "Iowa", "Ohio");
	$statesFrequency = array_count_values($states);
	pt($statesFrequency);
	
	$states = array("Ohio", "Iowa", "Arizona", "Iowa", "Ohio");
	$uniqueStates = array_unique($states);
	pt($uniqueStates);