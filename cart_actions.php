<?php

include_once "lib/php/function.php";


switch($_GET['action']) {
    case "add-to-cart":

        $id = intval($_POST['product-id']);
        $amount = intval($_POST['product-amount']);
        if($amount < 1) $amount = 1;

        $color = isset($_POST['product-color']) ? $_POST['product-color'] : "";

        addToCart($id, $amount, $color);

        header("location:product_added_to_cart.php?id=$id");
        break;



    case "update-cart-item":

        $id = intval($_POST['id']);
        $amount = intval($_POST['amount']);
        if($amount < 1) $amount = 1;

        updateCartItem($id, $amount);

        header("location:cart_review.php");
        break;



    case "delete-cart-item":

        $id = intval($_POST['id']);
        deleteCartItem($id);

        header("location:cart_review.php");
        break;


    case "reset-cart":

        resetCart();
        header("location:cart_review.php");
        break;


    default:
        die("Incorrect Action");
}


?>
