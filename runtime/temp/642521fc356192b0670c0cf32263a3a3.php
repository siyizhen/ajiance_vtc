<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"F:\www\php/app/admin\view\vct\index.html";i:1515388302;s:42:"F:\www\php/app/admin\view\common\head.html";i:1514860702;s:42:"F:\www\php/app/admin\view\common\foot.html";i:1514860702;}*/ ?>
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
        <legend><?php echo lang('vct'); ?>管理</legend>
    </fieldset>
    <div class="demoTable layui-form">
        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">首次检测</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="is_first_jiance" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">得知渠道</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="from_qudao" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <?php $qudaoArr=fromQudao();if(is_array($qudaoArr) || $qudaoArr instanceof \think\Collection || $qudaoArr instanceof \think\Paginator): $n = 0; $__LIST__ = $qudaoArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>"><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">来访原因</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="visited_reason" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <?php $reasonArr=visitedReason();if(is_array($reasonArr) || $reasonArr instanceof \think\Collection || $reasonArr instanceof \think\Paginator): $n = 0; $__LIST__ = $reasonArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>"><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">暴露原因</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="baolou_reason" lay-verify="required" lay-search="" lay-filter="baolou_reason">
                    <option value="">请选择</option>
                    <?php $baoluArr=baolouReason();if(is_array($baoluArr) || $baoluArr instanceof \think\Collection || $baoluArr instanceof \think\Paginator): $n = 0; $__LIST__ = $baoluArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>"><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">人群属性</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="renqun_shuxing" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <?php $renqunArr=renqunShuxing();if(is_array($renqunArr) || $renqunArr instanceof \think\Collection || $renqunArr instanceof \think\Paginator): $n = 0; $__LIST__ = $renqunArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $n; ?>"><?php echo $m; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="demoTable layui-form" style="margin-top: 10px;">
        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">金标检测</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="jinbiao_jiance" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">阴性</option>
                    <option value="2">待复查</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">领取礼品</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="is_take_gift" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">加咨询员</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="is_get_weixin" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">加艾检测</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="is_take_ajiance" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
        </div>

        <div class="layui-inline">
            <label class="layui-form-label" style="width: 56px;">咨询点</label>
            <div class="layui-input-inline" style="width: 100px;">
                <select id="role_id" lay-verify="required" lay-search="">
                    <option value="">请选择</option>
                    <?php if(is_array($zixundianList) || $zixundianList instanceof \think\Collection || $zixundianList instanceof \think\Paginator): $n = 0; $__LIST__ = $zixundianList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($n % 2 );++$n;?>
                    <option value="<?php echo $m['id']; ?>"><?php echo $m['title_display']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="demoTable layui-form" style="margin-top: 10px;">
        <div class="layui-inline" style="width: 23%;">
            <input class="layui-input" name="key" id="key" placeholder="姓名/身份证/电话/地址/检测编号/礼品">
        </div>
        <div class="layui-inline" style="width:11%;">
            <input type="text" class="layui-input" id="addtime" placeholder="请选择时间范围">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="javascript:sendSms();" class="layui-btn layui-btn-normal">发短信</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <a href="<?php echo url('add'); ?>" class="layui-btn" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i><?php echo lang('add'); ?><?php echo lang('vct'); ?></a>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/html" id="action">
    <a href="javascript:printInfo({{d.id}});" class="layui-btn layui-btn-danger layui-btn-xs">打印</a>
    <a href="<?php echo url('edit'); ?>?id={{d.id}}" class="layui-btn layui-btn-xs">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    var urls="<?php echo url('printInfo'); ?>?id=";
    function printInfo(id){
        var title="详细资料";
        parent.tab.tabAdd({
            href: urls+id,
            title: title
        });
    }

    function sendSms(){
        layui.use(['table'], function(){
            var table = layui.table,$ = layui.jquery;
            var checkStatus = table.checkStatus('vct'); //test即为参数id设定的值
            var phones = [];
            $(checkStatus.data).each(function (i, o) {
                phones.push(o.phone);
            });
            if(phones.length==0){
                layer.msg('选择需要发送短信的用户！',{icon:2});
                return;
            }
            $.ajax({
                url: "<?php echo url('sendSms'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {phones:phones},
                success:function(res){
                    layer.msg(res.msg,{icon:1});
                }
            })
        });
    }

    layui.use(['table','form','laydate'], function() {
        var table = layui.table,form = layui.form,$ = layui.jquery,laydate = layui.laydate;
        var tableIn = table.render({
            id: 'vct',
            elem: '#list',
            url: '<?php echo url("index"); ?>',
            method: 'post',
            page:true,
            cols: [[
                {checkbox: true, fixed:'left',align: 'center'},
                {field: 'index', title: '编号', width: 80, fixed: true,align: 'center'},
                {field: 'username', title: '姓名', width: 100,align: 'center'},
                {field: 'sex', title: '性别', width: 60,align: 'center'},
                {field: 'age', title: '年龄',width: 60,align: 'center'},
                {field: 'idcard', title: '身份证',width: 200,align: 'center'},
                {field: 'phone', title: '联系电话', width: 160,align: 'center'},
                {field: 'address', title: '现居地',width: 160,align: 'center'},
                {field: 'jiance_bianhao', align: 'center', title: '检测编号', width: 120,align: 'center'},
                {field: 'is_first_jiance', title: '首次检测', width: 100,align: 'center'},
                {field: 'visited_time', title: '来访时间', width: 110,align: 'center'},
                {field: 'zixundian', title: '咨询点', width: 160,align: 'center'},
                {field: 'from_qudao', title: '得知渠道', width: 100,align: 'center'},
                {field: 'visited_reason', title: '来访原因', width: 120,align: 'center'},
                {field: 'baolou_reason', title: '暴露原因', width: 160,align: 'center'},
                {field: 'renqun_shuxing', title: '人群属性', width: 100,align: 'center'},
                {field: 'jinbiao_jiance', title: '金标检测', width: 100,align: 'center'},
                {field: 'quezheng_danwei', title: '确证单位', width: 100,align: 'center'},
                {field: 'last_jiance_jigou', title: '上次检测机构', width: 130,align: 'center'},
                {field: 'last_jiance_time', title: '上次检测时间', width: 130,align: 'center'},
                {field: 'is_take_gift', title: '领取礼品', width: 100,align: 'center'},
                {field: 'gift', title: '礼品名', width: 100,align: 'center'},
                {field: 'is_get_weixin', title: '加咨询员微信/QQ', width: 140,align: 'center'},
                {field: 'is_take_ajiance', title: '关注艾检测', width: 130,align: 'center'},
                {fixed: 'right',width: 160, title: '操作',toolbar: '#action',align:'center'}
            ]],
            limit:10
        });

        laydate.render({
            elem: '#addtime',
            range: true
        });

        form.on('switch(open)', function(obj){
            loading =layer.load(1, {shade: [0.1,'#fff']});
            var id = this.value;
            var open = obj.elem.checked===true?1:0;
            $.post('<?php echo url("editState"); ?>',{'id':id,'open':open},function (res) {
                layer.close(loading);
                if (res.status==1) {
                    tableIn.reload();
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                    return false;
                }
            })
        });
        //搜索
        $('#search').on('click', function () {
            var key = $('#key').val();
            var addtime = $('#addtime').val();
            var is_first_jiance = $('#is_first_jiance').val();
            var from_qudao = $('#from_qudao').val();
            var visited_reason = $('#visited_reason').val();
            var baolou_reason = $('#baolou_reason').val();
            var renqun_shuxing = $('#renqun_shuxing').val();
            var jinbiao_jiance = $('#jinbiao_jiance').val();
            var is_take_gift = $('#is_take_gift').val();
            var is_get_weixin = $('#is_get_weixin').val();
            var is_take_ajiance = $('#is_take_ajiance').val();
            var role_id = $('#role_id').val();

            tableIn.reload({
                where: {key: key,is_first_jiance:is_first_jiance,from_qudao:from_qudao,visited_reason:visited_reason,baolou_reason:baolou_reason,renqun_shuxing:renqun_shuxing,jinbiao_jiance:jinbiao_jiance,is_take_gift:is_take_gift,is_get_weixin:is_get_weixin,is_take_ajiance:is_take_ajiance,role_id:role_id,addtime:addtime}
            });
        });
        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if (obj.event === 'del'){
                layer.confirm('您确定要删除该数据吗？', function(index){
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('del'); ?>",{id:data.id},function(res){
                        layer.close(loading);
                        if(res.code===1){
                            layer.msg(res.msg,{time:1000,icon:1});
                            tableIn.reload();
                        }else{
                            layer.msg('操作失败！',{time:1000,icon:2});
                        }
                    });
                    layer.close(index);
                });
            }
        });
        $('body').on('blur','.list_order',function() {
            var ad_id = $(this).attr('data-id');
            var sort = $(this).val();
            var loading = layer.load(1, {shade: [0.1, '#fff']});
            $.post('<?php echo url("adOrder"); ?>',{ad_id:ad_id,sort:sort},function(res){
                layer.close(loading);
                if(res.code === 1){
                    layer.msg(res.msg, {time: 1000, icon: 1});
                    tableIn.reload();
                }else{
                    layer.msg(res.msg,{time:1000,icon:2});
                }
            })
        });
        $('#delAll').click(function(){
            layer.confirm('确认要删除选中的数据吗？', {icon: 3}, function(index) {
                layer.close(index);
                var checkStatus = table.checkStatus('vct'); //test即为参数id设定的值
                var ids = [];
                $(checkStatus.data).each(function (i, o) {
                    ids.push(o.id);
                });
                var loading = layer.load(1, {shade: [0.1, '#fff']});
                $.post("<?php echo url('delall'); ?>", {ids: ids}, function (data) {
                    layer.close(loading);
                    if (data.code === 1) {
                        layer.msg(data.msg, {time: 1000, icon: 1});
                        tableIn.reload();
                    } else {
                        layer.msg(data.msg, {time: 1000, icon: 2});
                    }
                });
            });
        })
    })
</script>