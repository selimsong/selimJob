<?php
//include_once("validate.php");

$post_data = $GLOBALS["HTTP_RAW_POST_DATA"];
$xml       = simplexml_load_string($post_data);

$toUserName = $xml->ToUserName;
$fromUserName = $xml->FromUserName;
$MsgType       = $xml->MsgType;
$Content      = $xml->Content;
$MsgId        = $xml->MsgId;
//subscribe event
if ($msgType == 'event') {
	if ($xml->Event == 'subscribe') {
		replyText($fromUserName, $toUserName, '欢迎加入统一冰红茶，赶快上传一张你跑步的照片（竖版）就可以制作一张属于你自己的#祝福贺卡#海报，快来试试！');
	}
	exit();
}



if(1){
file_put_contents("wei_post.txt",  $post_data, FILE_APPEND);
file_put_contents("wei_test.txt",  $toUserName.'-'.$FromUserName.'-'.$MsgType.'-'.$Content.'-'.$MsgId, FILE_APPEND);
}



function replyText($fromUserName, $toUserName, $text)
{
	$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[text]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				</xml>";
				
	$resultStr = sprintf($textTpl, $toUserName, $fromUserName, time(), $text);
	echo $resultStr;
}