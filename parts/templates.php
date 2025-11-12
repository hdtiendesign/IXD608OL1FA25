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
          <a href="#" class="form-button sm">Add to Cart</a>
        </div>
      </figcaption>
    </figure>
  </div>
HTML;
}


function cartListTemplate($r,$o){
return $r.<<<HTML
<div class="display-flex">
	<div class="flex-none images-thumb">
		<img src="../img/$o->thumbnail">
	</div>
	<div class="flex-stretch"></div>
	<strong>$o->name</strong>
	<div>Delete</div>
</div>
	<div class="flex-none">
		&dollar;$o->price
	</div>

HTML;
}
