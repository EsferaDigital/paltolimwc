
(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){'use strict';Object.defineProperty(exports,"__esModule",{value:true});var headerAnimado=function headerAnimado(){var header=document.getElementById('Header');var pageActual=window.location.pathname;if(pageActual!="/PaltolimWC/"){header.classList.add('Header-active');}else{header.classList.remove('Header-active');}};var OnLoad=function OnLoad(){window.onload=function(){eliminaTitle();};};var eliminaTitle=function eliminaTitle(){var t=document.querySelector('#text-2 > h3');var pageActual=window.location.pathname;if(pageActual=="/PaltolimWC/tienda/"){t.classList.remove('ocultar');t.classList.add('mostrar');}else if(pageActual!="/PaltolimWC/tienda/"){console.log('entro');t.classList.remove('mostrar');t.classList.add('ocultar');}
console.log(pageActual);console.log(t);};exports.headerAnimado=headerAnimado;exports.OnLoad=OnLoad;},{}],2:[function(require,module,exports){'use strict';Object.defineProperty(exports,"__esModule",{value:true});var toggleNav=function toggleNav(){var d=document,panel=d.querySelector('.Panel'),panelBtn=d.querySelector('.Panel-btn');panelBtn.addEventListener('click',function(e){e.preventDefault();panelBtn.classList.toggle('is-active');panel.classList.toggle('is-active');});};exports.default=toggleNav;},{}],3:[function(require,module,exports){'use strict';var _toggle_nav=require('./dev/toggle_nav');var _toggle_nav2=_interopRequireDefault(_toggle_nav);var _changes=require('./dev/changes');function _interopRequireDefault(obj){return obj&&obj.__esModule?obj:{default:obj};}
(0,_toggle_nav2.default)();(0,_changes.headerAnimado)();(0,_changes.OnLoad)();},{"./dev/changes":1,"./dev/toggle_nav":2}]},{},[3]);