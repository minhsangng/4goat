<?php
    class cCollection extends mCollection {       
        public function cGetAllCollection() {
            if ($this->mGetAllCollection() != null) {
                return $this->mGetAllCollection();
            } else return 0;
        }
        
        public function cGetNewCollection($limit) {
            if ($this->mGetNewCollection($limit) != null) {
                return $this->mGetNewCollection($limit);
            } else return 0;
        }
    }
?>