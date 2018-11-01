        <div class="breadcrumb-area gray-bg">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="<?= base_url()?>">Home</a></li>
                        <li class="active">My Account </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="checkout-area pb-55 pt-75">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                            <div class="shop-widget">
                                <h4 class="shop-sidebar-title">My Account</h4>
                                <div class="shop-catigory">
                                    <ul id="faq">
                                        <li><a href="<?= base_url();?>myaccount">Dashboard</a></li>
                                        <li><a href="<?= base_url();?>myprofil">Personal Information</a></li>
                                        <li><a href="<?= base_url();?>myorders">My Orders</a></li>
                                       <!--  <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">My Reviews <i class="ion-ios-arrow-down"></i></a>
                                            <ul id="shop-catigory-1" class="panel-collapse collapse">
                                                <li><a href="#">Reviews Product</a></li>
                                                <li><a href="#">Testimoni</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">

                                <ul class="nav nav-pills nav-tabs nav-fill mb-3" id="pills-tab" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#belumbayar" role="tab" aria-controls="pills-home" aria-selected="true">Belum Bayar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#belumdikirim" role="tab" aria-controls="pills-profile" aria-selected="false">Belum Dikirim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#belumditerima" role="tab" aria-controls="pills-contact" aria-selected="false">Belum Diterima</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#selesai" role="tab" aria-controls="pills-contact" aria-selected="false">Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#batal" role="tab" aria-controls="pills-contact" aria-selected="false">Batal</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="belumbayar" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th class="text-center">Total Biaya</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($waiting as $i) : ?>
                                            <tr>
                                                <td><?= $i['pemesanan_kode']; ?></td>
                                                <td class="text-center"><?= "Rp. ".number_format($i['pemesanan_total']); ?></td>
                                                <td class="text-center"><?= date('d-m-Y',strtotime($i['pemesanan_tanggal'])); ?></td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-primary">Bayar</a>
                                                    <a href="" class="btn btn-danger" data-target="#batalOrders<?= $i['pemesanan_kode']; ?>" data-toggle="modal">Batal</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="belumdikirim" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Total Biaya</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="belumditerima" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Total Biaya</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Total Biaya</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="batal" role="tabpanel" aria-labelledby="pills-contact-tab">Batal</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <?php foreach($waiting as $i): ?>
            <div class="modal fade text-left" id="batalOrders<?= $i['pemesanan_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?php echo base_url()?>frontendc/batal_pemesanan" method="POST">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="hidden" name="pemesanan_kode" value="<?php echo $i['pemesanan_kode'];?>">
                                            <label class="text-center">Anda yakin ingin membatalkan pesanan <b><?php echo $i['pemesanan_kode']; ?></b> ?</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                                <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>