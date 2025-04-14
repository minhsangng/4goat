<?php
    class cCollection extends mCollection {       
        public function cGetAllCollection() {
            if ($this->mGetAllCollection() != null) {
                return $this->mGetAllCollection();
            } else return 0;
        }
        
    }
?>