<!DOCTYPE html>
<html lang="en">
<head>

	<title>PokéArchive</title>

	<?php include "parts/meta.php"; ?>


</head>
<body>

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
  	      <div class="col-xs-12 col-md-3">
  	        <figure class="figure product">
  	          <img src="img/eevee.jpg" alt="Eevee Plush">
  	          <figcaption>
  	            <div class="caption-top">
  	              <div class="name">Eevee Plush 10"</div>
  	              <div class="favorite fav">
  	                <input type="checkbox" id="fav-eevee" class="hidden">
  	                <label for="fav-eevee">&hearts;</label>
  	              </div>
  	            </div>
  	            <div class="caption-bottom">
  	              <div class="price">$19.99</div>
  	              <a href="#" class="form-button sm">Add to Cart</a>
  	            </div>
  	          </figcaption>
  	        </figure>
  	      </div>

  	      <div class="col-xs-12 col-md-3">
  	        <figure class="figure product">
  	          <img src="img/espeon.jpg" alt="Espeon Plush">
  	          <figcaption>
  	            <div class="caption-top">
  	              <div class="name">Espeon Plush 10"</div>
  	              <div class="favorite fav">
  	                <input type="checkbox" id="fav-espeon" class="hidden">
  	                <label for="fav-espeon">&hearts;</label>
  	              </div>
  	            </div>
  	            <div class="caption-bottom">
  	              <div class="price">$19.99</div>
  	              <a href="#" class="form-button sm">Add to Cart</a>
  	            </div>
  	          </figcaption>
  	        </figure>
  	      </div>

  	      <div class="col-xs-12 col-md-3">
  	        <figure class="figure product">
  	          <img src="img/umbreon.jpg" alt="Umbreon Plush">
  	          <figcaption>
  	            <div class="caption-top">
  	              <div class="name">Umbreon Plush 10"</div>
  	              <div class="favorite fav">
  	                <input type="checkbox" id="fav-umbreon" class="hidden">
  	                <label for="fav-umbreon">&hearts;</label>
  	              </div>
  	            </div>
  	            <div class="caption-bottom">
  	              <div class="price">$19.99</div>
  	              <a href="#" class="form-button sm">Add to Cart</a>
  	            </div>
  	          </figcaption>
  	        </figure>
  	      </div>

  	      <div class="col-xs-12 col-md-3">
  	        <figure class="figure product">
  	          <img src="img/vaporeon.jpg" alt="Vaporeon Plush">
  	          <figcaption>
  	            <div class="caption-top">
  	              <div class="name">Vaporeon Plush 10"</div>
  	              <div class="favorite fav">
  	                <input type="checkbox" id="fav-vaporeon" class="hidden">
  	                <label for="fav-vaporeon">&hearts;</label>
  	              </div>
  	            </div>
  	            <div class="caption-bottom">
  	              <div class="price">$19.99</div>
  	              <a href="#" class="form-button sm">Add to Cart</a>
  	            </div>
  	          </figcaption>
  	        </figure>
  	      </div>
  	    </div>
  	  </div>


  	  <div class="container" style="margin-top:4em;">
  	    <div class="card about-card">
  	      <div class="grid gap md-medium flex-align-center">
  	        <div class="col-xs-12 col-md-6">
  	          <h1 class="about-title">About PokéArchive</h1>
  	          <p>
  	            PokéArchive is a fun and welcoming online store for all Pokémon fans.
  	           	We offer a collection of plushies, cards, and collectibles that bring
  	            joy to fans and collectors alike. Whether you are just starting or expanding
  	            your collection, you will find something here that sparks nostalgia and excitement.
  	          </p>
				<a href="about.php" class="form-button sm learn-more">Learn More</a>
  	        </div>
  	        <div class="col-xs-12 col-md-6">
  	          	<img src="img/pokemon_tcg.png" alt="About PokéArchive" class="media-image" style="border-radius:0.3em;">
  	        </div>
  	      </div>
  	    </div>
  	  </div>

</body>
</html>