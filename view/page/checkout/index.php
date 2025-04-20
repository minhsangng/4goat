<title>Thanh toán đơn hàng</title>

<main class="container mx-auto mt-10 px-4">
    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-1 bg-white p-6 shadow-md rounded-md">
            <?php
            $finalPrice = 0;

            if (isset($_GET["id"]))
                $resultCart = $ctrlCart->cGetCartByIDs($_GET["id"], $_SESSION["customer"][2]);
            else {
                $productIDs = implode(", ", $_SESSION["selectedCart"]);

                $resultCart = $ctrlCart->cGetCartByIDs($productIDs, $_SESSION["customer"][2]);
            }

            if ($resultCart != null) {
                while ($row = $resultCart->fetch_assoc()) {
                    if (!isset($cartID))
                        $cartID = $row["cartID"];
                        
                    $cart_detailID = $row["cart_detailID"];

                    echo '<div class="flex mb-6 relative">
                            <img alt="' . $row["productName"] . '" class="w-24 h-36 object-cover rounded-md shadow"
                                src="src/images/products/' . $row["image"] . '_1.png" />
                            <span class="px-2 absolute -top-2 left-20 bg-[#8c907e] rounded-full text-white">
                                ' . ($_GET["quantity"] ? $_GET["quantity"] : $row["quantity"]) . '
                            </span>
                            <div class="ml-4 flex-1">
                                <h2 class="text-lg! font-semibold m-0 mb-1">
                                    ' . $row["productName"] . '
                                </h2>
                                <div class="flex items-center justify-between">
                                    <p class="text-sm text-gray-600 m-0">
                                    ' . $row["size"] . ', ' . $row["color"] . '
                                    </p>
                                    <div>
                                        <form method="POST">
                                            <button type="submit" name="btnedit" value="' . $row["productID"] . '" class="ml-4! text-gray-500 hover:text-gray-700">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                            <button type="submit" name="btndel" value="' . $row["productID"] . '" class="ml-4! text-gray-500 hover:text-gray-700">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-xl font-bold my-1!">
                                    ' . number_format(($_GET["quantity"] ? $_GET["quantity"] * $row["price"] : $row["quantity"] * $row["price"]), 0, ",", ".") . ' <sup>đ</sup>
                                </p>
                            </div>
                        </div>';
                    $finalPrice += ($_GET["quantity"] ? $_GET["quantity"] * $row["price"] : $row["quantity"] * $row["price"]);
                }
            } else
                echo '<script>window.location.href = "index.php";</script>';

            if (isset($_POST["btnedit"])) {
                $id = (int) $_POST["btnedit"];
                echo '<script>window.location.href = "index.php?p=detail&id=' . $id . '";</script>';
            }

            if (isset($_POST["btndel"])) {
                if (!isset($_GET["id"]) || !isset($_GET["quantity"])) {
                    $productID = (int) $_POST["btndel"];
                    $resultCartDetail = $ctrlCart->cDeleteCartByID($cart_detailID);

                    if (!$resultCartDetail)
                        $ctrlMessage->errorMessage("Xóa sản phẩm thất bại");
                    else {
                        echo '<script>window.location.href = "index.php?p=checkout"; </script>';
                    }
                } else {
                    $id = $_GET["id"];
                    echo '<script>window.location.href = "index.php?p=detail&id='.$id.'"; </script>';
                }
            }
            ?>

            <div class="mt-6 bg-white p-6 shadow-md rounded-md">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-600">
                            Tạm tính
                        </p>
                        <p class="text-gray-600">
                            Phí ship
                        </p>
                        <input type="text" name="" id=""
                            class="border border-[#DDD] hover:outline-none px-2 py-1 text-base!"
                            placeholder="Nhập mã khuyến mãi">
                    </div>
                    <div class="text-right">
                        <p class="text-gray-600">
                            <?= number_format($finalPrice, 0, ",", ".") ?> <sup>đ</sup>
                        </p>
                        <p class="text-gray-600">
                            Miễn phí
                        </p>
                        <button
                            class="px-3 py-1 border border-gray-300 rounded-md w-full ml-4! bg-[#8c907e] text-white">Áp
                            dụng</button>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <p class="text-xl font-bold">
                        Tổng cộng
                    </p>
                    <p class="text-xl font-bold">
                        <?= number_format($finalPrice, 0, ",", ".") ?> <sup>đ</sup>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-span-2 bg-white p-6 shadow-md rounded-md">
            <form action="" method="POST">
                <div class="flex flex-col md:flex-row justify-between">
                    <div class="w-2/3">
                        <h2 class="text-3xl! font-bold mb-4">
                            Thông tin mua hàng
                        </h2>
                        <form>
                            <div class="mb-2">
                                <input class="w-full p-2 border border-gray-300 rounded" placeholder="Email"
                                    type="email" />
                            </div>
                            <div class="mb-2">
                                <input class="w-full p-2 border border-gray-300 rounded" placeholder="Họ và tên"
                                    type="text" />
                            </div>
                            <div class="mb-2 flex items-center">
                                <input class="w-full p-2 border border-gray-300 rounded" placeholder="Số điện thoại"
                                    type="text" />
                            </div>
                            <div class="mb-2">
                                <select id="province" class="w-full p-2 border border-gray-300 rounded">
                                    <option value="">
                                        Tỉnh thành
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <select id="district" class="w-full p-2 border border-gray-300 rounded" disabled>
                                    <option value="">
                                        Quận huyện
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <select id="ward" class="w-full p-2 border border-gray-300 rounded" disabled>
                                    <option value="">
                                        Phường xã
                                    </option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <textarea class="w-full p-2 border border-gray-300 rounded" row="1"
                                    placeholder="Số nhà, tên đường"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="w-1/3">
                        <?php
                        if (!isset($_SESSION["customer"])) {
                            echo '<div class="bg-blue-100 px-4 py-3 ml-4 rounded mb-4">
                                    <p class="text-red-600 m-0">
                                        Vui lòng <a href="view/page/login/" class="underline!">đăng nhập</a> trước khi thanh toán 
                                    </p>
                                </div>';
                        }
                        ?>
                        <h2 class="text-3xl! ml-4! font-bold mb-4">
                            Thanh toán
                        </h2>
                        <div class="border p-4 ml-4 rounded mb-4">
                            <div class="flex items-center mb-2">
                                <input class="mr-2!" id="bank-transfer" name="payment" type="radio" />
                                <label class="flex items-center" for="bank-transfer">
                                    Qua ngân hàng
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input class="mr-2!" id="cod" name="payment" type="radio" />
                                <label class="flex items-center" for="cod">
                                    Khi nhận hàng (COD)
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-center items-center">
                            <button type="submit" name="btnpayment"
                                class="px-4 py-2 border border-gray-300 rounded-md w-full ml-4! bg-[#8c907e] text-white">Thanh
                                toán</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</main>

