<link rel="stylesheet" href="../style.css">
<?php 
    include('../header.php');
    include('../connect.php');  
    
    $id_order = $_GET['id_order'];

    $sql_orders = "SELECT * FROM `orders` WHERE `id_orders` = '$id_order'";
    $result_orders = mysqli_query($con, $sql_orders);
    $order = mysqli_fetch_array($result_orders);
    
?>
<div class="main_bl">
    <div class="container">
        <div class="card-admin">
            <div>
                <p>ФИО клиента: <?=$order['name_client'];?></p>
                <p>Название компании: <?=$order['name_company'];?></p>
                <p>Дата создания проекта: <?=$order['date_create'];?></p>
                <p> Дата окончания проекта: <?=$order['date'];?></p>
            </div>
            <div>
                <p>Комментарий заказчика: <?=$order['comment'];?></p>
            </div>
            <div>
                <a class="btn-dark" href="?otm=<?=$order['id_orders']?>">Отменить</a>
                <a class="btn-dark" href="?done=<?=$order['id_orders']?>">Выполенен</a>
                <a class="btn-dark" href="orderUser.php?id_order=<?=$order['id_orders']?>">Назначить</a>
                <a class="btn-red" href="?del=<?=$order['id_orders']?>">Удалить</a>
            </div>
        </div>
    </div>
</div>
<?php 
    if ($_GET['del']) {
        $del_query = "DELETE FROM `orders` WHERE `id_orders`={$_GET['del']}";
        $del_result = mysqli_query($con, $del_query);
        if ($del_result) {
            echo "<script>alert('Проект удален');location.href='admin/index.php';</script>";
        }
        else{
             echo "<script>alert('Проект не удален');location.href='admin/index.php';</script>";
        }
    }
    if($_GET['otm']) {
        $otm_query = "UPDATE `orders` SET `id_status_order`= 5 WHERE id_orders = {$_GET['otm']}";
        $otm_result = mysqli_query($con, $otm_query);
        if ($otm_result) {
            echo "<script>alert('Проект отменен');location.href='index.php';</script>";
        } else {
             echo "<script>alert('Ошибка');</script>";
             echo mysqli_error($con);
        }
    }
    if($_GET['done']) {
        $done_query = "UPDATE `orders` SET `id_status_order`= 4 WHERE id_orders = {$_GET['done']}";
        $done_result = mysqli_query($con, $done_query);
        if ($done_result) {
            echo "<script>alert('Проект отменен');location.href='index.php';</script>";
        } else {
             echo "<script>alert('Ошибка');</script>";
             echo mysqli_error($con);
        }
    }
?>