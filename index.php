<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome Voters</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="US Presidential Debate">
  <meta name="author" content="US Presidential Debate">
	<meta name="keywords"          content="nevertrump, cnn, foxnews, trumptrainwreck, politics, election2016, clintonnewsnetwork, freesyria, president, liberal, democrate, election, donaldtrump, hillaryclinton, godblessamerica, republican, wethepeople, constitution, trump2016, trumptrain, makeamericagreatagain, hillaryforprison2016, votetrump, trump, imwithher, trumpvshillary, wakeupamerica"/>

	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@USPDebate" />
	<meta name="twitter:creator" content="@USPDebate" />
	<meta property="og:url"   content="http://www.uspdebate.xyz" />
	<meta property="og:title" content="US Presidential Debate" />
	<meta property="og:description" content="Welcome to the twitter handle of USP Debate for all the latest update on US Presidential Debate." />
	<meta property="og:description"   content="US Presidential Debate - Choose your winner from Donald Trump VS Hillary Clinton on our website before the real action takes place" />
  	<meta property="og:image"         content="https://pbs.twimg.com/profile_images/784505431221686272/X1IPVFW2_bigger.jpg" />
	<meta property="og:type"       content="website" />
	<meta property="og:site_name"  content="US Presidential Debate" />

	<meta property="twitter:title" content="USP DEBATE" />
	<meta property="twitter:image" content="https://pbs.twimg.com/profile_images/784505431221686272/X1IPVFW2_bigger.jpg" />
	<meta property="twitter:site"  content="https://twitter.com/USPDebate" />
	<meta name="twitter:creator"   content="@USPDebate" />

  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="icon" type="image/png" href="./imgs/fav.ico">
  <link href="css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="js/jquery-1.11.1.min.js"></script>

	<script src="js/twitter_follower.js"></script>
	<script src="js/facebook_likes.js"></script>
	<script src="js/tweets_recent_search_d_t.js"></script>
	<script src="js/tweets_recent_search_h_c.js"></script>
        <link rel="stylesheet" href="css/slide-social-buttons.css">


  <?php require_once('useful.php');
  /**
  		require_once('connectvars.php');
	//for voter count
		$query1 = "SELECT * FROM `us_pre_debate_h` ";
		$result1 = $connection->query($query1);
		if(!$result1) die($connection->error);
		$h_v = $result1->fetch_array(MYSQLI_ASSOC);
		$h_c_etov = $h_v['h_c_vote'];

		$query2 = "SELECT * FROM `us_pre_debate_d` ";
		$result2 = $connection->query($query2);
		if(!$result2) die($connection->error);
		$d_v = $result2->fetch_array(MYSQLI_ASSOC);
		$d_t_etov = $d_v['d_t_vote'];
		**/
		$handleh = fopen("counterh.txt", "r");
		if($handleh){
		$counterh = ( int ) fread ($handleh,30) ;
		fclose ($handleh) ;
		$h_c_etov = $counterh;
		}
		 $handled = fopen("counterd.txt", "r");
		if($handled){
		$counterd = ( int ) fread ($handled,30) ;
		fclose ($handled) ;
		$d_t_etov = $counterd;
		}
	//for visitor count
		$handle = fopen("counter.txt", "r");
		if($handle){
		$counter = ( int ) fread ($handle,30) ;
		fclose ($handle) ;
		$counter++ ;
		$handle = fopen("counter.txt", "w" ) ;
		fwrite($handle,$counter) ;
		fclose ($handle);
		}
?>

</head>
<body>
<!-- For fb share button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<header class="navbar navbar-inverse text-center">
  <div class="col-md-6">
  <img class="img-responsive logo" src="imgs/p_e_2016.png" alt="President Election 2016">
</div>
<div class="col-md-6">
  <div class="counter">
  Visitors This Month<br/><span class="v_count"><?php echo $counter; ?>
  </span>
