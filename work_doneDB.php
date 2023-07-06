<?php 
    include("connect.php");

    if(!empty($_POST)) {
        if (!empty($_FILES["file_done"]["tmp_name"] ) ) {
            $name = "files/files_done/" .$_FILES["file_done"] ["name"];
            $tmp_name = $_FILES["file_done"] ["tmp_name"];
            move_uploaded_file($tmp_name,$name);
        }
        $id_user = $_POST['id_user'];
        $id_order = $_POST['id_order'];
        $file_done = $_FILES['file_done']['name'];

        $res_or = mysqli_query($con, "UPDATE `orders` SET `file_client` = '$file_done' WHERE id_orders = $id_order");
        $res_use = mysqli_query($con, "UPDATE `users` SET `status_empl`= 1 WHERE id_user = $id_user");
        mysqli_query($con, "UPDATE `order_user` SET `status_order_empl`= 4 WHERE id_order = $id_order AND id_user = $id_user");
        if($res_or) {
            echo "<script>alert('Работа сдана, статус успешно изменен'); location.href = 'work.php';</script>";
        } else {
            echo "<script>alert('Произошла какая то ошибка');</script>";
            echo mysqli_error($con);
        }
    } else {
        echo "Поля пусты";
    }
?>