$(function(){
    try{
        function mar(page){
            var config = map[page];
            if(!config){
                return
            }
            for(var i = 0; i < config.length; i++){
                if(config[i]){
                    var ele = $(config[i].ele);
                    if(ele.length > 0){
                        ele.attr('mars_sead',config[i].seed);
                        config.splice(i,1);
                        i--;
                    }
                }
            }

            if(page != '*' && config.length>0){
                setTimeout(function(){
                    mar(page);
                },1000)
            }

        }

        var map = {
            // 全局／顶部
            '*':[
                {ele:'.Chead-info a',seed:'lpc_top_diqu'},
                {ele:'.Chead-welcome a:eq(0)',seed:'lpc_top_name'},
                {ele:'#exit',seed:'lpc_top_el'},
                {ele:'#Chead_myh',seed:'lpc_top_order'},
                {ele:'.Chead-info .Chead-myhome a:eq(1)',seed:'lpc_top_pay'},
                {ele:'.Chead-info .Chead-myhome a:eq(2)',seed:'lpc_top_quan'}
            ],
            'www.lefeng.com':[
                {ele:'#search-submit-t',seed:'lpc_idx_so'},
                {ele:'#search-submit',seed:'lpc_idx_so_b'},
                {ele:'#meizhuangShop a',seed:'lpc_dh_fc_fl'},
                {ele:'.Cnav-one a:eq(0)',seed:'lpc_dh_xstm'},
                {ele:'.Cnav-one a:eq(1)',seed:'lpc_dh_mzsc'},
                {ele:'.Cnav-one a:eq(2)',seed:'lpc_dh_fgqq'},
                {ele:'.first-show a',seed:'lpc_idx_ban'},
                {ele:'#ad-list a',seed:'lpc_idx_pptm'},
                {ele:'.bigimg-box:eq(0) a',seed:'lpc_idx_bkcx'},
                {ele:'.bigimg-box:eq(0) [data-haitao="1"] .joinCar',seed:'lpc_idx_bkcx_gm'},
                {ele:'.bigimg-box:eq(0) [data-haitao="0"] .joinCar',seed:'lpc_idx_bkcx_cart'},
                {ele:'.bigimg-box:eq(1) a',seed:'lpc_idx_zrsx'},
                {ele:'.bigimg-box:eq(1) [data-haitao="1"] .joinCar',seed:'lpc_idx_zrsx_gm'},
                {ele:'.bigimg-box:eq(1) [data-haitao="0"] .joinCar',seed:'lpc_idx_zrsx_cart'},
                {ele:'.floatBtn3',seed:'lpc_idx_xf_pptm'},
                {ele:'.floatBtn4',seed:'lpc_idx_xf_bkcx'},
                {ele:'.floatBtn5',seed:'lpc_idx_xf_zrsx'}

            ],
            'search.lefeng.com':[
                {ele:'.smPruArea:eq(0) .pruwrap',seed:'lpc_ss_sku'},
                {ele:'.joinCar',seed:'lpc_ss_cart'},
                {ele:'.oper-sec-lit',seed:'lpc_ss_ppsx'},
                {ele:'.mod:eq(0)',seed:'lpc_ss_jgsx'},
                {ele:'.nextPageClass',seed:'lpc_ss_fy'},
                {ele:'.smPruArea:eq(1) .pruwrap',seed:'lpc_so_tj_cnxh'}
            ],
            'product.lefeng.com':[
                {ele:'#qianggou',seed:'lpc_sku_cart'},
                {ele:'.down',seed:'lpc_detail'},
                {ele:'#detail-nav>a:eq(1)',seed:'lpc_f-service'},
                {ele:'.sidebar a',seed:'lpc_tj_sku_kim'},
                {ele:'#joinShopping',seed:'lpc_sku_b_cart'}
            ],
            'shopping.lefeng.com':[
                {ele:'.cart-js a',seed:'lpc_xf_buy'},
                {ele:'#settlement',seed:'lpc_xf_cart'},
                {ele:'.box-t .buy>label',seed:'lpc_invoice'},
                {ele:'.pre cf_create_order',seed:'lpc_buy_pay_order'}
            ],
            'pay.lefeng.com':[
                {ele:'.weixin',seed:'lpc_pay_weixin'},
                {ele:'.alipay',seed:'lpc_pay_zhifubao'}
            ],
            'order.lefeng.com':[
                {ele:'#myWallet',seed:'lpc_hy_qb'},
                {ele:'#myCouponCard',seed:'lpc_hy_quan'},
                {ele:'#secretSetting',seed:'lpc_hy_aq'},
                {ele:'#managerAddress',seed:'lpc_hy_dizhi'}
            ]
        };

        var host = location.host;

        var name;
        switch (host){
            case 'www.lefeng.com':
                name = 'lpc_idx_xiala';
            case 'product.lefeng.com':
                if(!name){
                    name = 'lpc_sku_xiala';
                }
            case 'search.lefeng.com':
                if(!name){
                    name = 'lpc_ss_xiala';
                }

                $(window).scroll(function(){
                    var scrollTop = $(this).scrollTop();
                    var scrollHeight = $(document).height();
                    var windowHeight = $(this).height();
                    if(scrollTop + windowHeight >= scrollHeight){
                        Mar.Seed.request('a','click',name);
                    }
                });
        }

        mar('*');
        mar(host);

    }catch(e){
        console && console.log && console.log(e)
    }
});