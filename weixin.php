<?php
//include_once("validate.php");

$post_data = $GLOBALS["HTTP_RAW_POST_DATA"];
$xml       = simplexml_load_string($post_data);

$toUserName = $xml->ToUserName;
$FromUserName = $xml->FromUserName;
$MsgTyp       = $xml->MsgTyp;
$Content      = $xml->Content;
if(1){
file_put_contents("wei_post.txt",  $GLOBALS["HTTP_RAW_POST_DATA"], FILE_APPEND);
file_put_contents("wei_test.txt",  $toUserName.'-'.$FromUserName.$MsgTyp.$Content, FILE_APPEND);
}