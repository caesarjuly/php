<?php
	$users = fopen("users.txt", "r");
	
	while($line = fgets($users, 4096)){
		list($name, $sport, $music) = explode("|", $line);
		echo "Name :$name, Sport: $sport, Music : $music<br>";
	}
	fclose($users);