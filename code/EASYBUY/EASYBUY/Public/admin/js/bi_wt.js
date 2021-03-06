function dcsCookie() {
	typeof dcsOther == "function" ? dcsOther() : typeof dcsFPC == "function" && dcsFPC(gTimeZone)
}

function dcsGetCookie(e) {
	var t = e + "=",
		n = null;
	try {
		var r = document.cookie.indexOf(t);
		if (r > -1) if (r == 0) {
			var i = document.cookie.indexOf(";", r);
			i == -1 && (i = document.cookie.length), n = unescape(document.cookie.substring(r + t.length, i))
		} else {
			r = document.cookie.indexOf("; " + t);
			if (r > -1) {
				var i = document.cookie.indexOf("; ", r + 1);
				i == -1 && (i = document.cookie.length), n = unescape(document.cookie.substring(r + t.length + 2, i))
			}
		}
	} catch (s) {}
	return n
}

function dcsGetCrumb(e, t) {
	var n = dcsGetCookie(e).split(":");
	for (var r = 0; r < n.length; r++) {
		var i = n[r].split("=");
		if (t == i[0]) return i[1]
	}
	return null
}

function dcsGetIdCrumb(e, t) {
	var n = dcsGetCookie(e),
		r = n.substring(0, n.indexOf(":lv=")),
		i = r.split("=");
	for (var s = 0; s < i.length; s++) if (t == i[0]) return i[1];
	return null
}

function dcsFPC(e) {
	if (typeof e == "undefined") return;
	if (document.cookie.indexOf("WTLOPTOUT=") != -1) return;
	var t = gFpc,
		n = new Date,
		r = n.getTimezoneOffset() * 6e4 + e * 36e5;
	n.setTime(n.getTime() + r);
	var i = new Date(n.getTime() + 63113851500),
		s = new Date(n.getTime());
	WT.aid = WT.cid2 = WT.cid3 = WT.co_f = WT.vtid = WT.vt_f = WT.vt_f_a = WT.vt_f_s = WT.vt_f_d = WT.vt_f_tlh = WT.vt_f_tlv = WT.lvm_id = WT.cc = "";
	var o = new Date;
	WT.vt_visits = 1, WT.vt_spv = 0, WT.vt_lsv = n.getTime().toString();
	if (document.cookie.indexOf(t + "=") == -1) {
		if (typeof gWtId != "undefined" && gWtId != "") WT.co_f = gWtId;
		else if (typeof gTempWtId != "undefined" && gTempWtId != "") WT.co_f = gTempWtId, WT.vt_f = "1";
		else {
			WT.co_f = "2";
			var u = n.getTime().toString();
			for (var a = 2; a <= 32 - u.length; a++) WT.co_f += Math.floor(Math.random() * 16).toString(16);
			WT.co_f += u, WT.vt_f = "1"
		}
		typeof gWtAccountRollup == "undefined" && (WT.vt_f_a = "1"), WT.vt_f_s = WT.vt_f_d = "1", WT.vt_f_tlh = WT.vt_f_tlv = "0", WT.dl == 0 && (WT.vt_spv += 1)
	} else {
		var f = dcsGetIdCrumb(t, "id"),
			l = parseInt(dcsGetCrumb(t, "lv")),
			c = parseInt(dcsGetCrumb(t, "ss")),
			h = dcsGetCrumb(t, "vs");
		h != null && (WT.vt_visits = parseInt(h));
		var p = dcsGetCrumb(t, "spv");
		p != null && (WT.vt_spv = parseInt(p));
		var d = dcsGetCrumb(t, "lsv");
		d != null && (WT.vt_lsv = parseInt(d));
		if (f == null || f == "null" || isNaN(l) || isNaN(c)) return;
		WT.co_f = f;
		var v = new Date(l);
		WT.vt_f_tlh = Math.floor((v.getTime() - r) / 1e3), s.setTime(c), n.getTime() > v.getTime() + 18e5 || n.getTime() > s.getTime() + 288e5 ? (n.getDay() > s.getDay() || n.getMonth() > s.getMonth() || n.getYear() > s.getYear() ? WT.vt_visits = 1 : WT.vt_visits += 1, WT.dl == 0 ? WT.vt_spv = 1 : WT.vt_spv = 0, WT.vt_lsv = s.getTime().toString(), WT.vt_f_tlv = Math.floor((s.getTime() - r) / 1e3), s.setTime(n.getTime()), WT.vt_f_s = "1") : WT.dl == 0 && (WT.vt_spv += 1);
		if (n.getDay() != v.getDay() || n.getMonth() != v.getMonth() || n.getYear() != v.getYear()) WT.vt_f_d = "1";
		o.setTime(l)
	}
	WT.co_f = escape(WT.co_f), WT.vtid = WT.co_f;
	var m = "; expires=" + i.toGMTString();
	document.cookie = t + "=id=" + WT.co_f + ":lv=" + n.getTime().toString() + ":ss=" + s.getTime().toString() + ":lsv=" + WT.vt_lsv + ":vs=" + WT.vt_visits + ":spv=" + WT.vt_spv + m + "; path=/; domain=" + gFpcDom, document.cookie.indexOf(t + "=") == -1 && (WT.co_f = WT.vt_sid = WT.vt_f_s = WT.vt_f_d = WT.vt_f_tlh = WT.vt_f_tlv = "", WT.vt_f = WT.vt_f_a = "2"), WT.lf_user_id = getlogCookie("cust_id"), WT.lf_user_id && (WT.lf_user_id = encodeURIComponent(WT.lf_user_id)), WT.vt_lv = o.getTime().toString(), WT.vt_cv = n.getTime().toString(), WT.vtvs = (s.getTime() - r).toString(), WT.aid = getlogCookie("aid"), WT.aid && (WT.aid = encodeURIComponent(WT.aid)), WT.cid2 = getlogCookie("cid2"), WT.cid2 && (WT.cid2 = encodeURIComponent(WT.cid2)), WT.cid3 = getlogCookie("cid3"), WT.cid3 && (WT.cid3 = encodeURIComponent(WT.cid3)), WT.cc = getlogCookie("countyId"), WT.cc && (WT.cc = encodeURIComponent(WT.cc))
}

