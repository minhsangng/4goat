<?php
    class mWishList {
        public function mGetAllWishList() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM wishlist";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetWishListByCustomer($customerID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM wishlist W JOIN product P ON W.productID = P.productID JOIN category C ON C.categoryID = P.categoryID WHERE W.customerID = $customerID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mAddToWishList($productID, $customerID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO wishlist (productID, customerID) VALUES ($productID, $customerID)";
            $result = $conn->query($sql);
            
            if (!$result)
                return false;
            else return true;
        }
        
        public function mDeleteWishList($productID, $customerID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "DELETE FROM wishlist WHERE productID = $productID AND customerID = $customerID";
            $result = $conn->query($sql);
            
            if (!$result)
                return false;
            else return true;
        }
    }
?>