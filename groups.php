<?php 
require_once('functions.php');
session_start();
if (!is_logged()){
    $groups = get_groups();
} else {
    $students = get_students();
}
$index = 0;
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="windows-1251">
    <title>Document</title>
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
                <li><a href="/">Главная</a></li>
                <li><a href="#">О кафедре</a></li>
                <li><a href="#">Расписание</a></li>
                <li><a href="#">Преподаватели</a></li>
                <li class="active"><a href="groups.php">Группы</a></li>
                <!-- <li><img src="images/logo.jpg" alt="Кафедра информатики" /></li> -->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
					if (is_tutor()) {
						echo '<li><p>Привет!</p></li>';
                        echo '<li><a id="logout">Выйти</a>';
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

    <div class="container">
        <div class="row">
            <?php if (!is_logged()) {?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Группа</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($groups as $result) {?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $result; ?></td>
                            </tr>
                            <?php $index++;}?>
                    </tbody>
                </table>
                <?php } else {?>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Студент</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $result) {?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo $result['fname'] . ' ' . $result['lname']; ?></td>
                            </tr>
                            <?php $index++;}?>
                <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>

    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>