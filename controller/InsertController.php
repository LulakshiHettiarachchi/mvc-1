<?php
require "../model/model.php";
$DB = new DB();
$DB->insert(
   "INSERT INTO `users1` (`id`, `name`) VALUES ('".$_POST['id']."','".$_POST['name']."')"); 
?>