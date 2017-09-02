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
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?php echo $title; ?>" /> 
	<meta property="og:image" content="http://<? echo $_SERVER['HTTP_HOST']."/".rchar(64); ?>-<?php echo $id; ?>.jpg" /> 
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
	<div class="row-fluid">
                <div class="span4">
                    <button class="btn btn-small border-radius0 btn-video active" id="bin-rating-like" type="button"><i class="pm-vc-sprite i-vote-up"></i> Beğen</button>
                    <button class="btn btn-small border-radius0 btn-video " id="bin-rating-dislike" type="button"><i class="pm-vc-sprite i-vote-down"></i></button>
                </div>
                
                <div class="span8">
                	<div class="pull-right">
                        <button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-share"><i class="icon-share-alt"></i> Paylaş</button>
                        <input type="hidden" name="bin-rating-uniq_id" value="14a4e06f8">
                        						<button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-playlists" data-video-id="1" title="Add to playlist"><i class="pm-vc-sprite i-playlists"></i> Add to</button>
						                        <button class="btn btn-small border-radius0 btn-video" type="button" data-toggle="button" id="pm-vc-report" rel="tooltip" data-placement="right" title="Şikayet"><i class="pm-vc-sprite i-report"></i></button>
					</div>
                </div>
            </div>
            </div><!--.pm-video-control-->

            <div id="bin-rating-response" class="hide well well-small"></div>
            <div id="bin-rating-like-confirmation" class="hide well well-small alert alert-well">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p> Teşekkürler! Arkadaşlarınıza da önerin!</p>
		    
		    
	  <ul class="dropdown-menu border-radius0 pullleft lang_submenu">
	  	   	   <li><a href="#" title="Albanian" name="2" id="lang_select_2">Albanian</a></li>
	   	  	   	   <li><a href="#" title="Amharic" name="26" id="lang_select_26">Amharic</a></li>
	   	  	   	   <li><a href="#" title="Arabic" name="3" id="lang_select_3">Arabic</a></li>
	   	  	   	   <li><a href="#" title="Brazilian" name="4" id="lang_select_4">Brazilian</a></li>
	   	  	   	   <li><a href="#" title="Bulgarian" name="5" id="lang_select_5">Bulgarian</a></li>
	   	  	   	   <li><a href="#" title="Croatian" name="6" id="lang_select_6">Croatian</a></li>
	   	  	   	   <li><a href="#" title="Danish" name="7" id="lang_select_7">Danish</a></li>
	   	  	   	   <li><a href="#" title="Deutsch" name="8" id="lang_select_8">Deutsch</a></li>
	   	  	   	   <li><a href="#" title="English" name="1" id="lang_select_1">English</a></li>
	   	  	   	   <li><a href="#" title="Farsi" name="25" id="lang_select_25">Farsi</a></li>
	   	  	   	   <li><a href="#" title="Fran&#231;ais" name="9" id="lang_select_9">Fran&#231;ais</a></li>
	   	  	   	   <li><a href="#" title="Georgian" name="10" id="lang_select_10">Georgian</a></li>
	   	  	   	   <li><a href="#" title="Greek" name="27" id="lang_select_27">Greek</a></li>
	   	  	   	   <li><a href="#" title="Hebrew" name="23" id="lang_select_23">Hebrew</a></li>
	   	  	   	   <li><a href="#" title="Italian" name="11" id="lang_select_11">Italian</a></li>
	   	  	   	   <li><a href="#" title="Lithuanian" name="12" id="lang_select_12">Lithuanian</a></li>
	   	  	   	   <li><a href="#" title="Nederlands" name="13" id="lang_select_13">Nederlands</a></li>
	   	  	   	   <li><a href="#" title="Polish" name="14" id="lang_select_14">Polish</a></li>
	   	  	   	   <li><a href="#" title="Portuguese" name="15" id="lang_select_15">Portuguese</a></li>
	   	  	   	   <li><a href="#" title="Rom&#226;n&#259;" name="16" id="lang_select_16">Rom&#226;n&#259;</a></li>
	   	  	   	   <li><a href="#" title="Russian" name="17" id="lang_select_17">Russian</a></li>
	   	  	   	   <li><a href="#" title="Serbian" name="18" id="lang_select_18">Serbian</a></li>
	   	  	   	   <li><a href="#" title="Slovak" name="19" id="lang_select_19">Slovak</a></li>
	   	  	   	   <li><a href="#" title="Spanish" name="20" id="lang_select_20">Spanish</a></li>
	   	  	   	   <li><a href="#" title="Swedish" name="21" id="lang_select_21">Swedish</a></li>
	   	  	   	  	   	   <li><a href="#" title="Thai" name="24" id="lang_select_24">Thai</a></li>
	   	  	  </ul>
	 </div>
		</div>
</div>
</footer>
<div id="lights-overlay"></div>


<script type="text/javascript">
 var boyt_vay = {
	lights_off: "Işıkları Kapat",
	lights_on: "Işıkları Aç",
	validate_name: "Lütfen bir ad girin",
	validate_username: "Bir kullanıcı adı girin",
	validate_pass: "Bir şifre girin",
	validate_captcha: "Doğrulama kodunu girin",
	validate_email: "Geçerli bir e-posta adresi girin",
	validate_agree: "Kuralları kabul edin.",
	validate_name_long: "Adınız en az 2 karakterden oluşmalıdır",
	validate_username_long: "Kullanıcı adınız en az 2 karakterden oluşmalıdır",
	validate_pass_long: "Şifreniz en az 5 karakter uzunluğunda olmalıdır",
	validate_confirm_pass_long: "Yukarıdaki gibi aynı parolayı giriniz",
	choose_category: "Kategori Seç",
	validate_select_file: "Hiçbir dosya seçilmedi.",
	validate_video_title: "Bu video için bir başlık girin",
	please_wait: "Yükleniyor...",
	// upload video page
	swfupload_status_uploaded: "Uploaded",
	swfupload_status_pending: "Continue with the rest of the form.",
	swfupload_status_queued: "Queued",
	swfupload_status_uploading: "Uploading...",
	swfupload_file: "File",
	swfupload_btn_select: "Select",
	swfupload_btn_cancel: "Cancel",
	swfupload_status_error: "Error",
	swfupload_error_oversize: "Size of the selected file(s) is greater than allowed limit",
	swfupload_friendly_maxsize: "",
	upload_errmsg2: "Geçersiz dosya tipi",
	// playlist
	playlist_delete_confirm: "Are you sure you want to permanently delete this playlist?\n\nClick 'Cancel' to stop, 'OK' to delete.",
	playlist_delete_item_confirm: "You are about to remove this video from your playlist.\n\nClick 'Cancel' to stop, 'OK' to delete.",
	show_more: "Fazlasını Göster",
	show_less: "Show less",
	delete_video_confirmation: "Are you sure you want to delete this video?",
	browse_all: "Browse All",
	upload_error_unknown: "Unknown error occured"
 }
</script>
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
