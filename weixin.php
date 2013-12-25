<?php
//include_once("validate.php");
$post_data = $GLOBALS["HTTP_RAW_POST_DATA"];
$xml       = simplexml_load_string($post_data);

$developerId  = $xml->ToUserName;
$sendUserId   = $xml->FromUserName;
$msgType      = $xml->MsgType;
$msgId        = $xml->MsgId;
//subscribe event
if ($msgType == 'event') {
	if ($xml->Event == 'subscribe') {
			$description = "制作你的#2014,心愿潮动#贺卡    仅需三步，轻松制作: 1.即刻在冰红茶对话框中上传一张你想发送的朋友的照片。 2.输入你对朋友在新的一年的祝愿。 3.获取专属于你的#新年新潮#贺卡。";
	        replyTextAndImg($sendUserId, $developerId, '制作你的#2014,心愿潮动#贺卡', $description, 'http://115.29.49.54/intro.jpg', '');
	}
	exit();
}


if(!empty($msgType)){  //create the connection
$m = new mongoClient('mongodb://127.0.0.1', array());
$db = $m->wxin;
$collection = $db->users;
$_count  = $collection->count(array('sendUserId'=> "$sendUserId", 'updateData' => date('d')));
}


if ($msgType == 'text') {
     $content      = $xml->Content;
	 if($_count<1){
		 $doc = array('developerId' => "$developerId", 'sendUserId' => "$sendUserId", 'content'=> "$content", 'updateData' => date('d'), 'updatetime' => time());
		 $collection->insert($doc);
	 }else{
	     $newContent  = array('$set' => array('content' => "$content"));
         $collection->update(array('sendUserId' => "$sendUserId", 'updateData' => date('d')),  $newContent);
	 }
	 replyText($sendUserId, $developerId, '发送“贺卡”，参加#2014，心愿潮动#贺卡，活动。');
	 exit();

}


if ($msgType == 'image') {
	 $picUrl = $xml->PicUrl;
	 $mediaId = $xml->mediaId;
	 
	if($_count>0){
	   replyText($sendUserId, $developerId, ' 我们将恢复您的贺卡，活动。');
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $picUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
	curl_close($ch);
	$content_type_arr = explode('/', $content_type);
	$ret = file_put_contents('./img/'.$sendUserId.'.'.$content_type_arr[1], $output); // save picture
	unset($output);
	}
     //file_put_contents("wei_post.txt",  $post_data, FILE_APPEND);
	 exit();
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

function replyTextAndImg($toUserName, $fromUserName, $title, $description, $picUrl='', $url='', $count=1)
{
  if(1 == $count){
    $textTpl = "<xml>
	                <ToUserName><![CDATA[%s]]></ToUserName>
	                <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>1</ArticleCount>
                    <Articles>
					<item>
					<Title><![CDATA[%s]]></Title> 
					<Description><![CDATA[%s]]></Description>
					<PicUrl><![CDATA[%s]]></PicUrl>
					<Url><![CDATA[%s]]></Url>
					</item>
					</Articles>
               </xml>";			
	$resultStr = sprintf($textTpl, $toUserName, $fromUserName, time(), $title, $description, $picUrl, $url);
  }else{
      $textTpl = "<xml>
	                <ToUserName><![CDATA[%s]]></ToUserName>
	                <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[news]]></MsgType>
					<ArticleCount>2</ArticleCount>
                    <Articles>
					<item>
					<Title><![CDATA[%s]]></Title> 
					<Description><![CDATA[%s]]></Description>
					<PicUrl><![CDATA[%s]]></PicUrl>
					<Url><![CDATA[%s]]></Url>
					</item>
					<item>
					<Title><![CDATA[%s]]></Title> 
					<Description><![CDATA[%s]]></Description>
					<PicUrl><![CDATA[%s]]></PicUrl>
					<Url><![CDATA[%s]]></Url>
					</item>
					</Articles>
               </xml>";			
	$resultStr = sprintf($textTpl, $toUserName, $fromUserName, time(),  $title, $description, $picUrl, $url,$title, '我们飞啦', '', '');
  
  
  
  
  }
	echo $resultStr;
}


// $description = "制作你的#2014,心愿潮动#贺卡    仅需三步，轻松制作: 1.即刻在冰红茶对话框中上传一张你想发送的朋友的照片。 2.输入你对朋友在新的一年的祝愿。 3.获取专属于你的#新年新潮#贺卡。";
//replyTextAndImg($sendUserId, $developerId, '制作你的#2014,心愿潮动#贺卡', $description, 'http://115.29.49.54/intro.jpg', '',2);