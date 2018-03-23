<?php
include "config/db.php";
include "classes/Affiliate.php";
include "header_view.php";

$affiliate = new Affiliate();

include("views/affiliate_view.php");

include "footer_view.php"
?>
