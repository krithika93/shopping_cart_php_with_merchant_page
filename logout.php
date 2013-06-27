<?php session_start();
include 'common/base.php'; $_SESSION = array(); session_destroy(); ?>
<html>
<title>Logout</title>
<meta http-equiv="refresh" content="0;index.php">