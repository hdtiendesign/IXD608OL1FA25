<?php
include_once "lib/php/function.php";
include_once "parts/templates.php";

$cart_items = getCartItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart Review</title>
    <?php include "parts/meta.php"; ?>
</head>
<body class="store-page">

<?php include "parts/navbar.php"; ?>

<div class="container" style="padding:3em 0;">
  <div class="card soft" style="max-width:700px; margin:0 auto;">

    <h2>Cart Review</h2>

    <?php if(count($cart_items)): ?>

      <div>
        <?php
          echo array_reduce($cart_items, "cartListTemplate");
        ?>
      </div>

      <div style="margin-top:2em;">
        <?= cartTotals() ?>
      </div>

    <?php else: ?>

      <p>Your cart is empty.</p>

      <div style="margin-top:2em;">
        <h3>Recommended Products</h3>
        <?php recommendedRandom(3); ?>
      </div>

    <?php endif; ?>

  </div>
</div>

</body>
</html>
