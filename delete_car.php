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

    if (isset($_POST['Delete_Car'])){
        $id = $_POST['$row['id']'];

        $sql_query = "DELETE FROM `car_details` WHERE id = $id";
        $result = $conn->query($sql_query);
        $conn -> close();
?>