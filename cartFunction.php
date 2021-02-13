<?php
session_start();
require_once "Cart.php";

// sorts out the ajax request
$name = $_GET['name'];
$price = $_GET['price'];
$id = $_GET['id'];
$action = $_GET['action'];

// checks if cart is in session - if not it creates one - else - gets cart from session
if(!isset($_SESSION['cart'])){
    $cart = new Cart;
}else{
    $cart = unserialize($_SESSION['cart']);
}

// checks action type given by ajax request
if($action === "add"){
    $cart->addItem($id, $name, $price);
} else if ($action === 'remove'){
    $cart->removeItem($id);
}

// saves cart to session
$_SESSION['cart'] = serialize($cart);
