<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="create_owner.css">

</head>
<body>
    <?php require_once 'frontpage_php.php';?>

    <?php
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
    <?php endif ?>
    
    <form class="owner" id="createAccount" action="frontpage_php.php" method="post">
        <h1 class="form__title" style="font-size: 56px;">Create Account as Renter</h1>
        <div class="form__message form__message--error"></div>
        <div class="form__input-group">
            <input type="text" id="signupUsername" class="form__input" autofocus placeholder="Username" name="username">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="text" class="form__input" autofocus placeholder="Email Address" name="email">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" autofocus placeholder="Password" name="password">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" class="form__input" autofocus placeholder="Confirm password" name="confirm_password">
            <div class="form__input-error-message"></div>
        </div>
        <button class="form__button" type="submit" name="create_account">Create Account</button>
        <p class="form__text">
            <a class="form__link" href="frontpage_owner.php" id="linkLogin" style="font-size: 34px;">Already have an account? Sign in</a>
        </p>
    </form>    
</body>
</html>
