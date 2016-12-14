<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>Personal Center</title>
	<link href="/SWIM/Public/home/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="/SWIM/Public/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/SWIM/Public/home/css/owl.carousel.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Swim Wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="/SWIM/Public/home/js/jquery.min.js"></script>
	<link href="/SWIM/Public/home/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="/SWIM/Public/home/js/megamenu.js"></script>
	<!--<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>-->
	<!-- cart -->
	<script src="/SWIM/Public/home/js/simpleCart.min.js"> </script>
	<!-- cart -->
	<script type="text/javascript" src="/SWIM/Public/home/js/bootstrap-3.1.1.min.js"></script>
	<script src="/SWIM/Public/home/js/imagezoom.js"></script>

	<!-- FlexSlider -->
	<script defer src="/SWIM/Public/home/js/jquery.flexslider.js"></script>
	<link rel="stylesheet" href="/SWIM/Public/home/css/flexslider.css" type="text/css" media="screen" />

	<script>
		// Can also be used with $(document).ready()
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>



</head>
<body>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="lang_list">
			</div>
			<div class="top-right">
				<ul>
					<li class="text"><a href="/SWIM/index.php/home/index/login">登录</a>
					<li><div class="cart box_1">
						<a href="/SWIM/index.php/home/order/checkout">
							<span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">清空购物车</a></p>
						<div class="clearfix"> </div>
					</div></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="header-bottom">
		<div class="container">
			<!--/.content-->
			<div class="content white">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1 class="navbar-brand"><a  href="/SWIM/index.php/home/index/index">Easy Buy</a></h1>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="index.html">主页</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">女士<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<?php if(is_array($women)): $i = 0; $__LIST__ = $women;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<!--<li><a class="list" href="products.html">女士</a></li>-->
													<li><a class="list1" href="/SWIM/index.php/home/products/select/grandname/<?php echo ($vo["grandname"]); ?>"><?php echo ($vo["grandname"]); ?></a></li>
												</ul>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">男士 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-2">
									<div class="row">
										<?php if(is_array($men)): $i = 0; $__LIST__ = $men;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-4">
												<ul class="multi-column-dropdown">
													<!--<li><a class="list" href="products.html">女士</a></li>-->
													<li><a class="list1" href="/SWIM/index.php/home/products/select/grandname/<?php echo ($vo["grandname"]); ?>"><?php echo ($vo["grandname"]); ?></a></li>
												</ul>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">儿童 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-1">
									<div class="row">
										<div class="col-sm-1">
											<ul class="multi-column-dropdown">
												<?php if(is_array($children)): $i = 0; $__LIST__ = $children;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/select/grandname/<?php echo ($vo["grandname"]); ?>"><?php echo ($vo["grandname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>

									</div>
								</ul>
							</li>
							<li><a href="products.html">每日精选</a></li>

						</ul>
					</div>
					<!--/.navbar-collapse-->
				</nav>
				<!--/.navbar-->
			</div>
			<div class="search-box">
				<div id="sb-search" class="sb-search">
					<form>
						<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="search" id="search">
						<input class="sb-search-submit" type="submit" value="">
						<span class="sb-icon-search"> </span>
					</form>
				</div>
			</div>

			<!-- search-scripts -->
			<script src="/SWIM/Public/home/js/classie.js"></script>
			<script src="/SWIM/Public/home/js/uisearch.js"></script>
			<script>
				new UISearch( document.getElementById( 'sb-search' ) );
			</script>
			<!-- //search-scripts -->
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--header-->
<div class="content">
	<!--start-contact-->
	<!--contact-->
	<div class="content">
		<div class="contact">
			<div class="container">
				<div class="contact-grids">
					<!--我写的开始-->
					<div class="container">
						<div class="row clearfix">
							<div class="col-md-2 column">
								<div class="panel-group" id="panel-966061">
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-966061" href="#panel-element-295698">我的交易</a>
										</div>
										<div id="panel-element-295698" class="panel-collapse collapse">
											<div class="panel-body">
												<a href = "/SWIM/index.php/home/personal/personalCenter">我的订单</a>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-966061" href="#panel-element-430327">我的账户</a>
										</div>
										<div id="panel-element-430327" class="panel-collapse collapse">
											<div class="panel-body">
												<a href = "/SWIM/index.php/home/personal/addressManagement">地址管理</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-10 column">
								<div >
									<h1>
										我的订单
									</h1>
								</div>
								<br/>
								<div class="btn-group">
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/personalCenter">全部订单</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/pendingPayment">待付款</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/unSend">未发货</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/send">已发货</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/over">已完成</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/canceledOrder">已取消</a></button>
									<button class="btn btn-default" type="button"> <a href="/SWIM/index.php/home/Personal/returned">已退货</a></button>
								</div>
								<table class="table" style ="border:1px solid #CCC;">
								<thead style ="background:#EEE;">
								<tr>
									<th>
										订单信息
									</th>
									<th>
										商品
									</th>
									<th>
										订单金额
									</th>
									<th>
										订单状态
									</th>
									<th>
										操作
									</th>
								</tr>
								</thead>
								<tbody>
								<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($vo["下单时间"]); ?>&nbsp|&nbsp&nbsp<?php echo ($vo["订单号"]); ?></td>
										<td>
											<?php if(is_array($vo["商品详情"])): $i = 0; $__LIST__ = $vo["商品详情"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i; echo ($vos); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
										</td>
										<td><?php echo ($vo["总金额"]); ?></td>
										<td><?php echo ($vo["订单状态"]); ?><br/><a href = "/SWIM/index.php/home/Personal/show?id=<?php echo ($vo["id"]); ?>">查看详情</a></td>
										<td>
											<?php echo ($vo["操作"]); ?>
										</td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								<hr/>
								</tbody>
							</table>
								<div class="list-page"><?php echo ($pages); ?></div>
								<!--<ul class="pagination">
									<li>
										<a href="#">上一页</a>
									</li>
									<li>
										<a href="#">1</a>
									</li>
									<li>
										<a href="#">2</a>
									</li>
									<li>
										<a href="#">3</a>
									</li>
									<li>
										<a href="#">4</a>
									</li>
									<li>
										<a href="#">下一页</a>
									</li>
								</ul>-->
							</div>
						</div>
					</div>






					<!--我写的结束-->
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<!--footer-->
	<div class="footer-section">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-1 footer-grid">
				</div>
				<div class="col-md-2 footer-grid">
					<h4>新手指南</h4>
					<ul>
						<li><a href="products.html">购物流程</a></li>
						<li><a href="#">优惠券规则</a></li>
						<li><a href="#">联系客服</a></li>
						<li><a href="#">常见问题</a></li>

					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>付款方式</h4>
					<ul>
						<li><a href="#">在线支付</a></li>
						<li><a href="#">货到付款</a></li>
						<li><a href="#">钱包支付</a></li>

					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>配送方式</h4>
					<ul>
						<li><a href="#">配送时效及运费</a></li>
						<li><a href="#">验货与签收</a></li>

					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>售后服务</h4>
					<ul>
						<li><a href="#">退货政策</a></li>
						<li><a href="#">退货流程</a></li>
						<li><a href="#">退货方式及时效</a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>部分合作网站</h4>
					<ul>
						<li><a href="www.lancome.com">兰蔻</a></li>
						<li><a href="#">雅诗兰黛</a></li>
						<li><a href="#">百雀羚</a></li>
					</ul>
				</div>
				<div class="col-md-1 footer-grid">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-12 footer-grid1">
				<div class="col-md-5 footer-grid">
				</div>
				<div class="col-md-2 social-icons">
					<a href="#"><i class="icon"></i></a>
					<a href="#"><i class="icon1"></i></a>
					<a href="#"><i class="icon2"></i></a>
					<a href="#"><i class="icon3"></i></a>
					<a href="#"><i class="icon4"></i></a>
					<p>Copyright &copy; 易购商城</p>
				</div>
				<div class="col-md-5 footer-grid">
				</div>
			</div>
		</div>
	</div>
	<!--footer-->

</body>
</html>