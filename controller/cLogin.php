<?php
class cLogin extends mLogin
{
    public function cSubmitLogin($name, $password)
    {
        return $this->mSubmitLogin($name, $password);
    }

    public function cConfirmLogin($name, $password)
    {
        return $this->mConfirmLogin($name, $password);
    }
    
    public function cLogout($account, $url)
    {
        return $this->mLogout($account, $url);
    }
}
?>