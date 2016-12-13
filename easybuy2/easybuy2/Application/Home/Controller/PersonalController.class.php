<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/12/6
 * Time: 15:19
 */

namespace Home\Controller;

use Think\Controller;
use Common\library\easybuyhome;

class PersonalController extends Controller
{
    public function addressManagement(){
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        $id=$_SESSION['id'];
        $condition['userid']=$id;
        $adress=M('adress')->where($condition)->select();
        $i=0;
        foreach($adress as $vo)
        {
           $date[$i]['adressid']=$vo['adressid'];
           $date[$i]['name']=$vo['name'];
           $date[$i]['adress']=$vo['adress'];
           $date[$i]['tel']=$vo['tel'];
           $i++;
        }
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->assign('adress',$date);
        $this->display();
    }
    public function delete(){
    	$id = I('adressid');
    	//dump($id);
        $result = M('adress')->delete($id);
        if ($result) {
           $this->success('删除成功');
           } else {
           $this->error('删除失败');
           }
      }
      public function add(){
      	
        $condition=array();
          $condition['userid']=$_SESSION['id'];
      	$data['name']=I('name');
      	$data['tel']=I('tel');
      	$data['adress']=I('adress');
      	$data['userid'] = $condition['userid'];
      	//dump($data);
      	$result=M('adress')->where($condition)->add($data);
      	//dump($data);
      	if($result){
            $this->success('插入成功');
        }else{
            $this->error('插入失败');
        }
      }
      public function update(){
      
      	$condition['adressid']=$_POST['adressid'];
          $date['name'] = I('name');
      	$date['adress'] = I('adress');
      	$date['tel'] = I('tel');
          $date['userid']=$_SESSION['id'];
      	$result=M('adress')->where($condition)->save($date);
      	if($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
      }
    public function personalCenter(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        //dump($userid);
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid ='.$userid)->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid ='.$userid)->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
//待付款
    public function pendingPayment(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 4')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 4')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//未发货
    public function unSend(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 1')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 1')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//已发货
    public function send(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 2')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 2')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//已签收
    public function over(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 3')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 3')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//已取消
    public function canceledOrder(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 5')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 5')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//已退货
    public function returned(){
        $name = $_SESSION['user'];//获取已登录的用户名
        $user = M('user');
        $userid = $user->where('username = "'.$name.'"')->getField('userid');//获取已登录的用户的userid
        $easybuyhome = new easybuyhome();
        $count = M('orders')->where('userid = '.$userid.' and orderstate = 6')->count();
        $page = $easybuyhome->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->where('userid = '.$userid.' and orderstate = 6')->select();
        $data = $easybuyhome->OrderSelect($oredrs);
        //dump($pages);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display('personal/personalcenter');
    }
//取消订单
    public function cancelOrder(){
        $id = I('id');
        //dump($id);
        $order = M('orders');
        $oredrs = $order->where("orderid = $id")->setField('orderstate', '5');
        $this->success('订单已取消', '../personal/canceledOrder');
    }
//confirmReceipt确认收货
    public function confirmReceipt(){
        $id = I('id');
        //dump($id);
        $order = M('orders');
        $oredrs = $order->where("orderid = $id")->setField('orderstate', '3');
        $this->success('收货完成', '../personal/over');
    }
//show查看详情
    public function show(){
        $id = I('id');
        echo"静态页面正在开发中......";
        //dump($id);
        //$this->display();
    }

}