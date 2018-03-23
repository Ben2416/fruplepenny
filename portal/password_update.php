<?php
require_once("config/db.php");
require_once("classes/Password_update.php");
$page = "password_update";
include "views/header_view.php";
include "views/navbar_view.php";
include "views/sidebar_view.php";

$password_update = new Password_update();

include("views/password_update_view.php");

include "views/footer_view.php";
?>