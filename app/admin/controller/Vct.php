<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2018-01-05 14:01:02
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2018-01-08 15:37:43
 */
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
use tree\Tree;

class Vct extends Common{
    public function _initialize(){
        parent::_initialize();
    }

	public function index(){
        if(request()->isPost()) {
            $key = input('post.key');
            $this->assign('testkey', $key);
            $is_first_jiance = input('param.is_first_jiance');
            $from_qudao = input('param.from_qudao');
            $visited_reason = input('param.visited_reason');
            $baolou_reason = input('param.baolou_reason');
            $renqun_shuxing = input('param.renqun_shuxing');
            $jinbiao_jiance = input('param.jinbiao_jiance');
            $is_take_gift = input('param.is_take_gift');
            $is_get_weixin = input('param.is_get_weixin');
            $is_take_ajiance = input('param.is_take_ajiance');
            $role_id = input('param.role_id');
            $addtime = input('param.addtime');

            $where['a.username|a.idcard|a.phone|a.address|a.jiance_bianhao|a.gift']=['like',"%$key%"];
            if(session('aid')!=1){//超级管理员显示所有
                if($role_id==''){
                    $role_id=session('role_id');
                    if(in_array($role_id,$this->getAllVct())){
                        //如果属于vct机构管理员角色 则获取所有下级办公室
                        $this->vctArr=[];//先清空以前的数据
                        $this->getVctArr($role_id);
                        $allNext=$this->vctArr;
                        array_push($allNext,$role_id);
                        $where['a.role_id']=array('in',$allNext);
                    }
                }else{
                    $where['a.role_id']=$role_id;
                }
            }else{
                if($role_id!=''){
                    $where['a.role_id']=$role_id;
                }
            }

            if(!empty($addtime)){
                $addtimeArr=explode(' - ',$addtime);
                $addtime_start=strtotime($addtimeArr[0]);
                $addtime_end=strtotime($addtimeArr[1]);
                $addtime_end=$addtime_end+3600*24-1;
                $where['a.addtime']=array('between',"$addtime_start,$addtime_end");
            }
            if($is_first_jiance!=''){
                $where['a.is_first_jiance']=$is_first_jiance;
            }
            if($from_qudao!=''){
                $where['a.from_qudao']=$from_qudao;
            }
            if($visited_reason!=''){
                $where['a.visited_reason']=$visited_reason;
            }
            if($baolou_reason!=''){
                $where['a.baolou_reason']=$baolou_reason;
            }
            if($renqun_shuxing!=''){
                $where['a.renqun_shuxing']=$renqun_shuxing;
            }
            if($jinbiao_jiance!=''){
                $where['a.jinbiao_jiance']=$jinbiao_jiance;
            }
            if($is_take_gift!=''){
                $where['a.is_take_gift']=$is_take_gift;
            }
            if($is_get_weixin!=''){
                $where['a.is_get_weixin']=$is_get_weixin;
            }
            if($is_take_ajiance!=''){
                $where['a.is_take_ajiance']=$is_take_ajiance;
            }

            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = Db::table(config('database.prefix') . 'vct')->alias('a')
                ->join(config('database.prefix') . 'role b', 'a.role_id = b.id', 'left')
                ->join(config('database.prefix') . 'admin c','a.aid=c.admin_id')
                ->field('a.*,b.name as zixundian,c.username as admin_name')
                ->where($where)
                ->order('a.addtime desc')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            foreach ($list['data'] as $k=>$v){
                $list['data'][$k]['index']=($page-1)*$pageSize+($k+1);
                $list['data'][$k]['addtime'] = date('Y-m-d',$v['addtime']);
                $list['data'][$k]['visited_time'] = date('Y-m-d',$v['visited_time']);
                if(!empty($v['last_jiance_time'])){
                    $list['data'][$k]['last_jiance_time'] = date('Y-m-d',$v['last_jiance_time']);
                }
                if($v['sex']==1){
                    $list['data'][$k]['sex']='男';
                }else{
                    $list['data'][$k]['sex']='女';
                }
                if($v['is_first_jiance']==1){
                    $list['data'][$k]['is_first_jiance']='是';
                }else{
                    $list['data'][$k]['is_first_jiance']='否';
                }
                if($v['jinbiao_jiance']==1){
                    $list['data'][$k]['jinbiao_jiance']='阴性';
                }else{
                    $list['data'][$k]['jinbiao_jiance']='待复查';
                }
                if($v['is_take_gift']==1){
                    $list['data'][$k]['is_take_gift']='是';
                }else{
                    $list['data'][$k]['is_take_gift']='否';
                }
                if($v['is_get_weixin']==1){
                    $list['data'][$k]['is_get_weixin']='是';
                }else{
                    $list['data'][$k]['is_get_weixin']='否';
                }
                if($v['is_take_ajiance']==1){
                    $list['data'][$k]['is_take_ajiance']='是';
                }else{
                    $list['data'][$k]['is_take_ajiance']='否';
                }
                $list['data'][$k]['from_qudao']=getFromQudao($v['from_qudao']);
                $list['data'][$k]['visited_reason']=getVisitedReason($v['visited_reason']);
                $list['data'][$k]['baolou_reason']=getBaolouReason($v['baolou_reason']);
                $list['data'][$k]['renqun_shuxing']=getRenqunShuxing($v['renqun_shuxing']);
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
        if(session('aid')!=1){//超级管理员显示所有
            $role_id=session('role_id');
            if(in_array($role_id,$this->getAllVct())){
                //如果属于vct机构管理员角色 则获取所有下级办公室
                $this->vctArr=[];//先清空以前的数据
                $this->getVctArr($role_id);
            }
        }else{
            $this->getAllVct();
        }
        $allNext=$this->vctArr;
        $zixundianList=db('role',[],false)->where('id','in',$allNext)->field('pid,id,name')->select();
        $config=[
            'id'=>'id',
            'pid'=>'pid',
            'title'=>'name'
        ];
        $tree=new Tree($config);
        $zixundianList=$tree->toList($zixundianList);
        $this->assign('zixundianList',$zixundianList);
        return $this->fetch();
    }

    //添加
    public function add(){
        if(request()->isPost()){
            $data = input('post.');
            $data['addtime'] = time();
            foreach ($data as $k => $v) {
                $data[$k]=trim($v);
            }
            if(!empty($data['visited_time'])){
                $data['visited_time']=strtotime($data['visited_time']);
            }
            if(!empty($data['visited_time'])){
                $data['last_jiance_time']=strtotime($data['last_jiance_time']);
            }

            if(!in_array(session('role_id'),$this->getAllVct())){
                $data['role_id']=config('role_root_vct');
                $data['aid']=config('role_root_vct_admin_id');
            }else{
                $data['role_id']=session('role_id');
                $data['aid']=session('aid');
            }

            //判断该用户是否已添加
            $where=[
                'username'=>$data['username'],
                'phone'=>$data['phone']
            ];
            $row=db('vct',[],false)->where($where)->count('id');
            if(!empty($row)){
                db('vct',[],false)->where($where)->update($data);
            }else{
                db('vct',[],false)->insert($data);
            }
            $result['code'] = 1;
            $result['msg'] = 'VCT信息采集成功!';
            $result['url'] = url('add');
            return $result;
        }else{
            $this->assign('role_id',$role_id);
            $this->assign('title',lang('add').lang('vct'));
            $this->assign('info',NULL);
            return $this->fetch('form');
        }
    }

    public function edit(){
        if(request()->isPost()) {
            $data = input('post.');
            foreach ($data as $k => $v) {
                $data[$k]=trim($v);
            }
            if(!empty($data['visited_time'])){
                $data['visited_time']=strtotime($data['visited_time']);
            }
            if(!empty($data['visited_time'])){
                $data['last_jiance_time']=strtotime($data['last_jiance_time']);
            }

            db('vct',[],false)->update($data);
            $result['code'] = 1;
            $result['msg'] = 'VCT信息修改成功!';
            $result['url'] = url('index');
            return $result;
        }else{
            $id=input('id');
            $info=db('vct',[],false)->where(array('id'=>$id))->find();
            $this->assign('info',$info);
            $this->assign('title',lang('edit').lang('vct'));
            return $this->fetch('form');
        }
    }

    public function del(){
        db('vct')->where(array('id'=>input('id')))->delete();
        return ['code'=>1,'msg'=>'删除成功！'];
    }

    public function delall(){
        $map['id'] =array('in',input('param.ids/a'));
        db('vct',[],false)->where($map)->delete();
        $result['msg'] = '删除成功！';
        $result['code'] = 1;
        $result['url'] = url('index');
        return $result;
    }

    public function printInfo(){
        $id=input('id');
        $info=db('vct',[],false)->alias('a')->join('__ROLE__ b','a.role_id=b.id')->where(array('a.id'=>$id))->field('a.*,b.name as zixundian')->find();
        $this->assign('info',$info);
        return $this->fetch();
    }

    public function sendSms(){
        $phones=input('param.phones/a');
        $data=[];
        foreach ($phones as $k => $v) {
            $data=[
                'phone'=>$v,
                'codeTemplate'=>config('vct_template_code'),
                'params'=>[
                    'code'=>10000
                ]
            ];
            sendSms($data);
        }
        $result['msg'] = '发送成功！';
        $result['code'] = 1;
        return json($result);
    }

    public function tongJi(){
        if(request()->isAjax()){
            $types=input('param.types');
            $role_id=input('param.role_id');
            $addtime=input('param.addtime');

            $where=[];
            if(!empty($role_id)){
                $this->getVctArr($role_id);
                $allNext=$this->vctArr;
                array_push($allNext,$role_id);
                $where['role_id']=array('in',$allNext);
            }

            if(!empty($addtime)){
                $addtimeArr=explode(' - ',$addtime);
                $addtime_start=strtotime($addtimeArr[0]);
                $addtime_end=strtotime($addtimeArr[1]);
                $addtime_end=$addtime_end+3600*24-1;
                $where['addtime']=array('between',"$addtime_start,$addtime_end");
            }
            $one=$two=$three=$four=$five=$six=$seven=$eight=$nine=$ten=0;
            $rows=db('vct',[],false)->where($where)->select();
            switch ($types) {
                case '1':
                    $seriesData=[
                        ['value'=>0,'name'=>'是'],
                        ['value'=>0,'name'=>'否']
                    ];
                    foreach ($rows as $k => $v) {
                        if($v['is_first_jiance']==1){
                            $seriesData[0]['value']++;
                        }elseif($v['is_first_jiance']==0){
                            $seriesData[1]['value']++;
                        }
                    }
                    $valueArr=array($seriesData[0]['value'],$seriesData[1]['value']);
                    $legendData=['是','否'];
                    $arr=[
                        'legendData'=>$legendData,
                        'seriesData'=>$seriesData,
                        'title'=>'首次检测'
                    ];
                    break;
                case '2':
                    $legendData=$seriesData=$zhuSeriesData=[];
                    foreach (fromQudao() as $k => $v) {
                        array_push($legendData,$v);
                        $zhuSeriesData[$k-1]=0;
                        $seriesData[$k-1]['value']=0;
                        $seriesData[$k-1]['name']=$v;
                    }

                    foreach ($rows as $k => $v) {
                        foreach (fromQudao() as $n => $m) {
                            if($v['from_qudao']==$n){
                                $zhuSeriesData[$n-1]++;
                                $seriesData[$n-1]['value']++;
                            }
                        }
                    }
                    $arr=[
                        'legendData'=>$legendData,
                        'zhuSeriesData'=>$zhuSeriesData,
                        'seriesData'=>$seriesData,
                        'title'=>'得知渠道'
                    ];
                    break;
                case '3':
                    $legendData=$seriesData=$zhuSeriesData=[];
                    foreach (visitedReason() as $k => $v) {
                        array_push($legendData,$v);
                        $zhuSeriesData[$k-1]=0;
                        $seriesData[$k-1]['value']=0;
                        $seriesData[$k-1]['name']=$v;
                    }
                    foreach ($rows as $k => $v) {
                        foreach (visitedReason() as $n => $m) {
                            if($v['visited_reason']==$n){
                                $zhuSeriesData[$n-1]++;
                                $seriesData[$n-1]['value']++;
                            }
                        }
                    }
                    $arr=[
                        'legendData'=>$legendData,
                        'zhuSeriesData'=>$zhuSeriesData,
                        'seriesData'=>$seriesData,
                        'title'=>'来访原因'
                    ];
                    break;
                case '4':
                    $legendData=$seriesData=$zhuSeriesData=[];
                    foreach (baolouReason() as $k => $v) {
                        array_push($legendData,$v);
                        $zhuSeriesData[$k-1]=0;
                        $seriesData[$k-1]['value']=0;
                        $seriesData[$k-1]['name']=$v;
                    }
                    foreach ($rows as $k => $v) {
                        foreach (baolouReason() as $n => $m) {
                            if($v['baolou_reason']==$n){
                                $zhuSeriesData[$n-1]++;
                                $seriesData[$n-1]['value']++;
                            }
                        }
                    }
                    $arr=[
                        'legendData'=>$legendData,
                        'zhuSeriesData'=>$zhuSeriesData,
                        'seriesData'=>$seriesData,
                        'title'=>'暴露原因'
                    ];
                    break;
                case '5':
                    $legendData=$seriesData=$zhuSeriesData=[];
                    foreach (renqunShuxing() as $k => $v) {
                        array_push($legendData,$v);
                        $zhuSeriesData[$k-1]=0;
                        $seriesData[$k-1]['value']=0;
                        $seriesData[$k-1]['name']=$v;
                    }
                    foreach ($rows as $k => $v) {
                        foreach (renqunShuxing() as $n => $m) {
                            if($v['renqun_shuxing']==$n){
                                $zhuSeriesData[$n-1]++;
                                $seriesData[$n-1]['value']++;
                            }
                        }
                    }
                    $arr=[
                        'legendData'=>$legendData,
                        'zhuSeriesData'=>$zhuSeriesData,
                        'seriesData'=>$seriesData,
                        'title'=>'人群属性'
                    ];
                    break;
                case '6':
                    $seriesData=[
                        ['value'=>0,'name'=>'阴性'],
                        ['value'=>0,'name'=>'待复查']
                    ];
                    foreach ($rows as $k => $v) {
                        if($v['jinbiao_jiance']==1){
                            $seriesData[0]['value']++;
                        }elseif($v['jinbiao_jiance']==2){
                            $seriesData[1]['value']++;
                        }
                    }
                    $valueArr=array($seriesData[0]['value'],$seriesData[1]['value']);
                    $legendData=['阴性','待复查'];
                    $arr=[
                        'legendData'=>$legendData,
                        'seriesData'=>$seriesData,
                        'title'=>'金标检测'
                    ];
                    break;
                case '7':
                    $seriesData=[
                        ['value'=>0,'name'=>'是'],
                        ['value'=>0,'name'=>'否']
                    ];
                    foreach ($rows as $k => $v) {
                        if($v['is_take_gift']==1){
                            $seriesData[0]['value']++;
                        }elseif($v['is_take_gift']==0){
                            $seriesData[1]['value']++;
                        }
                    }
                    $valueArr=array($seriesData[0]['value'],$seriesData[1]['value']);
                    $legendData=['是','否'];
                    $arr=[
                        'legendData'=>$legendData,
                        'seriesData'=>$seriesData,
                        'title'=>'领取礼品'
                    ];
                    break;
                case '8':
                    $seriesData=[
                        ['value'=>0,'name'=>'是'],
                        ['value'=>0,'name'=>'否']
                    ];
                    foreach ($rows as $k => $v) {
                        if($v['is_get_weixin']==1){
                            $seriesData[0]['value']++;
                        }elseif($v['is_get_weixin']==0){
                            $seriesData[1]['value']++;
                        }
                    }
                    $valueArr=array($seriesData[0]['value'],$seriesData[1]['value']);
                    $legendData=['是','否'];
                    $arr=[
                        'legendData'=>$legendData,
                        'seriesData'=>$seriesData,
                        'title'=>'加咨询员'
                    ];
                    break;
                case '9':
                    $seriesData=[
                        ['value'=>0,'name'=>'是'],
                        ['value'=>0,'name'=>'否']
                    ];
                    foreach ($rows as $k => $v) {
                        if($v['is_take_ajiance']==1){
                            $seriesData[0]['value']++;
                        }elseif($v['is_take_ajiance']==0){
                            $seriesData[1]['value']++;
                        }
                    }
                    $valueArr=array($seriesData[0]['value'],$seriesData[1]['value']);
                    $legendData=['是','否'];
                    $arr=[
                        'legendData'=>$legendData,
                        'seriesData'=>$seriesData,
                        'title'=>'关注艾检测'
                    ];
                    break;

            }
            return json($arr);
        }
        if(session('aid')!=1){//超级管理员显示所有
            $role_id=session('role_id');
            if(in_array($role_id,$this->getAllVct())){
                //如果属于vct机构管理员角色 则获取所有下级办公室
                $this->vctArr=[];//先清空以前的数据
                $this->getVctArr($role_id);
            }
        }else{
            $this->getAllVct();
        }
        $allNext=$this->vctArr;
        $zixundianList=db('role',[],false)->where('id','in',$allNext)->field('pid,id,name')->select();
        $config=[
            'id'=>'id',
            'pid'=>'pid',
            'title'=>'name'
        ];
        $tree=new Tree($config);
        $zixundianList=$tree->toList($zixundianList);
        $this->assign('zixundianList',$zixundianList);
        return $this->fetch();
    }
}