    <div class="app-content content">
    	<div class="content-wrapper">
    		<div class="content-header row">
    			<div class="content-header-left col-md-6 col-12 mb-2">
    				<h3 class="content-header-title mb-0">Produk</h3>
    				<div class="row breadcrumbs-top">
    					<div class="breadcrumb-wrapper col-12">
    						<ol class="breadcrumb">
    							<li class="breadcrumb-item"><a href="<?= base_url();?>admin">Home</a>
    							</li>
    							<li class="breadcrumb-item active">Produk
    							</li>
    						</ol>
    					</div>
    				</div>
    			</div>
    			<div class="content-header-right col-md-6 col-12">
    				<div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
    					<a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#modalAdd"><i class="ft-plus"></i> Tambah Produk</a>
    				</div>
    			</div>
    		</div>
    		<div class="content-body">
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
    			<section id="shopping-cards">
    				<div class="row match-height">
    					<?php foreach ($produk as $prod) :?>
    						<div class="col-lg-4 col-md-12">
    							<div class="card">
    								<div class="card-content">
    									<img class="card-img-top img-fluid" src="<?php echo base_url().'assets/images/'.$prod['produk_gambar'];?>" alt="Card image cap">
    									<div class="card-body">
    										<h4 class="card-title"><?= $prod['produk_nama']; ?></h4>
    										<p class="card-text"><?=  $prod['produk_ket']; ?></p>
    									</div>
    								</div>
    								<div class="card-footer text-muted">
    									<span class="float-left"><?= 'Rp. '.number_format($prod['produk_harga']); ?></span>
    									<div class="float-right">	
    										<span class="float-right">
    											<a href="" data-toggle="modal" data-target="#modalEdit<?= $prod['produk_kode']; ?>">
    												<i class="fa fa-pencil btn "></i>
    											</a>
    										</span>
    										<span class="float-right">
    											<a href="" data-toggle="modal" data-target="#modalHapus<?= $prod['produk_kode']; ?>">
    												<i class="fa fa-trash btn "></i>
    											</a>
    										</span>
    										<span class="float-right">
    											<a href="">
    												<i class="fa fa-eye btn "></i>
    											</a>
    										</span>
    									</div>
    								</div>
    							</div>
    						</div>
    					<?php endforeach; ?>
    				</div>
    			</section>
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
    								<label>Keterangan: </label>
    								<select class="form-control" name="produk_kategori">
    									<?php foreach ($kategori as $kat ) : ?>
    										<option value="<?php echo $kat['kategori_id']; ?>"><?php echo $kat['kategori_nama']; ?></option>
    									<?php endforeach; ?>
    								</select>
    							</div>
    						</div>
    						<div class="col-md-6">
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
    										<label>Keterangan: </label>
    										<select class="form-control" name="produk_kategori">
    											<?php foreach ($kategori as $kat ) : ?>
    												<option value="<?php echo $kat['kategori_id']; ?>" <?php if($kat['kategori_id']==$i['kategori_id']){echo "selected";} else {} ?>><?php echo $kat['kategori_nama']; ?></option>
    											<?php endforeach; ?>
    										</select>
    									</div>
    								</div>
    								<div class="col-md-6">
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
