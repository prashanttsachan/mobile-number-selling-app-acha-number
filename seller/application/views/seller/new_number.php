<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Number</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<?php
							  if (isset($success) || $this->input->get('uploaded')) {
							        if ($success == 2) {
											echo '<div class="alert alert-block alert-warning">Number already exists in record.</div>';
								    }
									else if ($success == 1 || $this->input->get('uploaded') == 's') {
											echo '<div class="alert alert-block alert-success">Number added to records.</div>';
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
                        <?php echo form_open('new_number'); ?>
    						<div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Number">Number <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="number" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Operator">Operator <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="operator" >
                                        <?php foreach($operators as $row): ?>
                                        <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Circle">Circle <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="circle" >
                                        <?php foreach($circles as $row): ?>
                                        <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Type">Type <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="type" >
                                        <option value="Prepaid">Prepaid</option>
                                        <option value="Postpaid">Postpaid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="VIP">VIP <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="vip" >
                                        <option value="N">NO</option>
                                        <option value="Y">YES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Price <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="price" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expdate">Expiry Date <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" id="datepicker" class="form-control col-md-7 col-xs-12" name="expdate" >
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?php echo base_url('seller'); ?>" class="btn btn-primary">Cancel</a>
                                    <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i>Add </button>
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
                    <h2>Price Calculator</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <form>
    						<div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="price">Price <span class="required">*</span></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 price" name="number" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="button" name="submit" value="submit" class="btn btn-success calc"><i class="fa fa-plus"></i> Calculate </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="admin_charge">Admin Charge (<?php echo $charges[0]->charge; ?>%) <span class="required">*</span></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 admin_charge" name="admin_charge" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="tax">Tax (<?php echo $charges[1]->charge; ?>%)</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 tax" name="tax" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="comision">Comision (<?php echo $charges[2]->charge; ?>%)</label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 comision" name="comision" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12 col-sm-12 col-xs-12" style="text-align:left;" for="final_price">Final Price <span class="required">*</span></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12 final_price" name="final_price" readonly>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bulk Upload</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <?php echo form_open_multipart('seller/bulk_upload'); ?>
    						<div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="VIP">VIP <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="vip" >
                                        <option value="N">NO</option>
                                        <option value="Y">YES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="text-align:left;" for="comision">Excel File</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" required="required" class="form-control col-md-7 col-xs-12 comision" name="numbers" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="<?php echo base_url('seller'); ?>" class="btn btn-primary">Cancel</a>
                                    <button type="submit" name="submit" value="submit" class="btn btn-success"><i class="fa fa-plus"></i>Add </button>
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