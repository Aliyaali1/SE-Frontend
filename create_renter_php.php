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
        $passPattern = '/^([a-zA-Z0-9\!\@\#\$\%\^\&\*\<\>]){8,15}$/';
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        if (!preg_match($passPattern, $password)){
            $_SESSION['message'] = "Password should have have minimum eight characters, at least one uppercase letter, one lowercase letter and one number.";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_renter.php');
            return;
        }

        if ($password != $confirm_password){
            $_SESSION['message'] = "Password and Confirm Password dont match.";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_renter.php');
            return;
        }

        $sql_query = "SELECT * FROM user WHERE username LIKE '$username'";
        $result = $conn->query($sql_query);
        $data = mysqli_fetch_array($result);

        if (isset($data)){
            $_SESSION['message'] = "User Already Exist";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_renter.php');
        }else{    
            $sql_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password_encrypted')";
            $result = $conn->query($sql_query);
            $conn -> close();
            $_SESSION['message'] = "New User Registered";
            $_SESSION['msg_type'] = "success";
            header('location: frontpage_renter.php');            
        }
    }

    if (isset($_POST['user_login'])){
        $username = $_POST["login_input"];
        $password = $_POST["user_password"];
        
        $sql = "SELECT * FROM user WHERE username LIKE '$username'";
        $result = $conn->query($sql);
        $data = mysqli_fetch_array($result);

        if ($data[0] == $username){
            $sql = "SELECT password FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            $row = mysqli_fetch_array($result);
            $verify = password_verify($password, $row[0]);
            
            if ($verify) {
                $_SESSION['message'] = "User Login Successful";
                $_SESSION['msg_type'] = "success";
                header('location: homepage.html');
            } else {
                $_SESSION['message'] = "Incorrect Password";
                $_SESSION['msg_type'] = "warning";
                header('location: frontpage_renter.php');
            }
            
        }else{    
            $_SESSION['message'] = "User does not exist";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_renter.php');
        }
    }
?>