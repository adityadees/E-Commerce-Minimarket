<style type="text/css">
.input-hidden {
  position: absolute;
  left: -9999px;
}

input[type=radio]:checked + label>img {
  border: 1px solid #fff;
  box-shadow: 0 0 3px 3px #090;
}

input[type=radio] + label>img {
    width: 100;
    height: 70px;
    transition: 500ms all;
    margin-right:50px; 
    -webkit-transition: all 100ms ease-in;
    -moz-transition: all 100ms ease-in;
    transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
    -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
    filter: brightness(1.8) grayscale(1) opacity(.7);
}

input[type=radio]:checked + label>img {
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:100px;height:70px;
    -webkit-transition: all 100ms ease-in;
    -moz-transition: all 100ms ease-in;
    transition: all 100ms ease-in;
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
    -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
    filter: brightness(1.2) grayscale(.5) opacity(.9);
}

input[type=radio]:hover + label>img {
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
    -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
    filter: brightness(1.2) grayscale(.5) opacity(.9);
}
html {
  background-color: #fff;
  background-size: 100% 1.2em;
  background-image: 
  linear-gradient(
      90deg, 
      transparent 79px, 
      #abced4 79px, 
      #abced4 81px, 
      transparent 81px
      ),
  linear-gradient(
      #eee .1em, 
      transparent .1em
      );
}
</style>

<div class="breadcrumb-area gray-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active"> Checkout </li>
            </ul>
        </div>
    </div>
</div>

