
<?php
include("../admin/header_admin.php");
?>
<section class="table_sect">
	<?php
session_start();
include("../control/connect.php");
$sect_query = "select * from sections";
if(!empty($_POST['search'])) {
	$search = $_POST['search'];
	$sect_query = $sect_query." where sections.title_sect='$search' ";
	$sect_result = mysqli_query($con, $sect_query);
	if (mysqli_num_rows($sect_result)==0) {
		echo "<div id='message_false' class='message_false'><h1>Такой записи не существет</h1></div>";
		$sect_query = "select * from sections";
	}
}
else{
	$sect_query = "select * from sections";
	$sect_result = mysqli_query($con, $sect_query);
}
$sect_result = mysqli_query($con, $sect_query);
?>
<?php
	if ($_GET['del_id']) {
		$delete_query = "delete from sections where id_sect = {$_GET['del_id']}";
		$delete_result = mysqli_query($con, $delete_query);
		if ($delete_result) {
			echo "<div id='message_true' class='message_true'><h1>Секция удалена</h1><p>Ожидайте перенаправления...</p></div>";
		}
		else{
			echo "<div id='message_false' class='message_false'><h1>Секция не удалена</h1></div>";
		}
	}
	?>
	<form action="" method="POST">
<input type="text" name="search" class="input_1" placeholder="Введите название">
<button class="link_1" style="margin-left: 10px;">Поиск</button>
</form>
	<table>
		<tr>
			<th>ID</th>
			<th>Фото</th>
			<th>Наименование</th>
		</tr>
	<?php
	while ($sect = mysqli_fetch_array($sect_result)) {
	?>
	<tr>
		<td><?=$sect['id_sect'];?></td>
		<td><img src="/img/<?=$sect['photo'];?>" alt="<?=$sect['title_sect'];?>"></td>
		<td><?=$sect['title_sect'];?></td>
		<td><a href="edit_sect_form.php?sect=<?=$sect['id_sect'];?>" class="link_1">Редактировать</a></td>
		<td><a href="?del_id=<?=$sect['id_sect'];?>" class="link_1">Удалить</a></td>
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
	setTimeout(() => {document.querySelector("#message_false").remove();}, 3000);
</script>
<script>
	if (document.querySelector("#message_true")) {
	setTimeout(function(){
		window.location.href = 'edit_sect.php';
	}, 3000);
	}
</script>