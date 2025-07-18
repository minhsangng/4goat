<?php
$arr_cate = [1 => "Thời trang nam", 2 => "Thời trang nữ"];
if (isset($_GET["c"])) {
    $id = (int) $_GET["c"];
    echo "<title>" . $arr_cate[$id] . "</title>";
} else if (isset($_GET["s"])) {
    $search = $_GET["s"];
    echo "<title>Kết quả cho: " . $search . "</title>";
} else {
    echo "<title>Tất cả sản phẩm</title>";
}
?>

<style>
    .star-rating i {
        transition: color 0.2s;
        color: #ccc;
    }

    .star-rating i.hovered,
    .star-rating i.selected {
        color: gold;
    }
</style>

<section class="bg-white pt-12 pb-6 bg-light">
    <div class="container mx-auto px-4 grid grid-cols-1">

        <div class="grid grid-cols-5 gap-2">
            <?php
            $result = $ctrlBrand->cGetAllBrand();

            if ($result != 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<img src="src/images/brands/' . $row["image"] . '" class="w-full h-24 border-2 border-[#DDD]" alt="' . $row["brandName"] . '">';
                }
            }
            ?>
        </div>

    </div>
</section>

<!-- Products Section -->
<section class="bg-white pt-6 pb-12">
    <div class="container mx-auto px-4">
        <div class="mb-8 bg-[#f1f1f0] px-4 py-3 rounded-sm">
            <?php
            if (isset($_POST["new"]))
                $_SESSION["productSort"] = "new";
            else if (isset($_POST["top"]))
                $_SESSION["productSort"] = "top";
            else
                $_SESSION["productSort"] = "pop";
                
            if (!isset($_POST["sort"]))
                $_SESSION["sort"] = "ASC";
            ?>

            <form action="" method="POST" id="sortForm" class="flex items-center ">
                <p class="ml-0 my-0 mr-3">Sắp xếp theo</p>
                <button type="submit" name="pop"
                    class="bg-<?= ($_SESSION["productSort"] == "pop" ? "[#8c907e] text-white" : "white text-gray-700") ?> px-4 py-1 rounded-sm! mr-2!">
                    Phổ biến
                </button>
                <button type="submit" name="new"
                    class="bg-<?= ($_SESSION["productSort"] == "new" ? "[#8c907e] text-white" : "white text-gray-700") ?> px-4 py-1 rounded-sm! mr-2!">
                    Mới nhất
                </button>
                <button type="submit" name="top"
                    class="bg-<?= ($_SESSION["productSort"] == "top" ? "[#8c907e] text-white" : "white text-gray-700") ?> px-4 py-1 rounded-sm! mr-2!">
                    Bán chạy
                </button>
                <select name="sort" id="" class="bg-white outline-none px-2 py-1 rounded-sm w-40"
                    onchange="document.getElementById('sortForm').submit()">
                    <option value="" selected hidden>Giá</option>
                    <option value="ASC" <?= ($_POST["sort"] == "ASC" ? "selected" : "") ?>>Thấp đến cao</option>
                    <option value="DESC" <?= ($_POST["sort"] == "DESC" ? "selected" : "") ?>>Cao đến thấp</option>
                </select>
            </form>
        </div>

        <div class="flex justify-between">
            <div class="w-2/10 pr-2">
                <h3 class="pb-3 border-b-2 border-[#DDD] text-2xl! font-bold! flex items-center"><ion-icon
                        name="apps-outline" class="mr-2"></ion-icon>
                    Tất Cả Danh Mục</h3>

                <?php
                echo '<h4 class="text-lg! text-[#8c907e]! font-bold!"><ion-icon name="arrow-redo-outline" class="mr-2"></ion-icon>' . (isset($_GET["c"]) ? $arr_cate[$id] : "Danh mục sản phẩm") . '</h4>';

                echo "<ul>";
                if (isset($_GET["c"]))
                    $result = $ctrlProduct->cGetCategoryBySex($id);
                else
                    $result = $ctrlProduct->cGetAllCategory();

                if ($result != 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="mb-1"><a href="index.php?p=shop&c=' . $id . '&cate=' . $row["categoryID"] . '">' . $row["categoryName"] . '</a></li>';
                    }
                }

                echo "</ul>";
                ?>

                <h3 class="pb-3 border-b-2 border-[#DDD] text-2xl! font-bold! flex items-center"><ion-icon
                        name="funnel-outline" class="mr-2"></ion-icon></ion-icon>
                    Bộ lọc</h3>

                <form action="" method="POST">
                    <h4 class="text-lg! text-[#8c907e]! font-bold!"><ion-icon name="arrow-redo-outline"
                            class="mr-2"></ion-icon>Khoảng giá</h4>
                    <div class="flex justify-between items-center w-full mb-3">
                        <input type="number" name="minPrice" id="" min="0" placeholder="Từ"
                            value="<?= $_POST["minPrice"] ?>"
                            class="bg-white px-2 py-1 rounded-sm w-28 border-2 border-[#DDD]">
                        <input type="number" name="maxPrice" id="" min="0" placeholder="Đến"
                            value="<?= $_POST["maxPrice"] ?>"
                            class="bg-white px-2 py-1 rounded-sm w-28 border-2 border-[#DDD]">
                    </div>

                    <h4 class="text-lg! text-[#8c907e]! font-bold!"><ion-icon name="arrow-redo-outline"
                            class="mr-2"></ion-icon>Đánh giá</h4>
                    <div class="star-rating flex justify-around items-center text-2xl text-gray-400 mb-3">
                        <input type="hidden" name="rating" value="" id="rate">
                        <button type="button"><i class="fa-regular fa-star cursor-pointer" data-index="1"></i></button>
                        <button type="button"><i class="fa-regular fa-star cursor-pointer" data-index="2"></i></button>
                        <button type="button"><i class="fa-regular fa-star cursor-pointer" data-index="3"></i></button>
                        <button type="button"><i class="fa-regular fa-star cursor-pointer" data-index="4"></i></button>
                        <button type="button"><i class="fa-regular fa-star cursor-pointer" data-index="5"></i></button>
                    </div>

                    <button type="submit" name="btnsort"
                        class="btn bg-[#8c907e]! text-white w-full rounded-md! mt-2 uppercase!">Áp dụng</button>
                </form>
            </div>

            <div class="w-8/10 pl-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item <?= (!isset($_GET["cate"]) ? "acive" : "") ?>" aria-current="page"><a
                                href="index.php?p=shop&c=<?= $id ?>"><?php
                                    if (isset($_GET["c"])) echo $arr_cate["$id"];
                                    else if (isset($_GET["s"])) echo "Kết quả phù hợp cho: " . $search;
                                    else echo "Tất cả sản phẩm";
                                ?></a>
                        </li>

                        <?php
                        if (isset($_GET["cate"])) {
                            $categoryID = $_GET["cate"];
                            $result = $ctrlProduct->cGetCategoryByID($categoryID);
                            $row = $result->fetch_assoc();

                            echo '<li class="breadcrumb-item acive" aria-current="page"><a href="index.php?p=shop&c=' . $id . '&cate=' . $row["categoryID"] . '">' . $row["categoryName"] . '</a></li>';
                        }
                        ?>
                    </ol>
                </nav>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-2">
                    <?php
                    $limit = 15;

                    $_SESSION["currentPage"] = isset($_SESSION["currentPage"]) ? (int) $_SESSION["currentPage"] : 1;

                    if (isset($_POST["nextPage"])) {
                        $_SESSION["currentPage"]++;
                    }

                    if (isset($_POST["lastPage"]) && $_SESSION["currentPage"] > 1) {
                        $_SESSION["currentPage"]--;
                    }

                    $offset = ($_SESSION["currentPage"] - 1) * $limit;

                    if (isset($_GET["cate"]))
                        $result = $ctrlProduct->cGetProductBySexOnCategory($id, $categoryID);
                    else if (isset($_POST["btnsort"])) {
                        $min = $_POST["minPrice"];
                        $max = $_POST["maxPrice"];
                        $rating = $_POST["rating"];

                        $result = $ctrlProduct->cGetProductByPrice($id, $min, $max);
                    } else if (isset($_POST["sort"])) {
                        $sort = $_SESSION["sort"];

                        $result = $ctrlProduct->cGetProductSortPrice($sort, $id, $limit, $offset);
                    } else if (isset($_GET["s"])) {
                        $search = $_GET["s"];
                        $result = $ctrlProduct->cGetProductBySearch($search, $limit, $offset);
                    } else if (isset($_GET["c"]))
                        $result = $ctrlProduct->cGetProductBySexOnPage($id, $limit, $offset);
                    else
                        $result = $ctrlProduct->cGetAllProductOnPage($limit, $offset);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="border-1 border-[#DDD] rounded-lg pb-2 cursor-pointer relative">
                                <form method="POST" class="group">
                                    <button type="button" onclick="addWishlist(' . $id . ', ' . $row["productID"] . ')" class="drop-shadow-2xl drop-shadow-red-900 absolute top-2 right-2 z-50" name="addwishlist" value="' . $row["productID"] . '"><i class="' . (isset($_SESSION["wishlistItems"]) && in_array((int) $row["productID"], $_SESSION["wishlistItems"]) ? "fa-solid" : "fa-regular") . ' fa-heart text-[#8c907e] text-xl"></i></button>
                                    <span class="hidden group-hover:flex justify-center items-center transition linear-ease w-4 bg-white p-1 shadow rounded-lg absolute top-8 right-[10px] [writing-mode:vertical-rl] [text-orientation:upright] text-center text-xs">Yêu thích</span>
                                </form>
                                <a href="index.php?p=detail&id=' . $row["productID"] . '" class="flex flex-col items-center z-40">
                                    <img alt="' . $row["productName"] . '" class="mb-1 w-full h-54 rounded-tl-md rounded-tr-md" src="src/images/products/' . $row["image"] . '_1.png"/>
                                    <div class="w-full px-2">
                                        <p class="text-lg mx-0 mb-2 mt-1 h-fit overflow-hidden text-ellipsis whitespace-nowrap">
                                            ' . $row["productName"] . '
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <p class="text-red-400 m-0">
                                            ' . number_format($row["price"], 0, ",", ".") . ' <sup>đ</sup>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>';
                        }
                    } else
                        echo "<p>Chưa có dữ liệu</p>";
                    ?>
                </div>
            </div>
        </div>

        <form action="" method="POST" class="w-full mx-auto mt-4 flex justify-end">
            <button type="submit" name="lastPage" <?php echo ($_SESSION["currentPage"] == 1) ? "disabled" : ""; ?>
                class="btn bg-white border-1! border-[#DDD]! text-gray-700! hover:bg-gray-100! w-fit! rounded-md!"><i
                    class="fa-solid fa-arrow-left"></i></button>
            <div class="bg-white border-1! border-[#DDD]! rounded-md! mx-2! flex items-center">
                <input type="text" name="currentPage" value="<?php echo $_SESSION["currentPage"]; ?>" readonly
                    class="btn text-gray-700! w-9!" />/
                <span class="pl-1 pr-3 w-9">
                    <?php
                    echo $ctrlProduct->cGetAllProduct()->num_rows / 15;
                    ?>
                </span>
            </div>
            <button type="submit" name="nextPage" <?php echo ($result->num_rows < 15) ? "disabled" : ""; ?>
                class="btn bg-white border-1! border-[#DDD]! text-gray-700! hover:bg-gray-100! w-fit! rounded-md!"><i
                    class="fa-solid fa-arrow-right"></i></button>
        </form>
    </div>
</section>

<script>
    const stars = document.querySelectorAll(".star-rating i");
    const ratingText = document.getElementById("rate");
    let selectedRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener("mouseover", () => {
            for (let i = 0; i <= index; i++) {
                stars[i].classList.add("hovered");
            }
        });

        star.addEventListener("mouseout", () => {
            stars.forEach((s) => s.classList.remove("hovered"));
        });

        star.addEventListener("click", () => {
            selectedRating = parseInt(star.getAttribute("data-index"));
            stars.forEach((s, i) => {
                s.classList.toggle("selected", i < selectedRating);
            });

            ratingText.value = selectedRating;
        });
    });

    function addWishlist(sex, productID) {
        $.ajax({
            url: "view/page/shop/process.php",
            method: "POST",
            dataType: "json",
            data: {
                sex: sex,
                productID: productID,
            },
            success: function (response) {
                if (response.status == "success")
                    window.location.href = "index.php?p=shop&c=" + response.sex;
                else if (response.status == "warning")
                    message(response.status, response.message);
            }
        });
    }

    function message(status, message) {
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: status,
            title: message
        });
    }
</script>