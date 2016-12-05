<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/EASYBUY/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/EASYBUY/Public/css/main.css"/>
    <script type="text/javascript" src="/EASYBUY/Public/js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="/EASYBUY/index.php/home/admin/index" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="/EASYBUY/index.php/home/index/index">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li>欢迎您</li>
                <li><a href="/EASYBUY/index.php/home/index/index"><?php echo ($_SESSION['admin']); ?></a></li>
                <li><a href=/EASYBUY/index.php/index.php/home/admin/update">修改密码</a></li>
                <li><a href="/EASYBUY/index.php/home/index/logout">退出</a></li>
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
                        <li><a href="/EASYBUY/index.php/home/order/unsend"><i class="icon-font">&#xe008;</i>未处理订单</a></li>
                        <li><a href="/EASYBUY/index.php/home/goods/insert"><i class="icon-font">&#xe008;</i>添加商品</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>用户管理</a>
                    <ul class="sub-menu">
                        <li><a href="/EASYBUY/index.php/home/user/index"><i class="icon-font">&#xe008;</i>查看用户</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/EASYBUY/index.php/home/admin/index"><i class="icon-font">&#xe018;</i>管理员管理</a>
                    <ul class="sub-menu">
                        <li><a href="/EASYBUY/index.php/home/admin/index"><i class="icon-font">&#xe037;</i>查看管理员</a></li>
                        <li><a href="/EASYBUY/index.php/home/admin/insert"><i class="icon-font">&#xe017;</i>添加管理员</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>分类管理</a>
                    <ul class="sub-menu">
                        <li><a href="/EASYBUY/index.php/home/grands/index"><i class="icon-font">&#xe017;</i>查看品牌</a></li>
                        <li><a href="/EASYBUY/index.php/home/grands/insert"><i class="icon-font">&#xe017;</i>添加品牌</a></li>
                        <li><a href="/EASYBUY/index.php/home/type/index"><i class="icon-font">&#xe037;</i>查看种类</a></li>
                        <li><a href="/EASYBUY/index.php/home/type/insert"><i class="icon-font">&#xe017;</i>添加种类</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="/EASYBUY/index.php/home/order/all"><i class="icon-font">&#xe005;</i>全部订单</a></li>
                        <li><a href="/EASYBUY/index.php/home/order/unsend"><i class="icon-font">&#xe005;</i>未发货订单</a></li>
                        <li><a href="/EASYBUY/index.php/home/order/send"><i class="icon-font">&#xe008;</i>已发货订单</a></li>
                        <li><a href="/EASYBUY/index.php/home/order/over"><i class="icon-font">&#xe006;</i>已完成订单</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                    <ul class="sub-menu">
                        <li><a href="/EASYBUY/index.php/home/goods/index"><i class="icon-font">&#xe005;</i>查看商品</a></li>
                        <li><a href="/EASYBUY/index.php/home/goods/insert"><i class="icon-font">&#xe008;</i>添加商品</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
     <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/EASYBUY/index.php/home/index/index">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/index.php/home/good/index">商品管理</a><span class="crumb-step">&gt;</span><span>修改商品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="/EASYBUY/index.php/home/goods/update" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="g_name" id="brand" class="required">
                                    <?php if(is_array($grands)): $i = 0; $__LIST__ = $grands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gr): $mod = ($i % 2 );++$i; if($gr["grandname"] == $good.grandname): ?><option value="<?php echo ($gr["grandname"]); ?>" selected = "selected"><?php echo ($gr["grandname"]); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($gr["grandname"]); ?>"><?php echo ($gr["grandname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                                <select name="c_name" id="catids" class="required">
                                    <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i; if($ca["categoriesname"] == $good.categoriesname): ?><option value="<?php echo ($ca["categoriesname"]); ?>" selected = "selected"><?php echo ($ca["categoriesname"]); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($ca["categoriesname"]); ?>"><?php echo ($ca["categoriesname"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品名称：</th>
                            <td>
                                <input class="common-text required" id="goodname" name="goodname" size="50" value="<?php echo ($good["goodname"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品价格：</th>
                            <td>
                                <input class="common-text required"  name="goodprice" size="50" value="<?php echo ($good["goodprice"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>商品数量：</th>
                            <td>
                                <input class="common-text required" name="count" size="50" value="<?php echo ($good["count"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>第一标签：</th>
                            <td>
                                <input class="common-text required"  name="mark1" size="50" value="<?php echo ($good["mark1"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require-red">*</i>第二标签：</th>
                            <td>
                                <input class="common-text required"  name="mark2" size="50" value="<?php echo ($good["mark2"]); ?>" type="text">
                            </td>
                        </tr>
                        <tr>
                            <th>商品详情：</th>
                            <td>
                                <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;" rows="10">

                                </textarea>
                            </td>
                        </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="common-text required" id="title" name="goodid" type="hidden" value="<?php echo ($good["goodid"]); ?>"/>
                                    <input class="btn btn6" value="提交" type="submit">
                                    <a class="link-update" href="/EASYBUY/index.php/home/goods/index"><input class="btn btn6" value="返回" type="button"></a>
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>