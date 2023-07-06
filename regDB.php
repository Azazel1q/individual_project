<?php
    session_start();
    include('connect.php');
    
    if(!empty($_POST)) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $patronymic = !empty($_POST['patronymic'])?$_POST['patronymic']:null;
        $login = $_POST['login'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $jobTitle = $_POST['job_title'];
        $password = $_POST['password'];
        
        $sql_reg = "INSERT INTO `users`(`id_user`, `surname`, `name`, `patronymic`, `login`, `email`, `phone`, `age`, `jobe_title`, `password`, `role`, `status_empl`) VALUES (null,'$name','$surname','$patronymic', '$login','$email','$phone','$age','$jobTitle','$password', 1, 1)";
        $result_reg = mysqli_query($con, $sql_reg);
        
        if ($result_reg){
            $user_info = $con->query("select id_user, role from users where email='$email' and password='$password'");
            $result = mysqli_fetch_array($user_info);
            $_SESSION['user_id'] = $result['id_user'];
            $_SESSION['user_role'] = $result['role'];
            echo "<script>alert('Вы успешно зарегистрировались'); location.href('/index.php');</script>";
        } else {
            echo "<script>alert('Введите данные корректно'); location.href('/index.php');</script>";
        }
    }
?>