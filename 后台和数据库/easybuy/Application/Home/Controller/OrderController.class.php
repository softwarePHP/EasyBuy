<?php
namespace Home\Controller;

use Think\Controller;

class OrderController extends Controller
{
    public function all()
    {
        $i = 0;
        $order = M('orders');
        $oredrs = $order ->query('select * from orders');

        //查订单表
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            //$discount = $value['discount'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];
            //echo $orderid."&nbsp&nbsp";
            //echo $userid."&nbsp&nbsp";
            //echo '订单号:'.$ordernumber."&nbsp&nbsp";
            //echo'下单时间:'. $ordertime."&nbsp&nbsp";
            //echo $discount."&nbsp&nbsp";
            //echo '收货地址:'.$orderaddress."&nbsp&nbsp";

            //查状态名称表
            $state = M('state');
            $states = $state->find($orderstate);
            $statename = $states['statename'];
            //echo '订单状态:'.$statename."&nbsp&nbsp";

            //查用户表
            $user= M('user');
            $users = $user ->find($userid);
            $username = $users['username'];
            //echo '用户姓名:'.$username."&nbsp&nbsp";

            //查订单物品表
            $orderdate = M('orderdate');
            $orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);

            $j = 0;
            foreach($orderdates as $key){
                $count = $key['count'];
                $goodid = $key['goodid'];

                //查商品表
                $good = M('goods');
                $goods = $good ->find($goodid);
                $goodname = $goods['goodname'];
                $goodprice = $goods['goodprice'];
                //echo '商品详情：'.$goodname.':'.'￥'. $goodprice.'*'.$count."&nbsp&nbsp";
                $ctmp[$j] = $goodname.':'.'￥'. $goodprice.'*'.$count;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品详情']=$ctmp;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;

            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            //dump($money);
            $i++;
        }
        $this->assign('data',$data);
        $this->display();
    }
    //已完成订单
    public function over()
    {
        $i = 0;
        $order = M('orders');
        $oredrs = $order ->query('select * from orders where orderstate = 2');

        //查订单表
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $states = $state->find($orderstate);
            $statename = $states['statename'];

            //查用户表
            $user= M('user');
            $users = $user ->find($userid);
            $username = $users['username'];

            //查订单物品表
            $orderdate = M('orderdate');
            $orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);

            $j = 0;
            foreach($orderdates as $key){
                $count = $key['count'];
                $goodid = $key['goodid'];

                //查商品表
                $good = M('goods');
                $goods = $good ->find($goodid);
                $goodname = $goods['goodname'];
                $goodprice = $goods['goodprice'];
                $ctmp[$j] = $goodname.':'.'￥'. $goodprice.'*'.$count;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品详情']=$ctmp;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;

            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $i++;
        }
        $this->assign('data',$data);
        $this->display();
    }
    //已发货订单
    public function send()
    {
        $i = 0;
        $order = M('orders');
        $oredrs = $order ->query('select * from orders where orderstate = 1');

        //查订单表
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $states = $state->find($orderstate);
            $statename = $states['statename'];

            //查用户表
            $user= M('user');
            $users = $user ->find($userid);
            $username = $users['username'];

            //查订单物品表
            $orderdate = M('orderdate');
            $orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);

            $j = 0;
            foreach($orderdates as $key){
                $count = $key['count'];
                $goodid = $key['goodid'];

                //查商品表
                $good = M('goods');
                $goods = $good ->find($goodid);
                $goodname = $goods['goodname'];
                $goodprice = $goods['goodprice'];
                $ctmp[$j] = $goodname.':'.'￥'. $goodprice.'*'.$count;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品详情']=$ctmp;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;

            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $i++;
        }
        $this->assign('data',$data);
        $this->display();
    }
    //未发货订单
    public function unsend()
    {
        $i = 0;
        $order = M('orders');
        $oredrs = $order ->query('select * from orders where orderstate = 3');

        //查订单表
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $states = $state->find($orderstate);
            $statename = $states['statename'];

            //查用户表
            $user= M('user');
            $users = $user ->find($userid);
            $username = $users['username'];

            //查订单物品表
            $orderdate = M('orderdate');
            $orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);

            $j = 0;
            foreach($orderdates as $key){
                $count = $key['count'];
                $goodid = $key['goodid'];

                //查商品表
                $good = M('goods');
                $goods = $good ->find($goodid);
                $goodname = $goods['goodname'];
                $goodprice = $goods['goodprice'];
                $ctmp[$j] = $goodname.':'.'￥'. $goodprice.'*'.$count;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品详情']=$ctmp;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;
            $data[$i]['订单id'] = $orderid;
            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $i++;
        }
        $this->assign('data',$data);
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
        $ordernumber = $_POST['ordernumber'];
        //dump($ordernumber);
        $i = 0;
        $order = M('orders');
        $oredrs = $order ->query('select * from orders where ordernumber ='.$ordernumber);

        //查订单表
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $states = $state->find($orderstate);
            $statename = $states['statename'];

            //查用户表
            $user= M('user');
            $users = $user ->find($userid);
            $username = $users['username'];

            //查订单物品表
            $orderdate = M('orderdate');
            $orderdates = $orderdate ->query('select * from orderdate where orderid = '.$orderid);

            $j = 0;
            foreach($orderdates as $key){
                $count = $key['count'];
                $goodid = $key['goodid'];

                //查商品表
                $good = M('goods');
                $goods = $good ->find($goodid);
                $goodname = $goods['goodname'];
                $goodprice = $goods['goodprice'];
                $ctmp[$j] = $goodname.':'.'￥'. $goodprice.'*'.$count;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品详情']=$ctmp;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;

            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $i++;
        }
        $this->assign('data',$data);
        $this->display('order/all');
    }

}
