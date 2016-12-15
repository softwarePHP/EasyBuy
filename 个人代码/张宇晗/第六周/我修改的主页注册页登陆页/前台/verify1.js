/**
 * Created by Lucifer on 2016/12/6.
 * 姓名：张宇晗
 * 学号：2014011661
 */


jQuery(function(){

    /* ajax检测，返回true表示成功，false失败*/
    function quickAjax(opts){
        var settings = {
                async: false,
                type:"POST",
                dataType:"json",
                param : "",
                url:"m=home&c=user&a=add"
            },
            t;
        $.extend(settings,opts);
        $.ajax({
            async: settings.async,
            type:settings.type,
            url:settings.url,
            dataType:settings.dataType,
            data:settings.param,
            success:function(data){
                /* 检测状态码：0没错误:true，1有错误:false */
                t=data;
                /*if(data.status*1){
                 t=false;
                 };*/
            }
        });
        return t;

    }
    /* 显示提示信息：
     o:对象；
     m:message信息;
     s:status 状态；
     */
    function showInfo(o,m,s){
        var s=s||"";
        switch (s){
            case "err":
                o.html(m).removeClass("ok check").show().addClass(s);
                break;
            case "check":
                o.html(m).removeClass("err ok").show().addClass(s);
                break;
            case "ok":
                o.html(m).removeClass("err check").show().addClass(s);
                break;
            default:
                o.html(m).removeClass("err check ok").show().addClass(s);
                break;
        }
    }
    $(document).ready(function(){
        $("#username").focus();
    });
    $("#username").blur(function(){
        var v=$("#username").val(),

            len=v.replace(/[^\x00-\xff]/g, 'xx').length,
            isName=/[^\u4e00-\u9fa50-9a-zA-Z]/ig.test(v),
            isNum=/^\d+$/.test(v);
        var o=$("#username");
        if(!v){
            showInfo($("#username_msg"),"用户名不能为空",'err');

            setTimeout(function(){o.focus()},0);

            return false;
        }else if(len<5||len>25){
            showInfo($("#username_msg"),'5-25个字符','err');
            setTimeout(function(){o.focus()},0);
            return false;
        }else if(isNum){
            showInfo($("#username_msg"),'用户名不能以纯数字组成','err');
            setTimeout(function(){o.focus()},0);
            return false;
        }else if(isName){
            showInfo($("#username_msg"),'用户名不能有特殊字符存在','err');
            setTimeout(function(){o.focus()},0);
            return false;
        }
        /* ajax校验： */
        var url="/home/index/checkName/",
            param={"username":v};
        res=quickAjax({url:url,param:param}),
            st=res.status*1;
        if(st==0){
            $("#is_username").val("1");
            showInfo($("#username_sg"),'通过验证','ok');

        }else{
            showInfo($("#username_msg"),'系统内已存在相同用户名','err');
            setTimeout(function(){o.focus()},0);
            return false;
        }
    })
    $("#repswd").blur(function(){
        var v = $("#repswd").val();
        var c = $("#userpswd").val();
        var o = $("#userpswd");
        if (v==0||c==0)
        {
            showInfo($("#repswd_msg"),'密码和确认密码不能为空','err');
            setTimeout(function(){o.focus()},0);
            return false;
        }
        else
        {
            if( v !== c){
                showInfo($("#repswd_msg"),'两次密码不相同','err');
                setTimeout(function(){o.focus()},0);
                return false;
            }else{
                showInfo($("#repswd_msg"),'正确','ok');
            }
        }


    })

    $("#phone").blur(function(){
        var v = $("#phone").val();
        var o = $("#phone");
        isPhonedate= /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test(v);
        var u=$("#username").val(),

            len=v.replace(/[^\x00-\xff]/g, 'xx').length,
            isName=/[^\u4e00-\u9fa50-9a-zA-Z]/ig.test(v),
            isNum=/^\d+$/.test(v);
        var s=$("#username");
        if(!u) {
            showInfo($("#username_msg"), "用户名不能为空", 'err');

            setTimeout(function () {s.focus()}, 0);

            return false;
        }else{
            if(isPhonedate == 0){
                //$("#mobile_msg").html('<font color="red">手机号码格式输入错误,正确的格式:13000000000</font>');
                showInfo($("#phone_msg"),'手机号码格式输入错误,正确的格式:13000000000','err');
                setTimeout(function(){o.focus()},0);
                return false;
            }
            else{
                $("#is_phone").val("1");
                showInfo($("#phone_msg"),'','ok');
                //$("#mobile_msg").html('<font color="green">通过验证</font>');
            }

        }

    });


})





