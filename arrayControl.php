<?php
	include 'utils.php';
	
	//merge
	$first = array("A", "B", "C", "D");
	$second = array("1", "2", "3", "5", "9");
	$merge = array_merge($first, $second);
	pt($merge);
	
	//merge_recursive
	$class1 = array(
		"John" => 100,
		"James" => 85
	);
	$class2 = array(
		"Micky" => 78,
		"John" => 76
	);
	$class3 = array_merge_recursive($class1, $class2);
	pt($class3);
	eh(count($class3));
	
	//combine
	$abbreviations = array("AL", "AK", "AZ", "AR");
	$states = array("Albama", "Alaska", "Arizona", "Arkansas");
	$stateMap = array_combine($abbreviations, $states);
	pt($stateMap);
	
	//
	