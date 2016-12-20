<?php
/**
 * 编码者：黄婷灵
 * 时间：2016.12.07
 * 版本：V1.0
 */

namespace Home\Controller;

use Common\library\easybuy;
use Think\Controller;
use Think\Upload;

class OrderController extends Controller
{   
    /**
     * 购物车
     */
    public function checkout()
    {
        //购物车中显示商品价格和图片
        session_start();
        if($_SESSION['id']==null)
        {
            $this->success('亲，请先登录！','../../../index/login');

        }
        else {


            $id = $_SESSION['id'];
            $condition['userid'] = $id;
            $shopingcar = M('shopingcar')->where($condition)->select();
            //dump($shopingcar);
            $i = 0;
            foreach ($shopingcar as $vo) {
                $goodid = $vo['goodid'];
                $good = M('goods')->find($goodid);
                $data[$i]['shopid'] = $vo['shopid'];
                $data[$i]['userid'] = $vo['userid'];
                $data[$i]['goodid'] = $good['goodid'];
                $data[$i]['goodname'] = $good['goodname'];
                $data[$i]['goodprice'] = $good['goodprice'];
                $data[$i]['imageurl'] = $good['imageurl'];
                $discount1 = $good['discount'];
                $discount = $discount1 * 100;
                $data[$i]['discount'] = $discount;
                $data[$i]['mark1'] = $good['mark1'];
                $data[$i]['mark2'] = $good['mark2'];
                $data[$i]['spec'] = $good['spec'];
                $data[$i]['shopcount'] = $vo['shopcount'];
                $i++;
                //dump($good);
            }
            //dump($data);
            $women = M('grand')->where("mark=1")->select();
            $men = M('grand')->where("mark=2")->select();
            $children = M('grand')->where("mark=3")->select();
            $this->assign('women',$women);
            $this->assign('men',$men);
            $this->assign('children',$children);
            $this->assign('data', $data);
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
           
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
    }
    /**
     * 订单详情
     */
    public function order(){

        session_start();
            $id=$_SESSION['id'];
            $condition['userid']=$id;
            //$condition['shopid']=$shopid;
            $shopids = $_POST['shopids'];
            $i=0;
            $alltotal = 0;
            foreach ($shopids as $valus){
                $condition1['userid']=$id;
                $condition1['shopid']=$valus;
                $shopingcar=M('shopingcar')->where($condition1)->select();
                //dump($condition1);
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
            $alltotal += $total;
        }
        //dump($alltotal);
        $j = 0;
        $ids['userid']=$id;
        $address=M('adress')->where($ids)->select();
        foreach ($address as $value){
            $userid = $value['userid'];
            $user=M('user')->find($userid);
            $values[$j]['adressid']=$value['adressid'];
            $values[$j]['username']=$user['username'];
            $values[$j]['tel']=$value['tel'];
            $value[$j]['adressid']=$value['adressid'];
            $values[$j]['adress']=$value['adress'];
            $values[$j]['name']=$value['name'];
            $j++;
        }
        //dump($data);
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('alltotal',$alltotal);
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->assign('values',$values);
        $this->assign('data',$data);
        $this->assign('user',$_SESSION['user']);
        $this->assign('logout','退出');
        $this->display();
    }
    /**
     *  确认支付（添加到表orders和orderdate）
     */
    public function payment(){
        // 获取userID
        session_start();
        $id=$_SESSION['id'];
       
        // 获取购物车id
        $shopid=I('shopids');
        $address=$_POST['address'];
   
        //$address=explode('<li>收货地址：',$address);
        // 字符串切割
        $a='收货地址';
        $address=ltrim($address,'<li>'.$a);
        $address=str_replace('</li><li>收件人：','：',$address);
        $address=str_replace('（收）','：',$address);
        $address = rtrim($address,'</li>');
        
        $choseaddress = explode("：",$address);
        
        //$alltotal = $_GET('alltotal');
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        $condition1['userid']=$id;
        //$shopingcar=M('shopingcar')->where($condition)->select();


        // 计算商品总价
        $p=0;
        $alltotal = 0;
        foreach ($shopid as $valus){
            $condition1['userid']=$id;
            $condition1['shopid']=$valus;
            $shopingcar=M('shopingcar')->where($condition1)->select();
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                $p++;
            }
            $alltotal += $total;
        }
        
        // 提交到订单表
        $orderTable = M('orders');
        $data = array();
        $data['userid'] = $id;
        $date = time();
        $ordertime = date('Y-m-d H:m:s',$date);
        $data['ordertime'] = $ordertime;
        $str1 = rand(100000000,999999999);
        $str2 = $date;
        $data['ordernumber'] = $str1.$str2;
        //$data['discount'] = $good['discount'];
        $data['orderaddress'] = $choseaddress[1];
        $data['tel'] = $choseaddress[3];
        $data['name'] = $choseaddress[2];
        $data['orderstate'] = 4;
        $data['alltotal'] = $alltotal;
        $orderTable->add($data);
        //$orderid = $orderTable['orderid'];
        $ordernumber = $data['ordernumber'];

        //  提交到订单状态表
        $orderdate = M('orderdate');
        $i = 0;
        $j = 0;
        foreach ($shopid as $value){
            $condition1['userid']=$id;
            $condition1['shopid']=$value;
            $shopingcar=M('shopingcar')->where($condition1)->select();
            //dump($condition1);
            foreach ($shopingcar as $vo) {
                $goodid = $vo['goodid'];
                //$good = M('goods')->find($goodid);
                $order = M('orders')->where("ordernumber=$ordernumber")->getField('orderid');
                //$order = intval($order);
                $values[$i]['goodid'] = $goodid;
                //$values[$i]['goodid'] = intval($values[$i]['goodid']);
                $values[$i]['count'] = $vo['shopcount'];
                //$values[$i]['count'] = intval($values[$i]['count']);
                $values[$i]['orderid'] = $order;
                $i ++;
            }
            $j ++;

        }      
        $orderdate->addALL($values);

        // 计算商品总价
        $p=0;
        $alltotal = 0;
        foreach ($shopid as $valus){
            $condition1['userid']=$id;
            $condition1['shopid']=$valus;
            $shopingcar=M('shopingcar')->where($condition1)->select();
            foreach($shopingcar as $vo){
                $goodid=$vo['goodid'];
                $good=M('goods')->find($goodid);
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total =  $goodprice * $count;
                $p++;
            }
            $alltotal += $total;
        }

        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        //$this->assign('alltotal',$alltotal);
        $this->assign('alltotal', $alltotal);
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->assign('data',$data);
        $this->assign('values',$values);
        $this->display();
    }
    /**
     * 购物车删除
     */
    public function delete()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $shoppingcerTable = M('shopingcar');
            $shopid = I('shopid');
            $result = $shoppingcerTable->delete($shopid);
            if ($result) {
                $this->success('数据删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error("请登录！", '../index/login');

        }
    }
    /**
     * 支付完成
     */
    public function over(){
        session_start();
        $id=$_SESSION['userid'];
        $orderid = I('orderid');
        $condition['orderid'] = $orderid;
        $date['orderstate'] = 1;
        // 更改订单状态为未发货状态(由状态4未付款到状态1未发货)
        M('orders')->where($condition)->save($date);
        // 更改商品表中商品数量
        $orderstate = M('orderdate')->where($condition)->select();
        $i = 0;
        foreach ($orderstate as $value){
            // 获取购买商品数量
            $vos['count'] = $value['count'];
            // 获取购买商品id
            $vo['goodid'] = $value['goodid'];
            $goods = M('goods')->where($vo)->getField('count');
            $voo['count'] = $goods-$vos['count'];
            $i ++;
        }
        // 更新数量
        M('goods')->where($vo)->save($voo);
        $this->display();
    }
    /*public function adds()
    {
        session_start();
        $condition['userid']=$_SESSION['id'];
        $condition['shopid']=$_GET['shopid'];
        //dump($condition);
        if($condition['userid']==null)
        {
            $this->error('亲，请先登录！','../../../index/login');
        }
        else{
            $ordersTable=M('orders');
            $find=$ordersTable->where($condition)->find();
            //dump($find);
            if($find)
            {
                $shopcount=$ordersTable->where($condition)->getField('shopcount');
                $condition1['shopcount']=$shopcount+1;
                $result=$ordersTable->where($condition)->save($condition1);
                if($result)
                {
                    $this->success('添加成功','../../../order/checkout');
                }
            }
            else{
                $condition['shopcount']=1;
                $result=$ordersTable->add($condition);
                if($result)
                {
                    $this->success('添加成功','../../../order/order');
                }

            }


        }
    }*/
}
