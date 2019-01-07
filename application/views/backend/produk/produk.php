
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Data Produk</h3>
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
                                                    <th>Produk Kode</th>
                                                    <th>Nama Produk</th>
                                                    <th>List</th>
                                                    <th>Harga</th>
                                                    <th>Keterangan</th>
                                                    <th>Promo Up</th>
                                                    <th>Parent</th>
                                                    <th>Gambar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($produk as $i)  : ?>
                                                    <tr>
                                                        <td><?php echo $i['produk_kode'];?></td>
                                                        <td><?php echo $i['produk_nama'];?></td>
                                                        <td><?php echo $i['list_nama'];?></td>
                                                        <td><?= 'Rp. '.number_format($i['produk_harga']); ?></td>
                                                        <td><?php echo substr($i['produk_ket'],0,50);?>...</td>
                                                        <td><?php echo $i['produk_up']; ?></td>
                                                        <td><?php echo $i['produk_parent']; ?></td>
                                                        <td>    <img class="card-img-top img-fluid" src="<?php echo base_url().'assets/images/'.$i['produk_gambar'];?>" alt="Card image cap"></td>
                                                        <td class=" text-center">
                                                            <div class="btn-group mr-1 mb-1">
                                                                <button type="button" class="btn btn-icon btn-pink dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-info"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalEdit<?= $i['produk_kode']; ?>">Edit</a>
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHapus<?= $i['produk_kode']; ?>">Hapus</a>
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


        <?php
        $kd="PRD";
        $key=rand(0,999);
        $key2=rand(0,10);
        $tgl=date('mdy');
        $nkode=$kd.$key.$tgl.$key2;
        ?>

        <div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel34">Tambah Produk</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url()?>BackendC/save_produk" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama: </label>
                                        <input type="hidden" name="produk_kode" value="<?php echo $nkode;?>">
                                        <input type="text" placeholder="Nama Produk" name="produk_nama" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga: </label>
                                        <input type="text" placeholder="Harga Produk" name="produk_harga" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>List: </label>
                                        <select class="form-control" name="list_id">
                                            <?php foreach ($datalist as $j ) : ?>
                                                <option value="<?php echo $j['list_id']; ?>"><?php echo $j['list_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                     <label>Promo Up: </label>
                                     <select class="form-control" name="produk_up">
                                        <option value="yes">Ya</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>Produk Parent: </label>
                                <select class="form-control" name="produk_parent">
                                    <?php foreach ($produk as $pp) : ?>
                                        <option value="<?= $pp['produk_kode']; ?>"><?= $pp['produk_nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label>Keterangan: </label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-content collapse show">
                            <input type="file" name="filefoto" class="dropzone dropzone-area col-12" id="dpz-single-file">
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


<?php foreach ($produk as $i)  : ?>
    <div class="modal fade text-left" id="modalEdit<?php echo $i['produk_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Edit Produk</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url()?>BackendC/edit_produk" enctype="multipart/form-data" method="POST">
                    <div class="modal-body">
                        <div class="contanier-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama: </label>
                                        <input type="hidden" name="produk_kode" value="<?= $i['produk_kode'];?>">
                                        <input type="text" placeholder="Nama Produk" name="produk_nama" value="<?= $i['produk_nama']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Harga: </label>
                                        <input type="text" placeholder="Harga Produk" name="produk_harga" class="form-control" value="<?= $i['produk_harga']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>List: </label>
                                        <select class="form-control" name="list_id">
                                            <?php foreach ($datalist as $j):?>
                                                <option value="<?= $j['list_id'];?>" <?php if ($j['list_id']==$i['list_id']){echo "selected";} else {} ?>><?= $j['list_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Promo Up: </label>
                                        <select class="form-control" name="produk_up">
                                            <option value="yes">Ya</option>
                                            <option value="no">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                  <div class="form-group">
                                    <label>Produk Parent: </label>
                                    <select class="form-control" name="produk_parent">
                                        <?php 
                                        $produk_parent = $this->Mymod->getProdukNotParent($i['produk_kode'])->result_array();
                                        foreach ($produk_parent as $pp) : 
                                            ?>
                                            <option value="<?= $pp['produk_kode']; ?>" ><?= $pp['produk_nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>Keterangan: </label>
                                <textarea name="keterangan" class="form-control"><?= $i['produk_ket']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                           <div class="card-content collapse show">
                              <input type="file" name="filefoto" class="dropzone dropzone-area col-12" id="dpz-single-file">
                          </div>
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
foreach ($produk as $i)  : 
    ?>

    <div class="modal fade text-left" id="modalHapus<?= $i['produk_kode']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url()?>BackendC/delete_produk" method="POST">
                    <div class="modal-body bg-red">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="produk_kode" value="<?php echo $i['produk_kode'];?>">
                                    <label class="text-center">Anda yakin ingin menghapus produk <b><?php echo $i['produk_nama']; ?></b> ?</label>
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
