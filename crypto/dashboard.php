<?php
include "config/db.php";
include "classes/Dashboard.php";
include "header_view.php";

$dashboard = new Dashboard();

include("views/dashboard_view.php");

include "footer_view.php"
?>
