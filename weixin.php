<?php
//include_once("validate.php");

$post_data = $GLOBALS["HTTP_RAW_POST_DATA"];
$xml       = simplexml_load_string($post_data);

$toUserName = $xml->ToUserName;
$FromUserName = $xml->FromUserName;
$MsgType       = $xml->MsgType;
$Content      = $xml->Content;
$MsgID        = $xml->MsgID;
if(1){
file_put_contents("wei_post.txt",  $_POST, FILE_APPEND);
file_put_contents("wei_test.txt",  $toUserName.'-'.$FromUserName.$MsgType.$Content.MsgID, FILE_APPEND);
}