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
.title{
	font-size:18px;
	color:#ff0000;
	font-weight:800;
}
img { border:none; }
.pLine{
	line-height:24px;
}
.chu{
	font-weight:900;
}
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
<p class="title">三招定制新年贺卡</p>
<p>1: 即刻在冰红茶对话框中上传一张祝福对象的照片（竖版或正方形）。</p>
<p>2: 写下你对TA的祝福语。</p>
<p>3:  获取你为TA私人定制的新年贺卡。</p>
<br />
<p class="title">发送或分享祝福</p>
<p>@你要祝福的人，或分享至微信朋友圈、新浪微博、腾讯微博等平台，为TA们私人定制祝福，祝TA们马上走红运！</p>
<p>赶紧定制一张新年贺卡吧！</p> <br /><br />
<?php }else{ ?>

<p><img style="width:60%;" alt=""  src="http://115.29.49.54/1.png" /></p>
<p class="pLine">收到小伙伴们为你私人定制的贺卡是不是激动万分？赶紧<strong>长按图片</strong>，存到手机相册，留存这份难得的情谊。或分享至<strong>微信朋友圈、新浪微博<a id="btn_sina" href="#"><img style="vertical-align:middle;width: 10%;"  src="http://dove.u.qiniudn.com/images/btnweibo.png"></a></strong>和<strong> 腾讯微博<a id="btn_tencent" href="#"><img style="vertical-align:middle;width: 10%;" src="http://dove.u.qiniudn.com/images/btntencent.png"></a></strong>，秀出你的惊喜！</p>


<p><img style="width:60%;" alt="" src="http://115.29.49.54/2.png" /></p>
<p class="pLine">快关注统一冰红茶官方微信号：<span style="color:#F00;">tongyiicetea</span>，在对话框中上传一张祝福对象的照片（竖版或正方形），即刻为你的小伙伴们<span class="chu">私人定制新年贺卡</span>。</p> <br /><br />

<?php  }  ?>
</div>




</div>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript">
        
        var shareTxt = '快关注统一冰红茶官方微信：tongyiicetea，私人定制新年贺卡，即刻获取，快来试试！＃马上你就红＃';
        var sharePic = '<?php echo $path; ?>';
        
        function sina() {
            var url = '';
            var appkey = '';
            var title = shareTxt;
            var pic = sharePic;
            var ralateUid = '';
            var language = 'zh_cn';
        
            url = encodeURIComponent( url || '' );
            appkey = encodeURIComponent( appkey || '' );
            title = encodeURIComponent( title || '' );
            pic = encodeURIComponent( pic || '' );
            ralateUid = encodeURIComponent( ralateUid || '' );
            language = encodeURIComponent( language || '' );
        
            window.open("http://service.weibo.com/share/share.php?url="+url+"&appkey="+appkey+"&title="+title+"&pic="+pic+"&ralateUid="+ralateUid+"&language="+language,"_blank","width=615,height=505, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no");
        }
        function tencent() {
            var _t = encodeURIComponent(shareTxt);
            var _url = '';
            var _appkey = encodeURIComponent('');
            var _pic = encodeURIComponent(sharePic);
            var _site = '';
            var _u = 'http://v.t.qq.com/share/share.php?url='+_url+'&appkey='+_appkey+'&site='+_site+'&pic='+_pic+'&title='+_t;
            window.open( _u,'', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' );
        }
        
        $(function(){
            $('#btn_sina').click(function(e){
                sina();
                return false;
            });
            $('#btn_tencent').click(function(e){
                tencent();
                return false;
            });
        });
        </script>
</body>
</html>