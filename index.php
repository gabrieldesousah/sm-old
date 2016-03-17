https://developers.google.com/youtube/iframe_api_reference#Example_Video_Player_Constructors

<?php
$pattern = "/youtu(be.com|.b)(\/v\/|\/watch\\?v=|e\/|\/watch(.+)v=)(.{11})/";
$subject = "https://www.youtube.com/watch?v=Lnpx4Mp1-_k&list=PLKw-VNfINob5Mi4Cjs4OV3z6wQvZNS869&index=1";
$matches = array();

// Executa nossa expressão
$resultado = preg_match($pattern, $subject, $matches);

if ($resultado === 1) {
    print "casou";
    var_dump($matches);

} else if ($resultado === 0) {
    print "não casou";
    var_dump($matches);

} else if ($resultado === false) {
    print "ocorreu um erro";

}
?>

<!DOCTYPE html>
<html>
  <body>
    <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
    <div id="player"></div>

    <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: '<?php echo $matches[4];?>',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
        player.getVideoUrl();
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
  var embedCode = event.target.getVideoEmbedCode();
  event.target.playVideo();
  if (document.getElementById('embed-code')) {
    document.getElementById('embed-code').innerHTML = embedCode;
  }
}

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 3000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script>
  </body>
</html>

