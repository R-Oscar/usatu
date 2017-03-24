<?php
	require_once('../functions.php');

	$validated = array();

	foreach($_POST as $key => $value)
	{
		$validated[$key] = test_input($value);

		if (strlen($validated[$key]) == 0 and $key != 'patronym') {
			echo 'Форма заполнена неверно';
			exit();
		}
	}
	$link = connector();

	if (!$link) {
		echo 'Ошибка соединения с БД';
		exit();
	}
	$email = $validated['email'];
	$pwd = $validated['pwd'];
	$query = '';
	switch ($validated['type']) {
		case 'tutor':
			$query = "SELECT access, email FROM staff WHERE email = '$email' and pwd = '$pwd' and authorized='1'";
		break;
		case 'student':
			$query = "SELECT access, email FROM students WHERE email = '$email' and pwd = '$pwd' and authorized='1'";
		break;
	}
	$res = mysql_query($query);
	while ($row = mysql_fetch_array($res, MYSQL_NUM)) {
		session_start();
		$_SESSION['type'] = $row[0];
		$_SESSION['email'] = $row[1];
		echo '1';
		exit();
	}

	echo '0';
	exit();
?>