<?php
    class mProduct {
        public function mGetAllProduct() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetProductByCategory($categoryID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.categoryID = $categoryID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetProductByID($productID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT *, GROUP_CONCAT(DISTINCT PD.color) AS colors, GROUP_CONCAT(DISTINCT PD.size) AS sizes FROM product P JOIN product_detail PD ON P.productID = PD.productID JOIN category C ON P.categoryID = C.categoryID WHERE P.productID = $productID GROUP BY PD.productID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetProductBySexOnPage($sex, $limit, $offset) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.sex = $sex OR P.sex = 0 LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetAllCategory() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM category";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetCategoryBySex($sex) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT DISTINCT(C.categoryName) FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.sex = $sex OR P.sex = 0";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetCategoryAndCount() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT C.categoryID, C.categoryName, COUNT(P.categoryID) as countCategory FROM product P JOIN category C ON P.categoryID = C.categoryID GROUP BY P.categoryID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetStarRate($productID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT AVG(rate) AS AvgRate, COUNT(rate) AS CountRV FROM review WHERE productID = $productID GROUP BY productID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
    }
?>