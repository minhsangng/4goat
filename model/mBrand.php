<?php
    class mBrand {       
        public function mGetAllBrand() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM brand";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
    }
?>