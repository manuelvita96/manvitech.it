"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[9199],{59199:function(e,t,s){s.r(t);var a=s(64467),i=s(96540),r=s(80094),l=s(94738),n=s(74848);class o extends i.Component{constructor(e){super(e),this.props.value&&""!==this.props.value?"on"===this.props.value||1===this.props.value||"1"===this.props.value?this.state={value:!0,finalValue:"1"}:0===this.props.value||"0"===this.props.value||"false"===this.props.value?this.state={value:!1,finalValue:"0"}:"off"===this.props.value?this.state={value:!1,finalValue:""}:this.state={value:this.props.value,finalValue:this.props.value}:this.state={value:!1,finalValue:""},this.handleChange=this.handleChange.bind(this)}handleChange(e){e?this.setState({finalValue:"1"}):this.setState({finalValue:""}),this.setState({value:e}),this.props.onChange({value:e,id:this.props.id})}render(){return(0,n.jsxs)("div",{className:`flex items-center mx-6 py-6 ${!0===this.props.hideBorderBottom?"":"border-b border-gray-100"} ${!0===this.props.showBorderTop?"border-t border-gray-100":""} dark:border-gray-700 `,children:[(0,n.jsx)("div",{}),(0,n.jsxs)("div",{className:"pr-2 text-sm grow",children:[(0,n.jsxs)("label",{className:"mb-0 inline-flex items-center cursor-auto",children:[(0,n.jsx)("span",{className:"font-medium tracking-[-0.01em] text-gray-900 dark:text-white",children:this.props.label}),this.props.tooltipImage||this.props.tooltipText?(0,n.jsx)(r.A,{tooltipText:this.props.tooltipText,tooltipImage:this.props.tooltipImage,type:"default"}):null]}),(0,n.jsx)("div",{className:"mt-1 text-gray-500 md:max-w-[80%] w-full pr-6 rtl:pr-0 rtl:pl-6",dangerouslySetInnerHTML:{__html:this.props.description}})]}),(0,n.jsx)("div",{className:"pix-switch-div",children:(0,n.jsxs)(l.d,{checked:this.state.value,onChange:this.handleChange,className:(this.state.value?"bg-green-400":"bg-gray-300 dark:bg-gray-700")+"\n          relative inline-flex h-[34px] w-[68px] shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2  focus-visible:ring-white focus-visible:ring-opacity-75 p-0",children:[(0,n.jsx)("span",{className:"sr-only",children:"Use setting"}),(0,n.jsx)("span",{"aria-hidden":"true",className:(this.state.value?"translate-x-[34px] rtl:translate-x-[-34px]":"translate-x-0 dark:bg-gray-500")+"\n            pointer-events-none inline-block h-[30px] w-[30px] transform rounded-full bg-white  shadow-lg ring-0 transition duration-200 ease-in-out"})]})})]})}}(0,a.A)(o,"defaultProps",{label:"Switch Input",value:!1,onChange:()=>{}}),t.default=o}}]);