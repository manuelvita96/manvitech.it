"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[8498],{38498:function(t,e,s){s.r(e);var r=s(64467),i=s(96540),a=s(64710),l=s(95942),o=s(80094),p=s(74848);class h extends i.Component{constructor(t){super(t),(0,r.A)(this,"handleInputChange",(t=>{let e=t.target.value;if(this.state.responsive){let t=structuredClone(this.state.values);t[this.state.mode]=e;let s="";"tablet"!==this.state.mode||e?"mobile"!==this.state.mode||e||(s=""!==this.state.values.tablet?"Inherited from Tablet":"Inherited from Desktop"):s="Inherited from Desktop",this.setState({placeholder:s,values:t,currentValue:e}),this.props.onChange({value:JSON.stringify(t),id:this.props.id})}else this.setState({currentValue:e}),this.props.onChange({value:e,id:this.props.id})})),(0,r.A)(this,"setSelectedMode",(t=>{if(this.state.responsive){let e="";"tablet"!==t||this.state.values.tablet?"mobile"!==t||this.state.values.mobile||(e=""!==this.state.values.tablet?"Inherited from Tablet":"Inherited from Desktop"):e="Inherited from Desktop",this.setState({placeholder:e,mode:t,currentValue:this.state.values[t]})}})),(0,r.A)(this,"getPlaceholder",(()=>{let t=this.state.values.desktop;return"mobile"!==this.state.mode&&"tablet"!==this.state.mode||"mobile"===this.state.mode&&""!==this.state.values.tablet&&(t=this.state.values.tablet),t}));let e="";this.props.value?e=this.props.value:this.props.default&&(e=this.props.default,this.props.responsive?this.props.onChange({value:JSON.stringify(e),id:this.props.id}):this.props.onChange({value:e,id:this.props.id}));let s=e,i=(0,a.Qc)(e),l=!1;this.props.responsive&&(l=!0,s=i.desktop),this.state={responsive:l,placeholder:"",mode:"desktop",values:i,value:e,currentValue:s}}render(){return(0,p.jsxs)("div",{className:`flex flex-col sm:flex-row justify-between items-start sm:items-center mx-6 py-6 ${!0===this.props.hideBorderBottom?"":"border-b border-gray-100"} ${!0===this.props.showBorderTop?"border-t border-gray-100":""} dark:border-gray-700 `,children:[(0,p.jsxs)("div",{className:"pb-2 sm:pb-0 pr-2 rtl:pr-0 rtl:pl-2 text-sm sm:grow",children:[(0,p.jsxs)("span",{className:"mb-0 flex items-center cursor-auto",children:[(0,p.jsx)("label",{className:"font-medium tracking-[-0.01em] text-gray-900 dark:text-white",children:this.props.label}),this.props.tooltipImage||this.props.tooltipText?(0,p.jsx)(o.A,{tooltipText:this.props.tooltipText,tooltipImage:this.props.tooltipImage,type:"default"}):null,this.state.responsive?(0,p.jsx)(l.A,{value:this.state.mode,onChange:t=>this.setSelectedMode(t)}):null]}),this.props.description&&(0,p.jsx)("div",{className:"mt-1 pb-2 md:pb-0 font-normal text-gray-500 block w-full pr-6 rtl:pr-0 rtl:pl-6",children:this.props.description})]}),(0,p.jsxs)("div",{className:"text-left rtl:text-right w-60 inline-flex items-center relative shrink-0",children:[(0,p.jsx)("input",{type:"range",lang:"en-US",step:this.props.step,onChange:this.handleInputChange,value:this.state.currentValue,name:`field-${this.props.id}`,min:this.props.min,max:this.props.max,className:"mr-2 rtl:mr-0 rtl:ml-2 my-0 dark:bg-gray-800"}),(0,p.jsx)("input",{type:"number",onChange:this.handleInputChange,value:this.state.currentValue,name:`field-${this.props.id}`,min:this.props.min,max:this.props.max,step:this.props.step,placeholder:this.getPlaceholder(),className:"relative w-16 cursor-text rounded-md bg-white dark:bg-gray-700 dark:text-gray-400 py-2 pl-2 rtl:pl-0 rtl:pr-2 text-left shadow-sm focus-visible:ring-0 focus-visible:ring-transparent focus-visible:ring-opacity-0 focus-visible:ring-offset-0 focus-visible:ring-offset-transparent text-sm border border-gray-200 dark:border-0"}),""!==this.state.placeholder?(0,p.jsx)("span",{className:"mt-2 text-xs italic text-gray-400 dark:text-gray-500 absolute -bottom-5 right-0",children:this.state.placeholder}):null]})]})}}(0,r.A)(h,"defaultProps",{label:"Text Input",min:"0",max:"100",step:"1",onChange:()=>{}}),e.default=h}}]);