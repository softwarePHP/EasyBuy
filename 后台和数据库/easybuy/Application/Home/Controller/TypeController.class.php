<?php
namespace Home\Controller;

use Think\Controller;

class TypeController extends Controller
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
        $categoriesTable = M('categories');
        $categories = $categoriesTable->select();
        $this->assign('categories',$categories);
        $this->display();
    }
    public function insert()
    {
        $this->display();
    }

    public function insert1()
    {
        $title=$_POST['title'];
        $data['categoriesname'] = $title;

        //实例化categories
        $categoriesTable = M('categories');
        session_start();
        if ($_SESSION['id'] != null) {
        //参数判断
        $result=$categoriesTable->add($data);

        $this->success('插入成功','../Type/index');
    }

        else{
            $this->error("请登录！",'../index/login');

        }}
    public function revise()
    {
        // 实例化
        $grandTable = M('grand');
        // 获取表单数据
        $data = I('post.');
        $id = $_GET['grandid'];
        $condition = array();
        $condition['grandid'] = $id;
        // 数据库更新
        session_start();
        if ($_SESSION['id'] != null) {
        $result = $grandTable->where($condition)->save($data);
        if ($result){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
    }
        else{
            $this->error("请登录！",'../index/login');

        }}


    public function update()
    {
        //1.1 获取id
        $categoriesTable = M('categories');
        $categoriesid = $_GET['categoriesid'];
        //1.2 获取该条记录
        $categories = $categoriesTable->find($categoriesid);
        //2、显示更新表单
        $this->assign('categories',$categories);
        $this->display();
    }

//    public function show()
//    {
//        //1、获取get参数
//        $id = I('id');
//        //2、获取记录
//        $grands = $this->_db->find($id);
//        //3、赋值给视图变量
//        $this->assign('grand',$grands);
//        //4、显示视图
//        $this->display();
//    }

    public function delete()
    {
        session_start();
        if ($_SESSION['id'] != null) {
        $categoriesTable = M('categories');
        $id = I('id');
        $result =$categoriesTable->delete($id);
        if ($result){
            $this->success('数据删除成功');
        } else {
            $this->error('删除失败');
        }}
        else{
                $this->error("请登录！",'../index/login');

            }}


}