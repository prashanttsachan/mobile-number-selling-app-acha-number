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
                        <h2>My profile <small>Account report</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                            </div>
                            <h3><?php echo $user->userFname.' '.$user->userLname; ?></h3>
                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $user->add1.' '.$user->add2.', '.$user->city.', '.$user->state.',<br>'.$user->country.', '.$user->zip; ?></li>
                                <li>
                                  <i class="fa fa-briefcase user-profile-icon"></i> <?php if($user->userType == 'A') echo 'Admin'; else echo 'Member'; ?>
                                </li>
                            </ul>
                            <a href="<?php echo base_url("member/edit_profile"); ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                            <br />
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                                  </li>
                                  <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Address Details</a>
                                  </li>
                                  <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Banking Details</a>
                                  </li>
                                  <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Nominee Details</a>
                                  </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <ul class="messages">
                                          <li>
                                            <div class="message_wrapper">
                                                <div class="table">
                                                   <table class="table table-striped">
                                                      <tr>
                                                          <th>User ID:</th>
                                                          <td><?php echo $user->loginID; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Name:</th>
                                                          <td><?php echo $user->userFname.' '.$user->userLname; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Spouse/Father Name:</th>
                                                          <td><?php echo $user->father; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Date of Birth:</th>
                                                          <td><?php echo $user->dob; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Email:</th>
                                                          <td><?php echo $user->userEmail; ?></td>
                                                      </tr>
                                                      <tr>
                                                          <th>Contact:</th>
                                                          <td><?php echo $user->userContact; ?></td>
                                                      </tr>
                                                  </table>
                                                </div>
                                            </div>
                                          </li>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                    <table class="data table table-striped no-margin">
                                      <thead>
                                        <tr>
                                          <th>Address</th>
                                          <td><?php echo $user->add1; ?></td>
                                        </tr>
                                        <tr>
                                          <th>City </th>
                                          <td><?php echo $user->city; ?></td>
                                        </tr>
                                        <tr>
                                          <th>State</th>
                                          <td><?php echo $user->state; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Country</th>
                                          <td><?php echo $user->country; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Zipcode</th>
                                          <td><?php echo $user->zip; ?></td>
                                        </tr>
                                      </thead>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                    <table class="data table table-striped no-margin">
                                      <thead>
                                            <tr>
                                              <th>Account Number</th>
                                              <td><?php echo $user->accNum; ?></td>
                                            </tr>
                                        <tr>
                                          <th>Bank</th>
                                          <td><?php echo $user->bank; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Branch </th>
                                          <td><?php echo $user->branch; ?></td>
                                        </tr>
                                        <tr>
                                          <th>IFSC Code</th>
                                          <td><?php echo $user->ifsc; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Pancard</th>
                                          <td><?php echo $user->ltype; ?></td>
                                        </tr>
                                        <tr>
                                          <th>Aadhaar Number</th>
                                          <td><?php echo $user->lnumber; ?></td>
                                        </tr>
                                      </thead>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                    <table class="data table table-striped no-margin">
                                      <thead>
                                            <tr>
                                              <th>Nominee Name</th>
                                              <td><?php echo $user->nomineeName; ?></td>
                                            </tr>
                                        <tr>
                                          <th>Age</th>
                                          <td><?php echo $user->nomineeAge; ?> Years</td>
                                        </tr>
                                        <tr>
                                          <th>Relation </th>
                                          <td><?php echo $user->nomineeRelation; ?></td>
                                        </tr>
                                      </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>