(function webpackUniversalModuleDefinition(root, factory) {
    if (typeof exports === 'object' && typeof module === 'object')
        module.exports = factory();
    else if (typeof define === 'function' && define.amd)
        define([], factory);
    else if (typeof exports === 'object')
        exports["VueMessageboxDemo"] = factory();
    else
        root["VueMessageboxDemo"] = factory();
})(this, function() {
    return /******/ (function(modules) { // webpackBootstrap
            /******/ // The module cache
            /******/
            var installedModules = {};
            /******/
            /******/ // The require function
            /******/
            function __webpack_require__(moduleId) {
                /******/
                /******/ // Check if module is in cache
                /******/
                if (installedModules[moduleId]) {
                    /******/
                    return installedModules[moduleId].exports;
                    /******/
                }
                /******/ // Create a new module (and put it into the cache)
                /******/
                var module = installedModules[moduleId] = {
                    /******/
                    i: moduleId,
                    /******/
                    l: false,
                    /******/
                    exports: {}
                    /******/
                };
                /******/
                /******/ // Execute the module function
                /******/
                modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
                /******/
                /******/ // Flag the module as loaded
                /******/
                module.l = true;
                /******/
                /******/ // Return the exports of the module
                /******/
                return module.exports;
                /******/
            }
            /******/
            /******/
            /******/ // expose the modules object (__webpack_modules__)
            /******/
            __webpack_require__.m = modules;
            /******/
            /******/ // expose the module cache
            /******/
            __webpack_require__.c = installedModules;
            /******/
            /******/ // define getter function for harmony exports
            /******/
            __webpack_require__.d = function(exports, name, getter) {
                /******/
                if (!__webpack_require__.o(exports, name)) {
                    /******/
                    Object.defineProperty(exports, name, {
                        /******/
                        configurable: false,
                        /******/
                        enumerable: true,
                        /******/
                        get: getter
                            /******/
                    });
                    /******/
                }
                /******/
            };
            /******/
            /******/ // getDefaultExport function for compatibility with non-harmony modules
            /******/
            __webpack_require__.n = function(module) {
                /******/
                var getter = module && module.__esModule ?
                    /******/
                    function getDefault() { return module['default']; } :
                    /******/
                    function getModuleExports() { return module; };
                /******/
                __webpack_require__.d(getter, 'a', getter);
                /******/
                return getter;
                /******/
            };
            /******/
            /******/ // Object.prototype.hasOwnProperty.call
            /******/
            __webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
            /******/
            /******/ // __webpack_public_path__
            /******/
            __webpack_require__.p = "";
            /******/
            /******/ // Load entry module and return exports
            /******/
            return __webpack_require__(__webpack_require__.s = 0);
            /******/
        })
        /************************************************************************/
        /******/
        ([
            /* 0 */
            /***/
            (function(module, exports, __webpack_require__) {

                "use strict";


                Object.defineProperty(exports, "__esModule", {
                    value: true
                });

                var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function(obj) { return typeof obj; } : function(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

                var _vueMessagebox = __webpack_require__(1);

                var _vueMessagebox2 = _interopRequireDefault(_vueMessagebox);

                function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

                var messagebox = {};
                messagebox.install = function(Vue, options) {
                    var opt = {
                        buttonName: ['取消', '确认'],
                        buttonColor: ['#333', '#fff'],
                        buttonBgcolor: ['#fff', '#50bfff'],
                        bgColor: '#fff',
                        cb: function cb() {}
                    };
                    for (var key in options) {
                        opt[key] = options[key];
                    }
                    var messageboxControll = Vue.extend(_vueMessagebox2.default);
                    var instance = new messageboxControll().$mount(document.createElement('div'));
                    Vue.prototype.$messagebox = function(message, option) {
                        if ((typeof option === 'undefined' ? 'undefined' : _typeof(option)) == 'object') {
                            for (var key in option) {
                                opt[key] = option[key];
                            }
                        }
                        instance.message = message;
                        instance.visible = true;
                        instance.options = opt;
                        if (opt.buttonName.length < 1) {
                            instance.message.showButton = false;
                        } else {
                            instance.message.showButton = true;
                        }
                        document.body.appendChild(instance.$el);
                    };
                    Vue.prototype.$messagebox['show'] = function(message, option) {
                        Vue.prototype.$messagebox(message, option);
                    };
                    Vue.prototype.$messagebox['cancle'] = function() {
                        instance.visible = false;
                        document.body.removeChild(instance.$el);
                    };
                    Vue.prototype.$messagebox['sure'] = function() {
                        instance.options.cb();
                        instance.visible = false;
                        document.body.removeChild(instance.$el);
                    };
                };
                if (window.Vue) {
                    Vue.use(messagebox);
                }
                exports.default = messagebox;

                /***/
            }),
            /* 1 */
            /***/
            (function(module, __webpack_exports__, __webpack_require__) {

                "use strict";
                Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
                /* harmony import */
                var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_script_index_0_vue_messagebox_vue__ = __webpack_require__(8);
                /* harmony import */
                var __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_script_index_0_vue_messagebox_vue___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_script_index_0_vue_messagebox_vue__);
                /* harmony import */
                var __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_13_0_4_vue_loader_lib_template_compiler_index_id_data_v_1908bc89_hasScoped_true_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_template_index_0_vue_messagebox_vue__ = __webpack_require__(9);
                var disposed = false

                function injectStyle(ssrContext) {
                    if (disposed) return
                    __webpack_require__(2)
                }
                var normalizeComponent = __webpack_require__(7)
                    /* script */

                /* template */

                /* styles */
                var __vue_styles__ = injectStyle
                    /* scopeId */
                var __vue_scopeId__ = "data-v-1908bc89"
                    /* moduleIdentifier (server only) */
                var __vue_module_identifier__ = null
                var Component = normalizeComponent(
                    __WEBPACK_IMPORTED_MODULE_0__babel_loader_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_script_index_0_vue_messagebox_vue___default.a,
                    __WEBPACK_IMPORTED_MODULE_1__node_modules_vue_loader_13_0_4_vue_loader_lib_template_compiler_index_id_data_v_1908bc89_hasScoped_true_node_modules_vue_loader_13_0_4_vue_loader_lib_selector_type_template_index_0_vue_messagebox_vue__["a" /* default */ ],
                    __vue_styles__,
                    __vue_scopeId__,
                    __vue_module_identifier__
                )
                Component.options.__file = "src\\lib\\vue-messagebox.vue"
                if (Component.esModule && Object.keys(Component.esModule).some(function(key) { return key !== "default" && key.substr(0, 2) !== "__" })) { console.error("named exports are not supported in *.vue files.") }
                if (Component.options.functional) { console.error("[vue-loader] vue-messagebox.vue: functional components are not supported with templates, they should use render functions.") }

                /* hot reload */
                if (false) {
                    (function() {
                        var hotAPI = require("vue-loader/node_modules/vue-hot-reload-api")
                        hotAPI.install(require("vue"), false)
                        if (!hotAPI.compatible) return
                        module.hot.accept()
                        if (!module.hot.data) {
                            hotAPI.createRecord("data-v-1908bc89", Component.options)
                        } else {
                            hotAPI.reload("data-v-1908bc89", Component.options)
                        }
                        module.hot.dispose(function(data) {
                            disposed = true
                        })
                    })()
                }

                /* harmony default export */
                __webpack_exports__["default"] = (Component.exports);


                /***/
            }),
            /* 2 */
            /***/
            (function(module, exports, __webpack_require__) {

                // style-loader: Adds some css to the DOM by adding a <style> tag

                // load the styles
                var content = __webpack_require__(3);
                if (typeof content === 'string') content = [
                    [module.i, content, '']
                ];
                // Prepare cssTransformation
                var transform;

                var options = {}
                options.transform = transform
                    // add the styles to the DOM
                var update = __webpack_require__(5)(content, options);
                if (content.locals) module.exports = content.locals;
                // Hot Module Replacement
                if (false) {
                    // When the styles change, update the <style> tags
                    if (!content.locals) {
                        module.hot.accept("!!../../node_modules/_css-loader@0.28.4@css-loader/index.js!../../node_modules/_vue-loader@13.0.4@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1908bc89\",\"scoped\":true,\"hasInlineConfig\":false}!../../node_modules/_sass-loader@6.0.6@sass-loader/lib/loader.js!../../node_modules/_vue-loader@13.0.4@vue-loader/lib/selector.js?type=styles&index=0!./vue-messagebox.vue", function() {
                            var newContent = require("!!../../node_modules/_css-loader@0.28.4@css-loader/index.js!../../node_modules/_vue-loader@13.0.4@vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-1908bc89\",\"scoped\":true,\"hasInlineConfig\":false}!../../node_modules/_sass-loader@6.0.6@sass-loader/lib/loader.js!../../node_modules/_vue-loader@13.0.4@vue-loader/lib/selector.js?type=styles&index=0!./vue-messagebox.vue");
                            if (typeof newContent === 'string') newContent = [
                                [module.id, newContent, '']
                            ];
                            update(newContent);
                        });
                    }
                    // When the module is disposed, remove the <style> tags
                    module.hot.dispose(function() { update(); });
                }

                /***/
            }),
            /* 3 */
            /***/
            (function(module, exports, __webpack_require__) {

                exports = module.exports = __webpack_require__(4)(undefined);
                // imports


                // module
                exports.push([module.i, "\n@keyframes fade-in-data-v-1908bc89 {\n0% {\n    opacity: 0;\n    transform: scale(0.7);\n}\n100% {\n    opacity: 1;\n    transform: scale(1);\n}\n}\n@keyframes fade-out-data-v-1908bc89 {\n0% {\n    opacity: 1;\n    transform: scale(1);\n}\n100% {\n    opacity: 0;\n    transform: scale(0.7);\n}\n}\n.messagebox-container[data-v-1908bc89] {\n  position: fixed;\n  left: 0;\n  top: 0;\n  bottom: 0;\n  right: 0;\n  z-index: 2000;\n  display: flex;\n  justify-content: center;\n  align-items: center;\n  background-color: rgba(0, 0, 0, 0.61);\n}\n.messagebox-container .messagebox[data-v-1908bc89] {\n    width: 400px;\n    text-align: center;\n    background: #fff;\n    border-radius: 4px;\n    color: #333;\n    padding: 20px;\n    min-height: 130px;\n}\n.messagebox-container .messagebox h2[data-v-1908bc89] {\n      font-weight: 700;\n      font-size: 18px;\n      text-align: left;\n}\n.messagebox-container .messagebox p[data-v-1908bc89], .messagebox-container .messagebox h2[data-v-1908bc89] {\n      padding: 0;\n      margin: 0;\n}\n.messagebox-container .messagebox .describe[data-v-1908bc89] {\n      text-align: left;\n      padding: 20px 0 30px;\n      font-size: 14px;\n}\n.messagebox-container .messagebox .show[data-v-1908bc89] {\n      display: block;\n}\n.messagebox-container .messagebox .hide[data-v-1908bc89] {\n      display: none;\n}\n.messagebox-container .messagebox p > span[data-v-1908bc89] {\n      display: inline-block;\n      width: 60px;\n      height: 36px;\n      text-align: center;\n      line-height: 36px;\n      border-radius: 4px;\n      margin: 0 10px;\n      cursor: pointer;\n}\n.messagebox-container .messagebox p > span[data-v-1908bc89]:hover {\n        opacity: .8;\n}\n.messagebox-container .fade-in[data-v-1908bc89] {\n    animation-name: fade-in-data-v-1908bc89;\n    animation-duration: 0.3s;\n    animation-fill-mode: both;\n}\n.messagebox-container .fade-out[data-v-1908bc89] {\n    animation-name: fade-out-data-v-1908bc89;\n    animation-duration: 0.3s;\n    animation-fill-mode: both;\n}\n", ""]);

                // exports


                /***/
            }),
            /* 4 */
            /***/
            (function(module, exports) {

                /*
                	MIT License http://www.opensource.org/licenses/mit-license.php
                	Author Tobias Koppers @sokra
                */
                // css base code, injected by the css-loader
                module.exports = function(useSourceMap) {
                    var list = [];

                    // return the list of modules as css string
                    list.toString = function toString() {
                        return this.map(function(item) {
                            var content = cssWithMappingToString(item, useSourceMap);
                            if (item[2]) {
                                return "@media " + item[2] + "{" + content + "}";
                            } else {
                                return content;
                            }
                        }).join("");
                    };

                    // import a list of modules into the list
                    list.i = function(modules, mediaQuery) {
                        if (typeof modules === "string")
                            modules = [
                                [null, modules, ""]
                            ];
                        var alreadyImportedModules = {};
                        for (var i = 0; i < this.length; i++) {
                            var id = this[i][0];
                            if (typeof id === "number")
                                alreadyImportedModules[id] = true;
                        }
                        for (i = 0; i < modules.length; i++) {
                            var item = modules[i];
                            // skip already imported module
                            // this implementation is not 100% perfect for weird media query combinations
                            //  when a module is imported multiple times with different media queries.
                            //  I hope this will never occur (Hey this way we have smaller bundles)
                            if (typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
                                if (mediaQuery && !item[2]) {
                                    item[2] = mediaQuery;
                                } else if (mediaQuery) {
                                    item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
                                }
                                list.push(item);
                            }
                        }
                    };
                    return list;
                };

                function cssWithMappingToString(item, useSourceMap) {
                    var content = item[1] || '';
                    var cssMapping = item[3];
                    if (!cssMapping) {
                        return content;
                    }

                    if (useSourceMap && typeof btoa === 'function') {
                        var sourceMapping = toComment(cssMapping);
                        var sourceURLs = cssMapping.sources.map(function(source) {
                            return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
                        });

                        return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
                    }

                    return [content].join('\n');
                }

                // Adapted from convert-source-map (MIT)
                function toComment(sourceMap) {
                    // eslint-disable-next-line no-undef
                    var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
                    var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

                    return '/*# ' + data + ' */';
                }


                /***/
            }),
            /* 5 */
            /***/
            (function(module, exports, __webpack_require__) {

                /*
                	MIT License http://www.opensource.org/licenses/mit-license.php
                	Author Tobias Koppers @sokra
                */

                var stylesInDom = {};

                var memoize = function(fn) {
                    var memo;

                    return function() {
                        if (typeof memo === "undefined") memo = fn.apply(this, arguments);
                        return memo;
                    };
                };

                var isOldIE = memoize(function() {
                    // Test for IE <= 9 as proposed by Browserhacks
                    // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
                    // Tests for existence of standard globals is to allow style-loader
                    // to operate correctly into non-standard environments
                    // @see https://github.com/webpack-contrib/style-loader/issues/177
                    return window && document && document.all && !window.atob;
                });

                var getElement = (function(fn) {
                    var memo = {};

                    return function(selector) {
                        if (typeof memo[selector] === "undefined") {
                            memo[selector] = fn.call(this, selector);
                        }

                        return memo[selector]
                    };
                })(function(target) {
                    return document.querySelector(target)
                });

                var singleton = null;
                var singletonCounter = 0;
                var stylesInsertedAtTop = [];

                var fixUrls = __webpack_require__(6);

                module.exports = function(list, options) {
                    if (typeof DEBUG !== "undefined" && DEBUG) {
                        if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
                    }

                    options = options || {};

                    options.attrs = typeof options.attrs === "object" ? options.attrs : {};

                    // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
                    // tags it will allow on a page
                    if (!options.singleton) options.singleton = isOldIE();

                    // By default, add <style> tags to the <head> element
                    if (!options.insertInto) options.insertInto = "head";

                    // By default, add <style> tags to the bottom of the target
                    if (!options.insertAt) options.insertAt = "bottom";

                    var styles = listToStyles(list, options);

                    addStylesToDom(styles, options);

                    return function update(newList) {
                        var mayRemove = [];

                        for (var i = 0; i < styles.length; i++) {
                            var item = styles[i];
                            var domStyle = stylesInDom[item.id];

                            domStyle.refs--;
                            mayRemove.push(domStyle);
                        }

                        if (newList) {
                            var newStyles = listToStyles(newList, options);
                            addStylesToDom(newStyles, options);
                        }

                        for (var i = 0; i < mayRemove.length; i++) {
                            var domStyle = mayRemove[i];

                            if (domStyle.refs === 0) {
                                for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

                                delete stylesInDom[domStyle.id];
                            }
                        }
                    };
                };

                function addStylesToDom(styles, options) {
                    for (var i = 0; i < styles.length; i++) {
                        var item = styles[i];
                        var domStyle = stylesInDom[item.id];

                        if (domStyle) {
                            domStyle.refs++;

                            for (var j = 0; j < domStyle.parts.length; j++) {
                                domStyle.parts[j](item.parts[j]);
                            }

                            for (; j < item.parts.length; j++) {
                                domStyle.parts.push(addStyle(item.parts[j], options));
                            }
                        } else {
                            var parts = [];

                            for (var j = 0; j < item.parts.length; j++) {
                                parts.push(addStyle(item.parts[j], options));
                            }

                            stylesInDom[item.id] = { id: item.id, refs: 1, parts: parts };
                        }
                    }
                }

                function listToStyles(list, options) {
                    var styles = [];
                    var newStyles = {};

                    for (var i = 0; i < list.length; i++) {
                        var item = list[i];
                        var id = options.base ? item[0] + options.base : item[0];
                        var css = item[1];
                        var media = item[2];
                        var sourceMap = item[3];
                        var part = { css: css, media: media, sourceMap: sourceMap };

                        if (!newStyles[id]) styles.push(newStyles[id] = { id: id, parts: [part] });
                        else newStyles[id].parts.push(part);
                    }

                    return styles;
                }

                function insertStyleElement(options, style) {
                    var target = getElement(options.insertInto)

                    if (!target) {
                        throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
                    }

                    var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

                    if (options.insertAt === "top") {
                        if (!lastStyleElementInsertedAtTop) {
                            target.insertBefore(style, target.firstChild);
                        } else if (lastStyleElementInsertedAtTop.nextSibling) {
                            target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
                        } else {
                            target.appendChild(style);
                        }
                        stylesInsertedAtTop.push(style);
                    } else if (options.insertAt === "bottom") {
                        target.appendChild(style);
                    } else {
                        throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
                    }
                }

                function removeStyleElement(style) {
                    if (style.parentNode === null) return false;
                    style.parentNode.removeChild(style);

                    var idx = stylesInsertedAtTop.indexOf(style);
                    if (idx >= 0) {
                        stylesInsertedAtTop.splice(idx, 1);
                    }
                }

                function createStyleElement(options) {
                    var style = document.createElement("style");

                    options.attrs.type = "text/css";

                    addAttrs(style, options.attrs);
                    insertStyleElement(options, style);

                    return style;
                }

                function createLinkElement(options) {
                    var link = document.createElement("link");

                    options.attrs.type = "text/css";
                    options.attrs.rel = "stylesheet";

                    addAttrs(link, options.attrs);
                    insertStyleElement(options, link);

                    return link;
                }

                function addAttrs(el, attrs) {
                    Object.keys(attrs).forEach(function(key) {
                        el.setAttribute(key, attrs[key]);
                    });
                }

                function addStyle(obj, options) {
                    var style, update, remove, result;

                    // If a transform function was defined, run it on the css
                    if (options.transform && obj.css) {
                        result = options.transform(obj.css);

                        if (result) {
                            // If transform returns a value, use that instead of the original css.
                            // This allows running runtime transformations on the css.
                            obj.css = result;
                        } else {
                            // If the transform function returns a falsy value, don't add this css.
                            // This allows conditional loading of css
                            return function() {
                                // noop
                            };
                        }
                    }

                    if (options.singleton) {
                        var styleIndex = singletonCounter++;

                        style = singleton || (singleton = createStyleElement(options));

                        update = applyToSingletonTag.bind(null, style, styleIndex, false);
                        remove = applyToSingletonTag.bind(null, style, styleIndex, true);

                    } else if (
                        obj.sourceMap &&
                        typeof URL === "function" &&
                        typeof URL.createObjectURL === "function" &&
                        typeof URL.revokeObjectURL === "function" &&
                        typeof Blob === "function" &&
                        typeof btoa === "function"
                    ) {
                        style = createLinkElement(options);
                        update = updateLink.bind(null, style, options);
                        remove = function() {
                            removeStyleElement(style);

                            if (style.href) URL.revokeObjectURL(style.href);
                        };
                    } else {
                        style = createStyleElement(options);
                        update = applyToTag.bind(null, style);
                        remove = function() {
                            removeStyleElement(style);
                        };
                    }

                    update(obj);

                    return function updateStyle(newObj) {
                        if (newObj) {
                            if (
                                newObj.css === obj.css &&
                                newObj.media === obj.media &&
                                newObj.sourceMap === obj.sourceMap
                            ) {
                                return;
                            }

                            update(obj = newObj);
                        } else {
                            remove();
                        }
                    };
                }

                var replaceText = (function() {
                    var textStore = [];

                    return function(index, replacement) {
                        textStore[index] = replacement;

                        return textStore.filter(Boolean).join('\n');
                    };
                })();

                function applyToSingletonTag(style, index, remove, obj) {
                    var css = remove ? "" : obj.css;

                    if (style.styleSheet) {
                        style.styleSheet.cssText = replaceText(index, css);
                    } else {
                        var cssNode = document.createTextNode(css);
                        var childNodes = style.childNodes;

                        if (childNodes[index]) style.removeChild(childNodes[index]);

                        if (childNodes.length) {
                            style.insertBefore(cssNode, childNodes[index]);
                        } else {
                            style.appendChild(cssNode);
                        }
                    }
                }

                function applyToTag(style, obj) {
                    var css = obj.css;
                    var media = obj.media;

                    if (media) {
                        style.setAttribute("media", media)
                    }

                    if (style.styleSheet) {
                        style.styleSheet.cssText = css;
                    } else {
                        while (style.firstChild) {
                            style.removeChild(style.firstChild);
                        }

                        style.appendChild(document.createTextNode(css));
                    }
                }

                function updateLink(link, options, obj) {
                    var css = obj.css;
                    var sourceMap = obj.sourceMap;

                    /*
                    	If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
                    	and there is no publicPath defined then lets turn convertToAbsoluteUrls
                    	on by default.  Otherwise default to the convertToAbsoluteUrls option
                    	directly
                    */
                    var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

                    if (options.convertToAbsoluteUrls || autoFixUrls) {
                        css = fixUrls(css);
                    }

                    if (sourceMap) {
                        // http://stackoverflow.com/a/26603875
                        css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
                    }

                    var blob = new Blob([css], { type: "text/css" });

                    var oldSrc = link.href;

                    link.href = URL.createObjectURL(blob);

                    if (oldSrc) URL.revokeObjectURL(oldSrc);
                }


                /***/
            }),
            /* 6 */
            /***/
            (function(module, exports) {


                /**
                 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
                 * embed the css on the page. This breaks all relative urls because now they are relative to a
                 * bundle instead of the current page.
                 *
                 * One solution is to only use full urls, but that may be impossible.
                 *
                 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
                 *
                 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
                 *
                 */

                module.exports = function(css) {
                    // get current location
                    var location = typeof window !== "undefined" && window.location;

                    if (!location) {
                        throw new Error("fixUrls requires window.location");
                    }

                    // blank or null?
                    if (!css || typeof css !== "string") {
                        return css;
                    }

                    var baseUrl = location.protocol + "//" + location.host;
                    var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

                    // convert each url(...)
                    /*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
                    var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
                        // strip quotes (if they exist)
                        var unquotedOrigUrl = origUrl
                            .trim()
                            .replace(/^"(.*)"$/, function(o, $1) { return $1; })
                            .replace(/^'(.*)'$/, function(o, $1) { return $1; });

                        // already a full url? no change
                        if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/)/i.test(unquotedOrigUrl)) {
                            return fullMatch;
                        }

                        // convert the url to a full url
                        var newUrl;

                        if (unquotedOrigUrl.indexOf("//") === 0) {
                            //TODO: should we add protocol?
                            newUrl = unquotedOrigUrl;
                        } else if (unquotedOrigUrl.indexOf("/") === 0) {
                            // path should be relative to the base url
                            newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
                        } else {
                            // path should be relative to current directory
                            newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
                        }

                        // send back the fixed url(...)
                        return "url(" + JSON.stringify(newUrl) + ")";
                    });

                    // send back the fixed css
                    return fixedCss;
                };


                /***/
            }),
            /* 7 */
            /***/
            (function(module, exports) {

                /* globals __VUE_SSR_CONTEXT__ */

                // this module is a runtime utility for cleaner component module output and will
                // be included in the final webpack user bundle

                module.exports = function normalizeComponent(
                    rawScriptExports,
                    compiledTemplate,
                    injectStyles,
                    scopeId,
                    moduleIdentifier /* server only */
                ) {
                    var esModule
                    var scriptExports = rawScriptExports = rawScriptExports || {}

                    // ES6 modules interop
                    var type = typeof rawScriptExports.default
                    if (type === 'object' || type === 'function') {
                        esModule = rawScriptExports
                        scriptExports = rawScriptExports.default
                    }

                    // Vue.extend constructor export interop
                    var options = typeof scriptExports === 'function' ?
                        scriptExports.options :
                        scriptExports

                    // render functions
                    if (compiledTemplate) {
                        options.render = compiledTemplate.render
                        options.staticRenderFns = compiledTemplate.staticRenderFns
                    }

                    // scopedId
                    if (scopeId) {
                        options._scopeId = scopeId
                    }

                    var hook
                    if (moduleIdentifier) { // server build
                        hook = function(context) {
                                // 2.3 injection
                                context =
                                    context || // cached call
                                    (this.$vnode && this.$vnode.ssrContext) || // stateful
                                    (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
                                    // 2.2 with runInNewContext: true
                                if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
                                    context = __VUE_SSR_CONTEXT__
                                }
                                // inject component styles
                                if (injectStyles) {
                                    injectStyles.call(this, context)
                                }
                                // register component module identifier for async chunk inferrence
                                if (context && context._registeredComponents) {
                                    context._registeredComponents.add(moduleIdentifier)
                                }
                            }
                            // used by ssr in case component is cached and beforeCreate
                            // never gets called
                        options._ssrRegister = hook
                    } else if (injectStyles) {
                        hook = injectStyles
                    }

                    if (hook) {
                        var functional = options.functional
                        var existing = functional ?
                            options.render :
                            options.beforeCreate
                        if (!functional) {
                            // inject component registration as beforeCreate hook
                            options.beforeCreate = existing ?
                                [].concat(existing, hook) :
                                [hook]
                        } else {
                            // register for functioal component in vue file
                            options.render = function renderWithStyleInjection(h, context) {
                                hook.call(context)
                                return existing(h, context)
                            }
                        }
                    }

                    return {
                        esModule: esModule,
                        exports: scriptExports,
                        options: options
                    }
                }


                /***/
            }),
            /* 8 */
            /***/
            (function(module, exports, __webpack_require__) {

                "use strict";


                Object.defineProperty(exports, "__esModule", {
                    value: true
                });
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

                exports.default = {
                    data: function data() {
                        return {
                            message: {
                                title: '',
                                describe: '',
                                showButton: ''
                            },
                            options: {
                                buttonName: [],
                                buttonColor: [],
                                buttonBgcolor: [],
                                bgColor: '',
                                cb: function cb() {}
                            },
                            visible: false
                        };
                    },

                    methods: {
                        cancle: function cancle() {
                            this.$messagebox['cancle']();
                        },
                        sure: function sure() {
                            this.$messagebox['sure']();
                        }
                    }

                };

                /***/
            }),
            /* 9 */
            /***/
            (function(module, __webpack_exports__, __webpack_require__) {

                "use strict";
                var render = function() {
                    var _vm = this;
                    var _h = _vm.$createElement;
                    var _c = _vm._self._c || _h;
                    return _c('section', {
                        staticClass: "messagebox-container"
                    }, [_c('div', {
                        staticClass: "messagebox",
                        class: [_vm.visible ? 'fade-in' : 'fade-out']
                    }, [_c('h2', [_vm._v(_vm._s(_vm.message.title))]), _vm._v(" "), _c('p', {
                        staticClass: "describe"
                    }, [_vm._v(_vm._s(_vm.message.describe))]), _vm._v(" "), _c('p', {
                        class: [_vm.message.showButton ? 'show' : 'hide']
                    }, [_c('span', {
                        staticClass: "cancle",
                        style: ({
                            color: _vm.options.buttonColor[0],
                            background: _vm.options.buttonBgcolor[0]
                        }),
                        domProps: {
                            "textContent": _vm._s(_vm.options.buttonName[0])
                        },
                        on: {
                            "click": _vm.cancle
                        }
                    }), _vm._v(" "), (_vm.options.buttonName.length >= 2) ? _c('span', {
                        staticClass: "sure",
                        style: ({
                            color: _vm.options.buttonColor[1],
                            background: _vm.options.buttonBgcolor[1]
                        }),
                        domProps: {
                            "textContent": _vm._s(_vm.options.buttonName[1])
                        },
                        on: {
                            "click": _vm.sure
                        }
                    }) : _vm._e()])])])
                }
                var staticRenderFns = []
                render._withStripped = true
                var esExports = { render: render, staticRenderFns: staticRenderFns }
                    /* harmony default export */
                __webpack_exports__["a"] = (esExports);
                if (false) {
                    module.hot.accept()
                    if (module.hot.data) {
                        require("vue-loader/node_modules/vue-hot-reload-api").rerender("data-v-1908bc89", esExports)
                    }
                }

                /***/
            })
            /******/
        ]);
});