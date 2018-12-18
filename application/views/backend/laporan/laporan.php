    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendors/css/tables/extensions/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/vendors/css/tables/datatable/buttons.bootstrap4.min.css">

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Data Laporan</h3>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Pembayaran</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>
                                        <?php if($this->session->flashdata('success')){ ?>
                                            <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php } else if($this->session->flashdata('error')){?>
                                            <div class="alert alert-warning">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php }?>
                                    </p>

                                    <table class="table table-striped table-bordered complex-headers dataex-html5-selectors">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>Pengirim</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Tanggal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($datas->result_array() as $i)  : 
                                                ?>
                                                <tr>
                                                    <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                    <td><?=  $i['user_nama'];?></td>
                                                    <td><?=  "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                    <td><?php if($i['pemesanan_status']=='waiting'){echo "<span class='badge badge-info'>Waiting Delivery / On Delivery</span>";} else { echo "<span class='badge badge-success'>Selesai</span>";} ?></td>
                                                    <td><?=  ucfirst($i['pembayaran_method']);?></td>
                                                    <td><?=  date('d-m-Y',strtotime($i['pembayaran_tanggal']));?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="content-body">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Informasi Pembelian</h4>
                                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <p>
                                        <?php if($this->session->flashdata('success')){ ?>
                                            <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                <strong>Sukses!</strong> <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php } else if($this->session->flashdata('error')){?>
                                            <div class="alert alert-warning">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php }?>
                                    </p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered complex-headers dataex-html5-selectors">
                                            <thead>
                                                <tr>
                                                    <th>Invoice</th>
                                                    <th>User</th>
                                                    <th>Total</th>
                                                    <th>Metode</th>
                                                    <th>Pembayaran</th>
                                                    <th>Pembelian</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data->result_array() as $i)  : ?>
                                                    <tr>
                                                        <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                        <td><?= $i['user_nama'];?></td>
                                                        <td><?= "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                        <td><?= ucfirst($i['pembayaran_method']);?></td>
                                                        <td><?php if($i['pembayaran_status']=='belumbayar'){echo "Belum Bayar";} else if($i['pembayaran_status']=='pending') {echo "Pending";} else {echo "Selesai";}?></td>
                                                        <td><?= ucfirst($i['pemesanan_status']);?></td>
                                                        <td><?= date("d-m-Y",strtotime($i['pemesanan_tanggal']));?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="<?php echo base_url();?>assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/datatable/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/vendors/js/tables/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/core/app-menu.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/core/app.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/scripts/customizer.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js"></script>