<?php
namespace Admin\Controller;

use Common\library\easybuy;
use Think\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $easybuy = new easybuy();
        $count = M('admin')->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $model = M('admin')->limit($page->firstRow . ',' . $page->listRows)->select();

        $i = 0;
        foreach ($model as $vo) {
            $permission = $vo['permission'];
            if ($permission == "超级管理员") {
                $a = "全部权限";
            } else {
                $a = "部分权限";
            }
            $date[$i]['adminid'] = $vo['adminid'];
            $date[$i]['adminname'] = $vo['adminname'];
            $date[$i]['adminpswd'] = $vo['adminpswd'];
            $date[$i]['permission'] = $a;
            $i++;
        }
        $this->assign('admin', $date);
        $this->assign('pages', $pages);
        $this->display();

    }

    public function delete()
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
                $this->error("您没有权限删除管理员");

            } else {
                //echo "有权限，成功";
                $id = I('get.id');
                $result = M('admin')->delete($id);
                if ($result) {
                    $this->redirect('../admin/index',0);
                } else {
                    $this->error('删除失败', '../Admin/index');
                }
            }
        } else {
            $this->error("请登录！", '../../../index/login');

        }
    }

    public function insert()
    {
        $this->display();
    }

    public function adds()
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
                $this->error("您没有权限添加管理员");

            } else {
                //echo "有权限，成功";
                $data['adminname'] = I('name');
                $data['adminpswd'] = I('password');
                $result = M('admin')->add($data);
                //dump($data);
                if ($result) {
                    $this->redirect('../Admin/index',0);
                } else {
                    $this->error('插入失败', '../Admin/index');
                }
            }
        } else {
            $this->error("请登录！", '../../../index/login');

        }
    }

    public function update()
    {
        $admin = M('admin');
        $id = $_GET['adminid'];
        $data = $admin->find($id);
        $this->assign('admin', $data);
        $this->display();
    }

    public function save()
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
                $admin = M('admin');
                $data = I('post.');
                $id = I('adminid');
                //dump($id);
                $condition = array();
                $condition['adminid'] = $id;
                $new = I('post.author1');
                $result1 = $admin->where($condition)->setField("adminpswd", "$new");
                if ($result1) {
                    $this->redirect('index',0);
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
        $id = I('get.id');
        $admin = M('admin')->find($id);
        if ($admin['permission'] != "超级管理员") {
            $a = "部分权限";
        } else {
            $a = "全部权限";
        }
        $date['adminid'] = $admin['adminid'];
        $date['adminname'] = $admin['adminname'];
        $date['adminpswd'] = $admin['adminpswd'];
        $date['permission'] = $admin['permission'];
        //显示视图
        $this->assign('admin', $date);
        $this->display();
    }

    /* public function dologin(){
        $model=new Model('admin');
        $condition=array();
        $condition['adminid']=I('post.adminid');
        $condition['adminname']=I('post.adminname');
        $condition['adminpswd']=I('post.adminpswd','','md5');
        if($model->where($condition)->select('post.permission')){
            $this->success('登录成功');
        }else{
         $this->error('登录失败，不存在该用户','/Home/Admin/index');
        }
     }*/
    public function select()
    {
        $easybuy = new easybuy();
        $keywords = I('post.keyword');
        $condition = array();
        $condition['adminname'] = $keywords;
        $adminTable = M('admin');
        $count = $adminTable->where($condition)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $data = $adminTable->where($condition)->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('admin', $data);
        $this->assign('pages', $pages);
        $this->display('admin/index');
    }
}