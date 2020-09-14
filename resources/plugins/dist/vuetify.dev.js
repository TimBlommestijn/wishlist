"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

require("material-design-icons-iconfont/dist/material-design-icons.css");

var _vue = _interopRequireDefault(require("vue"));

var _lib = _interopRequireDefault(require("vuetify/lib"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

// You still need to register Vuetify itself
// src/plugins/vuetify.js
// Ensure you are using css-loader
_vue["default"].use(_lib["default"]);

var opts = {
  icons: {
    iconfont: 'md' // 'mdi' || 'mdiSvg' || 'md' || 'fa' || 'fa4' || 'faSvg'

  },
  theme: {
    light: true
  }
};

var _default = new _lib["default"](opts);

exports["default"] = _default;