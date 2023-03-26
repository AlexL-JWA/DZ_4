<?php
/**
 * Form handler login.
 */

session_start();

/**
 * SALT PSWD.
 */
const SALT_PSWD = '$5$rounds=5000$usesomesillystringforsalt$';

/**
 * Home url.
 */
const MAIN_PAGE_URL = 'http://localhost/dz_4/';

/**
 * Form url.
 */
const FORM_URL = 'http://localhost/dz_4/from.php';

/**
 * Login handler.
 *
 * @return void
 */
function login_handler(): void
{
    $email = !empty($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : null;
    $pswd = !empty($_POST['pswd']) ? filter_var($_POST['pswd'], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;

    if (!$email) {
        $_COOKIE['error'] = 'No valid Email';
        setcookie('error', 'No valid Email', time() + 3600);
    }

    if (empty($pswd)) {
        $_COOKIE['error'] = 'Empty password';
        setcookie('error', 'Empty password', time() + 3600);
    }

    if (validate_login($email, $pswd)) {

        $_COOKIE['login_user'] = 'true';
        setcookie('login_user', 'true', time() + 3600);

        unset($_COOKIE['error']);
        setcookie('error', 'true', time() - 360000);

        header('Location:' . MAIN_PAGE_URL);
    } else {
        $_COOKIE['error'] = 'Email or password not correct';
        setcookie('error', 'Email or password not correct', time() + 3600);
        header('Location:' . FORM_URL);
    }
}

/**
 * Validate user.
 *
 * @param string $email Email.
 * @param string $password Password.
 * @return bool
 */
function validate_login(string $email, string $password): bool
{
    $fp = fopen(__DIR__ . '/db/pwd.csv', 'r');

    while (($data = fgetcsv($fp)) !== FALSE) {
        if ($data[0] === $email && hash_equals($data[1], crypt($password, $data[1]))) {
            return true;
        }
    }
    fclose($fp);

    return false;
}

login_handler();