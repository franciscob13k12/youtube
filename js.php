 

<!DOCTYPE html>
<html>
<head>
<title>HTML Video Tag Example</title>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<style>
#stock-play-btn {margin: 0;padding: 0;min-width: 100%;width: 100%;max-width: 100%;min-height: 100%;height: 100%;max-height: 100%;overflow: hidden;}
#holder {position:relative;float:left;}
</style>
<script>
var tag = document.createElement('script');
tag.src = "//www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;

onYouTubeIframeAPIReady = function () {
    player = new YT.Player('stock-video', {
        height: '854',
        width: '480',
        videoId: '_gHS6bdYt00',  // youtube video id
        playerVars: {
            'autoplay': 0,
            'rel': 0,
            'showinfo': 0,
        },
        events: {
            'onStateChange': onPlayerStateChange,
	    'onReady': function (e) {
                    e.target.mute();
                    e.target.setVolume(50);      // YOU CAN SET VALUE TO 100 FOR MAX VOLUME.
                }

        }
    });
}

onPlayerStateChange = function (event) {
    if (event.data == YT.PlayerState.ENDED) {
        $('#stock-play-btn').fadeIn('normal');
    }
}

$(document).on('click', '#stock-play-btn', function () {
    $(this).fadeOut('normal');
    player.playVideo();
});
</script>
</head>
<body>
  
<div id="holder">
<div id="stock-video" style="opacity: 0.01;"></div>
<a href="javascript:void(0);" id="stock-play-btn" class="player-icon">FECHAR</a>
</div>
</body>
</html>
