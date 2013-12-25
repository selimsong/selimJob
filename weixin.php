<?php
//include_once("validate.php");
$post_data = $GLOBALS["HTTP_RAW_POST_DATA"];
$xml       = simplexml_load_string($post_data);

$developerId  = $xml->ToUserName;
$sendUserId   = $xml->FromUserName;
$msgType      = $xml->MsgType;
$content      = $xml->Content;
$msgId        = $xml->MsgId;
//subscribe event
if ($msgType == 'event') {
	if ($xml->Event == 'subscribe') {
		replyText($sendUserId, $developerId, '发送“贺卡”，参加#2014，心愿潮动#贺卡，活动。1.发送  贺卡   参加活动
     2.上传照片
     3.发送祝福语
     4.收到祝福语言
');
		file_put_contents("wei_subscribe.txt",  $post_data, FILE_APPEND);
	}
	exit();
}

if ($msgType == 'text') {	
	 replyText($sendUserId, $developerId, '发送“贺卡”，参加#2014，心愿潮动#贺卡，活动。
  1.发送  贺卡   参加活动
     2.上传照片
     3.发送祝福语
     4.收到祝福语言');
	 exit();
}


if ($msgType == 'image') {
	 replyText($sendUserId, $developerId, '感谢您上传的照片');
     file_put_contents("wei_post.txt",  $post_data, FILE_APPEND);
	 exit();
}



if(1){
file_put_contents("wei_post.txt",  $post_data, FILE_APPEND);
file_put_contents("wei_test.txt",  $toUserName.'-'.$FromUserName.'-'.$MsgType.'-'.$Content.'-'.$MsgId, FILE_APPEND);
}



function replyText($toUserName, $fromUserName, $text)
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

