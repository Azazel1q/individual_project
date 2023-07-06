<?php
    session_start();
    include ("connect.php");

    unset($_SESSION['user_id']);
    unset($_SESSION['user_role']);
    echo "<script>location.href = '/index.php';</script>";
?>