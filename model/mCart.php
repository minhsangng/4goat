<?php
class mCart
{
    public function mAddToCart($customerID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "INSERT INTO cart (customerID) VALUE ($customerID)";
        $result = $conn->query($sql);

        if (!$result)
            return null;
        else
            return $conn->insert_id;
    }

    public function mCheckCart($customerID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM cart WHERE customerID = $customerID";
        $result = $conn->query($sql);

        if ($result->num_rows == 0)
            return 0;
        else
            return $result->fetch_assoc();
    }

    public function mCheckProduct($cartID, $productID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM cart_detail WHERE cartID = $cartID AND productID = $productID";
        $result = $conn->query($sql);

        return $result->num_rows;
    }

    public function mAddToCartDetail($cartID, $productID, $price, $quantity, $color, $size, $discount, $promotionID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        
        if ($promotionID == null)
            $sql = "INSERT INTO `cart_detail` (cartID, productID, price, quantity, size, color, discount)
                    VALUES ($cartID, $productID, $price, $quantity, '$size', '$color', $discount)";
        else
            $sql = "INSERT INTO `cart_detail` (cartID, productID, price, quantity, size, color, discount, promotionID)
                    VALUES ($cartID, $productID, $price, $quantity, '$size', '$color', $discount, $promotionID)";

        $result = $conn->query($sql);

        if (!$result)
            return false;
        return true;
    }

    public function mGetAllCart()
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM cart C JOIN cart_detail CD ON C.cartID = CD.cartID JOIN product P ON P.productID = CD.productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return $result;
        else
            return null;
    }
    
    public function mGetCartByIDs($productIDs)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM cart C JOIN cart_detail CD ON C.cartID = CD.cartID JOIN product P ON P.productID = CD.productID WHERE CD.productID IN ($productIDs)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return $result;
        else
            return null;
    }
    
    public function mDeleteCartByID($productID, $cartID)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "DELETE FROM cart_detail WHERE productID = $productID AND cartID = $cartID";
        $result = $conn->query($sql);

        if (!$result)
            return false;
        else
            return true;
    }
    
    public function mUpdateQuantityCart($productID, $cartID, $quantity)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "UPDATE cart_detail SET quantity = $quantity WHERE productID = $productID AND cartID = $cartID";
        $result = $conn->query($sql);

        if (!$result)
            return false;
        else
            return true;
    }
}
?>