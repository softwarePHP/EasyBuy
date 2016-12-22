<?php
namespace Help\Controller;
/**
 * Created by PhpStorm.
 * User: 黄婷灵
 * Date: 2016/12/21
 * Time: 8:24
 */
use Think\Controller;
class GuideController extends Controller
{
    public function shopping()
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

    public function coupon()
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

    public function question()
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

    public function customer()
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