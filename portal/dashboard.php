<?php
include "views/header_view.php";require_once("config/db.php");
$page = "dashboard";

include "views/navbar_view.php";
include "views/sidebar_view.php";

include("views/dashboard_view.php");

include "views/footer_view.php";
?>