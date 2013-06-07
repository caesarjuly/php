<?php
	require_once 'bookmark_fns.php';
	do_html_header('Resetting password');

	//create short variable name
	$username = $_POST['username'];

	try {
		$password = reset_password($username);
		notify_password($username, $password);
		echo 'Your password has been emailed to you.<br>';
	} catch (Exception $e) {
		echo $e->getMessage().'<br>Your password could not be reset - please try again later.';
	}
	do_html_url('login.php', 'Login');
	do_html_footer();

?>