<?php
    class cProduct extends mProduct {
        public function cGetAllProduct() {
            if ($this->mGetAllProduct() != null) {
                return $this->mGetAllProduct();
            } else return 0;
        }
        
        public function cGetProductByCategory($categoryID) {
            if ($this->mGetProductByCategory($categoryID) != null) {
                return $this->mGetProductByCategory($categoryID);
            } else return 0;
        }
        
        public function cGetProductByID($productID) {
            if ($this->mGetProductByID($productID) != null) {
                return $this->mGetProductByID($productID);
            } else return 0;
        }
        
        public function cGetProductBySexOnPage($sex, $limit, $offset) {
            if ($this->mGetProductBySexOnPage($sex, $limit, $offset) != null) {
                return $this->mGetProductBySexOnPage($sex, $limit, $offset);
            } else return 0;
        }
        
        public function cGetAllCategory() {
            if ($this->mGetAllCategory() != null) {
                return $this->mGetAllCategory();
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