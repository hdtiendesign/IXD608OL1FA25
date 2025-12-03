<?php
include "../lib/php/function.php";

$empty_product = (object)[
   "name"=>"Eevee Plush 10\"",
   "price"=>"19.99",
   "stock"=>"21",
   "category"=>"plushie",
   "description"=>"This Eevee plush is super soft and perfect for any Pokémon fan. It's about ten inches tall, easy to hug, and makes a cute addition to your collection or desk.",
   "thumbnail"=>"eevee.jpg",
   "images"=>"eevee.jpg"
];

try {
   $conn = makePDOConn();

   if(isset($_GET['action'])) {
      switch($_GET['action']) {

         case "update":
            $statement = $conn->prepare("
               UPDATE `products`
               SET 
                  `name`=?,
                  `price`=?,
                  `stock`=?,
                  `category`=?,
                  `description`=?,
                  `thumbnail`=?,
                  `images`=?,
                  `date_modify` = NOW()
               WHERE `id`=?
            ");

            $statement->execute([
               $_POST['name'],
               $_POST['price'],
               $_POST['stock'],
               $_POST['category'],
               $_POST['description'],
               $_POST['thumbnail'],
               $_POST['images'],
               $_GET['id']
            ]);

            header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
            break;

         case "create":
            $statement = $conn->prepare("
               INSERT INTO `products`
               (`name`,`price`,`stock`,`category`,`description`,`thumbnail`,`images`,`date_create`,`date_modify`)
               VALUES (?,?,?,?,?,?,?,NOW(),NOW())
            ");

            $statement->execute([
               $_POST['name'],
               $_POST['price'],
               $_POST['stock'],
               $_POST['category'],
               $_POST['description'],
               $_POST['thumbnail'],
               $_POST['images']
            ]);

            header("location:{$_SERVER['PHP_SELF']}");
            break;

         case "delete":
            $statement = $conn->prepare("DELETE FROM `products` WHERE `id`=?");
            $statement->execute([ $_GET['id'] ]);

            header("location:{$_SERVER['PHP_SELF']}");
            break;
      }
   }

} catch(PDOException $e) {
   die($e->getMessage());
}

function productListItem($r,$o) {
   $thumb_html = "";
   if($o->thumbnail != "") {
      $thumb_html = "<img src=\"../img/$o->thumbnail\" style=\"width:80px; height:80px; object-fit:contain; margin-right:1em;\">";
   }

return $r.<<<HTML
<div class="card soft" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1em;">
   <div style="display:flex; align-items:center;">
      $thumb_html
      <div>$o->name</div>
   </div>
   <a href="{$_SERVER['PHP_SELF']}?id=$o->id" class="form-button" style="width:120px; text-align:center;">Edit</a>
</div>
HTML;
}

function showProductPage($o) {

   $is_new = !isset($o->id);  
   $title = $is_new ? "Add New Product" : "Edit Product";

   if($is_new) {

return <<<HTML
<div style="display:flex; justify-content:space-between; margin-top:1.5em;">
   <a href="{$_SERVER['PHP_SELF']}" class="form-button" style="width:100px; text-align:center;">Back</a>
</div>

<div class="card soft" style="margin-top:1.5em;">
   <h2>$title</h2>

   <form method="post" action="{$_SERVER['PHP_SELF']}?action=create">

      <div class="form-control">
         <label class="form-label">Name</label>
         <input class="form-input" type="text" name="name" value="$o->name">
      </div>

      <div class="form-control">
         <label class="form-label">Price</label>
         <input class="form-input" type="number" step="0.01" name="price" value="$o->price">
      </div>

      <div class="form-control">
         <label class="form-label">Stock</label>
         <input class="form-input" type="number" name="stock" value="$o->stock">
      </div>

      <div class="form-control">
         <label class="form-label">Category</label>
         <input class="form-input" type="text" name="category" value="$o->category">
      </div>

      <div class="form-control">
         <label class="form-label">Description</label>
         <textarea class="form-input" name="description">$o->description</textarea>
      </div>

      <div class="form-control">
         <label class="form-label">Thumbnail</label>
         <input class="form-input" type="text" name="thumbnail" value="$o->thumbnail">
      </div>

      <div class="form-control">
         <label class="form-label">Other Images (comma-separated)</label>
         <input class="form-input" type="text" name="images" value="$o->images">
      </div>

      <button class="form-button" type="submit">Save Changes</button>

   </form>
</div>
HTML;
   }

   $thumb_html = "";
   if($o->thumbnail != "") {
      $thumb_html = "<img src=\"../img/$o->thumbnail\" style=\"width:120px; height:120px; object-fit:contain;\">";
   }

   $images_html = "";
   $image_list = array_filter(array_map("trim", explode(",", $o->images)));
   foreach($image_list as $img){
      $images_html .= "<img src=\"../img/$img\" style=\"width:80px; height:60px; object-fit:contain; margin-right:0.5em;\">";
   }

return <<<HTML
<div style="display:flex; justify-content:space-between; margin-top:1.5em;">
   <a href="{$_SERVER['PHP_SELF']}" class="form-button" style="width:100px; text-align:center;">Back</a>
   <a href="{$_SERVER['PHP_SELF']}?action=delete&id=$o->id" class="form-button" style="width:100px; text-align:center;">Delete</a>
</div>

<div class="grid gap" style="margin-top:1.5em;">

   <div class="col-xs-12 col-md-7">
      <div class="card soft">
         <h2>$o->name</h2>

         <div><strong>Price</strong><br>\$$o->price</div><br>
         <div><strong>Stock</strong><br>$o->stock</div><br>
         <div><strong>Category</strong><br>$o->category</div><br>
         <div><strong>Description</strong><br>$o->description</div><br>
         <div><strong>Thumbnail</strong><br>$thumb_html</div><br>
         <div><strong>Other Images</strong><br>$images_html</div>
      </div>
   </div>

   <div class="col-xs-12 col-md-5">
      <div class="card soft">
         <h2>Edit Product</h2>

         <form method="post" action="{$_SERVER['PHP_SELF']}?action=update&id=$o->id">

            <div class="form-control">
               <label class="form-label">Name</label>
               <input class="form-input" type="text" name="name" value="$o->name">
            </div>

            <div class="form-control">
               <label class="form-label">Price</label>
               <input class="form-input" type="number" step="0.01" name="price" value="$o->price">
            </div>

            <div class="form-control">
               <label class="form-label">Stock</label>
               <input class="form-input" type="number" name="stock" value="$o->stock">
            </div>

            <div class="form-control">
               <label class="form-label">Category</label>
               <input class="form-input" type="text" name="category" value="$o->category">
            </div>

            <div class="form-control">
               <label class="form-label">Description</label>
               <textarea class="form-input" name="description">$o->description</textarea>
            </div>

            <div class="form-control">
               <label class="form-label">Thumbnail</label>
               <input class="form-input" type="text" name="thumbnail" value="$o->thumbnail">
            </div>

            <div class="form-control">
               <label class="form-label">Other Images (comma-separated)</label>
               <input class="form-input" type="text" name="images" value="$o->images">
            </div>

            <button class="form-button" type="submit">Save Changes</button>

         </form>
      </div>
   </div>

</div>
HTML;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Product Admin Page</title>
   <?php include "../parts/meta.php"; ?>
</head>
<body>

<header class="navbar">
   <div class="container display-flex">
      <div class="flex-none"><h1>Product Admin</h1></div>
      <div class="flex-stretch"></div>
      <nav class="nav nav-flex flex-none">
         <ul>
            <li><a href="<?=$_SERVER['PHP_SELF']?>">Product List</a></li>
            <li><a href="<?=$_SERVER['PHP_SELF']?>?id=new">Add New Product</a></li>
         </ul>
      </nav>
   </div>
</header>

<div class="container">

<?php
if(isset($_GET['id'])) {
   if($_GET['id']=="new") {
      echo showProductPage($empty_product);
   } else {
      $statement = $conn->prepare("SELECT * FROM `products` WHERE `id`=?");
      $statement->execute([ $_GET['id'] ]);
      $product = $statement->fetch(PDO::FETCH_OBJ);

      echo showProductPage($product);
   }

} else {
   echo "<h2>Product List</h2>";
   $result = makeQuery($conn,"SELECT * FROM `products`");
   echo array_reduce($result,'productListItem');
}
?>

</div>
</body>
</html>
