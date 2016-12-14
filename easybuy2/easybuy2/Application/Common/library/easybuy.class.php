<?php

namespace Common\library;

use Think\Controller;
use Think\Page;

class easybuy extends Controller
{
    /*对商品进行操作    重新构建二维数组*/
    public function GoodsArraysMake($goods)
    {
        $i=0;//用于数组date存放数据的角标
        foreach ($goods as $good)
        {
            $c_id = $good['categoriesid'];//获取分类id
            $g_id = $good['grandid'];//获取品牌id
            $grand = M('grand')->find($g_id);//实例化品牌表
            $grandname = $grand['grandname'];
            $category = M('categories')->find($c_id);
            $categoriesname = $category['categoriesname'];
            /**
             *  构建数组用来存放数据
             **/
            $date[$i]['goodid']         = $good['goodid'];
            $date[$i]['goodname']       = $good['goodname'];
            $date[$i]['count']          = $good['count'];
            $date[$i]['goodprice']      = $good['goodprice'];
            $date[$i]['grandname']      = $grandname;
            $date[$i]['categoriesname'] = $categoriesname;
            $i++;
        }
        return $date;

    }

    /*对商品表进行操作    重新构建一维数组  用于对商品的修改显示 以及查看*/
    public function GoodArrayMake($good,$grandname,$categoriesname)
    {
        $result['goodid']         = $good['goodid'];
        $result['goodname']       = $good['goodname'];
        $result['goodprice']      = $good['goodprice'];
        $result['count']          = $good['count'];
        $result['grandname']      = $grandname;
        $result['categoriesname'] = $categoriesname;
        $result['introduction']   = $good['introduction'];
        $result['imageurl']       = $good['imageurl'];
        $result['mark1']          = $good['mark1'];
        $result['mark2']          = $good['mark2'];
        $result['brief']          = $good['brief'];
        $result['daily']          = $good['daily'];
        return $result;
    }

    /*对商品表进行操作    构建一维数组    用于商品的添加  以及修改*/
    public function GoodArrayMake2($grand,$categories)
    {
        /*  构建数组*/
        $date['goodname']     = I('goodname');
        $date['count']        = I('count');
        $date['goodprice']    = I('goodprice');
        $date['mark1']        = I('mark1');
        $date['mark2']        = I('mark2');
        $date['introduction'] = I('introduction');
        $date['brief']        =  I('brief');
        $date['daily']        = I('daily');
        $date['grandid']      = $grand['grandid'];
        $date['categoriesid'] = $categories['categoriesid'];
        return $date;
    }

    /*对商品表进行操作      获取商品的品牌和分类   用于查看  以及修改查看*/
    public function GoodGetGC()
    {
        $id = I('get.id');
        $grands = M('grand')->select();
        $categories = M('categories')->select();

        $good = M('goods')->find($id);
        $c_id = $good['categoriesid'];//获取分类id
        $g_id = $good['grandid'];//获取品牌id
        $grand = M('grand')->find($g_id);//实例化品牌表
        $grandname = $grand['grandname'];
        $category = M('categories')->find($c_id);
        $categoriesname = $category['categoriesname'];
        $date['grands'] = $grands;
        $date['categories'] = $categories;
        $date['good'] = $good;
        $date['grandname'] = $grandname;
        $date['categoriesname'] = $categoriesname;
        return $date;
    }

    /*  获取分类和品牌名称  查询数据库*/
    public  function GoodPostGC()
    {
        $grandname = $_POST['g_name'];
        $categoriesname = $_POST['c_name'];
        $select['grandname'] = $grandname;
        $select2['categoriesname'] = $categoriesname;
        $grand = M('grand')->where($select)->find();
        $categories = M('categories')->where($select2)->find();
        $things['grand'] = $grand;
        $things['categories'] = $categories;
        return $things;
    }

    /**
     *
     *
     * 以上是商品的
     *
     * 以下是订单的
     *
     *
     *
     *
     *
    **/
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