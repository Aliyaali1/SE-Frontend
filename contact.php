<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Document</title>
</head>
<div class="topnav">
        <a class="active" href="homepage_admin.php">Home</a>
        <a href="#news">News</a>
        <a href="contact.php">Contact</a>
        <a href="about.php">About</a>
        <a href="main.php" style="margin-left: 345px;">Sign out</a>
      </div>
<body>
    <div class="contact">Contact Us</div>
<div class="container">
  <form action="action_page.php">

    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="Pakistan">Pakistan</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <a href="homepage_admin.php"><label for="subject">Subject</label></a>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>
</body>
</html>