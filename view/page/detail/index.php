<html lang="en">
<?php
if (isset($_GET["id"]))
    $productID = (int) $_GET["id"];

$result = $ctrlProduct->cGetProductByID($productID);

if ($result != 0)
    $row = $result->fetch_assoc();
?>
<title>
    <?= $row["productName"] ?>
</title>

<style>
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        /* Firefox */
    }
</style>

<section class="bg-white pt-12 pb-6 bg-light">
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row space-y-8 lg:space-y-0 lg:space-x-8 p-4 bg-gray-100 rounded-lg">
            <div class="flex-1">
                <div class="rounded-lg">
                    <?php
                    echo '<img alt="' . $row["productName"] . '" class="w-full h-96 rounded-md" src="src/images/products/' . $row["image"] . '_1.png"/>';
                    ?>
                </div>
                <div class="flex space-x-4 mt-4">
                    <?php
                    for ($i = 0; $i < 4; $i++) {
                        echo '<img alt="' . $row["productName"] . '" class="w-20 h-20 object-cover rounded-lg cursor-pointer ' . ($i + 1 != 1 ? "opacity-50" : "") . '" src="src/images/products/' . $row["image"] . '_' . ($i + 1) . '.png" />';
                    }

                    ?>
                </div>
            </div>
            <div class="flex-1">
                <form action="" method="POST">
                    <div class="space-y-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="index.php?c=<?= $row["sex"] ?>">Thời
                                        trang<?= ($row["sex"] == 1 ? " nam" : " nữ") ?></a></li>
                                <li class="breadcrumb-item acive" aria-current="page"><a
                                        href="#"><?= $row["productName"] ?></a>
                                </li>
                            </ol>
                        </nav>
                        <h1 class="text-4xl! font-bold border-l-2 pl-4">
                            <?= $row["productName"] ?>
                        </h1>
                        <div id="rating" class="flex items-center space-x-2">
                            <div class="flex items-center">
                                <?php
                                $resultReview = $ctrlProduct->cGetStarRate($productID);
                                $rowReview = $resultReview->fetch_assoc();

                                list($rate, $dec) = explode(".", round(number_format($rowReview["AvgRate"], 1, ",", ".") * 2) / 2);

                                for ($i = 0; $i < (int) $rate; $i++)
                                    echo '<i class="fas fa-star text-yellow-500"></i>';

                                if ($dec != 0)
                                    echo '<i class="fa-solid fa-star-half text-yellow-500"></i>';
                                ?>

                            </div>
                            <span class="text-gray-500">
                                <?= $rowReview["CountRV"] ?> bài đánh giá
                            </span>
                        </div>
                        <div class="text-3xl font-bold">
                            <p class="m-0 p-3 rounded-sm bg-[#DDD]">
                                <?php echo number_format($row["price"], 0, ",", ".") ?>
                                <sup>đ</sup>
                            </p>
                        </div>
                        <div class="space-y-8">
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-700">
                                    Màu
                                </span>
                                <div class="grid grid-cols-<?php
                                $colors = explode(",", $row["colors"]);
                                echo count($colors);
                                ?> gap-2">
                                    <?php
                                    foreach ($colors as $c) {
                                        echo '<button type="button" data-id="' . $row["productID"] . '" name="btncolor" value="' . $c . '" class="color border rounded-lg py-1 px-4' . (isset($_SESSION["selected"]["color"]) && $_SESSION["selected"]["color"] == $c ? " bg-blue-400 text-white" : "") . '">' . $c . '</button>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-700">
                                    Size
                                </span>
                                <div class="grid grid-cols-<?php
                                $sizes = explode(",", $row["sizes"]);
                                echo count($sizes);
                                ?> gap-2">
                                    <?php
                                    foreach ($sizes as $s) {
                                        echo '<button type="button" data-id="' . $row["productID"] . '" name="btnsize" value="' . $s . '" class="size border rounded-lg py-1 px-4' . (isset($_SESSION["selected"]["size"]) && $_SESSION["selected"]["size"] == $s ? " bg-blue-400 text-white" : "") . '">' . $s . '</button>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-gray-700">
                                    Số lượng
                                </span>
                                <div class="flex items-center justify-center space-x-2 px-2 py-1 border border-[#DDD]">
                                    <button type="button" class="decrease px-2"><i
                                            class="fa-solid fa-minus"></i></button>
                                    <input type="number" value="1" name="quantity"
                                        class="quantity w-10 text-center border-l border-r border-[#DDD]">
                                    <button type="button" class="increase px-2"><i
                                            class="fa-solid fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-500 mt-4">
                            <i class="fas fa-truck">
                            </i>
                            <span>
                                Miễn phí giao hàng cho đơn hàng từ 50.000 <sup>đ</sup>
                            </span>
                        </div>
                        <div class="grid grid-cols-2 gap-x-4 mt-2">
                            <button type="submit" name="btnaddcart"
                                class="w-full text-[#8c907e] bg-gray-200 py-3 rounded-lg flex items-center justify-center space-x-2">
                                <i class="fas fa-shopping-cart">
                                </i>
                                <span>
                                    Thêm vào giỏ hàng
                                </span>
                            </button>
                            <button type="submit" name="btnnext"
                                class="w-full bg-[#8c907e] text-white py-3 rounded-lg flex items-center justify-center space-x-2">
                                <span>
                                    Mua ngay
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
if (isset($_POST["btnaddcart"])) {
    $quantity = (int) $_POST["quantity"];
    $price = (int) $row["price"];
    $color = $_SESSION["selected"]["color"];
    $size = $_SESSION["selected"]["size"];

    if ($ctrlCart->cCheckCart($_SESSION["customer"][2]) != 0) {
        $resultCart = $ctrlCart->cCheckCart($_SESSION["customer"][2]);
        $cartID = (int) $resultCart["cartID"];

        $resultProduct = $ctrlCart->cCheckProduct($cartID, $productID);

        if ($resultProduct == 0) {
            $resultCartDetail = $ctrlCart->cAddToCartDetail($cartID, $productID, $price, $quantity, $color, $size, 0, NULL);

            if (!$resultCartDetail)
                echo "<script>alert('Thêm giỏ hàng thất bại');</script>";
            else
                echo "<script> if (alert('Thêm giỏ hàng thành công') != false) window.location.href = 'index.php?p=detail&id=" . $productID . "';</script>";
        } else
            echo "<script>alert('Sản phẩm này đã thêm vào giỏ hàng');</script>";
    } else {
        $resultCart = $ctrlCart->cAddToCart($_SESSION["customer"][2]);

        if (!$resultCart)
            echo "<p>Thêm giỏ hàng thất bại</p>";
        else
            $resultCartDetail = $ctrlCart->cAddToCartDetail($resultCart, $productID, $price, $quantity, $color, $size, 0, NULL);
    }
}

if (isset($_POST["btnnext"])) {
    $quantity = $_POST["quantity"];
    echo "<script>window.location.href = 'index.php?p=checkout&id=" . $productID . "&quantity=" . $quantity . "';</script>";
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.querySelectorAll(".increase").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const qtyInput = this.parentElement.querySelector(".quantity");
            let currentQty = parseInt(qtyInput.value) || 1;
            qtyInput.value = currentQty + 1;
        });
    });

    document.querySelectorAll(".decrease").forEach(function (btn) {
        btn.addEventListener("click", function () {
            const qtyInput = this.parentElement.querySelector(".quantity");
            let currentQty = parseInt(qtyInput.value) || 1;
            if (currentQty > 1) {
                qtyInput.value = currentQty - 1;
            }
        });
    });

    document.querySelectorAll(".quantity").forEach(function (input) {
        input.addEventListener("input", function () {
            let qty = parseInt(this.value);
            if (isNaN(qty) || qty < 1) {
                this.value = 1;
            }
        });
    });

    let productID = "";
    let selectedColor = "";
    let selectedSize = "";

    $(document).ready(function () {
        selectedColor = $(".color.bg-blue-400").val() || "";
        selectedSize = $(".size.bg-blue-400").val() || "";
    });

    $(document).on("click", ".color", function () {
        selectedColor = $(this).val();
        productID = $(this).attr("data-id");

        $('.color').removeClass('bg-blue-400 text-white');
        $(this).addClass('bg-blue-400 text-white');

        sendSelection();
    });

    $(document).on("click", ".size", function () {
        selectedSize = $(this).val();
        productID = $(this).attr("data-id");

        $('.size').removeClass('bg-blue-400 text-white');
        $(this).addClass('bg-blue-400 text-white');

        sendSelection();
    });

    function sendSelection() {
        $.ajax({
            url: "view/page/detail/process.php",
            method: "POST",
            data: {
                productID: productID,
                color: selectedColor,
                size: selectedSize
            },
            success: function (response) {
                console.log("Đã gửi:", response);
            }
        });
    }
</script>


</body>

</html>