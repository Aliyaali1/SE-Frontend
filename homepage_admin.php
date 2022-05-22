<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "car_rental");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO car_details (image, text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
//   $result = mysqli_query($db, "SELECT * FROM car_details");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="homepage_admin.css">
    <style> <?php include 'homepage_admin.css'; ?> </style>
</head>
<div class="topnav">
        <a class="active" href="hompage_admin.php">Home</a>
        <a href="#news">News</a>
        <a href="contact.php">Contact</a>
        <a href="about.php">About</a>
        <a href="main.php" style="margin-left: 345px;">Sign out</a>
      </div>
      <div class="up">Welcome Back Admin!</div>
<body>

    <div id="content">
    <?php
        $db = mysqli_connect("localhost", "root", "", "car_rental");
        $sql = "SELECT * FROM car_details";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {            
            echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."' >";
            echo "<p>".$row['text']."</p>";
            echo "</div>";
            echo "<button id='b1' >Update</button>";
            echo "<button id='b2'>Status</button>";
            echo "<button id='b3'>Delete</button>";           
            
            //echo "<a href='homepage_admin.php?' class='btn'>Delete</a>";
        }

     ?>
     
     <p class="newcar">Let's add a new car!</p>
        <form method="post"  style="padding: 13px;background: black;margin-left: 180px;" action="homepage_admin.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about this Car"></textarea>
            </div>
            <div>
                <input type="submit" style="border: 4px solid white;background: #009579;padding: 6px;font-size: 22px;font-weight: 800;margin-left: 32px;" name="upload" value="Add Car Image Here">
            </div>
        </form>
    </div>
</body>
</html>