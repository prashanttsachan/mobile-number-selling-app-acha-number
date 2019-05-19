<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Welcome Letter <small> </small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <h3><center>Indepemdent Member Application / Agreement / Welcome Letter</center></h3>
                        <h5>Dear Mr. <?php echo $this->session->mlmuserfname; ?></h5>
                        <P><center><strong>Welcome to the world of Reshu Productions</strong></center></P>
                        <P>We would like first to congrats you for successful registration to become member of our team on taking up this wonderful business opprtunity. 
                        You are successfully registered as an independent member with
                        Reshu Productions.</P>
                        <p>
                            Member No.: <?php echo $user->loginID; ?><br>
                            Member Name: <?php echo $user->userFname.' '.$user->userLname; ?><br>
                            Sponsored By: <?php echo $user->spFname.' '.$user->spLname; ?><br>
                            Username: <?php echo $user->userName; ?><br>
                            Password: <?php echo $user->userPass; ?><br>
                            Joining Date: <?php echo $user->userRGDate; ?><br><br>
                            We wish for your best future and successful growth.
                            
                        </p>
                        <P><strong><center>This is system generated Welcome Letter and doesn't need any signature.</center></strong></P>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>