<div class="checkout-area pb-45 pt-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <form method="POST" action="<?php base_url();?>frontendc/save_checkout">
                    <div class="checkout-wrapper">
                        <div id="faq" class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><span>1.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-1">Alamat & Informasi pengiriman</a></h5>
                                </div>
                                <div id="payment-1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="billing-information-wrapper">
                                            <?php $no=0; foreach($getCartData as $i): $no++; ?>
                                            <div class="row">
                                                <div id="bilinfo" class="panel-group col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h5 class="panel-title"><span><?= $no; ?>.</span> <a data-toggle="collapse" data-parent="#bilinfo" href="#info<?= $i['produk_kode']; ?>"><?= $i['produk_nama'];?></a></h5>
                                                        </div>
                                                        <div id="info<?= $i['produk_kode']; ?>" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="billing-information-wrapper">
                                                                    <div class="row">

                                                                        <table class="table table-hovered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Nama Penerima</th>
                                                                                    <th>Tanggal Pengiriman</th>
                                                                                    <th>Pesan Ucapan</th>
                                                                                    <th>Lokasi Pengiriman</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php for($k=1;$k<=$i['keranjang_qty'];$k++){?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?= $k;?>
                                                                                            <input type="hidden" name="ps_kds[]" value="<?= $k.$i['produk_kode']; ?>">
                                                                                            <input type="hidden" name="produk_kode[]" value="<?= $i['produk_kode']; ?>">
                                                                                        </td>
                                                                                        <td><input type="text" name="ps_nama[]"></td>
                                                                                        <td><input type="date" name="ps_tanggal[]"></td>
                                                                                        <td><textarea name="ps_ucapan[]"></textarea></td>
                                                                                        <td><textarea name="ps_lokasi[]"></textarea></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-2">payment information</a></h5>
                            </div>
                            <div id="payment-2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="payment-info-wrapper">
                                        <div class="ship-wrapper">
                                            <input type="hidden" name="user_id" value="<?= $user['user_id'];?>">

                                            <?php foreach($rekening as $rek):?>
                                                <input  type="radio" name="rekening"  id="<?= $rek['rekening_id']; ?>" class="input-hidden" value="<?= $rek['rekening_id']; ?>" />
                                                <label for="<?= $rek['rekening_id']; ?>">
                                                    <img src="<?= base_url().'assets/images/'.$rek['rekening_gambar'];?>" width="190px"><br>
                                                </label>
                                            <?php endforeach; ?>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3.</span> <a data-toggle="collapse" data-parent="#faq" href="#payment-3">Order Review</a></h5>
                            </div>
                            <div id="payment-3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="order-review-wrapper">
                                        <div class="order-review">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="width-1">Nama Produk</th>
                                                            <th class="width-2">Size</th>
                                                            <th class="width-2">Harga</th>
                                                            <th class="width-3">Qty</th>
                                                            <th class="width-3">Diskon</th>
                                                            <th class="width-4">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $tgl=date('myd');
                                                        $kd="INV";
                                                        $ran1=rand(0,999);
                                                        $ran2=rand(0,99);
                                                        $pemesanan_kode=$kd.$ran1.$tgl.$ran2;
                                                        $total=0;
                                                        $tsubdsc=0;
                                                        $tnodsc=0;
                                                        $tqty=0;
                                                        $subtqty=0;
                                                        $tongkir=0;
                                                        $oldp=0;
                                                        $cid=0;
                                                        foreach($getCartData as $gcart):
                                                            $cid++;
                                                            if($gcart['keranjang_ukuran']=='m2'){
                                                                $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*15/100))*$gcart['keranjang_qty'];
                                                                $subdsc=(($gcart['produk_harga']*15)/100)*$gcart['keranjang_qty'];
                                                                $subongkir=0*$gcart['keranjang_qty'];
                                                            }else {
                                                                $subongkir=10000*$gcart['keranjang_qty'];
                                                                if($gcart['keranjang_qty']>=3){
                                                                    $subtotal=($gcart['produk_harga']-($gcart['produk_harga']*5/100))*$gcart['keranjang_qty'];
                                                                    $subtqty=(($gcart['produk_harga']*5)/100)*$gcart['keranjang_qty'];
                                                                }else{
                                                                    $subtotal=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                                                }

                                                            }
                                                            $oldp +=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                                            $total +=$subtotal;
                                                            @$tsubdsc +=$subdsc;
                                                            $tnodsc +=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                                            $tqty +=$subtqty;
                                                            $tongkir +=$subongkir;
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="o-pro-dec">
                                                                        <p><?= $gcart['produk_nama'];?></p>
                                                                        <input type="hidden" name="cid[]" value="<?= $cid;?>">
                                                                        <input type="hidden" name="prd_kd[]" value="<?= $gcart['produk_kode'];?>">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="o-pro-qty">
                                                                        <input type="hidden" name="pdp_size[]" value="<?= $gcart['keranjang_ukuran'];?>">
                                                                        <p><?php if($gcart['keranjang_ukuran']=='m1'){ echo "1 Papan"; 
                                                                    } else {
                                                                       echo "2 Papan";
                                                                   }?></p>
                                                               </div>
                                                           </td>
                                                           <td>
                                                            <div class="o-pro-price">
                                                                <p>
                                                                    <?php 
                                                                    if($gcart['keranjang_ukuran']=='m2'){
                                                                        $pharga=($gcart['produk_harga']-($gcart['produk_harga']*15/100));
                                                                        ?>
                                                                        <span class="amount">
                                                                            <?= "Rp. ".number_format($pharga); ?>
                                                                            <input type="hidden" name="pdp_harga[]" value="<?= $pharga;?>">
                                                                        </span>
                                                                        <strike class="product-price-old text-danger">
                                                                            <?= "Rp. ".number_format($gcart['produk_harga']); ?>
                                                                        </strike>
                                                                        <?php  
                                                                    }else {
                                                                        if($gcart['keranjang_qty']>=3){
                                                                            $pharga=($gcart['produk_harga']-($gcart['produk_harga']*5/100));
                                                                            ?>
                                                                            <span class="amount">
                                                                                <input type="hidden" name="pdp_harga[]" value="<?= $pharga;?>">
                                                                                <?= "Rp. ".number_format($pharga); ?>
                                                                            </span>
                                                                            <strike class="product-price-old text-danger">
                                                                                <?= "Rp. ".number_format($gcart['produk_harga']); ?>
                                                                            </strike>
                                                                        <?php } else {
                                                                            $pharga=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                                                            ?>
                                                                            <span class="amount">
                                                                                <input type="hidden" name="pdp_harga[]" value="<?= $pharga;?>">
                                                                                <?= "Rp. ".number_format($pharga); ?>
                                                                            </span>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="o-pro-qty">
                                                                <input type="hidden" name="pdp_qty[]" value="<?= $gcart['keranjang_qty'];?>">
                                                                <p><?= $gcart['keranjang_qty']; ?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="o-pro-qty">
                                                                <p>
                                                                    <?php if($gcart['keranjang_ukuran']=='m2'){
                                                                        echo  "Rp. ".number_format($tsubdsc); ?>
                                                                        <input type="hidden" name="pdp_diskon[]" value="<?= $tsubdsc;?>">

                                                                    <?php }else {
                                                                        if($gcart['keranjang_qty']>=3){
                                                                            echo  "Rp. ".number_format($tqty); ?>
                                                                            <input type="hidden" name="pdp_diskon[]" value="<?= $tqty;?>">

                                                                        <?php }else {
                                                                            echo "0"; ?>
                                                                            <input type="hidden" name="pdp_diskon[]" value="0">
                                                                            <?php 
                                                                        }
                                                                    }
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="o-pro-subtotal">
                                                                <input type="hidden" name="pdp_subtotal[]" value="<?= $subtotal;?>">
                                                                <p><?= "Rp. ".number_format($subtotal); ?></p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="4">Standar Price </td>
                                                    <td colspan="1" >
                                                        <input type="hidden" name="pemesanan_sprice" value="<?= $oldp;?>">
                                                        <?= "Rp. ".number_format($oldp);?>
                                                    </td>
                                                    <td colspan="1" class="text-left text-success"></td>
                                                </tr>

                                                <tr class="tr-f">
                                                    <td colspan="4" >Diskon</td>
                                                    <td colspan="1" >
                                                        <input type="hidden" name="pemesanan_diskon" value="<?= @$subdsc+$subtqty;?>">
                                                        <?= "Rp. ".@number_format($subdsc+$subtqty);?>
                                                    </td>
                                                    <td colspan="1" class="text-left text-success">(-)</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" >Subtotal </td>
                                                    <td colspan="1" ><?= "Rp. ".number_format($total);?></td>
                                                    <td colspan="1" class="text-left text-success"></td>
                                                </tr>
                                                <tr class="tr-f">
                                                    <td colspan="4" >Ongkir</td>
                                                    <td colspan="1" >
                                                        <input type="hidden" name="pemesanan_ongkir" value="<?= $tongkir;?>">
                                                        <?= "Rp. ".number_format($tongkir);?>
                                                    </td>
                                                    <td colspan="1" class="text-left text-danger">(+)</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" >Grand Total</td>
                                                    <td colspan="1" >
                                                        <input type="hidden" name="pemesanan_total" value="<?= $total+$tongkir;?>">
                                                        <input type="hidden" name="pemesanan_kode" value="<?= $pemesanan_kode;?>">

                                                        <?= "Rp. ".number_format($total+$tongkir);?>
                                                    </td>
                                                    <td colspan="1" class="text-left text-primary"></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="billing-back-btn">
                                        <span>
                                            Melupakan sesuatu?
                                            <a href="<?= base_url();?>cart"> Edit Cart</a>

                                        </span>
                                        <div class="billing-btn">
                                            <button type="submit">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="col-lg-3">
    <div class="checkout-progress">
        <h4>Identitas Pembeli</h4>
        <ul>
            <li><?= $user['user_nama'];?></li>
            <li><?= $user['user_email'];?></li>
            <li><?= $user['user_tel'];?></li>
            <li><?= $user['user_alamat'];?></li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
