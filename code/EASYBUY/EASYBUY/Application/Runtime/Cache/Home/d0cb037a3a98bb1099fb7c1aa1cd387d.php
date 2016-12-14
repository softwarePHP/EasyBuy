<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>Account</title>
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
	<!--新添-->
	<script src="/SWIM/Public/home/js/verify1.js"></script>

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
					<select tabindex="4" class="dropdown1">
						<option value="" class="label" value="">中文</option>
						<option value="1">英文</option>
						<option value="2">法语</option>
						<option value="3">德语</option>
					</select>
   			</div>
				<div class="top-right">
				<ul>
					<li class="text"><a href="login.html">登录</a>
					<li><div class="cart box_1">
							<a href="checkout.html">
								 <span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
							</a>	
							<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
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
				<!-- registration -->
				<div class="main-1">
					<div class="container">
						<div class="register">
							<form action="/SWIM/index.php/home/user/add" method="post">
								<div class="register-bottom-grid">
									<h3>注册信息</h3>

									<div class="wow fadeInLeft" data-wow-delay="0.4s">
										<span>用户名<label>*</label></span>
										<input type="text" name="username" id="username">
										<div id="username_msg" class="fl">5-25个字符，由中文(一个汉字为两个字符)、字母、数字组成</div>
									</div>
									<div class="wow fadeInLeft" data-wow-delay="0.4s">
										<span>登录密码<label>*</label></span>
										<input type="text" name="userpswd" id="userpswd">
										<div  id="userpswd_msg" class="fl"></div>
									</div>
									<div class="wow fadeInRight" data-wow-delay="0.4s">
										<span>确认密码<label>*</label></span>
										<input type="text" name="repswd" id="repswd">
										<div  id="repswd_msg" class="fl"></div>
									</div>
									<div class="phone">当您忘记密码时,希望通过您的手机号进行验证</div>
									<div class="phone">&nbsp;</div>
									<div class="wow fadeInLeft" data-wow-delay="0.4s">
										<span>手机号码</span>
										<input type="text" name="phone" id="phone">
										<div  id="phone_msg" class="fl"></div>
									</div>
								</div>

							<div class="clearfix"> </div>
							<div class="register-but">

									<input type="submit" value="提交">
									<div class="clearfix"> </div>

							</div>
					</form>	</div>
					</div>
				</div>

<!-- registration -->
				<div class="subscribe">
					<div class="container">
						<div class="subscribe1">
							<h4>最新的化妆品信息</h4>
						</div>
						<div class="subscribe2">
							<form>
								<input type="text" class="text" value="电子邮件地址" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email';}">
								<input type="submit" value="加入我们">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

	<!--footer-->
	<div class="footer-section">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-2 footer-grid">
					<h4>公司</h4>
					<ul>
						<li><a href="products.html">产品</a></li>
						<li><a href="#">来这里工作</a></li>
						<li><a href="#">团队</a></li>
						<li><a href="#">事件</a></li>
						<li><a href="#">经销商定位器</a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>服务</h4>
					<ul>
						<li><a href="#">支持</a></li>
						<li><a href="#">产检问题解答</a></li>
						<li><a href="#">保修</a></li>
						<li><a href="contact.html">联系我们</a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>秩序 & 回报</h4>
					<ul>
						<li><a href="#">订单状态</a></li>
						<li><a href="#">航运政策</a></li>
						<li><a href="#">退货政策</a></li>
						<li><a href="#">电子商务卡</a></li>
					</ul>
				</div>
				<div class="col-md-2 footer-grid">
					<h4>法律</h4>
					<ul>
						<li><a href="#">隐私声明</a></li>
						<li><a href="#">条款和条件</a></li>
						<li><a href="#">社会责任</a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-grid1">
					<div class="social-icons">
						<a href="#"><i class="icon"></i></a>
						<a href="#"><i class="icon1"></i></a>
						<a href="#"><i class="icon2"></i></a>
						<a href="#"><i class="icon3"></i></a>
						<a href="#"><i class="icon4"></i></a>
					</div>
					<p>Copyright &copy; 2015.Company name All rights reserved.<a target="_blank" href="http://www.mycodes.net/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-->
</body>
</html>