function dcsOther() {
	typeof WT.dcsvid != "undefined" && delete WT.dcsvid;
	var e = "wt_visitor_id";
	if (typeof DCSext[e] != "undefined") {
		var t = DCSext[e].replace(/(^\s*)|(\s*$)/g, "").toLowerCase();
		t != "" && t != "null" && (WT.dcsvid = escape(t))
	}
	if (typeof WT.dcsvid != "undefined") {
		var n = new Date,
			r = new Date(n.getTime() + 63113851500),
			i = "; expires=" + r.toGMTString();
		document.cookie = e + "=" + DCSext[e] + i + "; path=/" + (typeof gFpcDom != "undefined" && gFpcDom != "" ? "; domain=" + gFpcDom : "")
	} else {
		var t = dcsGetCookie(e);
		t != null && (t = t.replace(/(^\s*)|(\s*$)/g, "").toLowerCase(), t != "" && t != "null" && (WT.dcsvid = escape(t)))
	}
	typeof gFpc != "undefined" && dcsFPC(gTimeZone)
}

function getlogCookie(e) {
	var t = e + "=",
		n = null;
	try {
		var r = document.cookie.indexOf(t);
		if (r > -1) if (r == 0) {
			var i = document.cookie.indexOf(";", r);
			i == -1 && (i = document.cookie.length), n = decodeURIComponent(document.cookie.substring(r + t.length, i))
		} else {
			r = document.cookie.indexOf("; " + t);
			if (r > -1) {
				var i = document.cookie.indexOf("; ", r + 1);
				i == -1 && (i = document.cookie.length), n = decodeURIComponent(document.cookie.substring(r + t.length + 2, i))
			}
		}
	} catch (s) {}
	return n
}

function dcsEvt(e, t) {
	var n = e.target || e.srcElement;
	while (n && n.tagName && n.tagName.toLowerCase() != t.toLowerCase()) n = n.parentElement || n.parentNode;
	return n
}

function dcsBind(e, t, n) {
	n == 0 ? typeof window[t] == "function" && document && (document.addEventListener ? document.addEventListener(e, window[t], !0) : document.attachEvent && document.attachEvent("on" + e, window[t])) : n == 1 && typeof window[t] == "function" && window && (window.addEventListener ? window.addEventListener(e, window[t], !0) : window.attachEvent && window.attachEvent("on" + e, window[t]))
}

function dcsET() {
	var e = "mousedown";
	dcsBind(e, "dcsFormButton", 0), dcsBind(e, "dcsOffsite", 0), dcsBind(e, "dcsAnchor", 0), dcsBind(e, "dcsJavaScript", 0), dcsBind(e, "dcsHotMap", 0), dcsBind("load", "pageLoad", 1)
}

