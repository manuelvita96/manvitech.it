"use strict";(self.webpackChunkpixfort_core=self.webpackChunkpixfort_core||[]).push([[973],{973:(o,s,e)=>{e.r(s),function(){$(".pix-custom-cursor").length||$("body").append('<div class="pix-custom-cursor"><div class="pix-cursor-inner"></div></div>');const o=document.querySelector(".pix-custom-cursor");PIX_JS_OPTIONS.hasOwnProperty("CURSOR_COLOR")&&($(".pix-custom-cursor .pix-cursor-inner").addClass(`bg-${PIX_JS_OPTIONS.CURSOR_COLOR}`),"exclusion"===PIX_JS_OPTIONS.CURSOR_COLOR&&$(".pix-custom-cursor").addClass("bg-exclusion"),1==PIX_JS_OPTIONS.DISABLE_DEFAULT_CURSOR&&$("body").addClass("pix-disable-default-cursor"));let s=!1;window.addEventListener("mousemove",(s=>{const e=s.clientY,r=s.clientX;o.style.transform=`translateX(${r}px) translateY(${e}px) translateZ(100px)`})),window.addEventListener("mouseout",(function(s){o.classList.add("hide-cursor")})),window.addEventListener("mouseenter",(function(s){o.classList.remove("hide-cursor")})),$("body").mouseover((function(){s||o.classList.remove("hide-cursor")})),$("body").on("mouseover","a, .btn, button, .video-play-btn, .jconfirm-closeIcon",(function(s){o.classList.add("cursor-focus")})),$("body").on("mouseout","a, .btn, button, .video-play-btn, .jconfirm-closeIcon",(function(s){o.classList.remove("cursor-focus")})),$("body").on("mouseover","iframe, .embed-responsive",(function(e){s=!0,o.classList.add("hide-cursor")})),$("body").on("mouseout","iframe, .embed-responsive",(function(e){s=!1,o.classList.add("hide-cursor")}))}()}}]);