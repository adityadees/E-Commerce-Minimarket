<style>
.custom-radios div {
  display: inline-block;
}
.custom-radios input[type="radio"] {
  display: none;
}
.custom-radios input[type="radio"] + label {
  color: #333;
  font-family: Arial, sans-serif;
  font-size: 14px;
}
.custom-radios input[type="radio"] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
  border: 2px solid #fff;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
  background-repeat: no-repeat;
  background-position: center;
  text-align: center;
  line-height: 44px;
}
.custom-radios input[type="radio"] + label span img {
  opacity: 0;
  transition: all 0.3s ease;
}
.custom-radios input[type="radio"]#color-1 + label span {
  background-color: #2ecc71;
}
.custom-radios input[type="radio"]#color-2 + label span {
  background-color: #3498db;
}
.custom-radios input[type="radio"]#color-3 + label span {
  background-color: #f1c40f;
}
.custom-radios input[type="radio"]#color-4 + label span {
  background-color: #e74c3c;
}
.custom-radios input[type="radio"]:checked + label span img {
  opacity: 1;
}

/*
.input-hidden {
  position: absolute;
  left: -9999px;
  }*/

</style>

<div class="breadcrumbs_area contact_bread">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <div class="breadcrumb_header">
                        <a href="<?= base_url()?>">
                            <i class="fa fa-home"></i>
                        </a>
                        <span>
                            <i class="fa fa-angle-right"></i>
                        </span>
                        <span> Checkout</span>
                    </div>
                    <div class="breadcrumb_title">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form method="POST" action="<?php base_url();?>frontendc/save_checkout">

    <div class="Checkout_page_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="customer-login mb-20">
                        <h3 class="panel-title"> 
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#Returning_customer" aria-expanded="true">Alamat & Informasi pengiriman</a>
                        </h3>
                        <div id="Returning_customer" class="collapse collapse_one" data-parent="#accordion">
                            <div class="card-bodyfive">
                                <div class="col-lg-12 col-md-12">
                                    <div class="payment-method">

                                        <div class="panel-default">
                                            <div class="custom-radios">
                                                <div>
                                                    <input type="radio" id="color-1" name="infoakun" value="sesuai" data-target="createp_account">
                                                    <label for="color-1" data-toggle="collapse" data-target="#collapsepayment" aria-controls="collapsepayment">
                                                        <span>
                                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                        </span>
                                                        Sesuai data akun anda?
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="collapsepayment" class="collapse one" data-parent="#accordion">
                                                <div class="card-bodyfive">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Nama</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <label><?= $user['user_nama'];?></label>
                                                            <input type="hidden" name="user_nama" value="<?= $user['user_nama'];?>">

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Email</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <label><?= $user['user_email'];?></label>
                                                            <input type="hidden" name="user_email" value="<?= $user['user_email'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Telepon</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <label><?= $user['user_tel'];?></label>
                                                            <input type="hidden" name="user_tel" value="<?= $user['user_tel'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Alamat</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <label><?= $user['user_alamat'];?></label>
                                                            <input type="hidden" name="user_alamat" value="<?= $user['user_alamat'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <br>
                                        <div class="panel-default">
                                            <div class="custom-radios">
                                                <div>
                                                    <input type="radio" id="color-2" name="infoakun" value="berbeda" data-target="createp_account" >
                                                    <label for="color-2"  data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">
                                                        <span>
                                                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                        </span>
                                                        Kirim ke alamat yang berbeda ?
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                                <div class="card-bodyfive">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Nama</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <span><input type="text" name="ps_nama"></span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Email</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <span><input type="text" name="ps_email"></span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Telepon</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <span><input type="text" name="ps_tel"></span>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Alamat</label>
                                                        </div> 
                                                        <div class="col-md-9">
                                                            <span><textarea name="ps_alamat"></textarea></span>
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
                    <div class="customer-login mb-20">
                        <h3> 
                            <a class="Returning" href="#" data-toggle="collapse" data-target="#Returning_customer_one" aria-expanded="true">payment information</a>
                        </h3>
                        <div id="Returning_customer_one" class="collapse collapse_one" data-parent="#accordion">
                            <div class="card-bodyfive">
                                <div class="checkout_coupon_code">
                                  <input type="hidden" name="user_id" value="<?= $user['user_id'];?>">


                                  <div class="custom-radios">
                                    <div>
                                        <input type="radio" id="color-3" name="pembayaran_method" value="ditempat" data-target="createp_account">
                                        <label for="color-3" data-toggle="collapse" data-target="#collapsepayment" aria-controls="collapsepayment">
                                            <span>
                                                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                            </span>
                                            Bayar ditempat
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="panel-default">
                                    <div class="custom-radios">
                                        <div>
                                            <input type="radio" id="color-4" name="pembayaran_method" value="transfer" data-target="createp_account" >
                                            <label for="color-4"  data-toggle="collapse" data-target="#collspembayaran" aria-controls="collspembayaran">
                                                <span>
                                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg" alt="Checked Icon" />
                                                </span>
                                                Transfer
                                            </label>
                                        </div>
                                    </div>
                                    <div id="collspembayaran" class="collapse one" data-parent="#accordion">
                                        <div class="card-bodyfive">
                                            <h3>Bank yang tersedia :</h3><br>
                                            <div class="row">
                                                <?php foreach($rekening as $rek):?>
                                                    <div class="col-md-6">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="<?= base_url().'assets/images/'.$rek['rekening_gambar'];?>" height="100px">
                                                            </div>
                                                            <div class="col-md-6"><br>
                                                              <h5><?= $rek['rekening_nama']; ?></h5>
                                                              <h5><?= $rek['rekening_nomor']; ?></h5>
                                                          </div>
                                                      </div>
                                                  </div>
                                              <?php endforeach; ?>
                                          </div>

                                      </div>
                                  </div>
                              </div>


                          </div>
                      </div>
                  </div>    
              </div>
              <div class="customer-login mb-20">
                <h3> 
                    <a class="Returning" href="#" data-toggle="collapse" data-target="#order-review" aria-expanded="true">Order Review</a>
                </h3>
                <div id="order-review" class="collapse collapse_one" data-parent="#accordion">
                    <div class="card-bodyfive">
                        <div class="col-lg-12 col-md-12">
                            <div class="order_form_two">
                                <h3>Your order</h3> 
                            </div> 
                            <div class="order_wrapper">
                                <div class="table-responsive">
                                    <table class="table table-hovered table-striped">
                                       <thead>
                                        <tr>
                                            <th class="width-1">Nama Produk</th>
                                            <th class="width-2">Harga</th>
                                            <th class="width-3">Qty</th>
                                            <th class="width-2">Bonus Qty</th>
                                            <th class="width-3">Diskon</th>
                                            <th class="width-4">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="user_id" value="<?= $user['user_id'];?>">
                                        
                                        <?php
                                        $tgl=date('myd');
                                        $kd="INV";
                                        $ran1=rand(0,999);
                                        $ran2=rand(0,99);
                                        $pemesanan_kode=$kd.$ran1.$tgl.$ran2;
                                        $total=0;
                                        $ship=5000;
                                        $ptotal=0;
                                        $tgl=date('Y-m-d H:i:s');
                                        $cid=0;
                                        foreach($getCartData as $gcart):
                                            $cid++;
                                            if($gcart['keranjang_qty']>1 && $gcart['produk_up']=='yes'){
                                              $bonus=($gcart['keranjang_qty']/2);

                                          }else {
                                              $bonus=0;
                                          }
                                          $data = [
                                              'produk_kode' => $gcart['produk_kode'],
                                              'promo_start <='=>$tgl,
                                              'promo_end >'=>$tgl,
                                          ];
                                          $cek = $this->Mymod->CekDataRows('promo',$data);

                                          if($cek->num_rows()>0){
                                              $je=$cek->row_array();
                                              $newprc=($gcart['produk_harga']-(($gcart['produk_harga']*$je['promo_diskon'])/100));
                                              $ptotal=$newprc*$gcart['keranjang_qty'];
                                          } else {
                                              $ptotal=$gcart['produk_harga']*$gcart['keranjang_qty'];
                                          }

                                          $total +=$ptotal;
                                          ?>
                                          <tr>
                                            <td>
                                                <div class="o-pro-dec">
                                                    <?= $gcart['produk_nama'];?>
                                                    <input type="hidden" name="cid[]" value="<?= $cid;?>">
                                                    <input type="hidden" name="prd_kd[]" value="<?= $gcart['produk_kode'];?>">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="o-pro-price">
                                                    <?php
                                                    if($cek->num_rows()>0){ ?>
                                                        <span class="old_price">  <s><?= "Rp. ".number_format($gcart['produk_harga']);?></s>  </span><br>
                                                        <span class="new_price"><?= "Rp. ".number_format($newprc);?> </span>
                                                        <input type="hidden" name="pdp_harga[]" value="<?= $newprc;?>">

                                                    <?php   } else { ?>
                                                        <input type="hidden" name="pdp_harga[]" value="<?= $gcart['produk_harga'];?>">
                                                        <span class="old_price"><?= "Rp. ".number_format($gcart['produk_harga']);?> </span><br>
                                                    <?php }?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="o-pro-qty">
                                                    <input type="hidden" name="pdp_qty[]" value="<?= $gcart['keranjang_qty'];?>">
                                                    <?= $gcart['keranjang_qty']; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="o-pro-qty">
                                                    <input type="hidden" name="pdp_bonus[]" value="<?= floor($bonus);?>">
                                                    <?= floor($bonus);
                                                    if($gcart['produk_up']=='yes'){ ?>

                                                        <sup title="Dapatkan bonus 1 produk setiap pembelian kelipatan 2">[*]</sup>

                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="o-pro-qty">
                                                    <?php
                                                    if($cek->num_rows()>0){ 
                                                        echo $je['promo_diskon']." %";
                                                        ?>
                                                        <input type="hidden" name="pdp_diskon[]" value="<?= $je['promo_diskon'];?>">
                                                    <?php } else { 
                                                        echo "-"; ?>
                                                        <input type="hidden" name="pdp_diskon[]" value="0">
                                                    <?php }
                                                    ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="o-pro-subtotal">
                                                    <input type="hidden" name="pdp_subtotal[]" value="<?= $ptotal;?>">
                                                    <p><?= "Rp. ".number_format($ptotal); ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" ></td>
                                        <td colspan="1" >Subtotal </td>
                                        <td colspan="1" ><?= "Rp. ".number_format($total);?></td>
                                        <input type="hidden" name="pemesanan_subtotal" value="<?= $total;?>">
                                    </tr>
                                    <tr class="tr-f">
                                        <td colspan="4" ></td>
                                        <td colspan="1" >Ongkir</td>
                                        <td colspan="1" >
                                            <?php if($total<50000){ 
                                                echo "Rp. ".number_format($ship);
                                                ?>
                                                <input type="hidden" name="pemesanan_ongkir" value="<?= $ship;?>">
                                                <?php 
                                            } else { 
                                                echo "Rp. 0";
                                                ?>
                                                <input type="hidden" name="pemesanan_ongkir" value="0">
                                                <?php 
                                            } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" ></td>
                                        <td colspan="1" >Grand Total</td>
                                        <td colspan="1" >
                                            <input type="hidden" name="pemesanan_kode" value="<?= $pemesanan_kode;?>">

                                            <?php if($total<50000){ 
                                                echo "Rp. ".number_format($total+$ship); 
                                                ?>
                                                <input type="hidden" name="pemesanan_total" value="<?= $total+$ship;?>">
                                            <?php } else { 
                                                echo "Rp. ".number_format($total); 
                                                ?>
                                                <input type="hidden" name="pemesanan_total" value="<?= $total;?>">
                                            <?php } ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" ></td>
                                        <td colspan="1" >
                                            <input type="button" class="btn btn-danger" onclick="location.href='<?= base_url();?>cart';" value="Edit Cart" />

                                        </td>
                                        <td colspan="1" >
                                            <input type="submit" class="btn btn-primary" value="Submit" />

                                        </td>
                                    </tr>
                                </tfoot>
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
</form>