</div>
</div>
</header>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav d_t">
		<div align="center">
		<script type="text/javascript">
			$('.v_count').each(function () {
				$(this).prop('Counter',0).animate({
					Counter: $(this).text()
				}, {
					duration: 2000,
					easing: 'swing',
					step: function (now_n_t_d) {
						$(this).text(Math.ceil(now_n_t_d).toLocaleString());
					}
				});
			});
			function load_t_count(){
				var t_follower_h;
				var t_follower_d;
				$.ajax({
					url: 'twitter_d_t_follow.php',
					type: 'GET',
					success: function(responsed) {
						if (typeof responsed.errors === 'undefined' || responsed.errors.length < 1) {
								t_follower_d = parseInt(responsed.followers_count);
								$('#d_t_twitter_follow_count').html(t_follower_d);
								set_d_t_t_follow(t_follower_d);
						} else {
							$('#d_t_twitter_follow_count p:first').text('Response error');
						}
					},
					error: function(errors) {
						$('#d_t_twitter_follow_count p:first').text('Request error');
					}
				});
				$.ajax({
					url: 'twitter_h_c_follow.php',
					type: 'GET',
					success: function(responseh) {
						if (typeof responseh.errors === 'undefined' || responseh.errors.length < 1) {
								t_follower_h = parseInt(responseh.followers_count);
								$('#h_c_twitter_follow_count').html(t_follower_h);
								set_h_c_t_follow(t_follower_h);
						} else {
							$('#h_c_twitter_follow_count p:first').text('Response error');
						}
					},
					error: function(errors) {
						$('#h_c_twitter_follow_count p:first').text('Request error');
					}
				});
				function set_h_c_t_follow(t_f_h){
					t_follower_h = t_f_h;
					if(t_follower_d){
						get_t_f_per();
					}
				}
				function set_d_t_t_follow(t_f_d){
					t_follower_d = t_f_d;
					if(t_follower_h){
						get_t_f_per();
					}
				}
				function get_t_f_per(){
					total_t_follower = t_follower_h + t_follower_d;
					t_followerd_per = (t_follower_d / total_t_follower).toFixed(2);
					t_followd_per = t_followerd_per * 100;
					t_followh_per = 100 - t_followd_per;
					t_f_p_d = t_followd_per - (t_followd_per % 1);
					t_f_p_h = 100 - t_f_p_d;
					var $t_f_bar = $('<div></div>');
					$t_f_bar.append('<div class="progress-bar progress-bar-info progress-bar-striped active pp_t_d" id="progress_d_t_t_follower" role="progressbar" style="width:' + t_f_p_d + '%; height:30px;">#Trump - <span class="count_t_d">' +  t_f_p_d  + '</span>%</div><div class="progress-bar progress-bar-danger progress-bar-striped active pp_t_h" id="progress_h_c_t_follower" role="progressbar" style="width:' + t_f_p_h + '%; height:30px;">#Hillary - <span class="count_t_h">' + t_f_p_h + '</span>%</div>');
					$('.t_follower_bar').html($t_f_bar);
				}
			}
			function set_t_bar(){
				load_t_count();
				$('.count_t_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_t_h) {
							$('.count_t_h').text(Math.ceil(now_t_h));
							$('.pp_t_h').css( "width", Math.ceil(now_t_h) + '%' );
						}
					});
				});
				$('.count_t_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_t_d) {
							$('.count_t_d').text(Math.ceil(now_t_d));
							$('.pp_t_d').css( "width", Math.ceil(now_t_d) + '%' );
						}
					});
				});
			}
			function load_f_count(){
				var like_h;
				var like_d;
				var numberh;
				var numberd;
				$.ajax({
					url: 'https://graph.facebook.com/hillaryclinton/?fields=fan_count&access_token=EAAE8OdFLeEEBAGdlaL0rhSxLaonLyFVdwNM601mjgU00IDpZCUpvZCfIteuzxsZAf3y0RqnvlNXp14XHLuUrGPnl31KEIrAZCR3LF70E2cda9ks9wWy0HUizZC7PRv6ZAgj73x32KuE1wfsNM4pCyZAkFhBt394LZBwZD',
					type: 'GET',
					success: function(responseh) {
						if (typeof responseh.errors === 'undefined' || responseh.errors.length < 1) {
								likesh = parseInt(responseh.fan_count);
							$('#h_c_likes_count').html(likesh);
							set_h_c_likes(likesh);
						} else {
							$('#h_c_likes p:first').text('Response error');
						}
					},
					error: function(errors) {
						$('#h_c_likes p:first').text('Request error');
					}
				});
				$.ajax({
					url: 'https://graph.facebook.com/DonaldTrump/?fields=fan_count&access_token=EAAE8OdFLeEEBAGdlaL0rhSxLaonLyFVdwNM601mjgU00IDpZCUpvZCfIteuzxsZAf3y0RqnvlNXp14XHLuUrGPnl31KEIrAZCR3LF70E2cda9ks9wWy0HUizZC7PRv6ZAgj73x32KuE1wfsNM4pCyZAkFhBt394LZBwZD',
					type: 'GET',
					success: function(responsed) {
						if (typeof responsed.errors === 'undefined' || responsed.errors.length < 1) {
								likesd = parseInt(responsed.fan_count);
							$('#d_t_likes_count').html(likesd);
							set_d_t_likes(likesd);
						} else {
							$('#d_t_likes p:first').text('Response error');
						}
					},
					error: function(errors) {
						$('#d_t_likes p:first').text('Request error');
					}
				});
				function set_h_c_likes(lh){
					like_h = lh;
					if(like_d){
						get_f_per();
					}
				}
				function set_d_t_likes(ld){
					like_d = ld;
					if(like_h){
						get_f_per();
					}
				}
				function get_f_per(){
					total_likes = like_h + like_d;
					likesd_per = (like_d / total_likes).toFixed(2);
					l_p_d = likesd_per * 100;
					l_p_h = 100 - l_p_d;
					var $fb_l_bar = $('<div></div>');
					$fb_l_bar.append('<div class="progress-bar progress-bar-info progress-bar-striped active pp_f_d" id="progress_d_t_likes" role="progressbar" style="width:' + l_p_d + '%; height:30px;">#Trump - <span class="count_f_d">' +  l_p_d  + '</span>%</div><div class="progress-bar progress-bar-danger progress-bar-striped active pp_f_h" id="progress_h_c_likes" role="progressbar" style="width:' + l_p_h + '%; height:30px;">#Hillary - <span class="count_f_h">' + l_p_h + '</span>%</div>');
					$('.fb_likes_bar').html($fb_l_bar);
				}
			}
			function set_f_bar(){
				load_f_count();
				$('.count_f_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_f_h) {
							$('.count_f_h').text(Math.ceil(now_f_h));
							$('.pp_f_h').css( "width", Math.ceil(now_f_h) + '%' );
						}
					});
				});
				$('.count_f_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_f_d) {
							$('.count_f_d').text(Math.ceil(now_f_d));
							$('.pp_f_d').css( "width", Math.ceil(now_f_d) + '%' );
						}
					});
				});
			}
			function play(ch){
				var live_player = document.getElementById('player');
				var live_title = document.getElementById('live');
				if(live_title.value !== ch){
					switch(ch) {
						case 'bb':
							live_player.src = "http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/Ga3maNZ0x0w');?>";
							break;
						case 'pbs':
							live_player.src = "http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/IcNyCmBTJCY');?>";
							break;
						case 'fn':
							live_player.src = "http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/9ScCCwlEu-s');?>";
							break;
						case 'tm':
							live_player.src = "http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/FRlI2SQ0Ueg');?>";
							break;
						case 'wp':
							live_player.src = "http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/O5Td7DxSe5g');?>";
							break;
					}
				}
			}
			function set_i_f_count(){
				i_f_h_c = 2.4;
				i_f_d_t = 2.6;
				i_total_follower = i_f_h_c + i_f_d_t;
				i_follorwerd_per = (i_f_d_t / i_total_follower).toFixed(2);
				i_f_d = i_follorwerd_per * 100;
				i_f_h = 100 - i_f_d;
				var $i_f_bar = $('<div></div>');
				$i_f_bar.append('<div class="progress-bar progress-bar-info progress-bar-striped active pp_d" id="progress_d_t_i_f" role="progressbar" style="width:' + i_f_d + '%; height:30px;">#Trump - <span class="count_d">' +  i_f_d  + '</span>%</div><div class="progress-bar progress-bar-danger progress-bar-striped active pp_h" id="progress_h_c_i_f" role="progressbar" style="width:' + i_f_h + '%; height:30px;">#Hillary - <span class="count_h">' + i_f_h + '</span>%</div>');
				$('.i_follower_bar').html($i_f_bar);
				$('.count_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now2) {
							$('.count_h').text(Math.ceil(now2));
							$('.pp_h').css( "width", Math.ceil(now2) + '%' );
						}
					});
				});
				$('.count_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now1) {
							$('.count_d').text(Math.ceil(now1));
							$('.pp_d').css( "width", Math.ceil(now1) + '%' );
						}
					});
				});
			}
			function set_us_etov(){
				u_e_h_c = <?php echo $h_c_etov ; ?>;
				u_e_d_t = <?php echo $d_t_etov ; ?>;
				u_total_e = u_e_h_c + u_e_d_t;
				u_ed_per = (u_e_d_t / u_total_e).toFixed(2);
				u_e_d = u_ed_per * 100;
				u_e_h = 100 - u_e_d;
				u_e_p_d = u_e_d - (u_e_d % 1);
				u_e_p_h = 100 - u_e_p_d;
				$('#d_t_u_e_count').html(u_e_d_t);
				$('#h_c_u_e_count').html(u_e_h_c);
				var $u_e_bar = $('<div></div>');
				$u_e_bar.append('<div class="progress-bar progress-bar-info progress-bar-striped active pp_v_d" id="progress_d_t_i_f" role="progressbar" style="width:' + u_e_p_d + '%; height:30px;">#Trump - <span class="count_v_d">' +  u_e_p_d  + '</span>%</div><div class="progress-bar progress-bar-danger progress-bar-striped active pp_v_h" id="progress_h_c_i_f" role="progressbar" style="width:' + u_e_p_h + '%; height:30px;">#Hillary - <span class="count_v_h">' + u_e_p_h + '</span>%</div>');
				$('.u_etov_bar').html($u_e_bar);
				$('.count_v_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_v_d) {
							$(this).text(Math.ceil(now_v_d));
							$('.pp_v_d').css( "width", Math.ceil(now_v_d) + '%' );
						}
					});
				});
				$('.count_v_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 10000,
						easing: 'swing',
						step: function (now_v_h) {
							$(this).text(Math.ceil(now_v_h));
							$('.pp_v_h').css( "width", Math.ceil(now_v_h) + '%' );
						}
					});
				});
			}
			function h_d_c_t(v) {
				if (typeof user_u_e_h_c == 'undefined' && typeof user_u_e_d_t == 'undefined'){
				user_u_e_h_c = <?php echo $h_c_etov ; ?>;
				user_u_e_d_t = <?php echo $d_t_etov ; ?>;
				}

				if(v == 'c_h'){
					$.ajax({
						method: 'POST',
						url: 'add_n_v_c_h.php',
						data: {'v_c_h' : "etov_c_h"}
					});
					user_u_e_h_c += 1;
					$("#vote_now_h").unbind('click');
					$('#s_h_c').html(' You have Voted <span style="color:#E0162B"> Hillary </span>');
					$('#vote_now_d').hide();
				}
				else if(v == 't_d'){
					$.ajax({
						method: 'POST',
						url: 'add_n_v_t_d.php',
						data: {'v_t_d' : "etov_t_d"}
					});
					user_u_e_d_t += 1;
					$("#vote_now_d").unbind('click');
					$('#s_d_t').html(' You have Voted <span style="color:#0052A5"> Trump </span> ');
					$('#vote_now_h').hide();
				}

				user_u_total_e = user_u_e_h_c + user_u_e_d_t;

				user_u_ed_per = (user_u_e_d_t / user_u_total_e).toFixed(2);

				user_u_e_d = user_u_ed_per * 100;
				user_u_e_h = 100 - user_u_e_d;

				user_u_e_p_d = user_u_e_d - (user_u_e_d % 1);
				user_u_e_p_h = 100 - user_u_e_p_d;

				$('#you_winner_count_d').html(user_u_e_d_t);
				$('#you_winner_count_h').html(user_u_e_h_c);

				var $user_u_e_bar = $('<div></div>');
				$user_u_e_bar.append('<div class="progress-bar progress-bar-info progress-bar-striped active" id="progress_d_t_i_f" role="progressbar" style="width:' + user_u_e_p_d + '%; height:30px;"><p>#Trump - <span >' +  user_u_e_p_d  + '</span>%</p></div><div class="progress-bar progress-bar-danger progress-bar-striped active" id="progress_h_c_i_f" role="progressbar" style="width:' + user_u_e_p_h + '%; height:30px;"><p>#Hillary - <span ">' + user_u_e_p_h + '</span>%</p></div>');

				$('.u_etov_bar').html($user_u_e_bar);

			}
			function startBattle(){
				var battle_field = document.getElementById('battle_field');
				var start_battle = document.getElementById('start_battle');
				if(battle_field.style.display !== "none"){
					battle_field.style.display = "none";
				} else {
					battle_field.style.display = "";
					start_battle.style.display = "none";
				}
				$('.count_n_i').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_i) {
							$(this).text(Math.ceil(now_n_i));
						}
					});
				});
				$('.count_n_v_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_v_d) {
							$(this).text(Math.ceil(now_n_v_d).toLocaleString());
						}
					});
				});
				$('.count_n_v_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_v_h) {
							$(this).text(Math.ceil(now_n_v_h).toLocaleString());
						}
					});
				});
				$('.count_n_t_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_t_d) {
							$(this).text(Math.ceil(now_n_t_d).toLocaleString());
						}
					});
				});
				$('.count_n_t_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_t_h) {
							$(this).text(Math.ceil(now_n_t_h).toLocaleString());
						}
					});
				});
				$('.count_n_f_d').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_f_d) {
							$(this).text(Math.ceil(now_n_f_d).toLocaleString());
						}
					});
				});
				$('.count_n_f_h').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).text()
					}, {
						duration: 9000,
						easing: 'swing',
						step: function (now_n_f_h) {
							$(this).text(Math.ceil(now_n_f_h).toLocaleString());
						}
					});
				});
			}
		</script>
			<img width="200px" class="img-thumbnail img-responsive" src="imgs/d_t.jpg" alt="Donald Trump">
			<h3><img width="30px" class="img-responsive hlogo" src="imgs/republican_logo.png" alt="Logo of Donald Trump Party"><span style="color:#0052A5;padding-bottom:10px;border-bottom:1px solid #0052A5;">Donald Trump</span></h3>
		</div><br>
      <h4>Popular Tweets on <span style="color:#0052A5">Donald Trump</span></h4>
		<script src="js/tweets_search_d_t.js"></script>
	  <div class="d_t_tweets-container">
			<p>Loading...</p>
		</div>
    </div>
    <div class="col-sm-8 text-left middle">
      <h1 class="text-center">Welcome Voters</h1>
	  <br>
  	<div class="col-md-12 text-center">
    <div class=" video-container">
  	<iframe id="player" width="640" height="360" src="http://www.youtube.com/embed/<?php echo get_youtubeid('https://www.youtube.com/embed/IcNyCmBTJCY');?>" frameborder="0" allowfullscreen></iframe>
  </div>
    <input type="hidden" id="live" value="" />
		<br><br>
		<a href="javascript:;" class="btn btn-default btn-lg" onClick="play('pbs')" id="playBtn1">PBS</a>
		<a href="javascript:;" class="btn btn-default btn-lg" onClick="play('fn')" id="playBtn2">Fox News</a>
		<a href="javascript:;" class="btn btn-default btn-lg" onClick="play('bb')" id="playBtn3">Bloomberg</a>
		<a href="javascript:;" class="btn btn-default btn-lg" onClick="play('tm')" id="playBtn4">NBC News</a>
		<a href="javascript:;" class="btn btn-default btn-lg" onClick="play('wp')" id="playBtn5">Washington Post</a>
    </div>
	  	<div class="col-sm-12 text-center battle">
		  <h3>#SOCIAL MEDIA BATTLE</h3>
		  <h5><span style="color:#0052A5">Donald Trump</span> VS <span style="color:#E0162B">Hillary Clinton</span></h5>
		  <div id="battle_field" style="display:none;">
		  	<br>
			<h4>Twitter Followers</h4>
			<div id="t_follower_counter">
				<span style="float:left; font-size:24px;" class="count_n_t_d" id="d_t_twitter_follow_count">Loading...</span> <span style="float:right; font-size:24px;" class="count_n_t_h" id="h_c_twitter_follow_count">Loading...</span><br><br>
			</div>
			<div class="t_follower_bar">
			</div>
			<br><br><br>
			<h4>Facebook Likes</h4>
			<div id="f_flikes_counter">
				<span style="float:left; font-size:24px;" class="count_n_f_d" id="d_t_likes_count">Loading...</span> <span style="float:right; font-size:24px;" class="count_n_f_h" id="h_c_likes_count">Loading...</span><br><br>
			</div>
			<div class="fb_likes_bar">
			</div>
			<br><br><br>
			<h4>Instagram Followers</h4>
			<div id="i_follower_counter">
				<span style="float:left; font-size:24px;"><span class="count_n_i" id="d_t_insta_follow_count">2</span>.6 M</span> <span style="float:right; font-size:24px;"><span class="count_n_i" id="h_c_insta_follow_count">2</span>.4 M</span><br><br>
			</div>
			<div class="i_follower_bar">
			</div>
			<br><br><br><br>
			<h3>Choose your Winner</h3>
			<div id="you_winner_counter">
				<span style="float:left; font-size:24px;" class="count_n_v_d" id="you_winner_count_d"><?php echo $d_t_etov ; ?></span> <span style="float:right; font-size:24px;" class="count_n_v_h" id="you_winner_count_h"><?php echo $h_c_etov ; ?></span><br><br>
			</div>
			<div class="u_etov_bar">
			</div>
			<br><br><br>
			<div>
				<label onClick="h_d_c_t('t_d');" id="vote_now_d" for="a_d_t"> <span id="s_d_t"> <img width="25px" height="22px" src="imgs/republican_logo.png" alt="Logo of Donald Trump Party"> Vote for  <span style="color:#0052A5"> Donald Trump </span> <br><br> <span style="color:#0052A5"> Make America Great Again! </span> </span> </label>
				<label onClick="h_d_c_t('c_h');" id="vote_now_h" for="a_h_c"> <span id="s_h_c"> <img width="25px" height="23px" src="imgs/democratic_logo.png" alt="Logo of Hillary Clinton Party"> Vote for <span style="color:#E0162B"> Hillary Clinton </span> <br><br> <span style="color:#E0162B"> Hillary For America </span> </span> </label>
			</div>
		  </div>
		  <div id="start_battle_btn"><br><br>
			<a href="javascript:;" class="btn btn-default btn-lg" onClick="startBattle(); set_i_f_count(); set_us_etov(); set_f_bar(); set_t_bar();" id="start_battle" style="background-color:#0052A5; color:#FFFFFF;">Start Battle</a>
		  </div>
		  <br><br>
		</div>
		<br>
		<div class="col-md-12 text-center">
			<h2>What people are Tweeting about </h2>
		</div>
		<div class="col-md-6" id="d_t_recent_tweets">
			<h3 align="center"><span style="color:#0052A5">Donald Trump </span></h3>
			<a href="https://twitter.com/intent/tweet?button_hashtag=trump" class="twitter-hashtag-button" data-show-count="true">Tweet #trump</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			<br><br>
			<div class="d_t_recent_tweets-container">
				<p>Wait for few seconds <br><br>Loading...</p>
			</div>
		</div>
		<div class="col-md-6" id="h_c_recent_tweets">
			<h3 align="center"><span style="color:#E0162B">Hillary Clinton </span></h3>
			<a href="https://twitter.com/intent/tweet?button_hashtag=hillary" class="twitter-hashtag-button" data-show-count="true">Tweet #hillary</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			<br><br>
			<div class="h_c_recent_tweets-container">
				<p>Wait for few seconds <br><br>Loading...</p>
			</div>
		</div>
    </div>
    <div class="col-sm-2 sidenav h_c">
		<div align="center">
			<img width="200px" class="img-thumbnail img-responsive" src="imgs/h_c.jpg" alt="Hillary Clinton">
			<h3><img width="30px" class="img-responsive dlogo" src="imgs/democratic_logo.png" alt="Logo of Hillary Clinton Party"><span style="color:#E0162B;padding-bottom:10px;border-bottom:1px solid #E0162B;">Hillary Clinton</span></h3>
		</div><br>
      	<h4>Popular Tweets on <span style="color:#E0162B">Hillary Clinton</span></h4>
		<script src="js/tweets_search_h_c.js"></script>
	  	<div class="h_c_tweets-container">
			<p>Loading...</p>
		</div>
    </div>
  </div>
  <br><br>
