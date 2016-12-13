<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title>订单</title>
    <link rel="stylesheet" href="/SWIM/Public/home/css/tasp.css" />
    <link href="/SWIM/Public/home/css/orderconfirm.css" rel="stylesheet" />


    <link href="/SWIM/Public/home/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/SWIM/Public/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/SWIM/Public/home/css/owl.carousel.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Swim Wear Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="/SWIM/Public/home/js/jquery.min.js"></script>
    <script type="text/javascript" src="/SWIM/Public/home/js/bootstrap-3.1.1.min.js"></script>
    <!-- cart -->
    <script src="/SWIM/Public/home/js/simpleCart.min.js"> </script>
    <!-- cart -->
    <!--地址转换-->
    <script src="/SWIM/Public/home/js/address.js"> </script>
    <!-- the jScrollPane script -->
    <script type="text/javascript" src="/SWIM/Public/home/js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" id="sourcecode">
        $(function()
        {
            $('.scroll-pane').jScrollPane();
        });
    </script>
    <!-- //the jScrollPane script -->
    <link href="/SWIM/Public/home/css/form.css" rel="stylesheet" type="text/css" media="all" />
    <!-- the mousewheel plugin -->
    <script type="text/javascript" src="/SWIM/Public/home/js/jquery.mousewheel.js"></script>
    <style>
        #page{width:auto;}
        #comm-header-inner,#content{width:950px;margin:auto;}
        #logo{padding-top:26px;padding-bottom:12px;}
        #header .wrap-box{margin-top:-67px;}
        #logo .logo{position:relative;overflow:hidden;display:inline-block;width:140px;height:35px;font-size:35px;line-height:35px;color:#f40;}
        #logo .logo .i{position:absolute;width:140px;height:35px;top:0;left:0;background:url(http://a.tbcdn.cn/tbsp/img/header/logo.png);}
    </style>

</head>
<body data-spm="1">

