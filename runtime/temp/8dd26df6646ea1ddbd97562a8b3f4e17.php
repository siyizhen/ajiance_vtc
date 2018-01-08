<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:39:"F:\www\php/app/admin\view\vct\form.html";i:1515372684;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
                <input type="text" name="username" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>姓名" class="layui-input" value="<?php echo $info['username']; ?>">
            </div>
        </div>
    
        <div class="layui-form-item">
            <label class="layui-form-label">性别</label>
            <div class="layui-input-block">
            	<?php if(!empty($info)): ?>
				<input type="radio" name="sex" title="男" value="1" <?php if($info['sex'] == 1): ?>checked=""<?php endif; ?>>
				<input type="radio" name="sex" title="女" value="2" <?php if($info['sex'] == 2): ?>checked=""<?php endif; ?>>
            	<?php else: ?>
                <input type="radio" name="sex" title="男" value="1" checked="">
                <input type="radio" name="sex" title="女" value="2">
                <?php endif; ?>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">年龄</label>
            <div class="layui-input-1">
                <input type="text" name="age" lay-verify="number" placeholder="<?php echo lang('pleaseEnter'); ?>年龄" class="layui-input" value="<?php echo $info['age']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">身份证</label>
            <div class="layui-input-2">
                <input type="text" name="idcard" placeholder="<?php echo lang('pleaseEnter'); ?>身份证" class="layui-input" value="<?php echo $info['idcard']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">手机号</label>
            <div class="layui-input-2">
                <input type="text" name="phone" lay-verify="phone" placeholder="<?php echo lang('pleaseEnter'); ?>手机号" class="layui-input" value="<?php echo $info['phone']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">现居地</label>
            <div class="layui-input-3">
                <input type="text" name="address" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>现居地" class="layui-input" value="<?php echo $info['address']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">检测编号</label>
            <div class="layui-input-2">
                <input type="text" name="jiance_bianhao" lay-verify="required" placeholder="<?php echo lang('pleaseEnter'); ?>检测编号" class="layui-input" value="<?php echo $info['jiance_bianhao']; ?>">
            </div>
        </div>

		<div class="layui-form-item">
            <label class="layui-form-label">首次检测</label>
            <div class="layui-input-block">
            	<?php if(!empty($info)): ?>
				<input type="radio" name="is_first_jiance" title="是" value="1" <?php if($info['is_first_jiance'] == 1): ?>checked=""<?php endif; ?>>
				<input type="radio" name="is_first_jiance" title="否" value="0" <?php if($info['is_first_jiance'] == 0): ?>checked=""<?php endif; ?>>
            	<?php else: ?>
                <input type="radio" name="is_first_jiance" title="是" value="1" checked="">
                <input type="radio" name="is_first_jiance" title="否" value="0">
                <?php endif; ?>
            </div>
        </div>

        <div class="layui-form-item">
			<label class="layui-form-label">来访时间</label>
			<div class="layui-input-2">
				<?php if(!empty($info)): ?>
				<input type="text" lay-verify="date" name="visited_time" id="visited_time" class="layui-input" value="<?php echo date('Y-m-d',$info['visited_time']); ?>">
				<?php else: ?>
				<input type="text" lay-verify="date" name="visited_time" id="visited_time" class="layui-input" value="<?php echo date('Y-m-d');?>">
				<?php endif; ?>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">得知渠道</label>
			<div class="layui-input-1">
				<select name="from_qudao" lay-verify="required" lay-search="">
					<option value="">请选择</option>
                    <?php $qudaoArr=fromQudao();if(is_array($qudaoArr) || $qudaoArr instanceof \think\Collection || $qudaoArr instanceof \think\Paginator): $n = 0; $__LIST__ = $qudaoArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
					<option value="<?php echo $n; ?>" <?php if($info['from_qudao'] == $n): ?>selected=""<?php endif; ?>><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">来访原因</label>
			<div class="layui-input-11">
				<?php $reasonArr=visitedReason();if(!empty($info)): if(is_array($reasonArr) || $reasonArr instanceof \think\Collection || $reasonArr instanceof \think\Paginator): $n = 0; $__LIST__ = $reasonArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                <input type="radio" name="visited_reason" title="<?php echo $m; ?>" value="<?php echo $n; ?>" <?php if($n == $info['visited_reason']): ?>checked=""<?php endif; ?>>
                <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($reasonArr) || $reasonArr instanceof \think\Collection || $reasonArr instanceof \think\Paginator): $n = 0; $__LIST__ = $reasonArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                <input type="radio" name="visited_reason" title="<?php echo $m; ?>" value="<?php echo $n; ?>" <?php if($n == 1): ?>checked=""<?php endif; ?>>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
			</div>
		</div>

		<div class="layui-form-item">
			<label class="layui-form-label">暴露原因</label>
			<div class="layui-input-2">
				<select name="baolou_reason" lay-verify="required" lay-search="" lay-filter="baolou_reason">
					<option value="">请选择</option>
					<?php $baoluArr=baolouReason();if(is_array($baoluArr) || $baoluArr instanceof \think\Collection || $baoluArr instanceof \think\Paginator): $n = 0; $__LIST__ = $baoluArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>" <?php if($info['baolou_reason'] == $n): ?>selected=""<?php endif; ?>><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>

        <div class="layui-form-item" <?php if($info['baolou_reason'] != 6): ?>style="display: none;"<?php endif; ?>>
            <label class="layui-form-label">原因说明</label>
            <div class="layui-input-3">
                <textarea placeholder="请输入原因说明" class="layui-textarea" name="baolou_reason_note" id="baolou_reason_note" <?php if($info['baolou_reason'] != 6): ?>disabled=""<?php endif; ?>><?php echo $info['baolou_reason_note']; ?></textarea>
            </div>
        </div>

		<div class="layui-form-item">
			<label class="layui-form-label">人群属性</label>
			<div class="layui-input-2">
				<select name="renqun_shuxing" lay-verify="required" lay-search="">
					<option value="">请选择</option>
					<?php $renqunArr=renqunShuxing();if(is_array($renqunArr) || $renqunArr instanceof \think\Collection || $renqunArr instanceof \think\Paginator): $n = 0; $__LIST__ = $renqunArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>"  <?php if($info['renqun_shuxing'] == $n): ?>selected=""<?php endif; ?>><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>

		<div class="layui-form-item">
            <label class="layui-form-label">金标检测</label>
            <div class="layui-input-block">
            	<?php if(!empty($info)): ?>
                <input type="radio" lay-filter="jinbiao_jiance" name="jinbiao_jiance" title="阴性" value="1" <?php if($info['jinbiao_jiance'] == 1): ?>checked=""<?php endif; ?>>
                <input type="radio" lay-filter="jinbiao_jiance" name="jinbiao_jiance" title="待复查" value="2" <?php if($info['jinbiao_jiance'] == 2): ?>checked=""<?php endif; ?>>
                <?php else: ?>
				<input type="radio" lay-filter="jinbiao_jiance" name="jinbiao_jiance" title="阴性" value="1" checked="">
                <input type="radio" lay-filter="jinbiao_jiance" name="jinbiao_jiance" title="待复查" value="2">
                <?php endif; ?>
            </div>
        </div>

        <div class="layui-form-item" <?php if($info['jinbiao_jiance'] != 2): ?>style="display: none;"<?php endif; ?>>
            <label class="layui-form-label">确证单位</label>
            <div class="layui-input-3">
                <input type="text" id="quezheng_danwei" name="quezheng_danwei" placeholder="<?php echo lang('pleaseEnter'); ?>确证单位" class="layui-input" <?php if($info['jinbiao_jiance'] != 2): ?>disabled=""<?php endif; ?> value="<?php echo $info['quezheng_danwei']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上次检测机构</label>
            <div class="layui-input-3">
                <input type="text" name="last_jiance_jigou" placeholder="<?php echo lang('pleaseEnter'); ?>上次检测机构" class="layui-input" value="<?php echo $info['last_jiance_jigou']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">上次检测时间</label>
            <div class="layui-input-2">
                <input type="text" name="last_jiance_time" id="last_jiance_time" placeholder="<?php echo lang('pleaseEnter'); ?>上次检测时间" class="layui-input" value="<?php if(empty($info)): ?><?php echo date('Y-m-d');else: ?><?php echo date('Y-m-d',$info['last_jiance_time']); endif; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">领取礼品</label>
            <div class="layui-input-block">
                <?php if(!empty($info)): ?>
				<input type="radio" lay-filter="is_take_gift" name="is_take_gift" title="是" value="1" <?php if($info['is_take_gift'] == 1): ?>checked=""<?php endif; ?>>
                <input type="radio" lay-filter="is_take_gift" name="is_take_gift" title="否" value="0" <?php if($info['is_take_gift'] == 0): ?>checked=""<?php endif; ?>>
                <?php else: ?>
				<input type="radio" lay-filter="is_take_gift" name="is_take_gift" title="是" value="1">
                <input type="radio" lay-filter="is_take_gift" name="is_take_gift" title="否" value="0" checked="">
                <?php endif; ?>
            </div>
        </div>

        <div class="layui-form-item" <?php if($info['is_take_gift'] != 1): ?>style="display: none;"<?php endif; ?>>
            <label class="layui-form-label">礼品名</label>
            <div class="layui-input-2">
                <input type="text" id="gift" name="gift" placeholder="<?php echo lang('pleaseEnter'); ?>礼品名" class="layui-input" <?php if($info['jinbiao_jiance'] != 2): ?>disabled=""<?php endif; ?> value="<?php echo $info['gift']; ?>">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">加咨询员微信/QQ</label>
            <div class="layui-input-block">
                <?php if(!empty($info)): ?>
				<input type="radio" name="is_get_weixin" title="是" value="1" <?php if($info['is_get_weixin'] == 1): ?>checked=""<?php endif; ?>>
                <input type="radio" name="is_get_weixin" title="否" value="0" <?php if($info['is_get_weixin'] == 0): ?>checked=""<?php endif; ?>>
                <?php else: ?>
				<input type="radio" name="is_get_weixin" title="是" value="1">
                <input type="radio" name="is_get_weixin" title="否" value="0" checked="">
                <?php endif; ?>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">关注艾检测</label>
            <div class="layui-input-block">
                <?php if(!empty($info)): ?>
				<input type="radio" name="is_take_ajiance" title="是" value="1" <?php if($info['is_get_weixin'] == 1): ?>checked=""<?php endif; ?>>
                <input type="radio" name="is_take_ajiance" title="否" value="0" <?php if($info['is_get_weixin'] == 0): ?>checked=""<?php endif; ?>>
                <?php else: ?>
				<input type="radio" name="is_take_ajiance" title="是" value="1">
                <input type="radio" name="is_take_ajiance" title="否" value="0" checked="">
                <?php endif; ?>
            </div>
        </div>

        <?php if(!empty($info)): ?>
		<input type="hidden" value="<?php echo $info['id']; ?>" name="id">
        <?php endif; ?>

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

        form.on('select(baolou_reason)', function(data){
			if(data.value==6){
				$("#baolou_reason_note").removeAttr('disabled').parent().parent().show();
			}else{
				$("#baolou_reason_note").attr('disabled','true').parent().parent().hide();
				$("#baolou_reason_note").val('');
			}
		}); 

		form.on('radio(jinbiao_jiance)', function(data){
			if(data.value==2){
				$("#quezheng_danwei").removeAttr('disabled').parent().parent().show();
			}else{
				$("#quezheng_danwei").attr('disabled','true').parent().parent().hide();
				$("#quezheng_danwei").val('');
			}
		});   

		form.on('radio(is_take_gift)', function(data){
			if(data.value==1){
				$("#gift").removeAttr('disabled').parent().parent().show();
			}else{
				$("#gift").attr('disabled','true').parent().parent().hide();
				$("#gift").val('');
			}
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