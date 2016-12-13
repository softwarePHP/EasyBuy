/**
 * 点击换验证码图片的功能.
 * 张宇晗
 * 2016-12-10
 */
$(function(){
    var captcha_img = $('#captcha-container').find('img');
    var verifyimg = captcha_img.attr("src");
    captcha_img.attr('title', '点击刷新');
    captcha_img.click(function(){
        if( verifyimg.indexOf('?')>0){
            $(this).attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
});
