!function e(i,n,t){function a(r,c){if(!n[r]){if(!i[r]){var f="function"==typeof require&&require;if(!c&&f)return f(r,!0);if(o)return o(r,!0);var l=new Error("Cannot find module '"+r+"'");throw l.code="MODULE_NOT_FOUND",l}var s=n[r]={exports:{}};i[r][0].call(s.exports,function(e){var n=i[r][1][e];return a(n||e)},s,s.exports,e,i,n,t)}return n[r].exports}for(var o="function"==typeof require&&require,r=0;r<t.length;r++)a(t[r]);return a}({1:[function(e,i,n){"use strict";new Vue({el:"#app",mounted:function(){$(".datepicker").length>0&&$(".datepicker").datepicker({format:"mm/dd/yyyy",autoclose:!0,language:"zh-TW",todayHighlight:!0})},data:{sidemenuList:[{link:"#",name:"效能管理",icon:"far fa-chart-bar",active:!1},{link:"./assets.html",name:"資產管理",icon:"fas fa-book",active:!0},{link:"#",name:"組織管理",icon:"fas fa-users",active:!1},{link:"#",name:"維運管理",icon:"far fa-address-book",active:!1},{link:"#",name:"社區資料",icon:"fas fa-home",active:!1},{link:"#",name:"社區檔案庫",icon:"far fa-folder",active:!1},{link:"#",name:"個人資料",icon:"far fa-smile",active:!1},{link:"#",name:"登出",icon:"fas fa-sign-out-alt",active:!1}],slideToggleActive:!1},methods:{slideToggle:function(){this.slideToggleActive=!this.slideToggleActive,console.log(this.slideToggleActive)}}})},{}]},{},[1]);