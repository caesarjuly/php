<?php
	$links = array("www.apress.com", "www.php.net", "www.apache.org");
	echo "<b>Online Resources</b>:<br>";
	foreach ($links as $link){
		echo "<a href = \"http://$link\">$link</a><br>";
	}
	$links1 = array(
		"The Apache Web Server" 	 => "www.apache.org",
		"Apress" 					 => "www.apress.com",
		"The PHP Scripting Language" => "www.php.net" 
	);
	
	echo "<b>Online Resources</b>:<br>";
	foreach ($links1 as $key => $value){
		echo "<a href = \"http://$value\">$key</a><br>";
	}