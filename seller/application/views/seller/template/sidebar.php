<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
		  <a href="<?php echo base_url(); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Acha Number</span></a>
		</div>
		<div class="clearfix"></div>
        <div class="profile clearfix">
            <div class="profile_info">
                <span>Welcome <h2><?php echo $this->session->achausername; ?>!</h2></span>
            </div>
        </div><br />
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                
				<ul class="nav side-menu">
					<li>
						<a href="<?php echo base_url(); ?>">
							<i class="fa fa-dashboard"></i>Dashboard
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('circle'); ?>">
							<i class="fa fa-file"></i>Circles
						</a>
					</li>
					<li>
                        <a><i class="fa fa-file"></i> Numbers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('new_number'); ?>"><i class="fa fa-plus"></i> Number</a></li>
                            <li><a href="<?php echo base_url('active_numbers'); ?>"><i class="fa fa-list"></i> Active Number</a></li>
                            <li><a href="<?php echo base_url('expired_numbers'); ?>"><i class="fa fa-list"></i> Expired Number</a></li>
                            <li><a href="<?php echo base_url('my_numbers'); ?>"><i class="fa fa-list"></i> My Number</a></li>
                            <li><a href="<?php echo base_url('sold_numbers'); ?>"><i class="fa fa-list"></i> Sold Number</a></li>
                            <li><a href="<?php echo base_url('my_sold'); ?>"><i class="fa fa-list"></i> My Sold</a></li>
                        </ul>
				    </li>
				    <li>
                        <a><i class="fa fa-file"></i> Postpaid Numbers <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('new_postpaid'); ?>"><i class="fa fa-plus"></i> Number</a></li>
                            <li><a href="<?php echo base_url('postpaid_active_numbers'); ?>"><i class="fa fa-list"></i> Active Number</a></li>
                            <li><a href="<?php echo base_url('postpaid_my_numbers'); ?>"><i class="fa fa-list"></i> Postpaid Numbers</a></li>
                            <li><a href="<?php echo base_url('postpaid_my_sold'); ?>"><i class="fa fa-list"></i> Sold Numbers</a></li>
                            <li><a href="<?php echo base_url('team_member'); ?>"><i class="fa fa-list"></i> Team Members</a></li>
                        </ul>
				    </li>
				    <li>
                        <a><i class="fa fa-file"></i> Orders <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('new_orders'); ?>"><i class="fa fa-plus"></i> New orders</a></li>
                            <li><a href="<?php echo base_url('my_orders'); ?>"><i class="fa fa-list"></i> Delivered orders</a></li>
                        </ul>
				    </li>
				    <?php if ($this->session->achausertype == 'A') { ?>
    				    <li>
    						<a href="<?php echo base_url('enquiry'); ?>">
    							<i class="fa fa-list"></i> Enquiries
    						</a>
    					</li>
    					<li>
                            <a><i class="fa fa-money"></i> Charges & Payments <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url('charges'); ?>"><i class="fa fa-list"></i> Charges</a></li>
                            </ul>
    				    </li>
    					<li>
                            <a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url('ad_users'); ?>"><i class="fa fa-list"></i> All Users</a></li>
                                <li><a href="<?php echo base_url('ad_customers'); ?>"><i class="fa fa-list"></i> Customers</a></li>
                                <li><a href="<?php echo base_url('ad_sellers'); ?>"><i class="fa fa-list"></i> Sellers</a></li>
                                <li><a href="<?php echo base_url('ad_nsellers'); ?>"><i class="fa fa-list"></i> New Sellers</a></li>
                            </ul>
    				    </li>
    					<li>
                            <a><i class="fa fa-folder"></i> All Numbers <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url('ad_numbers'); ?>"><i class="fa fa-list"></i> Numbers</a></li>
                                <li><a href="<?php echo base_url('ad_active'); ?>"><i class="fa fa-list"></i> Active</a></li>
                                <li><a href="<?php echo base_url('ad_sold'); ?>"><i class="fa fa-list"></i> Sold</a></li>
                            </ul>
    				    </li><li>
                            <a><i class="fa fa-folder"></i> All Orders <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="<?php echo base_url('ad_norders'); ?>"><i class="fa fa-list"></i> New Order</a></li>
                                <li><a href="<?php echo base_url('ad_porders'); ?>"><i class="fa fa-list"></i> Processed</a></li>
                                <li><a href="<?php echo base_url('ad_dorders'); ?>"><i class="fa fa-list"></i> Delivered</a></li>
                                <li><a href="<?php echo base_url('ad_corders'); ?>"><i class="fa fa-list"></i> Cancelled</a></li>
                            </ul>
    				    </li>
				    <?php } ?>
                </ul>
            </div>
		</div>
    </div>
</div>
