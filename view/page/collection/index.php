<title>Bộ sưu tập</title>

<section class="bg-white py-12 bg-light">
    <!-- Main Content -->
    <main>
        <!-- New Collections Section -->
        <section class="container mx-auto px-4 py-8">

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $result = $ctrlCollection->cGetNewCollection(10);
                    $n = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="carousel-item '.($n == 0 ? "active" : "").'" data-bs-interval="2000">
                                    <div class="grid grid-cols-2 gap-4 h-[70vh]">
                                        <div class="group overflow-hidden">
                                            <img alt="' . $row["collectionName"] . '"
                                                class="h-[70vh] w-full hover:scale-110 transition ease-linear"
                                                src="src/images/' . $row["imageCollection"] . '_1.png" />
                                        </div>
                                        <div class="flex flex-col justify-between">
                                            <div class="flex justify-between items-end mb-4">
                                                <h3 class="text-2xl font-bold m-0">
                                                    BỘ SƯU TẬP MỚI
                                                </h3>
                                                <a class="text-sm" href="#">
                                                    Xem chi tiết
                                                    <i class="fas fa-arrow-right">
                                                    </i>
                                                </a>
                                            </div>
                                            <div class="grid grid-cols-2 gap-x-10">
                                                <div class="flex flex-col space-y-3">
                                                    <img alt="' . $row["collectionName"] . '" class="h-52 w-72"
                                                        src="src/images/' . $row["imageCollection"] . '_2.png" />
                                                    <img alt="' . $row["collectionName"] . '" class="h-52 w-72"
                                                        src="src/images/' . $row["imageCollection"] . '_3.png" />
                                                </div>
            
                                                <div>
                                                    <h4>BST: ' . $row["collectionName"] . '</h4>
                                                    <p>NTK: ' . $row["author"] . '</p>
            
                                                    <p class="text-md indent-8">' . $row["description"] . '</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                $n++;
                    }
                    ?>
                </div>
            </div>

        </section>

        <!-- Ready-to-Wear Section -->
        <section class="container mx-auto px-4 py-8">
            <div class="flex items-center">
                <h2 class="text-2xl font-bold">
                    Fashion Designers
                </h2>
            </div>
            <div class="grid grid-cols-10 gap-4 mt-4">
                <?php
                $result = $ctrlCollection->cGetAllCollection();

                if (!$result) {
                    echo '<p>Không có dữ liệu</p>';
                } else {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="text-center hover:cursor-pointer hover:scale-110 hover:saturate-150 transition ease-linear">
                                <img alt="' . $row["author"] . '" class="h-32" 
                                    src="src/images/' . $row["imageAuthor"] . '.png" />
                                <p class="mt-2">
                                    ' . $row["author"] . '
                                </p>
                            </div>';
                    }
                }
                ?>
        </section>
    </main>
</section>