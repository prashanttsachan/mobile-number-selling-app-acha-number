<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
    			<div class="col-md-6">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Team member</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <section class="content invoice">
    						<div class="row">
                            <div class="col-xs-12 table">
                              <table class="table table-striped">
                                <thead>
    								<tr>
    									<th style="width:6%;">Sr. No.</th>
    									<th>Name</th>
    									<th>Contact</th>
    									<th>Action</th>
    								</tr>
                                </thead>
                                <tbody>
                                <?php if (count($team) != 0) { ?> 
        							<?php $i=1; foreach($team as $row): ?>
        								<tr>
        									<td><?php echo $i; ?></td>
        									<td><?php echo $row->userName; ?></td>
        									<td><?php echo $row->userContact; ?></td>
        	                                <td>
        									    <?php echo form_open('team_member'); ?>
        									    <input type="hidden" name="remove" value="<?php echo $row->userContact; ?>">
        									        <button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
        									    </form>
        									</td>
        								</tr>
        							<?php $i++; endforeach; ?>
        							</tbody>
        						<?php } else {?>
        						    <tr>
        						        <td colspan="4"><b>No records found.</b></td>
        						    </tr></tbody>
        						   <?php } ?>
        						  
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
                        <h2>New member</h2>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <section class="content invoice">
    						<div data-parsley-validate id="demo-form2" class="x_content form-horizontal form-label-left">
                                <br />
                                <form>
            						<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Number">Mobile <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="contact" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Number"></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button type="submit" class="btn btn-success">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 table">
                                  <table class="table table-striped">
                                    <thead>
        								<tr>
        									<th>Name</th>
        									<th>Contact</th>
        									<th>Action</th>
        								</tr>
                                    </thead>
                                    <tbody>
                                    <?php if (isset($contact)) { ?> 
            							<tr>
        									<td><?php echo $contact->userName; ?></td>
        									<td><?php echo $contact->userContact; ?></td>
        									<td>
        									    <?php echo form_open('team_member'); ?>
        									    <input type="hidden" name="contact" value="<?php echo $contact->userContact; ?>">
        									        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i></button>
        									    </form>
        									</td>
        								</tr>
            							</tbody>
            						<?php } else {?>
            						    <tr>
            						        <td colspan="4"><b>No records found.</b></td>
            						    </tr></tbody>
            						   <?php } ?>
            						  
                                  </table>
                                </div>
                              </div>
                        </section>
                      </div>
                    </div>
                </div>
        </div>
    </div>
</div>