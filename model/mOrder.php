<?php
    class mOrder {
        public function mGetAllOrder() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM `order` O JOIN order_detail OD ON O.orderID = OD.orderID JOIN customer C ON C.customerID = O.customerID GROUP BY OD.orderID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertOrder($userID, $customerID, $finalPrice) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO `order` (userID, customerID, finalPrice) VALUE ($userID, $customerID, $finalPrice)";
            $result = $conn->query($sql);
            
            if (!$result)
                return null;
            else return $conn->insert_id;
        }
        
        public function mInsertOrderDetail($orderID, $productID, $quantity, $price) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO `order_detail` (orderID, productID, quantity, price) VALUE ($orderID, $productID, $quantity, $price)";
            $result = $conn->query($sql);
            
            if (!$result)
                return null;
        }
    }
?>