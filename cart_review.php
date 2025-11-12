<?php
include_once "lib/php/function.php";
include_once "parts/templates.php";

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$cart = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cart Review</title>
  <?php include "parts/meta.php"; ?>
</head>
<body>

  <?php include "parts/navbar.php"; ?>

  <div class="container">
    <div class="card soft">
      <h2>Cart Review</h2>

      <div class="grid gap">

        <!-- Left side: Product info -->
        <div class="col-xs-12 col-md-7">
          <?php
          echo array_reduce($cart, function($r, $o) {
            return $r.<<<HTML
              <div class="card soft" style="margin-bottom:1em;">
                <div class="display-flex flex-align-center gap">
                  <div class="flex-none" style="max-width:100px;">
                    <img src="img/$o->thumbnail" alt="$o->name" style="width:100%; border-radius:0.5em;">
                  </div>
                  <div class="flex-stretch" style="padding-left:1em;">
                    <h3 style="margin:0;">$o->name</h3>
                    <p style="color:var(--color-main-dark); font-weight:600;">\$$o->price</p>
                  </div>
                </div>
              </div>
            HTML;
          });
          ?>
        </div>

        <!-- Right side: Totals -->
        <div class="col-xs-12 col-md-5">
          <?php if(count($cart)) { 
            $subtotal = $cart[0]->price;
            $tax = $subtotal * 0.09;
            $total = $subtotal + $tax;
          ?>
          <div class="card soft flat">
            <div class="card-section display-flex">
              <div class="flex-stretch"><strong>Subtotal</strong></div>
              <div class="flex-none">\$<?= number_format($subtotal, 2) ?></div>
            </div>
            <div class="card-section display-flex">
              <div class="flex-stretch"><strong>Tax (9%)</strong></div>
              <div class="flex-none">\$<?= number_format($tax, 2) ?></div>
            </div>
            <div class="card-section display-flex">
              <div class="flex-stretch"><strong>Total</strong></div>
              <div class="flex-none"><strong>\$<?= number_format($total, 2) ?></strong></div>
            </div>
          </div>
          <?php } ?>

          <div class="form-control" style="margin-top:1em;">
            <a href="cart_checkout.php" class="form-button">Proceed to Checkout</a>
          </div>
        </div>

      </div>

    </div>
  </div>

</body>
</html>
