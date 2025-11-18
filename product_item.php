<?php
include_once "lib/php/function.php";

$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $product->name ?></title>
    <?php include "parts/meta.php"; ?>
</head>
<body class="store-page">

<?php include "parts/navbar.php"; ?>

<div class="container">
    <div class="card soft">

      <div class="grid gap">
        
        <div class="col-xs-12 col-md-6">
          <img src="img/<?= $product->thumbnail ?>" alt="<?= $product->name ?>" style="width:100%; border-radius:0.5em;">
        </div>

        <div class="col-xs-12 col-md-6 product-info">
          <h2><?= $product->name ?></h2>

          <div class="price" style="font-weight:700; color:var(--color-main-dark); font-size:1.2em;">
            $<?= $product->price ?>
          </div>

          <p><?= $product->description ?></p>

          <form action="cart_actions.php?action=add-to-cart" method="post" style="margin-top:1em;">

            <input type="hidden" name="product-id" value="<?= $product->id ?>">
            <input type="hidden" name="product-color" value="">

            <!-- Condition -->
            <div class="form-select" style="max-width:200px; margin-bottom:1em;">
              <label class="form-label">Condition</label>
              <select name="product-condition">
                <option value="New">New</option>
                <option value="Used - Like New">Used – Like New</option>
                <option value="Used - Good">Used – Good</option>
                <option value="Used - Fair">Used – Fair</option>
              </select>
            </div>

            <!-- Quantity -->
            <div class="form-select" style="max-width:150px; margin-bottom:1em;">
              <label class="form-label">Quantity</label>
              <select name="product-amount">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

            <button class="form-button">Add to Cart</button>

          </form>

        </div>
      </div>

    </div>
</div>

</body>
</html>
