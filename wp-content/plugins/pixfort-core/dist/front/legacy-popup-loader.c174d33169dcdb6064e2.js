"use strict";(self.webpackChunkpixfort_core=self.webpackChunkpixfort_core||[]).push([[493],{811:(t,i,e)=>{function o(){$("body").on("click",".pix-story-popup",(function(t){t.preventDefault();let i=$(this).data("stories");if(i&&""!=i){let t="";t+='<div class="firas2 pix-popup-content-div"><div class="pix-story-slider bg-black pix-slider-story no-dots2">',$.each(i,(function(i,e){t+='<div class="carousel-cell p-0">',t+='<img class="jarallax-img pix-fit-cover w-100 pix-opacity-8" src="'+e+'" />',t+="</div>"})),t+="</div>",t+="</div>",window.loadPopup&&window.loadPopup({title:"",columnClass:"col-12 col-sm-6",backgroundDismiss:!0,buttons:!1,theme:"pix-video-popup",content:t,onOpenBefore:function(){this.showLoading(!0)},onContentReady:function(){let t=this;$(".pix-story-slider").length>0&&$(".pix-story-slider").flickity({draggable:!0,adaptiveHeight:!0,wrapAround:!0,autoPlay:3500,prevNextButtons:!1,imagesLoaded:!0,contain:!0,resize:!0,ready:function(){$(".pix-story-slider").flickity("resize")},on:{ready:function(){$(this).closest(".pix-story-slider").show(),$(this).closest(".pix-story-slider").removeClass("d-in"),$(this).removeClass("d-in"),setTimeout((function(){t.$body.addClass("pix-popup-animate")}),400),setTimeout((function(){t.hideLoading(!0)}),600)}}})}})}return!1})),$("body").on("click",".pix-video-popup",(function(t){if(t.preventDefault(),$(this).data("content")&&""!=$(this).data("content")){let t=$(this).data("content"),i="embed-responsive-21by9";$(this).data("aspect")&&""!=$(this).data("aspect")&&(i=$(this).data("aspect"));let e="";e+='<div class="pix-video video-active">',e+='<div class="embed-responsive '+i+'">',e+=t,e+="</div>",e+="</div>",window.loadPopup&&window.loadPopup({title:"",columnClass:"col-12",backgroundDismiss:!0,buttons:!1,theme:"pix-video-popup",content:e,onContentReady:function(){this.$content.find("iframe").each((function(t,i){let e=$(i).data("src");$(i).attr("src",e).click(),setTimeout((function(){$(i).click()}),1e3)}))}})}return!1})),$("body").on("click",".pix-audio-popup",(function(t){if(t.preventDefault(),$(this).data("content")&&""!=$(this).data("content")){let t=$(this).data("content"),i="embed-responsive-21by9";$(this).data("aspect")&&""!=$(this).data("aspect")&&(i=$(this).data("aspect"));let e="";e+=t,window.loadPopup&&window.loadPopup({title:"",columnClass:"col-12",backgroundDismiss:!0,buttons:!1,theme:"pix-audio-popup",content:e,onContentReady:function(){this.$content.find("iframe").each((function(t,i){let e=$(i).data("src");$(i).attr("src",e).click(),setTimeout((function(){$(i).click()}),1e3)}))}})}return!1}))}e.r(i),e.d(i,{default:()=>o})}}]);