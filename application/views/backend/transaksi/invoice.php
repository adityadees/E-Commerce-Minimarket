<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Invoice </h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url();?>admin">Home</a>
              </li>
              <li class="breadcrumb-item active">Invoice
              </li>
            </ol>
          </div>
        </div>
      </div>
      <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
          <div class="btn-group" role="group">
            <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a><a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a></div>
          </div><a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="ft-mail"></i></a><a class="btn btn-outline-primary" href="timeline-center.html"><i class="ft-pie-chart"></i></a>
        </div>
      </div>
    </div>
    <div class="content-body"><section class="card">
      <div id="invoice-template" class="card-body">
        <!-- Invoice Company Details -->
        <div id="invoice-company-details" class="row">
          <div class="col-md-6 col-sm-12 text-center text-md-left">
            <div class="media">
              <img src="<?php echo base_url();?>assets/frontend/assets/img/favicon.png" width="150px" height="75px" alt="company logo" class=""/>
              <div class="media-body">
                <ul class="ml-2 px-0 list-unstyled">
                  <li class="text-bold-800">Gantri Market</li>
                  <li>KPRI GUKA SMK N 3 PALEMBANG</li>
                  <li>(+62) 858-883–43527</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 text-center text-md-right">
            <h2>INVOICE</h2>
            <p class="pb-3">#<?= $data['pemesanan_kode']; ?></p>
            <ul class="px-0 list-unstyled">
              <li>Total Pembelian</li>
              <li class="lead text-bold-800">Rp. <?= number_format($data['pemesanan_total']);?></li>
            </ul>
          </div>
        </div>
        <!--/ Invoice Company Details -->

        <!-- Invoice Customer Details -->
        <div id="invoice-customer-details" class="row pt-2">
          <div class="col-sm-12 text-center text-md-left">
            <p class="text-muted">Informasi Pengiriman</p>
          </div>
          <div class="col-md-6 col-sm-12 text-center text-md-left">
            <ul class="px-0 list-unstyled">
              <li class="text-bold-800"><?= $data['ps_nama'];?></li>
              <li><?= $data['ps_tel'];?></li>
              <li><?= $data['ps_email'];?></li>
              <li><?= $data['ps_alamat'];?></li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-12 text-center text-md-right">
            <p><span class="text-muted">Tanggal Pemesanan :</span> <?= date('d/m/Y',strtotime($data['pemesanan_tanggal']));?></p>
            <p><span class="text-muted">Metode Pembayaran :</span> <?= ucfirst($data['pembayaran_method']);?></p>
          </div>
        </div>
        <!--/ Invoice Customer Details -->

        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-2">
          <div class="row">
            <div class="table-responsive col-sm-12">
              <table class="table">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Bonus Qty </th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total=0;
                  $ship=5000;
                  $ptotal=0;
                  $cid=0;

                  $pemesanan_kode=$data['pemesanan_kode'];


                  $jtable=[
                    'pemesanan_detailp' => 'produk_kode',
                    'produk' => 'produk_kode'
                  ];

                  $where=[
                    't1.pemesanan_kode'=>$pemesanan_kode,
                  ];

                  $getdata = $this->Mymod->GetDataJoin($jtable,$where);

                  foreach($getdata->result_array() as $gcart):
                    $cid++;
                    if($gcart['pdp_qty']>1 && $gcart['produk_up']=='yes'){
                      $bonus=($gcart['pdp_qty']/2);

                    }else {
                      $bonus=0;
                    }
               /*       $data = [
                          'produk_kode' => $gcart['produk_kode'],
                          'promo_start <='=>$tgl,
                          'promo_end >'=>$tgl,
                      ];
                      $cek = $this->Mymod->CekDataRows('promo',$data);

                      if($cek->num_rows()>0){
                          $je=$cek->row_array();
                          $newprc=($gcart['produk_harga']-(($gcart['produk_harga']*$je['promo_diskon'])/100));
                          $ptotal=$newprc*$gcart['pdp_qty'];
                      } else {
                          $ptotal=$gcart['produk_harga']*$gcart['pdp_qty'];
                      }

                      $total +=$ptotal;*/
                      ?>
                      <tr>
                        <th scope="row"><?= $gcart['produk_kode']; ?></th>
                        <td><p><?= $gcart['produk_nama']; ?></p> </td>
                        <td><?= "Rp. ".number_format($gcart['pdp_harga']); ?></td>
                        <td><?= $gcart['pdp_qty']; ?></td>
                        <td><?= $gcart['pdp_bonus']; ?></td>
                        <td><?= $gcart['pdp_diskon']." %"; ?></td>
                        <td><?= "Rp. ".number_format($gcart['pdp_subtotal']); ?></td>
                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-7 col-sm-12 text-center text-md-left">
              </div>
              <div class="col-md-5 col-sm-12">
                <p class="lead">Total due</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Sub Total</td>
                        <td class="text-right"><?= "Rp. ".number_format($data['pemesanan_subtotal']); ?></td>
                      </tr>
                      <tr>
                        <td>Ongkir</td>
                        <td class="text-right"><?= "Rp. ".number_format($data['pemesanan_ongkir']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-bold-800">Total</td>
                        <td class="text-bold-800 text-right"><?= "Rp. ".number_format($data['pemesanan_total']); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-center">
                  <p>Authorized person</p>
                  <img src="<?= base_url()?>assets/backend/images/pages/signature-scan.png" alt="signature" class="height-100"/>
                  <h6>Amanda Orton</h6>
                  <p class="text-muted">Managing Director</p>
                </div>
              </div>
            </div>
          </div>

          <div id="invoice-footer">
            <div class="row">
              <div class="col-md-7 col-sm-12">
                <h6>Terms & Condition</h6>
                <p>Barang yang sudah dibeli tidak dapat dikembalikan.</p>
              </div>
              <div class="col-md-5 col-sm-12 text-center">
                <button type="button" class="btn btn-primary btn-lg my-1" onclick="window.location.href='<?= base_url();?>admin/cetak/<?= $data['pemesanan_kode']; ?>'"><i class="fa fa-paper-plane-o"></i> Cetak</button>
              </div>
            </div>
          </div>

        </div>
      </section>
    </div>
  </div>
</div>