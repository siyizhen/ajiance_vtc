<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:49:"F:\www\php/app/admin\view\wechat\updatemedia.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
    <link rel="stylesheet" href="__ADMIN__/wxMenu/wx_base.css">
    <link rel="stylesheet" type="text/css" href="__ADMIN__/wxMenu/ns_blue_common.css">
    <link rel="stylesheet" type="text/css" href="__ADMIN__/defau.css">
    <script type="text/javascript" src="__STATIC__/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="__STATIC__/ueditor/ueditor.all.js"></script>
    <link rel="stylesheet" type="text/css" href="__ADMIN__/wxMenu/jquery-ui-private.css">
    <style>
        body{background: #fff!important;}
        .ns-main{margin: 0;}
        .media {max-width: 800px;margin: 0 auto;}
        .media:after {content: "";display: table;clear: both;}
        .img-text {display: block;width: 100%;line-height: 120px;background: #ececec;text-align: center;font-size: 22px;color: #c0c0c0;font-weight: 400;}
        .media-left {width: 30%;margin-right: 2%;}
        .media-right {width: 60%;background: #f8f8f8;border: 1px solid #d3d3d3;border-radius: 5px;padding: 15px;}
        .media-left, .media-right {float: left;}
        .media-border {padding: 10px;border: 1px solid #d3d3d3;border-radius: 5px;}
        .media-border-title {padding: 10px;border: 1px solid #d3d3d3;border-top-left-radius: 5px;border-top-right-radius: 5px;position: relative;}
        .media-body {padding: 10px;border-bottom: 1px solid #d3d3d3;border-left: 1px solid #d3d3d3;border-right: 1px solid #d3d3d3;position: relative;}
        .media-body:after {content: "";display: table;clear: both;}
        .media-body p {width: 65%;float: left;overflow: hidden;text-overflow: ellipsis;}
        .media-body .media-body-div {width: 30%;float: right;}
        .media-body .media-body-div span {font-size: 16px;line-height: 62px;}
        .media-body .media-plus {font-size: 22px;line-height: 62px;text-align: center;display: block;}
        .actions{position: absolute;bottom: 0;right: 0;width: 100%;height: 100%;background-color: #e5e5e5;opacity: 0.4;color: #fff;text-align: right;z-index: 49;display: none;}
        .actions span{display: inline-block;background-color: rgba(0, 0, 0, 0.8);padding: 0 5px;color: #fff;z-index: 50;margin-left: 5px;}
        .edit, .del {cursor: pointer;}
        .check-box{width: 10%;float: left;}
        .editting{display:none;}
        .action .editting{display:block;color:red;text-align:right;}
    </style>
    <script>
        var ULF = "<?php echo url('upload'); ?>"
        var RF = "<?php echo url('removefile'); ?>"
        var SIU = "<?php echo url('specimgupload'); ?>"
        var platform_shopname='cltphp';

    </script>
</head>
<body class="skin-0">
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend>编辑消息</legend>
    </fieldset>
    <div class="RIGHT">
        <div class="set-style" style="display:none;">
            <dl>
                <dt>消息类型:</dt>
                <dd>
                    <label><input type="radio" name="type" id="type1" value="1" <?php if($info['type'] == '1'): ?>checked<?php endif; ?>>文本</label>
                    <label><input type="radio" name="type" id="type2" value="2" <?php if($info['type'] == '2'): ?>checked<?php endif; ?>>单图文</label>
                    <label><input type="radio" name="type" id="type3" value="3" <?php if($info['type'] == '3'): ?>checked<?php endif; ?>>多图文</label>
                </dd>
            </dl>
        </div>
        <div class="set-style type1" style="<?php if($info[type] == 1): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
            <dl>
                <dt>描述:</dt>
                <dd>
                    <p>
                        <textarea id="type1_desc" class="input-common layui-textarea"><?php if($info['type'] == '1'): ?><?php echo $info['title']; endif; ?></textarea>
                    </p>
                    <p class="error">请输入模块描述</p>
                </dd>
            </dl>
        </div>
        <div class="type2 media" style="<?php if($info[type] == 2): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
            <div class="media-left">
                <div class="media-border">
                    <h5 class="type-title"><?php if($info['type'] == '2'): ?><?php echo $info['item_list'][0]['title']; endif; ?></h5>
                    <div style="text-align:center;">
                        <img class="type2-img" <?php if($info['type'] == '2'): ?>src="__PUBLIC__<?php echo $info['item_list'][0]['cover']; ?>"<?php else: ?>src=""<?php endif; ?> style="margin:0 auto;max-width:218px;max-height:120px;display:block;">
                        <span class="img-text" style="display:none;">封面图片</span>
                    </div>
                </div>
            </div>
            <div class="media-right">
                <p> <span style="color:red;"> * </span> 标题 </p>
                <input class="input-common layui-input" type="text" id="title" <?php if($info['type'] == '2'): ?>value="<?php echo $info['item_list'][0]['title']; ?>"<?php else: ?>value=""<?php endif; ?>>
                <p>作者（选填）</p>
                <input class="input-common layui-input" type="text" id="author" <?php if($info['type'] == '2'): ?>value="<?php echo $info['item_list'][0]['author']; ?>"<?php else: ?>value=""<?php endif; ?>>
                <p><span style="color:red;"> *</span> 封面</p>
                <div>
                    <div class="class-logo" style="background: #f8f8f8;">
                        <p style="width: 270px; height: 150px;">
                            <img id="imgLogo" <?php if($info['type'] == '2'): ?>src="__PUBLIC__<?php echo $info['item_list'][0]['cover']; ?>"<?php else: ?>src=""<?php endif; ?> style="max-width:270px;max-height:150px;">
                        </p>
                    </div>
                    <p class="hint">
                        <span style="color: orange;">建议使用宽900像素-高400像素的图片。</span>
                    </p>
                    <input type="hidden" id="type2-img-hidden" <?php if($info['type'] == '2'): ?>value="<?php echo $info['item_list'][0]['cover']; ?>"<?php else: ?>value=""<?php endif; ?>/>
                    <div class="upload-btn">
                        <span>
                            <input class="input-file" name="file_upload" id="uploadImg" type="file" onchange="imgUpload(this, 'type2-img', 'type2-img-hidden');">
                            <input type="hidden" id="Logo"/>
                        </span>
                        <p><i class="fa fa-upload"></i>上传图片</p>
                    </div>
                </div>
                <p>
                    <input type="checkbox" id="show_cover_pic" <?php if($info['type'] == '2'): if($info['item_list'][0]['show_cover_pic'] == '1'): ?>checked<?php endif; endif; ?>>
                    <label for="show_cover_pic" style="font-weight: normal; display: inline-block;">封面图片显示在正文中</label>
                </p>
                <p><span style="color:red;"> *</span> 摘要</p>
                <p>
                    <textarea id="desc" class="input-common layui-textarea"><?php if($info['type'] == '2'): ?><?php echo $info['item_list'][0]['summary']; endif; ?></textarea>
                </p>
                <textarea id="editor_text" style="display:none;"><?php if($info['type'] == '2'): ?><?php echo $info['item_list'][0]['content']; endif; ?></textarea>
                <p class="error">请输入模块描述</p>
                <p><span style="color:red;"> *</span> 正文</p>
                <div class="controls" id="discripContainer">
                    <textarea id="tareaProductDiscrip1" name="discripArea" class="input-common" style="height: 100px; width: 100%; display: none;"></textarea>
                    <script id="editor" type="text/plain"></script>
                    <span class="help-inline" style="display: none; color: red;">请输入商品描述</span>
                </div>
                <p>原文链接</p>
                <input type="text" class="input-common layui-input" id="content_source_url" <?php if($info['type'] == '2'): ?>value="<?php echo $info['item_list'][0]['content_source_url']; ?>"<?php else: ?>value=""<?php endif; ?>>
            </div>
        </div>
        <div class="type3 media" style="<?php if($info[type] == 3): ?>display:block;<?php else: ?>display:none;<?php endif; ?>">
            <div class="media-left">
            <?php if($info['type'] == '3'): if(is_array($info['item_list']) || $info['item_list'] instanceof \think\Collection || $info['item_list'] instanceof \think\Paginator): if( count($info['item_list'])==0 ) : echo "" ;else: foreach($info['item_list'] as $k=>$v): if($k == '0'): ?>
                <div class="media-border-title js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, 0)">
                    <div style="position: relative;text-align:center;">
                        <img class="type3-img-0" src="__PUBLIC__<?php echo $v['cover']; ?>" style="margin:0 auto;max-width:218px;max-height:120px;display:block;">
                        <span class="img-text" style="display:none;">封面图片</span>
                        <h5 class="type3-title-0" style="position: absolute; bottom: 0; width: 100%; background: #bbb; color: #fff; margin: 0; padding: 5px 0;text-align:left;overflow: hidden;text-overflow: ellipsis;"><?php echo $v['title']; ?></h5>
                    </div>
                    <div class="actions"><span class="edit">编辑</span></div>
                    <span class="editting">编辑中</span>
                    <input type="hidden" name="hidden0" id="title0" value="<?php echo $v['title']; ?>">
                    <input type="hidden" name="hidden0" id="author0" value="<?php echo $v['author']; ?>">
                    <input type="hidden" name="hidden0" id="cover0" value="<?php echo $v['cover']; ?>">
                    <input type="hidden" name="hidden0" id="show_cover_pic0" value="<?php echo $v['show_cover_pic']; ?>">
                    <input type="hidden" name="hidden0" id="summary0" value="<?php echo $v['summary']; ?>">
                    <textarea name="hidden0" class="input-common" id="content0" style="display:none;"><?php echo $v['content']; ?></textarea>
                    <input type="hidden" name="hidden0" id="content_source_url0" value="<?php echo $v['content_source_url']; ?>">
                </div>
            <?php endif; if($k > '0'): ?>
                <div class="media-body js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, <?php echo $k; ?>)">
                    <p class="type3-title-<?php echo $k; ?>"><?php echo $v['title']; ?></p>
                    <div class="media-body-div">
                        <img class="type3-img-<?php echo $k; ?>" src="__PUBLIC__<?php echo $v['cover']; ?>" style="max-width:62px;max-height:62px;display:block;">
                        <span class="img-text" style="display:none;">缩略图</span>
                    </div>
                    <div class="actions">
                        <span class="edit">编辑</span><?php if($k > '1'): ?><a href="javascript:void(0);" onclick="deleteWeixinMediaDetail(<?php echo $v['id']; ?>);"><span class="del">删除</span></a><?php endif; ?>
                    </div>
                    <span class="editting">编辑中</span>
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="title<?php echo $k; ?>" value="<?php echo $v['title']; ?>">
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="author<?php echo $k; ?>" value="<?php echo $v['author']; ?>">
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="cover<?php echo $k; ?>" value="<?php echo $v['cover']; ?>">
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="show_cover_pic<?php echo $k; ?>" value="<?php echo $v['show_cover_pic']; ?>">
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="summary<?php echo $k; ?>" value="<?php echo $v['summary']; ?>">
                    <textarea name="hidden<?php echo $k; ?>" class="input-common" id="content<?php echo $k; ?>" style="display:none;"><?php echo $v['content']; ?></textarea>
                    <input type="hidden" name="hidden<?php echo $k; ?>" id="content_source_url<?php echo $k; ?>" value="<?php echo $v['content_source_url']; ?>">
                </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; else: ?>
                <div class="media-border-title js-action action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, 0)">
                    <div style="position: relative;text-align:center;">
                        <img class="type3-img-0" style="max-width:218px;max-height:120px;display:none;">
                        <span class="img-text">封面图片</span>
                        <h5 class="type3-title-0" style="position: absolute; bottom: 0; width: 100%; background: #bbb; color: #fff; margin: 0; padding: 5px 0;text-align:left;">标题</h5>
                    </div>
                    <div class="actions"><span class="edit">编辑</span></div>
                    <span class="editting">编辑中</span>
                    <input type="hidden" name="hidden0" id="title0">
                    <input type="hidden" name="hidden0" id="author0">
                    <input type="hidden" name="hidden0" id="cover0">
                    <input type="hidden" name="hidden0" id="show_cover_pic0">
                    <input type="hidden" name="hidden0" id="summary0">
                    <textarea name="hidden0" class="input-common" id="content0" style="display:none;"></textarea>
                    <input type="hidden" name="hidden0" id="content_source_url0">
                </div>
                <div class="media-body js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, 1)">
                    <p class="type3-title-1">标题</p>
                    <div class="media-body-div">
                        <img class="type3-img-1" style="max-width:62px;max-height:62px;display:none;">
                        <span class="img-text">缩略图</span>
                    </div>
                    <div class="actions"><span class="edit">编辑</span></div>
                    <span class="editting">编辑中</span>
                    <input type="hidden" name="hidden1" id="title1">
                    <input type="hidden" name="hidden1" id="author1">
                    <input type="hidden" name="hidden1" id="cover1">
                    <input type="hidden" name="hidden1" id="show_cover_pic1">
                    <input type="hidden" name="hidden1" id="summary1">
                    <textarea name="hidden1" class="input-common" id="content1" style="display:none;"></textarea>
                    <input type="hidden" name="hidden1" id="content_source_url1">
                </div>
            <?php endif; ?>
                <div class="media-body">
                    <span class="media-plus"><a href="javascript:;"><i class="fa fa-plus">新增</i></a></a></span>
                </div>
            </div>
            <div class="media-right" id="dir" dir="0">
                <p>标题</p>
                <input type="text" id="form_title" class="input-common layui-input" onchange="changeElement('title')">
                <p>作者</p>
                <input type="text" id="form_author" class="input-common layui-input" onchange="changeElement('author')">
                <p>封面<span></span></p>
                <div>
                    <div class="class-logo" style="background: #f8f8f8;">
                        <p style="width: 270px; height: 150px;">
                            <img id="imgLogo1" style="max-width:270px;max-height:150px;">
                        </p>
                    </div>
                    <p class="hint">
                        <span style="color: orange;">建议使用宽900像素-高500像素的图片。</span>
                    </p>
                    <div class="upload-btn">
                        <span>
                            <input class="input-file" name="file_upload" id="uploadImg1" type="file" onchange="imgUpload(this, 'type3-img-', 'cover');">
                            <input type="hidden" id="Logo1"/>
                        </span>
                        <p><i class="fa fa-upload"></i>上传图片</p>
                    </div>
                </div>
                <input type="checkbox" id="form_show_cover_pic" onchange="changeElement('show_cover_pic')" style="margin-top: -2px; margin-right: 5px;">
                <label for="form_show_cover_pic" style="font-weight: normal; display: inline-block;">封面图片显示在正文中</label>
                <p>摘要</p>
                <p>
                    <textarea id="form_summary" class="input-common layui-textarea" onchange="changeElement('summary')"></textarea>
                </p>
                <p class="error">请输入模块描述</p>
                <p>正文</p>
                <div class="controls" id="discripContainer">
                    <textarea id="tareaProductDiscrip" name="discripArea" class="input-common" style="height: 100px; width: 100%; display: none; "></textarea>
                    <script id="editor1" type="text/plain"></script>
                    <span class="help-inline" style="display: none; color: red;">请输入商品描述</span>
                </div>
                <p>原文链接</p>
                <input type="text" id="form_content_source_url" class="layui-input" onchange="changeElement('content_source_url')">
            </div>
        </div>
        <input type="hidden" id="media_id" value="<?php echo $info['media_id']; ?>">
        <div style="width:200px;margin:20px auto;">
            <button class="btn-common btn-big" onclick="save();">提交</button>
        </div>
    </div>
</div>
<script src="__STATIC__/common/js/jquery-1.8.1.min.js"></script>
<!-- 用 ，加载数据-->
<script src="__ADMIN__/wx_menu/art_dialog.source.js"></script>
<script src="__ADMIN__/wx_menu/iframe_tools.source.js"></script>
<!-- 我的图片 -->
<script src="__ADMIN__/wx_menu/material_managedialog.js"></script>
<script src="__STATIC__/common/js/ajax_file_upload.js" type="text/javascript"></script>
<script src="__STATIC__/common/js/file_upload.js" type="text/javascript"></script>
<script type="text/javascript" src="__ADMIN__/wx_menu/jquery-ui-private.js" charset="utf-8"></script>
<script type="text/javascript" src="__ADMIN__/wx_menu/jquery.timers.js"></script>
<div id="dialog"></div>
<script>
    var ue = UE.getEditor('editor');
    var ue1 = UE.getEditor('editor1');
    $(function(){
        if("<?php echo $info['type']; ?>" == 2){
            UE.getEditor('editor').addListener( 'ready', function() {
                UE.getEditor('editor').setContent($("#editor_text").val());
            });
        }else if("<?php echo $info['type']; ?>" == 3){
            UE.getEditor('editor1').addListener( 'ready', function() {
                edit($(".js-action:first"), 0);
            });
        }
    });

    ue1.addListener("selectionchange",function(){
        changeElement('content');
    });

    function changeElement(name){
        var dir = $("#dir").attr('dir');
        if(name == 'show_cover_pic'){
            if($("#form_"+name).prop("checked")){
                var form_show_cover_pic = 1;
            }else{
                var form_show_cover_pic = 0;
            }
            $("#"+name+dir).val(form_show_cover_pic);
        }else if(name == 'content'){
            var content = UE.getEditor('editor1').getContent();
            $("#"+name+dir).val(content);
        }else{
            $("#"+name+dir).val($("#form_"+name).val());
        }
        if(name == 'title'){
            if($("#form_"+name).val() == ''){
                $(".type3-title-"+dir).html('标题');
            }else{
                $("#form_"+name).val($("#form_"+name).val().substr(0,70));
                $(".type3-title-"+dir).html($("#form_"+name).val());
            }
        }
    }

    function edit(event, num){
        $(".js-action").removeClass('action');
        $(event).addClass('action');
        $("#dir").attr('dir',num);
        //获取 隐藏域中的值
        var title = $("#title"+num).val();
        var author = $("#author"+num).val();
        var cover = $("#cover"+num).val();
        var show_cover_pic = $("#show_cover_pic"+num).val();
        var summary = $("#summary"+num).val();
        var content = $("#content"+num).val();
        var content_source_url = $("#content_source_url"+num).val();
        //把 form 的值填进去
        $("#form_title").val(title);
        $("#form_author").val(author);
        if(cover == ''){
            $("#imgLogo1").attr('src','');
        }else{
            $("#imgLogo1").attr('src','__PUBLIC__'+cover);
        }
        if(show_cover_pic == 1){
            $("#form_show_cover_pic").prop("checked","checked");
        }else{
            $("#form_show_cover_pic").prop("checked","");
        }
        $("#form_summary").val(summary);
        ue1.setContent(content);
        $("#form_content_source_url").val(content_source_url);
    }

    function save(){
        alert(1111);
        var type = $("input[type='radio'][name='type']:checked").val();
        var media_id = $("#media_id").val();
        if(!media_id){
            return false;
        }
        if(type == 1){
            //文本提交
            var title = $("#type1_desc").val();
            var content = '';
            if(title == ''){
                showMessage('error', '内容不能为空');
                return false;
            }
        }else if(type == 2){
            // 单图文 提交
            var title = $("#title").val();
            var author = $("#author").val();
            var cover = $("#type2-img-hidden").val();
            if($("#show_cover_pic").prop("checked")){
                var show_cover_pic = 1;
            }else{
                var show_cover_pic = 0;
            }
            var summary = $("#desc").val();
            var content = ue.getContent();
            var content_source_url = $("#content_source_url").val();
            var contents = title+'`|`'+author+'`|`'+cover+'`|`'+show_cover_pic+'`|`'+summary+'`|`'+content+'`|`'+content_source_url;
            if(title == ''){
                showMessage('error', '标题不能为空');
                return false;
            }else if(cover == ''){
                showMessage('error', '请上传封面图片');
                return false;
            }else if(summary == ''){
                showMessage('error', '摘要不能为空');
                return false;
            }else if(content == ''){
                showMessage('error', '正文不能为空');
                return false;
            }
        }else if(type == 3){
            // 多图文提交
            var title = $("#title0").val();
            var contents = '';
            var num = $(".js-action").length;
            var is_null = 0;
            for(var i=0; i<num; i++){
                var content_new = '';
                $("input[name='hidden"+i+"']").each(function(l){
                    if($("input[name='hidden"+i+"']").eq(0).val() == ""){
                        showMessage('error', '第'+(i+1)+'篇文章的标题不能为空');
                        return false;
                    }else if($("input[name='hidden"+i+"']").eq(2).val() == ""){
                        showMessage('error', '第'+(i+1)+'篇文章的封面图片不能为空');
                        return false;
                    }else if($("input[name='hidden"+i+"']").eq(4).val() == ""){
                        showMessage('error', '第'+(i+1)+'篇文章的摘要不能为空');
                        return false;
                    }else if($("textarea[name='hidden"+i+"']").val() == ""){
                        showMessage('error', '第'+(i+1)+'篇文章的正文不能为空');
                        return false;
                    }else{
                        if(l == 4){
                            content_new = content_new +'`|`'+ $(this).val() +'`|`'+ $("textarea[name='hidden"+i+"']").val();
                        }else{
                            content_new = content_new +'`|`'+ $(this).val();
                        }
                    }
                });
                content_new = content_new.substring(3);
                contents = contents +'`$`'+ content_new;
            }
            contents = contents.substring(3);
        }else{
            showMessage('error', '请选择消息类型');
            return false;
        }
        //类型,标题,content
        //content = 标题,作者,封面图片,显示在正文,摘要,正文,链接地址;标题,作者,封面图片,显示在正文,摘要,正文,链接地址
        $.ajax({
            type : "post",
            url : "<?php echo url('updatemedia'); ?>",
            data : { "media_id" : media_id, "type" : type, "title" : title, "content" : contents },
            success : function(data) {
                if(data['code'] > 0){
                    showMessage('success', data['message'], "<?php echo url('materialmessage'); ?>");
                }else{
                    showMessage('error', data['message']);
                }
            }
        });
    }

    $(".media-plus").click(function() {
        var num = $(this).parents(".media-left").find(".media-body").length;
        if (num > 7) {
            showMessage('error', '最多只可以加入8条图文消息。');
            return false;
        }
        var html = '';
        html += '<div class="media-body js-action" onmouseover="show(this)" onmouseout="hide(this)" onclick="edit(this, '+num+')">';
        html += '<p class="type3-title-'+num+'">标题</p><div class="media-body-div"><img class="type3-img-'+num+'" src="" style="max-width:62px;max-height:62px;display:none;"><span class="img-text">缩略图</span></div>';
        html += '<div class="actions"><span class="edit">编辑</span><span class="del" id="removeMedia1">删除</span></div>';
        html += '<span class="editting">编辑中</span>';
        html += '<input type="hidden" name="hidden'+num+'" id="title'+num+'">';
        html += '<input type="hidden" name="hidden'+num+'" id="author'+num+'">';
        html += '<input type="hidden" name="hidden'+num+'" id="cover'+num+'">';
        html += '<input type="hidden" name="hidden'+num+'" id="show_cover_pic'+num+'" value="0">';
        html += '<input type="hidden" name="hidden'+num+'" id="summary'+num+'">';
        html += '<textarea name="hidden'+num+'" id="content'+num+'" style="display:none;"></textarea>';
        html += '<input type="hidden" name="hidden'+num+'" id="content_source_url'+num+'">';
        html += '</div>';
        $(this).parents(".media-left").find(".media-body").eq(num - 2).after(html);
    });

    //图片上传
    function imgUpload(event, imgsrc, imghidden) {
        if(imghidden == 'cover'){
            var dir = $("#dir").attr('dir');
            imgsrc = imgsrc+dir;
            imghidden = imghidden+dir;
        }
        var fileid = $(event).attr("id");
        var str = $(event).next().attr("id");
        var url = 'UPLOAD_URL';
        var path = '__UPLOAD__';
        var result='';
        var imgpath = "#img"+str;
        var imgval = "#"+str;
        var data = { 'file_path' : path+"/wx"};
        uploadFile(fileid,data,function(res){
            if(res.code){
                $("."+imgsrc).attr("src",'__PUBLIC__'+res.data);
                $("."+imgsrc).show();
                $("."+imgsrc).next(".img-text").hide();
                $("#"+imghidden).val(res.data);
                $(imgpath).attr("src",'__PUBLIC__'+res.data);
                $(imgval).val(res.data);
                showTip(res.message,"success");
            }else{
                showTip(res.message,"error");
            }
        });
    }

    $("#title").keyup(function(){
        if($(this).val() == ''){
            $(this).parents(".media").find("h5.type-title").html('标题');
        }else{
            $(this).val($(this).val().substr(0,70));
            $(this).parents(".media").find("h5.type-title").html($(this).val());
        }
    });

    $("#author").keyup(function(){
        $(this).val($(this).val().substr(0,45));
    });

    //图文详情项删除
    function deleteWeixinMediaDetail(id){
        $( "#dialog" ).dialog({
            buttons: {"确定,#e57373": function() {
                    $(this).dialog('close');
                    $.ajax({
                        type : "post",
                        url : "<?php echo url('deleteweixinmediadetail'); ?>",
                        data : {"id" : id},
                        success : function(res){
                            if(res>0){
                                showMessage('success', "操作成功", "<?php echo url('updatemedia',array('media_id'=>$info['media_id'])); ?>");
                            }else{
                                showMessage('error', "操作失败");
                            }
                        }
                    });
                },
                "取消": function() {
                    $(this).dialog('close');
                    return 0;
                }
            },
            contentText:"确定要删除吗"
        });
    }

    //点击消息类型  切换表单
    $("input[type=radio][name='type']").click(function(){
        var type = $(this).val();
        $(".type1").hide();
        $(".type2").hide();
        $(".type3").hide();
        $(".type"+type).show();
    });

    function show(event) {
        $(event).children('.actions').show();
    }
    function hide(event) {
        $(event).children('.actions').hide();
    }
    function showMessage(type, message,url,time){
        if(url == undefined){
            url = '';
        }
        if(time == undefined){
            time = 2;
        }
        //成功之后的跳转
        if(type == 'success'){
            $( "#dialog" ).dialog({
                buttons: {
                    "确定,#51A351": function() {
                        $(this).dialog('close');
                    }
                },
                contentText:message,
                time:time,
                timeHref: url,
            });
        }
        //失败之后的跳转
        if(type == 'error'){
            $( "#dialog" ).dialog({
                buttons: {
                    "确定,#e57373": function() {
                        $(this).dialog('close');
                    }
                },
                time:time,
                contentText:message,
                timeHref: url,
            });
        }
    }
    $('body').on('click','#removeMedia',function(event){
        $(this).parents(".media-body").remove();
        event.stopPropagation();
    })
</script>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


</body>
</html>