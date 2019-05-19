<div class="general-subhead"><h1>Account | Login</h1></div>
<section>
    <div class="container" >
        <div class="col-md-12">
            <?php echo form_open('login',array('id' => 'msform')); ?>
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
                    <h2 class="fs-title">Login Here</h2>
                    <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Contact"/>
                    <input type="password" name="pass" id="pass" placeholder="Password"/>
                    <div class="row"> <a href="https://www.achanumber.com/reset_password" class="pull-right">Reset Password <i class="fa fa-chevron-right"></i></a></div>
                    <a href="https://www.achanumber.com/new_user" class="btn btn-round-sm btn-info pull-left"><i class="fa fa-chevron-left"></i> New user?</a>
                    <button type="submit" name="next" class="btn btn-round-sm btn-primary pull-right" value="Login now"/>Login <i class="fa fa-angle-double-right"></i></button>
                </fieldset>
            </form>
        </div>
    </div>
</section>