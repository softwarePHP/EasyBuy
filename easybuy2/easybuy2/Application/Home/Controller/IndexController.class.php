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
        //
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        //添加购物车，获取价格，数量功能
       if($_SESSION['id']!=null)
        {
            $id=$_SESSION['id'];
            $shopingcar=M('shopingcar')->where("userid=$id")->select();
            $i=0;
            $alltotal=0;
            $allcount=0;
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $data[$i]['shopid']=$vo['shopid'];
                $data[$i]['userid']=$vo['userid'];
                $data[$i]['goodid']=$good['goodid'];
                $data[$i]['goodname']=$good['goodname'];
                //$discount1 = $good['discount'];
                //$discount = $discount1 * 100;
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                $data[$i]['shopcount']=$count;
                $allcount+=$count;
                $alltotal+= $total;
                $i++;
            }


            $this->assign('total',$alltotal);
            $this->assign('count',$allcount);
        }else {
            $this->assign('total',"0.00");
            $this->assign('count',"0");
        }

        $this->display();
    }
    public function login(){
        if($_SESSION['id']!=null) {
            header('Location:index');
        }
        else{
            $women = M('grand')->where("mark=1")->select();
            $men = M('grand')->where("mark=2")->select();
            $children = M('grand')->where("mark=3")->select();
            $this->assign('women',$women);
            $this->assign('men',$men);
            $this->assign('children',$children);
            $this->display();
        }
    }
     public function tologin()
    {
        if($_SESSION['id']==null) {
            header('Location:login');
        }
        else{
            header('Location:../personal/personalCenter');
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
                // 检查验证码
                $verify = I('param.verify','');
                if(!check_verify($verify)){
                    $this->error("亲，验证码输错了哦！",$this->site_url,6);
                }
                else{
                    $this->success('登录成功，欢迎光临易购商城', '../index/index/');
                }
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
            $women = M('grand')->where("mark=1")->select();
            $men = M('grand')->where("mark=2")->select();
            $children = M('grand')->where("mark=3")->select();
            $this->assign('women',$women);
            $this->assign('men',$men);
            $this->assign('children',$children);
            $this->display();
        }

    }
    public function forgot(){
        if($_SESSION['id']!=null) {
            header('Location:index');
        }
        else{
            $women = M('grand')->where("mark=1")->select();
            $men = M('grand')->where("mark=2")->select();
            $children = M('grand')->where("mark=3")->select();
            $this->assign('women',$women);
            $this->assign('men',$men);
            $this->assign('children',$children);
            $this->display();
        }

    }
    public function verify_c()
    {
        ob_clean();
        $verify=new \Think\Verify();
        $verify->fontSize = 18;
        $verify->length   = 4;
        $verify->useNoise = false;
        $verify->imageW = 130;
        $verify->imageH = 50;
        //$Verify->expire = 600;
        $verify->entry();
    }
    //搜索功能
    public function select()
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
        $search = I('search');
        $condetion['goodname'] = array('like',"%$search%");
        $result = M('goods')->where($condetion)->select();
        $this->assign('goods',$result);
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $categories = M('categories');
            $ca = $categories->select();
            $this->assign('categories', $ca);
            $grand = M('grand');
            $gr = $grand->select();
            $this->assign('grand', $gr);
              //添加购物车，获取价格，数量功能
        if($_SESSION['id']!=null)
        {
            $id=$_SESSION['id'];
            $shopingcar=M('shopingcar')->where("userid=$id")->select();
            $i=0;
            $alltotal=0;
            $allcount=0;
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $data[$i]['shopid']=$vo['shopid'];
                $data[$i]['userid']=$vo['userid'];
                $data[$i]['goodid']=$good['goodid'];
                $data[$i]['goodname']=$good['goodname'];
                //$discount1 = $good['discount'];
                //$discount = $discount1 * 100;
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                $data[$i]['shopcount']=$count;
                $allcount+=$count;
                $alltotal+= $total;
                $i++;
            }
            $this->assign('total',$alltotal);
            $this->assign('count',$allcount);
        }else {
            $this->assign('total',"0.00");
            $this->assign('count',"0");
        }
        $this->display('./products/index');

    }
 public function daily()
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
        //从商品数据库里获取数据，显示商品
        $goodsTable=M('goods');
        $goods=$goodsTable->where('daily=1')->limit(9)->select();
        $this->assign('goods',$goods);
        //
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $categories = M('categories');
        $ca = $categories->select();
        $this->assign('categories', $ca);
        $grand = M('grand');
        $gr = $grand->select();
        $this->assign('grand', $gr);
     //添加购物车，获取价格，数量功能
       if($_SESSION['id']!=null)
        {
            $id=$_SESSION['id'];
            $shopingcar=M('shopingcar')->where("userid=$id")->select();
            $i=0;
            $alltotal=0;
            $allcount=0;
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $data[$i]['shopid']=$vo['shopid'];
                $data[$i]['userid']=$vo['userid'];
                $data[$i]['goodid']=$good['goodid'];
                $data[$i]['goodname']=$good['goodname'];
                //$discount1 = $good['discount'];
                //$discount = $discount1 * 100;
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                $data[$i]['shopcount']=$count;
                $allcount+=$count;
                $alltotal+= $total;
                $i++;
            }
            $this->assign('total',$alltotal);
            $this->assign('count',$allcount);
        }else {
            $this->assign('total',"0.00");
            $this->assign('count',"0");
        }


        $this->display('index/daily');
    }




}
