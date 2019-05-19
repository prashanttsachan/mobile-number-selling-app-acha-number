<div class="general-subhead"><h1>Checkout</h1></div>      
<section>
    <div class="container">
        <div class="row ">
            <div class="col-lg-9 col-md-9">
                <?php echo form_open('proceed_payment',array('id' => 'msform', 'style' => 'text-align:left;')); ?>
                    <fieldset class="steps">
                        <?php
                            if (isset($success))  {
                                if ($success === TRUE)
                                    echo '<div class="notice notice-success">
                                                <strong>Success!</strong> Address has been updated succesfully.
                                            </div>';
                                else 
                                    echo '<div class="notice notice-danger">
                                                <strong>Error!</strong> Something went wrong.
                                            </div>';
                            }
                            $x = validation_errors();
                            if (!empty($x)) {
                                echo '<div class="notice notice-warning">
                                            <strong>Alert!</strong> '.$x.'
                                        </div>';
                            }
                        ?>
                        <h2 class="fs-title">Checkout details</h2>
                        <select name="address" id="address">
                            <?php foreach ($addresses as $row): ?>
                                <option value="<?php echo $row->addrID; ?>"><?php echo $row->addr1.', '.$row->addr2.', '.$row->city.', '.$row->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" name="submit" class="btn btn-round-sm btn-primary pull-right" value="Pay Now"/>Pay Now <i class="fa fa-angle-double-right"></i></button>
                    </fieldset>
                </form>
                <?php echo form_open('',array('id' => 'msform', 'style' => "text-align:left;")); ?>
                    <fieldset class="steps">
                        <div id="new-address">
                            <input type="text" name="add1" value="" placeholder="Address Line 1">
                            <input type="text" name="add2" value="" placeholder="Address Line 2">
                            <input type="text" name="country" style="width:49.5%;" value="India" readonly>
                            <select name="state" id="state" style="width:49.5%;" >
                                <?php echo count($states);  foreach ($states as $row): ?>
                                    <option value="<?php echo $row->id; ?>" id="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="text" name="pincode" value="" style="width:49.5%;" placeholder="Pincode">
                            <select name="city" id="cities" style="width:49.5%;" ></select>
                            <input type="text" name="contact" value="" style="width:49.5%;" placeholder="Mobile">
                        </div>
                        <a href="https://www.achanumber.com/login" class="pull-left btn btn-round-sm btn-info"><i class="fa fa-angle-left"></i> Login Here</a>
                        <button type="submit" name="submit" class="btn btn-round-sm btn-primary pull-right" value="Add This"/>Update Address <i class="fa fa-angle-double-right"></i></button>
                    </fieldset>
                </form>
            </div>
            <div class="col-lg-3 col-md-3">
                <div id="list-cat">
                    <a href="#" class="list-group-item active ">Order details:</a>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#"> Number </a>
                            <p class="green pull-right" style="color:#2b3c69;font-weight:bold;"><?php echo $number->number; ?></p>
                        </li>
                        <li class="list-group-item">
                            <a href="#"> Operator </a>
                            <p class="green pull-right" style="color:#2b3c69;font-weight:bold;"><?php echo $number->operator; ?></p>
                        </li>
                        <li class="list-group-item">
                            <a href="#"> Circle </a>
                            <p class="green pull-right" style="color:#2b3c69;font-weight:bold;"><?php echo $number->circle; ?></p>
                        </li>
                        <li class="list-group-item">
                            <a href="#"> Price </a>
                            <p class="green pull-right" style="color:#ff0000;font-weight:bold;">Rs. <?php echo $number->price; ?></p>
                        </li>
                    </ul>
                    <a href="#" class="list-group-item active ">Sub total: <strong class="pull-right">Rs. <?php echo $number->price; ?></strong></a>
                </div>
            </div>
        </div>
    </div>
</section>