<?php
return array (
  'sex' => 
  array (
    'id' => 102,
    'moduleid' => 8,
    'field' => 'sex',
    'name' => '性别',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'sex',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'男|1
女|2\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'age' => 
  array (
    'id' => 101,
    'moduleid' => 8,
    'field' => 'age',
    'name' => '年龄',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请输入年龄！',
    'class' => 'age',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'phone' => 
  array (
    'id' => 104,
    'moduleid' => 8,
    'field' => 'phone',
    'name' => '联系电话',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'mobile',
    'errormsg' => '请输入正确的手机号！',
    'class' => 'phone',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'idcard' => 
  array (
    'id' => 103,
    'moduleid' => 8,
    'field' => 'idcard',
    'name' => '身份证',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'idcard',
    'errormsg' => '请输入正确的身份证！',
    'class' => 'idcard',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'address' => 
  array (
    'id' => 105,
    'moduleid' => 8,
    'field' => 'address',
    'name' => '现居地',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 80,
    'pattern' => 'defaul',
    'errormsg' => '请输入正确的现居地！',
    'class' => 'address',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'jiance_bianhao' => 
  array (
    'id' => 106,
    'moduleid' => 8,
    'field' => 'jiance_bianhao',
    'name' => '检测编号',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 20,
    'pattern' => 'defaul',
    'errormsg' => '请输入正确的检测编号！',
    'class' => 'jiance_bianhao',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'is_first_jiance' => 
  array (
    'id' => 107,
    'moduleid' => 8,
    'field' => 'is_first_jiance',
    'name' => '首次检测',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请判断是否为首次检测！',
    'class' => 'is_first_jiance',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'是|1
否|0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'visited_time' => 
  array (
    'id' => 108,
    'moduleid' => 8,
    'field' => 'visited_time',
    'name' => '来访时间',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请选择正确的时间！',
    'class' => 'visited_time',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'from_qudao' => 
  array (
    'id' => 109,
    'moduleid' => 8,
    'field' => 'from_qudao',
    'name' => '得知渠道',
    'tips' => '',
    'required' => 1,
    'minlength' => 1,
    'maxlength' => 2,
    'pattern' => 'digits',
    'errormsg' => '请选择得知渠道！',
    'class' => 'from_qudao',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'blued|1
微信|2
QQ|3
场所广告|4
艾检测平台|5
公众媒体|6
朋友介绍|7\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'visited_reason' => 
  array (
    'id' => 110,
    'moduleid' => 8,
    'field' => 'visited_reason',
    'name' => '来访原因',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'visited_reason',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'定期检测|1
发生暴露行为|2
恐艾者|3\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'baolou_reason' => 
  array (
    'id' => 111,
    'moduleid' => 8,
    'field' => 'baolou_reason',
    'name' => '暴露原因',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请选择暴露原因！',
    'class' => '暴露原因',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'不安全性行为|1
男男性行为|2
注射毒品|3
输血|4
母婴传播|5
其他-请注明|6\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'baolou_reason_note' => 
  array (
    'id' => 112,
    'moduleid' => 8,
    'field' => 'baolou_reason_note',
    'name' => '其他原因注明',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'baolou_reason_note',
    'type' => 'textarea',
    'setup' => 'array (
  \'fieldtype\' => \'mediumtext\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'renqun_shuxing' => 
  array (
    'id' => 113,
    'moduleid' => 8,
    'field' => 'renqun_shuxing',
    'name' => '人群属性',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请选择人群属性！',
    'class' => 'renqun_shuxing',
    'type' => 'select',
    'setup' => 'array (
  \'options\' => \'男男性行为者|1
双性恋者|2
异性恋者|3
女性性工作者|4
吸毒者|5\',
  \'multiple\' => \'0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'size\' => \'\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'jinbiao_jiance' => 
  array (
    'id' => 114,
    'moduleid' => 8,
    'field' => 'jinbiao_jiance',
    'name' => '金标检测',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请判断是否进行了金标检测！',
    'class' => 'jinbiao_jiance',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'阴性|1
待复查|2\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'1\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'quezheng_danwei' => 
  array (
    'id' => 115,
    'moduleid' => 8,
    'field' => 'quezheng_danwei',
    'name' => '确证单位',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请输入确证单位！',
    'class' => 'quezheng_danwei',
    'type' => 'textarea',
    'setup' => 'array (
  \'fieldtype\' => \'mediumtext\',
  \'default\' => \'\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'last_jiance_jigou' => 
  array (
    'id' => 116,
    'moduleid' => 8,
    'field' => 'last_jiance_jigou',
    'name' => '上次检测机构',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请输入上次检测机构！',
    'class' => 'last_jiance_jigou',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'last_jiance_time' => 
  array (
    'id' => 117,
    'moduleid' => 8,
    'field' => 'last_jiance_time',
    'name' => '上次检测时间',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '',
    'class' => 'last_jiance_time',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'is_take_gift' => 
  array (
    'id' => 118,
    'moduleid' => 8,
    'field' => 'is_take_gift',
    'name' => '领取礼品',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请判断是否领取礼品！',
    'class' => 'is_take_gift',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'是|1
否|0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'0\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'gift' => 
  array (
    'id' => 119,
    'moduleid' => 8,
    'field' => 'gift',
    'name' => '礼品名',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请输入领取的礼品！',
    'class' => 'gift',
    'type' => 'text',
    'setup' => 'array (
  \'default\' => \'\',
  \'ispassword\' => \'0\',
  \'fieldtype\' => \'varchar\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'is_get_weixin' => 
  array (
    'id' => 120,
    'moduleid' => 8,
    'field' => 'is_get_weixin',
    'name' => '加微信/QQ',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'defaul',
    'errormsg' => '请判断是否加微信/QQ！',
    'class' => 'is_get_weixin',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'是|1
否|0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'0\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'is_take_ajiance' => 
  array (
    'id' => 121,
    'moduleid' => 8,
    'field' => 'is_take_ajiance',
    'name' => '关注艾检测',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'digits',
    'errormsg' => '请判断是否关注艾检测！',
    'class' => 'is_take_ajiance',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'是|1
否|0\',
  \'fieldtype\' => \'varchar\',
  \'numbertype\' => \'1\',
  \'default\' => \'0\',
)',
    'ispost' => 0,
    'unpostgroup' => '',
    'listorder' => 0,
    'status' => 1,
    'issystem' => 0,
  ),
  'createtime' => 
  array (
    'id' => 92,
    'moduleid' => 8,
    'field' => 'createtime',
    'name' => '添加时间',
    'tips' => '',
    'required' => 1,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => 'date',
    'errormsg' => '',
    'class' => 'createtime',
    'type' => 'datetime',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 1,
    'status' => 1,
    'issystem' => 1,
  ),
  'status' => 
  array (
    'id' => 94,
    'moduleid' => 8,
    'field' => 'status',
    'name' => '状态',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'radio',
    'setup' => 'array (
  \'options\' => \'发布|1
定时发布|0\',
  \'fieldtype\' => \'tinyint\',
  \'numbertype\' => \'1\',
  \'labelwidth\' => \'75\',
  \'default\' => \'1\',
)',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 98,
    'status' => 1,
    'issystem' => 1,
  ),
  'template' => 
  array (
    'id' => 93,
    'moduleid' => 8,
    'field' => 'template',
    'name' => '模板',
    'tips' => '',
    'required' => 0,
    'minlength' => 0,
    'maxlength' => 0,
    'pattern' => '',
    'errormsg' => '',
    'class' => '',
    'type' => 'template',
    'setup' => '',
    'ispost' => 1,
    'unpostgroup' => '',
    'listorder' => 99,
    'status' => 0,
    'issystem' => 1,
  ),
);
?>