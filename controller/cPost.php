<?php
    class cPost extends mPost {
        public function cGetAllPost() {
            if ($this->mGetAllPost() != null) {
                return $this->mGetAllPost();
            } else return 0;
        }
        
        public function cInsertPost($userID, $content, $date, $topic, $keyword) {
            if ($this->mInsertPost($userID, $content, $date, $topic, $keyword) != null) {
                return $this->mInsertPost($userID, $content, $date, $topic, $keyword);
            } else return 0;
        }
    }
?>