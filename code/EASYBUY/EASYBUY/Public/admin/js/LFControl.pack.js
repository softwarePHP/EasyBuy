
(function (factory) {
    "use strict";

    if (typeof define === 'function' && define.amd) { // AMD
        define(['jquery'], factory);
    }
    else if (typeof exports == "object" && typeof module == "object") { // CommonJS
        module.exports = factory;
    }
    else { // Browser
        factory(jQuery);
    }
})(function($, undefined) {

    var LFControl = window.LFControl = {
        _js_domain: "http://h5rsc.vipstatic.com/lefeng_pc/"
    };
    LFControl.include = {
        Css: function (file, func) {
            var h = document.getElementsByTagName('head')[0];
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = file;
            h.appendChild(link);
            if (document.all) {
                link.onreadystatechange = function () {
                    if ('complete' == link.readyState || 'loaded' == link.readyState) {
                        link.onreadystatechange = null;
                        func();
                    }
                }
            } else {
                link.onload = func;
            }
        },
        Js: function (file, func) {
            var h = document.getElementsByTagName('head')[0];
            var link = document.createElement('script');
            link.language = 'javascript';
            link.type = 'text/javascript';
            if (document.all) {
                link.onreadystatechange = function () {
                    if ('complete' == link.readyState || 'loaded' == link.readyState) {
                        link.onreadystatechange = null;
                        func();
                    }
                }
            } else {
                link.onload = func;
            }
            link.src = file;
            h.appendChild(link);
        }
    };
    LFControl.loadJquery = {
        jquery_file: LFControl._js_domain + 'js/jquery/jquery.pack.js',
        Load: function (func, file) {
            var notHave = false;
            if ('undefined' == typeof jQuery) {
                notHave = true;
            } else if (jQuery.fn.jquery.substr(0, 1) < 1 || parseInt(jQuery.fn.jquery.substr(2, 2)) < 11) {
                notHave = true;
            }
            if (!file) {
                file = LFControl.loadJquery.jquery_file;
            }
            if (notHave) {
                LFControl.include.Js(file, func);
            } else {
                func();
            }
        }
    };
    LFControl.timer = {
        timerHandle: null,
        Run: function (func, time) {
            if (undefined === time) {
                time = 1000;
            }
            LFControl.timer.timerHandle = setInterval(function () {
                func();
            }, time);
        },
        Stop: function () {
            clearInterval(LFControl.timer.timerHandle);
        }
    };
    LFControl.tools = { //比较两个js对象是否相等
        Compare: function (fobj, sobj) {
            if (fobj == sobj) {
                return true;
            }
            var flength = 0;
            var slength = 0;
            for (var ele in fobj) {
                flength++;
            }
            for (var ele in sobj) {
                slength++;
            }
            if (flength != slength) {
                return false;
            }
            if (fobj.constructor == sobj.constructor) {
                for (var ele in fobj) {
                    if ('object' == typeof fobj[ele]) {
                        if (!LFControl.Tools.compare(fobj[ele], sobj[ele])) {
                            return false;
                        }
                    } else if ('function' == typeof fobj[ele]) {
                        if (fobj[ele].toString() != sobj[ele].toString()) {
                            return false;
                        }
                    } else if (fobj[ele] != sobj[ele]) {
                        return false;
                    }
                }
                return true;
            } else {
                return false;
            }
        },
        RandArray: function (array) { //随机获取数组值
            var random_num = Math.floor(Math.random() * array.length);
            return array[random_num];
        },
        StringFormat: function (str, args) {
            if (arguments.length > 0) {
                if (arguments.length == 2 && typeof (args) == "object") {
                    for (var key in args) {
                        if (args[key] != undefined) {
                            var reg = new RegExp("({" + key + "})", "g");
                            str = str.replace(reg, args[key]);
                        }
                    }
                } else {
                    for (var i = 1; i < arguments.length; i++) {
                        if (arguments[i] != undefined) {
                            var reg = new RegExp("({[" + i + "]})", "g");
                            str = str.replace(reg, arguments[i]);
                        }
                    }
                }
            }
            return str;
        },
        StringConver: function (str, length, conver_str) { //字符串补位
            if (str.length < length) {
                var num = length - str.length;
                for (var i = 0; i < num; i++) {
                    str = conver_str + str;
                }
            }
            return str;
        },
        StringToTime: function (str) {  //将字符串时间转换成数字格式
            var endtime = str.split(" ");
            var endtimel = endtime[0].split("-");
            var endtimer = endtime[1].split(":");
            var endtimearr = endtimel.concat(endtimer);
            return new Date(endtimearr[0], endtimearr[1] - 1, endtimearr[2], endtimearr[3], endtimearr[4], endtimearr[5]);
        },
        GetNumFromTime: function (ts, type) {  //计算倒计时剩余时间
            switch (type) {
                case "day":
                    return parseInt(ts / 1000 / 60 / 60 / 24, 10);
                case "hour":
                    return parseInt(ts / 1000 / 60 / 60 % 24, 10);
                case "minute":
                    return parseInt(ts / 1000 / 60 % 60, 10);
                case "second":
                    return parseInt(ts / 1000 % 60, 10);
            }
        },
        JSONStringify: function (obj, flag) {
            var file = LFControl._js_domain + 'js/common/json.pack.js';
            if (window.JSON && window.JSON.stringify) {
                return JSON.stringify(obj);
            } else {
                if (!flag) {
                    LFControl.include.Js(file, function () {
                        return;
                    });
                }
                return LFControl.tools.JSONStringify(obj, true);
            }
        }
    };
    LFControl.dialog = {
        Alert: function (str, func) {
            var dialog = $('<div title="\u63d0\u793a"></div>');
            dialog.html('<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>' + str + '</p>')
                .dialog({
                    modal: true,
                    autoOpen: false,
                    resizable: false,
                    close: function () {
                        $(this).dialog('destroy');
                        if ($.type(func) === "function") {
                            func();
                        }
                    },
                    buttons: {
                        "确定": function () {
                            $(this).dialog('close');
                        }
                    }
                }).dialog('open');
        },
        Confirm: function (str, confirm_func, cancel_func) {
            var dialog = $('<div title="\u8bf7\u786e\u8ba4"></div>');
            dialog.html('<p><span class="ui-icon ui-icon-help" style="float:left; margin:0 7px 20px 0;"></span>' + str + '</p>')
                .dialog({
                    modal: true,
                    autoOpen: false,
                    resizable: false,
                    close: function () {
                        $(this).dialog('destroy');
                    },
                    buttons: {
                        "确定": function () {
                            if ($.type(confirm_func) === "function")
                                confirm_func();
                            $(this).dialog('close');
                        },
                        "取消": function () {
                            if ($.type(cancel_func) === "function")
                                cancel_func();
                            $(this).dialog('close');
                        }
                    }
                }).dialog('open');
        }
    };
    LFControl.cookie = {
        Get: function (name, type) {
            var cookies = document.cookie.split('; ');
            var gets = [];
            var temp;
            if ('' == type || 'undefined' == typeof type) {
                for (var i = 0; i < cookies.length; i++) {
                    temp = cookies[i].split('=');
                    gets[temp[0]] = unescape(temp[1]);
                }
                if (name) {
                    return gets[name];
                } else {
                    return '';
                }
            } else {
                var tempcookie = '';
                for (i = 0; i < cookies.length; i++) {
                    if (cookies[i].indexOf(type + '=') > -1) {
                        tempcookie = cookies[i].replace(type + '=', '').split('&');
                        for (var x = 0; x < tempcookie.length; x++) {
                            temp = tempcookie[x].split('=');
                            gets[temp[0]] = unescape(temp[1]);
                        }
                    }
                }
                if (name) {
                    return gets[name];
                } else {
                    return '';
                }
            }
        },
        Set: function (name, value, expires, path, domain, secure) {
            if (!name || !value) {
                return false;
            }
            if ('' == name || '' == value) {
                return false;
            }
            var today = new Date();
            if (expires) {
                if (/^[0-9]+$/.test(expires)) {
                    expires = new Date(today.getTime() + expires * 1000).toGMTString();
                } else if (!/^wed, d{2} w{3} d{4} d{2}:d{2}:d{2} GMT$/.test(expires)) {
                    expires = undefined;
                }
            } else {
                expires = new Date(today.getTime() + 3600000 * 24 * 365).toGMTString();
            }
            var cookies = name + '=' + escape(value) + ';' + ((expires) ? ' expires=' + expires + ';' : '') + ((path) ? 'path=' + path + ';' : '') + ((domain) ? 'domain=' + domain + ';' : '') + ((secure && secure != 0) ? 'secure' : '');
            if (cookies.length < 4096) {
                document.cookie = cookies;
                return true;
            } else {
                return false;
            }
        },
        Del: function (name, path, domain) {
            if (!name || !this.Get(name)) {
                return false;
            }
            document.cookie = name + '=;' + ((path) ? 'path=' + path + ';' : '') + ((domain) ? 'domain=' + domain + ';' : '') + 'expires=Thu, 01-Jan-1970 00:00:01 GMT;';
            return true;
        }
    };
    LFControl.search = {
        _parameter: {
            input: "search-tm",
            auto: "auto-t",
            btn: "search-submit-t",
            defaultText: "\u641c\u5546\u54c1"
        },
        _timeOutId: null,
        _hindex: -1,
        url: "http://search.lefeng.com/ajax/getSuggest",
        WordFun: function (a) {
            var b = LFControl.search, a = $.extend(b._parameter, a);
            b._parameter.defaultText = a.defaultText;
            var e = $("#" + a.input), d = $("#" + a.auto);
            var c = e.offset();
            if (c != null && c != "undefind") {
                d.hide();
            }
            e.focus(function () {
                if (window.location.hostname!='search.lefeng.com' && $(this).val()) {
                    $(this).val("");
                    $(this).focus();
                }
            }).blur(function () {
                var t = $(this);
                setTimeout(function () {
                    if ($.trim(t.val()) == "") {
                        t.val(a.defaultText);
                    } else {
                        d.hide();
                    }
                }, 200);
            }).keyup(function (j) {
                var f = j || window.event, $this = $(this);
                var k = f.keyCode;
                if (k >= 65 && k <= 90 || k == 8 || k == 16 || k == 46 || k == 32 || k >= 48 && k <= 57) {
                    var g = e.val();
                    if (g != "") {
                        clearTimeout(b._timeOutId);
                        b._timeOutId = setTimeout(function () {
                            $.getJSON(b.url + "?callback=?", {
                                keyword: b.returnNoScript(g),
                                areaId: LFControl.cookie.Get("country_id"),
                                type: 3
                            }, function (l) {
                                setTimeout(function () {
                                    if ($this.val() == "") {
                                        d.hide();
                                    } else {
                                        b.SearchInfo(l.data, d, "", $this);
                                    }
                                }, 60);
                            });
                        }, 60);
                    } else {
                        clearTimeout(b._timeOutId);
                        setTimeout(function () {
                            d.hide();
                        }, 100);
                    }
                } else {
                    if (k == 38 || k == 40) {
                        switch (k) {
                            case 38:
                                var i = d.find('div ul[id!=""]');
                                if (b._hindex != -1) {
                                    i.eq(b._hindex).removeClass("on");
                                    b._hindex--;
                                } else {
                                    b._hindex = i.length - 1;
                                }
                                if (b._hindex == -1) {
                                    b._hindex = i.length - 1;
                                }
                                i.eq(b._hindex).addClass("on");
                                break;
                            case 40:
                                var i = d.find('div ul[id!=""]');
                                if (b._hindex != -1) {
                                    i.eq(b._hindex).removeClass("on");
                                }
                                b._hindex++;
                                if (b._hindex == i.length) {
                                    b._hindex = 0;
                                }
                                i.eq(b._hindex).addClass("on");
                                break;
                        }
                        if (d.find('div ul[id!=""]').eq(b._hindex)[0].tagName == "A") {
                            e.val(d.children('[id!=""]').eq(0).find("li:last").text());
                            return false;
                        }
                        var h = d.find('div ul[id!=""]').eq(b._hindex).find("li:last").text();
                        $(this).val(h);
                    } else {
                        switch (k) {
                            case 9:
                                e.blur(), d.hide();
                                break;
                            case 13:
                                d.hide(), b.JumpToSearch($(this));
                                break;
                            case 27:
                                e.val("").blur(), d.hide();
                                break;
                            default:
                                d.hide();
                        }
                    }
                }
            });
            $("#" + a.btn).click(function () {
                b.JumpToSearch($(this).next());
            });
            $(document).on('click', function (f) {
                var h = $("#" + a.input), g = $("#" + a.auto);
                if ($(f.target).attr("id") != a.input && $(f.target).attr("id") != h.prev()[0].id) {
                    g.hide();
                }
            });
        },
        SearchInfo: function (f, b, d, h) {
            var g = this;
            if (f != null && f.length > 0) {
                b.html("<span>&nbsp;</span><div></div>");
                var e = b.children("div");
                jQuery.each(f, function (i, l) {
                    var m = $("<ul>").attr("id", "searchLi" + i);
                    var k = l.content, j = l.count;
                    if (l.url) {
                        m.html("<li class='l'>" + k.substr(0, 15) + "</li>").appendTo(e);
                    } else {
                        m.html("<li class='r'><b>" + j + "</b>\u4ef6\u5546\u54c1</li><li class='l'>" + k.substr(0, 15) + "</li>").appendTo(e);
                    }
                    m.click(function () {
                        var n = $(this).find("li:last").text();
                        b.hide();
                        g._hindex = -1;
                        h.val(n);
                        g.JumpToSearch(h, n);
                    });
                    m.mouseover(function () {
                        if (g._hindex != -1) {
                            $("#auto").children("ul").eq(g._hindex).removeClass("on");
                        }
                        g._hindex = $(this).attr("id").replace("searchLi", "");
                        $(this).addClass("on");
                    });
                    m.mouseout(function () {
                        $(this).removeClass("on");
                    });
                    if (l.url) {
                        m.click(function () {
                            open(l.url);
                        });
                        if (l.flag == 1) {
                            m.find("li:last").css({
                                background: "url(http://h5rsc.vipstatic.com/lefeng_pc/images/newhome/brand_ico.gif) no-repeat 5px center",
                                "text-indent": "23px"
                            });
                            m.find("li:first").text(m.find("li:first").text() + "\u65d7\u8230\u5e97");
                        } else {
                            m.find("li:last").css({
                                background: "url(http://h5rsc.vipstatic.com/lefeng_pc/images/newhome/pop_ico.jpg) no-repeat 5px center",
                                "text-indent": "23px"
                            });
                        }
                        m.attr({
                            id: "",
                            "class": "searchTipBrand"
                        });
                        return true;
                    }

                });
                if (f.length > 0) {
                    b.show();
                } else {
                    b.hide();
                    g._hindex = -1;
                }
            } else {
                g._hindex = -1;
                b.hide();
            }
        },
        JumpToSearch: function (e, n) {
            var b = e,
                d = $.trim(e.val().replace(/<[^>]+>/g, "")),
                f = "",
                t = n || this._parameter.defaultText.replace(/<[^>]+>/g, "");
            b.focus();
            if (d == null || d == "" || d == this._parameter.defaultText) {
                f = this.returnNoScript(t);
            } else {
                f = this.returnNoScript(d);
            }
            window.location.href = "http://search.lefeng.com/search/showresult?keyword=" + encodeURIComponent(f);
        },
        returnNoScript: function (t) {
            var of = "", p = new RegExp("[%--`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]");
            for (var x = 0; x < t.length; x++) {
                of += t.substr(x, 1).replace(p, "");
            }
            return of;
        }
    };
    LFControl.loading = {
        loadingTimer: null,
        Start: function () {
            var _this = this;
            var style = "<style id='newblackMaskStyle'>" +
                ".newblackMask {display: none;position: fixed;top: 0;left: 0;z-index: 9997;width: 100%;height: 100%;background-color: #000;opacity:0.2; filter:alpha(opacity=20);}" +
                ".newblackPic{background:url(http://h5rsc.vipstatic.com/lefeng_pc/images/newblackMask.png) no-repeat; position:fixed; width:45px; height:40px; left:50%; top:50%;  z-index:9998;display:none;}" +
                ".newblackPicOn{display:block;}" +
                "@media screen and (min-width:0px){.newblackPic{background:url(http://h5rsc.vipstatic.com/lefeng_pc/images/newblackMask.png) no-repeat; position:fixed;display:block; width:45px; height:40px; left:50%; top:50%;  z-index:9998; opacity:0; transition: all .3s ease;transform:scale(0.8);}" +
                ".newblackPicOn{transform:scale(1);opacity:1;}}" +
                ".nbp1{margin: -20px 0 0 -22px;}" +
                ".nbp2{margin:2px 0 0 15px;}" +
                ".nbp3{margin:22px 0 0 -22px;}" +
                ".nbp4{margin:64px 0 0 -22px;}" +
                "</style>";
            $("body").append(style + '<div class="newblackMask" id="newblackMask"></div><div class="newblackPic nbp1"></div><div class="newblackPic nbp2"></div><div class="newblackPic nbp3"></div><div class="newblackPic nbp4"></div>');
            $("#newblackMask").fadeIn();
            _this.loadingTimer = setTimeout(function () {
                _this.setAnimate(".nbp4", 500, function () {
                    _this.setAnimate(".nbp3", 500, function () {
                        _this.setAnimate(".nbp2", 500, function () {
                            _this.setAnimate(".nbp1", 500, function () {
//                            $(".newblackPic").css({ "transform": "scale(1.2)", "opacity": 0});
                                $(".newblackPic").removeAttr('style').removeClass('newblackPicOn');
                            })
                        })
                    })
                });
                _this.loadingTimer = setTimeout(arguments.callee, 2500);
            }, 0);
        },
        End: function (callback) {
            var _this = this;
            clearTimeout(_this.loadingTimer);
            $("#newblackMask,.newblackPic").hide().remove();
            $("#newblackMaskStyle").remove();
            callback && callback();
        },
        setAnimate: function (dom, timer, callback) {
            $(dom).addClass('newblackPicOn');
            setTimeout(function () {
                callback();
            }, timer)
        }
    };
    LFControl.boxLoading = {
        FirstLoad: true,
        Start: function (box, _append) {
            var _style = '<style>' +
                '.BoxLoading{' +
                'background-image: url(http://h5rsc.vipstatic.com/lefeng_pc/images/page/boxloading.gif) !important;' +
                'background-position: center center !important;' +
                'background-repeat: no-repeat !important;' +
                '}' +
                '</style>';
            var _this = $(box);
            if (LFControl.boxLoading.FirstLoad) {
                $('body').append(_style);
                LFControl.boxLoading.FirstLoad = false;
            }
            ;
            if (_append == true) {
                _this.append('<div class="BoxLoading" style="height:20px; clear:both;"></div>');
            } else {
                _this.addClass('BoxLoading');
            }
        },
        End: function (box, _append) {
            var _this = $(box);
            if (_append == true) {
                _this.find('.BoxLoading').remove();
            } else {
                _this.removeClass('BoxLoading');
            }
        }

    }

    return LFControl;

});

