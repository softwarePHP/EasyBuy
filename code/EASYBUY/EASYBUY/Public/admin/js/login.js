var login = {
	//页面初始化加载页面
	init:function() {
		$("#formSubmit").bind('click',login.doLogin);//绑定登录按钮click
		login.showYZM();//显示图形验证码
		$("#yzmPic").bind('click',login.refreshYzm);//绑定刷新图形页面click
		$("#changeYzm").bind('click',login.refreshYzm);
		login.showErrorMsg();//如果有错误信息，显示错误信息
		login.bindWeixinLogin();//绑定微信联合登陆Click事件
		login.bindSinaLogin();//绑定sina联合登陆
		login.bindQQLogin();//绑定QQ联合登陆
		login.bindLoginNameFcous();//绑定账号框的fcous事件
		login.bindPasswdFcous();//绑定密码框的fcous事件
		login.bindYzmFcous();//绑定短信验证码框的fcous事件

		//绑定回车事件
		$(document).keydown(function(event){
			switch (event.which) {
				case 13:
					$("#formSubmit").click();
				default:
			}
		});
	},
	//校验form表单
	checkForm:function(){
		var loginName = $("#loginName").val();
		var passwd = $("#passwd").val();
		var yzm = $("#yzm").val();
		var isYzmShow = $("#yzmSpan").is(":hidden");
		
		//校验账号为空
		if($.trim(loginName)==""){
			
			login.hideErrorShow("loginNameFlag");//隐藏自己框下的所有提示
			$("#loginNameErrorShow").html("请输入账号");
			$("#loginNameErrorShow").show();//显示提示信息
			$("#loginNameErrorPic").show();//显示提示信息
			
			return false;
		}
		//校验密码为空
		if($.trim(passwd)==""){
			login.hideErrorShow("passwdFlag");//隐藏自己框下的所有提示
			$("#passwdErrorShow").html("请输入密码");
			$("#passwdErrorShow").show();//显示提示信息
			$("#passwdErrorPic").show();//显示提示信息
			
			return false;
		}
		//校验验证码为空
		if(!isYzmShow && $.trim(yzm)==""){
			login.hideErrorShow("yzmFlag");//隐藏自己框下的所有提示
			$("#yzmErrorShow").html("请输入验证码");
			$("#yzmErrorShow").show();//显示提示信息
			$("#yzmErrorPic").show();//显示提示信息
			
			return false;
		}
		
		return true;
	},
	//登录
	doLogin:function(){
		_tag.dcsMultiTrack('wt.s_cart','login');//BI
		if(login.checkForm()){
			LFControl.loading.Start();
			$("#loginform").submit();
		}
	},
	//显示图形验证码
	showYZM:function(){
		var code = $("#code").val();
		//需要图形验证码
		if(code=="50001"){
			$("#yzmSpan").show();
		}
	},
	//刷新验证码
	refreshYzm:function(){
		$.ajax({
			contentType:"application/json",
			type:"get",
			cache:false,
			async: false,
			url:"refreshYzm",
			success: function(data){
				try{
					var jsonData = $.parseJSON(data);
					var code = jsonData.code;
					var msg = jsonData.msg;
					var sessionId = jsonData.sessionId;
					var captchaPic = jsonData.captchaPic;
					
					//需要图形验证码
					if(code=="50001"){
						$("#code").val(code);
						$("#msg").val(msg);
						$("#sessionId").val(sessionId);
						$("#yzmPicImg").attr("src",captchaPic);
						$("#yzmSpan").show();
					}else if(code=="0"){//不需要图形验证码
						$("#code").val(code);
						$("#msg").val(msg);
						$("#sessionId").val(sessionId);
						$("#yzmPicImg").attr("src",captchaPic);
						$("#yzmSpan").hide();
					}else{
						window.location.href="/toError";
					}
				}catch(e){
					window.location.href="/toError";
				}
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
		         alert("error");
		    }
		});
	},
	//显示错误提示信息
	showErrorMsg:function(){
		//判断图形验证码接口是否执行成功
		var code = $("#code").val();
		if(code!="0" && code != "50001"){
			window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+code;
			return;
		}
		
		//提示点击登陆后错误信息提示
		var errorCode = $("#errorCode").val();
		if(errorCode != null && $.trim(errorCode)!=""){
			if($.trim(errorCode)=="90005"){
				//参数不正确，跳转到错误页面
				window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+errorCode+":参数不正确";
				return false;
			}else if($.trim(errorCode)=="90006"){
				//alert("调用api异常");
				window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+errorCode+":调用api异常";
				return false;
			}else if($.trim(errorCode)=="50002"){
				login.hideErrorShow("loginNameFlag");//隐藏自己框下的所有提示
				$("#loginNameErrorShow").html("用户名不存在");
				$("#loginNameErrorShow").show();//显示提示信息
				$("#loginNameErrorPic").show();//显示提示信息
				return false;
			}else if($.trim(errorCode)=="50004"){
				login.hideErrorShow("passwdFlag");//隐藏自己框下的所有提示
				$("#passwdErrorShow").html("用户名或密码有误");
				$("#passwdErrorShow").show();//显示提示信息
				$("#passwdmeErrorPic").show();//显示提示信息
				return false;
			}else if($.trim(errorCode)=="50012"){
				login.hideErrorShow("yzmFlag");//隐藏自己框下的所有提示
				$("#yzmErrorShow").html("验证码错误");
				$("#yzmErrorShow").show();//显示提示信息
				$("#yzmErrorPic").show();//显示提示信息
				return false;
			}else if($.trim(errorCode)=="50014"){
//				alert("第三方类型标识不支持");
//				return false;
				
				window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+errorCode+":第三方类型标识不支持";
				return false;
			}else if($.trim(errorCode)=="50015"){
//				alert("第三方类型未开通");
//				return false;
				window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+errorCode+":第三方类型未开通";
				return false;
			}else{
				//alert("系统错误！");
				window.location.href="/toError?returnUrl="+passCommon.passportLoginUrl+"&errorMsg="+errorCode+":系统错误";
				return false;
			}
		}
	},
	//隐藏所有错误提示
	hideAllErrorShow:function(){
		$(".errorShowFlag").html("");
		$(".errorShowFlag").hide();
	},
	//绑定微信联合登陆
	bindWeixinLogin:function(){
		$("#weiXinLogin").bind('click',function(){
			var returnUrl = $("#returnUrl").val();
			window.location.href="/toWeinxinLogin?returnUrl="+returnUrl;
		});
	},
	//绑定sina联合登陆
	bindSinaLogin:function(){
		$("#sinaLogin").bind('click',function(){
			var returnUrl = $("#returnUrl").val();
			window.location.href="/toSinaLogin?returnUrl="+returnUrl;
		});
	},
	//绑定QQ联合登陆
	bindQQLogin:function(){
		$("#qqLogin").bind('click',function(){
			var returnUrl = $("#returnUrl").val();
			window.location.href="/toQQLogin?returnUrl="+returnUrl;
		});
	},
	//绑定账号框的fcous事件
	bindLoginNameFcous:function(){
		$("#loginName").focus(function(){
			login.hideErrorShow("loginNameFlag");//隐藏自己框下的所有提示
			$(".successShowFlag").hide();//所有的成功提示隐藏
			$("#loginNameSuccessShow").html("请输入账号");
			$("#loginNameSuccessShow").show();//显示提示信息
			
		});
	},
	//绑定密码框的fcous事件
	bindPasswdFcous:function(){
		$("#passwd").focus(function(){
			login.hideErrorShow("passwdFlag");//隐藏自己框下的所有提示
			$(".successShowFlag").hide();//所有的成功提示隐藏
			$("#passwdSuccessShow").html("请输入密码");
			$("#passwdSuccessShow").show();//显示提示信息
			
		});
	},
	//绑定密码框的fcous事件
	bindYzmFcous:function(){
		$("#yzm").focus(function(){
			login.hideErrorShow("yzmFlag");//隐藏自己框下的所有提示
			$(".successShowFlag").hide();//所有的成功提示隐藏
			$("#yzmSuccessShow").html("请输入验证码");
			$("#yzmSuccessShow").show();//显示提示信息
			
		});
	},
	//隐藏某个输入框下所有的的提示信息和错号对号图片
	hideErrorShow:function(cssFlag){
		$("."+cssFlag).hide();
	}
	
};

$(document).ready(function () {
	login.init();
}); 




