<?php
    session_start();
    include "Header.php";
     if(isset($_POST["add"])){
        if(isset($_SESSION['shop'])){
            $item_array_id = array_column($_SESSION["shop"], 'id');
            if(!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["shop"]);
                    $item_array = array(
                    'product_id' => $_GET['id'],
                    'item_name' => $_POST['hidden_name'],
                    'price' => $_POST['hidden_price'],
                    'quantity' => $_POST['quantity'],
                     );
                     $_SESSION["shop"][$count] = $item_array;
            }else
            {
                echo '<script>alert("Item Already Added")</script>';
            }
        }else
        {
            $item_array = array (
                'product_id' => $_GET['id'],
                'item_name' => $_POST['hidden_name'],
                'price' => $_POST['hidden_price'],
                'quantity' => $_POST['quantity'],
               );
            $_SESSION["shop"][0] = $item_array;
            }
        }
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shop"] as $keys => $values)
        {
            if($values["product_id"] == $_GET["id"])
            {
                unset($_SESSION["shop"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>
<h3 class="title_cart">Cos de cumparaturi</h3>
<div class="table_responsive">
    <table class="table_cart">
    <tr>
        <th>Produs</th>
        <th>Cantitate</th>
        <th>Detalii Pret</th>
        <th>Total Pret</th>
        <th>Sterge Produsul</th>
    </tr>
    <?php
    if(!empty($_SESSION['shop'])) {
        $total = 0;
        foreach ($_SESSION['shop'] as $key => $value) {
    ?>
        <tr>
            <td><?php echo $value['item_name'];?></td>
            <td><?php echo $value['quantity'];?></td>
            <td><?php echo $value['price'];?></td>
            <td><?php echo number_format($value['quantity'] * $value['price'],2);?></td>
            <td><a href="cart.php?action=delete&id=<?php echo $value['product_id'];?>"<span class="text-danger">Remove Item</span></td>
        </tr>
    <?php
            $total = $total + ($value['quantity'] * $value['price']);

    ?>
        <tr>
            <td colspan="3" >Total</td><br>
            <th ><?php $lei =' Ron';
                echo number_format($total, 2).$lei;
        }
                ?>
        </th>

        </tr>
    <?php
        }
    ?>
    </table>
</div>
