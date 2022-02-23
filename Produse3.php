<div class="container">
    <div class="col-md-4">
        <form method="post" action="cart.php?action=add&id=<?php echo $row ['id'];?>">
            <div class="w3-card-4">

                <header class="w3-container w3-blue">
                    <h1>Header</h1>
                </header>

                <div class="w3-container">
                    <p>Lorem ipsum...</p>
                </div>

                <footer class="w3-container w3-blue">
                    <h5>Footer</h5>
                </footer>

            </div>
            <div class="product">
                <img src="<?php echo $row['image']; ?>" class="img-responsive" alt="product">
                <h5 class="text_info"><?php echo $row['name']; ?> </h5>
                <h5 class="text_danger"><?php echo $row['price']; ?> </h5>
                <label>
                    <input type="text" name="quantity" class="form_control" value="1">
                    <input type="hidden" name="hidden_name"  value="<?php echo $row ['name']; ?>">
                    <input type="hidden" name="hidden_price" class="form_control" value="<?php echo $row ['price'];?>">
                    <input type="submit" name="add" class="btn_success" value="Add to Cart">
                </label>
            </div>
        </form>
    </div>
<!--    --><?php
//                    }
//            }
//    ?>
</div>
div class="w3-card-4">

<header class="w3-container w3-blue">
    <h1>Header</h1>
</header>

<div class="w3-container">
    <p>Lorem ipsum...</p>
</div>

<footer class="w3-container w3-blue">
    <h5>Footer</h5>
</footer>

</div>
<?php
$db = 'php_login';
$con = mysqli_connect('localhost', 'root', '', $db);
if(!$con){
    die("Connection Failed :" . mysqli_connect_error());
}
$user = $passwd = $error = "";
$error_user = "<h3>User Required</h3>";
$error_passwd = "<h3>Password Required</h3>";

if (isset($_POST['submit'])) {
    if (empty($_POST['user'])) {
        $error_email = 'Error motherfucker';
        echo $error_email;
        $error_flag = false;
    } elseif (filter_var($_POST['user'])) {
        $error_user = "<h3>Invalid User</h3";
        echo $error_user;
        $error_flag = false;
    } else {
        $user = ($_POST['user']);
        $error_flag = true;
    }
    if (empty($_POST['passwd'])) {
        echo $error_passwd;
        $error_flag = false;
    } else {
        $len = strlen($_POST['passwd']);
        if ($len > 15 || $len < 3) {
            $error_passwd = '<h3>Password Must Between 3 and 15 Characters</h3>';
            echo $error_passwd;
            $error_flag = true;
        }
    }

    if ($error_flag = true) {
        $user_escape = mysqli_real_escape_string($con, $user);
        $query = "SELECT * FROM php_login.users WHERE name = $user_escape";
        $result = mysqli_query($con, $query);
        $row = $result;
        if ($row > 0) {
            $_SESSION["user_id"] = $row['id'];
            $home_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
            header("Location: " . $home_url);
        } else {
            $error = "Username or Password Not Match";
        }
    }
}


?>