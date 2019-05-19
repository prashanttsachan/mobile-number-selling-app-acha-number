<style>
@media (max-width: 738px){
    .content-mobile {
        display: none;
    }
}
</style>
<div class="col-lg-12 col-md-12" style="padding:15px;background-image: url('<?php echo base_url('public/images/home.jpg'); ?>');">
    <div class="col-lg-9 col-md-9" style="background-color:rgba(219,219,219,0.8); padding: 20px;">
        <div class="col-lg-12 col-md-12">
            <div class="bannerwrapper" class="col-lg-12 col-md-12 ">
                <div class="bannersearch">
                    <div class="row" style="background-color: white;">
                        <div class="col-lg-8 col-md-8" >
                            <form action="<?php echo base_url('search'); ?>" accept-charset="utf-8">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-md-12" style="background-color: #34296F; color:white;border-radius:  15px 15px 0px 0px;">
                                        <h3 style="margin:0;padding:2%;"><i class="fa fa-search"></i> Search</h3>
                                    </div>
                                    <div class="col-md-12" style="padding: 40px;background-color: #565AB1;border-radius:  0px 0px 15px 15px;">
                                        <input type="text" name="number" maxlength="7" class="form-control" autocomplete="off" placeholder="Enter your choice" />
                                        <button type="submit" name="submit" value="submit" style="width:100%;margin-top:5%;" class="btn btn-primary"><i class="fa fa-search" ></i> Search</button>                            
                                    </div>
                                </div>
                            </form>
                            <!--div class="col-lg-6 col-md-6" style="background-color: green; color:white;font-weight;bold;padding:2%;text-align:justify;">
                                <p>
                                    We have a large numbers of mobile numbers for our customers. You can browse your choice here by simply. 
                                    We have a large list of such numbers that you have always dreamt of.
                                </p>
                            </div -->
                        </div>
                        <div class="col-lg-4 col-md-4 content-mobile" >
                            <div class="row" style="background-color: white;padding: 20px;">
                                <div class="col-md-12" style="background-color: #34296F; color:white;border-radius:  15px 15px 0px 0px;">
                                    <h3><i class="fa fa-users"></i> Customer</h3>
                                </div>
                                <div class="col-md-12" style="padding: 10px;background-color: #565AB1;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid #34296F">
                                        <a href="<?php echo base_url('new_user'); ?>" style="background:none;text-dcoration:none;color:white;"><h5>Create account <i class="fa fa-user-plus"></i></h5></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <a href="<?php echo base_url('login'); ?>" style="background:none;text-dcoration:none;color:white;">
                                            <h5>Login <i class="fa fa-signin"></i></h5>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-12" style="background-color: #34296F; color:white;">
                                    <h3><i class="fa fa-user-md"></i> Vendor</h3>
                                </div>
                                <div class="col-md-12" style="padding: 10px;background-color: #565AB1;">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="border-right:1px solid #34296F">
                                        <a href="https://seller.achanumber.com/account/login" style="background:none;text-dcoration:none;color:white;"><h5>Login</h5></a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <a href="<?php echo base_url('vendor-registration'); ?>" style="background:none;text-dcoration:none;color:white;">
                                            <h5>New here?</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--div class="col-lg-6 col-md-6" style="background-color: green; color:white;font-weight;bold;padding:2%;text-align:justify;">
                                <p>
                                    We have a large numbers of mobile numbers for our customers. You can browse your choice here by simply. 
                                    We have a large list of such numbers that you have always dreamt of.
                                </p>
                            </div -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3"> </div>
</div>

