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

                                <table class="table table-striped table-bordered complex-headers">
                                    <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Pengirim</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($data->result_array() as $i)  : 
                                            ?>
                                            <tr>
                                                <td><a href="<?= base_url(); ?>admin/Invoice/<?= $i['pemesanan_kode'];?>"><?= $i['pemesanan_kode'];?></a></td>
                                                <td><?php echo $i['user_nama'];?></td>
                                                <td><?php echo "Rp. ".number_format($i['pemesanan_total']);?></td>
                                                <td><?php if($i['pemesanan_status']=='waiting'){echo "<span class='badge badge-info'>Waiting Delivery / On Delivery</span>";} else { echo "<span class='badge badge-success'>Selesai</span>";} ?></td>
                                                <td><?php echo ucfirst($i['pembayaran_method']);?></td>
                                                <td><?=  date('d-m-Y',strtotime($i['pembayaran_tanggal']));?></td>
                                                <td>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalview<?= $i['pemesanan_kode']; ?>">View</a>
                                                </td>
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



<?php foreach ($data->result_array() as $i)  : ?>
    <div class="modal fade text-left" id="modalview<?= $i['pemesanan_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Informasi Pembayaran</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="pemesanan_kode" value="<?php echo $i['pemesanan_kode'];?>">

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
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
                </div>
            </div>
        </div>
    </div>

<?php endforeach;?>
