<?php
   include('connect.php');
   session_start();
   
   $sql_job = "SELECT * FROM `job_title_bd`";
   $result_job = mysqli_query($con, $sql_job);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style.css">
   <title>Document</title>
</head>
<body>
   <header>
      <a class="logo">
         WEB Создания
      </a>
      <nav class="navMenu">
         <a href="/index.php">Home</a>
         <a href="/work.php">Work</a>
         <?php
            ini_set('display_errors', 0);
            if($_SESSION['user_id'] == 0 && $_SESSION['user_role'] == 3) {
        ?>
            <a href="/admin/index.php">Админ панель</a>
        <?php  
            }
        ?>
         <div class="dot"></div>
      </nav>
      <div class="header__buttons">
         <?php
            if($_SESSION) {
        ?>
            <a href="LK.php" class="btn">Личный кабинет</a>
            <a href="logout.php" class="btn">Выход</a>
        <?php  
            } else {
        ?>
            <button class="btn" id="authBtn">Вход</button>
            <button class="btn" id="regBtn">Регистрация</button>
        <?php  
            }
        ?>
      </div>
   </header>
   <div class="modal" id="modalReg">
       <div class="modal_body">
           <button class="btn-dark close">x</button>
           <form action="/regDB.php" class="modal_form" method="post">
               <div class="input_group">
                   <label for="name">Имя</label>
                   <input type="text" name="name" id="name">
               </div>
               <div class="input_group">
                   <label for="surname">Фамилия</label>
                   <input type="text" name="surname" id="surname">
               </div>
               <div class="input_group">
                   <label for="patronymic">Отчество</label>
                   <input type="text" name="patronymic" id="patronymic">
               </div>
               <div class="input_group">
                   <label for="login">Login</label>
                   <input type="text" name="login" id="login">
               </div>
               <div class="input_group">
                   <label for="email">E-mail</label>
                   <input type="email" name="email" id="email">
               </div>
               <div class="input_group">
                   <label for="phone">Телефонный номер</label>
                   <input type="text" name="phone" id="phone">
               </div>
               <div class="input_group">
                   <label for="age">Дата рождения</label>
                   <input type="date" name="age" id="age">
               </div>
               <label for="age">Должность</label>
               <div class="input_group">
                   <select name="job_title" id="job_title">
                       <?php 
                        while($job_title = mysqli_fetch_array($result_job)) {
                        ?>
                            <option value="<?=$job_title['id_job'];?>"><?=$job_title['job_title'];?></option>
                        <?php
                        }
                       ?>
                   </select>
               </div>
               <div class="input_group">
                   <label for="password">Пароль</label>
                   <input type="password" name="password" id="password">
               </div>
               <div class="input_group">
                   <label for="password_conf">Подтвердите пароль</label>
                   <input type="password" name="password_conf" id="password_conf">
               </div>
               <div class="input_group">
               <button class=" btn-dark" type="submit">Регистрация</button>
               </div>
           </form>
       </div>
   </div>
   <div class="modal" id="modalAuth">
       <div class="modal_body">
           <button class="btn-dark close">x</button>
           <form action="/authDB.php" class="modal_form" method="post">
                <div class="input_group">
                   <label for="login">Login</label>
                   <input type="text" name="login" id="login">
                </div>
                <div class="input_group">
                   <label for="password">Пароль</label>
                   <input type="password" name="password" id="password">
                </div>
                <div class="input_group">
                   <label for="password_conf">Подтвердите пароль</label>
                   <input type="password" name="password_conf" id="password_conf">
                </div>
                <button class="btn-dark" type="submit">Вход</button>
           </form>
       </div>
   </div>
   <script src="/script.js"></script>