<script>
    const provinceSelect = document.getElementById("province");
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

    fetch(`https://provinces.open-api.vn/api/p/`)
        .then(res => res.json())
        .then(data => {
            data.forEach(province => {
                const option = document.createElement("option");
                option.value = province.code;
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
        });

    provinceSelect.addEventListener("change", function () {
        const provinceCode = this.value;
        districtSelect.innerHTML = "<option value=''>Quận huyện</option>";
        wardSelect.innerHTML = "<option value=''>Phường xã</option>";
        wardSelect.disabled = true;

        if (!provinceCode) {
            districtSelect.disabled = true;
            return;
        }

        fetch(`https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`)
            .then(res => res.json())
            .then(data => {
                data.districts.forEach(district => {
                    const option = document.createElement("option");
                    option.value = district.code;
                    option.textContent = district.name;
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false;
            });
    });

    districtSelect.addEventListener("change", function () {
        const districtCode = this.value;
        wardSelect.innerHTML = "<option value=''>Phường xã</option>";

        if (!districtCode) {
            wardSelect.disabled = true;
            return;
        }

        fetch(`https://provinces.open-api.vn/api/d/${districtCode}?depth=2`)
            .then(res => res.json())
            .then(data => {
                data.wards.forEach(ward => {
                    const option = document.createElement("option");
                    option.value = ward.code;
                    option.textContent = ward.name;
                    wardSelect.appendChild(option);
                });
                wardSelect.disabled = false;
            });
    });
</script>