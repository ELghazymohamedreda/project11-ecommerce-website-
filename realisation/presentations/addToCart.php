<?php
include '../manager/cartManager.php';



$cartManager = new CartManager();

$cartManager->initCode();

if(isset($_POST['id'])){

    $id=$_POST['id'];
    $cartLine = new CartLine();
    $cart = new Cart();
    $quantity =  $_POST["quantite"];

    $cart = $cartManager->getCart($_COOKIE['cartCookie']);

    $product = $cartManager->afficherProduit($id);
    
    $cartLine->setIdCart($cart->getId());
    $quantityTotal = 0;
    $cartLineList = $cart->getCartLineList()[0];
  
        foreach($cartLineList as $cartLine){
            $quantityTotal += $cartLine->getProductCartQuantity();
        }
    
    $cartManager->addProduct($cart, $product, $quantity);
    $product->setQuantity($quantity);

    $cartManager->set($cart, $product, $quantityTotal);

    header("location: index.php");

}
