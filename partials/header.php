<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="windows-1251">
	<title>Сайт кафедры информатики</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fonts/stylesheet.css">
	<!-- <link rel="stylesheet" href="css/bootstrap-theme.min.css"> -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar navbar-default menu">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">
					<img alt="Brand" src="images/logo_min.png">
				</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="/">Главная</a></li>
				<li><a href="#">О кафедре</a></li>
				<li><a href="#">Расписание</a></li>
				<li><a href="#">Преподаватели</a></li>
				<li><a href="groups.php">Группы</a></li>
				<?php
					if (is_moder() || is_admin()) {
						echo '<li><a href="req.php">Заявки</a></li>';
					}
				?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
						<?php
							if (is_logged()) {
								echo '<li><p>Привет!</p></li>';
								echo '<li><a href="# id="logout">Выйти</a>';
							} else {
								echo '<li><a href="#" data-toggle="modal" data-target="#js-auth">Авторизация</a></li>
									<li><a href="#" data-toggle="modal" data-target="#js-signup">Регистрация</a></li>';
							}
						?>
			</ul>
		</div>
<!-- 		<div class="image-container">
			<img src="images/logo_min.png" alt="Кафедра информатики">
		</div> -->
	</nav>