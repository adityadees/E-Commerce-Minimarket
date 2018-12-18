<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block">
  <a class="customizer-close" href="#">
    <i class="ft-x font-medium-3"></i>
  </a>
  <a class="customizer-toggle bg-success" href="#">
    <i class="fa-whatsapp font-medium-3 fa-spin fa fa-spin fa-fw white"></i>
  </a>
  <div class="customizer-content p-2">
    <h4 class="text-uppercase mb-0">WhatsApp Instant</h4>
    <hr>
    <p>Silahkan pilih customer anda dan masukan pesan anda</p>
    <h5 class="mt-1 text-bold-500">WhatsApp Message</h5>
    <div class="tab-content px-1 pt-1">
      <form method="post" action="<?php echo base_url()?>backendc/sendWhatsapp">
        <div class="form-group">
          <select name="user"  class="form-control">
            <?php 
            $whr = [
              'user_role' => 'customer'
            ];
            $cphone =  $this->Mymod->CekDataRows('user',$whr);
            foreach ($cphone->result_array() as $i): ?>
              <option value="<?= $i['user_tel']; ?>"><?= $i['user_nama']." (".$i['user_tel'].")"; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <textarea name="message" class="form-control" placeholder="Your Message"></textarea>
        </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>


<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
  </p>
</footer>
<script src="<?php echo base_url();?>assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/customizer.js" type="text/javascript"></script>
  <!--
  <script src="<?php echo base_url();?>assets/backend/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&callback=initMap">
</script>

  <script src="<?php echo base_url();?>assets/backend/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/backend/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
-->
<script src="<?php echo base_url();?>assets/backend/js/scripts/tables/datatables/datatable-basic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/extensions/toastr.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/forms/switch.min.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>assets/backend/vendors/js/ui/prism.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/dropzone.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/extensions/dropzone.min.js" type="text/javascript"></script>

</body>
</html>
