
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Data Sub-Kategori</h3>
            </div>
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a class="btn btn-primary" href="" data-toggle="modal" data-target="#modalAdd">Tambah Data</a></h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
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
                                        <table class="table table-striped table-bordered complex-headers">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($subkategori as $i)  : ?>
                                                    <tr>
                                                        <td><?php echo $i['sk_nama'];?></td>
                                                        <td><?php echo $i['kategori_nama'];?></td>
                                                        <td class=" text-center">
                                                            <div class="btn-group mr-1 mb-1">
                                                                <button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?php echo $i['sk_id']; ?>">Edit</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?php echo $i['sk_id']; ?>">Hapus</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Lihat Detail</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
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


        <div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel34">Tambah Subkategori</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url()?>BackendC/save_subkategori" method="POST">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Subkategori: </label>
                                        <input type="text" placeholder="sk_nama" name="sk_nama" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label>Kategori: </label>
                                    <select class="form-control" name="kategori_id">
                                        <?php foreach ($kategori as $kat):?>
                                            <option value="<?= $kat['kategori_id'];?>" ><?= $kat['kategori_nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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

    <?php foreach ($subkategori as $i)  : ?>
        <div class="modal fade text-left" id="modalEdit<?php echo $i['sk_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel34">Edit Subkategori</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url()?>BackendC/edit_subkategori" method="POST">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub kategori Nama: </label>
                                        <input type="text" placeholder="Subkategoriname" name="sk_nama" class="form-control" value="<?php echo $i['sk_nama']; ?>" >
                                        <input type="hidden" placeholder="Subkategoriname" name="sk_id" class="form-control" value="<?php echo $i['sk_id']; ?>" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori: </label>
                                        <select class="form-control" name="kategori_id">
                                            <?php foreach ($kategori as $kat):?>
                                                <option value="<?= $kat['kategori_id'];?>" <?php if ($i['kategori_id']==$kat['kategori_id']){echo "selected";} else {} ?>><?= $kat['kategori_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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


        <?php
    endforeach;
    foreach ($subkategori as $i)  : 
        ?>

        <div class="modal fade text-left" id="modalHapus<?php echo $i['sk_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url()?>BackendC/delete_subkategori" method="POST">
                        <div class="modal-body bg-red">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" name="sk_id" value="<?php echo $i['sk_id'];?>">
                                        <label class="text-center">Anda yakin ingin menghapus subkategori <b><?php echo $i['sk_nama']; ?></b> ?</label>
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
