<?php

//
//if (!isset($_SESSION['username'])) {
//    $_SESSION['msg'] = "You must log in first";
//    header('location: login.php');
//}
//if (isset($_GET['logout'])) {
//    session_destroy();
//    unset($_SESSION['username']);
//    header("location: login.php");
//}
?>
<!Doctype>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Casa Coste For Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

     <?php
    include "Header.php";
    ?>

                   <div class="img_center_banner">
                       <img class="imgbanner" src="image/banner2.jpeg" border="0" alt="Banner">
                   </div>
             <h4 align="center">CELE MAI NOI PRODUSE</h4>
             <form method="post" action="#">
                 <div class="content">
                     <!-- notification message -->
                     <?php if (isset($_SESSION['success'])) : ?>
                         <div class="error success" >
                             <h3>
                                 <?php
                                 echo $_SESSION['success'];
                                 unset($_SESSION['success']);
                                 ?>
                             </h3>
                         </div>
                     <?php endif ?>

                     <!-- Logged in user information -->
                     <?php  if (isset($_SESSION['username'])) : ?>
                         <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                         <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
                     <?php endif ?>
                 </div>
                                <div class="row">
                                    <div class="column">
                                        <div class="card">
                                            <img src="image/cameraPerna1.jpeg" alt="img1">
                                            <h3>Perne</h3>
                                            <p>Perne umplute cu puf</p>
                                            <p>Perne umplute cu material anti-alergenic</p>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <div class="card">
                                            <img src="image/cameraPerna2.jpeg" alt="img2">
                                            <h3>Pilote</h3>
                                            <p>Pilote umplute cu puf</p>
                                            <p>Pilote umplute cu material anti-alergenic</p>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <div class="card">
                                            <img src="image/cameraPerna3.jpeg" alt="img3">
                                            <h3>Diverse</h3>
                                            <p>Diverse articole umplute cu puf</p>
                                            <p>Diverse articole umplute cu...</p>
                                        </div>
                                    </div>

                                    <div class="column">
                                        <div class="card">
                                            <img src="image/cameraPerna4.jpeg" alt="img4">
                                            <h3>Articole pentru copii</h3>
                                            <p>Articole pentru copii umplute cu puf</p>
                                            <p>Articole pentru copii umplute cu ...</p>
                                        </div>
                                    </div>
                                </div>
                    </form>
</body>
</html>