<html>
<head>
	<title>Uploading</title>
</head>
<body>
	<h1>Uploading file...</h1>
	<?php
		//check common errors
		if ($_FILES['userfile']['error'] > 0) {
			echo 'Problem<br>';
			switch ($_FILES['userfile']['error']) {
				case '1':
					echo 'File exceeded upload_max_filesize';
					break;
				case '2':
					echo 'File exceeded max_file_size';
					break;
				case '3':
					echo 'File only partially uploaded';
					break;
				case '4':
					echo 'No file uploaded';
					break;
				case '6':
					echo 'Cannot upload file:No temp directory specified';
					break;
				case '7':
					echo 'Upload failed: Cannot write to disk';
					break;
				default:
					break;
			}
			exit;
		}

		//check the MIME type
		if ($_FILES['userfile']['type'] != 'text/plain') {
			echo 'Problem: File is not plain text';
			exit;
		}

		//put the file
		$upfile = 'upload/'.$_FILES['userfile']['name'];

		if (is_uploaded_file($_FILES['userfile']['tmp_name'])){
			if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile)) {
				echo 'Problem: Could not move file to destination directory';
				exit;
			}
		}
		else{
			echo 'Problem: Possible file upload attack.Filename:';
			echo $_FILES['userfile']['name'];
			exit;
		}

		echo 'File uploaded successfully<br>';

		//remove possible HTML and PHP tags from the file's contents
		$contents = file_get_contents($upfile);
		$contents = strip_tags($contents);
		file_put_contents($_FILES['userfile']['name'], $contents);

		//show what was uploaded
		echo '<p>Previw of uploaded file contents:<br><hr>';
		echo nl2br($contents);
		echo '<br><hr>';
	?>
</body>
</html>