<?php
session_start();
include("../control/connect.php");
$sect_query = "select * from sections";
$sect_result = mysqli_query($con, $sect_query);
?>
<?php
include("../admin/header_admin.php");
?>
<section class="add_prod_form">
	<form method="POST" enctype="multipart/form-data">
	<div class="block_count">
	<h1>Добавление секции</h1>
	<p>Введите наименование секции</p>
	<input type="text" class="input_1" name="title" required pattern="^[А-Яа-яЁё\s]+$">
	<p>Выберите файл</p>
	<input type="file" name="photo" required>
	<p><button class="link_1">Добавить</button></p>
	</div>
	</form>
		<?php
if (!empty($_POST)) {
if (!empty($_FILES["photo"]["tmp_name"] ) ) {
      $name = "../img/".$_FILES["photo"] ["name"];
   $tmp_name = $_FILES["photo"] ["tmp_name"];
   move_uploaded_file($tmp_name,$name);
}
$title = $_POST['title'];
$photo = $_FILES["photo"] ["name"];
$insert_query = "insert into sections(id_sect, title_sect, photo) values(null, '$title', '$photo')";
$insert_result = mysqli_query($con, $insert_query);
if ($insert_result) {
	echo "<div id='message_true' class='message_true'><h1>Секция добавлена</h1><p>Ожидайте перенаправления...</p></div>";
}
else{
	echo "<div id='message_false' class='message_false'><h1>Секция не добавлена</h1></div>";
}
}
?>
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
		window.location.href = 'edit_sect.php';
	}, 3000);
	}
</script>