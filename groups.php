<?php 
require_once('functions.php');
session_start();
$accessed = is_moder() || is_admin() || is_tutor();
if (!is_logged()){
    $groups = get_groups();
}
if (is_student()) {
    $my_group = get_my_group();
    $students = get_students($my_group);
    $group_news = get_group_news($my_group);
}
if ($accessed){
    $groups = get_groups();
    $group_news = get_group_news(-1);
}
$index = 0;

include 'partials/header.php';
?>

<div class="container">
    <div class="row">
        <?php if (!is_logged() || $accessed) {?>
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
                            <td><?php echo iconv('utf-8', 'windows-1251', $result['name']); ?></td>
                        </tr>
                        <?php $index++;}?>
                </tbody>
            </table>
            <?php } else if (is_student()) {?>
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
                            <td><?php echo iconv('utf-8', 'windows-1251', $result['fname'] . ' ' . $result['lname']); ?></td>
                        </tr>
                        <?php $index++;}?>
            <?php } ?>
                </tbody>
            </table>
    </div>
    <div class="row">
    <?php if (is_student() || $accessed) {?>
        <?php foreach($group_news as $news_item) {?>
            <article class="group-news-item">
                <h4><?php echo iconv('utf-8', 'windows-1251', $news_item['title']); ?></h4>
                <p><?php echo iconv('utf-8', 'windows-1251',$news_item['context']); ?></p>
            </article>
        <?php } ?>
    <?php } ?>
    <?php if ($accessed) {?>
        <a href="#" id="#create-news" data-toggle="modal" data-target="#js-news">Создать объявление</a>
    <?php } ?>
    </div>
</div>

    	<!-- Создание новости -->
<div class="modal fade" id="js-news" tabindex="-1" role="dialog" aria-labelledby="js-news">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Создание новости</h4>
      </div>
      <div class="modal-body">
      	<form data-toggle="validator" role="form" id="js-news-form">
            <div class="form-group" id="js-news-group">
      	  	    <label for="group_id">Выберите группу</label>
      	  	    <select class="form-control" id="group_id" name="group_id">
                    <?php foreach($groups as $group) {?>
      	  	        <option value="<?php echo $group['id']; ?>"><?php echo iconv('utf-8', 'windows-1251',$group['name']); ?></option>
                    <?php } ?>
      	  	    </select>
      	    </div>
      	  <div class="form-group">
      	    <label for="news_title" class="control-label">Название новости</label>
      	    <input type="text" class="form-control" name="title" id="news_title" placeholder="" data-error="Название введено неверно" required>
      	    <div class="help-block with-errors"></div>
      	  </div>
      	  <div class="form-group">
      	  	<label for="news_context" class="control-label">Содержание</label>
      	  	<textarea name="context" class="form-control" id="news_context" required></textarea>
      	  </div>
      	  <div class="form-group" style="text-align: center;">
      	    <button type="submit" class="btn btn-primary" id="js-news-submit">OK</button>
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
	$('li:contains("Группы")').addClass('active');
</script>
<?php include 'partials/footer.php'; ?>
