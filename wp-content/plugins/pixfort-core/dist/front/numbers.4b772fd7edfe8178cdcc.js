"use strict";(self.webpackChunkpixfort_core=self.webpackChunkpixfort_core||[]).push([[171],{993:(t,a,r)=>{function o(t){let a=$(t),r=Math.floor(1e3*Math.random()+3e3);a.attr("data-duration")&&""!=a.attr("data-duration")&&(r=Math.floor(a.attr("data-duration")));let o=a.attr("data-to");$({property:0}).animate({property:o},{duration:r,easing:"swing",step:function(){a.text(Math.floor(this.property))},complete:function(){a.text(this.property)}})}r.r(a),r.d(a,{default:()=>o})}}]);