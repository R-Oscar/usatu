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

	$query = '';

	switch ($validated['type']) {
		case 'student':
			$query = 'SELECT * FROM `students` WHERE `email`=' . '"' . $validated['email'] .'"';
			$res = mysql_query($query);
			if (!$res) {
				echo 'Ошибка выполнения запроса';
				exit();
			}

			if (mysql_num_rows($res) > 0) {
				echo 'Пользователь с таким email уже существует';
				exit();
			}

			$query = 'INSERT INTO `students`(`email`, `pwd`, `fname`, `lname`, `patronym`, `access`, `sgroup`) VALUES ("' . $validated['email'] .'", "' . $validated['pwd'] . '", "' . $validated['fname'] . '", "' . $validated['lname'] . '", "' . $validated['patronym'] . '", "0000", "' . $validated['group'] . '")';

			if (!mysql_query($query)) {
				echo 'Ошибка выполнения запроса';
				exit();
			}

			echo 1;
			break;

		case 'tutor':
			$query = 'SELECT * FROM `staff` WHERE `email`=' . '"' . $validated['email'] .'"';
			$res = mysql_query($query);
			if (!$res) {
				echo 'Ошибка выполнения запроса';
				exit();
			}

			if (mysql_num_rows($res) > 0) {
				echo 'Пользователь с таким email уже существует';
				exit();
			}

			$query = 'INSERT INTO `staff`(`email`, `fname`, `lname`, `patronym`, `pwd`, `access`, `degree`) VALUES ("' . $validated['email'] .'", "' . $validated['fname'] .'", "' . $validated['lname'] .'", "' . $validated['patronym'] .'", "' . $validated['pwd'] .'", "0000", "' . $validated['degree'] .'")';

			if (!mysql_query($query)) {
				echo 'Ошибка выполнения запроса';
				exit();
			}

			echo 1;
			break;
	}

	$query = 'INSERT INTO `ost-users`(`login`, `pwd`) VALUES ("' . $login . '", "' . $password . '")';

	// var_dump($validated);
	// var_dump($result);
?>