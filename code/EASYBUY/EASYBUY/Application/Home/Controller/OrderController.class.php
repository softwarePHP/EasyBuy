<?php
/**
 * 编码者：黄婷灵
 * 时间：2016.12.07
 * 版本：V1.0
 */

namespace Home\Controller;

use Common\library\easybuy;
use Think\Controller;

class OrderController extends Controller
{
    /*protected $_link = array(
        'orders' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'orders',
            'foreign_key' => 'goodid',
        ),
        'goods' => array(
            'mapping_type' => self::MANY_TO_MANY,
            'class_name' => 'goods',
            'foreign_key' => 'goodid',

        )
    );*/
    public function checkout()
    {
        //购物车中显示商品价格和图片
        session_start();
        $id=$_SESSION['id'];
        $condition['userid'] = $id;
        $shopingcar = M('shopingcar')->where($condition)->select();
        //dump($shopingcar);
        $i = 0;
        foreach ($shopingcar as $vo) {
            $goodid = $vo['goodid'];
            $good = M('goods')->find($goodid);
            $data[$i]['shopid']=$vo['shopid'];
            $data[$i]['userid']=$vo['userid'];
            $data[$i]['goodid']=$good['goodid'];
            $data[$i]['goodname']=$good['goodname'];
            $data[$i]['goodprice']=$good['goodprice'];
            $data[$i]['imageurl']=$good['imageurl'];
            $discount1 = $good['discount'];
            $discount = $discount1 * 100;
            $data[$i]['discount']=$discount;
            $data[$i]['mark1']=$good['mark1'];
            $data[$i]['mark2']=$good['mark2'];
            $data[$i]['spec']=$good['spec'];
            $data[$i]['shopcount']=$vo['shopcount'];
            /*$goodid = $good['goodid'];
            $goodname = $good['goodname'];
            $goodprice = $good['goodprice'];
            $shopcount = $vo['shopcount'];
            $date[$i]['goodid']=$goodid;
            $date[$i]['goodname']=$goodname;
            $date[$i]['goodprice']=$goodprice;
            $date[$i]['shopcount']=$shopcount;*/
            $i++;
            //dump($good);
        }

        dump($data);
        $this->assign('data',$data);
        $this->display();
    }

    public function order(){



            //实例化对象order

            //$orders = $orderTable->where($orderTable['userid']=$_SESSION['id'])->select();
            //实例化对象goods
            //$goodsTable = M('goods');

            //$goods = $goodsTable->where($goodsTable['goodid']=$orderTable['goodid'])->select();
            //实例化订单物品
            //$orderdate = M('orderdate');
            //$orderid = $orderTable['orderid'];
            //$orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);
            //$orderdates = $orderdate->where($orderdate['orderid']=$orderid)->select();
            //dump($orderdates);
            //dump($goods);

            //$orders = $orderTable ->query('select * from orderdate where orderid = '.$orderid);

            //$data = $easybuy->OrderSelect($orders);
            //dump($data);
            /*$easybuy = new easybuy();
            $orderTable = M('orders');
            $orders = $orderTable->select();
            $data = $easybuy->OrderSelect($orders);
            //$this->assign('order', $orders);
            $this->assign('order',$data);
            //dump($orders);
            dump($data);
            $this->display();*/
        session_start();
        $id=$_SESSION['id'];
        $shopid=I('shopid');
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        //$shopids=array();
        //$shopids[]=$_POST('goods[]');
        //dump($shopids);
        //$j = 0;
        $i=0;
        //foreach ($shopids as $valus){
            //$condition['userid']=$id;
            //$condition['shopid']=$valus[$j];
            $shopingcar=M('shopingcar')->where($condition)->select();
            dump($condition);
            dump($shopingcar);
           //$j++;
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $data[$i]['shopid']=$vo['shopid'];
                $data[$i]['userid']=$vo['userid'];
                $data[$i]['goodid']=$good['goodid'];
                $data[$i]['goodname']=$good['goodname'];
                $data[$i]['imageurl']=$good['imageurl'];
                $discount1 = $good['discount'];
                $discount = $discount1 * 100;
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                //$alltotal = $alltotal + $total;
                $data[$i]['total'] = $total;
                $data[$i]['discount']=$discount;
                $data[$i]['goodprice']=$goodprice;
                $data[$i]['mark1']=$good['mark1'];
                $data[$i]['mark2']=$good['mark2'];
                $data[$i]['spec']=$good['spec'];
                $data[$i]['shopcount']=$count;
                //$userid=$vo['userid'];
                $i++;
                //dump($good);
            }
            $j = 0;
            $ids['userid']=$id;
            $address=M('adress')->where($ids)->select();
            foreach ($address as $value){
                $userid = $value['userid'];
                $user=M('user')->find($userid);
                $values[$j]['username']=$user['username'];
                $values[$j]['tel']=$value['tel'];
                $values[$j]['adress']=$value['adress'];
                $j++;
            }
            $adress = $_GET['adress'];
        dump($adress);

        dump($values);
        //}
        dump($data);
        $this->assign('values',$values);
        $this->assign('data',$data);
        $this->display();

    }
    public function over(){
        $this->display();
    }
    public function payment(){
        session_start();
        $id=$_SESSION['id'];
        $shopid=I('shopid');
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        $shopingcar=M('shopingcar')->where($condition)->select();
        $orderTable = M('orders');
        /*$i = 0;
        foreach ($shopingcar as $vo) {
            $goodid = $vo['goodid'];
            $good = M('goods')->find($goodid);
            $address = M('adress')->find($id);
            $data = array();
            $data[$i]['userid'] = $id;
            $data[$i]['shopid'] = $vo['shopid'];
            $data[$i]['userid'] = $vo['userid'];
            $data[$i]['ordernumber'] = rand(100000000,999999999);
            $data[$i]['ordertime'] = time();
            $data[$i]['discount'] = $good['discount'];
            $data[$i]['orderaddress'] = $address['adress'];
            $data[$i]['orderstate'] = 2;
            $i ++;
        }*/
        $goodid = $shopingcar['goodid'];
        $good = M('goods')->find($goodid);
        $condition1=array();
        $condition1['userid']=$id;
        $address = M('adress')->where($condition1)->select();
        $data = array();
        $data['userid'] = $id;
        dump($data['userid']);
        $data['shopid'] = $shopingcar['shopid'];
        $data['ordernumber'] = rand(100000000,999999999);
        $data['ordertime'] = time();
        $data['discount'] = $good['discount'];
        $data['orderaddress'] = $address['adress'];
        $data['orderstate'] = 2;
        $result = $orderTable->add($data);
        if ($result){
            $this->success('插入成功');
        } else{
            $this->error('插入失败');
        }
        $this->assign('data',$data);
        $this->display();
    }
    public function add(){


    }
}