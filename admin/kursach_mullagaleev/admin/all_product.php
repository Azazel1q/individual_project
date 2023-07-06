
<?php
include("header_admin.php");
?>

<section class="table_products">
	<?php
session_start();
include("../control/connect.php");
$prod_query = "select * from products inner join sections where products.id_sect = sections.id_sect";
if(!empty($_POST['search_name'])) {
	$search = $_POST['search_name'];
	$prod_query = $prod_query." and products.name='$search'";
	$prod_result = mysqli_query($con, $prod_query);
	if (mysqli_num_rows($prod_result)==0) {
		echo "<div id='message_false' class='message_false'><h1>Запись не найдена</h1></div>";
		$prod_query = "select * from products inner join sections where products.id_sect = sections.id_sect";
		$prod_result = mysqli_query($con, $prod_query);
	}
}

$prod_result = mysqli_query($con, $prod_query);
$count_sel = mysqli_query($con, "SELECT SUM(kol) FROM `products`");
$count_all = mysqli_fetch_array($count_sel);
$count = $count_all['SUM(kol)'];
?>
<form action="" method="POST">
<input type="text" name="search_name" class="input_1" required placeholder="Введите наименование">
<button class="link_1" style="margin-left: 10px;">Поиск</button>
<p>Количество всей продукции на складе: <b><p><?=$count;?></p></b>
<a href="save_pdf.php" >Сохранить отчет</a>
</form>
	<table style="margin: 10px auto;">

		<tr>
			<th>ID</th>
			<th>Наименование</th>
			<th>Дата производства</th>
			<th>Особенности хранения</th>
			<th>Количество</th>
			<th>Секция</th>

		</tr>
	<?php
	while ($prod = mysqli_fetch_array($prod_result)) {

	
	?>
	<tr>
		<td><?=$prod['id_prod'];?></td>
		<td><?=$prod['name'];?></td>
		<td><?=$prod['date_manuf'];?></td>
		<td><?=$prod['feat_save'];?></td>
		<td><?=$prod['kol'];?></td>
		<td><?=$prod['title_sect'];?></td>


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
		window.location.href = 'sections.php';
	}, 3000);
	}
</script>
