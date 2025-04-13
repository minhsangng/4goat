<?php
    class cOrder extends mOrder {
        public function cGetAllOrder() {
            if ($this->mGetAllOrder() != null) {
                return $this->mGetAllOrder();
            } else return 0;
        }
        
        public function cInsertOrder($userID, $customerID, $finalPrice) {
            return $this->mInsertOrder($userID, $customerID, $finalPrice);
        }
        
        public function cInsertOrderDetail($orderID, $productID, $quantity, $price) {
            return $this->mInsertOrderDetail($orderID, $productID, $quantity, $price);
        }
    }
?>