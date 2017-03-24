<?php 
	require_once('functions.php');
	session_start();
	if (!is_moder() and !is_admin()) die();
	include 'partials/header.php';
?>
	
<section>
	<h1>Студенты</h1>
	<table class="table table-bordered" id="students">
	   <thead>
	     <tr>
	       <th>Email</th>
	       <th>Имя</th>
	       <th>Фамилия</th>
	       <th>Отчество</th>
	       <th>Группа</th>
	       <th>Действия</th>
	     </tr>
	   </thead>
	   <tbody>
	   <?php
		   	$link = connector();

		   	if (!$link) {
		   		echo 'Ошибка соединения с БД';
		   		exit();
		   	}

		   	$query = "SELECT * FROM `students` WHERE `authorized`='0'";

		   	$res = mysql_query($query);

		   	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
		   		echo '<tr>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['email']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['fname']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['lname']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['patronym']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['sgroup']).'</td>
		   				<td>
		   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Принять</button>
		   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Отклонить</button>
		   				</td>
		   			</tr>';
		   	}

		   	mysql_close($link);
	   ?>
	   </tbody>
	 </table>
</section>

<section>
	<h1>Преподаватели</h1>
	<table class="table table-bordered" id="tutors">
	   <thead>
	     <tr>
	       <th>Email</th>
	       <th>Имя</th>
	       <th>Фамилия</th>
	       <th>Отчество</th>
	       <th>Степень</th>
	       <th>Действия</th>
	     </tr>
	   </thead>
	   <tbody>
	   <?php
		   	$link = connector();

		   	if (!$link) {
		   		echo 'Ошибка соединения с БД';
		   		exit();
		   	}

		   	$query = "SELECT * FROM `staff` WHERE `authorized`='0'";
		   	$res = mysql_query($query);

		   	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
		   		echo '<tr>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['email']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['fname']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['lname']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['patronym']).'</td>
		   				<td>'.iconv('utf-8', 'windows-1251', $row['degree']).'</td>
		   				<td>
		   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Принять</button>
		   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Отклонить</button>
		   				</td>
		   			</tr>';
		   	}

		   	mysql_close($link);
	   ?>
	   </tbody>
	 </table>
</section>

<?php include 'partials/footer.php'; ?>

<script src="adm/js/req.js"></script>
<script>
	$('li.active').removeClass('active');
	$('li:contains("Заявки")').addClass('active');
</script>