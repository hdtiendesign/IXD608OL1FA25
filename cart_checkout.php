<?php
include_once "lib/php/function.php";

$cart_items = getCartItems();

$subtotal = array_reduce($cart_items,function($r,$o){
    return $r + $o->total;
},0);

$tax = $subtotal * 0.10;
$total = $subtotal + $tax;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart Checkout</title>
    <?php include "parts/meta.php"; ?>
</head>
<body>

<?php include "parts/navbar.php"; ?>

<div class="container">
    <div class="card soft">
        <h2>Cart Checkout</h2>

        <?php if(count($cart_items)): ?>

            <!-- Totals box -->
            <div class="card soft" style="margin-bottom:2em; padding:1.2em;">
                <div class="display-flex" style="margin-bottom:0.5em;">
                    <div class="flex-stretch">Subtotal</div>
                    <div class="flex-none">$<?= number_format($subtotal,2) ?></div>
                </div>

                <div class="display-flex" style="margin-bottom:0.5em;">
                    <div class="flex-stretch">Tax (10%)</div>
                    <div class="flex-none">$<?= number_format($tax,2) ?></div>
                </div>

                <div class="display-flex" style="font-weight:bold;">
                    <div class="flex-stretch">Total</div>
                    <div class="flex-none" style="color:#b23d33;">
                        $<?= number_format($total,2) ?>
                    </div>
                </div>
            </div>

            <!-- Address Form -->
            <form>
                <h3>Address</h3>

                <div class="form-control">
                    <label class="form-label">Street</label>
                    <input type="text" class="form-input" placeholder="Street">
                </div>

                <div class="form-control">
                    <label class="form-label">City</label>
                    <input type="text" class="form-input" placeholder="City">
                </div>

                <div class="form-control">
                    <label class="form-label">State</label>
                    <input type="text" class="form-input" placeholder="State">
                </div>

                <div class="form-control">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-input" placeholder="Zip Code">
                </div>

                <div class="form-control">
                    <label class="form-label">Country</label>
                    <input type="text" class="form-input" placeholder="Country">
                </div>
            </form>

            <!-- Payment Form -->
            <form style="margin-top:2em;">
                <h3>Credit/Debit Card</h3>

                <div class="form-control">
                    <label class="form-label">Name On Card</label>
                    <input type="text" class="form-input" placeholder="Name On Card">
                </div>

                <div class="form-control">
                    <label class="form-label">Card Number</label>
                    <input type="text" class="form-input" placeholder="Card Number">
                </div>

                <div class="form-control">
                    <label class="form-label">Expiration</label>
                    <input type="text" class="form-input" placeholder="MM/YY">
                </div>

                <div class="form-control">
                    <label class="form-label">CVV</label>
                    <input type="text" class="form-input" placeholder="CVV">
                </div>

                <div class="form-control">
                    <label class="form-label">Zip Code</label>
                    <input type="text" class="form-input" placeholder="Zip Code">
                </div>
            </form>

            <!-- Confirm Button -->
            <div class="form-control" style="margin-top:2em;">
                <a href="purchase_confirm.php" class="form-button">Confirm Purchase</a>
            </div>

        <?php else: ?>

            <p>Your cart is empty.</p>
            <a href="product_list.php" class="form-button">Back to Store</a>

        <?php endif; ?>

    </div>
</div>

</body>
</html>
