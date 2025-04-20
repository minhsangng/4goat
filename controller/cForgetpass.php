<?php
class cForgetpass extends mForgetpass
{
    public function cCheckEmail($email)
    {
        return $this->mCheckEmail($email);
    }

    public function cCreateRecoveryCode($recoveryCode, $email)
    {
        return $this->mCreateRecoveryCode($recoveryCode, $email);
    }

    public function cUpdatePassword($recoveryCode, $email, $password)
    {
        return $this->mUpdatePassword($recoveryCode, $email, $password);
    }
    
    public function cClearRecoveryCode($email)
    {
        return $this->mClearRecoveryCode($email);
    }
}
?>