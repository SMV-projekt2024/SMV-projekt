<?php
session_start();
session_unset();
session_destroy();

header("location: ../prva_stran.php");
exit();