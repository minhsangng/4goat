<?php
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mCart.php");
include_once("../../../model/mWishList.php");

include_once("../../../controller/cCart.php");
include_once("../../../controller/cWishList.php");

header("Content-Type: application/json");

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
        $cart_detailID = (int) $_POST["cart_detailID"];
        $productID = (int) $_POST["productID"];
        $quantity = (int) $_POST["quantity"];
        $customerID = (int) $_SESSION["customer"][2];

        $resultCart = $ctrlCart->cUpdateQuantityCart($productID, $cart_detailID, $quantity, $customerID);

        if (!$resultCart)
            echo json_encode(["status" => "error", "message" => "Cập nhật số lượng thất bại"]);
        else {
            $resultAllCart = $ctrlCart->cGetCartByCustomer($customerID);

            if ($resultAllCart != null) {
                $total = 0;
                while ($row = $resultAllCart->fetch_assoc()) {
                    $total += ($row["price"] * $row["quantity"]);
                }

                echo json_encode([
                    "status" => "success",
                    "newTotal" => $total
                ]);
            } else
                echo json_encode(["status" => "error", "message" => "Không có dữ liệu"]);
        }

        exit();
    } else if (isset($_POST["productID"]) && isset($_POST["action"])) {
        $customerID = $_SESSION["customer"][2];
        $productID = $_POST["productID"];

        if ($_POST["action"] == "wishlist") {
            $resultWishList = $ctrlWishList->cDeleteWishList($productID, $customerID);

            $index = array_search($productID, $_SESSION["wishlistItems"]);

            if ($index !== false) {
                unset($_SESSION["wishlistItems"][$index]);

                $_SESSION["wishlistItems"] = array_values($_SESSION["wishlistItems"]);
            }

            echo json_encode(["status" => "success", "productID" => $productID]);

            exit();
        } else if ($_POST["action"] == "del") {
            $cart_detailID = $_POST["cart_detailID"];

            $resultCart = $ctrlCart->cDeleteCartByID( $cart_detailID);

            echo json_encode(["status" => "success", "cart_detailID" => $cart_detailID]);

            exit();
        }
    }
}
?>