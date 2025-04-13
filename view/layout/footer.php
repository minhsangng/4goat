<!-- Scroll to top -->
<button type="button" class="hidden transition linear fixed bottom-5 right-5 h-fit w-fit group rounded-full z-50"
    id="scrolltotop">
    <ion-icon name="arrow-up-circle-outline" class="text-6xl rounded-full group-hover:bg-[#f1f1f0]"></ion-icon>
</button>

<footer id="footer" class="mt-5 border-t-2 border-[#DDD]">
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-between py-5">
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu footer-menu-001">
                    <div class="footer-intro mb-10">
                        <a href="" class="relative">
                            <img src="src/images/logo.png" width="80" alt="4Goat - Logo">
                            <h1 class="absolute -bottom-6 mt-[25px] my-0 left-10 text-[3rem]!">4GOAT</h1>
                        </a>
                    </div>
                    <p class="text-justify">Chúng tôi mang đến cho bạn những bộ trang phục thời thượng, chất lượng cao
                        với mức giá tốt nhất.
                        Dù bạn đang tìm kiếm phong cách năng động, thanh lịch hay cá tính, 4Goat luôn sẵn sàng giúp
                        bạn tỏa sáng.</p>
                    <div class="social-links">
                        <ul class="list-unstyled d-flex flex-wrap gap-3">
                            <li>
                                <a href="#" class="text-secondary">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#facebook"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#twitter"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#youtube"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#pinterest"></use>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-secondary">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#instagram"></use>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu footer-menu-002">
                    <h5 class="widget-title text-uppercase mb-4">Members</h5>
                    <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Nguyễn Minh Sang</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Trần Nhật Cường</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Nguyễn Thị Minh Anh</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Võ Ngọc Châu</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu footer-menu-003">
                    <h5 class="widget-title text-uppercase mb-4">Help & Info</h5>
                    <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Track Your Order</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Returns + Exchanges</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Shipping + Delivery</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Contact Us</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Find us easy</a>
                        </li>
                        <li class="menu-item">
                            <a href="#" class="item-anchor">Faqs</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu footer-menu-004 border-animation-left">
                    <h5 class="widget-title text-uppercase mb-4">Contact Us</h5>
                    <p>Do you have any questions or suggestions? <a href="mailto:contact@4goat.com"
                            class="item-anchor">contact@4goat.com</a></p>
                    <p>Do you need support? Give us a call. <a href="tel:+43 720 11 52 78" class="item-anchor">+43 720
                            11 52
                            78</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="border-top py-4">
        <div class="container">
            <div class="row items-center">
                <div class="col-md-6 d-flex">
                    <div class="shipping mr-4">
                        <span>We ship with:</span>
                        <div class="flex">
                            <img src="src/images/arct-icon.png" alt="icon">
                            <img src="src/images/dhl-logo.png" alt="icon">
                        </div>
                    </div>
                    <div class="payment-option">
                        <span>Payment Option:</span>
                        <div class="flex">
                            <img src="src/images/visa-card.png" alt="card" class="mr-2">
                            <img src="src/images/paypal-card.png" alt="card" class="mr-2">
                            <img src="src/images/master-card.png" alt="card" class="mr-2">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">© Copyright 2025. Phát triển bởi 4Goat.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    const navlinks = document.querySelectorAll(".nav-link");
    let idActive = "home";

    if (window.location.search != "") idActive = window.location.search.slice(3);

    if (window.location.search.includes("shop")) idActive = "shop";

    if (window.location.search.includes("collection")) idActive = "collection";

    window.addEventListener("load", () => {
        navlinks.forEach(function (item) {
            if (item.id == idActive) item.classList.add("active");
            else item.classList.remove("active");
        });
    });
</script>
<!-- CDN Framework ionic -->
<script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>

<!-- Script -->
<script src="src/js/jquery.min.js"></script>
<script src="src/js/script.js"></script>
<script src="src/js/script.min.js"></script>
<script src="src/js/plugins.js"></script>
<script src="src/js/SmoothScroll.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>

</html>