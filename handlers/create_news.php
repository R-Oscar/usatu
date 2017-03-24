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

    $query = 'INSERT INTO `group_news`(`group_id`, `title`, `context`) VALUES ("' . $validated['group_id'] .'", "' . $validated['title'] . '", "' . $validated['context'] . '")';

	if (!mysql_query($query)) {
		echo 'Ошибка выполнения запроса';
		exit();
	}
	echo 1;
?>