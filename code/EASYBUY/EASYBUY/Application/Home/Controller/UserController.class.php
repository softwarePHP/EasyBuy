<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
    /**实现用户注册功能
     * *张宇晗
     * 2014011661
     * 2016/12/7
     */
    public function add()
    {
        $userTable=M('user');
        $data=I('post.');
        $username=I('username');
        $userpswd=I('userpswd');
        $repswd=I('repswd');
        $time=time();
        $data['createtime']=date('y-m-d',$time);
        if($username&&$userpswd!=null)
        {
            $condition=array();
            $condition['username']=$username;
            $test=$userTable->where($condition)->select();
            if(!$test)
            {
                $result = $userTable->add($data);
                if ($result) {
                    $this->success("用户注册成功");
                } else {
                    $this->error("Sorry,用户信息注册不成功");
                }
            }else{
                $this->error('该用户名已被注册，请更换用户名');
            }

        }
        else{
            $this->error('用户名和密码不能为空');
        }
    }


}