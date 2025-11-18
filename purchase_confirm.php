<?php

include_once "lib/php/function.php";

resetCart();

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Purchase Confirmation</title>
    
    <?php include "parts/meta.php"; ?>

</head>
<body>

<?php include "parts/navbar.php"; ?>

<div class="container">
    <div class="card soft">
        <h2>Purchase Confirmation</h2>

        <p>
            Thank you for your order! Your purchase has been successfully placed
            and is now being processed. You will receive a confirmation email shortly
            with your order details.
        </p>

        <div class="form-control" style="margin-top:1em;">
            <a href="index.php" class="form-button">Return to Home</a>
        </div>

    </div>
</div>
    
</body>
</html>
