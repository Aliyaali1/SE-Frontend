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
</head>
<div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="signout" style="margin-left: 345px;">Sign out</a>
      </div>
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
        }
     ?>
        <form method="post" action="homepage_admin.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about this Car"></textarea>
            </div>
            <div>
                <input type="submit" name="upload" value="upload image">
            </div>
        </form>
    </div>
</body>
</html>