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
<body>

  <?php include "parts/navbar.php"; ?>

  <div class="container">
    <div class="card soft">

      <div class="grid gap">
        <!-- Left column: product image -->
        <div class="col-xs-12 col-md-6">
          <img src="img/<?= $product->thumbnail ?>" alt="<?= $product->name ?>" style="width:100%; border-radius:0.5em;">
        </div>

        <!-- Right column: product info -->
        <div class="col-xs-12 col-md-6 product-info">
          <h2 style="margin:0;"><?= $product->name ?></h2>
          <div class="price" style="font-weight:700; color:var(--color-main-dark); font-size:1.2em;">
            $<?= $product->price ?>
          </div>
          <p style="line-height:1.5em;"><?= $product->description ?></p>

          <!-- Quantity selector -->
          <div class="form-select" style="max-width:150px;">
            <label for="quantity" class="form-label">Quantity</label>
            <select id="quantity" name="quantity">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

		<a href="product_added_to_cart.php?id=<?= $product->id ?>" class="form-button" style="align-self:flex-start;">Add to Cart</a>

        </div>
      </div>

    </div>
  </div>

</body>
</html>
