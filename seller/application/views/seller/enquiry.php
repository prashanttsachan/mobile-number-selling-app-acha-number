<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Enquiries</h2>
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
									<th>Email</th>
									<th>Contact</th>
									<th>Pattern</th>
									<th>City</th>
									<th>State</th>
									<th>Pincode</th>
									<th>Date</th>
								</tr>
                            </thead>
                            <tbody>
                            <?php if (count($enquiry) != 0) { ?> 
    							<?php $i=1; foreach($enquiry as $row): ?>
    								<tr>
    									<td><?php echo $i; ?></td>
    									<td><?php echo $row->Name; ?></td>
    									<td><?php echo $row->Email; ?></td>
    									<td><?php echo $row->Contact; ?></td>
    									<td><?php echo $row->Choice; ?></td>
    									<td><?php echo $row->City; ?></td>
    									<td><?php echo $row->State; ?></td>
    									<td><?php echo $row->Pin; ?></td>
    									<td><?php echo $row->UplDate; ?></td>
    								</tr>
    							<?php $i++; $id = $row->nID; endforeach; ?>
    							</tbody>
    							<tfoot>
    							    <tr>
    							        <td colspan="7"></td>
    							        <td>
    							            <a class="btn btn-success btn-xs" href="<?php echo base_url('seller/'.$page); ?>?q=<?php echo $id; ?>">
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