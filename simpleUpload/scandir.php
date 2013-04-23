<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Scan Directories</title>
</head>
<body>
	<h1>Browsing</h1>
	<?php
		$current_dir = 'upload/';
		$files1 = scandir($current_dir);
		$files2 = scandir($current_dir, 1);

		echo "<p>Upload directory is $current_dir</p>";
		echo '<p>Directory Listing in alphabetical order, ascending:</p><ul>';

		foreach ($files1 as $file) {
			if ($file != '.' && $file != '..') {
				$file = iconv('GB2312', 'UTF-8', $file);
				echo "<li>$file</li>";
			}
		}
		echo '</ul>';

		echo "<p>Upload directory is $current_dir";
		echo '<p>Directory Listing in alphabetical, descending:</p><ul>';

		foreach ($files2 as $file) {
			if ($file != '.' && $file != '..') {
				$file = iconv('GB2312', 'UTF-8', $file);
				echo "<li>$file</li>";
			}
		}

		echo '</ul>';
		echo dirname($current_dir).'<br>';
		echo basename($current_dir);
	?>
</body>
</html>