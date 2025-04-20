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
        
        public function mGetNewCollection($limit) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM `collection` ORDER BY releaseDate DESC LIMIT $limit";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
    }
?>