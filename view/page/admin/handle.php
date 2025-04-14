<div class="container-fluid py-4">
    <div class="row px-3 h-[70vh]">
        <div
            class="table-responsive mb-lg-0 mb-4 px-2 bg-white flex justify-center items-center space-x-14 rounded-2xl">
            <a class="px-4 py-6 hover:no-underline! hover:not-focus:scale-110 transition ease-linear border-2 border-[#DDD] rounded-md text-2xl flex flex-col justify-center items-center"
                href="pos.php"><i class="mb-3 fa-solid fa-cart-plus"></i>Tạo đơn hàng</a>
            <a class="px-4 py-6 hover:no-underline! hover:not-focus:scale-110 transition ease-linear border-2 border-[#DDD] rounded-md text-2xl flex flex-col justify-center items-center"
                href="" data-bs-target="#editModal" data-bs-toggle="modal"><i
                    class="mb-3 fa-solid fa-screwdriver"></i>Sửa đơn hàng</a>
            <a class="px-4 py-6 hover:no-underline! hover:not-focus:scale-110 transition ease-linear border-2 border-[#DDD] rounded-md text-2xl flex flex-col justify-center items-center"
                href="" data-bs-target="#delModal" data-bs-toggle="modal"><i class="mb-3 fa-solid fa-eraser"></i>Xoá đơn
                hàng</a>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" aria-hidden="true" aria-labelledby="editModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-2xl!" id="editModalLabel">Sửa đơn hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><label class="text-lg! m-0 mr-2!" for="orderID">Mã đơn hàng</label></td>
                            <td><input type="text" name="orderID" id="orderID" required
                                    class="px-3 py-2 rounded-md border border[#DDD] hover:outline-none text-lg w-full">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnconfirm" value="edit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="delModal" aria-hidden="true" aria-labelledby="delModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-2xl!" id="delModalLabel">Xoá đơn hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td><label class="text-lg! m-0 mr-2!" for="orderID">Mã đơn hàng</label></td>
                            <td><input type="text" name="orderID" id="orderID" required
                                    class="px-3 py-2 rounded-md border border[#DDD] hover:outline-none text-lg w-full">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnconfirm" value="del" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST["btnconfirm"])) {
    $orderID = (int) $_POST["orderID"];

    $result = $ctrlOrder->cCheckOrder($orderID);

    if ($result > 0) {
        echo '<script>
            window.addEventListener("load", ()=> {
                const myModal = new bootstrap.Modal(document.getElementById("editFormModal"));
                myModal.show();
            });
        </script>';
    } else {
        echo '<script>
            alert("Đơn hàng không tồn tại");
        </script>';
    }
}
?>

<style>
    tr {
        border-bottom: 1px solid #DDD;
    }

    p {
        margin-bottom: 2px;
    }

    h4 {
        margin: 0;
    }
</style>

<div class="modal fade" id="editFormModal" aria-hidden="true" aria-labelledby="editFormModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editFormModalLabel"><?php
                    $result = $ctrlOrder->cGetOrderByID($orderID);
                    $row = $result->fetch_assoc();

                    echo "Thông tin - #DH1" . ($row["orderID"] < 10 ? "0" . $row["orderID"] : $row["orderID"]);

                    ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td width="30%">
                                <h4>Sản phẩm</h4>
                            </td>
                            <td>
                                <div class="flex flex-col space-y-2!">
                                    <?php
                                    $products = explode(",", $row["products"]);
                                    foreach ($products as $p) {
                                        preg_match('/^(.*) \(x(\d+)\)$/', $p, $matches);
                                        $productName = $matches[1];
                                        $quantity = $matches[2];
                                        echo '<div class="flex justify-between"><p>' . $matches[1] . '</p><input type="text" '.(isset($_POST["btnconfirm"]) && $_POST["btnconfirm"] == "del" ? "readonly" : "").' value="' . $matches[2] . '" name="quantity' . ($matches[1] == $row["productID"] ? $row["productID"] : "") . '" class="px-2! py-1! h-fit! hover:outline-none w-10"></div>';
                                    }
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Khách hàng</h4>
                            </td>
                            <td>
                                <div class="pt-2">
                                    <?php
                                    echo '<p>' . $row["customerName"] . '</p>';
                                    echo '<p>' . $row["phoneNumber"] . '</p>';
                                    echo '<p>' . $row["address"] . '</p>';
                                    ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Ngày đặt</h4>
                            </td>
                            <td>
                                <div class="pt-2">
                                    <?php echo '<p>' . $row["date"] . '</p>'; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Trạng thái</h4>
                            </td>
                            <td>
                                <div class="pt-2">
                                    <?php
                                    echo '<p>' . ($row["status"] == 1 ? "Hoàn thành" : "Đang giao") . '</p>';
                                    ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <?php
                    if (isset($_POST["btnconfirm"]) && $_POST["btnconfirm"] == "edit")
                        echo '<button type="submit" name="btnupdate" class="btn btn-primary">Sửa</button>';

                    if (isset($_POST["btnconfirm"]) && $_POST["btnconfirm"] == "del")
                        echo '<button type="submit" name="btndel" class="btn btn-primary">Xoá</button>';
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>