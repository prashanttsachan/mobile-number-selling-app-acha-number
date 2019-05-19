<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>New Orders</h2>
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
									<th>Number</th>
									<th>Payment Request ID</th>
									<th>Payment ID</th>
									<th>Paid Amount</th>
									<th>Date</th>
									<th>Payment Status</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody>
							<?php $i=1; foreach($orders as $row): ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row->number; ?></td>
									<td><?php echo $row->pRequestID; ?></td>
									<td><?php echo $row->pID; ?></td>
									<td><?php echo $row->amount; ?></td>
									<td><?php echo $row->orderDate; ?></td>
									<td><?php echo $row->orderStatus; ?></td>
									<td>
									    <a class="btn btn-success btn-xs" href="<?php echo base_url('order_details?pid='.$row->orderID); ?>">
											<i class="fa fa-eye"></i>
										</a>
									    <?php if ($row->orderStatus == 'Y') { ?>
										<a class="btn btn-success btn-xs" href="<?php echo base_url('new_orders?pid='.$row->orderID); ?>" onclick="return confirm('Are you sure to process it?')">
											<i class="fa fa-check"></i>
										</a>
										<?php } ?>
									</td>
								</tr>
							<?php $i++; $id = $row->orderID; endforeach; ?>
							</tbody>
							<tfoot>
							    <tr>
							        <td colspan="7">
							            <a class="btn btn-success btn-xs pull-right" href="<?php echo base_url(''.$page); ?>?q=<?php if(isset($id)) echo $id; ?>">
											Next <i class="fa fa-chevron-right"></i>
										</a>
								    </td>
							    </tr>
							</tfoot>
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