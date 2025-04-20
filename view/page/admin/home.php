<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Doanh thu tuần</p>
                <h5 class="font-weight-bolder">
                  <?php
                  $startOfWeek = date("Y-m-d", strtotime("monday this week"));
                  $endOfWeek = date("Y-m-d", strtotime("sunday this week"));

                  $resultRevenueWeek = $ctrlOrder->cGetRevenueByWeek($startOfWeek, $endOfWeek);
                  $revenueWeek = 0;

                  if ($resultRevenueWeek != null) {
                    while ($rowWeek = $resultRevenueWeek->fetch_assoc()) {
                      $revenueWeek += $rowWeek["price"] * $rowWeek["quantity"];
                    }
                  }
                  echo number_format($revenueWeek, 0, ",", ".") . "<sup>đ</sup>";
                  ?>
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+15%</span>
                  với tuần trước
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Doanh thu tháng</p>
                <h5 class="font-weight-bolder">
                  <?php
                  $startOfMonth = date("Y-m-01");
                  $endOfMonth = date("Y-m-t");

                  $resultRevenueMonth = $ctrlOrder->cGetRevenueByMonth($startOfMonth, $endOfMonth);
                  $revenueMonth = 0;

                  if ($resultRevenueMonth != null) {
                    while ($rowMonth = $resultRevenueMonth->fetch_assoc()) {
                      $revenueMonth += $rowMonth["price"] * $rowMonth["quantity"];
                    }
                  }
                  echo number_format($revenueMonth, 0, ",", ".") . "<sup>đ</sup>";
                  ?>
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> với tháng trước
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Đơn hàng tuần</p>
                <h5 class="font-weight-bolder">
                  <?php
                  $startOfWeek = date("Y-m-d", strtotime("monday this week"));
                  $endOfWeek = date("Y-m-d", strtotime("sunday this week"));

                  $resultCountOrder = $ctrlOrder->cGetRevenueByMonth($startOfWeek, $endOfWeek);

                  if ($resultCountOrder != null) {
                    $rowCount = $resultCountOrder->fetch_assoc();
                    $count = $rowCount["countOrder"];
                  } else
                    $count = 0;

                  echo number_format($count, 0, ",", ".");
                  ?>
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
                  với tuần trước
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Khách mới</p>
                <h5 class="font-weight-bolder">
                  <?php
                  $resultCustomer = $ctrlCustomer->cGetAllCustomer();

                  echo $resultCustomer->num_rows;
                  ?>
                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                  với quý trước
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize text-xl!">Biểu đồ doanh thu</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> last month
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card card-carousel overflow-hidden h-100 p-0">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">
            <div class="carousel-item h-100 active" style="background-image: url('assets/img/carousel-1.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-camera-compact text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Get started with Argon</h5>
                <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
              </div>
            </div>
            <div class="carousel-item h-100" style="background-image: url('assets/img/carousel-2.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Faster way to create web pages</h5>
                <p>That’s my skill. I’m not really specifically talented at anything except for the ability to
                  learn.</p>
              </div>
            </div>
            <div class="carousel-item h-100" style="background-image: url('assets/img/carousel-3.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-trophy text-dark opacity-10"></i>
                </div>
                <h5 class="text-white mb-1">Share with us your design tips!</h5>
                <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2 text-xl!">Sản phẩm bán chạy</h6>
          </div>
        </div>
        <div class="table-responsive mb-4 border-b-1 border-gray-300" style="overflow-y: auto; height: 360px;">
          <table class="table align-items-center text-center"
            style="border-collapse: separate; border-spacing: 0; width: 100%;">
            <thead class="sticky top-0 bg-white z-10">
              <tr>
                <th>Sản phẩm</th>
                <th>Bán ra</th>
                <th>Doanh thu</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $startOfMonth = date("Y-m-01");
              $endOfMonth = date("Y-m-t");
              $resultTopSale = $ctrlOrder->cGetProductTopSale($startOfMonth, $endOfMonth);

              if ($resultTopSale != null) {
                while ($row = $resultTopSale->fetch_assoc()) {
                  echo '<tr class="even:bg-white odd:bg-gray-200">
                          <td class="w-30">
                            <div class="d-flex px-2 py-1 align-items-center">
                              <div>
                                <img src="../../../src/images/products/' . $row["image"] . '_1.png" alt="' . $row["productName"] . '" class="w-10! h-10!">
                              </div>
                              <div class="ms-4">
                                <h6 class="text-sm mb-0">' . $row["productName"] . '</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <h6 class="text-sm mb-0">' . $row["totalSale"] . '</h6>
                            </div>
                          </td>
                          <td>
                            <div class="text-center">
                              <h6 class="text-sm mb-0">' . number_format($row["price"] * $row["quantity"], 2, ",", ".") . '<sup>đ</sup></h6>
                            </div>
                          </td>
                        </tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-header p-3 pb-0">
          <h6 class="mb-2 text-xl!">Danh mục bán chạy</h6>
        </div>
        <div class="card-body p-3 pb-0!">
          <ul class="list-group mb-4 border-b-1 border-gray-300" style="overflow-y: auto; height: 344px;">
            <?php
            $resultTopSale = $ctrlOrder->cGetCategoryTopSale($startOfMonth, $endOfMonth);

            if ($resultTopSale != null) {
              while ($row = $resultTopSale->fetch_assoc()) {
                echo '<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                          <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                            <i class="ni ni-mobile-button text-white opacity-10"></i>
                          </div>
                          <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">' . $row["categoryName"] . '</h6>
                            <span class="text-xs">250 in stock, <span class="font-weight-bold">' . $row["totalSale"] . '</span></span>
                          </div>
                        </div>
                        <div class="d-flex">
                          <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                              class="ni ni-bold-right" aria-hidden="true"></i></button>
                        </div>
                      </li>';
              }
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>