<?php
ob_start();
session_start();
//error_reporting(0); 
//error_reporting(E_ERROR | E_WARNING | E_PARSE); 
//error_reporting(E_ERROR); 
include "config/db.php";
include "classes/Dashboard.php";
$dashboard = new Dashboard();

include "views/header_view.php";
include "views/navbar_view.php";
include "views/sidebar_view.php";

?>
 <!--main content start-->
            <section id="main-content">
<?php
include("views/dashboard_view.php");
include("views/transactions_view.php");
include("views/tickets_view.php");
include("views/affiliate_view.php");
include("views/account_view.php");
?>
            </section>
            <!--main content end-->
        </section>
        <!-- container section start -->
<?php
include "views/footer_view.php"
//ob_end_flush();
?>
