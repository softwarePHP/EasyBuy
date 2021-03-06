<?php
namespace Home\Controller;

use Common\library\easybuy;
use Think\Controller;

class GrandsController extends Controller
{
    // 当前待操作的数据表名称
    protected $_tableName = '';
    // 数据表操作对象
    protected $_db;

    protected function _initialize() {

        //自动获取表名
        //$controllerName = CONTROLLER_NAME;
        if($this->_tableName){
            $this->_tableName = lcfirst(CONTROLLER_NAME);
        }
        // 创建自定义模型类
        //$this->_db = D($this->_tableName);

        // 判断当前模块下有无自定义类
        $class = MODULE_NAME . '\\Model\\' .CONTROLLER_NAME . 'Model';
        $commonclass = 'Common\\Model\\'.CONTROLLER_NAME . 'Model';     /*'\\'转义字符*/
        if(class_exists($class)){

            $this->_db = new $class();
        }else if(class_exists($commonclass)){

            //当前模块下无自定义模型了，则使用common模块下自定义类
            //$class = 'Common\Model\\'.CONTROLLER_NAME;   /*'\\'转义字符*/   $this->_db = new $class();
            $this->_db = new $commonclass();
        }else{

            //都没有
            $this->_db = D($this->_tableName);
        }
    }

public function index()
{
    $easybuy = new easybuy();
    $count = M('grand')->count();
    $page = $easybuy->getpage($count);
    $pages = $page->show();
    $grandTable = M('grand');
    $grand = $grandTable->limit($page->firstRow.','.$page->listRows)->select();
    $this->assign('grand',$grand);
    $this->assign('pages',$pages);
    $this->display();
}

public function insert()
{
    $this->display();
}
    public function insert1()
    {
        //$title=I('post.');
        $data['grandnum'] = I('grandnum');
        $data['grandname'] = I('grandname');
        $data['grandintroduction'] = I('content');

dump($data);
        //实例化categories
        $grandTable = M('grand');
        session_start();
        if ($_SESSION['id'] != null) {
        //参数判断
        $result=$grandTable->add($data);

        $this->success('添加成功','../Brand/index');
    } else{
            $this->error("请登录！",'../index/login');

        }
    }
public function revise()
{
    //1.1 获取id
    $grandTable = M('grand');
    $grandid = $_POST['grandid'];
    //dump($grandid);
    //1.2 获取该条记录
    $grand = $grandTable->find($grandid);
    //2、显示更新表单
   // dump($grand);
    $this->assign('grand',$grand);
    $this->display();

}


public function update()
{


    session_start();
    if ($_SESSION['id'] != null) {
        // 实例化
        $grandTable = M('grand');
        // 获取表单数据
        $data = I('post.');
        $id   = $_POST['grandid'];
        $condition = array();
        $condition['grandid'] = $id;
        // 数据库更新
        $result = $grandTable->where($condition)->save($data);
        if ($result) {
            $this->success('修改成功','index');
        } else {
            $this->error('修改失败');
        }
    }
    else{
        $this->error("请登录！",'../index/login');

    }
}

public function show()
{
    //1、获取get参数
    $id = I('id');

    //2、获取记录
    $grands = M('grand')->find($id);
    //3、赋值给视图变量
    $this->assign('grand',$grands);
    //4、显示视图
    $this->display();
}

public function delete()
{
    session_start();
    if ($_SESSION['id'] != null) {
    $grandTable = M('grand');
    $id = I('id');
    $result =$grandTable->delete($id);
    if ($result){
        $this->success('数据删除成功');
    } else {
        $this->error('删除失败');
    }}
else{
    $this->error("请登录！",'../index/login');

}}



}


