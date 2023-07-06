<link rel="stylesheet" href="../style.css">
<?php 
    session_start();
    include('../header.php');
    include('../connect.php');  
    
    $id_order = $_GET['id_order'];

    $sql_orders = "SELECT * FROM `orders` WHERE `id_orders` = '$id_order'";
    $sql_des = "SELECT * FROM `users` JOIN `job_title_bd` ON users.jobe_title = job_title_bd.id_job WHERE jobe_title = 1 AND status_empl = 1";
    $sql_front = "SELECT * FROM `users` JOIN `job_title_bd` ON users.jobe_title = job_title_bd.id_job WHERE jobe_title = 2 AND status_empl = 1";
    $sql_back = "SELECT * FROM `users` JOIN `job_title_bd` ON users.jobe_title = job_title_bd.id_job WHERE jobe_title = 3 AND status_empl = 1";
    $sql_test = "SELECT * FROM `users` JOIN `job_title_bd` ON users.jobe_title = job_title_bd.id_job WHERE jobe_title = 4 AND status_empl = 1";
    $result_orders = mysqli_query($con, $sql_orders);
    $result_des = mysqli_query($con, $sql_des);
    $result_front = mysqli_query($con, $sql_front);
    $result_back = mysqli_query($con, $sql_back);
    $result_test = mysqli_query($con, $sql_test);
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
        </div>
            <?php 
                if($order['id_status_order'] != 2) {
                    ?>
                    <form class="card-admin" action="orderUserDB.php" method="post">
                        <input type="text" value="<?=$id_order?>" name="id_order" id="id_order" style="display:none;">
                        <div class="input_group">
                            <label for="job_id">Дизайнер</label>
                            <select name="des_id" id="job_id">
                            <?php 
                                while($desiner = mysqli_fetch_assoc($result_des)) {
                                    ?>
                                        <option value="<?=$desiner['id_user']?>"> <?=$desiner['id_user']?> <?=$desiner['name']?> <?=$desiner['surname']?>: <?=$desiner['job_title']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="input_group">
                            <label for="job_id">Front-End разработчик</label>
                            <select name="front_id" id="job_id">
                            <?php 
                                while($front = mysqli_fetch_assoc($result_front)) {
                                    ?>
                                        <option value="<?=$front['id_user']?>"> <?=$front['id_user']?> <?=$front['name']?> <?=$front['surname']?>: <?=$front['job_title']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="input_group">
                            <label for="job_id">Back-End разработчик</label>
                            <select name="back_id" id="job_id">
                            <?php 
                                while($back = mysqli_fetch_assoc($result_back)) {
                                    ?>
                                        <option value="<?=$back['id_user']?>"> <?=$back['id_user']?> <?=$back['name']?> <?=$back['surname']?>: <?=$back['job_title']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="input_group">
                            <label for="job_id">Тестер</label>
                            <select name="test_id" id="job_id">
                            <?php 
                                while($test = mysqli_fetch_assoc($result_test)) {
                                    ?>
                                        <option value="<?=$test['id_user']?>"> <?=$test['id_user']?> <?=$test['name']?> <?=$test['surname']?>: <?=$test['job_title']?></option>
                                    <?php
                                }
                            ?>
                            </select>
                        </div>
                        <input type="submit" value="Назначить" class="btn-dark">
                    </form>
                    <?php
                } else {
                    ?>
                        <a href="index.php" class="btn">Проекту уже назначены сотрудники</a>
                    <?php
                }
            ?>
    </div>
</div>
<?php 
    include("../footer.php");
?>