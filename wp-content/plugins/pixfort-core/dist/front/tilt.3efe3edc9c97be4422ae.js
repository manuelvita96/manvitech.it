(self.webpackChunkpixfort_core=self.webpackChunkpixfort_core||[]).push([[618],{531:(e,t,i)=>{"object"!=typeof window?i.g.window=i.g:window,e.exports=function(e){var t={};function i(n){if(t[n])return t[n].exports;var s=t[n]={i:n,l:!1,exports:{}};return e[n].call(s.exports,s,s.exports,i),s.l=!0,s.exports}return i.m=e,i.c=t,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var s in e)i.d(n,s,function(t){return e[t]}.bind(null,s));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="",i(i.s=0)}([function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n,s=(n=i(1))&&n.__esModule?n:{default:n},o=s.default;t.default=o,t.default=s.default,e.exports=t.default},function(e,t,i){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var n,s=(n=i(2))&&n.__esModule?n:{default:n};function o(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function a(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}var r=function(){function e(t){var i=this,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},s=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),a(this,"onMouseEnter",(function(){i.updateElementPosition(),i.transitions(),"function"==typeof i.callbacks.onMouseEnter&&i.callbacks.onMouseEnter(i.element)})),a(this,"onMouseMove",(function(e){null!==i.updateCall&&cancelAnimationFrame(i.updateCall),i.event=e,i.updateElementPosition(),i.updateCall=requestAnimationFrame((function(){return i.update()})),"function"==typeof i.callbacks.onMouseMove&&i.callbacks.onMouseMove(i.element)})),a(this,"onMouseLeave",(function(){i.transitions(),requestAnimationFrame((function(){return i.reset()})),"function"==typeof i.callbacks.onMouseLeave&&i.callbacks.onMouseLeave(i.element)})),a(this,"onDeviceMove",(function(e){i.event=e,i.update(),i.updateElementPosition(),i.transitions(),"function"==typeof i.callbacks.onDeviceMove&&i.callbacks.onDeviceMove(i.element)})),this.element=t,this.callbacks=s,this.settings=this.extendSettings(n),"function"==typeof this.callbacks.onInit&&this.callbacks.onInit(this.element),this.reverse=this.settings.reverse?-1:1,this.settings.shine&&this.shine(),this.element.style.transform="perspective(".concat(this.settings.perspective,"px)"),this.addEventListeners()}var t,i,n;return t=e,n=[{key:"init",value:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{},i=t.elements,n=t.settings,s=t.callbacks;i instanceof Node&&(i=[i]),i instanceof NodeList&&(i=[].slice.call(i));var o=!0,a=!1,r=void 0;try{for(var l,c=i[Symbol.iterator]();!(o=(l=c.next()).done);o=!0){var u=l.value;"universalTilt"in u||(u.universalTilt=new e(u,n,s))}}catch(e){a=!0,r=e}finally{try{o||null==c.return||c.return()}finally{if(a)throw r}}}}],(i=[{key:"isMobile",value:function(){return window.DeviceMotionEvent&&"ontouchstart"in document.documentElement}},{key:"addEventListeners",value:function(){var e;s.default.name.match(this.settings.exclude)||(null===(e=s.default.product)||void 0===e?void 0:e.match(this.settings.exclude))||(this.isMobile()?window.addEventListener("devicemotion",this.onDeviceMove):("element"===this.settings.base?this.base=this.element:"window"===this.settings.base&&(this.base=window),this.base.addEventListener("mouseenter",this.onMouseEnter),this.base.addEventListener("mousemove",this.onMouseMove),this.base.addEventListener("mouseleave",this.onMouseLeave)))}},{key:"removeEventListeners",value:function(){window.removeEventListener("devicemotion",this.onDeviceMove),this.base.removeEventListener("mouseenter",this.onMouseEnter),this.base.removeEventListener("mousemove",this.onMouseMove),this.base.removeEventListener("mouseleave",this.onMouseLeave)}},{key:"destroy",value:function(){clearTimeout(this.timeout),null!==this.updateCall&&cancelAnimationFrame(this.updateCall),"function"==typeof this.callbacks.onDestroy&&this.callbacks.onDestroy(this.element),this.reset(),this.removeEventListeners(),this.element.universalTilt=null,delete this.element.universalTilt,this.element=null}},{key:"reset",value:function(){this.event={pageX:this.left+this.width/2,pageY:this.top+this.height/2},this.settings.reset&&(this.element.style.transform="perspective(".concat(this.settings.perspective,"px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)")),this.settings.shine&&!this.settings["shine-save"]&&Object.assign(this.shineElement.style,{transform:"rotate(180deg) translate3d(-50%, -50%, 0)",opacity:"0"})}},{key:"getValues",value:function(){var e,t,i;this.isMobile()?(e=this.event.accelerationIncludingGravity.x/4,t=this.event.accelerationIncludingGravity.y/4,90===window.orientation?(i=(1-t)/2,t=(1+e)/2,e=i):-90===window.orientation?(i=(1+t)/2,t=(1-e)/2,e=i):0===window.orientation?(t=i=(1+t)/2,e=(1+e)/2):180===window.orientation&&(t=i=(1-t)/2,e=(1-e)/2)):"element"===this.settings.base?(e=(this.event.clientX-this.left)/this.width,t=(this.event.clientY-this.top)/this.height):"window"===this.settings.base&&(e=this.event.clientX/window.innerWidth,t=this.event.clientY/window.innerHeight),e=Math.min(Math.max(e,0),1),t=Math.min(Math.max(t,0),1);var n=(this.settings.max/2-e*this.settings.max).toFixed(2),s=(t*this.settings.max-this.settings.max/2).toFixed(2),o=Math.atan2(e-.5,.5-t)*(180/Math.PI);return{tiltX:this.reverse*n,tiltY:this.reverse*s,angle:o}}},{key:"updateElementPosition",value:function(){var e=this.element.getBoundingClientRect();this.width=this.element.offsetWidth,this.height=this.element.offsetHeight,this.left=e.left,this.top=e.top}},{key:"update",value:function(){var e=this.getValues();this.element.style.transform="perspective(".concat(this.settings.perspective,"px)\n      rotateX(").concat(this.settings.disabled&&"X"===this.settings.disabled.toUpperCase()?0:e.tiltY,"deg)\n      rotateY(").concat(this.settings.disabled&&"Y"===this.settings.disabled.toUpperCase()?0:e.tiltX,"deg)\n      scale3d(").concat(this.settings.scale,", ").concat(this.settings.scale,", ").concat(this.settings.scale,")"),this.settings.shine&&Object.assign(this.shineElement.style,{transform:"rotate(".concat(e.angle,"deg) translate3d(-50%, -50%, 0)"),opacity:"".concat(this.settings["shine-opacity"])}),this.element.dispatchEvent(new CustomEvent("tiltChange",{detail:e})),this.updateCall=null}},{key:"shine",value:function(){var e=document.createElement("div"),t=document.createElement("div");e.classList.add("shine"),t.classList.add("shine-inner"),e.appendChild(t),this.element.appendChild(e),this.shineWrapper=this.element.querySelector(".shine"),this.shineElement=this.element.querySelector(".shine-inner"),Object.assign(this.shineWrapper.style,{position:"absolute",top:"0",left:"0",height:"100%",width:"100%",overflow:"hidden"}),Object.assign(this.shineElement.style,{position:"absolute",top:"50%",left:"50%","pointer-events":"none","background-image":"linear-gradient(0deg, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%)",width:"".concat(2*this.element.offsetWidth,"px"),height:"".concat(2*this.element.offsetWidth,"px"),transform:"rotate(180deg) translate3d(-50%, -50%, 0)","transform-origin":"0% 0%",opacity:"0"})}},{key:"transitions",value:function(){var e=this;clearTimeout(this.timeout),this.element.style.transition="all ".concat(this.settings.speed,"ms ").concat(this.settings.easing),this.settings.shine&&(this.shineElement.style.transition="opacity ".concat(this.settings.speed,"ms ").concat(this.settings.easing)),this.timeout=setTimeout((function(){e.element.style.transition="",e.settings.shine&&(e.shineElement.style.transition="")}),this.settings.speed)}},{key:"extendSettings",value:function(e){var t={base:"element",disabled:null,easing:"cubic-bezier(.03, .98, .52, .99)",exclude:null,max:35,perspective:1e3,reset:!0,reverse:!1,scale:1,shine:!1,"shine-opacity":0,"shine-save":!1,speed:300},i={};for(var n in t)if(n in e)i[n]=e[n];else if(this.element.getAttribute("data-".concat(n))){var s=this.element.getAttribute("data-".concat(n));try{i[n]=JSON.parse(s)}catch(e){i[n]=s}}else i[n]=t[n];return i}}])&&o(t.prototype,i),n&&o(t,n),e}();if(t.default=r,"undefined"!=typeof document){window.UniversalTilt=r;var l=document.querySelectorAll("[data-tilt]");l.length&&r.init({elements:l})}window.jQuery&&(window.jQuery.fn.universalTilt=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};r.init({elements:this,settings:e.settings||{},callbacks:e.callbacks||{}})})},function(e,t,i){(function(e,n){var s;
/*!
 * Platform.js <https://mths.be/platform>
 * Copyright 2014-2018 Benjamin Tan <https://bnjmnt4n.now.sh/>
 * Copyright 2011-2013 John-David Dalton <http://allyoucanleet.com/>
 * Available under MIT license <https://mths.be/mit>
 */(function(){"use strict";var o={function:!0,object:!0},a=o[typeof window]&&window||this,r=o[typeof t]&&t,l=o[typeof e]&&e&&!e.nodeType&&e,c=r&&l&&"object"==typeof n&&n;!c||c.global!==c&&c.window!==c&&c.self!==c||(a=c);var u=Math.pow(2,53)-1,d=/\bOpera/,b=Object.prototype,h=b.hasOwnProperty,p=b.toString;function f(e){return(e=String(e)).charAt(0).toUpperCase()+e.slice(1)}function m(e){return e=S(e),/^(?:webOS|i(?:OS|P))/.test(e)?e:f(e)}function v(e,t){for(var i in e)h.call(e,i)&&t(e[i],i,e)}function g(e){return null==e?f(e):p.call(e).slice(8,-1)}function x(e){return String(e).replace(/([ -])(?!$)/g,"$1?")}function y(e,t){var i=null;return function(e,t){var i=-1,n=e?e.length:0;if("number"==typeof n&&n>-1&&n<=u)for(;++i<n;)t(e[i],i,e);else v(e,t)}(e,(function(n,s){i=t(i,n,s,e)})),i}function S(e){return String(e).replace(/^ +| +$/g,"")}var w=function e(t){var i=a,n=t&&"object"==typeof t&&"String"!=g(t);n&&(i=t,t=null);var s=i.navigator||{},o=s.userAgent||"";t||(t=o);var r,l,c,u,b,h=n?!!s.likeChrome:/\bChrome\b/.test(t)&&!/internal|\n/i.test(p.toString()),f=n?"Object":"ScriptBridgingProxyObject",w=n?"Object":"Environment",M=n&&i.java?"JavaPackage":g(i.java),O=n?"Object":"RuntimeObject",E=/\bJava/.test(M)&&i.java,P=E&&g(i.environment)==w,k=E?"a":"α",C=E?"b":"β",T=i.document||{},W=i.operamini||i.opera,A=d.test(A=n&&W?W["[[Class]]"]:g(W))?A:W=null,j=t,B=[],I=null,F=t==o,R=F&&W&&"function"==typeof W.version&&W.version(),G=y([{label:"EdgeHTML",pattern:"Edge"},"Trident",{label:"WebKit",pattern:"AppleWebKit"},"iCab","Presto","NetFront","Tasman","KHTML","Gecko"],(function(e,i){return e||RegExp("\\b"+(i.pattern||x(i))+"\\b","i").exec(t)&&(i.label||i)})),$=y(["Adobe AIR","Arora","Avant Browser","Breach","Camino","Electron","Epiphany","Fennec","Flock","Galeon","GreenBrowser","iCab","Iceweasel","K-Meleon","Konqueror","Lunascape","Maxthon",{label:"Microsoft Edge",pattern:"Edge"},"Midori","Nook Browser","PaleMoon","PhantomJS","Raven","Rekonq","RockMelt",{label:"Samsung Internet",pattern:"SamsungBrowser"},"SeaMonkey",{label:"Silk",pattern:"(?:Cloud9|Silk-Accelerated)"},"Sleipnir","SlimBrowser",{label:"SRWare Iron",pattern:"Iron"},"Sunrise","Swiftfox","Waterfox","WebPositive","Opera Mini",{label:"Opera Mini",pattern:"OPiOS"},"Opera",{label:"Opera",pattern:"OPR"},"Chrome",{label:"Chrome Mobile",pattern:"(?:CriOS|CrMo)"},{label:"Firefox",pattern:"(?:Firefox|Minefield)"},{label:"Firefox for iOS",pattern:"FxiOS"},{label:"IE",pattern:"IEMobile"},{label:"IE",pattern:"MSIE"},"Safari"],(function(e,i){return e||RegExp("\\b"+(i.pattern||x(i))+"\\b","i").exec(t)&&(i.label||i)})),L=N([{label:"BlackBerry",pattern:"BB10"},"BlackBerry",{label:"Galaxy S",pattern:"GT-I9000"},{label:"Galaxy S2",pattern:"GT-I9100"},{label:"Galaxy S3",pattern:"GT-I9300"},{label:"Galaxy S4",pattern:"GT-I9500"},{label:"Galaxy S5",pattern:"SM-G900"},{label:"Galaxy S6",pattern:"SM-G920"},{label:"Galaxy S6 Edge",pattern:"SM-G925"},{label:"Galaxy S7",pattern:"SM-G930"},{label:"Galaxy S7 Edge",pattern:"SM-G935"},"Google TV","Lumia","iPad","iPod","iPhone","Kindle",{label:"Kindle Fire",pattern:"(?:Cloud9|Silk-Accelerated)"},"Nexus","Nook","PlayBook","PlayStation Vita","PlayStation","TouchPad","Transformer",{label:"Wii U",pattern:"WiiU"},"Wii","Xbox One",{label:"Xbox 360",pattern:"Xbox"},"Xoom"]),X=y({Apple:{iPad:1,iPhone:1,iPod:1},Archos:{},Amazon:{Kindle:1,"Kindle Fire":1},Asus:{Transformer:1},"Barnes & Noble":{Nook:1},BlackBerry:{PlayBook:1},Google:{"Google TV":1,Nexus:1},HP:{TouchPad:1},HTC:{},LG:{},Microsoft:{Xbox:1,"Xbox One":1},Motorola:{Xoom:1},Nintendo:{"Wii U":1,Wii:1},Nokia:{Lumia:1},Samsung:{"Galaxy S":1,"Galaxy S2":1,"Galaxy S3":1,"Galaxy S4":1},Sony:{PlayStation:1,"PlayStation Vita":1}},(function(e,i,n){return e||(i[L]||i[/^[a-z]+(?: +[a-z]+\b)*/i.exec(L)]||RegExp("\\b"+x(n)+"(?:\\b|\\w*\\d)","i").exec(t))&&n})),_=y(["Windows Phone","Android","CentOS",{label:"Chrome OS",pattern:"CrOS"},"Debian","Fedora","FreeBSD","Gentoo","Haiku","Kubuntu","Linux Mint","OpenBSD","Red Hat","SuSE","Ubuntu","Xubuntu","Cygwin","Symbian OS","hpwOS","webOS ","webOS","Tablet OS","Tizen","Linux","Mac OS X","Macintosh","Mac","Windows 98;","Windows "],(function(e,i){var n=i.pattern||x(i);return!e&&(e=RegExp("\\b"+n+"(?:/[\\d.]+|[ \\w.]*)","i").exec(t))&&(e=function(e,t,i){var n={"10.0":"10",6.4:"10 Technical Preview",6.3:"8.1",6.2:"8",6.1:"Server 2008 R2 / 7","6.0":"Server 2008 / Vista",5.2:"Server 2003 / XP 64-bit",5.1:"XP",5.01:"2000 SP1","5.0":"2000","4.0":"NT","4.90":"ME"};return t&&i&&/^Win/i.test(e)&&!/^Windows Phone /i.test(e)&&(n=n[/[\d.]+$/.exec(e)])&&(e="Windows "+n),e=String(e),t&&i&&(e=e.replace(RegExp(t,"i"),i)),m(e.replace(/ ce$/i," CE").replace(/\bhpw/i,"web").replace(/\bMacintosh\b/,"Mac OS").replace(/_PowerPC\b/i," OS").replace(/\b(OS X) [^ \d]+/i,"$1").replace(/\bMac (OS X)\b/,"$1").replace(/\/(\d)/," $1").replace(/_/g,".").replace(/(?: BePC|[ .]*fc[ \d.]+)$/i,"").replace(/\bx86\.64\b/gi,"x86_64").replace(/\b(Windows Phone) OS\b/,"$1").replace(/\b(Chrome OS \w+) [\d.]+\b/,"$1").split(" on ")[0])}(e,n,i.label||i)),e}));function N(e){return y(e,(function(e,i){var n=i.pattern||x(i);return!e&&(e=RegExp("\\b"+n+" *\\d+[.\\w_]*","i").exec(t)||RegExp("\\b"+n+" *\\w+-[\\w]*","i").exec(t)||RegExp("\\b"+n+"(?:; *(?:[a-z]+[_-])?[a-z]+\\d+|[^ ();-]*)","i").exec(t))&&((e=String(i.label&&!RegExp(n,"i").test(i.label)?i.label:e).split("/"))[1]&&!/[\d.]+/.test(e[0])&&(e[0]+=" "+e[1]),i=i.label||i,e=m(e[0].replace(RegExp(n,"i"),i).replace(RegExp("; *(?:"+i+"[_-])?","i")," ").replace(RegExp("("+i+")[-_.]?(\\w)","i"),"$1 $2"))),e}))}if(G&&(G=[G]),X&&!L&&(L=N([X])),(r=/\bGoogle TV\b/.exec(L))&&(L=r[0]),/\bSimulator\b/i.test(t)&&(L=(L?L+" ":"")+"Simulator"),"Opera Mini"==$&&/\bOPiOS\b/.test(t)&&B.push("running in Turbo/Uncompressed mode"),"IE"==$&&/\blike iPhone OS\b/.test(t)?(X=(r=e(t.replace(/like iPhone OS/,""))).manufacturer,L=r.product):/^iP/.test(L)?($||($="Safari"),_="iOS"+((r=/ OS ([\d_]+)/i.exec(t))?" "+r[1].replace(/_/g,"."):"")):"Konqueror"!=$||/buntu/i.test(_)?X&&"Google"!=X&&(/Chrome/.test($)&&!/\bMobile Safari\b/i.test(t)||/\bVita\b/.test(L))||/\bAndroid\b/.test(_)&&/^Chrome/.test($)&&/\bVersion\//i.test(t)?($="Android Browser",_=/\bAndroid\b/.test(_)?_:"Android"):"Silk"==$?(/\bMobi/i.test(t)||(_="Android",B.unshift("desktop mode")),/Accelerated *= *true/i.test(t)&&B.unshift("accelerated")):"PaleMoon"==$&&(r=/\bFirefox\/([\d.]+)\b/.exec(t))?B.push("identifying as Firefox "+r[1]):"Firefox"==$&&(r=/\b(Mobile|Tablet|TV)\b/i.exec(t))?(_||(_="Firefox OS"),L||(L=r[1])):!$||(r=!/\bMinefield\b/i.test(t)&&/\b(?:Firefox|Safari)\b/.exec($))?($&&!L&&/[\/,]|^[^(]+?\)/.test(t.slice(t.indexOf(r+"/")+8))&&($=null),(r=L||X||_)&&(L||X||/\b(?:Android|Symbian OS|Tablet OS|webOS)\b/.test(_))&&($=/[a-z]+(?: Hat)?/i.exec(/\bAndroid\b/.test(_)?_:r)+" Browser")):"Electron"==$&&(r=(/\bChrome\/([\d.]+)\b/.exec(t)||0)[1])&&B.push("Chromium "+r):_="Kubuntu",R||(R=y(["(?:Cloud9|CriOS|CrMo|Edge|FxiOS|IEMobile|Iron|Opera ?Mini|OPiOS|OPR|Raven|SamsungBrowser|Silk(?!/[\\d.]+$))","Version",x($),"(?:Firefox|Minefield|NetFront)"],(function(e,i){return e||(RegExp(i+"(?:-[\\d.]+/|(?: for [\\w-]+)?[ /-])([\\d.]+[^ ();/_-]*)","i").exec(t)||0)[1]||null}))),(r=("iCab"==G&&parseFloat(R)>3?"WebKit":/\bOpera\b/.test($)&&(/\bOPR\b/.test(t)?"Blink":"Presto"))||/\b(?:Midori|Nook|Safari)\b/i.test(t)&&!/^(?:Trident|EdgeHTML)$/.test(G)&&"WebKit"||!G&&/\bMSIE\b/i.test(t)&&("Mac OS"==_?"Tasman":"Trident")||"WebKit"==G&&/\bPlayStation\b(?! Vita\b)/i.test($)&&"NetFront")&&(G=[r]),"IE"==$&&(r=(/; *(?:XBLWP|ZuneWP)(\d+)/i.exec(t)||0)[1])?($+=" Mobile",_="Windows Phone "+(/\+$/.test(r)?r:r+".x"),B.unshift("desktop mode")):/\bWPDesktop\b/i.test(t)?($="IE Mobile",_="Windows Phone 8.x",B.unshift("desktop mode"),R||(R=(/\brv:([\d.]+)/.exec(t)||0)[1])):"IE"!=$&&"Trident"==G&&(r=/\brv:([\d.]+)/.exec(t))&&($&&B.push("identifying as "+$+(R?" "+R:"")),$="IE",R=r[1]),F){if(u="global",b=null!=(c=i)?typeof c[u]:"number",/^(?:boolean|number|string|undefined)$/.test(b)||"object"==b&&!c[u])g(r=i.runtime)==f?($="Adobe AIR",_=r.flash.system.Capabilities.os):g(r=i.phantom)==O?($="PhantomJS",R=(r=r.version||null)&&r.major+"."+r.minor+"."+r.patch):"number"==typeof T.documentMode&&(r=/\bTrident\/(\d+)/i.exec(t))?(R=[R,T.documentMode],(r=+r[1]+4)!=R[1]&&(B.push("IE "+R[1]+" mode"),G&&(G[1]=""),R[1]=r),R="IE"==$?String(R[1].toFixed(1)):R[0]):"number"==typeof T.documentMode&&/^(?:Chrome|Firefox)\b/.test($)&&(B.push("masking as "+$+" "+R),$="IE",R="11.0",G=["Trident"],_="Windows");else if(E&&(j=(r=E.lang.System).getProperty("os.arch"),_=_||r.getProperty("os.name")+" "+r.getProperty("os.version")),P){try{R=i.require("ringo/engine").version.join("."),$="RingoJS"}catch(e){(r=i.system)&&r.global.system==i.system&&($="Narwhal",_||(_=r[0].os||null))}$||($="Rhino")}else"object"==typeof i.process&&!i.process.browser&&(r=i.process)&&("object"==typeof r.versions&&("string"==typeof r.versions.electron?(B.push("Node "+r.versions.node),$="Electron",R=r.versions.electron):"string"==typeof r.versions.nw&&(B.push("Chromium "+R,"Node "+r.versions.node),$="NW.js",R=r.versions.nw)),$||($="Node.js",j=r.arch,_=r.platform,R=(R=/[\d.]+/.exec(r.version))?R[0]:null));_=_&&m(_)}if(R&&(r=/(?:[ab]|dp|pre|[ab]\d+pre)(?:\d+\+?)?$/i.exec(R)||/(?:alpha|beta)(?: ?\d)?/i.exec(t+";"+(F&&s.appMinorVersion))||/\bMinefield\b/i.test(t)&&"a")&&(I=/b/i.test(r)?"beta":"alpha",R=R.replace(RegExp(r+"\\+?$"),"")+("beta"==I?C:k)+(/\d+\+?/.exec(r)||"")),"Fennec"==$||"Firefox"==$&&/\b(?:Android|Firefox OS)\b/.test(_))$="Firefox Mobile";else if("Maxthon"==$&&R)R=R.replace(/\.[\d.]+/,".x");else if(/\bXbox\b/i.test(L))"Xbox 360"==L&&(_=null),"Xbox 360"==L&&/\bIEMobile\b/.test(t)&&B.unshift("mobile mode");else if(!/^(?:Chrome|IE|Opera)$/.test($)&&(!$||L||/Browser|Mobi/.test($))||"Windows CE"!=_&&!/Mobi/i.test(t))if("IE"==$&&F)try{null===i.external&&B.unshift("platform preview")}catch(e){B.unshift("embedded")}else(/\bBlackBerry\b/.test(L)||/\bBB10\b/.test(t))&&(r=(RegExp(L.replace(/ +/g," *")+"/([.\\d]+)","i").exec(t)||0)[1]||R)?(_=((r=[r,/BB10/.test(t)])[1]?(L=null,X="BlackBerry"):"Device Software")+" "+r[0],R=null):this!=v&&"Wii"!=L&&(F&&W||/Opera/.test($)&&/\b(?:MSIE|Firefox)\b/i.test(t)||"Firefox"==$&&/\bOS X (?:\d+\.){2,}/.test(_)||"IE"==$&&(_&&!/^Win/.test(_)&&R>5.5||/\bWindows XP\b/.test(_)&&R>8||8==R&&!/\bTrident\b/.test(t)))&&!d.test(r=e.call(v,t.replace(d,"")+";"))&&r.name&&(r="ing as "+r.name+((r=r.version)?" "+r:""),d.test($)?(/\bIE\b/.test(r)&&"Mac OS"==_&&(_=null),r="identify"+r):(r="mask"+r,$=A?m(A.replace(/([a-z])([A-Z])/g,"$1 $2")):"Opera",/\bIE\b/.test(r)&&(_=null),F||(R=null)),G=["Presto"],B.push(r));else $+=" Mobile";(r=(/\bAppleWebKit\/([\d.]+\+?)/i.exec(t)||0)[1])&&(r=[parseFloat(r.replace(/\.(\d)$/,".0$1")),r],"Safari"==$&&"+"==r[1].slice(-1)?($="WebKit Nightly",I="alpha",R=r[1].slice(0,-1)):R!=r[1]&&R!=(r[2]=(/\bSafari\/([\d.]+\+?)/i.exec(t)||0)[1])||(R=null),r[1]=(/\bChrome\/([\d.]+)/i.exec(t)||0)[1],537.36==r[0]&&537.36==r[2]&&parseFloat(r[1])>=28&&"WebKit"==G&&(G=["Blink"]),F&&(h||r[1])?(G&&(G[1]="like Chrome"),r=r[1]||((r=r[0])<530?1:r<532?2:r<532.05?3:r<533?4:r<534.03?5:r<534.07?6:r<534.1?7:r<534.13?8:r<534.16?9:r<534.24?10:r<534.3?11:r<535.01?12:r<535.02?"13+":r<535.07?15:r<535.11?16:r<535.19?17:r<536.05?18:r<536.1?19:r<537.01?20:r<537.11?"21+":r<537.13?23:r<537.18?24:r<537.24?25:r<537.36?26:"Blink"!=G?"27":"28")):(G&&(G[1]="like Safari"),r=(r=r[0])<400?1:r<500?2:r<526?3:r<533?4:r<534?"4+":r<535?5:r<537?6:r<538?7:r<601?8:"8"),G&&(G[1]+=" "+(r+="number"==typeof r?".x":/[.+]/.test(r)?"":"+")),"Safari"==$&&(!R||parseInt(R)>45)&&(R=r)),"Opera"==$&&(r=/\bzbov|zvav$/.exec(_))?($+=" ",B.unshift("desktop mode"),"zvav"==r?($+="Mini",R=null):$+="Mobile",_=_.replace(RegExp(" *"+r+"$"),"")):"Safari"==$&&/\bChrome\b/.exec(G&&G[1])&&(B.unshift("desktop mode"),$="Chrome Mobile",R=null,/\bOS X\b/.test(_)?(X="Apple",_="iOS 4.3+"):_=null),R&&0==R.indexOf(r=/[\d.]+$/.exec(_))&&t.indexOf("/"+r+"-")>-1&&(_=S(_.replace(r,""))),G&&!/\b(?:Avant|Nook)\b/.test($)&&(/Browser|Lunascape|Maxthon/.test($)||"Safari"!=$&&/^iOS/.test(_)&&/\bSafari\b/.test(G[1])||/^(?:Adobe|Arora|Breach|Midori|Opera|Phantom|Rekonq|Rock|Samsung Internet|Sleipnir|Web)/.test($)&&G[1])&&(r=G[G.length-1])&&B.push(r),B.length&&(B=["("+B.join("; ")+")"]),X&&L&&L.indexOf(X)<0&&B.push("on "+X),L&&B.push((/^on /.test(B[B.length-1])?"":"on ")+L),_&&(r=/ ([\d.+]+)$/.exec(_),l=r&&"/"==_.charAt(_.length-r[0].length-1),_={architecture:32,family:r&&!l?_.replace(r[0],""):_,version:r?r[1]:null,toString:function(){var e=this.version;return this.family+(e&&!l?" "+e:"")+(64==this.architecture?" 64-bit":"")}}),(r=/\b(?:AMD|IA|Win|WOW|x86_|x)64\b/i.exec(j))&&!/\bi686\b/i.test(j)?(_&&(_.architecture=64,_.family=_.family.replace(RegExp(" *"+r),"")),$&&(/\bWOW64\b/i.test(t)||F&&/\w(?:86|32)$/.test(s.cpuClass||s.platform)&&!/\bWin64; x64\b/i.test(t))&&B.unshift("32-bit")):_&&/^OS X/.test(_.family)&&"Chrome"==$&&parseFloat(R)>=39&&(_.architecture=64),t||(t=null);var K={};return K.description=t,K.layout=G&&G[0],K.manufacturer=X,K.name=$,K.prerelease=I,K.product=L,K.ua=t,K.version=$&&R,K.os=_||{architecture:null,family:null,version:null,toString:function(){return"null"}},K.parse=e,K.toString=function(){return this.description||""},K.version&&B.unshift(R),K.name&&B.unshift($),_&&$&&(_!=String(_).split(" ")[0]||_!=$.split(" ")[0]&&!L)&&B.push(L?"("+_+")":"on "+_),B.length&&(K.description=B.join(" ")),K}();a.platform=w,void 0===(s=function(){return w}.call(t,i,t,e))||(e.exports=s)}).call(this)}).call(this,i(3)(e),i(4))},function(e,t){e.exports=function(e){return e.webpackPolyfill||(e.deprecate=function(){},e.paths=[],e.children||(e.children=[]),Object.defineProperty(e,"loaded",{enumerable:!0,get:function(){return e.l}}),Object.defineProperty(e,"id",{enumerable:!0,get:function(){return e.i}}),e.webpackPolyfill=1),e}},function(e,t){var i;i=function(){return this}();try{i=i||new Function("return this")()}catch(e){"object"==typeof window&&(i=window)}e.exports=i}])},644:(e,t,i)=>{"use strict";i.r(t),i.d(t,{default:()=>n});i(531);function n(e){e||(e=$("body")),e.find(".tilt").each((function(e,t){$(t).universalTilt({settings:{reset:!0,scale:1.04,reverse:!1,max:15,perspective:3e3,exclude:/(iPod|iPhone|iPad|Android)/,speed:4e3},callbacks:{}})})),e.find(".tilt_small").each((function(e,t){$(t).universalTilt({settings:{reset:!0,scale:1.01,reverse:!1,max:15,perspective:5e3,exclude:/(iPod|iPhone|iPad|Android)/,speed:4e3},callbacks:{}})})),e.find(".tilt_big").each((function(e,t){$(t).universalTilt({settings:{reset:!0,scale:1.07,reverse:!1,max:15,perspective:1e3,exclude:/(iPod|iPhone|iPad|Android)/,speed:4e3},callbacks:{}})}))}}}]);