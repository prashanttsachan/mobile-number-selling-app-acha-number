<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-8">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Postpaid Number</h2>
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
                        <?php echo form_open('new_postpaid'); ?>
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Circle">City <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select required="required" class="form-control col-md-7 col-xs-12" name="circle" >
                                        <?php foreach($cities as $row): ?>
                                        <option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                        <?php endforeach; ?>
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
        </div>
    </div>
</div>