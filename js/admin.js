$("#students").click(function(e) {
	if ($(e.target).hasClass('accept')) {
		var tds = $(e.target).parent().siblings();
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/update.php',
			data: {
				email: $(tds[0]).find('input').val(),
				fname: $(tds[1]).find('input').val(),
				lname: $(tds[2]).find('input').val(),
				patronym: $(tds[3]).find('input').val(),
				sgroup: $(tds[4]).find('select').val(),
				authorized: $(tds[5]).find('select').val(),
				id: e.target.dataset.id,
				type: 'accept',
				table: 'students'
			},
			success: responseHandler
		});
	} else if ($(e.target).hasClass('reject')) {
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/update.php',
			data: {
				id: e.target.dataset.id,
				type: 'reject',
				table: 'students'
			},
			success: responseHandler
		});
	}
});

$("#tutors").click(function(e) {
	if ($(e.target).hasClass('accept')) {
		var tds = $(e.target).parent().siblings();
		console.log(tds);
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/update.php',
			data: {
				email: $(tds[0]).find('input').val(),
				fname: $(tds[1]).find('input').val(),
				lname: $(tds[2]).find('input').val(),
				patronym: $(tds[3]).find('input').val(),
				degree: $(tds[4]).find('select').val(),
				authorized: $(tds[5]).find('select').val(),
				id: e.target.dataset.id,
				type: 'accept',
				table: 'staff'
			},
			success: responseHandler
		});
	} else if ($(e.target).hasClass('reject')) {
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/update.php',
			data: {
				id: e.target.dataset.id,
				type: 'reject',
				table: 'staff'
			},
			success: responseHandler
		});
	}
});

function responseHandler(response) {
	if (response !== 'ok') return alert(response);
	alert('Успешно');
	location.reload();
}