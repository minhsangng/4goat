<title>4Goat | Thương Hiệu Quần Áo Thời Trang</title>

<section id="billboard" class="bg-light py-5">
  <div class="container">
    <div class="row justify-content-center">
      <h1 class="section-title text-center mt-4" data-aos="fade-up">BỘ SƯU TẬP MỚI</h1>
      <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
        <p>Khám phá những thiết kế mới nhất với phong cách hiện đại và tinh tế - tôn vinh cá tính riêng của bạn trong
          từng khoảnh khắc.</p>
      </div>
    </div>
    <div class="row">
      <div class="swiper main-swiper py-4" data-aos="fade-up" data-aos-delay="600">
        <div class="swiper-wrapper d-flex border-animation-left">
          <?php
          $result = $ctrlCollection->cGetNewCollection(6);

          while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide">
                    <div class="banner-item image-zoom-effect">
                      <div class="image-holder">
                        <a href="#">
                          <img src="src/images/' . $row["imageCollection"] . '_1.png" alt="' . $row["collectionName"] . '" class="img-fluid h-96! w-full!">
                        </a>
                      </div>
                      <div class="banner-content py-4">
                        <h5 class="element-title text-uppercase">
                          <a href="index.html" class="item-anchor">' . $row["collectionName"] . '</a>
                          <p class="text-sm! text-gray-400 mb-2">• ' . $row["author"] . '</p> 
                        </h5>
                        <p>' . $row["description"] . '</p>
                        <div class="btn-left">
                          <a href="#" class="btn-link fs-6 text-uppercase item-anchor text-decoration-none">Xem thêm</a>
                        </div>
                      </div>
                    </div>
                  </div>';
          }
          ?>

        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </div>
</section>

<section class="features py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24">
            <use xlink:href="#calendar"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Đặt lịch hẹn</h4>
          <p>Liên hệ trước để được tư vấn và thử đồ riêng tư tại cửa hàng.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24">
            <use xlink:href="#shopping-bag"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Nhận tại cửa hàng</h4>
          <p>Đặt online, nhận sản phẩm trực tiếp tại chi nhánh gần bạn.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24">
            <use xlink:href="#gift"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Đóng gói đặc biệt</h4>
          <p>Mỗi đơn hàng đều được chăm chút kỹ lưỡng và sang trọng.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24">
            <use xlink:href="#arrow-cycle"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Đổi trả miễn phí</h4>
          <p>Hỗ trợ đổi/trả miễn phí cho mọi đơn hàng, dù bạn ở bất kỳ đâu.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="categories overflow-hidden">
  <div class="container">
    <div class="open-up" data-aos="zoom-out">
      <div class="row">
        <div class="col-md-6">
          <div class="cat-item image-zoom-effect">
            <div class="image-holder">
              <a href="index.php?p=shop&c=1">
                <img src="src/images/cat-item1.jpg" alt="categories" class="product-image img-fluid">
              </a>
            </div>
            <div class="category-content">
              <div class="product-button">
                <a href="index.php?p=shop&c=1" class="btn btn-common text-uppercase">Thời trang nam</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="cat-item image-zoom-effect">
            <div class="image-holder flex justify-end">
              <a href="index.php?p=shop&c=2">
                <img src="src/images/cat-item2.jpg" alt="categories" class="product-image img-fluid">
              </a>
            </div>
            <div class="category-content w-full">
              <div class="product-button text-right">
                <a href="index.php?p=shop&c=2" class="btn btn-common text-uppercase">Thời trang nữ</a>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="cat-item image-zoom-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/cat-item3.jpg" alt="categories" class="product-image img-fluid">
              </a>
            </div>
            <div class="category-content">
              <div class="product-button">
                <a href="index.html" class="btn btn-common text-uppercase">Shop accessories</a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</section>

