<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model
{
	public function login($data){
		$user=db('admin')->where('username',$data['username'])->find();
		if($user){
			if($user['pwd'] == md5($data['password'])){
				if(isset($data['autoLogin'])){
					if($data['autoLogin']){
						cookie('username',$user['username'],config('cookie_time'));
						cookie('aid',$user['admin_id'],config('cookie_time'));
						cookie('group_id',$user['group_id'],config('cookie_time'));
						cookie('role_id',$user['role_id'],config('cookie_time'));
					}
				}
				session('username',$user['username']);
				session('aid',$user['admin_id']);
				session('group_id',$user['group_id']);
				session('role_id',$user['role_id']);
				return 1; //信息正确
			}else{
				return -1; //密码错误
			}
		}else{
			return -1; //用户不存在
		}
	}

}
