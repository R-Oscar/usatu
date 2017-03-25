<?php 
	require_once('functions.php');
	session_start();
	include 'partials/header.php';
?>

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

<?php include 'partials/signup.php'; ?>
<?php include 'partials/scripts.php'; ?>
<?php include 'partials/footer.php'; ?>