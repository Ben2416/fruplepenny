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
                            <th class="head0">Total Referred</th>
                            <th class="head1">Bonus Points</th>
                            <th class="head0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					include "config/db.php";
					include "classes/Users.php";
					$user = new Users(4);
					?>
                    </tbody>
                </table>
                
                <div class="divider15"></div>

                
            </div><!--contentinner-->
        </div><!--maincontent-->
        
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