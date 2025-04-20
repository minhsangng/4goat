<?php
    class cCustomer extends mCustomer {
        public function cGetAllCustomer() {
            if ($this->mGetAllCustomer() != null) {
                return $this->mGetAllCustomer();
            } else return 0;
        }
        
        public function cGetCustomerByID($customerID) {
            if ($this->mGetCustomerByID($customerID) != null) {
                return $this->mGetCustomerByID($customerID);
            } else return 0;
        }
        
        public function cInsertCustomer($customerName, $phoneNumber, $email, $loginName, $password, $address, $customerType) {
            return $this->mInsertCustomer($customerName, $phoneNumber, $email, $loginName, $password, $address, $customerType);
        }
        
        public function cInsertCustomerPos($customerName, $phoneNumber) {
            return $this->mInsertCustomerPos($customerName, $phoneNumber);
        }
    }
?>