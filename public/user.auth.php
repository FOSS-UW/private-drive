<?php

include 'hash.php';

/* file has been accessed without hitting submit at index.php */
if (empty($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

$user = $_POST['user'];
$password = $_POST['password'];

if (empty($user) || empty($password)) {
    header('Location: index.php');
    exit(1);
}

$comp_str = djb2($user) . " " . djb2($password) . "\n";
$users_file = fopen("../config/.user.rc", "r");

session_start();

if ($users_file == false) {
    $_SESSION['login_err'] = "Private Drive has not been initialized with a root user.";
    header('Location: index.php');
    exit(1);
}

while (!feof($users_file)) {
    if (fgets($users_file) == $comp_str) {
        $_SESSION['user'] = $user;
        header('Location: home.php');
        exit();
    }
}

$_SESSION['login_err'] = "Incorrect user or password.";

header('Location: index.php');
exit(1);
