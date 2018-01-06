<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"E:\www\ajiance_vct/app/admin\view\vct\index.html";i:1515234151;s:50:"E:\www\ajiance_vct/app/admin\view\common\head.html";i:1515234151;s:50:"E:\www\ajiance_vct/app/admin\view\common\foot.html";i:1515234151;}*/ ?>
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
    <div class="demoTable">
        <div class="layui-inline">
            <input class="layui-input" name="keywords" id="keywords" placeholder="<?php echo lang('pleaseEnter'); ?>关键字">
        </div>
        <button class="layui-btn" id="search" data-type="reload"><?php echo lang('search'); ?></button>
        <a href="<?php echo url('index'); ?>" class="layui-btn">显示全部</a>
        <button type="button" class="layui-btn layui-btn-danger" id="delAll">批量删除</button>
        <a href="<?php echo url('add'); ?>" class="layui-btn" style="float:right;"><i class="fa fa-plus" aria-hidden="true"></i><?php echo lang('add'); ?><?php echo lang('vct'); ?></a>
        <div style="clear: both;"></div>
    </div>
    <table class="layui-table" id="list" lay-filter="list"></table>
</div>
<script type="text/javascript" src="__STATIC__/plugins/layui/layui.js"></script>


<script type="text/html" id="name">
   {{d.name}}{{# if(d.pic){ }}<img src="__ADMIN__/images/image.gif" onmouseover="layer.tips('<img src=__PUBLIC__/{{d.pic}}>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();">{{# } }}
</script>
<script type="text/html" id="order">
    <input name="{{d.ad_id}}" data-id="{{d.ad_id}}" class="list_order layui-input" value=" {{d.sort}}" size="10"/>
</script>
<script type="text/html" id="open">
    <input type="checkbox" name="open" value="{{d.ad_id}}" lay-skin="switch" lay-text="开启|关闭" lay-filter="open" {{ d.open == 1 ? 'checked' : '' }}>
</script>
<script type="text/html" id="action">
    <a href="<?php echo url('edit'); ?>?ad_id={{d.ad_id}}" class="layui-btn layui-btn-xs">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
    layui.use(['table','form'], function() {
        var table = layui.table,form = layui.form,$ = layui.jquery;
        var tableIn = table.render({
            id: 'ad',
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
                {field: 'phone', title: '联系电话', width: 160},
                {field: 'address', title: '现居地',width: 100,align: 'center'},
                {field: 'jiance_bianhao', align: 'center', title: '检测编号', width: 120,align: 'center'},
                {field: 'is_first_jiance', title: '首次检测', width: 100},
                {field: 'visited_time', title: '来访时间', width: 100},
                {field: 'zixundian', title: '咨询点', width: 100},
                {field: 'from_qudao', title: '得知渠道', width: 100},
                {field: 'visited_reason', title: '来访原因', width: 100},
                {field: 'baolou_reason', title: '暴露原因', width: 100},
                {field: 'renqun_shuxing', title: '人群属性', width: 100},
                {field: 'jinbiao_jiance', title: '金标检测', width: 100},
                {field: 'quezheng_danwei', title: '确证单位', width: 100},
                {field: 'last_jiance_jigou', title: '上次检测机构', width: 150},
                {field: 'last_jiance_time', title: '上次检测时间', width: 150},
                {field: 'is_take_gift', title: '领取礼品', width: 100},
                {field: 'gift', title: '礼品名', width: 100},
                {field: 'is_get_weixin', title: '加咨询员微信/QQ', width: 200},
                {field: 'is_take_ajiance', title: '关注艾检测', width: 170},
                {fixed: 'right',width: 100, toolbar: '#action'}
            ]],
            limit:10
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
            var keywords = $('#keywords').val();
            if ($.trim(keywords) === '') {
                layer.msg('<?php echo lang("pleaseEnter"); ?>关键字！', {icon: 0});
                return;
            }
            tableIn.reload({
                where: {keywords: keywords}
            });
        });
        table.on('tool(list)', function(obj) {
            var data = obj.data;
            if (obj.event === 'del'){
                layer.confirm('您确定要删除该广告吗？', function(index){
                    var loading = layer.load(1, {shade: [0.1, '#fff']});
                    $.post("<?php echo url('del'); ?>",{ad_id:data.ad_id},function(res){
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
            layer.confirm('确认要删除选中的广告吗？', {icon: 3}, function(index) {
                layer.close(index);
                var checkStatus = table.checkStatus('ad'); //test即为参数id设定的值
                var ids = [];
                $(checkStatus.data).each(function (i, o) {
                    ids.push(o.ad_id);
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