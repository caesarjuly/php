<?php
	include 'utils.php';
	$list = array(
		"name" => "July",
		"sex"  => "male",
		"email" => "251138775@qq.com",
		"html" => "<p>That's array_walk</p>"
	);
	pt($list);
	array_walk($list, "addSth");
	function addSth(&$value, $key){
		$value = $value . " Yang";
		$value = strip_tags($value);
	}
	pt($list);
	