<?php
    class mReview {
        public function mGetAllReview() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM review";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetReviewByProduct($productID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM `review` R JOIN `customer` C ON R.customerID = C.customerID WHERE R.productID = $productID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertReview($userName, $phoneNumber, $email, $password, $role) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO user (userName, phoneNumber, email, password, role) VALUES ($userName, $phoneNumber, $email, $password, $role)";
            $result = $conn->query($sql);
            
            if (!$result)
                return 0;
        }
    }
?>