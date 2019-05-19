<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php if ($page == 'reset_code' ) { ?>
            <?php echo form_open('reset_password',array('id' => 'msform')); ?>
                <fieldset class="steps">
                    <?php
                        if (isset($success))  {
                            echo '<div class="notice notice-danger">
                                        <strong>Error!</strong> '.$success.'
                                    </div>';
                        }
                        $x = validation_errors();
                        if (!empty($x)) {
                            echo '<div class="notice notice-warning">
                                        <strong>Alert!</strong> '.$x.'
                                    </div>';
                        }
                    ?>
                    <h2 class="fs-title">Password</h2>
                    <h3 class="fs-subtitle">You can reset your password using your mobile number.</h3>
                    <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Contact"/>
                    <a href="https://www.achanumber.com/login" class="pull-left btn btn-round-sm btn-info"><i class="fa fa-angle-left"></i> Login Here</a>
                    <button type="submit" name="next" class="btn btn-round-sm btn-primary pull-right" value="Login now"/>Get Reset code <i class="fa fa-angle-double-right"></i></button>
                </fieldset>
            </form>
        <?php } ?>
        <?php if ($page == 'enter_code' ) { ?>
            <?php echo form_open('reset_code',array('id' => 'msform')); ?>
                <fieldset class="steps">
                    <?php
                        if (isset($success))  {
                            if ($success === TRUE)
                                echo '<div class="notice notice-success">
                                            <strong>Success!</strong> Password has been changed successfully.
                                        </div>';
                        }
                        $x = validation_errors();
                        if (!empty($x)) {
                            echo '<div class="notice notice-warning">
                                        <strong>Alert!</strong> '.$x.'
                                    </div>';
                        }
                    ?>
                    <h2 class="fs-title">Password</h2>
                    <h3 class="fs-subtitle">You can reset your password using your mobile number.</h3>
                    <input type="text" name="code" placeholder="OTP"/>
                    <input type="password" name="pass" value="" placeholder="Password"/>
                    <input type="password" name="cpass" value="" placeholder="Confirm Password"/>
                    <a href="https://www.achanumber.com/login" class="pull-left btn btn-round-sm btn-info"><i class="fa fa-angle-left"></i> Login Here</a>
                    <button type="submit" name="next" class="btn btn-round-sm btn-primary pull-right" value="Reset Now"/>Reset now <i class="fa fa-angle-double-right"></i></button>
                </fieldset>
            </form>
        <?php } ?>
    </div>
</div>