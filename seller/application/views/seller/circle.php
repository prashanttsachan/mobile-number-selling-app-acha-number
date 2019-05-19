<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Circles</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
								<tr>
									<th style="width:20px;">Sr. No.</th>
									<th>Circle</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody>
							<?php $i=1; foreach($circles as $row): ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row->val; ?></td>
									<td>
										<!--a class="btn btn-warning" href="<?php echo base_url('member/edit_plan?pid='); ?><?php echo base64_encode($plan->planID); ?>">
											<i class="fa fa-pencil"></i>
										</a> | 
										<a class="btn btn-danger" href="<?php echo base_url('member/'); ?>del_plan?pid=<?php echo $plan->planID; ?>" onclick="return confirm('Are you sure to delete ?')">
											<i class="fa fa-trash"></i>
										</a-->
									</td>
								</tr>
							<?php $i++; endforeach; ?>
							</tbody>
                          </table>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Circle</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<?php
							  if (isset($_GET['success'])) {
										if ($_GET['success'] == TRUE) {
											echo '<div class="alert alert-block alert-success col-sm-12">Record Updated successfully....</div>';
										}
									  else {
											echo '<div class="alert alert-block alert-danger col-sm-12">Something went wrong. Please Try again later ...</div>';
										}
									}
								?>
						<?php $x = validation_errors(); 
						if (!empty($x)) {
						  echo '<div class="alert alert-block alert-warning col-sm-5">'.validation_errors().'</div>'; 
						  }
						?>
						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                        <br />
                        <?php echo form_open('seller/circle'); ?>
    						<div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Circle Name <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="name" >
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