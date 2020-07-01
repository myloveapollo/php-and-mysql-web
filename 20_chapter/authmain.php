<?php
    session_start();

    if(isset($_POST['userid']) && isset($_POST['password'])){
        //if the user has just tried to log in

        $userid = $_POST['userid'];
        $password = $_POST['password'];

        $db_conn = new mysqli('localhost', 'webauth', 'webauth', 'auth');

        if(mysqli_connect_errno()){
            echo 'Connection to database failed:'.mysqli_connect_error();
            exit();
        }
    }

    $query = 'select * from authorized_users'."where name='$userid'"."and password = sha1('$password')";

    $result = $db_conn->query($query);

    if($result->num_rows){
        //if they are in the database register the user id 
        $_SESSION['valid_user'] = $userid;
    }

    $db_conn->close();
?>