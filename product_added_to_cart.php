<?php
include_once "lib/php/function.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$product = makeQuery(
    makeConn(),
    "SELECT * FROM `products` WHERE `id`=$id"
);

$product = count($product) ? $product[0] : null;

$cart_item = cartItemById($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Added to Cart</title>
    <?php include "parts/meta.php"; ?>
</head>
<body>

<?php include "parts/navbar.php"; ?>

<div class="container" style="padding:3em 0;">
    <div class="card soft" style="max-width:600px; margin:0 auto;">

        <?php if($product): ?>
            <h2>You added <?= $product->name ?> to your cart.</h2>

            <?php if($cart_item): ?>
                <p>There are now <?= $cart_item->amount ?> of this item in your cart.</p>
            <?php endif; ?>

            <div class="display-flex" style="margin-top:2em;">
                <div class="flex-none">
                    <a href="product_list.php" class="form-button">Continue Shopping</a>
                </div>

                <div class="flex-stretch"></div>

                <div class="flex-none">
                    <a href="cart_review.php" class="form-button">Go To Cart</a>
                </div>
            </div>

        <?php else: ?>
            <h2>Product Not Found</h2>
            <a href="index.php" class="form-button">Return Home</a>
        <?php endif; ?>

    </div>
</div>

</body>
</html>
