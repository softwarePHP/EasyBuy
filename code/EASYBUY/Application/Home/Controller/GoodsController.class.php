<?php
namespace Home\Controller;

use Common\library\easybuy;
use Think\Controller;
use Think\Page;
use Think\Session\Driver\Memcache;
use Think\Upload;

class GoodsController extends Controller
{
    public function index()
    {
        $easybuy = new easybuy();//实例化一个easybuy类
        $grands = M('grand')->select();
        $categories = M('categories')->select();
        //实例化一个商品类
        $count = M('goods')->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();
        $goods = M('goods')->limit($page->firstRow.','.$page->listRows)->select();
        $date = $easybuy->GoodsArraysMake($goods);//调用easybuy类的方法
        $this->assign("goods",$date);//将数据显示到视图
        $this->assign('grands',$grands);
        $this->assign('categories',$categories);
        $this->assign("pages",$pages);
        //dump($date);
        $this->display();//显示模板
    }
    public function revise()
    {
        $easybuy = new easybuy();//实例化一个easybuy类
        $date = $easybuy->GoodGetGC();
        $result = $easybuy->GoodArrayMake($date['good'],$date['grandname'],$date['categoriesname']);//调用构建一维数组方法
        //显示视图
        $this->assign('grands',$date['grands']);
        $this->assign('categories',$date['categories']);
        $this->assign('good',$result);
        $this->display();
    }
    public function show()
    {
        $easybuy = new easybuy();//实例化一个easybuy类
        $date = $easybuy->GoodGetGC();
        $result = $easybuy->GoodArrayMake($date['good'],$date['grandname'],$date['categoriesname']);
        //显示视图
        $this->assign('good',$result);
        $this->display();
    }
    public function insert()
    {
            $grands = M('grand')->select();
            $categories = M('categories')->select();
            $this->assign('grands', $grands);
            $this->assign('categories', $categories);
            $this->display();
    }
    public function add()
    {
        session_start();
        if($_SESSION['id']!=null) {
        /* 上传商品图片*/
            $upload = new Upload(C('FILE_UPLOAD'));
            $info = $upload->upload();
            if(!$info)
            {
                dump($upload->getError());
                exit;
             }
                else
            {
             foreach ($info as $file)
                {
                    $imageurl = $file['savepath'] . $file['savename'];
                //exit;
                }
             }
        /*  获取分类和品牌名称  查询数据库*/

        $easybuy = new easybuy();
        $things = $easybuy->GoodPostGC();
        $date = $easybuy->GoodArrayMake2($things['grand'],$things['categories']);
        $date['imageurl']     = $imageurl;
        $result = M('goods')->add($date);
        if ($result)
        {
            $this->success('商品插入成功','index');
        }
        else
        {
            $this->error('插入失败','insert');
        }}

    else{
    $this->error("请登录！",'../index/login');

    }

        //dump($a);
    }
    public function delete()
    {
        session_start();
        if($_SESSION['id']!=null) {
        $id = I('get.id');
        $result = M('goods')->delete($id);
        if($result)
        {
            $this->success('删除成功','index');
        }
        else
        {
            $this->error('删除失败','index');
        }
        }

        else{
            $this->error("请登录！",'../index/login');

        }

    }
    public function update()
    {
        $goodid = $_POST['goodid'];
        $easybuy = new easybuy();
        $things = $easybuy->GoodPostGC();

        //dump($categories);
        session_start();
        if($_SESSION['id']!=null) {
            //$easybuy = new easybuy();//实例化一个easybuy类
            $date = $easybuy->GoodArrayMake2($things['grand'],$things['categories']);
            $result = M('goods')->where("goodid=$goodid")->save($date);
        if ($result)
        {
            $this->success('商品修改成功','index');
        }
        else
        {
            $this->error('修改失败','revise');
        }
        }

        else{
            $this->error("请登录！",'../index/login');

        }

    }
    public function select()
    {
        $easybuy = new easybuy();//实例化一个easybuy类
        $grandname = $_POST['g_name'];
        $categoriesname = $_POST['c_name'];
        //dump($grandname);
        $keyword = $_POST['keyword'];
        $select['grandname'] = $grandname;
        $select2['categoriesname'] = $categoriesname;
        $grand = M('grand')->where($select)->find();
        //dump($grand);
        $categories = M('categories')->where($select2)->find();
        $condetion = array();
        //dump($grand['grandid']);
        if($grandname)
        {
           $condetion['grandid'] = $grand['grandid'];
        }
        if($categoriesname)
        {
            $condetion['categoriesid'] = $categories['categoriesid'];
        }
        if ($keyword)
        {
            $condetion['keyword'] = $keyword;
        }
        $count = M('goods')->where($condetion)->count();
        $page = $easybuy->getpage($count);
        $pages = $page->show();

        //dump($page);
        $goods = M('goods')->where($condetion)->limit($page->firstRow.','.$page->listRows)->select();
        $date = $easybuy->GoodsArraysMake($goods);//调用easybuy类的方法
        $grands = M('grand')->select();
        $categories = M('categories')->select();
        $this->assign("goods",$date);//将数据显示到视图
        $this->assign('grands',$grands);
        $this->assign('categories',$categories);
        $this->assign("pages",$pages);
        $condetion = NULL;
        //dump($date);

        $this->display("goods/index");
        //$condetion = NULL;

    }

}