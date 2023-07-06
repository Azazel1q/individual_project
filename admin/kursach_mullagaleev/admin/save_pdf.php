
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<style>
		.table {
		font-family: Montserrat;
	width: 100%;
	border: none;
	margin-bottom: 20px;
}
.table thead th {
	font-weight: bold;
	text-align: left;
	border: none;
	padding: 10px 15px;
	background: #d8d8d8;
	font-size: 14px;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
}
.table tbody td {
	text-align: left;
	border-left: 1px solid #ddd;
	border-right: 1px solid #ddd;
	padding: 10px 15px;
	font-size: 14px;
	vertical-align: top;
}
.table thead tr th:first-child, .table tbody tr td:first-child {
	border-left: none;
}
.table thead tr th:last-child, .table tbody tr td:last-child {
	border-right: none;
}
.table tbody tr:nth-child(even){
	background: #f3f3f3;
}
.link_1{
	font-family: Montserrat;
	border: none;
	border-radius: 15px;
	padding: 10px;
	color: white;
	background-color: black;
	transition: .5s;
}
.link_1:hover{
	transition: .5s;
	transform: scale(1.1);
}
	</style>
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
$date_now = date('d-m-Y');
?>

<div id="invoice" style="text-align: center;">
	<table class="table">
		<thead>
		<tr>
		<tr>
				<th colspan="6" style="text-align: center;">Отчет остатков продукции</th>
			</tr>
			<tr>
			<th colspan="6">Количество всей продукции на складе: <?=$count;?></th>
			</tr>
			<th>ID</th>
			<th>Наименование</th>
			<th>Дата производства</th>
			<th>Особенности хранения</th>
			<th>Количество</th>
			<th>Секция</th>
		</tr>
		</thead>
		<tbody>
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
	<tr>
		<td colspan="6">
			Дата: <?=$date_now?>
		</td>
	</tr>
	</tbody>
	</table>
</div>

<a href="all_product.php" class="link_1">Назад</a>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.js"></script>
<script>
	generatePDF()
	function generatePDF() {
    const element = document.getElementById('invoice');
    html2pdf()
        .from(element)
        .save();
}
</script>