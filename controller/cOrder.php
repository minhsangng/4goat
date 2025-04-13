<?php
    class cOrder extends mOrder {
        public function cGetAllOrder() {
            if ($this->mGetAllOrder() != null) {
                return $this->mGetAllOrder();
            } else return 0;
        }
        
        public function cGetOrderDuring($start, $end) {
            if ($this->mGetOrderDuring($start, $end) != null) {
                return $this->mGetOrderDuring($start, $end);
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