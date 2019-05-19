<!--./ Social Div End -->
    <div class="general-subhead">
        <h1>CONTACT US</h1>
    </div>
    <!--./ Gereral Subhead End -->
    <section>
        <div class="container">
            <div class="row">
                <?php
                    if (isset($success))  {
                        if ($success === TRUE)
                        echo '<div class="alert alert-success">
                                    <strong>Success!</strong> Your query has been submitted to us. We  will contact you soon.
                                </div>';
                        else 
                        echo '<div class="alert alert-danger">
                                    <strong>Error!</strong> Soething went wrong.
                                </div>';
                    }
                    $x = validation_errors();
                    if (!empty($x)) {
                        echo '<div class="alert alert-warning">
                                    <strong>Alert!</strong> '.$x.'
                                </div>';
                    }
                ?>
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <h3>Reach Us Here</h3>
                    <hr />
                    <p>
                        Mail: info@achanumber.com
                            <br />
                        Selller: seller@achanumber.com
                            <br />
                    </p>
                    <h3>Social Presence</h3>
                    <a href="htts://www.facebook.com/achanumber"><i class="fa fa-facebook-square fa-3x color-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter-square fa-3x color-twitter"></i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-3x color-google-plus"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square fa-3x color-linkedin"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square fa-3x color-pinterest"></i></a>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <h3>Need Help ? Write Us. </h3>
                    <hr />
                    <?php echo form_open('contact'); ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" required="required" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" required="required" placeholder="Email address" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                    <textarea name="message" id="message" name="message" required="required" class="form-control" rows="4" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>