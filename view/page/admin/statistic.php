<style>
    th,
    td {
        padding: 4px 12px;
        font-size: 1rem;
    }
</style>

<div class="container-fluid py-4">
    <div class="row px-3 h-full">
        <div class="table-responsive mb-lg-0 mb-4 px-2 bg-white rounded-2xl">
            <div class="flex items-center mt-4 ml-2 space-x-4!">
                <form action="" method="POST">
                    <label class="text-lg m-0 mr-2!" for="start">Từ</label><input type="date" name="startDate" id="start"
                        value="<?= date('Y-m-01') ?>"
                        class="border boder-[#DDD] px-3 py-1 rounded-md hover:outline-none text-lg">
                    <label class="text-lg m-0 mr-2! ml-3!" for="end">Đến</label><input type="date" name="endDate" id="end"
                        value="<?= date('Y-m-t') ?>"
                        class="border boder-[#DDD] px-3 py-1 rounded-md hover:outline-none text-lg">
                    <button type="submit" name="btnxem"
                        class="px-6! py-1! ml-3! rounded-md! border text-lg bg-[#8c907e] text-white">Xem</button>
                </form>
            </div>
            <table class="table align-items-center my-4 text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Khách hàng</th>
                        <th>Liên hệ</th>
                        <th>Giá trị</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST["btnxem"])) {
                        $start = $_POST["startDate"];
                        $end = $_POST["endDate"];
                    } else {
                        $start = date("Y-m-01");
                        $end = date("Y-m-t");
                    }
                    
                    $result = $ctrlOrder->cGetOrderDuring($start, $end);

                    $limit = 15;

                    $currentPage = isset($_POST["currentPage"]) ? (int) $_POST["currentPage"] : 1;

                    if (isset($_POST["nextPage"])) {
                        $currentPage++;
                    }

                    if (isset($_POST["lastPage"]) && $currentPage > 1) {
                        $currentPage--;
                    }

                    $offset = ($currentPage - 1) * $limit;

                    if ($result != 0) {
                        $n = 1;
                        $revenue = 0;
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="odd:bg-white even:bg-gray-200">
                                        <td>' . $n . '</td>
                                        <td>#HD0' . ($row["orderID"] >= 10 ? $row["orderID"] : "0" . $row["orderID"]) . '</td>
                                        <td>' . $row["date"] . '</td>
                                        <td>' . $row["customerName"] . '</td>
                                        <td>' . $row["phoneNumber"] . '</td>
                                        <td>' . number_format($row["finalPrice"], 0, ",", ".") . '<sup>đ</sup></td>
                                        <td class="text-green-400!">' . ($row["status"] == 1 ? "Hoàn thành" : "Đang giao") . '</td>
                                    </tr>';

                            $n++;
                            $revenue += $row["finalPrice"];
                        }
                    } else
                        echo '<tr><td colspan="7">Không có dữ liệu trong thời gian này</td></tr>';
                    ?>
                    <tr class="odd:bg-white even:bg-gray-200">
                        <td colspan="6">
                            <p class="text-bold text-left pl-6 m-0">Doanh thu</p>
                        </td>
                        <td><?php echo '<p class="m-0">' . number_format($revenue, 0, ",", ".") . ' <sup>đ</sup></su></p>'; ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <form action="" method="POST" class="w-full mx-auto mt-4 flex justify-end">
                <button type="submit" name="lastPage" <?php echo ($currentPage == 1) ? "disabled" : ""; ?>
                    class="btn bg-white border-1! border-[#DDD]! text-gray-700! hover:bg-gray-100! w-fit! rounded-md!"><i
                        class="fa-solid fa-arrow-left"></i></button>
                <input type="text" name="currentPage" value="<?php echo $currentPage; ?>" readonly
                    class="btn bg-white border-1! border-[#DDD]! text-gray-700! hover:bg-gray-100! rounded-md! mx-2! w-12!" />
                <button type="submit" name="nextPage" <?php echo ($result->num_rows < 15) ? "disabled" : ""; ?>
                    class="btn bg-white border-1! border-[#DDD]! text-gray-700! hover:bg-gray-100! w-fit! rounded-md!"><i
                        class="fa-solid fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
</div>