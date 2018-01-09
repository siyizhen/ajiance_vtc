<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2018-01-09 10:04:04
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2018-01-09 14:42:37
 */
namespace app\homeadmin\controller;
use think\Db;
use think\Request;
use think\Controller;

class Index extends Controller{
	protected $role_id;

	public function _initialize(){
		if(empty(session('aid'))&&empty(cookie('aid'))) {
            $this->redirect('login/login');
        }
        if(!empty(session('aid'))){
        	$this->aid=session('aid');
        	$this->role_id=session('role_id');
        }else{
        	if(!empty(cookie('aid'))){
        		$this->aid=cookie('aid');
        		$this->role_id=cookie('role_id');
        	}
        }
	}

	protected $vctArr=[];
    public function getVctArr($role_id){
        $rows=db('role',[],false)->field('id,pid')->where('pid',$role_id)->select();
        if(!empty($rows)){
            foreach ($rows as $k => $v) {
                array_push($this->vctArr,$v['id']);
                $this->getVctArr($v['id']);
            }
        }
    }

    public function getAllVct(){
        $this->getVctArr(config('role_root_vct'));
        array_push($this->vctArr,config('role_root_vct'));
        return $this->vctArr;
    }

	public function add(){
		if(request()->isAjax()){
			$data=input('param.');
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

            if(!in_array($this->role_id,$this->getAllVct())){
                $data['role_id']=config('role_root_vct');
                $data['aid']=config('role_root_vct_admin_id');
            }else{
                $data['role_id']=$this->role_id;
                $data['aid']=$this->aid;
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
            $arr=['status'=>1,'msg'=>'采集成功！'];
            return json($arr);
		}
		$fromQudaoArr=[];
		foreach (fromQudao() as $k => $v) {
			$fromQudaoArr[$k-1]['value']=$k;
			$fromQudaoArr[$k-1]['text']=$v;
		}
		$this->assign('fromQudaoData',json_encode($fromQudaoArr));

		$visitedReasonArr=[];
		foreach (visitedReason() as $k => $v) {
			$visitedReasonArr[$k-1]['value']=$k;
			$visitedReasonArr[$k-1]['text']=$v;
		}
		$this->assign('visitedReasonData',json_encode($visitedReasonArr));

		$baolouReasonArr=[];
		foreach (baolouReason() as $k => $v) {
			$baolouReasonArr[$k-1]['value']=$k;
			$baolouReasonArr[$k-1]['text']=$v;
		}
		$this->assign('baolouReasonData',json_encode($baolouReasonArr));

		$renqunShuxingArr=[];
		foreach (renqunShuxing() as $k => $v) {
			$renqunShuxingArr[$k-1]['value']=$k;
			$renqunShuxingArr[$k-1]['text']=$v;
		}
		$this->assign('renqunShuxingData',json_encode($renqunShuxingArr));

		$this->assign('title','添加VCT信息');
        $this->assign('info',NULL);
		return view('add');
	}
}