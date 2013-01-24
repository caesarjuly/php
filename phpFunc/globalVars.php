<?php
	$somevar = 15;
	
	function addit(){
		GLOBAL $somevar; //Same as $GLOBAL["somevar"];
		$somevar++;
		echo "Somevar is $somevar";
	}
	
	addit();