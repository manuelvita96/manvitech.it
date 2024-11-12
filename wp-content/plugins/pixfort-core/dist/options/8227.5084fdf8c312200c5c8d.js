"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[8227],{8227:function(e,t,a){a.r(t),a.d(t,{default:function(){return D}});var r=a(64467),s=a(96540),o=a(61225),i=a(57360),n=a(35152),l=a(4966),d=a(28393),c=a(66060),x=a(97016),m=a(43375),p=a(43627),h=a(74979),u=a(91691),g=a(74848);function b({id:e,name:t,val:a,area:r,col:s,generator:o=!1}){const{attributes:i,listeners:n,setNodeRef:l,transform:d,transition:c,isDragging:x}=(0,p.gl)({id:e}),m={transform:h.Ks.Transform.toString(d),transition:c};return(0,g.jsx)("div",{ref:l,style:m,className:"item inline-flex "+(o||"menu"!==t?"":"grow"),...i,...n,children:x?(0,g.jsx)("div",{className:"flex rounded-md outline-dashed outline-1 outline-offset-[-1px] outline-gray-400/80 animate-[pulse_0.75s_ease-in-out_infinite] box-content "+("menu"===t?"grow basis-auto":""),children:(0,g.jsx)("div",{className:"opacity-0",children:(0,g.jsx)(u.A,{item:{id:e,name:t,val:a},itemID:e,area:r,col:s,generator:o,children:t})})}):(0,g.jsx)(u.A,{item:{id:e,name:t,val:a},itemID:e,area:r,col:s,generator:o,children:t})})}var f=a(76880),v=a(45084);function y({id:e,data:t,area:a,col:r,destinationCol:s,title:i="Column Settings",containerClasses:n="",generator:l=!1}){const{isOver:d,setNodeRef:c}=(0,m.zM)({id:e}),h=(0,o.d4)((e=>e.header.modalOpen)),u=function(e){if(e)for(const t in e){const a=e[t];if("align"===a.name)switch(a.val){case"text-left":return"justify-start";case"text-center":return"justify-center";case"text-right":return"justify-end";case"d-flex":return"justify-between"}}return""}(t.opts);return(0,g.jsxs)("div",{className:`${s===r?"bg-primary/15":"bg-white"} ${n}`,children:[(0,g.jsxs)(f.A,{title:i,options:v.b.col_area.options,area:a,col:r,itemType:"col",linkClasses:"group/column flex items-center absolute z-10 right-[-5px] top-[-10px] rtl:left-[-5px] rtl:right-auto shadow-sm opacity-0 group-hover:opacity-100 bg-white border border-gray-200 dark:border-gray-700 py-1 px-[5px] rounded-md transition-opacity ease-in-out duration-150 active:text-inherit hover:text-inherit",data:t.opts,children:[(0,g.jsx)("span",{className:"text-xs font-medium inline-block relative mr-1 rtl:mr-0 rtl:ml-1 text-gray-500",children:"Column Settings"}),(0,g.jsx)(x.A,{className:"group-hover/column:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]}),(0,g.jsx)(p.gB,{id:r,disabled:h,items:t.val,strategy:p.m$,children:(0,g.jsx)("div",{ref:c,className:`inline-flex ${u} gap-2 mb-0 w-full rounded-md shadow-none h-[68px] px-2 py-2 box-border overflow-x-scroll transition-all ease-in-out duration-100 `,children:t.val.map((e=>(0,g.jsx)(b,{id:e.id,area:a,col:r,name:e.name,val:e.val,generator:l},e.id)))})})]})}var k=a(54018),j=a(99293);const _={topbar_1:[],topbar_2:[],topbar_3:[],header_1:[],header_2:[],header_3:[],stack_1:[],stack_2:[],stack_3:[],m_topbar_1:[],m_header_1:[],m_stack_1:[],trash_area:[]};function N(e){const t=(0,o.d4)((e=>e.header)),[a,r]=(0,s.useState)(_),[i,n]=(0,s.useState)(null),[l,d]=(0,s.useState)(!1),[c,p]=(0,s.useState)(!1),[h,u]=(0,s.useState)(!1),[b,k]=(0,s.useState)(!1),N=(0,m.FR)((0,m.MS)(m.cA,{activationConstraint:{distance:1},onStart(e){e.preventDefault()}}),(0,m.MS)(m.AN,{activationConstraint:{distance:1},onStart(e){e.preventDefault()}}),(0,m.MS)(m.IG,{activationConstraint:{delay:250,tolerance:115}})),C=e=>{const a=t.data;for(const t in a){const r=a[t];if(r.val)for(let t in r.val){const a=r.val[t];if(t===e)return a.val}}},D=e=>{if(t.items.find((t=>t.id===e)))return"items_source";const a=t.data;for(const t in a){const r=a[t];if(r.val)for(let t in r.val){const a=r.val[t];if(a.val)for(let r in a.val){if(a.val[r].id===e)return t}}}return!1},A=e=>{const a=t.items.findIndex((t=>t.id===e));if(a&&-1!==a)return a;const r=t.data;for(const t in r){const a=r[t];if(a.val)for(let t in a.val){const r=a.val[t];if(r.val)for(let t in r.val){if(r.val[t].id===e)return t}}}return!1},M=i?(e=>{const a=t.items.findIndex((t=>t.id===e));if(a&&-1!==a)return t.items[a];const r=t.data;for(const t in r){const a=r[t];if(a.val)for(let t in a.val){const r=a.val[t];if(r.val)for(let t in r.val){const a=r.val[t];if(a.id===e)return a}}}return!1})(i):null;return(0,g.jsxs)(m.Mp,{sensors:N,collisionDetection:m.TT,onDragStart:e=>{const{active:t}=e,a=D(t.id);u(a),n(t.id),d(!0)},onDragOver:t=>{const{active:r,over:s}=t;if(!s)return;const o=D(r.id),i=s.id in a?s.id:D(s.id);if(k(i),!o||!i||o===i)return;if("generator"===i||"items_source"===i||"items_source_2"===i||"trash_area"===i)return;const n=Number(A(r.id)),l=C(i).length;"generator"===o||"items_source"===o||"items_source_2"===o?c||(e.onDragEnd({source:{index:n,droppableId:o},destination:{droppableId:i,index:l}}),p(!0)):e.onDragEnd({source:{index:n,droppableId:o},destination:{droppableId:i,index:l}})},onDragEnd:t=>{const{active:r,over:s}=t;if(d(!1),p(!1),k(!1),!s)return void n(null);const o=D(r.id),i=s.id in a?s.id:D(s.id);if(o&&i)if("generator"!==i&&"items_source"!==i&&"items_source_2"!==i){if("trash_area"===i){if("items_source"!==o){const t=C(o).findIndex((e=>e.id===r.id));e.onDragEnd({source:{index:t,droppableId:o},destination:{droppableId:i,index:1}})}}else{const t=C(i).findIndex((e=>e.id===r.id)),a=C(i).findIndex((e=>e.id===s.id)),n=-1===a?C(i).length:a;o===i&&e.onDragEnd({source:{index:t,droppableId:o},destination:{droppableId:i,index:n}})}n(null)}else n(null)},autoScroll:!1,keyboardCoordinatesGetter:null,children:[(0,g.jsxs)("div",{className:"border border-gray-300 border-dashed px-3 py-3 rounded-xl",children:["desktop"===e.responsiveMode&&(0,g.jsxs)(g.Fragment,{children:[(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Top bar area Settings",options:v.b.topbar_area.options,area:"topbar",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.topbar.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Top bar Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsxs)("div",{className:"flex gap-2 mb-2",children:[(0,g.jsx)(y,{id:"topbar_1",area:"topbar",col:"topbar_1",destinationCol:b,data:t.data.topbar.val.topbar_1,containerClasses:"shrink w-1/2 max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"}),(0,g.jsx)(y,{id:"topbar_2",area:"topbar",col:"topbar_2",destinationCol:b,data:t.data.topbar.val.topbar_2,containerClasses:"shrink w-1/2 max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"})]})]}),(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Main Header area Settings",options:v.b.header_area.options,area:"header",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.header.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Main header area Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsx)("div",{className:"flex gap-2 mb-2",children:(0,g.jsx)(y,{id:"header_1",area:"header",col:"header_1",destinationCol:b,data:t.data.header.val.header_1,containerClasses:"flex w-full max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"})})]}),(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Stack area Settings",options:v.b.stack_area.options,area:"stack",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.stack.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Stack Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsxs)("div",{className:"flex gap-2",children:[(0,g.jsx)(y,{id:"stack_1",area:"stack",col:"stack_1",destinationCol:b,data:t.data.stack.val.stack_1,containerClasses:"shrink w-1/3 max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg"}),(0,g.jsx)(y,{id:"stack_2",area:"stack",col:"stack_2",destinationCol:b,data:t.data.stack.val.stack_2,containerClasses:"shrink w-1/3 max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg"}),(0,g.jsx)(y,{id:"stack_3",area:"stack",col:"stack_3",destinationCol:b,data:t.data.stack.val.stack_3,containerClasses:"shrink w-1/3 max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg"})]})]})]}),"mobile"===e.responsiveMode&&(0,g.jsxs)("div",{children:[(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Top bar area Settings",options:v.b.m_topbar_area.options,area:"m_topbar",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.m_topbar.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Top bar Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsx)("div",{className:"flex gap-2 mb-2",children:(0,g.jsx)(y,{id:"m_topbar_1",area:"m_topbar",col:"m_topbar_1",data:t.data.m_topbar.val.m_topbar_1,destinationCol:b,containerClasses:"flex w-full max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"})})]}),(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Header area Settings",options:v.b.m_header_area.options,area:"m_header",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.m_header.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Main header area Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsx)("div",{className:"flex gap-2 mb-2",children:(0,g.jsx)(y,{id:"m_header_1",area:"m_header",col:"m_header_1",data:t.data.m_header.val.m_header_1,destinationCol:b,containerClasses:"flex w-full max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"})})]}),(0,g.jsxs)("div",{className:"",children:[(0,g.jsx)(f.A,{title:"Stack area Settings",options:v.b.m_stack_area.options,area:"m_stack",itemType:"area",linkClasses:"inline-block hover:opacity-80 transition-opacity ease-in-out duration-100",data:t.data.m_stack.opts,children:(0,g.jsxs)("h5",{className:"group/area flex items-center gap-[3px] text-gray-500 dark:text-gray-400 mb-1.5 text-xs font-medium ml-2 rtl:ml-0 rtl:mr-2",children:["Stack Settings ",(0,g.jsx)(x.A,{className:"text-gray-400 group-hover/area:rotate-180 transition-all ease-in-out duration-200",iconName:"settings"})]})}),(0,g.jsx)("div",{className:"flex gap-2",children:(0,g.jsx)(y,{id:"m_stack_1",area:"m_stack",col:"m_stack_1",destinationCol:b,data:t.data.m_stack.val.m_stack_1,containerClasses:"flex w-full max-h-[68px] box-content group relative shadow-sm border border-gray-200 dark:border-gray-700 rounded-lg mb-1"})})]})]})]}),(0,g.jsx)(m.Hd,{children:M?(0,g.jsx)(j.A,{item:M,area:h,col:"overlay",overlay:!0}):null}),(0,g.jsx)("div",{className:"relative flex items-center justify-center my-4",children:(0,g.jsx)(S,{})}),(0,g.jsx)("div",{className:(l?"pointer-events-none":"")+" mb-2 flex gap-2 justify-between",children:(0,g.jsx)("div",{className:"flex flex-col gap-2 bg-white shadow-sm rounded-xl border border-gray-200 p-4 overflow-x-scroll w-full",children:(0,g.jsx)(w,{items:t.items})})})]})}const w=({items:e})=>{const{setNodeRef:t}=(0,m.zM)({id:"items_source",data:{source:"generator"}});return(0,g.jsxs)("div",{ref:t,children:[(0,g.jsxs)("div",{children:[(0,g.jsx)("h5",{className:"text-xs font-medium text-gray-950 dark:text-white",children:"Essentials"}),(0,g.jsx)("div",{className:" flex gap-2 w-full my-2 h-[52px]",children:e.map(((e,t)=>"misc"!==e.category?(0,g.jsx)(b,{id:e.id,area:"items_source",name:e.name,val:e.val,generator:!0},t):null))})]}),(0,g.jsxs)("div",{children:[(0,g.jsx)("h5",{className:"text-xs font-medium text-gray-950 dark:text-white",children:"Miscellaneous"}),(0,g.jsx)("div",{className:"flex gap-2 w-full mt-2 h-[52px]",children:e.map(((e,t)=>"misc"===e.category?(0,g.jsx)(b,{id:e.id,area:"items_source",name:e.name,val:e.val,generator:!0},t):null))})]})]})},S=()=>{const{isOver:e,setNodeRef:t}=(0,m.zM)({id:"trash_area"});return(0,g.jsx)("div",{ref:t,className:` ${e?"is-dragOver min-h-24 bg-rose-500/20 animate-[pulse_0.9s_ease-in-out_infinite] border-rose-400":"bg-gray-300/10 min-h-20 border-gray-300 dark:border-700"} w-full h-full flex items-center justify-center p-8 rounded-xl border border-dashed transition-all ease-in-out duration-200`,children:(0,g.jsxs)("span",{className:`font-medium text-xs ${e?"text-rose-600":"text-gray-500"} absolute top-0 right-0 bottom-0 left-0 flex items-center justify-center gap-1`,children:[(0,g.jsx)(k.A,{className:` ${e?"":"text-gray-400"} w-5 h-5 shrink-0 inline-block`})," Drop to Delete"]})})};class C extends s.Component{constructor(e){super(e),(0,r.A)(this,"onDragEnd",(e=>{const{source:t,destination:a}=e;a&&this.props.headerDragEnd({source:t,destination:a})})),(0,r.A)(this,"handleInputChange",(e=>{let t=e.target.value;this.props.updateData(this.props.id,t),this.setState({value:t})})),(0,r.A)(this,"swtichToDesktop",(e=>{e.preventDefault(),this.setState({responsiveMode:"desktop",desktopState:"is_active",mobileState:""})})),(0,r.A)(this,"swtichToMobile",(e=>{e.preventDefault(),this.setState({responsiveMode:"mobile",desktopState:"",mobileState:"is_active"})})),(0,r.A)(this,"deleteAllContent",(e=>{e.preventDefault(),this.props.deleteHeaderContent();let t=this.state.ts+1;this.setState({ts:t});let a=this;setTimeout((()=>{t+=1,a.setState({ts:t})}),20)})),this.state={value:this.props.value,responsiveMode:"desktop",desktopState:"is_active",mobileState:"",ts:1},this.props.loadHeader(this.props.value)}getElementClasses(e){switch(e){case"wishlist":case"cart":return"text-rose-500 bg-red-50/90 border border-rose-200/80 backdrop-blur-md";case"btn":case"menu":return"text-emerald-500 bg-emerald-50 border border-emerald-200/80 backdrop-blur-md";case"social":case"logo":return"text-blue-500 bg-blue-50/90 border border-blue-200/80 backdrop-blur-md";case"language":case"search":return"text-amber-500 bg-amber-50/90 border border-orange-200/80 backdrop-blur-md";default:return"text-gray-500 bg-white border border-gray-200"}}componentDidUpdate(e,t){e.headerData.data!==this.props.headerData.data&&this.props.onChange({value:JSON.stringify(this.props.headerData.data),id:this.props.id})}render(){return"SUCCESS"===this.props.headerDataStatus&&this.props.headerData.isReady&&this.state.ts?(0,g.jsxs)("div",{className:"bg-gray-100 dark:bg-gray-900 box-border relative p-4 pb-4 border-b border-gray-300 tracking-[-0.0125em]",children:[(0,g.jsxs)("div",{className:"mb-4 grid grid-cols-12 items-center justify-between px-4 py-2",children:[(0,g.jsxs)("div",{className:"col-span-6 xl:col-span-4 flex flex-row gap-4 justify-start items-center ",children:[(0,g.jsx)("a",{href:"https://pixfort.com/",target:"_blank",className:"shadow-none leading-none",children:(0,g.jsx)(l.A,{className:"shrink-0 text-gray-600/60 dark:text-gray-500 focus:outline-none w-8"})}),(0,g.jsxs)("div",{className:"flex flex-col",children:[(0,g.jsx)("h3",{className:"text-base font-semibold text-gray-950 dark:text-white",children:"Header Builder"}),(0,g.jsxs)("a",{className:"-ml-1.5 px-1.5 py-1 gap-0.5 stroke-gray-700 hover:stroke-gray-900 text-gray-500 dark:text-gray-500 hover:text-gray-600 dark:hover:text-white hover:bg-gray-200/60 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-md text-xs font-medium align-middle inline-flex items-center transition ease-in-out duration-100 group shadow-none",href:"https://essentials.pixfort.com/knowledge-base/creating-website-header/",target:"_blank",title:"Getting Started?",children:[(0,g.jsx)("span",{className:"inline-block",children:"Getting Started?"}),(0,g.jsx)(c.A,{className:"w-[13px] h-[13px] rtl:scale-x-[-1]","aria-hidden":"true"})]})]})]}),(0,g.jsxs)("div",{className:"col-span-6 xl:col-span-4 flex items-center justify-end xl:justify-center gap-1 text-xs font-semibold",children:[(0,g.jsxs)("a",{href:"#",onClick:this.swtichToDesktop,className:`flex items-center gap-1 p-2 border rounded-lg ${this.state.desktopState?"bg-white border-gray-200 shadow-sm text-gray-950":"text-gray-500 border-transparent focus:shadow-none hover:bg-gray-200/60 hover:text-gray-600"} outline-none focus:outline-none `,children:[(0,g.jsx)(x.A,{iconName:"desktop"}),"Desktop"]}),(0,g.jsxs)("a",{href:"#",onClick:this.swtichToMobile,className:`xl:mr-[-63px] rtl:xl:mr-0 rtl:xl:ml-[-63px] flex items-center gap-1 p-2 border rounded-lg ${this.state.mobileState?"bg-white border-gray-200 shadow-sm text-gray-950":"text-gray-500 border-transparent focus:shadow-none hover:bg-gray-200/60 hover:text-gray-600"} outline-none focus:outline-none`,children:[(0,g.jsxs)("span",{className:"flex items-center",children:[(0,g.jsx)(x.A,{iconName:"tablet",className:"-mr-[1px]"}),"+",(0,g.jsx)(x.A,{iconName:"mobile",className:"-ml-[3px]"})]}),"Tablet & Mobile"]})]}),(0,g.jsx)("div",{className:"hidden xl:col-span-4 xl:inline-block text-right rtl:text-left",children:(0,g.jsxs)("a",{href:"#",className:"group inline-flex p-2 rounded-lg hover:bg-gray-200/60 hover:text-gray-600 items-center justify-end self-end text-xs font-medium gap-[3px] text-gray-500 outline-none focus:outline-none shadow-none transition-all ease-in-out duration-100",onClick:e=>{window.confirm("Are you sure that you want to delete all Header elements?")&&this.deleteAllContent(e)},children:[(0,g.jsx)(d.A,{className:"-ml-0.5 h-4 w-4 shrink-0 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-400 rotate-[0deg] group-hover:-rotate-[30deg] transition-all ease-in-out duration-200"}),"Reset Elements"]})})]}),(0,g.jsx)(N,{onDragEnd:this.onDragEnd,responsiveMode:this.state.responsiveMode}),(0,g.jsx)("div",{className:"font-normal text-xs mx-6 pt-4 text-gray-400/80 text-center dark:text-gray-500/80",children:"pixfort © All rights reserved."})]}):(0,g.jsx)("div",{children:"Loading..."})}}var D=(0,o.Ng)((e=>({headerDataStatus:e.status.loadHeaderData,headerData:e.header})),(e=>({updateData(t,a){e((0,i.O6)(t,a))},headerDragEnd(t){e((0,n.xz)(t))},loadHeader(t){e((0,n.Y7)(t))},deleteHeaderContent(){e((0,n.em)())}})))(C)}}]);