<div class="body_content">
<?php 
    include('../header.php');
    include('../connect.php');

    $id_news = $_GET['id_new'];

    $sql_news = "SELECT * FROM `news` WHERE `id_news` = '$id_news'";
    $res_news = mysqli_query($con, $sql_news);
    $news = mysqli_fetch_assoc($res_news);
?>
<div class="main_bl">
      <div class="container">
         <div class="main_content">
            <div class="news">
                <div class="card">
                    <div class="card-img">
                      <img src="../img/news/<?=$news['photo'];?>" class="img-fluid w-100" alt="card-horizontal-image">
                    </div>
                    <div class="card-text">
                      <h5 class="card-title"><?=$news['title'];?></h5>
                      <p class="card-p"><?=$news['body'];?></p>
                    </div>
                </div>
            </div>
            <div class="block_body">
                <h2>Редактировать</h2>
                <form action="" class="modal_form" method="post" enctype="multipart/form-data">
                    <input type="text" value="<?$id_news?>" name="id_news" id="id_news" style="display:none;">
                   <div class="input_group">
                       <label for="name">Название новости </label>
                       <input type="text" name="name" id="name" value="<?=$news['title'];?>">
                   </div>
                   <div class="input_group">
                       <label for="body">Текст новости</label>
                       <input type="text" name="body" id="body" value="<?=$news['body'];?>">
                   </div>
                   <div class="input_group">
                       <label for="photo">Фото</label>
                       <input type="file" name="photo" id="photo">
                   </div>
                   <div class="input_group">
                        <button class="btn-dark" type="submit">Редактировать новость</button>
                   </div>
                </form>
            </div>
         </div>
      </div>
</div>
<?php
if(!empty($_POST)) {
    if(!empty($_FILES["photo"]["tmp_name"])){ 
        $name1= "../img/news/" . $_FILES["photo"]["name"]; 
        $name2= $_FILES["photo"]["name"]; 
        if($result_photo) 
        { 
            move_uploaded_file($_FILES["photo"]["tmp_name"], $name1); 
        } 
    }
        $name_news = $_POST['name'];
        $body_news = $_POST['body'];
        $photo_news = $_FILES['photo']['name'];
        // echo $id_news, $name_news, $body_news, $photo_news;
        $sql_edit_news = "UPDATE `news` SET `title`='$name_news',`body`='$body_news',`photo`='$photo_news' WHERE news.id_news = $id_news";
        $result_edit_news = mysqli_query($con, $sql_edit_news);
        if($result_edit_news) {
            echo "<script>alert('Запись изменена!!');location.href='/index.php';</script>";
        } else {
            echo "<script>alert('Запись не изменена!!');location.href='/index.php';</script>";
            echo mysqli_error($con);
        }
    }
?>