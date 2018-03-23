<?php
include "config/db.php";
include "classes/Account.php";
include "header_view.php";

$account = new Account();

include("views/account_view.php");

include "footer_view.php"
?>
