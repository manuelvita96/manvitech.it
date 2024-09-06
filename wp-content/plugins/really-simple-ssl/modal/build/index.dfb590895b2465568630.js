(()=>{"use strict";var e,t,r={609:e=>{e.exports=window.React},427:e=>{e.exports=window.wp.components},87:e=>{e.exports=window.wp.element},723:e=>{e.exports=window.wp.i18n}},l={};function o(e){var t=l[e];if(void 0!==t)return t.exports;var n=l[e]={exports:{}};return r[e](n,n.exports,o),n.exports}o.m=r,o.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return o.d(t,{a:t}),t},o.d=(e,t)=>{for(var r in t)o.o(t,r)&&!o.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},o.f={},o.e=e=>Promise.all(Object.keys(o.f).reduce(((t,r)=>(o.f[r](e,t),t)),[])),o.u=e=>e+"."+{161:"e0560cee31bfcb50f0b3",291:"26a9269d87fda5210dac",433:"c979d76891c58ebf0fd9"}[e]+".js",o.miniCssF=e=>e+".css",o.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),o.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),e={},t="really-simple-ssl-modal:",o.l=(r,l,n,i)=>{if(e[r])e[r].push(l);else{var a,s;if(void 0!==n)for(var c=document.getElementsByTagName("script"),d=0;d<c.length;d++){var m=c[d];if(m.getAttribute("src")==r||m.getAttribute("data-webpack")==t+n){a=m;break}}a||(s=!0,(a=document.createElement("script")).charset="utf-8",a.timeout=120,o.nc&&a.setAttribute("nonce",o.nc),a.setAttribute("data-webpack",t+n),a.src=r),e[r]=[l];var u=(t,l)=>{a.onerror=a.onload=null,clearTimeout(p);var o=e[r];if(delete e[r],a.parentNode&&a.parentNode.removeChild(a),o&&o.forEach((e=>e(l))),t)return t(l)},p=setTimeout(u.bind(null,void 0,{type:"timeout",target:a}),12e4);a.onerror=u.bind(null,a.onerror),a.onload=u.bind(null,a.onload),s&&document.head.appendChild(a)}},o.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{var e;o.g.importScripts&&(e=o.g.location+"");var t=o.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var r=t.getElementsByTagName("script");if(r.length)for(var l=r.length-1;l>-1&&(!e||!/^http(s?):/.test(e));)e=r[l--].src}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),o.p=e})(),(()=>{if("undefined"!=typeof document){var e={57:0};o.f.miniCss=(t,r)=>{e[t]?r.push(e[t]):0!==e[t]&&{433:1}[t]&&r.push(e[t]=(e=>new Promise(((t,r)=>{var l=o.miniCssF(e),n=o.p+l;if(((e,t)=>{for(var r=document.getElementsByTagName("link"),l=0;l<r.length;l++){var o=(i=r[l]).getAttribute("data-href")||i.getAttribute("href");if("stylesheet"===i.rel&&(o===e||o===t))return i}var n=document.getElementsByTagName("style");for(l=0;l<n.length;l++){var i;if((o=(i=n[l]).getAttribute("data-href"))===e||o===t)return i}})(l,n))return t();((e,t,r,l,n)=>{var i=document.createElement("link");i.rel="stylesheet",i.type="text/css",o.nc&&(i.nonce=o.nc),i.onerror=i.onload=r=>{if(i.onerror=i.onload=null,"load"===r.type)l();else{var o=r&&r.type,a=r&&r.target&&r.target.href||t,s=new Error("Loading CSS chunk "+e+" failed.\n("+o+": "+a+")");s.name="ChunkLoadError",s.code="CSS_CHUNK_LOAD_FAILED",s.type=o,s.request=a,i.parentNode&&i.parentNode.removeChild(i),n(s)}},i.href=t,document.head.appendChild(i)})(e,n,0,t,r)})))(t).then((()=>{e[t]=0}),(r=>{throw delete e[t],r})))}}})(),(()=>{var e={57:0};o.f.j=(t,r)=>{var l=o.o(e,t)?e[t]:void 0;if(0!==l)if(l)r.push(l[2]);else{var n=new Promise(((r,o)=>l=e[t]=[r,o]));r.push(l[2]=n);var i=o.p+o.u(t),a=new Error;o.l(i,(r=>{if(o.o(e,t)&&(0!==(l=e[t])&&(e[t]=void 0),l)){var n=r&&("load"===r.type?"missing":r.type),i=r&&r.target&&r.target.src;a.message="Loading chunk "+t+" failed.\n("+n+": "+i+")",a.name="ChunkLoadError",a.type=n,a.request=i,l[1](a)}}),"chunk-"+t,t)}};var t=(t,r)=>{var l,n,[i,a,s]=r,c=0;if(i.some((t=>0!==e[t]))){for(l in a)o.o(a,l)&&(o.m[l]=a[l]);s&&s(o)}for(t&&t(r);c<i.length;c++)n=i[c],o.o(e,n)&&e[n]&&e[n][0](),e[n]=0},r=globalThis.webpackChunkreally_simple_ssl_modal=globalThis.webpackChunkreally_simple_ssl_modal||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})(),(()=>{var e=o(609),t=o(87),r=o(723);const l=()=>{const[l,n]=(0,t.useState)(!1),[i,a]=(0,t.useState)(!1),[s,c]=(0,t.useState)(null),d=rsssl_modal.pro_plugin_active;(0,t.useEffect)((()=>{const e=d?"deactivate-really-simple-ssl-pro":"deactivate-really-simple-ssl",t=document.getElementById(e);c(t);const r=e=>{e.preventDefault(),n(!0)};return t&&t.addEventListener("click",r),()=>{t&&t.removeEventListener("click",r)}}),[d]),(0,t.useEffect)((()=>{!i&&l&&o.e(433).then(o.bind(o,433)).then((({default:e})=>{a((()=>e))}))}),[l,i]);const m=d?[{icon:"circle-times",color:"red",text:(0,r.__)("Performant HTTPS redirection","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Vulnerability Detection","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Security Headers","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Advanced Hardening","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Mixed content Scan","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Two-step verification","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Password security","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Limit Login Attempts","really-simple-ssl")}]:[{icon:"circle-times",color:"red",text:(0,r.__)("Performant HTTPS redirection","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Vulnerability Detection","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("WordPress hardening","really-simple-ssl")},{icon:"circle-times",color:"red",text:(0,r.__)("Mixed Content Fixer","really-simple-ssl")}];return(0,e.createElement)(e.Fragment,null,i&&(0,e.createElement)(i,{title:(0,r.__)("Are you sure?","really-simple-ssl"),confirmText:(0,r.__)("Deactivate","really-simple-ssl"),confirmAction:()=>(n(!1),void(window.location.href=rsssl_modal.deactivate_keep_https)),alternativeText:(0,r.__)("Deactivate and use HTTP","really-simple-ssl"),alternativeAction:()=>(n(!1),void(s&&(window.location.href=s.getAttribute("href")))),alternativeClassName:"rsssl-modal-warning",content:(0,e.createElement)(e.Fragment,null,(0,r.__)("Please choose the correct deactivation method, and before you go; you will miss out on below and future features in Really Simple Security","really-simple-ssl"),d&&(0,e.createElement)(e.Fragment,null," ",(0,e.createElement)("b",null,"Pro")),"!"),list:m,isOpen:l,setOpen:n}))};document.addEventListener("DOMContentLoaded",(()=>{const r=document.getElementById("rsssl-modal-root");r&&(t.createRoot?(0,t.createRoot)(r).render((0,e.createElement)(l,null)):(0,t.render)((0,e.createElement)(l,null),r))}))})()})();