<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2018-01-05 14:01:02
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2018-01-05 17:23:36
 */
namespace app\admin\controller;
use think\Db;
use think\Request;
use think\Controller;
class Vct extends Common{
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
            db('link')->insert($data);
            $result['code'] = 1;
            $result['msg'] = '友情链接添加成功!';
            $result['url'] = url('index');
            cache('linkList', NULL);
            return $result;
        }else{
            $this->assign('title',lang('add').lang('vct'));
            $this->assign('info','null');
            return $this->fetch('form');
        }
    }
}