<div class="col-md-8">
    <div class="row"><br>
        <?php foreach ($numbers as $row): ?>
        <div class="col-md-6">
            <div class="alert alert-info transparent-bk ">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-4" style="padding-right:0;margin-right:0;">
                        <img src="<?php echo base_url(); ?>public/images/<?php echo $row->img; ?>" style="width:100px;height:100px;" class="img img-responsive">
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-8">
                        <div class="row" style="padding:0;margin:0;">
                            <h3 style=""><?php echo $row->number; ?> <strong class="pull-right">Rs. <?php echo $row->price; ?></strong></h3>
                            <p><?php echo $row->operator.', '.$row->circle; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding:0;margin:0;">
                    <div class="fb-like col-md-4 col-sm-4 col-xs-4" data-href="https://www.achanumber.com" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
                    <div class="fb-share-button col-md-4 col-sm-4 col-xs-4" data-layout="button" data-size="small" data-mobile-iframe="false">
                        <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse">Share</a>
                    </div>
                    <a href="<?php echo base_url('checkout/'.$row->number); ?>" target="_blank" class="col-md-4 col-sm-4 col-xs-4 btn btn-danger btn-xs btn-flat">Buy Now</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="col-md-4" style="background-color: #565AB1;"><br>
    <?php foreach ($admin_numbers as $row): ?>
    <div class="alert alert-success">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-4" style="padding-right:0;margin-right:0;">
                <img src="<?php echo base_url(); ?>public/images/<?php echo $row->img; ?>" style="width:100px;height:100px;" class="img img-responsive">
            </div>
            <div class="col-md-9 col-sm-8 col-xs-8">
                <div class="row" style="padding:0;margin:0;">
                    <h3 style=""><?php echo $row->number; ?> <strong class="pull-right">Rs. <?php echo $row->price; ?></strong></h3>
                    <p><?php echo $row->operator.', '.$row->circle; ?></p>
                </div>
            </div>
        </div>
        <div class="row" style="padding:0;margin:0;">
            <div class="fb-like col-md-4 col-sm-4 col-xs-4" data-href="https://www.achanumber.com" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
            <div class="fb-share-button col-md-4 col-sm-4 col-xs-4" data-layout="button" data-size="small" data-mobile-iframe="false">
                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u&amp;src=sdkpreparse">Share</a>
            </div>
            <a href="<?php echo base_url('checkout/'.$row->number); ?>" target="_blank" class="col-md-4 col-sm-4 col-xs-4 btn btn-danger btn-xs btn-flat">Buy Now</a>
        </div>
    </div>
    <?php endforeach; ?>
</div><section id="service-info">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 col-md-12">
                    <h3 class="clr-main"><strong>follow simple steps </strong></h3>
                    <p>Achanumber provides a 3 step checkout to purchase your dream contact number ...</p>
                    <br />
                    <br />
                </div>
            </div>
            <div class="row pad-top-botm">
                <div class="col-lg-4 col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class=" fa fa-search fa-4x rotate-icon "></i>

                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Choose number</h3>
                            <p>
                                select a number from your choice
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-user-md fa-4x rotate-icon "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Account details</h3>
                            <p>
                                Just verify your personal details
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="fa fa-money fa-4x rotate-icon "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Payment</h3>
                            <p>
                                Pay online and wait for the delivery.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="vedio-sec">
        <div class="container">
            
        </div>
    </section>
      <div id="media-sec">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12" >
                    <div class="text-center">
                        <h3>Who we're!</h3>
                        <p>Acha Number is a premium marketplace of VIP and attractive mobile numbers that 
                            caters to provide a wide range of unique and fresh mobile numbers suiting your 
                            demands. In just few clicks, we bring a countless VIP and fancy mobile numbers 
                            under a single roof. Acha Number is a premium mobile numbers marketplace 
                            serving the society for several years. In ---- years of journey, we have sold ---- 
                            of Vip and attractive mobile numbers, thus satisfying your thurst of becoming 
                            the owner of unique pattern of digits. Since ----, we enjoy the brand name 
                            as most trusted VIP and Fancy numbers selling platform with high repute.</p>
                        <br />
                        <br />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <blockquote>
                        <p>Acha Number brings in an Exclusive list of VIP Numbers that would add on a brand 
                        value to your personality and make it more attractive. We have a large list of 
                        such numbers that you have always dreamt of.</p>
                        <small>VIP Numbers</small>
                    </blockquote>

                </div>
                <div class="col-lg-6 col-md-6">
                    <blockquote>
                        <p>We have a long list of verified mobile number sellers registered with us who 
                        provide the list of Fancy numbers available with them. Just go through the 
                        list and order the patterns that you feel matches your personality. </p>
                        <small>FANCY Numbers</small>
                    </blockquote>
                </div>
                <div class="col-lg-12 col-md-12" >
                    <div class="text-center">
                        <h3>Always new & Unique numbers!</h3>
                        <p>Numbers list at Acha Number keeps on updating regularly.The hands of our sellers 
                            and our team never stops. Keep visiting and enjoy endless list of VIP and fancy 
                            numbers. But dont wait, they are sold even faster. Someone else may be racing 
                            side-by-side. So, book your number as soon as you find it.</p>
                        <br />
                        <br />
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--./ Media Section End -->
   