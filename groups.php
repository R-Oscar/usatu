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

<?php include 'partials/footer.php'; ?>

<script>
	$('li.active').removeClass('active');
	$('li:contains("Группы")').addClass('active');
</script>