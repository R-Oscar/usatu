<?php
	require_once('../../functions.php');

	$link = connector();

	if (!$link) {
		echo 'Ошибка соединения с БД';
		exit();
	}

	if ($_POST['table'] == 'students') {
		if ($_POST['type'] == 'accept') {
			$query = "UPDATE ".$_POST['table']." SET `email`='".$_POST['email']."',`fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."',`patronym`='".$_POST['patronym']."',`sgroup`='".$_POST['sgroup']."',`authorized`='".$_POST['authorized']."' WHERE id = '".$_POST['id']."'";
		} else if ($_POST['type'] == 'reject') {
			$query = "DELETE FROM ".$_POST['table']." WHERE `id` = ".$_POST['id'].";";
		}
	} else if ($_POST['table'] == 'staff') {
		if ($_POST['type'] == 'accept') {
			$query = "UPDATE ".$_POST['table']." SET `email`='".$_POST['email']."',`fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."',`patronym`='".$_POST['patronym']."',`degree`='".$_POST['degree']."',`authorized`='".$_POST['authorized']."' WHERE id = '".$_POST['id']."'";
		} else if ($_POST['type'] == 'reject') {
			$query = "DELETE FROM ".$_POST['table']." WHERE `id` = ".$_POST['id'].";";
		}
	}

	$res = mysql_query($query);

	if (!$res) {
		echo mysql_error();
		exit();
	}

	echo 'ok';
	mysql_close($link);
?>