<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"F:\www\php/app/admin\view\auth\roleList.html";i:1515130078;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
	        <legend><?php echo lang('role'); ?><?php echo lang('list'); ?></legend>
	    </fieldset>
	    <blockquote class="layui-elem-quote">
	        <a href="<?php echo url('roleAdd'); ?>" class="layui-btn layui-btn-sm"><?php echo lang('add'); ?><?php echo lang('role'); ?></a>
	    </blockquote>
	</div>
	<div class="layui-form">
		<table class="layui-table">
		    <colgroup>
		      <col width="80">
		      <col width="80">
		      <col>
		      <col width="215">
		    </colgroup>
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>排序</th>
		        <th>角色名</th>
		        <th>操作</th>
		      </tr> 
		    </thead>
		    <tbody>
		    <?php if(is_array($roleList) || $roleList instanceof \think\Collection || $roleList instanceof \think\Paginator): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?>
		      <tr>
		        <td><?php echo $m['id']; ?></td>
		        <td><?php echo $m['listorder']; ?></td>
		        <td><?php echo $m['title_display']; ?></td>
		        <td>
		        <a href="<?php echo url('roleEdit'); ?>?id=<?php echo $m['id']; ?>" class="layui-btn layui-btn-xs"><i class="fa fa-paste"></i> 编辑
		        </a>
		        <button class="layui-btn layui-btn-xs layui-btn-danger" onclick="delAct(<?php echo $m['id']; ?>)"><i class="fa fa-trash-o"></i> 删除
		        </button>
		        </td>
		      </tr>
		    <?php endforeach; endif; else: echo "" ;endif; ?>
		    </tbody>
		  </table>
	</div>
    <script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>



    <script type="text/javascript">
    	function delAct(id){
    		layui.use('layer', function(){
    			var layer = layui.layer,$ = layui.jquery;
    			layer.confirm('您确定要删除吗？', {
					btn: ['确定','取消']
				}, function(){
				 	$.ajax({
				 		url: "<?php echo url('roleDel'); ?>?id="+id,
				 		type: 'POST',
				 		dataType: 'json',
				 		data: {id:id},
				 		success:function(res){
				 			if(res.code){
				 				layer.msg(res.msg,{icon:1});
				 				setTimeout(function(){
				 					location.reload();
				 				},1000);
				 			}else{
				 				layer.msg(res.msg,{icon:2});
				 			}
				 		}
				 	})
				});
    		})
    	}
    </script>
    </body>
</html>