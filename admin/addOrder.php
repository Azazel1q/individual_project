<?php 
?>

<?php
    include('../connect.php');
    $sql_query = "SELECT * FROM `orders`";
    if(!empty($_POST)) {
        if (!empty($_FILES["files_client"]["tmp_name"] ) ) {
            $name = "../files/" .$_FILES["files_client"] ["name"];
            $tmp_name = $_FILES["files_client"] ["tmp_name"];
            move_uploaded_file($tmp_name,$name);
        }
        $name_client = $_POST['name'];
        $name_company = $_POST['name_company'];
        $files = $_FILES['files_client']['name'];
        $comment = $_POST['comment'];
        $date_project = $_POST['date'];
        $date_create = $_POST['date_create'];
        
        $sql_order_add = "INSERT INTO `orders`(`id_orders`, `name_client`, `name_company`, `file_client`, `comment`, `date`, `date_create`, `id_status_order`) VALUES (null,'$name_client','$name_company','$files','$comment','$date_project','$date_create', 1)";
        // $sql_order_add = "UPDATE `orders` SET `id_orders`= 1,`name_client`='$name_client',`name_company`='$name_company',`file_client`='$files',`comment`='$comment',`date`='$date_project',`date_create`='$date_create'";
        $result_order_add = mysqli_query($con, $sql_order_add);
        if($result_order_add) {
            echo "<script>alert('Запись успешно добавлена'); location.href = '/admin/index.php';</script>";
        } else {
            echo "<script>alert('Произошла какая то ошибка');</script>";
            echo mysqli_error($con);
        }
    } else {
        echo "<script>alert('Заполните поля'); location.href = '/index.php';</script>";
    }
?>