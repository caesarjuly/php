<?php
	require_once 'db_fns.php';
	
	function add_bm($new_url)
	{
		//Add new bookmark to the database

		echo "Attempting to add ".htmlspecialchars($new_url)."<br>";
		$valid_user = $_SESSION['valid_user'];

		$conn = db_connect();

		//check if bookmark already exists
		$result = $conn->query("SELECT * FROM bookmark WHERE username = '$valid_user' AND bm_URL = '$new_url'");
		if($result && ($result->num_rows>0)){
			throw new Exception('Bookmark already exists.');
			
		}

		//insert the new bookmark
		if (!$conn->query("INSERT INTO bookmark VALUES ('$valid_user', '$new_url')")) {
			throw new Exception('Bookmark could not be inserted');
			
		}

		return true;
	}

	function get_user_urls($username)
	{
		//extract from the database all the URLS this user has stored

		$conn = db_connect();
		$result = $conn->query("SELECT bm_URL FROM bookmark WHERE username = '$username'");
		if (!$result) {
			return false;
		}

		//create an array of the URLS
		$url_array = array();
		for ($count=1; $row=$result->fetch_row(); $count++) { 
			$url_array[$count] = $row[0];
		}

		return $url_array;
	}

	function delete_bm($user, $url)
	{
		//delete one URL from the database
		$conn = db_connect();

		//delete the bookmark
		if (!$conn->query("DELETE FROM bookmark WHERE username = '$user' AND bm_url = '$url'")) {
			throw new Exception('Bookmark could not be deleted');
			
		}

		return true;
	}

	function recommend_urls($valid_user, $popularity = 1)
	{
		//We will provide semi intelligent recommendations to people
		//If they have an URL in common with other users, they may like 
		//other URLs that these people like
		$conn = db_connect();

		//find other matching users
		//with an url same as you
		//as a simple way of excluding people's private pages, and
		//increasing the chance of recommending applealing URLs, we
		//specify a minimum popularity level
		//if $popularity = 1, then more than one person must have an 
		//URL before we will recommend it

		$query = "SELECT bm_URL
				FROM bookmark
				WHERE username IN
					(SELECT DISTINCT(b2.username)
					FROM bookmark b1, bookmark b2
					WHERE b1.username = '$valid_user'
					AND b2.username != b1.username
					AND b1.bm_URL = b2.bm_URL)
				AND bm_URL not in
					(SELECT bm_URL
					FROM bookmark
					WHERE username = '$valid_user')
				GROUP BY bm_URL
				HAVING COUNT(bm_URL)>'$popularity'";

		if (!($result = $conn->query($query))) {
			throw new Exception('SQL failed.');
			
		}
		if ($result->num_rows==0) {
			throw new Exception('Could not find any bookmarks to recommend.');
			
		}

		$urls = array();
		//build an array of the relevant urls
		for($count=0; $row = $result->fetch_object(); $count++){
			$urls[$count] = $row->bm_URL;
		}
		return $urls;
	}
?>