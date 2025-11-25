const productListTemplate = templater(o => `
<div class="col-xs-12 col-md-4">
  <figure class="figure product">
    <a href="product_item.php?id=${o.id}">
      <img src="img/${o.thumbnail}" alt="${o.name}">
    </a>

    <figcaption>
      <div class="caption-top">
        <div class="name">${o.name}</div>
        <div class="favorite fav">
          <input type="checkbox" id="fav-${o.id}" class="hidden">
          <label for="fav-${o.id}">&hearts;</label>
        </div>
      </div>

      <div class="caption-bottom">
        <div class="price">$${Number(o.price).toFixed(2)}</div>

        <form action="cart_actions.php?action=add-to-cart" method="post" style="width:100%; margin:0;">
          <input type="hidden" name="product-id" value="${o.id}">
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
`);
