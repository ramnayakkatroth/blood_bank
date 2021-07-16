<?php
include_once('../login.php');
session_destroy();
unset($_SESSION['userrole']);
unset($_SESSION['name']);
header("Location: ./index.php");
?>