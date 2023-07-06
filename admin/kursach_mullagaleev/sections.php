<?php
session_start();
include("control/connect.php");
$sect_query = "select * from sections";
$sect_result = mysqli_query($con, $sect_query);
?>
<?php
include("header.php");
?>
<section class="sections">
	<?php
	while ($sect = mysqli_fetch_array($sect_result)) {
	?>
	<a href="products.php?prod=<?=$sect['id_sect'];?>">
	<div class="block_1">
		<img src="img/<?=$sect['photo'];?>" alt="<?=$sect['title_sect'];?>">
		<p><?=$sect['title_sect'];?></p>
	</div>
	</a>
	<?php
	}
	?>
</section>
<?php
include("footer.php");
?>