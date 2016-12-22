<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/12/21
 * Time: 10:53
 */

namespace Help\Controller;


use Think\Controller;

class ServiceController extends Controller
{
    public function returnflow()
    {
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->display();
    }
    public function returnmethod()
    {
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->display();
    }

    public function returnpolicy()
    {
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->display();
    }
}