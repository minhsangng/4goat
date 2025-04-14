<?php
    class mPost {
        public function mGetAllPost() {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM post";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0)
                return $result;
            else return null;
        }
        
        public function mInsertPost($userID, $content, $date, $topic, $keyword) {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "INSERT INTO post (userID, content, date, topic, keyword) VALUES ($userID, '$content', '$date', '$topic', '$keyword')";
            $result = $conn->query($sql);
            
            if (!$result)
                return false;
            else return true;
        }
    }
?>