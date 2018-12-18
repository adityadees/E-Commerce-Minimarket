<div class="breadcrumbs_area contact_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="index.html"><i class="fa fa-home"></i></a>
                        <span><i class="fa fa-angle-right"></i></span>
                        <span>Pembayaran</span>
                    </div>
                    <div class="breadcrumb_title">
                        <h2>Upload Bukti Transfer</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="main_content_area my_account">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="row">
                        <div class="ml-auto mr-auto col-lg-6">
                            <form action="<?= base_url();?>frontendc/upbukti" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Invoice</label>
                                    <input type="text" name="pemesanan_kode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="pembayaran_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bukti Transfer</label>
                                    <input type="file" name="filefoto" class="form-control">
                                </div>
                                <input type="submit" name="" value="Submit" class="form-control btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</section>        