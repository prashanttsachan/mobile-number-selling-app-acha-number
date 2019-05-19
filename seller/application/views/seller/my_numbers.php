<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
			<div class="row">
			<div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Numbers</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <section class="content invoice">
						<div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2"><input type="text" name="number" class="number" placeholder="Number"></td>
                                    <td>
                                        <select name="operator" class="operator">
                                            <option value="">Choose Operator</option>
                                            <?php foreach ($attribute as $row): if ($row->name == 'operator') { ?>
                                                <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                            <?php } endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="operator" class="circle">
                                            <option value="">Choose Circle</option>
                                            <?php foreach ($attribute as $row): if ($row->name == 'circle') { ?>
                                                <option value="<?php echo $row->val; ?>"><?php echo $row->val; ?></option>
                                            <?php } endforeach; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="status" class="status">
                                            <option value=""></option>
                                            <option value="Y">Active</option>
                                            <option value="E">Expired</option>
                                            <option value="S">Sold</option>
                                            <option value="U">Offline Sold</option>
                                        </select>
                                    </td>
                                </tr>
								<tr>
									<th style="width:6%;">Sr. No.</th>
									<th>Number</th>
									<th>Operator</th>
									<th>Circle</th>
									<th>Price</th>
									<th>Seller Price</th>
									<th>Expiry/Sold Date</th>
									<th>Action</th>
								</tr>
                            </thead>
                            <tbody id="numbers">
                            <?php if (count($numbers) != 0) { ?> 
    							<?php $i=1; foreach($numbers as $row): ?>
    								<tr>
    									<td><?php echo $i; ?></td>
    									<td><?php echo $row->number; ?></td>
    									<td><?php echo $row->operator; ?></td>
    									<td><?php echo $row->circle; ?></td>
    									<td><?php echo $row->price; ?></td>
    									<td><?php echo $row->seller_price; ?></td>
    									<?php if ($page == 'sold_numbers') { ?>
    									    <td><?php echo $row->soldDate; ?></td>
    									<?php } else { ?>
    									    <td><?php echo $row->ddTime; ?></td>
    									<?php } ?>
    									
    									<td>
    									    <?php if ($row->cStatus == 'Y') { ?>
    										<!--a class="btn btn-warning" href="<?php echo base_url('member/edit_plan?pid='); ?><?php echo base64_encode($plan->planID); ?>">
    											<i class="fa fa-pencil"></i>
    										</a -->
    										<a class="btn btn-success btn-xs" alt="Mark sold" title="Mark sold" href="<?php echo base_url(''); ?>active_numbers?pid=<?php echo $row->id; ?>" onclick="return confirm('Are you sure to mark it as Sold?')">
    											<i class="fa fa-check"></i>
    										</a>
    										<?php } ?>
    									</td>
    								</tr>
    							<?php $i++; $id = $row->id; endforeach; ?>
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