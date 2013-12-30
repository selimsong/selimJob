<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>统一冰红茶</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
html, body { margin:0; padding:0; }
body{
color: #541e14; 
font-size:14px;
background: #efefef;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;}
#container { margin:0px auto; }
h1 { text-align:center; }
img { border:none; }
</style>
</head>
<body>
<div id="container">
<img style="width:100%;" src="http://115.29.49.54/header2.png" />
<div style="text-align:center; margin:0 auto;">
<?php 
$path = 'http://115.29.49.54/heka.jpg';
if(!empty($_GET['id'])){
$path = 'http://115.29.49.54/image/big'.base64_decode($_GET['id']);
} 
?>
<img style="width:92%;" alt="" src="<?php echo $path; ?>" />
</div>
<div style="width:92%;text-align:left; margin:0 auto;padding:0px 8px 0px 8px;height:163px; ">
<?php if(empty($_GET['id'])){ ?>
<p>三招定制新年贺卡</p>
<p>1: 即刻在冰红茶对话框中上传一张祝福对象的竖版照片。</p>
<p>2: 写下你对TA的祝福语。</p>
<p>3:  获取你为TA私人定制的新年贺卡。</p>
<p>发送或分享祝福</p>
<p>@你要祝福的人，或分享至朋友圈、微博等平台，为TA们私人定制祝福，祝TA们马上走红运！</p>
<p>赶紧定制一张新年贺卡吧！</p>
<?php }else{ ?>
<p>收到小伙伴们为你亲手炮制的贺卡是不是激动万分？</p>
<p>赶紧长按图片，存到手机相册，留存这份难得的情谊。或分享到微信朋友圈，秀出你的惊喜！</p>
<p>快关注统一冰红茶官方微信，你也可以亲手炮制新年贺卡。</p>
<?php  }  ?>
</div>
</div>
</body>
</html>