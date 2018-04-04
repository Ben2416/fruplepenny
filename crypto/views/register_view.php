
 <?php
// show potential errors / feedback (from registration object)
if (isset($register)) {
    if ($register->errors) {
        foreach ($register->errors as $error) {
            echo $error;
        }
    }
    if ($register->messages) {
        foreach ($register->messages as $message) {
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
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
                <!-- navigations-->
                <div class="navigation">
                    <div id="navigation">
                        <ul>
                            <li class=" "><a href="index.html">Home</a></li>
                            <li class=" "><a href="pricing/index.html">Pricing</a></li>
                            <li class=" "><a href="our-offerings/index.html">Our Offerings</a></li>
                            <li class="has-sub"><a href="#">Start Here</a>
                                <ul>
                                    <li><a href="login/index.html">Login</a></li>
                                    <li><a href="index.html">Register</a></li>
                                </ul>
                            </li>
                            <li class=" "><a href="contact-us/index.html">Get In-touch</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.navigations-->
            </div>
        </div>
    </div>
</div>    <!-- /. header-section-->

    <!-- register form -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <!-- section-title-1 -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3>Register Account</h3>
                        <br><h4 align="center" class="text-muted">Please use your referrers link else your registration will be declined.</h4>                        
                    </div>
                </div>
            </div>
            <div class="col-sm-offset-2 col-md-offset-3 col-md-6 col-sm-8 col-xs-12">
                                <form action="#" method="post" id="registerForm">
                    <div class="form-group">
                        <label class="control-label sr-only">Email</label>
                        <input type="hidden" name="referral_email" class="form-control" placeholder="Referral Email" required="" data-validation="email" value="<?php if(isset($_GET["ref_id"]))echo $_GET["ref_id"]; ?>">
						<input type="text" name="email" class="form-control" placeholder="Email" required="" data-validation="email">
						
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" data-validation="custom" data-validation-regexp="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})" data-validation-error-msg="Password must contain atleast one uppercase, one lowercase, one digit and be 8 characters long">
                    </div>
					<div class="form-group">
                        <label class="control-label sr-only">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Password" required="" data-validation="custom" data-validation-regexp="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})" data-validation-error-msg="Password must contain atleast one uppercase, one lowercase, one digit and be 8 characters long">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required="" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">Mobile</label>
                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile Number" minlength="8" data-validation="number" data-validation-ignore="+" required="" value="">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" required="" data-validation="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label sr-only">Country</label>
                        <select name="country" class="form-control" data-validation="required" required="">
                            <option selected="" disabled="">Your country...</option>
                            <option value="AFG">Afghanistan</option>
                            <option value="ALA">Åland Islands</option>
                            <option value="ALB">Albania</option>
                            <option value="DZA">Algeria</option>
                            <option value="ASM">American Samoa</option>
                            <option value="AND">Andorra</option>
                            <option value="AGO">Angola</option>
                            <option value="AIA">Anguilla</option>
                            <option value="ATA">Antarctica</option>
                            <option value="ATG">Antigua and Barbuda</option>
                            <option value="ARG">Argentina</option>
                            <option value="ARM">Armenia</option>
                            <option value="ABW">Aruba</option>
                            <option value="AUS">Australia</option>
                            <option value="AUT">Austria</option>
                            <option value="AZE">Azerbaijan</option>
                            <option value="BHS">Bahamas</option>
                            <option value="BHR">Bahrain</option>
                            <option value="BGD">Bangladesh</option>
                            <option value="BRB">Barbados</option>
                            <option value="BLR">Belarus</option>
                            <option value="BEL">Belgium</option>
                            <option value="BLZ">Belize</option>
                            <option value="BEN">Benin</option>
                            <option value="BMU">Bermuda</option>
                            <option value="BTN">Bhutan</option>
                            <option value="BOL">Bolivia, Plurinational State of</option>
                            <option value="BES">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BIH">Bosnia and Herzegovina</option>
                            <option value="BWA">Botswana</option>
                            <option value="BVT">Bouvet Island</option>
                            <option value="BRA">Brazil</option>
                            <option value="IOT">British Indian Ocean Territory</option>
                            <option value="BRN">Brunei Darussalam</option>
                            <option value="BGR">Bulgaria</option>
                            <option value="BFA">Burkina Faso</option>
                            <option value="BDI">Burundi</option>
                            <option value="KHM">Cambodia</option>
                            <option value="CMR">Cameroon</option>
                            <option value="CAN">Canada</option>
                            <option value="CPV">Cape Verde</option>
                            <option value="CYM">Cayman Islands</option>
                            <option value="CAF">Central African Republic</option>
                            <option value="TCD">Chad</option>
                            <option value="CHL">Chile</option>
                            <option value="CHN">China</option>
                            <option value="CXR">Christmas Island</option>
                            <option value="CCK">Cocos (Keeling) Islands</option>
                            <option value="COL">Colombia</option>
                            <option value="COM">Comoros</option>
                            <option value="COG">Congo</option>
                            <option value="COD">Congo, the Democratic Republic of the</option>
                            <option value="COK">Cook Islands</option>
                            <option value="CRI">Costa Rica</option>
                            <option value="CIV">Côte d'Ivoire</option>
                            <option value="HRV">Croatia</option>
                            <option value="CUB">Cuba</option>
                            <option value="CUW">Curaçao</option>
                            <option value="CYP">Cyprus</option>
                            <option value="CZE">Czech Republic</option>
                            <option value="DNK">Denmark</option>
                            <option value="DJI">Djibouti</option>
                            <option value="DMA">Dominica</option>
                            <option value="DOM">Dominican Republic</option>
                            <option value="ECU">Ecuador</option>
                            <option value="EGY">Egypt</option>
                            <option value="SLV">El Salvador</option>
                            <option value="GNQ">Equatorial Guinea</option>
                            <option value="ERI">Eritrea</option>
                            <option value="EST">Estonia</option>
                            <option value="ETH">Ethiopia</option>
                            <option value="FLK">Falkland Islands (Malvinas)</option>
                            <option value="FRO">Faroe Islands</option>
                            <option value="FJI">Fiji</option>
                            <option value="FIN">Finland</option>
                            <option value="FRA">France</option>
                            <option value="GUF">French Guiana</option>
                            <option value="PYF">French Polynesia</option>
                            <option value="ATF">French Southern Territories</option>
                            <option value="GAB">Gabon</option>
                            <option value="GMB">Gambia</option>
                            <option value="GEO">Georgia</option>
                            <option value="DEU">Germany</option>
                            <option value="GHA">Ghana</option>
                            <option value="GIB">Gibraltar</option>
                            <option value="GRC">Greece</option>
                            <option value="GRL">Greenland</option>
                            <option value="GRD">Grenada</option>
                            <option value="GLP">Guadeloupe</option>
                            <option value="GUM">Guam</option>
                            <option value="GTM">Guatemala</option>
                            <option value="GGY">Guernsey</option>
                            <option value="GIN">Guinea</option>
                            <option value="GNB">Guinea-Bissau</option>
                            <option value="GUY">Guyana</option>
                            <option value="HTI">Haiti</option>
                            <option value="HMD">Heard Island and McDonald Islands</option>
                            <option value="VAT">Holy See (Vatican City State)</option>
                            <option value="HND">Honduras</option>
                            <option value="HKG">Hong Kong</option>
                            <option value="HUN">Hungary</option>
                            <option value="ISL">Iceland</option>
                            <option value="IND">India</option>
                            <option value="IDN">Indonesia</option>
                            <option value="IRN">Iran, Islamic Republic of</option>
                            <option value="IRQ">Iraq</option>
                            <option value="IRL">Ireland</option>
                            <option value="IMN">Isle of Man</option>
                            <option value="ISR">Israel</option>
                            <option value="ITA">Italy</option>
                            <option value="JAM">Jamaica</option>
                            <option value="JPN">Japan</option>
                            <option value="JEY">Jersey</option>
                            <option value="JOR">Jordan</option>
                            <option value="KAZ">Kazakhstan</option>
                            <option value="KEN">Kenya</option>
                            <option value="KIR">Kiribati</option>
                            <option value="PRK">Korea, Democratic People's Republic of</option>
                            <option value="KOR">Korea, Republic of</option>
                            <option value="KWT">Kuwait</option>
                            <option value="KGZ">Kyrgyzstan</option>
                            <option value="LAO">Lao People's Democratic Republic</option>
                            <option value="LVA">Latvia</option>
                            <option value="LBN">Lebanon</option>
                            <option value="LSO">Lesotho</option>
                            <option value="LBR">Liberia</option>
                            <option value="LBY">Libya</option>
                            <option value="LIE">Liechtenstein</option>
                            <option value="LTU">Lithuania</option>
                            <option value="LUX">Luxembourg</option>
                            <option value="MAC">Macao</option>
                            <option value="MKD">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MDG">Madagascar</option>
                            <option value="MWI">Malawi</option>
                            <option value="MYS">Malaysia</option>
                            <option value="MDV">Maldives</option>
                            <option value="MLI">Mali</option>
                            <option value="MLT">Malta</option>
                            <option value="MHL">Marshall Islands</option>
                            <option value="MTQ">Martinique</option>
                            <option value="MRT">Mauritania</option>
                            <option value="MUS">Mauritius</option>
                            <option value="MYT">Mayotte</option>
                            <option value="MEX">Mexico</option>
                            <option value="FSM">Micronesia, Federated States of</option>
                            <option value="MDA">Moldova, Republic of</option>
                            <option value="MCO">Monaco</option>
                            <option value="MNG">Mongolia</option>
                            <option value="MNE">Montenegro</option>
                            <option value="MSR">Montserrat</option>
                            <option value="MAR">Morocco</option>
                            <option value="MOZ">Mozambique</option>
                            <option value="MMR">Myanmar</option>
                            <option value="NAM">Namibia</option>
                            <option value="NRU">Nauru</option>
                            <option value="NPL">Nepal</option>
                            <option value="NLD">Netherlands</option>
                            <option value="NCL">New Caledonia</option>
                            <option value="NZL">New Zealand</option>
                            <option value="NIC">Nicaragua</option>
                            <option value="NER">Niger</option>
                            <option value="NGA">Nigeria</option>
                            <option value="NIU">Niue</option>
                            <option value="NFK">Norfolk Island</option>
                            <option value="MNP">Northern Mariana Islands</option>
                            <option value="NOR">Norway</option>
                            <option value="OMN">Oman</option>
                            <option value="PAK">Pakistan</option>
                            <option value="PLW">Palau</option>
                            <option value="PSE">Palestinian Territory, Occupied</option>
                            <option value="PAN">Panama</option>
                            <option value="PNG">Papua New Guinea</option>
                            <option value="PRY">Paraguay</option>
                            <option value="PER">Peru</option>
                            <option value="PHL">Philippines</option>
                            <option value="PCN">Pitcairn</option>
                            <option value="POL">Poland</option>
                            <option value="PRT">Portugal</option>
                            <option value="PRI">Puerto Rico</option>
                            <option value="QAT">Qatar</option>
                            <option value="REU">Réunion</option>
                            <option value="ROU">Romania</option>
                            <option value="RUS">Russian Federation</option>
                            <option value="RWA">Rwanda</option>
                            <option value="BLM">Saint Barthélemy</option>
                            <option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KNA">Saint Kitts and Nevis</option>
                            <option value="LCA">Saint Lucia</option>
                            <option value="MAF">Saint Martin (French part)</option>
                            <option value="SPM">Saint Pierre and Miquelon</option>
                            <option value="VCT">Saint Vincent and the Grenadines</option>
                            <option value="WSM">Samoa</option>
                            <option value="SMR">San Marino</option>
                            <option value="STP">Sao Tome and Principe</option>
                            <option value="SAU">Saudi Arabia</option>
                            <option value="SEN">Senegal</option>
                            <option value="SRB">Serbia</option>
                            <option value="SYC">Seychelles</option>
                            <option value="SLE">Sierra Leone</option>
                            <option value="SGP">Singapore</option>
                            <option value="SXM">Sint Maarten (Dutch part)</option>
                            <option value="SVK">Slovakia</option>
                            <option value="SVN">Slovenia</option>
                            <option value="SLB">Solomon Islands</option>
                            <option value="SOM">Somalia</option>
                            <option value="ZAF">South Africa</option>
                            <option value="SGS">South Georgia and the South Sandwich Islands</option>
                            <option value="SSD">South Sudan</option>
                            <option value="ESP">Spain</option>
                            <option value="LKA">Sri Lanka</option>
                            <option value="SDN">Sudan</option>
                            <option value="SUR">Suriname</option>
                            <option value="SJM">Svalbard and Jan Mayen</option>
                            <option value="SWZ">Swaziland</option>
                            <option value="SWE">Sweden</option>
                            <option value="CHE">Switzerland</option>
                            <option value="SYR">Syrian Arab Republic</option>
                            <option value="TWN">Taiwan, Province of China</option>
                            <option value="TJK">Tajikistan</option>
                            <option value="TZA">Tanzania, United Republic of</option>
                            <option value="THA">Thailand</option>
                            <option value="TLS">Timor-Leste</option>
                            <option value="TGO">Togo</option>
                            <option value="TKL">Tokelau</option>
                            <option value="TON">Tonga</option>
                            <option value="TTO">Trinidad and Tobago</option>
                            <option value="TUN">Tunisia</option>
                            <option value="TUR">Turkey</option>
                            <option value="TKM">Turkmenistan</option>
                            <option value="TCA">Turks and Caicos Islands</option>
                            <option value="TUV">Tuvalu</option>
                            <option value="UGA">Uganda</option>
                            <option value="UKR">Ukraine</option>
                            <option value="ARE">United Arab Emirates</option>
                            <option value="GBR">United Kingdom</option>
                            <option value="USA">United States</option>
                            <option value="UMI">United States Minor Outlying Islands</option>
                            <option value="URY">Uruguay</option>
                            <option value="UZB">Uzbekistan</option>
                            <option value="VUT">Vanuatu</option>
                            <option value="VEN">Venezuela, Bolivarian Republic of</option>
                            <option value="VNM">Viet Nam</option>
                            <option value="VGB">Virgin Islands, British</option>
                            <option value="VIR">Virgin Islands, U.S.</option>
                            <option value="WLF">Wallis and Futuna</option>
                            <option value="ESH">Western Sahara</option>
                            <option value="YEM">Yemen</option>
                            <option value="ZMB">Zambia</option>
                            <option value="ZWE">Zimbabwe</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-block mb20" name="register">Enter</button>
                    </div>
                </form>
                <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
                <p class="text-center">Forgot your password? <a href="password_reset.php">Reset it</a></p>
            </div>
        </div>
    </div>



    <!-- cta-wrapper ask an expert -->
    <div class="cta-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-12">
                <div class="cta-wrapper-icon">
                    <img src="images/advisor.svg" alt="" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                <p class="cta-wrapper-text">Get Best Mining Goals &amp; Get Them
                    <br> Managed By the experts.</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <a href="contact-us/index.html" class=" btn btn-default btn-lg">ask an expert</a>
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
                        <button type="submit" class="btn btn-primary btn-lg">submit <img src="images/Spinner.gif" alt="Loading..." id="newsLetterBtn" class="hide" width="20" height="20" style="width:20px;"></button>
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
                    <a href="index.html" class="btn btn-primary btn-sm mb20">Register </a>
                    <a href="login/index.html" class="btn btn-default btn-sm mb20">Login</a>
                </div>
            </div>
            <!-- /.footer-services-links -->
            <!-- footer-services-links -->
            <div class=" col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="footer-widget">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul>
                        <li><a href="faq/index.html">FAQs</a></li>
                        <li><a href="about/index.html">About Us</a></li>
                        <li><a href="contact-us/index.html">Contact Us</a></li>
                        <li><a href="terms-of-service/index.html">Terms of Use</a></li>
                        <li><a href="privacy-policy/index.html">Privacy Policy</a></li>
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
                        <a href="index.html" target="_blank" class="copyrightlink">Tripple Penny </a></p>
                </div>
            </div>
        </div>
        <!-- /. tiny-footer -->
    </div>
</div>    <!-- /.footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/form-validator.js" type="text/javascript"></script>
    <script src="js/menumaker.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery.sticky.js"></script>
    <script type="text/javascript" src="js/sticky-header.js"></script>
    <script type="text/javascript" src="js/customs.js"></script>
</body>

</html>
<!-- Localized -->