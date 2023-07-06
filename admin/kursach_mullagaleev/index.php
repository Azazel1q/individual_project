<?php
session_start();
include("control/connect.php");
$users_query = "select * from users where id_role = 1";
$users_result = mysqli_query($con, $users_query);
?>
<?php
include("header.php");
?>
<section class="auth_user_1">
	<form method="POST">
	<div class="block_auth">
	<h1>Форма авторизации</h1>
	<p><a href="admin/index.php">Для администратора</a></p>
	<p>Введите логин</p>
	<input type="text" class="input_1" name="login">
	<p>Введите пароль</p>
	<input type="password" class="input_1" name="password">
	<p><button class="link_1">Войти</button></p>
	</div>
	<?php
if (!empty($_POST)) {
$login = $_POST['login'];
$password = $_POST['password'];
while ($users = mysqli_fetch_array($users_result)) {
	if ($login == $users['login'] && $password == $users['password']) {
		$_SESSION['id_user'] = $users['id_user'];
		echo "<div id='message_true' class='message_true'><h1>Авторизация прошла успешно</h1><p>Ожидайте перенаправления...</p></div>";
	}
	else{
		echo "<div id='message_false' class='message_false'><h1>Данные введены неверно</h1></div>";
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
	setTimeout(() => {document.querySelector("#message_true").remove();}, 3000);
</script>
<script>
	if (document.querySelector("#message_true")) {
	setTimeout(function(){
		window.location.href = 'sections.php';
	}, 3000);
	}
</script>