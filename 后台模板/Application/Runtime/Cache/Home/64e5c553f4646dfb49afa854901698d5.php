<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/css/main.css"/>
    <script type="text/javascript" src="/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="/index.php/home/admin/index" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/index.php/home/index/index">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="/index.php/home/admin/index">管理员</a></li>
                <li><a href="/index.php/home/admin/update">修改密码</a></li>
                <li><a href="/index.php/home/admin/delete">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/dingdan/unsend"><i class="icon-font">&#xe008;</i>未处理订单</a></li>
                        <li><a href="/index.php/home/shangpin/insert"><i class="icon-font">&#xe008;</i>添加商品</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/yonghu/index"><i class="icon-font">&#xe008;</i>查看用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/index.php/home/admin/index"><i class="icon-font">&#xe018;</i>管理员管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/admin/insert"><i class="icon-font">&#xe017;</i>添加管理员</a></li>
                        <li><a href="/index.php/home/admin/view"><i class="icon-font">&#xe037;</i>查看管理员</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>分类管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/pinpai/index"><i class="icon-font">&#xe017;</i>品牌管理</a></li>
                        <li><a href="/index.php/home/pinpai/insert"><i class="icon-font">&#xe017;</i>品牌添加</a></li>
                        <li><a href="/index.php/home/type/index"><i class="icon-font">&#xe037;</i>种类管理</a></li>
                        <li><a href="/index.php/home/type/insert"><i class="icon-font">&#xe017;</i>种类添加</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/dingdan/unsend"><i class="icon-font">&#xe005;</i>未发货订单</a></li>
                        <li><a href="/index.php/home/dingdan/send"><i class="icon-font">&#xe008;</i>已发货订单</a></li>
                        <li><a href="/index.php/home/dingdan/over"><i class="icon-font">&#xe006;</i>已完成订单</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="/index.php/home/shangpin/insert"><i class="icon-font">&#xe008;</i>添加商品</a></li>
                        <li><a href="/index.php/home/shangpin/index"><i class="icon-font">&#xe005;</i>查看商品</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/home/index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/index.php/home/pinpai/index">品牌管理</a><span class="crumb-step">&gt;</span><span>修改商品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/jscss/admin/design/add" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th><i class="require-red">*</i>品牌名称：</th>
                            <td>
                                <i class="require-red">*</i>韩束
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>品牌商标：</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>品牌简介：</th>
                            <td>
                                布局护肤品、面膜、男士、母婴、高端洗护、彩妆等品类
                            </td>
                        </tr>
                        <tr>
                            <th>品牌详情：</th>
                            <td>
                                目前韩束推出红CC，韩束巨补水，韩束巨水光等冥想产品，它们都得到市场和消费者的一致好评，并拥有林志玲、郭采洁、古力娜扎等一线明星的加盟
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                   <a href="/index.php/home/pinpai/index"><input class="btn btn6" value="提交" type="button"></a>
                                   <a href="/index.php/home/pinpai/index"><input class="btn btn6" value="返回" type="button"></a>
                                </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>