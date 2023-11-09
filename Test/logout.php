<?php
require_once('classes/Authentication.php');

Authentication::logout();

header("Location: index.php");

?>