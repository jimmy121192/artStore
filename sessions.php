<?php

        session_start();
        $_SESSION["favItems"] = $_POST['storageValue'];
        echo $_SESSION["favItems"];

?>