<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
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

                    		<h3>Log Into Our App</h3>
                    		<p>Fill in the form to get instant access</p>
                    		
                    		<fieldset>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">Username</label>
                                    <input type="text" name="email" placeholder="Username..." class="username form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
                                </div>
                                <div class="f1-buttons">
								<a href="../portal/register.php" class="">Click here to Register</a> | 
								<a href="../portal/forgot_password.php" class="">Forgot Password?</a> | 
                                    <button type="submit" class="btn btn-next" name="login" id="login">Submit</button>
                                </div>
                            </fieldset>
                    	</form>
                    </div>
                </div>
            </div>
        </div>