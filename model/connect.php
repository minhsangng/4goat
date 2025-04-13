<?php
    class tmdt {
        public function connect() {
            $conn = new mysqli("localhost", "root", "", "4goat_db");
            
            return $conn;
        }
        
        public function close() {
            return $this->connect()->close();
        }
    }
?>