<div class="container-fluid py-4">
    <div class="bg-white rounded-lg shadow-lg w-full flex">
        <div class="w-1/4 bg-green-50 p-4 rounded-lg">
            <div class="space-y-40 w-5/6 my-8 mx-auto">
                <div
                    class="flex items-center space-x-4 w-full relative before:absolute before:bottom-[-350%] before:left-5 before:h-44 before:w-2 before:bg-[#DDD] before:-z-1 z-1">
                    <div
                        class="h-12 w-12! rounded-full <?php echo ($_SESSION["done"] != 1 ? 'bg-green-500' : 'bg-gray-300'); ?> text-white flex items-center justify-center">
                        1
                    </div>
                    <span
                        class="font-semibold <?php echo ($_SESSION["done"] != 1 ? 'text-green-500' : 'text-gray-500'); ?> text-xl">
                        Viết nội dung
                    </span>
                </div>
                <div class="flex items-center space-x-4 w-full">
                    <div
                        class="h-12 w-12! rounded-full <?php echo ($_SESSION["done"] == 1 ? 'bg-green-500' : 'bg-gray-300'); ?> text-white  flex items-center justify-center">
                        2
                    </div>
                    <span
                        class="font-semibold <?php echo ($_SESSION["done"] == 1 ? 'text-green-500' : 'text-gray-500'); ?> text-xl">
                        SEO
                    </span>
                </div>
            </div>
        </div>

        <div class="w-3/4 p-8">
            <form action="" method="POST" enctype="multipart/form-data">
                <table width="100%">
                    <?php
                    if (isset($_POST["next"])) {
                        if ($_POTS["userid"] != "" && $_POST["content"] != "") {
                            $_SESSION["done"] = 1;
                            echo '<script>window.location.href="index.php?p=post";</script>';
                            echo '
                                <tr>
                                    <td width="20%">
                                        <label for="userid" class="text-base! font-bold!">Từ khoá</label>
                                    </td>
                                    <td>
                                        <input type="text" name="userid" id="userid"
                                            class="px-3 py-2 mb-4 rounded-md w-full outline-none border-2 border-[#8c907e]">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">
                                        <label for="content" class="text-base! font-bold!">Chủ đề</label>
                                    </td>
                                    <td>
                                        <input type="text" name="userid" id="userid"
                                            class="px-3 py-2 mb-4 rounded-md w-full outline-none border-2 border-[#8c907e]">
                                    </td>
                                </tr>';
                        }
                    } else {
                        echo '
                            <tr>
                                <td width="20%">
                                    <label for="userid" class="text-base! font-bold!">ID</label>
                                </td>
                                <td>
                                    <input type="text" name="userid" id="userid"
                                        class="px-3 py-2 mb-4 rounded-md w-full outline-none border-2 border-[#8c907e]">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <label for="content" class="text-base! font-bold!">Nội dung</label>
                                </td>
                                <td>
                                    <textarea name="content" id="content" cols="1" rows="10"
                                        class="text-left! px-3 py-2 mb-4 rounded-md w-full! outline-none border-2 border-[#8c907e]!"></textarea>
                                </td>
                            </tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right"><button type="submit" name="next"
                                class="bg-green-500 text-white text-base! rounded-lg px-4 py-2 rounded-lg!">Tiếp
                                theo</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>