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
        
        public function cGetCartByCustomer($customerID) {
            if ($this->mGetCartByCustomer($customerID) != null) {
                return $this->mGetCartByCustomer($customerID);
            } else return 0;
        }
        
        public function cGetCartByIDs($productIDs, $customerID) {
            if ($this->mGetCartByIDs($productIDs, $customerID) != null) {
                return $this->mGetCartByIDs($productIDs, $customerID);
            } else return 0;
        }
        
        public function cDeleteCartByID($cart_detailID) {
            return $this->mDeleteCartByID($cart_detailID);
        }
        
        public function cUpdateQuantityCart($productID, $cart_detailID, $quantity, $customerID) {
            return $this->mUpdateQuantityCart($productID, $cart_detailID, $quantity, $customerID);
        }
    }
?>