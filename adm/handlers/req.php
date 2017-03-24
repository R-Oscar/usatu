<?php
	require_once('../../functions.php');

	$link = connector();

	if (!$link) {
		echo 'Ошибка соединения с БД';
		exit();
	}

	if ($_POST['type'] == 'accept') {
		$query = "UPDATE ".$_POST['table']." SET `authorized` = '1' WHERE `id` = ".$_POST['id'].";";
	} else if ($_POST['type'] == 'reject') {
		$query = "DELETE FROM ".$_POST['table']." WHERE `id` = ".$_POST['id'].";";
	}

	$res = mysql_query($query);

	if (!$res) {
		echo mysql_error();
		exit();
	}

	echo 'ok';
	mysql_close($link);
?>