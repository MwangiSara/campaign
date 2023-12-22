<?php
   session_start();
   unset($_SESSION["admin"]);
   header('Refresh: 2; URL = index.php');
?>