function _dcsMultiTrack() {
	dcsVar();
	var e;
	arguments.length != 0 && arguments[0] instanceof LFLog ? e = arguments[0].dcsMultiTrack.arguments : e = arguments;
	if (e == null) return;
	if (e.length % 2 == 0) {
		for (var t = 0; t < e.length; t += 2) e[t].toUpperCase().indexOf("WT.") == 0 ? WT[e[t].substring(3).toLowerCase()] = e[t + 1] : e[t].toUpperCase().indexOf("DCS.") == 0 ? DCS[e[t].substring(4)] = e[t + 1] : e[t].toUpperCase().indexOf("DCSext.") == 0 && (DCSext[e[t].substring(7)] = e[t + 1]);
		var n = new Date;
		DCS.dcsdat = n.getTime(), dcsFunc("dcsCookie"), WT.ti = gI18n ? dcsEscape(dcsEncode(WT.ti), I18NRE) : WT.ti;
		if (WT.dl == 0 || WT.dl == "0") WT.dl = 21;
		dcsTag()
	}
}

function dcsAdv() {
	dcsFunc("dcsET"), dcsFunc("dcsCookie", !0), dcsFunc("dcsAdSearch"), dcsFunc("dcsTP")
}

function dcsVar() {
	gImages = new Array, gIndex = 0, DCS = new Object, WT = new Object, DCSext = new Object, gQP = new Array;
	var e = new Date;
	WT.tz = e.getTimezoneOffset() / 60 * -1, WT.tz == 0 && (WT.tz = "0"), WT.bh = e.getHours(), WT.ul = navigator.appName == "Netscape" ? navigator.language : navigator.userLanguage, typeof screen == "object" && (WT.cd = navigator.appName == "Netscape" ? screen.pixelDepth : screen.colorDepth, WT.sr = screen.width + "x" + screen.height), typeof navigator.javaEnabled() == "boolean" && (WT.jo = navigator.javaEnabled() ? "Yes" : "No"), document.title && (WT.ti = gI18n ? dcsEscape(dcsEncode(document.title), I18NRE) : document.title), WT.bio = "", document.getElementById("bio") && (WT.bio = document.getElementById("bio").value), WT.js = "Yes", WT.jv = dcsJV(), document.body && document.body.addBehavior && (document.body.addBehavior("#default#clientCaps"), document.body.addBehavior("#default#homePage"), WT.hp = document.body.isHomePage(location.href) ? "1" : "0"), parseInt(navigator.appVersion) > 3 && (navigator.appName == "Microsoft Internet Explorer" && document.body ? WT.bs = document.body.offsetWidth + "x" + document.body.offsetHeight : navigator.appName == "Netscape" && (WT.bs = window.innerWidth + "x" + window.innerHeight)), WT.fi = "No";
	if (window.ActiveXObject) for (var t = 10; t > 0; t--) try {
		var n = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + t);
		WT.fi = "Yes", WT.fv = t + ".0";
		break
	} catch (r) {} else if (navigator.plugins && navigator.plugins.length) for (var t = 0; t < navigator.plugins.length; t++) if (navigator.plugins[t].name.indexOf("Shockwave Flash") != -1) {
		WT.fi = "Yes", WT.fv = navigator.plugins[t].description.split(" ")[2];
		break
	}
	gI18n && (WT.em = typeof encodeURIComponent == "function" ? "uri" : "esc", typeof document.defaultCharset == "string" ? WT.le = document.defaultCharset : typeof document.characterSet == "string" && (WT.le = document.characterSet)), WT.tv = "8.0.2", DCS.dcsdat = e.getTime(), DCS.dcssip = window.location.hostname, DCS.dcsuri = window.location.pathname, WT.dl = "0", WT.ssl = window.location.protocol.indexOf("https:") == 0 ? "1" : "0";
	if (window.location.search) {
		DCS.dcsqry = window.location.search;
		try {
			window.location.hash && (DCS.dcsqry = DCS.dcsqry + window.location.hash)
		} catch (e) {}
		if (gQP.length > 0) for (var t = 0; t < gQP.length; t++) {
			var i = DCS.dcsqry.indexOf(gQP[t]);
			if (i != -1) {
				var s = DCS.dcsqry.substring(0, i),
					o = DCS.dcsqry.substring(i + gQP[t].length, DCS.dcsqry.length);
				DCS.dcsqry = s + o
			}
		}
	} else try {
		window.location.hash && (DCS.dcsuri = DCS.dcsuri + window.location.hash)
	} catch (e) {}
	referer(DCS.dcssip + DCS.dcsuri + DCS.dcsqry)
}

function dcsA(e, t) {
	if (gI18n && e == "dcsqry") {
		var n = "",
			r = t.substring(1).split("&");
		for (var i = 0; i < r.length; i++) {
			var s = r[i],
				o = s.indexOf("=");
			if (o != -1) {
				var u = s.substring(0, o),
					a = s.substring(o + 1);
				i != 0 && (n += "&"), n += u + "=" + dcsEncode(a)
			}
		}
		t = t.substring(0, 1) + n
	}
	return "&" + e + "=" + dcsEscape(t, RE)
}

