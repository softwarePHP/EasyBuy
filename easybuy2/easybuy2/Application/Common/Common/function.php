<?php
/**
 * Created by PhpStorm.
 * User: Lucifer
 * Date: 2016/12/10
 * Time: 12:06
 */
/**
 * 验证码检查
 * 张宇晗
 * 2016-12-10
 */
function check_verify($code, $id = ""){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}
?>