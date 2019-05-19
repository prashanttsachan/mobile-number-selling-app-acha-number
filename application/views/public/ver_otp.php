<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php if ($this->input->get('m')) $m = $this->input->get('m'); else $m = ''; ?>
        <?php echo form_open('ver_otp?m='.$m,array('id' => 'msform')); ?>
            <fieldset class="steps">
                <?php
                    if (isset($success))  {
                        if ($success == TRUE){
                            if($this->input->get('q') == 'vfs') {
                                echo '<div class="notice notice-success">
                                            <strong>Success!</strong> Your account has been verified. <a href="'.base_url('seller/login').'">Click here</a> to login.
                                        </div>';
                            } else {
                                echo '<div class="notice notice-success">
                                            <strong>Success!</strong> Your account has been verified. <a href="'.base_url('login').'">Click here</a> to login.
                                        </div>';
                            }
                        } else {
                            echo '<div class="notice notice-danger">
                                    <strong>Error!</strong> Invalid credentials!
                                </div>';
                        }
                    }
                    $x = validation_errors();
                    if (!empty($x)) {
                        echo '<div class="notice notice-warning">
                                    <strong>Alert!</strong> '.$x.'
                                </div>';
                    }
                ?>
                <h2 class="fs-title">Verification</h2><h3 class="fs-subtitle">Pleas enter your OTP to verify your mobile!</h3>
                    <input type="<?php if ($this->input->get('m')) echo 'hidden'; else echo 'text'; ?>" name="mobile" class="mobile" value="<?php echo $m; ?>" placeholder="Mobile"/>
                    <input type="text" name="otp" class="otp" placeholder="One Time Password"/>
                <button type="submit" class="verify-now action-button pull-right" value="Verify"/>Verify <i class="fa fa-chevron-right"></i> </button>
                <a href="https://www.achanumber.com/new_user" class="pull-left previous action-button"><i class="fa fa-chevron-left"></i> Back</a>
            </fieldset>
        </form>
    </div>
</div>
<!-- /.MultiStep Form -->