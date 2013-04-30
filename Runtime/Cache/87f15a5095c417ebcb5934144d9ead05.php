<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<!--[if IE 7]>  <html class="no-js  lt-ie10 lt-ie9 lt-ie8 ie7" lang="zh-cn"> <![endif]-->
<!--[if IE 8]>  <html class="no-js lt-ie10 lt-ie9 ie8" lang="zh-cn"> <![endif]-->
<!--[if IE 9]>  <html class="no-js lt-ie10 ie9" lang="zh-cn"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="zh-cn"> <!--<![endif]-->
<head>
    <script></script>
    <meta charset="utf-8" />
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="cleartype" content="on">
    <title>MODULE_NAME - ACTION_NAME</title>
    <link rel="stylesheet" href="./Static/css/ao.css">
</head>
<body>
<div id="nav" class="container_16 ao_nav">
    <div class="grid_16 ch-box">
        <font><a href="__APP__/Index/index">首页</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/News/Index">公告</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/Order/Index">订单</a>&nbsp;&nbsp;&nbsp;</font><?php if($userInfo == 0): ?><font class="ao_right"><a href="__APP__/Member/Login">登录</a>&nbsp;&nbsp;&nbsp;<a href="__APP__/Member/Register">注册</a>&nbsp;&nbsp;</font><?php else: ?><font class="ao_right"><a class="ao_box_head">您好,</a><a href="__APP__/Member/Info/Id/<?php echo ($userInfo["uid"]); ?>"><?php echo ($userInfo["username"]); ?></a>&nbsp;&nbsp;<a href="__APP__/Member/Info/Id/<?php echo ($userInfo["uid"]); ?>">资料<a>&nbsp;<a href="__APP__/Member/Logout">退出<a>&nbsp;&nbsp;</font><?php endif; ?>
    </div>
</div>

    <div id="news-add" class="container_16">
        <div id="news-add-main" class="grid_16 ch-box-lite">
            <div id="news-add-form-area">
                <?php if($userInfo["group"] == 1): ?><!--<script type="text/javascript" src="Static/editor/editor_config.js"></script>
                    <script type="text/javascript" src="Static/editor/editor_all.js"></script>-->
                    <a class="ao_box_head"><h3>发布公告</h3></a>
                    <form id="news-add-form" name="news-add-form" method="post">
                        <label>标题：</label></p>
                            <input type="text" id="news-add-title" name="title" size="80"/></p>
                        
                        <label>内容：</label></p>
                            <textarea cols="80" rows="15" id="content" name="content"></textarea></p>
                        
                        <label>验证码：</label></p>
                            <input type="text" name="verify" id="login_verify" size="30"/>
                            <i class="ch-form-ico-inner ch-icon-refresh"></i></p>
                        <label></label>
                            <img id="Verify" src="__APP__/Public/Verify" />
                            <font class="register_verify_info">&nbsp;&nbsp;&nbsp;看不清？点击验证码刷新。</font></p>   
                        
                    </form>
                        <label>&nbsp;</label>
                            <button class="ch-btn" id="add-news-btn" onclick="newsAdd();">发布</button>
                            <a>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                            <button class="ch-btn ch-btn-skin" id="add-news-btn">取消</button>
                        </p>
            </div>
        </div>
    </div>
<script src="./Static/js/ao.js"></script>
    <script type="text/javascript">
        $("#Verify").click(function(){
            getId('Verify').src = "__APP__/Public/Verify";
        });

        function getId(id){
            return document.getElementById(id);
        }

        function newsAdd(){
            $.post('__APP__/Api/News/Mod/Add', $('#news-add-form').serialize(), function(data){
                if(data.status != 0){
                   getId('Verify').src = "__APP__/Public/Verify";
                }
                if(data.status == 0){
                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/News/View/Id/'+ data.data.nid+ '">';
                    var errorBoxStyle = 'ch-box-ok';
                    var errorBoxTitle = '<?php echo L('trueTitle');?>';
                    var errorBoxClose =  '';
                }
                else if(data.status == 3){
                    var errorBoxToUrl = '<meta http-equiv="refresh" content="3;url=__APP__/News/Add">';
                    var errorBoxStyle = 'ch-box-error';
                    var errorBoxTitle = '<?php echo L('falseTitle');?>';
                    var errorBoxClose =  '';
                }
                else{
                    var errorBoxToUrl = '';
                    var errorBoxStyle = 'ch-box-error';
                    getID('verify').value = '';
                    getID('Verify').src = "__APP__/Public/Verify";
                    var errorBoxTitle = '<?php echo L('falseTitle');?>';
                    var errorBoxClose =  '<?php echo L('closeBox');?>';
                }
                $.artDialog({
                    id: 'errorBox_',
                    title: errorBoxTitle,
                    lock: true,
                    fixed: true,
                    time: 3000,
                    content: '<div class="'+ errorBoxStyle+ '">' +errorBoxToUrl +'<p><h4>'+ data.info+ '</h4></br><a class="ao_box_head">'+ errorBoxClose+ '</a></p></div>'
                });
            });
        }

        /*var editor = new UE.ui.Editor();
        editor.render("content");*/
    </script>
    <?php else: ?>
                    <center>
                        <h3><?php echo L('groupLimit');?><h3>
                            <h5><a onclick="javascript:history.go(-1);"><?php echo L('return');?></a></h5>
                    </center>
            </div>
        </div>
    </div><?php endif; ?>
   <div class="container_16">
        <div class="grid_16 extCenter ch-box-lite">Copyright&nbsp;&copy;&nbsp;Lost404&nbsp;&nbsp;2013&nbsp;-&nbsp;2013&nbsp;&nbsp;</div>
    </div>
   </body>
</html>