
<?php
include("header.php");
?>

<section class="table_products">
	<?php
session_start();
include("control/connect.php");

$id_sect = !empty($_GET['prod'])?$_GET['prod']:mysqli_fetch_array(mysqli_query($con, "select id_sect from sections"))['id_sect'];
$prod_query = "select * from products inner join sections where products.id_sect = sections.id_sect and products.id_sect = $id_sect";

if(!empty($_POST['search_name'])) {
	$search = $_POST['search_name'];
	$prod_query = $prod_query." and products.name='$search'";
	$prod_result = mysqli_query($con, $prod_query);
	if (mysqli_num_rows($prod_result)==0) {
		echo "<div id='message_false' class='message_false'><h1>Запись не найдена</h1></div>";
		$prod_query = "select * from products inner join sections where products.id_sect = sections.id_sect and products.id_sect = $id_sect";
		$prod_result = mysqli_query($con, $prod_query);
	}
}



$prod_result = mysqli_query($con, $prod_query);
$section_query = mysqli_query($con, "select products.id_sect, title_sect from products inner join sections where products.id_sect = sections.id_sect and products.id_sect = $id_sect");
$section_result = mysqli_fetch_array($section_query);
$section_name = $section_result['title_sect'];
?>
<form action="" method="POST">


<input type="text" name="search_name" class="input_1" required placeholder="Введите наименование" >
<button class="link_1" style="margin-left: 10px;">Поиск</button>
<p>Наименование секции: <b><p><?=$section_name;?></p></b>
<a href="save_pdf.php?prod=<?=$id_sect;?>" >Сохранить отчет</a>
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

		<td><a href="edit_count_prod.php?prod_id=<?=$prod['id_prod'];?>" class="link_1">Изменить количество</a></td>
		<td><a href="delete_product.php?del_id=<?=$prod['id_prod'];?>" class="link_1">Списать</a></td>

	</tr>
	<?php
}



	?>

	</table>
		<?php
	if ($_GET['del_id']) {
		$delete_query = "delete from products where id_prod = {$_GET['del_id']}";
		$delete_result = mysqli_query($con, $delete_query);
		if ($delete_result) {
			echo "<div id='message_true' class='message_true'><h1>Продукция списана</h1><p>Ожидайте перенаправления...</p></div>";
		}
		else{
			echo "<div id='message_false' class='message_false'><h1>Продукция не списана</h1></div>";
		}
	}
	?>
</section>
<?php
include("footer.php");
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