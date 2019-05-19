<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Users</h2>
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
									<th>User name</th>
									<th>E-mail</th>
									<th>Contact</th>
									<th>Registration date</th>
									<th>User Type</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody>
                            <?php if (count($users) != 0) { ?> 
    							<?php $i=1; foreach($users as $row): ?>
    								<tr>
    									<td><?php echo $i; ?></td>
    									<td><?php echo $row->userName; ?></td>
    									<td><?php echo $row->userEmail; ?></td>
    									<td><?php echo $row->userContact; ?></td>
    									<td><?php echo $row->userRgDate; ?></td>
    									<td><?php 
    									            if($row->userType == 'S') echo '<label class="label label-success">Seller</label>'; 
    									            else if($row->userType == 'C') echo '<label class="label label-primary">Customer</label>'; 
    									    ?>
    									</td>
    									<td>
    									    <?php 
    									        if($row->userStatus == 'Y') echo '<label class="label label-success">Verified</label>'; 
    									        else if($row->userStatus == 'N') echo '<label class="label label-danger">Non-verified</label>';  ?></td>
    									<td>
    									    <?php if ($row->userType == 'S' ){ ?>
    									        <a class="blue" onclick="window.open('user_details?pid=<?php echo $row->userID; ?>', 'newwindow', 'width=800,height=450'); return false;"><i class="fa fa-eye"></i></a>
    									   <?php } ?> 
    									    <?php if ($row->userType == 'S' && $row->sellerStatus == 'N'){ ?>
    									        | <a class="green" title="Verify Now" href="ad_nsellers?pid=<?php echo $row->userID; ?>"><i class="fa fa-check"></i></a>
    									   <?php } ?>
    									</td>
    								</tr>
    							<?php $i++; $id = $row->userID; endforeach; ?>
    							</tbody>
    							<tfoot>
    							    <tr>
    							        <td colspan="7"></td>
    							        <td>
    							            <a class="btn btn-success btn-xs" href="<?php echo base_url($page); ?>?q=<?php echo $id; ?>">
    											Next page <i class="fa fa-chevron-right"></i>
    										</a>
    								    </td>
    							    </tr>
    							</tfoot>
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