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
	$groupid = $validated['group_id'];
	$title = $validated['title'];
	$context = $validated['context'];
	$auth_id = $validated['author_id'];
	$d = date('Y-m-d H:i');
	$query = "INSERT INTO group_news (group_id, title, context, author_id, date) VALUES ('$groupid', ' $title', '$context', '$auth_id', '$d')";

	if (!mysql_query($query)) {
		echo 'Ошибка выполнения запроса';
		exit();
	}
	echo 1;
?>