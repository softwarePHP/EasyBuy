<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/12/6
 * Time: 15:04
 */

namespace Home\Controller;


use Think\Controller;

class OrderController extends Controller
{
    public function checkout()
    {
        //购物车中显示商品价格和图片
      $id=I('userid');
      $condition['userid']=$id;
      $shopingcar=M('shopingcar')->where($condition)->select();
      dump($shopingcar);
      $i=0;
      foreach($shopingcar as $vo)
      {
        $goodid=$vo['goodid'];
        $good=M('goods')->find($goodid);
        $date[$i]['goodid']=$good['goodid'];
        $date[$i]['goodname']=$good['goodname'];
        $date[$i]['goodprice']=$good['goodprice'];
        $date[$i]['imageurl']=$good['imageurl'];
        $i++;
        dump($good);
      }
      $this->assign('date',$date);
      $this->display();
    }

    public function order(){

        $this->display();
    }
    public function over(){
        $this->display();
    }
    public function payment(){
        $this->display();
    }
}