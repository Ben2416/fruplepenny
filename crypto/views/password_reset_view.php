 <?php
// show potential errors / feedback (from registration object)
if (isset($password_reset)) {
    if ($password_reset->errors) {
        foreach ($password_reset->errors as $error) {
            echo $error;
        }
    }
    if ($password_reset->messages) {
        foreach ($password_reset->messages as $message) {
            echo $message;
        }
    }
}
?>
<body>
    <!-- header-section-->
    <div class="header-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-sm-3 col-xs-12">
                <div class="logo">
                    <!--   -->
                    <a href="../index.html"><img src="../images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                <!-- navigations-->
                <div class="navigation">
                    <div id="navigation">
                        <ul>
                            <li class=" "><a href="../index.html">Home</a></li>
                            <li class=" "><a href="../pricing/index.html">Pricing</a></li>
                            <li class=" "><a href="../our-offerings/index.html">Our Offerings</a></li>
                            <li class="has-sub"><a href="#">Start Here</a>
                                <ul>
                                    <li><a href="../login/index.html">Login</a></li>
                                    <li><a href="../register/index.html">Register</a></li>
                                </ul>
                            </li>
                            <li class=" "><a href="../contact-us/index.html">Get In-touch</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.navigations-->
            </div>
        </div>
    </div>
</div>    <!-- /. header-section-->

    <!-- login form -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- section-title-1 -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3>Request Password Reset</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-2 col-md-offset-3 col-lg-offset-4 col-md-6 col-lg-4 col-sm-8 col-xs-12">
                                <form action="#" method="post" id="resetForm">
                    <div class="form-group">
                        <label class="control-label sr-only">Email</label>
                        <input type="text" name="forgot_email" class="form-control" placeholder="Email" required="" data-validation="email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block mb20" name="forgot_password">Enter</button>
                    </div>
                </form>
                <p class="text-center">Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>



    <!-- cta-wrapper ask an expert -->
    <div class="cta-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                <div class="cta-wrapper-icon">
                    <img src="../images/advisor.svg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <p class="cta-wrapper-text">Get Best Mining Goals &amp; Get Them
                    <br> Managed By the experts.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <a href="../contact-us/index.html" class=" btn btn-default btn-lg">ask an expert</a>
            </div>
        </div>
    </div>
</div>    <!-- /.cta-wrapper -->


    <!-- footer -->
    <div class="footer">
    <div class="container">
        <div class="newsletter">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <h2 class="text-white">Subscribe Newsletter</h2>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <form id="newsLetter" type="post" action="xhr.php">
                        <input id="email" name="newLetterEmail" class="form-control" type="text" placeholder="Enter Your Email Address" required>
                        <button type="submit" class="btn btn-primary btn-lg">submit <img src="../images/Spinner.gif" alt="Loading..." id="newsLetterBtn" class="hide" width="20" height="20" style="width:20px;"></button>
                    </form>
                </div>
                <div id="nMsg" class="hide">Thank you for subscribing to our newsletters.</div>
            </div>
        </div>
        <div class="row">
            <!-- footer-company-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Member account area</h3>
                    <a href="../register/index.html" class="btn btn-primary btn-sm mb20">Register </a>
                    <a href="../login/index.html" class="btn btn-default btn-sm mb20">Login</a>
                </div>
            </div>
            <!-- /.footer-services-links -->
            <!-- footer-services-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul>
                        <li><a href="../faq/index.html">FAQs</a></li>
                        <li><a href="../about/index.html">About Us</a></li>
                        <li><a href="../contact-us/index.html">Contact Us</a></li>
                        <li><a href="../terms-of-service/index.html">Terms of Use</a></li>
                        <li><a href="../privacy-policy/index.html">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.footer-services-links -->
            <!-- footer-contact links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Contact Info </h3>
                    <div class="contact-info">
                        <span class="contact-text">care@tripplepennycrypto.com</span>
                    </div>
                    <div class="contact-info">
                        <span class="contact-text">+1 (415) 900-4502</span>
                    </div>
                </div>
            </div>
            <!-- /.footer-useful links -->
            <!-- footer-useful links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Connect With Us</h3>
                    <div class="ft-social">
                        <span><a href="#" class="btn-social btn-facebook" ><i class="fa fa-facebook"></i></a></span>
                        <span><a href="#" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a></span>
                        <span><a href="#" class="btn-social btn-googleplus"><i class="fa fa-google-plus"></i></a></span>
                        <span><a href="#" class=" btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a></span>
                    </div>
                </div>
            </div>
            <!-- /.footer-useful links -->
        </div>
    </div>
    <!-- tiny-footer -->
    <div class="container">
        <div class="row">
            <div class="tiny-footer">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <p>Copyright © All Rights Reserved
                        <a href="../index.html" target="_blank" class="copyrightlink">Tripple Penny </a></p>
                </div>
            </div>
        </div>
        <!-- /. tiny-footer -->
    </div>
</div>    <!-- /.footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/form-validator.js" type="text/javascript"></script>
    <script src="../js/menumaker.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/jquery.sticky.js"></script>
    <script type="text/javascript" src="../js/sticky-header.js"></script>
    <script type="text/javascript" src="../js/customs.js"></script>
</body>

</html>
<!-- Localized -->