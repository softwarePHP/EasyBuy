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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/home/index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">管理员管理</span></div>
        </div>
        <div class="search-wrap">
           
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/home/admin/insert"><i class="icon-font"></i>添加管理员</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>登录名</th>
                            <th>密码</th>
                            <th>权限</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>59</td>
                            <td title="artichoke"><a target="_blank" href="#" title="artichoke">artichoke</a>
                            </td>
                            <td>18522326169php</td>
                            <td>全部权限</td>
                            <td>2014-03-15 21:11:01</td>
                            <td>
                                 <a class="link-update" href="/index.php/home/admin/view">查看</a>
                                <a class="link-update" href="/index.php/home/admin/update">修改</a>
                                <a class="link-delete" href="/index.php/home/admin/delete">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="58" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="58" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>58</td>
                            <td title="hyacinth"><a target="_blank" href="#" title="hyacinth">hyacinth</a>
                            </td>
                            <td>123456789forever</td>
                            <td>部分权限</td>
                            <td>2016-11-03 22:34:00</td>
                            <td>
                                 <a class="link-update" href="/index.php/home/admin/view">查看</a>
                                <a class="link-update" href="/index.php/home/admin/update">修改</a>
                                <a class="link-delete" href="/index.php/home/admin/delete">删除</a>
                            </td>
                        </tr>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>