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
        $id = I('userid');
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
        //$id=I('userid');
        $shopid=I('shopid');
        session_start();
        $id=$_SESSION['id'];
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        $shopids = $_POST['shopids'];
        dump($shopids);
        //$shopids=array();
        //$shopids[]=$_POST('goods[]');
        //dump($shopids);
        $j = 0;
        $i=0;
        foreach ($shopids as $valus){
            $condition1['userid']=3;
            $condition1['shopid']=$valus[$j];
            $shopingcar=M('shopingcar')->where($condition1)->select();
            dump($condition1);
            //dump($shopingcar);

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

            //$adress = $_GET['adress'];
        //dump($adress);

        //dump($values);
        }
        $j = 0;
        $ids['userid']=3;
        $address=M('adress')->where($ids)->select();
        foreach ($address as $value){
            $userid = $value['userid'];
            $user=M('user')->find($userid);
            $values[$j]['username']=$user['username'];
            $values[$j]['tel']=$value['tel'];
            $values[$j]['adress']=$value['adress'];
            $j++;
        }
        //dump($data);

        $this->assign('values',$values);
        $this->assign('data',$data);
        $this->display();

    }
    public function over(){
        $this->display();
    }
    public function payment(){
        $id=I('userid');
        //dump($id);
        $shopid=I('shopid');
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        $condition1['userid']=$id;
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
            $data[$i]['ordernumber'] = rand(100000000,999999999);
            $data[$i]['ordertime'] = time();
            $data[$i]['discount'] = $good['discount'];
            $data[$i]['orderaddress'] = $address['adress'];
            $data[$i]['orderstate'] = 2;
            $i ++;
        }*/
        $i = 0;
        foreach ($shopingcar as $vo) {
            $goodid = $shopingcar['goodid'];
            $good = M('goods')->find($goodid);
            $address = M('adress')->where($condition1)->find();
            $data = array();
            $data[$i]['userid'] = $id;
            //dump($data['userid']);
            $data[$i]['shopid'] = $shopingcar['shopid'];
            $data[$i]['ordernumber'] = rand(100000000, 999999999);
            $date = time();
            $ordertime = date('Y-m-d H:m:s', $date);
            $data[$i]['ordertime'] = $ordertime;
            $data[$i]['discount'] = $good['discount'];
            dump($good['discount']);
            $data[$i]['orderaddress'] = $address['adress'];
            $data[$i]['orderstate'] = 2;

        }
        $orderTable->add($data);
        //dump($result1);
        /*$orderdateTable = M('orderdate');
        $shopingcar=M('shopingcar')->where($condition)->select();
        $data1=array();
        $data1['goodid']=$good['goodid'];
        $data1['orderid']=$orderTable['orderid'];
        $data1['count']=$shopingcar['count'];
        $orderdateTable->add($data1);*/

        /*$goodprice = $good['goodprice'];
        $count = $shopingcar['count'];
        $total =  $goodprice * $count;
        $data2['total']=$total;*/
        $this->assign('data',$data);
        $this->display();
    }
    public function add(){


    }

}