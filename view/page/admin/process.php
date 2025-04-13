<?php
session_start();

$productID = $_POST["productID"];
$productName = $_POST["productName"];
$price = $_POST["price"];

if (!isset($_SESSION["orders"]))
    $_SESSION["orders"] = [];

if (isset($_SESSION["orders"][$productID])) {
    $_SESSION["orders"][$productID]["qty"] += 1;
} else {
    $_SESSION["orders"][$productID] = [
        "productID" => $productID,
        "productName" => $productName,
        "price" => $price,
        "qty" => 1
    ];
}

header('Content-Type: application/json');
echo json_encode($_SESSION["orders"]);
?>