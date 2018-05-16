<?php

require_once("config/db.php");
require_once("classes/Verify.php");

include "header.php";

$verify = new Verify();

//include("views/register_view.php
if (isset($verify)) {
    if ($verify->errors) {
        foreach ($verify->errors as $error) {
            echo $error;
        }
    }
    if ($verify->messages) {
        foreach ($verify->messages as $message) {
            echo $message;
        }
    }
}

include("footer.php");
?>