<div class="general-subhead"><h1>Postpaid Numbers</h1></div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:white;color:black;">
    
</div>
<section>
    <div class="container" style="margin:0;padding:0;width:100%;">
        <div class="col-md-12"><br>
            <div class="row">
                <?php $i = 1; foreach ($numbers as $row): $i++; ?>
                    <?php if ($this->session->achateam != 0) { ?>
                        <div class="col-md-4">
                            <div class="alert alert-info transparent-bk ">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-4" style="padding-right:0;margin-right:0;">
                                        <img src="<?php echo base_url(); ?>public/images/<?php echo $row->img; ?>" style="width:100px;height:100px;" class="img img-responsive">
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-8">
                                        <div class="row" style="padding:0;margin:0;">
                                            <h3 style=""><?php echo $row->number; ?> 
                                                <strong class="pull-right">
                                                    Rs. <?php echo $row->price; ?><br>
                                                    <?php echo form_open('postpaid/page-'.$pageno); ?>
                                                        <input type="hidden" name="mobile" value="<?php echo $row->number; ?>">
                                                        <input type="hidden" name="sr" value="<?php echo $row->id; ?>">
                                                        <button type="submit" class="btn btn-danger btn-xs btn-flat">Sold</button>
                                                    </form>
                                                </strong>
                                            </h3>
                                            <p><?php echo $row->operator.', '.$row->circle; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-4">
                            <div class="alert alert-info transparent-bk ">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-4" style="padding-right:0;margin-right:0;">
                                        <img src="<?php echo base_url(); ?>public/images/<?php echo $row->img; ?>" style="width:100px;height:100px;" class="img img-responsive">
                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-8">
                                        <div class="row" style="padding:0;margin:0;">
                                            <h3 style=""><?php echo $row->number; ?> 
                                                <strong class="pull-right">
                                                    Rs. <?php echo $row->price; ?>
                                                </strong>
                                            </h3>
                                            <p><?php echo $row->operator.', '.$row->circle; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php $count = 1; endforeach; ?>
            </div>
        </div>
        <?php if ($i>29) { ?>
        <div class="col-md-12">
            <center><a class="btn btn-success" style="width:30%;" href="<?php echo base_url('postpaid/page-'.($pageno+1)); ?>">Next <i class="fa fa-angle-double-right"></i></a></center>
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