<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"F:\www\php/app/admin\view\vct\tongJi.html";i:1515400098;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
        <legend><?php echo lang('vct'); ?>统计</legend>
    </fieldset>
    <div class="demoTable layui-form">
        <div class="layui-inline">
            <label class="layui-form-label" style="width: 90px;">选择统计条件</label>
            <div class="layui-input-inline">
                <select id="types" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">首次检测</option>
                    <option value="2">得知渠道</option>
                    <option value="3">来访原因</option>
                    <option value="4">暴露原因</option>
                    <option value="5">人群属性</option>
                    <option value="6">金标检测</option>
                    <option value="7">领取礼品</option>
                    <option value="8">加咨询员</option>
                    <option value="9">关注艾检测</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label" style="width: 45px;">咨询点</label>
            <div class="layui-input-inline">
                <select id="role_id" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <?php if(is_array($zixundianList) || $zixundianList instanceof \think\Collection || $zixundianList instanceof \think\Paginator): $n = 0; $__LIST__ = $zixundianList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $m['id']; ?>"><?php echo $m['title_display']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="layui-inline" style="width:11%;">
            <input type="text" class="layui-input" id="addtime" placeholder="请选择时间范围">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?>统计</button>
    </div>

    <div id="main" style="width: 50%;height:400px;margin-top:20px;float: left;"></div>
    <div id="main1" style="width: 50%;height:400px;margin-top:20px;float: left;"></div>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/javascript" src="__STATIC__/common/js/echarts.min.js"></script>
<script type="text/javascript">
	layui.use(['table','form','laydate'], function() {
        var table = layui.table,form = layui.form,$ = layui.jquery,laydate = layui.laydate;

        laydate.render({
            elem: '#addtime',
            range: true
        });

        var option,option1;
        var myChart = echarts.init(document.getElementById('main'));
        var myChart1 = echarts.init(document.getElementById('main1'));

        $("#search").click(function() {
	    	var types=$.trim($("#types").val());
	    	var addtime=$.trim($("#addtime").val());
	    	var role_id=$.trim($("#role_id").val());
	    	if (types === '' && addtime === '' && role_id === '') {
                layer.msg('请先选择统计条件！', {icon: 0});
                return;
            }
            $.ajax({
            	url: "<?php echo url('tongJi'); ?>",
            	type: 'POST',
            	dataType: 'json',
            	async: false,
            	data: {types:types,addtime:addtime,role_id:role_id},
            	success:function(res){
            		if(types==1||types==6||types==7||types==8||types==9){
            			option = {
						    title : {
						        text: res.title+'统计',
						        x:'center'
						    },
						    tooltip : {
						        trigger: 'item',
						        formatter: "{a} <br/>{b} : {c} ({d}%)"
						    },
						    legend: {
						        orient: 'vertical',
						        left: 'left',
						        data: res.legendData
						    },
						    series : [
						        {
						            name: res.title,
						            type: 'pie',
						            radius : '55%',
						            center: ['50%', '60%'],
						            data: res.seriesData,
						            itemStyle: {
						                emphasis: {
						                    shadowBlur: 10,
						                    shadowOffsetX: 0,
						                    shadowColor: 'rgba(0, 0, 0, 0.5)'
						                }
						            }
						        }
						    ]
						};
						myChart.setOption(option,true);
						myChart1.clear();
            		}else if(types==2||types==3||types==4||types==5){
            			option = {
				            title: {
				                text: res.title+'统计'
				            },
				            label:{ 
								normal:{ 
									show: true, 
									position: 'top'
								} 
							},
				            legend: {
				                data:['人数']
				            },
				            xAxis: {
				                data: res.legendData
				            },
				            yAxis: {},
				            series: [{
				                name: '人数',
				                type: 'bar',
				                data: res.zhuSeriesData
				            }]
				        };

				        option1 = {
						    title : {
						        text: res.title+'统计',
						        x:'center'
						    },
						    tooltip : {
						        trigger: 'item',
						        formatter: "{a} <br/>{b} : {c} ({d}%)"
						    },
						    legend: {
						        orient: 'vertical',
						        left: 'left',
						        data: res.legendData
						    },
						    series : [
						        {
						            name: res.title,
						            type: 'pie',
						            radius : '55%',
						            center: ['50%', '60%'],
						            data: res.seriesData,
						            itemStyle: {
						                emphasis: {
						                    shadowBlur: 10,
						                    shadowOffsetX: 0,
						                    shadowColor: 'rgba(0, 0, 0, 0.5)'
						                }
						            }
						        }
						    ]
						};
						myChart.setOption(option,true);
						myChart1.setOption(option1,true);
            		}
            	}
            });
	    });
    })
</script>