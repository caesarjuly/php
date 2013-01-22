<?php
	include 'utils.php';
	$anotherList = array(
		"Delaware" => "December 7, 1787",
		"Pennsylvania" => "December 12, 1787",
		"Ohio" => "March 1, 1803"
	);
	
	while($key = key($anotherList)){
		echo "The current key is: $key<br>";
		next($anotherList);
	}
	pt(reset($anotherList));
	pt(next($anotherList));
	pt(prev($anotherList));
	
	while($current = current($anotherList)){
		echo "The current is: $current<br>";
		next($anotherList);
	}
	pt(end($anotherList));
	pt(each($anotherList));
	pt(reset($anotherList));
	while($current = each($anotherList)){
		pt($current);
	}