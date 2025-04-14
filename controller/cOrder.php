<?php
    class cOrder extends mOrder {
        public function cGetAllOrder() {
            if ($this->mGetAllOrder() != null) {
                return $this->mGetAllOrder();
            } else return 0;
        }
        
        public function cGetOrderByID($orderID) {
            if ($this->mGetOrderByID($orderID) != null) {
                return $this->mGetOrderByID($orderID);
            } else return 0;
        }
        
        public function cCheckOrder($orderID) {
            return $this->mCheckOrder($orderID);
        }
        
        public function cGetOrderDuring($start, $end) {
            if ($this->mGetOrderDuring($start, $end) != null) {
                return $this->mGetOrderDuring($start, $end);
            } else return 0;
        }
        
        public function cInsertOrder($userID, $customerID, $finalPrice, $paymentMethod) {
            return $this->mInsertOrder($userID, $customerID, $finalPrice, $paymentMethod);
        }
        
        public function cInsertOrderDetail($orderID, $productID, $quantity, $price) {
            return $this->mInsertOrderDetail($orderID, $productID, $quantity, $price);
        }
    }
?>