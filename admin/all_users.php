<?php include'header.php'; ?>
<body>
<div class="mainwrapper">
<?php include'nav.php'; ?>
    	</div><!--headerpanel-->
        <div class="pagetitle">
        	<h1>All Users</h1> <span>All registered users</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
        	<div class="contentinner">
            
            	<table class="table table-bordered" id="dyntable">
                    <colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                          	<th class="head0 nosort"><input type="checkbox" class="checkall" /></th>
                            <th class="head0">Name</th>
                            <th class="head1">Email</th>
                            <th class="head0">Phone No.</th>
                            <th class="head1">Account Status</th>
                            <th class="head0"></th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					include "config/db.php";
					include "classes/Users.php";
					$user = new Users();
					?>
					
                        <!-- <tr class="gradeX">
                          <td class="aligncenter"><span class="center">
                            <input type="checkbox" />
                          </span></td>
                            <td>Ebimobowei Okpongu</td>
                            <td>ebirulz@yahoo.com</td>
                            <td>1234567890</td>
                            <td class="center">Active</td>
                            <td class="center"><div class="btn-group">
                                            <button data-toggle="dropdown" class="btn dropdown-toggle">Action <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                              <li><a href="#">View Profile</a></li>
                                              <li><a href="#">Delete Account</a></li>
                                            </ul>
                                          </div></td>
                        </tr> -->
                    </tbody>
                </table>
                <?php
					if (isset($user)) {
						if ($user->errors) {
							foreach ($user->errors as $error) {
								echo $error;
							}
						}
						if ($user->messages) {
							foreach ($user->messages as $message) {
								echo $message;
							}
						}
					}
				?>
                <div class="divider15"></div>

                <div class="divider15"></div>
          
   				<div class="divider15"></div>

                
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div>
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft"> </div>
    	<div class="footerright">&copy; Zillionpenny</div>
    </div><!--footer-->
    
</div><!--mainwrapper-->

</body>
</html>
