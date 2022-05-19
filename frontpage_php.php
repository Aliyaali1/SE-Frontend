<?php
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

        $sql_query = "INSERT INTO user (username, email, password, confirm_password) VALUES ('$username', '$email', '$password_encrypted')";
        
        if (mysqli_query($conn, $sql_query)){
            echo "DETAILS ENTERED";
        }

        else{
            echo "ERROR: ", $sql, " ", mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>