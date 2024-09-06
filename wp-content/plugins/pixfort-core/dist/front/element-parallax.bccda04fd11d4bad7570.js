"use strict";(self.webpackChunkpixfort_core=self.webpackChunkpixfort_core||[]).push([[235],{519:(e,t,n)=>{n.r(t),n.d(t,{default:()=>a});var r=n(892),i=n.n(r);function a(){i().init(),i().addDriver("scrollY",(function(){return window.scrollY})),$("[data-jarallax-element]").each((function(){let e={},t=$(this).attr("data-xaxis"),n=$(this).attr("data-yaxis");if(n){let t=-1*parseInt(n);e.translateX=[["elInY","elCenterY","elOutY"],[t,"0",n]]}if(t){let n=-1*parseInt(t);e.translateY=[["elInY","elCenterY","elOutY"],[n,"0",t]]}let r="parallax-"+Math.floor(1e4*Math.random());$(this).addClass(r),i().addElements("."+r,{scrollY:e})}))}},892:e=>{function t(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function n(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function r(e,t){return function(e){if(Array.isArray(e))return e}(e)||function(e,t){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e)){var n=[],r=!0,i=!1,a=void 0;try{for(var o,l=e[Symbol.iterator]();!(r=(o=l.next()).done)&&(n.push(o.value),!t||n.length!==t);r=!0);}catch(e){i=!0,a=e}finally{try{r||null==l.return||l.return()}finally{if(i)throw a}}return n}}(e,t)||function(e,t){if(e){if("string"==typeof e)return i(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);return"Object"===n&&e.constructor&&(n=e.constructor.name),"Map"===n||"Set"===n?Array.from(e):"Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)?i(e,t):void 0}}(e,t)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function i(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}!function(){function i(e){return["elInY+elHeight","elCenterY-".concat(e=0<arguments.length&&void 0!==e?e:30),"elCenterY","elCenterY+".concat(e),"elOutY-elHeight"]}var a,o,l,u,s,c,d={fadeInOut:function(e,t){return t=1<arguments.length&&void 0!==t?t:0,{opacity:[i(0<arguments.length&&void 0!==e?e:30),[t,1,1,1,t]]}},fadeIn:function(e,t){return{opacity:[["elInY+elHeight",0<arguments.length&&void 0!==e?e:"elCenterY"],[1<arguments.length&&void 0!==t?t:0,1]]}},fadeOut:function(e,t){return{opacity:[[0<arguments.length&&void 0!==e?e:"elCenterY","elOutY-elHeight"],[1,1<arguments.length&&void 0!==t?t:0]]}},blurInOut:function(e,t){return t=1<arguments.length&&void 0!==t?t:20,{blur:[i(0<arguments.length&&void 0!==e?e:100),[t,0,0,0,t]]}},blurIn:function(e,t){return{blur:[["elInY+elHeight",0<arguments.length&&void 0!==e?e:"elCenterY"],[1<arguments.length&&void 0!==t?t:20,0]]}},blurOut:function(e,t){return{opacity:[[0<arguments.length&&void 0!==e?e:"elCenterY","elOutY-elHeight"],[0,1<arguments.length&&void 0!==t?t:20]]}},scaleInOut:function(e,t){return t=1<arguments.length&&void 0!==t?t:.6,{scale:[i(0<arguments.length&&void 0!==e?e:100),[t,1,1,1,t]]}},scaleIn:function(e,t){return{scale:[["elInY+elHeight",0<arguments.length&&void 0!==e?e:"elCenterY"],[1<arguments.length&&void 0!==t?t:.6,1]]}},scaleOut:function(e,t){return{scale:[[0<arguments.length&&void 0!==e?e:"elCenterY","elOutY-elHeight"],[1,1<arguments.length&&void 0!==t?t:.6]]}},slideX:function(e,t){return{translateX:[["elInY",0<arguments.length&&void 0!==e?e:0],[0,1<arguments.length&&void 0!==t?t:500]]}},slideY:function(e,t){return{translateY:[["elInY",0<arguments.length&&void 0!==e?e:0],[0,1<arguments.length&&void 0!==t?t:500]]}},spin:function(e,t){return{rotate:[[0,e=0<arguments.length&&void 0!==e?e:1e3],[0,1<arguments.length&&void 0!==t?t:360],{modValue:e}]}},flipX:function(e,t){return{rotateX:[[0,e=0<arguments.length&&void 0!==e?e:1e3],[0,1<arguments.length&&void 0!==t?t:360],{modValue:e}]}},flipY:function(e,t){return{rotateY:[[0,e=0<arguments.length&&void 0!==e?e:1e3],[0,1<arguments.length&&void 0!==t?t:360],{modValue:e}]}},jiggle:function(e,t){return{skewX:[[0,+(e=0<arguments.length&&void 0!==e?e:50),2*e,3*e,4*e],[0,t=1<arguments.length&&void 0!==t?t:40,0,-t,0],{modValue:4*e}]}},seesaw:function(e,t){return{skewY:[[0,+(e=0<arguments.length&&void 0!==e?e:50),2*e,3*e,4*e],[0,t=1<arguments.length&&void 0!==t?t:40,0,-t,0],{modValue:4*e}]}},zigzag:function(e,t){return{translateX:[[0,+(e=0<arguments.length&&void 0!==e?e:100),2*e,3*e,4*e],[0,t=1<arguments.length&&void 0!==t?t:100,0,-t,0],{modValue:4*e}]}},hueRotate:function(e,t){return{"hue-rotate":[[0,e=0<arguments.length&&void 0!==e?e:600],[0,1<arguments.length&&void 0!==t?t:360],{modValue:e}]}}},f=(a=["perspective","scaleX","scaleY","scale","skewX","skewY","skew","rotateX","rotateY","rotate"],o=["blur","hue-rotate","brightness"],l=["translateX","translateY","translateZ"],u=["perspective","border-radius","blur","translateX","translateY","translateZ"],s=["hue-rotate","rotate","rotateX","rotateY","skew","skewX","skewY"],c={easeInQuad:function(e){return e*e},easeOutQuad:function(e){return e*(2-e)},easeInOutQuad:function(e){return e<.5?2*e*e:(4-2*e)*e-1},easeInCubic:function(e){return e*e*e},easeOutCubic:function(e){return--e*e*e+1},easeInOutCubic:function(e){return e<.5?4*e*e*e:(e-1)*(2*e-2)*(2*e-2)+1},easeInQuart:function(e){return e*e*e*e},easeOutQuart:function(e){return 1- --e*e*e*e},easeInOutQuart:function(e){return e<.5?8*e*e*e*e:1-8*--e*e*e*e},easeInQuint:function(e){return e*e*e*e*e},easeOutQuint:function(e){return 1+--e*e*e*e*e},easeInOutQuint:function(e){return e<.5?16*e*e*e*e*e:1+16*--e*e*e*e*e},easeOutBounce:function(e){var t=7.5625,n=2.75;return e<1/n?t*e*e:e<2/n?t*(e-=1.5/n)*e+.75:e<2.5/n?t*(e-=2.25/n)*e+.9375:t*(e-=2.625/n)*e+.984375},easeInBounce:function(e){return 1-c.easeOutBounce(1-e)},easeOutBack:function(e){return 1+2.70158*Math.pow(e-1,3)+1.70158*Math.pow(e-1,2)},easeInBack:function(e){return 2.70158*e*e*e-1.70158*e*e}},new function e(){var r=this;t(this,e),n(this,"drivers",[]),n(this,"elements",[]),n(this,"frame",0),n(this,"debug",!1),n(this,"windowWidth",0),n(this,"windowHeight",0),n(this,"presets",d),n(this,"debugData",{frameLengths:[]}),n(this,"init",(function(){r.findAndAddElements(),window.requestAnimationFrame(r.onAnimationFrame),r.windowWidth=document.body.clientWidth,r.windowHeight=document.body.clientHeight,window.onresize=r.onWindowResize})),n(this,"onWindowResize",(function(){document.body.clientWidth===r.windowWidth&&document.body.clientHeight===r.windowHeight||(r.windowWidth=document.body.clientWidth,r.windowHeight=document.body.clientHeight,r.elements.forEach((function(e){return e.calculateTransforms()})))})),n(this,"onAnimationFrame",(function(e){r.debug&&(r.debugData.frameStart=Date.now());var t,n={};r.drivers.forEach((function(e){n[e.name]=e.getValue(r.frame)})),r.elements.forEach((function(e){e.update(n,r.frame)})),r.debug&&r.debugData.frameLengths.push(Date.now()-r.debugData.frameStart),r.frame%60==0&&r.debug&&(t=Math.ceil(r.debugData.frameLengths.reduce((function(e,t){return e+t}),0)/60),console.log("Average frame calculation time: ".concat(t,"ms")),r.debugData.frameLengths=[]),r.frame++,window.requestAnimationFrame(r.onAnimationFrame)})),n(this,"addDriver",(function(e,t){var n=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};r.drivers.push(new g(e,t,n))})),n(this,"removeDriver",(function(e){r.drivers=r.drivers.filter((function(t){return t.name!==e}))})),n(this,"findAndAddElements",(function(){r.elements=[],document.querySelectorAll(".lax").forEach((function(e){var t=[];e.classList.forEach((function(e){e.includes("lax_preset")&&(e=e.replace("lax_preset_",""),t.push(e))}));var i=n({},"scrollY",{presets:t});r.elements.push(new v(".lax",r,e,i,0,{}))}))})),n(this,"addElements",(function(e,t,n){document.querySelectorAll(e).forEach((function(i,a){r.elements.push(new v(e,r,i,t,a,n))}))})),n(this,"removeElements",(function(e){r.elements=r.elements.filter((function(t){return t.selector!==e}))})),n(this,"addElement",(function(e,t,n){r.elements.push(new v("",r,e,t,0,n))})),n(this,"removeElement",(function(e){r.elements=r.elements.filter((function(t){return t.domElement!==e}))}))});function h(e,t){if(Array.isArray(e))return e;for(var n=Object.keys(e).map((function(e){return parseInt(e)})).sort((function(e,t){return t<e?1:-1})),r=n[n.length-1],i=0;i<n.length;i++){var a=n[i];if(t<a){r=a;break}}return e[r]}function m(e,t,n){var i=t.width,a=t.height,o=t.x,l=t.y;if("number"==typeof e)return e;var u,s=document.body.scrollHeight,c=document.body.scrollWidth,d=window.innerWidth,f=window.innerHeight,h=(t=(h=r((u=void 0!==window.pageXOffset,h="CSS1Compat"===(document.compatMode||""),t=u?window.pageXOffset:(h?document.documentElement:document.body).scrollLeft,[u?window.pageYOffset:(h?document.documentElement:document.body).scrollTop,t]),2))[0],(o=o+h[1])+i);t=(l=l+t)+a;return Function("return ".concat(e.replace(/screenWidth/g,d).replace(/screenHeight/g,f).replace(/pageHeight/g,s).replace(/pageWidth/g,c).replace(/elWidth/g,i).replace(/elHeight/g,a).replace(/elInY/g,l-f).replace(/elOutY/g,t).replace(/elCenterY/g,l+a/2-f/2).replace(/elInX/g,o-d).replace(/elOutX/g,h).replace(/elCenterX/g,o+i/2-d/2).replace(/index/g,n)))()}function g(e,r){var i=this,a=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};t(this,g),n(this,"getValueFn",void 0),n(this,"name",""),n(this,"lastValue",0),n(this,"frameStep",1),n(this,"m1",0),n(this,"m2",0),n(this,"inertia",0),n(this,"inertiaEnabled",!1),n(this,"getValue",(function(e){var t=i.lastValue;return e%i.frameStep==0&&(t=i.getValueFn(e)),i.inertiaEnabled&&(e=t-i.lastValue,i.m1=.8*i.m1+e*(1-.8),i.m2=.8*i.m2+i.m1*(1-.8),i.inertia=Math.round(5e3*i.m2)/15e3),i.lastValue=t,[i.lastValue,i.inertia]})),this.name=e,this.getValueFn=r,Object.keys(a).forEach((function(e){i[e]=a[e]})),this.lastValue=this.getValueFn(0)}function v(e,i,d,f){var g=this,p=4<arguments.length&&void 0!==arguments[4]?arguments[4]:0,w=5<arguments.length&&void 0!==arguments[5]?arguments[5]:{};t(this,v),n(this,"domElement",void 0),n(this,"transformsData",void 0),n(this,"styles",{}),n(this,"selector",""),n(this,"groupIndex",0),n(this,"laxInstance",void 0),n(this,"onUpdate",void 0),n(this,"update",(function(e,t){var n,i=g.transforms,a={};for(n in i){var o=i[n];e[n]||console.error("No lax driver with name: ",n);var l,d=r(e[n],2),f=d[0],h=d[1];for(l in o){var m,v=(Y=r(o[l],3))[0],p=Y[1],w=(x=void 0===(I=Y[2])?{}:I).modValue,b=void 0===(O=x.frameStep)?1:O,y=x.easing,Y=x.inertia,I=x.inertiaMode,O=x.cssFn,x=void 0===(x=x.cssUnit)?"":x;y=c[y];t%b==0&&(y=function(e,t,n,r){var i=0;if(e.forEach((function(e){e<n&&i++})),i<=0)return t[0];if(i>=e.length)return t[e.length-1];var a,o=(o=e[a=i-1],e=e[i],(n-o)/(e-o));return r&&(o=r(o)),(a=t[a])*(1-o)+(t=t[i])*o}(v,p,w?f%w:f,y),Y&&(m=h*Y,"absolute"===I&&(m=Math.abs(m)),y+=m),m="px"==(x||u.includes(l)?"px":s.includes(l)?"deg":"")?0:3,m=y.toFixed(m),a[l]=O?O(m,g.domElement):m+x)}}g.applyStyles(a),g.onUpdate&&g.onUpdate(e,g.domElement)})),n(this,"calculateTransforms",(function(){g.transforms={};var e,t=g.laxInstance.windowWidth;for(e in g.transformsData)!function(e){var n=g.transformsData[e],i={},a=n.presets;for(var o in(void 0===a?[]:a).forEach((function(e){var t,i,a=(i=r(e.split(":"),3))[0],o=i[1];e=i[2];(i=window.lax.presets[a])?(t=i(o,e),Object.keys(t).forEach((function(e){n[e]=t[e]}))):console.error("Lax preset cannot be found with name: ",a)})),delete n.presets,n)!function(e){var a=void 0===(o=(l=r(n[e],3))[0])?[-1e9,1e9]:o,o=void 0===(o=l[1])?[-1e9,1e9]:o,l=void 0===(l=l[2])?{}:l,u=g.domElement.getBoundingClientRect();a=h(a,t).map((function(e){return m(e,u,g.groupIndex)})),o=h(o,t).map((function(e){return m(e,u,g.groupIndex)}));i[e]=[a,o,l]}(o);g.transforms[e]=i}(e)})),n(this,"applyStyles",(function(e){var t,n,r,i=(t=e,n={transform:"",filter:""},r={translateX:1e-5,translateY:1e-5,translateZ:1e-5},Object.keys(t).forEach((function(e){var i=t[e],c=u.includes(e)?"px":s.includes(e)?"deg":"";l.includes(e)?r[e]=i:a.includes(e)?n.transform+="".concat(e,"(").concat(i).concat(c,") "):o.includes(e)?n.filter+="".concat(e,"(").concat(i).concat(c,") "):n[e]="".concat(i).concat(c," ")})),n.transform="translate3d(".concat(r.translateX,"px, ").concat(r.translateY,"px, ").concat(r.translateZ,"px) ").concat(n.transform),n);Object.keys(i).forEach((function(e){g.domElement.style.setProperty(e,i[e])}))})),this.selector=e,this.laxInstance=i,this.domElement=d,this.transformsData=f,this.groupIndex=p;var b=void 0===(p=w.style)?{}:p;w=w.onUpdate;Object.keys(b).forEach((function(e){d.style.setProperty(e,b[e])})),w&&(this.onUpdate=w),this.calculateTransforms()}void 0!==e.exports?e.exports=f:window.lax=f}()}}]);