function dcsEscape(e, t) {
	if (typeof t != "undefined") {
		var n = new String(e);
		for (var r in t) n = n.replace(t[r], r);
		return n
	}
	return escape(e)
}

function dcsEncode(e) {
	return typeof encodeURIComponent == "function" ? encodeURIComponent(e) : escape(e)
}

function sendUrl(u) {
	// try {
	// 	var wv = "imglog__" + (new Date()).getTime(),
	// 		vv = window[wv] = new Image();
	// 	vv.onload = (vv.onerror = function() {
	// 		window[wv] = null
	// 	});
	// 	vv.src = u;
	// 	vv = null;
	// } catch (p) {
	// 	dcsCreateImage(u);
	// }
}

function dcsCreateImage(e) {
	document.images ? (gImages[gIndex] = new Image, gImages[gIndex].src = e, gIndex++) : document.write('<IMG ALT="" BORDER="0" NAME="DCSIMG" WIDTH="1" HEIGHT="1" SRC="' + e + '">')
}

function dcsMeta() {
	var e;
	document.all ? e = document.all.tags("meta") : document.documentElement && (e = document.getElementsByTagName("meta"));
	if (typeof e != "undefined") {
		var t = e.length;
		for (var n = 0; n < t; n++) {
			var r = e.item(n).name,
				i = e.item(n).content,
				s = e.item(n).httpEquiv;
			if (r.length > 0) if (r.indexOf("WT.") == 0) {
				var o = !1;
				if (gI18n) {
					var u = ["mc_id", "oss", "ti"];
					for (var a = 0; a < u.length; a++) if (r.toUpperCase().indexOf("WT." + u[a].toUpperCase()) == 0) {
						o = !0;
						break
					}
				}
				WT[r.substring(3)] = o ? dcsEscape(dcsEncode(i), I18NRE) : i
			} else if (r.indexOf("DCSext.") == 0) {
				var o = !1;
				if (gI18n) {
					var u = ["wt_visitor_id"];
					for (var a = 0; a < u.length; a++) if (r.indexOf("DCSext." + u[a]) == 0) {
						o = !0;
						break
					}
				}
				DCSext[r.substring(7)] = o ? dcsEscape(dcsEncode(i), I18NRE) : i
			} else r.indexOf("DCS.") == 0 && (DCS[r.substring(4)] = gI18n && r.indexOf("DCS.dcsref") == 0 ? dcsEscape(i, I18NRE) : i);
			else if (gI18n && s == "Content-Type") {
				var f = i.toLowerCase().indexOf("charset=");
				f != -1 && (WT.mle = i.substring(f + 8))
			}
		}
	}
}

function getPageX(e) {
	var t = 0,
		n = document.documentElement,
		r = document.body;
	return Math.floor(e.pageX ? t = e.pageX : e.clientX && (t = e.clientX + (n && n.scrollLeft || r && r.scrollLeft || 0))), t < 0 && (t = 0), t
}

function getPageY(e) {
	var t = 0,
		n = document.documentElement,
		r = document.body;
	return Math.floor(e.pageY ? t = e.pageY : e.clientY && (t = e.clientY + (n && n.scrollTop || r && r.scrollTop || 0))), t < 0 && (t = 0), t
}

function getPageWidth() {
	return document.documentElement.clientWidth || document.body.clientWidth || 0 + document.documentElement.clientLeft || document.body.clientLeft || 0
}

function dcsTag() {
	if (document.cookie.indexOf("WTLOPTOUT=") != -1) return;
	var e = f = "",
		t = "http" + (window.location.protocol.indexOf("https:") == 0 ? "s" : "") + "://" + gDomain + (gDcsId == "" ? "" : "/" + gDcsId) + "/dcs.gif?",
		n = "http" + (window.location.protocol.indexOf("https:") == 0 ? "s" : "") + "://mar.vip.com/l?";
	for (var r in DCS) DCS[r] && (e += dcsA(r, DCS[r]));
	var i = ["co_f", "vt_sid", "vt_f_tlv"];
	for (var s = 0; s < i.length; s++) {
		var o = i[s];
		WT[o] && (e += dcsA("WT." + o, WT[o]), delete WT[o])
	}
	var u;
	for (r in WT) if (WT[r]) {
		if (r == "ti") {
			u = WT[r];
			continue
		}
		e += dcsA("WT." + r, WT[r])
	}
	for (r in DCSext) DCSext[r] && (e += dcsA(r, DCSext[r]));
	var a = "";
	try {
		window && window.top && window.top.location && window.top.location.href && (a = window.top.location.href), !! a && a.length > 5 && (a = "top")
	} catch (l) {}
	e += dcsA("WT.top", a), f = n + e, e = t + e;
	var c = e;
	typeof u != undefined && u && (c += dcsA("WT.ti", u)), e.length > 2048 ? e = e.substring(0, 2040) + "&WT.tu=1" : c.length < 2048 && (e = c), sendUrl(e);
	try {} catch (p) {}
}

