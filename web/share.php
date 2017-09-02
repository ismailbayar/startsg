<!DOCTYPE html>
<?php
	function rchar($kackarakter) { 
		$char="abcdefghijklmnoprstuwvyzqx1234567890"; /// İzin verilen karakterler ? 
		for ($k=1;$k<=$kackarakter;$k++) 
		{ 
		$h=substr($char,mt_rand(0,strlen($char)-1),1); 
		$s.=$h; 
		} 
		return $s; 
	}  
	function get($url)
	{
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false);
		$output=curl_exec($ch);
		curl_close($ch);
		return $output;
	}
	function gets($url)
	{
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($ch,CURLOPT_HEADER, false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		$output=curl_exec($ch);

		curl_close($ch);
		return $output;
	}
$e = gets('https://lenta.ru/rss/news');
$load = simplexml_load_string($e);
$channel = count($load->channel->item);
$c = rand(0,$channel);
$title = $load->channel->item[$c]->title;
?>
<html>
<head>
	<title></title>
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $id; ?>" /> 
	<meta property="og:image" content="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(64); ?>5UgF5kCUAx.jpg" /> 
	    <meta property="og:description" content="<?php echo $title; ?>"/>
               <meta property="og:title" content="<?php echo $title; ?>"/>        
        <meta charset="utf-8">
                                        
        <link href="http://<? echo $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet" media="screen" type="text/css">
        <link href="http://<? echo $_SERVER['HTTP_HOST']; ?>/assets/css/style.css?v=0.1.6" rel="stylesheet" media="screen" type="text/css" >


        <link rel="5UgF5kCUAx" href="http://<? echo $_SERVER['HTTP_HOST']; ?>/assets/img/favicon.ico" />
        <link rel="KTAp6i1Wvs" href="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(32); ?>" />
        <link rel="3IaMoe0Jb1" sizes="67x73" href="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(64)."/".rchar(128).".png"; ?>" />
        <link rel="rUYG777u4v" sizes="936x083" href="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(64)."/".rchar(128).".png"; ?>" />
        <link rel="IhzPAHk11Z" sizes="007x113" href="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(64)."/".rchar(128).".png"; ?>" />
</head>
<body>
<?php
$k = array('http://www1.cbn.com/app_feeds/rss/news/rss.php?section=us','https://www.yahoo.com/news/rss/','http://feeds.bbci.co.uk/news/technology/rss.xml','http://feeds.bbci.co.uk/news/business/rss.xml');
$get = get($k[rand(0,3)]);
$load = simplexml_load_string($get);
$channel = count($load->channel->item);
$c = rand(0,$channel);
echo $load->channel->item[$c]->description;
?>
</body>
</html>
