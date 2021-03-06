<?php 
	require_once('functions.php');
	session_start();
	if (!is_admin()) die();
	include 'partials/header.php';

	$groups = get_groups();
	$degrees = get_degrees();
?>

<div class="container">
    <div class="row">	
		<section>
			<h1>Студенты</h1>
			<table class="table table-bordered" id="students">
			   <thead>
			     <tr>
			       <th>Email</th>
			       <th>Имя</th>
			       <th>Фамилия</th>
			       <th>Отчество</th>
			       <th>Группа</th>
			       <th>Заявка одобрена?</th>
			       <th>Действия</th>
			     </tr>
			   </thead>
			   <tbody>
			   <?php
				   	$link = connector();

				   	if (!$link) {
				   		echo 'Ошибка соединения с БД';
				   		exit();
				   	}

				   	$query = "SELECT * FROM `students`";

				   	$res = mysql_query($query);

				   	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
				   		echo '<tr>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['email']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['fname']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['lname']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['patronym']).'" /></td>
				   				<td>
				   					<select>';
				   						foreach ($groups as $group) {
				   							echo '<option '.($group['name'] == get_group($row['sgroup']) ? 'selected' : '').' value="'.$group['id'].'">'.iconv('utf-8', 'windows-1251', $group['name']).'</option>';
				   						}
				   					echo '</select>
				   				</td>
				   				<td>
				   					<select>
										<option value="1" '.($row['authorized'] == 1 ? 'selected' : '').'>Да</option>
										<option value="0" '.($row['authorized'] == 0 ? 'selected' : '').'>Нет</option>
				   					</select>
				   				</td>
				   				<td>
				   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Принять</button>
				   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Удалить</button>
				   				</td>
				   			</tr>';
				   	}

				   	mysql_close($link);
			   ?>
			   </tbody>
			 </table>
		</section>

		<section>
			<h1>Преподаватели</h1>
			<table class="table table-bordered table-striped" id="tutors">
			   <thead>
			     <tr>
			       <th>Email</th>
			       <th>Имя</th>
			       <th>Фамилия</th>
			       <th>Отчество</th>
			       <th>Степень</th>
			       <th>Заявка одобрена?</th>
			       <th>Действия</th>
			     </tr>
			   </thead>
			   <tbody>
			   <?php
				   	$link = connector();

				   	if (!$link) {
				   		echo 'Ошибка соединения с БД';
				   		exit();
				   	}

				   	$query = "SELECT * FROM `staff`";
				   	$res = mysql_query($query);

				   	while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
				   		echo '<tr>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['email']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['fname']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['lname']).'" /></td>
				   				<td><input type="text" value="'.iconv('utf-8', 'windows-1251', $row['patronym']).'" /></td>
				   				<td>
				   					<select>';
				   						foreach ($degrees as $degree) {
				   							echo '<option '.($degree['id'] == $row['degree'] ? 'selected' : '').' value="'.$degree['id'].'">'.iconv('utf-8', 'windows-1251', $degree['title']).'</option>';
				   						}
				   					echo '</select>
				   				</td>
				   				<td>
				   					<select>
										<option value="1" '.($row['authorized'] == 1 ? 'selected' : '').'>Да</option>
										<option value="0" '.($row['authorized'] == 0 ? 'selected' : '').'>Нет</option>
				   					</select>
				   				</td>
				   				<td>
				   					<button class="accept" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Принять</button>
				   					<button class="reject" data-id="'.iconv('utf-8', 'windows-1251', $row['id']).'">Удалить</button>
				   				</td>
				   			</tr>';
				   	}

				   	mysql_close($link);
			   ?>
			   </tbody>
			 </table>
		</section>
	</div>
</div>

<?php include 'partials/scripts.php'; ?>
<script src="js/admin.js"></script>
<script>
	$('li.active').removeClass('active');
	$('li:contains("Админ-панель")').addClass('active');
</script>
<?php include 'partials/footer.php'; ?>