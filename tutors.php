<?php
	require_once('functions.php');
	session_start();
	include 'partials/header.php';
	include 'partials/signup.php';
	include 'partials/scripts.php';
?>
<script>
	$('li.active').removeClass('active');
	$('li:contains("Преподаватели")').addClass('active');
</script>
<div class="container">
    <div class="row">
		<section>
			<h1>Преподаватели кафедры</h1>
			<table class="table table-bordered table-striped" id="tutors">
			   <thead>
			     <tr>
			       <th>Email</th>
			       <th>Имя</th>
			       <th>Фамилия</th>
			       <th>Отчество</th>
			       <th>Степень</th>
			     </tr>
			   </thead>
			   <tbody>
					<?php
						$link = connector();

						if (!$link) {
							echo 'Ошибка соединения с БД';
							exit();
						}

						$query = "SELECT * FROM staff WHERE authorized='1' AND access='tut'";

						$res = mysql_query($query);
						while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
							echo '<tr>
									<td>'.iconv('utf-8', 'windows-1251', $row['email']).'</td>
									<td>'.iconv('utf-8', 'windows-1251', $row['fname']).'</td>
									<td>'.iconv('utf-8', 'windows-1251', $row['lname']).'</td>
									<td>'.iconv('utf-8', 'windows-1251', $row['patronym']).'</td>
									<td>'.iconv('utf-8', 'windows-1251', $row['degree']).'</td>
								</tr>';
						}
						mysql_close($link);
					?>
				</tbody>
			</table>
		</section>
	</div>
</div>

<?php include 'partials/footer.php'; ?>