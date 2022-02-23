<?php
    include "Header.php";
            $database_name = 'shop';
            $con = mysqli_connect('localhost', 'root', '',$database_name);
            if(!$con){
                die("Connection Failed...".mysqli_connect_error());
            }
            $query = "SELECT * FROM product ORDER BY id ASC";
             $result = mysqli_query($con,$query);
               if(mysqli_num_rows($result) > 0){
                 while ($row = mysqli_fetch_array($result)){
?>

<div class="container">
    <div class="col">
        <form method="post" action="cart.php?action=add&id=<?php echo $row ['id'];?>">
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
    <?php
                    }
               }
       ?>
</div>