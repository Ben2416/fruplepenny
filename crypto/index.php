<?php
//ob_start();
include "config/db.php";
include "classes/Login.php";
include "header.php";

$login = new Login();

include("views/login_view.php");

include "footer.php"
//ob_end_flush();
?>
