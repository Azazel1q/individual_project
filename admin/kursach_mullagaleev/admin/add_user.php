<?php
session_start();
include("../control/connect.php");
$warehouse_query = "select * from warehouse";

?>
<?php
include("../admin/header_admin.php");
?>
<section class="add_user_form">
	<form method="POST">

	<div class="block_count">
	<h1>Добавление сотрудника</h1>
	<p>Введите имя</p>
	<input type="text" class="input_1" name="name" required pattern="^[А-Яа-яЁё]+$">
	<p>Введите фамилию</p>
	<input type="text" class="input_1" name="surname" required pattern="^[А-Яа-яЁё]+$">
	<p>Введите отчество</p>
	<input type="text" class="input_1" name="patronymic" required pattern="^[А-Яа-яЁё]+$">
	<p>Введите дату начала работы</p>
	<input type="date" class="input_1" name="date_begin" required>
	<p>Введите логин</p>
	<input type="text" class="input_1" name="login" required pattern="^[a-zA-Z0-9]+$"> 
	<p>Введите пароль</p>
	<input type="password" class="input_1" name="password" required pattern="^[a-zA-Z0-9]+$">

	<p><button class="link_1">Добавить</button></p>
	</div>

	</form>
<?php
if (!empty($_POST)) {
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$date_begin = $_POST['date_begin'];
$login = $_POST['login'];
$password = $_POST['password'];

$insert_query = "insert into users(id_user, name, surname, patronymic, date_begin, id_role, login, password) values(null, '$name', '$surname', '$patronymic', '$date_begin', '1', '$login', '$password')";
$insert_result = mysqli_query($con, $insert_query);
if ($insert_result) {
	echo "<div id='message_true' class='message_true'><h1>Сотрудник добавлен</h1><p>Ожидайте перенаправления...</p></div>";
}
else{
	echo "<div id='message_false' class='message_false'><h1>Сотрудник не добавлен</h1></div>";
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
		window.location.href = 'users.php';
	}, 3000);
	}
</script>