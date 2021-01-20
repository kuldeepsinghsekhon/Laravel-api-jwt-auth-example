(window.webpackJsonp = window.webpackJsonp || []).push([
    [21, 8], {
        "+6XX": function(t, n, e) {
            var r = e("y1pI");
            t.exports = function(t) {
                return r(this.__data__, t) > -1
            }
        },
        "+c4W": function(t, n, e) {
            var r = e("711d"),
                o = e("4/ic"),
                i = e("9ggG"),
                a = e("9Nap");
            t.exports = function(t) {
                return i(t) ? r(a(t)) : o(t)
            }
        },
        "/9aa": function(t, n, e) {
            var r = e("NykK"),
                o = e("ExA7"),
                i = "[object Symbol]";
            t.exports = function(t) {
                return "symbol" == typeof t || o(t) && r(t) == i
            }
        },
        "03A+": function(t, n, e) {
            var r = e("JTzB"),
                o = e("ExA7"),
                i = Object.prototype,
                a = i.hasOwnProperty,
                c = i.propertyIsEnumerable,
                u = r(function() {
                    return arguments
                }()) ? r : function(t) {
                    return o(t) && a.call(t, "callee") && !c.call(t, "callee")
                };
            t.exports = u
        },
        "0Cz8": function(t, n, e) {
            var r = e("Xi7e"),
                o = e("ebwN"),
                i = e("e4Nc"),
                a = 200;
            t.exports = function(t, n) {
                var e = this.__data__;
                if (e instanceof r) {
                    var c = e.__data__;
                    if (!o || c.length < a - 1) return c.push([t, n]), this.size = ++e.size, this;
                    e = this.__data__ = new i(c)
                }
                return e.set(t, n), this.size = e.size, this
            }
        },
        "0ycA": function(t, n) {
            t.exports = function() {
                return []
            }
        },
        "1hJj": function(t, n, e) {
            var r = e("e4Nc"),
                o = e("ftKO"),
                i = e("3A9y");

            function a(t) {
                var n = -1,
                    e = null == t ? 0 : t.length;
                for (this.__data__ = new r; ++n < e;) this.add(t[n])
            }
            a.prototype.add = a.prototype.push = o, a.prototype.has = i, t.exports = a
        },
        "2ajD": function(t, n) {
            t.exports = function(t) {
                return t !== t
            }
        },
        "2gN3": function(t, n, e) {
            var r = e("Kz5y")["__core-js_shared__"];
            t.exports = r
        },
        "3A9y": function(t, n) {
            t.exports = function(t) {
                return this.__data__.has(t)
            }
        },
        "3Fdi": function(t, n) {
            var e = Function.prototype.toString;
            t.exports = function(t) {
                if (null != t) {
                    try {
                        return e.call(t)
                    } catch (t) {}
                    try {
                        return t + ""
                    } catch (t) {}
                }
                return ""
            }
        },
        "3L66": function(t, n, e) {
            var r = e("MMmD"),
                o = e("ExA7");
            t.exports = function(t) {
                return o(t) && r(t)
            }
        },
        "4/ic": function(t, n, e) {
            var r = e("ZWtO");
            t.exports = function(t) {
                return function(n) {
                    return r(n, t)
                }
            }
        },
        "44Ds": function(t, n, e) {
            var r = e("e4Nc"),
                o = "Expected a function";

            function i(t, n) {
                if ("function" != typeof t || null != n && "function" != typeof n) throw new TypeError(o);
                var e = function() {
                    var r = arguments,
                        o = n ? n.apply(this, r) : r[0],
                        i = e.cache;
                    if (i.has(o)) return i.get(o);
                    var a = t.apply(this, r);
                    return e.cache = i.set(o, a) || i, a
                };
                return e.cache = new(i.Cache || r), e
            }
            i.Cache = r, t.exports = i
        },
        "4fRq": function(t, n) {
            var e = "undefined" != typeof crypto && crypto.getRandomValues && crypto.getRandomValues.bind(crypto) || "undefined" != typeof msCrypto && "function" == typeof window.msCrypto.getRandomValues && msCrypto.getRandomValues.bind(msCrypto);
            if (e) {
                var r = new Uint8Array(16);
                t.exports = function() {
                    return e(r), r
                }
            } else {
                var o = new Array(16);
                t.exports = function() {
                    for (var t, n = 0; n < 16; n++) 0 === (3 & n) && (t = 4294967296 * Math.random()), o[n] = t >>> ((3 & n) << 3) & 255;
                    return o
                }
            }
        },
        "4kuk": function(t, n, e) {
            var r = e("SfRM"),
                o = e("Hvzi"),
                i = e("u8Dt"),
                a = e("ekgI"),
                c = e("JSQU");

            function u(t) {
                var n = -1,
                    e = null == t ? 0 : t.length;
                for (this.clear(); ++n < e;) {
                    var r = t[n];
                    this.set(r[0], r[1])
                }
            }
            u.prototype.clear = r, u.prototype.delete = o, u.prototype.get = i, u.prototype.has = a, u.prototype.set = c, t.exports = u
        },
        "4sDh": function(t, n, e) {
            var r = e("4uTw"),
                o = e("03A+"),
                i = e("Z0cm"),
                a = e("wJg7"),
                c = e("shjB"),
                u = e("9Nap");
            t.exports = function(t, n, e) {
                for (var s = -1, f = (n = r(n, t)).length, l = !1; ++s < f;) {
                    var p = u(n[s]);
                    if (!(l = null != t && e(t, p))) break;
                    t = t[p]
                }
                return l || ++s != f ? l : !!(f = null == t ? 0 : t.length) && c(f) && a(p, f) && (i(t) || o(t))
            }
        },
        "4uTw": function(t, n, e) {
            var r = e("Z0cm"),
                o = e("9ggG"),
                i = e("GNiM"),
                a = e("dt0z");
            t.exports = function(t, n) {
                return r(t) ? t : o(t, n) ? [t] : i(a(t))
            }
        },
        "6sVZ": function(t, n) {
            var e = Object.prototype;
            t.exports = function(t) {
                var n = t && t.constructor;
                return t === ("function" == typeof n && n.prototype || e)
            }
        },
        "711d": function(t, n) {
            t.exports = function(t) {
                return function(n) {
                    return null == n ? void 0 : n[t]
                }
            }
        },
        "77Zs": function(t, n, e) {
            var r = e("Xi7e");
            t.exports = function() {
                this.__data__ = new r, this.size = 0
            }
        },
        "7GkX": function(t, n, e) {
            var r = e("b80T"),
                o = e("A90E"),
                i = e("MMmD");
            t.exports = function(t) {
                return i(t) ? r(t) : o(t)
            }
        },
        "7Ix3": function(t, n) {
            t.exports = function(t) {
                var n = [];
                if (null != t)
                    for (var e in Object(t)) n.push(e);
                return n
            }
        },
        "7fqy": function(t, n) {
            t.exports = function(t) {
                var n = -1,
                    e = Array(t.size);
                return t.forEach(function(t, r) {
                    e[++n] = [r, t]
                }), e
            }
        },
        "88Gu": function(t, n) {
            var e = 800,
                r = 16,
                o = Date.now;
            t.exports = function(t) {
                var n = 0,
                    i = 0;
                return function() {
                    var a = o(),
                        c = r - (a - i);
                    if (i = a, c > 0) {
                        if (++n >= e) return arguments[0]
                    } else n = 0;
                    return t.apply(void 0, arguments)
                }
            }
        },
        "9Nap": function(t, n, e) {
            var r = e("/9aa"),
                o = 1 / 0;
            t.exports = function(t) {
                if ("string" == typeof t || r(t)) return t;
                var n = t + "";
                return "0" == n && 1 / t == -o ? "-0" : n
            }
        },
        "9ggG": function(t, n, e) {
            var r = e("Z0cm"),
                o = e("/9aa"),
                i = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
                a = /^\w*$/;
            t.exports = function(t, n) {
                if (r(t)) return !1;
                var e = typeof t;
                return !("number" != e && "symbol" != e && "boolean" != e && null != t && !o(t)) || a.test(t) || !i.test(t) || null != n && t in Object(n)
            }
        },
        A90E: function(t, n, e) {
            var r = e("6sVZ"),
                o = e("V6Ve"),
                i = Object.prototype.hasOwnProperty;
            t.exports = function(t) {
                if (!r(t)) return o(t);
                var n = [];
                for (var e in Object(t)) i.call(t, e) && "constructor" != e && n.push(e);
                return n
            }
        },
        AP2z: function(t, n, e) {
            var r = e("nmnc"),
                o = Object.prototype,
                i = o.hasOwnProperty,
                a = o.toString,
                c = r ? r.toStringTag : void 0;
            t.exports = function(t) {
                var n = i.call(t, c),
                    e = t[c];
                try {
                    t[c] = void 0;
                    var r = !0
                } catch (t) {}
                var o = a.call(t);
                return r && (n ? t[c] = e : delete t[c]), o
            }
        },
        B8du: function(t, n) {
            t.exports = function() {
                return !1
            }
        },
        BiGR: function(t, n, e) {
            var r = e("nmnc"),
                o = e("03A+"),
                i = e("Z0cm"),
                a = r ? r.isConcatSpreadable : void 0;
            t.exports = function(t) {
                return i(t) || o(t) || !!(a && t && t[a])
            }
        },
        CH3K: function(t, n) {
            t.exports = function(t, n) {
                for (var e = -1, r = n.length, o = t.length; ++e < r;) t[o + e] = n[e];
                return t
            }
        },
        CMye: function(t, n, e) {
            var r = e("GoyQ");
            t.exports = function(t) {
                return t === t && !r(t)
            }
        },
        CTbs: function(t, n, e) {
            "use strict";
            e.r(n);
            e("VRzm"), e("Btvt"), e("KKXr"), e("Z2Ku"), e("L9s1"), e("OG14"), e("ls82");
            var r = e("EVdn"),
                o = e.n(r),
                i = e("r2Ta"),
                a = e("B07Q"),
                c = e("Hgbo"),
                u = e("mZ2I"),
                s = function() {
                    var t, n, e, r, o, a;
                    !0 === i.a.profitwellEnabled && (t = window, n = document, e = "script", r = "profitwell", t.ProfitWellObject = r, t[r] = t[r] || function() {
                        (t[r].q = t[r].q || []).push(arguments)
                    }, t[r].l = 1 * new Date, o = n.createElement(e), a = n.getElementsByTagName(e)[0], o.async = 1, o.src = "https://dna8twue3dlxq.cloudfront.net/js/profitwell.js", a.parentNode.insertBefore(o, a), profitwell("auth_token", "2725d8d5c4ba05e46648480cb7c0e75a"), profitwell("user_email", i.a.user.email))
                },
                f = (e("F26w"), e("VFLm"), e("JgE6")),
                l = e.n(f),
                p = function() {
                    function t(t) {
                        this.config = t
                    }
                    return t.prototype.now = function() {
                        return Date.now() / 1e3
                    }, t.prototype.mark = function(t, n) {}, t.prototype.measure = function(t, n) {
                        return this.getDurationByMetric(t, n)
                    }, t.prototype.firstContentfulPaint = function(t) {
                        var n = this;
                        setTimeout(function() {
                            t(n.getFirstPaint())
                        })
                    }, t.prototype.getDurationByMetric = function(t, n) {
                        return n[t].end - n[t].start || 0
                    }, t.prototype.getFirstPaint = function() {
                        var t = window.performance.timing,
                            n = {
                                duration: 0,
                                entryType: "paint",
                                name: "first-contentful-paint",
                                startTime: 0
                            };
                        return t && 0 !== t.navigationStart && (n.startTime = Date.now() - t.navigationStart), [n]
                    }, t
                }(),
                d = function() {
                    function t(t) {
                        this.config = t, this.timeToInteractiveDuration = 0, this.ttiPolyfill = l.a
                    }
                    return t.supported = function() {
                        return window.performance && !!performance.now && !!performance.mark
                    }, t.supportedPerformanceObserver = function() {
                        return window.chrome && "PerformanceObserver" in window
                    }, t.supportedLongTask = function() {
                        return "PerformanceLongTaskTiming" in window
                    }, t.prototype.now = function() {
                        return window.performance.now()
                    }, t.prototype.mark = function(t, n) {
                        var e = "mark_" + t + "_" + n;
                        window.performance.mark(e)
                    }, t.prototype.measure = function(t, n) {
                        var e = "mark_" + t + "_start",
                            r = "mark_" + t + "_end";
                        return window.performance.measure(t, e, r), this.getDurationByMetric(t, n)
                    }, t.prototype.firstContentfulPaint = function(t) {
                        this.perfObserver = new PerformanceObserver(this.performanceObserverCb.bind(this, t)), this.perfObserver.observe({
                            entryTypes: ["paint"]
                        })
                    }, t.prototype.timeToInteractive = function(t) {
                        return this.ttiPolyfill.getFirstConsistentlyInteractive({
                            minValue: t
                        })
                    }, t.prototype.getDurationByMetric = function(t, n) {
                        var e = this.getMeasurementForGivenName(t);
                        return e && "measure" === e.entryType ? e.duration : -1
                    }, t.prototype.getMeasurementForGivenName = function(t) {
                        var n = window.performance.getEntriesByName(t);
                        return n[n.length - 1]
                    }, t.prototype.performanceObserverCb = function(t, n) {
                        var e = this,
                            r = n.getEntries();
                        t(r), r.forEach(function(t) {
                            e.config.firstContentfulPaint && "first-contentful-paint" === t.name && e.perfObserver.disconnect()
                        })
                    }, t
                }(),
                v = function() {
                    function t(t) {
                        void 0 === t && (t = {});
                        var n = this;
                        this.config = {
                            firstContentfulPaint: !1,
                            firstPaint: !1,
                            firstInputDelay: !1,
                            timeToInteractive: !1,
                            googleAnalytics: {
                                enable: !1,
                                timingVar: "name"
                            },
                            logPrefix: "\u26a1\ufe0f Perfume.js:",
                            logging: !0,
                            warning: !1
                        }, this.firstPaintDuration = 0, this.firstContentfulPaintDuration = 0, this.firstInputDelayDuration = 0, this.timeToInteractiveDuration = 0, this.isHidden = !1, this.metrics = {}, this.logMetricWarn = "Please provide a metric name", this.didVisibilityChange = function() {
                            document.hidden && (n.isHidden = document.hidden)
                        }, this.config = Object.assign({}, this.config, t), this.perf = d.supported() ? new d(this.config) : new p(this.config), this.observeTimeToInteractive = new Promise(function(t, e) {
                            n.initFirstPaintAndTTI(t, e)
                        }), this.observeFirstInputDelay = new Promise(function(t) {
                            n.initFirstInputDelay(t)
                        }), this.onVisibilityChange()
                    }
                    return t.prototype.start = function(t) {
                        this.checkMetricName(t) && (this.metrics[t] ? this.logWarn(this.config.logPrefix, "Recording already started.") : (this.metrics[t] = {
                            end: 0,
                            start: this.perf.now()
                        }, this.perf.mark(t, "start"), this.isHidden = !1))
                    }, t.prototype.end = function(t) {
                        if (this.checkMetricName(t)) {
                            if (this.metrics[t]) {
                                this.metrics[t].end = this.perf.now(), this.perf.mark(t, "end");
                                var n = this.perf.measure(t, this.metrics);
                                return this.log(t, n), delete this.metrics[t], this.sendTiming(t, n), n
                            }
                            this.logWarn(this.config.logPrefix, "Recording already stopped.")
                        }
                    }, t.prototype.endPaint = function(t) {
                        var n = this;
                        return new Promise(function(e) {
                            setTimeout(function() {
                                var r = n.end(t);
                                e(r)
                            })
                        })
                    }, t.prototype.log = function(t, n) {
                        if (!this.isHidden && this.config.logging)
                            if (t) {
                                var e = n.toFixed(2),
                                    r = "%c " + this.config.logPrefix + " " + t + " " + e + " ms";
                                window.console.log(r, "color: #ff6d00;font-size:12px;")
                            } else this.logWarn(this.config.logPrefix, this.logMetricWarn)
                    }, t.prototype.sendTiming = function(t, n) {
                        if (!this.isHidden && (this.config.analyticsLogger && this.config.analyticsLogger(t, n), this.config.googleAnalytics.enable))
                            if (window.ga) {
                                var e = Math.round(n);
                                window.ga("send", "timing", t, this.config.googleAnalytics.timingVar, e)
                            } else this.logWarn(this.config.logPrefix, "Google Analytics has not been loaded")
                    }, t.prototype.checkMetricName = function(t) {
                        return !!t || (this.logWarn(this.config.logPrefix, this.logMetricWarn), !1)
                    }, t.prototype.firstContentfulPaintCb = function(t, n, e) {
                        var r, o = this;
                        t.forEach(function(t) {
                            o.config.firstPaint && "first-paint" === t.name && o.logMetric(t.startTime, "First Paint", "firstPaint"), o.config.firstContentfulPaint && "first-contentful-paint" === t.name && o.logMetric(t.startTime, "First Contentful Paint", "firstContentfulPaint"), "first-contentful-paint" === t.name && (r = t.startTime)
                        }), d.supported() && d.supportedPerformanceObserver() && d.supportedLongTask() && this.config.timeToInteractive && r && this.perf.timeToInteractive(r).then(function(t) {
                            n(t), o.logMetric(t, "Time to Interactive", "timeToInteractive")
                        }).catch(e)
                    }, t.prototype.initFirstPaintAndTTI = function(t, n) {
                        var e = this;
                        d.supportedPerformanceObserver() ? this.perf.firstContentfulPaint(function(r) {
                            e.firstContentfulPaintCb(r, t, n)
                        }) : (this.perfEmulated = new p(this.config), this.perfEmulated.firstContentfulPaint(function(r) {
                            e.firstContentfulPaintCb(r, t, n)
                        }))
                    }, t.prototype.initFirstInputDelay = function(t) {
                        var n = this;
                        d.supported() && this.config.firstInputDelay && perfMetrics.onFirstInputDelay(function(e, r) {
                            n.logMetric(e, "First Input Delay", "firstInputDelay"), t(e)
                        })
                    }, t.prototype.onVisibilityChange = function() {
                        void 0 !== document.hidden && document.addEventListener("visibilitychange", this.didVisibilityChange)
                    }, t.prototype.logMetric = function(t, n, e) {
                        "firstPaint" === e && (this.firstPaintDuration = t), "firstContentfulPaint" === e && (this.firstContentfulPaintDuration = t), "firstInputDelaty" === e && (this.firstInputDelayDuration = t), "timeToInteractive" === e && (this.timeToInteractiveDuration = t), this.log(n, t), this.sendTiming(e, t)
                    }, t.prototype.logWarn = function(t, n) {
                        this.config.warning && this.config.logging && window.console.warn(t, n)
                    }, t
                }(),
                h = e("V4XR"),
                y = function(t) {
                    return (t / 1e3).toFixed(2)
                },
                g = {
                    firstPaint: "First Paint",
                    firstContentfulPaint: "First Contentful Paint",
                    timeToInteractive: "Time to Interactive"
                },
                m = (new v({
                    firstPaint: !0,
                    firstContentfulPaint: !0,
                    timeToInteractive: !0,
                    logging: !1,
                    analyticsLogger: function(t, n) {
                        window.newrelic && window.newrelic.setCustomAttribute(g[t], y(n)), Object(h.b)(g[t], {
                            duration: y(n)
                        })
                    }
                }), e("DzJC")),
                b = e.n(m),
                w = o()("#mc-header"),
                O = function() {
                    i.a.headerCondensed || (o()(window).scrollTop() >= 1 ? w.addClass("condensed") : i.a && i.a.course && "dm" === i.a.course.vanity_name || w.removeClass("condensed"))
                },
                x = function() {
                    var t = o()("#cm-scrolling-cta");
                    Object(u.g)("courses", "show") && o()(window).scrollTop() >= 800 && !i.a.behindPaywall ? t.addClass("active") : t.removeClass("active")
                },
                _ = function() {
                    O(), x()
                },
                E = function() {
                    _(), o()(window).on("scroll", b()(_, 50)), o()("#mobile-nav-button").on("click", function(t) {
                        o()("body").toggleClass("mobile-nav-active"), o()("#mc-header").toggleClass("nav-open"), t.preventDefault()
                    }), o()("#user-info-container .sign-out").hover(function() {
                        o()("#user-info-container").addClass("log-out-hovered")
                    }, function() {
                        o()("#user-info-container").removeClass("log-out-hovered")
                    })
                };
            e("XfO3"), e("HEwt"), e("a1Th"), e("rE2o"), e("ioFf"), e("rGqo"), e("f3/d");
            var j = e("u5Qe");

            function C(t) {
                return function(t) {
                    if (Array.isArray(t)) {
                        for (var n = 0, e = new Array(t.length); n < t.length; n++) e[n] = t[n];
                        return e
                    }
                }(t) || function(t) {
                    if (Symbol.iterator in Object(t) || "[object Arguments]" === Object.prototype.toString.call(t)) return Array.from(t)
                }(t) || function() {
                    throw new TypeError("Invalid attempt to spread non-iterable instance")
                }()
            }
            var S = {
                    InstructorGrid: function() {
                        return Promise.all([e.e(0), e.e(51)]).then(e.bind(null, "M7+b"))
                    },
                    OptimizelyMapping: function() {
                        return e.e(61).then(e.bind(null, "9gh2"))
                    }
                },
                T = function(t, n) {
                    if (S[n]) S[n]().then(function(e) {
                        var r = e.default;
                    });
                    else if (window.MC[n]) {
                        var e = window.MC[n];
                    } else Object(j.a)("Warning: Missing JS module for ".concat(n))
                },
                L = function() {
                    var t;
                    t = T, C(document.querySelectorAll("[data-module]")).forEach(function(n) {
                        o()(n).data("module").split(",").map(function(t) {
                            return t.trim()
                        }).forEach(function(e) {
                            t(n, e)
                        })
                    })
                },
                P = function() {
                    o()("#mc-header .student-info-block").on("click", function() {
                        var t = o()("#mc-header");
                        t.hasClass("student-info-block-open") ? t.removeClass("student-info-block-open") : t.addClass("student-info-block-open")
                    }), o()(".mc-explore-subnav-item").on("click", function(t) {
                        o()(t.currentTarget).is(".mc-explore-subnav-item__explore") ? o()(".mc-explore-subnav").toggleClass("nav-open") : o()(".mc-explore-subnav.nav-open").length > 0 && o()(".mc-explore-subnav").removeClass("nav-open")
                    }), o()(document).on("click", function(t) {
                        ! function(t) {
                            var n = o()(".student-info-block-open");
                            n.length > 0 && 0 === o()(t.target).closest(".student-info-block__blurb").length && n.removeClass("student-info-block-open")
                        }(t)
                    })
                },
                I = function() {
                    if (window.location.hash.length > 0 && "#/" === window.location.hash.substr(0, 2)) var t = 0,
                        n = setInterval(function() {
                            if ("complete" === document.readyState) {
                                t += 1;
                                var e = window.location.hash.substr(2);
                                "#" === e.substr(0, 1) ? e = e.substr(1) : "%23" === e.substr(0, 3) && (e = e.substr(3));
                                var r = document.getElementById(e);
                                null != r && Object(u.m)(o()("#".concat(r.id)), 500), clearInterval(n)
                            } else 5 === t && clearInterval(n)
                        }, 1e3)
                },
                A = e("JWKO"),
                R = e("Z1Cn");

            function N(t, n, e, r, o, i, a) {
                try {
                    var c = t[i](a),
                        u = c.value
                } catch (t) {
                    return void e(t)
                }
                c.done ? n(u) : Promise.resolve(u).then(r, o)
            }

            function D(t) {
                return function() {
                    var n = this,
                        e = arguments;
                    return new Promise(function(r, o) {
                        var i = t.apply(n, e);

                        function a(t) {
                            N(i, r, o, a, c, "next", t)
                        }

                        function c(t) {
                            N(i, r, o, a, c, "throw", t)
                        }
                        a(void 0)
                    })
                }
            }
            o()(document).on("ready", function() {
                Object(u.k)(), E(), P(), o()("*[data-notification-type='comment']").on("click", function() {
                    var t = o()(this).data("notification-id");
                    o.a.ajax({
                        url: "/api/v1/notifications/".concat(t),
                        type: "DELETE"
                    })
                }), Object(a.d)(), Object(c.a)(), L(), I(), Object(R.a)()
            }), o()(window).on("load", function() {
                Object(A.a)()
            });
            var M = i.a.controllerName,
                F = i.a.controllerAction,
                V = {
                    courses: {
                        show_enrolled: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(6), e.e(11), e.e(44)]).then(e.bind(null, "zbTW"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    },
                    pages: {
                        ap_landing: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(2), e.e(4), e.e(16), e.e(62)]).then(e.bind(null, "3aVZ"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }(),
                        root: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            if (!i.a.user.id) {
                                                t.next = 5;
                                                break
                                            }
                                            return t.next = 3, Promise.all([e.e(0), e.e(4), e.e(63)]).then(e.bind(null, "EsuM"));
                                        case 3:
                                            t.next = 7;
                                            break;
                                        case 5:
                                            return t.next = 7, Promise.all([e.e(0), e.e(2), e.e(4), e.e(16), e.e(64)]).then(e.bind(null, "opZx"));
                                        case 7:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }(),
                        welcome: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, e.e(66).then(e.t.bind(null, "HwGX", 7));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }(),
                        referral_share: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, e.e(65).then(e.bind(null, "HhDa"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    },
                    gifting_landing_pages: {
                        show: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(2), e.e(4), e.e(84), e.e(49)]).then(e.bind(null, "0y/i"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    },
                    categories: {
                        show: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(2), e.e(79), e.e(36)]).then(e.bind(null, "McJh"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    },
                    chapters: {
                        preview: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(4), e.e(81), e.e(38)]).then(e.bind(null, "VtKz"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    },
                    sitemap: {
                        index: function() {
                            var t = D(regeneratorRuntime.mark(function t() {
                                return regeneratorRuntime.wrap(function(t) {
                                    for (;;) switch (t.prev = t.next) {
                                        case 0:
                                            return t.next = 2, Promise.all([e.e(0), e.e(75)]).then(e.bind(null, "gXkl"));
                                        case 2:
                                        case "end":
                                            return t.stop()
                                    }
                                }, t)
                            }));
                            return function() {
                                return t.apply(this, arguments)
                            }
                        }()
                    }
                };
            try {
                (0, V[M][F])(), window.using_es2017_webpack = !0
            } catch (t) {
                window.using_es2017_webpack = !1
            }
            var W = Boolean(i.a.user && i.a.user.id);
            "serviceWorker" in navigator && W && (!i.a.experiments.html5_push || "variation" !== i.a.experiments.html5_push) && navigator.serviceWorker.getRegistrations().then(function(t) {
                t.length > 0 && t.forEach(function(t) {
                    return t.unregister()
                })
            });
            var K = window.location.search;
            if (K.includes("utm_source=talkable")) {
                var z = K.split("utm_campaign=")[1].split("&")[0],
                    B = K.split("utm_medium=")[1].split("&")[0],
                    G = K.split("talkable_visitor_uuid=")[1].split("&")[0],
                    Z = K.split("talkable_visitor_offer_id=")[1].split("&")[0];
                Object(a.b)({
                    medium: B,
                    talkableVisitorUuid: G,
                    talkableVisitorOfferId: Z,
                    cid: z
                })
            }
            s()
        },
        CZoQ: function(t, n) {
            t.exports = function(t, n, e) {
                for (var r = e - 1, o = t.length; ++r < o;)
                    if (t[r] === n) return r;
                return -1
            }
        },
        Cwc5: function(t, n, e) {
            var r = e("NKxu"),
                o = e("Npjl");
            t.exports = function(t, n) {
                var e = o(t, n);
                return r(e) ? e : void 0
            }
        },
        DSRE: function(t, n, e) {
            (function(t) {
                var r = e("Kz5y"),
                    o = e("B8du"),
                    i = n && !n.nodeType && n,
                    a = i && "object" == typeof t && t && !t.nodeType && t,
                    c = a && a.exports === i ? r.Buffer : void 0,
                    u = (c ? c.isBuffer : void 0) || o;
                t.exports = u
            }).call(this, e("YuTi")(t))
        },
        DzJC: function(t, n, e) {
            var r = e("sEfC"),
                o = e("GoyQ"),
                i = "Expected a function";
            t.exports = function(t, n, e) {
                var a = !0,
                    c = !0;
                if ("function" != typeof t) throw new TypeError(i);
                return o(e) && (a = "leading" in e ? !!e.leading : a, c = "trailing" in e ? !!e.trailing : c), r(t, n, {
                    leading: a,
                    maxWait: n,
                    trailing: c
                })
            }
        },
        E2jh: function(t, n, e) {
            var r, o = e("2gN3"),
                i = (r = /[^.]+$/.exec(o && o.keys && o.keys.IE_PROTO || "")) ? "Symbol(src)_1." + r : "";
            t.exports = function(t) {
                return !!i && i in t
            }
        },
        EA7m: function(t, n, e) {
            var r = e("zZ0H"),
                o = e("Ioao"),
                i = e("wclG");
            t.exports = function(t, n) {
                return i(o(t, n, r), t + "")
            }
        },
        EpBk: function(t, n) {
            t.exports = function(t) {
                var n = typeof t;
                return "string" == n || "number" == n || "symbol" == n || "boolean" == n ? "__proto__" !== t : null === t
            }
        },
        ExA7: function(t, n) {
            t.exports = function(t) {
                return null != t && "object" == typeof t
            }
        },
        F26w: function(t, n, e) {
            document.getElementById("algolia-search") && Promise.all([e.e(0), e.e(12), e.e(76), e.e(19)]).then(e.bind(null, "wWKD"))
        },
        FZoo: function(t, n, e) {
            var r = e("MrPd"),
                o = e("4uTw"),
                i = e("wJg7"),
                a = e("GoyQ"),
                c = e("9Nap");
            t.exports = function(t, n, e, u) {
                if (!a(t)) return t;
                for (var s = -1, f = (n = o(n, t)).length, l = f - 1, p = t; null != p && ++s < f;) {
                    var d = c(n[s]),
                        v = e;
                    if (s != l) {
                        var h = p[d];
                        void 0 === (v = u ? u(h, d, p) : void 0) && (v = a(h) ? h : i(n[s + 1]) ? [] : {})
                    }
                    r(p, d, v), p = p[d]
                }
                return t
            }
        },
        G6z8: function(t, n, e) {
            var r = e("fR/l"),
                o = e("oCl/"),
                i = e("mTTR");
            t.exports = function(t) {
                return r(t, i, o)
            }
        },
        GDhZ: function(t, n, e) {
            var r = e("wF/u"),
                o = e("mwIZ"),
                i = e("hgQt"),
                a = e("9ggG"),
                c = e("CMye"),
                u = e("IOzZ"),
                s = e("9Nap"),
                f = 1,
                l = 2;
            t.exports = function(t, n) {
                return a(t) && c(n) ? u(s(t), n) : function(e) {
                    var a = o(e, t);
                    return void 0 === a && a === n ? i(e, t) : r(n, a, f | l)
                }
            }
        },
        GNiM: function(t, n, e) {
            var r = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g,
                o = /\\(\\)?/g,
                i = e("I01J")(function(t) {
                    var n = [];
                    return 46 === t.charCodeAt(0) && n.push(""), t.replace(r, function(t, e, r, i) {
                        n.push(r ? i.replace(o, "$1") : e || t)
                    }), n
                });
            t.exports = i
        },
        GoyQ: function(t, n) {
            t.exports = function(t) {
                var n = typeof t;
                return null != t && ("object" == n || "function" == n)
            }
        },
        H8j4: function(t, n, e) {
            var r = e("QkVE");
            t.exports = function(t, n) {
                var e = r(this, t),
                    o = e.size;
                return e.set(t, n), this.size += e.size == o ? 0 : 1, this
            }
        },
        HDyB: function(t, n, e) {
            var r = e("nmnc"),
                o = e("JHRd"),
                i = e("ljhN"),
                a = e("or5M"),
                c = e("7fqy"),
                u = e("rEGp"),
                s = 1,
                f = 2,
                l = "[object Boolean]",
                p = "[object Date]",
                d = "[object Error]",
                v = "[object Map]",
                h = "[object Number]",
                y = "[object RegExp]",
                g = "[object Set]",
                m = "[object String]",
                b = "[object Symbol]",
                w = "[object ArrayBuffer]",
                O = "[object DataView]",
                x = r ? r.prototype : void 0,
                _ = x ? x.valueOf : void 0;
            t.exports = function(t, n, e, r, x, E, j) {
                switch (e) {
                    case O:
                        if (t.byteLength != n.byteLength || t.byteOffset != n.byteOffset) return !1;
                        t = t.buffer, n = n.buffer;
                    case w:
                        return !(t.byteLength != n.byteLength || !E(new o(t), new o(n)));
                    case l:
                    case p:
                    case h:
                        return i(+t, +n);
                    case d:
                        return t.name == n.name && t.message == n.message;
                    case y:
                    case m:
                        return t == n + "";
                    case v:
                        var C = c;
                    case g:
                        var S = r & s;
                        if (C || (C = u), t.size != n.size && !S) return !1;
                        var k = j.get(t);
                        if (k) return k == n;
                        r |= f, j.set(t, n);
                        var T = a(C(t), C(n), r, x, E, j);
                        return j.delete(t), T;
                    case b:
                        if (_) return _.call(t) == _.call(n)
                }
                return !1
            }
        },
        HOxn: function(t, n, e) {
            var r = e("Cwc5")(e("Kz5y"), "Promise");
            t.exports = r
        },
        Hgbo: function(t, n, e) {
            "use strict";
            var r = e("mZ2I"),
                o = e("B07Q"),
                i = (e("ioFf"), e("KKXr"), e("rGqo"), e("yt8O"), e("Btvt"), e("RW0V"), e("EVdn")),
                a = e.n(i),
                c = e("r2Ta");

            function u(t, n, e) {
                return n in t ? Object.defineProperty(t, n, {
                    value: e,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : t[n] = e, t
            }
            var s = function() {
                    return c.a.course && c.a.course.slug ? c.a.course.slug : ""
                },
                f = function(t, n, e, i) {
                    var a = arguments.length > 4 && void 0 !== arguments[4] ? arguments[4] : {};
                    Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, function(t) {
                        for (var n = 1; n < arguments.length; n++) {
                            var e = null != arguments[n] ? arguments[n] : {},
                                r = Object.keys(e);
                            "function" === typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(e).filter(function(t) {
                                return Object.getOwnPropertyDescriptor(e, t).enumerable
                            }))), r.forEach(function(n) {
                                u(t, n, e[n])
                            })
                        }
                        return t
                    }({
                        class: s(),
                        chapter: a.chapter || Object(r.c)(),
                        location: n,
                        action: t,
                        type: e,
                        title: i
                    }, a))
                },
                l = function() {
                    Object(o.e)(o.a.EventTypes.LESSON_VIEW_CLICK, {
                        action: "full-screen",
                        location: "video",
                        class: c.a.course.slug,
                        chapter: Object(r.c)()
                    })
                },
                p = function(t) {
                    var n = t;
                    return t.currentTarget && (n = t.currentTarget.dataset), {
                        id: n.chapterId || "",
                        number: n.chapterNum || "",
                        title: n.chapterTitle || ""
                    }
                },
                d = function() {
                    return a()("#documentViewer iframe")[0].src.split("/").pop()
                },
                v = function(t) {
                    Object(o.e)(o.a.EventTypes.WORKBOOK_CLICK, {
                        action: t,
                        class: s(),
                        chapter: Object(r.c)()
                    })
                },
                h = function(t) {
                    Object(o.e)(o.a.EventTypes.NEXT_LESSON, {
                        location: t,
                        class: c.a.course.slug,
                        chapter: Object(r.c)()
                    })
                },
                y = function() {
                    a()("#signout-button").on("click", function(t) {
                        var n = a()(t.target).attr("value");
                        n && Object(r.i)(n)
                    }), a()("body").on("click", "#range-finder-learn-more-button-link", function() {
                        var t, n, e;
                        t = o.a.Actions.PRIMARY, n = o.a.Locations.LEARN_MORE_CTA, e = o.a.Locations.VIDEO, Object(o.e)(o.a.EventTypes.COURSE_MARKETING_CLICK, {
                            class: s(),
                            action: t,
                            location: n,
                            type: e
                        })
                    }), a()("body").on("click", ".about-instructor p a", function() {
                        var t = c.a.course.slug;
                        Object(o.e)("Course Marketing Click", {
                            action: "competition",
                            class: t,
                            location: "banner"
                        })
                    }), a()("body").on("click", '.lesson-content__assignment, #lesson-plan_assignment-image, #lesson-plan_assignment-title, *[data-lesson-plan-assignment-trigger="true"]', function(t) {
                        var n = a()(t.currentTarget).data("title"),
                            e = o.a.Type.ASSIGNMENT,
                            r = p(t);
                        Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, {
                            class: s(),
                            chapter: r,
                            action: o.a.Actions.VIEW_ASSIGNMENT,
                            location: o.a.Locations.LESSON_PLAN,
                            type: e,
                            title: n
                        })
                    }), a()('*[data-segment-instructor-tile-trigger="true"]').on("click", function(t) {
                        var n = t.currentTarget.dataset.segmentAction || "";
                        c.a.course && c.a.course.slug && n !== c.a.course.slug && Object(o.e)(o.a.EventTypes.COURSE_MARKETING_CLICK, {
                            class: c.a.course.slug,
                            location: o.a.Locations.RECOMMENDED_SECTION,
                            action: n,
                            cm_mobile: !1
                        })
                    }), a()("body").on("click", 'a[id^="gift-class-"]', function() {
                        Object(o.e)(o.a.EventTypes.PURCHASE_CLICK, {
                            location: o.a.Locations.BANNER,
                            action: o.a.Actions.GIFT,
                            class: c.a.course.slug
                        })
                    })
                },
                g = function() {
                    a()(window).on("message", function(t) {
                        ! function(t) {
                            if ("printClicked" === t) {
                                var n = "workbook" === c.a.controllerAction ? "viewer-page" : "lesson-page",
                                    e = d();
                                f("print-pdf", n, o.a.Type.WORKBOOK, e)
                            } else if ("zoomSliderClicked" === t) v("zoom");
                            else if ("fullScreenClicked" === t) v("full-screen");
                            else if ("linkClicked" === t) v("open-link");
                            else if ("downloadClicked" === t) {
                                var r = d();
                                f(o.a.Actions.DOWNLOAD_PDF, "viewer-page", o.a.Type.WORKBOOK, r)
                            } else "tocClicked" === t && v("jump-to-lesson")
                        }(t.originalEvent.data)
                    }), a()("body").on("click", "#workbook-tab, #wistia-end-screen a", function(t) {
                        var n = "workbook-tab" === t.currentTarget.id ? "lesson-page" : "end-screen";
                        Object(o.c)(o.a.EventTypes.LESSON_RESOURCE_VIEW, {
                            type: o.a.Type.WORKBOOK,
                            class: s(),
                            chapter: Object(r.c)()
                        }), Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, {
                            class: s(),
                            chapter: Object(r.c)(),
                            action: "view-resource",
                            location: n
                        })
                    }), a()("body").on("click", ".view-flowpaper-workbook, #view-resource-workbook-pdf", function(t) {
                        var n = "view-resource-workbook-pdf" === t.currentTarget.id ? "class-resources" : "hero";
                        Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, {
                            class: s(),
                            chapter: Object(r.c)(),
                            type: o.a.Type.WORKBOOK,
                            action: "view-resource",
                            location: n
                        })
                    })
                };
            e.d(n, "a", function() {
                return m
            });
            var m = function() {
                a()("body").on("click", ".play-video", function(t) {
                    var n = p(t);
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        chapter: n,
                        action: o.a.Actions.PLAY_LESSON,
                        location: o.a.Locations.LESSON_PLAN
                    })
                }), a()("body").on("click", "#start-button, #resume-button", function(t) {
                    var n = p(t);
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        chapter: n,
                        action: o.a.Actions.PLAY_LESSON,
                        location: o.a.Locations.HERO
                    })
                }), a()("body").on("click", ".overview-hero-thumbnail", function() {
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        action: o.a.Actions.PLAY_LESSON,
                        location: o.a.Locations.LESSON_THUMBNAIL
                    })
                }), a()(".lesson-plan__list").on("accordionactivate", function(t, n) {
                    if (Object.keys(n.newHeader).length > 0) {
                        var e = p(n.newHeader.first().context.dataset);
                        Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                            class: s(),
                            chapter: e,
                            action: o.a.Actions.EXPAND_LESSON,
                            location: o.a.Locations.LESSON_PLAN
                        })
                    }
                }), a()(".lessons__list").on("accordionactivate", function(t, n) {
                    if (Object.keys(n.newHeader).length > 0) {
                        var e = p(n.newHeader.first().context.dataset);
                        Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                            class: s(),
                            chapter: e,
                            action: o.a.Actions.EXPAND_LESSON,
                            location: o.a.Locations.LESSON_PLAN
                        })
                    }
                }), a()("body").on("click", "#course-announcement-banner-button, .course-announcement-banner__button", function() {
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        action: o.a.Actions.CLASS_CTA,
                        location: o.a.Locations.CLASS_ANNOUNCEMENTS
                    })
                }), a()("body").on("click", "#office-hours-button", function() {
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        action: o.a.Actions.VISIT_OFFICE_HOURS,
                        location: o.a.Locations.OFFICE_HOURS
                    })
                }), a()("body").on("click", ".visit-the-community", function() {
                    Object(o.e)(o.a.EventTypes.CLASS_OVERVIEW_CLICK, {
                        class: s(),
                        action: o.a.Actions.VISIT_THE_HUB,
                        location: o.a.Locations.COMMUNITY
                    })
                }), a()("body").on("click", "#course-resource-download-pdf", function(t) {
                    var n = o.a.Type.OTHER_RESOURCE,
                        e = a()(t.currentTarget).data("title");
                    "Class Workbook" === e && (n = o.a.Type.WORKBOOK);
                    var r = a()(t.currentTarget).data("pdfId");
                    f(o.a.Actions.DOWNLOAD_PDF, o.a.Locations.RESOURCES, n, e, {
                        document_id: r
                    })
                }), a()("body").on("click", ".view-workbook-download", function(t) {
                    var n = t.currentTarget.dataset,
                        e = n.title,
                        r = n.pdfId,
                        i = o.a.Type.WORKBOOK;
                    f(o.a.Actions.DOWNLOAD_PDF, o.a.Locations.HERO, i, e, {
                        document_id: r
                    })
                }), a()("body").on("click", "#pdf-block", function(t) {
                    var n = a()(t.currentTarget).data("pdfTitle"),
                        e = o.a.Type.WORKBOOK,
                        r = o.a.Locations.LESSON_PLAN,
                        i = p(t),
                        c = a()(t.currentTarget).data("pdfId");
                    f(o.a.Actions.DOWNLOAD_PDF, r, e, n, {
                        chapter: i,
                        document_id: c
                    })
                }), y(), a()("body").on("click", ".available-code", function(t) {
                    var n = a()(t.currentTarget).data("title");
                    Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, {
                        class: s(),
                        action: o.a.Actions.VIEW_DETAILS,
                        location: o.a.Locations.RESOURCES,
                        type: o.a.Type.PROMOTION,
                        title: n
                    })
                }), a()("body").on("click", "#vendor-promo-cta", function(t) {
                    var n = t.currentTarget.dataset.title;
                    Object(o.e)(o.a.EventTypes.LESSON_RESOURCE_CLICK, {
                        class: s(),
                        action: o.a.Actions.PROMO_CTA,
                        location: o.a.Locations.RESOURCES,
                        type: o.a.Type.PROMOTION,
                        title: n
                    })
                }), a()("body").one("officeHoursLoaded", function() {
                    Object(o.e)(o.a.EventTypes.VISIT_OFFICE_HOURS, {
                        class: c.a.course.slug
                    })
                }), a()("body").on("click", ".mc-question-show-more", function() {
                    Object(o.e)(o.a.EventTypes.OFFICE_HOURS_CLICK, {
                        class: c.a.course.slug,
                        action: "load-more"
                    })
                }), g(), a()("body").on("mousedown", ".w-control-bar__region--fullscreen", function() {
                    l()
                }), a()("body").on("mousedown", "button.vjs-fullscreen-control", function() {
                    l()
                }), a()("body").on("click", ".endscreen-box a", function() {
                    var t = a()(".endscreen-box").attr("data-end-screen-type");
                    null != t && ("the_hub" === t && (t = "hub"), Object(o.e)(o.a.EventTypes.LESSON_VIEW_CLICK, {
                        action: "end-screen",
                        location: "video",
                        type: t,
                        class: c.a.course.slug,
                        chapter: Object(r.c)()
                    }))
                }), a()("body").on("click", "a.navigation-links-module__link.right", function() {
                    h("body")
                }), a()("body").on("click", ".next-chapter-link, .countdown", function() {
                    h("video")
                })
            }
        },
        Hvzi: function(t, n) {
            t.exports = function(t) {
                var n = this.has(t) && delete this.__data__[t];
                return this.size -= n ? 1 : 0, n
            }
        },
        I01J: function(t, n, e) {
            var r = e("44Ds"),
                o = 500;
            t.exports = function(t) {
                var n = r(t, function(t) {
                        return e.size === o && e.clear(), t
                    }),
                    e = n.cache;
                return n
            }
        },
        I2ZF: function(t, n) {
            for (var e = [], r = 0; r < 256; ++r) e[r] = (r + 256).toString(16).substr(1);
            t.exports = function(t, n) {
                var r = n || 0,
                    o = e;
                return [o[t[r++]], o[t[r++]], o[t[r++]], o[t[r++]], "-", o[t[r++]], o[t[r++]], "-", o[t[r++]], o[t[r++]], "-", o[t[r++]], o[t[r++]], "-", o[t[r++]], o[t[r++]], o[t[r++]], o[t[r++]], o[t[r++]], o[t[r++]]].join("")
            }
        },
        IOzZ: function(t, n) {
            t.exports = function(t, n) {
                return function(e) {
                    return null != e && e[t] === n && (void 0 !== n || t in Object(e))
                }
            }
        },
        Ioao: function(t, n, e) {
            var r = e("heNW"),
                o = Math.max;
            t.exports = function(t, n, e) {
                return n = o(void 0 === n ? t.length - 1 : n, 0),
                    function() {
                        for (var i = arguments, a = -1, c = o(i.length - n, 0), u = Array(c); ++a < c;) u[a] = i[n + a];
                        a = -1;
                        for (var s = Array(n + 1); ++a < n;) s[a] = i[a];
                        return s[n] = e(u), r(t, this, s)
                    }
            }
        },
        JHRd: function(t, n, e) {
            var r = e("Kz5y").Uint8Array;
            t.exports = r
        },
        JHgL: function(t, n, e) {
            var r = e("QkVE");
            t.exports = function(t) {
                return r(this, t).get(t)
            }
        },
        JSQU: function(t, n, e) {
            var r = e("YESw"),
                o = "__lodash_hash_undefined__";
            t.exports = function(t, n) {
                var e = this.__data__;
                return this.size += this.has(t) ? 0 : 1, e[t] = r && void 0 === n ? o : n, this
            }
        },
        JTzB: function(t, n, e) {
            var r = e("NykK"),
                o = e("ExA7"),
                i = "[object Arguments]";
            t.exports = function(t) {
                return o(t) && r(t) == i
            }
        },
        JWKO: function(t, n, e) {
            "use strict";
            var r = e("EVdn"),
                o = e.n(r),
                i = window.Image;
            n.a = function() {
                o()('span[data-loaded-image="true"]').each(function(t, n) {
                    var e, r, a;
                    e = n, r = o()(e), (a = new i).src = r.data("image-url"), a.alt = r.data("image-alt"), a.className = r.data("image-class"), a.id = r.data("image-id"), r.data("image-slug") && o()(a).attr("data-slug", r.data("image-slug")), r.replaceWith(a)
                })
            }
        },
        JgE6: function(t, n, e) {
            (function(e) {
                var r;
                ! function() {
                    var o = "undefined" != typeof window && window === this ? this : "undefined" != typeof e && null != e ? e : this,
                        i = "function" == typeof Object.defineProperties ? Object.defineProperty : function(t, n, e) {
                            t != Array.prototype && t != Object.prototype && (t[n] = e.value)
                        };

                    function a() {
                        a = function() {}, o.Symbol || (o.Symbol = u)
                    }
                    var c = 0;

                    function u(t) {
                        return "jscomp_symbol_" + (t || "") + c++
                    }

                    function s() {
                        a();
                        var t = o.Symbol.iterator;
                        t || (t = o.Symbol.iterator = o.Symbol("iterator")), "function" != typeof Array.prototype[t] && i(Array.prototype, t, {
                            configurable: !0,
                            writable: !0,
                            value: function() {
                                return f(this)
                            }
                        }), s = function() {}
                    }

                    function f(t) {
                        var n = 0;
                        return function(t) {
                            return s(), (t = {
                                next: t
                            })[o.Symbol.iterator] = function() {
                                return this
                            }, t
                        }(function() {
                            return n < t.length ? {
                                done: !1,
                                value: t[n++]
                            } : {
                                done: !0
                            }
                        })
                    }

                    function l(t) {
                        s();
                        var n = t[Symbol.iterator];
                        return n ? n.call(t) : f(t)
                    }

                    function p(t) {
                        if (!(t instanceof Array)) {
                            t = l(t);
                            for (var n, e = []; !(n = t.next()).done;) e.push(n.value);
                            t = e
                        }
                        return t
                    }
                    var d = 0;
                    var v = "img script iframe link audio video source".split(" ");

                    function h(t, n) {
                        for (var e = (t = l(t)).next(); !e.done; e = t.next())
                            if (e = e.value, n.includes(e.nodeName.toLowerCase()) || h(e.children, n)) return !0;
                        return !1
                    }

                    function y(t, n) {
                        if (2 < t.length) return performance.now();
                        for (var e = [], r = (n = l(n)).next(); !r.done; r = n.next()) r = r.value, e.push({
                            timestamp: r.start,
                            type: "requestStart"
                        }), e.push({
                            timestamp: r.end,
                            type: "requestEnd"
                        });
                        for (r = (n = l(t)).next(); !r.done; r = n.next()) e.push({
                            timestamp: r.value,
                            type: "requestStart"
                        });
                        for (e.sort(function(t, n) {
                                return t.timestamp - n.timestamp
                            }), t = t.length, n = e.length - 1; 0 <= n; n--) switch (r = e[n], r.type) {
                            case "requestStart":
                                t--;
                                break;
                            case "requestEnd":
                                if (2 < ++t) return r.timestamp;
                                break;
                            default:
                                throw Error("Internal Error: This should never happen")
                        }
                        return 0
                    }

                    function g(t) {
                        t = t || {}, this.w = !!t.useMutationObserver, this.u = t.minValue || null, t = window.__tti && window.__tti.e;
                        var n = window.__tti && window.__tti.o;
                        this.a = t ? t.map(function(t) {
                                return {
                                    start: t.startTime,
                                    end: t.startTime + t.duration
                                }
                            }) : [], n && n.disconnect(), this.b = [], this.f = new Map, this.j = null, this.v = -1 / 0, this.i = !1, this.h = this.c = this.s = null,
                            function(t, n) {
                                var e = XMLHttpRequest.prototype.send,
                                    r = d++;
                                XMLHttpRequest.prototype.send = function(o) {
                                    for (var i = [], a = 0; a < arguments.length; ++a) i[a - 0] = arguments[a];
                                    var c = this;
                                    return t(r), this.addEventListener("readystatechange", function() {
                                        4 === c.readyState && n(r)
                                    }), e.apply(this, i)
                                }
                            }(this.m.bind(this), this.l.bind(this)),
                            function(t, n) {
                                var e = fetch;
                                fetch = function(r) {
                                    for (var o = [], i = 0; i < arguments.length; ++i) o[i - 0] = arguments[i];
                                    return new Promise(function(r, i) {
                                        var a = d++;
                                        t(a), e.apply(null, [].concat(p(o))).then(function(t) {
                                            n(a), r(t)
                                        }, function(t) {
                                            n(t), i(t)
                                        })
                                    })
                                }
                            }(this.m.bind(this), this.l.bind(this)),
                            function(t) {
                                t.c = new PerformanceObserver(function(n) {
                                    for (var e = (n = l(n.getEntries())).next(); !e.done; e = n.next())
                                        if ("resource" === (e = e.value).entryType && (t.b.push({
                                                start: e.fetchStart,
                                                end: e.responseEnd
                                            }), b(t, y(t.g, t.b) + 5e3)), "longtask" === e.entryType) {
                                            var r = e.startTime + e.duration;
                                            t.a.push({
                                                start: e.startTime,
                                                end: r
                                            }), b(t, r + 5e3)
                                        }
                                }), t.c.observe({
                                    entryTypes: ["longtask", "resource"]
                                })
                            }(this), this.w && (this.h = function(t) {
                                var n = new MutationObserver(function(n) {
                                    for (var e = (n = l(n)).next(); !e.done; e = n.next()) "childList" == (e = e.value).type && h(e.addedNodes, v) ? t(e) : "attributes" == e.type && v.includes(e.target.tagName.toLowerCase()) && t(e)
                                });
                                return n.observe(document, {
                                    attributes: !0,
                                    childList: !0,
                                    subtree: !0,
                                    attributeFilter: ["href", "src"]
                                }), n
                            }(this.B.bind(this)))
                    }

                    function m(t) {
                        t.i = !0;
                        var n = 0 < t.a.length ? t.a[t.a.length - 1].end : 0,
                            e = y(t.g, t.b);
                        b(t, Math.max(e + 5e3, n))
                    }

                    function b(t, n) {
                        !t.i || t.v > n || (clearTimeout(t.j), t.j = setTimeout(function() {
                            var n = performance.timing.navigationStart,
                                e = y(t.g, t.b);
                            n = (window.a && window.a.A ? 1e3 * window.a.A().C - n : 0) || performance.timing.domContentLoadedEventEnd - n;
                            if (t.u) var r = t.u;
                            else performance.timing.domContentLoadedEventEnd ? r = (r = performance.timing).domContentLoadedEventEnd - r.navigationStart : r = null;
                            var o = performance.now();
                            null === r && b(t, Math.max(e + 5e3, o + 1e3));
                            var i = t.a;
                            5e3 > o - e ? e = null : e = 5e3 > o - (e = i.length ? i[i.length - 1].end : n) ? null : Math.max(e, r), e && (t.s(e), clearTimeout(t.j), t.i = !1, t.c && t.c.disconnect(), t.h && t.h.disconnect()), b(t, performance.now() + 1e3)
                        }, n - performance.now()), t.v = n)
                    }
                    g.prototype.getFirstConsistentlyInteractive = function() {
                        var t = this;
                        return new Promise(function(n) {
                            t.s = n, "complete" == document.readyState ? m(t) : window.addEventListener("load", function() {
                                m(t)
                            })
                        })
                    }, g.prototype.m = function(t) {
                        this.f.set(t, performance.now())
                    }, g.prototype.l = function(t) {
                        this.f.delete(t)
                    }, g.prototype.B = function() {
                        b(this, performance.now() + 5e3)
                    }, o.Object.defineProperties(g.prototype, {
                        g: {
                            configurable: !0,
                            enumerable: !0,
                            get: function() {
                                return [].concat(p(this.f.values()))
                            }
                        }
                    });
                    var w = {
                        getFirstConsistentlyInteractive: function(t) {
                            return t = t || {}, "PerformanceLongTaskTiming" in window ? new g(t).getFirstConsistentlyInteractive() : Promise.resolve(null)
                        }
                    };
                    t.exports ? t.exports = w : void 0 === (r = function() {
                        return w
                    }.apply(n, [])) || (t.exports = r)
                }()
            }).call(this, e("yLpj"))
        },
        Juji: function(t, n) {
            t.exports = function(t, n) {
                return null != t && n in Object(t)
            }
        },
        KMkd: function(t, n) {
            t.exports = function() {
                this.__data__ = [], this.size = 0
            }
        },
        KfNM: function(t, n) {
            var e = Object.prototype.toString;
            t.exports = function(t) {
                return e.call(t)
            }
        },
        KwMD: function(t, n) {
            t.exports = function(t, n, e, r) {
                for (var o = t.length, i = e + (r ? 1 : -1); r ? i-- : ++i < o;)
                    if (n(t[i], i, t)) return i;
                return -1
            }
        },
        Kz5y: function(t, n, e) {
            var r = e("WFqU"),
                o = "object" == typeof self && self && self.Object === Object && self,
                i = r || o || Function("return this")();
            t.exports = i
        },
        L8xA: function(t, n) {
            t.exports = function(t) {
                var n = this.__data__,
                    e = n.delete(t);
                return this.size = n.size, e
            }
        },
        LXxW: function(t, n) {
            t.exports = function(t, n) {
                for (var e = -1, r = null == t ? 0 : t.length, o = 0, i = []; ++e < r;) {
                    var a = t[e];
                    n(a, e, t) && (i[o++] = a)
                }
                return i
            }
        },
        LcsW: function(t, n, e) {
            var r = e("kekF")(Object.getPrototypeOf, Object);
            t.exports = r
        },
        LqpT: function(t, n, e) {
            var r = e("1hJj"),
                o = e("jbM+"),
                i = e("Xt/L"),
                a = e("eUgh"),
                c = e("sEf8"),
                u = e("xYSL"),
                s = 200;
            t.exports = function(t, n, e, f) {
                var l = -1,
                    p = o,
                    d = !0,
                    v = t.length,
                    h = [],
                    y = n.length;
                if (!v) return h;
                e && (n = a(n, c(e))), f ? (p = i, d = !1) : n.length >= s && (p = u, d = !1, n = new r(n));
                t: for (; ++l < v;) {
                    var g = t[l],
                        m = null == e ? g : e(g);
                    if (g = f || 0 !== g ? g : 0, d && m === m) {
                        for (var b = y; b--;)
                            if (n[b] === m) continue t;
                        h.push(g)
                    } else p(n, m, f) || h.push(g)
                }
                return h
            }
        },
        MMmD: function(t, n, e) {
            var r = e("lSCD"),
                o = e("shjB");
            t.exports = function(t) {
                return null != t && o(t.length) && !r(t)
            }
        },
        MrPd: function(t, n, e) {
            var r = e("hypo"),
                o = e("ljhN"),
                i = Object.prototype.hasOwnProperty;
            t.exports = function(t, n, e) {
                var a = t[n];
                i.call(t, n) && o(a, e) && (void 0 !== e || n in t) || r(t, n, e)
            }
        },
        MvSz: function(t, n, e) {
            var r = e("LXxW"),
                o = e("0ycA"),
                i = Object.prototype.propertyIsEnumerable,
                a = Object.getOwnPropertySymbols,
                c = a ? function(t) {
                    return null == t ? [] : (t = Object(t), r(a(t), function(n) {
                        return i.call(t, n)
                    }))
                } : o;
            t.exports = c
        },
        NKxu: function(t, n, e) {
            var r = e("lSCD"),
                o = e("E2jh"),
                i = e("GoyQ"),
                a = e("3Fdi"),
                c = /^\[object .+?Constructor\]$/,
                u = Function.prototype,
                s = Object.prototype,
                f = u.toString,
                l = s.hasOwnProperty,
                p = RegExp("^" + f.call(l).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");
            t.exports = function(t) {
                return !(!i(t) || o(t)) && (r(t) ? p : c).test(a(t))
            }
        },
        Npjl: function(t, n) {
            t.exports = function(t, n) {
                return null == t ? void 0 : t[n]
            }
        },
        NykK: function(t, n, e) {
            var r = e("nmnc"),
                o = e("AP2z"),
                i = e("KfNM"),
                a = "[object Null]",
                c = "[object Undefined]",
                u = r ? r.toStringTag : void 0;
            t.exports = function(t) {
                return null == t ? void 0 === t ? c : a : u && u in Object(t) ? o(t) : i(t)
            }
        },
        O0oS: function(t, n, e) {
            var r = e("Cwc5"),
                o = function() {
                    try {
                        var t = r(Object, "defineProperty");
                        return t({}, "", {}), t
                    } catch (t) {}
                }();
            t.exports = o
        },
        O7RO: function(t, n, e) {
            var r = e("CMye"),
                o = e("7GkX");
            t.exports = function(t) {
                for (var n = o(t), e = n.length; e--;) {
                    var i = n[e],
                        a = t[i];
                    n[e] = [i, a, r(a)]
                }
                return n
            }
        },
        OFL0: function(t, n, e) {
            var r = e("lvO4"),
                o = e("4sDh");
            t.exports = function(t, n) {
                return null != t && o(t, n, r)
            }
        },
        "Of+w": function(t, n, e) {
            var r = e("Cwc5")(e("Kz5y"), "WeakMap");
            t.exports = r
        },
        QIyF: function(t, n, e) {
            var r = e("Kz5y");
            t.exports = function() {
                return r.Date.now()
            }
        },
        QcOe: function(t, n, e) {
            var r = e("GoyQ"),
                o = e("6sVZ"),
                i = e("7Ix3"),
                a = Object.prototype.hasOwnProperty;
            t.exports = function(t) {
                if (!r(t)) return i(t);
                var n = o(t),
                    e = [];
                for (var c in t)("constructor" != c || !n && a.call(t, c)) && e.push(c);
                return e
            }
        },
        QkVE: function(t, n, e) {
            var r = e("EpBk");
            t.exports = function(t, n) {
                var e = t.__data__;
                return r(n) ? e["string" == typeof n ? "string" : "hash"] : e.map
            }
        },
        QoRX: function(t, n) {
            t.exports = function(t, n) {
                for (var e = -1, r = null == t ? 0 : t.length; ++e < r;)
                    if (n(t[e], e, t)) return !0;
                return !1
            }
        },
        QqLw: function(t, n, e) {
            var r = e("tadb"),
                o = e("ebwN"),
                i = e("HOxn"),
                a = e("yGk4"),
                c = e("Of+w"),
                u = e("NykK"),
                s = e("3Fdi"),
                f = s(r),
                l = s(o),
                p = s(i),
                d = s(a),
                v = s(c),
                h = u;
            (r && "[object DataView]" != h(new r(new ArrayBuffer(1))) || o && "[object Map]" != h(new o) || i && "[object Promise]" != h(i.resolve()) || a && "[object Set]" != h(new a) || c && "[object WeakMap]" != h(new c)) && (h = function(t) {
                var n = u(t),
                    e = "[object Object]" == n ? t.constructor : void 0,
                    r = e ? s(e) : "";
                if (r) switch (r) {
                    case f:
                        return "[object DataView]";
                    case l:
                        return "[object Map]";
                    case p:
                        return "[object Promise]";
                    case d:
                        return "[object Set]";
                    case v:
                        return "[object WeakMap]"
                }
                return n
            }), t.exports = h
        },
        "R/W3": function(t, n, e) {
            var r = e("KwMD"),
                o = e("2ajD"),
                i = e("CZoQ");
            t.exports = function(t, n, e) {
                return n === n ? i(t, n, e) : r(t, o, e)
            }
        },
        SfRM: function(t, n, e) {
            var r = e("YESw");
            t.exports = function() {
                this.__data__ = r ? r(null) : {}, this.size = 0
            }
        },
        "UNi/": function(t, n) {
            t.exports = function(t, n) {
                for (var e = -1, r = Array(t); ++e < t;) r[e] = n(e);
                return r
            }
        },
        V4XR: function(t, n, e) {
            "use strict";
            e.d(n, "b", function() {
                return a
            }), e.d(n, "a", function() {
                return c
            });
            e("ioFf"), e("rGqo"), e("yt8O"), e("Btvt"), e("RW0V");
            var r = e("xDdU");

            function o(t, n, e) {
                return n in t ? Object.defineProperty(t, n, {
                    value: e,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : t[n] = e, t
            }
            var i = e.n(r)()(),
                a = function(t) {
                    var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    window.newrelic && window.newrelic.addPageAction(t, function(t) {
                        for (var n = 1; n < arguments.length; n++) {
                            var e = null != arguments[n] ? arguments[n] : {},
                                r = Object.keys(e);
                            "function" === typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(e).filter(function(t) {
                                return Object.getOwnPropertyDescriptor(e, t).enumerable
                            }))), r.forEach(function(n) {
                                o(t, n, e[n])
                            })
                        }
                        return t
                    }({}, n, {
                        pageViewId: i
                    }))
                },
                c = function(t, n) {
                    window.newrelic && window.newrelic.noticeError(t, n)
                }
        },
        V6Ve: function(t, n, e) {
            var r = e("kekF")(Object.keys, Object);
            t.exports = r
        },
        VFLm: function(t, n) {
            ! function() {
                var t, n, e, r = [],
                    o = {
                        passive: !0,
                        capture: !0
                    },
                    i = new Date;

                function a(r, o) {
                    t || (t = o, n = r, e = new Date, s(removeEventListener), c())
                }

                function c() {
                    n >= 0 && n < e - i && (r.forEach(function(e) {
                        e(n, t)
                    }), r = [])
                }

                function u(t) {
                    if (t.cancelable) {
                        var n = (t.timeStamp > 1e12 ? new Date : performance.now()) - t.timeStamp;
                        if ("pointerdown" == t.type) return void
                        function(t, n) {
                            function e() {
                                a(t, n), i()
                            }

                            function r() {
                                i()
                            }

                            function i() {
                                removeEventListener("pointerup", e, o), removeEventListener("pointercancel", r, o)
                            }
                            addEventListener("pointerup", e, o), addEventListener("pointercancel", r, o)
                        }(n, t);
                        a(n, t)
                    }
                }

                function s(t) {
                    ["click", "mousedown", "keydown", "touchstart", "pointerdown"].forEach(function(n) {
                        t(n, u, o)
                    })
                }
                s(addEventListener), self.perfMetrics = self.perfMetrics || {}, self.perfMetrics.onFirstInputDelay = function(t) {
                    r.push(t), c()
                }
            }()
        },
        VaNO: function(t, n) {
            t.exports = function(t) {
                return this.__data__.has(t)
            }
        },
        WFqU: function(t, n, e) {
            (function(n) {
                var e = "object" == typeof n && n && n.Object === Object && n;
                t.exports = e
            }).call(this, e("yLpj"))
        },
        XGnz: function(t, n, e) {
            var r = e("CH3K"),
                o = e("BiGR");
            t.exports = function t(n, e, i, a, c) {
                var u = -1,
                    s = n.length;
                for (i || (i = o), c || (c = []); ++u < s;) {
                    var f = n[u];
                    e > 0 && i(f) ? e > 1 ? t(f, e - 1, i, a, c) : r(c, f) : a || (c[c.length] = f)
                }
                return c
            }
        },
        Xi7e: function(t, n, e) {
            var r = e("KMkd"),
                o = e("adU4"),
                i = e("tMB7"),
                a = e("+6XX"),
                c = e("Z8oC");

            function u(t) {
                var n = -1,
                    e = null == t ? 0 : t.length;
                for (this.clear(); ++n < e;) {
                    var r = t[n];
                    this.set(r[0], r[1])
                }
            }
            u.prototype.clear = r, u.prototype.delete = o, u.prototype.get = i, u.prototype.has = a, u.prototype.set = c, t.exports = u
        },
        "Xt/L": function(t, n) {
            t.exports = function(t, n, e) {
                for (var r = -1, o = null == t ? 0 : t.length; ++r < o;)
                    if (e(n, t[r])) return !0;
                return !1
            }
        },
        YESw: function(t, n, e) {
            var r = e("Cwc5")(Object, "create");
            t.exports = r
        },
        YuTi: function(t, n) {
            t.exports = function(t) {
                return t.webpackPolyfill || (t.deprecate = function() {}, t.paths = [], t.children || (t.children = []), Object.defineProperty(t, "loaded", {
                    enumerable: !0,
                    get: function() {
                        return t.l
                    }
                }), Object.defineProperty(t, "id", {
                    enumerable: !0,
                    get: function() {
                        return t.i
                    }
                }), t.webpackPolyfill = 1), t
            }
        },
        Z0cm: function(t, n) {
            var e = Array.isArray;
            t.exports = e
        },
        Z1Cn: function(t, n, e) {
            "use strict";
            var r = e("B07Q"),
                o = e("r2Ta");
            n.a = function() {
                Object(r.f)("pricing_transformation", {
                    mc_geo: o.a.geo,
                    mc_path: window.location.pathname,
                    mc_referer: window.document.referrer,
                    mc_url: window.location.origin
                })
            }
        },
        Z8oC: function(t, n, e) {
            var r = e("y1pI");
            t.exports = function(t, n) {
                var e = this.__data__,
                    o = r(e, t);
                return o < 0 ? (++this.size, e.push([t, n])) : e[o][1] = n, this
            }
        },
        ZCpW: function(t, n, e) {
            var r = e("lm/5"),
                o = e("O7RO"),
                i = e("IOzZ");
            t.exports = function(t) {
                var n = o(t);
                return 1 == n.length && n[0][2] ? i(n[0][0], n[0][1]) : function(e) {
                    return e === t || r(e, t, n)
                }
            }
        },
        ZWtO: function(t, n, e) {
            var r = e("4uTw"),
                o = e("9Nap");
            t.exports = function(t, n) {
                for (var e = 0, i = (n = r(n, t)).length; null != t && e < i;) t = t[o(n[e++])];
                return e && e == i ? t : void 0
            }
        },
        adU4: function(t, n, e) {
            var r = e("y1pI"),
                o = Array.prototype.splice;
            t.exports = function(t) {
                var n = this.__data__,
                    e = r(n, t);
                return !(e < 0) && (e == n.length - 1 ? n.pop() : o.call(n, e, 1), --this.size, !0)
            }
        },
        b80T: function(t, n, e) {
            var r = e("UNi/"),
                o = e("03A+"),
                i = e("Z0cm"),
                a = e("DSRE"),
                c = e("wJg7"),
                u = e("c6wG"),
                s = Object.prototype.hasOwnProperty;
            t.exports = function(t, n) {
                var e = i(t),
                    f = !e && o(t),
                    l = !e && !f && a(t),
                    p = !e && !f && !l && u(t),
                    d = e || f || l || p,
                    v = d ? r(t.length, String) : [],
                    h = v.length;
                for (var y in t) !n && !s.call(t, y) || d && ("length" == y || l && ("offset" == y || "parent" == y) || p && ("buffer" == y || "byteLength" == y || "byteOffset" == y) || c(y, h)) || v.push(y);
                return v
            }
        },
        c6wG: function(t, n, e) {
            var r = e("dD9F"),
                o = e("sEf8"),
                i = e("mdPL"),
                a = i && i.isTypedArray,
                c = a ? o(a) : r;
            t.exports = c
        },
        cvCv: function(t, n) {
            t.exports = function(t) {
                return function() {
                    return t
                }
            }
        },
        d8FT: function(t, n, e) {
            var r = e("eUgh"),
                o = e("ut/Y"),
                i = e("idmN"),
                a = e("G6z8");
            t.exports = function(t, n) {
                if (null == t) return {};
                var e = r(a(t), function(t) {
                    return [t]
                });
                return n = o(n), i(t, e, function(t, e) {
                    return n(t, e[0])
                })
            }
        },
        dD9F: function(t, n, e) {
            var r = e("NykK"),
                o = e("shjB"),
                i = e("ExA7"),
                a = {};
            a["[object Float32Array]"] = a["[object Float64Array]"] = a["[object Int8Array]"] = a["[object Int16Array]"] = a["[object Int32Array]"] = a["[object Uint8Array]"] = a["[object Uint8ClampedArray]"] = a["[object Uint16Array]"] = a["[object Uint32Array]"] = !0, a["[object Arguments]"] = a["[object Array]"] = a["[object ArrayBuffer]"] = a["[object Boolean]"] = a["[object DataView]"] = a["[object Date]"] = a["[object Error]"] = a["[object Function]"] = a["[object Map]"] = a["[object Number]"] = a["[object Object]"] = a["[object RegExp]"] = a["[object Set]"] = a["[object String]"] = a["[object WeakMap]"] = !1, t.exports = function(t) {
                return i(t) && o(t.length) && !!a[r(t)]
            }
        },
        dt0z: function(t, n, e) {
            var r = e("zoYe");
            t.exports = function(t) {
                return null == t ? "" : r(t)
            }
        },
        e4Nc: function(t, n, e) {
            var r = e("fGT3"),
                o = e("k+1r"),
                i = e("JHgL"),
                a = e("pSRY"),
                c = e("H8j4");

            function u(t) {
                var n = -1,
                    e = null == t ? 0 : t.length;
                for (this.clear(); ++n < e;) {
                    var r = t[n];
                    this.set(r[0], r[1])
                }
            }
            u.prototype.clear = r, u.prototype.delete = o, u.prototype.get = i, u.prototype.has = a, u.prototype.set = c, t.exports = u
        },
        e5cp: function(t, n, e) {
            var r = e("fmRc"),
                o = e("or5M"),
                i = e("HDyB"),
                a = e("seXi"),
                c = e("QqLw"),
                u = e("Z0cm"),
                s = e("DSRE"),
                f = e("c6wG"),
                l = 1,
                p = "[object Arguments]",
                d = "[object Array]",
                v = "[object Object]",
                h = Object.prototype.hasOwnProperty;
            t.exports = function(t, n, e, y, g, m) {
                var b = u(t),
                    w = u(n),
                    O = b ? d : c(t),
                    x = w ? d : c(n),
                    _ = (O = O == p ? v : O) == v,
                    E = (x = x == p ? v : x) == v,
                    j = O == x;
                if (j && s(t)) {
                    if (!s(n)) return !1;
                    b = !0, _ = !1
                }
                if (j && !_) return m || (m = new r), b || f(t) ? o(t, n, e, y, g, m) : i(t, n, O, e, y, g, m);
                if (!(e & l)) {
                    var C = _ && h.call(t, "__wrapped__"),
                        S = E && h.call(n, "__wrapped__");
                    if (C || S) {
                        var k = C ? t.value() : t,
                            T = S ? n.value() : n;
                        return m || (m = new r), g(k, T, e, y, m)
                    }
                }
                return !!j && (m || (m = new r), a(t, n, e, y, g, m))
            }
        },
        eUgh: function(t, n) {
            t.exports = function(t, n) {
                for (var e = -1, r = null == t ? 0 : t.length, o = Array(r); ++e < r;) o[e] = n(t[e], e, t);
                return o
            }
        },
        ebwN: function(t, n, e) {
            var r = e("Cwc5")(e("Kz5y"), "Map");
            t.exports = r
        },
        ekgI: function(t, n, e) {
            var r = e("YESw"),
                o = Object.prototype.hasOwnProperty;
            t.exports = function(t) {
                var n = this.__data__;
                return r ? void 0 !== n[t] : o.call(n, t)
            }
        },
        fGT3: function(t, n, e) {
            var r = e("4kuk"),
                o = e("Xi7e"),
                i = e("ebwN");
            t.exports = function() {
                this.size = 0, this.__data__ = {
                    hash: new r,
                    map: new(i || o),
                    string: new r
                }
            }
        },
        "fR/l": function(t, n, e) {
            var r = e("CH3K"),
                o = e("Z0cm");
            t.exports = function(t, n, e) {
                var i = n(t);
                return o(t) ? i : r(i, e(t))
            }
        },
        fmRc: function(t, n, e) {
            var r = e("Xi7e"),
                o = e("77Zs"),
                i = e("L8xA"),
                a = e("gCq4"),
                c = e("VaNO"),
                u = e("0Cz8");

            function s(t) {
                var n = this.__data__ = new r(t);
                this.size = n.size
            }
            s.prototype.clear = o, s.prototype.delete = i, s.prototype.get = a, s.prototype.has = c, s.prototype.set = u, t.exports = s
        },
        ftKO: function(t, n) {
            var e = "__lodash_hash_undefined__";
            t.exports = function(t) {
                return this.__data__.set(t, e), this
            }
        },
        gCq4: function(t, n) {
            t.exports = function(t) {
                return this.__data__.get(t)
            }
        },
        heNW: function(t, n) {
            t.exports = function(t, n, e) {
                switch (e.length) {
                    case 0:
                        return t.call(n);
                    case 1:
                        return t.call(n, e[0]);
                    case 2:
                        return t.call(n, e[0], e[1]);
                    case 3:
                        return t.call(n, e[0], e[1], e[2])
                }
                return t.apply(n, e)
            }
        },
        hgQt: function(t, n, e) {
            var r = e("Juji"),
                o = e("4sDh");
            t.exports = function(t, n) {
                return null != t && o(t, n, r)
            }
        },
        hypo: function(t, n, e) {
            var r = e("O0oS");
            t.exports = function(t, n, e) {
                "__proto__" == n && r ? r(t, n, {
                    configurable: !0,
                    enumerable: !0,
                    value: e,
                    writable: !0
                }) : t[n] = e
            }
        },
        idmN: function(t, n, e) {
            var r = e("ZWtO"),
                o = e("FZoo"),
                i = e("4uTw");
            t.exports = function(t, n, e) {
                for (var a = -1, c = n.length, u = {}; ++a < c;) {
                    var s = n[a],
                        f = r(t, s);
                    e(f, s) && o(u, i(s, t), f)
                }
                return u
            }
        },
        "jbM+": function(t, n, e) {
            var r = e("R/W3");
            t.exports = function(t, n) {
                return !(null == t || !t.length) && r(t, n, 0) > -1
            }
        },
        "k+1r": function(t, n, e) {
            var r = e("QkVE");
            t.exports = function(t) {
                var n = r(this, t).delete(t);
                return this.size -= n ? 1 : 0, n
            }
        },
        kekF: function(t, n) {
            t.exports = function(t, n) {
                return function(e) {
                    return t(n(e))
                }
            }
        },
        lSCD: function(t, n, e) {
            var r = e("NykK"),
                o = e("GoyQ"),
                i = "[object AsyncFunction]",
                a = "[object Function]",
                c = "[object GeneratorFunction]",
                u = "[object Proxy]";
            t.exports = function(t) {
                if (!o(t)) return !1;
                var n = r(t);
                return n == a || n == c || n == i || n == u
            }
        },
        ljhN: function(t, n) {
            t.exports = function(t, n) {
                return t === n || t !== t && n !== n
            }
        },
        "lm/5": function(t, n, e) {
            var r = e("fmRc"),
                o = e("wF/u"),
                i = 1,
                a = 2;
            t.exports = function(t, n, e, c) {
                var u = e.length,
                    s = u,
                    f = !c;
                if (null == t) return !s;
                for (t = Object(t); u--;) {
                    var l = e[u];
                    if (f && l[2] ? l[1] !== t[l[0]] : !(l[0] in t)) return !1
                }
                for (; ++u < s;) {
                    var p = (l = e[u])[0],
                        d = t[p],
                        v = l[1];
                    if (f && l[2]) {
                        if (void 0 === d && !(p in t)) return !1
                    } else {
                        var h = new r;
                        if (c) var y = c(d, v, p, t, n, h);
                        if (!(void 0 === y ? o(v, d, i | a, c, h) : y)) return !1
                    }
                }
                return !0
            }
        },
        ls82: function(t, n) {
            ! function(n) {
                "use strict";
                var e, r = Object.prototype,
                    o = r.hasOwnProperty,
                    i = "function" === typeof Symbol ? Symbol : {},
                    a = i.iterator || "@@iterator",
                    c = i.asyncIterator || "@@asyncIterator",
                    u = i.toStringTag || "@@toStringTag",
                    s = "object" === typeof t,
                    f = n.regeneratorRuntime;
                if (f) s && (t.exports = f);
                else {
                    (f = n.regeneratorRuntime = s ? t.exports : {}).wrap = w;
                    var l = "suspendedStart",
                        p = "suspendedYield",
                        d = "executing",
                        v = "completed",
                        h = {},
                        y = {};
                    y[a] = function() {
                        return this
                    };
                    var g = Object.getPrototypeOf,
                        m = g && g(g(P([])));
                    m && m !== r && o.call(m, a) && (y = m);
                    var b = E.prototype = x.prototype = Object.create(y);
                    _.prototype = b.constructor = E, E.constructor = _, E[u] = _.displayName = "GeneratorFunction", f.isGeneratorFunction = function(t) {
                        var n = "function" === typeof t && t.constructor;
                        return !!n && (n === _ || "GeneratorFunction" === (n.displayName || n.name))
                    }, f.mark = function(t) {
                        return Object.setPrototypeOf ? Object.setPrototypeOf(t, E) : (t.__proto__ = E, u in t || (t[u] = "GeneratorFunction")), t.prototype = Object.create(b), t
                    }, f.awrap = function(t) {
                        return {
                            __await: t
                        }
                    }, j(C.prototype), C.prototype[c] = function() {
                        return this
                    }, f.AsyncIterator = C, f.async = function(t, n, e, r) {
                        var o = new C(w(t, n, e, r));
                        return f.isGeneratorFunction(n) ? o : o.next().then(function(t) {
                            return t.done ? t.value : o.next()
                        })
                    }, j(b), b[u] = "Generator", b[a] = function() {
                        return this
                    }, b.toString = function() {
                        return "[object Generator]"
                    }, f.keys = function(t) {
                        var n = [];
                        for (var e in t) n.push(e);
                        return n.reverse(),
                            function e() {
                                for (; n.length;) {
                                    var r = n.pop();
                                    if (r in t) return e.value = r, e.done = !1, e
                                }
                                return e.done = !0, e
                            }
                    }, f.values = P, L.prototype = {
                        constructor: L,
                        reset: function(t) {
                            if (this.prev = 0, this.next = 0, this.sent = this._sent = e, this.done = !1, this.delegate = null, this.method = "next", this.arg = e, this.tryEntries.forEach(T), !t)
                                for (var n in this) "t" === n.charAt(0) && o.call(this, n) && !isNaN(+n.slice(1)) && (this[n] = e)
                        },
                        stop: function() {
                            this.done = !0;
                            var t = this.tryEntries[0].completion;
                            if ("throw" === t.type) throw t.arg;
                            return this.rval
                        },
                        dispatchException: function(t) {
                            if (this.done) throw t;
                            var n = this;

                            function r(r, o) {
                                return c.type = "throw", c.arg = t, n.next = r, o && (n.method = "next", n.arg = e), !!o
                            }
                            for (var i = this.tryEntries.length - 1; i >= 0; --i) {
                                var a = this.tryEntries[i],
                                    c = a.completion;
                                if ("root" === a.tryLoc) return r("end");
                                if (a.tryLoc <= this.prev) {
                                    var u = o.call(a, "catchLoc"),
                                        s = o.call(a, "finallyLoc");
                                    if (u && s) {
                                        if (this.prev < a.catchLoc) return r(a.catchLoc, !0);
                                        if (this.prev < a.finallyLoc) return r(a.finallyLoc)
                                    } else if (u) {
                                        if (this.prev < a.catchLoc) return r(a.catchLoc, !0)
                                    } else {
                                        if (!s) throw new Error("try statement without catch or finally");
                                        if (this.prev < a.finallyLoc) return r(a.finallyLoc)
                                    }
                                }
                            }
                        },
                        abrupt: function(t, n) {
                            for (var e = this.tryEntries.length - 1; e >= 0; --e) {
                                var r = this.tryEntries[e];
                                if (r.tryLoc <= this.prev && o.call(r, "finallyLoc") && this.prev < r.finallyLoc) {
                                    var i = r;
                                    break
                                }
                            }
                            i && ("break" === t || "continue" === t) && i.tryLoc <= n && n <= i.finallyLoc && (i = null);
                            var a = i ? i.completion : {};
                            return a.type = t, a.arg = n, i ? (this.method = "next", this.next = i.finallyLoc, h) : this.complete(a)
                        },
                        complete: function(t, n) {
                            if ("throw" === t.type) throw t.arg;
                            return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && n && (this.next = n), h
                        },
                        finish: function(t) {
                            for (var n = this.tryEntries.length - 1; n >= 0; --n) {
                                var e = this.tryEntries[n];
                                if (e.finallyLoc === t) return this.complete(e.completion, e.afterLoc), T(e), h
                            }
                        },
                        catch: function(t) {
                            for (var n = this.tryEntries.length - 1; n >= 0; --n) {
                                var e = this.tryEntries[n];
                                if (e.tryLoc === t) {
                                    var r = e.completion;
                                    if ("throw" === r.type) {
                                        var o = r.arg;
                                        T(e)
                                    }
                                    return o
                                }
                            }
                            throw new Error("illegal catch attempt")
                        },
                        delegateYield: function(t, n, r) {
                            return this.delegate = {
                                iterator: P(t),
                                resultName: n,
                                nextLoc: r
                            }, "next" === this.method && (this.arg = e), h
                        }
                    }
                }

                function w(t, n, e, r) {
                    var o = n && n.prototype instanceof x ? n : x,
                        i = Object.create(o.prototype),
                        a = new L(r || []);
                    return i._invoke = function(t, n, e) {
                        var r = l;
                        return function(o, i) {
                            if (r === d) throw new Error("Generator is already running");
                            if (r === v) {
                                if ("throw" === o) throw i;
                                return I()
                            }
                            for (e.method = o, e.arg = i;;) {
                                var a = e.delegate;
                                if (a) {
                                    var c = S(a, e);
                                    if (c) {
                                        if (c === h) continue;
                                        return c
                                    }
                                }
                                if ("next" === e.method) e.sent = e._sent = e.arg;
                                else if ("throw" === e.method) {
                                    if (r === l) throw r = v, e.arg;
                                    e.dispatchException(e.arg)
                                } else "return" === e.method && e.abrupt("return", e.arg);
                                r = d;
                                var u = O(t, n, e);
                                if ("normal" === u.type) {
                                    if (r = e.done ? v : p, u.arg === h) continue;
                                    return {
                                        value: u.arg,
                                        done: e.done
                                    }
                                }
                                "throw" === u.type && (r = v, e.method = "throw", e.arg = u.arg)
                            }
                        }
                    }(t, e, a), i
                }

                function O(t, n, e) {
                    try {
                        return {
                            type: "normal",
                            arg: t.call(n, e)
                        }
                    } catch (t) {
                        return {
                            type: "throw",
                            arg: t
                        }
                    }
                }

                function x() {}

                function _() {}

                function E() {}

                function j(t) {
                    ["next", "throw", "return"].forEach(function(n) {
                        t[n] = function(t) {
                            return this._invoke(n, t)
                        }
                    })
                }

                function C(t) {
                    var n;
                    this._invoke = function(e, r) {
                        function i() {
                            return new Promise(function(n, i) {
                                ! function n(e, r, i, a) {
                                    var c = O(t[e], t, r);
                                    if ("throw" !== c.type) {
                                        var u = c.arg,
                                            s = u.value;
                                        return s && "object" === typeof s && o.call(s, "__await") ? Promise.resolve(s.__await).then(function(t) {
                                            n("next", t, i, a)
                                        }, function(t) {
                                            n("throw", t, i, a)
                                        }) : Promise.resolve(s).then(function(t) {
                                            u.value = t, i(u)
                                        }, a)
                                    }
                                    a(c.arg)
                                }(e, r, n, i)
                            })
                        }
                        return n = n ? n.then(i, i) : i()
                    }
                }

                function S(t, n) {
                    var r = t.iterator[n.method];
                    if (r === e) {
                        if (n.delegate = null, "throw" === n.method) {
                            if (t.iterator.return && (n.method = "return", n.arg = e, S(t, n), "throw" === n.method)) return h;
                            n.method = "throw", n.arg = new TypeError("The iterator does not provide a 'throw' method")
                        }
                        return h
                    }
                    var o = O(r, t.iterator, n.arg);
                    if ("throw" === o.type) return n.method = "throw", n.arg = o.arg, n.delegate = null, h;
                    var i = o.arg;
                    return i ? i.done ? (n[t.resultName] = i.value, n.next = t.nextLoc, "return" !== n.method && (n.method = "next", n.arg = e), n.delegate = null, h) : i : (n.method = "throw", n.arg = new TypeError("iterator result is not an object"), n.delegate = null, h)
                }

                function k(t) {
                    var n = {
                        tryLoc: t[0]
                    };
                    1 in t && (n.catchLoc = t[1]), 2 in t && (n.finallyLoc = t[2], n.afterLoc = t[3]), this.tryEntries.push(n)
                }

                function T(t) {
                    var n = t.completion || {};
                    n.type = "normal", delete n.arg, t.completion = n
                }

                function L(t) {
                    this.tryEntries = [{
                        tryLoc: "root"
                    }], t.forEach(k, this), this.reset(!0)
                }

                function P(t) {
                    if (t) {
                        var n = t[a];
                        if (n) return n.call(t);
                        if ("function" === typeof t.next) return t;
                        if (!isNaN(t.length)) {
                            var r = -1,
                                i = function n() {
                                    for (; ++r < t.length;)
                                        if (o.call(t, r)) return n.value = t[r], n.done = !1, n;
                                    return n.value = e, n.done = !0, n
                                };
                            return i.next = i
                        }
                    }
                    return {
                        next: I
                    }
                }

                function I() {
                    return {
                        value: e,
                        done: !0
                    }
                }
            }(function() {
                return this
            }() || Function("return this")())
        },
        lvO4: function(t, n) {
            var e = Object.prototype.hasOwnProperty;
            t.exports = function(t, n) {
                return null != t && e.call(t, n)
            }
        },
        mTTR: function(t, n, e) {
            var r = e("b80T"),
                o = e("QcOe"),
                i = e("MMmD");
            t.exports = function(t) {
                return i(t) ? r(t, !0) : o(t)
            }
        },
        mZ2I: function(t, n, e) {
            "use strict";
            e.d(n, "c", function() {
                return p
            }), e.d(n, "d", function() {
                return d
            }), e.d(n, "l", function() {
                return g
            }), e.d(n, "a", function() {
                return _
            }), e.d(n, "k", function() {
                return E
            }), e.d(n, "m", function() {
                return j
            }), e.d(n, "g", function() {
                return C
            }), e.d(n, "h", function() {
                return k
            }), e.d(n, "e", function() {
                return T
            }), e.d(n, "i", function() {
                return L
            }), e.d(n, "j", function() {
                return P
            }), e.d(n, "n", function() {
                return I
            }), e.d(n, "f", function() {
                return A
            });
            e("ioFf"), e("VRzm"), e("xfY5"), e("SRfc"), e("OG14"), e("pIFo"), e("Oyvg"), e("rGqo"), e("yt8O"), e("Btvt"), e("RW0V");
            var r = e("EVdn"),
                o = e.n(r),
                i = e("r2Ta"),
                a = e("B07Q");

            function c(t, n, e) {
                return n in t ? Object.defineProperty(t, n, {
                    value: e,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : t[n] = e, t
            }
            var u = !1,
                s = !1,
                f = !1,
                l = {},
                p = function() {
                    return i.a.chapter && Object.keys(i.a.chapter).length > 0 ? {
                        id: i.a.chapter_id ? i.a.chapter_id : "",
                        number: i.a.chapter.number ? i.a.chapter.number : "",
                        title: i.a.chapter.title ? i.a.chapter.title : ""
                    } : {}
                },
                d = function(t, n) {
                    if (null != t) {
                        var e = {
                                "postRoll-v1": {
                                    raw: t,
                                    rewatch: !0
                                }
                            },
                            r = o.a.extend(!0, {}, n);
                        return o.a.extend(r.plugin, e), r
                    }
                    return n
                },
                v = function() {
                    var t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                    u = t
                },
                h = function() {
                    return !0 === u
                },
                y = function() {
                    var t = document.createElement("script"),
                        n = document.getElementsByTagName("head")[0];
                    t.async = !0, t.src = "//fast.wistia.com/assets/external/E-v1.js", n.appendChild(t)
                },
                g = function() {
                    return !h() && (y(), v(), !0)
                },
                m = function() {
                    var t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                    s = t
                },
                b = function() {
                    return null != window.bc || !0 === s
                },
                w = function() {
                    var t = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0];
                    f = t
                },
                O = function() {
                    return !0 === f
                },
                x = function() {
                    w();
                    var t = document.createElement("script"),
                        n = document.getElementsByTagName("head")[0];
                    t.async = !0, t.src = "//players.brightcove.net/5344802162001/1cMNiwC9oQ_default/index.min.js", n.appendChild(t), t.onload = function() {
                        m(), l.successCallbacks.forEach(function(t) {
                            return t()
                        })
                    }, t.onerror = function() {
                        l.errorCallbacks.forEach(function(t) {
                            return t()
                        })
                    }
                },
                _ = function(t, n) {
                    l.successCallbacks = l.successCallbacks || [], l.errorCallbacks = l.errorCallbacks || [], b() ? t() : (t && l.successCallbacks.push(t), n && l.errorCallbacks.push(n), O() || x())
                },
                E = function() {
                    o.a.ajaxPrefilter(function(t, n, e) {
                        "/" === t.url[0] && e.setRequestHeader("X-CSRF-Token", o()('meta[name="csrf-token"]').attr("content"))
                    })
                },
                j = function(t) {
                    var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                        e = o.a.extend({}, {
                            topOffset: 20,
                            duration: 500
                        }, n);
                    o()("html, body").animate({
                        scrollTop: t.offset().top - e.topOffset
                    }, e.duration)
                },
                C = function(t, n) {
                    return i.a.controllerName === t && i.a.controllerAction === n
                },
                S = function() {
                    return window.location.search
                },
                k = function(t, n) {
                    var e = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 100,
                        r = Number(new Date) + (n || 2e3);
                    return new Promise(function n(o, i) {
                        var a = t();
                        a ? o(a) : Number(new Date) < r ? setTimeout(n, e, o, i) : i(new Error("timed out for ".concat(t, ": ").concat(e)))
                    })
                },
                T = function() {
                    return null != i.a.user && Object.keys(i.a.user).length > 0
                },
                L = function(t) {
                    var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0,
                        e = parseInt(n, 10);
                    e > 0 ? setTimeout(function() {
                        window.location.href = t
                    }, e) : window.location.href = t
                },
                P = function(t) {
                    var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
                    window.gon.serverEventsEnabled && o.a.post("/api/v1/analytics/log_event", {
                        event: {
                            name: t,
                            properties: n
                        }
                    })
                },
                I = function(t) {
                    i.a.minuteTrackingEnabled && Object(a.e)(a.a.EventTypes.VIDEO_CONTENT_WATCHED, function(t) {
                        for (var n = 1; n < arguments.length; n++) {
                            var e = null != arguments[n] ? arguments[n] : {},
                                r = Object.keys(e);
                            "function" === typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(e).filter(function(t) {
                                return Object.getOwnPropertyDescriptor(e, t).enumerable
                            }))), r.forEach(function(n) {
                                c(t, n, e[n])
                            })
                        }
                        return t
                    }({}, t, {
                        platform: "web"
                    }), {
                        integrations: {
                            All: !1
                        }
                    })
                },
                A = function(t) {
                    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(t)
                };
            n.b = {
                getCurrentChapter: p,
                getWistiaOptions: d,
                setWistiaSource: g,
                wistiaSourceIsSet: h,
                setWistiaSourceLoaded: v,
                createWistiaSourceEl: y,
                brightcoveSourceIsRequested: O,
                brightcoveSourceIsLoaded: b,
                createBrightcovePlayer: _,
                createBrightcoveSourceEl: x,
                requestBrightcoveSource: w,
                setBrightcoveSourceLoaded: m,
                setCSRFToken: E,
                smoothScroll: j,
                urlParamValue: function(t) {
                    var n = window.location.href,
                        e = new RegExp("[?&]".concat(t, "=([^&#]*)"), "i").exec(n);
                    return e ? e[1] : null
                },
                getUrlSearchString: S,
                escapeHtml: function(t) {
                    return t.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;")
                },
                onPage: C,
                getDocumentCookie: function() {
                    return document.cookie
                },
                getValueFromCookie: function(t) {
                    var n = document.cookie.match("(^|;) ?".concat(t, "=([^;]*)(;|$)"));
                    return n ? n[2] : null
                },
                poll: k,
                disableScrolling: function() {
                    o()("html, body").css({
                        overflow: "hidden",
                        height: "100%"
                    })
                },
                enableScrolling: function() {
                    o()("html, body").css({
                        overflow: "auto",
                        height: "auto"
                    })
                },
                isLoggedIn: T,
                onShowEnrolledPage: function() {
                    return C("courses", "show_enrolled")
                },
                hasParam: function(t) {
                    return S().indexOf(t) > -1
                },
                redirectWithOptionalDelay: L,
                sendAnalyticsEvent: P,
                grabOgContent: function(t) {
                    var n = (arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "og:") + t;
                    return o()("meta[property='".concat(n, "']")).attr("content")
                },
                isValidEmail: A
            }
        },
        mdPL: function(t, n, e) {
            (function(t) {
                var r = e("WFqU"),
                    o = n && !n.nodeType && n,
                    i = o && "object" == typeof t && t && !t.nodeType && t,
                    a = i && i.exports === o && r.process,
                    c = function() {
                        try {
                            var t = i && i.require && i.require("util").types;
                            return t || a && a.binding && a.binding("util")
                        } catch (t) {}
                    }();
                t.exports = c
            }).call(this, e("YuTi")(t))
        },
        mwIZ: function(t, n, e) {
            var r = e("ZWtO");
            t.exports = function(t, n, e) {
                var o = null == t ? void 0 : r(t, n);
                return void 0 === o ? e : o
            }
        },
        nmnc: function(t, n, e) {
            var r = e("Kz5y").Symbol;
            t.exports = r
        },
        "oCl/": function(t, n, e) {
            var r = e("CH3K"),
                o = e("LcsW"),
                i = e("MvSz"),
                a = e("0ycA"),
                c = Object.getOwnPropertySymbols ? function(t) {
                    for (var n = []; t;) r(n, i(t)), t = o(t);
                    return n
                } : a;
            t.exports = c
        },
        or5M: function(t, n, e) {
            var r = e("1hJj"),
                o = e("QoRX"),
                i = e("xYSL"),
                a = 1,
                c = 2;
            t.exports = function(t, n, e, u, s, f) {
                var l = e & a,
                    p = t.length,
                    d = n.length;
                if (p != d && !(l && d > p)) return !1;
                var v = f.get(t);
                if (v && f.get(n)) return v == n;
                var h = -1,
                    y = !0,
                    g = e & c ? new r : void 0;
                for (f.set(t, n), f.set(n, t); ++h < p;) {
                    var m = t[h],
                        b = n[h];
                    if (u) var w = l ? u(b, m, h, n, t, f) : u(m, b, h, t, n, f);
                    if (void 0 !== w) {
                        if (w) continue;
                        y = !1;
                        break
                    }
                    if (g) {
                        if (!o(n, function(t, n) {
                                if (!i(g, n) && (m === t || s(m, t, e, u, f))) return g.push(n)
                            })) {
                            y = !1;
                            break
                        }
                    } else if (m !== b && !s(m, b, e, u, f)) {
                        y = !1;
                        break
                    }
                }
                return f.delete(t), f.delete(n), y
            }
        },
        p46w: function(t, n, e) {
            var r, o;
            ! function(i) {
                if (void 0 === (o = "function" === typeof(r = i) ? r.call(n, e, n, t) : r) || (t.exports = o), !0, t.exports = i(), !!0) {
                    var a = window.Cookies,
                        c = window.Cookies = i();
                    c.noConflict = function() {
                        return window.Cookies = a, c
                    }
                }
            }(function() {
                function t() {
                    for (var t = 0, n = {}; t < arguments.length; t++) {
                        var e = arguments[t];
                        for (var r in e) n[r] = e[r]
                    }
                    return n
                }
                return function n(e) {
                    function r(n, o, i) {
                        var a;
                        if ("undefined" !== typeof document) {
                            if (arguments.length > 1) {
                                if ("number" === typeof(i = t({
                                        path: "/"
                                    }, r.defaults, i)).expires) {
                                    var c = new Date;
                                    c.setMilliseconds(c.getMilliseconds() + 864e5 * i.expires), i.expires = c
                                }
                                i.expires = i.expires ? i.expires.toUTCString() : "";
                                try {
                                    a = JSON.stringify(o), /^[\{\[]/.test(a) && (o = a)
                                } catch (t) {}
                                o = e.write ? e.write(o, n) : encodeURIComponent(String(o)).replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), n = (n = (n = encodeURIComponent(String(n))).replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent)).replace(/[\(\)]/g, escape);
                                var u = "";
                                for (var s in i) i[s] && (u += "; " + s, !0 !== i[s] && (u += "=" + i[s]));
                                return document.cookie = n + "=" + o + u
                            }
                            n || (a = {});
                            for (var f = document.cookie ? document.cookie.split("; ") : [], l = /(%[0-9A-Z]{2})+/g, p = 0; p < f.length; p++) {
                                var d = f[p].split("="),
                                    v = d.slice(1).join("=");
                                this.json || '"' !== v.charAt(0) || (v = v.slice(1, -1));
                                try {
                                    var h = d[0].replace(l, decodeURIComponent);
                                    if (v = e.read ? e.read(v, h) : e(v, h) || v.replace(l, decodeURIComponent), this.json) try {
                                        v = JSON.parse(v)
                                    } catch (t) {}
                                    if (n === h) {
                                        a = v;
                                        break
                                    }
                                    n || (a[h] = v)
                                } catch (t) {}
                            }
                            return a
                        }
                    }
                    return r.set = r, r.get = function(t) {
                        return r.call(r, t)
                    }, r.getJSON = function() {
                        return r.apply({
                            json: !0
                        }, [].slice.call(arguments))
                    }, r.defaults = {}, r.remove = function(n, e) {
                        r(n, "", t(e, {
                            expires: -1
                        }))
                    }, r.withConverter = n, r
                }(function() {})
            })
        },
        pFRH: function(t, n, e) {
            var r = e("cvCv"),
                o = e("O0oS"),
                i = e("zZ0H"),
                a = o ? function(t, n) {
                    return o(t, "toString", {
                        configurable: !0,
                        enumerable: !1,
                        value: r(n),
                        writable: !0
                    })
                } : i;
            t.exports = a
        },
        pSRY: function(t, n, e) {
            var r = e("QkVE");
            t.exports = function(t) {
                return r(this, t).has(t)
            }
        },
        qZTm: function(t, n, e) {
            var r = e("fR/l"),
                o = e("MvSz"),
                i = e("7GkX");
            t.exports = function(t) {
                return r(t, i, o)
            }
        },
        r2Ta: function(t, n, e) {
            "use strict";
            e("ioFf"), e("rGqo"), e("yt8O"), e("Btvt"), e("RW0V");
            var r = e("mwIZ"),
                o = e.n(r),
                i = e("OFL0"),
                a = e.n(i);

            function c(t, n, e) {
                return n in t ? Object.defineProperty(t, n, {
                    value: e,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : t[n] = e, t
            }
            var u, s, f = function(t, n) {
                    return t ? n : "no-".concat(n)
                },
                l = (u = {}, s = document.getElementsByTagName("head")[0].dataset || {}, Object.keys(s).forEach(function(t) {
                    var n = s[t];
                    if (n.length > 0) try {
                        u[t] = JSON.parse(n)
                    } catch (e) {
                        u[t] = n
                    }
                }), u);
            ! function(t) {
                document.documentElement.classList.add(f(!1, "ie9"), f(t.browserMobile, "mobile-device"), f(t.browserTablet, "tablet"), f(t.browserIe, "ie"), f(t.browserIe11, "ie11"))
            }(l), window.gon = l, n.a = function(t) {
                for (var n = 1; n < arguments.length; n++) {
                    var e = null != arguments[n] ? arguments[n] : {},
                        r = Object.keys(e);
                    "function" === typeof Object.getOwnPropertySymbols && (r = r.concat(Object.getOwnPropertySymbols(e).filter(function(t) {
                        return Object.getOwnPropertyDescriptor(e, t).enumerable
                    }))), r.forEach(function(n) {
                        c(t, n, e[n])
                    })
                }
                return t
            }({}, l, {
                get: function(t) {
                    return o()(l, t)
                },
                has: function(t) {
                    return a()(l, t)
                }
            })
        },
        rEGp: function(t, n) {
            t.exports = function(t) {
                var n = -1,
                    e = Array(t.size);
                return t.forEach(function(t) {
                    e[++n] = t
                }), e
            }
        },
        sEf8: function(t, n) {
            t.exports = function(t) {
                return function(n) {
                    return t(n)
                }
            }
        },
        sEfC: function(t, n, e) {
            var r = e("GoyQ"),
                o = e("QIyF"),
                i = e("tLB3"),
                a = "Expected a function",
                c = Math.max,
                u = Math.min;
            t.exports = function(t, n, e) {
                var s, f, l, p, d, v, h = 0,
                    y = !1,
                    g = !1,
                    m = !0;
                if ("function" != typeof t) throw new TypeError(a);

                function b(n) {
                    var e = s,
                        r = f;
                    return s = f = void 0, h = n, p = t.apply(r, e)
                }

                function w(t) {
                    var e = t - v;
                    return void 0 === v || e >= n || e < 0 || g && t - h >= l
                }

                function O() {
                    var t = o();
                    if (w(t)) return x(t);
                    d = setTimeout(O, function(t) {
                        var e = n - (t - v);
                        return g ? u(e, l - (t - h)) : e
                    }(t))
                }

                function x(t) {
                    return d = void 0, m && s ? b(t) : (s = f = void 0, p)
                }

                function _() {
                    var t = o(),
                        e = w(t);
                    if (s = arguments, f = this, v = t, e) {
                        if (void 0 === d) return function(t) {
                            return h = t, d = setTimeout(O, n), y ? b(t) : p
                        }(v);
                        if (g) return d = setTimeout(O, n), b(v)
                    }
                    return void 0 === d && (d = setTimeout(O, n)), p
                }
                return n = i(n) || 0, r(e) && (y = !!e.leading, l = (g = "maxWait" in e) ? c(i(e.maxWait) || 0, n) : l, m = "trailing" in e ? !!e.trailing : m), _.cancel = function() {
                    void 0 !== d && clearTimeout(d), h = 0, s = v = f = d = void 0
                }, _.flush = function() {
                    return void 0 === d ? p : x(o())
                }, _
            }
        },
        seXi: function(t, n, e) {
            var r = e("qZTm"),
                o = 1,
                i = Object.prototype.hasOwnProperty;
            t.exports = function(t, n, e, a, c, u) {
                var s = e & o,
                    f = r(t),
                    l = f.length;
                if (l != r(n).length && !s) return !1;
                for (var p = l; p--;) {
                    var d = f[p];
                    if (!(s ? d in n : i.call(n, d))) return !1
                }
                var v = u.get(t);
                if (v && u.get(n)) return v == n;
                var h = !0;
                u.set(t, n), u.set(n, t);
                for (var y = s; ++p < l;) {
                    var g = t[d = f[p]],
                        m = n[d];
                    if (a) var b = s ? a(m, g, d, n, t, u) : a(g, m, d, t, n, u);
                    if (!(void 0 === b ? g === m || c(g, m, e, a, u) : b)) {
                        h = !1;
                        break
                    }
                    y || (y = "constructor" == d)
                }
                if (h && !y) {
                    var w = t.constructor,
                        O = n.constructor;
                    w != O && "constructor" in t && "constructor" in n && !("function" == typeof w && w instanceof w && "function" == typeof O && O instanceof O) && (h = !1)
                }
                return u.delete(t), u.delete(n), h
            }
        },
        shjB: function(t, n) {
            var e = 9007199254740991;
            t.exports = function(t) {
                return "number" == typeof t && t > -1 && t % 1 == 0 && t <= e
            }
        },
        tLB3: function(t, n, e) {
            var r = e("GoyQ"),
                o = e("/9aa"),
                i = NaN,
                a = /^\s+|\s+$/g,
                c = /^[-+]0x[0-9a-f]+$/i,
                u = /^0b[01]+$/i,
                s = /^0o[0-7]+$/i,
                f = parseInt;
            t.exports = function(t) {
                if ("number" == typeof t) return t;
                if (o(t)) return i;
                if (r(t)) {
                    var n = "function" == typeof t.valueOf ? t.valueOf() : t;
                    t = r(n) ? n + "" : n
                }
                if ("string" != typeof t) return 0 === t ? t : +t;
                t = t.replace(a, "");
                var e = u.test(t);
                return e || s.test(t) ? f(t.slice(2), e ? 2 : 8) : c.test(t) ? i : +t
            }
        },
        tMB7: function(t, n, e) {
            var r = e("y1pI");
            t.exports = function(t) {
                var n = this.__data__,
                    e = r(n, t);
                return e < 0 ? void 0 : n[e][1]
            }
        },
        tadb: function(t, n, e) {
            var r = e("Cwc5")(e("Kz5y"), "DataView");
            t.exports = r
        },
        u5Qe: function(t, n, e) {
            "use strict";
            e("rE2o"), e("ioFf"), e("rGqo"), e("yt8O"), e("Btvt"), e("/8Fb");

            function r(t, n) {
                return function(t) {
                    if (Array.isArray(t)) return t
                }(t) || function(t, n) {
                    var e = [],
                        r = !0,
                        o = !1,
                        i = void 0;
                    try {
                        for (var a, c = t[Symbol.iterator](); !(r = (a = c.next()).done) && (e.push(a.value), !n || e.length !== n); r = !0);
                    } catch (t) {
                        o = !0, i = t
                    } finally {
                        try {
                            r || null == c.return || c.return()
                        } finally {
                            if (o) throw i
                        }
                    }
                    return e
                }(t, n) || function() {
                    throw new TypeError("Invalid attempt to destructure non-iterable instance")
                }()
            }
            var o = function() {},
                i = {
                    log: o,
                    error: function() {},
                    warn: function() {},
                    table: function() {}
                },
                a = function() {
                    return o.apply(void 0, arguments)
                };
            Object.entries(i).forEach(function(t) {
                var n = r(t, 2),
                    e = n[0],
                    o = n[1];
                a[e] = o
            }), n.a = a
        },
        u8Dt: function(t, n, e) {
            var r = e("YESw"),
                o = "__lodash_hash_undefined__",
                i = Object.prototype.hasOwnProperty;
            t.exports = function(t) {
                var n = this.__data__;
                if (r) {
                    var e = n[t];
                    return e === o ? void 0 : e
                }
                return i.call(n, t) ? n[t] : void 0
            }
        },
        "ut/Y": function(t, n, e) {
            var r = e("ZCpW"),
                o = e("GDhZ"),
                i = e("zZ0H"),
                a = e("Z0cm"),
                c = e("+c4W");
            t.exports = function(t) {
                return "function" == typeof t ? t : null == t ? i : "object" == typeof t ? a(t) ? o(t[0], t[1]) : r(t) : c(t)
            }
        },
        "wF/u": function(t, n, e) {
            var r = e("e5cp"),
                o = e("ExA7");
            t.exports = function t(n, e, i, a, c) {
                return n === e || (null == n || null == e || !o(n) && !o(e) ? n !== n && e !== e : r(n, e, i, a, t, c))
            }
        },
        wJg7: function(t, n) {
            var e = 9007199254740991,
                r = /^(?:0|[1-9]\d*)$/;
            t.exports = function(t, n) {
                var o = typeof t;
                return !!(n = null == n ? e : n) && ("number" == o || "symbol" != o && r.test(t)) && t > -1 && t % 1 == 0 && t < n
            }
        },
        wclG: function(t, n, e) {
            var r = e("pFRH"),
                o = e("88Gu")(r);
            t.exports = o
        },
        xDdU: function(t, n, e) {
            var r, o, i = e("4fRq"),
                a = e("I2ZF"),
                c = 0,
                u = 0;
            t.exports = function(t, n, e) {
                var s = n && e || 0,
                    f = n || [],
                    l = (t = t || {}).node || r,
                    p = void 0 !== t.clockseq ? t.clockseq : o;
                if (null == l || null == p) {
                    var d = i();
                    null == l && (l = r = [1 | d[0], d[1], d[2], d[3], d[4], d[5]]), null == p && (p = o = 16383 & (d[6] << 8 | d[7]))
                }
                var v = void 0 !== t.msecs ? t.msecs : (new Date).getTime(),
                    h = void 0 !== t.nsecs ? t.nsecs : u + 1,
                    y = v - c + (h - u) / 1e4;
                if (y < 0 && void 0 === t.clockseq && (p = p + 1 & 16383), (y < 0 || v > c) && void 0 === t.nsecs && (h = 0), h >= 1e4) throw new Error("uuid.v1(): Can't create more than 10M uuids/sec");
                c = v, u = h, o = p;
                var g = (1e4 * (268435455 & (v += 122192928e5)) + h) % 4294967296;
                f[s++] = g >>> 24 & 255, f[s++] = g >>> 16 & 255, f[s++] = g >>> 8 & 255, f[s++] = 255 & g;
                var m = v / 4294967296 * 1e4 & 268435455;
                f[s++] = m >>> 8 & 255, f[s++] = 255 & m, f[s++] = m >>> 24 & 15 | 16, f[s++] = m >>> 16 & 255, f[s++] = p >>> 8 | 128, f[s++] = 255 & p;
                for (var b = 0; b < 6; ++b) f[s + b] = l[b];
                return n || a(f)
            }
        },
        xYSL: function(t, n) {
            t.exports = function(t, n) {
                return t.has(n)
            }
        },
        y1pI: function(t, n, e) {
            var r = e("ljhN");
            t.exports = function(t, n) {
                for (var e = t.length; e--;)
                    if (r(t[e][0], n)) return e;
                return -1
            }
        },
        yGk4: function(t, n, e) {
            var r = e("Cwc5")(e("Kz5y"), "Set");
            t.exports = r
        },
        yLpj: function(t, n) {
            var e;
            e = function() {
                return this
            }();
            try {
                e = e || new Function("return this")()
            } catch (t) {
                "object" === typeof window && (e = window)
            }
            t.exports = e
        },
        zZ0H: function(t, n) {
            t.exports = function(t) {
                return t
            }
        },
        zoYe: function(t, n, e) {
            var r = e("nmnc"),
                o = e("eUgh"),
                i = e("Z0cm"),
                a = e("/9aa"),
                c = 1 / 0,
                u = r ? r.prototype : void 0,
                s = u ? u.toString : void 0;
            t.exports = function t(n) {
                if ("string" == typeof n) return n;
                if (i(n)) return o(n, t) + "";
                if (a(n)) return s ? s.call(n) : "";
                var e = n + "";
                return "0" == e && 1 / n == -c ? "-0" : e
            }
        },
        zqxM: function(t, n, e) {
            var r = e("LqpT"),
                o = e("XGnz"),
                i = e("EA7m"),
                a = e("3L66"),
                c = i(function(t, n) {
                    return a(t) ? r(t, o(n, 1, a, !0)) : []
                });
            t.exports = c
        }
    },
    [
        ["CTbs", 1, 0]
    ]
]);