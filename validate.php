<?php
    function getCurrentCart(){
        if(isset($_SESSION['shop'])){
            return new Cart($_SESSION['shop']);
        }else{
            $cart = new cart();
            $cart->UserId = 0;
            $cart -> save();
            $_SESSION['cartId'] = $cart->id;
            return $cart;

        }

    }
?>