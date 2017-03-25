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
	$title = $validated['title'];
	$subtitle = $validated['subtitle'];
	$content = $validated['content'];

	$query = "INSERT INTO news_main (title, subtitle, content) VALUES ('$title', ' $subtitle', '$content')";

	if (!mysql_query($query)) {
		echo 'Ошибка выполнения запроса';
		exit();
	}
	echo 1;
?>