<section class="wrapper" id="account">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="page-header"><i class="fa fa-user"></i> Account</h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-home"></i><a href="../">Home</a></li>
                                <li><i class="fa fa-user"></i>Manage my account</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row" id="refer-someone">
                        <div class="col-sm-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <h3>Affiliate program</h3>
                                    <p>Want to earn some crypto? Give this URL to new investors and when they sign up you will earn a percentage of their deposits: </p>
                                    <br>
                                    <p><span class="phoenix-text">https://www.triplepennycrypto.com/register?ref=f357cfb4b7984931d6a8636c2b5c03fd</span></p>
                                    <br>
                                    <div class="clearBoth"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-body">
                                    <form class="form-horizontal" id="manageAccountForm" method="POST" action="" data-url="">
                                        <h3>Manage personal Information</h3>
                                        <div class="report"></div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="email">Email</label>
                                                <input id="email" class="form-control input-lg m-bot15" type="text" value="4hoover101@gmail.com" readonly="">
                                                <label for="first_name">First Name</label>
                                                <input value="Larry" id="first_name" type="text" name="first_name" class="form-control input-lg m-bot15" required="">
                                                <label for="last_name">Last Name</label>
                                                <input value="Hoover" id="last_name" type="text" name="last_name" class="form-control input-lg m-bot15" required="">
                                                <label for="phone_number">Phone</label>
                                                <input value="08039637660" id="phone_number" type="number" name="phone_number" class="form-control input-lg m-bot15" minlength="8" required="">
                                                <label for="address">Address</label>
                                                <input value="festac town" id="address" type="text" name="address" class="form-control input-lg m-bot15" data-validation="required">
                                                <input type="hidden" name="manageAccount" value="true">

                                                <br>
                                                <button class="btn btn-primary btn-lg" type="submit" id="saveProfile">Save</button>
                                                <button class="btn btn-default btn-lg" id="mpwBtn" type="button">Change Password</button>
                                                <img src="img/loader.gif" alt="loading" width="50px" id="mpLoading" hidden="">
                                            </div>
                                        </div>
                                    </form>

                                    <form class="form-horizontal" id="changePasswordForm" method="POST" action="" data-url="" hidden="">
                                        <h3>Change password</h3>
                                        <div class="report"></div>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="">Current password</label>
                                                <input type="password" name="password" class="form-control input-lg m-bot15" required="">
                                                <label for="">New password</label>
                                                <span class="text-danger">*(New password must contain atleast one(1) lowercase, uppercase, number and be eight characters long or more.)</span>
                                                <input type="password" name="npassword" class="form-control input-lg m-bot15" required="">
                                                <label for="">Confirm New password</label>
                                                <input type="password" name="cnpassword" class="form-control input-lg m-bot15" required="">
                                                <input type="hidden" name="changePass" value="true">

                                                <br>
                                                <button class="btn btn-primary btn-lg" id="savePassword" type="submit">Save</button>
                                                <button class="btn btn-default btn-lg" id="mppBtn" type="button">Manage Information</button>
                                                <img src="img/loader.gif" alt="loading" width="50px" id="cpLoading" hidden="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>