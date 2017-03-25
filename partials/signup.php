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
      	    <input class="form-control" name="email" id="inputEmail" placeholder="Email" data-error="Email введен неверно" required>
      	    <div class="help-block with-errors"></div>
      	  </div>
      	  <div class="form-group">
      	  	<label for="inputPassword" class="control-label">Пароль</label>
      	  	<input type="password" name="pwd" class="form-control" id="inputPassword" placeholder="Password" required>
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