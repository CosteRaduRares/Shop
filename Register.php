<?php
    include ('database.php');
?>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="Register">
    <form method="post" action="Register.php">
        <?php include ('errors.php');?>
        <h1 id="log_test">Înregistrare</h1>
        <label>
            <input type="text" alt="text" name="username" value="<?php echo $username;?>" placeholder="Nume">
        </label><br>
        <label>
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
        </label><br>
        <label>
            <input type="password" alt="password" name="password" placeholder="Parola">
        </label><br>
        <label>
            <input type="password" alt="re-password" name="re-password" placeholder="Confirma Parola">
        </label><br>
        <button type="submit" name="reg_user" class="submit">Înregistrare</button>

    </form>
</div>
    <div class = container_signin>
        <p>Ai deja un cont existent?<a class="sign_in" href="Login.php">Logare</a></p>
    </div>
</body>
</html>


