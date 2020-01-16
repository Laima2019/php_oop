<?php

require '../bootloader.php';

$_SESSION = [];
session_destroy();
setcookie(session_name(), null, -1);
header('location:/register.php');