<?php

ini_set('display_errors','1');
error_reporting(E_ALL);

/***Set up the Twitter OAuth API Keys below***/

//Enter your Consumer key within the quotes.
define("CONSUMER_KEY","Dd8u0frmU63J6pgFvfMDJltiH");

//Enter your Consumer secret within the quotes.
define("CONSUMER_SECRET","8ENZDQuURj7X8s8pDZkuZgYVk6afMvexCP79oFs8lVn2ZTfbLe");

//Enter your Access Token within the quotes.
define("TOKEN","2321860512-PyGrJTWh3YpMbUv8kCd9XXmLlPd0JAGtgaLV7lX");

//Enter your Access Token Secret within the quotes.
define("TOKEN_SECRET","cgw8UDXtVeu5Z61dxxzOtjwPiENELbDboDpyCEcu5lSJ9");

/*
* function to get user timeline, does not require oAuth.
* @param string $user for username
* @param string $include_retweet, whether to include retweet or not.
* @param int $count, number of tweets to return.
*/
function truethemes_get_twitter_timeline($user,$include_retweet='true',$count){
$token = TOKEN;
$token_secret = TOKEN_SECRET;
$consumer_key = CONSUMER_KEY;
$consumer_secret = CONSUMER_SECRET;
$user = 'trump';
$include_retweet='true';
$count = '100	';

$host = 'api.twitter.com';
$method = 'GET';
$path = '/1.1/search/tweets.json'; // api call path

$query = array( // query parameters
    'q' => '#trump',
	'result_type' => 'recent',
    'count' => 5
);

$oauth = array(
    'oauth_consumer_key' => $consumer_key,
    'oauth_token' => $token,
    'oauth_nonce' => (string)mt_rand(), // a stronger nonce is recommended
    'oauth_timestamp' => time(),
    'oauth_signature_method' => 'HMAC-SHA1',
    'oauth_version' => '1.0'
);

$oauth = array_map("rawurlencode", $oauth); // must be encoded before sorting
$query = array_map("rawurlencode", $query);

$arr = array_merge($oauth, $query); // combine the values THEN sort

asort($arr); // secondary sort (value)
ksort($arr); // primary sort (key)

// http_build_query automatically encodes, but our parameters
// are already encoded, and must be by this point, so we undo
// the encoding step
$querystring = urldecode(http_build_query($arr, '', '&'));

$url = "https://$host$path";

// mash everything together for the text to hash
$base_string = $method."&".rawurlencode($url)."&".rawurlencode($querystring);

// same with the key
$key = rawurlencode($consumer_secret)."&".rawurlencode($token_secret);

// generate the hash
$signature = rawurlencode(base64_encode(hash_hmac('sha1', $base_string, $key, true)));

// this time we're using a normal GET query, and we're only encoding the query params
// (without the oauth params)
$url .= "?".http_build_query($query);
$url=str_replace("&amp;","&",$url); //Patch by @Frewuill

$oauth['oauth_signature'] = $signature; // don't want to abandon all that work!
ksort($oauth); // probably not necessary, but twitter's demo does it

// also not necessary, but twitter's demo does this too
//function add_quotes($str) { return '"'.$str.'"'; }
//$oauth = array_map("add_quotes", $oauth);

// this is the full value of the Authorization line
$auth = "OAuth " . urldecode(http_build_query($oauth, '', ', '));

// if you're doing post, you need to skip the GET building above
// and instead supply query parameters to CURLOPT_POSTFIELDS
$options = array( CURLOPT_HTTPHEADER => array("Authorization: $auth"),
                  //CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_HEADER => false,
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false);         
                  
                  

// do our business
$feed = curl_init();
curl_setopt_array($feed, $options);
$json = curl_exec($feed);
curl_close($feed);

$twitter_data = json_decode($json);

return $twitter_data;
}

/*
* function to make twitter mention, link, hashtags, clickable.
* original script from http://www.snipe.net/2009/09/php-twitter-clickable-links/
*/
function truethemes_twitterify($ret) {
  $ret = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t< ]*)#", "\\1<a href=\"\\2\" target=\"_blank\">\\2</a>", $ret);
  $ret = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r< ]*)#", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
  $ret = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" target=\"_blank\">@\\1</a>", $ret);
  $ret = preg_replace("/#(\w+)/", "<a href=\"http://search.twitter.com/search?q=\\1\" target=\"_blank\">#\\1</a>", $ret);
return $ret;
}


/**
 * Determines the difference between two timestamps.
 *
 * The difference is returned in a human readable format such as "1 hour",
 * "5 mins", "2 days".
 *
 * @since 1.5.0
 *
 * @param int $from Unix timestamp from which the difference begins.
 * @param int $to Optional. Unix timestamp to end the time difference. Default becomes time() if not set.
 * @return string Human readable time difference.
 */
 
	// Constants for expressing human-readable intervals
	// in their respective number of seconds.
 	define( 'MINUTE_IN_SECONDS', 60 );
 	define( 'HOUR_IN_SECONDS',   60 * MINUTE_IN_SECONDS );
 	define( 'DAY_IN_SECONDS',    24 * HOUR_IN_SECONDS   );
	define( 'WEEK_IN_SECONDS',    7 * DAY_IN_SECONDS    );
 	define( 'YEAR_IN_SECONDS',  365 * DAY_IN_SECONDS    ); 
 
function human_time_diff( $from, $to = '' ) {
	if ( empty( $to ) )
		$to = time();
	$diff = (int) abs( $to - $from );
	if ( $diff <= HOUR_IN_SECONDS ) {
		$mins = round( $diff / MINUTE_IN_SECONDS );
		if ( $mins <= 1 ) {
			$mins = 1;
		}
		/* translators: min=minute */
		$since = sprintf('%s mins', $mins );
	} elseif ( ( $diff <= DAY_IN_SECONDS ) && ( $diff > HOUR_IN_SECONDS ) ) {
		$hours = round( $diff / HOUR_IN_SECONDS );
		if ( $hours <= 1 ) {
			$hours = 1;
		}
		$since = sprintf('%s hours', $hours);
	} elseif ( $diff >= DAY_IN_SECONDS ) {
		$days = round( $diff / DAY_IN_SECONDS );
		if ( $days <= 1 ) {
			$days = 1;
		}
		$since = sprintf('%s days', $days );
	}
	return $since;
}


/*
* function to print tweet.
*/

function truethemes_print_twitter_timeline($retweets='true',$num=5,$user){
$token = TOKEN;
$token_secret = TOKEN_SECRET;
$consumer_key = CONSUMER_KEY;
$consumer_secret = CONSUMER_SECRET;
if(empty($token) || empty($token_secret) || empty($consumer_key) || empty($consumer_secret)){
        $html = 'Error - Missing API keys. Please setup Twitter oAuth API keys in latest-tweets.php';
        echo $html;
}else{
  		
	if($retweets == 'false'){
	$retweets = 0;
	}
	
	$twitter_status = truethemes_get_twitter_timeline($user,$retweets,$num);
	print_r($twitter_status);
	//$statuses = $twitter_status->statuses;
	$html = '<ul class="twitterList">';
	foreach(statuses as $status){
	$html .= "<li><span>".truethemes_twitterify($status['text'])."</span><br/>";
	$html .= '<span class="tweet_days">['.human_time_diff(strtotime($status['created_at'])).' ago]</span></li>';
	}
	$html.="</ul>";
	echo $html;
	}

}

truethemes_print_twitter_timeline('true', 5, 'Trump');
?>