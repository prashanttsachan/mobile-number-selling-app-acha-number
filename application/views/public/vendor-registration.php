<div class="general-subhead"><h1>New vendor registration</h1></div>
<section>
    <div class="container" >
        <div class="col-md-12">
            <?php echo form_open('vendor-registration',array('id' => 'msform','style' => 'text-align:left;', 'autocomplete' => 'off')); ?>
                <fieldset class="steps">
                    <?php
                        $reset = FALSE;
                        if (isset($success))  {
                            if ($success === TRUE) {
                                $reset = TRUE;
                                echo '<div class="notice notice-success">
                                            <strong>Success!</strong> You request has been submitted. Please wait for the verification process to be completed.
                                        </div>
                                        <div class="notice notice-success">
                                            <strong>Important notice!</strong> In the mean while please send your business document to us, so that we can easily verify your business account. 
                                            Please check your mobile and <a href="https://seller.achanumber.com/account/accver?m='.$this->input->post('contact').'">click here</a> to verify your account.
                                        </div>';
                            }
                            if ($success === FALSE)
                                echo '<div class="notice notice-danger">
                                            <strong>Error!</strong> Oops! Something went wrong.
                                        </div>';
                        }
                        $x = validation_errors();
                        if (!empty($x)) {
                            echo '<div class="notice notice-warning">
                                        <strong>Alert!</strong> '.$x.'
                                    </div>';
                        }
                    ?>
                    <h2 class="fs-title">Vendor Registraion</h2>
                    <h3 class="fs-subtitle">Please fill the details given</h3>
                    <input type="text" name="name" id="name" value="<?php if($reset === FALSE) echo set_value('name'); ?>" placeholder="Business Name" style="width:49.6%;"/>
                    <input type="text" name="email" id="email" value="<?php if($reset === FALSE) echo set_value('email'); ?>" placeholder="Email" style="width:49.6%;"/>
                    <input type="text" name="contact" id="contact" value="<?php if($reset === FALSE) echo set_value('contact'); ?>" placeholder="Contact" style="width:49.6%;"/>
                    <input type="text" name="pass" id="pass" placeholder="Password" style="width:49.6%;"/>
                    <h2 class="fs-title">Address Details</h2>
                    <input type="text" name="addr1" id="address-1" value="<?php if($reset === FALSE) echo set_value('addr1'); ?>" placeholder="Address Line 1" style="width:49.6%;"/>
                    <input type="text" name="addr2" id="address-2" value="<?php if($reset === FALSE) echo set_value('addr2'); ?>" placeholder="Address Line 2" style="width:49.6%;"/>
                    <input type="text" name="country" id="country" value="India" style="width:49.6%;" readonly/>
                    <select id="state" name="state" style="width:49.6%;">
                        <?php foreach ($states as $row): ?>
                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="pincode" id="pincode" value="<?php if($reset === FALSE) echo set_value('pincode'); ?>" placeholder="Pincode" style="width:49.6%;"/>
                    <select id="cities" name="city" style="width:49.6%;"></select>
                    <h2 class="fs-title">Bank Details</h2>
                    <input type="text" name="accName" id="accName" value="<?php if($reset === FALSE) echo set_value('accName'); ?>" placeholder="Account Holder" style="width:49.6%;"/>
                    <input type="text" name="accNo" id="accNo" value="<?php if($reset === FALSE) echo set_value('accNo'); ?>" placeholder="Account No" style="width:49.6%;"/>
                    <input type="text" name="bank" id="bank" value="<?php if($reset === FALSE) echo set_value('bank'); ?>" placeholder="Bank" style="width:49.6%;"/>
                    <input type="text" name="branch" id="branch" value="<?php if($reset === FALSE) echo set_value('branch'); ?>" placeholder="Branch Name" style="width:49.6%;"/>
                    <input type="text" name="ifsc" id="ifsc" value="<?php if($reset === FALSE) echo set_value('ifsc'); ?>" placeholder="IFS Code"/>
                    <a href="<?php echo base_url(); ?>" class="pull-left previous action-button"><i class="fa fa-chevron-left"></i> Back</a>
                    <button type="submit" name="send" class="btn btn-info btn-round pull-right" value="Send Now"/>Submit <i class="fa fa-chevron-right"></i></button>
                </fieldset>
            </form>
        </div>
    </div>
</section>