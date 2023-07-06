<?php
ini_set('display_errors', 0);
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<header>
		<ul>
			<?php
			if ($_SESSION['id_user']) {
			?>
			<li><a href="sections.php" class="link_1">Секции</a></li>
			<li><a href="add_product.php" class="link_1">Добавление продукции</a></li>
			
			<li><a href="logout.php" class="link_1">Выход</a></li>
			<?php
			}
			?>
		</ul>
	</header>