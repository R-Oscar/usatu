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

	function is_admin() {
		return $_SESSION['type'] == 'adm';
	}

	function is_moder() {
		return $_SESSION['type'] == 'mod';
	}

	function is_tutor() {
		return $_SESSION['type'] == 'tut';
	}

	function is_student() {
		return $_SESSION['type'] == 'std';
	}

	function is_logged() {
		return strlen($_SESSION['email']) > 0;
	}

	function get_groups() {
		$link = connector();
		$query = 'SELECT name FROM `groups`';
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row['name']);
		}
		return $array;
	}

	function get_students($group) {
		$link = connector();
		$query = "SELECT * FROM `students` WHERE sgroup = '$group'";
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
		}
		return $array;
	}

	function get_my_group() {
		$link = connector();
		$email = $_SESSION['email'];
		$query = "SELECT sgroup FROM `students` WHERE email = '$email'";
		$res = mysql_query($query);
		$array = mysql_fetch_assoc($res);
		if ($array) return $array['sgroup'];
		return $array;
	}

	function get_group_news($group){
		$link = connector();
		$query = "SELECT * FROM `group_news` WHERE group_id = '$group'";
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
		}
		return $array;
	}
?>