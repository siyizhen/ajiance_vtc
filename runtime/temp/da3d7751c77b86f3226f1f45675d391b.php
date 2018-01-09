<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:45:"F:\www\php/app/homeadmin\view\index\form.html";i:1515471820;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo $title; ?></title>
		<link href="__STATIC__/plugins/mui/css/mui.min.css" rel="stylesheet" />
		<link href="__STATIC__/plugins/mui/css/style.css" rel="stylesheet" />
		<link rel="stylesheet" href="__STATIC__/plugins/mui/css/mui.picker.min.css">
		<link rel="stylesheet" href="__STATIC__/plugins/mui/css/app.css">
	</head>

	<body>
		<!-- <header class="mui-bar mui-bar-nav">
			<h1 class="mui-title"><?php echo $title; ?></h1>
		</header> -->
		<div class="mui-content">
			<div class="mui-input-group">
				<div class="mui-input-row">
					<label>姓名</label>
					<input id='username' type="text" class="mui-input-clear mui-input" placeholder="请输入姓名">
				</div>
				<div class="mui-input-row mui-table-view-radio">
					<label>性别</label>
					<div class="mui-radio row_radio">
						<input name="sex" type="radio" value="1" class="radio_class" checked="">
						男&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="sex" type="radio" value="2" class="radio_class">
						女
					</div>
				</div>
				<div class="mui-input-row">
					<label>年龄</label>
					<input id='age' type="text" class="mui-input-clear mui-input" placeholder="请输入年龄">
				</div>
				<div class="mui-input-row">
					<label>手机</label>
					<input id='phone' type="text" class="mui-input-clear mui-input" placeholder="请输入手机号码">
				</div>
				<div class="mui-input-row">
					<label>身份证</label>
					<input id='idcard' type="text" class="mui-input-clear mui-input" placeholder="请输入身份证号码">
				</div>
				<div class="mui-input-row">
					<label>现居地</label>
					<input id='address' type="text" class="mui-input-clear mui-input" placeholder="请输入现居地">
				</div>
				<div class="mui-input-row">
					<label>检测编号</label>
					<input id='jiance_bianhao' type="text" class="mui-input-clear mui-input" placeholder="请输入检测编号">
				</div>
				<div class="mui-input-row">
					<label>首次检测</label>
					<div class="mui-radio row_radio">
						<input name="is_first_jiance" value="1" type="radio" class="radio_class" checked="">
						是&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="is_first_jiance" value="0" type="radio" class="radio_class">
						否
					</div>
				</div>
				<div class="mui-input-row">
					<label>来访时间</label>
					<input id='visited_time' data-options="{&quot;type&quot;:&quot;date&quot;,&quot;beginYear&quot;:2014,&quot;endYear&quot;:2016}" type="text" class="mui-input-clear mui-input" placeholder="请选择来访时间">
				</div>
				<div class="mui-input-row">
					<label>得知渠道</label>
					<input id='from_qudao_show' type="text" class="mui-input-clear mui-input" placeholder="请选择得知渠道">
					<input type="hidden" id="from_qudao">
				</div>
				<div class="mui-input-row">
					<label>来访原因</label>
					<input id='visited_reason_show' type="text" class="mui-input-clear mui-input" placeholder="请选择来访原因">
					<input type="hidden" id="visited_reason">
				</div>
				<div class="mui-input-row">
					<label>暴露原因</label>
					<input id='baolou_reason_show' type="text" class="mui-input-clear mui-input" placeholder="请选择暴露原因">
					<input type="hidden" id="baolou_reason">
				</div>
				<div class="mui-input-row" style="height: auto !important;display: none;">
					<label>原因说明</label>
					<textarea id="baolou_reason_note" rows="5" placeholder="请输入原因说明"></textarea>
				</div>
				<div class="mui-input-row">
					<label>人群属性</label>
					<input id='renqun_shuxing_show' type="text" class="mui-input-clear mui-input" placeholder="请选择人群属性">
					<input type="hidden" id="renqun_shuxing">
				</div>
				<div class="mui-input-row">
					<label>金标检测</label>
					<div class="mui-radio row_radio">
						<input name="jinbiao_jiance" value="1" type="radio" class="radio_class" checked="">
						阴性&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="jinbiao_jiance" value="2" type="radio" class="radio_class">
						待复查
					</div>
				</div>
				<div class="mui-input-row" style="display: none;">
					<label>确证单位</label>
					<input id='quezheng_danwei' type="text" class="mui-input-clear mui-input" placeholder="请输入确证单位">
				</div>
				<div class="mui-input-row">
					<label>上检机构</label>
					<input id='last_jiance_jigou' type="text" class="mui-input-clear mui-input" placeholder="请输入上次检测机构">
				</div>
				<div class="mui-input-row">
					<label>上检时间</label>
					<input id='last_jiance_time' data-options="{&quot;type&quot;:&quot;date&quot;,&quot;beginYear&quot;:2014,&quot;endYear&quot;:2016}" type="text" class="mui-input-clear mui-input" placeholder="请选择上次检测时间">
				</div>
				<div class="mui-input-row">
					<label>领取礼品</label>
					<div class="mui-radio row_radio">
						<input name="is_take_gift" value="1" type="radio" class="radio_class">
						是&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="is_take_gift" value="0" type="radio" class="radio_class" checked="">
						否
					</div>
				</div>
				<div class="mui-input-row" style="display: none;">
					<label>具体礼品</label>
					<input id='gift' type="text" class="mui-input-clear mui-input" placeholder="请输入礼品">
				</div>
				<div class="mui-input-row">
					<label>加咨询员</label>
					<div class="mui-radio row_radio">
						<input name="is_get_weixin" value="1" type="radio" class="radio_class">
						是&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="is_get_weixin" value="0" type="radio" class="radio_class" checked="">
						否
					</div>
				</div>
				<div class="mui-input-row">
					<label>加艾检测</label>
					<div class="mui-radio row_radio">
						<input name="is_take_ajiance" value="1" type="radio" class="radio_class">
						是&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="is_take_ajiance" value="0" type="radio" class="radio_class" checked="">
						否
					</div>
				</div>
			</div>
			<div class="mui-content-padded">
				<button onclick="return submits();" class="mui-btn mui-btn-block mui-btn-primary">提 交</button>
			</div>
		</div>
		<script src="__HOME__/js/jquery.min.js"></script>
		<script src="__STATIC__/plugins/mui/js/mui.min.js"></script>
		<script src="__STATIC__/plugins/mui/js/mui.picker.min.js"></script>
		<script src="__STATIC__/plugins/layer_mobile/layer.js"></script>
		<script type="text/javascript">
			var visited_time,last_jiance_time;

			(function($) {
				$.init();
				document.getElementById('visited_time').addEventListener('tap', function() {
					var optionsJson = this.getAttribute('data-options') || '{}';
					var options = JSON.parse(optionsJson);
					var id = this.getAttribute('id');
					var picker = new $.DtPicker(options);

					picker.show(function(rs) {
						document.getElementById("visited_time").value=visited_time=rs.text;
						picker.dispose();
					});
				}, false);

				document.getElementById('last_jiance_time').addEventListener('tap', function() {
					var optionsJson = this.getAttribute('data-options') || '{}';
					var options = JSON.parse(optionsJson);
					var id = this.getAttribute('id');
					var picker = new $.DtPicker(options);

					picker.show(function(rs) {
						document.getElementById("last_jiance_time").value=last_jiance_time=rs.text;
						picker.dispose();
					});
				}, false);

				var userPicker = new $.PopPicker();
				document.getElementById('from_qudao_show').addEventListener('tap', function() {
					userPicker.setData(<?php echo $fromQudaoData; ?>);
					userPicker.show(function(items) {
						document.getElementById("from_qudao_show").value=items[0]['text'];
						document.getElementById("from_qudao").value=items[0]['value'];
					});
				}, false);

				document.getElementById('visited_reason_show').addEventListener('tap', function() {
					userPicker.setData(<?php echo $visitedReasonData; ?>);
					userPicker.show(function(items) {
						document.getElementById("visited_reason_show").value=items[0]['text'];
						document.getElementById("visited_reason").value=items[0]['value'];
					});
				}, false);

				document.getElementById('baolou_reason_show').addEventListener('tap', function() {
					userPicker.setData(<?php echo $baolouReasonData; ?>);
					userPicker.show(function(items) {
						document.getElementById("baolou_reason_show").value=items[0]['text'];
						document.getElementById("baolou_reason").value=items[0]['value'];

						if(items[0]['value']==6){
							document.getElementById("baolou_reason_note").parentNode.style.display='block';
						}else{
							document.getElementById("baolou_reason_note").parentNode.style.display='none';
							document.getElementById("baolou_reason_note").value='';
						}
					});
				}, false);

				document.getElementById('renqun_shuxing_show').addEventListener('tap', function() {
					userPicker.setData(<?php echo $renqunShuxingData; ?>);
					userPicker.show(function(items) {
						document.getElementById("renqun_shuxing_show").value=items[0]['text'];
						document.getElementById("renqun_shuxing").value=items[0]['value'];
					});
				}, false);
			})(mui);

			$('input:radio[name="jinbiao_jiance"]').change(function() {
				if($(this).val()==2){
					$("#quezheng_danwei").parent().show();
				}else{
					$("#quezheng_danwei").parent().hide();
					$("#quezheng_danwei").val('');
				}
			});

			$('input:radio[name="is_take_gift"]').change(function() {
				if($(this).val()==1){
					$("#gift").parent().show();
				}else{
					$("#gift").parent().hide();
					$("#gift").val('');
				}
			});

			function submits(){
				var username=$.trim($("#username").val());
				var sex=$('input:radio[name="sex"]:checked').val();
				var age=$.trim($("#age").val());
				var phone=$.trim($("#phone").val());
				var idcard=$.trim($("#idcard").val());
				var address=$.trim($("#address").val());
				var jiance_bianhao=$.trim($("#jiance_bianhao").val());
				var is_first_jiance=$('input:radio[name="is_first_jiance"]:checked').val();
				var from_qudao=$.trim($("#from_qudao").val());
				var visited_reason=$.trim($("#visited_reason").val());
				var baolou_reason=$.trim($("#baolou_reason").val());
				var baolou_reason_note=$.trim($("#baolou_reason_note").val());
				var renqun_shuxing=$.trim($("#renqun_shuxing").val());
				var jinbiao_jiance=$('input:radio[name="jinbiao_jiance"]:checked').val();
				var quezheng_danwei=$.trim($("#quezheng_danwei").val());
				var last_jiance_jigou=$.trim($("#last_jiance_jigou").val());
				var is_take_gift=$('input:radio[name="is_take_gift"]:checked').val();
				var gift=$.trim($("#gift").val());
				var is_get_weixin=$('input:radio[name="is_get_weixin"]:checked').val();
				var is_take_ajiance=$('input:radio[name="is_take_ajiance"]:checked').val();
				
				if(username==''){
					layer.open({content:'请输入姓名',skin:'footer'});
					$("#username").focus();
					return false;
				}
				if(Math.floor(age)!=age){
					layer.open({content:'请输入正确的年龄',skin:'footer'});
					$("#age").focus();
					return false;
				}
				var reg=/^1[3|4|5|7|8][0-9]\d{4,8}$/;
				if(!reg.test(phone)){
					layer.open({content:'请输入正确的手机',skin:'footer'});
					$("#phone").focus();
					return false;
				}
				if(address==''){
					layer.open({content:'请输入现居住地',skin:'footer'});
					$("#address").focus();
					return false;
				}
				if(jiance_bianhao==''){
					layer.open({content:'请输入检测编号',skin:'footer'});
					$("#jiance_bianhao").focus();
					return false;
				}
				if(visited_time==''||visited_time==null){
					layer.open({content:'请选择来访时间',skin:'footer'});
					$("#visited_time").focus();
					return false;
				}
				if(from_qudao==''){
					layer.open({content:'请选择得知渠道',skin:'footer'});
					$("#from_qudao").focus();
					return false;
				}
				if(visited_reason==''){
					layer.open({content:'请选择来访原因',skin:'footer'});
					$("#visited_reason").focus();
					return false;
				}
				if(baolou_reason==''){
					layer.open({content:'请选择暴露原因',skin:'footer'});
					$("#baolou_reason").focus();
					return false;
				}
				if(baolou_reason==6&&baolou_reason_note==''){
					layer.open({content:'请输入原因说明',skin:'footer'});
					$("#baolou_reason_note").focus();
					return false;
				}
				if(renqun_shuxing==''){
					layer.open({content:'请选择人群属性',skin:'footer'});
					$("#renqun_shuxing").focus();
					return false;
				}
				if(jinbiao_jiance==2&&quezheng_danwei==''){
					layer.open({content:'请输入确证单位',skin:'footer'});
					$("#quezheng_danwei").focus();
					return false;
				}
				if(last_jiance_time==''||last_jiance_time==null){
					layer.open({content:'请选择上次检测时间',skin:'footer'});
					$("#last_jiance_time").focus();
					return false;
				}
				$.ajax({
					beforeSend:function(){
						layer.open({type: 2,content: '提交中'});
					},
					url: "<?php echo url('homeadmin/index/input('param.act')'); ?>",
					type: 'POST',
					dataType: 'json',
					data: {username:username,sex:sex,age:age,phone:phone,idcard:idcard,address:address,jiance_bianhao:jiance_bianhao,is_first_jiance:is_first_jiance,visited_time:visited_time,from_qudao:from_qudao,visited_reason:visited_reason,baolou_reason:baolou_reason,baolou_reason_note:baolou_reason_note,renqun_shuxing:renqun_shuxing,jinbiao_jiance:jinbiao_jiance,quezheng_danwei:quezheng_danwei,last_jiance_jigou:last_jiance_jigou,last_jiance_time:last_jiance_time,is_take_gift:is_take_gift,gift:gift,is_get_weixin:is_get_weixin,is_take_ajiance:is_take_ajiance},
					success:function(res){
						console.log(res);
					}
				})
			}
		</script>
	</body>
</html>