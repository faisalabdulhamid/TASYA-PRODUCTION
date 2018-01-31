webpackJsonp([3],{

/***/ 244:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(245)
/* template */
var __vue_template__ = __webpack_require__(246)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = null
/* scopeId */
var __vue_scopeId__ = null
/* moduleIdentifier (server only) */
var __vue_module_identifier__ = null
var Component = normalizeComponent(
  __vue_script__,
  __vue_template__,
  __vue_template_functional__,
  __vue_styles__,
  __vue_scopeId__,
  __vue_module_identifier__
)
Component.options.__file = "resources\\assets\\client\\components\\header.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-6c373d26", Component.options)
  } else {
    hotAPI.reload("data-v-6c373d26", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 245:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env_config__ = __webpack_require__(41);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//



/* harmony default export */ __webpack_exports__["default"] = ({
    name: 'Header',
    computed: {
        app_name: function app_name() {
            return __WEBPACK_IMPORTED_MODULE_0__config_env_config__["a" /* app_name */];
        }
    },
    data: function data() {
        return {
            kategori: []
        };
    },
    created: function created() {
        var self = this;
        axios.get(__WEBPACK_IMPORTED_MODULE_0__config_env_config__["b" /* base_url */] + '/kategori').then(function (res) {
            Vue.set(self.$data, 'kategori', res.data);
        });
    }
});

/***/ }),

/***/ 246:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "header",
    { staticClass: "header black-bg" },
    [
      _vm._m(0),
      _vm._v(" "),
      _c(
        "router-link",
        { staticClass: "logo", attrs: { to: { name: "index" } } },
        [_c("b", [_vm._v(_vm._s(_vm.app_name))])]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "nav notify-row", attrs: { id: "top_menu" } }, [
        _c("ul", { staticClass: "nav top-menu" }, [
          _c("li", { staticClass: "dropdown" }, [
            _c(
              "a",
              {
                staticClass: "dropdown-toggle",
                attrs: { "data-toggle": "dropdown", href: "/#" }
              },
              [
                _vm._v(
                  "\n                        Kategori\n                    "
                )
              ]
            ),
            _vm._v(" "),
            _c(
              "ul",
              { staticClass: "dropdown-menu extended tasks-bar" },
              [
                _c("div", { staticClass: "notify-arrow notify-arrow-green" }),
                _vm._v(" "),
                _c("li", [
                  _c("p", { staticClass: "green" }, [
                    _vm._v("Kategori " + _vm._s(_vm.kategori.length))
                  ])
                ]),
                _vm._v(" "),
                _vm._l(_vm.kategori, function(item, i) {
                  return _c(
                    "li",
                    { staticClass: "external" },
                    [
                      _c(
                        "router-link",
                        {
                          attrs: {
                            to: {
                              name: "kategori",
                              params: { param: item.url }
                            },
                            replace: ""
                          }
                        },
                        [_vm._v(_vm._s(item.nama))]
                      )
                    ],
                    1
                  )
                })
              ],
              2
            )
          ]),
          _vm._v(" "),
          _c(
            "li",
            [_c("router-link", { attrs: { to: "about" } }, [_vm._v("About")])],
            1
          )
        ])
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "sidebar-toggle-box" }, [
      _c("div", {
        staticClass: "fa fa-bars tooltips",
        attrs: {
          "data-placement": "right",
          "data-original-title": "Toggle Navigation"
        }
      })
    ])
  }
]
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-6c373d26", module.exports)
  }
}

/***/ })

});