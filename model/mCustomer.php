<?php
    class mCustomer {
        public function mGetAllCustomer() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM customer";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mGetCustomerByID($customerID) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM customer WHERE customerID = $customerID";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertCustomer($customerName, $phoneNumber, $email, $loginName, $password, $address, $customerType) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT IGNORE INTO customer (customerName, phoneNumber, email, loginName, password, address, customerType) VALUES ('$customerName', '$phoneNumber', '$email', '$loginName', '$password', '$address', $customerType)";
            $result = $conn->query($sql);
            
            if (!$result)
                return null;
            else return $conn->insert_id;
        }
        
        public function mInsertCustomerPos($customerName, $phoneNumber) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT IGNORE INTO customer (customerName, phoneNumber, customerType) VALUES ('$customerName', '$phoneNumber', 0)";
            $result = $conn->query($sql);
            
            if (!$result)
                return null;
            else return $conn->insert_id;
        }
    }
?>