</div>

<footer class="container-fluid text-center">
	<div class="footer-col col-md-4">
		<!-- Like -->
		<div class="slide-social">
			<div class="ss-button">
				<div class="fb-like" data-href="https://www.facebook.com/USP-Debate-291751487878579/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			</div>
			<div class="facebook-bg ss-icon">
				<i class="fa fa-facebook"></i>
			</div>
			<div class="facebook-bg ss-slide">Like</div>
		</div>
	</div>
	<div class="footer-col col-md-4">
		<div id="i_will_vote_btn">
		Register on &nbsp;&nbsp;
		<a href="https://www.iwillvote.com" target="_blank"><button type="button" class="btn btn-default btn-lg" style="color:#FFFFFF; text-decoration:none;"> I Will Vote </button></a>
		<!--
		<div class="modal fade" id="iWillVotel" role="dialog">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title"><span style="color:#0052A5;">Register on I Will Vote</span></h4>
				</div>
				<div class="modal-body" style="height:800px;">
				  <iframe src="https://www.iwillvote.com" id="diplay_i_will_vote" width="100%" height="100%" frameborder="0"></iframe>
				</div>
			  </div>
			</div>
		 </div>
		 -->
		</div>
    <div class="powered">
      <a href="http://www.twitter.com/iamhamiz" target="_blank"><img src="imgs/ni.png" alt="Nasir Iqbal" class="ni img-circle"></a><a href="http://www.twitter.com/rahatullah_19" target="_blank"><img src="imgs/ra.png" alt="Rahatullah Ansari" class="ra img-circle"></a>
    </div>
	</div>
	<div class="footer-col col-md-4">
		<!-- Tweet -->
		<div class="slide-social">
			<div class="ss-button">
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.uspdebate.xyz"  data-via="USPDebate" data-related="Donald J Trump, Hillary Clinton" data-hashtags="USPDebate, trumpvshillary" data-text="Choose your winner on our website before the real action takes place.">Tweet</a>
			</div>
			<div class="twitter-bg ss-icon">
				<i class="fa fa-twitter"></i>
			</div>
			<div class="twitter-bg ss-slide">tweet</div>
		</div>
	</div>
</footer>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85455232-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
