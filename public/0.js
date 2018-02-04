webpackJsonp([0],{

/***/ 239:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(242)
}
var normalizeComponent = __webpack_require__(1)
/* script */
var __vue_script__ = __webpack_require__(244)
/* template */
var __vue_template__ = __webpack_require__(245)
/* template functional */
var __vue_template_functional__ = false
/* styles */
var __vue_styles__ = injectStyle
/* scopeId */
var __vue_scopeId__ = "data-v-07bb510a"
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
Component.options.__file = "resources\\assets\\client\\components\\product-item.vue"

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-07bb510a", Component.options)
  } else {
    hotAPI.reload("data-v-07bb510a", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 242:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(243);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(38)("b7ffcc78", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-07bb510a\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./product-item.vue", function() {
     var newContent = require("!!../../../../node_modules/css-loader/index.js!../../../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-07bb510a\",\"scoped\":true,\"hasInlineConfig\":true}!../../../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./product-item.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 243:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(37)(false);
// imports


// module
exports.push([module.i, "\n.img-responsive[data-v-07bb510a]{\n\tdisplay: initial;\n}\n", ""]);

// exports


/***/ }),

/***/ 244:
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


/* harmony default export */ __webpack_exports__["default"] = ({
	name: 'Product-ItemM',
	props: ['product'],
	computed: {
		warnaBackgroud: function warnaBackgroud() {
			var back = [{ background: '#4CAF50', color: '#fff' }, { background: '#C63D0F', color: '#3B3738' }, { background: '#558C89', color: '#fff' }, { background: '#A8CD1B', color: '#fff' }, { background: '#D4E157', color: '#000' }];
			return back[Math.floor(Math.random() * back.length)];
		}
	}
});

/***/ }),

/***/ 245:
/***/ (function(module, exports, __webpack_require__) {

var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "col-lg-4 col-md-4 col-sm-4 mb" }, [
    _c(
      "div",
      { staticClass: "product-panel-2 pn", style: _vm.warnaBackgroud },
      [
        _c("div", { staticClass: "badge badge-hot" }, [
          _vm._v(_vm._s(_vm.product.kategori))
        ]),
        _vm._v(" "),
        _c("img", {
          staticClass: "img-responsive",
          attrs: {
            width: "120px",
            src: _vm.product.gambar,
            alt: _vm.product.nama
          }
        }),
        _vm._v(" "),
        _c("h5", { staticClass: "mt" }, [_vm._v(_vm._s(_vm.product.nama))]),
        _vm._v(" "),
        _c("h6", [_vm._v(_vm._s(_vm.product.harga))]),
        _vm._v(" "),
        _c(
          "router-link",
          {
            staticClass: "btn btn-small btn-theme04",
            attrs: {
              to: { name: "product-detail", params: { param: _vm.product.id } }
            }
          },
          [_c("b", [_vm._v("Lihat Detail")])]
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true
module.exports = { render: render, staticRenderFns: staticRenderFns }
if (false) {
  module.hot.accept()
  if (module.hot.data) {
    require("vue-hot-reload-api")      .rerender("data-v-07bb510a", module.exports)
  }
}

/***/ })

});