<?php 
    include('header.php');
    include('connect.php');
    session_start();

    $id_user = $_SESSION['user_id'];
    $sql_work = "SELECT * FROM `order_user` INNER JOIN orders, users, job_title_bd WHERE order_user.id_order = orders.id_orders AND order_user.id_user = users.id_user AND users.jobe_title = job_title_bd.id_job AND users.id_user = $id_user";
    $res_work = mysqli_query($con, $sql_work);

    // $work = mysqli_fetch_all($res_work);
    // $id_order = $work['id_order'];

    // $res_order_user = mysqli_query($con, "SELECT * FROM `order_user`");
    // $or_use = mysqli_fetch_array($res_order_user);
?>
<div class="main_bl">
    <div class="container">
        <div class="main_content">
            <?php 
                if($_SESSION) {
                    while($work = mysqli_fetch_array($res_work)) {
                        ?>
                        <div class="card-text">
                          <h5 class="card-title"><?=$work['name_company'];?></h5>
                          <p class="card-p">ФИО заказчика: <?=$work['name_client'];?></p>
                          <p class="card-p">Дата начала проекта: <?=$work['date_create'];?></p>
                          <p class="card-p">Дата окончания проекта: <?=$work['date'];?></p>
                          <a href="/files/<?=$work['file_client'];?>" class="card-p btn-dark" target="_blank">Файл заказчика: <?=$work['file_client'];?></a>
                        </div>
                        <?php 
                            if($work['status_order_empl'] == 2) {
                                ?>
                                <form class="card-text" action="workDB.php" method="post">
                                    <input type="text" value="<?=$id_user?>" name="id_user" id="id_user">
                                    <input type="text" value="<?=$work['id_orders'];?>" name="id_order" id="id_order">
                                    <input type="submit" class="btn-dark" value="Начать работу">
                                </form>
                                <?php
                            } else if($work['status_order_empl'] == 3) {
                                ?>
                                <form class="card-text" action="work_doneDB.php" method="POST" enctype="multipart/form-data">
                                    <input type="text" value="<?=$id_user?>" name="id_user" id="id_user">
                                    <input type="text" value="<?=$work['id_orders'];?>" name="id_order" id="id_order">
                                    <label for="file_done">Готовый файл(название должно быть уникальным)</label>
                                    <input type="file" name="file_done" id="file_done" required>
                                    <input type="submit" class="btn-dark" value="Сдать работу">
                                </form>
                                <?php 
                            } else if($work['status_order_empl'] == 4) {
                                echo "<h2>Проект выполнен</h2>";
                            } else if($work['status_order_empl'] == 5) {
                                echo "<h2>Проект отменен</h2>";
                            }
                        ?>
                        <?php
                    }
                } else {
                    echo "<h1>Войдите или регистрируйтесь.</h1>";
                }
            ?>
        </div>
    </div>
</div>
<?php 

?>