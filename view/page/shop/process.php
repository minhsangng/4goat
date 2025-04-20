<?php
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mWishList.php");
include_once("../../../controller/cWishList.php");

$ctrlWishList = new cWishList();

header('Content-Type: application/json');

if (isset($_POST["productID"])) {
    if (!isset($_SESSION["customer"])) {
        echo json_encode(["status" => "warning", "message" => "Vui lòng đăng nhập để sử dụng chức năng này"]);
        exit;
    } else {
        $productID = $_POST["productID"];
        $sex = $_POST["sex"];
        $customerID = (int) $_SESSION["customer"][2];

        $resultWishList = $ctrlWishList->cGetWishListByCustomer($customerID);

        $wishlistItems = isset($wishlistItems) ? $wishlistItems : [];

        if ($resultWishList == NULL) {
            $wishlistItems[] = $productID;
        } else {
            while ($rowWishlist = $resultWishList->fetch_assoc()) {
                $wishlistItems[] = $rowWishlist;
            }
        }

        $wishlists = array_column($wishlistItems, "productID");

        if (!in_array($productID, $wishlists)) {
            $resultWishList = $ctrlWishList->cAddToWishList($productID, $customerID);

            $_SESSION["wishlistItems"][] = $productID;

            echo json_encode(["status" => "success", "message" => "Đã thêm vào yêu thích", "sex" => $sex]);
        } else
            echo json_encode(["status" => "warning", "message" => "Sản phẩm đã có trong yêu thích"]);

        exit();
    }
}
?>