<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Order Details</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div class="row">
                            <div class="col-xs-6 table">
                              <table class="table table-striped">
                                <tbody>
                                    <tr><th colspan="2"><center>Order Details</center></th></tr>
    								<tr>
    									<th>Number</th>
    									<td><?php echo $order->number; ?></td>
    								</tr>
    								<tr>
    									<th>Amount</th>
    									<td>Rs. <?php echo $order->amount; ?></td>
    								</tr>
    								<tr>
    									<th>Order Date</th>
    									<td><?php echo $order->orderDate; ?></td>
    								</tr>
    								<tr>
    									<th>Payment Request No.</th>
    									<td><?php echo $order->pRequestID; ?></td>
    								</tr>
    								<tr>
    									<th>Transaction No.</th>
    									<td><?php echo $order->pID; ?></td>
    								</tr>
    								<tr>
    									<th>Transaction Status</th>
    									<td><?php echo $order->orderStatus; ?></td>
    								</tr>
    								<tr>
    									<th>Order Status</th>
    									<td><?php echo $order->innerStatus; ?></td>
    								</tr>
    								
    								<tr rowspan="2"><th colspan="2"><center>Seller Details</center></th></tr>
    								<tr>
    									<th>Name</th>
    									<td><?php echo $seller->userName; ?></td>
    								</tr>
    								<tr>
    									<th>Mobile</th>
    									<td><?php echo $seller->userContact; ?></td>
    								</tr>
    							</tbody>
    							<tfoot>
    							    <!--tr>
    							        <td colspan="7">
    							            <a class="btn btn-success btn-xs" href="<?php echo base_url('seller/new_orders?pid='.$row->orderID); ?>" onclick="return confirm('Are you sure to process it?')">
    											<i class="fa fa-check"></i>
    										</a>
    								    </td>
    							    </tr -->
    							</tfoot>
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
                    <h2>Customer Details</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div class="row">
                            <div class="col-xs-6 table">
                              <table class="table table-striped">
                                <tbody>
    								<tr>
    									<th>Name</th>
    									<td><?php echo $buyer->userName; ?></td>
    								</tr>
    								<tr>
    									<th>Mobile</th>
    									<td><?php echo $buyer->userContact; ?></td>
    								</tr>
    								<tr>
    									<th>Address</th>
    									<td><?php echo $buyerAddress->addr1.', '.$buyerAddress->addr2; ?></td>
    								</tr>
    								<tr>
    									<th>City</th>
    									<td><?php echo $buyerAddress->city; ?></td>
    								</tr>
    								<tr>
    									<th>State</th>
    									<td><?php echo $buyerAddress->name; ?></td>
    								</tr>
    								<tr>
    									<th>Country</th>
    									<td><?php echo $buyerAddress->country; ?></td>
    								</tr>
    								<tr>
    									<th>Pincode</th>
    									<td><?php echo $buyerAddress->zip; ?></td>
    								</tr>
    								<tr>
    									<th>Contact Number</th>
    									<td><?php echo $buyerAddress->mobile; ?></td>
    								</tr>
    							</tbody>
    							<tfoot>
    							    <tr>
    							        <td colspan="7">
    							            <?php if($this->session->achausertype == 'S') { ?>
    							                <?php if($order->innerStatus == 'Hold' && $order->orderStatus == 'Credit') { ?>
        							            <a class="btn btn-info btn-round btn-xs" title="Process" alt="Process" href="<?php echo base_url('seller/order_details?pid='.$order->orderID); ?>" onclick="return confirm('Are you sure to process it?')">
        											<i class="fa fa-check"></i>
        										</a>
        										<?php } else if($order->innerStatus == 'Processed' && $order->orderStatus == 'Credit') { ?>
        										<a class="btn btn-success btn-round btn-xs" title="Delivered" alt="Delivered" href="<?php echo base_url('seller/order_details?pid='.$order->orderID); ?>" onclick="return confirm('Are you sure to process it?')">
        											<i class="fa fa-check"></i>
        										</a>
        										<?php } ?>
    										<?php } ?>
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