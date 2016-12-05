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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/home/index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">种类管理</span></div>
        </div>
        <div class="search-wrap">

        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/EASYBUY/index.php/home/type/insert"><i class="icon-font"></i>添加种类</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>

                            <th>ID</th>
                            <th>分类编号</th>
                            <th>种类名</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>

                            <td><?php echo ($vo["categoriesid"]); ?></td>
                            <td><?php echo ($vo["categoriesnum"]); ?></td>
                            <td title="artichoke"><a target="_blank" href="#" title="artichoke"><?php echo ($vo["categoriesname"]); ?></a>
                            <td>
                                <a class="link-delete" href="/EASYBUY/index.php/home/Type/delete?id=<?php echo ($vo["categoriesid"]); ?>">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

                    </table>
                    <div class="list-page"><?php echo ($pages); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>