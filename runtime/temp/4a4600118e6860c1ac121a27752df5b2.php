<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"E:\www\ajiance_vct/app/admin\view\auth\roleForm.html";i:1515234151;s:50:"E:\www\ajiance_vct/app/admin\view\common\head.html";i:1515234151;s:50:"E:\www\ajiance_vct/app/admin\view\common\foot.html";i:1515234151;}*/ ?>
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
<div class="admin-main layui-anim layui-anim-upbit">
    <fieldset class="layui-elem-field layui-field-title">
        <legend><?php echo $title; ?></legend>
    </fieldset>
    <form class="layui-form layui-form-pane">
        <div class="layui-form-item">
            <label class="layui-form-label">父级角色</label>
            <div class="layui-input-4">
                <select name="pid" lay-verify="required" lay-search="">
                    <option value="0">一级角色</option>
                    <?php if(is_array($roleList) || $roleList instanceof \think\Collection || $roleList instanceof \think\Paginator): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;if(input('param.id') != $m['id']): ?>
                    <option value="<?php echo $m['id']; ?>" <?php if($roleInfo['pid'] == $m['id']): ?>selected=""<?php endif; ?>><?php echo $m['title_display']; ?></option>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('role_name'); ?></label>
            <div class="layui-input-4">
                <input type="text" lay-verify="required" name="name" placeholder="<?php echo lang('pleaseEnter'); ?><?php echo lang('role_name'); ?>" class="layui-input" value="<?php echo $roleInfo['name']; ?>">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><?php echo lang('order'); ?></label>
            <div class="layui-input-4">
                <input type="text" name="listorder" placeholder="<?php echo lang('pleaseEnter'); ?><?php echo lang('order'); ?>" class="layui-input" value="<?php echo $roleInfo['listorder']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" checked value="1" title="开启" <?php if($roleInfo['status'] == 1): ?>checked=""<?php endif; ?>>
                <input type="radio" name="status" value="0" title="关闭" <?php if($roleInfo['status'] == 2): ?>checked=""<?php endif; ?>>
            </div>
        </div>

        <div class="layui-form-item">
		    <label class="layui-form-label">备注</label>
		    <div class="layui-input-block">
		      <textarea placeholder="请输入备注" name="remark" class="layui-textarea" style="width: 500px;"><?php echo $roleInfo['remark']; ?></textarea>
		    </div>
		</div>

		<?php if(!empty($roleInfo)): ?>
		<input type="hidden" value="<?php echo $roleInfo['id']; ?>" name="id">
		<?php endif; ?>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="role"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('roleList'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script>
    layui.use(['form', 'layer'], function () {
        var form = layui.form,layer = layui.layer,$= layui.jquery;
        form.on('submit(role)', function (data) {
            // 提交到方法 默认为本身
            $.post("",data.field,function(res){
                if(res.code > 0){
                    layer.msg(res.msg,{time:1000,icon:1},function(){
                        location.href = res.url;
                    });
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
            });
        })
    });
</script>