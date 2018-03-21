<?php

require_once("config/db.php");
require_once("classes/Forgot_password.php");

$forgot_password = new Forgot_password();

include("views/forgot_password_view.php");

?>