
<footer class="footer-area pt-58 gray-bg-3">
    <div class="footer-top gray-bg-3 pb-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget footer-widget-red footer-black-color mb-40">
                        <div class="footer-title mb-30">
                            <h4>About Us</h4>
                        </div>
                        <div class="footer-about">
                            <p></p>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>Address: 123 Main Street, Anytown, CA 12345 - USA.</li>
                                    <li>Telephone: (012) 800 456 789-987 </li>
                                    <li>Email: <a href="#">yourmail@example.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="social-icon">
                            <ul>
                                <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a class="instagram" href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                <li><a class="googleplus" href="#"><i class="ion-social-googleplus-outline"></i></a></li>
                                <li><a class="rss" href="#"><i class="ion-social-rss"></i></a></li>
                                <li><a class="dribbble" href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-30">
                            <h4>Information</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-30">
                            <h4>My Account</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="<?= base_url();?>myaccount">My Account</a></li>
                                <li><a href="<?= base_url();?>myorders">Order History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="footer-bottom pb-25 pt-25 gray-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>Copyright © <a href="#"></a>. All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-img f-right">
                        <a href="#">
                            <img alt="" src="<?php echo base_url();?>assets/frontend/assets/img/icon-img/payment.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>




<script src="<?php echo base_url();?>assets/frontend/assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/ajax-mail.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/plugins.js"></script>
<script src="<?php echo base_url();?>assets/frontend/assets/js/main.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo"></script>
<script>
    function init() {
        var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            center: new google.maps.LatLng(40.709896, -73.995481),
            styles: 
            [{"featureType":"administrative","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"visibility":"on"},{"color":"#f53651"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"road.highway.controlled_access","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#f1ced3"},{"visibility":"on"}]}]
        };
        var mapElement = document.getElementById('map');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(40.709896, -73.995481),
            map: map,
            icon: '<?=base_url();?>assets/frontend/assets/img/icon-img/map.png',
            animation:google.maps.Animation.BOUNCE,
            title: 'Snazzy!'
        });
    }
    google.maps.event.addDomListener(window, 'load', init);
</script>

</body>
</html>
