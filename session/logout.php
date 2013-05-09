<?php
	session_start();
	//store to test if they were logged in
	if(isset($_SESSION['valid_user'])){
		$old_user = $_SESSION['valid_user'];
		unset($_SESSION['valid_user']);
	}
	session_destroy();
?>
<html>
<body>
	<h1>Log out</h1>
	<?php
		if (isset($old_user)) {
			echo 'Logged out.<br>';
		}else{
			echo 'You were not logged in and so have not been logged out.<br>';
		}

	?>
	<a href="authmain.php">Back to main page.</a>
</body>
</html>