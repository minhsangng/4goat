<?php
class mLogin
{
    public function mSubmitLogin($name, $password)
    {
        if ($name == "" || $password == "") {
            return -1;
        } else {
            $db = new tmdt();
            $conn = $db->connect();
            $password = md5($password);
            $sql = "SELECT * FROM user WHERE userName = '$name' AND password = '$password' AND status = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["user"] = [$row["userName"], $row["password"], $row["userID"], $row["role"]];

                echo "<script>window.location.href = '../admin/';</script>";
            } else {
                $sql = "SELECT * FROM customer WHERE loginName = '$name' AND password = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["customer"] = [$row["loginName"], $row["password"], $row["customerID"]];

                    echo "<script>window.location.href = '../../../';</script>";
                } else return 0;
            }
        }
    }

    public function mConfirmLogin($name, $password)
    {
        if (!isset($name) || !isset($password))
            return 0;
        else {
            $db = new tmdt();
            $conn = $db->connect();
            $sql = "SELECT * FROM user WHERE userName = '$name' AND password = '$password'";
            $result = $conn->query($sql);

            return $result->num_rows;
        }
    }

    public function mLogout($account, $url)
    {
        unset($account);
        session_destroy();
        echo "<script>window.location.href='".$url."';</script>";
    }
}
?>