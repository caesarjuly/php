<?php
	$value1 = "Hello";
	$value2 = &$value1;
	$value2 = "Goodbye";
	echo "value1 = $value1, value2 = $value2";