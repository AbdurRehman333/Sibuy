function debounce(t, e, s) {
    var i;
    return function() {
        var n = this,
            a = arguments,
            o = function() {
                i = null, s || t.apply(n, a)
            },
            r = s && !i;
        clearTimeout(i), i = setTimeout(o, e), r && t.apply(n, a)
    }
}

function formatPrice(t, e = "&euro;", {
    alwaysShowDecimals: s = !1,
    allowFree: i = !0
} = {}) {
    if ("number" != typeof t) return t;
    let n = String((a = t, o = 2, (+(Math.round(+(a + "e" + o)) + "e" + -o)).toFixed(o)));
    var a, o;
    n = n.replace(".", ".");
    let r = "" + n;
    return s || String(n).endsWith(".00") && (r = r.replace(".00", "")), !i || "0" !== r && "0.00" !== r ? (r = `${e} ${r}`, r) : _t("common.free")
}! function(t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).EventEmitter3 = t()
}((function() {
    return function t(e, s, i) {
        function n(o, r) {
            if (!s[o]) {
                if (!e[o]) {
                    var l = "function" == typeof require && require;
                    if (!r && l) return l(o, !0);
                    if (a) return a(o, !0);
                    var h = new Error("Cannot find module '" + o + "'");
                    throw h.code = "MODULE_NOT_FOUND", h
                }
                var d = s[o] = {
                    exports: {}
                };
                e[o][0].call(d.exports, (function(t) {
                    return n(e[o][1][t] || t)
                }), d, d.exports, t, e, s, i)
            }
            return s[o].exports
        }
        for (var a = "function" == typeof require && require, o = 0; o < i.length; o++) n(i[o]);
        return n
    }({
        1: [function(t, e, s) {
            "use strict";
            var i = Object.prototype.hasOwnProperty,
                n = "~";

            function a() {}

            function o(t, e, s) {
                this.fn = t, this.context = e, this.once = s || !1
            }

            function r(t, e, s, i, a) {
                if ("function" != typeof s) throw new TypeError("The listener must be a function");
                var r = new o(s, i || t, a),
                    l = n ? n + e : e;
                return t._events[l] ? t._events[l].fn ? t._events[l] = [t._events[l], r] : t._events[l].push(r) : (t._events[l] = r, t._eventsCount++), t
            }

            function l(t, e) {
                0 == --t._eventsCount ? t._events = new a : delete t._events[e]
            }

            function h() {
                this._events = new a, this._eventsCount = 0
            }
            Object.create && (a.prototype = Object.create(null), (new a).__proto__ || (n = !1)), h.prototype.eventNames = function() {
                var t, e, s = [];
                if (0 === this._eventsCount) return s;
                for (e in t = this._events) i.call(t, e) && s.push(n ? e.slice(1) : e);
                return Object.getOwnPropertySymbols ? s.concat(Object.getOwnPropertySymbols(t)) : s
            }, h.prototype.listeners = function(t) {
                var e = n ? n + t : t,
                    s = this._events[e];
                if (!s) return [];
                if (s.fn) return [s.fn];
                for (var i = 0, a = s.length, o = new Array(a); i < a; i++) o[i] = s[i].fn;
                return o
            }, h.prototype.listenerCount = function(t) {
                var e = n ? n + t : t,
                    s = this._events[e];
                return s ? s.fn ? 1 : s.length : 0
            }, h.prototype.emit = function(t, e, s, i, a, o) {
                var r = n ? n + t : t;
                if (!this._events[r]) return !1;
                var l, h, d = this._events[r],
                    c = arguments.length;
                if (d.fn) {
                    switch (d.once && this.removeListener(t, d.fn, void 0, !0), c) {
                        case 1:
                            return d.fn.call(d.context), !0;
                        case 2:
                            return d.fn.call(d.context, e), !0;
                        case 3:
                            return d.fn.call(d.context, e, s), !0;
                        case 4:
                            return d.fn.call(d.context, e, s, i), !0;
                        case 5:
                            return d.fn.call(d.context, e, s, i, a), !0;
                        case 6:
                            return d.fn.call(d.context, e, s, i, a, o), !0
                    }
                    for (h = 1, l = new Array(c - 1); h < c; h++) l[h - 1] = arguments[h];
                    d.fn.apply(d.context, l)
                } else {
                    var u, p = d.length;
                    for (h = 0; h < p; h++) switch (d[h].once && this.removeListener(t, d[h].fn, void 0, !0), c) {
                        case 1:
                            d[h].fn.call(d[h].context);
                            break;
                        case 2:
                            d[h].fn.call(d[h].context, e);
                            break;
                        case 3:
                            d[h].fn.call(d[h].context, e, s);
                            break;
                        case 4:
                            d[h].fn.call(d[h].context, e, s, i);
                            break;
                        default:
                            if (!l)
                                for (u = 1, l = new Array(c - 1); u < c; u++) l[u - 1] = arguments[u];
                            d[h].fn.apply(d[h].context, l)
                    }
                }
                return !0
            }, h.prototype.on = function(t, e, s) {
                return r(this, t, e, s, !1)
            }, h.prototype.once = function(t, e, s) {
                return r(this, t, e, s, !0)
            }, h.prototype.removeListener = function(t, e, s, i) {
                var a = n ? n + t : t;
                if (!this._events[a]) return this;
                if (!e) return l(this, a), this;
                var o = this._events[a];
                if (o.fn) o.fn !== e || i && !o.once || s && o.context !== s || l(this, a);
                else {
                    for (var r = 0, h = [], d = o.length; r < d; r++)(o[r].fn !== e || i && !o[r].once || s && o[r].context !== s) && h.push(o[r]);
                    h.length ? this._events[a] = 1 === h.length ? h[0] : h : l(this, a)
                }
                return this
            }, h.prototype.removeAllListeners = function(t) {
                var e;
                return t ? (e = n ? n + t : t, this._events[e] && l(this, e)) : (this._events = new a, this._eventsCount = 0), this
            }, h.prototype.off = h.prototype.removeListener, h.prototype.addListener = h.prototype.on, h.prefixed = n, h.EventEmitter = h, void 0 !== e && (e.exports = h)
        }, {}]
    }, {}, [1])(1)
})),
function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t(require("jquery")) : t(jQuery)
}((function(t) {
    function e() {
        var e, s, i = {
            height: h.innerHeight,
            width: h.innerWidth
        };
        return i.height || ((e = l.compatMode) || !t.support.boxModel) && (i = {
            height: (s = "CSS1Compat" === e ? d : l.body).clientHeight,
            width: s.clientWidth
        }), i
    }

    function s() {
        return {
            top: h.pageYOffset || d.scrollTop || l.body.scrollTop,
            left: h.pageXOffset || d.scrollLeft || l.body.scrollLeft
        }
    }

    function i() {
        if (r.length) {
            var i = 0,
                o = t.map(r, (function(t) {
                    var e = t.data.selector,
                        s = t.$element;
                    return e ? s.find(e) : s
                }));
            for (n = n || e(), a = a || s(); i < r.length; i++)
                if (t.contains(d, o[i][0])) {
                    var l = t(o[i]),
                        h = {
                            height: l[0].offsetHeight,
                            width: l[0].offsetWidth
                        },
                        c = l.offset(),
                        u = l.data("inview");
                    if (!a || !n) return;
                    c.top + h.height > a.top && c.top < a.top + n.height && c.left + h.width > a.left && c.left < a.left + n.width ? u || l.data("inview", !0).trigger("inview", [!0]) : u && l.data("inview", !1).trigger("inview", [!1])
                }
        }
    }
    var n, a, o, r = [],
        l = document,
        h = window,
        d = l.documentElement;
    t.event.special.inview = {
        add: function(e) {
            r.push({
                data: e,
                $element: t(this),
                element: this
            }), !o && r.length && (o = setInterval(i, 250))
        },
        remove: function(t) {
            for (var e = 0; e < r.length; e++) {
                var s = r[e];
                if (s.element === this && s.data.guid === t.guid) {
                    r.splice(e, 1);
                    break
                }
            }
            r.length || (clearInterval(o), o = null)
        }
    }, t(h).on("scroll resize scrollstop", (function() {
        n = a = null
    })), !d.addEventListener && d.attachEvent && d.attachEvent("onfocusin", (function() {
        a = null
    }))
})),
function(t) {
    "function" == typeof define && define.amd ? define(["jquery"], t) : "object" == typeof exports ? module.exports = t : t(jQuery)
}((function(t) {
    function e(e) {
        var o = e || window.event,
            r = l.call(arguments, 1),
            h = 0,
            c = 0,
            u = 0,
            p = 0,
            m = 0,
            f = 0;
        if ((e = t.event.fix(o)).type = "mousewheel", "detail" in o && (u = -1 * o.detail), "wheelDelta" in o && (u = o.wheelDelta), "wheelDeltaY" in o && (u = o.wheelDeltaY), "wheelDeltaX" in o && (c = -1 * o.wheelDeltaX), "axis" in o && o.axis === o.HORIZONTAL_AXIS && (c = -1 * u, u = 0), h = 0 === u ? c : u, "deltaY" in o && (h = u = -1 * o.deltaY), "deltaX" in o && (c = o.deltaX, 0 === u && (h = -1 * c)), 0 !== u || 0 !== c) {
            if (1 === o.deltaMode) {
                var g = t.data(this, "mousewheel-line-height");
                h *= g, u *= g, c *= g
            } else if (2 === o.deltaMode) {
                var $ = t.data(this, "mousewheel-page-height");
                h *= $, u *= $, c *= $
            }
            if (p = Math.max(Math.abs(u), Math.abs(c)), (!a || a > p) && (a = p, i(o, p) && (a /= 40)), i(o, p) && (h /= 40, c /= 40, u /= 40), h = Math[h >= 1 ? "floor" : "ceil"](h / a), c = Math[c >= 1 ? "floor" : "ceil"](c / a), u = Math[u >= 1 ? "floor" : "ceil"](u / a), d.settings.normalizeOffset && this.getBoundingClientRect) {
                var _ = this.getBoundingClientRect();
                m = e.clientX - _.left, f = e.clientY - _.top
            }
            return e.deltaX = c, e.deltaY = u, e.deltaFactor = a, e.offsetX = m, e.offsetY = f, e.deltaMode = 0, r.unshift(e, h, c, u), n && clearTimeout(n), n = setTimeout(s, 200), (t.event.dispatch || t.event.handle).apply(this, r)
        }
    }

    function s() {
        a = null
    }

    function i(t, e) {
        return d.settings.adjustOldDeltas && "mousewheel" === t.type && e % 120 == 0
    }
    var n, a, o = ["wheel", "mousewheel", "DOMMouseScroll", "MozMousePixelScroll"],
        r = "onwheel" in document || document.documentMode >= 9 ? ["wheel"] : ["mousewheel", "DomMouseScroll", "MozMousePixelScroll"],
        l = Array.prototype.slice;
    if (t.event.fixHooks)
        for (var h = o.length; h;) t.event.fixHooks[o[--h]] = t.event.mouseHooks;
    var d = t.event.special.mousewheel = {
        version: "3.1.12",
        setup: function() {
            if (this.addEventListener)
                for (var s = r.length; s;) this.addEventListener(r[--s], e, !1);
            else this.onmousewheel = e;
            t.data(this, "mousewheel-line-height", d.getLineHeight(this)), t.data(this, "mousewheel-page-height", d.getPageHeight(this))
        },
        teardown: function() {
            if (this.removeEventListener)
                for (var s = r.length; s;) this.removeEventListener(r[--s], e, !1);
            else this.onmousewheel = null;
            t.removeData(this, "mousewheel-line-height"), t.removeData(this, "mousewheel-page-height")
        },
        getLineHeight: function(e) {
            var s = t(e),
                i = s["offsetParent" in t.fn ? "offsetParent" : "parent"]();
            return i.length || (i = t("body")), parseInt(i.css("fontSize"), 10) || parseInt(s.css("fontSize"), 10) || 16
        },
        getPageHeight: function(e) {
            return t(e).height()
        },
        settings: {
            adjustOldDeltas: !0,
            normalizeOffset: !0
        }
    };
    t.fn.extend({
        mousewheel: function(t) {
            return t ? this.bind("mousewheel", t) : this.trigger("mousewheel")
        },
        unmousewheel: function(t) {
            return this.unbind("mousewheel", t)
        }
    })
})),
/*!
	Zoom 1.7.21
	license: MIT
	http://www.jacklmoore.com/zoom
*/
function(t) {
    var e = {
        url: !1,
        callback: !1,
        target: !1,
        duration: 120,
        on: "mouseover",
        touch: !0,
        onZoomIn: !1,
        onZoomOut: !1,
        magnify: 1
    };
    t.zoom = function(e, s, i, n) {
        var a, o, r, l, h, d, c, u = t(e),
            p = u.css("position"),
            m = t(s);
        return e.style.position = /(absolute|fixed)/.test(p) ? p : "relative", e.style.overflow = "hidden", i.style.width = i.style.height = "", t(i).addClass("zoomImg").css({
            position: "absolute",
            top: 0,
            left: 0,
            opacity: 0,
            width: i.width * n,
            height: i.height * n,
            border: "none",
            maxWidth: "none",
            maxHeight: "none"
        }).appendTo(e), {
            init: function() {
                o = u.outerWidth(), a = u.outerHeight(), s === e ? (l = o, r = a) : (l = m.outerWidth(), r = m.outerHeight()), h = (i.width - o) / l, d = (i.height - a) / r, c = m.offset()
            },
            move: function(t) {
                var e = t.pageX - c.left,
                    s = t.pageY - c.top;
                s = Math.max(Math.min(s, r), 0), e = Math.max(Math.min(e, l), 0), i.style.left = e * -h + "px", i.style.top = s * -d + "px"
            }
        }
    }, t.fn.zoom = function(s) {
        return this.each((function() {
            var i = t.extend({}, e, s || {}),
                n = i.target && t(i.target)[0] || this,
                a = this,
                o = t(a),
                r = document.createElement("img"),
                l = t(r),
                h = "mousemove.zoom",
                d = !1,
                c = !1;
            if (!i.url) {
                var u = a.querySelector("img");
                if (u && (i.url = u.getAttribute("data-src") || u.currentSrc || u.src), !i.url) return
            }
            o.one("zoom.destroy", function(t, e) {
                o.off(".zoom"), n.style.position = t, n.style.overflow = e, r.onload = null, l.remove()
            }.bind(this, n.style.position, n.style.overflow)), r.onload = function() {
                function e(e) {
                    u.init(), u.move(e), l.stop().fadeTo(t.support.opacity ? i.duration : 0, 1, !!t.isFunction(i.onZoomIn) && i.onZoomIn.call(r))
                }

                function s() {
                    l.stop().fadeTo(i.duration, 0, !!t.isFunction(i.onZoomOut) && i.onZoomOut.call(r))
                }
                var u = t.zoom(n, a, r, i.magnify);
                "grab" === i.on ? o.on("mousedown.zoom", (function(i) {
                    1 === i.which && (t(document).one("mouseup.zoom", (function() {
                        s(), t(document).off(h, u.move)
                    })), e(i), t(document).on(h, u.move), i.preventDefault())
                })) : "click" === i.on ? o.on("click.zoom", (function(i) {
                    return d ? void 0 : (d = !0, e(i), t(document).on(h, u.move), t(document).one("click.zoom", (function() {
                        s(), d = !1, t(document).off(h, u.move)
                    })), !1)
                })) : "toggle" === i.on ? o.on("click.zoom", (function(t) {
                    d ? s() : e(t), d = !d
                })) : "mouseover" === i.on && (u.init(), o.on("mouseenter.zoom", e).on("mouseleave.zoom", s).on(h, u.move)), i.touch && o.on("touchstart.zoom", (function(t) {
                    t.preventDefault(), c ? (c = !1, s()) : (c = !0, e(t.originalEvent.touches[0] || t.originalEvent.changedTouches[0]))
                })).on("touchmove.zoom", (function(t) {
                    t.preventDefault(), u.move(t.originalEvent.touches[0] || t.originalEvent.changedTouches[0])
                })).on("touchend.zoom", (function(t) {
                    t.preventDefault(), c && (c = !1, s())
                })), t.isFunction(i.callback) && i.callback.call(r)
            }, r.setAttribute("role", "presentation"), r.alt = "", r.src = i.url
        }))
    }, t.fn.zoom.defaults = e
}(window.jQuery),
function(t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : t.moment = e()
}(this, (function() {
    "use strict";
    var t, e;

    function s() {
        return t.apply(null, arguments)
    }

    function i(t) {
        return t instanceof Array || "[object Array]" === Object.prototype.toString.call(t)
    }

    function n(t) {
        return null != t && "[object Object]" === Object.prototype.toString.call(t)
    }

    function a(t) {
        return void 0 === t
    }

    function o(t) {
        return "number" == typeof t || "[object Number]" === Object.prototype.toString.call(t)
    }

    function r(t) {
        return t instanceof Date || "[object Date]" === Object.prototype.toString.call(t)
    }

    function l(t, e) {
        var s, i = [];
        for (s = 0; s < t.length; ++s) i.push(e(t[s], s));
        return i
    }

    function h(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }

    function d(t, e) {
        for (var s in e) h(e, s) && (t[s] = e[s]);
        return h(e, "toString") && (t.toString = e.toString), h(e, "valueOf") && (t.valueOf = e.valueOf), t
    }

    function c(t, e, s, i) {
        return $e(t, e, s, i, !0).utc()
    }

    function u(t) {
        return null == t._pf && (t._pf = {
            empty: !1,
            unusedTokens: [],
            unusedInput: [],
            overflow: -2,
            charsLeftOver: 0,
            nullInput: !1,
            invalidMonth: null,
            invalidFormat: !1,
            userInvalidated: !1,
            iso: !1,
            parsedDateParts: [],
            meridiem: null,
            rfc2822: !1,
            weekdayMismatch: !1
        }), t._pf
    }

    function p(t) {
        if (null == t._isValid) {
            var s = u(t),
                i = e.call(s.parsedDateParts, (function(t) {
                    return null != t
                })),
                n = !isNaN(t._d.getTime()) && s.overflow < 0 && !s.empty && !s.invalidMonth && !s.invalidWeekday && !s.weekdayMismatch && !s.nullInput && !s.invalidFormat && !s.userInvalidated && (!s.meridiem || s.meridiem && i);
            if (t._strict && (n = n && 0 === s.charsLeftOver && 0 === s.unusedTokens.length && void 0 === s.bigHour), null != Object.isFrozen && Object.isFrozen(t)) return n;
            t._isValid = n
        }
        return t._isValid
    }

    function m(t) {
        var e = c(NaN);
        return null != t ? d(u(e), t) : u(e).userInvalidated = !0, e
    }
    e = Array.prototype.some ? Array.prototype.some : function(t) {
        for (var e = Object(this), s = e.length >>> 0, i = 0; i < s; i++)
            if (i in e && t.call(this, e[i], i, e)) return !0;
        return !1
    };
    var f = s.momentProperties = [];

    function g(t, e) {
        var s, i, n;
        if (a(e._isAMomentObject) || (t._isAMomentObject = e._isAMomentObject), a(e._i) || (t._i = e._i), a(e._f) || (t._f = e._f), a(e._l) || (t._l = e._l), a(e._strict) || (t._strict = e._strict), a(e._tzm) || (t._tzm = e._tzm), a(e._isUTC) || (t._isUTC = e._isUTC), a(e._offset) || (t._offset = e._offset), a(e._pf) || (t._pf = u(e)), a(e._locale) || (t._locale = e._locale), 0 < f.length)
            for (s = 0; s < f.length; s++) a(n = e[i = f[s]]) || (t[i] = n);
        return t
    }
    var $ = !1;

    function _(t) {
        g(this, t), this._d = new Date(null != t._d ? t._d.getTime() : NaN), this.isValid() || (this._d = new Date(NaN)), !1 === $ && ($ = !0, s.updateOffset(this), $ = !1)
    }

    function y(t) {
        return t instanceof _ || null != t && null != t._isAMomentObject
    }

    function v(t) {
        return t < 0 ? Math.ceil(t) || 0 : Math.floor(t)
    }

    function w(t) {
        var e = +t,
            s = 0;
        return 0 !== e && isFinite(e) && (s = v(e)), s
    }

    function b(t, e, s) {
        var i, n = Math.min(t.length, e.length),
            a = Math.abs(t.length - e.length),
            o = 0;
        for (i = 0; i < n; i++)(s && t[i] !== e[i] || !s && w(t[i]) !== w(e[i])) && o++;
        return o + a
    }

    function k(t) {
        !1 === s.suppressDeprecationWarnings && "undefined" != typeof console && console.warn && console.warn("Deprecation warning: " + t)
    }

    function C(t, e) {
        var i = !0;
        return d((function() {
            if (null != s.deprecationHandler && s.deprecationHandler(null, t), i) {
                for (var n, a = [], o = 0; o < arguments.length; o++) {
                    if (n = "", "object" == typeof arguments[o]) {
                        for (var r in n += "\n[" + o + "] ", arguments[0]) n += r + ": " + arguments[0][r] + ", ";
                        n = n.slice(0, -2)
                    } else n = arguments[o];
                    a.push(n)
                }
                k(t + "\nArguments: " + Array.prototype.slice.call(a).join("") + "\n" + (new Error).stack), i = !1
            }
            return e.apply(this, arguments)
        }), e)
    }
    var S, T = {};

    function D(t, e) {
        null != s.deprecationHandler && s.deprecationHandler(t, e), T[t] || (k(e), T[t] = !0)
    }

    function A(t) {
        return t instanceof Function || "[object Function]" === Object.prototype.toString.call(t)
    }

    function x(t, e) {
        var s, i = d({}, t);
        for (s in e) h(e, s) && (n(t[s]) && n(e[s]) ? (i[s] = {}, d(i[s], t[s]), d(i[s], e[s])) : null != e[s] ? i[s] = e[s] : delete i[s]);
        for (s in t) h(t, s) && !h(e, s) && n(t[s]) && (i[s] = d({}, i[s]));
        return i
    }

    function M(t) {
        null != t && this.set(t)
    }
    s.suppressDeprecationWarnings = !1, s.deprecationHandler = null, S = Object.keys ? Object.keys : function(t) {
        var e, s = [];
        for (e in t) h(t, e) && s.push(e);
        return s
    };
    var O = {};

    function Y(t, e) {
        var s = t.toLowerCase();
        O[s] = O[s + "s"] = O[e] = t
    }

    function I(t) {
        return "string" == typeof t ? O[t] || O[t.toLowerCase()] : void 0
    }

    function P(t) {
        var e, s, i = {};
        for (s in t) h(t, s) && (e = I(s)) && (i[e] = t[s]);
        return i
    }
    var E = {};

    function L(t, e) {
        E[t] = e
    }

    function R(t, e, s) {
        var i = "" + Math.abs(t),
            n = e - i.length;
        return (0 <= t ? s ? "+" : "" : "-") + Math.pow(10, Math.max(0, n)).toString().substr(1) + i
    }
    var H = /(\[[^\[]*\])|(\\)?([Hh]mm(ss)?|Mo|MM?M?M?|Do|DDDo|DD?D?D?|ddd?d?|do?|w[o|w]?|W[o|W]?|Qo?|YYYYYY|YYYYY|YYYY|YY|gg(ggg?)?|GG(GGG?)?|e|E|a|A|hh?|HH?|kk?|mm?|ss?|S{1,9}|x|X|zz?|ZZ?|.)/g,
        F = /(\[[^\[]*\])|(\\)?(LTS|LT|LL?L?L?|l{1,4})/g,
        U = {},
        N = {};

    function W(t, e, s, i) {
        var n = i;
        "string" == typeof i && (n = function() {
            return this[i]()
        }), t && (N[t] = n), e && (N[e[0]] = function() {
            return R(n.apply(this, arguments), e[1], e[2])
        }), s && (N[s] = function() {
            return this.localeData().ordinal(n.apply(this, arguments), t)
        })
    }

    function V(t, e) {
        return t.isValid() ? (e = z(e, t.localeData()), U[e] = U[e] || function(t) {
            var e, s, i, n = t.match(H);
            for (e = 0, s = n.length; e < s; e++) N[n[e]] ? n[e] = N[n[e]] : n[e] = (i = n[e]).match(/\[[\s\S]/) ? i.replace(/^\[|\]$/g, "") : i.replace(/\\/g, "");
            return function(e) {
                var i, a = "";
                for (i = 0; i < s; i++) a += A(n[i]) ? n[i].call(e, t) : n[i];
                return a
            }
        }(e), U[e](t)) : t.localeData().invalidDate()
    }

    function z(t, e) {
        var s = 5;

        function i(t) {
            return e.longDateFormat(t) || t
        }
        for (F.lastIndex = 0; 0 <= s && F.test(t);) t = t.replace(F, i), F.lastIndex = 0, s -= 1;
        return t
    }
    var B = /\d/,
        j = /\d\d/,
        q = /\d{3}/,
        G = /\d{4}/,
        Z = /[+-]?\d{6}/,
        X = /\d\d?/,
        J = /\d\d\d\d?/,
        Q = /\d\d\d\d\d\d?/,
        K = /\d{1,3}/,
        tt = /\d{1,4}/,
        et = /[+-]?\d{1,6}/,
        st = /\d+/,
        it = /[+-]?\d+/,
        nt = /Z|[+-]\d\d:?\d\d/gi,
        at = /Z|[+-]\d\d(?::?\d\d)?/gi,
        ot = /[0-9]{0,256}['a-z\u00A0-\u05FF\u0700-\uD7FF\uF900-\uFDCF\uFDF0-\uFF07\uFF10-\uFFEF]{1,256}|[\u0600-\u06FF\/]{1,256}(\s*?[\u0600-\u06FF]{1,256}){1,2}/i,
        rt = {};

    function lt(t, e, s) {
        rt[t] = A(e) ? e : function(t, i) {
            return t && s ? s : e
        }
    }

    function ht(t, e) {
        return h(rt, t) ? rt[t](e._strict, e._locale) : new RegExp(dt(t.replace("\\", "").replace(/\\(\[)|\\(\])|\[([^\]\[]*)\]|\\(.)/g, (function(t, e, s, i, n) {
            return e || s || i || n
        }))))
    }

    function dt(t) {
        return t.replace(/[-\/\\^$*+?.()|[\]{}]/g, "\\$&")
    }
    var ct = {};

    function ut(t, e) {
        var s, i = e;
        for ("string" == typeof t && (t = [t]), o(e) && (i = function(t, s) {
                s[e] = w(t)
            }), s = 0; s < t.length; s++) ct[t[s]] = i
    }

    function pt(t, e) {
        ut(t, (function(t, s, i, n) {
            i._w = i._w || {}, e(t, i._w, i, n)
        }))
    }

    function mt(t) {
        return ft(t) ? 366 : 365
    }

    function ft(t) {
        return t % 4 == 0 && t % 100 != 0 || t % 400 == 0
    }
    W("Y", 0, 0, (function() {
        var t = this.year();
        return t <= 9999 ? "" + t : "+" + t
    })), W(0, ["YY", 2], 0, (function() {
        return this.year() % 100
    })), W(0, ["YYYY", 4], 0, "year"), W(0, ["YYYYY", 5], 0, "year"), W(0, ["YYYYYY", 6, !0], 0, "year"), Y("year", "y"), L("year", 1), lt("Y", it), lt("YY", X, j), lt("YYYY", tt, G), lt("YYYYY", et, Z), lt("YYYYYY", et, Z), ut(["YYYYY", "YYYYYY"], 0), ut("YYYY", (function(t, e) {
        e[0] = 2 === t.length ? s.parseTwoDigitYear(t) : w(t)
    })), ut("YY", (function(t, e) {
        e[0] = s.parseTwoDigitYear(t)
    })), ut("Y", (function(t, e) {
        e[0] = parseInt(t, 10)
    })), s.parseTwoDigitYear = function(t) {
        return w(t) + (68 < w(t) ? 1900 : 2e3)
    };
    var gt, $t = _t("FullYear", !0);

    function _t(t, e) {
        return function(i) {
            return null != i ? (vt(this, t, i), s.updateOffset(this, e), this) : yt(this, t)
        }
    }

    function yt(t, e) {
        return t.isValid() ? t._d["get" + (t._isUTC ? "UTC" : "") + e]() : NaN
    }

    function vt(t, e, s) {
        t.isValid() && !isNaN(s) && ("FullYear" === e && ft(t.year()) && 1 === t.month() && 29 === t.date() ? t._d["set" + (t._isUTC ? "UTC" : "") + e](s, t.month(), wt(s, t.month())) : t._d["set" + (t._isUTC ? "UTC" : "") + e](s))
    }

    function wt(t, e) {
        if (isNaN(t) || isNaN(e)) return NaN;
        var s = (e % 12 + 12) % 12;
        return t += (e - s) / 12, 1 === s ? ft(t) ? 29 : 28 : 31 - s % 7 % 2
    }
    gt = Array.prototype.indexOf ? Array.prototype.indexOf : function(t) {
        var e;
        for (e = 0; e < this.length; ++e)
            if (this[e] === t) return e;
        return -1
    }, W("M", ["MM", 2], "Mo", (function() {
        return this.month() + 1
    })), W("MMM", 0, 0, (function(t) {
        return this.localeData().monthsShort(this, t)
    })), W("MMMM", 0, 0, (function(t) {
        return this.localeData().months(this, t)
    })), Y("month", "M"), L("month", 8), lt("M", X), lt("MM", X, j), lt("MMM", (function(t, e) {
        return e.monthsShortRegex(t)
    })), lt("MMMM", (function(t, e) {
        return e.monthsRegex(t)
    })), ut(["M", "MM"], (function(t, e) {
        e[1] = w(t) - 1
    })), ut(["MMM", "MMMM"], (function(t, e, s, i) {
        var n = s._locale.monthsParse(t, i, s._strict);
        null != n ? e[1] = n : u(s).invalidMonth = t
    }));
    var bt = /D[oD]?(\[[^\[\]]*\]|\s)+MMMM?/,
        kt = "January_February_March_April_May_June_July_August_September_October_November_December".split("_"),
        Ct = "Jan_Feb_Mar_Apr_May_Jun_Jul_Aug_Sep_Oct_Nov_Dec".split("_");

    function St(t, e) {
        var s;
        if (!t.isValid()) return t;
        if ("string" == typeof e)
            if (/^\d+$/.test(e)) e = w(e);
            else if (!o(e = t.localeData().monthsParse(e))) return t;
        return s = Math.min(t.date(), wt(t.year(), e)), t._d["set" + (t._isUTC ? "UTC" : "") + "Month"](e, s), t
    }

    function Tt(t) {
        return null != t ? (St(this, t), s.updateOffset(this, !0), this) : yt(this, "Month")
    }
    var Dt = ot,
        At = ot;

    function xt() {
        function t(t, e) {
            return e.length - t.length
        }
        var e, s, i = [],
            n = [],
            a = [];
        for (e = 0; e < 12; e++) s = c([2e3, e]), i.push(this.monthsShort(s, "")), n.push(this.months(s, "")), a.push(this.months(s, "")), a.push(this.monthsShort(s, ""));
        for (i.sort(t), n.sort(t), a.sort(t), e = 0; e < 12; e++) i[e] = dt(i[e]), n[e] = dt(n[e]);
        for (e = 0; e < 24; e++) a[e] = dt(a[e]);
        this._monthsRegex = new RegExp("^(" + a.join("|") + ")", "i"), this._monthsShortRegex = this._monthsRegex, this._monthsStrictRegex = new RegExp("^(" + n.join("|") + ")", "i"), this._monthsShortStrictRegex = new RegExp("^(" + i.join("|") + ")", "i")
    }

    function Mt(t) {
        var e;
        if (t < 100 && 0 <= t) {
            var s = Array.prototype.slice.call(arguments);
            s[0] = t + 400, e = new Date(Date.UTC.apply(null, s)), isFinite(e.getUTCFullYear()) && e.setUTCFullYear(t)
        } else e = new Date(Date.UTC.apply(null, arguments));
        return e
    }

    function Ot(t, e, s) {
        var i = 7 + e - s;
        return -(7 + Mt(t, 0, i).getUTCDay() - e) % 7 + i - 1
    }

    function Yt(t, e, s, i, n) {
        var a, o, r = 1 + 7 * (e - 1) + (7 + s - i) % 7 + Ot(t, i, n);
        return o = r <= 0 ? mt(a = t - 1) + r : r > mt(t) ? (a = t + 1, r - mt(t)) : (a = t, r), {
            year: a,
            dayOfYear: o
        }
    }

    function It(t, e, s) {
        var i, n, a = Ot(t.year(), e, s),
            o = Math.floor((t.dayOfYear() - a - 1) / 7) + 1;
        return o < 1 ? i = o + Pt(n = t.year() - 1, e, s) : o > Pt(t.year(), e, s) ? (i = o - Pt(t.year(), e, s), n = t.year() + 1) : (n = t.year(), i = o), {
            week: i,
            year: n
        }
    }

    function Pt(t, e, s) {
        var i = Ot(t, e, s),
            n = Ot(t + 1, e, s);
        return (mt(t) - i + n) / 7
    }

    function Et(t, e) {
        return t.slice(e, 7).concat(t.slice(0, e))
    }
    W("w", ["ww", 2], "wo", "week"), W("W", ["WW", 2], "Wo", "isoWeek"), Y("week", "w"), Y("isoWeek", "W"), L("week", 5), L("isoWeek", 5), lt("w", X), lt("ww", X, j), lt("W", X), lt("WW", X, j), pt(["w", "ww", "W", "WW"], (function(t, e, s, i) {
        e[i.substr(0, 1)] = w(t)
    })), W("d", 0, "do", "day"), W("dd", 0, 0, (function(t) {
        return this.localeData().weekdaysMin(this, t)
    })), W("ddd", 0, 0, (function(t) {
        return this.localeData().weekdaysShort(this, t)
    })), W("dddd", 0, 0, (function(t) {
        return this.localeData().weekdays(this, t)
    })), W("e", 0, 0, "weekday"), W("E", 0, 0, "isoWeekday"), Y("day", "d"), Y("weekday", "e"), Y("isoWeekday", "E"), L("day", 11), L("weekday", 11), L("isoWeekday", 11), lt("d", X), lt("e", X), lt("E", X), lt("dd", (function(t, e) {
        return e.weekdaysMinRegex(t)
    })), lt("ddd", (function(t, e) {
        return e.weekdaysShortRegex(t)
    })), lt("dddd", (function(t, e) {
        return e.weekdaysRegex(t)
    })), pt(["dd", "ddd", "dddd"], (function(t, e, s, i) {
        var n = s._locale.weekdaysParse(t, i, s._strict);
        null != n ? e.d = n : u(s).invalidWeekday = t
    })), pt(["d", "e", "E"], (function(t, e, s, i) {
        e[i] = w(t)
    }));
    var Lt = "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
        Rt = "Sun_Mon_Tue_Wed_Thu_Fri_Sat".split("_"),
        Ht = "Su_Mo_Tu_We_Th_Fr_Sa".split("_"),
        Ft = ot,
        Ut = ot,
        Nt = ot;

    function Wt() {
        function t(t, e) {
            return e.length - t.length
        }
        var e, s, i, n, a, o = [],
            r = [],
            l = [],
            h = [];
        for (e = 0; e < 7; e++) s = c([2e3, 1]).day(e), i = this.weekdaysMin(s, ""), n = this.weekdaysShort(s, ""), a = this.weekdays(s, ""), o.push(i), r.push(n), l.push(a), h.push(i), h.push(n), h.push(a);
        for (o.sort(t), r.sort(t), l.sort(t), h.sort(t), e = 0; e < 7; e++) r[e] = dt(r[e]), l[e] = dt(l[e]), h[e] = dt(h[e]);
        this._weekdaysRegex = new RegExp("^(" + h.join("|") + ")", "i"), this._weekdaysShortRegex = this._weekdaysRegex, this._weekdaysMinRegex = this._weekdaysRegex, this._weekdaysStrictRegex = new RegExp("^(" + l.join("|") + ")", "i"), this._weekdaysShortStrictRegex = new RegExp("^(" + r.join("|") + ")", "i"), this._weekdaysMinStrictRegex = new RegExp("^(" + o.join("|") + ")", "i")
    }

    function Vt() {
        return this.hours() % 12 || 12
    }

    function zt(t, e) {
        W(t, 0, 0, (function() {
            return this.localeData().meridiem(this.hours(), this.minutes(), e)
        }))
    }

    function Bt(t, e) {
        return e._meridiemParse
    }
    W("H", ["HH", 2], 0, "hour"), W("h", ["hh", 2], 0, Vt), W("k", ["kk", 2], 0, (function() {
        return this.hours() || 24
    })), W("hmm", 0, 0, (function() {
        return "" + Vt.apply(this) + R(this.minutes(), 2)
    })), W("hmmss", 0, 0, (function() {
        return "" + Vt.apply(this) + R(this.minutes(), 2) + R(this.seconds(), 2)
    })), W("Hmm", 0, 0, (function() {
        return "" + this.hours() + R(this.minutes(), 2)
    })), W("Hmmss", 0, 0, (function() {
        return "" + this.hours() + R(this.minutes(), 2) + R(this.seconds(), 2)
    })), zt("a", !0), zt("A", !1), Y("hour", "h"), L("hour", 13), lt("a", Bt), lt("A", Bt), lt("H", X), lt("h", X), lt("k", X), lt("HH", X, j), lt("hh", X, j), lt("kk", X, j), lt("hmm", J), lt("hmmss", Q), lt("Hmm", J), lt("Hmmss", Q), ut(["H", "HH"], 3), ut(["k", "kk"], (function(t, e, s) {
        var i = w(t);
        e[3] = 24 === i ? 0 : i
    })), ut(["a", "A"], (function(t, e, s) {
        s._isPm = s._locale.isPM(t), s._meridiem = t
    })), ut(["h", "hh"], (function(t, e, s) {
        e[3] = w(t), u(s).bigHour = !0
    })), ut("hmm", (function(t, e, s) {
        var i = t.length - 2;
        e[3] = w(t.substr(0, i)), e[4] = w(t.substr(i)), u(s).bigHour = !0
    })), ut("hmmss", (function(t, e, s) {
        var i = t.length - 4,
            n = t.length - 2;
        e[3] = w(t.substr(0, i)), e[4] = w(t.substr(i, 2)), e[5] = w(t.substr(n)), u(s).bigHour = !0
    })), ut("Hmm", (function(t, e, s) {
        var i = t.length - 2;
        e[3] = w(t.substr(0, i)), e[4] = w(t.substr(i))
    })), ut("Hmmss", (function(t, e, s) {
        var i = t.length - 4,
            n = t.length - 2;
        e[3] = w(t.substr(0, i)), e[4] = w(t.substr(i, 2)), e[5] = w(t.substr(n))
    }));
    var jt, qt = _t("Hours", !0),
        Gt = {
            calendar: {
                sameDay: "[Today at] LT",
                nextDay: "[Tomorrow at] LT",
                nextWeek: "dddd [at] LT",
                lastDay: "[Yesterday at] LT",
                lastWeek: "[Last] dddd [at] LT",
                sameElse: "L"
            },
            longDateFormat: {
                LTS: "h:mm:ss A",
                LT: "h:mm A",
                L: "MM/DD/YYYY",
                LL: "MMMM D, YYYY",
                LLL: "MMMM D, YYYY h:mm A",
                LLLL: "dddd, MMMM D, YYYY h:mm A"
            },
            invalidDate: "Invalid date",
            ordinal: "%d",
            dayOfMonthOrdinalParse: /\d{1,2}/,
            relativeTime: {
                future: "in %s",
                past: "%s ago",
                s: "a few seconds",
                ss: "%d seconds",
                m: "a minute",
                mm: "%d minutes",
                h: "an hour",
                hh: "%d hours",
                d: "a day",
                dd: "%d days",
                M: "a month",
                MM: "%d months",
                y: "a year",
                yy: "%d years"
            },
            months: kt,
            monthsShort: Ct,
            week: {
                dow: 0,
                doy: 6
            },
            weekdays: Lt,
            weekdaysMin: Ht,
            weekdaysShort: Rt,
            meridiemParse: /[ap]\.?m?\.?/i
        },
        Zt = {},
        Xt = {};

    function Jt(t) {
        return t ? t.toLowerCase().replace("_", "-") : t
    }

    function Qt(t) {
        var e = null;
        if (!Zt[t] && "undefined" != typeof module && module && module.exports) try {
            e = jt._abbr, require("./locale/" + t), Kt(e)
        } catch (t) {}
        return Zt[t]
    }

    function Kt(t, e) {
        var s;
        return t && ((s = a(e) ? ee(t) : te(t, e)) ? jt = s : "undefined" != typeof console && console.warn && console.warn("Locale " + t + " not found. Did you forget to load it?")), jt._abbr
    }

    function te(t, e) {
        if (null === e) return delete Zt[t], null;
        var s, i = Gt;
        if (e.abbr = t, null != Zt[t]) D("defineLocaleOverride", "use moment.updateLocale(localeName, config) to change an existing locale. moment.defineLocale(localeName, config) should only be used for creating a new locale See http://momentjs.com/guides/#/warnings/define-locale/ for more info."), i = Zt[t]._config;
        else if (null != e.parentLocale)
            if (null != Zt[e.parentLocale]) i = Zt[e.parentLocale]._config;
            else {
                if (null == (s = Qt(e.parentLocale))) return Xt[e.parentLocale] || (Xt[e.parentLocale] = []), Xt[e.parentLocale].push({
                    name: t,
                    config: e
                }), null;
                i = s._config
            }
        return Zt[t] = new M(x(i, e)), Xt[t] && Xt[t].forEach((function(t) {
            te(t.name, t.config)
        })), Kt(t), Zt[t]
    }

    function ee(t) {
        var e;
        if (t && t._locale && t._locale._abbr && (t = t._locale._abbr), !t) return jt;
        if (!i(t)) {
            if (e = Qt(t)) return e;
            t = [t]
        }
        return function(t) {
            for (var e, s, i, n, a = 0; a < t.length;) {
                for (e = (n = Jt(t[a]).split("-")).length, s = (s = Jt(t[a + 1])) ? s.split("-") : null; 0 < e;) {
                    if (i = Qt(n.slice(0, e).join("-"))) return i;
                    if (s && s.length >= e && b(n, s, !0) >= e - 1) break;
                    e--
                }
                a++
            }
            return jt
        }(t)
    }

    function se(t) {
        var e, s = t._a;
        return s && -2 === u(t).overflow && (e = s[1] < 0 || 11 < s[1] ? 1 : s[2] < 1 || s[2] > wt(s[0], s[1]) ? 2 : s[3] < 0 || 24 < s[3] || 24 === s[3] && (0 !== s[4] || 0 !== s[5] || 0 !== s[6]) ? 3 : s[4] < 0 || 59 < s[4] ? 4 : s[5] < 0 || 59 < s[5] ? 5 : s[6] < 0 || 999 < s[6] ? 6 : -1, u(t)._overflowDayOfYear && (e < 0 || 2 < e) && (e = 2), u(t)._overflowWeeks && -1 === e && (e = 7), u(t)._overflowWeekday && -1 === e && (e = 8), u(t).overflow = e), t
    }

    function ie(t, e, s) {
        return null != t ? t : null != e ? e : s
    }

    function ne(t) {
        var e, i, n, a, o, r = [];
        if (!t._d) {
            var l, h;
            for (l = t, h = new Date(s.now()), n = l._useUTC ? [h.getUTCFullYear(), h.getUTCMonth(), h.getUTCDate()] : [h.getFullYear(), h.getMonth(), h.getDate()], t._w && null == t._a[2] && null == t._a[1] && function(t) {
                    var e, s, i, n, a, o, r, l;
                    if (null != (e = t._w).GG || null != e.W || null != e.E) a = 1, o = 4, s = ie(e.GG, t._a[0], It(_e(), 1, 4).year), i = ie(e.W, 1), ((n = ie(e.E, 1)) < 1 || 7 < n) && (l = !0);
                    else {
                        a = t._locale._week.dow, o = t._locale._week.doy;
                        var h = It(_e(), a, o);
                        s = ie(e.gg, t._a[0], h.year), i = ie(e.w, h.week), null != e.d ? ((n = e.d) < 0 || 6 < n) && (l = !0) : null != e.e ? (n = e.e + a, (e.e < 0 || 6 < e.e) && (l = !0)) : n = a
                    }
                    i < 1 || i > Pt(s, a, o) ? u(t)._overflowWeeks = !0 : null != l ? u(t)._overflowWeekday = !0 : (r = Yt(s, i, n, a, o), t._a[0] = r.year, t._dayOfYear = r.dayOfYear)
                }(t), null != t._dayOfYear && (o = ie(t._a[0], n[0]), (t._dayOfYear > mt(o) || 0 === t._dayOfYear) && (u(t)._overflowDayOfYear = !0), i = Mt(o, 0, t._dayOfYear), t._a[1] = i.getUTCMonth(), t._a[2] = i.getUTCDate()), e = 0; e < 3 && null == t._a[e]; ++e) t._a[e] = r[e] = n[e];
            for (; e < 7; e++) t._a[e] = r[e] = null == t._a[e] ? 2 === e ? 1 : 0 : t._a[e];
            24 === t._a[3] && 0 === t._a[4] && 0 === t._a[5] && 0 === t._a[6] && (t._nextDay = !0, t._a[3] = 0), t._d = (t._useUTC ? Mt : function(t, e, s, i, n, a, o) {
                var r;
                return t < 100 && 0 <= t ? (r = new Date(t + 400, e, s, i, n, a, o), isFinite(r.getFullYear()) && r.setFullYear(t)) : r = new Date(t, e, s, i, n, a, o), r
            }).apply(null, r), a = t._useUTC ? t._d.getUTCDay() : t._d.getDay(), null != t._tzm && t._d.setUTCMinutes(t._d.getUTCMinutes() - t._tzm), t._nextDay && (t._a[3] = 24), t._w && void 0 !== t._w.d && t._w.d !== a && (u(t).weekdayMismatch = !0)
        }
    }
    var ae = /^\s*((?:[+-]\d{6}|\d{4})-(?:\d\d-\d\d|W\d\d-\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?::\d\d(?::\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/,
        oe = /^\s*((?:[+-]\d{6}|\d{4})(?:\d\d\d\d|W\d\d\d|W\d\d|\d\d\d|\d\d))(?:(T| )(\d\d(?:\d\d(?:\d\d(?:[.,]\d+)?)?)?)([\+\-]\d\d(?::?\d\d)?|\s*Z)?)?$/,
        re = /Z|[+-]\d\d(?::?\d\d)?/,
        le = [
            ["YYYYYY-MM-DD", /[+-]\d{6}-\d\d-\d\d/],
            ["YYYY-MM-DD", /\d{4}-\d\d-\d\d/],
            ["GGGG-[W]WW-E", /\d{4}-W\d\d-\d/],
            ["GGGG-[W]WW", /\d{4}-W\d\d/, !1],
            ["YYYY-DDD", /\d{4}-\d{3}/],
            ["YYYY-MM", /\d{4}-\d\d/, !1],
            ["YYYYYYMMDD", /[+-]\d{10}/],
            ["YYYYMMDD", /\d{8}/],
            ["GGGG[W]WWE", /\d{4}W\d{3}/],
            ["GGGG[W]WW", /\d{4}W\d{2}/, !1],
            ["YYYYDDD", /\d{7}/]
        ],
        he = [
            ["HH:mm:ss.SSSS", /\d\d:\d\d:\d\d\.\d+/],
            ["HH:mm:ss,SSSS", /\d\d:\d\d:\d\d,\d+/],
            ["HH:mm:ss", /\d\d:\d\d:\d\d/],
            ["HH:mm", /\d\d:\d\d/],
            ["HHmmss.SSSS", /\d\d\d\d\d\d\.\d+/],
            ["HHmmss,SSSS", /\d\d\d\d\d\d,\d+/],
            ["HHmmss", /\d\d\d\d\d\d/],
            ["HHmm", /\d\d\d\d/],
            ["HH", /\d\d/]
        ],
        de = /^\/?Date\((\-?\d+)/i;

    function ce(t) {
        var e, s, i, n, a, o, r = t._i,
            l = ae.exec(r) || oe.exec(r);
        if (l) {
            for (u(t).iso = !0, e = 0, s = le.length; e < s; e++)
                if (le[e][1].exec(l[1])) {
                    n = le[e][0], i = !1 !== le[e][2];
                    break
                }
            if (null == n) return void(t._isValid = !1);
            if (l[3]) {
                for (e = 0, s = he.length; e < s; e++)
                    if (he[e][1].exec(l[3])) {
                        a = (l[2] || " ") + he[e][0];
                        break
                    }
                if (null == a) return void(t._isValid = !1)
            }
            if (!i && null != a) return void(t._isValid = !1);
            if (l[4]) {
                if (!re.exec(l[4])) return void(t._isValid = !1);
                o = "Z"
            }
            t._f = n + (a || "") + (o || ""), fe(t)
        } else t._isValid = !1
    }
    var ue = /^(?:(Mon|Tue|Wed|Thu|Fri|Sat|Sun),?\s)?(\d{1,2})\s(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\s(\d{2,4})\s(\d\d):(\d\d)(?::(\d\d))?\s(?:(UT|GMT|[ECMP][SD]T)|([Zz])|([+-]\d{4}))$/;
    var pe = {
        UT: 0,
        GMT: 0,
        EDT: -240,
        EST: -300,
        CDT: -300,
        CST: -360,
        MDT: -360,
        MST: -420,
        PDT: -420,
        PST: -480
    };

    function me(t) {
        var e, s, i, n = ue.exec(t._i.replace(/\([^)]*\)|[\n\t]/g, " ").replace(/(\s\s+)/g, " ").replace(/^\s\s*/, "").replace(/\s\s*$/, ""));
        if (n) {
            var a = function(t, e, s, i, n, a) {
                var o = [function(t) {
                    var e = parseInt(t, 10);
                    return e <= 49 ? 2e3 + e : e <= 999 ? 1900 + e : e
                }(t), Ct.indexOf(e), parseInt(s, 10), parseInt(i, 10), parseInt(n, 10)];
                return a && o.push(parseInt(a, 10)), o
            }(n[4], n[3], n[2], n[5], n[6], n[7]);
            if (s = a, i = t, (e = n[1]) && Rt.indexOf(e) !== new Date(s[0], s[1], s[2]).getDay() && (u(i).weekdayMismatch = !0, !(i._isValid = !1))) return;
            t._a = a, t._tzm = function(t, e, s) {
                if (t) return pe[t];
                if (e) return 0;
                var i = parseInt(s, 10),
                    n = i % 100;
                return (i - n) / 100 * 60 + n
            }(n[8], n[9], n[10]), t._d = Mt.apply(null, t._a), t._d.setUTCMinutes(t._d.getUTCMinutes() - t._tzm), u(t).rfc2822 = !0
        } else t._isValid = !1
    }

    function fe(t) {
        if (t._f !== s.ISO_8601)
            if (t._f !== s.RFC_2822) {
                t._a = [], u(t).empty = !0;
                var e, i, n, a, o, r, l, d, c = "" + t._i,
                    p = c.length,
                    m = 0;
                for (n = z(t._f, t._locale).match(H) || [], e = 0; e < n.length; e++) a = n[e], (i = (c.match(ht(a, t)) || [])[0]) && (0 < (o = c.substr(0, c.indexOf(i))).length && u(t).unusedInput.push(o), c = c.slice(c.indexOf(i) + i.length), m += i.length), N[a] ? (i ? u(t).empty = !1 : u(t).unusedTokens.push(a), r = a, d = t, null != (l = i) && h(ct, r) && ct[r](l, d._a, d, r)) : t._strict && !i && u(t).unusedTokens.push(a);
                u(t).charsLeftOver = p - m, 0 < c.length && u(t).unusedInput.push(c), t._a[3] <= 12 && !0 === u(t).bigHour && 0 < t._a[3] && (u(t).bigHour = void 0), u(t).parsedDateParts = t._a.slice(0), u(t).meridiem = t._meridiem, t._a[3] = function(t, e, s) {
                    var i;
                    return null == s ? e : null != t.meridiemHour ? t.meridiemHour(e, s) : (null != t.isPM && ((i = t.isPM(s)) && e < 12 && (e += 12), i || 12 !== e || (e = 0)), e)
                }(t._locale, t._a[3], t._meridiem), ne(t), se(t)
            } else me(t);
        else ce(t)
    }

    function ge(t) {
        var e, h, c, f, $ = t._i,
            v = t._f;
        return t._locale = t._locale || ee(t._l), null === $ || void 0 === v && "" === $ ? m({
            nullInput: !0
        }) : ("string" == typeof $ && (t._i = $ = t._locale.preparse($)), y($) ? new _(se($)) : (r($) ? t._d = $ : i(v) ? function(t) {
            var e, s, i, n, a;
            if (0 === t._f.length) return u(t).invalidFormat = !0, t._d = new Date(NaN);
            for (n = 0; n < t._f.length; n++) a = 0, e = g({}, t), null != t._useUTC && (e._useUTC = t._useUTC), e._f = t._f[n], fe(e), p(e) && (a += u(e).charsLeftOver, a += 10 * u(e).unusedTokens.length, u(e).score = a, (null == i || a < i) && (i = a, s = e));
            d(t, s || e)
        }(t) : v ? fe(t) : a(h = (e = t)._i) ? e._d = new Date(s.now()) : r(h) ? e._d = new Date(h.valueOf()) : "string" == typeof h ? (c = e, null === (f = de.exec(c._i)) ? (ce(c), !1 === c._isValid && (delete c._isValid, me(c), !1 === c._isValid && (delete c._isValid, s.createFromInputFallback(c)))) : c._d = new Date(+f[1])) : i(h) ? (e._a = l(h.slice(0), (function(t) {
            return parseInt(t, 10)
        })), ne(e)) : n(h) ? function(t) {
            if (!t._d) {
                var e = P(t._i);
                t._a = l([e.year, e.month, e.day || e.date, e.hour, e.minute, e.second, e.millisecond], (function(t) {
                    return t && parseInt(t, 10)
                })), ne(t)
            }
        }(e) : o(h) ? e._d = new Date(h) : s.createFromInputFallback(e), p(t) || (t._d = null), t))
    }

    function $e(t, e, s, a, o) {
        var r, l = {};
        return !0 !== s && !1 !== s || (a = s, s = void 0), (n(t) && function(t) {
            if (Object.getOwnPropertyNames) return 0 === Object.getOwnPropertyNames(t).length;
            var e;
            for (e in t)
                if (t.hasOwnProperty(e)) return !1;
            return !0
        }(t) || i(t) && 0 === t.length) && (t = void 0), l._isAMomentObject = !0, l._useUTC = l._isUTC = o, l._l = s, l._i = t, l._f = e, l._strict = a, (r = new _(se(ge(l))))._nextDay && (r.add(1, "d"), r._nextDay = void 0), r
    }

    function _e(t, e, s, i) {
        return $e(t, e, s, i, !1)
    }
    s.createFromInputFallback = C("value provided is not in a recognized RFC2822 or ISO format. moment construction falls back to js Date(), which is not reliable across all browsers and versions. Non RFC2822/ISO date formats are discouraged and will be removed in an upcoming major release. Please refer to http://momentjs.com/guides/#/warnings/js-date/ for more info.", (function(t) {
        t._d = new Date(t._i + (t._useUTC ? " UTC" : ""))
    })), s.ISO_8601 = function() {}, s.RFC_2822 = function() {};
    var ye = C("moment().min is deprecated, use moment.max instead. http://momentjs.com/guides/#/warnings/min-max/", (function() {
            var t = _e.apply(null, arguments);
            return this.isValid() && t.isValid() ? t < this ? this : t : m()
        })),
        ve = C("moment().max is deprecated, use moment.min instead. http://momentjs.com/guides/#/warnings/min-max/", (function() {
            var t = _e.apply(null, arguments);
            return this.isValid() && t.isValid() ? this < t ? this : t : m()
        }));

    function we(t, e) {
        var s, n;
        if (1 === e.length && i(e[0]) && (e = e[0]), !e.length) return _e();
        for (s = e[0], n = 1; n < e.length; ++n) e[n].isValid() && !e[n][t](s) || (s = e[n]);
        return s
    }
    var be = ["year", "quarter", "month", "week", "day", "hour", "minute", "second", "millisecond"];

    function ke(t) {
        var e = P(t),
            s = e.year || 0,
            i = e.quarter || 0,
            n = e.month || 0,
            a = e.week || e.isoWeek || 0,
            o = e.day || 0,
            r = e.hour || 0,
            l = e.minute || 0,
            h = e.second || 0,
            d = e.millisecond || 0;
        this._isValid = function(t) {
            for (var e in t)
                if (-1 === gt.call(be, e) || null != t[e] && isNaN(t[e])) return !1;
            for (var s = !1, i = 0; i < be.length; ++i)
                if (t[be[i]]) {
                    if (s) return !1;
                    parseFloat(t[be[i]]) !== w(t[be[i]]) && (s = !0)
                }
            return !0
        }(e), this._milliseconds = +d + 1e3 * h + 6e4 * l + 1e3 * r * 60 * 60, this._days = +o + 7 * a, this._months = +n + 3 * i + 12 * s, this._data = {}, this._locale = ee(), this._bubble()
    }

    function Ce(t) {
        return t instanceof ke
    }

    function Se(t) {
        return t < 0 ? -1 * Math.round(-1 * t) : Math.round(t)
    }

    function Te(t, e) {
        W(t, 0, 0, (function() {
            var t = this.utcOffset(),
                s = "+";
            return t < 0 && (t = -t, s = "-"), s + R(~~(t / 60), 2) + e + R(~~t % 60, 2)
        }))
    }
    Te("Z", ":"), Te("ZZ", ""), lt("Z", at), lt("ZZ", at), ut(["Z", "ZZ"], (function(t, e, s) {
        s._useUTC = !0, s._tzm = Ae(at, t)
    }));
    var De = /([\+\-]|\d\d)/gi;

    function Ae(t, e) {
        var s = (e || "").match(t);
        if (null === s) return null;
        var i = ((s[s.length - 1] || []) + "").match(De) || ["-", 0, 0],
            n = 60 * i[1] + w(i[2]);
        return 0 === n ? 0 : "+" === i[0] ? n : -n
    }

    function xe(t, e) {
        var i, n;
        return e._isUTC ? (i = e.clone(), n = (y(t) || r(t) ? t.valueOf() : _e(t).valueOf()) - i.valueOf(), i._d.setTime(i._d.valueOf() + n), s.updateOffset(i, !1), i) : _e(t).local()
    }

    function Me(t) {
        return 15 * -Math.round(t._d.getTimezoneOffset() / 15)
    }

    function Oe() {
        return !!this.isValid() && this._isUTC && 0 === this._offset
    }
    s.updateOffset = function() {};
    var Ye = /^(\-|\+)?(?:(\d*)[. ])?(\d+)\:(\d+)(?:\:(\d+)(\.\d*)?)?$/,
        Ie = /^(-|\+)?P(?:([-+]?[0-9,.]*)Y)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)W)?(?:([-+]?[0-9,.]*)D)?(?:T(?:([-+]?[0-9,.]*)H)?(?:([-+]?[0-9,.]*)M)?(?:([-+]?[0-9,.]*)S)?)?$/;

    function Pe(t, e) {
        var s, i, n, a = t,
            r = null;
        return Ce(t) ? a = {
            ms: t._milliseconds,
            d: t._days,
            M: t._months
        } : o(t) ? (a = {}, e ? a[e] = t : a.milliseconds = t) : (r = Ye.exec(t)) ? (s = "-" === r[1] ? -1 : 1, a = {
            y: 0,
            d: w(r[2]) * s,
            h: w(r[3]) * s,
            m: w(r[4]) * s,
            s: w(r[5]) * s,
            ms: w(Se(1e3 * r[6])) * s
        }) : (r = Ie.exec(t)) ? (s = "-" === r[1] ? -1 : 1, a = {
            y: Ee(r[2], s),
            M: Ee(r[3], s),
            w: Ee(r[4], s),
            d: Ee(r[5], s),
            h: Ee(r[6], s),
            m: Ee(r[7], s),
            s: Ee(r[8], s)
        }) : null == a ? a = {} : "object" == typeof a && ("from" in a || "to" in a) && (n = function(t, e) {
            var s;
            return t.isValid() && e.isValid() ? (e = xe(e, t), t.isBefore(e) ? s = Le(t, e) : ((s = Le(e, t)).milliseconds = -s.milliseconds, s.months = -s.months), s) : {
                milliseconds: 0,
                months: 0
            }
        }(_e(a.from), _e(a.to)), (a = {}).ms = n.milliseconds, a.M = n.months), i = new ke(a), Ce(t) && h(t, "_locale") && (i._locale = t._locale), i
    }

    function Ee(t, e) {
        var s = t && parseFloat(t.replace(",", "."));
        return (isNaN(s) ? 0 : s) * e
    }

    function Le(t, e) {
        var s = {};
        return s.months = e.month() - t.month() + 12 * (e.year() - t.year()), t.clone().add(s.months, "M").isAfter(e) && --s.months, s.milliseconds = +e - +t.clone().add(s.months, "M"), s
    }

    function Re(t, e) {
        return function(s, i) {
            var n;
            return null === i || isNaN(+i) || (D(e, "moment()." + e + "(period, number) is deprecated. Please use moment()." + e + "(number, period). See http://momentjs.com/guides/#/warnings/add-inverted-param/ for more info."), n = s, s = i, i = n), He(this, Pe(s = "string" == typeof s ? +s : s, i), t), this
        }
    }

    function He(t, e, i, n) {
        var a = e._milliseconds,
            o = Se(e._days),
            r = Se(e._months);
        t.isValid() && (n = null == n || n, r && St(t, yt(t, "Month") + r * i), o && vt(t, "Date", yt(t, "Date") + o * i), a && t._d.setTime(t._d.valueOf() + a * i), n && s.updateOffset(t, o || r))
    }
    Pe.fn = ke.prototype, Pe.invalid = function() {
        return Pe(NaN)
    };
    var Fe = Re(1, "add"),
        Ue = Re(-1, "subtract");

    function Ne(t, e) {
        var s = 12 * (e.year() - t.year()) + (e.month() - t.month()),
            i = t.clone().add(s, "months");
        return -(s + (e - i < 0 ? (e - i) / (i - t.clone().add(s - 1, "months")) : (e - i) / (t.clone().add(s + 1, "months") - i))) || 0
    }

    function We(t) {
        var e;
        return void 0 === t ? this._locale._abbr : (null != (e = ee(t)) && (this._locale = e), this)
    }
    s.defaultFormat = "YYYY-MM-DDTHH:mm:ssZ", s.defaultFormatUtc = "YYYY-MM-DDTHH:mm:ss[Z]";
    var Ve = C("moment().lang() is deprecated. Instead, use moment().localeData() to get the language configuration. Use moment().locale() to change languages.", (function(t) {
        return void 0 === t ? this.localeData() : this.locale(t)
    }));

    function ze() {
        return this._locale
    }
    var Be = 126227808e5;

    function je(t, e) {
        return (t % e + e) % e
    }

    function qe(t, e, s) {
        return t < 100 && 0 <= t ? new Date(t + 400, e, s) - Be : new Date(t, e, s).valueOf()
    }

    function Ge(t, e, s) {
        return t < 100 && 0 <= t ? Date.UTC(t + 400, e, s) - Be : Date.UTC(t, e, s)
    }

    function Ze(t, e) {
        W(0, [t, t.length], 0, e)
    }

    function Xe(t, e, s, i, n) {
        var a;
        return null == t ? It(this, i, n).year : ((a = Pt(t, i, n)) < e && (e = a), function(t, e, s, i, n) {
            var a = Yt(t, e, s, i, n),
                o = Mt(a.year, 0, a.dayOfYear);
            return this.year(o.getUTCFullYear()), this.month(o.getUTCMonth()), this.date(o.getUTCDate()), this
        }.call(this, t, e, s, i, n))
    }
    W(0, ["gg", 2], 0, (function() {
        return this.weekYear() % 100
    })), W(0, ["GG", 2], 0, (function() {
        return this.isoWeekYear() % 100
    })), Ze("gggg", "weekYear"), Ze("ggggg", "weekYear"), Ze("GGGG", "isoWeekYear"), Ze("GGGGG", "isoWeekYear"), Y("weekYear", "gg"), Y("isoWeekYear", "GG"), L("weekYear", 1), L("isoWeekYear", 1), lt("G", it), lt("g", it), lt("GG", X, j), lt("gg", X, j), lt("GGGG", tt, G), lt("gggg", tt, G), lt("GGGGG", et, Z), lt("ggggg", et, Z), pt(["gggg", "ggggg", "GGGG", "GGGGG"], (function(t, e, s, i) {
        e[i.substr(0, 2)] = w(t)
    })), pt(["gg", "GG"], (function(t, e, i, n) {
        e[n] = s.parseTwoDigitYear(t)
    })), W("Q", 0, "Qo", "quarter"), Y("quarter", "Q"), L("quarter", 7), lt("Q", B), ut("Q", (function(t, e) {
        e[1] = 3 * (w(t) - 1)
    })), W("D", ["DD", 2], "Do", "date"), Y("date", "D"), L("date", 9), lt("D", X), lt("DD", X, j), lt("Do", (function(t, e) {
        return t ? e._dayOfMonthOrdinalParse || e._ordinalParse : e._dayOfMonthOrdinalParseLenient
    })), ut(["D", "DD"], 2), ut("Do", (function(t, e) {
        e[2] = w(t.match(X)[0])
    }));
    var Je = _t("Date", !0);
    W("DDD", ["DDDD", 3], "DDDo", "dayOfYear"), Y("dayOfYear", "DDD"), L("dayOfYear", 4), lt("DDD", K), lt("DDDD", q), ut(["DDD", "DDDD"], (function(t, e, s) {
        s._dayOfYear = w(t)
    })), W("m", ["mm", 2], 0, "minute"), Y("minute", "m"), L("minute", 14), lt("m", X), lt("mm", X, j), ut(["m", "mm"], 4);
    var Qe = _t("Minutes", !1);
    W("s", ["ss", 2], 0, "second"), Y("second", "s"), L("second", 15), lt("s", X), lt("ss", X, j), ut(["s", "ss"], 5);
    var Ke, ts = _t("Seconds", !1);
    for (W("S", 0, 0, (function() {
            return ~~(this.millisecond() / 100)
        })), W(0, ["SS", 2], 0, (function() {
            return ~~(this.millisecond() / 10)
        })), W(0, ["SSS", 3], 0, "millisecond"), W(0, ["SSSS", 4], 0, (function() {
            return 10 * this.millisecond()
        })), W(0, ["SSSSS", 5], 0, (function() {
            return 100 * this.millisecond()
        })), W(0, ["SSSSSS", 6], 0, (function() {
            return 1e3 * this.millisecond()
        })), W(0, ["SSSSSSS", 7], 0, (function() {
            return 1e4 * this.millisecond()
        })), W(0, ["SSSSSSSS", 8], 0, (function() {
            return 1e5 * this.millisecond()
        })), W(0, ["SSSSSSSSS", 9], 0, (function() {
            return 1e6 * this.millisecond()
        })), Y("millisecond", "ms"), L("millisecond", 16), lt("S", K, B), lt("SS", K, j), lt("SSS", K, q), Ke = "SSSS"; Ke.length <= 9; Ke += "S") lt(Ke, st);

    function es(t, e) {
        e[6] = w(1e3 * ("0." + t))
    }
    for (Ke = "S"; Ke.length <= 9; Ke += "S") ut(Ke, es);
    var ss = _t("Milliseconds", !1);
    W("z", 0, 0, "zoneAbbr"), W("zz", 0, 0, "zoneName");
    var is = _.prototype;

    function ns(t) {
        return t
    }
    is.add = Fe, is.calendar = function(t, e) {
        var i = t || _e(),
            n = xe(i, this).startOf("day"),
            a = s.calendarFormat(this, n) || "sameElse",
            o = e && (A(e[a]) ? e[a].call(this, i) : e[a]);
        return this.format(o || this.localeData().calendar(a, this, _e(i)))
    }, is.clone = function() {
        return new _(this)
    }, is.diff = function(t, e, s) {
        var i, n, a;
        if (!this.isValid()) return NaN;
        if (!(i = xe(t, this)).isValid()) return NaN;
        switch (n = 6e4 * (i.utcOffset() - this.utcOffset()), e = I(e)) {
            case "year":
                a = Ne(this, i) / 12;
                break;
            case "month":
                a = Ne(this, i);
                break;
            case "quarter":
                a = Ne(this, i) / 3;
                break;
            case "second":
                a = (this - i) / 1e3;
                break;
            case "minute":
                a = (this - i) / 6e4;
                break;
            case "hour":
                a = (this - i) / 36e5;
                break;
            case "day":
                a = (this - i - n) / 864e5;
                break;
            case "week":
                a = (this - i - n) / 6048e5;
                break;
            default:
                a = this - i
        }
        return s ? a : v(a)
    }, is.endOf = function(t) {
        var e;
        if (void 0 === (t = I(t)) || "millisecond" === t || !this.isValid()) return this;
        var i = this._isUTC ? Ge : qe;
        switch (t) {
            case "year":
                e = i(this.year() + 1, 0, 1) - 1;
                break;
            case "quarter":
                e = i(this.year(), this.month() - this.month() % 3 + 3, 1) - 1;
                break;
            case "month":
                e = i(this.year(), this.month() + 1, 1) - 1;
                break;
            case "week":
                e = i(this.year(), this.month(), this.date() - this.weekday() + 7) - 1;
                break;
            case "isoWeek":
                e = i(this.year(), this.month(), this.date() - (this.isoWeekday() - 1) + 7) - 1;
                break;
            case "day":
            case "date":
                e = i(this.year(), this.month(), this.date() + 1) - 1;
                break;
            case "hour":
                e = this._d.valueOf(), e += 36e5 - je(e + (this._isUTC ? 0 : 6e4 * this.utcOffset()), 36e5) - 1;
                break;
            case "minute":
                e = this._d.valueOf(), e += 6e4 - je(e, 6e4) - 1;
                break;
            case "second":
                e = this._d.valueOf(), e += 1e3 - je(e, 1e3) - 1
        }
        return this._d.setTime(e), s.updateOffset(this, !0), this
    }, is.format = function(t) {
        t || (t = this.isUtc() ? s.defaultFormatUtc : s.defaultFormat);
        var e = V(this, t);
        return this.localeData().postformat(e)
    }, is.from = function(t, e) {
        return this.isValid() && (y(t) && t.isValid() || _e(t).isValid()) ? Pe({
            to: this,
            from: t
        }).locale(this.locale()).humanize(!e) : this.localeData().invalidDate()
    }, is.fromNow = function(t) {
        return this.from(_e(), t)
    }, is.to = function(t, e) {
        return this.isValid() && (y(t) && t.isValid() || _e(t).isValid()) ? Pe({
            from: this,
            to: t
        }).locale(this.locale()).humanize(!e) : this.localeData().invalidDate()
    }, is.toNow = function(t) {
        return this.to(_e(), t)
    }, is.get = function(t) {
        return A(this[t = I(t)]) ? this[t]() : this
    }, is.invalidAt = function() {
        return u(this).overflow
    }, is.isAfter = function(t, e) {
        var s = y(t) ? t : _e(t);
        return !(!this.isValid() || !s.isValid()) && ("millisecond" === (e = I(e) || "millisecond") ? this.valueOf() > s.valueOf() : s.valueOf() < this.clone().startOf(e).valueOf())
    }, is.isBefore = function(t, e) {
        var s = y(t) ? t : _e(t);
        return !(!this.isValid() || !s.isValid()) && ("millisecond" === (e = I(e) || "millisecond") ? this.valueOf() < s.valueOf() : this.clone().endOf(e).valueOf() < s.valueOf())
    }, is.isBetween = function(t, e, s, i) {
        var n = y(t) ? t : _e(t),
            a = y(e) ? e : _e(e);
        return !!(this.isValid() && n.isValid() && a.isValid()) && ("(" === (i = i || "()")[0] ? this.isAfter(n, s) : !this.isBefore(n, s)) && (")" === i[1] ? this.isBefore(a, s) : !this.isAfter(a, s))
    }, is.isSame = function(t, e) {
        var s, i = y(t) ? t : _e(t);
        return !(!this.isValid() || !i.isValid()) && ("millisecond" === (e = I(e) || "millisecond") ? this.valueOf() === i.valueOf() : (s = i.valueOf(), this.clone().startOf(e).valueOf() <= s && s <= this.clone().endOf(e).valueOf()))
    }, is.isSameOrAfter = function(t, e) {
        return this.isSame(t, e) || this.isAfter(t, e)
    }, is.isSameOrBefore = function(t, e) {
        return this.isSame(t, e) || this.isBefore(t, e)
    }, is.isValid = function() {
        return p(this)
    }, is.lang = Ve, is.locale = We, is.localeData = ze, is.max = ve, is.min = ye, is.parsingFlags = function() {
        return d({}, u(this))
    }, is.set = function(t, e) {
        if ("object" == typeof t)
            for (var s = function(t) {
                    var e = [];
                    for (var s in t) e.push({
                        unit: s,
                        priority: E[s]
                    });
                    return e.sort((function(t, e) {
                        return t.priority - e.priority
                    })), e
                }(t = P(t)), i = 0; i < s.length; i++) this[s[i].unit](t[s[i].unit]);
        else if (A(this[t = I(t)])) return this[t](e);
        return this
    }, is.startOf = function(t) {
        var e;
        if (void 0 === (t = I(t)) || "millisecond" === t || !this.isValid()) return this;
        var i = this._isUTC ? Ge : qe;
        switch (t) {
            case "year":
                e = i(this.year(), 0, 1);
                break;
            case "quarter":
                e = i(this.year(), this.month() - this.month() % 3, 1);
                break;
            case "month":
                e = i(this.year(), this.month(), 1);
                break;
            case "week":
                e = i(this.year(), this.month(), this.date() - this.weekday());
                break;
            case "isoWeek":
                e = i(this.year(), this.month(), this.date() - (this.isoWeekday() - 1));
                break;
            case "day":
            case "date":
                e = i(this.year(), this.month(), this.date());
                break;
            case "hour":
                e = this._d.valueOf(), e -= je(e + (this._isUTC ? 0 : 6e4 * this.utcOffset()), 36e5);
                break;
            case "minute":
                e = this._d.valueOf(), e -= je(e, 6e4);
                break;
            case "second":
                e = this._d.valueOf(), e -= je(e, 1e3)
        }
        return this._d.setTime(e), s.updateOffset(this, !0), this
    }, is.subtract = Ue, is.toArray = function() {
        var t = this;
        return [t.year(), t.month(), t.date(), t.hour(), t.minute(), t.second(), t.millisecond()]
    }, is.toObject = function() {
        var t = this;
        return {
            years: t.year(),
            months: t.month(),
            date: t.date(),
            hours: t.hours(),
            minutes: t.minutes(),
            seconds: t.seconds(),
            milliseconds: t.milliseconds()
        }
    }, is.toDate = function() {
        return new Date(this.valueOf())
    }, is.toISOString = function(t) {
        if (!this.isValid()) return null;
        var e = !0 !== t,
            s = e ? this.clone().utc() : this;
        return s.year() < 0 || 9999 < s.year() ? V(s, e ? "YYYYYY-MM-DD[T]HH:mm:ss.SSS[Z]" : "YYYYYY-MM-DD[T]HH:mm:ss.SSSZ") : A(Date.prototype.toISOString) ? e ? this.toDate().toISOString() : new Date(this.valueOf() + 60 * this.utcOffset() * 1e3).toISOString().replace("Z", V(s, "Z")) : V(s, e ? "YYYY-MM-DD[T]HH:mm:ss.SSS[Z]" : "YYYY-MM-DD[T]HH:mm:ss.SSSZ")
    }, is.inspect = function() {
        if (!this.isValid()) return "moment.invalid(/* " + this._i + " */)";
        var t = "moment",
            e = "";
        this.isLocal() || (t = 0 === this.utcOffset() ? "moment.utc" : "moment.parseZone", e = "Z");
        var s = "[" + t + '("]',
            i = 0 <= this.year() && this.year() <= 9999 ? "YYYY" : "YYYYYY",
            n = e + '[")]';
        return this.format(s + i + "-MM-DD[T]HH:mm:ss.SSS" + n)
    }, is.toJSON = function() {
        return this.isValid() ? this.toISOString() : null
    }, is.toString = function() {
        return this.clone().locale("en").format("ddd MMM DD YYYY HH:mm:ss [GMT]ZZ")
    }, is.unix = function() {
        return Math.floor(this.valueOf() / 1e3)
    }, is.valueOf = function() {
        return this._d.valueOf() - 6e4 * (this._offset || 0)
    }, is.creationData = function() {
        return {
            input: this._i,
            format: this._f,
            locale: this._locale,
            isUTC: this._isUTC,
            strict: this._strict
        }
    }, is.year = $t, is.isLeapYear = function() {
        return ft(this.year())
    }, is.weekYear = function(t) {
        return Xe.call(this, t, this.week(), this.weekday(), this.localeData()._week.dow, this.localeData()._week.doy)
    }, is.isoWeekYear = function(t) {
        return Xe.call(this, t, this.isoWeek(), this.isoWeekday(), 1, 4)
    }, is.quarter = is.quarters = function(t) {
        return null == t ? Math.ceil((this.month() + 1) / 3) : this.month(3 * (t - 1) + this.month() % 3)
    }, is.month = Tt, is.daysInMonth = function() {
        return wt(this.year(), this.month())
    }, is.week = is.weeks = function(t) {
        var e = this.localeData().week(this);
        return null == t ? e : this.add(7 * (t - e), "d")
    }, is.isoWeek = is.isoWeeks = function(t) {
        var e = It(this, 1, 4).week;
        return null == t ? e : this.add(7 * (t - e), "d")
    }, is.weeksInYear = function() {
        var t = this.localeData()._week;
        return Pt(this.year(), t.dow, t.doy)
    }, is.isoWeeksInYear = function() {
        return Pt(this.year(), 1, 4)
    }, is.date = Je, is.day = is.days = function(t) {
        if (!this.isValid()) return null != t ? this : NaN;
        var e, s, i = this._isUTC ? this._d.getUTCDay() : this._d.getDay();
        return null != t ? (e = t, s = this.localeData(), t = "string" != typeof e ? e : isNaN(e) ? "number" == typeof(e = s.weekdaysParse(e)) ? e : null : parseInt(e, 10), this.add(t - i, "d")) : i
    }, is.weekday = function(t) {
        if (!this.isValid()) return null != t ? this : NaN;
        var e = (this.day() + 7 - this.localeData()._week.dow) % 7;
        return null == t ? e : this.add(t - e, "d")
    }, is.isoWeekday = function(t) {
        if (!this.isValid()) return null != t ? this : NaN;
        if (null == t) return this.day() || 7;
        var e, s, i = (e = t, s = this.localeData(), "string" == typeof e ? s.weekdaysParse(e) % 7 || 7 : isNaN(e) ? null : e);
        return this.day(this.day() % 7 ? i : i - 7)
    }, is.dayOfYear = function(t) {
        var e = Math.round((this.clone().startOf("day") - this.clone().startOf("year")) / 864e5) + 1;
        return null == t ? e : this.add(t - e, "d")
    }, is.hour = is.hours = qt, is.minute = is.minutes = Qe, is.second = is.seconds = ts, is.millisecond = is.milliseconds = ss, is.utcOffset = function(t, e, i) {
        var n, a = this._offset || 0;
        if (!this.isValid()) return null != t ? this : NaN;
        if (null == t) return this._isUTC ? a : Me(this);
        if ("string" == typeof t) {
            if (null === (t = Ae(at, t))) return this
        } else Math.abs(t) < 16 && !i && (t *= 60);
        return !this._isUTC && e && (n = Me(this)), this._offset = t, this._isUTC = !0, null != n && this.add(n, "m"), a !== t && (!e || this._changeInProgress ? He(this, Pe(t - a, "m"), 1, !1) : this._changeInProgress || (this._changeInProgress = !0, s.updateOffset(this, !0), this._changeInProgress = null)), this
    }, is.utc = function(t) {
        return this.utcOffset(0, t)
    }, is.local = function(t) {
        return this._isUTC && (this.utcOffset(0, t), this._isUTC = !1, t && this.subtract(Me(this), "m")), this
    }, is.parseZone = function() {
        if (null != this._tzm) this.utcOffset(this._tzm, !1, !0);
        else if ("string" == typeof this._i) {
            var t = Ae(nt, this._i);
            null != t ? this.utcOffset(t) : this.utcOffset(0, !0)
        }
        return this
    }, is.hasAlignedHourOffset = function(t) {
        return !!this.isValid() && (t = t ? _e(t).utcOffset() : 0, (this.utcOffset() - t) % 60 == 0)
    }, is.isDST = function() {
        return this.utcOffset() > this.clone().month(0).utcOffset() || this.utcOffset() > this.clone().month(5).utcOffset()
    }, is.isLocal = function() {
        return !!this.isValid() && !this._isUTC
    }, is.isUtcOffset = function() {
        return !!this.isValid() && this._isUTC
    }, is.isUtc = Oe, is.isUTC = Oe, is.zoneAbbr = function() {
        return this._isUTC ? "UTC" : ""
    }, is.zoneName = function() {
        return this._isUTC ? "Coordinated Universal Time" : ""
    }, is.dates = C("dates accessor is deprecated. Use date instead.", Je), is.months = C("months accessor is deprecated. Use month instead", Tt), is.years = C("years accessor is deprecated. Use year instead", $t), is.zone = C("moment().zone is deprecated, use moment().utcOffset instead. http://momentjs.com/guides/#/warnings/zone/", (function(t, e) {
        return null != t ? ("string" != typeof t && (t = -t), this.utcOffset(t, e), this) : -this.utcOffset()
    })), is.isDSTShifted = C("isDSTShifted is deprecated. See http://momentjs.com/guides/#/warnings/dst-shifted/ for more information", (function() {
        if (!a(this._isDSTShifted)) return this._isDSTShifted;
        var t = {};
        if (g(t, this), (t = ge(t))._a) {
            var e = t._isUTC ? c(t._a) : _e(t._a);
            this._isDSTShifted = this.isValid() && 0 < b(t._a, e.toArray())
        } else this._isDSTShifted = !1;
        return this._isDSTShifted
    }));
    var as = M.prototype;

    function os(t, e, s, i) {
        var n = ee(),
            a = c().set(i, e);
        return n[s](a, t)
    }

    function rs(t, e, s) {
        if (o(t) && (e = t, t = void 0), t = t || "", null != e) return os(t, e, s, "month");
        var i, n = [];
        for (i = 0; i < 12; i++) n[i] = os(t, i, s, "month");
        return n
    }

    function ls(t, e, s, i) {
        "boolean" == typeof t ? o(e) && (s = e, e = void 0) : (e = t, t = !1, o(s = e) && (s = e, e = void 0)), e = e || "";
        var n, a = ee(),
            r = t ? a._week.dow : 0;
        if (null != s) return os(e, (s + r) % 7, i, "day");
        var l = [];
        for (n = 0; n < 7; n++) l[n] = os(e, (n + r) % 7, i, "day");
        return l
    }
    as.calendar = function(t, e, s) {
        var i = this._calendar[t] || this._calendar.sameElse;
        return A(i) ? i.call(e, s) : i
    }, as.longDateFormat = function(t) {
        var e = this._longDateFormat[t],
            s = this._longDateFormat[t.toUpperCase()];
        return e || !s ? e : (this._longDateFormat[t] = s.replace(/MMMM|MM|DD|dddd/g, (function(t) {
            return t.slice(1)
        })), this._longDateFormat[t])
    }, as.invalidDate = function() {
        return this._invalidDate
    }, as.ordinal = function(t) {
        return this._ordinal.replace("%d", t)
    }, as.preparse = ns, as.postformat = ns, as.relativeTime = function(t, e, s, i) {
        var n = this._relativeTime[s];
        return A(n) ? n(t, e, s, i) : n.replace(/%d/i, t)
    }, as.pastFuture = function(t, e) {
        var s = this._relativeTime[0 < t ? "future" : "past"];
        return A(s) ? s(e) : s.replace(/%s/i, e)
    }, as.set = function(t) {
        var e, s;
        for (s in t) A(e = t[s]) ? this[s] = e : this["_" + s] = e;
        this._config = t, this._dayOfMonthOrdinalParseLenient = new RegExp((this._dayOfMonthOrdinalParse.source || this._ordinalParse.source) + "|" + /\d{1,2}/.source)
    }, as.months = function(t, e) {
        return t ? i(this._months) ? this._months[t.month()] : this._months[(this._months.isFormat || bt).test(e) ? "format" : "standalone"][t.month()] : i(this._months) ? this._months : this._months.standalone
    }, as.monthsShort = function(t, e) {
        return t ? i(this._monthsShort) ? this._monthsShort[t.month()] : this._monthsShort[bt.test(e) ? "format" : "standalone"][t.month()] : i(this._monthsShort) ? this._monthsShort : this._monthsShort.standalone
    }, as.monthsParse = function(t, e, s) {
        var i, n, a;
        if (this._monthsParseExact) return function(t, e, s) {
            var i, n, a, o = t.toLocaleLowerCase();
            if (!this._monthsParse)
                for (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = [], i = 0; i < 12; ++i) a = c([2e3, i]), this._shortMonthsParse[i] = this.monthsShort(a, "").toLocaleLowerCase(), this._longMonthsParse[i] = this.months(a, "").toLocaleLowerCase();
            return s ? "MMM" === e ? -1 !== (n = gt.call(this._shortMonthsParse, o)) ? n : null : -1 !== (n = gt.call(this._longMonthsParse, o)) ? n : null : "MMM" === e ? -1 !== (n = gt.call(this._shortMonthsParse, o)) || -1 !== (n = gt.call(this._longMonthsParse, o)) ? n : null : -1 !== (n = gt.call(this._longMonthsParse, o)) || -1 !== (n = gt.call(this._shortMonthsParse, o)) ? n : null
        }.call(this, t, e, s);
        for (this._monthsParse || (this._monthsParse = [], this._longMonthsParse = [], this._shortMonthsParse = []), i = 0; i < 12; i++) {
            if (n = c([2e3, i]), s && !this._longMonthsParse[i] && (this._longMonthsParse[i] = new RegExp("^" + this.months(n, "").replace(".", "") + "$", "i"), this._shortMonthsParse[i] = new RegExp("^" + this.monthsShort(n, "").replace(".", "") + "$", "i")), s || this._monthsParse[i] || (a = "^" + this.months(n, "") + "|^" + this.monthsShort(n, ""), this._monthsParse[i] = new RegExp(a.replace(".", ""), "i")), s && "MMMM" === e && this._longMonthsParse[i].test(t)) return i;
            if (s && "MMM" === e && this._shortMonthsParse[i].test(t)) return i;
            if (!s && this._monthsParse[i].test(t)) return i
        }
    }, as.monthsRegex = function(t) {
        return this._monthsParseExact ? (h(this, "_monthsRegex") || xt.call(this), t ? this._monthsStrictRegex : this._monthsRegex) : (h(this, "_monthsRegex") || (this._monthsRegex = At), this._monthsStrictRegex && t ? this._monthsStrictRegex : this._monthsRegex)
    }, as.monthsShortRegex = function(t) {
        return this._monthsParseExact ? (h(this, "_monthsRegex") || xt.call(this), t ? this._monthsShortStrictRegex : this._monthsShortRegex) : (h(this, "_monthsShortRegex") || (this._monthsShortRegex = Dt), this._monthsShortStrictRegex && t ? this._monthsShortStrictRegex : this._monthsShortRegex)
    }, as.week = function(t) {
        return It(t, this._week.dow, this._week.doy).week
    }, as.firstDayOfYear = function() {
        return this._week.doy
    }, as.firstDayOfWeek = function() {
        return this._week.dow
    }, as.weekdays = function(t, e) {
        var s = i(this._weekdays) ? this._weekdays : this._weekdays[t && !0 !== t && this._weekdays.isFormat.test(e) ? "format" : "standalone"];
        return !0 === t ? Et(s, this._week.dow) : t ? s[t.day()] : s
    }, as.weekdaysMin = function(t) {
        return !0 === t ? Et(this._weekdaysMin, this._week.dow) : t ? this._weekdaysMin[t.day()] : this._weekdaysMin
    }, as.weekdaysShort = function(t) {
        return !0 === t ? Et(this._weekdaysShort, this._week.dow) : t ? this._weekdaysShort[t.day()] : this._weekdaysShort
    }, as.weekdaysParse = function(t, e, s) {
        var i, n, a;
        if (this._weekdaysParseExact) return function(t, e, s) {
            var i, n, a, o = t.toLocaleLowerCase();
            if (!this._weekdaysParse)
                for (this._weekdaysParse = [], this._shortWeekdaysParse = [], this._minWeekdaysParse = [], i = 0; i < 7; ++i) a = c([2e3, 1]).day(i), this._minWeekdaysParse[i] = this.weekdaysMin(a, "").toLocaleLowerCase(), this._shortWeekdaysParse[i] = this.weekdaysShort(a, "").toLocaleLowerCase(), this._weekdaysParse[i] = this.weekdays(a, "").toLocaleLowerCase();
            return s ? "dddd" === e ? -1 !== (n = gt.call(this._weekdaysParse, o)) ? n : null : "ddd" === e ? -1 !== (n = gt.call(this._shortWeekdaysParse, o)) ? n : null : -1 !== (n = gt.call(this._minWeekdaysParse, o)) ? n : null : "dddd" === e ? -1 !== (n = gt.call(this._weekdaysParse, o)) || -1 !== (n = gt.call(this._shortWeekdaysParse, o)) || -1 !== (n = gt.call(this._minWeekdaysParse, o)) ? n : null : "ddd" === e ? -1 !== (n = gt.call(this._shortWeekdaysParse, o)) || -1 !== (n = gt.call(this._weekdaysParse, o)) || -1 !== (n = gt.call(this._minWeekdaysParse, o)) ? n : null : -1 !== (n = gt.call(this._minWeekdaysParse, o)) || -1 !== (n = gt.call(this._weekdaysParse, o)) || -1 !== (n = gt.call(this._shortWeekdaysParse, o)) ? n : null
        }.call(this, t, e, s);
        for (this._weekdaysParse || (this._weekdaysParse = [], this._minWeekdaysParse = [], this._shortWeekdaysParse = [], this._fullWeekdaysParse = []), i = 0; i < 7; i++) {
            if (n = c([2e3, 1]).day(i), s && !this._fullWeekdaysParse[i] && (this._fullWeekdaysParse[i] = new RegExp("^" + this.weekdays(n, "").replace(".", "\\.?") + "$", "i"), this._shortWeekdaysParse[i] = new RegExp("^" + this.weekdaysShort(n, "").replace(".", "\\.?") + "$", "i"), this._minWeekdaysParse[i] = new RegExp("^" + this.weekdaysMin(n, "").replace(".", "\\.?") + "$", "i")), this._weekdaysParse[i] || (a = "^" + this.weekdays(n, "") + "|^" + this.weekdaysShort(n, "") + "|^" + this.weekdaysMin(n, ""), this._weekdaysParse[i] = new RegExp(a.replace(".", ""), "i")), s && "dddd" === e && this._fullWeekdaysParse[i].test(t)) return i;
            if (s && "ddd" === e && this._shortWeekdaysParse[i].test(t)) return i;
            if (s && "dd" === e && this._minWeekdaysParse[i].test(t)) return i;
            if (!s && this._weekdaysParse[i].test(t)) return i
        }
    }, as.weekdaysRegex = function(t) {
        return this._weekdaysParseExact ? (h(this, "_weekdaysRegex") || Wt.call(this), t ? this._weekdaysStrictRegex : this._weekdaysRegex) : (h(this, "_weekdaysRegex") || (this._weekdaysRegex = Ft), this._weekdaysStrictRegex && t ? this._weekdaysStrictRegex : this._weekdaysRegex)
    }, as.weekdaysShortRegex = function(t) {
        return this._weekdaysParseExact ? (h(this, "_weekdaysRegex") || Wt.call(this), t ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex) : (h(this, "_weekdaysShortRegex") || (this._weekdaysShortRegex = Ut), this._weekdaysShortStrictRegex && t ? this._weekdaysShortStrictRegex : this._weekdaysShortRegex)
    }, as.weekdaysMinRegex = function(t) {
        return this._weekdaysParseExact ? (h(this, "_weekdaysRegex") || Wt.call(this), t ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex) : (h(this, "_weekdaysMinRegex") || (this._weekdaysMinRegex = Nt), this._weekdaysMinStrictRegex && t ? this._weekdaysMinStrictRegex : this._weekdaysMinRegex)
    }, as.isPM = function(t) {
        return "p" === (t + "").toLowerCase().charAt(0)
    }, as.meridiem = function(t, e, s) {
        return 11 < t ? s ? "pm" : "PM" : s ? "am" : "AM"
    }, Kt("en", {
        dayOfMonthOrdinalParse: /\d{1,2}(th|st|nd|rd)/,
        ordinal: function(t) {
            var e = t % 10;
            return t + (1 === w(t % 100 / 10) ? "th" : 1 === e ? "st" : 2 === e ? "nd" : 3 === e ? "rd" : "th")
        }
    }), s.lang = C("moment.lang is deprecated. Use moment.locale instead.", Kt), s.langData = C("moment.langData is deprecated. Use moment.localeData instead.", ee);
    var hs = Math.abs;

    function ds(t, e, s, i) {
        var n = Pe(e, s);
        return t._milliseconds += i * n._milliseconds, t._days += i * n._days, t._months += i * n._months, t._bubble()
    }

    function cs(t) {
        return t < 0 ? Math.floor(t) : Math.ceil(t)
    }

    function us(t) {
        return 4800 * t / 146097
    }

    function ps(t) {
        return 146097 * t / 4800
    }

    function ms(t) {
        return function() {
            return this.as(t)
        }
    }
    var fs = ms("ms"),
        gs = ms("s"),
        $s = ms("m"),
        _s = ms("h"),
        ys = ms("d"),
        vs = ms("w"),
        ws = ms("M"),
        bs = ms("Q"),
        ks = ms("y");

    function Cs(t) {
        return function() {
            return this.isValid() ? this._data[t] : NaN
        }
    }
    var Ss = Cs("milliseconds"),
        Ts = Cs("seconds"),
        Ds = Cs("minutes"),
        As = Cs("hours"),
        xs = Cs("days"),
        Ms = Cs("months"),
        Os = Cs("years"),
        Ys = Math.round,
        Is = {
            ss: 44,
            s: 45,
            m: 45,
            h: 22,
            d: 26,
            M: 11
        },
        Ps = Math.abs;

    function Es(t) {
        return (0 < t) - (t < 0) || +t
    }

    function Ls() {
        if (!this.isValid()) return this.localeData().invalidDate();
        var t, e, s = Ps(this._milliseconds) / 1e3,
            i = Ps(this._days),
            n = Ps(this._months);
        e = v((t = v(s / 60)) / 60), s %= 60, t %= 60;
        var a = v(n / 12),
            o = n %= 12,
            r = i,
            l = e,
            h = t,
            d = s ? s.toFixed(3).replace(/\.?0+$/, "") : "",
            c = this.asSeconds();
        if (!c) return "P0D";
        var u = c < 0 ? "-" : "",
            p = Es(this._months) !== Es(c) ? "-" : "",
            m = Es(this._days) !== Es(c) ? "-" : "",
            f = Es(this._milliseconds) !== Es(c) ? "-" : "";
        return u + "P" + (a ? p + a + "Y" : "") + (o ? p + o + "M" : "") + (r ? m + r + "D" : "") + (l || h || d ? "T" : "") + (l ? f + l + "H" : "") + (h ? f + h + "M" : "") + (d ? f + d + "S" : "")
    }
    var Rs = ke.prototype;
    return Rs.isValid = function() {
        return this._isValid
    }, Rs.abs = function() {
        var t = this._data;
        return this._milliseconds = hs(this._milliseconds), this._days = hs(this._days), this._months = hs(this._months), t.milliseconds = hs(t.milliseconds), t.seconds = hs(t.seconds), t.minutes = hs(t.minutes), t.hours = hs(t.hours), t.months = hs(t.months), t.years = hs(t.years), this
    }, Rs.add = function(t, e) {
        return ds(this, t, e, 1)
    }, Rs.subtract = function(t, e) {
        return ds(this, t, e, -1)
    }, Rs.as = function(t) {
        if (!this.isValid()) return NaN;
        var e, s, i = this._milliseconds;
        if ("month" === (t = I(t)) || "quarter" === t || "year" === t) switch (e = this._days + i / 864e5, s = this._months + us(e), t) {
            case "month":
                return s;
            case "quarter":
                return s / 3;
            case "year":
                return s / 12
        } else switch (e = this._days + Math.round(ps(this._months)), t) {
            case "week":
                return e / 7 + i / 6048e5;
            case "day":
                return e + i / 864e5;
            case "hour":
                return 24 * e + i / 36e5;
            case "minute":
                return 1440 * e + i / 6e4;
            case "second":
                return 86400 * e + i / 1e3;
            case "millisecond":
                return Math.floor(864e5 * e) + i;
            default:
                throw new Error("Unknown unit " + t)
        }
    }, Rs.asMilliseconds = fs, Rs.asSeconds = gs, Rs.asMinutes = $s, Rs.asHours = _s, Rs.asDays = ys, Rs.asWeeks = vs, Rs.asMonths = ws, Rs.asQuarters = bs, Rs.asYears = ks, Rs.valueOf = function() {
        return this.isValid() ? this._milliseconds + 864e5 * this._days + this._months % 12 * 2592e6 + 31536e6 * w(this._months / 12) : NaN
    }, Rs._bubble = function() {
        var t, e, s, i, n, a = this._milliseconds,
            o = this._days,
            r = this._months,
            l = this._data;
        return 0 <= a && 0 <= o && 0 <= r || a <= 0 && o <= 0 && r <= 0 || (a += 864e5 * cs(ps(r) + o), r = o = 0), l.milliseconds = a % 1e3, t = v(a / 1e3), l.seconds = t % 60, e = v(t / 60), l.minutes = e % 60, s = v(e / 60), l.hours = s % 24, r += n = v(us(o += v(s / 24))), o -= cs(ps(n)), i = v(r / 12), r %= 12, l.days = o, l.months = r, l.years = i, this
    }, Rs.clone = function() {
        return Pe(this)
    }, Rs.get = function(t) {
        return t = I(t), this.isValid() ? this[t + "s"]() : NaN
    }, Rs.milliseconds = Ss, Rs.seconds = Ts, Rs.minutes = Ds, Rs.hours = As, Rs.days = xs, Rs.weeks = function() {
        return v(this.days() / 7)
    }, Rs.months = Ms, Rs.years = Os, Rs.humanize = function(t) {
        if (!this.isValid()) return this.localeData().invalidDate();
        var e, s, i, n, a, o, r, l, h, d, c = this.localeData(),
            u = (e = !t, s = c, i = Pe(this).abs(), n = Ys(i.as("s")), a = Ys(i.as("m")), o = Ys(i.as("h")), r = Ys(i.as("d")), l = Ys(i.as("M")), h = Ys(i.as("y")), (d = n <= Is.ss && ["s", n] || n < Is.s && ["ss", n] || a <= 1 && ["m"] || a < Is.m && ["mm", a] || o <= 1 && ["h"] || o < Is.h && ["hh", o] || r <= 1 && ["d"] || r < Is.d && ["dd", r] || l <= 1 && ["M"] || l < Is.M && ["MM", l] || h <= 1 && ["y"] || ["yy", h])[2] = e, d[3] = 0 < +this, d[4] = s, function(t, e, s, i, n) {
                return n.relativeTime(e || 1, !!s, t, i)
            }.apply(null, d));
        return t && (u = c.pastFuture(+this, u)), c.postformat(u)
    }, Rs.toISOString = Ls, Rs.toString = Ls, Rs.toJSON = Ls, Rs.locale = We, Rs.localeData = ze, Rs.toIsoString = C("toIsoString() is deprecated. Please use toISOString() instead (notice the capitals)", Ls), Rs.lang = Ve, W("X", 0, 0, "unix"), W("x", 0, 0, "valueOf"), lt("x", it), lt("X", /[+-]?\d+(\.\d{1,3})?/), ut("X", (function(t, e, s) {
        s._d = new Date(1e3 * parseFloat(t, 10))
    })), ut("x", (function(t, e, s) {
        s._d = new Date(w(t))
    })), s.version = "2.24.0", t = _e, s.fn = is, s.min = function() {
        return we("isBefore", [].slice.call(arguments, 0))
    }, s.max = function() {
        return we("isAfter", [].slice.call(arguments, 0))
    }, s.now = function() {
        return Date.now ? Date.now() : +new Date
    }, s.utc = c, s.unix = function(t) {
        return _e(1e3 * t)
    }, s.months = function(t, e) {
        return rs(t, e, "months")
    }, s.isDate = r, s.locale = Kt, s.invalid = m, s.duration = Pe, s.isMoment = y, s.weekdays = function(t, e, s) {
        return ls(t, e, s, "weekdays")
    }, s.parseZone = function() {
        return _e.apply(null, arguments).parseZone()
    }, s.localeData = ee, s.isDuration = Ce, s.monthsShort = function(t, e) {
        return rs(t, e, "monthsShort")
    }, s.weekdaysMin = function(t, e, s) {
        return ls(t, e, s, "weekdaysMin")
    }, s.defineLocale = te, s.updateLocale = function(t, e) {
        if (null != e) {
            var s, i, n = Gt;
            null != (i = Qt(t)) && (n = i._config), (s = new M(e = x(n, e))).parentLocale = Zt[t], Zt[t] = s, Kt(t)
        } else null != Zt[t] && (null != Zt[t].parentLocale ? Zt[t] = Zt[t].parentLocale : null != Zt[t] && delete Zt[t]);
        return Zt[t]
    }, s.locales = function() {
        return S(Zt)
    }, s.weekdaysShort = function(t, e, s) {
        return ls(t, e, s, "weekdaysShort")
    }, s.normalizeUnits = I, s.relativeTimeRounding = function(t) {
        return void 0 === t ? Ys : "function" == typeof t && (Ys = t, !0)
    }, s.relativeTimeThreshold = function(t, e) {
        return void 0 !== Is[t] && (void 0 === e ? Is[t] : (Is[t] = e, "s" === t && (Is.ss = e - 1), !0))
    }, s.calendarFormat = function(t, e) {
        var s = t.diff(e, "days", !0);
        return s < -6 ? "sameElse" : s < -1 ? "lastWeek" : s < 0 ? "lastDay" : s < 1 ? "sameDay" : s < 2 ? "nextDay" : s < 7 ? "nextWeek" : "sameElse"
    }, s.prototype = is, s.HTML5_FMT = {
        DATETIME_LOCAL: "YYYY-MM-DDTHH:mm",
        DATETIME_LOCAL_SECONDS: "YYYY-MM-DDTHH:mm:ss",
        DATETIME_LOCAL_MS: "YYYY-MM-DDTHH:mm:ss.SSS",
        DATE: "YYYY-MM-DD",
        TIME: "HH:mm",
        TIME_SECONDS: "HH:mm:ss",
        TIME_MS: "HH:mm:ss.SSS",
        WEEK: "GGGG-[W]WW",
        MONTH: "YYYY-MM"
    }, s
})),
/*!
 *
 *   typed.js - A JavaScript Typing Animation Library
 *   Author: Matt Boldt <me@mattboldt.com>
 *   Version: v2.0.12
 *   Url: https://github.com/mattboldt/typed.js
 *   License(s): MIT
 *
 */
function(t, e) {
    "object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? exports.Typed = e() : t.Typed = e()
}(this, (function() {
    return function(t) {
        function e(i) {
            if (s[i]) return s[i].exports;
            var n = s[i] = {
                exports: {},
                id: i,
                loaded: !1
            };
            return t[i].call(n.exports, n, n.exports, e), n.loaded = !0, n.exports
        }
        var s = {};
        return e.m = t, e.c = s, e.p = "", e(0)
    }([function(t, e, s) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = function() {
                function t(t, e) {
                    for (var s = 0; s < e.length; s++) {
                        var i = e[s];
                        i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
                    }
                }
                return function(e, s, i) {
                    return s && t(e.prototype, s), i && t(e, i), e
                }
            }(),
            n = s(1),
            a = s(3),
            o = function() {
                function t(e, s) {
                    (function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    })(this, t), n.initializer.load(this, s, e), this.begin()
                }
                return i(t, [{
                    key: "toggle",
                    value: function() {
                        this.pause.status ? this.start() : this.stop()
                    }
                }, {
                    key: "stop",
                    value: function() {
                        this.typingComplete || this.pause.status || (this.toggleBlinking(!0), this.pause.status = !0, this.options.onStop(this.arrayPos, this))
                    }
                }, {
                    key: "start",
                    value: function() {
                        this.typingComplete || this.pause.status && (this.pause.status = !1, this.pause.typewrite ? this.typewrite(this.pause.curString, this.pause.curStrPos) : this.backspace(this.pause.curString, this.pause.curStrPos), this.options.onStart(this.arrayPos, this))
                    }
                }, {
                    key: "destroy",
                    value: function() {
                        this.reset(!1), this.options.onDestroy(this)
                    }
                }, {
                    key: "reset",
                    value: function() {
                        var t = arguments.length <= 0 || void 0 === arguments[0] || arguments[0];
                        clearInterval(this.timeout), this.replaceText(""), this.cursor && this.cursor.parentNode && (this.cursor.parentNode.removeChild(this.cursor), this.cursor = null), this.strPos = 0, this.arrayPos = 0, this.curLoop = 0, t && (this.insertCursor(), this.options.onReset(this), this.begin())
                    }
                }, {
                    key: "begin",
                    value: function() {
                        var t = this;
                        this.options.onBegin(this), this.typingComplete = !1, this.shuffleStringsIfNeeded(this), this.insertCursor(), this.bindInputFocusEvents && this.bindFocusEvents(), this.timeout = setTimeout((function() {
                            t.currentElContent && 0 !== t.currentElContent.length ? t.backspace(t.currentElContent, t.currentElContent.length) : t.typewrite(t.strings[t.sequence[t.arrayPos]], t.strPos)
                        }), this.startDelay)
                    }
                }, {
                    key: "typewrite",
                    value: function(t, e) {
                        var s = this;
                        this.fadeOut && this.el.classList.contains(this.fadeOutClass) && (this.el.classList.remove(this.fadeOutClass), this.cursor && this.cursor.classList.remove(this.fadeOutClass));
                        var i = this.humanizer(this.typeSpeed),
                            n = 1;
                        return !0 === this.pause.status ? void this.setPauseStatus(t, e, !0) : void(this.timeout = setTimeout((function() {
                            e = a.htmlParser.typeHtmlChars(t, e, s);
                            var i = 0,
                                o = t.substr(e);
                            if ("^" === o.charAt(0) && /^\^\d+/.test(o)) {
                                var r = 1;
                                r += (o = /\d+/.exec(o)[0]).length, i = parseInt(o), s.temporaryPause = !0, s.options.onTypingPaused(s.arrayPos, s), t = t.substring(0, e) + t.substring(e + r), s.toggleBlinking(!0)
                            }
                            if ("`" === o.charAt(0)) {
                                for (;
                                    "`" !== t.substr(e + n).charAt(0) && (n++, !(e + n > t.length)););
                                var l = t.substring(0, e),
                                    h = t.substring(l.length + 1, e + n),
                                    d = t.substring(e + n + 1);
                                t = l + h + d, n--
                            }
                            s.timeout = setTimeout((function() {
                                s.toggleBlinking(!1), e >= t.length ? s.doneTyping(t, e) : s.keepTyping(t, e, n), s.temporaryPause && (s.temporaryPause = !1, s.options.onTypingResumed(s.arrayPos, s))
                            }), i)
                        }), i))
                    }
                }, {
                    key: "keepTyping",
                    value: function(t, e, s) {
                        0 === e && (this.toggleBlinking(!1), this.options.preStringTyped(this.arrayPos, this)), e += s;
                        var i = t.substr(0, e);
                        this.replaceText(i), this.typewrite(t, e)
                    }
                }, {
                    key: "doneTyping",
                    value: function(t, e) {
                        var s = this;
                        this.options.onStringTyped(this.arrayPos, this), this.toggleBlinking(!0), this.arrayPos === this.strings.length - 1 && (this.complete(), !1 === this.loop || this.curLoop === this.loopCount) || (this.timeout = setTimeout((function() {
                            s.backspace(t, e)
                        }), this.backDelay))
                    }
                }, {
                    key: "backspace",
                    value: function(t, e) {
                        var s = this;
                        if (!0 !== this.pause.status) {
                            if (this.fadeOut) return this.initFadeOut();
                            this.toggleBlinking(!1);
                            var i = this.humanizer(this.backSpeed);
                            this.timeout = setTimeout((function() {
                                e = a.htmlParser.backSpaceHtmlChars(t, e, s);
                                var i = t.substr(0, e);
                                if (s.replaceText(i), s.smartBackspace) {
                                    var n = s.strings[s.arrayPos + 1];
                                    n && i === n.substr(0, e) ? s.stopNum = e : s.stopNum = 0
                                }
                                e > s.stopNum ? (e--, s.backspace(t, e)) : e <= s.stopNum && (s.arrayPos++, s.arrayPos === s.strings.length ? (s.arrayPos = 0, s.options.onLastStringBackspaced(), s.shuffleStringsIfNeeded(), s.begin()) : s.typewrite(s.strings[s.sequence[s.arrayPos]], e))
                            }), i)
                        } else this.setPauseStatus(t, e, !1)
                    }
                }, {
                    key: "complete",
                    value: function() {
                        this.options.onComplete(this), this.loop ? this.curLoop++ : this.typingComplete = !0
                    }
                }, {
                    key: "setPauseStatus",
                    value: function(t, e, s) {
                        this.pause.typewrite = s, this.pause.curString = t, this.pause.curStrPos = e
                    }
                }, {
                    key: "toggleBlinking",
                    value: function(t) {
                        this.cursor && (this.pause.status || this.cursorBlinking !== t && (this.cursorBlinking = t, t ? this.cursor.classList.add("typed-cursor--blink") : this.cursor.classList.remove("typed-cursor--blink")))
                    }
                }, {
                    key: "humanizer",
                    value: function(t) {
                        return Math.round(Math.random() * t / 2) + t
                    }
                }, {
                    key: "shuffleStringsIfNeeded",
                    value: function() {
                        this.shuffle && (this.sequence = this.sequence.sort((function() {
                            return Math.random() - .5
                        })))
                    }
                }, {
                    key: "initFadeOut",
                    value: function() {
                        var t = this;
                        return this.el.className += " " + this.fadeOutClass, this.cursor && (this.cursor.className += " " + this.fadeOutClass), setTimeout((function() {
                            t.arrayPos++, t.replaceText(""), t.strings.length > t.arrayPos ? t.typewrite(t.strings[t.sequence[t.arrayPos]], 0) : (t.typewrite(t.strings[0], 0), t.arrayPos = 0)
                        }), this.fadeOutDelay)
                    }
                }, {
                    key: "replaceText",
                    value: function(t) {
                        this.attr ? this.el.setAttribute(this.attr, t) : this.isInput ? this.el.value = t : "html" === this.contentType ? this.el.innerHTML = t : this.el.textContent = t
                    }
                }, {
                    key: "bindFocusEvents",
                    value: function() {
                        var t = this;
                        this.isInput && (this.el.addEventListener("focus", (function(e) {
                            t.stop()
                        })), this.el.addEventListener("blur", (function(e) {
                            t.el.value && 0 !== t.el.value.length || t.start()
                        })))
                    }
                }, {
                    key: "insertCursor",
                    value: function() {
                        this.showCursor && (this.cursor || (this.cursor = document.createElement("span"), this.cursor.className = "typed-cursor", this.cursor.setAttribute("aria-hidden", !0), this.cursor.innerHTML = this.cursorChar, this.el.parentNode && this.el.parentNode.insertBefore(this.cursor, this.el.nextSibling)))
                    }
                }]), t
            }();
        e.default = o, t.exports = e.default
    }, function(t, e, s) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var i = Object.assign || function(t) {
                for (var e = 1; e < arguments.length; e++) {
                    var s = arguments[e];
                    for (var i in s) Object.prototype.hasOwnProperty.call(s, i) && (t[i] = s[i])
                }
                return t
            },
            n = function() {
                function t(t, e) {
                    for (var s = 0; s < e.length; s++) {
                        var i = e[s];
                        i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
                    }
                }
                return function(e, s, i) {
                    return s && t(e.prototype, s), i && t(e, i), e
                }
            }(),
            a = function(t) {
                return t && t.__esModule ? t : {
                    default: t
                }
            }(s(2)),
            o = function() {
                function t() {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, t)
                }
                return n(t, [{
                    key: "load",
                    value: function(t, e, s) {
                        if (t.el = "string" == typeof s ? document.querySelector(s) : s, t.options = i({}, a.default, e), t.isInput = "input" === t.el.tagName.toLowerCase(), t.attr = t.options.attr, t.bindInputFocusEvents = t.options.bindInputFocusEvents, t.showCursor = !t.isInput && t.options.showCursor, t.cursorChar = t.options.cursorChar, t.cursorBlinking = !0, t.elContent = t.attr ? t.el.getAttribute(t.attr) : t.el.textContent, t.contentType = t.options.contentType, t.typeSpeed = t.options.typeSpeed, t.startDelay = t.options.startDelay, t.backSpeed = t.options.backSpeed, t.smartBackspace = t.options.smartBackspace, t.backDelay = t.options.backDelay, t.fadeOut = t.options.fadeOut, t.fadeOutClass = t.options.fadeOutClass, t.fadeOutDelay = t.options.fadeOutDelay, t.isPaused = !1, t.strings = t.options.strings.map((function(t) {
                                return t.trim()
                            })), "string" == typeof t.options.stringsElement ? t.stringsElement = document.querySelector(t.options.stringsElement) : t.stringsElement = t.options.stringsElement, t.stringsElement) {
                            t.strings = [], t.stringsElement.style.display = "none";
                            var n = Array.prototype.slice.apply(t.stringsElement.children),
                                o = n.length;
                            if (o)
                                for (var r = 0; r < o; r += 1) {
                                    var l = n[r];
                                    t.strings.push(l.innerHTML.trim())
                                }
                        }
                        for (var r in t.strPos = 0, t.arrayPos = 0, t.stopNum = 0, t.loop = t.options.loop, t.loopCount = t.options.loopCount, t.curLoop = 0, t.shuffle = t.options.shuffle, t.sequence = [], t.pause = {
                                status: !1,
                                typewrite: !0,
                                curString: "",
                                curStrPos: 0
                            }, t.typingComplete = !1, t.strings) t.sequence[r] = r;
                        t.currentElContent = this.getCurrentElContent(t), t.autoInsertCss = t.options.autoInsertCss, this.appendAnimationCss(t)
                    }
                }, {
                    key: "getCurrentElContent",
                    value: function(t) {
                        return t.attr ? t.el.getAttribute(t.attr) : t.isInput ? t.el.value : "html" === t.contentType ? t.el.innerHTML : t.el.textContent
                    }
                }, {
                    key: "appendAnimationCss",
                    value: function(t) {
                        var e = "data-typed-js-css";
                        if (t.autoInsertCss && (t.showCursor || t.fadeOut) && !document.querySelector("[" + e + "]")) {
                            var s = document.createElement("style");
                            s.type = "text/css", s.setAttribute(e, !0);
                            var i = "";
                            t.showCursor && (i += "\n        .typed-cursor{\n          opacity: 1;\n        }\n        .typed-cursor.typed-cursor--blink{\n          animation: typedjsBlink 0.7s infinite;\n          -webkit-animation: typedjsBlink 0.7s infinite;\n                  animation: typedjsBlink 0.7s infinite;\n        }\n        @keyframes typedjsBlink{\n          50% { opacity: 0.0; }\n        }\n        @-webkit-keyframes typedjsBlink{\n          0% { opacity: 1; }\n          50% { opacity: 0.0; }\n          100% { opacity: 1; }\n        }\n      "), t.fadeOut && (i += "\n        .typed-fade-out{\n          opacity: 0;\n          transition: opacity .25s;\n        }\n        .typed-cursor.typed-cursor--blink.typed-fade-out{\n          -webkit-animation: 0;\n          animation: 0;\n        }\n      "), 0 !== s.length && (s.innerHTML = i, document.body.appendChild(s))
                        }
                    }
                }]), t
            }();
        e.default = o;
        var r = new o;
        e.initializer = r
    }, function(t, e) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        e.default = {
            strings: ["These are the default values...", "You know what you should do?", "Use your own!", "Have a great day!"],
            stringsElement: null,
            typeSpeed: 0,
            startDelay: 0,
            backSpeed: 0,
            smartBackspace: !0,
            shuffle: !1,
            backDelay: 700,
            fadeOut: !1,
            fadeOutClass: "typed-fade-out",
            fadeOutDelay: 500,
            loop: !1,
            loopCount: 1 / 0,
            showCursor: !0,
            cursorChar: "|",
            autoInsertCss: !0,
            attr: null,
            bindInputFocusEvents: !1,
            contentType: "html",
            onBegin: function(t) {},
            onComplete: function(t) {},
            preStringTyped: function(t, e) {},
            onStringTyped: function(t, e) {},
            onLastStringBackspaced: function(t) {},
            onTypingPaused: function(t, e) {},
            onTypingResumed: function(t, e) {},
            onReset: function(t) {},
            onStop: function(t, e) {},
            onStart: function(t, e) {},
            onDestroy: function(t) {}
        }, t.exports = e.default
    }, function(t, e) {
        "use strict";
        Object.defineProperty(e, "__esModule", {
            value: !0
        });
        var s = function() {
                function t(t, e) {
                    for (var s = 0; s < e.length; s++) {
                        var i = e[s];
                        i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
                    }
                }
                return function(e, s, i) {
                    return s && t(e.prototype, s), i && t(e, i), e
                }
            }(),
            i = function() {
                function t() {
                    ! function(t, e) {
                        if (!(t instanceof e)) throw new TypeError("Cannot call a class as a function")
                    }(this, t)
                }
                return s(t, [{
                    key: "typeHtmlChars",
                    value: function(t, e, s) {
                        if ("html" !== s.contentType) return e;
                        var i = t.substr(e).charAt(0);
                        if ("<" === i || "&" === i) {
                            var n;
                            for (n = "<" === i ? ">" : ";"; t.substr(e + 1).charAt(0) !== n && !(++e + 1 > t.length););
                            e++
                        }
                        return e
                    }
                }, {
                    key: "backSpaceHtmlChars",
                    value: function(t, e, s) {
                        if ("html" !== s.contentType) return e;
                        var i = t.substr(e).charAt(0);
                        if (">" === i || ";" === i) {
                            var n;
                            for (n = ">" === i ? "<" : "&"; t.substr(e - 1).charAt(0) !== n && !(--e < 0););
                            e--
                        }
                        return e
                    }
                }]), t
            }();
        e.default = i;
        var n = new i;
        e.htmlParser = n
    }])
})),
function(t) {
    var e;
    if ("function" == typeof define && define.amd && (define(t), e = !0), "object" == typeof exports && (module.exports = t(), e = !0), !e) {
        var s = window.Cookies,
            i = window.Cookies = t();
        i.noConflict = function() {
            return window.Cookies = s, i
        }
    }
}((function() {
    function t() {
        for (var t = 0, e = {}; t < arguments.length; t++) {
            var s = arguments[t];
            for (var i in s) e[i] = s[i]
        }
        return e
    }

    function e(t) {
        return t.replace(/(%[0-9A-Z]{2})+/g, decodeURIComponent)
    }
    return function s(i) {
        function n() {}

        function a(e, s, a) {
            if ("undefined" != typeof document) {
                "number" == typeof(a = t({
                    path: "/"
                }, n.defaults, a)).expires && (a.expires = new Date(1 * new Date + 864e5 * a.expires)), a.expires = a.expires ? a.expires.toUTCString() : "";
                try {
                    var o = JSON.stringify(s);
                    /^[\{\[]/.test(o) && (s = o)
                } catch (t) {}
                s = i.write ? i.write(s, e) : encodeURIComponent(s + "").replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), e = encodeURIComponent(e + "").replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent).replace(/[\(\)]/g, escape);
                var r = "";
                for (var l in a) a[l] && (r += "; " + l, !0 !== a[l] && (r += "=" + a[l].split(";")[0]));
                return document.cookie = e + "=" + s + r
            }
        }

        function o(t, s) {
            if ("undefined" != typeof document) {
                for (var n = {}, a = document.cookie ? document.cookie.split("; ") : [], o = 0; o < a.length; o++) {
                    var r = a[o].split("="),
                        l = r.slice(1).join("=");
                    s || '"' !== l.charAt(0) || (l = l.slice(1, -1));
                    try {
                        var h = e(r[0]);
                        if (l = (i.read || i)(l, h) || e(l), s) try {
                            l = JSON.parse(l)
                        } catch (t) {}
                        if (n[h] = l, t === h) break
                    } catch (t) {}
                }
                return t ? n[t] : n
            }
        }
        return n.set = a, n.get = function(t) {
            return o(t, !1)
        }, n.getJSON = function(t) {
            return o(t, !0)
        }, n.remove = function(e, s) {
            a(e, "", t(s, {
                expires: -1
            }))
        }, n.defaults = {}, n.withConverter = s, n
    }((function() {}))
}));
class HYAccount {
    constructor(t, {
        cloudApi: e,
        storeApi: s
    }) {
        this.$el = t, this._cloudApi = e, this._cloudApi.on("user", this._onUser.bind(this)), this._cloudApi.on("addresses", this._onAddresses.bind(this)), this._storeApi = s, this._storeApi.on("cart", this._onCart.bind(this)), this._storeApiReady = new Promise(t => {
            this._storeApiReadyResolve = t
        }), this._section = this.$el.attr("data-account-section"), this._init()
    }
    _init() {
        "overview" === this._section ? this._initOverview() : "orders" === this._section ? this._initOrders() : "backups" === this._section ? this._initBackups() : "subscriptions" === this._section ? this._initSubscriptions() : "addresses" === this._section ? this._initAddresses() : "devices" === this._section ? this._initDevices() : "sessions" === this._section && this._initSessions()
    }
    showLoading() {
        this.$el.addClass("loading")
    }
    hideLoading() {
        this.$el.removeClass("loading")
    }
    setError(t) {
        console.error(t), alert(t.message || t.toString())
    }
    _onUser(t) {
        this._user !== t && (this._user = t, this._init()), this._user && (this.$el.find("[data-authenticated-href]").each((function() {
            $(this).attr("href", $(this).attr("data-authenticated-href").replace("USERID", t._id))
        })), this.$el.find("[data-user-name]").each((function() {
            $(this).text(t.fullname)
        })), this.$el.find("[data-user-email]").each((function() {
            $(this).text(t.email)
        })))
    }
    _onCart(t) {
        this._storeApiReadyResolve()
    }
    _initOverview() {
        this._user && this._user.otpEnabled ? (this.$el.find("#2fa-enabled").show(), this.$el.find("#2fa-disabled").hide()) : (this.$el.find("#2fa-enabled").hide(), this.$el.find("#2fa-disabled").show())
    }
    _initOrders() {
        this.showLoading(), this._storeApiReady.then(async() => {
            if (!this._user) return this.hideLoading();
            const t = await this._storeApi.getOrders(),
                e = this.$el.find(".orders tbody");
            e.html(""), t.forEach(t => {
                const s = $("<tr>");
                s.appendTo(e);
                const i = $("<td>");
                i.addClass("subtle"), i.text(t.id), i.appendTo(s);
                const n = $("<td>");
                n.addClass("text-align-right text-nowrap"), n.html(formatPrice(t.total_total, t.currency_symbol, {
                    alwaysShowDecimals: !0
                })), n.appendTo(s);
                const a = new Date(t.date),
                    o = $("<td>"),
                    r = a.getMonth() + 1,
                    l = (a.getMinutes() < 10 ? "0" : "") + a.getMinutes();
                o.attr("title", t.date), o.html(`${a.getDate()}/${r}/${a.getFullYear()}<br/>${a.getHours()}:${l}`), o.appendTo(s);
                const h = $("<td>");
                if (h.text(_p("state." + t.state)), h.appendTo(s), "completed" === t.state) {
                    const e = $("<td>");
                    e.appendTo(s);
                    const i = [];
                    Array.isArray(t.shipping_url) ? t.shipping_url.forEach(t => {
                        t.split(";;;").forEach(t => {
                            t.startsWith("http") && i.push(t)
                        })
                    }) : "string" == typeof t.shipping_url && t.shipping_url.startsWith("http") && i.push(t.shipping_url), i.forEach(t => {
                        const s = $("<a>");
                        s.addClass("link link-arrow link-blue text-nowrap"), s.attr("href", t), s.text(_p("track_trace")), s.appendTo(e)
                    })
                } else h.attr("colspan", 2);
                const d = $("<td>");
                if (d.addClass("text-align-right"), d.appendTo(s), "pending" === t.state) {
                    const e = $("<a>");
                    e.text(_p("pay")), e.addClass("button button__green button__next"), e.click(() => {
                        e.hasClass("button__loading") || (e.addClass("button__loading"), this._storeApi.payOrder({
                            orderId: String(t.id)
                        }).then(t => {
                            window.location.href = t
                        }))
                    }), e.appendTo(d)
                } else if (t.pdf) {
                    const e = $("<a>");
                    e.text(_p("download_invoice")), e.addClass("link link-blue invoice text-nowrap"), e.attr("href", "#"), e.click(() => {
                        this._storeApi.getOrder({
                            orderId: String(t.id)
                        }).then(t => {
                            window.open(t.pdf)
                        }).catch(t => {
                            alert(t.message || t.toString())
                        })
                    }), e.appendTo(d)
                }
            }), this.hideLoading()
        }).catch(t => {
            this.setError(t)
        })
    }
    _initBackups() {
        this.showLoading(), this._storeApiReady.then(async() => {
            if (!this._user) return this.hideLoading();
            const t = new AthomBackupAPI,
                e = await this._cloudApi.createDelegationToken({
                    audience: "backup"
                }),
                s = await t.getMyBackups({
                    token: e
                }),
                i = {};
            s.forEach(t => {
                i[t.homeyId] = i[t.homeyId] || {
                    name: t.homeyName,
                    backups: []
                }, i[t.homeyId].backups.push(t)
            });
            const n = this.$el.find(".backups");
            n.html(""), Object.keys(i).forEach(e => {
                const s = i[e].backups.sort((t, e) => new Date(e.createdAt).getTime() - new Date(t.createdAt).getTime()),
                    a = s[0].homeyName,
                    o = $("<div />");
                o.addClass("backup widget-card padding-2 margin-bottom-2"), o.appendTo(n);
                const r = $("<h2 />");
                r.text(a), r.attr("title", "Homey ID: " + e), r.appendTo(o);
                const l = $("<table />");
                l.addClass("widget-table"), l.appendTo(o);
                const h = $("<thead />");
                h.appendTo(l);
                const d = $("<tr />");
                d.appendTo(h);
                const c = $("<th />");
                c.text(_p("backup.version")), c.appendTo(d);
                const u = $("<th />");
                u.text(_p("backup.date")), u.appendTo(d);
                $("<th />").appendTo(d);
                const p = $("<tbody />");
                p.appendTo(l), s.forEach(e => {
                    const s = $("<tr />");
                    s.appendTo(p);
                    const i = $("<td />");
                    i.text("v" + e.version), i.attr("title", e.homeyName), i.appendTo(s);
                    const n = $("<td />");
                    n.attr("title", e.createdAt), n.text(moment(e.createdAt).format("DD-MM-YYYY HH:mm:ss")), n.appendTo(s);
                    const a = $("<td />");
                    a.appendTo(s);
                    const o = $("<div />");
                    o.addClass("float-right button button__red button__shadow"), o.text(_p("delete.button")), o.appendTo(a), o.click(() => {
                        confirm(_p("delete.confirm")) && Promise.resolve().then(async() => {
                            const s = await this._cloudApi.createDelegationToken({
                                audience: "backup"
                            });
                            this.showLoading(), await t.deleteMyBackup({
                                token: s,
                                backupId: e.backupId,
                                homeyId: e.homeyId
                            }), this._initBackups()
                        }).catch(t => {
                            alert(t.message || t.toString())
                        })
                    })
                })
            }), this.hideLoading()
        }).catch(t => {
            this.setError(t)
        })
    }
    _initSubscriptions() {
        if (this.showLoading(), void 0 !== this._user && this.hideLoading(), this._user) {
            const {
                subscriptions: t
            } = this._user, e = Object.keys(t).some(t => t.startsWith("homey_plus_")), s = Object.keys(t).some(t => t.startsWith("homey_premium_")), i = Object.keys(t).some(t => t.startsWith("homey_developer_"));
            if (this.$el.find('[data-hy-subscription-show="homey_plus"]').toggle(e), this.$el.find('[data-hy-subscription-show="homey_premium"]').toggle(s), this.$el.find('[data-hy-subscription-show="homey_developer"]').toggle(i), e || s || i || this.$el.find('[data-hy-subscription-show="no_subscriptions"]').addClass("is-active"), s) {
                let e;
                Object.keys(t).filter(t => t.startsWith("homey_premium_")).forEach(s => {
                    (!e || e.expiresAt > t[s].expiresAt) && (e = t[s], e.provider = s.replace("homey_premium_", ""))
                });
                const s = $("<p />");
                if (s.text(_p("active_renew_" + !!e.autoRenew, {
                        expiresAt: moment(e.expiresAt).format("DD-MM-YYYY")
                    })), $('[data-hy-subscription-content="homey_premium"]').append(s), e.provider.includes("apple")) {
                    const t = $("<p />");
                    t.text(_p("manage_apple")), $('[data-hy-subscription-content="homey_premium"]').append(t)
                } else if (e.provider.includes("google")) {
                    const t = $("<p />");
                    t.text(_p("manage_google")), $('[data-hy-subscription-content="homey_premium"]').append(t)
                }
            }
            if (e) {
                let e;
                Object.keys(t).filter(t => t.startsWith("homey_plus_")).forEach(s => {
                    (!e || e.expiresAt > t[s].expiresAt) && (e = t[s], e.provider = s.replace("homey_plus_", ""))
                });
                const s = $("<p />");
                if (s.text(_p("active_renew_" + !!e.autoRenew, {
                        expiresAt: moment(e.expiresAt).format("DD-MM-YYYY")
                    })), $('[data-hy-subscription-content="homey_plus"]').append(s), e.provider.includes("apple")) {
                    const t = $("<p />");
                    t.text(_p("manage_apple")), t.insertAfter(s)
                } else if (e.provider.includes("google")) {
                    const t = $("<p />");
                    t.text(_p("manage_google")), t.insertAfter(s)
                }
            }
            if (i) {
                let e;
                Object.keys(t).filter(t => t.startsWith("homey_developer_athom")).forEach(s => {
                    (!e || e.expiresAt > t[s].expiresAt) && (e = t[s], e.provider = s.replace("homey_developer_", ""))
                });
                const s = $("<p />");
                s.text(_p("active_renew_" + !!e.autoRenew, {
                    expiresAt: moment(e.expiresAt).format("DD-MM-YYYY")
                })), $('[data-hy-subscription-content="homey_developer"]').append(s)
            }
        }
    }
    _initDevices() {
        if (this.showLoading(), void 0 !== this._user && this.hideLoading(), this._user) {
            const {
                homeys: t,
                devices: e
            } = this._user, s = this.$el.find(".devices");
            s.html(""), t.forEach(t => {
                if ("owner" !== t.role) return;
                if ("local" !== t.platform) return;
                const e = {
                    desktop: "Desktop",
                    homey1s: "Homey (Early 2016)",
                    homey1d: "Super Homey (Early 2016)",
                    homey1q: "Super Homey (Early 2016)",
                    homey2s: "Homey (Early 2018)",
                    homey2d: "Super Homey (Early 2018)",
                    homey2q: "Super Homey (Early 2018)",
                    homey3s: "Homey (Early 2019)",
                    homey3d: "Homey Pro (Early 2019)"
                }[t.model] || "Homey";
                s.append(`\n          <div class="col-sm-6 col-lg-4">\n            <div class="device padding-2 margin-bottom-2">\n              <img class="image" src="/img/pages/account/devices/homey-pro.png" />\n              <span class="name">${t.name}</span>\n              <span class="info-extra">Homey v${t.softwareVersion}</span>\n              <span class="info">${e}</span>\n            </div>\n          </div>\n        `)
            }), t.forEach(t => {
                "owner" === t.role && "cloud" === t.platform && t.bridges.forEach(e => {
                    const i = e.serial.replace(/\:/g, "").toUpperCase().substring(0, 12);
                    s.append(`\n            <div class="col-sm-6 col-lg-4">\n              <div class="device padding-2 margin-bottom-2">\n                <img class="image" src="/img/pages/account/devices/homey-bridge.png" />\n                <span class="name">Homey Bridge</span>\n                <span class="info-extra">S/N: ${i}</span>\n                <span class="info">${t.name}</span>\n              </div>\n            </div>\n          `)
                })
            }), 0 === s.children().length && s.append('\n          <div class="widget-card padding-2 col-12 text-center text-muted">\n            You don\'t own any devices yet.\n          </div>\n        ')
        }
    }
    async _deleteAddress({
        addressId: t
    }) {
        this._cloudApi && (this.showLoading(), await this._cloudApi.deleteUserAddress({
            addressId: t
        }).catch(t => {
            this.hideLoading(), this.setError(t)
        }), await this._initAddresses())
    }
    async _initAddresses() {
        this._cloudApi && (this.showLoading(), this._storeApiReady.then(async() => {
            await this._cloudApi.getUserAddresses(), this.hideLoading()
        }).catch(t => {
            this.hideLoading(), this.setError(t)
        }))
    }
    _onAddresses(t) {
        const e = this.$el.find(".addresses");
        if (e.html(""), null == t || 0 === t.length) {
            const t = $('<div class="col-sm-12 margin-bottom-2 position-relative"></div>');
            t.appendTo(e);
            const s = $('<div class="widget-card address-card padding-2 "></div>');
            s.appendTo(t);
            const i = $('<h3 class="name"></h3>');
            i.appendTo(s), i.text(_p("addresses.empty"));
            const n = $("<div></div>");
            n.appendTo(s), n.text(_p("addresses.empty_description"))
        } else t.forEach(t => {
            const s = $('<div class="col-sm-12 margin-bottom-2 position-relative"></div>');
            s.appendTo(e);
            const i = $('<div class="widget-card address-card padding-2 "></div>');
            i.appendTo(s);
            const n = $('<h3 class="name"></h3>');
            n.appendTo(i), n.text(`${t.firstname||""} ${t.lastname||""}`);
            const a = $("<div></div>");
            a.appendTo(i), a.text(`${t.street||""} ${t.number||""} ${t.extra||""}`);
            const o = $("<div></div>");
            o.appendTo(i), o.text(`${t.state||""} ${t.zipcode||""} ${t.city||""} ${t.country||""}`);
            const r = $('<div class="remove">');
            r.click(async() => {
                await this._deleteAddress({
                    addressId: t._id
                }).catch(console.error)
            }), r.appendTo(i)
        })
    }
    _initSessions() {
        if (this.showLoading(), this._user) {
            const t = this.$el.find(".sessions");
            t.html(""), this._cloudApi.getUserSessions().then(async e => {
                e.sort((t, e) => t.clientName.localeCompare(e.clientName)), e.forEach(e => {
                    const s = $("<tr />");
                    s.addClass("session"), s.appendTo(t);
                    const i = $("<td>");
                    i.appendTo(s);
                    const n = $("<img />");
                    n.addClass("m-2"), n.css({
                        borderRadius: 5
                    }), n.attr("src", e.clientImage || "/img/pages/account/sessions/placeholder.png"), n.attr("width", 30), n.appendTo(i);
                    const a = $('<td width="100%">');
                    a.text(e.clientName), a.appendTo(s);
                    const o = $("<td>");
                    o.appendTo(s);
                    const r = $("<div />");
                    r.addClass("float-right button button__red button__shadow"), r.text(_p("delete.button")), r.appendTo(o), r.click(() => {
                        confirm(_p("delete.confirm")) && Promise.resolve().then(async() => {
                            const t = e.clientId;
                            await this._cloudApi.deleteUserSession({
                                sessionId: e.clientId
                            }), s.remove(), t === ATHOM_API_CLIENT_ID && this._cloudApi.logout()
                        }).catch(t => {
                            console.error(t), alert(t.message || t.toString())
                        })
                    })
                })
            }).catch(t => {
                console.error(t), alert(t.message || t.toString())
            }).finally(() => this.hideLoading())
        } else this.hideLoading()
    }
}
class HYApp {
    constructor(t, {
        cloudApi: e
    }) {
        this.$el = t, this.$install = this.$el.find("[data-hy-app-install]"), this.$install.click(this.onShowInstallDialog.bind(this)), this.$installDialog = this.$el.find(".install-dialog"), this.$installDialog.click(this.onHideInstallDialog.bind(this)), this.$installDialogInner = this.$installDialog.find(".install-dialog-inner"), this.$installDialogInner.click(t => t.stopPropagation()), this.$installDialogWarningIncompatible = this.$installDialog.find(".warning.platform-incompatible"), this.$installDialogError = this.$installDialog.find(".error"), this.$installDialogSuccess = this.$installDialog.find(".success"), this.$installDialogClose = this.$installDialog.find(".close"), this.$installDialogClose.click(this.onHideInstallDialog.bind(this)), this.$installDialogInstall = this.$installDialog.find(".button"), this.$installDialogInstall.click(this.onInstall.bind(this)), this.$installDialogHomeySelector = this.$installDialog.find(".homey-selector"), this.$installDialogHomeySelector.on("change", t => {
            const e = t.target.value,
                s = this.user.homeys.find(t => t._id === e);
            s && (this.appPlatforms.includes(s.platform) ? (this.$installDialogWarningIncompatible.hide(), this.$installDialogInstall.removeClass("button__disabled")) : (this.$installDialogWarningIncompatible.show(), this.$installDialogInstall.addClass("button__disabled")))
        }), this.$reviews = this.$el.find(".app-reviews"), this.$reviewsWrite = this.$reviews.find(".reviews-write"), this.$description = this.$el.find(".description"), this.$expand = this.$description.find(".expand"), this.$expand.click(this.onToggleDescription.bind(this)), this.$el.on("click", ".app-reviews [data-hy-review]", this.onShowReviewBox.bind(this)), this.$el.on("click", ".app-reviews .delete", this.onDeleteReview.bind(this)), this.$el.on("click", ".reviews-write .submit", this.onSubmitReview.bind(this)), this.$el.on("click", ".rating-editable .star", this.onRatingEditableClick.bind(this)), this.$el.on("mouseover", ".rating-editable .star", this.onRatingEditableMouseover.bind(this)), this.$el.on("mouseleave", ".rating-editable .star", this.onRatingEditableMouseleave.bind(this)), this.cloudApi = e, this.cloudApi.on("user", this.onUser.bind(this)), this.cloudApi.on("api", this.onCloudApi.bind(this)), this.appId = this.$el.data("hy-app-id"), this.appVersion = this.$el.data("hy-app-version"), this.appChannel = this.$el.data("hy-app-channel"), this.appPlatforms = this.$el.data("hy-app-platforms").split(","), this.user = null
    }
    onRatingEditableClick(t) {
        const e = $(t.target).parents(".rating-editable"),
            s = $(".reviews-form__bug"),
            i = $(t.target).index();
        e.attr("data-rating", i + 1), s.attr("data-rating", i + 1), e.find(".actual").css({
            width: (i + 1) / 5 * 100 + "%"
        })
    }
    onRatingEditableMouseover(t) {
        const e = $(t.target).parents(".rating-editable"),
            s = $(t.target).index();
        e.find(".actual").css({
            width: (s + 1) / 5 * 100 + "%"
        })
    }
    onRatingEditableMouseleave(t) {
        const e = $(t.target).parents(".rating-editable");
        e[0].hasAttribute("data-rating") ? e.find(".actual").css({
            width: parseInt(e.attr("data-rating")) / 5 * 100 + "%"
        }) : e.find(".actual").css({
            width: 0
        })
    }
    onUser(t) {
        this.user = t, this.user && (this.$installDialogHomeySelector.find("option").remove(), this.$installDialogInstall.removeClass("button__disabled"), this.user.homeys.forEach(t => {
            t.platform = t.platform || "local";
            const e = $("<option />");
            e.text(t.name), e.val(t._id), e.appendTo(this.$installDialogHomeySelector), e.toggleClass("platform-compatible", this.appPlatforms.includes(t.platform));
            const s = t.apps.find(t => t.id === this.appId);
            s && (this.installedApp = s, this.$reviewsWrite.addClass("installed"))
        }), this.$installDialogHomeySelector.find("option").removeAttr("selected"), this.$installDialogHomeySelector.find("option.platform-compatible").first().attr("selected", !0), this.$installDialogHomeySelector.trigger("change"), this.showInstallDialogAfterOnUser && (delete this.showInstallDialogAfterOnUser, this.onShowInstallDialog()))
    }
    onCloudApi() {
        this.appsApi = new AthomAppsAPI({
            baseUrl: ATHOM_APPS_API_URL
        });
        const t = new HYIntersectionObserver({
                thresholds: 0
            }),
            e = $("[data-app-reviews]")[0];
        t.addTarget(e, (s, i) => {
            s.isIntersecting && (this._getReviews(), t.removeTarget(e))
        });
        let s = !1;
        $('[data-popup-open="app-changelog"]').on("click", () => {
            s || (this._getChangelog(), s = !0)
        })
    }
    onShowInstallDialog(t) {
        if (t && t.preventDefault(), !this.user) return this.showInstallDialogAfterOnUser = !0, this.cloudApi.login();
        const e = this.$installDialogHomeySelector.val(),
            s = this.user.homeys.find(t => t._id === e);
        s && (this.appPlatforms.includes(s.platform) ? (this.$installDialogWarningIncompatible.hide(), this.$installDialogInstall.removeClass("button__disabled")) : (this.$installDialogWarningIncompatible.show(), this.$installDialogInstall.addClass("button__disabled")), this.$installDialog.addClass("visible"))
    }
    onHideInstallDialog() {
        this.$installDialog.removeClass("visible"), this.$installDialogSuccess.removeClass("visible")
    }
    onInstall(t) {
        if (t.preventDefault(), this.$installDialogInstall.hasClass("button__disabled")) return;
        const e = $(t.target);
        if (e.hasClass("button__loading")) return;
        e.addClass("button__loading"), this.$installDialogError.text("").removeAttr("title");
        const s = this.$installDialogHomeySelector.val();
        this.user.getHomeyById(s).authenticate({
            strategy: ["localSecure", "cloud"]
        }).then(async t => {
            let e = "stable";
            "test" === this.appChannel && (e = "beta"), await t.apps.installFromAppStore({
                channel: e,
                id: this.appId
            }), this.$installDialogSuccess.addClass("visible")
        }).catch(t => {
            console.error(t), this.$installDialogError.text(t.cause && (t.cause.error_description || t.cause.error) || t.message || t.toString()).attr("title", t.message || t.toString())
        }).then(() => {
            e.removeClass("button__loading")
        })
    }
    onToggleDescription() {
        this.$description.toggleClass("expanded")
    }
    onShowReviewBox(t) {
        if (t && t.preventDefault(), !this.user) return this.cloudApi.login();
        this.$reviewsWrite.addClass("visible")
    }
    onSubmitReview(t) {
        if (t && t.preventDefault(), !this.installedApp) return alert("App not installed!");
        const e = this.$el.find(".reviews-write .rating").data("rating"),
            s = this.$el.find(".reviews-write .comment").val(),
            i = this.installedApp.version;
        return "number" != typeof e ? alert("missing rating") : !s || s.length < 3 ? alert("missing comment") : void($(t.target).hasClass("button__loading") || ($(t.target).addClass("button__loading"), Promise.resolve().then(async() => {
            const t = await this.cloudApi.createDelegationToken({
                audience: "apps"
            });
            await this.appsApi.updateReview({
                rating: e,
                comment: s,
                version: i,
                appId: this.appId,
                $headers: {
                    Authorization: "Bearer " + t
                }
            }), this._getReviews()
        }).catch(t => {
            console.error(t), alert(t)
        }).then(() => {
            $(t.target).removeClass("button__loading"), this.$reviewsWrite.addClass("thank-you")
        })))
    }
    onDeleteReview() {
        Promise.resolve().then(async() => {
            const t = await this.cloudApi.createDelegationToken({
                audience: "apps"
            });
            await this.appsApi.deleteReview({
                appId: this.appId,
                $headers: {
                    Authorization: "Bearer " + t
                }
            }), this._getReviews()
        }).catch(t => {
            console.error(t), alert(t)
        })
    }
    _getReviews() {
        this.appsApi.getReviews({
            appId: this.appId
        }).then(t => {
            this.$reviews.find(".review").remove(), this.$reviews.attr("data-count", t.length), t.forEach((e, s) => {
                const i = $("<div />");
                i.addClass("review"), this.$reviews.find(".reviews-inner").prepend(i);
                const n = $("<div />");
                n.addClass("rating"), n.appendTo(i);
                const a = $("<div />");
                a.addClass("background"), a.appendTo(n);
                for (let t = 0; t < 5; t++) {
                    const t = $("<span />");
                    t.addClass("star"), t.text("★"), t.appendTo(a)
                }
                const o = $("<div />");
                o.addClass("actual"), o.css({
                    width: e.rating / 5 * 100 + "%"
                }), o.appendTo(n);
                for (let t = 0; t < 5; t++) {
                    const t = $("<span />");
                    t.addClass("star"), t.text("★"), t.appendTo(o)
                }
                const r = $("<div />");
                r.addClass("name"), r.text(e.userName), r.appendTo(i);
                const l = $("<div />");
                if (l.addClass("comment"), l.text(e.comment), l.appendTo(i), e.response) {
                    const t = $("<div />");
                    t.addClass("response"), t.text(_p("reviews.developer") + ": " + e.response), t.appendTo(i)
                }
                if (this.user && e.userId === this.user._id) {
                    const t = $("<div />");
                    t.addClass("delete"), t.appendTo(i), t.click(t => {
                        t.preventDefault(), this.onDeleteReview()
                    })
                }
                if (e.version !== this.appVersion) {
                    const t = $("<div />");
                    t.addClass("old"), t.attr("title", "v" + e.version), t.text(_p("reviews.old")), t.appendTo(i)
                }
                setTimeout(() => {
                    i.addClass("visible")
                }, 100 * (t.length - s))
            })
        }).catch(t => {
            console.error(t)
        })
    }
    _getChangelog() {
        "function" == typeof this.appsApi.getAppChangelog && this.appsApi.getAppChangelog({
            appId: this.appId
        }).then(t => {
            const e = $("<dl>");
            Object.entries(t).forEach(([t, s]) => {
                if (s.createdAt) {
                    const i = $('<dt class="version">').text(t),
                        n = $('<dd class="text">').text(_i(s.changelog)),
                        a = $('<dd class="date">').text(new Date(s.createdAt).toLocaleDateString(void 0, {
                            year: "numeric",
                            month: "short",
                            day: "numeric"
                        }));
                    if (e.prepend(i, a, n), ["test", "in_review", "reviewed_accepted", "reviewed_rejected"].includes(s.state)) {
                        const t = $('<a class="beta" href="./test/">test</a>');
                        a.after(t)
                    }
                } else {
                    const i = $("<dt>").text(t),
                        n = $("<dd>").text(_i(s));
                    e.prepend(i, n)
                }
            }), $("[data-app-changelog]").append(e)
        }).catch(t => {
            console.error(t)
        })
    }
}
class HYApps {
    constructor(t, {
        nav: e
    }) {
        this.$el = t, this.$highlight = this.$el.find(".highlight"), this.$highlight.slick({
            dots: !0,
            variableWidth: !0,
            infinite: !0,
            responsive: [{
                breakpoint: 768,
                settings: {
                    centerMode: !0
                }
            }]
        }), this.$search = this.$el.find(".search"), this.$search.click(t => {
            t.preventDefault(), t.stopPropagation(), e.search.show()
        })
    }
}
class HYAppsBrowse {
    constructor(t, {
        cloudApi: e
    }) {
        this._UID, this._FETCHSTATUS, this.template = {
            results: $('[data-template="results"]')[0],
            noresults: $('[data-template="noresults"]')[0],
            loading: $('[data-template="loading"]')[0],
            error: $('[data-template="error"]')[0]
        }, this.component = {
            app: $('[data-component="app"]')[0],
            appDummy: $('[data-component="app-dummy"]')[0],
            tag: $('[data-component="tag"]')[0]
        }, this.request = {
            $timeout: 3e4,
            query: void 0,
            language: void 0,
            platform: void 0,
            connectivity: void 0,
            category: void 0,
            offset: void 0,
            limit: void 0
        }, this._results = {
            itemsLoadedCount: null,
            total: void 0,
            query: void 0,
            platform: void 0,
            connectivity: void 0,
            category: void 0
        }, this.Filter = {
            CATEGORY: "category",
            CONNECTIVITY: "connectivity",
            QUERY: "query",
            PLATFORM: "platform"
        }, this.Status = {
            INIT: "init",
            LOADING: "loading",
            LOADING_NEXT: "loading_next",
            ERROR: "error",
            DONE: "done"
        }, this.Platform = {
            CLOUD: "cloud",
            LOCAL: "local"
        }, this.settings = {
            itemsPerRequest: 12,
            searchDelay: 200,
            localStoragePlatformKey: "homey-platform",
            nextPageOffset: "500px",
            stickyFilterCorrection: 140,
            resultsCountLimit: 20,
            platformFallback: this.Platform.LOCAL,
            language: this.getLanguage() || "en",
            toTopThreshold: 200
        }, this.cloudApi = e, this.$content = $("[data-apps-browse-content]"), this.$search = $("[data-apps-browse-search]"), this.$searchReset = $("[data-apps-browse-search-reset]"), this.$filter = $("[data-apps-filter]"), this.$filterItem = $("[data-apps-filter-item]"), this.$filterReset = $("[data-apps-filter-reset]"), this.$openFilter = $("[data-apps-browse-filter-open]"), this.$closeFilter = $("[data-apps-browse-filter-close]"), this.$resetAll = $("[data-apps-all-reset]"), this.$title = $("[data-apps-browse-title]"), this.$toTop = $("[data-apps-browse-to-top]"), this.$window = $(window), this.NextObserver = new HYIntersectionObserver({
            rootMargin: this.settings.nextPageOffset,
            thresholds: 0
        }), this.appBaseUrl = APP_BASE_URL;
        const s = this.$title.data("apps-browse-title");
        this.titleData = {
            all: s.all,
            result: s.result,
            results: s.results,
            for: s.for,
            noresults: s.noresults
        }, this.init()
    }
    init() {
        this.setFetchStatus(this.Status.INIT), this.getHash(), this.$filterReset.on("click", t => {
            const e = $(t.target).data("apps-filter-reset");
            this.resetFilters(!0, e)
        }), this.$filterItem.on("change", () => this.setHash()), this.$openFilter.on("click", () => this.openFilterForMobile()), this.$closeFilter.on("click", () => this.closeFilterForMobile()), this.$search.on("keyup", t => this.searchHandler(t)), this.$searchReset.on("click", () => {
            this.resetSearch(), this.focusSearch()
        }), $(document).on("keydown", t => {
            switch (t.key) {
                case "/":
                    t.preventDefault(), this.scrollToTop(), this.focusSearch()
            }
        }), this.$resetAll.on("click", () => {
            this.resetFilters(), this.resetSearch()
        }), $("[data-platform-switch-button]").on("click", t => this.platformHandler(t)), this.stickyFilterHandler(), $(window).on("resize", () => this.stickyFilterHandler()), this.cloudApi.on("api", () => {
            this.appsApi = new AthomAppsAPI({
                baseUrl: ATHOM_APPS_API_URL
            }), this.getResults(), $(window).on("hashchange", () => {
                this.scrollToTopResults(), this.getHash(), this.getResults()
            })
        }), this.$toTop.on("click", () => this.scrollToTop()), this.$window.on("scroll", () => {
            const t = this.$window.scrollTop();
            this.$toTop.toggleClass("is-visible", (() => t > this.settings.toTopThreshold)())
        })
    }
    searchHandler(t) {
        switch (clearTimeout(this.searchDelayTimer), this.resetFilters(!1), this.searchDelayTimer = setTimeout(() => {
            this.setHash()
        }, this.settings.searchDelay), t.key) {
            case "Escape":
                this.resetSearch();
                break;
            case "Enter":
                this.setHash(), this.defocusSearch()
        }
    }
    platformHandler(t) {
        const e = $(t.currentTarget).data("platform-switch-button");
        localStorage.setItem(this.settings.localStoragePlatformKey, e), this.setHash()
    }
    openFilterForMobile() {
        this.$filter.addClass("is-open-mobile"), this.$filter.scrollTop(0)
    }
    closeFilterForMobile() {
        this.$filter.removeClass("is-open-mobile")
    }
    stickyFilterHandler() {
        const t = $(window).height(),
            e = this.$filter.height(),
            s = t - this.settings.stickyFilterCorrection > e;
        this.$filter.toggleClass("is-sticky", s)
    }
    getResults() {
        this.$content.addClass("is-unloading-apps"), this.setFetchStatus(this.Status.LOADING);
        const t = 250 + 10 * this.settings.itemsPerRequest;
        setTimeout(() => {
            this.isFetchStatus(this.Status.LOADING) && (this.$content.removeClass("is-unloading-apps"), this.renderLoading())
        }, t), this.fetchApps(t => {
            this.setFetchStatus(this.Status.DONE), this.$content.removeClass("is-unloading-apps"), this.results.itemsLoadedCount = t.offset + t.count, this.results.total = t.total, this.results.query = this.request.query, this.results.category = this.request.category, this.results.connectivity = this.request.connectivity, this.results.platform = this.request.platform, this.setResultsFilterButton(), this.logSearchQuery({
                results: this.results.total,
                query: {
                    search: this.results.query,
                    category: this.results.category,
                    connectivity: this.results.connectivity,
                    platform: this.request.platform
                }
            }), 0 !== t.total ? (this.renderResults(t), t.count >= this.settings.itemsPerRequest && this.observeNextResults()) : this.renderNoResults()
        }, t => {
            console.error(t), this.setFetchStatus(this.Status.ERROR), this.renderError()
        })
    }
    getNextResults() {
        this.fetchApps(t => {
            this.setFetchStatus(this.Status.DONE), this.results.itemsLoadedCount = t.offset + t.count, t.count > 0 && this.renderNextResults(t), this.unobserveNextResults(), this.results.itemsLoadedCount < t.total && this.observeNextResults()
        }, t => {
            console.error(t), this.setFetchStatus(this.Status.ERROR), this.renderError()
        })
    }
    fetchApps(t, e) {
        const s = this.UID();
        this.appsApi.browseApps(this.request).then(e => {
            s === this._UID && t(e)
        }).catch(t => {
            e(t)
        })
    }
    setFetchStatus(t) {
        this._FETCHSTATUS = t, this.$closeFilter.attr("data-apps-browse-filter-close", this._FETCHSTATUS)
    }
    isFetchStatus(t) {
        return this._FETCHSTATUS === t
    }
    setRequest({
        platforms: t,
        query: e,
        connectivity: s,
        category: i
    }) {
        this.request.query = e, this.request.language = this.settings.language, this.request.platform = t, this.request.connectivity = s, this.request.category = i, this.request.offset = 0, this.request.limit = this.settings.itemsPerRequest, this.results = this._results
    }
    setNextRequest() {
        this.request.offset += this.settings.itemsPerRequest
    }
    observeNextResults() {
        const t = $("[data-apps-browse-more]");
        if (0 === t.length) return void console.log("abort observing next results.");
        const e = t[0];
        this.NextObserver.addTarget(e, t => {
            if (t.intersectionRatio) {
                if (this.isFetchStatus(this.Status.LOADING_NEXT) || this.isFetchStatus(this.Status.LOADING)) return void console.log("abort, still loading...");
                if (this.request.offset + this.settings.itemsPerRequest > this.results.total) return void this.unobserveNextResults();
                this.setNextRequest(), this.renderNextLoading(), this.getNextResults()
            }
        })
    }
    unobserveNextResults() {
        this.NextObserver.removeAllTargets()
    }
    render(t) {
        this.$content.html(t)
    }
    renderResults(t) {
        const e = this.newTemplate(this.template.results),
            s = document.createDocumentFragment();
        t.items.forEach((t, e) => {
            const i = this.generateAppComponent(t, e);
            s.appendChild(i)
        }), $(e).find("[data-apps-browse-results]").html(s), this.render(e)
    }
    renderNextResults(t) {
        const e = document.createDocumentFragment();
        t.items.forEach((t, s) => {
            const i = this.generateAppComponent(t, s);
            e.appendChild(i)
        });
        const s = $("[data-apps-browse-results]");
        s.find("[data-template-app-dummy]").remove(), s.append(e)
    }
    renderNoResults() {
        const t = this.newTemplate(this.template.noresults),
            e = $(t).find("[data-apps-browse-noresults-clearfilters]");
        $(t).find("[data-apps-browse-noresult-query]").text(this.request.query), this.hasFilters() ? e.on("click", () => {
            this.resetFilters()
        }) : e.remove(), this.render(t)
    }
    renderLoading() {
        const t = this.newTemplate(this.template.loading),
            e = document.createDocumentFragment();
        for (let t = 0; t < 6; t++) {
            const t = this.newComponent(this.component.appDummy);
            e.appendChild(t)
        }
        $(t).find("[data-apps-browse-loading]").html(e), this.render(t)
    }
    renderNextLoading() {
        this.setFetchStatus(this.Status.LOADING_NEXT);
        const t = document.createDocumentFragment(),
            e = Math.min(this.results.total - this.results.itemsLoadedCount, this.settings.itemsPerRequest);
        for (let s = 0; s < e; s++) {
            const e = this.newComponent(this.component.appDummy);
            t.appendChild(e)
        }
        $("[data-apps-browse-results]")[0].append(t)
    }
    renderError() {
        const t = this.newTemplate(this.template.error);
        $(t).find("[data-apps-retry]").on("click", () => {
            this.getResults()
        }), this.render(t)
    }
    generateAppComponent(t, e) {
        const s = this.newComponent(this.component.app),
            i = $(s),
            n = this.appBaseUrl.replace("undefined", t.id);
        i.find("[data-template-app]").css("--app-number", e).attr("title", t.name), i.find("[data-template-app-title]").text(t.name), i.find("[data-template-app-author]").text(t.authorName), i.find("[data-template-app-image]").prop({
            src: t.image,
            alt: t.name
        }), i.find("[data-template-app-link]").prop("href", n), i.find("[data-template-app-icon]").css({
            "--brand-color": t.brandColor,
            "--brand-icon": `url(${t.icon})`
        });
        const a = this.request.platform[0];
        if (t.platforms.includes(a)) i.find("[data-template-app-platform-alternative]").removeAttr("data-template-app-platform-alternative");
        else {
            const t = a === this.Platform.CLOUD ? this.Platform.LOCAL : this.Platform.CLOUD;
            i.find("[data-template-app-platform-alternative]").attr("data-template-app-platform-alternative", t)
        }
        return !0 == !t.authorVerified && i.find("[data-template-app-author-verified]").remove(), s
    }
    newTemplate(t) {
        return t.content.cloneNode(!0)
    }
    newComponent(t) {
        return t.content.cloneNode(!0)
    }
    setHash() {
        const t = [],
            e = [],
            s = [],
            i = $(`[data-apps-filter-item="${this.Filter.CATEGORY}"]:checked`),
            n = $(`[data-apps-filter-item="${this.Filter.CONNECTIVITY}"]:checked`);
        i.each((t, s) => {
            e.push(s.value)
        }), e.length && t.push(`${this.Filter.CATEGORY}=${e.join(",")}`), n.each((t, e) => {
            s.push(e.value)
        }), s.length && t.push(`${this.Filter.CONNECTIVITY}=${s.join(",")}`);
        const a = $("[data-apps-browse-search]").val();
        a.length && t.push(`${this.Filter.QUERY}=${a}`);
        const o = localStorage.getItem(this.settings.localStoragePlatformKey);
        t.push(`${this.Filter.PLATFORM}=${o}`), window.location.hash = "filter?" + t.join("&")
    }
    getHash() {
        const t = window.location.hash;
        let e = {};
        if (t) {
            const [, s] = t.split("#")[1].split("?");
            e = Object.fromEntries(new URLSearchParams(s))
        }
        Object.keys(e).forEach(t => {
            if (t !== this.Filter.QUERY) return e[t] = e[t].split(",")
        });
        const s = localStorage.getItem(this.settings.localStoragePlatformKey) || this.settings.platformFallback;
        e[this.Filter.PLATFORM] = e[this.Filter.PLATFORM] ? e[this.Filter.PLATFORM] : [s], this.setFilters(e), this.setSearch(e[this.Filter.QUERY]), this.setRequest({
            platforms: e[this.Filter.PLATFORM],
            query: e[this.Filter.QUERY],
            category: e[this.Filter.CATEGORY],
            connectivity: e[this.Filter.CONNECTIVITY]
        }), this.setResultsTitle()
    }
    setFilters(t) {
        this.resetFilters(!1), this.checkFiltersForType(t, this.Filter.CATEGORY), this.checkFiltersForType(t, this.Filter.CONNECTIVITY);
        let e = 0;
        this.Filter.CATEGORY in t && (e += t[this.Filter.CATEGORY].length), this.Filter.CONNECTIVITY in t && (e += t[this.Filter.CONNECTIVITY].length);
        const s = $("[data-apps-browse-open-filter-count]");
        s.attr("data-apps-browse-open-filter-count", e), s.text(e), $(`[data-apps-filter-reset=${this.Filter.CATEGORY}]`).toggleClass("is-available", Boolean(t.category)), $(`[data-apps-filter-reset=${this.Filter.CONNECTIVITY}]`).toggleClass("is-available", Boolean(t.connectivity)), this.$resetAll.toggleClass("is-available", Boolean(t.connectivity || t.category || t.query)), $(`[data-apps-browse-filter-item-platform="${this.Platform.LOCAL}"]`).toggleClass("is-hidden", Boolean(t.platform.includes(this.Platform.CLOUD)))
    }
    setSearch(t) {
        $("[data-apps-browse-search]").val(t)
    }
    setResultsTitle() {
        let t = "";
        this.request.query || this.request.category || this.request.connectivity ? (t += " " + this.titleData.results, this.request.query && (t += ` ${this.titleData.for} "${this.request.query}"`), this.$title.text(t)) : this.$title.text(this.titleData.all)
    }
    setResultsFilterButton() {
        let t = this.results.total > this.settings.resultsCountLimit ? this.settings.resultsCountLimit + "+" : "" + this.results.total;
        $("[data-apps-browse-count]").text(t)
    }
    hasFilters() {
        return this.request.category || this.request.connectivity
    }
    hasSearch() {
        return this.request.query
    }
    resetFilters(t = !0, e = !1) {
        e ? $(`[data-apps-filter-item=${e}]`).prop("checked", !1) : $("[data-apps-filter-item]").prop("checked", !1), !0 === t && this.setHash()
    }
    checkFiltersForType(t, e) {
        e in t && t[e].forEach(t => {
            $(`[data-apps-filter-item="${e}"][value="${t}"]`).prop("checked", !0)
        })
    }
    resetSearch() {
        this.$search.val(""), this.setHash()
    }
    focusSearch() {
        this.$search.trigger("focus")
    }
    defocusSearch() {
        this.$search.trigger("blur")
    }
    scrollToTopResults() {
        const t = $("[data-apps-browse]").offset().top;
        $(window).scrollTop() > t && $("html, body").animate({
            scrollTop: t + -100
        })
    }
    scrollToTop() {
        $("html, body").animate({
            scrollTop: 0
        })
    }
    getLanguage() {
        return $("html").data("hy-language")
    }
    UID() {
        const t = Math.random();
        return this._UID = t, t
    }
    logSearchQuery({
        results: t,
        query: {
            search: e,
            category: s,
            connectivity: i,
            platform: n
        }
    }) {
        dataLayer && dataLayer.push({
            event: "appsBrowseResults",
            results: t,
            query: {
                platform: n || !1,
                search: e || !1,
                category: s || !1,
                connectivity: i || !1
            }
        })
    }
}
class HYCart extends EventEmitter3 {
    constructor(t, {
        storeApi: e
    }) {
        super(), this.$el = t, this.$products = $(".products", this.$el), this.$locale = $(".locale", this.$el), this.$locale.change(this.onLocaleChange.bind(this)), this.$toggle = $(".toggle", this.$el), this.$toggle.click(() => {
            this.toggle()
        }), this.$checkout = $(".checkout", this.$el), this.$checkout.click(() => {
            dataLayer && dataLayer.push({
                event: "to-checkout"
            })
        }), this.$toStore = $(".to-store", this.$el), this.$toStore.click(() => {
            dataLayer && dataLayer.push({
                event: "to-store"
            })
        }), this.storeApi = e, this.storeApi.on("cart", this.onCart.bind(this)), $(document).click(t => {
            $(t.target).closest(this.$el).length || this.hide()
        }), $("[data-open-cart]").click(t => {
            t.stopPropagation(), this.show(), dataLayer && dataLayer.push({
                event: "cart-open"
            })
        }), $("[data-add-to-cart]").click(t => {
            t.stopPropagation();
            const e = $(t.currentTarget).data("add-to-cart");
            this.addProduct({
                sku: e
            }), dataLayer && dataLayer.push({
                event: "addToCart",
                ecommerce: {
                    currencyCode: $(t.currentTarget).data("product-currency"),
                    add: {
                        products: [{
                            name: $(t.currentTarget).data("product-name"),
                            id: e,
                            price: $(t.currentTarget).data("product-price"),
                            brand: $(t.currentTarget).data("product-brand"),
                            category: $(t.currentTarget).data("product-category"),
                            quantity: 1
                        }]
                    }
                }
            })
        })
    }
    onCart(t) {
        if (this.cart = t, this.render(), this.hideLoading(), this.$locale.val(t.locale), window.location.hash.startsWith("#coupon:")) {
            const t = window.location.hash.substring("#coupon:".length);
            t.length && (console.info("Adding coupon:", t), this.storeApi.setCoupon({
                coupon: t
            }).catch(console.error), window.location.hash = "")
        }
        const e = $("html").data("hy-locale").toUpperCase(),
            s = t.locale;
        if (s !== e) {
            $("[data-hy-price-sku]").each((t, e) => {
                if ($(e).data("hy-price-locale") === s) return;
                const i = $(e).data("hy-price-sku");
                this.storeApi.getProduct({
                    sku: i
                }).then(t => {
                    $(e).animate({
                        opacity: 0
                    }, 300, () => {
                        $(e).html(formatPrice(t.price, t.currency_symbol)).data("hy-price-locale", s).animate({
                            opacity: 1
                        }, 300)
                    })
                }).catch(console.error)
            })
        }
    }
    onLocaleChange() {
        const t = this.$locale.val();
        this.showLoading(), this.storeApi.setLocale({
            locale: t
        }).catch(console.error).then(() => {
            this.hideLoading()
        })
    }
    show() {
        this.$el.addClass("visible")
    }
    hide() {
        this.$el.removeClass("visible")
    }
    toggle() {
        this.$el.toggleClass("visible")
    }
    showLoading() {
        $(".cart", this.$el).addClass("loading")
    }
    hideLoading() {
        $(".cart", this.$el).removeClass("loading")
    }
    render() {
        let t = Object.values(this.cart.items).length;
        window.localStorage.setItem("cartCount", t), this.$el.attr("data-count", t), $("[data-hy-cart-count]").attr("data-hy-cart-count", t), $(".product", this.$products).remove(), Object.keys(this.cart.items).forEach(t => {
            const {
                product: e,
                quantity: s
            } = this.cart.items[t], i = HOMEY_PRODUCT_URL.replace("SKU", t), n = $("<div>");
            n.addClass("product"), this.$products.append(n);
            const a = $("<a>");
            a.attr("href", i), a.addClass("image"), a.css({
                backgroundImage: e.image ? `url(${e.image})` : void 0
            }), n.append(a);
            const o = $("<div>");
            o.addClass("details"), n.append(o);
            const r = $("<div>");
            r.addClass("quantity"), r.attr("contenteditable", "true"), r.text(s), r.on("keydown", t => {
                if (13 === t.keyCode) return t.preventDefault(), !1
            }), r.on("blur keyup", i => {
                if (13 !== i.keyCode) return i.preventDefault(), !1;
                let n = parseInt($(i.currentTarget).text());
                isNaN(n) && (n = 1), this.setProductQuantity({
                    sku: t,
                    quantity: n
                }), $(i.currentTarget).text(s), $(i.currentTarget).blur();
                const a = n - s,
                    o = [{
                        name: e.name,
                        id: e.sku,
                        price: e.price,
                        brand: e.brand,
                        category: e.twh_category,
                        quantity: Math.abs(a)
                    }];
                a > 0 && dataLayer && dataLayer.push({
                    event: "addToCart",
                    ecommerce: {
                        currencyCode: e.currency,
                        add: {
                            products: o
                        }
                    }
                }), a < 0 && dataLayer && dataLayer.push({
                    event: "removeFromCart",
                    ecommerce: {
                        currencyCode: e.currency,
                        remove: {
                            products: o
                        }
                    }
                })
            }), o.append(r);
            const l = $("<a>");
            l.addClass("name"), l.attr("href", i), l.text(e.name), o.append(l);
            const h = $("<div>");
            h.addClass("price"), h.html(formatPrice(e.price, e.currency_symbol)), n.append(h);
            const d = $("<div>");
            d.addClass("remove"), d.click(() => {
                this.removeProduct({
                    sku: t
                }), dataLayer && dataLayer.push({
                    event: "removeFromCart",
                    ecommerce: {
                        currencyCode: e.currency,
                        remove: {
                            products: [{
                                name: e.name,
                                id: e.sku,
                                price: e.price,
                                brand: e.brand,
                                category: e.twh_category,
                                quantity: s
                            }]
                        }
                    }
                })
            }), n.append(d)
        }), $(".shipping .price", this.$el).html(formatPrice(this.cart.shipping_total, this.cart.currency_symbol, !0)).attr("data-price", this.cart.shipping_total), $(".total .price", this.$el).html(formatPrice(this.cart.total, this.cart.currency_symbol)).attr("data-price", this.cart.total)
    }
    addProduct({
        sku: t,
        quantity: e = 1
    }) {
        this.show(), this.showLoading(), this.storeApi.addProductToCart({
            sku: t,
            quantity: e
        }).catch(t => {
            console.error(t)
        }).then(() => {
            this.hideLoading()
        })
    }
    removeProduct({
        sku: t
    }) {
        this.showLoading(), this.storeApi.removeProductFromCart({
            sku: t
        }).catch(t => {
            console.error(t)
        }).then(() => {
            this.hideLoading()
        })
    }
    setProductQuantity({
        sku: t,
        quantity: e
    }) {
        this.showLoading(), this.storeApi.setCartProductQuantity({
            sku: t,
            quantity: e
        }).catch(t => {
            console.error(t)
        }).then(() => {
            this.hideLoading()
        })
    }
}
class HYCheckbox {
    constructor(t) {
        this.$el = t, this.$el.click(this.onClick.bind(this));
        const e = "true" === this.$el.attr("data-value") || this.$el.hasClass("checked");
        this.$el.toggleClass("checked", e)
    }
    onClick() {
        this.$el.toggleClass("checked");
        const t = this.$el.hasClass("checked");
        this.$el.attr("data-value", t), this.$el.trigger("change", t)
    }
}
const USER_CACHE_TTL = 6e4;
class HYCloudApi extends EventEmitter3 {
    constructor(t, {}) {
        super(), this.$el = t, this.$el.on("click", "[data-login]", t => {
            t.preventDefault(), this.login()
        }), this.$el.on("click", "[data-logout]", t => {
            t.preventDefault(), this.logout()
        })
    }
    init() {}
    onAthomApi() {
        this.emit("api"), this._api = new AthomCloudAPI({
            clientId: ATHOM_API_CLIENT_ID,
            clientSecret: ATHOM_API_CLIENT_SECRET,
            redirectUrl: ATHOM_API_REDIRECT_URI
        });
        const t = (new Date).getTime(),
            e = JSON.parse(window.localStorage.getItem("hy.user")),
            s = JSON.parse(window.localStorage.getItem("hy.userExpires")),
            i = !s || s < t;
        if (!e || !e._id) return this._setUser(null);
        if (i) console.info("User expired, refreshing..."), this._api.isLoggedIn().then(async t => {
            if (!t) return console.info("Session expired, logging out..."), this.logout();
            const e = await this._api.getAuthenticatedUser();
            console.info("Refreshed user."), this._saveUser(e), this._setUser(e)
        }).catch(t => (console.error("Something went wrong, logging out...", t), this.logout()));
        else {
            console.info("Cached user is still valid.");
            const t = new AthomCloudAPI.User({
                api: this._api,
                properties: e
            });
            this._setUser(t)
        }
    }
    async refreshUser() {
        const t = await this._api.getAuthenticatedUser();
        this._saveUser(t), this._setUser(t)
    }
    _saveUser(t) {
        null === t ? (window.localStorage.removeItem("hy.user"), window.localStorage.removeItem("hy.userExpires")) : (window.localStorage.setItem("hy.user", JSON.stringify(t)), window.localStorage.setItem("hy.userExpires", JSON.stringify((new Date).getTime() + 6e4)))
    }
    _setUser(t) {
        this._user = t, this.emit("user", t), this.$el.attr("data-hy-logged-in", String(!!t))
    }
    login() {
        if (!this._api) return;
        const t = this._api.getLoginUrl();
        if (this.$login) return this.$login.addClass("visible"), void this.$login.find("iframe").attr("src", t);
        this.$login = $("<div>"), this.$login.addClass("login"), this.$login.click(() => {
            this.$login.removeClass("visible")
        }), this.$el.append(this.$login);
        const e = $("<div>");
        e.addClass("close"), e.appendTo(this.$login), e.click(() => {
            this.$login.removeClass("visible")
        });
        const s = $("<div>");
        s.addClass("iframe-wrap"), s.click(t => {
            t.stopPropagation()
        }), this.$login.append(s);
        const i = $("<iframe>");
        i.attr("src", t), s.append(i), i.on("load", () => {
            try {
                const t = new URL(i[0].contentWindow.location.href).searchParams.get("code");
                t && (this.$login.removeClass("visible"), this._api.authenticateWithAuthorizationCode({
                    code: t,
                    removeCodeFromHistory: !1
                }).then(async() => {
                    const t = await this._api.getAuthenticatedUser();
                    if (this._saveUser(t), this._setUser(t), t.homeys) {
                        const e = t.homeys.filter((function(t) {
                            return "owner" === t.role
                        })).map((function(t) {
                            return t.id
                        }));
                        e.length && (window.dataLayer = window.dataLayer || [], window.dataLayer.push({
                            event: "login",
                            userId: t._id,
                            homeyId: e.join(",")
                        }))
                    }
                }).catch(t => {
                    alert(t.message || t.toString())
                }))
            } catch (t) {}
        }), setTimeout(() => {
            this.$login.addClass("visible")
        }, 50)
    }
    logout() {
        this._api && this._api.logout().catch(console.error), this._saveUser(null), this._setUser(null), this._setAddresses(null), window.localStorage.removeItem("hy.homepage-intro-viewed")
    }
    async loginWithCredentials({
        username: t,
        password: e
    }) {
        if (!this._api) return;
        await this._api.authenticateWithPassword(t, e);
        const s = await this._api.getAuthenticatedUser();
        this._saveUser(s), this._setUser(s)
    }
    async createDelegationToken(t) {
        return this._api.createDelegationToken(t)
    }
    _setAddresses(t) {
        this._addresses = t, this.emit("addresses", t)
    }
    async getUserAddresses() {
        if (!this._api) return;
        if (!this._user || !this._user._id) throw new Error("no user or userId");
        const t = await this._api.getUserAddresses({
            userId: this._user._id
        });
        return this._setAddresses(t), t
    }
    async addUserAddress(t) {
        if (this._api) {
            if (!t) throw new Error("no address defined");
            if (!this._user || !this._user._id) throw new Error("no user or userId");
            return await this._api.addUserAddress({
                userId: this._user._id,
                address: t
            })
        }
    }
    async deleteUserAddress({
        addressId: t
    }) {
        if (this._api) {
            if (!t) throw new Error("no addressId defined");
            return this._api.deleteUserAddress({
                userId: this._user._id,
                addressId: t
            })
        }
    }
    async deleteUserDevice({
        userId: t,
        deviceId: e
    }) {
        this._api && (await this._api.deleteUserDevice({
            userId: t,
            deviceId: e
        }), await this.refreshUser())
    }
    async getUserSessions() {
        return this._api.getUserSessions({
            userId: this._user._id
        })
    }
    async deleteUserSession({
        sessionId: t
    }) {
        return this._api.deleteUserSession({
            sessionId: t,
            userId: this._user._id
        })
    }
}
class HYFooter {
    constructor(t) {
        this.$el = t, this.$form = $("form", this.$el), this.$email = $('input[type="email"]', this.$form), $(".ul-fold", this.$el).click((function() {
            $(this).toggleClass("expanded")
        })), this.$form.submit(t => {
            t.preventDefault();
            const e = this.$email.val();
            if (!(e.length < 3) && e.includes("@")) return this.$form.addClass("loading"), HYWebsite.subscribeToNewsletter({
                email: e
            }).then(() => {
                this.$form.addClass("subscribed"), setTimeout(() => {
                    this.$form.removeClass("subscribed"), this.$email.val("")
                }, 3e3)
            }).catch(t => {
                console.error(t), alert(t.responseJSON && t.responseJSON.error || t.message || t.toString())
            }).always(() => {
                this.$form.removeClass("loading")
            }), !1
        })
    }
}
class HYIntersectionObserver {
    observer;
    constructor({
        root: t = null,
        rootMargin: e = "0px",
        thresholds: s = []
    }) {
        let i = {
            root: t,
            rootMargin: e,
            threshold: s = this.generateThresholdsFromNumber(s)
        };
        this.observer = new IntersectionObserver(t => {
            t.forEach(t => {
                const e = this.getUtilities(t);
                t.target.callback(t, e), t.target.timeStamp = Date.now()
            })
        }, i)
    }
    addTarget(t, e) {
        t.callback = e, this.observer.observe(t)
    }
    removeTarget(t) {
        this.observer.unobserve(t)
    }
    removeAllTargets() {
        this.observer.disconnect()
    }
    generateThresholdsFromNumber(t) {
        if ("number" == typeof t) {
            let s = [];
            const i = 1 / t;
            for (var e = 0; e <= 1; e += i) s.push(e);
            return s
        }
        return t
    }
    getUtilities(t) {
        return {
            getPercentage: (e = 0, s = 1) => {
                let i = t.intersectionRatio;
                return t.rootBounds.height < t.boundingClientRect.height && (i = t.intersectionRect.height / t.rootBounds.height), i = e + i * (s - e), i = Math.min(Math.max(i, e), s), i = Math.round(1e3 * i) / 1e3, i
            },
            isTopIn: () => t.rootBounds.top < t.boundingClientRect.top,
            isTopOut: () => t.rootBounds.top > t.boundingClientRect.top,
            isBottomIn: () => t.rootBounds.bottom < t.boundingClientRect.bottom,
            isBottomOut: () => t.rootBounds.bottom > t.boundingClientRect.bottom,
            getTimePast: (e = 0, s = 500) => {
                let i = 0;
                return t.target.timeStamp && (i = Date.now() - t.target.timeStamp), (i > s || i < e) && (i = 0), i
            }
        }
    }
}
class HYLanguageSelector {
    constructor(t) {
        if (this.$el = t, this.pagelang = $("html").data("hy-language"), this.iplang = Cookies.get("hy.ip-language"), this.iplang) {
            const t = this.$el.find('[data-language="' + this.iplang + '"]');
            this.pagelang === this.iplang || t.hasClass("missing") || this.$el.addClass("translation-available")
        }
        this.$toggle = $(".toggle", this.$el), this.$toggle.click(() => {
            this.$el.toggleClass("visible")
        }), $(document).click(t => {
            $(t.target).closest(this.$el).length || this.$el.removeClass("visible")
        })
    }
}
class HYNav {
    constructor(t, {
        cloudApi: e
    }) {
        this.$el = t, this.$html = $("html"), this.$logo = $(".nav-logo", this.$el);
        this.$toggle = $(".nav-toggle", this.$el), this.$toggle.click(() => {
            this.$el.find(".nav").toggleClass("menu-visible")
        }), this.$search = $(".nav-search", this.$el), this.search = new HYSearch(this.$search, {
            $logo: this.$logo,
            $toggle: this.$toggle
        }), this.$languageSelector = $(".nav-lang", this.$el), this.languageSelector = new HYLanguageSelector(this.$languageSelector), this.$user = $(".nav-user", this.$el), $(".nav-user-avatar-wrap", this.$user).click(() => {
            $(this.$user).toggleClass("visible")
        }), $(document).click(t => {
            $(t.target).closest(this.$user).length || this.$user.removeClass("visible")
        }), e.on("user", t => {
            t ? (window.localStorage.setItem("user-avatar", t.avatar.small), $(".nav-user-avatar", this.$el).css({
                backgroundImage: `url(${t.avatar.small})`
            }), $(".nav-user-name", this.$el).text(t.firstname)) : ($(".nav-user-name", this.$el).text(""), $(".nav-user-avatar", this.$el).css({
                backgroundImage: "none"
            }), window.localStorage.removeItem("user-avatar"))
        })
    }
}
class HYNavMenu {
    constructor(t) {
        this.$el = t, this.$html = $("html"), this.$logo = $(".nav-logo", this.$el), this.classOpen = "is-active-menu", this.classMobileActive = "is-active-mobile-menu", this.$overlay = $(".nav > .overlay", this.$el), this.$overlay.click(() => {
            $(".dropdownRoot").removeClass(this.classOpen)
        }), this.$toggle = $(".nav-toggle", this.$el), this.$toggle.click(() => {
            $(".dropdownRoot").toggleClass(this.classOpen)
        }), this.menuItems = $(".nav-menu a", this.$el), this.navMenu = $(".nav-menu"), this.$el.on("mouseleave", () => {
            this.$el.removeClass("dropdownActive")
        }), this.dropdown = {
            $root: $(".dropdownRoot"),
            $header: $(".nav-inner"),
            $menuContainer: $(".primary-menu"),
            $background: $(".dropdownRoot .dropdownBackground"),
            $arrow: $(".dropdownRoot .dropdownArrow"),
            $container: $(".dropdownRoot .dropdownContainer"),
            $sections: $(".dropdownRoot .dropdownContent"),
            $navLinks: this.menuItems,
            isDesktop: "block" !== this.$toggle.css("display")
        }, this.getDropdownDimensions = this.getDropdownDimensions.bind(this), this.popover(), this.dropdown.$root.addClass("ready"), window.addEventListener("resize", () => {
            const t = this.dropdown.isDesktop;
            this.dropdown.isDesktop = "block" !== this.$toggle.css("display"), t !== this.dropdown.isDesktop && (this.resetMenu(), this.popoverInit())
        })
    }
    resetMenu() {
        this.$el.find(".nav").removeClass("menu-visible"), this.dropdown.$sections.each((t, e) => $(e).removeClass(["active", "left", "right"])), this.dropdown.$root.removeClass(this.classOpen), $("html").removeClass(this.classMobileActive)
    }
    popoverInit() {
        this.dropdown.dimensions = this.getDropdownDimensions(), this.dropdown.$background.css({
            width: this.dropdown.dimensions[Object.keys(this.dropdown.dimensions)[0]].width + "px",
            height: this.dropdown.dimensions[Object.keys(this.dropdown.dimensions)[0]].height + "px"
        });
        const t = this.dropdown.$arrow.get(0).getBoundingClientRect().x;
        this.dropdown.$navLinks.each((e, s) => {
            const i = $(s).attr("data-title"),
                n = s.getBoundingClientRect();
            this.dropdown.dimensions[i].arrowX = n.left + n.width / 2 - t
        }), this.dropdown.$arrow.css("--translateX", this.dropdown.dimensions.Homey.arrowX + "px")
    }
    popover() {
        this.popoverInit();
        let t = !1;
        this.dropdown.$navLinks.each((e, s) => {
            $(s).on("mouseenter", () => {
                this.openSubMenu(s), t = !0, setTimeout(() => {
                    t = !1
                }, 500)
            }), $(s).on("mouseup", () => {
                !1 === t && this.toggleSubMenu(s)
            }), this.dropdown.$menuContainer.on("mouseleave", () => {
                this.closeSubMenu()
            })
        })
    }
    toggleSubMenu(t) {
        console.log(this.dropdown.$root.hasClass(this.classOpen)), this.dropdown.$root.hasClass(this.classOpen) ? this.closeSubMenu() : this.openSubMenu(t)
    }
    openSubMenu(t) {
        if (this.dropdown.isDesktop) {
            const e = $(t).attr("data-title");
            this.showSection(e)
        }
    }
    closeSubMenu() {
        this.dropdown.isDesktop && this.dropdown.$root.removeClass(this.classOpen)
    }
    getDropdownDimensions() {
        const t = {},
            e = this.dropdown.$header.get(0).getBoundingClientRect().x,
            s = this.dropdown.$header.find(`a[data-title="${$(this.dropdown.$sections[0]).attr("data-dropdown")}"]`).get(0).getBoundingClientRect().x - e;
        return this.dropdown.$sections.each((i, n) => {
            const a = $(n).get(0).getBoundingClientRect(),
                o = $(n).attr("data-dropdown"),
                r = this.dropdown.$header.find(`a[data-title="${o}"]`).get(0).getBoundingClientRect().x;
            t[o] = {
                width: a.width,
                height: a.height,
                x: Math.round(r - e - s)
            }
        }), t
    }
    showSection(t) {
        this.dropdown.$root.addClass(this.classOpen), this.dropdown.$sections.each((t, e) => $(e).removeClass("active")), this.addDropdownClasses(t), this.dropdown.$arrow.css("--translateX", this.dropdown.dimensions[t].arrowX + "px"), this.dropdown.$background.css("--translateX", this.dropdown.dimensions[t].x + "px"), this.dropdown.$background.css({
            width: this.dropdown.dimensions[t].width + "px",
            height: this.dropdown.dimensions[t].height + "px"
        }), this.dropdown.$container.css({
            width: this.dropdown.dimensions[t].width + "px",
            height: this.dropdown.dimensions[t].height + "px"
        }), this.dropdown.$container.css("--translateX", this.dropdown.dimensions[t].x + "px")
    }
    addDropdownClasses(t) {
        let e = !0;
        this.dropdown.$sections.each((s, i) => {
            const n = $(i).attr("data-dropdown");
            n === t && (e = !1), $(i).removeClass(["left", "right", "active"]), $(i).addClass(n === t ? "active" : e ? "left" : "right")
        })
    }
}
class HYNavMobile {
    constructor(t) {
        this.$el = t, this.$html = $("html");
        this.$overlay = $(".nav > .overlay", this.$el), this.$overlay.click(() => {
            this.$html.removeClass("is-active-mobile-menu")
        }), this.$toggle = $(".nav-toggle", this.$el), this.$toggle.click(() => {
            this.$html.toggleClass("is-active-mobile-menu")
        })
    }
}
class HYPopup {
    $html;
    $document;
    $target;
    $video;
    $input;
    scrollY;
    isOpen;
    constructor() {
        this.$html = $("html"), this.$document = $(document), this.scrollY = 0, this.isOpen = !1, $("[data-popup-open]").on("click", t => {
            const e = $(t.currentTarget).data("popup-open");
            this.openPopup(e)
        })
    }
    openPopup(t) {
        this.isOpen || (this.isOpen = !0, this.$target = $(`[data-popup-id=${t}]`), this.viewports = null, this.$target.data("popup-viewports") && (this.viewports = JSON.parse(this.$target.data("popup-viewports").replace(/'/g, '"'))), this.$video = this.$target.find("[data-popup-video]"), this.$input = this.$target.find("[data-popup-focus]"), this.scrollY = window.scrollY, this.$html.get(0).style.setProperty("--popup-top", `-${this.scrollY}px`), this.$html.attr("data-popup-scroll-y", this.scrollY), this.$html.addClass("is-active-popup"), this.$target.addClass("is-open"), this.focusInput(), this.controlVideo("unMute"), this.controlVideo("playVideo"), this.addCloseEvents())
    }
    closePopup() {
        this.$target.addClass("is-closing"), this.controlVideo("mute"), this.isOpen = !1, setTimeout(() => {
            this.$html.removeClass("is-active-popup"), this.$target.scrollTop(0), this.$target.removeClass("is-open"), this.$target.removeClass("is-closing"), this.$html.get(0).style.removeProperty("--popup-top"), this.$html.removeAttr("data-popup-scroll-y"), this.controlVideo("stopVideo"), window.scrollTo(0, this.scrollY)
        }, 350), this.removeCloseEvents()
    }
    addCloseEvents() {
        if (this.$document.on("keydown.popup", t => {
                27 === t.keyCode && this.closePopup()
            }), $("[data-popup-close]").on("click.close", t => {
                this.closePopup()
            }), $(this.$target).on("click.overlay", t => {
                this.closePopup()
            }).children().on("click.overlay-children", t => {
                t.stopPropagation()
            }), this.viewports) {
            const t = new HYViewport,
                e = t.getFilteredViewports(this.viewports);
            t.onInitResize(() => {
                this.closePopup()
            }, e)
        }
    }
    removeCloseEvents() {
        this.$document.off("keydown.popup"), $("[data-popup-close]").off("click.close"), $(this.$target).off("click.overlay"), $(this.$target).children().off("click.overlay-children")
    }
    controlVideo(t) {
        this.$video && this.$video.each((function() {
            this.contentWindow.postMessage(`{"event":"command","func":"${t}","args":""}`, "*")
        }))
    }
    focusInput() {
        this.$input.length && !this.isMobile() && this.polyfillFocusInput(() => {
            this.$input[0].focus()
        })
    }
    polyfillFocusInput(t) {
        const e = document.createElement("input");
        e.setAttribute("type", "text"), e.style.position = "absolute", e.style.opacity = 0, e.style.height = 0, e.style.fontSize = "16px", document.body.prepend(e), e.focus(), t(), e.remove()
    }
    isMobile() {
        return /android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent)
    }
}
class HYScrollTo {
    constructor() {
        $("a[data-scroll-to]").on("click", (function(t) {
            if ("" !== this.hash) {
                t.preventDefault();
                var e = this.hash;
                $("html, body").animate({
                    scrollTop: $(e).offset().top
                }, 800, (function() {
                    window.location.hash = e
                }))
            }
        }))
    }
}
const MAX_RESULTS_PER_CATEGORY = 3,
    SEARCH_DEBOUNCE = 350;
class HYSearch {
    constructor(t, {
        $logo: e,
        $toggle: s
    }) {
        this.$el = t, this.$logo = e, this.language = $("html").data("hy-language"), this.locale = $("html").data("hy-locale"), this.localeDefault = $("html").data("hy-locale-default"), s.on("click", () => {
            const t = s.parents(".nav").hasClass("menu-visible");
            this.toggle(t)
        }), this.$toggle = $(".toggle", this.$el), this.$toggle.on("click", this.onToggleClick.bind(this)), this.$input = $('input[type="search"]', this.$el), this.$input.on("keydown", this.onInputKeyDown.bind(this)), this.$input.on("search", this.onInputSearch.bind(this)), $(document).click(t => {
            $(t.target).closest(this.$el).length || this.hide()
        }), this.$resultsWrap = $(".results-wrap", this.$el), this.$results = $(".results", this.$resultsWrap), this.search = debounce(this.search.bind(this), 350);
        const i = "typedjs-search";
        this.$input.attr("id", i);
        const n = this.$input.data("placeholders").split(";");
        this.typed = new Typed("#" + i, {
            strings: n,
            attr: "placeholder",
            typeSpeed: 50,
            backSpeed: 25,
            smartBackspace: !0,
            loop: !0,
            contentType: null
        }), this.typed.stop(), window.addEventListener("keydown", t => {
            t.shiftKey && t.ctrlKey && "KeyF" === t.code && (this.toggle(!0), setTimeout(() => {
                this.$input.focus().select()
            }, 50))
        })
    }
    show() {
        this.toggle(!0), setTimeout(() => {
            this.$input.focus()
        }, 400)
    }
    hide() {
        this.toggle(!1)
    }
    toggle(t) {
        this.$el.toggleClass("visible", t), this.$logo.toggleClass("searching", t), this.$el.hasClass("visible") ? this.$input.val("") : this.$resultsWrap.removeClass("visible"), t ? (this.typed.reset(), setTimeout(() => {
            this.typed.start()
        }, 500)) : this.typed.stop()
    }
    onToggleClick(t) {
        t.preventDefault(), this.toggle(!0), setTimeout(() => {
            this.$input.focus().select()
        }, 50), setTimeout(() => {
            this.$input.focus()
        }, 400)
    }
    onInputKeyDown(t) {
        if ("Escape" === t.code) {
            if ("" === this.$input.val()) return t.preventDefault(), this.hide(), !1
        }
        this.onSearch()
    }
    onInputSearch() {
        this.onSearch()
    }
    onSearch() {
        this.$input.val();
        this.search()
    }
    search() {
        const t = this.$input.val();
        if (t.length < 2) return this.$results.html(""), void this.$resultsWrap.removeClass("visible");
        this.$logo.addClass("loading"), $.get("https://api.addsearch.com/v1/search/1da6416f5912f8d1537290da47d266d8", {
            term: t,
            filter: JSON.stringify({
                or: [{
                    language: this.language
                }, {
                    category: "0xsupport.homey.app"
                }]
            })
        }).then(e => {
            this.render(e.hits), dataLayer && dataLayer.push({
                event: "searchResults",
                searchQuery: t,
                searchResults: Object.values(e.hits).length
            })
        }).catch(t => {
            console.error(t)
        }).then(() => {
            this.$logo.one("animationiteration", () => {
                this.$logo.removeClass("loading")
            })
        })
    }
    render(t) {
        const e = {};
        t = t.filter(t => {
            if (t.custom_fields && "app" === t.custom_fields.hy_domain) {
                if (1 === Number(t.custom_fields.hy_app_sdk)) return !1
            }
            return !0
        }), this.$resultsWrap.attr("data-count", t.length), t.sort((t, e) => t.custom_fields && "1" === t.custom_fields.hy_app_author_verified && e.custom_fields && "0" === e.custom_fields.hy_app_author_verified ? -1 : 0), t.map(t => {
            let s = t.custom_fields && t.custom_fields.hy_domain;
            s || (s = "website"), e[s] = e[s] || [];
            let i = t.url.replace(`/${this.language}-${this.localeDefault}/`, `/${this.language}-${this.locale}/`);
            "homey.app" !== window.location.host && (i = i.replace("https://homey.app", `${window.location.protocol}//${window.location.host}`));
            const n = $("<a />");
            let a, o;
            n.addClass("result"), n.attr("href", i);
            let r = t.image || t.custom_fields && t.custom_fields.hy_image;
            r || (r = "https://etc.athom.com/logo/white/256.png");
            let l = t.title || t.sections && t.sections.length && t.sections[0],
                h = t.meta_description || t.description || t.highlight || t.body;
            if ("app" === s && (l = t.custom_fields.hy_app_name, h = t.custom_fields.hy_app_description || h, a = t.custom_fields.hy_app_icon, o = t.custom_fields.hy_app_brand_color), "product" === s && (l = t.custom_fields.hy_product_name, h = t.custom_fields.hy_product_description || h, r = t.custom_fields.hy_product_image), a && o) {
                const t = $("<span />");
                t.addClass("icon"), t.css("backgroundColor", o), n.append(t), n.addClass("has-image"), t.addClass("visible");
                const e = $("<span />");
                e.addClass("icon-inner"), e.css("webkitMaskImage", `url(${a})`), e.css("mozMaskImage", `url(${a})`), e.css("maskImage", `url(${a})`), e.appendTo(t)
            } else if (r) {
                const t = $("<span />");
                t.addClass("image"), t.css("backgroundImage", `url(${r})`), t.addClass("visible"), n.append(t), n.addClass("has-image")
            }
            const d = $("<span />");
            if (d.addClass("title"), d.html(l), n.append(d), "app" === s && t.custom_fields && "1" === t.custom_fields.hy_app_author_verified) {
                const t = $("<span />");
                t.addClass("verified"), d.append(t)
            }
            if ("support" === s && "en" !== this.language) {
                const t = $("<span>🇬🇧</span>");
                t.addClass("english"), d.append(t)
            }
            const c = h.split(" ");
            c.length > 32 && (h = c.slice(0, 32).join(" ") + "...");
            const u = $("<span />");
            u.addClass("summary"), u.html(h), n.append(u), e[s] = e[s] || [], e[s].push(n)
        });
        var s = Object.keys(e).map(t => {
            const s = e[t],
                i = $("<div />");
            i.addClass("section");
            const n = $("<div />");
            // return n.addClass("section__title"), n.text(_t("parts.nav.search.category." + t)), i.append(n), i.append(s), i
        });
        this.$results.html(s), this.$resultsWrap.addClass("visible")
    }
}
class HYSharedFlow {
    constructor(t) {
        this.$el = t, this.$share = this.$el.find(".share"), this.$share.find(".button").click(t => {
            this.$share.removeClass("active"), $(t.currentTarget).parent().toggleClass("active").find("input.auto-select").select(), document.execCommand("copy")
        }), this.$share.find("input").click((function() {
            $(this).select(), document.execCommand("copy")
        })), $(document).click(t => {
            $(t.target).closest(this.$share).length || this.$el.find(".share").removeClass("active")
        })
    }
}
class HYStoreApi extends EventEmitter3 {
    constructor(t, {
        cloudApi: e
    }) {
        super(), this.$el = t, this._cart = null, this._sessionId = window.localStorage.getItem("hy.store.sessionId"), this._apiPromise = new Promise(t => {
            this._apiPromiseResolve = t
        }), this._cloudApi = e, this._cloudApi.on("user", this._onUser.bind(this)), this.iplang = Cookies.get("hy.iplang")
    }
    init() {}
    onAthomApi() {
        this._apiPromiseResolve((async() => {
            if (!this._sessionId) {
                const t = new AthomStoreAPI({
                    baseUrl: ATHOM_STORE_API_URL
                });
                this._sessionId = await t.createSession(), window.localStorage.setItem("hy.store.sessionId", this._sessionId)
            }
            this._api = new AthomStoreAPI({
                baseUrl: ATHOM_STORE_API_URL
            })
        })())
    }
    _onUser(t) {
        this.getCart().then(async e => {
            if (t && !e.userId) {
                await this._apiPromise;
                const t = await this._cloudApi.createDelegationToken({
                    audience: "store"
                });
                await this._api.loginByDelegationToken({
                    token: t,
                    $headers: {
                        Authorization: "Bearer " + this._sessionId
                    }
                }), await this.getCart()
            } else !t && e.userId && (await this._api.logout({
                $headers: {
                    Authorization: "Bearer " + this._sessionId
                }
            }), await this.getCart())
        }).catch(console.error)
    }
    _getCart() {
        return this._cart
    }
    _setCart(t) {
        return this._cart = t, this.emit("cart", t), this._getCart()
    }
    async getCart() {
        return this._getCartPromise || (this._getCartPromise = Promise.resolve().then(async() => {
            await this._apiPromise;
            const t = await this._api.getCart({
                $headers: {
                    Authorization: "Bearer " + this._sessionId
                }
            });
            return this._setCart(t), delete this._getCartPromise, this._getCart()
        }).catch(t => {
            throw delete this._getCartPromise, t
        })), this._getCartPromise
    }
    async addProductToCart({
        sku: t,
        quantity: e
    }) {
        await this._apiPromise;
        const s = await this._api.addProductToCart({
            sku: t,
            quantity: e,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        });
        return this._setCart(s)
    }
    async setCartProductQuantity({
        sku: t,
        quantity: e
    }) {
        await this._apiPromise;
        const s = await this._api.setCartProductQuantity({
            sku: t,
            quantity: e,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        });
        return this._setCart(s)
    }
    async removeProductFromCart({
        sku: t,
        quantity: e
    }) {
        await this._apiPromise;
        const s = await this._api.removeProductFromCart({
            sku: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        });
        return this._setCart(s)
    }
    async setUserdata({
        userdata: t
    }) {
        await this._apiPromise, await this._api.setUserdata({
            ...t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        }), await this.getCart()
    }
    async setBusiness({
        business: t,
        cartRefresh: e = !0
    }) {
        await this._apiPromise, await this._api.setBusiness({
            business: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        }), e && await this.getCart()
    }
    async setCoupon({
        coupon: t
    }) {
        await this._apiPromise, await this._api.setCoupon({
            coupon: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        }), await this.getCart()
    }
    async getLocales() {
        return await this._apiPromise, this._api.getLocales({
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async setLocale({
        locale: t
    }) {
        await this._apiPromise, await this._api.setLocale({
            locale: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        }), await this.getCart()
    }
    async setPayment({
        payment: t
    }) {
        await this._apiPromise, await this._api.setPayment({
            payment: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        }), await this.getCart()
    }
    async getAddressSuggestion({
        zipcode: t,
        number: e
    }) {
        return await this._apiPromise, this._api.getAddressSuggestion({
            zipcode: t,
            number: e,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async validateVat({
        vat: t
    }) {
        return await this._apiPromise, this._api.validateVat({
            vat: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async createOrder() {
        return await this._apiPromise, this._api.createOrder({
            $headers: {
                Authorization: "Bearer " + this._sessionId
            },
            $timeout: 3e4
        })
    }
    async getOrder({
        orderId: t
    }) {
        return await this._apiPromise, this._api.getOrder({
            orderId: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async getOrders() {
        return await this._apiPromise, this._api.getOrders({
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async payOrder({
        orderId: t
    }) {
        return await this._apiPromise, this._api.payOrder({
            orderId: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
    async getProduct({
        sku: t
    }) {
        return await this._apiPromise, this._api.getProduct({
            productId: t,
            $headers: {
                Authorization: "Bearer " + this._sessionId
            }
        })
    }
}
class HYStoreBrowse {
    constructor(t) {
        this.$el = t, window.addEventListener("popstate", t => {
            this._loadURL(window.location.href, !1)
        }), this.$el.on("click", ".expand", t => {
            $(t.currentTarget).toggleClass("expanded");
            const e = $(t.currentTarget).hasClass("expanded");
            $(t.currentTarget).siblings(".filter.filter-hideable").toggleClass("filter-hidden", !e)
        }), this.$el.on("click", ".filter .checkbox", t => {
            $(t.currentTarget).parent().toggleClass("filter-selected checked"), this.onSelectionChange()
        }), this.$el.on("click", ".filter p", t => {
            $(t.currentTarget).siblings(".checkbox").trigger("click")
        }), this.$el.on("click", ".filter-clearall", t => {
            $(".filters .filter-selected", this.$el).removeClass("filter-selected checked"), this.onSelectionChange()
        }), this.$el.on("click", ".section-selected .filter .clear", t => {
            const e = $(t.currentTarget).parent().data("filter-id"),
                s = $(t.currentTarget).parent().data("filter-value");
            $(`.filters .section[data-filter-id="${e}"] .filter[data-filter-value="${s}"]`, this.$el).removeClass("filter-selected checked"), this.onSelectionChange()
        }), this.$el.on("click", ".dropdown-toggle", t => {
            $(t.currentTarget).parent().toggleClass("opened")
        }), this.$el.on("click", ".dropdown-item", t => {
            const e = $(t.currentTarget).data("sort-value"),
                s = $(t.currentTarget).text();
            $(".sort", this.$el).attr("data-sort-value", e).find(".dropdown-toggle").text(s), $(t.currentTarget).parent().parent().removeClass("opened"), this.onSelectionChange()
        })
    }
    onSelectionChange() {
        const t = {
                brand: [],
                category: [],
                technology: []
            },
            e = $(".sort", this.$el).data("sort-value");
        for (const e in t) $(`.filters .section-${e} .filter-selected`, this.$el).each((function() {
            const s = $(this).data("filter-value");
            t[e].push(s)
        }));
        $(".products", this.$el).addClass("loading");
        const s = this.constructor.buildParams({
            filter: t,
            sort: e
        });
        this._loadURL(s)
    }
    _loadURL(t, e = !0) {
        $.get(t).then(s => {
            $(".products", this.$el).removeClass("loading");
            const i = $.parseHTML(s);
            let n;
            try {
                const t = new RegExp(/<title[^>]*>(.*?)<\/title>/gi);
                n = t.exec(s)[1], document.title = n
            } catch (t) {
                console.error(t)
            }
            e && window.history.pushState({}, n, t);
            const a = {};
            $(".link.expand").each((function() {
                const t = $(this).hasClass("expanded"),
                    e = $(this).parents("[data-filter-id]").data("filter-id");
                a[e] = t
            }));
            const o = $(".store-browse", i);
            this.$el.html(o.html());
            for (const t in a) {
                const e = a[t],
                    s = this.$el.find(`[data-filter-id="${t}"]`);
                $(".link.expand", s).toggleClass("expanded", e), e && $(".filter-hidden", s).removeClass("filter-hidden")
            }
        })
    }
    static buildParams({
        filter: t,
        sort: e
    }) {
        const s = new URLSearchParams,
            i = [];
        return t && t.brand && t.brand.length && i.push("brand:" + t.brand.join(",")), t && t.category && t.category.length && i.push("category:" + t.category.join(",")), t && t.technology && t.technology.length && i.push("technology:" + t.technology.join(",")), console.log(i), i.length && s.set("filter", i.join("|")), e && "popular" !== e && s.set("sort", e), [...s].length ? HOMEY_STORE_URL + "?" + s.toString() : HOMEY_STORE_URL
    }
}
class HYStoreCheckout {
    constructor(t, {
        cloudApi: e,
        storeApi: s,
        scrollTo: i
    }) {
        this.cloudApi = e, this.storeApi = s, this.scrollTo = i, this.$el = t, this.$cart = $(".sidebar .cart", this.$el), this.$cartSummary = $(".summary", this.$cart), this.$cartItems = $(".items", this.$cart), this.$error = $(".error-message", this.$el), this._cart = null, this._step = null, this._error = null, this._newBillingAddress = !1, this._newShippingAddress = !1, this.cloudApi.on("user", this.onUser.bind(this)), this.cloudApi.on("addresses", this.onAddresses.bind(this)), this.storeApi.on("cart", this.onCart.bind(this)), this.storeApi.once("cart", t => {
            $("[data-country]", this.$el).each((e, s) => {
                const i = $(s);
                i.val(t.locale), this.checkCountryState(i)
            })
        }), this.initStepAuthenticate(), this.initStepUserdata(), this.initStepPayment(), this.initCountryStateField(), $('[data-step="userdata"]', this.$el).click(t => {
            "payment" === this._step && this.setStep("userdata")
        }), $("[data-submit]", this.$el).click(t => {
            $(t.currentTarget).parents("form").trigger("submit")
        }), this.$el.on("address-select", ".billing-address, .shipping-address, .new-billing-address, .new-shipping-address", t => {
            t.currentTarget.scrollIntoView && t.currentTarget.scrollIntoView({
                behavior: "smooth",
                block: "nearest",
                inline: "center"
            })
        }), this.showLoading()
    }
    initCountryStateField() {
        this.$el.find("[data-state-target]").on("change", t => {
            const e = $(t.currentTarget);
            this.checkCountryState(e)
        })
    }
    checkCountryState(t) {
        const e = t.data("state-target"),
            s = $(`[data-state-type="${e}"`),
            i = s.find("select"),
            n = i.find("option");
        let a = t.val();
        if (a in countryStates) {
            s.addClass("is-state"), n.remove();
            for (const t in countryStates[a]) i.append(`<option value="${t}">${countryStates[a][t]}</option>`);
            i.prop("disabled", !1)
        } else s.removeClass("is-state"), n.remove(), i.prop("disabled", !0)
    }
    initStepAuthenticate() {
        this._authenticateValidator = new HYValidator($('[data-step="authenticate"]', this.$el)), this._authenticateValidator.enableLiveValidation(), this.$el.on("submit", "#register", t => {
            t.preventDefault(), $("#authenticate-button").hasClass("button__disabled") || this._authenticateValidator.validate(t => {
                if (!t) return;
                const e = $('[data-step="authenticate"] [type="email"]').val();
                $('[data-step="userdata"] [type="email"]').val(e), this.setStep("userdata")
            })
        })
    }
    initStepUserdata() {
        const t = this;
        this._userdataValidator = new HYValidator($('[data-step="userdata"]', this.$el)), this._userdataValidator.enableLiveValidation(), this._userdataValidator.registerEngine("vat", (t, e) => {
            const s = $(t).find("input").val(),
                i = this.getShippingCountry();
            if (!1 === ["AT", "BE", "BG", "CY", "CZ", "DE", "DK", "EE", "EL", "ES", "FI", "FR", "HR", "HU", "IE", "IT", "LT", "LU", "LV", "MT", "NL", "PL", "PT", "RO", "SE", "SI", "XI", "SK"].includes(i)) return e(!0);
            this.storeApi.validateVat({
                vat: s
            }).then(t => e(!0 === t)).catch(t => t && "timeout" === t.message ? e(!0) : e(!1))
        }), this.$el.on("change", "#billing_country", t => {
            this.showLoading();
            const e = this.getShippingCountry();
            this.storeApi.setLocale({
                locale: e
            }).catch(t => {
                this.setError(t), this.hideLoading()
            }), this.getAddressSuggestion("billing")
        }), this.$el.on("change", "#shipping_country", t => {
            this.showLoading();
            const e = this.getShippingCountry();
            this.storeApi.setLocale({
                locale: e
            }).catch(t => {
                this.setError(t), this.hideLoading()
            }), this.getAddressSuggestion("shipping")
        }), this.$el.on("change", "#shipping_address", (t, e) => {
            this.showLoading();
            const s = this.getShippingCountry();
            !$(".shipping-address", this.$el).hasClass("selected") && !this._newShippingAddress && this._addresses && this._addresses.length > 0 && $(".shipping-address", this.$el).first().trigger("click"), this.storeApi.setLocale({
                locale: s
            }).catch(t => {
                this.setError(t), this.hideLoading()
            })
        }), this.$el.on("change", "#billing_zipcode, #billing_number", t => {
            this.getAddressSuggestion("billing")
        }), this.$el.on("change", "#shipping_zipcode, #shipping_number", t => {
            this.getAddressSuggestion("shipping")
        }), this.$el.on("change", "[data-toggle-fieldset]", (function(t) {
            const e = $(this).data("toggle-fieldset"),
                s = $(this).is(":checked");
            $(`[data-fieldset=${e}]`).toggleClass("collapsed", !s)
        })), this.$el.on("change", "#is_business", (function(e, s) {
            s = $(this).is(":checked"), t.toggleBusiness(s, !0)
        })), this.$el.on("click", "#userdata-button", t => {
            const e = $(t.currentTarget);
            e.hasClass("button__disabled") || e.hasClass("button__loading") || (e.addClass("button__loading"), this._userdataValidator.validate(async t => {
                if (!t) {
                    e.removeClass("button__loading");
                    const t = this.$el.find(".invalid").first();
                    return void this.scrollTo(t)
                }
                const s = {};
                $('[data-step="userdata"] input[name], [data-step="userdata"] select[name], [data-step="userdata"] select[data-state]', this.$el).each((function() {
                    const t = $(this);
                    if (t.is(":disabled")) return;
                    const e = t.attr("name"),
                        i = t.val();
                    s[e] = i
                })), $('input[type="checkbox"]', this.$el).each((function() {
                    const t = $(this).attr("name"),
                        e = $(this).is(":checked");
                    s[t] = e
                }));
                let i = null,
                    n = null;
                const a = $(".billing-address.selected", this.$el).attr("id"),
                    o = $(".shipping-address.selected", this.$el).attr("id");
                if (this._user) {
                    if (!a && !this._newBillingAddress) return e.removeClass("button__loading"), void this.scrollTo($(".billing-addresses", this.$el));
                    if (!o && !this._newShippingAddress && s.shipping_address) return e.removeClass("button__loading"), void this.scrollTo($(".shipping-addresses", this.$el));
                    if (null != a) {
                        const t = this._addresses.find(t => t._id === a);
                        t && this.setFieldsFromAddress(s, t, "billing")
                    }
                    if (s.shipping_address && o) {
                        const t = this._addresses.find(t => t._id === o);
                        t && this.setFieldsFromAddress(s, t, "shipping")
                    }
                }
                const r = Object.keys(s).reduce((t, e) => (t[e] = s[e], t), {});
                this.storeApi.setUserdata({
                    userdata: r
                }).then(async() => {
                    this.setStep("payment"), this._user && (!a && this._newBillingAddress && (i = await this.cloudApi.addUserAddress(this.getAddressFromFields(s, "billing")).catch(this.setError)), s.shipping_address && !o && this._newShippingAddress && (n = await this.cloudApi.addUserAddress(this.getAddressFromFields(s, "shipping")).catch(this.setError))), (n || i) && await this.cloudApi.getUserAddresses().catch(console.error), a && ($(".billing-address", this.$el).removeClass("selected"), $(`#${a}.billing-address`, this.$el).addClass("selected"), this.setIgnoreValidation("billing", !0)), o && ($(".shipping-address", this.$el).removeClass("selected"), $(`#${o}.shipping-address`, this.$el).addClass("selected"), this.setIgnoreValidation("shipping", !0)), i && ($(".billing-address", this.$el).removeClass("selected"), $(`#${i._id}.billing-address`, this.$el).addClass("selected"), $(".new-billing-address", this.$el).removeClass("active")), n && ($(".shipping-address", this.$el).removeClass("selected"), $(`#${n._id}.shipping-address`, this.$el).addClass("selected"), $(".new-shipping-address", this.$el).removeClass("active")), r.createAccount && r.password && this.cloudApi.loginWithCredentials({
                        username: r.email,
                        password: r.password
                    }).then(async() => {
                        this._user && (!a && this._newBillingAddress && (i = await this.cloudApi.addUserAddress(this.getAddressFromFields(s, "billing")).catch(this.setError)), s.shipping_address && !o && this._newShippingAddress && (n = await this.cloudApi.addUserAddress(this.getAddressFromFields(s, "shipping")).catch(this.setError)))
                    }).catch(console.error)
                }).catch(t => {
                    this.setError(t)
                }).then(() => {
                    e.removeClass("button__loading")
                })
            }))
        })
    }
    initStepPayment() {
        this.$el.on("click", ".payment-method", t => {
            $(".payment-method", this.$el).removeClass("selected"), $(t.currentTarget).addClass("selected");
            const e = $(t.currentTarget).data("payment-id");
            this.showLoading(), this.storeApi.setPayment({
                payment: e
            }).catch(t => {
                this.setError(t), this.hideLoading()
            }), dataLayer && dataLayer.push({
                event: "checkoutOption",
                ecommerce: {
                    checkout_option: {
                        actionField: {
                            step: 3,
                            option: e
                        }
                    }
                }
            })
        }), this.$el.on("submit", "#coupon", t => {
            t.preventDefault();
            const e = $('input[type="text"]', t.currentTarget).val();
            this.showLoading(), this.storeApi.setCoupon({
                coupon: e
            }).catch(t => {
                this.setError(t), this.hideLoading()
            })
        }), this.$el.on("change", '[name="has_coupon"]', (t, e) => {
            const s = e ? $('#coupon input[type="text"]', this.$el).val() : "";
            this.showLoading(), this.storeApi.setCoupon({
                coupon: s
            }).catch(t => {
                this.setError(t), this.hideLoading()
            })
        }), this.$el.on("click", "#payment-button", t => {
            const e = $(t.currentTarget);
            e.hasClass("button__disabled") || e.hasClass("button__loading") || (e.addClass("button__loading"), this.storeApi.createOrder().then(async t => {
                window.localStorage.setItem("hy.store.order", JSON.stringify(t));
                let e = await this.storeApi.payOrder({
                    orderId: String(t.id)
                });
                !0 === e && (e = HOMEY_STORE_SUCCESS_URL), window.location.href = e
            }).catch(t => {
                this.setError(t)
            }).then(() => {
                e.removeClass("button__loading")
            }))
        })
    }
    getShippingCountry() {
        const t = $("#shipping_country").val(),
            e = $("#billing_country").val();
        return $("#shipping_address").is(":checked") ? t : e
    }
    getAddressSuggestion(t) {
        const e = $(`#${t}_country`).val(),
            s = $(`#${t}_zipcode`).val(),
            i = $(`#${t}_number`).val();
        i && s && "NL" === e && this.storeApi.getAddressSuggestion({
            zipcode: s,
            number: parseInt(i)
        }).then(({
            street: e,
            city: s
        }) => {
            $(`#${t}_city`).val(s), $(`#${t}_street`).val(e)
        }).catch(console.error)
    }
    onUser(t) {
        this._user = t, t ? (this.cloudApi.getUserAddresses().catch(console.error), $("[data-user-name]", this.$el).text(t.firstname), $("#billing_firstname, #shipping_firstname", this.$el).val(t.firstname).trigger("change"), $("#billing_lastname, #shipping_lastname", this.$el).val(t.lastname).trigger("change"), $('[data-fieldset="personal"] #email', this.$el).val(t.email).trigger("change")) : this.$el.find("[data-user-name]").text("")
    }
    onAddresses(t) {
        this._addresses = t;
        const e = $("#billing-addresses", this.$el),
            s = $("#shipping-addresses", this.$el);
        if (e.text(""), s.text(""), this.setIgnoreValidation("billing", !1), this.setIgnoreValidation("shipping", !1), null == t || 0 === t.length) return e.parent().addClass("hide"), s.parent().addClass("hide"), $("#billing-address-fields-container", this.$el).removeClass("fold"), $("#shipping-address-fields-container", this.$el).removeClass("fold"), this._newBillingAddress = !0, void(this._newShippingAddress = !0);
        e.parent().removeClass("hide"), s.parent().removeClass("hide"), $("#billing-address-fields-container", this.$el).addClass("fold"), $("#shipping-address-fields-container", this.$el).addClass("fold"), this._newBillingAddress = !1, this._newShippingAddress = !1, t.forEach(t => {
            this.createAddressElement(e, t, "billing"), this.createAddressElement(s, t, "shipping")
        });
        const i = $('<div class="new-billing-address">');
        $('<div class="address-plus"></div>').appendTo(i), i.appendTo(e);
        const n = $('<div class="new-shipping-address">');
        $('<div class="address-plus"></div>').appendTo(n), n.appendTo(s), $(".new-billing-address", this.$el).off("click").on("click", t => {
            this.handleNewAddressClick(t, "billing"), this._newBillingAddress = !0
        }), $(".billing-address", this.$el).off("click").on("click", t => {
            this.handleAddressClick(t, "billing"), this._newBillingAddress = !1
        }), $(".new-shipping-address", this.$el).off("click").on("click", t => {
            this.handleNewAddressClick(t, "shipping"), this._newShippingAddress = !0
        }), $(".shipping-address", this.$el).off("click").on("click", t => {
            this.handleAddressClick(t, "shipping"), this._newShippingAddress = !1
        })
    }
    setIgnoreValidation(t, e) {
        $(`#${t}_firstname, #${t}_lastname, #${t}_number, #${t}_zipcode, #${t}_street, #${t}_city, #${t}_country #${t}_address_extra`, this.$el).parent().attr("data-ignore", e)
    }
    handleAddressClick(t, e) {
        this.setIgnoreValidation(e, !0), $(`.new-${e}-address`, this.$el).removeClass("active"), $(`.${e}-address`, this.$el).removeClass("selected"), $(`#${e}-address-fields-container`, this.$el).addClass("fold"), $(t.currentTarget).addClass("selected").trigger("address-select")
    }
    handleNewAddressClick(t, e) {
        this.setIgnoreValidation(e, !1), $(`.${e}-address`, this.$el).removeClass("selected"), $(`.new-${e}-address`, this.$el).addClass("active").trigger("address-select"), this.$el.find(`#${e}-address-fields-container .invalid`).removeClass("invalid"), $(`#${e}-address-fields-container`, this.$el).removeClass("fold")
    }
    createAddressElement(t, e, s) {
        const i = $(`<div class="${s}-address">`),
            n = $('<div class="name"></div>'),
            a = $("<div></div>"),
            o = $("<div></div>"),
            r = $("<div></div>"),
            l = $('<div class="remove"></div>');
        l.click(async t => {
            t.stopPropagation();
            const s = $(".billing-address.selected", this.$el).attr("id"),
                i = $("#shipping_address", this.$el).is(":checked"),
                n = $(".shipping-address.selected", this.$el).attr("id");
            await this.cloudApi.deleteUserAddress({
                addressId: e._id
            }).catch(console.error), await this.cloudApi.getUserAddresses().catch(console.error), s && s !== e._id && !this._newBillingAddress ? $(".billing-address#" + s, this.$el).first().trigger("click") : this._newBillingAddress || $(".billing-address", this.$el).first().trigger("click"), i && n && n !== e._id && this._newShippingAddress ? $(".shipping-address#" + n, this.$el).first().trigger("click") : this._newShippingAddress || $(".shipping-address", this.$el).first().trigger("click")
        }), n.appendTo(i), a.appendTo(i), o.appendTo(i), r.appendTo(i), l.appendTo(i), n.text(`${e.firstname} ${e.lastname}`), a.text(`${e.street} ${e.number} ${e.extra}`), o.text(`${e.state||""} ${e.zipcode} ${e.city}, ${e.country}`), i.attr("id", e._id), i.appendTo(t)
    }
    onCart(t) {
        if (this._cart = t, this.renderCart(), null === this._step && (t.userId ? this.setStep("userdata") : (this.setStep("authenticate"), this.$el.find('[data-step="authenticate"] input[type="email"]').focus())), null !== this._step && "authenticate" !== this._step || (t.userId ? this.setStep("userdata") : this._cart.hasGiftCard && this.setError(_p("not_logged_in"))), t.items.hasOwnProperty("homey_developer_athom_12m")) {
            const t = $("#is_business");
            t.prop("checked", !0), t.prop("disabled", !0), t.prop("readonly", !0), $('[data-fieldset="business"]').toggleClass("collapsed", !1), this.toggleBusiness(!0, !1)
        } else {
            const t = $("#is_business");
            t.prop("disabled", !1), t.prop("readonly", !1)
        }
    }
    setStep(t) {
        this._step = t, $("[data-step]", this.$el).removeClass("active").removeClass("filled"), $(`[data-step="${t}"]`, this.$el).addClass("active").prevAll("[data-step]").addClass("filled"), this.unsetError(), this.scrollTo();
        dataLayer && dataLayer.push({
            event: "checkout",
            ecommerce: {
                currencyCode: this._cart ? this._cart.currency : void 0,
                checkout: {
                    actionField: {
                        step: {
                            authenticate: 1,
                            userdata: 2,
                            payment: 3
                        }[t]
                    },
                    products: Object.values(this._cart ? this._cart.items : {}).map(t => {
                        const e = t.product,
                            s = t.quantity;
                        return {
                            name: e.name,
                            id: e.sku,
                            price: e.price,
                            brand: e.brand,
                            category: e.twh_category,
                            quantity: s
                        }
                    })
                }
            }
        }), "userdata" === t && ($(".billing-address", this.$el).hasClass("selected") || this._newBillingAddress || $(".billing-address", this.$el).first().trigger("click"), Promise.resolve().then(() => {
            setTimeout(() => {
                $(".billing-address.selected", this.$el).trigger("address-select"), $(".shipping-address.selected", this.$el).trigger("address-select")
            }, 500)
        }))
    }
    setError(t) {
        this._error || (this._error = t, this.$error.text(t.cause && t.cause.error || t.message || t.toString()), this.scrollTo(this.$error), $("#authenticate-button, #userdata-button, #payment-button", this.$el).addClass("button__disabled"))
    }
    unsetError() {
        this.$error.text(""), this._error = null, $("#userdata-button, #payment-button", this.$el).removeClass("button__disabled")
    }
    renderCart() {
        if (!this._cart || !this.$cart) return;
        this._cart.error ? (this._cart.errorTranslated = _p("errors." + this._cart.error), this._cart.errorTranslated ? this.setError(this._cart.errorTranslated) : this.setError(this._cart.error)) : this.unsetError();
        const t = Object.keys(this._cart.items).length;
        this.$cart.attr("data-count", t), this.$cart.find(".subtitle .total").text(t), $(".item", this.$cartItems).remove(), Object.values(this._cart.items).forEach(t => {
            const e = $("<li>");
            e.addClass("item"), e.html(`<a href="${HOMEY_PRODUCT_URL.replace("SKU",t.product.sku)}" target="_blank">\n        <span class="image" style="background-image: url(${t.product.image});"></span>\n        <span class="quantity">${t.quantity}x</span>\n        <span class="name" title="${t.product.name}">${t.product.name}</span>\n      </a>`), e.appendTo(this.$cartItems);
            const s = !countriesWithVat.includes(this._cart.locale);
            $(".vat-message").toggleClass("is-visible", s)
        }), this.$cartSummary.find('[data-summary-field="subtotal_total"]').html(formatPrice(this._cart.subtotal_total, this._cart.currency_symbol)), this.$cartSummary.find('[data-summary-field="subtotal_tax"]').html(formatPrice(this._cart.subtotal_tax, this._cart.currency_symbol, {
            allowFree: !1
        })), this.$cartSummary.find('[data-summary-field="shipping_total"]').html(formatPrice(this._cart.shipping_total, this._cart.currency_symbol)).parent().attr("data-value", this._cart.shipping_total), this.$cartSummary.find('[data-summary-field="discount_total"]').html("- " + formatPrice(this._cart.discount_total, this._cart.currency_symbol)).parent().attr("data-value", this._cart.discount_total), this.$cartSummary.find('[data-summary-field="total"]').html(formatPrice(this._cart.total, this._cart.currency_symbol)), Object.keys(this._cart.paymentsAvailable).forEach(t => {
            const e = this._cart.paymentsAvailable[t].enabled;
            $(`.payment-method[data-payment-id="${t}"]`).toggleClass("enabled", e)
        }), $(".payment-method.selected").length || $(".payment-method:first-child").trigger("click"), this.hideLoading()
    }
    showLoading() {
        this.$cart.addClass("loading")
    }
    hideLoading() {
        this.$cart.removeClass("loading")
    }
    getAddressFromFields(t, e) {
        return {
            firstname: t[e + "_firstname"],
            lastname: t[e + "_lastname"],
            city: t[e + "_city"],
            country: t[e + "_country"],
            state: t[e + "_state"],
            number: t[e + "_number"],
            street: t[e + "_street"],
            zipcode: t[e + "_zipcode"],
            extra: t[e + "_address_extra"]
        }
    }
    setFieldsFromAddress(t, e, s) {
        t[s + "_firstname"] = e.firstname, t[s + "_lastname"] = e.lastname, t[s + "_city"] = e.city, t[s + "_country"] = e.country, t[s + "_number"] = e.number, t[s + "_street"] = e.street, t[s + "_zipcode"] = e.zipcode, t[s + "_address_extra"] = e.extra
    }
    toggleBusiness(t, e) {
        this.storeApi.setBusiness({
            business: t,
            cartRefresh: e
        }).catch(console.error)
    }
}
class HYStoreCheckoutSuccess {
    constructor(t, {
        cloudApi: e,
        storeApi: s
    }) {
        this.cloudApi = e, this.storeApi = s, this.$el = t, this.cloudApi.on("user", this.onUser.bind(this))
    }
    onUser() {
        let t = JSON.parse(window.localStorage.getItem("hy.store.order"));
        window.localStorage.removeItem("hy.store.order"), t && dataLayer && dataLayer.push({
            event: "transaction",
            ecommerce: {
                currencyCode: t.currency,
                purchase: {
                    actionField: {
                        id: "" + t.id,
                        revenue: "" + t.total_total,
                        tax: "" + t.total_tax,
                        shipping: "" + t.shipping_total,
                        coupon: t.coupons.join(",")
                    },
                    products: t.products.map(t => ({
                        name: "" + t.product.name,
                        id: "" + t.product.sku,
                        price: "" + t.product.price,
                        brand: "",
                        category: "",
                        variant: "",
                        quantity: t.quantity
                    }))
                }
            }
        })
    }
}
class HYStoreProduct {
    constructor(t) {
        this.$el = t, this.$images = $(".images", this.$el), $(".images-viewer .image", this.$images).each((function() {
            const t = $(this).data("image");
            $(this).zoom({
                touch: !1,
                url: t
            })
        })), $(".images-pager .image", this.$images).each((function() {
            $(this).click((function() {
                const t = $(this).index();
                $(".images-viewer .image.visible", this.$images).removeClass("visible"), $(".images-viewer .image:nth-child(" + (t + 1) + ")", this.$images).addClass("visible")
            }))
        }))
    }
}
class HYTWHHouse {
    constructor(t) {
        this.$el = t, this.$inner = $(".twh-house-inner", this.$el), this.$hint = $(".hint", this.$el), this.$categories = $(".categories", this.$el), this.dragging = !1, this.dragStart = null, this.scrollStart = null, this.onResize = this.onResize.bind(this), this.onMouseDown = this.onMouseDown.bind(this), this.onMouseMove = this.onMouseMove.bind(this), this.onMouseUp = this.onMouseUp.bind(this), this.$inner.on("mousedown touchstart", this.onMouseDown), this.$inner.on("mousemove touchmove", this.onMouseMove), this.$inner.on("mouseup mouseout touchend", this.onMouseUp), $(window).on("resize", this.onResize), this.onResize(), this.$image = new Image, this.$image.src = "/img/pages/talks-with-homey/house.jpg", this.$image.addEventListener("load", () => {
            this.$inner.css({
                backgroundImage: `url(${this.$image.src})`
            }).addClass("visible");
            const t = -($(window).innerWidth() - this.width) / 2;
            $(this.$el).scrollLeft(t - 100), $(this.$el).animate({
                scrollLeft: t
            }, 1200), $(".category", this.$categories).each((function(t) {
                setTimeout(() => {
                    $(".bullet", this).addClass("visible")
                }, 10 * t)
            }))
        }), this.showHint(), $(".category", this.$categories).each((function() {
            const t = $(".products", this);
            $(".bullet", this).click(e => (e.preventDefault(), t.addClass("visible"), !1)), $(".products", this).click((function() {
                t.removeClass("visible")
            })), $(".close", t).click((function() {
                t.removeClass("visible")
            })), $(t).on("touchmove mousemove click", (function(t) {
                t.stopPropagation()
            })), $(".container", t).click((function(t) {
                t.stopPropagation()
            }))
        })), $(document).keyup(t => {
            27 === t.keyCode && $(".products.visible", this.$categories).removeClass("visible")
        })
    }
    onResize() {
        this.height = $(window).innerHeight(), this.width = 2.667 * this.height, this.$inner.css({
            height: this.height,
            width: this.width
        })
    }
    onMouseDown(t) {
        this.dragging = !0, this.dragStart = t.touches ? t.touches[0].clientX : t.clientX, this.scrollStart = $(this.$el).scrollLeft()
    }
    onMouseMove(t) {
        if (!this.dragging) return;
        const e = t.touches ? t.touches[0].clientX : t.clientX,
            s = this.dragStart - e;
        $(this.$el).stop(), $(this.$el).scrollLeft(this.scrollStart + s), this.hideHint(), Cookies.set("hy.twh-hint", "no", {
            expires: 9999
        })
    }
    onMouseUp(t) {
        this.dragging = !1, this.dragStart = void 0
    }
    showHint() {
        this.$hint.addClass("visible")
    }
    hideHint() {
        this.$hint.removeClass("visible")
    }
}

function HYValidator(t) {
    this._el = t, this._engines = {}, this._opts = {}, this.registerEngine("text", this._engineText.bind(this)), this.registerEngine("password", this._enginePassword.bind(this)), this.registerEngine("email", this._engineEmail.bind(this)), this.registerEngine("zipcode", this._engineZipcode.bind(this)), this.registerEngine("dropdown", this._engineDropdown.bind(this))
}
HYValidator.prototype.setOpt = function(t, e) {
    this._opts[t] = e
}, HYValidator.prototype.registerEngine = function(t, e) {
    this._engines[t] = e
}, HYValidator.prototype.enableLiveValidation = function() {
    $(".field.required[data-validate]", this._el).each(function(t, e) {
        var s = this._getInput(e);
        $(s).on("change blur", function() {
            this._validateElement(e)
        }.bind(this))
    }.bind(this))
}, HYValidator.prototype.validate = function(t) {
    var e = !0,
        s = 0,
        i = 0;
    if ($(".field[data-validate]", this._el).each(function(n, a) {
            var o = $(a).parents("fieldset");
            if (o.length) {
                if ($(o).hasClass("collapsed")) return;
                if (!$(o).is(":visible")) return
            }
            "true" != $(a).attr("data-ignore") && (s++, setTimeout(function() {
                this._validateElement(a, (function(n) {
                    if (!0 !== n && (e = !1), ++i === s) return t(e)
                }))
            }.bind(this), 0))
        }.bind(this)), 0 === s) return t(!0)
}, HYValidator.prototype._validateElement = function(t, e) {
    var s = $(t).data("validate"),
        i = this._engines[s];
    i ? i(t, function(s) {
        $(t).removeClass("valid invalid"), s ? t.hasAttribute("data-validate-ignore-success") || $(t).addClass("valid") : $(t).addClass("invalid"), e && e(s)
    }.bind(this)) : e && e(!0)
}, HYValidator.prototype._engineText = function(t, e) {
    var s = this._getValue(t);
    return e(s && s.length > 0)
}, HYValidator.prototype._enginePassword = function(t, e) {
    var s = this._getValue(t);
    return e(s && s.length >= 6)
}, HYValidator.prototype._engineEmail = function(t, e) {
    var s = this._getValue(t);
    return e(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(s))
}, HYValidator.prototype._engineZipcode = function(t, e) {
    if ("NL" === this._opts.country) {
        var s = this._getValue(t);
        s = s.replace(/\ /g, "");
        return /^[1-9][0-9]{3} ?(?!sa|sd|ss)[a-z]{2}$/i.test(s)
    }
    return this._engineText(t, e)
}, HYValidator.prototype._engineDropdown = function(t, e) {
    var s = this._getValue(t);
    return e(s && s.length > 0)
}, HYValidator.prototype._getInput = function(t, e) {
    return $(t).hasClass("select") ? $(t).find("select") : $(t).find("input")
}, HYValidator.prototype._getValue = function(t, e) {
    var s = this._getInput(t);
    return $(s).val()
};
class HYViewport {
    breakpoints = {
        xs: 0,
        sm: 576,
        md: 768,
        lg: 992,
        xl: 1200,
        xxl: 1440
    };
    breakpointOperator = {
        greaterThen: function(t, e) {
            return t >= e
        },
        lesserThen: function(t, e) {
            return t < e
        }
    };
    viewportSize = null;
    previousViewportSize = [];
    constructor() {}
    onInit(t, e, s) {
        this._checkBreakpoint(t, e, s)
    }
    onResize(t, e, s) {
        window.addEventListener("resize", () => {
            this._checkBreakpoint(t, e, s)
        })
    }
    onInitResize(t, e, s) {
        this.onInit(t, e, s), this.onResize(t, e, s)
    }
    up(t) {
        return window.innerWidth >= this.breakpoints[t]
    }
    down(t) {
        return window.innerWidth < this.breakpoints[t]
    }
    getFilteredViewports(t) {
        return Object.keys(this.breakpoints).filter(e => !t.includes(e))
    }
    _checkBreakpoint(t, e, s = "greaterThen") {
        e || (e = Object.keys(this.breakpoints));
        let i = [];
        this.viewportSize = null, e.forEach(t => {
            this.breakpointOperator[s](window.innerWidth, this.breakpoints[t]) && (this.viewportSize = t, i.push(t))
        }), this.viewportSize !== this.previousViewportSize[s] && (this.previousViewportSize[s] = this.viewportSize, i.length > 0 && t(this.viewportSize, i))
    }
}
class HYWebsite {
    constructor() {
        this.onScroll = this.onScroll.bind(this), this.scrollTo = this.scrollTo.bind(this), this.lockScroll = this.lockScroll.bind(this), this.unlockScroll = this.unlockScroll.bind(this), this.$window = $(window), this.$window.on("scroll", this.onScroll), this.$html = $("html"), this.$body = $("body"), this.$el = $(".website", this.$body), this.onScroll();
        const t = {
                scrollTo: this.scrollTo,
                lockScroll: this.lockScroll,
                unlockScroll: this.unlockScroll,
                $website: this.$el
            },
            e = this.cloudApi = t.cloudApi = new HYCloudApi(this.$el, t),
            s = this.storeApi = t.storeApi = new HYStoreApi(this.$el, t);
        this.$nav = $(".nav-wrap", this.$el), this.nav = new HYNav(this.$nav, t), this.navMenu = new HYNavMenu(this.$nav), this.navMobile = new HYNavMobile(this.$nav), this.$cart = $(".nav-cart", this.$el), this.cart = new HYCart(this.$cart, t), this.$footer = $(".footer"), this.footer = new HYFooter(this.$footer, t), window.HYPopup = new HYPopup, new HYScrollTo, $(".twh-house").each(() => {
            this.$twhHouse = $(".twh-house"), this.twhHouse = new HYTWHHouse(this.$twhHouse, t)
        }), $(".widget-newsletter").each((function() {
            new HYWidgetNewsletter($(this), t)
        })), $(".widget-usecase").each((function() {
            new HYWidgetUsecase($(this), t)
        })), $(".widget-usecases-row").each((function() {
            new HYWidgetUsecasesRow($(this), t)
        })), $(".widget-products-row").each((function() {
            new HYWidgetProductsRow($(this), t)
        })), $(".hy-checkbox").each((function() {
            new HYCheckbox($(this), t)
        })), $(".store-product").each((function() {
            new HYStoreProduct($(this), t)
        })), this.$storeBrowse = $(".store-browse", this.$el), this.$storeBrowse.length && (this.storeBrowse = new HYStoreBrowse(this.$storeBrowse, t)), this.$storeCheckout = $(".store-checkout", this.$el), this.$storeCheckout.length && (this.storeCheckout = new HYStoreCheckout(this.$storeCheckout, t)), this.$storeCheckoutSuccess = $(".store-checkout-success", this.$el), this.$storeCheckoutSuccess.length && (this.storeCheckoutSuccess = new HYStoreCheckoutSuccess(this.$storeCheckoutSuccess, t)), this.$account = $(".account", this.$el), this.$account.length && (this.account = new HYAccount(this.$account, t)), this.$sharedFlow = $(".shared-flow", this.$el), this.$sharedFlow.length && (this.sharedFlow = new HYSharedFlow(this.$sharedFlow)), this.$app = $('[data-hy-page="app"]'), this.$app.length && (this.app = new HYApp(this.$app, t)), this.$apps = $('[data-hy-page="apps"]'), this.$apps.length && (this.apps = new HYApps(this.$apps, {
            nav: this.nav
        })), this.$app = $('[data-hy-page="appsBrowse"]'), this.$app.length && (this.app = new HYAppsBrowse(this.$app, t)), $.ajax({
            url: "https://cdn.athom.com/homey-api/1.5.9.js",
            cache: !0,
            dataType: "script"
        }).then(() => {
            e.onAthomApi(), s.onAthomApi()
        }), s.init(), e.init(), null !== this.supportFormatWebp() ? this.$html.addClass("webp") : this.$html.addClass("no-webp")
    }
    onScroll() {
        const t = this.$window.scrollTop();
        this.$nav && this.$nav.toggleClass("sticky", t > 0)
    }
    scrollTo(t = 0, e = 350) {
        t instanceof jQuery && (t = t[0].offsetTop);
        const s = "scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove",
            i = () => {
                this.$html.stop()
            };
        this.$html.on(s, i), this.$html.stop().animate({
            scrollTop: t
        }, e, () => {
            this.$html.off(s, i)
        })
    }
    lockScroll() {
        this.$body.addClass("overlay-visible")
    }
    unlockScroll() {
        this.$body.removeClass("overlay-visible")
    }
    static subscribeToNewsletter({
        email: t
    }) {
        return "undefined" != typeof dataLayer && dataLayer.push({
            event: "newsletterSubscribe"
        }), $.ajax({
            type: "post",
            url: "/api/newsletter",
            data: JSON.stringify({
                email: t
            }),
            contentType: "application/json"
        })
    }
    supportFormatWebp() {
        var t = document.createElement("canvas");
        return !(!t.getContext || !t.getContext("2d")) && 0 == t.toDataURL("image/webp").indexOf("data:image/webp")
    }
}
class HYWidgetNewsletter {
    constructor(t) {
        this.$el = t, this.$archive = $(".archive", this.$el), this.$form = $(".form", this.$el), this.$email = $('input[type="email"]', this.$form), this.$archive.on("inview", this.onInView.bind(this)), this.$form.submit(this.onSubmit.bind(this))
    }
    onInView(t, e) {
        this.$el.addClass("visible")
    }
    onSubmit(t) {
        t.preventDefault();
        const e = this.$email.val();
        if (!(e.length < 3) && e.includes("@")) return this.$form.addClass("loading"), HYWebsite.subscribeToNewsletter({
            email: e
        }).then(() => {
            this.$form.addClass("subscribed"), setTimeout(() => {
                this.$form.removeClass("subscribed"), this.$email.val("")
            }, 3e3)
        }).catch(t => {
            console.error(t), alert(t.responseJSON && t.responseJSON.error || t.message || t.toString())
        }).always(() => {
            this.$form.removeClass("loading")
        }), !1
    }
}
class HYWidgetProductsRow {
    constructor(t) {
        this.$el = t, this.$inner = $(".inner", this.$el), $(".first", this.$inner).on("inview", (t, e) => {
            $(this.$inner).siblings(".prev").toggleClass("visible", !e)
        }), $(".last", this.$inner).on("inview", (t, e) => {
            $(this.$inner).siblings(".next").toggleClass("visible", !e)
        }), $(".prev", this.$el).click(() => {
            this.$inner.animate({
                scrollLeft: "-=400"
            }, 350)
        }), $(".next", this.$el).click(() => {
            this.$inner.animate({
                scrollLeft: "+=400"
            }, 350)
        })
    }
}
class HYWidgetUsecase {
    constructor(t, {
        lockScroll: e,
        unlockScroll: s
    }) {
        this.$el = t, this.lockScroll = e, this.unlockScroll = s, this.$products = this.$el.find(".products-list"), this.$overlayShow = $(".overlay-show", this.$el), this.$overlayShow.click(this.showOverlay.bind(this)), this.$overlayClose = $(".overlay-close", this.$el), this.$overlayClose.click(this.hideOverlay.bind(this)), $(".pulse", this.$el).each((e, s) => {
            const i = $(".product:nth-child(" + ($(s).index() + 1) + ")", t);
            $(s).mouseover(() => {
                const t = i.data("position");
                this.$products.stop().animate({
                    scrollTop: t.top - 20,
                    scrollLeft: t.left - 20
                }, 200)
            }), $(s).hover(() => {
                i.addClass("hover")
            }, () => {
                i.removeClass("hover")
            })
        }), $(window).resize(this.onResize.bind(this)), this.onResize()
    }
    onResize() {
        this.$products.find(".product").each((function() {
            const t = $(this).position();
            $(this).data("position", t)
        })), this.$products.stop().animate({
            scrollTop: 0,
            scrollLeft: 0
        }, 0)
    }
    showOverlay() {
        $(this.$el).addClass("overlay-visible"), "fixed" === $(this.$el).find(".overlay").css("position") && this.lockScroll()
    }
    hideOverlay() {
        $(this.$el).removeClass("overlay-visible"), this.unlockScroll()
    }
}
class HYWidgetUsecasesRow {
    constructor(t) {
        this.$el = t, this.$inner = this.$el.find(".inner"), this.$pager = this.$el.find(".pager"), this.$pagerItems = this.$pager.find(".pager-item"), this.$pagerItems.click(t => {
            const e = $(t.currentTarget).index();
            this.$inner.css({
                transform: `translateX(${-100*e}vw)`
            }), this.$pagerItems.removeClass("active"), $(t.currentTarget).addClass("active")
        })
    }
}
$(document).ready((function() {
    window.hyWebsite = new HYWebsite
}));
class HYBezierEasing {
    constructor(r, n, t, u) {
        var e = "function" == typeof Float32Array;

        function o(r, n) {
            return 1 - 3 * n + 3 * r
        }

        function i(r, n) {
            return 3 * n - 6 * r
        }

        function a(r) {
            return 3 * r
        }

        function f(r, n, t) {
            return ((o(n, t) * r + i(n, t)) * r + a(n)) * r
        }

        function c(r, n, t) {
            return 3 * o(n, t) * r * r + 2 * i(n, t) * r + a(n)
        }
        if (!(0 <= r && r <= 1 && 0 <= t && t <= 1)) throw new Error("bezier x values must be in [0, 1] range");
        if (r === n && t === u) return function(r) {
            return r
        };
        for (var v = e ? new Float32Array(11) : new Array(11), s = 0; s < 11; ++s) v[s] = f(.1 * s, r, t);

        function l(n) {
            for (var u = 0, e = 1; 10 !== e && v[e] <= n; ++e) u += .1;
            --e;
            var o = u + .1 * ((n - v[e]) / (v[e + 1] - v[e])),
                i = c(o, r, t);
            return i >= .001 ? function(r, n, t, u) {
                for (var e = 0; e < 4; ++e) {
                    var o = c(n, t, u);
                    if (0 === o) return n;
                    n -= (f(n, t, u) - r) / o
                }
                return n
            }(n, o, r, t) : 0 === i ? o : function(r, n, t, u, e) {
                var o, i, a = 0;
                do {
                    (o = f(i = n + (t - n) / 2, u, e) - r) > 0 ? t = i : n = i
                } while (Math.abs(o) > 1e-7 && ++a < 10);
                return i
            }(n, u, u + .1, r, t)
        }
        return function(r) {
            return 0 === r || 1 === r ? r : f(l(r), n, u)
        }
    }
}
class HYSlider {
    constructor(t = {
        $: i,
        $window: $window,
        $container: $container,
        $dragger: $dragger,
        $content: $content,
        $buttonNext: null,
        $buttonPrev: null,
        $dots: null,
        manualWidth: {
            xs: null,
            md: null
        },
        infinity: !1,
        animationDuration: 300
    }) {
        this.Viewport = new HYViewport, this.isDragging = !1, this.isScrolling = !1, this.mouseDownX = 0, this.transformX = 0, this.maxTransformX = null, this.relX = 0, this.animateUID = null, this.animationDuration = 300, this.currentID = 0, this.currentSize = null, this.infinityGap = 16, this.startTouch = {
            x: null,
            y: null
        };
        const i = t.$;
        this.$body = i("body"), this.$window = t.$window, this.$container = t.$container, this.$dragger = t.$dragger, this.$content = t.$content, this.$buttonPrev = t.$buttonPrev ? t.$buttonPrev : this.$buttonPrev, this.$buttonNext = t.$buttonNext ? t.$buttonNext : this.$buttonNext, this.$dots = t.$dots ? t.$dots : this.$dots, this.infinity = t.infinity ? t.infinity : this.infinity, this.manualWidth = t.manualWidth, this.animationDuration = t.animationDuration ? t.animationDuration : this.animationDuration
    }
    init() {
        this.initResizeEvents(), this.initInfinityModus(), this.initButtonHandlers(), this.initMouseEvents(), this.initTouchEvents(), this.initDotHandlers()
    }
    initDotHandlers() {
        this.$dots && this.$dots.children().on("click", t => this.dotEvent(t))
    }
    dotEvent(t) {
        t.preventDefault();
        let i = $(t.currentTarget).index();
        if (i === this.currentID) return !1;
        let s = this.getItemSize(),
            e = this.getUID();
        this.animateUID = e, this.transformX = s * i * -1, this.animateToPosition(e), this.setCurrentID(), this.setCurrentDot()
    }
    initResizeEvents() {
        this.Viewport.onResize(() => {
            const t = this.currentSize ? this.currentSize : this.getItemSize(),
                i = this.getItemSize();
            this.maxTransformX = 0 - this.$content.width() + i, this.transformX = this.transformX / t * i;
            let s = this.getUID();
            this.animateUID = s, this.animateToPosition(s)
        })
    }
    initInfinityModus() {
        this.infinity && (this.$dragger.append(this.$content.clone()), this.$dragger.append(this.$content.clone()), this.transformX = 0 - this.$content.width() - this.infinityGap, this.$dragger.css("--translateX", this.transformX + "px"))
    }
    initMouseEvents() {
        this.$container.on("mousedown", t => {
            this.isDragging = !0, this.mouseDownX = t.pageX, this.$body.on("mouseup.dragger, mouseleave.dragger", () => {
                if (this.isDragging) {
                    this.isDragging = !1, this.transformX += this.relX;
                    let t = this.getItemSize();
                    this.relX > 100 || this.relX > -100 && this.relX < 0 ? this.transformX = Math.ceil(this.transformX / t) * t : this.transformX = Math.floor(this.transformX / t) * t, this.transformX = this.calcBoundary(this.transformX), this.$dragger.addClass("animate-to-center"), this.$dragger.css("--translateX", this.transformX + "px"), this.setCurrentID(), this.setCurrentDot(), setTimeout(() => {
                        this.$dragger.removeClass("animate-to-center"), this.resetTransform()
                    }, this.animationDuration), this.$body.off("mouseup.dragger, mouseleave.dragger"), this.$window.off("mousemove.dragger")
                }
            }), this.$window.on("mousemove.dragger", t => {
                if (this.isDragging) {
                    let i = t.pageX;
                    this.relX = i - this.mouseDownX, this.$dragger.css("--translateX", this.calcMaxBounce(this.transformX + this.relX) + "px")
                }
            })
        })
    }
    initTouchEvents() {
        this.$container.on("touchstart", t => {
            this.startTouch.x = t.touches[0].pageX, this.startTouch.y = t.touches[0].clientY, this.$body.on("touchend.dragger, touchcancel.dragger", this.touchEnd), document.addEventListener("touchmove", this.touchMove, {
                passive: !1
            }), this.preventSwipeToPreviousNextPage(t)
        })
    }
    preventSwipeToPreviousNextPage(t) {
        let i = t.pageX ? t.pageX : t.touches[0].pageX;
        i > 20 && i < window.innerWidth - 20 || t.preventDefault()
    }
    touchEnd = () => {
        if (this.isDragging) {
            this.transformX += this.relX;
            let t = this.getItemSize();
            this.relX > 100 || this.relX > -100 && this.relX < 0 ? this.transformX = Math.ceil(this.transformX / t) * t : this.transformX = Math.floor(this.transformX / t) * t, this.transformX = this.calcBoundary(this.transformX), this.$dragger.addClass("animate-to-center"), this.$dragger.css("--translateX", this.transformX + "px"), this.setCurrentID(), this.setCurrentDot(), setTimeout(() => {
                this.$dragger.removeClass("animate-to-center"), this.resetTransform()
            }, this.animationDuration)
        }
        this.$body.off("touchend.dragger, touchcancel.dragger"), document.removeEventListener("touchmove", this.touchMove), this.startTouch.x = !1, this.startTouch.y = !1, this.relX = 0, this.isScrolling = !1, this.isDragging = !1
    };
    touchMove = t => {
        let i = t.touches[0].pageX;
        if (this.isDragging && !this.isScrolling) t.preventDefault(), this.relX = i - this.startTouch.x, this.$dragger.css("--translateX", this.calcMaxBounce(this.transformX + this.relX) + "px");
        else if (this.isScrolling);
        else {
            let s = t.touches[0].clientY,
                e = Math.abs(this.startTouch.x - i),
                n = Math.abs(this.startTouch.y - s);
            e > n ? this.isDragging = !0 : e < n && (this.isScrolling = !0)
        }
    };
    initButtonHandlers() {
        this.$buttonPrev && this.$buttonNext && (this.$buttonPrev.on("click", t => {
            t.preventDefault();
            let i = this.getUID();
            this.animateUID = i;
            let s = this.getItemSize();
            this.transformX = Math.floor((this.transformX + s) / s) * s, this.setCurrentID(), this.setCurrentDot(), this.animateToPosition(i)
        }), this.$buttonNext.on("click", t => {
            t.preventDefault();
            let i = this.getUID();
            this.animateUID = i;
            let s = this.getItemSize();
            this.transformX = Math.ceil((this.transformX - s) / s) * s, this.setCurrentID(), this.setCurrentDot(), this.animateToPosition(i)
        }))
    }
    setCurrentDot() {
        this.$dots && this.$dots.children().each((t, i) => {
            const s = $(i);
            s.removeClass("is-active"), t === this.currentID && s.addClass("is-active")
        })
    }
    setCurrentID() {
        const t = this.getItemSize();
        let i = Math.abs(Math.round(this.transformX / t));
        if (this.$content && this.infinity) {
            let t = this.$content.children().length;
            for (; i >= t;) i -= t
        }
        this.currentID = i
    }
    getItemSize = () => (this.currentSize = this.Viewport.up("md") ? this.manualWidth.md : this.manualWidth.xs, this.currentSize);
    calcBoundary(t) {
        return this.infinity || (t > 0 ? t = 0 : t < this.maxTransformX && (t = this.maxTransformX)), t
    }
    calcMaxBounce(t) {
        if (this.infinity) return t;
        if (t < this.maxTransformX) {
            let i = t - this.maxTransformX;
            t = this.maxTransformX - Math.round(50 - 50 * Math.exp(i / 50))
        } else if (t > 0) {
            let i = 0 - t;
            t = Math.round(50 - 50 * Math.exp(i / 50))
        }
        return t
    }
    resetTransform() {
        if (!this.infinity) return;
        const t = this.$content.width() + 32,
            i = 2 * t;
        this.transformX < 0 - i ? (this.transformX = this.transformX + t, this.$dragger.css("transition", ""), this.$dragger.css("--translateX", this.transformX + "px")) : this.transformX > 0 - t && (this.transformX = this.transformX - t, this.$dragger.css("transition", ""), this.$dragger.css("--translateX", this.transformX + "px"))
    }
    animateToPosition(t) {
        this.$dragger.css("--translateX", this.transformX + "px"), this.$dragger.css("transition", `transform ${this.animationDuration}ms ease-out`), setTimeout(() => {
            this.animateUID === t && (this.$dragger.css("transition", ""), this.resetTransform())
        }, this.animationDuration)
    }
    getUID() {
        return Math.round(1e4 * Math.random())
    }
}
class HYDarkmode {
    target = 1;
    thresholds = 10;
    constructor(e = {
        target: target,
        thresholds: thresholds
    }) {
        this.target = e.target ? e.target : this.target, this.thresholds = e.thresholds ? e.thresholds : this.target
    }
    init() {
        const e = $(`[data-darkmode-trigger="${this.target}"]`),
            t = $(`[data-darkmode-target="${this.target}"]`),
            a = new HYIntersectionObserver({
                thresholds: this.thresholds
            });
        e.each((e, s) => {
            a.addTarget(s, (function(e, a) {
                a.getPercentage() >= .5 ? (t.addClass("darkmode"), t.addClass("darkmode-fade-in"), setTimeout((function() {
                    t.removeClass("darkmode-fade-in")
                }), 1e3)) : a.getPercentage() < .5 && (t.removeClass("darkmode"), t.addClass("darkmode-fade-out"), setTimeout((function() {
                    t.removeClass("darkmode-fade-out")
                }), 1e3))
            }))
        })
    }
}
class HYToc {
    currentSection = !1;
    $toc = !1;
    $tocItems = !1;
    offset = 100;
    target = null;
    constructor(t) {
        this.target = t.target, this.offset = t.offset ? t.offset : this.offset, this.init()
    }
    init() {
        this.$toc = window.$(this.target), this.$tocItems = this.$toc.find("a"), this.initHashPosition(), this.scrollToSectionHandler(), this.highlightTocItemHandler()
    }
    highlightTocItemHandler() {
        const t = window.$("[data-toc-section]");
        let o = [];
        const e = new IntersectionObserver(t => {
            t.forEach(t => {
                const e = t.intersectionRect.height / window.innerHeight,
                    i = Math.max(t.intersectionRatio, e),
                    n = t.target.dataset.tocSection;
                o[n] = i
            }), this.currentSection = this.getSectionWithHighestIntersectionRatio(o), this.updateTocState()
        }, {
            root: null,
            rootMargin: "100px",
            threshold: [0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1]
        });
        t.each((t, o) => {
            e.observe(o)
        })
    }
    updateTocState() {
        this.$tocItems.removeClass("is-current"), this.$toc.find(`[href="#${this.currentSection}"]`).addClass("is-current")
    }
    scrollToSectionHandler() {
        const t = this;
        this.$tocItems.on("click", (function() {
            const o = window.$(this).attr("href"),
                e = window.$(o);
            e.length <= 0 || window.$([document.documentElement, document.body]).animate({
                scrollTop: e.offset().top - t.offset
            }, 500)
        }))
    }
    initHashPosition() {
        const t = window.$(window.location.hash);
        t.length <= 0 || window.location.hash && window.$([document.documentElement, document.body]).scrollTop(t.offset().top - this.offset)
    }
    getSectionWithHighestIntersectionRatio(t) {
        return Object.keys(t).reduce((o, e) => t[o] > t[e] ? o : e)
    }
}! function(t, e) {
    "use strict";

    function o(o) {
        const s = t(e).width(),
            i = o.outerWidth();
        o.offset().left + i > s && o.addClass("is-mirror-x")
    }
    t(document).ready((function() {
        t("[data-tooltip]").each((s, i) => {
            const n = t(i);
            o(n), n.parent().on("mouseenter", (function() {
                n.removeClass("is-mirror-x"), n.addClass("is-active"), o(n);
                const e = t(this).outerWidth() / 2;
                n.get(0).style.setProperty("--arrow-offset", e + "px")
            })), n.parent().on("mouseleave", (function() {
                n.removeClass("is-active"), n.addClass("is-out"), setTimeout((function() {
                    n.removeClass("is-out")
                }), 350)
            })), t(e).on("resize", (function() {
                o(n)
            }))
        })
    }))
}(jQuery, window);
! function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e("[data-apps-bloom-root]");
        let s = !1;
        document.querySelectorAll("[data-apps-bloom-svg] path").forEach(t => {
            const s = Math.round(t.getTotalLength());
            e(`[data-apps-bloom-target="${t.id}"]`).css("height", s / 2 + "px"), t.style.setProperty("--length", s + "px")
        });
        const a = new HYIntersectionObserver({
                rootMargin: "-20%",
                thresholds: 60
            }),
            i = new HYIntersectionObserver({
                rootMargin: "20% 0% 40%",
                thresholds: 1
            }),
            n = e('[data-home-section-item="apps-bloom"]')[0];
        i.addTarget(n, (i, n) => {
            i.isIntersecting && !1 === s ? (s = !0, t.each((t, s) => {
                const i = e(s),
                    n = i.data("apps-bloom-target"),
                    o = e("#" + n);
                a.addTarget(s, (e, t) => {
                    (t.isBottomIn() || 1 === t.getPercentage()) && window.requestAnimationFrame(() => {
                        o.css("--percentage", t.getPercentage().toFixed(2))
                    })
                })
            })) : i.isIntersecting || !0 !== s || (s = !1, t.each((e, t) => {
                a.removeTarget(t)
            }))
        })
    }))
}(jQuery),
function(e, t) {
    "use strict";
    e(document).ready((function() {
        const s = e(t),
            a = e("[data-apps-list-container]"),
            i = e("[data-apps-list-dragger]"),
            n = e("[data-apps-list-content]"),
            o = e("[data-apps-list-dots]");
        new HYSlider({
            $: e,
            $window: s,
            $container: a,
            $dragger: i,
            $content: n,
            $dots: o,
            manualWidth: {
                xs: 304,
                md: 304
            }
        }).init()
    }))
}(jQuery, window);
class AssistantsWatchModel {
    isMouseDown = !1;
    mouseDownY = 0;
    transformY = 0;
    maxTransformY = 0;
    relY = 0;
    constructor(e, t) {
        this.$watchModel = e, this.$time = e.find("[data-watch-model-time]"), this.$content = e.find("[data-watch-model-content]"), this.$dragger = e.find("[data-watch-model-dragger]"), this.$body = $("body"), this.$window = $(t), this.maxTransformY = Math.round(this.$content.height() - this.$dragger.outerHeight()), this.FlowTileObserver = new HYIntersectionObserver({
            root: this.$content[0],
            thresholds: 20
        }), this.FlowTiles = $("[data-watch-flow-tile]")
    }
    init() {
        this.initTouchScreen(), this.initObServer(), setInterval(this.updateTime, 1e4)
    }
    destroy() {
        this.destroyTouchScreen(), this.destroyObServer(), clearInterval(this.updateTime)
    }
    updateTime = () => {
        const e = new Date,
            t = e.getHours();
        let s = e.getMinutes();
        s < 10 && (s = "0" + s), this.$time.html(`${t}:${s}`)
    };
    initTouchScreen() {
        this.$content.on("mousedown.touchscreen", e => {
            this.isMouseDown = !0, this.mouseDownY = e.pageY, this.$body.addClass("user-select-none"), this.$body.on("mouseup.dragger, mouseleave.dragger", () => {
                this.$body.removeClass("user-select-none"), this.$watchModel.removeClass("is-dragging"), this.isMouseDown && (this.isMouseDown = !1, this.transformY += this.relY, this.$body.off("mouseup.dragger"), this.$window.off("mousemove.dragger,  mouseleave.dragger"), this.bounceTouchScreen())
            }), this.$window.on("mousemove.dragger", e => {
                if (this.isMouseDown) {
                    this.relY = e.pageY - this.mouseDownY, 0 !== this.relY && this.$watchModel.addClass("is-dragging");
                    let t = this.calcMaxBounce(this.transformY + this.relY);
                    window.requestAnimationFrame(() => {
                        this.$dragger.css("--watch-model-transformY", t + "px")
                    })
                }
            })
        })
    }
    destroyTouchScreen() {
        this.$content.off("mousedown.touchscreen"), this.$body.off("mouseup.dragger"), this.$window.off("mousemove.dragger,  mouseleave.dragger")
    }
    bounceTouchScreen() {
        (this.transformY > 0 || this.transformY < this.maxTransformY) && (this.transformY = Math.min(0, Math.max(this.transformY, this.maxTransformY)), this.$dragger.addClass("is-bounce"), this.$dragger.css("--watch-model-transformY", this.transformY + "px"), setTimeout(() => {
            this.$dragger.removeClass("is-bounce")
        }, 250))
    }
    calcMaxBounce(e) {
        if (e < this.maxTransformY) {
            let t = e - this.maxTransformY;
            e = this.maxTransformY - Math.round(50 - 50 * Math.exp(t / 50))
        } else if (e > 0) {
            let t = 0 - e;
            e = Math.round(50 - 50 * Math.exp(t / 50))
        }
        return e
    }
    initObServer() {
        this.FlowTiles.each((e, t) => {
            const s = $(t);
            this.FlowTileObserver.addTarget(t, (e, t) => {
                window.requestAnimationFrame(() => {
                    s.css("--watch-flow-tile-percentage", t.getPercentage())
                })
            })
        })
    }
    destroyObServer() {
        this.FlowTiles.each((e, t) => {
            this.FlowTileObserver.removeTarget(t)
        })
    }
}
class AssistantsAnimation {
    "use strict";
    $bloom;
    $provider;
    $command;
    $balloon;
    $avatars;
    $assistants;
    $logo;
    timeOverlap = -50;
    animationDurationCircle = 500;
    paths = {};
    isPlaying = !1;
    viewportSize = "desktop";
    playRequest = !1;
    cycle = 0;
    current = !1;
    config = [{
        id: "google",
        providerText: I18N["pages.home.integrations.assistants.config.google.providerText"],
        commandText: I18N["pages.home.integrations.assistants.config.google.commandText"],
        targets: [4, 5, 8]
    }, {
        id: "alexa",
        providerText: I18N["pages.home.integrations.assistants.config.alexa.providerText"],
        commandText: I18N["pages.home.integrations.assistants.config.alexa.commandText"],
        targets: [11]
    }, {
        id: "siri",
        providerText: I18N["pages.home.integrations.assistants.config.siri.providerText"],
        commandText: I18N["pages.home.integrations.assistants.config.siri.commandText"],
        targets: [2, 4, 5, 9, 10, 11]
    }];
    Viewport = new HYViewport;
    constructor() {
        this.$bloom = $("[data-home-assistants-bloom]"), this.$provider = $("[data-home-assistants-mic-provider]"), this.$command = $("[data-home-assistants-mic-command]"), this.$balloon = $("[data-home-assistants-balloon]"), this.$avatars = $("[data-home-assistants-avatar]"), this.$assistants = $("[data-home-assistant]"), this.$logo = $("[data-home-assistant-logo]"), this.Viewport.onInitResize(e => {
            switch (e) {
                case "xs":
                    this.viewportSize = "mobile";
                    break;
                default:
                    this.viewportSize = "desktop"
            }
            this.init()
        }, ["xs", "md"])
    }
    init() {
        this.setPathD();
        document.querySelectorAll("[data-home-assistants-bloom-svg] path[data-line]").forEach(e => {
            const t = $(e),
                s = e.dataset.line,
                a = Math.round(e.getTotalLength()),
                i = 3 * a;
            this.paths[s] = {
                $line: t,
                length: a,
                duration: i
            }, t.css("--stroke-dash", a + "px"), t.css("--animation-duration", i + "ms")
        })
    }
    setPathD() {
        const e = {
            mobile: "data-mobile-d",
            desktop: "data-desktop-d"
        };
        document.querySelectorAll("[data-home-assistants-bloom-svg] path").forEach(t => {
            if (t.getAttribute(e.desktop) || t.setAttribute(e.desktop, t.getAttribute("d")), t.getAttribute(e[this.viewportSize])) {
                const s = t.getAttribute(e[this.viewportSize]);
                t.setAttribute("d", s)
            }
        })
    }
    async start() {
        if (this.playRequest = !0, !0 !== this.isPlaying) {
            this.isPlaying = !0;
            do {
                if (!0 !== this.playRequest || !0 !== this.isPlaying) {
                    this.isPlaying = !1, this.playRequest = !1;
                    break
                }
                this.current = this.config[this.cycle], await this.loopCycle(), this.cycle++, this.cycle === this.config.length && (this.cycle = 0)
            } while (this.cycle < this.config.length)
        }
    }
    async stop() {
        this.playRequest = !1
    }
    async loopCycle() {
        this.$balloon.removeClass("is-out"), this.$balloon.addClass("is-in"), this.$avatars.removeClass("is-visible"), $(this.$avatars[this.cycle]).addClass("is-visible"), await this.highlightAssistant(), await this.sayCommand(this.current.providerText, this.$provider), await this.sayCommand(this.current.commandText, this.$command), await this.highlightLineAndFollowUp([this.current.id], this.$logo), await this.highlightLineAndFollowUp(this.current.targets), await this.intermezzo(1e3), await this.removeHighlightAssistant(), await this.removeHighlightLineAndFollowUp([this.current.id], this.$logo), await this.removeHighlightLineAndFollowUp(this.current.targets), await this.clean()
    }
    sayCommand(e, t) {
        e = e.split(" ");
        return new Promise(s => {
            this.sayWord(s, e, t, 0)
        })
    }
    sayWord(e, t, s, a) {
        let i = t[a],
            n = `<span>${i}</span> `,
            o = 70 * i.length,
            r = o;
        i.indexOf(",") > 0 && (r = o + 500), this.$bloom.css("--voice-opacity", 1), this.$bloom.css("--voice-time", o + "ms"), s.append(n), a++, setTimeout(() => {
            this.$bloom.css("--voice-opacity", 0), this.$bloom.css("--voice-time", "800ms")
        }, r / 2), setTimeout(() => {
            a < t.length ? this.sayWord(e, t, s, a) : e()
        }, r)
    }
    clean() {
        return new Promise(e => {
            this.$provider.empty(), this.$command.empty(), this.$balloon.removeClass("is-in"), this.$balloon.addClass("is-out"), setTimeout(() => {
                e()
            }, 1e3)
        })
    }
    highlightAssistant() {
        return new Promise(e => {
            $(`[data-home-assistant="${this.current.id}"]`).addClass("is-animation-in"), setTimeout(() => {
                e()
            }, 0)
        })
    }
    removeHighlightAssistant() {
        return new Promise(e => {
            const t = $(`[data-home-assistant="${this.current.id}"]`);
            t.removeClass("is-animation-in"), t.addClass("is-animation-out"), setTimeout(() => {
                t.removeClass("is-animation-out"), e()
            }, 0)
        })
    }
    highlightLineAndFollowUp(e, t = !1) {
        return new Promise(s => {
            let a = 0;
            e.forEach(e => {
                a = Math.max(a, this.paths[e].duration);
                this.paths[e].$line.addClass("is-animation-in"), setTimeout(() => {
                    t ? (t.addClass("is-animation-in"), s()) : $(`[data-app="${e}"]`).addClass("is-animation-in")
                }, this.paths[e].duration - this.timeOverlap)
            }), setTimeout(() => {
                s()
            }, a)
        })
    }
    removeHighlightLineAndFollowUp(e, t = !1) {
        return new Promise(s => {
            let a = 0;
            e.forEach(e => {
                a = Math.max(a, this.paths[e].duration);
                const i = this.paths[e].$line;
                i.removeClass("is-animation-in").addClass("is-animation-out"), setTimeout(() => {
                    if (i.removeClass("is-animation-out"), t) t.removeClass("is-animation-in").addClass("is-animation-out"), setTimeout(() => {
                        t.removeClass("is-animation-out")
                    }, this.animationDurationCircle), s();
                    else {
                        const t = $(`[data-app="${e}"]`);
                        t.removeClass("is-animation-in").addClass("is-animation-out"), setTimeout(() => {
                            t.removeClass("is-animation-out")
                        }, this.animationDurationCircle)
                    }
                }, this.paths[e].duration - this.timeOverlap)
            }), setTimeout(() => {
                s()
            }, a)
        })
    }
    intermezzo(e) {
        return new Promise(t => {
            setTimeout(() => {
                t()
            }, e)
        })
    }
}! function(e, t) {
    "use strict";
    const s = e(t);
    let a, i, n;

    function o() {
        let e = Math.round(s.scrollTop()),
            o = i / n.maxTransformY,
            r = n.maxTransformY - (a - e) / o;
        r = Math.min(0, Math.max(r, n.maxTransformY)), t.requestAnimationFrame(() => {
            n.$dragger.css("--watch-model-transformY", r + "px")
        })
    }
    e(document).ready((function() {
        const r = new HYIntersectionObserver({
                thresholds: 10
            }),
            h = e('[data-home-section-item="assistants-bloom"]')[0],
            d = new AssistantsAnimation;
        r.addTarget(h, (function(e, t) {
            t.getPercentage() >= .5 && !1 === d.playRequest && d.start(), t.getPercentage() < .1 && d.stop()
        }));
        const c = e("[data-widget-flow-tile]");
        c.on("click", (function() {
            const t = e(this);
            t.addClass("is-playing"), setTimeout(() => {
                t.addClass("is-done")
            }, 500), setTimeout(() => {
                t.removeClass("is-done").removeClass("is-playing")
            }, 2e3)
        }));
        const l = e('[data-home-section-item="assistants-widgets"]')[0],
            m = e(l);
        r.addTarget(l, (function(t, s) {
            s.getPercentage() >= .9 && !1 === p && (m.addClass("is-animation-in"), setTimeout(() => {
                e(c[3]).trigger("click")
            }, 2e3))
        }));
        const u = e("[data-watch-model]");
        n = new AssistantsWatchModel(u, t);
        const g = e('[data-home-section-item="assistants-watch"]');
        let p = !1;
        r.addTarget(g[0], (function(t, r) {
            r.getPercentage() >= .1 && !1 === p ? (p = !0, n.init(), a = e(u[0]).offset().top, i = s.height(), s.on("scroll.watch", o)) : r.getPercentage() < .1 && (p = !1, n.destroy(), s.off("scroll.watch"))
        }))
    }))
}(jQuery, window),
function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e('[data-home-darkmode-trigger="1"]')[0],
            s = e('[data-home-darkmode-target="1"]');
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(t, (function(e, t) {
            t.getPercentage() >= .5 ? (s.addClass("darkmode"), s.addClass("darkmode-fade-in"), setTimeout((function() {
                s.removeClass("darkmode-fade-in")
            }), 1e3)) : t.getPercentage() < .5 && (s.removeClass("darkmode"), s.addClass("darkmode-fade-out"), setTimeout((function() {
                s.removeClass("darkmode-fade-out")
            }), 1e3))
        }))
    }))
}(jQuery),
function(e) {
    "use strict";
    let t, s, a;
    e(document).ready((function() {
        const i = e('[data-home-section-item="device-controls"]')[0],
            n = new HYIntersectionObserver({
                thresholds: 10
            });
        let o = !1;
        const r = e(window),
            h = e("[data-home-controls-container]"),
            d = e("[data-home-controls-dragger]"),
            c = e("[data-home-controls-content]"),
            l = e("[data-home-controls-dots]");
        new HYSlider({
            $: e,
            $window: r,
            $container: h,
            $dragger: d,
            $content: c,
            $dots: l,
            manualWidth: {
                xs: 293,
                md: 293
            }
        }).init(), e("[data-home-control-tabs]").each((i, n) => {
            const o = e(n),
                r = o.find("[data-home-control-tabs-target]"),
                h = o.find("[data-home-control-tabs-item]");
            let d = 1,
                c = !1;
            r.on("click", (function() {
                const i = e(this);
                r.removeClass("is-active"), i.addClass("is-active");
                const n = i.data("home-control-tabs-target");
                switch (h.removeClass("is-active"), h.removeClass("is-previous-active"), o.find(`[data-home-control-tabs-item=${d}]`).addClass("is-previous-active"), o.find(`[data-home-control-tabs-item=${n}]`).addClass("is-active"), setTimeout((function() {
                    o.find(`[data-home-control-tabs-item=${d}]`).removeClass("is-previous-active"), d = n
                }), 500), n) {
                    case 1:
                        let i = 18,
                            n = 24,
                            o = Math.round(2 * (Math.random() * (n - i) + i)) / 2;
                        t.setTargetTemperature(o);
                        break;
                    case 2:
                        if (!0 === c) return;
                        c = !0, setTimeout(() => {
                            e(s.$buttons[7]).trigger("click")
                        }, 750);
                        break;
                    case 3:
                        setTimeout(() => {
                            e("[data-home-phone-screen-motion]").addClass("is-active")
                        }, 750);
                        break;
                    case 4:
                        setTimeout(() => {
                            e("[data-home-phone-screen-lock]").addClass("is-active")
                        }, 750);
                        break;
                    case 5:
                        setTimeout(() => {
                            a.togglePlay()
                        }, 750);
                        break;
                    case 6:
                        setTimeout(() => {
                            e("[data-home-phone-screen-plug]").addClass("is-active")
                        }, 750);
                        break;
                    case 7:
                        setTimeout(() => {
                            e('[data-home-phone-screen-curtains="stop"]').removeClass("is-active"), e('[data-home-phone-screen-curtains="down"]').addClass("is-active")
                        }, 750)
                }
            }))
        }), t = new deviceControlsThermostat, n.addTarget(i, (function(e, s) {
            s.getPercentage() >= .9 && !1 === o && (t.startAnimation(), o = !0)
        })), s = new deviceControlsLight;
        e("[data-home-phone-screen-lock]").on("click", (function() {
            e(this).toggleClass("is-active")
        }));
        e("[data-home-phone-screen-plug]").on("click", (function() {
            e(this).toggleClass("is-active")
        }));
        const m = e("[data-home-phone-screen-curtains]");
        m.on("click", (function() {
            const t = e(this);
            m.removeClass("is-active"), t.addClass("is-active")
        })), a = new deviceControlsMedia
    }))
}(jQuery);
class deviceControlsLight {
    "use strict";
    constructor() {
        this.$buttonGroup = $("[data-home-phone-screen-light-colors]"), this.$buttons = $("[data-home-phone-screen-light-color]"), this.$bg = $("[data-home-phone-screen-light-bg]"), this.depthPick = !1, this.$buttons.each((e, t) => {
            var s = $(t);
            s.on("click", t => {
                if (!this.depthPick || 0 !== e) {
                    let e = s.css("--color");
                    this.$bg.css("--color", e)
                }
                const a = $(t.currentTarget);
                if (this.depthPick && 0 === e) this.depthPick = !1, this.$buttonGroup.removeClass("is-depth"), this.$buttonGroup.addClass("is-not-depth"), this.$buttons.each((e, t) => {
                    var s = $(t),
                        a = s.data("home-phone-screen-light-color");
                    s.css("--color", a)
                });
                else if (!this.depthPick) {
                    this.depthPick = !0, this.$buttonGroup.removeClass("is-not-depth"), this.$buttonGroup.addClass("is-depth");
                    var i = a.data("home-phone-screen-light-color");
                    this.$buttons.each((e, t) => {
                        var s = $(t);
                        let a = (16 - 2 * e).toString(16);
                        s.css("--color", `${i}${a}${a}`)
                    })
                }
            })
        })
    }
}
class deviceControlsMedia {
    "use strict";
    constructor() {
        this.initButtonPlay(), this.initButtonShuffle(), this.initButtonRepeat()
    }
    initButtonPlay() {
        this.$playButton = $('[data-home-phone-screen-media="play"]'), this.$playButton.on("click", () => {
            this.togglePlay()
        })
    }
    togglePlay() {
        this.$playButton.hasClass("is-playing") ? (this.$playButton.removeClass("is-playing"), this.$playButton.find(".mask-media-speaker-play").removeClass("is-hidden"), this.$playButton.find(".mask-media-speaker-pause").addClass("is-hidden")) : (this.$playButton.addClass("is-playing"), this.$playButton.find(".mask-media-speaker-play").addClass("is-hidden"), this.$playButton.find(".mask-media-speaker-pause").removeClass("is-hidden"))
    }
    initButtonShuffle() {
        $('[data-home-phone-screen-media="shuffle"]').on("click", (function() {
            $(this).toggleClass("is-active")
        }))
    }
    initButtonRepeat() {
        const e = $('[data-home-phone-screen-media="repeat"]');
        let t = 0;
        e.on("click", (function() {
            const e = $(this);
            0 === t ? (e.addClass("is-active"), t = 1) : 1 === t ? (e.find(".mask-media-speaker-repeat-list").removeClass("is-hidden"), e.find(".mask-media-speaker-repeat").addClass("is-hidden"), t = 2) : (t = 0, e.removeClass("is-active"), e.find(".mask-media-speaker-repeat-list").addClass("is-hidden"), e.find(".mask-media-speaker-repeat").removeClass("is-hidden"))
        }))
    }
}
class deviceControlsThermostat {
    "use strict";
    thermoState = {
        min: 5,
        max: 35,
        ringDegree: 315
    };
    constructor() {
        this.$temperatureCurrent = $("[data-home-thermostat-current]"), this.$temperatureTarget = $("[data-home-thermostat-target]"), this.$handler = $("[data-home-thermostat-handler]"), this.$stripes = $("[data-home-thermostat-stripe]"), this.$thermostat = $("[data-home-thermostat]"), this.$towardsHeating = $('[data-home-thermostat-towards="heating"]'), this.$towardsCooling = $('[data-home-thermostat-towards="cooling"]'), this.$ring = $("[data-home-thermostat-ring]"), this.temperatureTarget = parseInt(this.$temperatureTarget.data("home-thermostat-target")), this.temperatureCurrent = parseInt(this.$temperatureCurrent.data("home-thermostat-current")), this.temperature = this.temperatureCurrent, this.setThermostatTemperatures(19.5, 17), this.setThermostatHandler()
    }
    startAnimation() {
        this.animateTemperature()
    }
    setTargetTemperature(e) {
        this.temperatureTarget = e, this.animateTemperature()
    }
    animateTemperature() {
        let e = setInterval(() => {
            this.temperature < this.temperatureTarget ? this.temperature += .5 : this.temperature > this.temperatureTarget && (this.temperature -= .5), this.setThermostatTemperatures(this.temperatureCurrent, this.temperature), this.temperature === this.temperatureTarget && clearInterval(e)
        }, 100)
    }
    setThermostatHandler() {
        this.$handler.on("mousedown", () => {
            $(document).on("mousemove.thermostat", e => {
                let t = this.$ring.offset(),
                    [s, a] = [e.pageX, e.pageY],
                    i = Math.atan2(t.top - a, t.left - s),
                    n = Math.PI,
                    o = 360 * (i > 0 ? i : 2 * n + i) / (2 * n);
                o += 45, o = o > 360 ? o - 360 : o, o > this.thermoState.ringDegree ? o = 0 : o > 270 && (o = 270);
                let r = (this.thermoState.max - this.thermoState.min) / 270 * o + this.thermoState.min;
                this.temperatureTarget = Math.round(2 * r) / 2, this.setThermostatTemperatures(this.temperatureCurrent, this.temperatureTarget)
            }), $(document).on("mouseup.thermostat", () => {
                $(document).off("mousemove.thermostat"), $(document).off("mouseup.thermostat")
            })
        })
    }
    setThermostatTemperatures(e, t) {
        const s = $(`[data-home-thermostat-stripe="${e}"]`);
        let a = ((t - this.thermoState.min) * (this.thermoState.ringDegree / this.thermoState.max) - (360 - this.thermoState.ringDegree)).toFixed(2);
        this.$handler.css("--r", a + "deg"), this.$stripes.removeClass("is-current"), s.addClass("is-current");
        this.$stripes.each((s, a) => {
            const i = $(a);
            (s => e < t ? s > e && s < t : s > t && s < e)(i.data("home-thermostat-stripe")) ? i.addClass("is-between"): i.removeClass("is-between")
        }), e > t ? (this.$thermostat.addClass("is-hotter"), this.$towardsCooling.addClass("is-active"), this.$towardsHeating.removeClass("is-active")) : (this.$thermostat.removeClass("is-hotter"), this.$towardsCooling.removeClass("is-active"), this.$towardsHeating.addClass("is-active")), this.$temperatureCurrent.text(e.toFixed(1)), this.$temperatureTarget.text(t.toFixed(1))
    }
}! function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e("[data-home-device-tile]"),
            s = e('[data-home-section-item="device-tiles"]')[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(s, (function(t, s) {
            s.getPercentage() >= .5 && e(t.target).addClass("is-in-viewport")
        })), t.on("click", (function() {
            e(this).toggleClass("is-non-active")
        }))
    }))
}(jQuery),
function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e('[data-home-section="devices"]')[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(t, (function(t, s) {
            s.getPercentage() >= .1 ? e("[data-home-intro-more]").addClass("is-hidden") : e("[data-home-intro-more]").removeClass("is-hidden")
        }))
    }))
}(jQuery),
function(e) {
    e(document).ready((function() {
        const t = e("[data-home-energy-batteries-observer]"),
            s = e("[data-home-energy-battery]");
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(t[0], (t, a) => {
            a.getPercentage() > .75 && e(s[3]).addClass("is-in-viewport"), a.getPercentage() > .5 && e(s[2]).addClass("is-in-viewport"), a.getPercentage() > .25 && e(s[1]).addClass("is-in-viewport"), a.getPercentage() > 0 && e(s[0]).addClass("is-in-viewport")
        })
    }))
}(jQuery);
class EnergyEstimationGraph {
    startTimestamp;
    previousTimestamp;
    isDrawing = !1;
    points;
    latestPointLength;
    currentPercentage = 0;
    minWatt = .5;
    maxWatt = 12.5;
    settingsDefault = {
        spaceY: 150,
        spaceX: 15,
        speed: 1e3,
        fillNumber: 20
    };
    settings = this.settingsDefault;
    isAnimationFirstTime = !1;
    isGenerateRandomPercentage = !1;
    UID = !1;
    constructor() {
        this.line = document.querySelector("[data-home-energy-estimation-line]"), this.$line = $("[data-home-energy-estimation-line]"), this.$lineFill = $("[data-home-energy-estimation-line-fill]"), this.$verticalRuler = $("[data-home-energy-estimation-vertical-ruler]"), this.$lineGroup = $("[data-home-energy-estimation-line-group]"), this.$text = $("[data-home-energy-estimation-text]"), this.$marker = $("[data-home-energy-estimation-graph-marker]"), this.$device = $("[data-home-energy-estimation-device]")
    }
    init() {
        this.points = new Array(this.settings.fillNumber), this.points.fill(this.calcYPoint())
    }
    start(e) {
        this.isDrawing || (this.isDrawing = !0, this.drawGraphLine(e), window.requestAnimationFrame(e => this.animateGraph(e)))
    }
    stop() {
        this.isDrawing = !1, this.startTimestamp = void 0, this.previousTimeStamp = void 0
    }
    animateGraph(e) {
        this.isDrawing && window.requestAnimationFrame(e => this.animateGraph(e)), void 0 === this.startTimestamp && (this.startTimestamp = e);
        const t = e - this.startTimestamp;
        if (this.previousTimeStamp !== e) {
            let e = t / this.settings.speed * this.settings.spaceX + 2 * this.settings.spaceX,
                s = e + 16 * this.settings.spaceX;
            this.$lineGroup.css("transform", `translateX(${-1*e.toFixed(1)}px)`), this.$verticalRuler.css("transform", `translateX(${s.toFixed(1)}px)`);
            let a = Math.floor(this.line.getTotalLength());
            this.moveMarker(this.line, a, s)
        }
        this.previousTimeStamp = e
    }
    generateRandomPercentage(e) {
        this.isGenerateRandomPercentage && (e(this.currentPercentage), this.currentPercentage = 20 + 50 * Math.random(), this.random = setTimeout(() => {
            this.generateRandomPercentage(e)
        }, this.settings.speed))
    }
    drawGraphLine(e) {
        if (this.UID !== e) return;
        let t = this.calcYPoint();
        this.points.push(t), this.points.shift();
        let s = [],
            a = 0;
        this.latestPointLength = this.points.length, this.startTimestamp = this.previousTimeStamp, this.points.forEach((e, t) => {
            e *= -1;
            let i = this.settings.spaceX * t + this.settings.spaceX / 2,
                n = this.settings.spaceX * t + this.settings.spaceX / 2;
            s.push(`C ${i} ${a} ${n} ${e} ${this.settings.spaceX*(t+1)} ${e}`), a = e
        }), this.$line.attr("d", "M 0 0 " + s.join(" ")), this.$lineFill.attr("d", `M 0 0 ${s.join(" ")} L ${this.points.length*this.settings.spaceX} 0 Z`);
        let i = this.maxWatt - this.minWatt,
            n = (this.minWatt + i * (this.currentPercentage / 100)).toFixed(1);
        this.$text.html(n), this.$device.html("" + n), setTimeout(() => {
            this.isDrawing && this.drawGraphLine(e)
        }, this.settings.speed)
    }
    moveMarker(e, t, s) {
        let a = this.findY(e, t, s);
        return this.$marker.css("transform", `translate(${s}px,${a}px)`), a
    }
    findY(e, t, s) {
        var a = 0,
            i = t,
            n = (a + i) / 2;
        for (s = Math.max(s, e.getPointAtLength(0).x), s = Math.min(s, e.getPointAtLength(t).x); n >= a && n <= t;) {
            var o = e.getPointAtLength(n);
            if (Math.abs(o.x - s) < .1) return o.y;
            o.x > s ? i = n : a = n, n = (a + i) / 2
        }
    }
    calcYPoint() {
        return this.settings.spaceY * (this.currentPercentage / 100)
    }
}! function(e, t) {
    "use strict";
    let s, a, i, n;
    const o = new EnergyEstimationGraph;
    let r = 0;
    const h = new HYBezierEasing(.75, 1, .75, 1);
    let d = !1;

    function c() {
        i.css("--percentage", r + "%"), n.css("--opacity", "" + r / 100)
    }
    e(document).ready((function() {
        s = e("body"), a = e(t), i = e("[data-home-energy-estimation-slider]"), n = e("[data-home-energy-estimation-light]");
        let l = !1;
        const m = e('[data-home-section-item="energy-estimation"]')[0];
        (new HYViewport).onInitResize(e => {
            switch (e) {
                case "xs":
                    o.isGenerateRandomPercentage = !0, o.generateRandomPercentage(e => {
                        n.css("--opacity", "" + e / 100)
                    }), o.settings.spaceY = 220, o.settings.spaceX = 52, o.settings.speed = 3e3, o.settings.fillNumber = 8, o.init();
                    break;
                case "md":
                default:
                    o.isGenerateRandomPercentage = !1, o.settings = o.settingsDefault, o.init()
            }
        }, ["xs", "md"]);
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(m, (e, t) => {
            t.getPercentage() > 0 && !o.isDrawing && (o.UID = (1e4 * Math.random()).toFixed(0), o.start(o.UID)), t.getPercentage() > .8 && !d && (d = !0, requestAnimationFrame(() => function e(t = 0) {
                r = (50 * h(.02 * t)).toFixed(1), c(), t < 50 && (t += .5, o.currentPercentage = r, requestAnimationFrame(() => e(t)))
            }())), t.getPercentage() <= 0 && o.stop()
        }), i.on("mousedown touchstart", e => {
            e.preventDefault(), l = !0, i.addClass("is-mouse-down"), s.on("mouseup.slider touchend.slider", () => {
                l = !1, i.removeClass("is-mouse-down"), s.off("mouseup.slider touchend.slider"), a.off("mousemove.slider touchmove.slider")
            }), a.on("mousemove.slider touchmove.slider", e => {
                if (l) {
                    const t = i.offset(),
                        s = i.height(),
                        a = (e.pageY ? e.pageY : e.touches[0].pageY) - t.top;
                    r = 100 - Math.round(100 / s * a), r = Math.min(Math.max(0, r), 100), o.currentPercentage = r.toFixed(0), c()
                }
            })
        })
    }))
}(jQuery, window),
function(e) {
    "use strict";
    let t, s, a, i, n, o, r, h, d, c, l, m, u, g, p, f, v = 0,
        w = 0,
        $ = new HYBezierEasing(.17, .67, .83, .67);

    function y() {
        r = 0, h = 0;
        const s = c.find("[data-home-energy-value]"),
            a = l.find("[data-home-energy-value]");
        h = C(t), r += h, o && (r += C(a), n && (r += C(s)));
        e('[data-home-energy-screen-watt="total"]').text(r)
    }

    function C(t) {
        let s = 0;
        return t.each((t, a) => {
            s += e(a).data("home-energy-value")
        }), s
    }

    function b(n) {
        let o, c;
        if (d = n, T()) o = r - h, c = "Other";
        else {
            const s = e(t[n]);
            o = s.data("home-energy-value"), c = s.data("home-energy-label")
        }
        s.removeClass("is-active"), e(s[n]).addClass("is-active"), i.removeClass("is-active"), e(t[n]).addClass("is-active"), n >= t.length && a.addClass("is-active"), e('[data-home-energy-screen-watt="zone"]').text(o), e("[data-home-energy-screen-zone]").text(c)
    }

    function T() {
        return d >= t.length
    }

    function x() {
        m = 15, u = 15, g = 0, p = 0, f = (1e4 * Math.random()).toFixed(0);
        const a = Date.now();
        requestAnimationFrame(() => function a(i, o) {
            let h = Date.now() - o;
            if (i !== f) return;
            let d = !0;
            const c = r - v;
            if (c < -1 || c > 1) {
                let e = $(h / 1e5) * c;
                v += e, d = !1
            }
            n && (p = 360 / v * 195);
            g = p - w, (g < -1 || g > 1) && (w += g / u, d = !1);
            (function() {
                let a = function() {
                        let s = [],
                            a = 0;
                        t.each((t, i) => {
                            const n = e(i).data("home-energy-value");
                            a += n, s.push(360 / v * n)
                        });
                        const i = v - a;
                        return s.push(360 / v * i), s
                    }(),
                    i = 0;
                s.each((t, s) => {
                    const n = e(s);
                    let o = i,
                        r = a[t] + i - 1;
                    i += a[t];
                    let h = F(120, 120, 90, o, r);
                    n.attr("d", h)
                })
            })(),
            function() {
                const t = e('[data-home-energy-arc-group="solar"]').find("[data-home-energy-arc-item]"),
                    s = [359.8, w];
                t.each((t, a) => {
                    let i = s[t];
                    e(a).attr("d", F(120, 120, 116, 0, i))
                })
            }(), d || requestAnimationFrame(() => a(i, o))
        }(f, a))
    }

    function F(e, t, s, a, i) {
        var n = P(e, t, s, i),
            o = P(e, t, s, a),
            r = i - a <= 180 ? "0" : "1";
        return ["M", n.x, n.y, "A", s, s, 0, r, 0, o.x, o.y].join(" ")
    }

    function P(e, t, s, a) {
        var i = (a - 90) * Math.PI / 180;
        return {
            x: (e + s * Math.cos(i)).toFixed(2),
            y: (t + s * Math.sin(i)).toFixed(2)
        }
    }
    e(document).ready((function() {
        let h = !1;
        const m = e('[data-home-section-item="energy"]')[0],
            u = new HYIntersectionObserver({
                thresholds: 10
            });
        c = e('[data-home-energy-screen-group="solar"]'), l = e('[data-home-energy-screen-group="meter"]'), i = e("[data-home-energy-screen-group]").find("[data-home-energy-value]"), t = e('[data-home-energy-screen-group="zones"]').find("[data-home-energy-value]"), a = l.find("[data-home-energy-value]"), s = e('[data-home-energy-arc-group="zones"]').find("[data-home-energy-arc-item]"), y(),
            function() {
                const t = e('[data-home-energy-switch="solar"]'),
                    s = e('[data-home-energy-switch="meter"]');
                t.on("click", (function() {
                    n ? (e('[data-home-energy-arc-group="solar"]').removeClass("is-shown"), c.removeClass("is-shown"), t.removeClass("is-active")) : (e('[data-home-energy-arc-group="solar"]').addClass("is-shown"), c.addClass("is-shown"), t.addClass("is-active")), n = !n, y(), x(), b(d)
                })), s.on("click", (function() {
                    o = !o, y(), x(), o ? (l.addClass("is-shown"), s.addClass("is-active"), b(5)) : (l.removeClass("is-shown"), s.removeClass("is-active"), T() && b(0))
                }))
            }(), s.each((t, s) => {
                e(s).on("click", () => {
                    b(t)
                })
            }), b(0), v = 10 * r, u.addTarget(m, (function(e, t) {
                t.getPercentage() > 0 && !1 === h && (x(), h = !0)
            }))
    }))
}(jQuery);
class EnergyWallplugAnimation {
    "use strict";
    $canvas;
    context;
    img;
    video = {
        width: 1024,
        height: 768
    };
    sequence = {
        total: 31,
        start: 0,
        fps: 25,
        frames: []
    };
    file = {
        type: "png",
        ratio: ""
    };
    isPlaying = !1;
    isDoneFirstTime = !1;
    reverse = !1;
    fpsInterval;
    then;
    startTime;
    now;
    ellapsed;
    constructor() {
        this.tryHighResolution() && (this.file.ratio = "@2x", this.video.width = 2048, this.video.height = 1536), this.$canvas = $("[data-home-energy-wallplug-video]"), this.$canvas.width = this.video.width, this.$canvas.height = this.video.height, this.$canvas.attr("width", this.video.width), this.$canvas.attr("height", this.video.height), this.tryWebpFileType(), this.context = this.$canvas[0].getContext("2d"), this.preloadImagesToCache(this.sequence.total), this.sequence.frames[this.sequence.start].onload = () => {
            this.drawFrame(this.sequence.start)
        }
    }
    start() {
        this.isPlaying = !0, this.fpsInterval = 1e3 / this.sequence.fps, this.then = Date.now(), this.startTime = this.then, this.currentFrame = this.reverse ? this.sequence.total - 1 : this.sequence.start, this.reverse && $(".home-energy-wallplug").removeClass("is-pulse"), this.animationFrame()
    }
    tryWebpFileType() {
        return null !== this.$canvas[0].toDataURL("image/webp").indexOf("data:image/webp") && (this.file.type = "webp", !0)
    }
    tryHighResolution() {
        return !1
    }
    animationFrame() {
        this.now = Date.now(), this.elapsed = this.now - this.then, this.elapsed > this.fpsInterval && (this.then = this.now - this.elapsed % this.fpsInterval, this.drawFrame(this.currentFrame), (this.currentFrame >= this.sequence.total - 1 && !this.reverse || this.currentFrame <= this.sequence.start && this.reverse) && (this.reverse || $(".home-energy-wallplug").addClass("is-pulse"), this.isPlaying = !1, this.isDoneFirstTime = !0), this.reverse ? this.currentFrame-- : this.currentFrame++), this.currentFrame < this.sequence.total && this.currentFrame >= this.sequence.start && requestAnimationFrame(() => this.animationFrame())
    }
    drawFrame(e) {
        let t = this.sequence.frames[e];
        this.context.clearRect(0, 0, this.$canvas.width, this.$canvas.height), this.context.imageSmoothingEnabled = !1, this.context.drawImage(t, 0, 0, this.video.width, this.video.height)
    }
    preloadImagesToCache(e) {
        for (let t = this.sequence.start; t < e; t++) {
            let e = this.getFrame(t);
            this.sequence.frames[t] = this.preloadImage(e)
        }
    }
    preloadImage(e) {
        var t = new Image;
        return t.src = e, t
    }
    getFrame(e) {
        return `/sequence/pages/home/energy-wallplug/energy-wallplug-${e}${this.file.ratio}.${this.file.type}`
    }
}! function(e) {
    "use strict";
    let t, s, a, i, n, o, r, h, d, c, l, m, u = !1,
        g = {
            space: 40,
            speed: 4e3,
            fillNumber: 9
        },
        p = !1,
        f = !1,
        v = null,
        w = !1,
        $ = !1;
    const y = new HYBezierEasing(.25, 0, .75, 1),
        C = new HYViewport;
    let b, T;

    function x(e) {
        void 0 === b && (b = e);
        let s = e - b;
        if (T !== e) {
            let e = y(1 / g.speed * s) * g.space + g.space + g.space,
                a = e + 6 * g.space;
            i.css("transform", `translateX(${-1*e.toFixed(1)}px)`), o.css("transform", `translateX(${a.toFixed(1)}px)`);
            let r = Math.floor(t.getTotalLength());
            ! function(e, t, s) {
                let a = function(e, t, s) {
                    var a = 0,
                        i = t,
                        n = (a + i) / 2;
                    s = Math.max(s, e.getPointAtLength(0).x), s = Math.min(s, e.getPointAtLength(t).x);
                    for (; n >= a && n <= t;) {
                        var o = e.getPointAtLength(n);
                        if (Math.abs(o.x - s) < .1) return o.y;
                        o.x > s ? i = n : a = n, n = (a + i) / 2
                    }
                }(e, t, s);
                n.css("transform", `translate(${s}px,${a}px)`)
            }(t, r, a)
        }
        u && (T = e, window.requestAnimationFrame(x))
    }
    e(document).ready((function() {
        t = document.querySelector("[data-energy-wall-plug-line]"), s = e("[data-energy-wall-plug-line]"), a = e("[data-energy-wall-plug-line-fill]"), o = e("[data-home-energy-wallplug-vertical-ruler]"), i = e("[data-energy-wall-plug-line-group]"), r = e("[data-home-energy-wallplug-text ]"), n = e("[data-home-energy-wallplug-graph-marker]"), h = e("[data-home-energy-wallplug-device]"), C.onInitResize((e, t) => {
            switch (e) {
                case "xs":
                    g.speed = 2e3, g.fillNumber = 12, c = new Array(g.fillNumber), c.fill(0);
                    break;
                default:
                    g.speed = 4e3, g.fillNumber = 10, c = new Array(g.fillNumber), c.fill(0)
            }
        }, ["xs", "md"]);
        const y = e('[data-home-section-item="energy-wallplug"]')[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(y, (t, i) => {
            t.isIntersecting !== w && (w = t.isIntersecting, $ || (d = new EnergyWallplugAnimation, $ = !0)), i.getPercentage() > .1 && !u ? u || (u = !0, v = (1e4 * Math.random()).toFixed(0), function e(t) {
                if (v !== t) return;
                let i = d.currentFrame < d.sequence.total - 1 ? 0 : (100 * Math.random() + 50).toFixed();
                c.push(i), c.shift();
                let n = [],
                    o = c[0];
                l = c.length, b = T, c.forEach((e, t) => {
                    e *= -1;
                    let s = g.space * (t - 1) + g.space / 2,
                        a = g.space * (t - 1) + g.space / 2;
                    t > 0 && n.push(`C ${s} ${o} ${a} ${e} ${g.space*t} ${e}`), o = e
                }), s.attr("d", `M 0 ${-1*c[0]} ${n.join(" ")}`), a.attr("d", `M 0 0 L 0 ${-1*c[0]} ${n.join(" ")} L ${(c.length-1)*g.space} 0 Z`);
                let m = i;
                r.html(m), h.find(".device-tile__unit").html(m + " <sup>w</sup>"), setTimeout(() => {
                    u && e(t)
                }, g.speed)
            }(v), window.requestAnimationFrame(x)) : i.getPercentage() <= .1 && (u = !1, b = void 0, T = void 0);
            const n = e("[data-home-energy-wallplug-observer]")[0];
            C.down("md") ? !f && d && (m = new HYIntersectionObserver({
                thresholds: d.sequence.total
            }), m.addTarget(n, (t, s) => {
                let a = Math.round(s.getPercentage(d.sequence.start, d.sequence.total - 1));
                d.currentFrame = a, d.drawFrame(a), a >= d.sequence.total - 1 ? e(".home-energy-wallplug").addClass("is-pulse") : e(".home-energy-wallplug").removeClass("is-pulse")
            }), f = !0) : (m && m.removeTarget(n), i.getPercentage() >= .8 && !1 === p ? (p = !0, d.reverse = !1, !1 === d.isPlaying && d.start()) : i.getPercentage() < .7 && i.isBottomIn() && !0 === p && (p = !1, d.reverse = !0, !1 === d.isPlaying && d.start()))
        }), e("[data-energy-wallplug-pull]").on("click", () => {
            d.reverse = !d.reverse, !1 === d.isPlaying && d.start()
        })
    }))
}(jQuery),
function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e('[data-home-section-item="family"]')[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(t, (function(t, s) {
            s.getPercentage() >= .5 && e(t.target).addClass("is-in-viewport")
        }))
    }))
}(jQuery),
function(e) {
    "use strict";
    e(document).ready((function() {}))
}(jQuery),
function(e, t) {
    "use strict";
    let s = !1;

    function a(e, t, s, a, i) {
        let o = n(t, s, a, i);
        e.css("--step-1", o)
    }

    function i(e, t, s, a, i) {
        let o = n(t, s, a, i);
        e.css("--step-2", o), o > .2 ? e.find("[data-home-flow-argument]").addClass("is-active") : e.find("[data-home-flow-argument]").removeClass("is-active")
    }

    function n(e, t, s, a) {
        let i = 0;
        return e.intersectionRect.height > s && e.intersectionRect.height < a && t.isTopIn() ? i = ((e.intersectionRect.height - s) / (a - s)).toFixed(2) : (e.intersectionRect.height > a || t.isTopOut()) && (i = 1), i
    }
    e(document).ready((function() {
        e("[data-home-flow-customize]");
        const t = e("[data-home-flow-customize-observer]"),
            o = e("[data-home-flow-customize-item]");
        let r = !1,
            h = t.find("[data-home-flow-customize-observer-item]")[0],
            d = t.find("[data-home-flow-customize-observer-item]")[1],
            c = t.find("[data-home-flow-customize-observer-item]")[2];
        const l = e(o[0]),
            m = e(o[1]),
            u = e(o[2]),
            g = new HYViewport,
            p = new HYIntersectionObserver({
                thresholds: 200
            });
        new HYIntersectionObserver({
            thresholds: 1
        }).addTarget(t[0], (t, o) => {
            t.isIntersecting && !1 === r ? (r = !0, p.addTarget(h, (t, o) => {
                a(l, t, o, 0, 100), i(l, t, o, 100, 200),
                    function(e, t, s, a, i) {
                        let o = n(t, s, a, i);
                        e.css("--step-3", o)
                    }(l, t, o, 200, 250),
                    function(t, s, a, i, o) {
                        let r = n(s, a, i, o);
                        const h = t.find("[data-home-flow-argument-item]");
                        r > .8 ? (e(h[2]).removeClass("is-hover"), e(h[3]).addClass("is-hover")) : r > .6 ? (e(h[1]).removeClass("is-hover"), e(h[2]).addClass("is-hover"), e(h[3]).removeClass("is-hover")) : r > .4 ? (e(h[0]).removeClass("is-hover"), e(h[1]).addClass("is-hover"), e(h[2]).removeClass("is-hover")) : r > .2 ? (e(h[0]).addClass("is-hover"), e(h[1]).removeClass("is-hover")) : r <= .2 && e(h[0]).removeClass("is-hover")
                    }(l, t, o, 250, 350), g.up("md") && function(e, t, a, i, o) {
                        let r = n(t, a, i, o);
                        const h = e.find("[data-home-flow-argument]"),
                            d = e.find("[data-home-flow-argument-label]"),
                            c = e.find("[data-home-flow-argument-item]:last-child");
                        r > .5 && (!1 === s && (s = !0, d.html(c.data("text")), d.addClass("has-value")), h.removeClass("is-active"));
                        r > .2 && r < .5 && (s = !1, d.html("..."), h.addClass("is-active"), d.removeClass("has-value"))
                    }(l, t, o, 350, 400)
            }), p.addTarget(d, (t, s) => {
                a(m, t, s, 0, 100), i(m, t, s, 100, 200),
                    function(e, t, s, a, i) {
                        let o = n(t, s, a, i);
                        const r = e.find("[data-home-flow-argument-label]"),
                            h = e.find("[data-home-flow-argument-input]"),
                            d = e.find("[data-home-flow-speech-value]").data("home-flow-speech-value"),
                            c = Math.floor(d.length * o);
                        0 === c ? (r.html(r.data("text")), r.removeClass("has-value")) : (r.addClass("has-value"), r.html(d.substring(0, c)));
                        h.html(d.substring(0, c))
                    }(m, t, s, 200, 300),
                    function(t, s, a, i, o) {
                        let r = n(s, a, i, o);
                        const h = e('[data-home-flow-argument-popup="speech"]');
                        t.css("--step-3", r), r > .1 ? h.addClass("is-active-tags-window") : h.removeClass("is-active-tags-window")
                    }(m, t, s, 300, 400),
                    function(t, s, a, i, o) {
                        let r = n(s, a, i, o);
                        const h = t.find("[data-home-flow-argument-label]"),
                            d = t.find("[data-home-flow-argument-input]"),
                            c = t.find("[data-home-flow-argument-tag-item]"),
                            l = e("[data-home-flow-customize-speech-tag]");
                        r > .1 ? c.addClass("is-hover") : c.removeClass("is-hover");
                        r > .5 ? (h.append(l.clone()), d.append(l.clone())) : (h.find("[data-home-flow-customize-speech-tag]").remove(), d.find("[data-home-flow-customize-speech-tag]").remove());
                        r > .9 ? (d.append("<span data-home-flow-customize-speech-char>!</span>"), h.append("<span data-home-flow-customize-speech-char>!</span>")) : (d.find("[data-home-flow-customize-speech-char]").remove(), h.find("[data-home-flow-customize-speech-char]").remove())
                    }(m, t, s, 400, 450), g.up("md") && function(t, s, a, i, o) {
                        let r = n(s, a, i, o);
                        const h = t.find("[data-home-flow-argument]"),
                            d = t.find("[data-home-flow-argument-label]"),
                            c = e('[data-home-flow-argument-popup="speech"]');
                        r > .5 ? (t.css("--step-3", 1 - r), c.removeClass("is-active-tags-window"), d.addClass("has-value"), h.removeClass("is-active")) : r > .4 && r < .5 && (c.addClass("is-active-tags-window"), h.addClass("is-active"))
                    }(m, t, s, 450, 500)
            }), p.addTarget(c, (t, s) => {
                a(u, t, s, 0, 100), i(u, t, s, 100, 200),
                    function(t, s, a, i, o) {
                        let r = 50 * n(s, a, i, o);
                        const h = t.find("[data-home-flow-argument-label]");
                        e("[data-home-flow-argument-slider]").val(r).css("--webkit-range-progress", r), r > 0 ? (h.html(Math.round(r) + "%"), h.addClass("has-value")) : (h.html(h.data("text")), h.removeClass("has-value"))
                    }(u, t, s, 200, 300), g.up("md") && function(t, s, a, i, o) {
                        let r = n(s, a, i, o);
                        const h = t.find("[data-home-flow-argument]"),
                            d = t.find("[data-home-flow-argument-label]"),
                            c = e('[data-home-flow-argument-popup="speech"]');
                        t.css("--step-3", 1 - r), r > .5 ? (c.removeClass("is-active-tags-window"), d.addClass("has-value"), h.removeClass("is-active")) : r > .3 && r < .5 && (c.addClass("is-active-tags-window"), h.addClass("is-active"))
                    }(u, t, s, 300, 350)
            })) : t.isIntersecting || !0 !== r || (r = !1, p.removeTarget(h), p.removeTarget(d), p.removeTarget(c))
        })
    }))
}(jQuery, window),
function(e, t) {
    e(document).ready((function() {
        $container = e("[data-home-flow-examples-container]"), $dragger = e("[data-home-flow-examples-dragger]"), $content = e("[data-home-flow-examples-content]"), $dots = e("[data-home-flow-examples-dots]"), $window = e(t);
        new HYSlider({
            $: e,
            $window: $window,
            $container: $container,
            $dragger: $dragger,
            $content: $content,
            $dots: $dots,
            manualWidth: {
                xs: 304,
                md: 304
            }
        }).init()
    }))
}(jQuery, window);
class FlowInteractiveAnimation {
    "use strict";
    $canvas;
    context;
    img;
    sequence = {
        total: 31,
        start: 1,
        fps: 25,
        frames: []
    };
    fileType = "png";
    fileRatio = "";
    isPlaying = !1;
    isDoneFirstTime = !1;
    reverse = !1;
    fpsInterval;
    then;
    startTime;
    now;
    ellapsed;
    constructor() {
        this.$canvas = $("[data-home-flow-interactive-video]"), this.$canvas.width = 500, this.$canvas.height = 500, this.context = this.$canvas[0].getContext("2d"), this.tryWebpFileType(), this.preloadImagesToCache(this.sequence.total), this.sequence.frames[this.sequence.start].onload = () => {
            this.drawFrame(this.sequence.start)
        }
    }
    start() {
        this.isAnimationStartedFirstTime = !0, this.isPlaying = !0, this.fpsInterval = 1e3 / this.sequence.fps, this.then = Date.now(), this.startTime = this.then, this.currentFrame = this.reverse ? this.sequence.total : this.sequence.start, this.animationFrame()
    }
    tryWebpFileType() {
        null !== this.$canvas[0].toDataURL("image/webp").indexOf("data:image/webp") && (this.fileType = "webp")
    }
    tryHighResolution() {
        window.devicePixelRatio > 1 && (this.fileRatio = "@2x")
    }
    animationFrame() {
        this.now = Date.now(), this.elapsed = this.now - this.then, this.elapsed > this.fpsInterval && (this.then = this.now - this.elapsed % this.fpsInterval, this.drawFrame(this.currentFrame), (this.currentFrame >= this.sequence.total && !this.reverse || this.currentFrame <= this.sequence.start && this.reverse) && (this.isPlaying = !1, this.isDoneFirstTime = !0), this.reverse ? this.currentFrame-- : this.currentFrame++), this.currentFrame <= this.sequence.total && this.currentFrame >= this.sequence.start && requestAnimationFrame(() => this.animationFrame())
    }
    drawFrame(e) {
        let t = this.sequence.frames[e];
        this.context.clearRect(0, 0, this.$canvas.width, this.$canvas.height), this.context.imageSmoothingEnabled = !1, this.context.drawImage(t, 0, 0, 500, 500)
    }
    preloadImagesToCache(e) {
        for (let t = this.sequence.start; t <= e; t++) {
            let e = this.getFrame(t);
            this.sequence.frames[t] = this.preloadImage(e)
        }
    }
    preloadImage(e) {
        var t = new Image;
        return t.src = e, t
    }
    getFrame(e) {
        return `/sequence/pages/home/door-sensor/${e}.${this.fileType}`
    }
}! function(e) {
    "use strict";
    let t, s = !1,
        a = !1;

    function i() {
        s = !0, t.start(), setTimeout((function() {
            e('[data-home-flow-interactive-card="1"]').addClass("is-active"), e('[data-home-flow-interactive-arrow="1"]').addClass("is-active")
        }), 1e3), setTimeout((function() {
            e('[data-home-flow-interactive-card="2"]').addClass("is-active")
        }), 3e3), setTimeout((function() {
            e('[data-home-flow-interactive-card="2"]').addClass("is-active-check")
        }), 3500), setTimeout((function() {
            e('[data-home-flow-interactive-arrow="2"]').addClass("is-active")
        }), 4e3), setTimeout((function() {
            e('[data-home-flow-interactive-card="3"]').addClass("is-active"), e("[data-home-flow-interactive-light]").addClass("is-active-light")
        }), 6e3), setTimeout((function() {
            e('[data-home-flow-interactive-card="3"]').addClass("is-active-check")
        }), 6500), setTimeout((function() {
            e("[data-home-flow-interactive-replay]").addClass("is-visible")
        }), 7500)
    }
    e(document).ready((function() {
        e("[data-home-flow-interactive-replay]").on("click", (function() {
            e("[data-home-flow-interactive-card]").removeClass("is-active").removeClass("is-active-check"), e("[data-home-flow-interactive-arrow]").removeClass("is-active"), e("[data-home-flow-interactive-light]").removeClass("is-active-light"), e(this).removeClass("is-visible"), setTimeout(() => {
                i()
            }, 100)
        }));
        const n = e('[data-home-section-item="flow"]')[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(n, (function(e, n) {
            e.isIntersecting && !a && (a = !0, t = new FlowInteractiveAnimation), n.getPercentage() >= .9 && !1 === s && i()
        }))
    }))
}(jQuery),
function(e, t) {
    "use strict";
    let s = 1,
        a = null;
    let i, n, o, r, h, d;

    function c() {
        n.removeClass("is-active"), o.removeClass("is-active"), o.removeClass("is-previous-active"), i.find(`[data-home-flow-tabs-item=${a}]`).addClass("is-previous-active"), i.find(`[data-home-flow-tabs-item=${s}]`).addClass("is-active"), i.find(`[data-home-flow-tabs-target=${s}]`).addClass("is-active"), setTimeout((function() {
            i.find(`[data-home-flow-tabs-item=${a}]`).removeClass("is-previous-active"), a = s
        }), 200), 5 === s ? (h.addClass("is-disabled"), h.prop("disabled", !0)) : (h.removeClass("is-disabled"), h.prop("disabled", !1)), 1 === s ? (d.addClass("is-disabled"), d.prop("disabled", !0)) : (d.removeClass("is-disabled"), d.prop("disabled", !1))
    }
    e(document).ready((function() {
        i = e("[data-home-flow-tabs]"), n = e("[data-home-flow-tabs-target]"), o = i.find("[data-home-flow-tabs-item]"), r = i.find("[data-home-flow-flows]"), h = e("[data-home-flow-tabs-next]"), d = e("[data-home-flow-tabs-previous]"), c(), d.on("click", (function() {
            s > 1 && (a = s, s -= 1, c())
        })), h.on("click", (function() {
            s < 5 && (a = s, s += 1, c())
        })), n.on("click", (function() {
            const t = e(this);
            n.removeClass("is-active"), t.addClass("is-active"), s = t.data("home-flow-tabs-target"), c()
        }));
        const t = new HYViewport;
        t.onInitResize(() => {
            ! function() {
                let t = 0;
                r.css("min-height", "0px"), o.each((s, a) => {
                    const i = e(a).outerHeight();
                    t = i > t ? i : t
                });
                r.css("min-height", t + 20 + "px")
            }()
        }, ["md", "lg"]), t.onResize(() => {
            r.css("min-height", "")
        }, ["md"], "lesserThen")
    }))
}(jQuery, window),
function(e) {
    "use strict";
    let t, s, a, i, n, o, r, h, d, c, l, m, u, g, p, f, v = [],
        w = [],
        $ = !1,
        y = 60,
        C = 4e3,
        b = 19,
        T = !1;

    function x(e) {
        void 0 === g && (g = e);
        if (p !== e) {
            let a = (e - g) / C * y + 1 * y,
                n = a + y * b / 2 - y;
            t.css("transform", `translateX(${-1*a.toFixed(1)}px)`), s.css("transform", `translateX(${n.toFixed(1)}px)`), I(i, n, r, h), I(d, n, m, u)
        }
        $ && (p = e, window.requestAnimationFrame(x))
    }

    function F(e, t, s) {
        e.push(P()), e.shift();
        let a = [],
            i = 0;
        e.forEach((e, t) => {
            e *= -1;
            let s = y * t + y / 2,
                n = y * t + y / 2;
            a.push(`C ${s} ${i} ${n} ${e} ${y*(t+1)} ${e}`), i = e
        }), t.attr("d", "M 0 0 " + a.join(" ")), s.attr("d", `M 0 0 ${a.join(" ")} L ${e.length*y} 0 Z`)
    }

    function P() {
        return (200 * Math.random()).toFixed()
    }

    function I(e, t, s, a) {
        let i = Math.floor(e.getTotalLength()),
            n = function(e, t, s) {
                var a = 0,
                    i = t,
                    n = (a + i) / 2;
                s = Math.max(s, e.getPointAtLength(0).x), s = Math.min(s, e.getPointAtLength(t).x);
                for (; n >= a && n <= t;) {
                    var o = e.getPointAtLength(n);
                    if (Math.abs(o.x - s) < .1) return o.y;
                    o.x > s ? i = n : a = n, n = (a + i) / 2
                }
            }(e, i, t);
        return a.text((22 + n / 100).toFixed(1)), s.css("transform", `translate(${t}px,${n}px)`), n
    }
    e(document).ready((function() {
        i = document.querySelector('[data-insights-graphs-mob-line="orange"]'), n = e('[data-insights-graphs-mob-line="orange"]'), o = e('[data-insights-graphs-mob-line-fill="orange"]'), r = e('[data-insights-graphs-mob-marker="orange"]'), h = e('[data-home-insights-graph-mob-current="orange"]'), d = document.querySelector('[data-insights-graphs-mob-line="blue"]'), c = e('[data-insights-graphs-mob-line="blue"]'), l = e('[data-insights-graphs-mob-line-fill="blue"]'), m = e('[data-insights-graphs-mob-marker="blue"]'), u = e('[data-home-insights-graph-mob-current="blue"]'), s = e("[data-insights-graphs-mob-vertical-ruler]"), t = e("[data-insights-graphs-mob-line-group]"), a = e("[data-insights-graphs-mob-text ]"), f = e("[data-home-insights-graph-mob-date]");
        for (let e = 0; e < b; e++) v.push(P()), w.push(P());
        const y = e('[data-home-section-item="insights-graphs-mob"]')[0];
        new HYIntersectionObserver({
            thresholds: 1
        }).addTarget(y, (function(e) {
            var t;
            e.isIntersecting && !$ ? (T = (1e4 * Math.random()).toFixed(0), t = T, $ || ($ = !0, function e(t) {
                T === t && (g = p, F(v, n, o), F(w, c, l), function() {
                    var e = new Date;
                    let t = e.getHours(),
                        s = e.getMinutes();
                    s < 10 && (s = "0" + s), f.text(`${function(){var e=new Date,t=[];return t[0]="Jan",t[1]="Feb",t[2]="Mar",t[3]="Apr",t[4]="May",t[5]="Jun",t[6]="Jul",t[7]="Aug",t[8]="Sep",t[9]="Oct",t[10]="Nov",t[11]="Dec",e.getDate()+" "+t[e.getMonth()]+" "+e.getFullYear()}()} ${t}:${s}`)
                }(), setTimeout(() => {
                    $ && e(t)
                }, C))
            }(t), window.requestAnimationFrame(x))) : e.isIntersecting || ($ = !1, g = void 0, p = void 0)
        }))
    }))
}(jQuery),
function(e) {
    "use strict";
    let t, s, a, i, n, o, r, h, d, c, l, m;

    function u(e) {
        o.style.setProperty("--x", e + "px")
    }

    function g(e, t, s) {
        let a = Math.min(t, s),
            i = 8 + e / 265,
            o = i.toString().split(".")[0],
            r = (60 * (i - o)).toFixed(0);
        var h, l;
        1 === r.length && (r = "0" + r), m.text(`${h=new Date,l=[],l[0]="Jan",l[1]="Feb",l[2]="Mar",l[3]="Apr",l[4]="May",l[5]="Jun",l[6]="Jul",l[7]="Aug",l[8]="Sep",l[9]="Oct",l[10]="Nov",l[11]="Dec",h.getDate()+" "+l[h.getMonth()]+" "+h.getFullYear()} ${o}:${r}`), d.text(p(t)), c.text(p(s)), n.css("--x", e + "px"), n.css("--y", a + "px")
    }

    function p(e) {
        return (23 - e / 50).toFixed(1)
    }

    function f(e, t, s, a) {
        let i = function(e, t, s) {
            var a = 0,
                i = t,
                n = (a + i) / 2;
            s = Math.max(s, e.getPointAtLength(0).x), s = Math.min(s, e.getPointAtLength(t).x);
            for (; n >= a && n <= t;) {
                var o = e.getPointAtLength(n);
                if (Math.abs(o.x - s) < .1) return o.y;
                o.x > s ? i = n : a = n, n = (a + i) / 2
            }
        }(e, s, a);
        return t.css("transform", `translate(${a}px,${i}px)`), i
    }
    e(document).ready((function() {
        l = e("[data-home-insights-graph]"), t = document.querySelector('[data-home-insights-graph-line="orange"]'), s = document.querySelector('[data-home-insights-graph-line="blue"]'), a = e('[data-home-insights-graph-marker="orange"]'), i = e('[data-home-insights-graph-marker="blue"]'), n = e("[data-home-insights-graph-info]"), d = e('[data-home-insights-graph-current="orange"]'), c = e('[data-home-insights-graph-current="blue"]'), m = e("[data-home-insights-graph-date]"), o = document.querySelector("[data-home-insights-graph-dash]"), r = Math.floor(t.getTotalLength()), h = Math.floor(s.getTotalLength());
        let p = 300,
            v = f(t, a, r, p),
            w = f(s, i, h, p);
        u(p), g(p, v, w), l.on("mousemove", (function(e) {
            let n = l.offset(),
                o = {
                    left: e.pageX - n.left - 45
                }.left;
            if (o > 0) {
                let e = f(t, a, r, o),
                    n = f(s, i, h, o);
                u(o), g(o, e, n)
            }
        }))
    }))
}(jQuery),
function(e, t) {
    "use strict";
    e(document).ready((function() {
        const s = e(t),
            a = e("[data-home-insights-menus-container]"),
            i = e("[data-home-insights-menus-dragger]"),
            n = e("[data-home-insights-menus-content]"),
            o = e("[data-home-insights-menus-dots]");
        new HYSlider({
            $: e,
            $window: s,
            $container: a,
            $dragger: i,
            $content: n,
            $dots: o,
            manualWidth: {
                xs: 280,
                md: 280
            }
        }).init(), e("[data-home-insights-toggle]").each((t, s) => {
            e(s).on("click", (function() {
                const t = e(this);
                t.hasClass("is-selected") ? (t.removeClass("is-selected"), t.addClass("was-selected")) : (t.addClass("is-selected"), t.removeClass("was-selected"))
            }))
        })
    }))
}(jQuery, window);
class HomeIntroAnimation {
    "use strict";
    $canvas;
    context;
    img;
    video = {
        width: 960,
        height: 600
    };
    sequence = {
        total: 121,
        start: 0,
        fps: 25,
        frames: [],
        base: null,
        loaded: 0
    };
    file = {
        type: "png",
        ratio: ""
    };
    isPause = !0;
    isDoneFirstTime = !1;
    reverse = !1;
    fpsInterval;
    then;
    startTime;
    now;
    ellapsed;
    UID = null;
    constructor() {
        this.$canvas = $("[data-home-intro-video]"), this.tryWebpFileType(), this.context = this.$canvas[0].getContext("2d"), this.preloadImagesToCache(this.sequence.total)
    }
    start() {
        this.fpsInterval = 1e3 / this.sequence.fps, this.then = performance.now(), this.startTime = this.then, this.currentFrame = this.sequence.start;
        let e = this.getUID();
        this.UID = e, this.animationFrame(e)
    }
    pause() {
        this.isPause = !0
    }
    continue () {
        this.isPause = !1;
        let e = this.getUID();
        this.UID = e, this.animationFrame(e)
    }
    tryWebpFileType() {
        return null !== this.$canvas[0].toDataURL("image/webp").indexOf("data:image/webp") && (this.file.type = "webp", !0)
    }
    tryHighResolution() {
        return !1
    }
    animationFrame(e) {
        this.isPause || e !== this.UID || (this.now = performance.now(), this.elapsed = this.now - this.then, this.elapsed > this.fpsInterval && !0 === this.sequence.loaded && (this.then = this.now - this.elapsed % this.fpsInterval, this.drawFrame(this.currentFrame), this.currentFrame++, this.currentFrame >= this.sequence.total && (this.currentFrame = this.sequence.start)), requestAnimationFrame(() => this.animationFrame(e)))
    }
    drawFrame(e) {
        let t = this.sequence.frames[e];
        this.context.clearRect(0, 0, this.video.width, this.video.height), this.context.imageSmoothingEnabled = !1, this.context.drawImage(t, 0, 0, this.video.width, this.video.height)
    }
    preloadImagesToCache(e) {
        for (let t = this.sequence.start; t < e; t++) {
            let e = this.getFrame(t);
            const s = this.preloadImage(e);
            this.sequence.frames[t] = s, s.onload = () => {
                this.sequence.loaded++, this.sequence.loaded >= this.sequence.total && (this.sequence.loaded = !0)
            }
        }
        this.sequence.base = this.preloadImage(this.getBaseFrame())
    }
    preloadImage(e) {
        var t = new Image;
        return t.src = e, t
    }
    getFrame(e) {
        return `/sequence/pages/home/hero/hero.${e}${this.file.ratio}.${this.file.type}`
    }
    getBaseFrame() {
        return `/sequence/pages/home/hero/base${this.file.ratio}.${this.file.type}`
    }
    getUID() {
        return Math.random()
    }
}! function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e("[data-home-intro-video]")[0],
            s = new HYIntersectionObserver({
                thresholds: 0
            });
        let a = !1;
        const i = new HomeIntroAnimation;
        i.start(), s.addTarget(t, (function(e, t) {
            e.isIntersecting !== a && (a = e.isIntersecting, !0 === a ? i.continue() : i.pause())
        }))
    })), e("[data-home-intro-more]").on("click", (function() {
        const t = e(this).attr("href"),
            s = e(t);
        s.length <= 0 || e([document.documentElement, document.body]).animate({
            scrollTop: s.offset().top - 100
        }, 500)
    }))
}(jQuery),
function(e) {
    "use strict";
    e(document).ready((function() {
        const t = e("[data-home-privacy]")[0];
        new HYIntersectionObserver({
            thresholds: 10
        }).addTarget(t, (function(t, s) {
            s.getPercentage() >= .5 && e(t.target).addClass("is-in-viewport")
        }))
    }))
}(jQuery),
function(e, t) {
    "use strict";
    let s = !1;
    e(document).ready((function() {
        e("body");
        const a = e(t),
            i = e('[data-home-section="reviews"]'),
            n = e("[data-home-reviews]"),
            o = e("[data-home-reviews-dragger]"),
            r = e("[data-home-reviews-content]"),
            h = e("[data-home-reviews-prev]"),
            d = e("[data-home-reviews-next]");
        new HYSlider({
            $: e,
            $window: a,
            $container: n,
            $dragger: o,
            $content: r,
            $buttonPrev: h,
            $buttonNext: d,
            infinity: !0,
            manualWidth: {
                xs: 316,
                md: 382
            }
        }).init();
        const c = e("[data-home-reviews-item]"),
            l = new HYIntersectionObserver({
                thresholds: 1
            }),
            m = new HYIntersectionObserver({
                root: n[0],
                rootMargin: "0px -20%",
                thresholds: 20
            });
        l.addTarget(i[0], (t, a) => {
            t.isIntersecting && !1 === s ? (s = !0, c.each((t, s) => {
                m.addTarget(c[t], (function(t, s) {
                    e(t.target).css("--opacity", Math.ceil(100 * s.getPercentage(.2, 1)) / 100), e(t.target).css("--scale", Math.ceil(100 * s.getPercentage(.9, 1)) / 100), s.getPercentage() >= .9 ? e(t.target).addClass("is-in-viewport") : e(t.target).removeClass("is-in-viewport")
                }))
            })) : t.isIntersecting || !0 !== s || (s = !1, c.each((e, t) => {
                m.removeTarget(t)
            }))
        })
    }))
}(jQuery, window),
function(e) {
    "use strict";
    let t = !1,
        s = !1,
        a = !1;
    e(document).ready((function() {
        s = e("[data-home-toc]"), a = s.find("a"),
            function() {
                const t = e(window.location.hash);
                if (t.length <= 0) return;
                window.location.hash && e([document.documentElement, document.body]).scrollTop(t.offset().top - 100)
            }(), a.on("click", (function() {
                const t = e(this).attr("href"),
                    s = e(t);
                s.length <= 0 || e([document.documentElement, document.body]).animate({
                    scrollTop: s.offset().top - 100
                }, 500)
            })),
            function() {
                const i = e("[data-home-section]");
                let n = [];
                const o = new IntersectionObserver(e => {
                    var i;
                    e.forEach(e => {
                        const t = e.intersectionRect.height / window.innerHeight,
                            s = Math.max(e.intersectionRatio, t),
                            a = e.target.id;
                        n[a] = s
                    }), i = n, t = Object.keys(i).reduce((e, t) => i[e] > i[t] ? e : t), a.removeClass("is-current"), s.find(`[href="#${t}"]`).addClass("is-current")
                }, {
                    root: null,
                    rootMargin: "100px",
                    threshold: [0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1]
                });
                i.each((e, t) => {
                    o.observe(t)
                })
            }()
    }))
}(jQuery);
! function(t) {
    "use strict";
    t(document).ready((function() {
        t(".app-drivers .app-driver[data-driver-id]").each((function() {
            const a = t(this).data("driver-id");
            t(this).click((function() {
                t(".app-drivers .app-driver").not(this).removeClass("highlight"), t(this).toggleClass("highlight");
                0 === t(".app-drivers .app-driver.highlight").length ? t(".app-flowcards .flowcard").show() : (t(".app-flowcards .flowcard").hide(), t(`.app-flowcards .flowcard[data-driver-id="${a}"]`).toggle(t(this).hasClass("highlight")), t([document.documentElement, document.body]).animate({
                    scrollTop: t(".app-flowcards").offset().top
                }, 1e3)), t(".app-flowcards .type-inner").each((function() {
                    const a = t(this).children(":visible").length;
                    t(this).prev(".type-title").attr("data-count", a)
                }))
            }))
        }))
    }))
}(jQuery),
function(t) {
    "use strict";
    let a, o, s = null,
        e = null;

    function i(o, i) {
        e = o, localStorage.setItem("homey-platform", o), a.attr("data-platform-switch", o);
        const l = t('[data-hy-page="app"]');
        if (function(t) {
                return s.includes(t)
            }(o)) {
            let t = l.hasClass("is-not-supported-platform") || i;
            l.removeClass("is-not-supported-platform"), t ? r(o) : (l.addClass("is-switching-animation"), setTimeout(() => {
                r(o)
            }, 350), setTimeout(() => {
                l.removeClass("is-switching-animation")
            }, 700))
        } else l.addClass("is-not-supported-platform")
    }

    function r(a) {
        t(".app-drivers .app-driver[data-platforms]").hide(), t(`.app-drivers .app-driver[data-platforms*="${a}"]`).show(), t(".app-flowcards .flowcard[data-platforms]").hide(), t(`.app-flowcards .flowcard[data-platforms*="${a}"]`).show()
    }
    t(document).ready((function() {
        a = t("[data-platform-switch]"), o = t("[data-platform-switch-button]"), s = a.data("platforms").split(","), e = localStorage.getItem("homey-platform"), a.attr("data-platform-switch-init", !1), setTimeout(() => {
            a.attr("data-platform-switch-init", !0)
        }, 350), e || (e = "local"), o.on("click", (function() {
            i(t(this).data("platform-switch-button"))
        })), o.on("mouseenter", (function() {
            const o = t(this).data("platform-switch-button");
            a.attr("data-platform-switch-hover", o)
        })), a.on("mouseleave", (function() {
            a.attr("data-platform-switch-hover", !1)
        })), i(e, !0)
    }))
}(jQuery),
function(t) {
    let a, o;

    function s() {
        a.scrollHeight > a.clientHeight ? o.addClass("is-shown") : o.removeClass("is-shown")
    }
    t(document).ready((function() {
        a = t("[data-app-summary-content]")[0], o = t("[data-app-summary-content-more]"), $moreCollapse = t('[data-app-summary-content-more="collapse"]'), s(), t(window).on("resize", (function() {
            s()
        })), $moreCollapse.on("click", (function() {
            t(a).toggleClass("is-collapsed"), $moreCollapse.removeClass("is-shown")
        }))
    }))
}(jQuery);
! function(t) {
    "use strict";
    let e, a, s;

    function i() {
        a.focus()
    }
    t(document).ready((function() {
        e = t("[data-apps-browse-search]"), a = e.find("[data-apps-browse-search-input]"), s = e.find("[data-apps-browse-search-reset]"), e.on("submit", (function(t) {
            t.preventDefault();
            const s = a.val();
            return window.location.href = `${e.data("apps-browse-search-action")}#filter?query=${s}`, !1
        })), s.on("click", t => {
            t.preventDefault(), a.val(""), i()
        }), t(document).on("keydown", e => {
            switch (e.key) {
                case "/":
                    e.preventDefault(), t("html, body").animate({
                        scrollTop: 0
                    }), i()
            }
        })
    }))
}(jQuery),
function(t) {
    "use strict";
    let e, a, s = null;

    function i(a, i = !0) {
        s = a, e.attr("data-platform-switch", a);
        const o = t(`[data-platform-switch-button="${a}"]`).first(),
            l = o.attr("href"),
            p = o.data("title");
        if (localStorage.setItem("homey-platform", a), n(a), history.pushState({}, p, l), document.title = p, !i) return;
        const r = t("[data-apps-content]");
        r.addClass("is-loading"), t.get(l, e => {
            const a = t(e).find("[data-apps-content]").html();
            r.html(a), r.removeClass("is-loading"), r.trigger("platformSwitch")
        })
    }

    function o(t) {
        e.attr("data-platform-switch-hover", t)
    }

    function n(e) {
        const a = t("[data-apps-header]"),
            s = a.find("[data-title]");
        a.attr("data-apps-header", e);
        const i = s.data("title");
        s.text(i[e]), s.html("&nbsp;")
    }
    t(document).ready((function() {
        e = t("[data-platform-switch]"), a = t("[data-platform-switch-button]"), s = e.data("platform-switch"), e.attr("data-platform-switch-init", !1), setTimeout(() => e.attr("data-platform-switch-init", !0), 350), a.on("click", (function(e) {
            e.preventDefault();
            const a = t(this).data("platform-switch-button");
            console.log(a), i(a)
        })), a.on("mouseenter", (function() {
            o(t(this).data("platform-switch-button"))
        })), e.on("mouseleave", () => o(!1)), s ? (localStorage.setItem("homey-platform", s), n(s)) : (s = localStorage.getItem("homey-platform") || "local", "local" === s ? i(s) : i(s, !1))
    }))
}(jQuery),
function(t) {
    "use strict";

    function e() {
        t("[data-apps-slider]").each((e, a) => {
            const s = t(a).find("[data-apps-slider-body]")[0],
                i = t(a).find("[data-apps-slider-previous]")[0],
                o = t(a).find("[data-apps-slider-next]")[0],
                n = t(a).find("[data-apps-slider-dots]")[0];
            new Swiper(s, {
                loop: !1,
                slidesPerView: "auto",
                edgeSwipeDetection: !0,
                wrapperClass: "apps-slider__slides",
                pagination: {
                    el: n,
                    clickable: !0
                },
                navigation: {
                    prevEl: i,
                    nextEl: o
                },
                on: {
                    afterInit: function() {
                        t(a).addClass("is-init-swiper")
                    }
                }
            })
        }), t("[data-apps-list-slider]").each((e, a) => {
            const s = new HYViewport;
            let i, o = null;
            s.onInitResize(e => {
                "xs" === e ? o || (o = !0, i = new Swiper(a, {
                    loop: !1,
                    slidesPerView: "auto",
                    edgeSwipeDetection: !0,
                    wrapperClass: "apps-list",
                    slideClass: "apps-list__item",
                    on: {
                        afterInit: function() {
                            t(a).addClass("is-init-swiper")
                        }
                    }
                })) : o && i && (o = null, i.destroy())
            }, ["xs", "lg"])
        }), t("[data-apps-top-5]").each((e, a) => {
            const s = new HYViewport,
                i = t(a).find("[data-apps-top-5-tabs-slider]")[0],
                o = t(a).find("[data-apps-top-5-slider]")[0];
            let n, l, p = null;
            s.onInitResize(e => {
                "xs" === e ? p || (p = !0, l = new Swiper(i, {
                    loop: !1,
                    slidesPerView: "auto",
                    edgeSwipeDetection: !0,
                    wrapperClass: "apps-top-5__tabs",
                    slideClass: "apps-top-5__tab",
                    freeMode: !0,
                    watchSlidesProgress: !0,
                    centeredSlides: !0,
                    centeredSlidesBounds: !0,
                    on: {
                        afterInit: function() {
                            t(o).addClass("is-init-swiper")
                        }
                    }
                }), n = new Swiper(o, {
                    loop: !1,
                    slidesPerView: "auto",
                    edgeSwipeDetection: !0,
                    wrapperClass: "apps-top-5__grid",
                    slideClass: "apps-top-5__item",
                    thumbs: {
                        swiper: l,
                        autoScrollOffset: 1,
                        multipleActiveThumbs: !1
                    },
                    on: {
                        afterInit: function() {
                            t(o).addClass("is-init-swiper")
                        }
                    }
                })) : p && n && (p = null, n.destroy())
            }, ["xs", "md"])
        })
    }
    t(document).ready((function() {
        const a = t("[data-apps-content]");
        e(), a.on("platformSwitch", () => {
            e()
        })
    }))
}(jQuery);
! function(t) {
    "use strict";
    t(document).ready((function() {
        t('[data-iframe="true"]').each((function() {
            lightGallery && lightGallery(this, {
                selector: "this"
            })
        }))
    }))
}(jQuery),
function(t) {
    "use strict";
    t(document).ready((function() {
        t(".wp-block-image").find("a").each((function() {
            lightGallery && lightGallery(this, {
                selector: "this",
                plugins: [lgZoom]
            })
        }))
    }))
}(jQuery);