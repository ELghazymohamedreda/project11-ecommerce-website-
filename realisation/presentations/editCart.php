<?php
include '../manager/cartManager.php';
session_start();

$cartManager = new CartManager();

$cartManager->initCode();
$quantity = $cartManager->getCartQuantity();
$cart = $cartManager->getCart($_COOKIE['cartCookie']);


if(isset($_POST["quantity"]) and isset($_POST["id"])){
    $product = $cartManager->getProductCartLine($id);

    $cartManager->editCartLine($_POST["id"], $_POST["quantity"]);
    $quantity =  $_POST["quantity"];
    $product->setQuantity($quantity);
    $cartManager->set($cart, $product, $quantity);

    header("location: index.php");
}

?>