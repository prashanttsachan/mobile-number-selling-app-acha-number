<div class="general-subhead"><h1>Numbers</h1></div>
<div class="col-lg-12 col-md-12" style="padding:15px;background-image: url('<?php echo base_url('public/images/home.jpg'); ?>');">
    <div class="col-lg-10 col-md-10 col-md-offset-1 col-lg-offset-1" style="background-color:rgba(219,219,219,0.8); padding: 20px;">
            <div class="bannerwrapper" class="col-lg-12 col-md-12 ">
                <div class="bannersearch">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2">
                            <form action="<?php echo base_url('search'); ?>" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" name="number" maxlength="7" class="form-control" autocomplete="off" placeholder="Your pattern" />
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <select name="operator" class="form-control" >
                                            <option value="">Select Operator</option>
                                            <?php foreach($attribute as $row): if ($row->name == 'operator') { ?>
                                                <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                            <?php } endforeach; ?>
                                        </select>
                                    </div>
                                </div><hr>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <select name="circle" class="form-control">
                                            <option value="">Select Circle</option>
                                            <?php foreach($attribute as $row): if ($row->name == 'circle') { ?>
                                                <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                            <?php } endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1 col-md-1"></div>
                                    <div class="col-lg-10 col-md-10" style="margin-top:15px;">
                                        <button type="submit" style="width:100%;" class="btn btn-primary"><i class="fa fa-search" ></i> Search</button>                            
                                    </div>
                                    <div class="col-lg-1 col-md-1"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:white;color:black;">
    
</div>
<section>
    <div class="container" style="margin:0;padding:0;width:100%;">
        <?php if ($pageno == 1) { ?>
            <div class="col-md-8"><br>
                <div class="row">
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
                    <?php $count = 1; endforeach; ?>
                </div>
            </div>
            <div class="col-md-4" style="background-color: #565AB1;">
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
                <?php $count = 1; endforeach; ?>
            </div>
            <div class="col-md-12">
                <center><a class="btn btn-success" style="width:30%;" href="<?php echo base_url('numbers/page-'.($pageno+1)); ?>">Next <i class="fa fa-angle-double-right"></i></a></center>
            </div>
        <?php } else { ?>
            <div class="col-md-12"><br>
                <div class="row">
                    <?php foreach ($numbers as $row): ?>
                    <div class="col-md-4">
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
                    <?php $count = 1; endforeach; ?>
                </div>
            </div>
            <div class="col-md-12">
                <center><a class="btn btn-success" style="width:30%;" href="<?php echo base_url('numbers/page-'.($pageno+1)); ?>">Next <i class="fa fa-angle-double-right"></i></a></center>
            </div>
        <?php } ?>
        <?php if (!isset($count)) { ?>
            <section >
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-3 col-md-3"  >
                            <img src="<?php echo base_url(); ?>public/images/cross.png" class="img img-responsive">
                        </div>
                        <div class="col-lg-9 col-md-9"  >
                                     <h2><strong>No records were find in this critaria.</strong> </h2>
                            <h3>Please Read Information Below</h3>
                            <p>
                                You can browse number by entering any choice pattern. You can select your city and operators as you like. Achanumber update listing here on daily basis.
                            </p>
                        </div>
                    </div>
                </div> 
            </section>
        <?php } ?>
    </div>
</section>