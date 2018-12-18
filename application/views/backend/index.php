    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <div class="row">

            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                      <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                      <h5>Total Products</h5>
                      <h5 class="text-bold-400 mb-0"><i class="ft-stack"></i> <?= $cp['cproduk'];?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                      <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                      <h5>Total Customers</h5>
                      <h5 class="text-bold-400 mb-0"><?= $cus['cuser'];?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                      <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                      <h5>Total Orders</h5>
                      <h5 class="text-bold-400 mb-0"><?= $cord['cord'];?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-12">
              <div class="card">
                <div class="card-content">
                  <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success bg-darken-2">
                      <i class="icon-wallet font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                      <h5>Total Profit</h5>
                      <h5 class="text-bold-400 mb-0"><?= "Rp. ".number_format($sumprof['sprof']);?></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row match-height">
            <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Products Sales</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="psale" class="height-300"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Products Sales</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="psaler" class="height-300"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="row match-height">
            <div class="col-xl-8 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent Orders</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <p>Data Transaksi Terakhir.</p>
                  </div>
                  <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                      <thead>
                        <tr>
                          <th>Invoice#</th>
                          <th>Customer Name</th>
                          <th>Status</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($indexlastorder->result_array() as $i)  : ?>
                          <tr>
                            <td class="text-truncate"><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                            <td class="text-truncate"><?= $i['user_nama']; ?></td>
                            <td class="text-truncate">
                              <?php if ($i['pemesanan_status']=='selesai'){?>
                                <span class="badge badge-default badge-success"><?= $i['pemesanan_status']; ?></span>
                              <?php } else if($i['pemesanan_status']=='waiting'){?>
                                <span class="badge badge-default badge-info"><?= $i['pemesanan_status']; ?></span>
                              <?php } ?>
                            </td>
                            <td class="text-truncate"><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                          </tr>
                        <?php endforeach; ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent Buyers</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content px-1">
                  <div id="" class="media-list height-300 position-relative">
                    <?php foreach ($recentuser->result_array() as $usrc) : ?>
                      <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                          <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="<?= base_url();?>assets/backend/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                            <i></i>
                          </span>
                        </div>
                        <div class="media-body w-100">
                          <h6 class="list-group-item-heading"><?= $usrc['user_nama']; ?><span class="font-medium-4 float-right pt-1"><?= "Rp. ".number_format($usrc['pemesanan_total']); ?></span></h6>
                          <p class="list-group-item-text mb-0"><span class="badge badge-primary"><?= date("d-m-Y",strtotime($usrc['pemesanan_tanggal'])); ?></span></p>
                        </div>
                      </a>
                    <?php endforeach; ?>

                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php foreach ($indexcart as $i) : ?>
            ['<?= date('M',strtotime($i['pemesanan_tanggal'])); ?>',  <?= $i['coall']; ?>],
          <?php endforeach; ?>
          ]);

        var options = {
          title: 'Jumlah Transaksi Sukses',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('psale'));
        chart.draw(data, options);
      }


    </script>

    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Profit'],

          <?php foreach ($indexcart as $i) : ?>
            ['<?= date('m-Y',strtotime($i['pemesanan_tanggal'])); ?>', <?= $i['sumtot']; ?>],
          <?php endforeach; ?>

          ]);

        var options = {
          chart: {
            title: 'Profit',
            subtitle: 'Profit Penjualan Bulanan',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('psaler'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>