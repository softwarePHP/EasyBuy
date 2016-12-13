<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2016/12/6
 * Time: 15:19
 */

namespace Home\Controller;


use Think\Controller;

class PersonalController extends Controller
{
    public function addressManagement(){
        $id=I('userid');
        $condition['userid']=$id;
        $adress=M('adress')->where($condition)->select();
        $i=0;
        foreach($adress as $vo)
        {
           $date[$i]['adressid']=$vo['adressid'];
           $date[$i]['name']=$vo['name'];
           $date[$i]['adress']=$vo['adress'];
           $date[$i]['tel']=$vo['tel'];
           $date[$i]['default']=$vo['default'];
           $i++;
        }
        $this->assign('adress',$date);
        $this->display();
    }
    public function delete(){
    	$id = I('adressid');
    	dump($id);
        $result = M('adress')->delete($id);
        if ($result) {
           $this->success('删除成功');
           } else {
           $this->error('删除失败');
           }
      }
      public function add(){
      	

      	$data['name']=I('name');
      	$data['tel']=I('tel');
      	$data['adress']=I('adress');
      	$data['userid'] = $id=I('userid');
      	$date['default']=I('default');
      	dump($data);
      	$result=M('adress')->where($condition)->add($data);
      	dump($data);
      	if($result){
            $this->success('插入成功');
        }else{
            $this->error('插入失败');
        }
      }
      public function update(){
      
      	$condition['adressid']=$_POST['adressid'];
      	$date['name'] = I('name');
      	$date['adress'] = I('adress');
      	$date['tel'] = I('tel');
      	$date['default']=I('default');
      	$result=M('adress')->where($condition)->save($date);
      	if($result){
            $this->success('插入成功');
        }else{
            $this->error('插入失败');
        }
      }
    public function personalCenter(){
        $this->display();
    }
}