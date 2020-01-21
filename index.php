<?php
function curl($url) {
	$ch = @curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$head[] = "Connection: keep-alive";
	$head[] = "Keep-Alive: 300";
	$head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$head[] = "Accept-Language: en-us,en;q=0.5";
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
	@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
	$page = curl_exec($ch);
	curl_close($ch);
	return $page;
}
$link = json_decode(curl('https://cloud-api.yandex.net/v1/disk/public/resources/download?public_key='.urlencode('https://yadi.sk/i/'.$_GET['id'])));
$es = $_GET ['es'];
$en = $_GET ['en'];
$pt = $_GET ['pt'];
//$link = json_decode(curl('https://cloud-api.yandex.net/v1/disk/public/resources/download?public_key='.urlencode('https://yadi.sk/i/Ns1AlKPC3NfGzD')));
$video = $link->href;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>
<title>Pandrama.com</title>
<meta http-equiv="cache-control" content="max-age=0"/>
<meta http-equiv="cache-control" content="no-cache"/>
<meta name="referrer" content="no-referrer"/>
<meta http-equiv="expires" content="0"/>
<meta name="referrer" content="never"/>
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache"/>
<meta name="robots" content="noindex,nofollow"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="https://cdn.rawgit.com/ufilestorage/a/master/jquery-2.2.3.min.js"></script>
<script src="https://ssl.p.jwpcdn.com/player/v/8.6.2/jwplayer.js"></script>
<script>jwplayer.key="cLGMn8T20tGvW+0eXPhq4NNmLB57TrscPjd1IyJF84o=";</script>
<style type="text/css" media="screen">html,body{padding:0;margin:0;height:100%}#player{width:100%!important;height:100%!important;overflow:hidden;background-color:#000}</style>
</head>
<body>
    <script type="text/javascript">!function test() {
	try{
		!function cir(i)
		{
			( 1 !== ( "" + i / i).length || 0===i ) && function(){}.constructor("debugger")(),cir(++i);
		} (0)
	} catch(e) {
		setTimeout(test,500)
	}
}()</script>
<div id="player"></div>
<script type="text/javascript">
var videoPlayer = jwplayer("player");
videoPlayer.setup({
sources: [{file:"<?=$video?>",label: "720p",type: "video/mp4","default":"true"},{file:"<?=$video?>",label: "1080p",type: "video/mp4","default":"true"}],
 autostart: true,
  mute: false,
  aspectratio: "16:9",
image:'<?php echo ($urlJPG); ?>',
tracks: [{
			file: "<?php echo $es;?>",
			label: "Español",
			kind:  "captions",
			default: "true",
			},{
            file: "<?php echo $en;?>",
			label: "Español",
			kind:  "captions"
			},{
             file: "<?php echo $pt;?>",
			label: "Español",
			kind:  "captions"
			}],
	              captions: {
 color: "#f3f368",
 fontSize: 16,
 backgroundOpacity: 0,
  fontfamily: "Helvetica",
 edgeStyle: "raised"            
  },
   logo: {
        file: "https://3.bp.blogspot.com/-x00pShCecdE/XLqOEr07ixI/AAAAAAAAS9Y/eHLBzk5luac7Rt_MRUpDVc8jvLnLzeBywCLcBGAs/s1600/logopandrama.png",
        position: "top-left"
      },
			aboutlink:"https://pandrama.com",
			abouttext:"Pandrama.com",

});
videoPlayer.on("ready",function() {
		jwLogoBar.addLogo(videoPlayer);
	});
</script>
</body>
</html>