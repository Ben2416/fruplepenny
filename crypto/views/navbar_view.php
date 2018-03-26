
        <!-- container section start -->
        <section id="container" class="" hidden>
            <header class="header white-bg">
                <div class="toggle-nav">
                    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
                </div>

                <!--logo start-->
                <a href="#" class="logo"><img src="../images/logo.png" alt="logo"></a>
                <!--logo end-->

                <div class="top-nav notification-row">
                    <!-- notificatoin dropdown start-->
                    <ul class="nav pull-right top-menu">
                        <!-- inbox notificatoin start-->
                        <li id="mail_notificatoin_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="../messages">
                                <i class="icon-envelope-l"></i>
                                <span class="badge bg-important" id="unreadInbox"></span>
                            </a>
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name'];?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li class="eborder-top">
                                    <a href="#!/account" id="myProfile">
									<i class="icon_profile"></i> My Account</a>
                                </li>
                                <li>
                                    <a href="#!/messageTickets" id="myInbox">
									<i class="icon_mail_alt"></i> Tickets</a>
                                </li>
                                <li>
                                    <a href="#!/logout" id="myLogout">
									<i class="fa fa-power-off"></i> Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!-- notificatoin dropdown end-->
                </div>
            </header>
            <!--header end-->