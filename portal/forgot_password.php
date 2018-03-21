<?php

require_once("config/db.php");
require_once("classes/Forgot_password.php");

include "header.php";

$forgot_password = new Forgot_password();

include("views/forgot_password_view.php");

include "footer.php";
?>