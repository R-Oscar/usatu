<?php 
	require_once('../functions.php');
	session_start();
	if (!is_moder() and !is_admin()) die();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="windows-1251">
	<title>���������� ��������</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../fonts/stylesheet.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<nav class="navbar navbar-default menu">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">
					<img alt="Brand" src="../images/logo_min.png">
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="../">�������</a></li>
				<li><a href="#">� �������</a></li>
				<li><a href="#">����������</a></li>
				<li><a href="#">�������������</a></li>
				<li class="active"><a href="#">������</a></li>
				<?php
					if (is_moder()) {
						echo '<li><a href="adm/req.php">������</a></li>';
					}
				?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
			</ul>
		</div>
	</nav>
	
	<section>
		<h1>��������</h1>
		<table class="table table-bordered" id="students">
		   <thead>
		     <tr>
		       <th>Email</th>
		       <th>���</th>
		       <th>�������</th>
		       <th>��������</th>
		       <th>������</th>
		       <th>��������</th>
		     </tr>
		   </thead>
		   <tbody>
		   <?php
			   	$link = connector();

			   	if (!$link) {
			   		echo '������ ���������� � ��';
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
			   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">�������</button>
			   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">���������</button>
			   				</td>
			   			</tr>';
			   	}

			   	mysql_close($link);
		   ?>
		   </tbody>
		 </table>
	</section>

	<section>
		<h1>�������������</h1>
		<table class="table table-bordered" id="tutors">
		   <thead>
		     <tr>
		       <th>Email</th>
		       <th>���</th>
		       <th>�������</th>
		       <th>��������</th>
		       <th>�������</th>
		       <th>��������</th>
		     </tr>
		   </thead>
		   <tbody>
		   <?php
			   	$link = connector();

			   	if (!$link) {
			   		echo '������ ���������� � ��';
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
			   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">�������</button>
			   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">���������</button>
			   				</td>
			   			</tr>';
			   	}

			   	mysql_close($link);
		   ?>
		   </tbody>
		 </table>
	</section>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="js/req.js" defer></script>
</body>
</html>