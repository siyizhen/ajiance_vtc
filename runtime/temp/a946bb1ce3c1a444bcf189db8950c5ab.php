<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:47:"E:\www\ajiance_vct/app/admin\view\vct\form.html";i:1515254831;s:50:"E:\www\ajiance_vct/app/admin\view\common\head.html";i:1515234151;s:50:"E:\www\ajiance_vct/app/admin\view\common\foot.html";i:1515234151;}*/ ?>
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
            <label class="layui-form-label">姓名</label>
            <div class="layui-input-1">
                <input type="text" name="username" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>姓名" class="layui-input">
            </div>
        </div>
    
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
                <input type="radio" name="sex" title="男" value="1" checked="">
                <input type="radio" name="sex" title="女" value="2">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">年龄</label>
            <div class="layui-input-1">
                <input type="text" name="age" lay-verify="number" placeholder="<?php echo lang('pleaseEnter'); ?>年龄" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">身份证</label>
            <div class="layui-input-2">
                <input type="text" name="idcard" placeholder="<?php echo lang('pleaseEnter'); ?>身份证" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-2">
                <input type="text" name="phone" lay-verify="phone" placeholder="<?php echo lang('pleaseEnter'); ?>手机号" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">现居地</label>
            <div class="layui-input-3">
                <input type="text" name="address" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>现居地" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">检测编号</label>
            <div class="layui-input-2">
                <input type="text" name="jiance_bianhao" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>检测编号" class="layui-input">
            </div>
        </div>

		<div class="layui-form-item">
            <label class="layui-form-label">首次检测</label>
            <div class="layui-input-block">
                <input type="radio" name="is_first_jiance" title="是" value="1" checked="">
                <input type="radio" name="is_first_jiance" title="否" value="0">
            </div>
        </div>

        <div class="layui-form-item">
			<label class="layui-form-label">来访时间</label>
			<div class="layui-input-2">
				<input type="text" lay-verify="date" name="visited_time" id="visited_time" class="layui-input">
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">咨询点</label>
			<div class="layui-input-3">
				<select name="zixundian" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">得知渠道</label>
			<div class="layui-input-3">
				<select name="from_qudao" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">来访原因</label>
			<div class="layui-input-3">
				<select name="visited_reason" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">暴露原因</label>
			<div class="layui-input-3">
				<select name="baolou_reason" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">人群属性</label>
			<div class="layui-input-3">
				<select name="renqun_shuxing" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<option value="1">layer</option>
					<option value="2">form</option>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
            <label class="layui-form-label">金标检测</label>
            <div class="layui-input-block">
                <input type="radio" name="jinbiao_jiance" title="阴性" value="1" checked="">
                <input type="radio" name="jinbiao_jiance" title="待复查" value="2">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">确证单位</label>
            <div class="layui-input-3">
                <input type="text" name="quezheng_danwei" placeholder="<?php echo lang('pleaseEnter'); ?>确证单位" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上次检测机构</label>
            <div class="layui-input-3">
                <input type="text" name="last_jiance_jigou" placeholder="<?php echo lang('pleaseEnter'); ?>上次检测机构" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上次检测时间</label>
            <div class="layui-input-2">
                <input type="text" name="last_jiance_time" id="last_jiance_time" placeholder="<?php echo lang('pleaseEnter'); ?>上次检测时间" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">领取礼品</label>
            <div class="layui-input-block">
                <input type="radio" name="is_take_gift" title="是" value="1">
                <input type="radio" name="is_take_gift" title="否" value="0" checked="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">礼品名</label>
            <div class="layui-input-2">
                <input type="text" name="gift" placeholder="<?php echo lang('pleaseEnter'); ?>礼品名" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">加咨询员微信/QQ</label>
            <div class="layui-input-block">
                <input type="radio" name="is_get_weixin" title="是" value="1">
                <input type="radio" name="is_get_weixin" title="否" value="0" checked="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">关注艾检测</label>
            <div class="layui-input-block">
                <input type="radio" name="is_take_ajiance" title="是" value="1">
                <input type="radio" name="is_take_ajiance" title="否" value="0" checked="">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit="" lay-filter="submit"><?php echo lang('submit'); ?></button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary"><?php echo lang('back'); ?></a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script>
    layui.use(['form', 'layer','laydate'], function () {
        var form = layui.form, $ = layui.jquery,laydate = layui.laydate;
        laydate.render({
            elem: '#visited_time'
        });
        laydate.render({
            elem: '#last_jiance_time'
        });
        form.on('submit(submit)', function (data) {
            // 提交到方法 默认为本身
            var loading = layer.load(1, {shade: [0.1, '#fff']});
            $.post("", data.field, function (res) {
                layer.close(loading);
                if (res.code > 0) {
                    layer.msg(res.msg, {time: 1800, icon: 1}, function () {
                        location.href = res.url;
                    });
                } else {
                    layer.msg(res.msg, {time: 1800, icon: 2});
                }
            });
        })
    });
</script>