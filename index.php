<?php 
	require_once('functions.php');
	session_start();
  $slides = get_main_news();
	include 'partials/header.php';
  $index = 1;
  $index_indicators = 0;
?>

<div class="carousel fade-carousel slide" data-ride="carousel" data-interval="4000" id="bs-carousel">
  <!-- Overlay -->

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php foreach($slides as $result) {?>
    <li data-target="#bs-carousel" data-slide-to="<?php echo $index_indicators; ?>"></li>
    <?php $index_indicators++;}?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach($slides as $result) {?>
    <div class="item slides">
  	  <div class="overlay"></div>
      <div class="slide-<?php echo $index; ?>"></div>
      <div class="hero">
        <hgroup>
            <h1><?php echo $result['title']?></h1>        
            <h3><?php echo $result['subtitle']?></h3>
        </hgroup>
        <button class="btn btn-hero btn-lg" role="button">See all features</button>
      </div>
    </div>
    <?php $index++;}?>
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

<script>
  $('.slides').first().addClass('active');
  $('.carousel-indicators li').first().addClass('active');
</script>