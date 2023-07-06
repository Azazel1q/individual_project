<link rel="stylesheet" href="../style.css">
<?php 
    include('../header.php');
    include('../connect.php');  
    
    
    $sql_orders = "SELECT * FROM `orders`";
    $result_orders = mysqli_query($con, $sql_orders);

    $sql_news = "SELECT * FROM `news`";
    $res_news = mysqli_query($con, $sql_news);
    
?>
<div class="main_bl">
    <div class="container">
        <div class="main_content">
            <div class="block_body">
                <h2>Добавление проекта</h2>
                <form action="/admin/addOrder.php" class="modal_form" method="post" enctype="multipart/form-data">
                   <div class="input_group">
                       <label for="name">ФИО клиента</label>
                       <input type="text" name="name" id="name">
                   </div>
                   <div class="input_group">
                       <label for="name_company">Название компании</label>
                       <input type="text" name="name_company" id="name_company" required>
                   </div>
                   <div class="input_group">
                       <label for="files_client">Файлы клиента(в архиве)</label>
                       <input type="file" name="files_client" id="files_client" required>
                   </div>
                   <div class="input_group">
                       <label for="comment">Комментарий</label>
                       <input type="text" name="comment" id="comment" required>
                   </div>
                   <div class="input_group">
                       <label for="date">Срок проекта</label>
                       <input type="date" name="date" id="date" required>
                   </div>
                   <div class="input_group">
                       <label for="date_create">Дата начала проекта</label>
                       <input type="date" name="date_create" id="date_create" required>
                   </div>
                   <div class="input_group">
                        <button class="btn-dark" type="submit">Добавить</button>
                   </div>
                </form>
            </div>
            <div class="block_body">
                <h2>Проекты</h2>
                <?php 
                    if($result_orders) {
                        while($order = mysqli_fetch_array($result_orders)) {
                ?>
                    <div class="card-admin">
                        <div>
                            <p>Название компании: <?=$order['name_company'];?></p>
                        </div>
                        <div>
                            <p>Дата создания проекта: <?=$order['date_create'];?></p>
                        </div>
                        <div>
                            <?php 
                                if($order['id_status_order'] == 5) {
                                    ?>
                                        <h2>Проект отменен</h2>
                                    <?php
                                } else {
                                    ?>
                                        <a class="btn-dark" href="orderInfo.php?id_order=<?=$order['id_orders']?>">Подробнее</a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                <?php
                        }
                    } else {
                        echo "<h5 style='color: red;'>Проектов пока нет</h5>";
                    }
                ?>
            </div>
            <div class="block_body">
                <h2>Добавить новость</h2>
                <form action="addNews.php" class="modal_form" method="post" enctype="multipart/form-data">
                   <div class="input_group">
                       <label for="name">Название новости</label>
                       <input type="text" name="name" id="name" required>
                   </div>
                   <div class="input_group">
                       <label for="body">Текст новости</label>
                       <input type="text" name="body" id="body" required>
                   </div>
                   <div class="input_group">
                       <label for="photo">Добавить фото</label>
                       <input type="file" name="photo" id="photo" required>
                   </div>
                   <div class="input_group">
                        <button class="btn-dark" type="submit">Добавить</button>
                   </div>
                </form>
            </div>
            <div class="block_body">
                <h2>Новости</h2>
                <?php 
                    while($news = mysqli_fetch_assoc($res_news)) {
                ?>
                    <div class="card">
                        <div class="card-img">
                          <img src="../img/news/<?=$news['photo'];?>" class="img-fluid w-100" alt="card-horizontal-image">
                        </div>
                        <div class="card-text">
                          <h5 class="card-title"><?=$news['title'];?></h5>
                          <p class="card-p"><?=$news['body'];?></p>
                          <a href="edit_news.php?id_new=<?=$news['id_news'];?>" class="btn-dark">Редактировать</a>
                          <a href="?del=<?=$news['id_news'];?>" class="btn-red">Удалить</a>
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
    if ($_GET['del']) {
        $del = $_GET['del'];
        $del_query = "DELETE FROM `news` WHERE `id_news` = $del";
        $del_result = mysqli_query($con, $del_query);
        if ($del_result) {
            echo "<script>alert('Запись удалена!!');location.href='index.php';</script>";
        }
        else{
             echo "<script>alert('Запись не удалена!!');location.href='index.php';</script>";
        }
    }
?>