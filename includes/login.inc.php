<?php
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["pwd"];

    require_once 'db.inc.php';
    require_once 'functions.inc.php';

    if(emptyInput($username, $password) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if(userExists($conn, $username) === false) {
        header("location: ../index.php?error=usernameNotFound");
        exit();
    }
    loginUser($conn, $username, $password);
} else {
    header("location: ../index.php");
    exit();
}