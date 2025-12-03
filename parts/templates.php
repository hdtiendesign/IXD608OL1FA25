<?php

function productListTemplate($r, $o) {
return $r.<<<HTML
  <div class="col-xs-12 col-md-4">
    <figure class="figure product">
      <a href="product_item.php?id=$o->id">
        <img src="img/$o->thumbnail" alt="$o->name">
      </a>

      <figcaption>
        <div class="caption-top">
          <div class="name">$o->name</div>
          <div class="favorite fav">
            <input type="checkbox" id="fav-$o->id" class="hidden">
            <label for="fav-$o->id">&hearts;</label>
          </div>
        </div>

        <div class="caption-bottom">
          <div class="price">\$$o->price</div>

          <form action="cart_actions.php?action=add-to-cart" method="post" style="width:100%; margin:0;">
            <input type="hidden" name="product-id" value="$o->id">
            <input type="hidden" name="product-color" value="">

            <div class="form-select" style="width:100%; margin-bottom:0.6em;">
              <select name="product-condition">
                <option value="New">New</option>
                <option value="Used - Like New">Used – Like New</option>
                <option value="Used - Good">Used – Good</option>
                <option value="Used - Fair">Used – Fair</option>
              </select>
            </div>

            <div class="form-select" style="width:90px; margin-bottom:0.6em;">
              <select name="product-amount">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

            <button class="form-button sm">Add to Cart</button>
          </form>

        </div>
      </figcaption>
    </figure>
  </div>
HTML;
}



function cartListTemplate($r,$o){

    $options = "";
    for($i=1;$i<=5;$i++){
        $sel = $i==$o->amount ? "selected" : "";
        $options .= "<option value='$i' $sel>$i</option>";
    }

    $totalfixed = number_format($o->total,2,'.','');

return $r.<<<HTML
<div class="display-flex card-section" style="align-items:center; gap:1em;">
    <div class="flex-none images-thumbs">
        <img src="img/$o->thumbnail" style="width:80px; border-radius:0.3em;">
    </div>

    <div class="flex-stretch">
        <strong>$o->name</strong><br>
        Condition: <strong>$o->condition</strong>

        <form action="cart_actions.php?action=delete-cart-item" method="post" style="margin-top:0.5em;">
            <input type="hidden" name="id" value="$o->id">
            <button class="form-button sm" style="padding:0.3em 0.8em;">Delete</button>
        </form>
    </div>

    <div class="flex-none" style="text-align:right;">
        &dollar;$totalfixed

        <form action="cart_actions.php?action=update-cart-item" method="post" style="margin-top:0.5em;">
            <input type="hidden" name="id" value="$o->id">

            <select name="amount" class="form-select" style="max-width:70px;" onchange="this.form.submit()">
                $options
            </select>
        </form>
    </div>

</div>
HTML;
}



function cartTotals() {

    $cart = getCartItems();
    if(!count($cart)) return "";

    $subtotal = array_reduce($cart, fn($r,$o)=>$r+$o->total, 0);

    $sub = number_format($subtotal,2,'.','');
    $tax = number_format($sub * 0.1,2,'.','');
    $total = number_format($sub + $tax,2,'.','');

return <<<HTML

  <div class="card-section display-flex">
    <div class="flex-stretch"><strong>Sub Total</strong></div>
    <div class="flex-none">&dollar;$sub</div>
  </div>

  <div class="card-section display-flex">
    <div class="flex-stretch"><strong>Tax (10%)</strong></div>
    <div class="flex-none">&dollar;$tax</div>
  </div>

  <div class="card-section display-flex" style="font-size:1.1em;">
    <div class="flex-stretch"><strong>Total</strong></div>
    <div class="flex-none">&dollar;$total</div>
  </div>

  <div class="card-section" style="text-align:right; margin-top:1em;">
    <a href="cart_checkout.php" class="form-button">Proceed to Checkout</a>
  </div>

HTML;
}



function recommendedProducts($items) {
    echo "<div class='grid gap'>";
    $out = "";
    foreach($items as $o) {
        $out = productListTemplate($out, $o);
    }
    echo $out;
    echo "</div>";
}



function recommendedCategory($category, $limit=3) {
    $conn = makeConn();
    $category = trim(strtolower($category));
    $result = makeQuery($conn,
        "SELECT * FROM `products`
         WHERE LOWER(`category`)='$category'
         ORDER BY RAND()
         LIMIT $limit"
    );
    recommendedProducts($result);
}



function recommendedSimilar($category, $id, $limit=3) {
    $conn = makeConn();
    $category = trim(strtolower($category));
    $result = makeQuery($conn,
        "SELECT * FROM `products`
         WHERE LOWER(`category`)='$category'
         AND `id` <> $id
         ORDER BY RAND()
         LIMIT $limit"
    );
    recommendedProducts($result);
}

?>
