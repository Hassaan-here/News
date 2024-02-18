<?php
include"config.php";
    session_start();

    session_unset();
    session_destroy();

    header("Location:{$hostName}/admin-panel/");  //redirecting to the login page after logout
?>