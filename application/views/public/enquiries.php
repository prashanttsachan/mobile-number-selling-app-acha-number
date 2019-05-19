<div class="general-subhead"><h1>MY CHOICE</h1></div>
<section>
    <div class="container" >
        <div class="col-md-12">
            <?php echo form_open('enquiries',array('id' => 'msform')); ?>
                <fieldset class="steps">
                    <?php
                        $reset = FALSE;
                        if (isset($success))  {
                            if ($success === TRUE) {
                                $reset = TRUE;
                                echo '<div class="notice notice-success">
                                            <strong>Success!</strong> You query has been submitted. You will get updated soon.
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
                        if (isset($address->city)){
                            $city = $address->city;
                        } else {
                            if($reset === FALSE) $city = set_value('city');
                        }
                        if (isset($address->state)){
                            $state = $address->state;
                        } else {
                            if($reset === FALSE) $state = set_value('state');
                        }
                        if (isset($address->zip)){
                            $pincode = $address->zip;
                        } else {
                            if($reset === FALSE) $pincode = set_value('pincode');
                        }
                    ?>
                    <h2 class="fs-title">My choice</h2>
                    <h3 class="fs-subtitle">Send your choice to use, We will inform you when your choice will be avail ...</h3>
                    <input type="text" name="name" id="name" value="<?php if (isset($user->userName)) echo $user->userName; else { if($reset === FALSE) echo set_value('name'); } ?>" placeholder="Name"/>
                    <input type="text" name="email" id="email" value="<?php if (isset($user->userEmail)) echo $user->userEmail; else { if($reset === FALSE) echo set_value('email'); } ?>" placeholder="Email"/>
                    <input type="text" name="contact" id="contact" value="<?php if (isset($user->userContact)) echo $user->userContact; else { if($reset === FALSE) echo set_value('contact'); } ?>" placeholder="Contact"/>
                    <input type="text" name="choice" id="choice" value="<?php if($reset === FALSE) echo set_value('choice'); ?>" placeholder="Choice"/>
                    <input type="text" name="city" id="city" value="<?php echo $city; ?>" placeholder="City"/>
                    <input type="text" name="state" id="state" value="<?php echo $state; ?>" placeholder="State"/>
                    <input type="text" name="pincode" id="pincode" value="<?php echo $pincode; ?>" placeholder="Pincode"/>
                    <a href="<?php echo base_url(); ?>" class="pull-left previous action-button"><i class="fa fa-chevron-left"></i> Back</a>
                    <button type="submit" name="send" class="btn btn-info btn-round pull-right" value="Send Now"/>Send <i class="fa fa-chevron-right"></i></button>
                </fieldset>
            </form>
        </div>
    </div>
</section>