<?php
    class cReview extends mReview {
        public function cGetAllReview() {
            return $this->mGetAllReview();
        }
        
        public function cGetReviewByProduct($productID) {
            return $this->mGetReviewByProduct($productID);
        }
    }
?>