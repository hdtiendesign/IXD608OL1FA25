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

          <!-- Add to Cart -->
          <form action="cart_actions.php?action=add-to-cart" method="post" style="width:100%;">

            <input type="hidden" name="product-id" value="$o->id">
            <input type="hidden" name="product-color" value="">

            <div class="form-select" style="width:90px; margin:0;">
              <select name="product-amount">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

            <button class="form-button sm" style="width:100%; margin-top:0.6em;">
              Add to Cart
            </button>
          </form>

        </div>
      </figcaption>
    </figure>
  </div>
HTML;
}



function selectAmount($amount=1,$total=10) {
    $output = "<select name='amount'>";
    for($i=1;$i<=$total;$i++) {
        $selected = $i==$amount ? "selected" : "";
        $output .= "<option value='$i' $selected>$i</option>";
    }
    $output .= "</select>";
    return $output;
}



function cartListTemplate($r,$o){

    $totalfixed = number_format($o->total, 2, '.', '');

    $options = "";
    for($i=1; $i<=5; $i++) {
        $sel = $i == $o->amount ? "selected" : "";
        $options .= "<option value='$i' $sel>$i</option>";
    }

return $r.<<<HTML
<div class="display-flex card-section" style="align-items:center; gap:1em;">

    <div class="flex-none images-thumbs">
        <img src="img/$o->thumbnail" style="width:80px; border-radius:0.3em;">
    </div>

    <div class="flex-stretch">
        <strong>$o->name</strong>

        <form action="cart_actions.php?action=delete-cart-item" method="post" style="margin-top:0.5em;">
            <input type="hidden" name="id" value="$o->id">
            <button class="form-button sm" style="padding:0.3em 0.8em;">Delete</button>
        </form>
    </div>

    <div class="flex-none" style="text-align:right;">
        &dollar;$totalfixed

        <form action="cart_actions.php?action=update-cart-item" method="post" style="margin-top:0.5em;">
            <input type="hidden" name="id" value="$o->id">

            <div class="form-select" style="width:70px; margin:0;">
              <select name="amount" onchange="this.form.submit()">
                $options
              </select>
            </div>

        </form>
    </div>

</div>
HTML;
}



function cartTotals() {

    $cart = getCartItems();

    // subtotal
    $cartprice = array_reduce($cart, function($r,$o){
        return $r + $o->total;
    }, 0);

    $cartfixed = number_format($cartprice, 2, '.', '');

    // tax
    $tax = number_format($cartfixed * 0.1, 2, '.', '');

    // total
    $total = number_format($cartfixed + $tax, 2, '.', '');

return <<<HTML

  <div class="card-section display-flex">
    <div class="flex-stretch"><strong>Sub Total</strong></div>
    <div class="flex-none">&dollar;$cartfixed</div>
  </div>

  <div class="card-section display-flex">
    <div class="flex-stretch"><strong>Tax (10%)</strong></div>
    <div class="flex-none">&dollar;$tax</div>
  </div>

  <div class="card-section display-flex" style="font-size:1.1em;">
    <div class="flex-stretch"><strong>Total</strong></div>
    <div class="flex-none">&dollar;$total</div>
  </div>

HTML;
}

?>
