<?php
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mCart.php");
include_once("../../../model/mWishList.php");

include_once("../../../controller/cCart.php");
include_once("../../../controller/cWishList.php");

$ctrlCart = new cCart();
$ctrlWishList = new cWishList();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["color"]) && isset($_POST["size"]) && isset($_POST["productID"])) {
        $productID = isset($_POST["productID"]) ? $_POST["productID"] : null;
        $old = isset($_SESSION["selected"]) ? $_SESSION["selected"] : [];

        $color = !isset($_POST["color"]) ? $old["color"] : $_POST["color"];
        $size = !isset($_POST["size"]) ? $old["size"] : $_POST["size"];

        $_SESSION["selected"] = ["id" => $productID, "color" => $color, "size" => $size];

        echo json_encode(["status" => "success", "selected" => $_SESSION["selected"]]);
        exit;
    } else if (isset($_POST["cartID"]) && isset($_POST["quantity"])) {
        $cartID = (int) $_POST["cartID"];
        $quantity = (int) $_POST["quantity"];

        $resultCart = $ctrlCart->cUpdateQuantityCart($cartID, (int) $_SESSION["customer"][2], $quantity);

        if (!$resultCart)
            echo json_encode(["status" => "error"]);
        else {
            $resultCart = $ctrlCart->cGetCartByIDs($cartID);

            $row = $resultCart->fetch_assoc();

            $price = $row["price"];
            echo json_encode(["status" => "success", "totalPrice" => $quantity * $price]);
        }

        exit();
    } else if (isset($_POST["productID"]) && isset($_POST["action"])) {
        $customerID = $_SESSION["customer"][2];
        $productID = $_POST["productID"];

        $resultWishList = $ctrlWishList->cDeleteWishList($productID, $customerID);

        echo json_encode(["status" => "success", "productID" => $productID]);
        
        exit();
    }
}
?>