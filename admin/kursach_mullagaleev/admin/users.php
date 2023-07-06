<?php
session_start();
include("../control/connect.php");
$user_query = "select * from users where id_role = '1'";
$user_result = mysqli_query($con, $user_query);
?>
<?php
include("../admin/header_admin.php");
?>
<section class="users_form">
<?php
	if ($_GET['del_id']) {
		$delete_query = "delete from users where id_user = {$_GET['del_id']}";
		$delete_result = mysqli_query($con, $delete_query);
		if ($delete_result) {
			echo "<div id='message_true' class='message_true'><h1>Сотрудник удален</h1><p>Ожидайте перенаправления...</p></div>";
		}
		else{
			echo "<div id='message_false' class='message_false'><h1>Сотрудник не удален</h1></div>";
		}
	}
	?>
	<table>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Отчество</th>
			<th>Дата начала работы</th>
		</tr>
	<?php
	while ($users = mysqli_fetch_array($user_result)) {
	?>
	<tr>
		<td><?=$users['id_user'];?></td>
		<td><?=$users['name'];?></td>
		<td><?=$users['surname'];?></td>
		<td><?=$users['patronymic'];?></td>
		<td><?=$users['date_begin'];?></td>
		<td><a href="?del_id=<?=$users['id_user'];?>" class="link_1">Удалить</a></td>
	</tr>
	<?php
	}
	?>
	</table>

</section>
<?php
include("../footer.php");
?>
<script>
	setTimeout(() => {document.querySelector("#message_true").remove();}, 3000);
</script>
<script>
	if (document.querySelector("#message_true")) {
	setTimeout(function(){
		window.location.href = 'users.php';
	}, 3000);
	}
</script>