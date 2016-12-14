<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Session\Driver\Memcache;
use Think\Upload;

class GoodController extends Controller
{
    public function index()
    {
        $grands = M('grand')->select();
        $categories = M('categories')->select();
        $goods = M('goods')->select();//实例化一个商品类
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
        $this->assign("goods",$date);//将数据显示到视图
        $this->assign('grands',$grands);
        $this->assign('categories',$categories);
        //dump($date);
        $this->display();//显示模板
    }
    public function revise()
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
        /**
         * 构建一维数组
         **/
        $result['goodid']         = $good['goodid'];
        $result['goodname']       = $good['goodname'];
        $result['goodprice']      = $good['goodprice'];
        $result['count']          = $good['count'];
        $result['grandname']      = $grandname;
        $result['categoriesname'] = $categoriesname;
        $result['introduction']   = $good['introduction'];
        $result['mark1']          = $good['mark1'];
        $result['mark2']          = $good['mark2'];
        $result['daily']          = $good['daily'];
        //显示视图
        $this->assign('grands',$grands);
        $this->assign('categories',$categories);
        $this->assign('good',$result);
        $this->display();
    }
    public function show()
    {
        $id = I('get.id');
        $good = M('goods')->find($id);
        $c_id = $good['categoriesid'];//获取分类id
        $g_id = $good['grandid'];//获取品牌id
        $grand = M('grand')->find($g_id);//实例化品牌表
        $grandname = $grand['grandname'];
        $category = M('categories')->find($c_id);
        $categoriesname = $category['categoriesname'];
        /**
         * 构建一维数组
        **/
        $result['goodid']         = $good['goodid'];
        $result['goodname']       = $good['goodname'];
        $result['goodprice']      = $good['goodprice'];
        $result['count']          = $good['count'];
        $result['grandname']      = $grandname;
        $result['categoriesname'] = $categoriesname;
        $result['introduction']   = $good['introduction'];
        $result['mark1']          = $good['mark1'];
        $result['mark2']          = $good['mark2'];
        $result['daily']          = $good['daily'];
        //显示视图
        $this->assign('good',$result);
        if($result['daily']==1)
        {
            $this->assign('daily',"是");
        }
        else{
            $this->assign('daily',"否");
        }
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
        $grandname = $_POST['g_name'];
        $categoriesname = $_POST['c_name'];
        $select['grandname'] = $grandname;
        $select2['categoriesname'] = $categoriesname;
        $grand = M('grand')->where($select)->find();
        $categories = M('categories')->where($select2)->find();

        /*  构建数组*/
        $date['goodname']     = I('goodname');
        $date['count']        = I('count');
        $date['goodprice']    = I('goodprice');
        $date['mark1']        = I('mark1');
        $date['mark2']        = I('mark2');
            $date['daily']        = I('daily');
        $date['introduction'] = I('introduction');
        $date['imageurl']     = $imageurl;
        $date['grandid']      = $grand['grandid'];
        $date['categoriesid'] = $categories['categoriesid'];

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
        $grandname = $_POST['g_name'];
        $categoriesname = $_POST['c_name'];
        //dump($categoriesname);
        $select['grandname'] = $grandname;
        $select2['categoriesname'] = $categoriesname;
        $grand = M('grand')->where($select)->find();
        $categories = M('categories')->where($select2)->find();
        //dump($categories);
        session_start();
        if($_SESSION['id']!=null) {
        /*  构建数组*/
        $date['goodname']     = I('goodname');
        $date['count']        = I('count');
        $date['goodprice']    = I('goodprice');
        $date['mark1']        = I('mark1');
        $date['mark2']        = I('mark2');
            $date['daily']        = I('daily');
        $date['introduction'] = I('introduction');
        $date['grandid']      = $grand['grandid'];
        $date['categoriesid'] = $categories['categoriesid'];
        dump($date);
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
        $goods = M('goods')->where($condetion)->select();
        $condetion = NULL;
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
        $grands = M('grand')->select();
        $categories = M('categories')->select();
        $this->assign("goods",$date);//将数据显示到视图
        $this->assign('grands',$grands);
        $this->assign('categories',$categories);
        //dump($date);

        $this->display("good/index");
        //$condetion = NULL;

    }

}