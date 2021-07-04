<?php

/* file has been accessed without hitting submit at index.php */
if (empty($_POST['submit'])) {
    header('Location: index.php');
    exit();
}

$user = $_POST['user'];
$password = $_POST['password'];

if (empty($user) || empty($password)) {
    header('Location: index.php');
    exit();
}

$test_string = 
