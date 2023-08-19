<?php
session_start();

require_once('../db/dbhelper.php');
require_once('../utils/utility.php');

if(!empty($_POST)) {
    $action = getPost('action');
    $id = getPost('id');

    switch ($action) {
        case 'add':
            addToCart($id);
            break;
        case 'delete':
            deleteItem($id);
            break;
    }
}

function addToCart($id) {
    $cart = [];
    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    $isFind = false;

    for($i = 0; $i < count($cart); $i++) {
        if($cart[$i]['id'] == $id) {
            $cart[$i]['num']++;
            $isFind = true;
            break;
        }
    }

    if(!$isFind) {
        $product = executeResult('select * from productss where id = '.$id, true);
        $product['num'] = 1;
        $cart[] = $product;
    }

    // update
    $_SESSION['cart'] = $cart;
}

function deleteItem($id){
    $cart = [];
    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
    for($i = 0; $i < count($cart); $i++) {
        if($cart[$i]['id'] == $id) {
            array_splice($cart, $i, 1);
            break;
        }
    } 

    // update session
    $_SESSION['cart'] = $cart;
}
?>