<?php 
    include('connect.php');

    if(!empty($_POST)) {

        $id_user = $_POST['id_user'];
        $id_order = $_POST['id_order'];

        $res_or = mysqli_query($con, "UPDATE `order_user` SET `status_order_empl`= 3");
        $res_use = mysqli_query($con, "UPDATE `users` SET `status_empl`= 2");
        if($res_or && $res_use) {
            echo "<script>alert('Работа начата, статус успешно изменен'); location.href = '/work.php';</script>";
        } else {
            echo "<script>alert('Произошла какая то ошибка');</script>";
            echo mysqli_error($con);
        }
    }
?>