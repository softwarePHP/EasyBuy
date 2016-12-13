<?php
namespace Admin\Controller;

use Common\library\easybuy;
use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
        $easybuy = new easybuy();
        $count = M('user')->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $userTable=M('user');
        $data=$userTable->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('user',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
    public function delete()
    {
        //获取管理员id
        session_start();
        //echo "adminid-->>".$_SESSION['id'];
        $admin_id=$_SESSION['id'];
        if($_SESSION['id']!=null) {
        $adminTable=M('admin');
        $condition = array();
        $condition['adminid'] = $admin_id;
        $permission=$adminTable->where($condition)->getField('permission');
        //dump($permission);
        //验证管理员名是否获取正确
        $admin_name=$adminTable->where($condition)->getField('adminname');
        //dump($admin_name);
        //验证权限
        if($permission!='超级管理员')
        {
            $this->error("您没有权限修改用户");

        }
        else {
            $userTable = M('user');
            $id = $_GET['userid'];
            $result = $userTable->delete($id);
            if ($result) {
                $this->success("用户信息删除成功");
            } else {
                $this->error("Sorry,用户信息删除不成功","__APP__/home/user/index");
            }
        }
        }

        else{
            $this->error("请登录！",'../../../index/login');

        }
    }
    public function update()
    {

        $userTable=M('user');
        $id=$_GET['userid'];
        //echo $id;
        $data=$userTable->find($id);
        $this->assign('user',$data);
        $this->display();
        }
    public function verify()
    {
        //获取管理员id
            session_start();
            if ($_SESSION['id'] != null) {
                //echo "adminid-->>".$_SESSION['id'];
                $admin_id = $_SESSION['id'];
                $adminTable = M('admin');
                $condition = array();
                $condition['adminid'] = $admin_id;
                $permission = $adminTable->where($condition)->getField('permission');
                //dump($permission);
                //验证管理员名是否获取正确
                $admin_name = $adminTable->where($condition)->getField('adminname');
                //dump($admin_name);
                //验证权限
                if ($permission != '超级管理员') {
                    $this->error("您没有权限修改用户");

                } else {
                    //echo "有权限，成功";
                $userTable = M('user');
                $data = I('post.');
                //dump($data);
                $id = $_GET['userid'];
                //dump($id);
                $condition = array();
                $condition['userid'] = $id;
                $result = $userTable->where($condition)->save($data);
                if ($result) {
                    $this->success("用户信息修改成功");
                } else {
                    $this->error("sorry,用户信息修改不成功");

                }

        }
        } else {
            $this->error("请登录！", '../../../index/login');

        }

    }
    public function view()
    {
        $userTable=M('user');
        $id=$_GET['userid'];
        //echo $id;
        $data=$userTable->find($id);
        $this->assign('user',$data);
        $this->display();
    }
    public function select(){
        $easybuy = new easybuy();
        $keywords=I('post.keywords');
        $condition = array();
        $condition['username'] = $keywords;
        $userTable=M('user');
        $count = $userTable->where($condition)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $data=$userTable->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('user',$data);
        $this->assign('pages',$pages);
        $this->display('user/index');
    }

}