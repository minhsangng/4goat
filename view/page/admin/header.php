<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(1);
session_start();

$arr_menu = ["statistic" => "Thống kê đơn hàng", "handle" => "Xử lý đơn hàng", "post" => "Bài viết mới", "product" => "Sản phẩm mới"];

if (isset($_GET["p"]))
  $title = $arr_menu[$_GET["p"]];
else
  $title = "Tổng quan";
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../src/images/logo.png">
  <title>
    Quản trị hệ thống | 4Goat
  </title>

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Nucleo Icons -->
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- CDN Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
    rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- CDN Framework tailwindcss -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="g-sidenav-show">
  <div class="min-height-300 bg-[#8c907e]! position-absolute w-100"></div>
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header px-4 pt-2">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="relative" href="index.php">
        <img src="../../../src/images/logo.png" alt="4Goat - Logo" width="80">
        <h1 class="absolute -bottom-6 left-10 text-5xl! text-black! font-[Marcellus] font-normal!">4Goat</h1>
      </a>
    </div>
    <hr class="horizontal dark mt-4">
    <div class="collapse navbar-collapse w-auto visible! mb-4" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php" id="home">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tổng quan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="index.php?p=statistic" id="statistic">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-rectangle-list text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Thống kê đơn hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="index.php?p=handle" id="handle">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-pen-to-square text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Xử lý đơn hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="index.php?p=post" id="post">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-regular fa-newspaper text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Bài viết mới</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($_SESSION["user"][2] != 1 ? 'hover:cursor-not-allowed hover:text-gray-400!' : ''); ?>" href="<?= ($_SESSION["user"][2] != 1 ? 'javascript:void(0);' : 'index.php?p=product'); ?>" id="product">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa-solid fa-shirt text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sản phẩm mới</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Trang</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page"><?= $title ?></li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0 mt-2 text-xl!"><?= $title ?></h6>
        </nav>
        <div class="collapse navbar-collapse visible! mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Tìm kiếm ...">
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item dropdown mr-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0" id="dropdownSignInButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1"></i>
              </a>

              <ul class="dropdown-menu dropdown-menu-end h-auto! top-6! px-2 py-3 me-sm-n4"
                aria-labelledby="dropdownSignInButton">
                <li class="mb-2 ml-2">
                  <h3 class="border-radius-md m-0 text-lg">Xin chào, <?= $_SESSION["user"][0] ?>!</h3>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md hover:no-underline!" href="javascript:;">
                    <p class="m-0"><i class="fa-regular fa-circle-user mr-2"></i>Thông tin tài khoản</p>
                  </a>
                </li>
                <li class="mb-2">
                  <form action="" method="POST" class="dropdown-item border-radius-md"><button type="submit"
                      name="btnlogout" class="m-0 text-[1rem]! h-6"><i
                        class="fa-solid fa-arrow-right-from-bracket mr-2"></i>Đăng
                      xuất</button></form>
                </li>
              </ul>
            </li>
            <?php
            if (isset($_POST["btnlogout"])) {
              $ctrlLogin->cLogout($_SESSION["user"], "../login/");
            }
            ?>
            <li class="nav-item dropdown ml-2 pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end top-6! px-2 py-3 me-sm-n4 w-62"
                aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1 space-x-4">
                      <div class="my-auto">
                        <img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3 rounded-full!">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">1 tin nhắn mới</span> từ nchou
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 phút trước
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->