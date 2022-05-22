<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Login / Sign Up Form</title>
    <link rel="shortcut icon" href="/assets/favicon.ico">
    <link rel="stylesheet" href="create_renter.css">
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
   
        <form class="renter" id="createAccount" action="login_admin.php" method="post">
            <h1 class="form__title" style="font-size: 56px;">Create Account as Admin</h1>
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
            <button class="form__button" type="submit" name="create_account">Continue</button>

            <p class="form__text">
                <a class="form__link" href="frontpage_Admin.php" id="linkLogin" style="font-size: 34px;">Already have an account? Sign in</a>
            </p>
        </form>
    </body>