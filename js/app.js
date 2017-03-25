$(document).ready(function() {
	$('input[type=radio][name=type]').change(function() {
		if (this.value === "tutor") {
			$("#js-signup-sel1").hide();
			$("#js-signup-sel2").show();
		} else {
			$("#js-signup-sel1").show();
			$("#js-signup-sel2").hide();
		}
	});

	$("#js-signup-form").submit(function() {
		event.preventDefault();
		var submitButton = $(this).find(':submit');
		if (!submitButton.hasClass('disabled')) {
  			$.ajax.bind(this)({
  				type: 'POST',
  				url: 'handlers/signup.php',
  				data: $(this).serialize(),
  				success: function(response) {
  					if (response === '1') {
	  					$('#js-signup').modal('hide');
  						alert('Регистрация завершена. Теперь Ваш аккаунт должен быть активирован администратором');
  						return;					
  					}
  					alert(response);
  				}
  			})
		}
	});

	$("#js-auth-form").submit(function() {
		event.preventDefault();
		var submitButton = $(this).find(':submit');
		if (!submitButton.hasClass('disabled')) {
			$.ajax.bind(this)({
				type: 'POST',
				url: 'handlers/auth.php',
				data: $(this).serialize(),
				success: function(response) {
					if (response === '0') {
						return alert('Ошибка авторизации');
					}
					location.reload();
				}
			});
		}
	});

	// create news
		$("#js-news-form").submit(function() {
		event.preventDefault();
		var submitButton = $(this).find(':submit');
		if (!submitButton.hasClass('disabled')) {
			$.ajax.bind(this)({
				type: 'POST',
				url: 'handlers/create_news.php',
				data: $(this).serialize(),
				success: function(response) {
					if (response === '0') {
						return alert('Ошибка авторизации');
					}
					location.reload();
				}
			});
		}
	});

	$("#js-main-news-submit").submit(function() {
		event.preventDefault();
		var submitButton = $(this).find(':submit');
		if (!submitButton.hasClass('disabled')) {
			$.ajax.bind(this)({
				type: 'POST',
				url: 'handlers/create_slide.php',
				data: $(this).serialize(),
				success: function(response) {
					if (response === '0') {
						return alert('Ошибка авторизации');
					}
					console.log(response);
					//location.reload();
				}
			});
		}
	});

	//logout
	$('#logout').click(function(event){
		event.preventDefault();
		$.ajax.bind(this)({
			type: 'GET',
			url: 'handlers/logout.php',
			success: function(response) {
				location.reload();
			}
		});
		location = '/';
	});
});