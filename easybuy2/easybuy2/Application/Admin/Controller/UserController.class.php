<?php
/**用户删改查功能，及权限验证
 * 张宇晗
 * 2016-12-7
 **/
namespace Admin\Controller;

use Common\library\easybuy;
use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $easybuy = new easybuy();
            $count = M('user')->count();
            $page = $easybuy->getpage($count);
            $pages = $page->show();
            $userTable=M('user');
            $data=$userTable->limit($page->firstRow.','.$page->listRows)->select();
            $this->assign('user',$data);
            $this->assign('pages',$pages);
            $this->display();
        } else{
            header('Location: ../../admin/index/login');
        }
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
            $id=decode(I('id'));
            $result = $userTable->delete($id);
            if ($result) {
                $this->redirect('index',0);
            } else {
                $this->error("Sorry,用户信息删除不成功","__APP__/admin/user/index");
            }
        }
        }

        else{
            $this->error("请登录！",'../../../index/login');

        }
    }
    public function update()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $userTable=M('user');
            $id=decode(I('id'));
            //echo $id;
            $data=$userTable->find($id);
            $this->assign('user',$data);
            $this->display();
        } else{
            header('Location: ../../admin/index/login');
        }
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
        session_start();
        if ($_SESSION['id'] != null) {
            $userTable=M('user');
            $id=decode(I('id'));
            //echo $id;
            $data=$userTable->find($id);
            $this->assign('user',$data);
            $phone1=$userTable->where("userid=$id")->getField('phone');
            if($phone1==null)
            {
                $this->assign('phone','无');
            }
            else{
                $this->assign('phone',$phone1);
            }
            $this->display();
        } else{
            header('Location: ../../admin/index/login');
        }
    }
    public function select(){
        session_start();
        if ($_SESSION['id'] != null) {
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
        } else{
            header('Location: __APP__/admin/index/login');
        }
    }

}
