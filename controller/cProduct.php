<?php
    class cProduct extends mProduct {
        public function cGetAllProduct() {
            if ($this->mGetAllProduct() != null) {
                return $this->mGetAllProduct();
            } else return 0;
        }
        
        public function cGetNewProduct($limit) {
            if ($this->mGetNewProduct($limit) != null) {
                return $this->mGetNewProduct($limit);
            } else return 0;
        }
        
        public function cGetAllProductOnPage($limit, $offset) {
            if ($this->mGetAllProductOnPage($limit, $offset) != null) {
                return $this->mGetAllProductOnPage($limit, $offset);
            } else return 0;
        }
        
        public function cGetProductByCategory($categoryID) {
            if ($this->mGetProductByCategory($categoryID) != null) {
                return $this->mGetProductByCategory($categoryID);
            } else return 0;
        }
        
        public function cGetProductBySearch($search, $limit, $offset) {
            if ($this->mGetProductBySearch($search, $limit, $offset) != null) {
                return $this->mGetProductBySearch($search, $limit, $offset);
            } else return 0;
        }
        
        public function cInsertProduct($productName, $categoryID, $brandID, $collectionID, $sex, $price, $image, $varriant) {
            return $this->mInsertProduct($productName, $categoryID, $brandID, $collectionID, $sex, $price, $image, $varriant);
        }
        
        public function cInsertProductDetail($productID, $color, $size) {
            return $this->mInsertProductDetail($productID, $color, $size);
        }
        
        public function cGetProductSortPrice($sort, $sex, $limit, $offset) {
            if ($this->mGetProductSortPrice($sort, $sex, $limit, $offset) != null) {
                return $this->mGetProductSortPrice($sort, $sex, $limit, $offset);
            } else return 0;
        }
        
        public function cGetProductByID($productID) {
            if ($this->mGetProductByID($productID) != null) {
                return $this->mGetProductByID($productID);
            } else return 0;
        }
        
        public function cGetProductByPrice($sex, $min, $max) {
            if ($this->mGetProductByPrice($sex, $min, $max) != null) {
                return $this->mGetProductByPrice($sex, $min, $max);
            } else return 0;
        }
        
        public function cGetProductBySexOnPage($sex, $limit, $offset) {
            if ($this->mGetProductBySexOnPage($sex, $limit, $offset) != null) {
                return $this->mGetProductBySexOnPage($sex, $limit, $offset);
            } else return 0;
        }
        
        public function cGetProductBySexOnCategory($sex, $categoryID) {
            if ($this->mGetProductBySexOnCategory($sex, $categoryID) != null) {
                return $this->mGetProductBySexOnCategory($sex, $categoryID);
            } else return 0;
        }
        
        public function cGetAllCategory() {
            if ($this->mGetAllCategory() != null) {
                return $this->mGetAllCategory();
            } else return 0;
        }
        
        public function cGetCategoryByID($categoryID) {
            if ($this->mGetCategoryByID($categoryID) != null) {
                return $this->mGetCategoryByID($categoryID);
            } else return 0;
        }
        
        public function cGetCategoryBySex($sex) {
            if ($this->mGetCategoryBySex($sex) != null) {
                return $this->mGetCategoryBySex($sex);
            } else return 0;
        }
        
        public function cGetCategoryAndCount() {
            if ($this->mGetCategoryAndCount() != null) {
                return $this->mGetCategoryAndCount();
            } else return 0;
        }
        
        public function cGetStarRate($productID) {
            if ($this->mGetStarRate($productID) != null) {
                return $this->mGetStarRate($productID);
            } else return 0;
        }
    }
?>