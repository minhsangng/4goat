<?php
    class cWishList extends mWishList {
        public function cGetAllWishList() {
            if ($this->mGetAllWishList() != null) {
                return $this->mGetAllWishList();
            } else return 0;
        }
        
        
        public function cGetWishListByCustomer($customerID) {
            if ($this->mGetWishListByCustomer($customerID) != null) {
                return $this->mGetWishListByCustomer($customerID);
            } else return 0;
        }
        public function cAddToWishList($productID, $customerID) {
            if ($this->mAddToWishList($productID, $customerID) == 0) return 0;
        }
        
        public function cDeleteWishList($productID, $customerID) {
            if ($this->mDeleteWishList($productID, $customerID) == 0) return 0;
        }
    }
?>