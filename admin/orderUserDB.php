<?php 
    include('../connect.php');
    $i = 0;
    $order_id = $_POST['id_order'];
    $id_users = array($_POST['des_id'], $_POST['front_id'], $_POST['back_id'], $_POST['test_id']);

    foreach($id_users as $id) {
        $sql_order_user = "INSERT INTO `order_user`(`id_or_use`, `id_user`, `id_order`, `status_order_empl`) VALUES (null, $id, '$order_id', 2)";
        $result_order_user = mysqli_query($con, $sql_order_user);
    }

    if($result_order_user) {
        echo "<script>alert('Сотрудники назначены'); location.href('orderUser.php');</script>";
        mysqli_query($con, "UPDATE `orders` SET `id_status_order` = 2 WHERE id_orders = $order_id");
    } else {
        echo "<script>alert('Какая то ошибка! Проверьте еще раз!'); location('orderUser.php');</script>";
    }
?>  