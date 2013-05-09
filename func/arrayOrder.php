<?php 
	include 'utils.php';
	$states = array("Delaware", "Pennsylvania", "New Jersey");
	pt(array_reverse($states));
	pt(array_reverse($states, 1));
	
	pt(array_flip($states));
	
	$grades = array(42, 98, 45, 100, 89);
	sort($grades);
	pt($grades);
	asort($states);
	pt($states);
	rsort($grades);
	pt($grades);
	arsort($states);
	pt($states);
	
	