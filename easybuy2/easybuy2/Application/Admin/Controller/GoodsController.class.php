<?php
namespace Admin\Controller;

use Common\library\easybuy;
use Think\Controller;
use Think\Page;
use Think\Session\Driver\Memcache;
use Think\Upload;
class GoodsController extends Controller
{
    public function index()
    {
        session_start();
        if ($_SESSION['id'] != null) {
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
        } else{
            header('Location: ../../admin/index/login');
        }
    }
    public function revise()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $easybuy = new easybuy();//实例化一个easybuy类
            $date = $easybuy->GoodGetGC();
            $result = $easybuy->GoodArrayMake($date['good'],$date['grandname'],$date['categoriesname']);//调用构建一维数组方法
            //显示视图
            $this->assign('grands',$date['grands']);
            $this->assign('categories',$date['categories']);
            $this->assign('good',$result);
             $this->assign('goods',$date['good']);
            $this->display();
        } else{
            header('Location: ../../admin/index/login');
        }
    }
    public function show()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $easybuy = new easybuy();//实例化一个easybuy类
            $date = $easybuy->GoodGetGC();
            $result = $easybuy->GoodArrayMake($date['good'],$date['grandname'],$date['categoriesname']);
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
        } else{
            header('Location: ../../admin/index/login');
        }
    }
    public function insert()
    {
        session_start();
        if ($_SESSION['id'] != null) {
            $grands = M('grand')->select();
            $categories = M('categories')->select();
            $this->assign('grands', $grands);
            $this->assign('categories', $categories);
            $this->display();
        } else{
            header('Location: ../../admin/index/login');
        }
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
            $this->redirect('index',0);
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
        $id = decode(I('get.id'));
        $result = M('goods')->delete($id);
        if($result)
        {
            $this->redirect('index',0);
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
        session_start();
        if ($_SESSION['id'] != null) {
            
           }
    }
    public function select()
    {$upload = new Upload(C('FILE_UPLOAD'));
        $info = $upload->upload();
            $easybuy = new easybuy();
            $goodid = $_POST['goodid'];
            $things = $easybuy->GoodPostGC();
            $date = $easybuy->GoodArrayMake2($things['grand'], $things['categories']);
        foreach ($info as $file) {
            $date['imageurl'] = $file['savepath'] . $file['savename'];
            //exit;
        }
           $date['imageurl']=I('pi');
           if( I('pic')!=null)
           {
               $date['introduction']=I('pic');
           }
           else{
               $date['introduction']=I('in');
           }
            //dump($date);

            //dump($categories);
            session_start();
            if ($_SESSION['id'] != null) {
                //$easybuy = new easybuy();//实例化一个easybuy类

                $result = M('goods')->where("goodid=$goodid")->save($date);
                if ($result) {
                    $this->success('商品修改成功', 'index');
                } else {
                    $this->error('修改失败', 'revise');
                }
            } else {
                $this->error("请登录！", '../index/login');

            }
        /**
     * 2016-12-22
     * 张宇晗
     * 图像上传处理
     **/
    public function uploadify() {
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(
                'maxSize' => 3145728,
                'savePath' => '',
                'saveName' => array('uniqid', ''),
                'exts' => array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub' => true,
                'subName' => array('date', 'Ymd'),
            );
            $upload = new Upload($config);// 实例化上传类
            $info = $upload->upload();
            if (!$info) {
                //上传错误提示信息
                $this->error($upload->getError());
            } else {

                foreach ($info as $file) {
                    echo $file['savepath'] . $file['savename'];
                    //exit;
                }
            }

            }
        }
        if ($_SESSION['id'] != null) {
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
                $condetion['goodname'] = array('like',"%$keyword%");
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

        } else{
            header('Location: ../../admin/index/login');
        }
    }

}
