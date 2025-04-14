<div class="container-fluid py-4">
    <div class="row">
        <div class="">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0">Thông tin sản phẩm</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" name="name" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Danh mục</label>
                                    <select class="form-control" name="category" required>
                                        <option value="" selected hidden>---- ---- ---</option>
                                        <?php
                                        $resultProduct = $ctrlProduct->cGetAllCategory();

                                        if ($resultProduct != 0) {
                                            while ($row = $resultProduct->fetch_assoc()) {
                                                echo '<option value="' . $row["categoryID"] . '">' . $row["categoryName"] . '</option>';
                                            }
                                        } else
                                            echo '<p>Không có dữ liệu</p>';
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Thương hiệu</label>
                                    <select class="form-control" name="brand" id="">
                                        <option value="" selected hidden>---- ---- ---</option>
                                        <?php
                                        $resultBrand = $ctrlBrand->cGetAllBrand();

                                        if ($resultBrand != 0) {
                                            while ($row = $resultBrand->fetch_assoc()) {
                                                echo '<option value="' . $row["brandID"] . '">' . $row["brandName"] . '</option>';
                                            }
                                        } else
                                            echo '<p>Không có dữ liệu</p>';
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Bộ sưu tập</label>
                                    <select class="form-control" name="collection">
                                        <option value="" selected hidden>---- ---- ---</option>
                                        <?php
                                        $resultCollection = $ctrlCollection->cGetAllCollection();

                                        if ($resultCollection != 0) {
                                            while ($row = $resultCollection->fetch_assoc()) {
                                                echo '<option value="' . $row["collectionID"] . '">' . $row["collectionName"] . '</option>';
                                            }
                                        } else
                                            echo '<p>Không có dữ liệu</p>';
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Dành cho</label> <br>
                                    <div class="flex items-center input-group-text">
                                        <input name="sex[]"
                                            class="form-check-input checked:border-blue-400! border-2! border-blue-100! mr-2!"
                                            type="checkbox" value="1" id="male"><label for="male"
                                            class="mr-4 mb-0">Nam</label>
                                        <input name="sex[]"
                                            class="form-check-input checked:border-blue-400! border-2! border-blue-100! mr-2!"
                                            type="checkbox" value="2" id="female"><label for="female"
                                            class="mb-0">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Màu sắc</label>
                                    <input class="form-control h-10!" type="text" name="color" value=""
                                        placeholder="Trắng, Đen, ..." required>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Giá bán</label>
                                    <input class="form-control" type="text" name="price" value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Hình ảnh</label>
                                    <input class="form-control" type="file" name="file[]" multiple value="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Size</label>
                                    <input class="form-control" type="text" name="size" value="" placeholder="M, L, ..."
                                        required>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" name="btnsubmit" class="btn btn-outline-info hover:btn-info">Xác
                                    nhận</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    function removeVietnameseSigns($str)
                    {
                        $str = preg_replace([
                            "/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/u",
                            "/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/u",
                            "/(ì|í|ị|ỉ|ĩ)/u",
                            "/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/u",
                            "/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/u",
                            "/(ỳ|ý|ỵ|ỷ|ỹ)/u",
                            "/(đ)/u",
                            "/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/u",
                            "/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/u",
                            "/(Ì|Í|Ị|Ỉ|Ĩ)/u",
                            "/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/u",
                            "/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/u",
                            "/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/u",
                            "/(Đ)/u",
                        ], [
                            "a",
                            "e",
                            "i",
                            "o",
                            "u",
                            "y",
                            "d",
                            "A",
                            "E",
                            "I",
                            "O",
                            "U",
                            "Y",
                            "D"
                        ], $str);

                        return $str;
                    }

                    function toSlug($str)
                    {
                        $str = removeVietnameseSigns($str);
                        $str = strtolower($str); // chuyển thường
                        $str = preg_replace('/[^a-z0-9\s]/', '', $str); // bỏ ký tự đặc biệt
                        $str = preg_replace('/\s+/', '', $str);
                        return trim($str, '-'); // loại bỏ dấu - đầu/cuối
                    }

                    if (isset($_POST["btnsubmit"])) {
                        $productName = $_POST["name"];
                        $categoryID = (int) $_POST["category"];
                        $brandID = isset($_POST["brand"]) ? (int) $_POST["brand"] : 0;
                        $collectionID = isset($_POST["collection"]) ? (int) $_POST["collection"] : 0;
                        $sex = $_POST["sex"];
                        $color = $_POST["color"];
                        $size = $_POST["size"];
                        $price = (int) $_POST["price"];
                        $images[] = $_FILES["file"];

                        if (empty($sex) || (in_array(1, $sex) && in_array(2, $sex)))
                            $sex = 0;
                        else
                            $sex = (int) $sex[0];

                        $nameFolder = strtolower($productName);

                        if (!file_exists("../../../src/images/products/" . $nameFolder)) {
                            if (!mkdir("../../../src/images/products/" . $nameFolder, 0777, true)) {
                                echo "Không thể tạo thư mục.";
                            }
                        } else
                            echo "Thư mục đã tồn tại";

                        $n = 0;
                        foreach ($images as $img) {
                            $n++;
                            $newName = explode(".", toSlug($productName))[0];

                            if (!move_uploaded_file($img["tmp_name"][0], "../../../src/images/products/" . $nameFolder . "/" . $newName . "_" . $n . ".png")) {
                                echo '<script>alert("Tải ảnh thất bại");</script>';

                                $resultProduct = $ctrlProduct->cInsertProduct($productName, $categoryID, $brandID, $collectionID, $sex, $price, $nameFolder."/".$newName, 1);
                                if (!$resultProduct) {
                                    echo '<script>alert("Thất bại");</script>';
                                } else
                                    echo '<script>alert("Thành công");</script>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>