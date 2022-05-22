<?php

    session_start();
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "car_rental";

    $conn = mysqli_connect($servername, $username, $password, $database_name);

    if (!$conn){
        die("Connection Failed: ". mysqli_connect_error());
    }

    if (isset($_POST['create_account'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        $sql_query = "SELECT * FROM admin WHERE username LIKE '$username'";
        $result = $conn->query($sql_query);
        $data = mysqli_fetch_array($result);

        if (isset($data)){
            $_SESSION['message'] = "Admin Already Exist";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_Admin.php');
        }else{    
            $sql_query = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password_encrypted')";
            $result = $conn->query($sql_query);
            $conn -> close();
            $_SESSION['message'] = "New Admin Registered";
            $_SESSION['msg_type'] = "success";
            header('location: frontpage_Admin.php');            
        }
    }

    if (isset($_POST['admin_login'])){
        $username = $_POST["login_input"];
        $password = $_POST["admin_password"];
        
        $sql = "SELECT * FROM admin WHERE username LIKE '$username'";
        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if ($data[0] == $username){
            $sql = "SELECT password FROM admin WHERE username = '$username'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $verify = password_verify($password, $row[0]);
            
            if ($verify) {
                $_SESSION['message'] = "Admin Login Successful";
                $_SESSION['msg_type'] = "success";
                header('location: homepage.html');
            } else {
                $_SESSION['message'] = "Incorrect Password";
                $_SESSION['msg_type'] = "warning";
                header('location: frontpage_Admin.php');
            }
            
        }else{    
            $_SESSION['message'] = "Admin does not exist";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_Admin.php');
        }
    }
?>