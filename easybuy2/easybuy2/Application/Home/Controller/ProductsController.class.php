<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/12/6
 * Time: 15:20
 */

namespace Home\Controller;


use Think\Controller;

class ProductsController extends Controller
{
    public function index()
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


            $goods = M('goods');
            $result = $goods->select();
            $this->assign("goods", $result);
            $categories = M('categories');
            $ca = $categories->select();
            $this->assign('categories', $ca);
            $grand = M('grand');
            $gr = $grand->select();
            $this->assign('grand', $gr);

            $women = M('grand')->where("mark=1")->select();
            $men = M('grand')->where("mark=2")->select();
            $children = M('grand')->where("mark=3")->select();
            $this->assign('women', $women);
            $this->assign('men', $men);
            $this->assign('children', $children);
        /**添加购物车，获取价格，数量功能
         * 张宇晗
         * 2016-12-15
         **/
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


    public function getproducts()
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

        $cat = I('post.radio');
        $price = I('post.price');
        $grand = I('post.grand');
        dump($grand);
        $map = array();

        $goods = M('goods');
        if ($cat) {
            $map['categoriesid'] = $cat;
        }
        if ($price) {
            $price = floatval($price);
            $price2 = $price - 99;
            $map['goodprice'] = array('between', array($price2, $price));
        }
        if ($grand) {
            $map['grandid'] = $grand;
        }
        // $map['_logic']='AND';
        $data = $goods->where($map)->select();
        //dump($data);
        //dump($cat);
        dump($price);
        // dump($grand);
        $this->assign("goods", $data);

        //提取种类信息和品牌等等信息

        $categories = M('categories');
        $ca = $categories->select();
        $this->assign('categories', $ca);
        $grand = M('grand');
        $gr = $grand->select();
        $this->assign('grand', $gr);
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women', $women);
        $this->assign('men', $men);
        $this->assign('children', $children);
         /**添加购物车，获取价格，数量功能
         * 张宇晗
         * 2016-12-15
         **/
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


        $this->display('index');

    }

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
        $grand = M('grand');
        $goods = M('goods');
        $categories = M('categories');
        $ca = $categories->select();
        $this->assign('categories', $ca);
        $gr = $grand->select();
        $this->assign('grand', $gr);
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women', $women);
        $this->assign('men', $men);
        $this->assign('children', $children);

        $getgrand = I('get.grandname');
        //dump($getgrand);
        $condition['grandname'] = $getgrand;
        $grandid = $grand->where($condition)->getField('grandid');
        $result = $goods->where("grandid=$grandid")->select();
        $this->assign('goods', $result);
         /**添加购物车，获取价格，数量功能
         * 张宇晗
         * 2016-12-15
         **/
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

        $this->display('index');
    }

}
