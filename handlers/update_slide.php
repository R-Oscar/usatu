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
    $id = $validated['id'];
    $query = "UPDATE news_main SET title='$title', subtitle='$subtitle', content='$content' where id ='$id'";

	if (!mysql_query($query)) {
		echo 'Ошибка выполнения запроса';
		exit();
	}
	echo 1;
?>