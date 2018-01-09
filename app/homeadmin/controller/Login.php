<?php
/**
 * @Author: siyizhen
 * @emial:  1193814298@qq.com
 * @Date:   2018-01-09 13:04:54
 * @Last Modified by:   siyizhen
 * @Last Modified time: 2018-01-09 13:49:27
 */
namespace app\homeadmin\controller;
use think\Controller;

class Login extends Controller{
	public function login(){
		if(request()->isAjax()){
			$data=input('param.');
			$admin=model('admin/admin');
			$num = $admin->login($data);
			if($num==1){
				$arr=['status'=>1,'msg'=>'登录成功！'];
			}else{
				$arr=['status'=>0,'msg'=>'用户名或密码错误！'];
			}
			return json($arr);
		}
		return $this->fetch();
	}
}