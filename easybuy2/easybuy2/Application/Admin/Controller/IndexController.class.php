<?php
namespace Admin\Controller;
use Think\Controller;


class IndexController extends Controller
{
    public function index() {
        session_start();
        if($_SESSION['id']!=null)
        {
            //$this->assign('user',$_SESSION['admin']);
            $this->display();
        }else {
            header('Location:index/login');
        }
    }
    public function login(){
        $this->display();

    }
    public function  dologin(){
        if(!empty($_POST)) {
            //验证数据
            $condition = array();
            $condition['adminname'] = I('post.adminname');
            $condition['adminpswd'] = I('post.adminpswd');
            if (M('admin')->where($condition)->find()) {
                //将用户id存入会话
                session_start();
                $adminTable=M('admin');
                $id=$adminTable->where($condition)->getField('adminid');
                $_SESSION['id'] = $id;
                $name=$adminTable->where($condition)->getField('adminname');
                $_SESSION['admin'] = $name;
                $this->success('登录成功', '../index/index/');
            } else {
                $this->error('用户名或密码错误，请重新登录！');
            }
        }
        else{
            echo "用户名密码不能为空！";
        }
    }
    public function logout(){

            session_start();
            session('id',null);
            header('Location:login');

    }
}