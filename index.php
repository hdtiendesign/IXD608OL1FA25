<?php

include_once "lib/php/function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>PokéArchive</title>

  <?php include "parts/meta.php"; ?>

</head>
<body class="store-page">

  <?php include "parts/navbar.php"; ?>

  <div class="view-window" style="background-image:url('img/pokemon.png')">
    <div class="container text-center" style="padding:6em 0; color:white;">
      <h1>PokéArchive</h1>
      <p>From plush to cards, build your Pokémon collection here.</p>
    </div>
  </div>


  <div class="container" style="margin-top:3em;">
    <h1 class="text-center brand-title">Featured Products</h1>
    <div class="grid gap">
      
      <!-- Eevee -->
      <div class="col-xs-12 col-md-3">
        <figure class="figure product">
          <a href="product_item.php?id=1"><img src="img/eevee.jpg" alt="Eevee Plush"></a>
          <figcaption>
            <div class="caption-top">
              <div class="name"><a href="product_item.php?id=1">Eevee Plush 10"</a></div>
              <div class="favorite fav">
                <input type="checkbox" id="fav-eevee" class="hidden">
                <label for="fav-eevee">&hearts;</label>
              </div>
            </div>

            <div class="caption-bottom">
              <div class="price">$19.99</div>

              <form action="cart_actions.php?action=add-to-cart" method="post" style="margin:0;">
                <input type="hidden" name="product-id" value="1">
                <input type="hidden" name="product-color" value="">

                <!-- Condition -->
                <div class="form-select" style="margin-bottom:0.4em; max-width:140px;">
                  <select name="product-condition">
                    <option value="New">New</option>
                    <option value="Used - Like New">Used – Like New</option>
                    <option value="Used - Good">Used – Good</option>
                    <option value="Used - Fair">Used – Fair</option>
                  </select>
                </div>

                <!-- Quantity -->
                <div class="form-select" style="margin-bottom:0.5em; max-width:120px;">
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

      <!-- Espeon -->
      <div class="col-xs-12 col-md-3">
        <figure class="figure product">
          <a href="product_item.php?id=2"><img src="img/espeon.jpg" alt="Espeon Plush"></a>
          <figcaption>
            <div class="caption-top">
              <div class="name"><a href="product_item.php?id=2">Espeon Plush 10"</a></div>
              <div class="favorite fav">
                <input type="checkbox" id="fav-espeon" class="hidden">
                <label for="fav-espeon">&hearts;</label>
              </div>
            </div>

            <div class="caption-bottom">
              <div class="price">$19.99</div>

              <form action="cart_actions.php?action=add-to-cart" method="post" style="margin:0;">
                <input type="hidden" name="product-id" value="2">
                <input type="hidden" name="product-color" value="">

                <div class="form-select" style="margin-bottom:0.4em; max-width:140px;">
                  <select name="product-condition">
                    <option value="New">New</option>
                    <option value="Used - Like New">Used – Like New</option>
                    <option value="Used - Good">Used – Good</option>
                    <option value="Used - Fair">Used – Fair</option>
                  </select>
                </div>

                <div class="form-select" style="margin-bottom:0.5em; max-width:120px;">
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

      <!-- Umbreon -->
      <div class="col-xs-12 col-md-3">
        <figure class="figure product">
          <a href="product_item.php?id=3"><img src="img/umbreon.jpg" alt="Umbreon Plush"></a>
          <figcaption>
            <div class="caption-top">
              <div class="name"><a href="product_item.php?id=3">Umbreon Plush 10"</a></div>
              <div class="favorite fav">
                <input type="checkbox" id="fav-umbreon" class="hidden">
                <label for="fav-umbreon">&hearts;</label>
              </div>
            </div>

            <div class="caption-bottom">
              <div class="price">$19.99</div>

              <form action="cart_actions.php?action=add-to-cart" method="post" style="margin:0;">
                <input type="hidden" name="product-id" value="3">
                <input type="hidden" name="product-color" value="">

                <div class="form-select" style="margin-bottom:0.4em; max-width:140px;">
                  <select name="product-condition">
                    <option value="New">New</option>
                    <option value="Used - Like New">Used – Like New</option>
                    <option value="Used - Good">Used – Good</option>
                    <option value="Used - Fair">Used – Fair</option>
                  </select>
                </div>

                <div class="form-select" style="margin-bottom:0.5em; max-width:120px;">
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

      <!-- Vaporeon -->
      <div class="col-xs-12 col-md-3">
        <figure class="figure product">
          <a href="product_item.php?id=5"><img src="img/vaporeon.jpg" alt="Vaporeon Plush"></a>
          <figcaption>
            <div class="caption-top">
              <div class="name"><a href="product_item.php?id=5">Vaporeon Plush 10"</a></div>
              <div class="favorite fav">
                <input type="checkbox" id="fav-vaporeon" class="hidden">
                <label for="fav-vaporeon">&hearts;</label>
              </div>
            </div>

            <div class="caption-bottom">
              <div class="price">$19.99</div>

              <form action="cart_actions.php?action=add-to-cart" method="post" style="margin:0;">
                <input type="hidden" name="product-id" value="5">
                <input type="hidden" name="product-color" value="">

                <div class="form-select" style="margin-bottom:0.4em; max-width:140px;">
                  <select name="product-condition">
                    <option value="New">New</option>
                    <option value="Used - Like New">Used – Like New</option>
                    <option value="Used - Good">Used – Good</option>
                    <option value="Used - Fair">Used – Fair</option>
                  </select>
                </div>

                <div class="form-select" style="margin-bottom:0.5em; max-width:120px;">
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

    </div> 
  </div> 


  <div class="container" style="padding:4em 0;">
    <div class="about-card grid gap">

      <div class="col-xs-12 col-md-6 about-left">
        <h2>About PokéArchive</h2>
        <p>
          PokéArchive is a space dedicated to fans who love collecting,
          discovering, and celebrating Pokémon items. From plushies to cards
          and more, our goal is to bring joy to fans and collectors alike.
          Whether you are just starting or expanding your collection, you
          will find something here that sparks nostalgia and excitement.
        </p>

        <a href="about.php" class="about-btn">Learn More</a>
      </div>

      <div class="col-xs-12 col-md-6 about-right">
        <img src="img/pokemon_tcg.png" alt="About PokéArchive" class="about-image">
      </div>

    </div>
  </div>


</body>
</html>
