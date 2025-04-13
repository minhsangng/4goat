<?php
    class cCart extends mCart {
        public function cAddToCart($customerID) {
            return $this->mAddToCart($customerID);
        }
        
        public function cCheckCart($customerID) {
            return $this->mCheckCart($customerID);
        }
        
        public function cCheckProduct($cartID, $productID) {
            return $this->mCheckProduct($cartID, $productID);
        }
        
        public function cAddToCartDetail($cartID, $productID, $price, $quantity, $color, $size, $discount, $promotionID) {
            return $this->mAddToCartDetail($cartID, $productID, $price, $quantity, $color, $size, $discount, $promotionID);
        }
        
        public function cGetAllCart() {
            if ($this->mGetAllCart() != null) {
                return $this->mGetAllCart();
            } else return 0;
        }
        
        public function cGetCartByIDs($productIDs) {
            if ($this->mGetCartByIDs($productIDs) != null) {
                return $this->mGetCartByIDs($productIDs);
            } else return 0;
        }
        
        public function cDeleteCartByID($productID, $cartID) {
            return $this->mDeleteCartByID($productID, $cartID);
        }
        
        public function cUpdateQuantityCart($productID, $cartID, $quantity) {
            return $this->mUpdateQuantityCart($productID, $cartID, $quantity);
        }
    }
?>