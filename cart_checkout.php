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

      <div class="form-control" style="margin-top:2em;">
        <a href="purchase_confirm.php" class="form-button">Confirm Purchase</a>
      </div>

    </div>
  </div>
  
</body>
</html>
