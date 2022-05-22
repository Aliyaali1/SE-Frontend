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

    if(isset($_POST['create_account'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        $sql_query = "SELECT * FROM user WHERE username LIKE '$username'";
        $result = $conn->query($sql_query);
        $data = mysqli_fetch_array($result);

        if ($data[0] > 1){
            $_SESSION['message'] = "User Already Exist";
            $_SESSION['msg_type'] = "danger";
            header('location: frontpage_owner.php');
        }else{    
            $sql_query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password_encrypted')";
            $result = $conn->query($sql_query);
                if (mysqli_query($conn, $sql_query)){
                    $_SESSION['message'] = "New User Registered";
                    $_SESSION['msg_type'] = "success";
                    header('location: frontpage_owner.php');
                }
        
                else{
                    echo "ERROR: ", $sql_query, " ", mysqli_error($conn);
                }
                mysqli_close($conn);
        }
    }
?>