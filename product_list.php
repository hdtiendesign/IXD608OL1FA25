<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product List</title>
  <?php include "parts/meta.php"; ?>
</head>
<body class="store-page">

<?php include "parts/navbar.php"; ?>

<div class="container">
  <div class="card soft">
    <h2>Product List</h2>

    <!-- SEARCH BAR -->
    <div class="form-control">
        <form class="hotdog" id="product-search">
            <input type="search" placeholder="Search Products">
            <span type="button">&equiv;</span>
        </form>
    </div>

    <div class="form-control">
        <div class="display-flex flex-align-center flex-justify-between">

            <!-- FILTER BUTTONS -->
            <div class="display-flex" style="gap:0.5em;">
                <button data-filter="category" data-value="" type="button" class="form-button">All</button>
                <button data-filter="category" data-value="plushie" type="button" class="form-button">Plushie</button>
                <button data-filter="category" data-value="card" type="button" class="form-button">Card</button>
            </div>

            <!-- SORT DROPDOWN -->
            <div class="form-select" style="min-width:180px;">
                <select class="js-sort" style="min-width:180px;">
                    <option value="1">Newest</option>
                    <option value="2">Oldest</option>
                    <option value="3">Price Low to High</option>
                    <option value="4">Price High to Low</option>
                </select>
            </div>

        </div>
    </div>

    <div class="productlist grid gap"></div>

  </div>
</div>

<script src="/IXD608OL1FA25/js/templates.js"></script>
<script src="/IXD608OL1FA25/js/product_list.js"></script>

</body>
</html>
