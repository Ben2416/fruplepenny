<?php

require_once("config/db.php");
require_once("classes/Register.php");

$register = new Register();

include("views/register_view.php");

?>