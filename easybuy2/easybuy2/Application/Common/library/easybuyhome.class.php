<?php
/**
 * Created by PhpStorm.
 * User: 刘景荣
 * Date: 2016/12/10
 * Time: 9:34
 */
namespace Common\library;

use Think\Controller;
use Think\Page;

class easybuyhome extends Controller
{
//订单处理
    public  function OrderSelect($oredrs)
    {
        $i = 0;
        foreach ($oredrs as $value){
            $orderid = $value['orderid'];
            $userid  = $value['userid'];
            $ordernumber = $value['ordernumber'];
            $ordertime = $value['ordertime'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $statename = $state->where('orderstate = '.$orderstate)->getField('statename');
            if($statename === '待付款'){
                $data[$i]['操作'] = "<a href='/EasyBuy/index.php/home/order/payment'>前往付款</a>";
            }
            elseif($statename === '未发货'){
                $data[$i]['操作'] = "<a href='/EasyBuy/index.php/home/Personal/cancelOrder?id=$orderid'>取消订单</a>";
            }
            elseif($statename === '已发货'){
                $data[$i]['操作'] = "<a href='/EasyBuy/index.php/home/Personal/confirmReceipt?id=$orderid'>确认收货</a>";
            }
            else{
                $data[$i]['操作'] = NULL;
            }


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
            $data[$i]['id'] = $orderid;
            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $data[$i]['订单id'] = $orderid;
            //dump($money);
            $i++;
        }
        return $data;
    }




    /*    分页功能的实现    */
    public function getpage($count)
    {
        $page = new Page($count,C('PAGE_SIZE'));
        $page->setConfig('prev',C('PREV'));
        $page->setConfig('next',C('NEXT'));
        $page->setConfig('theme',C('THEME'));
        return $page;
    }

}