"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[5384],{35384:function(e,i,a){a.r(i);var s=a(64467),n=a(96540),t=a(61225),l=a(57360),d=a(35152),o=a(44221),r=a(62273),c=a(37484),u=a(95746),h=a(72170),p=a(59199),v=a(51296),x=a(3878),b=a(5144),j=a(74848);const C=n.lazy((()=>Promise.all([a.e(8096),a.e(6437),a.e(5729),a.e(2784),a.e(6238),a.e(7311),a.e(9017),a.e(6288),a.e(3008),a.e(6060),a.e(8227)]).then(a.bind(a,8227)))),g=n.lazy((()=>a.e(3030).then(a.bind(a,93030)))),f=n.lazy((()=>Promise.all([a.e(8096),a.e(9042)]).then(a.bind(a,99042)))),k=n.lazy((()=>Promise.all([a.e(8096),a.e(3791)]).then(a.bind(a,53791))));class m extends n.Component{constructor(e){super(e),(0,s.A)(this,"onFieldChange",(e=>{let i=structuredClone(this.state.options),a=!1;for(let s in i)s===e.id&&(i[s].value=e.value,a=!0);a&&!0===this.props.uValsStatus&&this.setState({options:i})})),document.documentElement.classList.remove("dark"),this.state={options:this.props.optionsData.options}}dependencyCheck(e){let i=!1;if(e.hasOwnProperty("dependency")){let a=e.dependency,s=a.val,n=this.state.options;Object.keys(n).map((e=>{let t=n[e];e===a.field&&(console.log({option:t}),s.includes(t.value)&&(i=!0))}))}else i=!0;return i}render(){return(0,j.jsxs)("div",{className:"pix-main-builder-container data-main-js-div",children:[Object.keys(this.state.options).map((e=>{let i=this.state.options[e];switch(i.type){case"text":return(0,j.jsx)("div",{children:this.dependencyCheck(i)&&(0,j.jsx)(r.A,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})},e);case"multifields":return(0,j.jsx)("div",{children:(0,j.jsx)(n.Suspense,{fallback:(0,j.jsx)("div",{children:"Loading..."}),children:(0,j.jsx)(k,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})})},e);case"textarea":return(0,j.jsx)("div",{children:(0,j.jsx)(c.default,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})},e);case"tinymce":return(0,j.jsx)("div",{children:(0,j.jsx)(n.Suspense,{fallback:(0,j.jsx)(o.A,{}),children:(0,j.jsx)(g,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})})},e);case"image":return(0,j.jsx)("div",{children:(0,j.jsx)(h.default,{id:e,value:i.value,label:i.label,local:i.local,preview:i.preview,onChange:this.onFieldChange,description:i.description})},e);case"checkbox":return(0,j.jsx)("div",{className:"",children:(0,j.jsx)(p.default,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})},e);case"color":return(0,j.jsx)("div",{children:(0,j.jsx)(v.default,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})},e);case"icon":return(0,j.jsx)("div",{children:(0,j.jsx)(x.default,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})},e);case"header-builder":return(0,j.jsx)("div",{children:(0,j.jsx)(n.Suspense,{fallback:(0,j.jsx)(o.A,{}),children:(0,j.jsx)(C,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange})})},e);case"select":return(0,j.jsx)("div",{className:"",children:(0,j.jsx)(u.default,{id:e,value:i.value,default:i.default,label:i.label,options:i.options,description:i.description,onChange:this.onFieldChange})},e);case"conditions":return(0,j.jsx)("div",{children:(0,j.jsx)(b.A,{id:e,value:i.value,default:i.default,label:i.label,options:i.options,description:i.description,onChange:this.onFieldChange})},e);case"code":return(0,j.jsx)("div",{children:(0,j.jsx)(n.Suspense,{fallback:(0,j.jsx)("div",{children:"Loading..."}),children:(0,j.jsx)(f,{id:e,value:i.value,label:i.label,onChange:this.onFieldChange,description:i.description})})},e);case"number":return(0,j.jsx)("div",{children:"Number"},e)}})),Object.keys(this.state.options).map((e=>{let i=this.state.options[e];return(0,j.jsx)("div",{children:(0,j.jsx)("input",{type:"hidden",readOnly:!0,value:i.value,name:e})},e)}))]})}}i.default=(0,t.Ng)((e=>({optionsDataStatus:e.status.loadData,saveDataStatus:e.status.saveData,checkConfigStatus:e.status.checkConfig,checkConfigClassesStatus:e.status.checkConfigClasses,checkConfigErrorStatus:e.status.checkConfigError,uValsStatus:e.header.uVals,optionsData:e.data})),(e=>({loadHeader(i){e((0,d.Y7)(i))},checkConfig(i,a,s){e((0,l.l2)(i,a,s))}})))(m)}}]);