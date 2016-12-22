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
            $alltotal = $value['alltotal'];
            $tel = $value['tel'];
            $name = $value['name'];
            $orderaddress = $value['orderaddress'];
            $orderstate = $value['orderstate'];

            //查状态名称表
            $state = M('state');
            $statename = $state->where('orderstate = '.$orderstate)->getField('statename');
            if($statename === '待付款'){
                $data[$i]['操作'] = "<a href='/easybuy2/index.php/home/order/payment?id=$orderid'>前往付款</a>";
                $data[$i]['状态']= "当前订单状态：宝贝已拍下，请在3天内付款；若未及时付款，系统将自动取消订单";
                $data[$i]['状态内容']="<a href='/easybuy2/index.php/home/order/payment?id=$orderid'>点击这里</a>进行付款<br/>";
            }
            elseif($statename === '未发货'){
                $data[$i]['操作'] = "<a href='/easybuy2/index.php/home/Personal/cancelOrder?id=$orderid'>取消订单</a>";
                $data[$i]['状态']= "当前订单状态：订单已经提交，卖家尚未发货";
                $data[$i]['状态内容']="若卖家长时间未发货，您可以<a href='#'>提醒卖家发货</a>";
            }
            elseif($statename === '已发货'){
                $data[$i]['操作'] = "<a href='/easybuy2/index.php/home/Personal/confirmReceipt?id=$orderid'>确认收货</a>";
                $data[$i]['状态']= "当前订单状态：卖家已发货";
                $data[$i]['状态内容']="如果您已收到货，且对商品满意，您可以<a href='/easybuy2/index.php/home/Personal/confirmReceipt?id=$orderid'>确认收货</a>打款给卖家<br/>
                                        如果还未收到货，请注意自动打款时间，及时与商家联系";
            }
            elseif($statename === '已完成'){
                $data[$i]['操作'] = NULL;
                $data[$i]['状态']= "当前订单状态：交易已成功";
                $data[$i]['状态内容']="如果没有收到货，或收到货后出现问题，您可以联系卖家协商解决<br/>
                                    如果卖家没有履行应尽的承诺，您可以“投诉维权”";
            }
            else{
                $data[$i]['操作'] = NULL;
                $data[$i]['状态']= "当前订单状态：交易关闭";
                $data[$i]['状态内容']=NULL;
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
                $goodphotos = $goods['imageurl'];
                $ctmp[$j]['名称'] =  $goodname;
                $ctmp1[$j] = $goodprice;
                $ctmp2[$j] = $count;
                $ctmp[$j]['图片'] = $goodphotos;
                $money[$j] = $goodprice * $count;
                $data[$i]['商品']=$ctmp;
                $data[$i]['商品价格']=$ctmp1;
                $data[$i]['商品数量']=$ctmp2;
                $j++;
            }
            $newmoney = 0;
            for($k = 0; $k < $j; $k++)
            {
                $newmoney = $money[$k] +$newmoney;
            }
            $money = NULL;
            $ctmp = NULL;
            $ctmp1 = NULL;
            $ctmp2 = NULL;
            $data[$i]['id'] = $orderid;
            $data[$i]['订单号'] = $ordernumber;
            $data[$i]['下单时间'] = $ordertime;
            $data[$i]['用户姓名'] = $username;
            $data[$i]['收货地址'] = $orderaddress;
            $data[$i]['订单状态'] = $statename;
            $data[$i]['总金额'] = $newmoney;
            $data[$i]['实付金额'] = $alltotal;
            $data[$i]['订单id'] = $orderid;
            $data[$i]['收货电话'] = $tel;
            $data[$i]['收货姓名'] = $name;
            //dump($alltotal);
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