function dcsPrintVariables() {
	var e = "\nDomain = " + gDomain;
	e += "\nDCSId = " + gDcsId;
	for (N in DCS) e += "\nDCS." + N + " = " + DCS[N];
	for (N in WT) e += "\nWT." + N + " = " + WT[N];
	for (N in DCSext) e += "\nDCSext." + N + " = " + DCSext[N]
}

function dcsJV() {
	var e = navigator.userAgent.toLowerCase(),
		t = parseInt(navigator.appVersion),
		n = e.indexOf("mac") != -1,
		r = e.indexOf("firefox") != -1,
		i = e.indexOf("firefox/0.") != -1,
		s = e.indexOf("firefox/1.0") != -1,
		o = e.indexOf("firefox/1.5") != -1,
		u = r && !i && !s & !o,
		a = !r && e.indexOf("mozilla") != -1 && e.indexOf("compatible") == -1,
		f = a && t == 4,
		l = a && t >= 5,
		c = e.indexOf("msie") != -1 && e.indexOf("opera") == -1,
		h = c && t == 4 && e.indexOf("msie 4") != -1,
		p = c && !h,
		d = e.indexOf("opera") != -1,
		v = e.indexOf("opera 5") != -1 || e.indexOf("opera/5") != -1,
		m = e.indexOf("opera 6") != -1 || e.indexOf("opera/6") != -1,
		g = d && !v && !m,
		y = "1.1";
	return u ? y = "1.7" : o ? y = "1.6" : i || s || l || g ? y = "1.5" : n && p || m ? y = "1.4" : p || f || v ? y = "1.3" : h && (y = "1.2"), y
}

function dcsFunc(e) {
	typeof window[e] == "function" && window[e]()
}

function LFLog() {
	this.dcsMultiTrack = function() {
		_dcsMultiTrack(this)
	}
}

function _genLvmIdC() {
	var e = new Date,
		t = e.getTime().toString(),
		n = t.length == 13 ? Math.round(Math.random() * 9e18 + 1e18).toString() + t : Math.round(Math.random() * 9e18 + 1e18).toString() + Math.round(Math.random() * 31536e6 + 12622752e5).toString();
	return n
}
var gDomain = "mar.lefeng.com",
	gDcsId = "a",
	gHotId = "b",
	gLoadId = "c",
	gMapId = "d",
	gULVM = "e",
	gFpc = "WT_FPC",
	navigationtag = "dl,div,table",
	onsitedoms = /^(\w+\.)?lefeng\.com$/,
	gTimeZone = 8,
	gFpcDom = ".lefeng.com";
