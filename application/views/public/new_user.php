<div class="general-subhead"><h1>Account | Create</h1></div>
<section>
    <div class="container" >
        <div class="col-md-12">
            <?php echo form_open('new_user',array('id' => 'msform')); ?>
                <fieldset class="steps">
                    <?php
                        if (isset($success))  {
                            echo '<div class="notice notice-danger">
                                        <strong>Error!</strong> Something went wrong, try again later!
                                    </div>';
                        }
                        $x = validation_errors();
                        if (!empty($x)) {
                            echo '<div class="notice notice-warning">
                                        <strong>Alert!</strong> '.$x.'
                                    </div>';
                        }
                    ?>
                    <h2 class="fs-title">Personal Details</h2>
                    <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="Full Name"/>
                    <input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Contact"/>
                    <input type="password" name="pass" id="pass" placeholder="Password"/>
                    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password"/>
                    <button type="submit" name="next" class="btn next btn-primary btn-round-sm pull-right" value="Next"/>Next <i class="fa fa-angle-double-right"></i></button>
                    <a href="<?php echo base_url('login'); ?>" class="pull-left"> Back to login</a>
                </fieldset>
            </form>
        </div>
    </div>
</section>