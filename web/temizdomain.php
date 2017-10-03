<?php 
$db = new mysqli('185.181.210.2', 'root', 'LN|rISzey+e*sjF&', 'post'); 
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
$domains = $db->query("SELECT * FROM `temizdomain`");
$domainbilgi = $_GET["domain"];
$db->query("DELETE FROM temizdomain WHERE domain='$domainbilgi'");


?>