dcsSplit = function(e) {
	var t = e.toLowerCase().split(","),
		n = t.length;
	for (var r = 0; r < n; r++) t[r] = t[r].replace(/^\s*/, "").replace(/\s*$/, "");
	return t
}, dcsIsOnsite = function(e) {
	if (e.length > 0) {
		e = e.toLowerCase();
		if (e == window.location.hostname.toLowerCase()) return !0;
		if (typeof onsitedoms.test == "function") return onsitedoms.test(e);
		if (onsitedoms.length > 0) {
			var t = dcsSplit(onsitedoms),
				n = t.length;
			for (var r = 0; r < n; r++) if (e == t[r]) return !0
		}
	}
	return !1
}, dcsNavigation = function(e) {
	var t = "",
		n = "",
		r = dcsSplit(navigationtag),
		i = r.length,
		s, o, u;
	for (s = 0; s < i; s++) {
		u = r[s];
		if (u.length) {
			o = dcsEvt(e, u), t = o && o.getAttribute && o.getAttribute("id") ? o.getAttribute("id") : "", n = o.className || "";
			if (t.length || n.length) break
		}
	}
	return t.length ? t : n
}, dcsAnchor = function(e) {
	e = e || window.event || "";
	if (e && (typeof e.which != "number" || e.which == 1 || e.which == 2)) {
		var t = dcsEvt(e, "A");
		if (t && t.href) {
			var n = t.hostname ? t.hostname.split(":")[0] : "";
			if (dcsIsOnsite(n)) {
				var r = t.search ? t.search.substring(t.search.indexOf("?") + 1, t.search.length) : "",
					i = t.pathname ? t.pathname.indexOf("/") != 0 ? "/" + t.pathname : t.pathname : "/",
					s = t.id;
				if (t.hash && t.hash != "" && t.hash != "#") _dcsMultiTrack("DCS.dcssip", DCS.dcssip, "DCS.dcsuri", DCS.dcsuri, "DCS.dcsqry", DCS.dcsqry, "WT.ti", "Anchor:" + t.hash, "WT.dl", "21", "WT.nv", dcsNavigation(e), "WT.na", typeof s != undefined && s ? s : "", "WT.hf", t.href);
				else {
					var o = t.innerText ? t.innerText : t.textContent;
					o = o + ":" + t.id, _dcsMultiTrack("DCS.dcssip", DCS.dcssip, "DCS.dcsuri", DCS.dcsuri, "DCS.dcsqry", DCS.dcsqry, "DCS.dcsref", DCS.dcsref, "WT.ti", "Link:" + o, "WT.dl", "21", "WT.nv", dcsNavigation(e), "WT.na", typeof s != undefined && s ? s : "", "WT.hf", t.href)
				}
			}
		}
	}
}, dcsJavaScript = function(e) {
	e = e || window.event || "";
	if (e && (typeof e.which != "number" || e.which == 1)) {
		var t = dcsEvt(e, "A");
		if (t && t.href && t.protocol) {
			var n = t.search ? t.search.substring(t.search.indexOf("?") + 1, t.search.length) : "";
			t.protocol.toLowerCase() == "javascript:" && _dcsMultiTrack("DCS.dcssip", DCS.dcssip, "DCS.dcsuri", DCS.dcsuri, "DCS.dcsqry", DCS.dcsqry, "WT.ti", "JavaScript:" + t.innerHTML, "WT.dl", "22", "WT.nv", dcsNavigation(e), "WT.hf", t.href)
		}
	}
}, dcsOffsite = function(e) {
	e = e || window.event || "";
	if (e && (typeof e.which != "number" || e.which == 1)) {
		var t = dcsEvt(e, "A");
		if (t && t.href) {
			var n = t.hostname ? t.hostname.split(":")[0] : "",
				r = t.protocol || "";
			if (n.length > 0 && r.indexOf("http") == 0 && !dcsIsOnsite(n)) {
				var i = t.search ? t.search.substring(t.search.indexOf("?") + 1, t.search.length) : "",
					s = t.pathname ? t.pathname.indexOf("/") != 0 ? "/" + t.pathname : t.pathname : "/";
				_dcsMultiTrack("DCS.dcssip", DCS.dcssip, "DCS.dcsuri", DCS.dcsuri, "DCS.dcsqry", DCS.dcsqry, "DCS.dcsref", DCS.dcsref, "WT.ti", "Offsite:" + n + s + (i.length ? "?" + i : ""), "WT.dl", "24", "WT.nv", dcsNavigation(e), "WT.hf", t.href)
			}
		}
	}
}, dcsFormButton = function(e) {
	e = e || window.event || "";
	if (e && (typeof e.which != "number" || e.which == 1)) {
		var t = ["INPUT", "BUTTON"];
		for (var n = 0; n < t.length; n++) {
			var r = dcsEvt(e, t[n]),
				i;
			r && (i = r.type || "");
			if (i && (i == "submit" || i == "image" || i == "button" || i == "reset") || i == "text" && (e.which || e.keyCode) == 13) {
				var s = "",
					o = "",
					u = 0;
				r.form ? (s = r.form.action || window.location.pathname, o = r.form.id || r.form.name || r.form.className || "Unknown", u = r.form.method && r.form.method.toLowerCase() == "post" ? "27" : "26") : (s = window.location.pathname, o = r.name || r.id || "Unknown", u = t[n].toLowerCase() == "input" ? "28" : "29"), s && o && e.keyCode != 9 && _dcsMultiTrack("DCS.dcsuri", s, "WT.ti", "FormButton:" + o, "WT.dl", u, "WT.nv", dcsNavigation(e));
				break
			}
		}
	}
};
var gImages = new Array,
	gIndex = 0,
	DCS = new Object,
	WT = new Object,
	DCSext = new Object,
	gQP = new Array,
	gI18n = !0;
if (window.RegExp) var RE = {
	"%09": /\t/g,
	"%20": / /g,
	"%23": /\#/g,
	"%26": /\&/g,
	"%2B": /\+/g,
	"%3F": /\?/g,
	"%5C": /\\/g,
	"%22": /\"/g,
	"%7F": /\x7F/g,
	"%A0": /\xA0/g
},
	I18NRE = {
		"%25": /\%/g
	};
