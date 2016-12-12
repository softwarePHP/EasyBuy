<?php
namespace Admin\Controller;

use Common\library\easybuy;
use Think\Controller;

class OrderController extends Controller
{
    public function all()
    {
        $easybuy = new easybuy();
        $count = M('orders')->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order->limit($page->firstRow.','.$page->listRows)->select();
        $data = $easybuy->OrderSelect($oredrs);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
    //已完成订单
    public function over()
    {
        $easybuy = new easybuy();
        $condetion['orderstate'] = 2;
        $count = M('orders')->where($condetion)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order ->where($condetion)->limit($page->firstRow.','.$page->listRows)->select();
        $data = $easybuy->OrderSelect($oredrs);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
    //已发货订单
    public function send()
    {
        $easybuy = new easybuy();
        $condetion['orderstate'] = 1;
        $count = M('orders')->where($condetion)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order ->where($condetion)->limit($page->firstRow.','.$page->listRows)->select();
        $data = $easybuy->OrderSelect($oredrs);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
    //未发货订单
    public function unsend()
    {
        $easybuy = new easybuy();
        $condetion['orderstate'] = 3;
        $count = M('orders')->where($condetion)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $order = M('orders');
        $oredrs = $order ->where($condetion)->limit($page->firstRow.','.$page->listRows)->select();
        $data = $easybuy->OrderSelect($oredrs);
        $this->assign('data',$data);
        $this->assign('pages',$pages);
        $this->display();
    }
    //发货处理
    public function sendgood()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $id = I(id);
            $order = M('orders');
            $oredrs = $order->where("orderid = $id")->setField('orderstate', '2');
            $this->success('发货成功', '../order/unsend');
        }

        else{
        $this->error("请登录！",'../index/login');

        }}




//全部订单的查询
    public function allselect()
    {
        $easybuy = new easybuy();
        $ordernumber = $_POST['ordernumber'];
        $order = M('orders');
        $oredrs = $order ->query('select * from orders where ordernumber ='.$ordernumber);
        $data = $easybuy->OrderSelect($oredrs);
        $this->assign('data',$data);
        $this->display('order/all');
    }

}
