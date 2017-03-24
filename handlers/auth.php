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
			$query = "SELECT id FROM staff WHERE email = '$email' and pwd = '$pwd'";
		break;
		case 'student':
			$query = "SELECT id FROM students WHERE email = '$email' and pwd = '$pwd'";
		break;
	}
	$res = mysql_query($query);

	if (mysql_num_rows($res) > 0) {
		session_start();
		$_SESSION['email'] = $email;
		$_SESSION['type'] = $validated['type'];
		echo '1';
		exit();
	} else{
		echo '0';
	}
	
?>