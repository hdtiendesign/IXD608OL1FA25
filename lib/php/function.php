<?php

session_start();


function print_p($v) {
    echo "<pre>",print_r($v),"</pre>";
}

function file_get_json ($filename){
    $file = file_get_contents($filename);
    return json_decode($file);
}


include_once "auth.php";
function makeConn(){
    $conn = new mysqli(...MYSQLIAuth());
    if($conn->connect_errno) die($conn->connect_error);
    $conn->set_charset('utf8');
    return $conn;
}


function makeQuery($conn,$qry){
    $result = $conn->query($qry);
    if($conn->errno) die($conn->error);
    $a = [];
    while ($row = $result->fetch_object()){
        $a[] = $row;
    }
    return $a;
}


function array_find($array,$fn) {
    foreach($array as $o) if($fn($o)) return $o;
    return false;
}


function getCart() {
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}


function addToCart($id, $amount, $color = "", $condition = "New") {
    $cart = getCart();

    $p = array_find($cart, function($o) use($id, $color, $condition) {
        return $o->id == $id 
            && $o->color == $color
            && $o->condition == $condition;
    });

    if($p) {
        $p->amount += $amount;
    } else {
        $_SESSION['cart'][] = (object)[
            "id" => $id,
            "amount" => $amount,
            "color" => $color,
            "condition" => $condition
        ];
    }
}


function updateCartItem($id,$amount) {
    $cart = getCart();

    foreach($cart as $o) {
        if($o->id == $id) {
            if($amount < 1) $amount = 1;
            $o->amount = $amount;
        }
    }

    $_SESSION['cart'] = $cart;
}


function deleteCartItem($id) {
    $cart = getCart();

    $cart = array_filter($cart,function($o) use($id){
        return $o->id != $id;
    });

    $_SESSION['cart'] = array_values($cart);
}


function resetCart() { 
    $_SESSION['cart'] = []; 
}


function cartItemById($id) {
    return array_find(getCart(), function($o) use($id){
        return $o->id == $id;
    });
}


function makeCartBadge() {
    $cart = getCart();
    if(empty($cart)) return "";

    $total = 0;
    foreach ($cart as $item) {
        $total += $item->amount;
    }
    return $total;
}


function getCartItems() {

    $cart = getCart();
    if(empty($cart)) return [];

    $ids = implode(",", array_map(function($o){
        return $o->id;
    }, $cart));

    $data = makeQuery(
        makeConn(),
        "SELECT * FROM `products` WHERE `id` IN ($ids)"
    );

    return array_map(function($o) use ($cart) {
        foreach($cart as $c) {
            if($c->id == $o->id) {
                $o->amount = $c->amount;
                $o->color = $c->color;
                $o->condition = $c->condition;
                $o->total = $c->amount * $o->price;
            }
        }
        return $o;
    }, $data);
}

?>
