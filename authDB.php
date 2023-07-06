<?php
    session_start(); 
    include('connect.php');

    if(!empty($_POST)){
        $login = !empty($_POST['login'])?$_POST['login']:false;
        $password = !empty($_POST['password'])?$_POST['password']:false;

        if($login == "admin" && $password == "admin") {
            $_SESSION['user_role'] = 3;
            $_SESSION['user_id'] = 0;
            echo "<script>alert('Вход в админ панель успешен'); location.href = 'admin/index.php';;</script>";
        } else {
            if($login && $password){
                $user_info = "select id_user, role, email, password from users where login='$login' and password='$password'";
                $query = mysqli_query($con,$user_info);
                $result = mysqli_fetch_array($query);
                if($result){
                    $_SESSION['user_role'] = $result['role'];
                    $_SESSION['user_id'] = $result['id_user'];
                    echo "<script>alert('Авторизация прошла успешно'); location.href = '/index.php';;</script>";
                } else {
                    echo "<script>alert('Вы ввели неправильный логин или пароль'); location.href = '/index.php';;</script>";
                }
            }else {
                echo "<script>alert('Введите почту и пароль'); location.href = '/index.php';</script>";
            }
        }
    }
?>