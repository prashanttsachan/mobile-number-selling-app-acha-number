<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Details</h2>
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
    									<td><?php echo $user->userName; ?></td>
    								</tr>
    								<tr>
    									<th>Email</th>
    									<td><?php echo $user->userEmail; ?></td>
    								</tr>
    								<tr>
    									<th>Contact</th>
    									<td><?php echo $user->userContact; ?></td>
    								</tr>
    								<tr>
    									<th>Registration</th>
    									<td><?php echo $user->userRgDate; ?></td>
    								</tr>
    								<tr>
    									<th>Address</th>
    									<td><?php echo $useradd->addr1.', '.$useradd->addr2; ?></td>
    								</tr>
    								<tr>
    									<th>City</th>
    									<td><?php echo $useradd->city; ?></td>
    								</tr>
    								<tr>
    									<th>State</th>
    									<td><?php echo $useradd->state; ?></td>
    								</tr>
    								<tr>
    									<th>Account Holder</th>
    									<td><?php echo $bank->accountName; ?></td>
    								</tr>
    								<tr>
    									<th>Account Number</th>
    									<td><?php echo $bank->accountNo; ?></td>
    								</tr>
    								<tr>
    									<th>Bank</th>
    									<td><?php echo $bank->bank; ?></td>
    								</tr>
    								<tr>
    									<th>Branch</th>
    									<td><?php echo $bank->branch; ?></td>
    								</tr>
    								<tr>
    									<th>IFSC</th>
    									<td><?php echo $bank->ifsc; ?></td>
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
        </div>
    </div>
</div>