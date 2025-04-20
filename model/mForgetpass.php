<?php
class mForgetpass
{
    public function mCheckEmail($email)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "SELECT * FROM customer WHERE email = '$email'";
        $result = $conn->query($sql);

        return $result->num_rows;
    }

    public function mCreateRecoveryCode($recoveryCode, $email)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "UPDATE `customer` SET recoveryCode = '$recoveryCode' WHERE email = '$email'";
        $result = $conn->query($sql);

        if (!$result)
            return false;
        else
            return true;
    }

    public function mUpdatePassword($recoveryCode, $email, $password)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $password = md5($password);
        $sql = "UPDATE `customer` SET `password` = '$password' WHERE `recoveryCode` = '$recoveryCode' AND `email` = '$email'";
        $result = $conn->query($sql);

        if (!$result)
            return false;
        else
            return true;
    }
    
    public function mClearRecoveryCode($email)
    {
        $db = new tmdt();
        $conn = $db->connect();
        $sql = "UPDATE `customer` SET `recoveryCode` = '' WHERE `email` = '$email'";
        $result = $conn->query($sql);

        if (!$result)
            return false;
        else
            return true;
    }
}
?>