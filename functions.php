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
		$query = 'SELECT * FROM `groups`';
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
		}
		return $array;
	}

	function get_degrees() {
		$link = connector();
		$query = 'SELECT * FROM `degrees`';
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
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
		if ($group == -1){
			$query = "SELECT group_news.date, group_news.title, group_news.context, staff.fname, staff.lname FROM group_news INNER JOIN staff ON group_news.author_id = staff.id";
		} else {
			$query = "SELECT group_news.date, group_news.title, group_news.context, staff.fname, staff.lname FROM group_news INNER JOIN staff ON group_news.author_id = staff.id WHERE group_news.group_id = '$group'";
		}
		$res = mysql_query($query);
		$array = array();
		while(($row = mysql_fetch_assoc($res))) {
    		array_push($array, $row);
		}
		return $array;
	}

	function get_group($group_id) {
		$link = connector();
		$query = "SELECT name FROM `groups` WHERE id = '$group_id'";
		$res = mysql_query($query);
		$array = mysql_fetch_assoc($res);
		if ($array) return $array['name'];
		return $array;
	}

	function get_degree_title($degree_id) {
		$link = connector();
		$query = "SELECT title FROM `degrees` WHERE id = '$degree_id'";
		$res = mysql_query($query);
		$array = mysql_fetch_assoc($res);
		if ($array) return $array['title'];
		return $array;
	}
?>