<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Browse Directories</title>
</head>
<body>
	<h1>Browsing</h1>
	<?php
		$current_dir = 'upload';
		$dir = opendir($current_dir);

		echo "<p>Upload directory is $current_dir</p>";
		echo '<p>Directory Listing:</p><ul>';

		while(false !== ($file = readdir($dir))){
			if ($file != '.' && $file != '..') {
				$file = iconv('GB2312', 'UTF-8', $file);
				echo "<li>$file</li>";
			}
		}
		echo '</ul>';
		closedir($dir);

	?>
</body>
</html>