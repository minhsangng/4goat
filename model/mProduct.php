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
        
        public function mGetNewProduct($limit) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID LIMIT $limit";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetAllProductOnPage($limit, $offset) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID LIMIT $limit OFFSET $offset";
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
        
        public function mGetProductBySearch($search, $limit, $offset) {
            $db = new tmdt();
            $conn = $db->connect();
            $searchInput = "%".$search."%";
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.productName LIKE '$searchInput' LIMIT $limit OFFSET $offset";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertProduct($productName, $categoryID, $brandID, $collectionID, $sex, $price, $image, $varriant) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO product (productName, categoryID, brandID, collectionID, sex, price, image, varriant) VALUES ('$productName', $categoryID, $brandID, $collectionID, $sex, $price, '$image', $varriant)";
            $result = $conn->query($sql);
            
            if (!$result)
                return false;
            else return $conn->insert_id;
        }
        
        public function mInsertProductDetail($productID, $color, $size) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO product_detail (productID, color, size) VALUES ($productID, '$color', '$size')";
            $result = $conn->query($sql);
            
            if (!$result)
                return false;
            else return true;
        }
        
        public function mGetProductSortPrice($sort, $sex, $limit, $offset) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.sex = $sex OR P.sex = 0 ORDER BY P.price $sort LIMIT $limit OFFSET $offset";
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
        
        public function mGetProductByPrice($sex, $min, $max) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE (P.sex = $sex OR P.sex = 0) AND P.price BETWEEN $min AND $max";
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
        
        public function mGetProductBySexOnCategory($sex, $categoryID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.categoryID = $categoryID AND (P.sex = $sex OR P.sex = 0)";
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
        
        public function mGetCategoryByID($categoryID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM category WHERE categoryID = $categoryID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetCategoryBySex($sex) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT DISTINCT(C.categoryName), C.* FROM product P JOIN category C ON P.categoryID = C.categoryID WHERE P.sex = $sex OR P.sex = 0";
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