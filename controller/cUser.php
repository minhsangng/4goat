<?php
    class cUser extends mUser {
        public function cGetAllUser() {
            if ($this->mGetAllUser() != null) {
                return $this->mGetAllUser();
            } else return 0;
        }
    }
?>