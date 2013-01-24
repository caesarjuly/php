<?php
	$cost = 20.99;
	$tax  = 0.0575;
	
	function calculateCost(&$cost, $tax){
		$cost = $cost + ($cost * $tax);
		$tax += 4;
	}
	
	calculateCost($cost, $tax);
	//echo '$cost = ' . $cost . '<br>$tax = ' . $tax;
	printf("Tax is %01.2f%%<br>", $tax * 100);
	printf("Cost is: $%01.2f", $cost);