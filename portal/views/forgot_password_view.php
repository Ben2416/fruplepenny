 <?php
if (isset($forgot_password)) {
    if ($forgot_password->errors) {
        foreach ($forgot_password->errors as $error) {
            echo $error;
        }
    }
    if ($forgot_password->messages) {
        foreach ($forgot_password->messages as $message) {
            echo $message;
        }
    }
}
?>
<body>
        <!-- Top content -->
        <div class="top-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
                    	<form role="form" action="" method="post" class="f1">

                    		<h3>Password Recovery</h3>
                    		<p>Enter your registered email address</p>
                    		<fieldset>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">Email</label>
                                    <input type="text" name="forgot_email" placeholder="Recovery Email..." class="email form-control" id="forgot_email">
                                </div>
                                <div class="f1-buttons">
                                    <a href="../portal/" class="">Click here to Login</a> | 
									<button type="submit" class="btn btn-submit" name="forgot_password">Recover Password</button>
                                </div>
                            </fieldset>
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>