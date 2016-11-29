<?php
namespace Home\Controller;

use Think\Controller;

class AdminController extends Controller
{
    public function index()
    {
       $model= M('admin')->select();
       
       $i=0;
       foreach($model as $vo)
       {
        $permission=$vo['permission'];
        if($permission){
            $a="全部权限";
        }else{
            $a="部分权限";
        }
        $date[$i]['adminid']=$vo['adminid'];
        $date[$i]['adminname']=$vo['adminname'];
        $date[$i]['adminpswd']=$vo['adminpswd'];
        $date[$i]['permission']=$a;
        $i++;
       }
       $this->assign('admin',$date);
       $this->display();
        
    }
   public function delete()
    {
       $id=I('get.id');
       $result=M('admin')->delete($id);
       if($result){
        $this->success('删除成功','index.php/Home/Admin/index');
       }else{
        $this->error('删除失败','/Home/Admin/index');
       }
    }
    public function insert()
    {
        $data=array(
          '用户名'=>I('name'),
          '密码'=>I('password'),
          );
        $result=M('admin')->add($data);
        if($result){
            $this->success('插入成功','/Home/Admin/index');
        }else{
            $this->error('插入失败','/Home/Admin/index');
        }
    }
   /* public function add()
    {
              $data=array(
          '用户名'=>I('name'),
          '密码'=>I('password'),
          );
        $result=M('admin')->add($data);
        if($result){
            $this->success('插入成功','/Home/Admin/index');
        }else{
            $this->error('插入失败','/Home/Admin/index');
        
    }*/
    public function update()
    {   
        $this->display();

    }
    public function save(){
       $data=array(
         'author'=>I('author'),
         'author1'=>I('author1'),
        );
       $admin=M('admin');
       $admin->save($data);
    }
     public function view()
    {
        $id=I('get.id');
        $admin=M('admin')->find($id);
        if($admin['permission']){
          $a="部分权限";
        }else{
          $a="全部权限";
        }
        $date['adminid']=$admin['adminid'];
        $date['adminname']=$admin['adminname'];
        $date['adminpswd']=$admin['adminpswd'];
        $date['permission']=$admin['permission'];
        //显示视图
        $this->assign('admin',$date);
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
}