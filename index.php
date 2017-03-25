<?php 
	require_once('functions.php');
	session_start();
  $slides = get_main_news();
  $news = get_simple_news();
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
    <?php foreach($news as $result) {?>
		<div class="col-xs-4">
      <div class="news-view">
        <h5><?php echo $result['brief']; ?></h5>
        <p><?php echo $result['content']; ?></p>
      </div>
      </div>
    <?php }?>
	</div>
</div>

<?php include 'partials/signup.php'; ?>
<?php include 'partials/scripts.php'; ?>
<?php include 'partials/footer.php'; ?>

<script>
  $('.slides').first().addClass('active');
  $('.carousel-indicators li').first().addClass('active');
</script>