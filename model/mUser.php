<?php
    class mUser {
        public function mGetAllUser() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertUser($userName, $phoneNumber, $email, $password, $role) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO user (userName, phoneNumber, email, password, role) VALUE ($userName, $phoneNumber, $email, $password, $role)";
            $result = $conn->query($sql);
            
            if (!$result)
                return 0;
        }
    }
?>