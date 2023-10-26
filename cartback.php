<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function addToCart($productId, $productName, $productPrice, $productBrand) {
    $item = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'brand' => $productBrand,
    );

    // Add the item to the cart
    array_push($_SESSION['cart'], $item);
}
// Function to remove an item from the cart

function removeFromCart($productId) {
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $productId) {
            unset($_SESSION['cart'][$key]);
        }
    }
}
?>