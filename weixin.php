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
		replyText($fromUserName, $toUserName, '��ӭ����ͳһ����裬�Ͽ��ϴ�һ�����ܲ�����Ƭ�����棩�Ϳ�������һ���������Լ���#ף���ؿ�#�������������ԣ�');
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