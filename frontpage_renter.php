<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="frontpage_renter.css">
</head>
<body>
    <?php require_once 'frontpage_php.php';?>

    <?php
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        $myMessage= addslashes($_SESSION["message"]);
        echo "<script type='text/javascript'>alert('$myMessage');</script>";
        unset($_SESSION['message']);
    ?>
    </div>
    <?php endif ?>
    
    <div class="container">
        <div class="owner">Rent A Car</div>
        <form class="form" id="login" action="frontpage_php.php" method="post">
            <h1 class="form__title">Welcome Back!</h1>
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <input type="text" class="form__input" autofocus placeholder="Username or email" name="login_input">
                <div class="form__input-error-message"></div>
            </div>
            <div class="form__input-group">
                <input type="password" class="form__input" autofocus placeholder="Password" name="user_password">
                <div class="form__input-error-message"></div>
            </div>
            <button class="form__button" type="submit" name="user_login">Login</button>
            <p class="form__text">
                <a href="#" class="form__link">Forgot your password?</a>
            </p>
            <p class="form__text">
                <a class="form__link" href="create_renter.php" id="linkCreateAccount">Don't have an account? Create account</a>
            </p>
        </form>
        
    </div>
    <script src="frontpage.js"></script>
</body>