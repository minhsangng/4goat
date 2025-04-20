<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(1);
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/message.php");
include_once("../../../model/mLogin.php");
include_once("../../../model/mForgetpass.php");

include_once("../../../controller/cLogin.php");
include_once("../../../controller/cForgetpass.php");

$ctrl = new cLogin();
$ctrlMessage = new message();
$ctrlForgetpass = new cForgetpass();

if (isset($_GET["d"])) {
    $data = base64_decode($_GET["d"]);
    parse_str($data, $row);

    $email = $row["email"];
    $code = base64_encode($row["code"]);
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>

    <link rel="shortcut icon" href="../../../src/images/logo.png" type="image/x-icon">

    <!-- CDN Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
        rel="stylesheet">

    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDN Framework tailwindcss -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- CDN Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="flex justify-center items-center h-[100vh] w-[100vw]">
        <div class="relative z-10 w-1/3 border border-purple-600 rounded-md bg-white p-8 flex flex-col items-center">
            <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                <i class="fas fa-key text-purple-600 text-lg">
                </i>
            </div>
            <h1 class="mb-1 text-2xl font-semibold text-black">
                Đặt lại mật khẩu mới
            </h1>
            <form class="w-full" method="POST" action="">
                <label class="mb-1 block w-full text-base font-bold text-gray-600" for="pass">
                    Mật khẩu mới
                </label>
                <input
                    class="mb-6 w-full rounded border border-gray-300 px-3 py-2 text-base text-gray-700 placeholder-gray-400 focus:border-purple-600 focus:outline-none"
                    id="pass" type="password" name="pass" />

                <label class="mb-1 block w-full text-base font-bold text-gray-600" for="repass">
                    Nhập lại mật khẩu
                </label>
                <input
                    class="mb-6 w-full rounded border border-gray-300 px-3 py-2 text-base text-gray-700 placeholder-gray-400 focus:border-purple-600 focus:outline-none"
                    id="repass" type="password" name="repass" />
                <button
                    class="w-full rounded bg-purple-700 py-2 text-base font-semibold text-white hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-1"
                    type="submit" name="btnsubmit">
                    Xác nhận
                </button>
            </form>
            <div>
                <?php
                if (isset($_POST["btnsubmit"])) {
                    $pass = $_POST["pass"];
                    $repass = $_POST["repass"];

                    if (empty($pass) || empty($repass))
                        $ctrlMessage->warningMessage("Vui lòng nhập mật khẩu mới");
                    else {
                        if ($repass != $pass)
                            $ctrlMessage->warningMessage("Mật khẩu không trùng khớp");
                        else {
                            $result = $ctrlForgetpass->cCreateRecoveryCode($code, $email);

                            if ($result) {
                                $result = $ctrlForgetpass->cUpdatePassword($code, $email, $pass);

                                if ($result) {
                                    $result = $ctrlForgetpass->cClearRecoveryCode($email);
                                    $ctrlMessage->successMessage("Cập nhật mật khẩu thành công");

                                    echo '<p class="mt-4 text-gray-400">Đến trang <a href="../login/" class="underline uppercase text-[#8c907e] font-bold italic">Đăng nhập</a> ngay</p>';
                                } else
                                    $ctrlMessage->errorMessage("Cập nhật mật khẩu thất bại");
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>