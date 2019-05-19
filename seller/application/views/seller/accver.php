<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>Login | Achanumber</title>
	<link href="<?php echo base_url(); ?>dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>dashboard/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <?php if ($this->input->get('m')) $m = $this->input->get('m'); else $m = ''; ?>
                    <?php echo form_open('account/accver?m='.$m); ?>
        			 <?php
                            if (isset($success))  {
                                if ($success == TRUE){
                                    echo '<div class="alert alert-success">
                                                    <strong>Success!</strong> Your account has been verified. <a href="'.base_url('account/login').'">Click here</a> to login.
                                                </div>';
                                } else {
                                    echo '<div class="alert alert-danger">
                                            <strong>Error!</strong> Invalid credentials!
                                        </div>';
                                }
                            }
                            $x = validation_errors();
                            if (!empty($x)) {
                                echo '<div class="alert alert-warning">
                                            <strong>Alert!</strong> '.$x.'
                                        </div>';
                            }
                        ?>
        			  <h1>Account Verification</h1>
                      <div>
                          <input type="<?php if ($this->input->get('m')) echo 'hidden'; else echo 'text'; ?>" name="mobile" class="form-control" class="mobile" value="<?php echo $m; ?>" placeholder="Mobile"/>
                      </div>
                      <div>
                            <input type="text" name="otp" class="form-control otp" class="" placeholder="One Time Password"/>
                      </div>
                      <div>
                        <button type="submit" name="submit" value="submit" class="btn btn-default submit pull-left">Verify</button>
                         <a href="<?php echo base_url(); ?>" class="btn btn-default submit pull-right"> Home</a>
                      </div>
        
                      <div class="clearfix"></div>
        
                      <div class="separator">
                        <p class="change_link">New to site?
                          <a href="#signup" class="to_register"> Create Account </a>
                        </p>
        
                        <div class="clearfix"></div>
                        <br />
        
                        <div>
                          <h1><i class="fa fa-paw"></i>AchaNumber</h1>
                          <p>つｩ2017 All Rights Reserved.</p>
                        </div>
                      </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
