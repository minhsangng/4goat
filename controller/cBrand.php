<?php
    class cBrand extends mBrand {       
        public function cGetAllBrand() {
            if ($this->mGetAllBrand() != null) {
                return $this->mGetAllBrand();
            } else return 0;
        }
        
    }
?>