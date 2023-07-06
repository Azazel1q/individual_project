<?php
session_start();
include("../control/connect.php");

$id_sect = !empty($_GET['sect'])?$_GET['sect']:mysqli_fetch_array(mysqli_query($con, "select id_sect from sections limit 1"))['id_sect'];
$sect_query = "select * from sections where id_sect = $id_sect";
$sect_result = mysqli_query($con, $sect_query);
$sect= mysqli_fetch_array($sect_result);
?>
<?php
include("../admin/header_admin.php");
?>
<section class="edit_count_form">
	<form method="POST">
	<div class="block_count">
	<img src="../img/<?=$sect['photo'];?>" alt="<?=$sect['title_sect'];?>">

	<h1><?=$sect['title_sect'];?></h1>
	<p>Введите наименование секции</p>
	<input type="text" class="input_1" name="name" required>
	<p><button class="link_1">Изменить</button></p>
	</div>
	<?php
if (!empty($_POST)) {
$name = $_POST['name'];
$update_query = "update sections set title_sect = '$name' where id_sect = $id_sect";
$update_result = mysqli_query($con, $update_query);
if ($update_result) {
	echo "<div id='message_true' class='message_true'><h1>Название изменено</h1><p>Ожидайте перенаправления...</p></div>";
}
else{
	echo "<div id='message_false' class='message_false'><h1>Название не изменено</h1></div>";
}
}
?>
	</form>
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