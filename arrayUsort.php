<?php
	include 'utils.php';
	$dates = array("10-10-2003", "2-14-2002", "4-25-2005", "5-04-2001", "8-24-2007");
	
	echo "<p>Sorting the array using the sort() function:</p>";
	sort($dates);
	pt($dates);
	
	echo "<p>Sorting the array using the natsort() function:</p>";
	natsort($dates);
	pt($dates);
	
	function dateSort($a, $b){
		if($a == $b)
			return 0;
		
		list($amonth, $aday, $ayear) = explode("-", $a);
		list($bmonth, $bday, $byear) = explode("-", $b);
		
		//填充所有只有一位的日和月，用于最后的连接比较
		$amonth = str_pad($amonth, 2, "0", STR_PAD_LEFT);
		$bmonth = str_pad($bmonth, 2, "0", STR_PAD_LEFT);
		
		$aday = str_pad($aday, 2, "0", STR_PAD_LEFT);
		$bday = str_pad($bday, 2, "0", STR_PAD_LEFT);
		
		$adate = $ayear . $amonth . $aday;
		$bdate = $byear . $bmonth . $bday;
		
		return $adate > $bdate ? 1 : -1;
		
	}
	
	usort($dates, "dateSort");
	echo "<p>Sorting the array using the usort() function:</p>";
	pt($dates);