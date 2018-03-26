<?php
require_once("config/db.php");
$page = "dashboard";
include "views/header_view.php";
include "views/navbar_view.php";
include "views/sidebar_view.php";

include("views/dashboard_view.php");

include "views/footer_view.php";
?>