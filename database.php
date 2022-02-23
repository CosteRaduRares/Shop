<?php

session_start();

// initializing variables
$username = "";
$email = "";
$password="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'php_login');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $re_password = mysqli_real_escape_string($db, $_POST['re-password']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if ($password != $re_password) {
        $errors[] = "The two passwords do not match";
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM php_login.users WHERE username ='$username' OR password='$password' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $errors[] = "Username already exists";
        }

        if ($user['email'] === $email) {
            $errors[] = "email already exists";
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = sha1($password);//encrypt the password before saving in the database
        $query = "INSERT INTO php_login.users (username, email, password) VALUES('$username','$email','$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: ');
    }
}



?>

