
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<title>Login | Achanumber</title>
	<link href="<?php echo base_url(); ?>dashboard/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>dashboard/vendors/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>dashboard/build/css/custom.min.css" rel="stylesheet">
</head>
<body class="login">
    <div class="col-md-6">
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper" style="margin:5% 27% 0;">
            <div class="animate form login_form">
              <section class="login_content">
                <?php echo form_open('account/login'); ?>
    			<?php $x = validation_errors(); 
    				if (!empty($x)) {
    					echo '<div class="errors">'.$x.'</div>';
    				}
    			?>
    			<?php  
    				if (isset($status)) {
    					echo '<div class="alert alert-danger alert-dismissable" role="alert">
    									<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    									<span class="sr-only">Error:</span>';
    					if ($status == 1)
    						echo 'Invalid credentials
    								</div>';
    					else if ($status == 2)
    						echo 'Invalid password
    								</div>';
    				}
    			?>
    			  <h1>Seller login</h1>
                  <div>
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile" required="" />
                  </div>
                  <div>
                    <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
                  </div>
                  <div>
                    <button type="submit" name="submit" value="submit" class="btn btn-default submit pull-right">Log in</button>
                     <a href="<?php echo base_url(); ?>" class="btn btn-default submit pull-left"> Home</a>
                  </div>
    
                  <div class="clearfix"></div>
    
                  <div class="separator">
                    <p class="change_link">forgotten credentials?
                      <a href="#signup" class="to_register"> Reset Password </a>
                    </p>
    
                    <div class="clearfix"></div>
                    <br />
    
                    <div>
                      <h1><i class="fa fa-paw"></i>Acha Number</h1>
                      <p>つｩ2018 All Rights Reserved.</p>
                    </div>
                  </div>
                </form>
              </section>
            </div>
            <div id="register" class="animate form registration_form">
              <section class="login_content">
                <form>
                  <h1>Reset Password</h1>
                  <div>
                    <input type="text" class="form-control" placeholder="Enter mobile" required="" />
                  </div>
                  <div class="clearfix"></div>
    
                  <div class="separator">
                    <p class="change_link">Want to login ?
                      <a href="#signin" class="to_register"> Go here </a>
                    </p>
    
                    <div class="clearfix"></div>
                    <br />
    
                    <div>
                      <h1><i class="fa fa-paw"></i> Achanumber</h1>
                      <p>ﾃつｩ2018 All Rights Reserved.</p>
                    </div>
                  </div>
                </form>
              </section>
            </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="login_wrapper" style="border-left:1px solid #D8D8D8;margin:5% 27% 0;height:300px">
            
        </div>
    </div>
  </body>
</html>
