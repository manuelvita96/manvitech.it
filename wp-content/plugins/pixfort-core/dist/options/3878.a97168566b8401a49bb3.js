"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[3878],{3878:function(e,t,r){r.r(t),r.d(t,{default:function(){return A}});var i=r(64467),s=r(96540),a=r(32992),n=r.n(a),o=r(37096),l=r(60990),c=r(70832),d=r.n(c),h=r(5556);function p(e){return e.replace(/[-|:]([a-z])/g,(function(e){return e[1].toUpperCase()}))}const g="data-";function u(e){const t=document.createElement("div");t.innerHTML=e;const r=t.firstElementChild;return r.remove?r.remove():t.removeChild(r),r}function m(e){const t=u(e).attributes;return t.length>0?function(e){const t={};for(let i,s=0;s<e.length;s++){const a=e[s].name;"class"==a?i="className":(r=g,i=0!==a.indexOf(r)?p(a):a),t[i]=e[s].value}var r;return t}(t):null}var x=r(74848);class f extends s.Component{componentDidMount(){const{children:e}=this.props}render(){let e,t,r;const{element:i,raw:s,src:a,...n}=this.props;return!0===s&&(e="svg",r=m(a),t=u(a).innerHTML),t=t||a,e=e||i,r=r||{},(0,x.jsx)(e,{...r,...n,src:null,children:null,dangerouslySetInnerHTML:{__html:t}})}}f.defaultProps={element:"i",raw:!1,src:""},f.propTypes={src:h.string.isRequired,element:h.string,raw:h.bool};class y extends s.Component{constructor(e){super(e);let t=32;this.props.size&&(t=this.props.size),this.state={loaded:!1,icon:!1,size:t}}componentDidMount(){if(this.props.data){let e='<svg class="'+this.props.iconClasses+'" width="'+this.state.size+'" height="'+this.state.size+'" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';e+=this.props.data,e+="</svg>",this.setState({icon:e,loaded:!0})}}componentDidUpdate(){if(!this.state&&this.props.data){let e='<svg class="'+this.props.iconClasses+'" width="'+this.state.size+'" height="'+this.state.size+'" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">';e+=this.props.data,e+="</svg>",this.setState({icon:e,loaded:!0})}}render(){return(0,x.jsx)(x.Fragment,{children:this.props.data&&this.state.icon?(0,x.jsx)(f,{src:this.state.icon}):null})}}var v=y;class k extends s.Component{constructor(e){super(e),(0,i.A)(this,"name",""),(0,i.A)(this,"visibilityChange",(e=>{this.setState({isVisible:e})})),this.state={isVisible:!0},this.name=this.getIconDisplayName(this.props.id)}getIconDisplayName(e){let t=e;return t.startsWith("pixfort-icon-")&&(t=t.substring(13,t.length)),t=t.replaceAll("-"," ").replace(/\b\w/g,(e=>e.toUpperCase())),t=t.replaceAll("-"," "),t}render(){return(0,x.jsx)(d(),{partialVisibility:!0,offset:{top:-1e3,bottom:-1e3},onChange:this.visibilityChange,intervalDelay:200,children:(0,x.jsx)("div",{title:this.name,className:`min-h-[47px] bg-white relative group cursor-pointer border  hover:bg-gray-50/60 dark:hover:bg-gray-800/50 rounded-md h-full transition-all ease-in-out duration-150\n\t\t\t\t${this.props.checked?"is-selected-icon ring-1 ring-primary border-primary":"border-gray-200 hover:border-gray-300 dark:border-gray-700 dark:hover:border-gray-600/70"}\n\t\t\t\t`,children:this.state.isVisible?(0,x.jsx)("div",{className:"px-2 flex justify-center items-center h-full flex-col",children:(0,x.jsx)("div",{className:"text-center w-[32px] h-[32px] block ml-auto mr-auto",children:(0,x.jsx)(v,{id:this.props.id,data:this.props.data,iconClasses:"icon-view flex justify-center single-icon"})})}):null})})}}var w=k,b=r(71083);function C(e,t,r){if(!t)return t;if(e)if(r){if(!t.includes("/"))if(t.startsWith("pixicon-")){if(e.MappingFonticons&&e.MappingFonticons.hasOwnProperty(t))return e.SOLID_ICONS_LIST.includes(e.MappingFonticons[t])?"Solid/"+e.MappingFonticons[t]:"Line/"+e.MappingFonticons[t]}else if(e.MappingDuo&&e.MappingDuo.hasOwnProperty(t))return"Duotone/"+e.MappingDuo[t]}else if(t.startsWith("Line/")||t.startsWith("Solid/")){let r=t.replace("Line/","");if(r=t.replace("Solid/",""),e.MappingFonticonsRev&&e.MappingFonticonsRev.hasOwnProperty(r))return e.MappingFonticonsRev[r]}else if(t.startsWith("Duotone/")){let r=t.replace("Duotone/","");if(e.MappingDuoRev&&e.MappingDuoRev.hasOwnProperty(r))return e.MappingDuoRev[r]}return t}var j,D=r(10643);function N(){return N=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)({}).hasOwnProperty.call(r,i)&&(e[i]=r[i])}return e},N.apply(null,arguments)}var S,I=function(e){return s.createElement("svg",N({width:"24px",height:"24px",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",xmlnsXlink:"http://www.w3.org/1999/xlink"},e),j||(j=s.createElement("g",{id:"Line/Navigation/pixfort-icon-arrows-up-down-1",stroke:"none",strokeWidth:1,fill:"none",fillRule:"evenodd",strokeLinecap:"round",strokeLinejoin:"round"},s.createElement("path",{d:"M9,9 L12,6 L15,9 M9,15 L12,18 L15,15",id:"icon",stroke:"currentcolor",strokeWidth:2}))))};function M(){return M=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)({}).hasOwnProperty.call(r,i)&&(e[i]=r[i])}return e},M.apply(null,arguments)}var O,E=function(e){return s.createElement("svg",M({width:"20px",height:"20px",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",xmlnsXlink:"http://www.w3.org/1999/xlink"},e),S||(S=s.createElement("g",{id:"App",stroke:"none",strokeWidth:1,fill:"none",fillRule:"evenodd",strokeLinecap:"round",strokeLinejoin:"round"},s.createElement("g",{id:"draft",transform:"translate(-144.000000, -234.000000)",stroke:"currentcolor",strokeWidth:2},s.createElement("g",{id:"styles",transform:"translate(136.000000, 231.000000)"},s.createElement("g",{id:"Group-2",transform:"translate(0.000000, 1.000000)"},s.createElement("g",{id:"pixfort-icon-circles-2",transform:"translate(9.000000, 3.000000)"},s.createElement("path",{d:"M11.5,13 C15.0898509,13 18,10.0898509 18,6.5 C18,2.91014913 15.0898509,0 11.5,0 C7.91014913,0 5,2.91014913 5,6.5 C5,10.0898509 7.91014913,13 11.5,13 Z M5.16355456,5.03298829 C2.21155536,5.67212171 0,8.29891107 0,11.4422389 C0,15.0639904 2.93599784,18 6.55773471,18 C9.70095445,18 12.3276691,15.7885701 12.9669013,12.8366937",id:"icon"}))))))))};function L(){return L=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)({}).hasOwnProperty.call(r,i)&&(e[i]=r[i])}return e},L.apply(null,arguments)}var R,T=function(e){return s.createElement("svg",L({width:"20px",height:"20px",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",xmlnsXlink:"http://www.w3.org/1999/xlink"},e),O||(O=s.createElement("g",{id:"App",stroke:"none",strokeWidth:1,fill:"none",fillRule:"evenodd"},s.createElement("g",{id:"draft",transform:"translate(-282.000000, -234.000000)"},s.createElement("g",{id:"styles",transform:"translate(136.000000, 231.000000)"},s.createElement("g",{id:"Group-2",transform:"translate(138.000000, 1.000000)"},s.createElement("g",{id:"pixfort-icon-circles-2",transform:"translate(8.000000, 2.000000)"},s.createElement("path",{d:"M4,7.5 C4,12.1944204 7.80557963,16 12.5,16 C13.0904467,16 13.6668323,15.939797 14.2233532,15.8251945 C12.9981046,18.2995614 10.4476317,20 7.5,20 C3.35786438,20 0,16.6421356 0,12.5 C0,9.55236834 1.70043857,7.00189538 4.17387409,5.77602276 C4.06026905,6.33253577 4,6.90922959 4,7.5 Z",id:"fill",fillOpacity:.4,fill:"currentcolor"}),s.createElement("path",{d:"M12.5,0 C8.35786438,0 5,3.35786438 5,7.5 C5,11.6421356 8.35786438,15 12.5,15 C16.6421356,15 20,11.6421356 20,7.5 C20,3.35786438 16.6421356,0 12.5,0 Z",id:"icon",fill:"currentcolor"}))))))))};function W(){return W=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var i in r)({}).hasOwnProperty.call(r,i)&&(e[i]=r[i])}return e},W.apply(null,arguments)}var P=function(e){return s.createElement("svg",W({width:"20px",height:"20px",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg",xmlnsXlink:"http://www.w3.org/1999/xlink"},e),R||(R=s.createElement("g",{id:"App",stroke:"none",strokeWidth:1,fill:"none",fillRule:"evenodd"},s.createElement("g",{id:"draft",transform:"translate(-328.000000, -234.000000)",fill:"currentcolor"},s.createElement("g",{id:"styles",transform:"translate(136.000000, 231.000000)"},s.createElement("g",{id:"Group-2",transform:"translate(184.000000, 1.000000)"},s.createElement("g",{id:"pixfort-icon-circles-2",transform:"translate(8.000000, 2.000000)"},s.createElement("path",{d:"M4.17387409,5.77602276 C4.06026905,6.33253577 4,6.90922959 4,7.5 C4,12.1944204 7.80557963,16 12.5,16 C13.0904467,16 13.6668323,15.939797 14.2233532,15.8251945 C12.9981046,18.2995614 10.4476317,20 7.5,20 C3.35786438,20 0,16.6421356 0,12.5 C0,9.55236834 1.70043857,7.00189538 4.17387409,5.77602276 Z M12.5,0 C16.6421356,0 20,3.35786438 20,7.5 C20,11.6421356 16.6421356,15 12.5,15 C8.35786438,15 5,11.6421356 5,7.5 C5,3.35786438 8.35786438,0 12.5,0 Z",id:"icon"}))))))))};class _ extends s.Component{constructor(e){super(e),(0,i.A)(this,"loadIconsData",(()=>{let e=!1,t=this,r=!1,i=t.state.value;setTimeout((()=>{if(localStorage.getItem("iconsPickerVersion")&&2!=localStorage.getItem("iconsPickerVersion")&&(e=!0),!localStorage.getItem("pixfortIconsStore")||e)(async e=>{try{return(await b.A.get(e)).data}catch(e){console.error("Error making GET request:",e)}})(pixfort_options_data.ajaxurl+"?action=pix_icons_data").then((e=>{r=e,localStorage.setItem("pixfortIconsStore",n().compress(JSON.stringify(e))),localStorage.setItem("iconsPickerVersion",2),r.MappingFonticons&&(r.MappingFonticonsRev=Object.entries(r.MappingFonticons).reduce(((e,[t,r])=>({...e,[r]:t})),{})),r.MappingDuo&&(r.MappingDuoRev=Object.entries(r.MappingDuo).reduce(((e,[t,r])=>({...e,[r]:t})),{})),i=C(r,i,pixfort_options_data.isPixfortIcons);let s="Line";i.startsWith("Duotone")?s="Duotone":i.startsWith("Solid")&&(s="Solid"),t.setState({iconsData:r,value:i,type:s})}));else{r=JSON.parse(n().decompress(localStorage.getItem("pixfortIconsStore"))),r.MappingFonticons&&(r.MappingFonticonsRev=Object.entries(r.MappingFonticons).reduce(((e,[t,r])=>({...e,[r]:t})),{})),r.MappingDuo&&(r.MappingDuoRev=Object.entries(r.MappingDuo).reduce(((e,[t,r])=>({...e,[r]:t})),{})),this.setState({iconsData:r}),i=C(r,i,pixfort_options_data.isPixfortIcons);let e="Line";i.startsWith("Duotone")?e="Duotone":i.startsWith("Solid")&&(e="Solid"),t.setState({iconsData:r,value:i,type:e})}}),0)})),(0,i.A)(this,"handleClick",(e=>{e.preventDefault(),setDisplay(!display)})),(0,i.A)(this,"handleChange",(e=>{let t=e.target.value;props.onChange&&props.onChange({value:t,id:props.id})})),(0,i.A)(this,"handleSearch",(e=>{let t=e.target.value;this.setState({search:t})})),(0,i.A)(this,"handlePixfortIconClick",(e=>{let t="";e&&""!==e&&(t=this.state.type+"/"+e),this.setState({value:t}),this.props.onChange&&this.props.onChange({value:t,id:this.props.id})})),(0,i.A)(this,"handleIconClick",(e=>{this.setState({value:e}),this.props.onChange&&this.props.onChange({value:e,id:this.props.id})})),(0,i.A)(this,"getIcon",(e=>{switch(e){case"Line":return(0,x.jsx)(E,{className:"dark:text-white w-5 h-5 inline-block shrink-0"});case"Duotone":return(0,x.jsx)(T,{className:"dark:text-white w-5 h-5 inline-block shrink-0"});case"Solid":return(0,x.jsx)(P,{className:"dark:text-white w-5 h-5 inline-block shrink-0"});default:return""}})),(0,i.A)(this,"onTypeChange",(e=>{this.setState({type:e})})),(0,i.A)(this,"getIconsPerType",(()=>{let e="Line",t=this,r=[];this.state.type&&(e=this.state.type);let i=this.state.value;if(this.state.iconsData&&(r="Duotone"===e?this.state.iconsData.DUO_ICONS:"Solid"===e?this.state.iconsData.SOLID_ICONS:this.state.iconsData.LINE_ICONS,!i.startsWith(e))){i&&(i=i.replace("Line/",""),i=i.replace("Duotone/",""),i=i.replace("Solid/",""));let s=r.find((e=>e.name===i));s&&(i=e+"/"+i,setTimeout((()=>{t.setState({value:i}),t.props.onChange&&t.props.onChange({value:i,id:t.props.id})}),400))}return r}));let t=e.value||"",r="Line";t.startsWith("Duotone")?r="Duotone":t.startsWith("Solid")&&(r="Solid"),this.state={value:t,label:e.label||"Icon",icons:pixfort_options_obj.PIX_ICONS,display:!1,inputRef:s.createRef(),search:"",type:r,iconsData:!1},this.containerRef=(0,s.createRef)(),this.parentDivRef=(0,s.createRef)()}componentDidMount(){setTimeout((()=>{this.loadIconsData()}),200)}componentDidUpdate(){setTimeout((()=>{this.scrollToActiveIcon()}),300)}scrollToActiveIcon(){if(this.containerRef&&this.containerRef.current){const e=this.containerRef.current.querySelector(".is-selected-icon");if(e){const t=this.parentDivRef.current,r=t.scrollTop-t.getBoundingClientRect().top+e.getBoundingClientRect().top-130;(e=>{const i=t.scrollTop,s=performance.now(),a=n=>{const o=n-s,l=Math.min(o/e,1);t.scrollTop=i+l*(r-i),l<1&&requestAnimationFrame(a)};requestAnimationFrame(a)})(300)}}}render(){return(0,x.jsxs)("div",{className:"pix-opt-field pix-opt-icon-input-field px-4",children:[(0,x.jsx)("label",{className:"mb-2",children:this.state.label}),pixfort_options_data.isPixfortIcons?(0,x.jsxs)("div",{className:"mt-4",children:[(0,x.jsxs)("div",{className:"grid grid-cols-4 gap-4 items-center",children:[(0,x.jsxs)("div",{className:"group col-span-1 inline-flex flex-row items-center justify-start w-32 md:w-40 lg:w-48 active:w-36 md:active:w-64 focus-within:w-36 md:focus-within:w-64 relative transition-all ease-in-out duration-200 z-10",children:[(0,x.jsx)("input",{value:this.state.search,ref:this.state.inputRef,type:"text",name:"iconSearch",className:"peer inline-block w-full font-medium pl-9 py-2.5 rounded-lg bg-white focus:bg-gray-50 dark:bg-gray-900 text-sm placeholder-gray-400 dark:placeholder-gray-500 focus:placeholder-gray-700 hover:ring-transparent focus:ring-0 text-gray-400 focus:text-gray-700 dark:text-gray-500 dark:focus:text-gray-400 border border-gray-200 dark:border-gray-700 transition-all ease-in-out duration-200 ring-0 ring-transparent focus:outline-0 focus:border-gray-200 dark:focus:border-gray-700",onChange:this.handleSearch,autoComplete:"off",placeholder:"Search icons"}),(0,x.jsx)(D.A,{className:"pointer-events-none text-gray-400 dark:text-gray-500 w-5 h-5 absolute block shrink-0 ml-3 peer-focus:text-gray-700 dark:peer-focus:text-gray-300 transition-all ease-in-out duration-200"})]}),(0,x.jsx)("div",{className:"col-span-3 flex justify-end items-center",children:(0,x.jsxs)(o.W,{as:"div",className:"relative inline-block tracking-normal",children:[(0,x.jsxs)(o.W.Button,{className:"group flex items-center text-gray-900 dark:text-gray-400 dark:hover:text-white font-medium bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg text-sm p-[10px] hover:bg-gray-50 dark:hover:bg-gray-700/60 transition-all ease-in-out duration-150",children:[(0,x.jsx)("span",{className:"sr-only",children:"Open user menu"}),this.getIcon(this.state.type),(0,x.jsx)("span",{className:"inline-block ml-1.5 font-medium text-sm mr-12",children:this.state.type}),(0,x.jsx)(I,{className:"text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white dark:text-white absolute shrink-0 transition-all ease-in-out duration-200 right-0 mr-2"})]}),(0,x.jsx)(l.e,{as:s.Fragment,enter:"transition ease-out duration-100",enterFrom:"transform opacity-0 scale-95",enterTo:"transform opacity-100 scale-100",leave:"transition ease-in duration-75",leaveFrom:"transform opacity-100 scale-100",leaveTo:"transform opacity-0 scale-95",children:(0,x.jsx)(o.W.Items,{className:"absolute right-0 z-30 mt-2 w-full origin-top-right rounded-md bg-white dark:bg-gray-800 shadow-lg ring-1 ring-black dark:ring-gray-700 ring-opacity-5 focus:outline-none font-medium",children:(0,x.jsxs)("div",{className:"p-1",children:[(0,x.jsx)(o.W.Item,{children:({active:e})=>(0,x.jsxs)("button",{className:`${e?"bg-gray-50 dark:bg-black/40 dark:text-gray-400 dark:hover:text-white dark:stroke-white":""} group ${"Line"===this.state.type?"text-gray-900 stroke-gray-900 bg-gray-50 dark:bg-gray-700 dark:text-white":"text-gray-500 hover:text-gray-900"}  box-border dark:text-gray-400 dark:stroke-gray-400 flex w-full items-center rounded px-2 py-2 mb-0.5 text-sm transition ease-in-out duration-100`,href:"#",onClick:()=>this.onTypeChange("Line"),children:[(0,x.jsx)(E,{className:("Line"===this.state.type?"opacity-100":"opacity-60")+" group-hover:opacity-100 dark:text-white w-5 h-5 inline-block shrink-0 mr-1.5 transition-all ease-in-out duration-100"}),"Line"]})}),(0,x.jsx)(o.W.Item,{children:({active:e})=>(0,x.jsxs)("button",{className:`${e?"bg-gray-50 dark:bg-black/40 dark:text-gray-400 dark:hover:text-white dark:stroke-white":""} group ${"Duotone"===this.state.type?"text-gray-900 stroke-gray-900 bg-gray-50 dark:bg-gray-700 dark:text-white":"text-gray-500 hover:text-gray-900"}  box-border dark:text-gray-400 dark:stroke-gray-400 flex w-full items-center rounded px-2 py-2 mb-0.5 text-sm transition ease-in-out duration-100`,href:"#",onClick:()=>this.onTypeChange("Duotone"),children:[(0,x.jsx)(T,{className:"group-hover:text-gray-700 dark:text-white w-5 h-5 inline-block shrink-0 mr-1.5 transition ease-in-out duration-100"}),"Duotone"]})}),(0,x.jsx)(o.W.Item,{children:({active:e})=>(0,x.jsxs)("button",{className:`${e?"bg-gray-50 dark:bg-black/40 dark:text-gray-400 dark:hover:text-white dark:stroke-white":""} group ${"Solid"===this.state.type?"text-gray-900 stroke-gray-900 bg-gray-50 dark:bg-gray-700 dark:text-white":"text-gray-500 hover:text-gray-900"}  box-border dark:text-gray-400 dark:stroke-gray-400 flex w-full items-center rounded px-2 py-2 text-sm transition ease-in-out duration-100`,href:"#",onClick:()=>this.onTypeChange("Solid"),children:[(0,x.jsx)(P,{className:("Solid"===this.state.type?"opacity-100":"opacity-60")+" group-hover:opacity-100  dark:text-white w-5 h-5 inline-block shrink-0 mr-1.5 transition-all ease-in-out duration-100"}),"Social"]})})]})})})]})})]}),(0,x.jsxs)("div",{className:"mt-2 bg-gray-50 border border-gray-200 dark:bg-gray-700/50 dark:border-gray-700 rounded-md overflow-hidden",children:[this.state.iconsData?(0,x.jsx)("div",{ref:this.parentDivRef,className:"h-[300px] overflow-scroll p-2 bg-gray-100/50  dark:bg-gray-700/40",children:(0,x.jsx)("div",{ref:this.containerRef,children:this.getIconsPerType()&&this.getIconsPerType().length>0?(0,x.jsxs)("div",{id:"icons-app-grid",className:"icons-grid grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 xl:grid-cols-10 gap-1 mx-auto max-w-7xl text-center",children:[(0,x.jsx)("div",{onClick:()=>this.handlePixfortIconClick(""),children:(0,x.jsx)("div",{className:"min-h-[47px] bg-white relative group cursor-pointer border border-gray-200 hover:border-gray-300 hover:bg-gray-50/60 dark:border-gray-700 dark:hover:border-gray-600/70 dark:hover:bg-gray-800/50 rounded-md h-full transition-all ease-in-out duration-150"})},this.state.type+"-none"),Object.entries(this.getIconsPerType()).map((e=>""===this.state.search||e[1].name.includes(this.state.search)?(0,x.jsx)("div",{onClick:()=>this.handlePixfortIconClick(e[1].name),children:(0,x.jsx)(w,{id:e[1].name,data:e[1].icon,checked:!!this.state.value.includes(e[1].name)})},this.state.type+"-"+e[0]):null))]}):null})}):(0,x.jsxs)("div",{className:"min-h-[300px] h-[300px] p-4 py-3 text-gray-500 font-medium text-sm text-center flex items-center justify-center max-w-full animate-pulse",style:this.state.height,children:[(0,x.jsxs)("svg",{className:"animate-spin -ml-1 mr-3 h-5 w-5 text-gray",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24",children:[(0,x.jsx)("circle",{className:"opacity-25",cx:"12",cy:"12",r:"10",stroke:"currentColor",strokeWidth:"4"}),(0,x.jsx)("path",{className:"opacity-100",fill:"currentColor",d:"M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"})]}),"Loading..."]}),(0,x.jsx)("div",{children:(0,x.jsx)("input",{readOnly:!0,className:"relative w-full cursor-text bg-white dark:bg-gray-800 rounded-none border-0 border-t border-gray-200 dark:border-gray-700 text-gray-500 dark:text-gray-500 py-2 pl-2 text-left focus-visible:ring-0 focus-visible:ring-transparent focus-visible:ring-opacity-0 focus-visible:ring-offset-0 focus-visible:ring-offset-transparent text-xs dark:placeholder:text-gray-500",type:"text",value:C(this.state.iconsData,this.state.value,pixfort_options_data.isPixfortIcons),placeholder:"No icon selected"})})]})]}):(0,x.jsxs)(x.Fragment,{children:[(0,x.jsx)("input",{className:"mr-2",type:"text",onChange:this.handleChange,value:this.state.value}),(0,x.jsx)("input",{type:"text",onChange:this.handleSearch,placeholder:"Search...",value:this.state.search}),this.state.icons&&(0,x.jsxs)("div",{className:"icons-area",children:[(0,x.jsx)("div",{className:"pix-icon-item "+(""===this.state.value?"icon-selected":" "),onClick:()=>this.handleIconClick("")}),Object.keys(this.state.icons).map((e=>{const t=Object.keys(this.state.icons[e])[0],r=t===this.state.value?"icon-selected":"";return""===this.state.search||t.includes(this.state.search)?(0,x.jsx)("div",{className:`pix-icon-item ${r}`,onClick:()=>this.handleIconClick(t),children:(0,x.jsx)("i",{className:t})},e):null}))]})]})]})}}var A=_}}]);