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
            <div class="crumb-list"><i class="icon-font"></i><a href="/index.php/home/index/index">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">商品查询</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                    <select name="search-sort" id="brand" class="required">
                                    <option value="">品牌选择</option>
                                    <option value="">全部</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                </select>
                                <select name="search-sort" id="catids" class="required">
                                    <option value="">全部</option>
                                    <option value="1">护肤用品</option>
                                    <option value="2">彩妆用品</option>
                                    <option value="3">美容工具</option>
                                    <option value="4">香水香氛</option>
                                    <option value="5">个人护理</option>
                                </select>
                                <select id="catid" class="required">
                                    <option value="">具体选择</option>
                                    <option value="">全部</option>
                                </select>
                                <script type="text/javascript">
                                    var arrType = [];
                                    arrType[1] = [{ t: '全部', id: 0 }, { t: '面膜', id: 1 }, { t: '防晒隔离', id: 2 }, { t: '护肤套装', id: 3}, { t: '洁面', id: 4}, { t: '面部护肤', id: 5}, { t: '眼部护理', id: 6}];
                                    arrType[2] = [{ t: '全部', id: 0 }, { t: '底妆', id: 7 }, { t: '眼妆', id: 8 }, { t: '唇妆', id: 9}, { t: '卸妆', id: 10}, { t: '美甲', id: 11}, { t: '彩妆套装', id: 12}];
                                    arrType[3] = [{ t: '全部', id: 0 }, { t: '美容工具', id: 13 }, { t: '美妆工具', id: 14 }, { t: '美发工具', id: 15}, { t: '美甲工具', id: 16}, { t: '洁面工具', id: 17}, { t: '化妆工具', id: 18}];
                                    arrType[4] = [{ t: '全部', id: 0 }, { t: '香水套装', id: 19 }, { t: '女士香水', id: 20 }, { t: '男士香水', id: 21}, { t: '淡香水', id: 22}, { t: '香氛精油', id: 23}, { t: '走珠香水', id: 24}];
                                    arrType[5] = [{ t: '全部', id: 0 }, { t: '头发护理', id: 25 }, { t: '身体护理', id: 26 }, { t: '口腔护理', id: 27}, { t: '手足护理', id: 28}, { t: '美体瘦身', id: 29}, { t: '胸部护理', id: 30}];
                                    document.getElementById('catids').onchange = function () {
                                        addOptions(document.getElementById('catid'), arrType[this.value]);
                                    }
                                    function addOptions(s, arr, initValue) {
                                        if (!arr || arr.length == 0) arr = [{ t: '具体选择', id: ''}];
                                        if (!s) { alert('select对象不存在！'); return false }
                                        s.options.length = 0;
                                        var selectedIndex = 0;
                                        for (var i = 0; i < arr.length; i++) {
                                            s.options.add(new Option(arr[i].t, arr[i].id));
                                            if (arr[i].id == initValue) selectedIndex = i;
                                        }
                                    }
                                </script>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/index.php/home/shangpin/insert"><i class="icon-font"></i>新增商品</a>
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
                            <th>商品名称</th>
                            <th>商品价格</th>
                            <th>商品品牌ID</th>
                            <th>分类ID</th>
                            <th>商品个数</th>
                            <th>原价</th>
                            <th>折扣后价格</th>
                            <th>商品简介</th>                          
                            <th>操作</th>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>59</td>
                            <td title="发哥经典"><a target="_blank" href="/index.php/home/shangpin/show" title="发哥经典">韩束巨补水墨菊BB霜</a>
                            </td>
                            <td>129</td>
                            <td>7</td>
                            <td>1</td>
                            <td>1</td>
                            <td>139</td>
                            <td>129</td>
                            <td>2</td>
                            <td>
                                <a class="link-update" href="/index.php/home/shangpin/show">详情</a>
                                <a class="link-update" href="/index.php/home/shangpin/revise">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="tc"><input name="id[]" value="58" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="58" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
                            <td>58</td>
                            <td title="黑色经典"><a target="_blank" href="/index.php/home/shangpin/show" title="黑色经典">韩束墨菊咕噜水</a>
                            </td>
                            <td>89</td>
                            <td>4</td>
                            <td>2</td>
                            <td>2</td>
                            <td>109</td>
                            <td>89</td>
                            <td>35</td>
                            <td>
                                <a class="link-update" href="/index.php/home/shangpin/show">详情</a>
                                <a class="link-update" href="/index.php/home/shangpin/revise">修改</a>
                                <a class="link-del" href="#">删除</a>
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