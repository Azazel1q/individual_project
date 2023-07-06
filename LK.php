<div class="body_content">
<?php 
    session_start();
    include('header.php');
    include('connect.php');

    $user_id = $_SESSION['user_id'];
    $role = $_SESSION['user_role'];
    $sql_LK = "SELECT `id_user`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `age`, `password`, `role`, `job_title` FROM `users` JOIN job_title_bd ON users.jobe_title = job_title_bd.id_job WHERE role = '$role' and id_user = '$user_id'";
    $res_LK = mysqli_query($con, $sql_LK);
    $user = mysqli_fetch_array($res_LK);
?>
<div class="main_bl">
    <div class="container">
        <div class="main_content">
            <div class="LK_card">
                <h2 class="LK_title">Личный кабинет</h2>
                <div class="LK_text">
                    <ul class="buttons">
                        <a href="/work.php" class="btn">Перейти на работу</a>
                    </ul>
                    <ul>
                        <li class="LK__name">ФИО: <?=$user['name'];?> <?=$user['surname'];?> <?=$user['patronymic'];?></li>
                        <li class="LK_p">Номер телефона: <?=$user['phone'];?></li>
                        <li class="LK_p">Должность: <?=$user['job_title'];?></li>
                    </ul>
                    <ul>
                        <li class="LK_p">Логин: <?=$user['login'];?></li>
                        <li class="LK_p">Эл. адрес: <?=$user['email'];?></li>
                        <li class="LK_p">Дата рождения: <?=$user['age'];?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include("footer.php");
?>