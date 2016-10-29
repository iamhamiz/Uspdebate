<?php

require_once('twitter_search_count_proxy.php');

// Twitter OAuth Config options
$oauth_access_token = '783684089043791872-y8cIbyhgo0u5zqJaYDUAh0cvEtc3DDM';
$oauth_access_token_secret = '07XcvuOPvy3sog9p3865TmmOchrR9TRX3yMPOGzvsS9OX';
$consumer_key = 'ottUo5lxaafP9lkOkD16LsACG';
$consumer_secret = '2NOvrucemq7uOpIqcI5Sbq2dWJuGUyWvYD6LmvfGMYMVmyQuW8';
$search = 'trump%20since%3A2016%2D10%2D04';
$type = 'mixed';
$count = 100;
$since_id = 782445573966364672 ;
$total = "";

$twitter_url = 'search/tweets.json';
$twitter_url .= '?q=' . $search;
$twitter_url .= '&result_type=' . $type;
$twitter_url .= '&count=' . $count;
$twitter_url .= '&since_id=' . $since_id;

// Create a Twitter Proxy object from our twitter_proxy.php class
$twitter_proxy = new TwitterProxy(
	$oauth_access_token,			// 'Access token' on https://apps.twitter.com
	$oauth_access_token_secret,		// 'Access token secret' on https://apps.twitter.com
	$consumer_key,					// 'API key' on https://apps.twitter.com
	$consumer_secret,				// 'API secret' on https://apps.twitter.com
	$search,												
	$type,
	$count,
	$since_id
);

// Invoke the get method to retrieve results via a cURL request
$response = $twitter_proxy->get($twitter_url);
/**
	$tweets = json_decode($response);
	
	// Last
	$position = (array) $tweets->statuses;
	$last = reset($position);
	
	// Count
	$total_temp = count($tweets->statuses);
	
	if(isset($last->id)) { // to avoid counting the last one 
	$total_temp -= 1;
	}
	
	$total += $total_temp;
	**/
	
	
echo $response;

?>