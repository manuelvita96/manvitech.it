"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[1866],{91866:function(e,t,a){a.r(t);var n=a(64467),i=a(96540),s=a(60990),l=a(22771),o=a(61225),r=a(57360),d=a(35152),c=a(3878),m=a(92784),h=a(95746),p=a(62273),u=a(27311),g=a(74848);class x extends i.Component{constructor(e){super(e),(0,n.A)(this,"onOpenModal",(e=>(e.stopPropagation(),e.preventDefault(),this.setState({open:!0}),!1))),(0,n.A)(this,"onCloseModal",(()=>{this.setState({open:!1,modalClasses:""})})),(0,n.A)(this,"onFieldChange",(e=>{let t=structuredClone(this.state.options),a=!1;t.forEach(((n,i)=>{t[i].name===e.id&&(t[i].val=e.value,a=!0)})),a||t.push({name:e.id,val:e.value}),this.setState({options:t})})),(0,n.A)(this,"onSaveModal",(()=>{this.setState({open:!1});let e=[],t=structuredClone(this.state.options);t.forEach(((a,n)=>{let i={};i.name=t[n].name,i.val=t[n].val,e.push(i)})),this.state.res&&(this.state.res.value=JSON.stringify(e))})),this.state={open:!1,options:{test:123},res:!1,modalAnimationIn:"customEnterModalAnimation",modalClasses:""},this.handleClick=this.handleClick.bind(this)}componentDidMount(){document.addEventListener("click",this.handleClick)}componentWillUnmount(){document.removeEventListener("click",this.handleClick)}dependencyCheck(e){let t=!1;if(e.hasOwnProperty("dependency")){let a=e.dependency,n=a.val.split(/(\s+)/),i=this.state.options;i.forEach(((e,s)=>{i[s].name===a.field&&n.includes(i[s].val)&&(t=!0)}))}else t=!0;return t}handleClick(e){if(e.target&&e.target.matches(".pixfort_menu_item_btn")){e.preventDefault();let t=2,a=e.target.closest(".menu-item");a&&(a.classList.contains("menu-item-depth-0")&&(t=0),a.classList.contains("menu-item-depth-1")&&(t=1),a.classList.contains("menu-item-depth-2")&&(t=2));let n={enable_mega:!1},i=e.target.closest(".pix-menu-item-opts").querySelector(".pix-mega-opt input"),s=!!i&&i.checked,l="pix-normal-menu-item";s&&(l="pix-mega-menu-item");let o=e.target.parentElement.querySelector(".pix-menu-item-res-data"),r=o?o.value:"",d=[];if(d.push({type:"icon",name:"menu_item_icon",title:"Icon",classes:"",val:""}),s&&d.push({type:"select",name:"mega_style",title:"Mega Menu Size",val:"",classes:"pix_mega_opt",options:[{value:"",name:"Default"},{value:"pix-mega-style-sm",name:"Small"},{value:"pix-mega-style-md",name:"Medium"},{value:"pix-mega-style-lg",name:"Big"},{value:"pix-mega-style-full",name:"Full width"}]}),2===t&&d.push({type:"select",name:"menu_item_style",title:"Menu item Style",val:"",classes:"pix_item_opt",options:[{value:"",name:"Default"},{value:"pix-item-heading",name:"Heading item"}],desc:"This option will be applied if this item is not converted to Box item."}),r){let t=!1;try{t=JSON.parse(r)}catch(e){console.log("Menu item data is not valid!")}t&&t.forEach((function(e){d.forEach((function(t){t.name===e.name&&(t.val=e.val)}))}))}this.setState({open:!0,options:d,res:o}),console.log({lvl:t,opts:n,isMega:s,isMegaClass:l,res_val:r})}}test(){}render(){return(0,g.jsx)(g.Fragment,{children:(0,g.jsx)("div",{children:(0,g.jsx)(s.e,{appear:!0,show:this.state.open,as:i.Fragment,children:(0,g.jsxs)(l.l,{as:"div",static:!0,className:"pix-header-options-area pix-main-header-modal relative z-[10000]",onClose:this.test,children:[(0,g.jsx)(s.e.Child,{as:i.Fragment,enter:"ease-out duration-200",enterFrom:"opacity-0",enterTo:"opacity-100",leave:"ease-in duration-200",leaveFrom:"opacity-100",leaveTo:"opacity-0",children:(0,g.jsx)("div",{className:"fixed inset-0 bg-gradient-to-t from-gray-100/90 to-white/30 dark:bg-gradient-to-t dark:from-gray-900 dark:to-gray-800/20"})}),(0,g.jsx)("div",{className:"fixed inset-0 overflow-y-auto z-[10000]",children:(0,g.jsx)("div",{className:"flex min-h-full items-center justify-center p-4 text-center",children:(0,g.jsx)(s.e.Child,{as:i.Fragment,enter:"transition-all ease-out duration-100",enterFrom:"transform opacity-0 scale-95 translate-y-4",enterTo:"transform opacity-100 scale-100 translate-y-0",leave:"transition-all ease-in duration-100",leaveFrom:"transform opacity-100 scale-100 translate-y-0",leaveTo:"transform opacity-0 scale-95 translate-y-4",children:(0,g.jsxs)(l.l.Panel,{className:"w-full max-w-3xl my-[100px] transform rounded-lg bg-white border border-gray-200 dark:border-gray-700 dark:bg-gray-800 shadow-2xl shadow-gray-300 dark:shadow-gray-900 ring-0 ring-transparent ring-opacity-0 z-10 focus:outline-none text-left  rtl:text-right align-middle transition-all",children:[(0,g.jsx)(l.l.Title,{as:"h3",className:"px-6 py-4 border-b border-gray-200 text-sm font-medium text-gray-900 dark:text-white dark:border-b dark:border-gray-700 tracking-[-0.015em]",children:(0,g.jsxs)("div",{className:"flex items-center justify-between",children:["Menu Item Options",(0,g.jsx)("button",{type:"button",className:"inline-flex text-xs items-center justify-center font-medium text-gray-400 dark:text-gray-500 dark:hover:text-white hover:opacity-80 transition-all ease-in-out duration-200 outline-none focus:outline-none",onClick:this.onCloseModal,children:(0,g.jsx)(u.A,{className:"shrink-0 inline-block text-gray-400 dark:text-gary-500 w-7 h-7"})})]})}),(0,g.jsx)("div",{className:"pix-modal-option-content bg-white",children:this.state.options&&this.state.options.length?(0,g.jsx)(g.Fragment,{children:Object.keys(this.state.options).map((e=>{let t=this.state.options[e],a=t.val;switch(t.type){case"pixid":return(0,g.jsx)("div",{className:"",children:this.dependencyCheck(t)&&(0,g.jsx)(m.A,{id:t.name,value:a,label:t.title,isHidden:!0,auto:!0,onChange:this.onFieldChange})},e);case"text":return(0,g.jsx)("div",{className:"modal-option-field",children:this.dependencyCheck(t)&&(0,g.jsx)(p.A,{id:t.name,value:a,label:t.title,description:t.description,onChange:this.onFieldChange})},e);case"icon":return(0,g.jsx)("div",{className:"modal-option-field",children:this.dependencyCheck(t)&&(0,g.jsx)(c.default,{id:t.name,value:a,label:t.title,onChange:this.onFieldChange})},e);case"select":return(0,g.jsx)("div",{className:"modal-option-field",children:this.dependencyCheck(t)&&(0,g.jsx)(h.default,{id:t.name,default:t.val,store:"header",value:a,label:t.title,options:t.options,description:t.description,onChange:this.onFieldChange,storePath:{type:"area",area:this.props.area}})},e)}}))}):null}),(0,g.jsx)("div",{className:"px-6 py-4 flex flex-col md:flex-row items-center justify-end border-t border-gray-200 -mt-[1px]",children:(0,g.jsxs)("div",{className:"tracking-[-0.015em] text-sm",children:[(0,g.jsx)("button",{type:"button",className:"mr-3 rtl:mr-0 rtl:ml-2 inline-flex items-center justify-center rounded-md border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 px-6 py-2.5 font-medium text-gray-900 dark:text-gray-400 dark:hover:text-white hover:bg-gray-100/80 shadow-sm dark:hover:bg-gray-600/80 transition-all ease-in-out duration-150 outline-none",onClick:this.onCloseModal,children:"Cancel"}),(0,g.jsx)("button",{onClick:this.onSaveModal,className:"inline-flex items-center justify-center rounded-md border border-black/10 dark:border-white/20 bg-primary dark:bg-primary px-10 py-2.5 font-medium text-white dark:text-white hover:bg-primary/90 dark:hover:bg-gray-100/90 sahdow-sm transition-all ease-in-out duration-150 focus:outline-none",type:"button",children:"Save"})]})})]})})})})]})})})})}}t.default=(0,o.Ng)((e=>({optionsDataStatus:e.status.loadData,saveDataStatus:e.status.saveData,optionsData:e.data,uValsStatus:e.header.uVals,main:e.main})),(e=>({loadData(t){e((0,r.Ze)(t))},loadHeader(t){e((0,d.Y7)(t))}})))(x)}}]);