<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="top-right">
                <ul>
                    <li class="text"><a href="login.html">登录</a>
                    <li class="text"><a href="login.html">退出</a>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <script type="text/javascript" src='/SWIM/Public/home/js/jquery-1.7.1.min.js'></script>
    <script type="text/javascript">
        $(function() {
            setTimeout("changeDivStyle();", 100); // 0.1秒后展示结果，因为HTML加载顺序，先加载脚本+样式，再加载body内容。所以加个延时
        });
        function changeDivStyle(){
//		var o_status = $("#o_status").val();	//获取隐藏框值
            var o_status = 3;
            if(o_status==0){
                $('#create').css('background', '#DD0000');
                $('#createText').css('color', '#DD0000');
            }else if(o_status==1||o_status==2){
                $('#check').css('background', '#DD0000');
                $('#checkText').css('color', '#DD0000');
            }else if(o_status==3){
                $('#produce').css('background', '#DD0000');
                $('#produceText').css('color', '#DD0000');
            }else if(o_status==4){
                $('#delivery').css('background', '#DD0000');
                $('#deliveryText').css('color', '#DD0000');
            }else if(o_status>=5){
                $('#received').css('background', '#DD0000');
                $('#receivedText').css('color', '#DD0000');
            }
        }
    </script>

    <style type="text/css">
        *{margin:0;padding:0;list-style-type:none;}
        a,img{border:0;}
        body{background:#f2f2f2;font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
        /* stepInfo
            border-radius：0为正方形，0~N，由正方形向圆形转化，N越大越圆。
            padding：图形的内边距
            background：图形背景色
            text-align：文本对齐
            line-height：行高
            color：文字颜色
            position：定位
            width：宽度
            height：高度
        */
        .stepInfo{position:relative;background:#f2f2f2;margin:20px auto 0 auto;width:500px;}
        .stepInfo li{float:left;width:48%;height:0.15em;background:#bbb;}
        .stepIco{border-radius:1em;padding:0.03em;background:#bbb;text-align:center;line-height:1.5em;color:#fff; position:absolute;width:1.4em;height:1.4em;}
        .stepIco1{top:-0.7em;left:-1%;}
        .stepIco2{top:-0.7em;left:21%;}
        .stepIco3{top:-0.7em;left:46%;}
        .stepIco4{top:-0.7em;left:71%;}
        .stepIco5{top:-0.7em;left:95%;}
        .stepText{color:#666;margin-top:0.2em;width:4em;text-align:center;margin-left:-1.4em;}
    </style>

    <input type="hidden" value=${detailorder.status } id="o_status" /><!--后台传到页面的数据-->

    <div class="stepInfo">
        <ul>
            <li></li>
            <li></li>
        </ul>
        <div class="stepIco stepIco1" id="create">1
            <div class="stepText" id="createText">加入购物车</div>
        </div>
        <div class="stepIco stepIco2" id="check">2
            <div class="stepText" id="checkText">审核订单</div>
        </div>
        <div class="stepIco stepIco3" id="produce">3
            <div class="stepText" id="produceText">订单详情</div>
        </div>
        <div class="stepIco stepIco4" id="delivery">4
            <div class="stepText" id="deliveryText">付款</div>
        </div>
        <div class="stepIco stepIco5" id="received">5
            <div class="stepText" id="receivedText">付款成功</div>
        </div>
    </div>
    <div style="text-align:center;margin:120px 0; font:normal 14px/24px 'MicroSoft YaHei';clear:both;">
        <div id="page">

            <div id="content" class="grid-c">

                <div id="address" class="address" style="margin-top: 20px;" data-spm="2">
                    <form name="addrForm" id="addrForm" action="#">
                        <h3>确认收货地址
                            <span class="manage-address">
 <a href="/SWIM/index.php/home/personal/addressManagement" target="_blank" title="管理我的收货地址"
    class="J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.7">管理收货地址</a>
 </span>
                        </h3>

                        <ul id="address-list" class="address-list">
                            <!--地址管理部分-->
                            <?php if(is_array($values)): $i = 0; $__LIST__ = $values;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li class="J_Addr J_MakePoint clearfix  J_DefaultAddr "  data-point-url="http://log.mmstat.com/buy.1.20">
                                <s class="J_Marker marker"></s>
                                <span class="marker-tip">寄送至</span>
                                <div class="address-info">
                                    <a href="#" class="J_Modify modify J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.21">修改本地址</a>
                                    <input name="address"
                                           class="J_MakePoint "
                                           type="radio"
                                           value="674944241"
                                           id="adress"
                                           data-point-url="http://log.mmstat.com/buy.1.20"
                                           ah:params="id=674944241^^stationId=0^^address=湖北民族学院（信息工程学院）  男生宿舍楼5栋102^^postCode=445000^^addressee=朱万雄^^phone=^^mobile=18727717260^^areaCode=422801"
                                           checked="checked" >
                                    <label  class="user-address">
                                        <><?php echo ($value["adress"]); ?>&nbsp;&nbsp;<?php echo ($value["username"]); ?>（收） <em>电话&nbsp;<?php echo ($value["tel"]); ?></em>
                                    </label>
                                    <em class="tip" style="display: none">默认地址</em>
                                    <a class="J_DefaultHandle set-default J_MakePoint" href="/auction/update_address_selected_status.htm?addrid=674944241" style="display: none" data-point-url="http://log.mmstat.com/buy.1.18">设置为默认收货地址</a>
                                </div>
                            </li>
                            <!--<li class="J_Addr J_MakePoint clearfix"
                                data-point-url="http://log.mmstat.com/buy.1.20" >
                                <s class="J_Marker marker"></s>
                                <span class="marker-tip">寄送至</span>
                                <div class="address-info">
                                    <a href="#" class="J_Modify modify J_MakePoint" data-point-url="#">修改本地址</a>
                                    <input name="address"
                                           class="J_MakePoint"
                                           type="radio"
                                           value="594209677"
                                           id="addrId_594209677"
                                           data-point-url="#"
                                           ah:params="#"
                                    >
                                    <label for="addrId_594209677" class="user-address">
                                        湖北省 恩施土家族苗族自治州 恩施市 某某某 (某某某 收) <em>1342407681</em></label><em class="tip" style="display: none">默认地址</em>
                                    <a class="J_DefaultHandle set-default J_MakePoint" style="display: none" data-point-url="#" href="#">设置为默认收货地址</a>
                                </div>
                            </li>--><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

                        <ul id="J_MoreAddress" class="address-list hidden">

                        </ul>

                        <div class="address-bar">
                            <a href="#" class="new J_MakePoint" id="J_NewAddressBtn">使用新地址</a>

                        </div>

                    </form>
                </div>
                <form id="J_Form" name="J_Form" action="/auction/order/unity_order_confirm.htm" method="post">
                    <input name='_tb_token_' type='hidden' value='IZpONoL2bm'>
                    <input type="hidden" name="action" value="order/confirmOrderAction" />
                    <input type="hidden" name="event_submit_do_confirm" value="1" />
                    <input type="hidden" id="J_InsuranceDatas" name="insurance_datas" value="" />
                    <input type="hidden" id="J_InsuranceParamCheck" name="insurance_param_check" value="" />
                    <input type="hidden" name="" id="J_checkCodeUrl" value="/auction/order/check_code.htm"/>
                    <input type="hidden"   name="need_not_split_sellers"  value="" />
                    <input type="hidden"   name="from"  value="cart" />
                    <input type="hidden"   name="cnData"  value="" />
                    <input type="hidden"   name="shop_id"  value="0"  class="J_FareParam" />
                    <input type="hidden"   name="cartShareTag"  value="" />
                    <input type="hidden"   name="flushingPictureServiceId"  value="" />
                    <input type="hidden"  id="J_channelUrl"   name="channel"  value="no-detail"  class="J_FareParam" />
                    <input type="hidden"   name="cinema_id"  value="" />
                    <input type="hidden"  id="item"   name="item"  value="35612993875_19614514619_1_31175333266_1704508670_0_0_0_cartCreateTime~1380269540000" />
                    <input type="hidden"  id="cartId"   name="cartId"  value="35612993875" />
                    <input type="hidden"  id="verticalParams"   name="verticalParams"  value="" />
                    <input type="hidden"   name="cross_shop_ids"  value="" />
                    <input type="hidden"   name="tmall_cross_shop_ids"  value="NULL" />
                    <input type="hidden"   name="buyer_from"  value="cart"  class="J_FareParam" />
                    <input type="hidden"   name="tbsc_channel_id"  value="0" />
                    <input type="hidden"   name="checkCodeIds"  value="35612993875_19614514619_1_31175333266_1704508670_0_0_0_cartCreateTime~1380269540000" />
                    <input type="hidden"  id="J_OrderInfoString"   name="orderInfoString"  value="1704508670:2:19614514619:31175333266:" />
                    <input type="hidden"  id="J_OrderInfoStringForCod"   name="orderInfoStringForCod"  value="1704508670_2,19614514619:31175333266:35612993875" />
                    <input type="hidden"   name="encryptString"  value="0A04F3D8F7EEDC813AFF8711BE47B9E5E96F6E86A391A4C2" />
                    <input type="hidden"   name="secondDivisionCode"  value="422801" />
                    <input type="hidden"   name="use_cod"  value="false"  class="J_FareParam" />
                    <input type="hidden"   name="1704508670:2|seq"  value="b_47285539868" />
                    <input type="hidden"   name="n_area"  value="422801" />
                    <input type="hidden"   name="n_city"  value="422800" />
                    <input type="hidden"   name="n_prov"  value="420000" />
                    <input type="hidden"   name="n_state"  value="0" />
                    <input type="hidden"   name="n_country"  value="1" />
                    <input type="hidden"  id="defaultId"   name="defaultId"  value="674944241" />
                    <input type="hidden"   name="postCode"  value="445000" />
                    <input type="hidden"   name="deliverAddr"  value="湖北民族学院（信息工程学院）  男生宿舍楼5栋102" />
                    <input type="hidden"   name="addressId"  value="674944241" />
                    <input type="hidden"   name="deliverMobile"  value="18727717260" />
                    <input type="hidden"   name="deliverName"  value="朱万雄" />
                    <input type="hidden"   name="deliverPhone"  value="" />
                    <input type="hidden"  id="divisionCode"   name="divisionCode"  value="422801" />
                    <input type="hidden"  id="J_CodAction"   name="CodAction"  value="http://delivery.taobao.com/cod/cod_payway.htm" />
                    <input type="hidden"  id="event_submit_do_cod_switcher"   name="event_submit_do_cod_switcher"  value="1" />
                    <input type="hidden"  id="J_CodActionNew"   name="CodActionNew"  value="cod/codOrder_switcher_action" />
                    <input type="hidden"   name="guest_buyer"  value="false" />
                    <input type="hidden" id="J_sid" name="sid" value="32457704949"/>
                    <input type="hidden" id="J_gmtCreate" name="gmtCreate" value="1380270550897"/>
                    <input type="hidden" name="secStrNoCCode" value="6dd2fa5d614e2ced1d3189b0c2da09c0"/>

                    <input type="hidden" id="J_TransferWarehouseId" name="overseasWarehouseId" value="" />
                    <input type="hidden" id="J_TransferWarehouseDivisionId" name="overseasWarehouseDivisionId" value="" />

                    <input type="hidden" id="paramString" value="tuan_type=0&use_cod=false&shop_id=0&item=35612993875_19614514619_1_31175333266_1704508670_0_0_0_cartCreateTime~1380269540000&buyer_from=cart&isRepost=true&"/>
                    <input type="hidden" id="J_StepPayData" value='""'/>

                    <input type="hidden" name="unity" value="1" />

                    <input type="hidden" name="buytraceid" value="" />
                    <input type="hidden" name="activity" value="" />
                    <input type="hidden" name="bankfrom" value="" />
                    <input type="hidden" name="yfx315" value="" />

                    <input type="hidden" id="J_channelUrl" name="channel" value="no-detail" class="J_FareParam"/>
                    <input type="hidden" id="J_actId" name="actId" value="" />
                    <input type="hidden" name="etkv" value=""/>
                    <input type="hidden" name="havePremium" value="false" />
                    <input type="hidden" name="cartShareTag" value="" />
                    <input type="hidden" name="flushingPictureServiceId" value="" />
                    <div>
                        <h3 class="dib">确认订单信息</h3>
                        <table cellspacing="0" cellpadding="0" class="order-table" id="J_OrderTable" summary="统一下单订单信息区域">
                            <caption style="display: none">统一下单订单信息区域</caption>
                            <thead>
                            <tr>
                                <th class="s-title">店铺宝贝<hr/></th>
                                <th class="s-price">单价(元)<hr/></th>
                                <th class="s-amount">数量<hr/></th>
                                <th class="s-agio">优惠方式(元)<hr/></th>
                                <th class="s-total">小计(元)<hr/></th>
                            </tr>
                            </thead>

<!--订单信息部分-->
<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tbody data-spm="3" class="J_Shop" data-tbcbid="0" data-outorderid="47285539868"  data-isb2c="false" data-postMode="2" data-sellerid="1704508670">
                            <tr class="first"><td colspan="5"></td></tr>

                            <tr class="item" data-lineid="19614514619:31175333266:35612993875" data-pointRate="0">
                                <td class="s-title">
                                    <a href="#" target="_blank" title="Huawei/华为 G520新款双卡双待安卓系统智能手机4.5寸四核手手机" class="J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5">
                                        <img src="/SWIM/<?php echo ($vo["imageurl"]); ?>" class="itempic"><span class="title J_MakePoint" data-point-url="http://log.mmstat.com/buy.1.5"><?php echo ($vo["goodname"]); ?></span></a>

                                    <div class="props">
                                        <span>品牌: <?php echo ($vo["mark1"]); ?> </span>
                                        <span>种类: <?php echo ($vo["mark2"]); ?> </span>
                                        <span>规格：<?php echo ($vo["spec"]); ?> </span>
                                    </div>

                                    <div>
                                        <span style="color:gray;">卖家承诺72小时内发货</span>
                                    </div>
                                </td>
                                <td class="s-price">

  <span class='price '>
 <em class="style-normal-small-black J_ItemPrice"  >￥<?php echo ($vo["goodprice"]); ?></em>
  </span>
                                    <input type="hidden" name="costprice" value="$vo.goodprice" class="J_CostPrice" />
                                </td>
                                <td class="s-amount" data-point-url="">
                                    <input type="hidden" class="J_Quantity" value="1" name="19614514619_31175333266_35612993875_quantity"/><?php echo ($vo["shopcount"]); ?>

                                </td>
                                <td class="s-agio">
                                    <div class="J_Promotion promotion" data-point-url=""><?php echo ($vo["discount"]); ?>%</div>
                                </td>
                                <td class="s-total">

   <span class='price '>
 <em class="style-normal-bold-red J_ItemTotal "  ><?php echo ($vo["total"]); ?></em>
  </span>
                                    <input id="furniture_service_list_b_47285539868" type="hidden" name="furniture_service_list_b_47285539868"/>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            <tr class="shop-total blue-line">
                                <td colspan="5">店铺合计(<span class="J_Exclude" style="display: none">不</span>含运费<span class="J_ServiceText" style="display: none">，服务费</span>)：
                                    <span class='price g_price '>
 <span>&yen;</span><em class="style-middle-bold-red J_ShopTotal"  ><?php echo ($vo["total"]); ?>.00</em>
  </span>
                                    <input type="hidden" name="1704508670:2|creditcard" value="false" />
                                    <input type="hidden" id="J_IsLadderGroup" name="isLadderGroup" value="false"/>

                                </td>
                            </tr>
                            </tbody>

                            <tr>
                                <td colspan="5">

                                    <div class="order-go" data-spm="4">
                                        <div class="J_AddressConfirm address-confirm">
                                            <div class="kd-popup pop-back" style="margin-bottom: 40px;">
                                                <div class="box">
                                                    <div class="bd">
                                                        <div class="point-in">

                                                            <em class="t">实付款：</em>  <span class='price g_price '>
 <span>&yen;</span><em class="style-large-bold-red"  id="J_ActualFee"  ><?php echo ($vo["total"]); ?>.00</em>
  </span>
                                                        </div>

                                                        <ul>
                                                            <li><em>收货地址:<div name="'as"></div></em><span id="J_AddrConfirm" style="word-break: break-all;">
   <?php echo ($value[0]["adress"]); ?>
   </span></li>
                                                            <li><em>收货人:</em><span id="J_AddrNameConfirm"><?php echo ($value["username"]); ?> <?php echo ($value["tel"]); ?> </span></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <a href = "/SWIM/index.php/home/order/payment/shopid/<?php echo ($vo["shopid"]); ?>" id="J_Go" class=" btn-go"  data-point-url="/SWIM/index.php/home/index/login"  tabindex="0" title="点击此按钮，提交订单。">提交订单<b class="dpl-button"></b></a>
                                            </div>
                                        </div>

                                        <div class="J_confirmError confirm-error">
                                            <div class="msg J_shopPointError" style="display: none;"><p class="error">积分点数必须为大于0的整数</p></div>
                                        </div>



                                    </div>
                                </td>
                            </tr>

                        </table>
                    </div>，

                    <input type="hidden" id="J_useSelfCarry" name="useSelfCarry" value="false" />
                    <input type="hidden" id="J_selfCarryStationId" name="selfCarryStationId" value="0" />
                    <input type="hidden" id="J_useMDZT" name="useMDZT" value="false" />
                    <input type="hidden" name="useNewSplit" value="true" />
                    <input type="hidden" id="J_sellerIds" name="allSellIds" value="1704508670" />
                </form>
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