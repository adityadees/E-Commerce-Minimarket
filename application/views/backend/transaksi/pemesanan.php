<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Data Transaksi</h3>
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

                                <ul class="nav nav-tabs nav-topline  nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21" href="#tab21" role="tab" aria-selected="true"><i class="fa fa-times"></i> Belum Bayar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22" role="tab" aria-selected="false"><i class="fa fa-info"></i> Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab23" data-toggle="tab" aria-controls="tab23" href="#tab23" role="tab" aria-selected="false"><i class="fa fa-check"></i> Selesai</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                                    <div class="tab-pane active" id="tab21" role="tab" aria-labelledby="base-tab21">
                                       <table class="table table-striped table-bordered complex-headers">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>User</th>
                                                <th>Total</th>
                                                <th>Metode Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($data->result_array() as $i)  : 
                                                if($i['pembayaran_status']=='belumbayar' && $i['pembayaran_method']=='transfer'){
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                        <td><?= $i['user_nama'];?></td>
                                                        <td><?= "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                        <td><?= ucfirst($i['pembayaran_method']);?></td>
                                                    </tr>
                                                <?php } endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">
                                     <table class="table table-striped table-bordered complex-headers">
                                        <thead>
                                            <tr>
                                                <th>Invoice</th>
                                                <th>User</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Metode Pembayaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach ($data->result_array() as $i)  : 
                                                if($i['pembayaran_status']=='pending' || ($i['pembayaran_status']=='selesai' && $i['pemesanan_status']=='waiting')  || ($i['pembayaran_method']=='ditempat' && $i['pemesanan_status']=='waiting') ){
                                                    ?>
                                                    <tr>
                                                        <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                        <td><?php echo $i['user_nama'];?></td>
                                                        <td><?php echo "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                        <td><?php if($i['pembayaran_method']=='transfer'  && $i['pembayaran_status']=='pending'){echo "<span class='badge badge-danger'>Waiting Approvment</span>";} else { echo "<span class='badge badge-info'>Waiting Delivery / On Delivery</span>";} ?></td>
                                                        <td><?php echo ucfirst($i['pembayaran_method']);?></td>

                                                        <td>
                                                            <?php if($i['pembayaran_method']=='transfer' && $i['pembayaran_status']=='pending'){ ?>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalview<?= $i['pemesanan_kode']; ?>">View</a>
                                                            <?php } else {  ?>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalviewk<?= $i['pemesanan_kode']; ?>">View</a>
                                                                <?php } ?></td>

                                                            </tr>
                                                        <?php } endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="tab23" aria-labelledby="base-tab23">
                                                <table class="table table-striped table-bordered complex-headers">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice</th>
                                                            <th>User</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        foreach ($data->result_array() as $i)  : 
                                                            if($i['pemesanan_status']=='selesai'){
                                                                ?>
                                                                <tr>
                                                                    <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                                    <td><?php echo $i['user_nama'];?></td>
                                                                    <td><?php echo "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                                </tr>
                                                            <?php } endforeach; ?>
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
            </div>




            <?php foreach ($data->result_array() as $i)  : ?>
                <div class="modal fade text-left" id="modalview<?= $i['pemesanan_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url()?>BackendC/konfirmasi_pembayaran" method="POST">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="pembayaran_kode" value="<?php echo $i['pembayaran_kode'];?>">

                                                Invoice : <?= $i['pemesanan_kode']; ?><br>
                                                Nama : <?= $i['pembayaran_nama']; ?><br>
                                                Tanggal : <?= date("d-m-Y",strtotime($i['pembayaran_tanggal'])); ?><br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="<?php echo base_url().'assets/images/'.$i['pembayaran_bukti'];?>" target="_blank"><img class="card-img-top img-fluid" src="<?php echo base_url().'assets/images/'.$i['pembayaran_bukti'];?>" alt="Card image cap" style="height:250px;"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span>Apakah anda ingin mengkonfirmasi pembayaran ini?</span>
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

            <?php endforeach;?>



            <?php foreach ($data->result_array() as $i)  : ?>
                <div class="modal fade text-left" id="modalviewk<?= $i['pemesanan_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url()?>BackendC/konfirmasi_pengiriman" method="POST">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="pemesanan_kode" value="<?php echo $i['pemesanan_kode'];?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <span>Apakah anda ingin mengkonfirmasi barang telah selesai dikirim?</span>
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

                <?php endforeach;?>