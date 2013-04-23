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
		$dir = dir($current_dir);

		echo "<p>Handle is $dir->handle</p>";
		echo "<p>Upload directory is $dir->path</p>";
		echo '<p>Directory Listing:</p><ul>';

		while(false !== ($file = $dir->read())){
			if ($file != '.' && $file != '..') {
				$file = iconv('GB2312', 'UTF-8', $file);
				echo "<li>$file</li>";
			}
		}
		echo '</ul>';
		$dir->close();

	?>
</body>
</html>