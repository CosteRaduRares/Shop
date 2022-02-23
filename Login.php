<?php
include ('database.php');
?>
<html lang="en">
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<style>
    body {
        background-image: url('image/bannerCasaCoste.jpeg');
    }
</style>
<div class="Register">
    <h1 id="log_test">Logare</h1>
        <form method="post" action="Login.php">

            <?php include ('errors.php');?>

            <?php if (isset($_POST['login'])) {
                $username = mysqli_real_escape_string($db, $username);
                $password = mysqli_real_escape_string($db, $password);

                if (empty($username)) {
                    $errors[] = "Username is required";
                }
                if (empty($password)) {
                    $errors[] = "Password is required";
                }

                if (count($errors) == 0) {
                    $password = sha1($password);
                    $query = "SELECT * FROM php_login.users WHERE username ='$username' AND password = sha1($password)";
                    $results = mysqli_query($db, $query);
                    if (mysqli_num_rows($results) == 1) {
                        $_SESSION['username'] = $username;
                        $_SESSION['success'] = "You are now logged in";
                        header('location: index.php');
                    }else {
                        $errors[] = "Wrong username/password combination";
                    }
                }
            }?>
            <label>
        <input type="text" alt="text" placeholder="Nume"><br>
        <input type="password" alt="password" placeholder="Parola"><br>
        <input class="remember" type="checkbox" alt="checkbox" name="remember"><code id="remember">Salvează datele de logare</code><br>
        <button type="submit" class="submit" name="login">Logare</button>
            </label>
        </form>
</div>
</body>
</html>