<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"F:\www\php/app/admin\view\wechat\addorupdatekeyreplay.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo config('sys_name'); ?>后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="__STATIC__/plugins/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="__ADMIN__/css/global.css" media="all">
    <link rel="stylesheet" href="__STATIC__/common/css/font.css" media="all">
</head>
<body class="skin-<?php if(!empty($_COOKIE['skin'])){echo $_COOKIE['skin'];}else{echo '0';setcookie('skin','0');}?>">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_base.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_index.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_tooltip.css">
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_lib.css"/>
<link rel="stylesheet" href="__ADMIN__/wxMenu/wx_richvideo.css"/>
<link rel="stylesheet" type="text/css" href="__ADMIN__/defau.css">
<style>
    .draggable-element {  display: inline-block;  text-align: center;  color: rgb(51, 51, 51);  cursor: move;  }
    body {  background: #fff;}
    .layui-table-cell{height: auto;}
    .layui-table-cell ul li a{color: #1C8FEF;display: block;border: 1px solid #ececec;padding: 3px 8px;}
    .layui-table-cell ul li a:hover{color: #005580}
    .layui-table-view{margin: 0;}
    .layui-table{margin: 0;}
    .step_0{text-align:center;margin-top:100px;}
    .reply-div{border:1px solid #d3d3d3;width:360px;padding:15px;margin-top:20px;}
    .cover-div{background:#f5f5f5;position:relative;}
    .cover-title{position:absolute;left:0;bottom:0;background:#000;color:#fff;width:350px;padding:5px;opacity:0.6;}
    .cover-pic{max-width:360px;max-height:200px;margin:auto;display:block;}
    .reply-one p,h5{padding:3px 0;}
    .reply-one p{color:#999;font-size:13px;}
    ul.reply-more li{border-bottom:1px solid #d3d3d3;padding:10px 0;}
    ul.reply-more li:after{content:'';clear:both;display:block;}
    ul.reply-more li:last-child{border-bottom:0px solid #d3d3d3;padding-bottom:0;}
    ul.reply-more li:first-child{padding-top:0;}
    .media-div-l{width:270px;margin-right:10px;float:left;}
    .media-div-r{width:80px;float:right;}
    .media-img{max-width:80px;max-height:200px;margin:auto;display:block;}
    .media-button{border:1px solid #d3d3d3;width:390px;border-top:0px solid #d3d3d3;background:#e7e7eb;display:table;}
    .media-button a{display:inline-block;width:194.5px;text-align:center;padding:10px 0;}
    .media-button a:first-child{border-right:1px solid #d3d3d3;}
</style>
<script>
    var UMTW = "<?php echo url('updatemenutoweixin'); ?>"
    var UWMET = "<?php echo url('updateweixinmenueventtype'); ?>"
    var AWM = "<?php echo url('addweixinmenu'); ?>"
    var UWMN = "<?php echo url('updateweixinmenuname'); ?>"
    var UWMU = "<?php echo url('updateweixinmenuurl'); ?>"
    var DWM = "<?php echo url('deleteweixinmenu'); ?>"
    var UWMM = "<?php echo url('updateweixinmenumessage'); ?>"
    var GWMD = "<?php echo url('getweixinmediadetail'); ?>"
    var UWMS = "<?php echo url('updateweixinmenuSort'); ?>"
    var PUBLIC = "__PUBLIC__"
</script>
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">关键词</label>
            <div class="layui-input-4">
                <input type="text" name="key" id="key" lay-verify="required" value="<?php echo $info['key']; ?>" placeholder="<?php echo lang('pleaseEnter'); ?>关键词" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">匹配类型</label>
            <div class="layui-input-block">
                <input type="radio" name="match_type" id="match_type1"  value="1" <?php if($info['match_type'] == '1'): ?>checked<?php endif; ?> title="模糊匹配">
                <input type="radio" name="match_type" id="match_type2"  value="2" <?php if($info['match_type'] == '2'): ?>checked<?php endif; ?> title="全部匹配">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">回复内容</label>
            <div class="layui-input-4">

            </div>
            <div class="layui-form-mid layui-word-aux">
                <?php if(empty($info['madie_info']) || (($info['madie_info'] instanceof \think\Collection || $info['madie_info'] instanceof \think\Paginator ) && $info['madie_info']->isEmpty())): ?>
                    <p class="key_data_a" <?php if(empty($info['media_info']) || (($info['media_info'] instanceof \think\Collection || $info['media_info'] instanceof \think\Paginator ) && $info['media_info']->isEmpty())): ?>style="display:block;"<?php else: ?>style="display:none;"<?php endif; ?>>您还未选择回复内容，<a href="javascript:;" onclick="showMaterial()">立即选择</a></p>
                <?php endif; ?>
            </div>

        </div>
        <div class="layui-form-item">
            <div id="key_data">
                <div class="step_1" style="<?php if(empty($info[media_info]) || (($info[media_info] instanceof \think\Collection || $info[media_info] instanceof \think\Paginator ) && $info[media_info]->isEmpty())): ?>display:none;<?php else: ?>display:block;<?php endif; ?>">
                    <?php if(!(empty($info['media_info']) || (($info['media_info'] instanceof \think\Collection || $info['media_info'] instanceof \think\Paginator ) && $info['media_info']->isEmpty()))): if($info['media_info']['type'] == '1'): ?>
                    <div class="reply-div">
                        <div class="reply-text">
                            <p><?php echo $info['media_info']['title']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '2'): ?>
                    <div class="reply-div">
                        <div class="reply-one">
                            <h5><?php echo $info['media_info']['title']; ?></h5>
                            <p>xx月xx日</p>
                            <div class="cover-div"><img class="cover-pic" src="__PUBLIC__<?php echo $info['media_info']['item_list'][0]['cover']; ?>"></div>
                            <p><?php echo $info['media_info']['item_list'][0]['summary']; ?></p>
                        </div>
                    </div>
                    <?php endif; if($info['media_info']['type'] == '3'): ?>
                    <div class="reply-div">
                        <ul class="reply-more">
                            <?php if(is_array($info['media_info']['item_list']) || $info['media_info']['item_list'] instanceof \think\Collection || $info['media_info']['item_list'] instanceof \think\Paginator): if( count($info['media_info']['item_list'])==0 ) : echo "" ;else: foreach($info['media_info']['item_list'] as $k=>$v): if($k == '0'): ?>
                            <li>
                                <div class="cover-div">
                                    <img class="cover-pic" src="__PUBLIC__<?php echo $v['cover']; ?>">
                                    <p class="cover-title"><?php echo $v['title']; ?><p>
                                </div>
                            </li>
                            <?php endif; if($k > '0'): ?>
                            <li>
                                <div class="media-div-l"><p class="media-title"><?php echo $v['title']; ?></p></div>
                                <div class="media-div-r"><img class="media-img" src="__PUBLIC__<?php echo $v['cover']; ?>"></div>
                            </li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <?php endif; endif; ?>
                    <div class="media-button">
                        <a class="" href="javascript:;" onclick="showMaterial()">修改</a>
                        <a class="" href="javascript:;" onclick="delReply()">删除</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" onclick="addOrUpdateKeyReplay();"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('replay',['type'=>2]); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>

<div class="dialog_wrp media align_edge ui-draggable" style="display:none;width: 960px; margin-left: -480px;top:30px;" id="dialog_media">
    <div class="dialog">
        <div class="dialog_hd">
            <h3>选择素材</h3>
            <!--#0001#-->
            <a href="javascript:;" onclick="closeMaterial()" class="icon16_opr closed pop_closed">关闭</a>
            <!--%0001%-->
        </div>
        <div class="dialog_bd">
            <div class="dialog_media_container appmsg_media_dialog">
                <div class="sub_title_bar in_dialog">
                    <div class="search_bar js-btn-media">
                        <a class="layui-btn layui-btn-primary layui-btn-sm" value="1" href="javascript:;" onclick="checkBtn(this)"> 文本 </a>
                        <a class="layui-btn layui-btn-normal layui-btn-sm" value="2" href="javascript:;" onclick="checkBtn(this)"> 单图文 </a>
                        <a class="layui-btn layui-btn-primary layui-btn-sm" href="javascript:;" value="3" onclick="checkBtn(this)"> 多图文 </a>
                    </div>
                    <div class="appmsg_create tr">
                        <a class="btn btn_primary btn_add" target="_blank"
                           href="<?php echo url('addmedia'); ?>">
                            <i class="icon14_common add_white"></i>新建图文消息
                        </a>
                    </div>
                </div>
                <div class="dialog_media_inner" style="overflow:auto;">
                    <div class="table_wrp user_list">
                        <table class="layui-table" id="list" lay-filter="list"></table>
                    </div>
                </div>
            </div>
        </div>
        <div class="dialog_ft">
        </div>
    </div>
</div>

<div class="mask mask_metar" style="display: none;"></div>
<input type="hidden" id="id" value="<?php echo $id; ?>">
<input type="hidden" id="media_id" value="<?php echo $info['reply_media_id']; ?>">

<script type="text/html" id="title">
    <ul>
        {{# for(var l=0; l<d.item_list.length; l++){ }}
        <li><a href="#">{{d.item_list[l]['title']}}</a></li>
        {{# } }}
    </ul>
</script>
<script type="text/html" id="action">
    <a href="javascript:;" class="layui-btn layui-btn-sm remark js_msgSenderRemark" onclick="selectedMaterial({{d.media_id}})">选取</a>
</script>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>



<script src="__STATIC__/common/js/jquery-1.8.1.min.js"></script>
<script src="__STATIC__/common/js/drag-arrange.js"></script>
<script src="__ADMIN__/wx_menu/wx_menu.js"></script>
<script>
    layui.use(['form', 'layer'], function () {
        var form = layui.form, $ = layui.jquery;
    });
    function checkBtn(event){
        $(".js-btn-media").find('.layui-btn').removeClass('layui-btn-normal').addClass('layui-btn-primary');
        $(event).removeClass('layui-btn-primary').addClass('layui-btn-normal');
        LoadingInfo();
    }
    LoadingInfo();
    function LoadingInfo() {
        layui.use('table', function () {
            var table = layui.table, $ = layui.jquery;
            var type = $(".js-btn-media .layui-btn-normal").attr('value');
            table.render({
                id: 'msg',
                elem: '#list',
                url: '<?php echo url("onloadmaterial"); ?>',
                method: 'post',
                page: true,
                where:{type:type},
                cols: [[
                    {field: 'title', title: '<?php echo lang("title"); ?>', width: 250, templet: '#title'},
                    {field: 'create_time', title: '创建时间', width: 250},
                    {width: 160, align: 'center', toolbar: '#action'}
                ]],
                limit: 10
            });
        });
    }
    //打开
    function showMaterial(){
        $("#dialog_media").fadeIn(500);
        $(".mask_metar").fadeIn(300);
    }
    //选择 图文素材
    function selectedMaterial(media_id){
        getMaterial(media_id);
        closeMaterial();
    }
    //取消  关闭
    function closeMaterial(){
        $("#dialog_media").fadeOut(300);
        $(".mask_metar").fadeOut();
    }
    function getMaterial(media_id){
        $.ajax({
            url : "<?php echo url('getweixinmediadetail'); ?>",
            type : "post",
            async : true,
            data : { "media_id" : media_id },
            success : function(data){
                var html = '';
                if(data){
                    html += '<div class="reply-div">';
                    if(data['type'] == 1){
                        html += '<div class="reply-text">';
                        html += '<p>'+data['title']+'</p>';
                        html += '</div>';
                    }else if(data['type'] == 2){
                        html += '<div class="reply-one">';
                        html += '<h5>'+data['item_list'][0]['title']+'</h5>';
                        html += '<p>xx月xx日</p>';
                        html += '<div class="cover-div"><img class="cover-pic" src="__PUBLIC__'+(data['item_list'][0]['cover'])+'"></div>';
                        html += '<p>'+data['item_list'][0]['summary']+'</p>';
                        html += '</div>';
                    }else if(data['type'] == 3){
                        html += '<ul class="reply-more">';
                        for(var i=0; i < data['item_list'].length; i++){
                            if(i < 1){
                                html += '<li><div class="cover-div">';
                                html += '<img class="cover-pic" src="__PUBLIC__'+(data['item_list'][i]['cover'])+'">';
                                html += '<p class="cover-title">'+data['item_list'][i]['title']+'<p>';
                                html += '</div></li>';
                            }else{
                                html += '<li>';
                                html += '<div class="media-div-l"><p class="media-title">'+data['item_list'][i]['title']+'</p></div>';
                                html += '<div class="media-div-r"><img class="media-img" src="__PUBLIC__'+(data['item_list'][i]['cover'])+'"></div>';
                                html += '</li>';
                            }
                        }
                        html += '</ul>';
                    }
                    html += '</div>';
                }
                $("#media_id").val(media_id);
                $(".key_data_a").hide();
                $("#key_data .step_1").show();
                $("#key_data .step_1 .reply-div").remove();
                $("#key_data .step_1 .media-button").before(html);
            }
        })
    }
    //删除
    function delReply(){
        $('#key_data .step_1').hide();
        $('.key_data_a').show();
        $("#media_id").val(0);
    }
    //添加 或 修改 关注时回复
    function addOrUpdateKeyReplay(){
        var id = $("#id").val();
        var media_id = $("#media_id").val();
        var key = $("#key").val();
        var match_type = $("input[name='match_type']:checked").val();
        if(media_id > 0){
            $.ajax({
                url : "<?php echo url("","",true,false);?>",
                type : "post",
                async : true,
                data : { "media_id" : media_id, "id" : id, "match_type" : match_type, "key" : key },
                success : function(data){
                    if(data['code'] > 0){
                        layer.msg(data.msg,{time:1000,icon:1});
                        window.location.href="<?php echo url('replay',['type'=>2]); ?>";
                    }else{
                        layer.msg(data.msg,{time:1000,icon:2});
                    }
                }
            })
        }else{
            layer.msg('请添加回复内容',{time:1000,icon:0});
        }
    }
</script>