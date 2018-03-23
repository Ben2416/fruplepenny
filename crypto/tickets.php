<?php
include "config/db.php";
include "classes/Tickets.php";
include "header_view.php";

$tickets = new Tickets();

include("views/tickets_view.php");

include "footer_view.php"
?>