var referer = function(e) {
		try {
			var t = "";
			try {
				if (e) {
					var n = e.indexOf("&referer=");
					if (n >= 0) {
						t = e.substring(e.indexOf("&referer=") + "&referer=".length);
						if (t != "" && t != "-") {
							var r = t.indexOf("&");
							r >= 0 && (t = t.substring(0, r)), DCS.dcsqry = DCS.dcsqry.replace("&referer=" + t, ""), DCS.dcsref = gI18n ? dcsEscape(t, I18NRE) : t;
							return
						}
					} else {
						n = e.indexOf("?referer=");
						if (n >= 0) {
							t = e.substring(e.indexOf("?referer=") + "?referer=".length);
							if (t != "" && t != "-") {
								var r = t.indexOf("&");
								r >= 0 && (t = t.substring(0, r)), DCS.dcsqry = DCS.dcsqry.replace("referer=" + t, ""), DCS.dcsref = gI18n ? dcsEscape(t, I18NRE) : t;
								return
							}
						}
					}
				}
			} catch (i) {
				DCS.dcsref = ""
			}
			window.document.referrer != "" && window.document.referrer != "-" && (navigator.appName == "Microsoft Internet Explorer" && parseInt(navigator.appVersion) < 4 || (DCS.dcsref = gI18n ? dcsEscape(window.document.referrer, I18NRE) : window.document.referrer))
		} catch (i) {
			DCS.dcsref = ""
		}
	};
