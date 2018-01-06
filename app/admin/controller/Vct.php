<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2018-01-05 14:01:02
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2018-01-07 00:05:13
 */
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;

class Vct extends Common{
    public function _initialize(){
        parent::_initialize();
    }

	public function index(){
        if(request()->isPost()) {
            $key = input('post.key');
            $this->assign('testkey', $key);
            $page =input('page')?input('page'):1;
            $pageSize =input('limit')?input('limit'):config('pageSize');
            $list = Db::table(config('database.prefix') . 'ad')->alias('a')
                ->join(config('database.prefix') . 'ad_type at', 'a.type_id = at.type_id', 'left')
                ->field('a.*,at.name as typename')
                ->where('a.name', 'like', "%" . $key . "%")
                ->order('a.sort')
                ->paginate(array('list_rows'=>$pageSize,'page'=>$page))
                ->toArray();
            foreach ($list['data'] as $k=>$v){
                $list['data'][$k]['addtime'] = date('Y-m-d H:s',$v['addtime']);
            }
            return $result = ['code'=>0,'msg'=>'获取成功!','data'=>$list['data'],'count'=>$list['total'],'rel'=>1];
        }
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
            }else{
                $data['role_id']=session('role_id');
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
            $this->assign('info','null');
            return $this->fetch('form');
        }
    }
}