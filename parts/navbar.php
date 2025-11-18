<?php

include_once "lib/php/function.php";

?>

<header class="navbar">
    <div class="container display-flex">

        <div class="flex-none">
            <h1>PokéArchive</h1>
        </div>

        <div class="flex-stretch"></div>

        <nav class="nav nav-flex flex-none">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="product_list.php">Products</a></li>
                <li><a href="about.php">About</a></li>

                <li>
                    <a href="cart_review.php" class="display-inline-flex" style="gap:0.3em; align-items:center;">
                        <span>Cart</span>

                        <?php if(makeCartBadge() != ""): ?>
                            <span class="badge"><?= makeCartBadge(); ?></span>
                        <?php endif; ?>

                    </a>
                </li>

            </ul>
        </nav>

    </div>
</header>
