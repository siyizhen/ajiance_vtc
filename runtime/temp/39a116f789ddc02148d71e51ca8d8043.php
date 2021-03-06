<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:46:"F:\www\php/app/homeadmin\view\login\login.html";i:1515478164;}*/ ?>
<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>登录</title>
		<link href="__STATIC__/plugins/mui/css/mui.min.css" rel="stylesheet" />
		<link href="__STATIC__/plugins/mui/css/style.css" rel="stylesheet" />
		<link rel="stylesheet" href="__STATIC__/plugins/mui/css/mui.picker.min.css">
		<link rel="stylesheet" href="__STATIC__/plugins/mui/css/app.css">
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">登录</h1>
		</header>
		<div class="mui-content">
			<div id='login-form' class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='username' type="text" class="mui-input-clear mui-input" placeholder="请输入账号">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
				</div>
			</div>
			<div class="mui-input-group">
				<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell">
						自动登录
						<div id="autoLogin" class="mui-switch">
							<div class="mui-switch-handle"></div>
						</div>
					</li>
				</ul>
			</div>
			<div class="mui-content-padded">
				<button onclick="login();" class="mui-btn mui-btn-block mui-btn-primary">登录</button>
			</div>
		</div>
		<script src="__HOME__/js/jquery.min.js"></script>
		<script src="__STATIC__/plugins/mui/js/mui.min.js"></script>
		<script src="__STATIC__/plugins/layer_mobile/layer.js"></script>
		<script>
			var autoLogin=false;
			document.getElementById('autoLogin').addEventListener('toggle', function(event) {
				autoLogin=event.detail.isActive;
			});

			function login(){
				var username=$.trim($("#username").val());
				var password=$.trim($("#password").val());
				if(username==''){
					layer.open({content:'请输入帐号',skin:'footer'});
					$("#username").focus();
					return false;
				}
				if(password==''){
					layer.open({content:'请输入密码',skin:'footer'});
					$("#password").focus();
					return false;
				}
				var _index;
				$.ajax({
					beforeSend:function(){
						_index=layer.open({type: 2,content: '提交中'});
					},
					url: "<?php echo url('login/login'); ?>",
					type: 'POST',
					dataType: 'json',
					data: {username:username,password:password,autoLogin:autoLogin},
					success:function(res){
						layer.open({content:res.msg,skin:'footer'});
						if(res.status==1){
							setTimeout(function(){
								window.location.href="<?php echo url('homeadmin/index/add'); ?>";
							},1000)
						}
					},
					complete:function(){
						layer.close(_index);
					}
				})
			}
		</script>
	</body>
</html>