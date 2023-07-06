<?php
session_start();
include("control/connect.php");

$id_prod = !empty($_GET['del_id'])?$_GET['del_id']:mysqli_fetch_array(mysqli_query($con, "select id_prod from products limit 1"))['id_prod'];
$prod_query = "select * from products where id_prod = $id_prod";
$prod_result = mysqli_query($con, $prod_query);
$prod = mysqli_fetch_array($prod_result);

$sect_query = "select id_sect, id_prod from products where id_prod = $id_prod";
$sect_result = mysqli_query($con, $sect_query);
$sect = mysqli_fetch_array($sect_result);
?>
<?php
include("header.php");
?>
<section class="edit_count_form">
	<p><a href="products.php?prod=<?=$sect['id_sect'];?>" class="link_1">Назад</a></p>
	<form method="POST" action="">
	<div class="block_count">
	<h1><?=$prod['name'];?></h1>
	<p>Текущее количество продукции</p>
	<p><?=$prod['kol'];?></p>
	<p>Введите количество списываемой продукции</p>
	<input type="text" class="input_1" name="kol" required pattern="[0-9]+$">
	<p><button class="link_1">Изменить</button></p>
	</div>
<?php
if (!empty($_POST)) {
$select_kol = "select kol from products where id_prod = $id_prod";
$query_kol = mysqli_query($con, $select_kol);
$result_kol = mysqli_fetch_array($query_kol);
$kol_first = $result_kol['kol'];
$kol_sec = $_POST['kol'];
if ($kol_sec>$kol_first) {
	echo "<div id='message_false' class='message_false'><h1>Вы ввели слишком большое число</h1></div>";
}
else{
	$kol_fin = $kol_first-$kol_sec;
	$update_query = "update products set kol = '$kol_fin' where id_prod = $id_prod";
	$update_result = mysqli_query($con, $update_query);
	if ($update_result) {
	echo "<div id='message_true' class='message_true'><h1>Количество изменено</h1><p>Ожидайте перезагрузки...</p></div>";
}
	else{
	echo "<div id='message_false' class='message_false'><h1>Количество не изменено</h1></div>";
}
}
}
?>
	</form>
</section>
<?php
include("footer.php");
?>
<script>
	setTimeout(() => {document.querySelector("#message_true").remove();}, 2000);
</script>
<script>
	if (document.querySelector("#message_true")) {
	setTimeout(function(){
		window.location.href = 'delete_product.php?del_id=<?=$id_prod;?>';
	}, 2000);
	}
</script>
<script>
	setTimeout(() => {document.querySelector("#message_false").remove();}, 2000);
</script>