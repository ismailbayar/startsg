<?php
header("Content-Type:image/jpeg");
$id = $_GET["id"];
$link = "http://185.181.210.253/uploads/thumbs/".$id."-social.jpg";
echo file_get_contents($link);
?>
