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
        $this->success('删除成功','/index.php/Home/Admin/index');
       }else{
        $this->error('删除失败','/index.php/Home/Admin/index');
       }
    }
    public function insert()
    {
        $this->display();
    }
   public function adds()
    {
        $data['adminname']=I('name');
        $data['adminpswd']=I('password');
        $result=M('admin')->add($data);
        dump($data);
        if($result){
            $this->success('插入成功','/index.php/Home/Admin/index');
        }else{
            $this->error('插入失败','/index.php/Home/Admin/index');
        
    }
  }
    public function update()
    {   
        $admin=M('admin');
        $id=$_GET['adminid'];
        $data=$admin->find($id);
        $this->assign('admin',$data);
        $this->display();
    }
    public function save(){
            $admin=M('admin');
            $data=I('post.');
            $id=I('adminid');
            //dump($id);
            $condition = array();
            $condition['adminid'] = $id;
            $new=I('post.author1');
            $result1=$admin->where($condition)->setField("adminpswd","$new");
            if($result1)
            {
                $this->success("用户信息修改成功");
            }
            else{
                $this->error("sorry,用户信息修改不成功");

            }
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