<?php
require_once("config/db.php");
include "views/header_view.php";
include "views/sidebar_view.php";

include("views/dashboard_view.php");

echo "<br/><a href='../portal/?logout.php'>Logout</a>";

include "views/footer_view.php";
?>