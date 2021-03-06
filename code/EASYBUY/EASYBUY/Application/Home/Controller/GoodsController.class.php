<?php
/**
 * 负责人：吴金铎.
 * 功能：商品详情页面
 * 日期：2016-12-7
**/

namespace Home\Controller;


use Common\library\easybuy;
use Think\Controller;

class GoodsController extends Controller
{
    public function index()//商品详情的显示
    {
        /**session状态维持
         * 张宇晗
         * 2016-12-18
         */
        session_start();
        if($_SESSION['id']!=null)
        {
            $this->assign('user',$_SESSION['user']);
            $this->assign('logout','退出');
        }else {
            $this->assign('user','登录');
            $this->assign('logout','');
        }
        $easybuy = new easybuy();//实例化一个easybuy类
        $date = $easybuy->GoodGetGC();
        $result = $easybuy->GoodArrayMake($date['good'],$date['grandname'],$date['categoriesname']);
        $categoriesname = $date['categoriesname'];
        $select['categoriesname'] = $categoriesname;
        $categories = M('categories')->where($select)->find();
        $condetion['categories'] = $categories['categoriesid'];
        $likethis = M('goods')->where($condetion)->limit(4)->select();
        $women = M('grand')->where("mark=1")->select();
        $men = M('grand')->where("mark=2")->select();
        $children = M('grand')->where("mark=3")->select();
        $this->assign('women',$women);
        $this->assign('men',$men);
        $this->assign('children',$children);

        $this->assign('likethis',$likethis);
        $this->assign('good',$result);
        $this->display();
    }
    public function  checkout()
    {
        session_start();
        $condition['userid']=$_SESSION['id'];
        $condition['goodid']=$_GET['goodid'];
        //dump($condition);
        if($condition['userid']==null)
        {
            $this->error('亲，请先登录！','../../../index/login');
        }
        else{
            $shopingcar=M('shopingcar');
            $find=$shopingcar->where($condition)->find();
            //dump($find);
            if($find)
            {
                $shopcount=$shopingcar->where($condition)->getField('shopcount');
                $condition1['shopcount']=$shopcount+1;
                $result=$shopingcar->where($condition)->save($condition1);
                if($result)
                {
                    $this->success('添加成功','../../../order/order');
                }
            }
            else{
                $condition['shopcount']=1;
                $result=$shopingcar->add($condition);
                if($result)
                {
                    $this->success('添加成功','../../../order/order');
                }

            }


        }
    }

}