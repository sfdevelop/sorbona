! function(e, t) {
    "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.NiceSelect = t() : e.NiceSelect = t()
}(self, (() => (() => {
    "use strict";
    var e = {
            d: (t, i) => {
                for (var s in i) e.o(i, s) && !e.o(t, s) && Object.defineProperty(t, s, {
                    enumerable: !0,
                    get: i[s]
                })
            },
            o: (e, t) => Object.prototype.hasOwnProperty.call(e, t),
            r: e => {
                "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
                    value: "Module"
                }), Object.defineProperty(e, "__esModule", {
                    value: !0
                })
            }
        },
        t = {};

    function i(e) {
        const t = new MouseEvent("click", {
            bubbles: !0,
            cancelable: !1
        });
        e.dispatchEvent(t)
    }

    function s(e) {
        const t = new Event("change", {
            bubbles: !0,
            cancelable: !1
        });
        e.dispatchEvent(t)
    }

    function o(e) {
        const t = new FocusEvent("focusin", {
            bubbles: !0,
            cancelable: !1
        });
        e.dispatchEvent(t)
    }

    function n(e) {
        const t = new FocusEvent("focusout", {
            bubbles: !0,
            cancelable: !1
        });
        e.dispatchEvent(t)
    }

    function l(e) {
        const t = new UIEvent("modalclose", {
            bubbles: !0,
            cancelable: !1
        });
        e.dispatchEvent(t)
    }

    function d(e, t) {
        "invalid" == t ? (c(this.dropdown, "invalid"), p(this.dropdown, "valid")) : (c(this.dropdown, "valid"), p(this.dropdown, "invalid"))
    }

    function r(e, t) {
        return null != e[t] ? e[t] : e.getAttribute(t)
    }

    function a(e, t) {
        return !!e && e.classList.contains(t)
    }

    function c(e, t) {
        if (e) return e.classList.add(t)
    }

    function p(e, t) {
        if (e) return e.classList.remove(t)
    }
    e.r(t), e.d(t, {
        bind: () => f,
        default: () => u
    });
    var h = {
        data: null,
        searchable: !1,
        showSelectedItems: !1
    };

    function u(e, t) {
        this.el = e, this.config = Object.assign({}, h, t || {}), this.data = this.config.data, this.selectedOptions = [], this.placeholder = r(this.el, "placeholder") || this.config.placeholder || "Select an option", this.searchtext = r(this.el, "searchtext") || this.config.searchtext || "Search", this.selectedtext = r(this.el, "selectedtext") || this.config.selectedtext || "selected", this.dropdown = null, this.multiple = r(this.el, "multiple"), this.disabled = r(this.el, "disabled"), this.create()
    }

    function f(e, t) {
        return new u(e, t)
    }
    return u.prototype.create = function() {
        this.el.style.opacity = "0", this.el.style.width = "0", this.el.style.padding = "0", this.el.style.height = "0", this.el.style.fontSize = "0", this.data ? this.processData(this.data) : this.extractData(), this.renderDropdown(), this.bindEvent()
    }, u.prototype.processData = function(e) {
        var t = [];
        e.forEach((e => {
            t.push({
                data: e,
                attributes: {
                    selected: !!e.selected,
                    disabled: !!e.disabled,
                    optgroup: "optgroup" == e.value
                }
            })
        })), this.options = t
    }, u.prototype.extractData = function() {
        var e = this.el.querySelectorAll("option,optgroup"),
            t = [],
            i = [],
            s = [];
        e.forEach((e => {
            if ("OPTGROUP" == e.tagName) var s = {
                text: e.label,
                value: "optgroup"
            };
            else {
                let t = e.innerText;
                null != e.dataset.display && (t = e.dataset.display), s = {
                    text: t,
                    value: e.value,
                    extra: e.dataset.extra,
                    selected: null != e.getAttribute("selected2"),
                    disabled: null != e.getAttribute("disabled")
                }
            }
            var o = {
                selected: null != e.getAttribute("selected"),
                disabled: null != e.getAttribute("disabled"),
                optgroup: "OPTGROUP" == e.tagName
            };
            t.push(s), i.push({
                data: s,
                attributes: o
            })
        })), this.data = t, this.options = i, this.options.forEach((e => {
            e.attributes.selected && s.push(e)
        })), this.selectedOptions = s
    }, u.prototype.renderDropdown = function() {
        var e = ["nice-select", r(this.el, "class") || "", this.disabled ? "disabled" : "", this.multiple ? "has-multiple" : ""];
        let t = '<div class="nice-select-search-box">';
        t += `<input type="text" class="nice-select-search" placeholder="${this.searchtext}..." title="search"/>`, t += "</div>";
        var i = `<div class="${e.join(" ")}" tabindex="${this.disabled?null:0}">`;
        i += `<span class="${this.multiple?"multiple-options":"current"}"></span>`, i += '<div class="nice-select-dropdown">', i += `${this.config.searchable?t:""}`, i += '<ul class="list"></ul>', i += "</div>", i += "</div>", this.el.insertAdjacentHTML("afterend", i), this.dropdown = this.el.nextElementSibling, this._renderSelectedItems(), this._renderItems()
    }, u.prototype._renderSelectedItems = function() {
        if (this.multiple) {
            var e = "";
            this.config.showSelectedItems || this.config.showSelectedItems || "auto" == window.getComputedStyle(this.dropdown).width || this.selectedOptions.length < 2 ? (this.selectedOptions.forEach((function(t) {
                e += `<span class="current">${t.data.text}</span>`
            })), e = "" == e ? this.placeholder : e) : e = this.selectedOptions.length + " " + this.selectedtext, this.dropdown.querySelector(".multiple-options").innerHTML = e
        } else {
            var t = this.selectedOptions.length > 0 ? this.selectedOptions[0].data.text : this.placeholder;
            this.dropdown.querySelector(".current").innerHTML = t
        }
    }, u.prototype._renderItems = function() {
        var e = this.dropdown.querySelector("ul");
        this.options.forEach((t => {
            e.appendChild(this._renderItem(t))
        }))
    }, u.prototype._renderItem = function(e) {
        var t = document.createElement("li");
        if (t.innerHTML = e.data.text, null != e.data.extra && t.appendChild(this._renderItemExtra(e.data.extra)), e.attributes.optgroup) c(t, "optgroup");
        else {
            t.setAttribute("data-value", e.data.value);
            var i = ["option", e.attributes.selected ? "selected" : null, e.attributes.disabled ? "disabled" : null];
            t.addEventListener("click", this._onItemClicked.bind(this, e)), t.classList.add(...i)
        }
        return e.element = t, t
    }, u.prototype._renderItemExtra = function(e) {
        var t = document.createElement("span");
        return t.innerHTML = e, c(t, "extra"), t
    }, u.prototype.update = function() {
        if (this.extractData(), this.dropdown) {
            var e = a(this.dropdown, "open");
            this.dropdown.parentNode.removeChild(this.dropdown), this.create(), e && i(this.dropdown)
        }
        r(this.el, "disabled") ? this.disable() : this.enable()
    }, u.prototype.disable = function() {
        this.disabled || (this.disabled = !0, c(this.dropdown, "disabled"))
    }, u.prototype.enable = function() {
        this.disabled && (this.disabled = !1, p(this.dropdown, "disabled"))
    }, u.prototype.clear = function() {
        this.resetSelectValue(), this.selectedOptions = [], this._renderSelectedItems(), this.update(), s(this.el)
    }, u.prototype.destroy = function() {
        this.dropdown && (this.dropdown.parentNode.removeChild(this.dropdown), this.el.style.display = "")
    }, u.prototype.bindEvent = function() {
        this.dropdown.addEventListener("click", this._onClicked.bind(this)), this.dropdown.addEventListener("keydown", this._onKeyPressed.bind(this)), this.dropdown.addEventListener("focusin", o.bind(this, this.el)), this.dropdown.addEventListener("focusout", n.bind(this, this.el)), this.el.addEventListener("invalid", d.bind(this, this.el, "invalid")), window.addEventListener("click", this._onClickedOutside.bind(this)), this.config.searchable && this._bindSearchEvent()
    }, u.prototype._bindSearchEvent = function() {
        var e = this.dropdown.querySelector(".nice-select-search");
        e && e.addEventListener("click", (function(e) {
            return e.stopPropagation(), !1
        })), e.addEventListener("input", this._onSearchChanged.bind(this))
    }, u.prototype._onClicked = function(e) {
        if (e.preventDefault(), a(this.dropdown, "open") ? this.multiple ? e.target == this.dropdown.querySelector(".multiple-options") && (p(this.dropdown, "open"), l(this.el)) : (p(this.dropdown, "open"), l(this.el)) : (c(this.dropdown, "open"), function(e) {
                const t = new UIEvent("modalopen", {
                    bubbles: !0,
                    cancelable: !1
                });
                e.dispatchEvent(t)
            }(this.el)), a(this.dropdown, "open")) {
            var t = this.dropdown.querySelector(".nice-select-search");
            t && (t.value = "", t.focus());
            var i = this.dropdown.querySelector(".focus");
            p(i, "focus"), c(i = this.dropdown.querySelector(".selected"), "focus"), this.dropdown.querySelectorAll("ul li").forEach((function(e) {
                e.style.display = ""
            }))
        } else this.dropdown.focus()
    }, u.prototype._onItemClicked = function(e, t) {
        var i = t.target;
        if (!a(i, "disabled")) {
            if (this.multiple)
                if (a(i, "selected")) {
                    p(i, "selected"), this.selectedOptions.splice(this.selectedOptions.indexOf(e), 1);
                    var s = this.el.querySelector(`option[value="${i.dataset.value}"]`);
                    s.removeAttribute("selected"), s.selected = !1
                } else c(i, "selected"), this.selectedOptions.push(e);
            else this.options.forEach((function(e) {
                p(e.element, "selected")
            })), this.selectedOptions.forEach((function(e) {
                p(e.element, "selected")
            })), c(i, "selected"), this.selectedOptions = [e];
            this._renderSelectedItems(), this.updateSelectValue()
        }
    }, u.prototype.setValue = function(e) {
        var t, i = this.el,
            s = !0;
        if (i.multiple)
            for (var o = 0; o < e.length; o++) e[o] = String(e[o]);
        for (var n of i.options) t = i.multiple ? e.indexOf(n.value) > -1 ? n.value : null : e, n.value != t || n.disabled ? (n.removeAttribute("selected"), delete n.selected) : (s && (i.value = t, s = !1), n.setAttribute("selected", !0), n.selected = !0);
        s && !i.multiple && (i.options[0].setAttribute("selected", !0), i.options[0].selected = !0, i.value = i.options[0].value), this.update()
    }, u.prototype.getValue = function() {
        var e = this.el;
        if (!e.multiple) return e.value;
        var t = [];
        for (var i of e.options) i.selected && t.push(i.value);
        return t
    }, u.prototype.updateSelectValue = function() {
        if (this.multiple) {
            var e = this.el;
            this.selectedOptions.forEach((function(t) {
                var i = e.querySelector(`option[value="${t.data.value}"]`);
                i ? i.setAttribute("selected", !0) : console.error("Option not found, does it have a value?")
            }))
        } else this.selectedOptions.length > 0 && (this.el.value = this.selectedOptions[0].data.value);
        s(this.el)
    }, u.prototype.resetSelectValue = function() {
        if (this.multiple) {
            var e = this.el;
            this.selectedOptions.forEach((function(t) {
                var i = e.querySelector(`option[value="${t.data.value}"]`);
                i && (i.removeAttribute("selected"), delete i.selected)
            }))
        } else this.selectedOptions.length > 0 && (this.el.selectedIndex = -1);
        s(this.el)
    }, u.prototype._onClickedOutside = function(e) {
        this.dropdown.contains(e.target) || (p(this.dropdown, "open"), l(this.el))
    }, u.prototype._onKeyPressed = function(e) {
        var t = this.dropdown.querySelector(".focus"),
            s = a(this.dropdown, "open");
        if (13 == e.keyCode) i(s ? t : this.dropdown);
        else if (40 == e.keyCode) {
            if (s) {
                var o = this._findNext(t);
                o && (p(this.dropdown.querySelector(".focus"), "focus"), c(o, "focus"))
            } else i(this.dropdown);
            e.preventDefault()
        } else if (38 == e.keyCode) {
            if (s) {
                var n = this._findPrev(t);
                n && (p(this.dropdown.querySelector(".focus"), "focus"), c(n, "focus"))
            } else i(this.dropdown);
            e.preventDefault()
        } else if (27 == e.keyCode && s) i(this.dropdown);
        else if (32 === e.keyCode && s) return !1;
        return !1
    }, u.prototype._findNext = function(e) {
        for (e = e ? e.nextElementSibling : this.dropdown.querySelector(".list .option"); e;) {
            if (!a(e, "disabled") && "none" != e.style.display) return e;
            e = e.nextElementSibling
        }
        return null
    }, u.prototype._findPrev = function(e) {
        for (e = e ? e.previousElementSibling : this.dropdown.querySelector(".list .option:last-child"); e;) {
            if (!a(e, "disabled") && "none" != e.style.display) return e;
            e = e.previousElementSibling
        }
        return null
    }, u.prototype._onSearchChanged = function(e) {
        var t = a(this.dropdown, "open"),
            i = e.target.value;
        if ("" == (i = i.toLowerCase())) this.options.forEach((function(e) {
            e.element.style.display = ""
        }));
        else if (t) {
            var s = new RegExp(i);
            this.options.forEach((function(e) {
                var t = e.data.text.toLowerCase(),
                    i = s.test(t);
                e.element.style.display = i ? "" : "none"
            }))
        }
        this.dropdown.querySelectorAll(".focus").forEach((function(e) {
            p(e, "focus")
        })), c(this._findNext(null), "focus")
    }, t
})()));