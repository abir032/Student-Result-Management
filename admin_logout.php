<?php
   //require 'dbconnect.php';
   session_start();
   session_destroy();
   //window.location.href='login.php'";
   header("location: admin_login.php");
   
?>