<?php 
require_once('functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="windows-1251">
	<title>���� ������� �����������</title>
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
				<li class="active"><a href="#">�������</a></li>
				<li><a href="#">� �������</a></li>
				<li><a href="#">����������</a></li>
				<li><a href="#">�������������</a></li>
				<li><a href="#">������</a></li>
				<?php
					if (is_moder()) {
						echo '<li><a href="adm/req.php">������</a></li>';
					}
				?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
						<?php
							if (is_tutor()) {
								echo '<li><p>������!</p></li>';
							} else {
								echo '<li><a href="#" data-toggle="modal" data-target="#js-auth">�����������</a></li>
									<li><a href="#" data-toggle="modal" data-target="#js-signup">�����������</a></li>';
							}
						?>
			</ul>
		</div>
<!-- 		<div class="image-container">
			<img src="images/logo_min.png" alt="������� �����������">
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
	            <h1>������ ��� �����</h1>        
	            <h3>��������� �����</h3>
	        </hgroup>
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	    <div class="item slides">
	      <div class="overlay"></div>
	      <div class="slide-2"></div>
	      <div class="hero">        
	        <hgroup>
	            <h1>������ ��� �����</h1>        
	            <h3>��������� �����</h3>
	        </hgroup>       
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	    <div class="item slides">
	      <div class="overlay"></div>
	      <div class="slide-3"></div>
	      <div class="hero">        
	        <hgroup>
	            <h1>������ ��� �����</h1>        
	            <h3>��������� �����</h3>
	        </hgroup>
	        <button class="btn btn-hero btn-lg" role="button">See all features</button>
	      </div>
	    </div>
	  </div> 
	</div>

	<div class="container-fluid news">
		<div class="container">
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">������ ������</a></div>
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">������ ������</a></div>
			<div class="col-xs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat impedit nobis, beatae amet quas ad. Repudiandae nemo laborum cupiditate repellendus temporibus ullam ipsam, impedit, officiis atque suscipit dolore dolores labore! <a href="#">������ ������</a></div>
		</div>
	</div>

	<!-- ����������� -->
	<div class="modal fade" id="js-auth" tabindex="-1" role="dialog" aria-labelledby="js-auth">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="js-auth">�����������</h4>
	      </div>
	      <div class="modal-body">
	      	<form data-toggle="validator" role="form" id="js-auth-form">
	      	  <div class="form-group">
	      	    <label for="inputEmail" class="control-label">����������� �����</label>
	      	    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email ������ �������" required>
	      	    <div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPassword" class="control-label">������</label>
	      	  	<input type="password" data-minlength="6" name="pwd" class="form-control" id="inputPassword" placeholder="Password" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="tutor" id="js-signup-tutor" required>
	      	        �������������
	      	      </label>
	      	    </div>
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="student" id="js-signup-student" required>
	      	        �������
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

	<!-- ����������� -->
	<div class="modal fade" id="js-signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">�����������</h4>
	      </div>
	      <div class="modal-body">
	      	<form data-toggle="validator" role="form" id="js-signup-form">
	      	  <div class="form-group">
	      	    <label for="js-signup-lname" class="control-label">�������</label>
	      	    <input type="text" class="form-control" name="lname" id="js-signup-lname" placeholder="������" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="js-signup-fname" class="control-label">���</label>
	      	    <input type="text" class="form-control" name="fname" id="js-signup-fname" placeholder="����" required>
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="js-signup-patronym" class="control-label">��������</label>
	      	    <input type="text" class="form-control" name="patronym" id="js-signup-patronym" placeholder="��������">
	      	  </div>
	      	  <div class="form-group">
	      	    <label for="inputEmail" class="control-label">����������� �����</label>
	      	    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email ������ �������" required>
	      	    <div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPassword" class="control-label">������</label>
	      	  	<input type="password" data-minlength="6" name="pwd" class="form-control" id="inputPasswordR" placeholder="Password" required>
	      	  	<div class="help-block">������� 6 ��������</div>
	      	  </div>
	      	  <div class="form-group">
	      	  	<label for="inputPasswordConfirm" class="control-label">������������� ������</label>
	      	  	<input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPasswordR" data-match-error="������ �� ���������" placeholder="Confirm" required>
	      	  	<div class="help-block with-errors"></div>
	      	  </div>
	      	  <div class="form-group">
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="tutor" id="js-signup-tutor" required>
	      	        �������������
	      	      </label>
	      	    </div>
	      	    <div class="radio">
	      	      <label>
	      	        <input type="radio" name="type" value="student" id="js-signup-student" required>
	      	        �������
	      	      </label>
	      	    </div>
	      	  </div>
	      	  <div class="form-group" id="js-signup-sel1" style="display: none;">
	      	  	<label for="sel1">�������� ������</label>
	      	  	  <select class="form-control" id="sel1" name="group">
	      	  	    <option value="g1">��-409</option>
	      	  	    <option value="g2">��-409</option>
	      	  	    <option value="g3">��-409</option>
	      	  	    <option value="g4">��-409</option>
	      	  	  </select>
	      	  </div>
	      	  <div class="form-group" id="js-signup-sel2" style="display: none;">
	      	  	<label for="sel2">�������� ����. �������</label>
	      	  	  <select class="form-control" id="sel2" name="degree">
	      	  	    <option value="d1">�������� ����</option>
	      	  	    <option value="d2">������ ����</option>
	      	  	    <option value="d3">��� �������</option>
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