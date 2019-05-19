<div class="navbar navbar-default navbar-fixed-top menu-back">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url(); ?>logo.png" class="navbar-brand-logo " alt="" />
            </a>
        </div>
        <div class="navbar-collapse collapse" >
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="<?php echo base_url(); ?>">HOME PAGE<i class="fa fa-home"></i><span>Go Home</span></a></li>
                <li class="dropdown">
                    <a href="#">Numbers<i class="fa fa-phone"></i><span>Select your choice</span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="<?php echo base_url('numbers/page-1'); ?>"><i class="fa fa-paper-plane-o"></i>Choice Numbers <i class="fa fa-angle-double-right"></i></a></li>
                        <li><a href="<?php echo base_url('numbers/page-1?r=vdg'); ?>"><i class="fa fa-paper-plane-o"></i>VIP Numbers <i class="fa fa-angle-double-right"></i></a></li>
                        <li><a href="<?php echo base_url('postpaid/page-1'); ?>"><i class="fa fa-paper-plane-o"></i>Postpaid Numbers <i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="<?php echo base_url('vendor-registration'); ?>">Vendor <i class="fa fa-briefcase"></i><span>Business with Us</span></a></li>
                <li class="dropdown"><a href="<?php echo base_url('enquiries'); ?>">My Choice<i class="fa fa-heart"></i><span>Send your choice</span></a></li>
                <?php if (!$this->session->achauser) { ?>
                    <li class="dropdown">
                        <a href="#">Account<i class="fa fa-folder-open-o"></i>
                            <span>Go to account!</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="<?php echo base_url('login'); ?>"><i class="fa fa-paper-plane-o"></i>Login <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="<?php echo base_url('new_user'); ?>"><i class="fa fa-paper-plane-o"></i>New user <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="<?php echo base_url('seller'); ?>"><i class="fa fa-paper-plane-o"></i>Seller Login <i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="<?php echo base_url('logout'); ?>">Account<i class="fa fa-folder-open-o"></i>
                            <span>Not you? Logout</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left">
                            <li><a href="<?php echo base_url('orders'); ?>"><i class="fa fa-paper-plane-o"></i>My Orders <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-paper-plane-o"></i>Log Out <i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </li>
                <?php } ?>
                </ul>
            </div>

        </div>
    </div>
<div class="div-social-top">
    <i class="fa fa-globe "></i>E-mail:  info@achanumber.com   | <i class="fa fa-mobile "></i> Choose your number wisely!&nbsp;
    <a href="https://business.facebook.com/achanumber"><i class="fa fa-facebook-square "></i></a>
    <a href="#"><i class="fa fa-linkedin-square "></i></a>
    <a href="#"><i class="fa fa-pinterest-square "></i></a>
</div>