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
            $this->display();
        }
    }

    public function order(){

        session_start();
        $id=$_SESSION['id'];
        $condition['userid']=$id;
        //$condition['shopid']=$shopid;
        $shopids = $_POST['shopids'];
        //dump($shopids);
        //$shopids=array();
        //$shopids[]=$_POST('goods[]');
        //dump($shopids);
        $j = 0;
        $i=0;
        $alltotal = 0;
        foreach ($shopids as $valus){
            $condition1['userid']=$id;
            $condition1['shopid']=$valus;
            $shopingcar=M('shopingcar')->where($condition1)->select();
            //dump($condition1);
            //$j ++;
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
        //$alltotals['alltotal'] = $alltotal;

        //$this->display();
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
    public function over(){

        $this->display();
    }
    public function payment(){
        session_start();
        $id=$_SESSION['id'];
        //dump($id);
        $shopid=I('shopids');
        $address=$_POST['address'];
        //$address=explode('<li>收货地址：',$address);
        $a='收货地址';
        $address=ltrim($address,'<li>'.$a);
        $address=str_replace('</li><li>收件人：','：',$address);
        $address=str_replace('（收）','：',$address);
        $address = rtrim($address,'</li>');
        dump($address);
        $choseaddress = explode("：",$address);
        dump($choseaddress);
        //dump($shopid);
        //$alltotal = $_GET('alltotal');
        $condition['userid']=$id;
        $condition['shopid']=$shopid;
        $condition1['userid']=$id;
        //$shopingcar=M('shopingcar')->where($condition)->select();
        $orderTable = M('orders');
        $i = 0;
        foreach ($shopid as $value){
            $condition1['userid']=$id;
            $condition1['shopid']=$value;
            $shopingcar=M('shopingcar')->where($condition1)->select();

            foreach ($shopingcar as $vo) {
                $goodid = $vo['goodid'];
                $good = M('goods')->find($goodid);
                $data['shopid'] = $vo['shopid'];
                $i ++;
            }

        }
        //加入购物查表
        $data = array();
        $data['userid'] = $id;
        $data['ordernumber'] = rand(100000000,999999999);
        $date = time();
        $ordertime = date('Y-m-d H:m:s',$date);
        $data['ordertime'] = $ordertime;
        $data['discount'] = $good['discount'];
        $data['orderaddress'] = $choseaddress[1];
        $data['tel'] = $choseaddress[3];
        $data['name'] = $choseaddress[2];
        $data['orderstate'] = 4;
        dump($shopingcar);
        dump($data);
        /*$goodid = $shopingcar['goodid'];
        $good = M('goods')->find($goodid);
        //$address = M('adress')->where($condition1)->find();
        $data = array();
        $data['userid'] = $id;
        //dump($data['userid']);
        //$data['shopid'] = $shopingcar['shopid'];
        $data['ordernumber'] = rand(100000000,999999999);
        $date = time();
        $ordertime = date('Y-m-d H:m:s',$date);
        $data['ordertime'] = $ordertime;
        $data['discount'] = $good['discount'];
        $data['goodid'] = $good['goodid'];
        //dump($good['discount']);
        //$data['orderaddress'] = $address['adress'];
        //$data['tel'] = $address['tel'];
        //$data['name'] = $address['name'];
        $data['orderstate'] = 4;*/
        $orderTable->add($data);
        dump($data);
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        //$this->assign('alltotal',$alltotal);
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);
        $this->assign('data',$data);
        $this->display();
    }
    public function alltotal()
    {
        session_start();
        $id = $_SESSION['id'];
        $condition['userid'] = $id;
        $shopids = $_POST['shopids'];
        $j = 0;
        $i = 0;
        $alltotal = 0;
        foreach ($shopids as $valus) {
            $condition1['userid'] = $id;
            $condition1['shopid'] = $valus;
            $shopingcar = M('shopingcar')->where($condition1)->select();
            foreach ($shopingcar as $vo) {
                $goodid = $vo['goodid'];
                $good = M('goods')->find($goodid);
                $discount1 = $good['discount'];
                $discount = $discount1 * 100;
                $goodprice = $good['goodprice'];
                $count = $vo['shopcount'];
                $total = $goodprice * $count;

                $data[$i]['total'] = $total;
                $data[$i]['discount'] = $discount;
                $data[$i]['goodprice'] = $goodprice;
                $data[$i]['shopcount'] = $count;
                //$userid=$vo['userid'];
                $i++;
                //dump($good);
            }
            $alltotal += $total;

        }
        dump($alltotal);
        $this->assign('alltotal', $alltotal);
        $this->display();


    }
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
    public function adds()
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
    }
}