<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(1);
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/mLogin.php");
include_once("../../../controller/cLogin.php");

$ctrl = new cLogin();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>

    <link rel="shortcut icon" href="../../../src/images/logo.png" type="image/x-icon">

    <!-- CDN Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../../../src/css/styleLogin.css">

    <!-- CDN Framework tailwindcss -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="container">
        <section id="content">
            <form action="" method="POST">
                <a class="relative w-3/5 block mx-auto" href="index.php">
                    <img src="../../../src/images/logo.png" class="ml-3" alt="4Goat - Logo" width="80">
                    <h2 class="absolute -bottom-4 left-13 text-5xl! text-black! font-[Marcellus] font-normal!">4Goat
                    </h2>
                </a>
                <h1 class="mb-4 mt-8!">Đăng ký</h1>
                <div>
                    <input type="text" placeholder="Login Name" name="name" id="username" />
                </div>
                <div>
                    <input type="password" placeholder="Password" name="password" id="password" />
                </div>
                <?php
                if (isset($_POST["btnlogin"])) {
                    if ($ctrl->cSubmitLogin($_POST["name"], $_POST["password"]) == 0)
                        echo "<p class='text-red-400'>Sai tên đăng nhập hoặc mật khẩu!</p>";
                    else if ($ctrl->cSubmitLogin($_POST["name"], $_POST["password"]) == -1)
                        echo "<p class='text-red-400'>Vui lòng nhập đầy đủ thông tin đăng nhập!</p>";
                }
                ?>
                <div class="mt-2">
                    <p class="mb-1">Đã có tài khoản? <a href="../login/"> Đăng nhập</a></p>
                </div>
                <div>
                    <button type="submit" name="btnlogin">Đăng ký</button>
                </div>
            </form>
            <div class="button">
                <a href="../../../">Quay lại</a>
            </div>
        </section>
    </div>
</body>

</html>