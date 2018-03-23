
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $_SESSION["first_name"]." ".$_SESSION["last_name"]; ?></span>
									<div class="text-size-mini text-muted">
										
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li <?php if($page=="dashboard")echo "class='active'";?>><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li><li>
									
									<li <?php if($page=="account")echo "class='active'";?>>
								
									<a href="account.php"><i class="icon-people"></i> <span>My Account</span></a>
									</li>
								
								<li <?php if($page=="deposit")echo "class='active'";?>>
									<a href="deposit.php"><i class="icon-cube3"></i> <span>My Deposits</span></a>
									
										
										</li>
								
								<li <?php if($page=="deposit_package")echo "class='active'";?>>
									<a href="deposit_package.php" ><i class="icon-copy"></i> <span>Deposit Now</span></a>
									
								</li>
								
									<li <?php if($page=="withdrawal_request")echo "class='active'";?>>
									<a href="withdrawal_request.php"><i class="icon-cube3"></i> <span>Request Withdrawal</span></a>
									
										
										</li>
											<li <?php if($page=="withdrawal")echo "class='active'";?>>
									<a href="withdrawal.php"><i class="icon-cube3"></i> <span>View Withdrawals</span></a>
									
										
										</li>
                                        <li <?php if($page=="password_update")echo "class='active'";?>>
									<a href="password_update.php"><i class="icon-stack2"></i> <span>Change Password</span></a>
									
								</li>
                                
                                
                               <li>
									<a href="#"><i class="icon-footprint"></i> <span>Referrals</span></a>
									<ul>
										<li <?php if($page=="referral_link")echo "class='active'";?>><a href="referral_link.php">Referral Link</a></li>
										<li <?php if($page=="referral_my")echo "class='active'";?>><a href="referral_my.php">My Referrals</a></li>
										
									</ul>
								</li>
								<li>

						</div>
					</div>					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->