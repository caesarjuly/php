<?php
	session_start();

	if (isset($_POST['userid']) && isset($_POST['password'])) {
		//if the user has just tried to log in
		$userid = $_POST['userid'];
		$password = $_POST['password'];

		$db_conn = new mysqli('localhost', 'root', '', 'auth');

		if (mysqli_connect_errno()) {
			echo 'Connection to database failed :'.mysqli_connect_errno();
			exit();
		}

		$query = 'SELECT * FROM authorized_users '
				."WHERE NAME = '$userid' "
				."AND PASSWORD = '$password'";
		$result = $db_conn->query($query);
		if ($result->num_rows) {
			$_SESSION['valid_user'] = $userid;
		}
		$db_conn->close();
	}
?>
<html>
<body>
<h1>Home page</h1>
<?php
	if (isset($_SESSION['valid_user'])) {
		echo 'You are logged in as :'.$_SESSION['valid_user'].'<br>';
		echo '<a href="logout.php">Log out</a><br>';
	}else{
		if(isset($userid)){
			echo 'Could not log you in';		
		}else{
			echo 'You are not logged in';
		}
?>
<form method="post" action="authmain.php">
	Userid:<input type="text" name="userid"><br>
	Password:<input type="password" name="password"><br>
	<input type="submit" value="Log in">
</form>
<?php
	}
?>

</body>
</html>