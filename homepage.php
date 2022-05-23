<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="homepage.css">
</head>
    <body>
        <div class="topnav">
            <a class="active" href="#home">Home</a>
            <a href="#news">News</a>
            <a href="contact.php">Contact</a>
            <a href="about.php">About</a>
            <a href="main.php" style="margin-left: 345px;">Sign out</a>
        </div>
        <div class="heading">Rent A Car</div>
        <div id="content">
            <?php
                $db = mysqli_connect("localhost", "root", "", "car_rental");
                $sql = "SELECT * FROM car_details";
                $result = mysqli_query($db, $sql);
                // <button>Delete</button>
                while ($row = mysqli_fetch_array($result)) {
                    
                    echo "<div id='img_div'>";
                    echo "<img src='images/".$row['image']."' >";
                    echo "<p>".$row['text']."</p>";
                    echo "<button id='b1' onclick='myFunction()'>Book Me</button>";
                    // echo "function myFunction() {document.getElementById("b1").innerHTML = "Booked";}";
                    echo "</div>";
      
                }
                echo '<script>function myFunction(){document.getElementById("b1").innerHTML = "Booked";}</script>';
                    
            ?>
            
            
        </div>
    </body>
</html>