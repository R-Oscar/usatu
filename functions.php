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
		return $_SESSION['type'] = 'adm'
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

	function get_students() {
		$link = connector();
		$query = 'SELECT * FROM `students`';
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
		}
		return $array;
	}

	function get_my_group() {
		$link = connector();
		$query = 'SELECT * FROM `students`';
		$res = mysql_query($query);
		//
		return true;
	}
?>