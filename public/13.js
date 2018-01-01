webpackJsonp([13],{

/***/ 228:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(229)
/* template */
var __vue_template__ = __webpack_require__(230)
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
Component.options.__file = "resources\\assets\\client\\components\\client.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-380e7f64", Component.options)
  } else {
    hotAPI.reload("data-v-380e7f64", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 229:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
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
	name: 'Client',
	components: {
		'header-client': function headerClient(resolve) {
			__webpack_require__.e/* require */(15).then(function() { var __WEBPACK_AMD_REQUIRE_ARRAY__ = [__webpack_require__(231)]; (resolve.apply(null, __WEBPACK_AMD_REQUIRE_ARRAY__));}.bind(this)).catch(__webpack_require__.oe);
		},
		'footer-client': function footerClient(resolve) {
			__webpack_require__.e/* require */(16).then(function() { var __WEBPACK_AMD_REQUIRE_ARRAY__ = [__webpack_require__(235)]; (resolve.apply(null, __WEBPACK_AMD_REQUIRE_ARRAY__));}.bind(this)).catch(__webpack_require__.oe);
		}
	}
});

/***/ }),

/***/ 230:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("header-client"),
      _vm._v(" "),
      _c("section", { staticClass: "container" }, [
        _c("section", { staticClass: "wrapper site-min-height" }, [
          _c("div", { staticClass: "row mt" }, [
            _c(
              "div",
              { staticClass: "col-lg-12" },
              [_c("router-view", { key: _vm.$route.fullPath })],
              1
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c("footer-client")
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-380e7f64", module.exports)
  }
}

/***/ })

});