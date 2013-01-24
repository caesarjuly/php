<?php
	$colors = array("red", "blue", "green");
	list($red, $blue, $green) = $colors;
	
	function retrieveUserProfile(){
		$user[] = "July";
		$user[] = "251138775@qq.com";
		$user[] = "Chinese";
		return $user;
	}
	list($name, $email, $language) = retrieveUserProfile();
	echo "Name: $name, email: $email, language: $language";