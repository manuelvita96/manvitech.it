"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[6437],{16437:function(e,s,t){t.r(s);var r=t(64467),n=t(96540),i=t(79017),l=t(93578),a=t(74848);class o extends n.Component{constructor(e){super(e),this.props.value?this.state={value:this.props.value}:this.state={value:""}}getIcon(e){if("info"===e)return(0,a.jsx)(i.A,{className:"shrink-0 inline-block h-8 w-8 leading-3"})}getLinkOneIcon(e){if("bookmark"===e)return(0,a.jsx)(l.A,{className:"shrink-0 inline-block h-5 w-5"})}render(){return(0,a.jsx)("div",{className:`mx-6 ${!0===this.props.hidePaddingBottom?"":"pb-6"} ${!0===this.props.hidePaddingTop?"":"pt-6"}`,children:(()=>{switch(this.props.style){case"clean":return(0,a.jsx)("div",{className:"bg-white dark:bg-gray-700/40 mt-[1px] border border-gray-200 dark:border-gray-700 shadow-sm rounded-md p-4",children:(0,a.jsxs)("div",{className:"flex flex-col sm:flex-row "+(this.props.label?"items-start":"items-center"),children:[this.props.icon&&(0,a.jsx)("div",{className:"text-primary mr-4 rtl:mr-0 rtl:ml-4 leading-3 -mb-[3px]",children:this.getIcon(this.props.icon)}),(0,a.jsxs)("span",{className:"text-sm justify-self-center",children:[this.props.label&&""!==this.props.label?(0,a.jsx)("span",{className:"mb-0 font-semibold text-gray-900 dark:text-white",children:this.props.label}):null,(0,a.jsx)("div",{className:`text-gray-500 ${this.props.label?"mt-1 rtl:mr-0 rtl:ml-1":null} leading-normal`,dangerouslySetInnerHTML:{__html:this.props.description}}),this.props.linkOneText&&this.props.linkOneHref?(0,a.jsx)("div",{className:"flex items-center justify-start",children:(0,a.jsxs)("a",{href:this.props.linkOneHref,className:"inline-flex items-center justify-center bg-primary/10 dark:bg-primary/20 rounded-full py-1.5 pl-2.5 pr-3 text-xs text-primary font-medium mt-2.5 mb-1 hover:opacity-80 transition-opacity ease-in-out duration-100 outline-none focus:outline-none shadow-none",target:"_blank",children:[this.props.linkOneIcon?(0,a.jsx)("span",{className:"text-primary mr-1 rtl:mr-0 rtl:ml-1 leading-[0rem]",children:this.getLinkOneIcon(this.props.linkOneIcon)}):null,this.props.linkOneText]})}):null]})]})});case"simple":return(0,a.jsxs)("div",{className:"bg-gray-100/50 rounded-md dark:bg-gray-700/40 text-sm px-6 py-4 mt-[1px] border border-gray-200/80 dark:border-gray-700",children:[this.props.label&&""!==this.props.label?(0,a.jsx)("span",{className:"mb-0 font-medium tracking-[-0.01em] text-gray-900 dark:text-white",children:this.props.label}):null,(0,a.jsx)("div",{className:`text-gray-500 ${this.props.label?"mt-1":""} leading-normal`,dangerouslySetInnerHTML:{__html:this.props.description}}),this.props.linkOneText&&this.props.linkOneHref?(0,a.jsx)("div",{className:"flex items-center justify-start",children:(0,a.jsxs)("a",{href:this.props.linkOneHref,className:"inline-flex items-center justify-center bg-primary/10 dark:bg-primary/20 rounded-full py-1.5 pl-2.5 pr-3 text-xs text-primary font-medium mt-2.5 mb-1.5 hover:opacity-80 transition-opacity ease-in-out duration-100 outline-none focus:outline-none shadow-none",target:"_blank",children:[this.props.linkOneIcon?(0,a.jsx)("span",{className:"text-primary mr-1 rtl:mr-0 rtl:ml-1 leading-[0rem]",children:this.getLinkOneIcon(this.props.linkOneIcon)}):null,this.props.linkOneText]})}):null]});default:return(0,a.jsx)("div",{className:"bg-yellow-100/70 rounded-md p-4",children:(0,a.jsxs)("div",{className:"flex flex-col sm:flex-row items-start sm:items-center",children:[this.props.icon&&(0,a.jsx)("span",{className:"text-yellow-600 mr-4",children:this.getIcon(this.props.icon)}),(0,a.jsxs)("span",{className:"text-sm",children:[(0,a.jsx)("span",{className:"mb-0 font-semibold text-yellow-900",children:this.props.label}),(0,a.jsx)("div",{className:"text-yellow-800 mt-1 leading-normal",dangerouslySetInnerHTML:{__html:this.props.description}})]})]})})}})()})}}(0,r.A)(o,"defaultProps",{label:"",value:"",onChange:()=>{}}),s.default=o}}]);