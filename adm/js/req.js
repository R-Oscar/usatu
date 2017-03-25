$("#students").click(function(e) {
	if ($(e.target).hasClass('accept')) {
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/req.php',
			data: {
				id: e.target.dataset.id,
				type: 'accept',
				table: 'students'
			},
			success: responseHandler
		});
	} else if ($(e.target).hasClass('reject')) {
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/req.php',
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
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/req.php',
			data: {
				id: e.target.dataset.id,
				type: 'accept',
				table: 'staff'
			},
			success: responseHandler
		});
	} else if ($(e.target).hasClass('reject')) {
		$.ajax({
			type: 'POST',
			url: 'adm/handlers/req.php',
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

	location.reload();
}