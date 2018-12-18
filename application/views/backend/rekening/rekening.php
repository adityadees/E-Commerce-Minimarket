    <div class="app-content content">
    	<div class="content-wrapper">
    		<div class="content-header row">
    			<div class="content-header-left col-md-6 col-12 mb-2">
    				<h3 class="content-header-title mb-0">Rekening</h3>
    				<div class="row breadcrumbs-top">
    					<div class="breadcrumb-wrapper col-12">
    						<ol class="breadcrumb">
    							<li class="breadcrumb-item"><a href="<?= base_url();?>admin">Home</a>
    							</li>
    							<li class="breadcrumb-item active">Rekening
    							</li>
    						</ol>
    					</div>
    				</div>
    			</div>
    			<div class="content-header-right col-md-6 col-12">
    				<div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
    					<a class="btn btn-outline-primary" href="" data-toggle="modal" data-target="#modalAdd"><i class="ft-plus"></i> Tambah Rekening</a>
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
    					<?php foreach ($rekening as $rek) :?>
    						
                            <div class="col-md-4 col-sm-12">
                                <div class="card border-danger text-center bg-transparent">
                                   <div class="card-header bg-transparent">
                                    <h4 class="card-title"><b><?= $rek['rekening_bank'];?></b></h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a href="#" data-toggle="modal" data-target="#modalEdit<?= $rek['rekening_id']; ?>"><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#modalHapus<?= $rek['rekening_id']; ?>"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-content">
                                    <div class="card-body pt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12 float-right">
                                                    <img src="<?= base_url().'assets/images/'.$rek['rekening_gambar'];?>" alt="element 03" class="form-control" style="height: 100px;"><br>
                                                    <p class="card-text"><?= $rek['rekening_nama']; ?></p>
                                                    <p class="card-text"><?= $rek['rekening_nomor']; ?></p>
                                                </div>
                                            </div>
                                        </div>
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


<div class="modal fade text-left" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h3 class="modal-title" id="myModalLabel34">Tambah Rekening</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
 </button>
</div>
<form action="<?php echo base_url()?>BackendC/save_rekening" method="POST" enctype="multipart/form-data">
    <div class="modal-body">
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Bank: </label>
                <input type="text" placeholder="Nama bank" name="rekening_bank" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Rekening: </label>
                <input type="text" placeholder="Nama Rekening" name="rekening_nama" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor Rekening: </label>
                <input type="text" placeholder="Nomor Rekening" name="rekening_nomor" class="form-control">
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

<?php foreach ($rekening as $i)  : ?>
   <div class="modal fade text-left" id="modalEdit<?php echo $i['rekening_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content ">
            <div class="modal-header">
               <h3 class="modal-title" id="myModalLabel34">Edit Rekening</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form action="<?php echo base_url()?>BackendC/edit_rekening" enctype="multipart/form-data" method="POST">
           <div class="modal-body">
              <div class="contanier-fluid">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Bank: </label>
                            <input type="hidden" placeholder="Nama bank" name="rekening_id" value="<?= $i['rekening_id'];?>" class="form-control">
                            <input type="text" placeholder="Nama bank" name="rekening_bank" value="<?= $i['rekening_bank'];?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Rekening: </label>
                            <input type="text" placeholder="Nama Rekening" name="rekening_nama"  value="<?= $i['rekening_nama'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Rekening: </label>
                            <input type="text" placeholder="Nomor Rekening" name="rekening_nomor"  value="<?= $i['rekening_nomor'];?>" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-12">
                     <div class="card-content collapse show">
                        <input type="file" name="filefoto" class="dropzone dropzone-area col-12" id="dpz-single-file">
                        <span class="text-danger">* Kosongkan jika tidak ingin mengganti gambar</span>
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

<?php endforeach; ?>

<?php foreach ($rekening as $i)  : 
	?>

	<div class="modal fade text-left" id="modalHapus<?= $i['rekening_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title" id="myModalLabel34">Konfirmasi</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?php echo base_url()?>BackendC/delete_rekening" method="POST">
					<div class="modal-body bg-red ">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="rekening_id" value="<?php echo $i['rekening_id'];?>">
									<label class="text-center text-white">Anda yakin ingin menghapus rekening <b><?php echo $i['rekening_bank']; ?></b> ?</label>
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
