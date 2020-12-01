<?php
    session_start();

    unset($_SESSION["userdata"]);
    // session_abort($_SESSION["userdata"]);
    header("Location:index.php");
?>