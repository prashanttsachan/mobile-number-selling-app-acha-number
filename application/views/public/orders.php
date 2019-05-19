<div class="general-subhead"><h1>Account | Login</h1></div>
<section>
    <div class="container" >
        <div class="row">
            <div id="msform" style="text-align:left;">
                <?php foreach ($orders as $row): ?>
                    <div class="alert alert-info transparent-bk col-md-6">
                        <div class="col-md-3 col-sm-4 col-xs-4">
                            <img src="<?php echo base_url(); ?>public/images/<?php echo $row->img; ?>" style="width:100px;height:100px;" class="img img-responsive">
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-8">
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8"><h3><?php echo $row->number; ?></h3></div>
                                <div class="col-md-4 col-sm-4 col-xs-4"><h4>Price: <?php echo $row->amount; ?></h4></div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <h5><?php echo $row->operator; ?>, <?php echo $row->circle; ?></h5>
                                    <h4>Date: <?php echo substr($row->orderDate,0,10); ?></h4>
                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <h5>Status: 
                                        <?php 
                                            if($row->innerStatus =='Cancelled') 
                                                echo '<b style="color:red;">'.$row->innerStatus; 
                                            else if($row->innerStatus =='Delivered') 
                                                echo '<b style="color:green;">'.$row->innerStatus; 
                                            else echo '<b class="blue">'.$row->innerStatus; 
                                        ?></b>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>