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
	if ($_width > 600) {
		$h = $_height*(600/$_width);
		$im_big->scaleImage(600, $h, false);
		$_width = 600;
	}
	if(!empty($h)){
	   $_height = $h;
	}
	if ($_height > 600) {
		$w = $_width*(600/$_height);
		$im_big->scaleImage($w, 600, false);
	}
    $im_big->writeImage('./img/'.'big'.$picName);
	$im_big->clear();


	$im = new Imagick('./img/'.$picName);
	$h = NULL;
	if ($width > 140) {
		$h = $height*(140/$width);
		$im->scaleImage(140, $h, false);
		$width = 140;
	}
	if(!empty($h)){
	   $height = $h;
	}
	if ($height > 150) {
		$w = $width*(150/$height);
		$im->scaleImage($w, 150, false);
	}
 
	/**
	$h = NULL;
	if ($width > 730) {
		$h = $height*(730/$width);
		$im->scaleImage(730, $h, false);
		$width = 730;
	}
	if(!empty($h)){
	   $height = $h;
	}
	if ($height > 492) {
		$w = $width*(492/$height);
		$im->scaleImage($w, 492, false);
	}
    */
	//$imGray = new Imagick();
	//$imGray->newImage($width, $height, new ImagickPixel('#33333333'));
	//$im->compositeImage($imGray, Imagick::COMPOSITE_DEFAULT, 0, 0);
	//$imGray->clear();
	$im->writeImage('./img/'.'small'.$picName);
	$im->clear();

	if($_count<1){
		$doc = array('developerId' => "$developerId", 'sendUserId' => "$sendUserId", 'picUrl'=> "$picUrl", 'picName' => "$picName", 'mediaId'=> "$mediaId",'flg'=>'1' , 'content'=> "", 'updateData' => date('d'), 'updatetime' => "$time");
		$collection->insert($doc); 
	}else{
	  $newContent  = array('$set' => array('picUrl' => "$picUrl", 'mediaId' => "$mediaId", 'picName' => "$picName"));
	  $collection->update(array('sendUserId' => "$sendUserId", 'updateData' => date('d')),  $newContent);
	}

    replyText($sendUserId, $developerId, '新年快乐！欢迎参加＃马上你就红＃祝福海报制作活动，你的照片已收到！现在，请用一段文字写下你的对TA的祝福（请将文字限制在10个英文字符内，请勿夹杂符号表情或敏感文字），活动时间（2013/12/31—2014/2/6）
');
    exit();
}



if ($msgType == 'text') {
     $content      = $xml->Content;
	 
	 if($_count>0){
		 if("Y" == $content  || 'y' == $content){
		    //$flgCheck  = $collection->count(array('sendUserId'=> "$sendUserId", 'updateData' => date('d'), 'flg'=>'2'));
            
            $userInfo = $collection->findOne(array('sendUserId'=> "$sendUserId", 'updateData' => date('d')));
            $UserPicture = './img/small'.$userInfo['picName'];

			$userImg = new Imagick($UserPicture);
			$image = new Imagick('test365buttom.png');
			$image_top = new Imagick('test365top.png');
			//$image->annotateImage($draw, 100, 200, -10,'test4测试字体');
			//$userImg->compositeImage($image, Imagick::COMPOSITE_DEFAULT, 0, 0);
			$userImg->rotateImage(new ImagickPixel('transparent'), -13.55); 
			$image->compositeImage($userImg, Imagick::COMPOSITE_DEFAULT, 120, 20);
			$image->compositeImage($image_top, Imagick::COMPOSITE_DEFAULT, 0, 0);
			$draw = new ImagickDraw();
			$draw->setFillColor('#f8ec00');
			$draw->setFont('/var/www/han.TTF');
			$draw->setTextEncoding('utf-8');
			$draw->setFontSize(24);
			$draw->setGravity(1);
			$image->annotateImage($draw, 10, 60, -10, $userInfo['content']);
			header('Content-type: image/jpg');
            //$userImg->writeImage('./image/'.$userInfo['picName']);
            $image->writeImage('./image/'.$userInfo['picName']);


            $description = "＃马上你就红＃三招炮制祝福海报。即刻上传你的照片，写下你对TA的祝福语，就可获取专属于你对TA的祝福海报";
	        replyTextAndImg($sendUserId, $developerId, '炮制＃马上你就红＃祝福海报', $description, 'http://115.29.49.54/image/'.$userInfo['picName'], 'http://tongyi.mei94.com/page?id='.base64_encode($userInfo['picName']));

            $UserBigPicture = './img/big'.$userInfo['picName'];
			$userImgBig = new Imagick($UserBigPicture);
			$imageBig = new Imagick('bigbuttom.png');
			$image_topBig = new Imagick('fbigtop.png');
			$userImgBig->rotateImage(new ImagickPixel('transparent'), -12.00); 
			$imageBig->compositeImage($userImgBig, Imagick::COMPOSITE_DEFAULT, 180, 190);
			$imageBig->compositeImage($image_topBig, Imagick::COMPOSITE_DEFAULT, 0, 0);
			$draw = new ImagickDraw();
			$draw->setFillColor('#f8ec00');
			$draw->setFont('/var/www/han.TTF');
			$draw->setTextEncoding('utf-8');
			$draw->setFontSize(60);
			$draw->setGravity(1);
			$imageBig->annotateImage($draw, 215, 590, -10, $userInfo['content']);
			header('Content-type: image/jpg');
            $imageBig->writeImage('./image/big'.$userInfo['picName']);

		 }else{
		    $newContent  = array('$set' => array('content' => "$content", 'flg'=>'2'));
            $collection->update(array('sendUserId' => "$sendUserId", 'updateData' => date('d')),  $newContent);
		    replyText($sendUserId, $developerId, '你的照片和文字已上传成功，红运马上送到TA！请确认你已经认真阅读过我们的用户条款和隐私政策，回复”Y”表示同意并继续。
'); 
		 }
		 

	    
	 }

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