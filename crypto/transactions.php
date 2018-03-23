<?php
include "config/db.php";
include "classes/Transactions.php";
include "header_view.php";

$transactions = new Transactions();

include("views/transactions_view.php");

include "footer_view.php"
?>
