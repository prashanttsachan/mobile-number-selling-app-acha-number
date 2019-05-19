<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Charges</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<?php
							  if (isset($success)) {
							        if ($success === TRUE) {
											echo '<div class="alert alert-block alert-success">Record updated.</div>';
								    }
									else {
											echo '<div class="alert alert-block alert-danger">Something went wrong.</div>';
										}
									}
								?>
						<?php $x = validation_errors(); 
						if (!empty($x)) {
						  echo '<div class="alert alert-block alert-warning">'.validation_errors().'</div>'; 
						  }
						?>
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <?php echo form_open('seller/charges'); ?>
                            <?php foreach($charges as $row): if ($row->type != 'Courier') {?>
        						<div class="form-group">
        						    <input type="hidden" name="row[]" value="<?php echo $row->id; ?>">
                                    <label class="control-label col-md-6 col-sm-12 col-xs-12" for="Number"><?php echo $row->type; ?>:</label>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->charge; ?>%" readonly>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="val[]" value="<?php echo $row->charge; ?>" placeholder="Update <?php echo $row->type; ?>">
                                    </div>
                                </div>
                        <?php } endforeach; ?>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('seller'); ?>" class="btn btn-primary pull-right">Cancel</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="update" value="submit" class="btn btn-success"><i class="fa fa-edit"></i> Update </button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Courier Charges</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <?php echo form_open('seller/new_charges'); ?>
    						<div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="amount">Amount <span class="required">*</span></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 price" name="amount" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="charge">Charge <span class="required">*</span></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 price" name="charge" >
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i> Upload </button>
                                    <a href="<?php echo base_url('seller'); ?>" class="btn btn-primary pull-right">Cancel</a>
                                </div>
                            </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Courier</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <?php echo form_open('seller/charges'); ?>
                            <?php foreach($charges as $row): if ($row->type == 'Courier') {?>
        						<div class="form-group">
        						    <input type="hidden" name="row[]" value="<?php echo $row->id; ?>">
        						    <label class="control-label col-md-3 col-sm-3 col-xs-3" style="text-align:left;">Amount</label>
        						    <label class="control-label col-md-3 col-sm-3 col-xs-3" style="text-align:left;">Charge</label>
        						    <label class="control-label col-md-3 col-sm-3 col-xs-3" style="text-align:left;">Update Charge</label>
        						    <label class="control-label col-md-3 col-sm-3 col-xs-3" style="text-align:left;">Action</label>
        						    
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->amount; ?> INR" readonly>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row->charge; ?> INR" readonly>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="val[]" value="<?php echo $row->charge; ?>" placeholder="Update <?php echo $row->type; ?>">
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <a href="<?php echo base_url('seller/charges?q='.$row->id); ?>" onclick="return confirm('Are your sure to delete it?')"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                        <?php } endforeach; ?>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <a href="<?php echo base_url('seller'); ?>" class="btn btn-primary pull-right">Cancel</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="update" value="submit" class="btn btn-success"><i class="fa fa-edit"></i> Update </button>
                                </div>
                            </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>