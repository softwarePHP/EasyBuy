
var _vds = _vds || [];
window._vds = _vds;
(function () {

    var userid=getCookie('dongMark');

    _vds.push(['setAccountId', 'a80e8e1b32b011c9']);
    if(userid) _vds.push(['setCS1', 'user_id', userid]);

    (function () {
        var vds = document.createElement('script');
        vds.type = 'text/javascript';
        vds.async = true;
        if ('https:' == document.location.protocol) {
            vds.src = 'https://h5rsc-ssl.vipstatic.com/growingio/vds.js';
        } else {
            vds.src = 'http://h5rsc.vipstatic.com/growingio/vds.js';
        }
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(vds, s);
    })();

    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
                if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    }
})();