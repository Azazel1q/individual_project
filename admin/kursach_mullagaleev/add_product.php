<?php
session_start();
include("control/connect.php");
$sect_query = "select * from sections";
$sect_result = mysqli_query($con, $sect_query);

?>
<?php
include("header.php");
?>
<section class="add_prod_form">
	<form method="POST">
	<div class="block_count">
	<h1>Добавление продукции</h1>
	<p>Введите наименование продукции</p>
	<input type="text" class="input_1" name="title" required pattern="^[А-Яа-яЁё\s]+$">
	<p>Введите дату производства</p>
	<input type="date" class="input_1" name="date_manuf" required>
	<p>Введите особенности хранения</p>
	<input type="text" class="input_1" name="feat_save" required pattern="^[А-Яа-яЁё\s]+$">
	<p>Введите количество продукции</p>
	<input type="text" class="input_1" name="kol" pattern="[0-9]+$">
	<p>Выберите секцию</p>
	<select name="sect" required>
		<?php
		while ($sect = mysqli_fetch_array($sect_result)) {
		?>
		<option value="<?=$sect['id_sect'];?>"><?=$sect['title_sect'];?></option>
		<?php
		}
		?>
	</select>
	<p><button class="link_1">Добавить</button></p>
	</div>
<?php
if (!empty($_POST)) {
$title = $_POST['title'];
$date_manuf = $_POST['date_manuf'];
$feat_save = $_POST['feat_save'];
$kol = $_POST['kol'];
$section = $_POST['sect'];

$insert_query = "insert into products(id_prod, name, date_manuf, feat_save, kol, id_sect) values(null, '$title', '$date_manuf', '$feat_save', '$kol', '$section')";
$insert_result = mysqli_query($con, $insert_query);
if ($insert_result) {
	echo "<div id='message_true' class='message_true'><h1>Продукция добавлена</h1><p>Ожидайте перенаправления...</p></div>";
}
else{
	echo "<div id='message_false' class='message_false'><h1>Продукция не добавлена</h1></div>";
}
}
?>
	</form>
</section>
<?php
include("footer.php");
?>
<script>
	setTimeout(() => {document.querySelector("#message_true").remove();}, 3000);
</script>
<script>
	if (document.querySelector("#message_true")) {
	setTimeout(function(){
		window.location.href = 'sections.php';
	}, 3000);
	}
</script>