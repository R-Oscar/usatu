<?php 
require_once('functions.php');
session_start();
?>

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
				<li class="active"><a href="#">Главная</a></li>
				<li><a href="#">О кафедре</a></li>
				<li><a href="#">Расписание</a></li>
				<li><a href="#">Преподаватели</a></li>
				<li><a href="#">Группы</a></li>
				<?php
					if (is_moder()) {
						echo '<li><a href="adm/req.php">Заявки</a></li>';
					}
				?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
						<?php
							if (is_tutor()) {
								echo '<li><p>Привет!</p></li>';
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

	<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
	  <!-- Overlay -->

	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
	    <li data-target="#bs-carousel" data-slide-to="1"></li>
	    <li data-target="#bs-carousel" data-slide-to="2"></li>
	  </ol>
	  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	    <div class="item slides active">
	  	  <div class="overlay"></div>
	      <div class="slide-1"></div>
	      <div class="hero">
	        <hgroup>
	            <h1>Потому что УГАТУ</h1>        
	            <h3>Выпускает хуету</h3>
	        </hgroup>
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	    <div class="item slides">
	      <div class="overlay"></div>
	      <div class="slide-2"></div>
	      <div class="hero">        
	        <hgroup>
	            <h1>Потому что УГАТУ</h1>        
	            <h3>Выпускает хуету</h3>
	        </hgroup>       
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	    <div class="item slides">
	      <div class="overlay"></div>
	      <div class="slide-3"></div>
	      <div class="hero">        
	        <hgroup>
	            <h1>Потому что УГАТУ</h1>        
	            <h3>Выпускает хуету</h3>
	        </hgroup>
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	  </div> 
	</div>

	<div class="container-fluid news">
		<div class="container">
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">Читать дальше</a></div>
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">Читать дальше</a></div>
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">Читать дальше</a></div>
		</div>
	</div>

	<!-- Авторизация -->
	<div class="modal fade" id="js-auth" tabindex="-1" role="dialog" aria-labelledby="js-auth">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="js-auth">Авторизация</h4>
	      </div>
	      <div class="modal-body">
	      	<form data-toggle="validator" role="form" id="js-auth-form">
	      	  <div class="form-group">
	      	    <label for="inputEmail" class="control-label">Электронная почта</label>
	      	    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email введен неверно" required>
	      	    <div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPassword" class="control-label">Пароль</label>
	      	  	<input type="password" data-minlength="6" name="pwd" class="form-control" id="inputPassword" placeholder="Password" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="tutor" id="js-signup-tutor" required>
	      	        Преподаватель
	      	      </label>
	      	    </div>
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="student" id="js-signup-student" required>
	      	        Студент
	      	      </label>
	      	    </div>
	      	  </div>
	      	  <div class="form-group" style="text-align: center;">
	      	    <button type="submit" class="btn btn-primary" id="js-auth-submit">OK</button>
	      	  </div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Регистрация -->
	<div class="modal fade" id="js-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
	      </div>
	      <div class="modal-body">
	      	<form data-toggle="validator" role="form" id="js-signup-form">
	      	  <div class="form-group">
	      	    <label for="js-signup-lname" class="control-label">Фамилия</label>
	      	    <input type="text" class="form-control" name="lname" id="js-signup-lname" placeholder="Иванов" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="js-signup-fname" class="control-label">Имя</label>
	      	    <input type="text" class="form-control" name="fname" id="js-signup-fname" placeholder="Иван" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="js-signup-patronym" class="control-label">Отчество</label>
	      	    <input type="text" class="form-control" name="patronym" id="js-signup-patronym" placeholder="Иванович">
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="inputEmail" class="control-label">Электронная почта</label>
	      	    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email введен неверно" required>
	      	    <div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPassword" class="control-label">Пароль</label>
	      	  	<input type="password" data-minlength="6" name="pwd" class="form-control" id="inputPasswordR" placeholder="Password" required>
	      	  	<div class="help-block">Минимум 6 символов</div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPasswordConfirm" class="control-label">Подтверждение пароля</label>
	      	  	<input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPasswordR" data-match-error="Пароли не совпадают" placeholder="Confirm" required>
	      	  	<div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="tutor" id="js-signup-tutor" required>
	      	        Преподаватель
	      	      </label>
	      	    </div>
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="student" id="js-signup-student" required>
	      	        Студент
	      	      </label>
	      	    </div>
	      	  </div>
	      	  <div class="form-group" id="js-signup-sel1" style="display: none;">
	      	  	<label for="sel1">Выберите группу</label>
	      	  	  <select class="form-control" id="sel1" name="group">
	      	  	    <option value="g1">ПИ-409</option>
	      	  	    <option value="g2">ПИ-409</option>
	      	  	    <option value="g3">ПИ-409</option>
	      	  	    <option value="g4">ПИ-409</option>
	      	  	  </select>
	      	  </div>
	      	  <div class="form-group" id="js-signup-sel2" style="display: none;">
	      	  	<label for="sel2">Выберите науч. степень</label>
	      	  	  <select class="form-control" id="sel2" name="degree">
	      	  	    <option value="d1">кандидат наук</option>
	      	  	    <option value="d2">доктор наук</option>
	      	  	    <option value="d3">нет степени</option>
	      	  	  </select>
	      	  </div>
	      	  <div class="form-group" style="text-align: center;">
	      	    <button type="submit" class="btn btn-primary" id="js-signup-submit">OK</button>
	      	  </div>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validator.min.js"></script>
	<script src="js/app.js"></script>
</body>
</html>