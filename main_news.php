<?php 
require_once('functions.php');
session_start();
$accessed = is_moder() || is_admin();
if (!$accessed) exit();

include 'partials/header.php';
?>

<div class="container">
    <div class="row">
        <h2>Слайдер</h2>
        <div class="slider-item">
            <h4>Заголовок</h4>
            <h5>Подзаголовок</h5>
            <p>Текст слайдера</p>
            <button class="btn btn-default">Редактировать</button>
        </div>
        <button class="btn btn-success" id="js-main-news-open" data-toggle="modal" data-target="#js-main-news">Добавить</button>
    </div>
</div>

    	<!-- Создание новости -->
<div class="modal fade" id="js-main-news" tabindex="-1" role="dialog" aria-labelledby="js-main-news">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Создание новости</h4>
      </div>
      <div class="modal-body">
      	<form data-toggle="validator" role="form" id="js-main-news-form">
      	  <div class="form-group">
      	    <label for="news_title" class="control-label">Название новости</label>
      	    <input type="text" class="form-control" name="title" id="news_title" placeholder="" data-error="Название введено неверно" required>
      	    <div class="help-block with-errors"></div>
      	  </div>
            <div class="form-group">
      	    <label for="news_title" class="control-label">Подзаголовок</label>
      	    <input type="text" class="form-control" name="subtitle" id="news_subtitle" placeholder="" data-error="Подзаголовок введен неверно" required>
      	    <div class="help-block with-errors"></div>
      	  </div>
      	  <div class="form-group">
      	  	<label for="news_context" class="control-label">Содержание</label>
      	  	<textarea name="content" class="form-control" id="news_content" required></textarea>
      	  </div>
      	  <div class="form-group" style="text-align: center;">
      	    <button type="submit" class="btn btn-primary" id="js-main-news-submit">OK</button>
      	  </div>
      	</form>
      </div>
    </div>
  </div>
</div>

<?php include 'partials/signup.php'; ?>
<?php include 'partials/scripts.php'; ?>
<script>
	$('li.active').removeClass('active');
	$('li:contains("Редактор новостей")').addClass('active');
</script>
<?php include 'partials/footer.php'; ?>
