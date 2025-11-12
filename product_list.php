<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product List</title>
  <?php include "parts/meta.php"; ?>
</head>
<body>

  <?php include "parts/navbar.php"; ?>

  <div class="container">
    <div class="card soft">
      <h2>Product List</h2>

      <?php
      include_once "lib/php/function.php";
      include_once "parts/templates.php";

      $result = makeQuery(
        makeConn(),
        "
        SELECT * 
        FROM `products`
        ORDER BY `date_create` DESC
        LIMIT 15
        "
      );

      echo "<div class='grid gap'>";
      echo array_reduce($result, 'productListTemplate');
      echo "</div>";
      ?>

    </div>
  </div>

</body>
</html>
