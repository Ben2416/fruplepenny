<?php

require_once("config/db.php");
require_once("classes/Password_reset.php");

include "header.php";

$password_reset = new Password_reset();

include("views/password_reset_view.php");

include "footer.php";
?>