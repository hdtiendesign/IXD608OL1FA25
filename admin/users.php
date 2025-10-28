<?php 
include "../lib/php/function.php";

$filename = "../data/users.json";
$users = file_get_json($filename);

function showUserForm($user, $id) {
  $classes = implode(", ", $user->classes);
  echo "
  <nav class='nav nav-crumbs'>
    <ul><li><a href='admin/users.php'>Back</a></li></ul>
  </nav>

  <h2>Edit User</h2>

  <div style='margin-bottom:1em;'>
    <p><strong>Name:</strong> $user->name</p>
    <p><strong>Type:</strong> $user->type</p>
    <p><strong>Email:</strong> $user->email</p>
    <p><strong>Classes:</strong> $classes</p>
  </div>

  <form method='post'>
    <div class='form-control'>
      <label class='form-label'>Name</label>
      <input class='form-input' type='text' name='name' value='$user->name'>
    </div>

    <div class='form-control'>
      <label class='form-label'>Type</label>
      <input class='form-input' type='text' name='type' value='$user->type'>
    </div>

    <div class='form-control'>
      <label class='form-label'>Email</label>
      <input class='form-input' type='email' name='email' value='$user->email'>
    </div>

    <div class='form-control'>
      <label class='form-label'>Classes</label>
      <input class='form-input' type='text' name='classes' value='$classes'>
    </div>

    <div class='form-control' style='display:flex; gap:10px;'>
      <button class='form-button' type='submit' name='save'>Save</button>
      <a class='form-button' href='admin/users.php'>Cancel</a>
    </div>
  </form>
  ";
}

if(isset($_GET['id']) && isset($_POST['save'])) {
  $id = $_GET['id'];
  $users[$id]->name = $_POST['name'];
  $users[$id]->type = $_POST['type'];
  $users[$id]->email = $_POST['email'];

  $clean_classes = str_replace(" ", "", $_POST['classes']);
  $users[$id]->classes = explode(",", $clean_classes);

  file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));

  header("Location: users.php?id=$id");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Admin Page</title>
  <?php include "../parts/meta.php"; ?>
</head>
<body>
  <header class="navbar">
    <div class="container display-flex">
      <div class="flex-none"><h1>User Admin</h1></div>
      <div class="flex-stretch"></div>
      <nav class="nav nav-flex flex-none">
        <ul><li><a href="admin/users.php">User List</a></li></ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="card soft">
      <?php 
      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        showUserForm($users[$id], $id);
      } else {
        echo "<h2>User List</h2><nav class='nav'><ul>";
        for($i=0; $i<count($users); $i++) {
          echo "<li><a href='admin/users.php?id=$i'>{$users[$i]->name}</a></li>";
        }
        echo "</ul></nav>";
      }
      ?>
    </div>
  </div>


</body>
</html>
