<div class="body_content">
<?php 
    include('header.php');
    include('connect.php');

    $sql_news = "SELECT * FROM `news`";
    $res_news = mysqli_query($con, $sql_news);
?>
<div class="main_bl">
      <div class="container">
         <div class="main_content">
            <div class="news">
                <?php 
                    while($news = mysqli_fetch_assoc($res_news)) {
                ?>
                    <div class="card">
                        <div class="card-img">
                          <img src="img/news/<?=$news['photo'];?>" class="img-fluid w-100" alt="card-horizontal-image">
                        </div>
                        <div class="card-text">
                          <h5 class="card-title"><?=$news['title'];?></h5>
                          <p class="card-p"><?=$news['body'];?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
         </div>
      </div>
</div>
<?php 
    include("footer.php");
?>