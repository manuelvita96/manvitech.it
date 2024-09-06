"use strict";(window.webpackChunkpixfort_core=window.webpackChunkpixfort_core||[]).push([[3791],{53791:function(e,t,i){i.r(t);var s=i(64467),a=i(96540),l=i(91076),n=i(54011),r=i(74848);class d extends a.Component{constructor(e){super(e),(0,s.A)(this,"handleInputChange",(e=>{let t=e.target.value;this.props.onChange({value:t,id:this.props.id})})),(0,s.A)(this,"handleItemChange",((e,t,i)=>{let s=e.target.value,a=this.state.items;"title"===t?a[i].title=s:"value"===t&&(a[i].value=s),this.setState({items:a}),this.setState({value:JSON.stringify(a)}),this.props.onChange({value:JSON.stringify(a),id:this.props.id})})),(0,s.A)(this,"handleItemDelete",((e,t)=>{e.preventDefault();let i=this.state.items;return i.splice(t,1),this.setState({items:i}),this.setState({value:JSON.stringify(i)}),this.props.onChange({value:JSON.stringify(i),id:this.props.id}),!1})),(0,s.A)(this,"handleItemAdd",((e,t)=>{e.preventDefault();let i=this.state.items;if(Array.isArray(i)){let e=i.length;e++,i.push({id:(0,n.A)(),title:"",value:""})}else i=[{id:(0,n.A)(),title:"",value:""}];return this.setState({items:i}),this.setState({value:JSON.stringify(i)}),this.props.onChange({value:JSON.stringify(i),id:this.props.id}),!1})),this.props.value?this.state={value:this.props.value,items:[]}:this.state={value:"",items:[]},this.onDragEnd=this.onDragEnd.bind(this)}setItems(){let e=[];try{this.state.value&&""!==this.state.value&&(e=JSON.parse(this.state.value))}catch(e){console.log(e)}let t=[];Array.isArray(e)&&e.length&&e.forEach(((e,i)=>{t.push({id:e.id?e.id:(0,n.A)(),title:e.title?e.title:"",value:e.value?e.value:""})})),this.setState({items:t})}onDragEnd(e){if(!e.destination)return;const t=((e,t,i)=>{const s=Array.from(e),[a]=s.splice(t,1);return s.splice(i,0,a),s})(this.state.items,e.source.index,e.destination.index);this.setState({items:t}),this.setState({value:JSON.stringify(t)}),this.props.onChange({value:JSON.stringify(t),id:this.props.id})}componentDidMount(){this.setItems()}componentDidUpdate(){}render(){return(0,r.jsxs)("div",{id:`element-${this.props.id}`,className:"pix-opt-field pix-opt-multi-field",children:[(0,r.jsx)("label",{className:"mb-2",children:this.props.label}),(0,r.jsxs)("div",{className:"pix-multifields-meta",children:[(0,r.jsx)("div",{className:"pix-multi-fields-input",children:(0,r.jsx)(l.JY,{onDragEnd:this.onDragEnd,children:(0,r.jsx)(l.gL,{droppableId:"droppable",children:(e,t)=>{return(0,r.jsxs)("div",{...e.droppableProps,className:"w-full",ref:e.innerRef,style:(i=t.isDraggingOver,{background:i?"#eee":"#f4f4f4",padding:10,display:"inline-block",borderRadius:10}),children:[this.state.items.map(((e,t)=>(0,r.jsx)(l.sx,{draggableId:e.id,index:t,children:(i,s)=>{return(0,r.jsxs)("div",{className:"pix-multifields-item w-[49.99%]",ref:i.innerRef,...i.draggableProps,...i.dragHandleProps,style:(a=s.isDragging,l=i.draggableProps.style,{userSelect:"none",padding:16,margin:"0 0 8px 0",background:a?"#e3fff3":"#fff",...l}),children:[(0,r.jsx)("input",{onChange:e=>this.handleItemChange(e,"title",t),className:"pix_item_title pix_fields_field",type:"text",placeholder:"Title",value:e.title}),(0,r.jsx)("input",{onChange:e=>this.handleItemChange(e,"value",t),className:"pix_item_value pix_fields_field",type:"text",placeholder:"Value",value:e.value}),(0,r.jsx)("a",{href:"#",onClick:e=>this.handleItemDelete(e,t),className:"pix_field_remove",children:"Delete"})]});var a,l}},e.id))),e.placeholder]});var i}})})}),(0,r.jsx)("button",{onClick:this.handleItemAdd,className:"pix-multi-fields-add button button-primary",children:"Add field"})]})]})}}(0,s.A)(d,"defaultProps",{label:"Textarea Input",value:"",onChange:()=>{}}),t.default=d}}]);