pageLoad = function() {
	try {
		var e = window.performance || window.webkitPerformance || window.mozPerformance || window.msPerformance || {};
		if (e) {
			var t = e.timing;
			if (t) {
				var n = t.navigationStart,
					r = t.domainLookupStart,
					i = t.domainLookupEnd,
					s = t.connectStart,
					o = t.connectEnd,
					u = t.requestStart,
					a = t.responseStart,
					f = t.responseEnd,
					l = t.fetchStart,
					c = t.domInteractive,
					h = t.domContentLoadedEventStart,
					p = t.loadEventStart,
					d = "http" + (window.location.protocol.indexOf("https:") == 0 ? "s" : "") + "://" + gDomain + (gLoadId == "" ? "" : "/" + gLoadId) + "/dcs.gif?";
				DCS.dcssip && (d += dcsA("dcssip", DCS.dcssip)), DCS.dcsuri && (d += dcsA("dcsuri", DCS.dcsuri)), DCS.dcsqry && (d += dcsA("dcsqry", DCS.dcsqry)), d += dcsA("LT.t01", n ? n : 0), d += dcsA("LT.t02", r ? r : 0), d += dcsA("LT.t03", i ? i : 0), d += dcsA("LT.t04", s ? s : 0), d += dcsA("LT.t05", o ? o : 0), d += dcsA("LT.t06", u ? u : 0), d += dcsA("LT.t07", a ? a : 0), d += dcsA("LT.t08", f ? f : 0), d += dcsA("LT.t09", l ? l : 0), d += dcsA("LT.t10", c ? c : 0), d += dcsA("LT.t11", h ? h : 0), d += dcsA("LT.t12", p ? p : 0), navigator.userAgent && (d += dcsA("LT.ua", dcsEncode(navigator.userAgent))), sendUrl(d)
			}
		}
	} catch (v) {}
}, window._BI_HOTMAP_CLASS = {
	BIHT_PROPERTY_LAYER: "biht-layer",
	BIHT_CLASS_SINGLE: "biht-none",
	bihtCollection: function(e) {
		try {
			if (!e || !e.target) return null;
			var t = $(e.target),
				n = t[0];
			if (!n.tagName || n == document || n == window) return "";
			var r = n.tagName,
				i = "BODY",
				s = $(document.body),
				o = "";
			e.tagName = r, e.layerX = 0, e.layerY = 0;
			if (r != "BODY" && r != "HTML") {
				var u = "",
					a, f, l, c, h = !1;
				r == "A" ? o = t.attr("href") : (c = t.parent(), c[0] !== undefined && c[0].tagName == "A" && (o = c.attr("href")));
				while ( !! t[0]) {
					n = t[0];
					if (!n.tagName || n == document.documentElement || n == document || n == window) break;
					r = n.tagName;
					if (r == "BODY" || r == "HTML") break;
					!h && i == "BODY" && t.attr(this.BIHT_PROPERTY_LAYER) !== undefined ? (a = "[" + this.BIHT_PROPERTY_LAYER + "]", s = t, h = !0) : a = "", f = jQuery.trim(t.attr("class")), f.length > 0 && (-1 != f.indexOf(this.BIHT_CLASS_SINGLE) ? f = this.BIHT_CLASS_SINGLE : f = f.replace(/\s+/g, "."), a = a + "." + f), a = r + a, c = t.parent(), l = c.children(a).index(t), h ? i == "BODY" ? i = a + ":" + (-1 < l ? l : 0) : i = a + ":" + (-1 < l ? l : 0) + " " + i : u = a + ":" + (-1 < l ? l : 0) + " " + u, t = c
				}
				e.depth = jQuery.trim(u)
			} else e.depth = r;
			i = jQuery.trim(i);
			if (i != "BODY" || s[0] != document.body) {
				var p = s.offset();
				e.layerX = p.left, e.layerY = p.top
			}
			e.layer = i, e.layerWidth = Math.round(s.width()), e.layerHeight = Math.round(s.height()), e.href = jQuery.trim(o);
			var d = "http" + (window.location.protocol.indexOf("https:") == 0 ? "s" : "") + "://" + gDomain + (gMapId == "" ? "" : "/" + gMapId) + "/dcs.gif?";
			DCS.dcssip && (d += dcsA("dcssip", DCS.dcssip)), DCS.dcsuri && (d += dcsA("dcsuri", DCS.dcsuri)), DCS.dcsqry && (d += dcsA("dcsqry", DCS.dcsqry)), d += dcsA("P.d", e.depth), d += dcsA("P.px", e.pageX), d += dcsA("P.py", e.pageY), d += dcsA("P.ox", e.offsetX), d += dcsA("P.oy", e.offsetY), d += dcsA("P.lyx", e.layerX), d += dcsA("P.lyy", e.layerY), d += dcsA("P.ly", e.layer), d += dcsA("P.lyw", e.layerWidth), d += dcsA("P.lyh", e.layerHeight), d += dcsA("P.tg", e.tagName), d += dcsA("P.hf", e.href), sendUrl(d)
		} catch (v) {}
	},
	bihtNormalizeEvent: function(e) {
		try {
			var t = Math.round(e.clientX),
				n = Math.round(e.clientY),
				r = $(document),
				i = Math.round(t + r.scrollLeft()),
				s = Math.round(n + r.scrollTop()),
				o = $(e.target || e.srcElement),
				u = o.offset();
			return {
				target: o[0],
				button: 1 === e.button ? 0 : 4 === e.button ? 1 : e.button,
				clientX: t,
				clientY: n,
				pageX: i,
				pageY: s,
				offsetX: Math.round(Math.max(0, i - u.left)),
				offsetY: Math.round(Math.max(0, s - u.top))
			}
		} catch (a) {}
	},
	initialize: function() {
		try {
			var e = this;
			document.attachEvent ? document.attachEvent("onmousedown", function(t) {
				e.bihtCollection(e.bihtNormalizeEvent(t || window.event))
			}) : document.addEventListener("mousedown", function(t) {
				e.bihtCollection(e.bihtNormalizeEvent(t || window.event))
			})
		} catch (t) {}
	}
}, dcsHotMap = function(e) {
	try {
		e = e || window.event || "";
		if (e && (typeof e.which != "number" || e.which == 1 || e.which == 2)) {
			var t = "http" + (window.location.protocol.indexOf("https:") == 0 ? "s" : "") + "://" + gDomain + (gHotId == "" ? "" : "/" + gHotId) + "/dcs.gif?";
			DCS.dcssip && (t += dcsA("dcssip", DCS.dcssip)), DCS.dcsuri && (t += dcsA("dcsuri", DCS.dcsuri)), DCS.dcsqry && (t += dcsA("dcsqry", DCS.dcsqry)), t += dcsA("P.w", getPageWidth(e)), t += dcsA("P.x", getPageX(e)), t += dcsA("P.y", getPageY(e));
			var n = "";
			typeof screen == "object" && (n = screen.width + "x" + screen.height), t += dcsA("P.sr", n);
			var r = dcsEvt(e, "A");
			if (r && r.href) {
				t += dcsA("P.hf", r.href);
				var i = r.id;
				t += dcsA("P.na", typeof i != undefined && i ? i : "")
			}
			t += dcsA("P.nv", dcsNavigation(e)), DCS.dcsref && (t += dcsA("P.dcsref", DCS.dcsref)), navigator.userAgent && (t += dcsA("P.ua", dcsEncode(navigator.userAgent))), sendUrl(t)
		}
	} catch (r) {}
}, dcsVar(), dcsMeta(), dcsFunc("dcsAdv"), dcsTag();
var _tag = new LFLog;
try {
	$("[bilogattr=addcartbilogclass]").click(function() {
		var e = $(this).attr("skuid");
		typeof e != undefined && e && _dcsMultiTrack("WT.ct", "button", "WT.pid", e, "WT.nu", "1")
	})
} catch (e) {}
try {
	window._BI_HOTMAP_CLASS.initialize()
} catch (e) {}