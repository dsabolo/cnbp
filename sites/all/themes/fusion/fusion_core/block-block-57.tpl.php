<?php
$video = views_embed_view('video_home', 'block_2');
//$video = str_replace('true%20','false%20',$video);

$video = str_replace('autoPlay%27:%20true','autoPlay%27:%20false',$video);
$video = str_replace('time%27:%20true','time%27:%20false',$video);
$video = str_replace('autoBuffering%27:%20false','autoBuffering%27:%20true',$video);
$video = str_replace('width="640" height="480"','width="228" height="161"',$video);
$video = str_replace('889aa4','cccccc',$video);
$video = str_replace('6c9cbc','cccccc',$video);
$video = str_replace('015b7a','cccccc',$video);

//$video = str_replace('name="play"              value="true"', 'name="play"              value="false"', $video);
print($video);
