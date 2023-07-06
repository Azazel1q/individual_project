
<?php
session_start();
include("control/connect.php");

?>
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<section class="table_products">
	<?php
		
		session_destroy();
			echo "<div id='message_true' class='message_true'><h1>Вы вышли из аккаунта</h1><p>Ожидайте перенаправления...</p></div>";
	?>
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
		window.location.href = 'index.php';
	}, 3000);
	}
</script>