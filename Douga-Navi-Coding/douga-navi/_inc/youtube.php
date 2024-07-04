<?php
// YouTube IFrame APIを読み込む
?>
<script>
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// プレイヤーを保持する変数
var players = [];

function onYouTubeIframeAPIReady() {
 // プレイヤーが準備できたら呼び出される関数
 function onPlayerReady(event) {
  // 自動再生を防ぐためにこの行をコメントアウト
  // event.target.playVideo();
 }

 // 動画ごとにプレイヤーを作成
 var videoElements = document.querySelectorAll('.youtube-player');
 videoElements.forEach(function(videoElement) {
  var videoId = videoElement.getAttribute('data-video-id');
  var player = new YT.Player(videoElement, {
   height: '315',
   width: '560',
   videoId: videoId,
   playerVars: {
    'rel': 0,
    'showinfo': 1,
    'loop': 1,
    'controls': 1, // コントロールを表示
    'playlist': videoId
   },
   events: {
    'onReady': onPlayerReady
   }
  });
  players.push(player);
 });
}
</script>
<?php

// カスタムフィールド 'info_movie' から YouTube URL の文字列を取得
$youtube_url_string = get_field('info_movie'); // カンマ区切りのURL文字列

if ($youtube_url_string) {
   // カンマ区切りのURL文字列を配列に変換
   $youtube_urls = explode(',', $youtube_url_string);

   foreach ($youtube_urls as $index => $youtube_url) {
      $youtube_url = trim($youtube_url); // 余分な空白を削除
      if ($youtube_url) {
         // URLが短縮URLかどうかをチェックして変換
         if (strpos($youtube_url, 'youtu.be') !== false) {
            $video_id = substr(parse_url($youtube_url, PHP_URL_PATH), 1);
         } elseif (strpos($youtube_url, 'youtube.com/watch') !== false) {
            $parsed_url = wp_parse_url($youtube_url);
            parse_str($parsed_url['query'], $query);
            $video_id = $query['v'];
         } else {
            $video_id = '';
         }

         if ($video_id) {
?>
<div id="player-<?php echo $index; ?>" class="youtube-player" data-video-id="<?php echo esc_js($video_id); ?>"></div>
<?php
         } else {
            echo '<p>有効なYouTube URLではありません。</p>';
         }
      } else {
         echo '<p>カスタムフィールドからURLが取得できませんでした。</p>';
      }
   }
} else {
   echo '<p>カスタムフィールドからURLが取得できませんでした。</p>';
}
?>