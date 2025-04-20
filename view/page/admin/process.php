<?php
session_start();
header('Content-Type: application/json');

$productID = $_POST["productID"];
$productName = $_POST["productName"];
$price = $_POST["price"];
$quantity = $_POST["qty"];

if (!isset($_SESSION["orders"]))
    $_SESSION["orders"] = [];

if (isset($_SESSION["orders"][$productID])) {
    $_SESSION["orders"][$productID]["qty"] += 1;
} else {
    $_SESSION["orders"][$productID] = [
        "productID" => $productID,
        "productName" => $productName,
        "price" => $price,
        "qty" => $quantity
    ];
}

echo json_encode($_SESSION["orders"]);
exit();
?>