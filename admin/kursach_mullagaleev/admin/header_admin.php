<?php
ini_set('display_errors', 0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<header>
		<ul>
			<?php
			if ($_SESSION['id_user_adm']) {
			?>
			<li><a href="edit_sect.php" class="link_1">Секции</a></li>
			<li><a href="add_sect.php" class="link_1">Добавление секции</a></li>
			<li><a href="users.php" class="link_1">Сотрудники</a></li>
			<li><a href="add_user.php" class="link_1">Добавление сотрудника</a></li>
			<li><a href="all_product.php" class="link_1">Остатки продукции</a></li>
			<li><a href="../logout.php" class="link_1">Выход</a></li>
			<?php
			}
			?>
		</ul>
	</header>