<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by Lucifer on 2016/12/6.
 * 实现前台登录主页功能
 * 姓名：张宇晗
 * 学号：2014011661
 */

class IndexController extends Controller
{
    public function index() {
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        //从商品数据库里获取数据，显示商品
        $goodsTable=M('goods');
        $goods=$goodsTable->where('daily=1')->limit(4)->select();
        $this->assign('goods',$goods);
        //从品牌数据库里获取数据，显示品牌
        $goodsTable=M('grand');
        $grand=$goodsTable->limit(7)->select();
        $this->assign('grand',$grand);

        $this->display();
    }
    public function login(){
        if($_SESSION['id']!=null) {
            header('Location:index');
        }
        else{
            $this->display();
        }

    }
    public function  dologin(){
        if(!empty($_POST)) {
            //验证数据
            $condition = array();
            $condition['username'] = I('post.username');
            $condition['userpswd'] = I('post.userpswd');
            if (M('user')->where($condition)->find()) {
                //将用户id存入会话
                session_start();
                $adminTable=M('user');
                $id=$adminTable->where($condition)->getField('userid');
                $_SESSION['id'] = $id;
                $name=$adminTable->where($condition)->getField('username');
                $_SESSION['user'] = $name;
                $this->success('登录成功，欢迎光临易购商城', '../index/index/');
            } else {
                $this->error('用户名或密码错误，请重新登录！');
            }
        }
        else{
            echo "用户名密码不能为空！";
        }
    }
    public function  forgotlogin(){
        if(!empty($_POST)) {
            //验证数据
            $condition = array();
            $condition['username'] = I('post.username');
            $condition['phone'] = I('post.phone');
            if (M('user')->where($condition)->find()) {
                //将用户id存入会话
                session_start();
                $adminTable=M('user');
                $id=$adminTable->where($condition)->getField('userid');
                $_SESSION['id'] = $id;
                $name=$adminTable->where($condition)->getField('username');
                $_SESSION['user'] = $name;
                //将新密码存入数据库
                $data=array();
                $data['userpswd'] = I('post.userpswd');
                M('user')->where($condition)->save($data);
                $this->success('密码修改成功，欢迎光临易购商城', '../index/index/');
            } else {
                $this->error('用户名或手机号错误，请重新登录！');
            }
        }
        else{
            echo "用户名和手机号不能为空！";
        }
    }
    public function logout(){
        if($_SESSION['id']!=null) {
            session_start();
            session('id',null);
            header('Location:login');
        }
        else{
            $this->error('退出错误');
        }
    }
    public function account(){
        if($_SESSION['id']!=null) {
            header('Location:index');
        }
        else{
            $this->display();
        }

    }
    public function forgot(){
        if($_SESSION['id']!=null) {
            header('Location:index');
        }
        else{
            $this->display();
        }

    }





}