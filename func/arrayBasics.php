<?php
	include 'utils.php';
	$list = range("C", "F");
	pt($list);
	echo is_array($list)? pt("TRUE"): pt("FALSE");
	array_unshift($list, "A", "B");
	pt($list);
	array_push($list, "G", "H");
	pt($list);
	array_shift($list);
	pt($list);
	array_pop($list);
	pt($list);
	in_array("C", $list)? pt("C is in the list"): pt("C is not in the list");
	
	$anotherList = array(
		"Delaware" => "December 7, 1787",
		"Pennsylvania" => "December 12, 1787",
		"Ohio" => "March 1, 1803"
	);
	array_key_exists("Ohio", $anotherList)? pt("Ohio is the key of anotherList"): pt("Ohio is not the key");
	$founded = array_search("December 7, 1787", $anotherList);
	if($founded){
		echo "$founded is founded on $anotherList[$founded]<br>";
	} else{
		echo "nothing is founded<br>";
	}
	pt(array_keys($anotherList));
	pt(array_values($anotherList));
	
	

	