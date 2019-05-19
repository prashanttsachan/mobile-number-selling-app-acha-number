    <div id="footer-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4" id="about-ftr">
                    <i class="fa fa-building fa-2x"></i>
                    <span>Welcome to Achanumber</span>
                    <small>A small intro</small>
                    <p>
                        Acha Number is a premium marketplace of VIP and attractive 
                        mobile numbers that caters to provide a wide range of unique and 
                        fresh mobile numbers suiting your demands. In just few clicks, 
                        we bring a countless VIP and fancy mobile numbers under a single roof.
                        </br>
                        We brings in an Exclusive list of VIP Numbers that would 
                        add on a brand value to your personality and make it more attractive. 
                        We have a large list of such numbers that you have always dreamt of.
                    </p>
                </div>
                <div class="col-lg-2 col-md-2" id="about-ftr">
                    <i class="fa fa-building fa-2x"></i>
                    <span>Quick Links</span>
                    <small>Short links to the pages</small>
                    <div id="blog-footer-div">
                        <div class="media">
                            <div class="media-body">
                                <span class="media-heading">
                                    <!--a href="<?php echo base_url('seller'); ?>">Seller <i class="fa fa-arrow-right"></i></a-->
                                    <a href="<?php echo base_url('numbers'); ?>">Numbers <i class="fa fa-list-ol"></i></a></br>
                                    <a href="<?php echo base_url('enquiries'); ?>">Enquiries <i class="fa fa-question"></i></a></br>
                                    <a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy <i class="fa fa-user-secret"></i></a></br>
                                    <a href="<?php echo base_url('login'); ?>">Account <i class="fa fa-user-md"></i></a></br>
                                    <a href="<?php echo base_url('contact'); ?>">Contact <i class="fa fa-support"></i></a></br>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2" id="about-ftr">
                    <i class="fa fa-building fa-2x"></i>
                    <span>My account</span>
                    <small>Access your account easily</small>
                    <div id="blog-footer-div">
                        <div class="media">
                            <div class="media-body">
                                <span class="media-heading">
                                    <?php 
                                        if (!$this->session->achanumber) {
                                            echo '<a href="'.base_url('new_user').'">New User <i class="fa fa-user"></i></a></br>
                                                    <a href="'.base_url('login').'">Login <i class="fa fa-sign-in"></i></a></br>
                                                    <a href="'.base_url('reset_password').'">Forget Password <i class="fa fa-edit"></i></a></br>
                                                    <a href="'.base_url('ver_otp').'">Account Verification <i class="fa fa-certificate"></i></a></br>';
                                        } else {
                                            echo '<a href="'.base_url('new_user').'">New User <i class="fa fa-user"></i></a></br>
                                                    <a href="'.base_url('login').'">Login <i class="fa fa-arrow-right"></i></a></br>
                                                    <a href="'.base_url('reset_password').'">Forget Password <i class="fa fa-arrow-right"></i></a></br>
                                                    <a href="'.base_url('ver_otp').'">Account Verification <i class="fa fa-arrow-right"></i></a></br>';
                                        }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <i class="fa fa-paper-plane-o fa-2x"></i>
                    <span>Our contacts</span>
                    <small>replace this dummy text with your text</small>
                    <div id="blog-footer-div">
                        <div class="media">
                            <div class="media-body">
                                <span class="media-heading"><a>You can drop your emails regarding your query on the given Email addresses.</a></span>
                                 <br />
                                <i class="fa fa-envelope-open"></i> mail: info@achanumber.com<br>
                                seller: seller@achanumber.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="footser-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    2018 All Rights Reserved | by: <a href="https://www.ciesta.in/" target="_blank" style="color:#fff" >Ciesta Technologies</a>
                </div>
            </div>
        </div>
    </div>
    <!--script src="<?php echo base_url('public/assets/js/jquery-1.10.2.js'); ?>"></script -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('public/assets/js/bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('custom.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>
<script>
$(document).ready(function(e) {
    $('#state').change(function(){
        var state = $(this).val(); 
        var name = $('#'+state).html();
        $.ajax({
                type:'POST',
                url:'<?php echo base_url('city'); ?>',
                data:'state='+state,
                success:function(res) {
                    $('#cities').html(res);
                }
           });
    
  });
});
</script>
</body>
</html>
