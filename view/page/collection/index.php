<title>Bộ sưu tập</title>

<section class="bg-white py-12 bg-light">
    <!-- Main Content -->
    <main>
        <!-- New Collections Section -->
        <section class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 h-[80vh]">
                <div>
                    <img alt="Model wearing a red oversized coat" class="h-[80vh]"
                        src="https://storage.googleapis.com/a1aa/image/rP-pm0wMf0854LHEp8W4NR2f_UpOknXw3-l62DbNFzs.jpg" />
                </div>
                <div>
                    <div class="flex justify-between items-start h-1/3">
                        <h3 class="text-2xl font-bold">
                            NEW COLLECTIONS
                        </h3>
                        <a class="text-sm mt-10" href="#">
                            Xem chi tiết
                            <i class="fas fa-arrow-right">
                            </i>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-x-10 h-2/3">
                        <img alt="Model wearing a black oversized coat" class="h-full w-72"
                            src="https://storage.googleapis.com/a1aa/image/fHsi_8NW2QWqxCwSW6-R4sffUxupqfWPudbNiCEL63Y.jpg" />

                        <div>
                            <?php
                            $result = $ctrlCollection->cGetAllCollection();

                            if ($result == null) {
                                echo '<p>Không có dữ liệu</p>';
                            } else {
                                $n = 0;

                                while ($row = $result->fetch_assoc()) {
                                    echo '<h4>BST: ' . $row["collectionName"] . '</h4>';
                                    echo '<p>'.$row["author"].'</p>';

                                    echo '<p class="text-md indent-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit autem quia numquam, ipsam hic aperiam. Sunt beatae consequuntur nobis expedita exercitationem magnam cupiditate, molestias vitae obcaecati, voluptatem sint amet omnis!</p>';
                                    $n++;
                                    if ($n >= 1) break;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ready-to-Wear Section -->
        <section class="container mx-auto px-4 py-8">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-bold">
                    Fashion Designers
                </h2>
                <a class="text-sm" href="#">
                    Tất cả
                    <i class="fas fa-arrow-right">
                    </i>
                </a>
            </div>
            <div class="grid grid-cols-5 gap-8 mt-4">
                <?php
                if (!$result) {
                    echo '<p>Không có dữ liệu</p>';
                } else {
                    $n = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="text-center">
                                <img alt=""
                                    src="https://storage.googleapis.com/a1aa/image/HiwXqZ6Ilt_NlxW3RxGTHlZqEeGRhDuh8TsGlifAfnw.jpg"/>
                                <p class="mt-2">
                                    ' . $row["author"] . '
                                </p>
                            </div>';
                        $n++;
                        if ($n >= 5)
                            break;
                    }
                }
                ?>
        </section>
    </main>
</section>