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
			 $description = "新年到了，小伙伴们是不是抑制不住要给大伙儿发个祝福呢？最酷的莫过于自己炮制一张贺卡，为TA送去2014最潮酷的祝福！祝TA们马上走红运！";
	        replyTextAndImg($sendUserId, $developerId, '炮制＃马上你就红＃新年贺卡', $description, 'http://115.29.49.54/activity.jpg', 'http://tongyi.mei94.com/page');
	}
	exit();
}
if(!empty($msgType)){  //create the connection
$m = new mongoClient('mongodb://127.0.0.1', array());
$db = $m->wxin;
$collection = $db->users;
$_count  = $collection->count(array('sendUserId'=> "$sendUserId", 'updateData' => date('d')));
}
if ($msgType == 'image') {
	$picUrl = $xml->PicUrl;
	$mediaId = $xml->MediaId;
	$time = time();
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $picUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	$content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
	curl_close($ch);
	$content_type_arr = explode('/', $content_type);
	$picName = $sendUserId.'_'.$time.'.'.$content_type_arr[1];
	$ret = file_put_contents('./img/'.$picName, $output);  
	unset($output);
    list($width, $height) = getimagesize('./img/'.$picName);

	$im_big = new Imagick('./img/'.$picName);
	$h = NULL;
	$_width = $width;
    $_height = $height;
	if ($_width > 420) {
		$h = $_height*(420/$_width);
		$im_big->scaleImage(420, $h, false);
		$_width = 420;
	}
	if(!empty($h)){
	   $_height = $h;
	}
	if ($_height > 800) {
		$w = $_width*(800/$_height);
		$im_big->scaleImage($w, 800, false);
	}
    $im_big->writeImage('./img/'.'big'.$picName);
	$im_big->clear();

	$im = new Imagick('./img/'.$picName);
	$h = NULL;
	if ($width > 160) {
		$h = $height*(160/$width);
		$im->scaleImage(160, $h, false);
		$width = 160;
	}
	if(!empty($h)){
	   $height = $h;
	}
	if ($height > 150) {
		$w = $width*(150/$height);
		$im->scaleImage($w, 150, false);
	}
	$im->writeImage('./img/'.'small'.$picName);
	$im->clear();

	if($_count<1){
		$doc = array('developerId' => "$developerId", 'sendUserId' => "$sendUserId", 'picUrl'=> "$picUrl", 'picName' => "$picName", 'mediaId'=> "$mediaId",'flg'=>'1' , 'content'=> "", 'updateData' => date('d'), 'updatetime' => "$time");
		$collection->insert($doc); 
	}else{
	  $newContent  = array('$set' => array('picUrl' => "$picUrl", 'mediaId' => "$mediaId", 'picName' => "$picName"));
	  $collection->update(array('sendUserId' => "$sendUserId", 'updateData' => date('d')),  $newContent);
	}

    replyText($sendUserId, $developerId, '新年快乐！欢迎参加＃马上你就红＃新年贺卡制作活动，你的照片已收到！现在，请在“祝你2014马上______”的空格处写下一段祝福语（请将文字限制在10个英文字符内，请勿夹杂符号表情或敏感文字），活动时间（2013/12/31—2014/2/6）');
    exit();
}

if ($msgType == 'text') {
     $content      = $xml->Content;
	 
	 if($_count>0){
		 if("Y" == $content  || 'y' == $content){
            
            $userInfo = $collection->findOne(array('sendUserId'=> "$sendUserId", 'updateData' => date('d')));
            $UserPicture = './img/small'.$userInfo['picName'];
			$userImg = new Imagick($UserPicture);
			$image = new Imagick('buttom.png');
			$image_top = new Imagick('top.png');
			$userImg->rotateImage(new ImagickPixel('transparent'), -7.00); 
			$image->compositeImage($userImg, Imagick::COMPOSITE_DEFAULT, 150, 5);
			$image->compositeImage($image_top, Imagick::COMPOSITE_DEFAULT, 0, 0);
			$draw = new ImagickDraw();
			$draw->setFillColor('#f8ec00');
			$draw->setFont('/var/www/han.TTF');
			$draw->setTextEncoding('utf-8');
			$draw->setFontSize(14);
			$draw->setGravity(1);
			$image->annotateImage($draw, 230, 154, -9, $userInfo['content']);
			header('Content-type: image/jpg');
            $image->writeImage('./image/'.$userInfo['picName']);

            $description = "Ding——新年贺卡已新鲜出炉！快进来看看，即刻发送给你要祝福的TA，或再次上传照片，即可重新炮制再为其他小伙伴送去祝福吧！";
	        replyTextAndImg($sendUserId, $developerId, '#马上你就红# 新年贺卡，即刻给你好看', $description, 'http://115.29.49.54/image/'.$userInfo['picName'], 'http://tongyi.mei94.com/page?id='.base64_encode($userInfo['picName']));

            $UserBigPicture = './img/big'.$userInfo['picName'];
			$userImgBig = new Imagick($UserBigPicture);
			$imageBig = new Imagick('newbigbuttom.png');
			$image_topBig = new Imagick('newbigtop.png');
			$userImgBig->rotateImage(new ImagickPixel('transparent'), -11.00); 
			$imageBig->compositeImage($userImgBig, Imagick::COMPOSITE_DEFAULT, 180, 190);
			$imageBig->compositeImage($image_topBig, Imagick::COMPOSITE_DEFAULT, 0, 0);
			$draw = new ImagickDraw();
			$draw->setFillColor('#f8ec00');
			$draw->setFont('/var/www/han.TTF');
			$draw->setTextEncoding('utf-8');
			$draw->setFontSize(36);
			$draw->setGravity(1);
			$imageBig->annotateImage($draw, 400, 761, -9, $userInfo['content']);
			header('Content-type: image/jpg');
            $imageBig->writeImage('./image/big'.$userInfo['picName']);
		 }else{
            $badkey = '妈逼|操|狗屎|阴|垃圾';
			if(preg_match("/$badkey/i", $content)){
			   replyText($sendUserId, $developerId, '对不起，您的输入有误，请重新输入，请勿夹杂符号表情或敏感文字。');
			   exit;
			}
			if (mb_strlen($content, 'UTF-8') > 10) {
				replyText($sendUserId, $developerId, '对不起，您的输入有误，请重新输入，请将文字限制在10个英文字符内，请勿夹杂符号表情或敏感文字。');
				exit;
			}
		    $newContent  = array('$set' => array('content' => "$content", 'flg'=>'2'));
            $collection->update(array('sendUserId' => "$sendUserId", 'updateData' => date('d')),  $newContent);
		    replyText($sendUserId, $developerId, '你的照片和文字已上传成功，红运马上送到TA！请确认你已经认真阅读过我们的<a href="http://tongyi.mei94.com/rule.html">用户条款和隐私政策</a>，回复”Y”表示同意并继续。
'); 
		 }
	 }

  exit();
}
function replyText($toUserName, $fromUserName, $text){
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
function replyTextAndImg($toUserName, $fromUserName, $title, $description, $picUrl='', $url='', $count=1){
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