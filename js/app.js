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

	$("#js-main-news-form").submit(function() {
		event.preventDefault();
		var submitButton = $(this).find(':submit');
		if (this.id.value >= 0)
			var url = 'handlers/update_slide.php'
		else
			var url = 'handlers/create_slide.php';
		if (!submitButton.hasClass('disabled')) {
			$.ajax.bind(this)({
				type: 'POST',
				url: url,
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

	// main news edit
	$(".slider-item button").click(function(e){
		var parent = e.target.parentElement;
		var title = $(parent).find('h4')[0].innerText;
		var subtitle = $(parent).find('h5')[0].innerText;
		var content = $(parent).find('p')[0].innerText;
		var id = $(parent).find('span')[0].innerText;
		$('#news_title').val(title);
		$('#news_subtitle').val(subtitle);
		$('#news_content').val(content);
		$('#news_id').val(id);
	});

	$('#js-main-news-open').click(function(){
		$('#news_title').val('');
		$('#news_subtitle').val('');
		$('#news_content').val('');
		$('#news_id').val('-1');
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