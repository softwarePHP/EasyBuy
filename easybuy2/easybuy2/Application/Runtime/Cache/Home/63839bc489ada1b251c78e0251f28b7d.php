<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<title>【商品详情页】</title>
	<link href="/SWIM/Public/home/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="/SWIM/Public/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/SWIM/Public/home/css/owl.carousel.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Swim Wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="/SWIM/Public/home/js/jquery.min.js"></script>

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

			<div class="top-right">
				<ul>
					<li class="text"><a href="/SWIM/index.php/home/index/login"><?php echo ($user); ?></a>
					<li><div class="cart box_1">
						<a href="/SWIM/index.php/home/order/checkout">
							<span class="simpleCart_total"> ￥0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>)
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">清空购物车</a></p>
						<div class="clearfix"> </div>
					<li class="text"><a href="/SWIM/index.php/home/index/logout"><?php echo ($logout); ?></a></li>
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
							<li><a href="/SWIM/index.php/home/index/index">主页</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">女士<b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-3">
									<div class="row">
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<!--<li><a class="list" href="products.html">女士</a></li>-->
												<li><a class="list1" href="/SWIM/index.php/home/products/index">兰蔻(lancome)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">资生堂(shiseido)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">雅诗兰黛(estee lauder)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">迪奥(dior)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">香奈儿(chanel)</a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">
												<!--<li><a class="list" href="products.html">男士</a></li>-->
												<li><a class="list1" href="/SWIM/index.php/home/products/index">碧欧泉(biotherm)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">赫莲娜(hr)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">伊丽莎白·雅顿(ea)</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">百雀羚</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index"> </a></li>
											</ul>
										</div>
										<div class="col-sm-4">
											<ul class="multi-column-dropdown">

												<li><a class="list1" href="/SWIM/index.php/home/products/index">温碧泉</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">植美村</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">相宜本草</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">欧莱雅</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">丸美</a></li>
											</ul>
										</div>
									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">男士 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-2">
									<div class="row">
										<div class="col-sm-5">
											<ul class="multi-column-dropdown">
												<li><a class="list1" href="/SWIM/index.php/home/products/index">碧欧泉</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">娇韵诗</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">兰蔻</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">欧珀莱</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">资生堂</a></li>
											</ul>
										</div>
										<div class="col-sm-5">
											<ul class="multi-column-dropdown">
												<li><a class="list1" href="/SWIM/index.php/home/products/index">倩碧</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">阿迪达斯</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">雅男士</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index">杰士派</a></li>
												<li><a class="list1" href="/SWIM/index.php/home/products/index/SWIM/index.php/home/products/index">高夫</a></li>
											</ul>
										</div>

									</div>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">儿童 <b class="caret"></b></a>
								<ul class="dropdown-menu multi-column columns-1">
									<div class="row">
										<div class="col-sm-1">
											<ul class="multi-column-dropdown">
												<li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/index">强生(Johnson)</a></li>
												<li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/index">贝亲(Pigeon)</a></li>
												<li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/index">施巴(Sebamed)</a></li>
												<li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/index">妙思乐(mustela)</a></li>
												<li><a class="list1" style="width:150px;" href="/SWIM/index.php/home/products/index">贝比拉比</a></li>
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
	<div class="single">
		<div class="container">
			<div class="single-grids">
				<div class="col-md-4 single-grid1">
					<h2>常用菜单</h2>
					<ul>
						<li><a href="/SWIM/index.php/home/index/login">登录</a></li>
						<li><a href="/SWIM/index.php/home/index/account">注册</a></li>
						<li><a href="/SWIM/index.php/home/personal/personalCenter">个人账户</a></li>
						<li><a href="/SWIM/index.php/home/personal/addressManagement">地址簿</a></li>
						<li><a href="/SWIM/index.php/home/personal/personalCenter">历史订单</a></li>
						<li><a href="/SWIM/index.php/home/index/index">返回首页</a></li>
					</ul>
				</div>
				<div class="col-md-4 single-grid">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="/SWIM/<?php echo ($good["imageurl"]); ?>">
								<div class="thumb-image"> <img src="/SWIM/<?php echo ($good["imageurl"]); ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 single-grid simpleCart_shelfItem">
					<h3><?php echo ($good["goodname"]); ?></h3>
					<p><?php echo ($good["brief"]); ?></p>
					<div class="galry">
						<div class="prices">
							<h5 class="item_price">￥<?php echo ($good["goodprice"]); ?></h5>
						</div>
						<div class="clearfix"></div>
					</div>
					<p class="qty"> Qty :  </p><input min="1" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">
					<div class="btn_form">
						<a href="/SWIM/index.php/home/goods/checkout/goodid/<?php echo ($good["goodid"]); ?>" class="add-cart item_add">加入购物车</a>
					</div>
					<div class="tag">
						<p>类别 : <?php echo ($good["categoriesname"]); ?></p>
						<p>标签 : <?php echo ($good["mark1"]); ?></p>
					</div>
				</div>

				<div class="clearfix">
					<input type="hidden" name="userid" value="1"/>
				</div>
			</div>
		</div>
	</div>
	<!-- collapse -->
	<div class="collpse">
		<div class="container">
			<div class="panel-group collpse" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								商品详情
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<?php echo ($good["introduction"]); ?>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								商品评价
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFour">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								帮助
							</a>
						</h4>
					</div>
					<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- collapse -->
	<div class="related-products">
		<div class="container">
			<h3>相关产品</h3>
			<div class="product-model-sec single-product-grids">
                <?php if(is_array($likethis)): foreach($likethis as $key=>$vo): ?><div class="product-grid single-product">
					<a href="/SWIM/index.php/home/goods/index/SWIM/index.php/home/goods/index?id=<?php echo ($vo["goodid"]); ?>">
						<div class="more-product"><span> </span></div>
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="/SWIM/<?php echo ($vo["imageurl"]); ?>" class="img-responsive" alt="">
							<div class="b-wrapper">
								<h4 class="b-animate b-from-left  b-delay03">
									<button> + </button>
								</h4>
							</div>
						</div>
					</a>
					<div class="product-info simpleCart_shelfItem">
						<div class="product-info-cust prt_name">
							<h4><?php echo ($vo["goodname"]); ?></h4>
							<span class="item_price">￥<?php echo ($vo["goodprice"]); ?></span>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div><?php endforeach; endif; ?>
				<div class="clearfix"> </div>
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