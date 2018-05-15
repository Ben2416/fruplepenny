<?php include'header.php'; ?>
<body>
<div class="mainwrapper">
<?php include'nav.php'; ?>
    	</div><!--headerpanel-->
        <div class="pagetitle">
        	<h1>Edit Profile</h1> <span>Ebi Okpongu</span>
        </div><!--pagetitle-->
        <?php
			include "config/db.php";
			include "classes/Users.php";
			$user = new Users();
		?>
        <div class="maincontent">
        	<div class="contentinner content-editprofile">
            	<h4 class="widgettitle nomargin">Edit Profile</h4>
                <div class="widgetcontent bordered">
                	<div class="row-fluid">
                    	<div class="span3 profile-left">
                        
                        	<h4>Your Profile Photo</h4>
                            
                            <div class="profilethumb">
                            	<a href="#">Change Thumbnail</a>
                                <img src="img/profilethumb.png" alt="" class="img-polaroid" />
                            </div><!--profilethumb-->
                                                       
                            
                            <a href="#" style="display:block;margin-top:10px">+ Add Tag</a>
                            
                        </div><!--span3-->
                        <div class="span9">
                            <form action="#" class="editprofileform" method="post">
                            	<h4>Login Information</h4>
                                <p>
                                	<label>Username:</label>
                                	<input type="text" name="username" class="input-xlarge" value="<?=$user->return_data->email?>" />
                                </p>
                                <p>
                                	<label style="padding:0">Password</label>
                                    <input type="text" name="password" class="input-xlarge" value="pass1234" />
                                </p>
                                
                                <br />
                                
                                <h4>Personal Information</h4>
                                <p>
                                	<label>Firstname:</label>
                                	<input type="text" name="firstname" class="input-xlarge" value="<?=$user->return_data->first_name?>" />
                                </p>
                                <p>
                                	<label>Lastname:</label>
                                    <input type="text" name="lastname" class="input-xlarge" value="<?=$user->return_data->last_name?>" />
                                </p>
                                <p>
                                	<label>Phone No:</label>
                                    <input type="text" name="phone_number" class="input-xlarge" value="<?=$user->return_data->phone_number?>" />
                                </p>
                                <p>
                                	<label>Package Type</label>
                                    <input type="text" name="package" class="input-xlarge" value="<?=$user->return_data->package?>" />
                                </p>
                                <p>
                                	<label>Bonus Points:</label>
                                    <input type="text" name="bonus_point" class="input-xlarge" value="<?=($user->return_data->total_referred*7)?>" />
                                </p>
                                
                                <br />
                                
                                
                                
                                <br />
                                <p>
                                	<button type="submit" class="btn btn-primary">Update Record</button> <button type="submit" class="btn btn-primary">Cancel</button>
                                </p>
                            </form>
                        </div><!--span9-->
                    </div><!--row-fluid-->
                </div><!--widgetcontent-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div>
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>

</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){

	jQuery('.profilethumb').hover(function(){
		jQuery(this).find('a').fadeIn();
	},function(){
		jQuery(this).find('a').fadeOut();
	});
	
	jQuery('.taglist a').click(function(){
		return false;
	});
	jQuery('.taglist a span').click(function(){
		jQuery(this).parent().remove();
		return false;
	});
	
});
</script>
</body>
</html>
