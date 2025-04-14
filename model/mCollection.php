<?php
    class mCollection {
        public function mGetAllCollection() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM `collection`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
    }
?>