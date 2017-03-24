<?php
	function test_input($data) {
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	function connector() {
		$host = 'localhost';
		$uname = 'root';
		$pwd = '';
		$db = 'kaf';
		
		$link = mysql_connect($host, $uname, $pwd);
		mysql_select_db($db);

		return $link;
	}

	function is_tutor() {
		return $_SESSION['type'] == 'tutor';
	}
?>