<section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Sản phẩm mới</h4>
      <a href="index.php?p=shop" class="btn-link">Xem tất cả</a>
    </div>
    <div class="swiper product-swiper open-up" data-aos="zoom-out">
      <div class="swiper-wrapper d-flex">
        <?php
        $result = $ctrlProduct->cGetNewProduct(6);

        while ($row = $result->fetch_assoc()) {
          echo '<div class="swiper-slide">
                  <div class="product-item image-zoom-effect link-effect">
                    <div class="image-holder position-relative">
                      <a href="index.php?p=detail&id=' . $row["productID"] . '">
                        <img src="src/images/products/' . $row["image"] . '_1.png" alt="' . $row["productName"] . '" class="product-image img-fluid h-80! w-full!">
                      </a>
                      <a href="index.php?p=detail&id=' . $row["productID"] . '" class="btn-icon btn-wishlist">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                          <use xlink:href="#heart"></use>
                        </svg>
                      </a>
                      <div class="product-content">
                        <h5 class="element-title text-uppercase fs-5 mt-3">
                          <a href="index.php?p=detail&id=' . $row["productID"] . '" class="text-base!">' . $row["productName"] . '</a>
                        </h5>
                        <a href="#" class="text-decoration-none text-gray-500!" data-after="Thêm vào giỏ hàng"><span>' . number_format($row["price"], 0, ",", ".") . ' <sup>đ</sup></span></a>
                      </div>
                    </div>
                  </div>
                </div>';
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-left"></use>
      </svg></div>
    <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-right"></use>
      </svg></div>
  </div>
</section>

<section class="collection bg-light position-relative py-5">
  <div class="container">
    <div class="row">
      <div class="title-xlarge text-uppercase txt-fx domino text-black! z-50!">Sắp ra mắt</div>
      <div class="collection-item d-flex flex-wrap my-5">
        <div class="col-md-6 column-container">
          <div class="image-holder">
            <img src="src/images/single-image-2.jpg" alt="collection" class="product-image img-fluid">
          </div>
        </div>
        <div class="col-md-6 column-container bg-white">
          <div class="collection-content p-5 m-0 m-md-5">
            <h3 class="element-title text-uppercase">BỘ SƯU TẬP MÙA ĐÔNG CỔ ĐIỂN</h3>
            <p class="indent-8">Phong cách tối giản, thanh lịch và không bao giờ lỗi thời. Những thiết kế thu đông nhẹ nhàng, phù hợp cho
              cả phong cách công sở lẫn dạo phố.</p>
            <a href="#" class="btn btn-dark text-uppercase mt-3">Tìm hiểu ngay</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section id="best-sellers" class="best-sellers product-carousel py-5 position-relative overflow-hidden">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Best Selling Items</h4>
      <a href="index.html" class="btn-link">View All Products</a>
    </div>
    <div class="swiper product-swiper open-up" data-aos="zoom-out">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-4.jpg" alt="categories" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Dark florish onepiece</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-3.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Baggy Shirt</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$55.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-5.jpg" alt="categories" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Cotton off-white shirt</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$65.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-6.jpg" alt="categories" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Handmade crop sweater</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$50.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-9.jpg" alt="categories" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Dark florish onepiece</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$70.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-10.jpg" alt="categories" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Cotton off-white shirt</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$70.00</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-left"></use>
      </svg></div>
    <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-right"></use>
      </svg></div>
  </div>
</section> -->

<section class="video py-5 overflow-hidden">
  <div class="container-fluid">
    <div class="row">
      <div class="video-content open-up" data-aos="zoom-out">
        <div class="video-bg">
          <img src="src/images/video-image.jpg" alt="video" class="video-image img-fluid">
        </div>
        <div class="video-player">
          <a class="youtube" href="https://www.youtube.com/embed/pjtsGzQjFM4">
            <svg width="24" height="24" viewBox="0 0 24 24">
              <use xlink:href="#play"></use>
            </svg>
            <img src="src/images/text-pattern.png" alt="pattern" class="text-rotate">
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="testimonials py-5 bg-light">
  <div class="section-header text-center mt-5">
    <h3 class="section-title">CHÚNG TÔI YÊU NHỮNG LỜI KHEN TẶNG</h3>
  </div>
  <div class="swiper testimonial-swiper overflow-hidden my-5">
    <div class="swiper-wrapper d-flex">
      <div class="swiper-slide">
        <div class="testimonial-item text-center">
          <blockquote>
            <p>“Mềm mại hơn mong đợi, co giãn tuyệt vời và form áo denim trắng cực kỳ vừa vặn.”</p>
            <div class="review-title text-uppercase">casual way</div>
          </blockquote>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-item text-center">
          <blockquote>
            <p>“Chiếc áo denim trắng vừa vặn nhất tôi từng mặc - mềm mại, co giãn và vượt xa mong đợi.”</p>
            <div class="review-title text-uppercase">uptop</div>
          </blockquote>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-item text-center">
          <blockquote>
            <p>“Áo denim trắng mềm mịn, co giãn tốt và trắng nổi bật - đúng như những gì tôi mong chờ.”</p>
            <div class="review-title text-uppercase">Denim craze</div>
          </blockquote>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="testimonial-item text-center">
          <blockquote>
            <p>“Một thiết kế tuyệt vời - form áo chuẩn, chất vải mềm mại và linh hoạt đến không ngờ.”</p>
            <div class="review-title text-uppercase">uptop</div>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
  <div class="testimonial-swiper-pagination d-flex justify-content-center mb-5"></div>
</section>

<!-- <section id="related-products" class="related-products product-carousel py-5 position-relative overflow-hidden">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">You May Also Like</h4>
      <a href="index.html" class="btn-link">View All Products</a>
    </div>
    <div class="swiper product-swiper open-up" data-aos="zoom-out">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-5.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Dark florish onepiece</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-6.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Baggy Shirt</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$55.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-7.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Cotton off-white shirt</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$65.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-8.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Handmade crop sweater</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$50.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item image-zoom-effect link-effect">
            <div class="image-holder">
              <a href="index.html">
                <img src="src/images/product-item-1.jpg" alt="product" class="product-image img-fluid">
              </a>
              <a href="index.html" class="btn-icon btn-wishlist">
                <svg width="24" height="24" viewBox="0 0 24 24">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="text-uppercase fs-5 mt-3">
                  <a href="index.html">Handmade crop sweater</a>
                </h5>
                <a href="index.html" class="text-decoration-none" data-after="Add to cart"><span>$70.00</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-left"></use>
      </svg></div>
    <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-right"></use>
      </svg></div>
  </div>
</section> -->

<!-- <section class="blog py-5">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Read Blog Posts</h4>
      <a href="index.html" class="btn-link">View All</a>
    </div>
    <div class="row">
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="index.html">
              <img src="src/images/post-image1.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase fs-6 text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="index.html">How to look outstanding in pastel</a>
            </h5>
            <p>Dignissim lacus,turpis ut suspendisse vel tellus.Turpis purus,gravida orci,fringilla...</p>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="index.html">
              <img src="src/images/post-image2.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase fs-6 text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="index.html">Top 10 fashion trend for summer</a>
            </h5>
            <p>Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...</p>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="index.html">
              <img src="src/images/post-image3.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase fs-6 text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="index.html">Crazy fashion with unique moment</a>
            </h5>
            <p>Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...</p>
          </div>
        </article>
      </div>
    </div>
  </div>
</section> -->

<section class="logo-bar py-5 my-5">
  <div class="container">
    <div class="row">
      <div class="logo-content d-flex flex-wrap justify-content-between">
        <img src="src/images/logo1.png" alt="logo" class="logo-image img-fluid">
        <img src="src/images/logo2.png" alt="logo" class="logo-image img-fluid">
        <img src="src/images/logo3.png" alt="logo" class="logo-image img-fluid">
        <img src="src/images/logo4.png" alt="logo" class="logo-image img-fluid">
        <img src="src/images/logo5.png" alt="logo" class="logo-image img-fluid">
      </div>
    </div>
  </div>
</section>

<section class="newsletter bg-light" style="background: url(src/images/pattern-bg.png) no-repeat;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 py-5 my-5">
        <div class="subscribe-header text-center pb-3">
          <h3 class="section-title text-uppercase text-3xl!">Đăng ký nhận tin tức mới nhất từ chúng tôi</h3>
        </div>
        <form action="view/page/signup/index.php" method="GET" id="form" class="d-flex flex-wrap gap-2">
          <input type="text" name="email" placeholder="Email" class="form-control form-control-lg">
          <button class="btn btn-dark btn-lg text-uppercase w-100">Đăng ký</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="instagram position-relative">
  <div class="d-flex justify-content-center w-100 position-absolute bottom-0 z-1">
    <a href="https://www.instagram.com" class="btn btn-dark px-5">Theo dõi chúng tôi trên Instagram</a>
  </div>
  <div class="row g-0">
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item1.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item2.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item3.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item4.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item5.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
    <div class="col-6 col-sm-4 col-md-2">
      <div class="insta-item">
        <a href="" target="_blank">
          <img src="src/images/insta-item6.jpg" alt="instagram" class="insta-image img-fluid">
        </a>
      </div>
    </div>
  </div>
</section>