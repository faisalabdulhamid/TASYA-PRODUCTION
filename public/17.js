webpackJsonp([17],{

/***/ 247:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(248)
/* template */
var __vue_template__ = __webpack_require__(249)
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
Component.options.__file = "resources\\assets\\client\\components\\kategori.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {  return key !== "default" && key.substr(0, 2) !== "__"})) {  console.error("named exports are not supported in *.vue files.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-58d88dbf", Component.options)
  } else {
    hotAPI.reload("data-v-58d88dbf", Component.options)
' + '  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 248:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__config_env_config__ = __webpack_require__(234);
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
	name: 'Kategori',
	components: {
		'product-item': function productItem(resolve) {
			__webpack_require__.e/* require */(14/* duplicate */).then(function() { var __WEBPACK_AMD_REQUIRE_ARRAY__ = [__webpack_require__(238)]; (resolve.apply(null, __WEBPACK_AMD_REQUIRE_ARRAY__));}.bind(this)).catch(__webpack_require__.oe);
		}
	},
	data: function data() {
		return {
			table: {
				data: []
			}
		};
	},
	beforeMount: function beforeMount() {
		var params = _.isEmpty(this.$route.params) ? '' : '/kategori/' + this.$route.params.param;
		var self = this;
		axios.get('' + __WEBPACK_IMPORTED_MODULE_0__config_env_config__["b" /* base_url */] + params).then(function (res) {
			Vue.set(self.$data, 'table', res.data);
		}).catch(function (e) {
			console.log(e);
		});
	}
});

/***/ }),

/***/ 249:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "row" },
    _vm._l(_vm.table.data, function(item, index) {
      return _c("product-item", { key: index, attrs: { product: item } })
    })
  )
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-58d88dbf", module.exports)
  }
}

/***/ })

});