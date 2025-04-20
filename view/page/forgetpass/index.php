<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(1);
session_start();

require_once "../../../PHPMailer/src/Exception.php";
require_once "../../../PHPMailer/src/PHPMailer.php";
require_once "../../../PHPMailer/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once("../../../model/connect.php");
include_once("../../../model/message.php");
include_once("../../../model/mLogin.php");
include_once("../../../model/mForgetpass.php");

include_once("../../../controller/cLogin.php");
include_once("../../../controller/cForgetpass.php");

$ctrl = new cLogin();
$ctrlMessage = new message();
$ctrlForgetpass = new cForgetpass();

if (isset($_POST["btnsubmit"])) {
    $email = $_POST["email"];

    if (empty($email))
        $ctrlMessage->warningMessage("Vui lòng nhập địa chỉ email khôi phục");
    else {
        $result = $ctrlForgetpass->cCheckEmail($email);

        if ($result > 0) {
            $recoveryCode = base64_encode("email=" . $email."&code="."4goatrecoverycode");
            $resultRe = $ctrlForgetpass->cCreateRecoveryCode($recoveryCode, $email);

            if (!$resultRe)
                $ctrlMessage->errorMessage("Tạo mã khôi phục thất bại. Hãy thử lại!");
            else {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = "smtp.gmail.com";
                    $mail->SMTPAuth = true;
                    $mail->Username = "nmsangtg26@gmail.com";
                    $mail->Password = "bdyk hjrm mmgc zluz";
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom("nmsangtg26@gmail.com", mb_encode_mimeheader("Khôi phục mật khẩu", "UTF-8", "B"));
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = mb_encode_mimeheader("Khôi phục mật khẩu | 4Goat (no-reply)", "UTF-8", "B");
                    $mail->Body = "Xin chào!<br><br>
                    Để khôi phục mật khẩu vui lòng truy cập vào <a href='localhost/4goat/view/page/resetpass/index.php?d=".$recoveryCode."'>đây</a> để đặt lại mật khẩu mới.<br>
                    <br><br>
                    Trân trọng,<br>
                    Đội ngũ hỗ trợ | 4Goat";

                    $mail->send();
                    $ctrlMessage->successMessage("Vui lòng kiểm tra email của bạn và làm theo hướng dẫn!");
                } catch (Exception $e) {
                    $ctrlMessage->errorMessage("Lỗi khi gửi email: " . $mail->ErrorInfo);
                }
            }
        } else
            $ctrlMessage->errorMessage("Email này chưa được đăng ký. Vui lòng thử lại!");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>

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
                Quên mật khẩu?
            </h1>
            <p class="mb-6 text-center text-sm text-gray-400">
                Chúng tôi sẽ gửi đường dẫn khôi phục mật khẩu qua email của bạn
            </p>
            <form class="w-full" method="POST" action="">
                <label class="mb-1 block w-full text-base font-bold text-gray-600" for="email">
                    Email
                </label>
                <input
                    class="mb-6 w-full rounded border border-gray-300 px-3 py-2 text-base text-gray-700 placeholder-gray-400 focus:border-purple-600 focus:outline-none"
                    id="email" placeholder="Địa chỉ email đã đăng ký" type="email" name="email" />
                <button
                    class="w-full rounded bg-purple-700 py-2 text-base font-semibold text-white hover:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:ring-offset-1"
                    type="submit" name="btnsubmit">
                    Xác nhận
                </button>
            </form>
        </div>
    </div>
</body>

</html>