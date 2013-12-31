<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>＃心意自造＃潮卡送到</title>
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
<p class="pLine"> 这年头，谁还寄贺卡？当然是最懂你的我咯！你也知道好贺卡不好找，尤其是我自己做的贺卡，我要是你，肯定就<strong>长按图片</strong>，赶紧存下来了，要不然就秀一下<strong>微信朋友圈</strong>，保证点赞无数。你也可以分享到 <a id="btn_sina" href="#"><img style="vertical-align:middle;width: 10%;"  src="http://dove.u.qiniudn.com/images/btnweibo.png"></a>  <a id="btn_tencent" href="#"><img style="vertical-align:middle;width: 10%;" src="http://dove.u.qiniudn.com/images/btntencent.png"></a>
<p><img style="width:60%;" alt="" src="http://115.29.49.54/2.png" /></p>
<p class="pLine">
什么？觉得很好玩？也想为你的小伙伴自制一张贺卡？那就关注统一冰红茶官方微信号：<span class="chu" style="color:#F00;">tongyiicetea</span>，在对话框中上传一张祝福对象的照片（竖版或正方形）。
赶快试试吧！</p> <br /><br />
<?php  }  ?>
</div>

</div>
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript">
        
        var shareTxt = '关注统一冰红茶官方微信：tongyiicetea，私人定制新年贺卡，即刻获取，快来试试！＃心意自造＃ ';
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