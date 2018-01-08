<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"F:\www\php/app/admin\view\vct\printInfo.html";i:1515376722;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
<style>
	.layui-table td, .layui-table th {
	    border: 1px solid #000;
	    padding: 8px 1px;
	}
	body{
		font-family: '宋体';
		font-size:12px;
	}
</style>
<div id="infoBox" style="width: 744px;margin:5px auto;">
	<table class="layui-table" style="padding: 10px;">
		<thead>
			<tr>
				<th colspan="8" style="text-align: center;font-size:18px;"><?php echo $info['username']; ?>的详细资料</th>
			</tr>
		</thead>
		<tbody>
			<tr align="right">
				<td colspan="8">采集时间：<?php echo date('Y-m-d',$info['addtime']); ?></td>
			</tr>
			<tr align="center">
				<td>姓名</td>
				<td><?php echo $info['username']; ?></td>
				<td>年龄</td>
				<td><?php echo $info['age']; ?></td>
				<td>性别</td>
				<td><?php if($info['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
				<td>电话</td>
				<td><?php echo $info['phone']; ?></td>
			</tr>
			<tr align="center">
				<td>检测编号</td>
				<td><?php echo $info['jiance_bianhao']; ?></td>
				<td>首次检测</td>
				<td><?php if($info['is_first_jiance'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
				<td>来访时间</td>
				<td><?php echo date('Y-m-d',$info['visited_time']); ?></td>
				<td>得知渠道</td>
				<td><?php echo getFromQudao($info['from_qudao']); ?></td>
			</tr>
			<tr align="center">
				<td>来访原因</td>
				<td><?php echo getVisitedReason($info['visited_reason']); ?></td>
				<!-- <td>暴露原因</td>
				<td><?php echo getBaolouReason($info['baolou_reason']); ?></td> -->
				<td>人群属性</td>
				<td><?php echo getRenqunShuxing($info['renqun_shuxing']); ?></td>
				<td>身份证</td>
				<td colspan="3"><?php echo $info['idcard']; ?></td>
			</tr>
			<tr>
				<td align="center">暴露原因</td>
				<td colspan="7" align="left">
					<?php echo getBaolouReason($info['baolou_reason']); ?>
        		</td>
			</tr>
			<tr>
				<td align="center">暴露原因说明</td>
				<td colspan="7" align="left">
					<?php echo $info['baolou_reason_note']; ?>
        		</td>
			</tr>
			<tr align="center">
				<td>领取礼品</td>
				<td><?php if($info['is_take_gift'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
				<td>礼品名</td>
				<td><?php echo $info['gift']; ?></td>
				<td>加咨询员微信/QQ</td>
				<td><?php if($info['is_get_weixin'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
				<td>关注艾检测</td>
				<td><?php if($info['is_take_ajiance'] == 1): ?>是<?php else: ?>否<?php endif; ?></td>
			</tr>
			<tr align="center">
				<td>金标检测</td>
				<td colspan="3"><?php if($info['jinbiao_jiance'] == 1): ?>阴性<?php else: ?>待复查<?php endif; ?></td>
				<td>确证单位</td>
				<td colspan="3"><?php echo $info['quezheng_danwei']; ?></td>
			</tr>
			<tr align="center">
				<td>上次检测时间</td>
				<td colspan="3"><?php echo date('Y-m-d',$info['last_jiance_time']); ?></td>
				<td>上次检测机构</td>
				<td colspan="3"><?php echo $info['last_jiance_jigou']; ?></td>
			</tr>
			<tr>
				<td align="center">现居地</td>
				<td colspan="7" align="left">
					<?php echo $info['address']; ?>
        		</td>
			</tr>
			<tr>
				<td align="center">咨询点</td>
				<td colspan="7" align="left">
					<?php echo $info['zixundian']; ?>
        		</td>
			</tr>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


</body>
</html>