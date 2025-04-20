<html lang="en">
<?php
error_reporting(1);
session_start();

include_once("../../../model/connect.php");
include_once("../../../model/message.php");
include_once("../../../model/mProduct.php");
include_once("../../../model/mOrder.php");
include_once("../../../model/mCustomer.php");

include_once("../../../controller/cProduct.php");
include_once("../../../controller/cOrder.php");
include_once("../../../controller/cCustomer.php");

$ctrlMessage = new message();
$ctrlProduct = new cProduct();
$ctrlOrder = new cOrder();
$ctrlCustomer = new cCustomer();
?>

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Xử lý đơn hàng
    </title>
    <script src="https://cdn.tailwindcss.com">
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="../../../src/images/logo.png" type="image/x-icon">

    <!-- CDN Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Marcellus&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <!-- CDN Sweet Alert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">
    <!-- Nav -->
    <div class="flex items-center justify-between m-4 pb-8">
        <div class="flex items-center space-x-2">
            <a class="relative" href="pos.php">
                <img src="../../../src/images/logo.png" alt="4Goat - Logo" width="80">
                <h1 class="absolute -bottom-4 left-10 text-5xl font-[Marcellus]">4Goat</h1>
            </a>
        </div>
        <a class="text-red-500 font-semibold" href="index.php?p=handle">
            Quay lại
        </a>
    </div>
    <div class="flex flex-col lg:flex-row">
        <!-- Left Panel -->
        <div class="bg-white w-full lg:w-2/3 p-4">
            <div class="flex items-center space-x-2 mb-4">
                <div
                    class="flex items-center space-x-2 <?php echo (!isset($_GET["c"]) ? "bg-[#8c907e] text-white font-semibold" : "bg-gray-100 text-gray-500"); ?> p-2 rounded-lg">
                    <i class="fa-solid fa-store"></i>
                    <p class="">
                        All Menu
                    </p>
                    <a class="" href="pos.php">
                        (<?php echo $_SESSION["count"]; ?>)
                    </a>
                </div>

                <?php
                $result = $ctrlProduct->cGetCategoryAndCount();
                $_SESSION["count"] = 0;
                $n = 0;

                if ($result != 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="flex items-center space-x-2 ' . ((isset($_GET["c"]) && $_GET["c"] == $row["categoryID"]) ? "bg-[#8c907e] text-white font-semibold" : "bg-gray-100 text-gray-500") . ' p-2 rounded-lg">
                                <a class="" href="pos.php?c=' . $row["categoryID"] . '">
                                    ' . $row["categoryName"] . '
                                </a>
                                <p class="">
                                    (' . $row["countCategory"] . ')
                                </p>
                            </div>';

                        $_SESSION["count"] += $row["countCategory"];
                        $n++;

                        if ($n >= 6)
                            break;

                    }
                } else
                    echo "<p>Không có dữ liệu</p>";

                ?>
            </div>
            <div class="relative mb-4">
                <input class="w-full p-2 pl-10 border border-gray-300 rounded-lg"
                    placeholder="Nhập tên hoặc mã sản phẩm..." type="text" />
                <i class="fas fa-search absolute left-3 top-3 text-gray-500">
                </i>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <!-- Product Item -->
                <?php
                $result = $ctrlProduct->cGetAllProduct();
                $n = 0;

                if ($result != 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="bg-white p-4 rounded-lg shadow product-item" data-id="' . $row["productID"] . '" data-name="' . $row["productName"] . '" data-price="' . $row["price"] . '">
                                    <img alt="' . $row["productName"] . '" class="w-full h-24 object-cover mb-2" height="100"
                                        src="../../../src/images/products/' . $row["image"] . '_1.png"
                                        width="100" />
                                    <p class="text-gray-700 font-semibold">
                                        ' . $row["productName"] . '
                                    </p>
                                    <p class="text-gray-500 text-sm">
                                        ' . $row["categoryName"] . '
                                    </p>
                                    <p class="text-red-500">
                                        ' . number_format($row["price"], 0, ",", ".") . ' <sup>đ</sup>
                                    </p>
                                </div>';

                        $n++;

                        if ($n >= 12)
                            break;
                    }
                } else
                    echo "<p>Không có dữ liệu</p>";
                ?>
            </div>
        </div>
        <!-- Right Panel -->
        <div class="bg-white w-full lg:w-1/3 p-4">
            <form action="" method="POST">
                <div class="flex justify-between items-center mb-4 text-2xl">
                    <h2 class="font-bold">Thông tin khách hàng</h2>
                    <i class="fas fa-edit text-gray-500"></i>
                </div>
                <div class="flex items-center justify-between mb-2">
                    <div class="w-full flex justify-between items-center">
                        <label for="name" class="text-gray-500">
                            Họ tên
                        </label>
                        <input type="text" name="customerName" id="name"
                            class="w-[70%] px-2 py-1 border-2 border-[#8c907e] rounded-md outline-none">
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <div class="w-full flex justify-between items-center">
                        <label for="phone" class="text-gray-500">
                            Số điện thoại
                        </label>
                        <input type="text" name="phoneNumber" id="phone"
                            class="w-[70%] px-2 py-1 border-2 border-[#8c907e] rounded-md outline-none">
                    </div>
                </div>
                <div class="flex justify-between items-center mb-4 text-2xl">
                    <h2 class="font-bold">Thông tin đơn hàng</h2>
                    <i class="fas fa-edit text-gray-500"></i>
                </div>
                <div class="flex items-center space-x-1 mb-1 text-center">
                    <p class="bg-gray-100 p-2 rounded-lg w-full">
                        Sản phẩm
                    </p>
                    <p class="bg-gray-100 p-2 rounded-lg w-full">
                        Giá
                    </p>
                    <p class="bg-gray-100 p-2 rounded-lg w-full">
                        Giảm giá
                    </p>
                </div>
                <div class="bg-gray-100 pl-4 p-2 py-4 rounded-lg mb-4 orders">
                    <div class="empty text-center text-gray-400">Trống</div>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-500">
                            Tổng thanh toán
                        </p>
                        <p class="text-gray-500 total-price">
                            0
                        </p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-gray-500">
                            Giảm giá
                        </p>
                        <p class="text-gray-500">
                            0
                        </p>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <p class="text-gray-700">
                            Phải thanh toán
                        </p>
                        <input type="text" readonly name="finalPrice" class="text-gray-700 text-right final-price"
                            value="0" />
                    </div>
                </div>
                <div class="flex space-x-2 mb-4">
                    <div class="w-full">
                        <button class="bg-gray-100 p-2 rounded-lg w-full">
                            Thêm voucher
                        </button>
                        <div id="boxpromotion">
                            <input type="text" name="voucher" id="" class="w-full p-1 border-2 mt-2 rounded-md">
                        </div>
                    </div>
                    <div class="w-full">
                        <button class="bg-gray-100 p-2 rounded-lg w-full">
                            Phương thức thanh toán
                        </button>
                        <div id="boxpayment">
                            <select name="paymentMethod" id="" class="w-full p-1 mt-2 border-2 rounded-md">
                                <option value="Tiền mặt">Tiền mặt</option>
                                <option value="Momo">Momo</option>
                                <option value="VNPay">VNPay</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnsubmit" class="bg-[#8c907e] text-white p-4 rounded-lg w-full">
                    Thanh toán
                </button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST["btnsubmit"])) {
        $name = $_POST["customerName"];
        $phone = $_POST["phoneNumber"];
        $voucher = $_POST["voucher"];
        $paymentMethod = $_POST["paymentMethod"];

        $finalPrice = (int) str_replace(['.', 'đ', ' '], '', $_POST["finalPrice"]);

        if (empty($name) || empty($phone)) {
            $ctrlMessage->warningMessage("Nhập đầy đủ thông tin khách hàng");
        } else {
            $resultCustomer = $ctrlCustomer->cInsertCustomerPos($name, $phone);
            if ($resultCustomer == null)
                $ctrlMessage->errorMessage("Tạo khách hàng mới thất bại");
            else {
                $customerID = $resultCustomer;
                $resultOrder = $ctrlOrder->cInsertOrder((int) $_SESSION["user"][2], $customerID, $paymentMethod);

                if ($resultOrder == null)
                    $ctrlMessage->errorMessage("Tạo đơn hàng mới thất bại");
                else {
                    foreach ($_SESSION["orders"] as $productID => $item) {
                        $orderID = (int) $resultOrder;
                        $resultOD = $ctrlOrder->cInsertOrderDetail($orderID, (int) $item["productID"], (int) $item["qty"], (int) $item["price"]);
                        if ($resultOD == null) {
                            $ctrlMessage->errorMessage("Nhập chi tiết đơn hàng thất bại");
                        }
                    }

                    $ctrlMessage->successMessage("Tạo đơn hàng thành công");
                    unset($_SESSION["orders"]);
                }
            }
        }
    }
    ?>

    <!-- Footer -->
    <footer class="pt-3">
        <div class="px-4">
            <div class="flex items-center justify-center mb-4">
                <div class="text-center text-sm text-muted text-start">
                    &copy; 2025 |
                    <a href="../../../" class="font-bold" target="_blank">4Goat</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            let finalPrice = 0;

            $(".product-item").click(function (e) {
                e.preventDefault();
                $(".empty").hide();

                let productID = $(this).attr("data-id");
                let productName = $(this).attr("data-name");
                let price = parseFloat($(this).attr("data-price"));

                $.ajax({
                    url: "process.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        productID: productID,
                        productName: productName,
                        price: price,
                        qty: 1
                    },
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (xhr, status, error) {
                    }
                });

                let existingItem = $(".orders").find(`.order-item[data-id='${productID}']`);

                if (existingItem.length > 0) {
                    let qtyInput = existingItem.find(".quantity");
                    let currentQty = parseInt(qtyInput.val());

                    let newQty = currentQty + 1;
                    qtyInput.val(newQty);

                    let totalElement = existingItem.find(".price");
                    let newTotal = (price * newQty).toFixed(2);
                    totalElement.text(newTotal);
                } else {
                    let orderItem = `
                            <div class="order-item grid grid-cols-3 gap-x-4 space-x-1 mb-1 pb-2 text-center border-b-[1px] border-[#DDD]" data-id="${productID}" data-price="${price}">
                                <div class="w-full text-left">${productName}</div>
                                <div>
                                    <p class="w-full price">${price.toLocaleString('vi-VN') + " đ"}</p>
                                    <del class="w-full unit-price">${price.toLocaleString('vi-VN') + " đ"}</del>
                                </div>
                                <div class="flex items-center justify-center space-x-2">
                                    <button type="button" class="decrease"><i class="fa-solid fa-minus"></i></button>
                                    <input type="text" name="quantity" value="1" class="quantity w-10 text-center">
                                    <button type="button" class="increase"><i class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>`;
                    $(".orders").append(orderItem);
                }

                updateFinalPrice();
            });

            $(document).on("click", ".increase", function () {
                let container = $(this).closest(".order-item");
                let qtyElement = container.find(".quantity");
                let currentQty = parseInt(qtyElement.val());
                let newQty = currentQty + 1;
                qtyElement.val(newQty);

                let unitPrice = parseFloat(container.data("price"));
                let totalPrice = (unitPrice * newQty).toLocaleString('vi-VN') + " đ";

                container.find(".price").text(totalPrice);

                updateFinalPrice();

                let productID = container.data("id");
                let productName = container.find(".w-full.text-left").text().trim();
                let price = unitPrice;

                $.ajax({
                    url: "process.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        productID: productID,
                        productName: productName,
                        price: price,
                        qty: newQty
                    },
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", error);
                    }
                });
            });

            $(document).on("click", ".decrease", function () {
                let container = $(this).closest(".order-item");
                let qtyElement = container.find(".quantity");
                let currentQty = parseInt(qtyElement.val());

                if (currentQty > 1) {
                    let newQty = currentQty - 1;
                    qtyElement.val(newQty);

                    let unitPrice = parseFloat(container.data("price"));
                    let totalPrice = (parseFloat(unitPrice) * newQty).toLocaleString('vi-VN') + " đ";

                    container.find(".price").text(totalPrice);

                    updateFinalPrice();

                    let productID = container.data("id");
                    let productName = container.find(".w-full.text-left").text().trim();
                    let price = parseFloat(container.data("price"));

                    $.ajax({
                        url: "process.php",
                        method: "POST",
                        dataType: "json",
                        data: {
                            productID: productID,
                            productName: productName,
                            price: price,
                            qty: newQty
                        },
                        success: function (res) {
                            console.log(res);
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX error:", error);
                        }
                    });
                }
            });

            $(document).on("input", ".quantity", function () {
                let container = $(this).closest(".order-item");
                let qty = parseInt($(this).val());

                if (isNaN(qty) || qty < 1) {
                    qty = 1;
                    $(this).val(qty);
                }

                let unitPrice = parseFloat(container.data("price"));
                let totalPrice = (unitPrice * qty).toLocaleString('vi-VN') + " đ";

                container.find(".price").text(totalPrice);

                updateFinalPrice();

                let productID = container.data("id");
                let productName = container.find(".w-full.text-left").text().trim();
                let price = parseFloat(container.data("price"));

                $.ajax({
                    url: "process.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        productID: productID,
                        productName: productName,
                        price: price,
                        qty: qty
                    },
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", error);
                    }
                });
            });

            function updateFinalPrice() {
                let total = 0;
                $(".order-item").each(function () {
                    let qty = parseInt($(this).find(".quantity").val());
                    let price = parseFloat($(this).data("price"));
                    total += qty * price;
                });
                $(".total-price").html(total.toLocaleString('vi-VN') + " đ");
                $(".final-price").val(total.toLocaleString('vi-VN') + " đ");
            }
        });
    </script>
</body>

</html>