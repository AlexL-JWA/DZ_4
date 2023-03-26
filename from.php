<?php
/**
 * Form login.
 */

session_start();

$error_message = '';

if (!empty($_COOKIE['error'])) {
    $error_message = $_COOKIE['error'];
}

?>
<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">

        </div>
        <div class="col gy-5">
            <?php if (!empty($error_message)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>
            <form method="post" action="/dz_4/from_handler.php">
                <div class="mb-3">
                    <label for="email-user" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email-user"
                           placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password-user" class="form-label">Password</label>
                    <input type="password" name="pswd" class="form-control" id="password-user">
                </div>
                <div class="mb-3">
                    <input class="form-check-input" type="checkbox" value="yes" id="remember-my">
                    <label class="form-check-label" for="remember-my">
                        Remember me
                    </label>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary mb-3" value="Login">
                </div>
            </form>
        </div>
        <div class="col">

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
