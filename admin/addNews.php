<?php
    include('../connect.php');
    if(!empty($_POST)) {
        if(!empty($_FILES["photo"]["tmp_name"])){ 
            $name1= "../img/news/" . $_FILES["photo"]["name"]; 
            $name2= $_FILES["photo"]["tmp_name"];
            move_uploaded_file($name2, $name1); 
        }
        $name_news = $_POST['name'];
        $body_news = $_POST['body'];
        $photo_news = $_FILES['photo']['name'];
        // echo $id_news, $name_news, $body_news, $photo_news;
        $sql_edit_news = "INSERT INTO `news`(`id_news`, `title`, `body`, `photo`) VALUES (null,'$name_news','$body_news','$photo_news')";
        $result_edit_news = mysqli_query($con, $sql_edit_news);
        if($result_edit_news) {
            echo "<script>alert('Запись добавлена!!');location.href='/index.php';</script>";
        } else {
            echo "<script>alert('Запись не добавлена!!');location.href='/index.php';</script>";
            echo mysqli_error($con);
        }
    }
?>