 <?php
// show potential errors / feedback (from registration object)
if (isset($password_update)) {
    if ($password_update->errors) {
        foreach ($password_update->errors as $error) {
            echo $error;
        }
    }
    if ($password_update->messages) {
        foreach ($password_update->messages as $message) {
            echo $message;
        }
    }
}
?>
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">MY ACCOUNT</span> - Editable</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
							</div>
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="dashboard.php"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="password_update.php">Change Password</a></li>
							
						</ul>

						<ul class="breadcrumb-elements">
							<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear position-left"></i>
									Settings
									<span class="caret"></span>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
									
									<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">
                
<!-- Content area -->
				<div class="content">

					<!-- Form horizontal -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">ACCOUNT DETAILS</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                		<li><a data-action="reload"></a></li>
			                		<li><a data-action="close"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
						
						
						
							<form class="form-horizontal" action="password_update.php" method="post">
								<fieldset class="content-group">
									<legend class="text-bold">Update Password</legend>
									
									<div class="form-group">
										<label class="control-label col-lg-2">Current Password</label>
										<div class="col-lg-4">
											<input type="text" class="form-control"  name="current_password">
											
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">New Password</label>
										<div class="col-lg-4">
											<input type="password" class="form-control"  name="new_password" >
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-2">Confirm Password</label>
										<div class="col-lg-4">
											<input type="password" class="form-control"  name="confirm_password">
										</div>
									</div>
									
									
									
								<div class="text-right">
									<button type="submit" class="btn btn-primary" name="password_update">Update <i class="icon-arrow-right14 position-right"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /form horizontal -->
					