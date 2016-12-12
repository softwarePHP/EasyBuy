<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>地址管理</title>
	<style>
		#center{ margin:0 auto;}
		/* css注释：为了观察效果设置宽度 边框 高度等样式 */
	</style>
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
					<li class="text"><a href="/SWIM/index.php/home/index/login"><?php echo ($user); ?></a></li>
					<li><div class="cart box_1">
						<a href="checkout.html">
							<span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
						<div class="clearfix"> </div>
					</div></li>
					<li class="text"><a href="/SWIM/index.php/home/index/logout"><?php echo ($logout); ?></a></li>

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
						<h1 class="navbar-brand"><a  href="index.html">Easy Buy</a></h1>
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
			<script src="js/classie.js"></script>
			<script src="js/uisearch.js"></script>
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
										地址管理
									</h1>
									<font size="5px" color = "red">|</font><font size="4px" >现有收货地址（最多可保存9个地址）</font>
									<a id="modal-258968" href="#modal-container-258968" role="button" class="btn" data-toggle="modal"><button class="btn btn-default" type="button" >+</button></a>
								</div>
								<br/>
								<?php if(is_array($adress)): foreach($adress as $key=>$vo): ?><div style="height:220px;" class="col-md-4 column">
									<address >
										<hr style="height:1px;border:none;border-top:1px solid #555555;" />
										<strong>收货人：</strong><?php echo ($vo["name"]); ?><br />
										<strong>收货地址：</strong><?php echo ($vo["adress"]); ?><br />
										<strong>联系电话：</strong><?php echo ($vo["tel"]); ?><br />
				
										<hr style="height:1px;border:none;border-top:1px solid #555555;" />
										<a id="modal-28949579" href="#modal-container-28949579" role="button" class="btn" data-toggle="modal"><button class="btn btn-default" type="button" >编辑</button></a>
										<button class="btn btn-default" type="button"><a href = "/SWIM/index.php/home/Personal/delete/adressid/<?php echo ($vo["adressid"]); ?>">删除</a></button>
									</address>
								</div>
								
							</div>
						</div>
					</div><?php endforeach; endif; ?>
					<!--我写的结束-->
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
     <!--编辑弹框开始-->
     <div class="modal fade" id="modal-container-28949579" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <form action="/SWIM/index.php/home/personal/update" method="post">
     	

		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">
						地址管理
					</h4>
				</div>
				<div class="modal-body">
					收货人姓名：<input type="text" name="name" value="<?php echo ($vo["name"]); ?>"><br/>
					<input type="hidden" name="adressid" value="<?php echo ($vo["adressid"]); ?>" />
					收货地址&nbsp&nbsp&nbsp&nbsp：<input type="text" name="adress" value="<?php echo ($vo["adress"]); ?>"><br/>
					联系电话&nbsp&nbsp&nbsp&nbsp：<input type="text" name="tel" value="<?php echo ($vo["tel"]); ?>"><br/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="submit" class="btn btn-primary">保存</button>
				</div>
			</div>

		</div>
	</form>>
	</div>


	<!--弹框开始-->
	 <div class="modal fade" id="modal-container-258968" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	 <form action="/SWIM/index.php/home/personal/add" method="post" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">
						地址管理</h4></div>
				<div class="modal-body">
					<th>姓名：</th>
                                <td><input class="common-text" name="name" size="10" value='' type="text"></td>
					<th>收货地址：</th>
                                <td><input class="common-text" name="adress" size="10" value='' type="text"></td>
					<th>联系电话：</th>
                                <td><input class="common-text" name="tel" size="10" value='' type="text"></td>
                                <input type="hidden" value="12"  name="userid" />
				</div>
				<div class="modal-footer">
                                   <input class="btn btn6" value="提交" type="submit">
                                   <a href="/SWIM/index.php/home/personal/addressManagement"><input class="btn btn6" value="返回" type="button"></a>
				</div>
			</div>

		</div>
   </form>
	</div>
	<!--弹框结束-->






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