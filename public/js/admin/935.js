"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[935,96],{9935:(e,t,a)=>{a.r(t),a.d(t,{default:()=>Z});var n=a(821),o=(0,n.createElementVNode)("title",null,"Административная панель сайта",-1),r=(0,n.createElementVNode)("div",{class:"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"},[(0,n.createElementVNode)("h1",{class:"h2"},"Главная")],-1),l={class:"row gy-3 gy-lg-0 mb-5"},s={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},i={class:"toast text-white bg-primary w-100 show"},c={class:"toast-header"},d=(0,n.createElementVNode)("strong",{class:"me-auto"},"Новые заказы",-1),u=(0,n.createElementVNode)("small",null,"Продробнее",-1),h={class:"toast-body"},m={class:"fs-6"},p=(0,n.createElementVNode)("span",{class:"fw-bold"},"Подверждении",-1),v={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},f={class:"toast text-white bg-primary w-100 show"},w={class:"toast-header"},g=(0,n.createElementVNode)("strong",{class:"me-auto"},"На сегодня",-1),V=(0,n.createElementVNode)("small",null,"Продробнее",-1),x={class:"toast-body"},N={class:"fs-6"},k=(0,n.createTextVNode)("Пользователи сайта создали "),y={class:"fw-bold"},E={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},b={class:"toast bg-warning w-100 show"},C={class:"toast-header"},T=(0,n.createElementVNode)("strong",{class:"me-auto"},"Товары",-1),_=(0,n.createElementVNode)("small",null,"Продробнее",-1),B={class:"toast-body"},D={class:"fs-6"},M=(0,n.createTextVNode)(" У вас закончились "),j={class:"fw-bold"},z={class:"row"},O=(0,n.createElementVNode)("div",{class:"col-12"},[(0,n.createElementVNode)("h5",null,"Продажи в течении года")],-1),H={class:"col-12"};var S=a(1096),$=a(3764),L=a(2728);L.kL.register(L.Dx,L.u,L.De,L.jn,L.f$,L.od,L.uw);const P={name:"Index",layout:S.default,components:{Line:$.x1},data:function(){return{}},computed:{orderCheckouts:function(){return this.$page.props.orderCheckouts},dataCheckouts:function(){return{labels:this.orderCheckouts.month,datasets:[{label:"Кол-во заказов за год",backgroundColor:"#007bff",data:this.orderCheckouts.count,fill:!1,borderColor:"#007bff",tension:.2,pointRadius:1.5,borderWidth:2}]}},orderCheckoutChartOptions:function(){return{responsive:!0,maintainAspectRatio:!1}},countOrdersPrepare:function(){return this.$page.props.countOrdersPrepare},countOrdersToDay:function(){return this.$page.props.countOrdersToDay},countZeroCountProducts:function(){return this.$page.props.countZeroCountProducts}},methods:{num_word:function(e,t){var a=(e=Math.abs(e)%100)%10;return e>10&&e<20?t[2]:a>1&&a<5?t[1]:1===a?t[0]:t[2]}}};const Z=(0,a(3744).Z)(P,[["render",function(e,t,a,S,$,L){var P=(0,n.resolveComponent)("Head"),Z=(0,n.resolveComponent)("Link"),A=(0,n.resolveComponent)("Line");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)(P,null,{default:(0,n.withCtx)((function(){return[o]})),_:1}),r,(0,n.createElementVNode)("div",l,[(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("div",i,[(0,n.createElementVNode)("div",c,[d,(0,n.createVNode)(Z,{href:"/admin"},{default:(0,n.withCtx)((function(){return[u]})),_:1})]),(0,n.createElementVNode)("div",h,[(0,n.createElementVNode)("span",m,[(0,n.createTextVNode)((0,n.toDisplayString)(L.countOrdersPrepare)+" "+(0,n.toDisplayString)(L.num_word(L.countOrdersPrepare,["заказ","заказа","заказов"]))+" на ",1),p])])])]),(0,n.createElementVNode)("div",v,[(0,n.createElementVNode)("div",f,[(0,n.createElementVNode)("div",w,[g,(0,n.createVNode)(Z,{href:"/admin"},{default:(0,n.withCtx)((function(){return[V]})),_:1})]),(0,n.createElementVNode)("div",x,[(0,n.createElementVNode)("span",N,[k,(0,n.createElementVNode)("span",y,(0,n.toDisplayString)(L.countOrdersToDay),1),(0,n.createTextVNode)(" "+(0,n.toDisplayString)(L.num_word(L.countOrdersToDay,["заказ","заказа","заказов"])),1)])])])]),(0,n.createElementVNode)("div",E,[(0,n.createElementVNode)("div",b,[(0,n.createElementVNode)("div",C,[T,(0,n.createVNode)(Z,{href:"/admin"},{default:(0,n.withCtx)((function(){return[_]})),_:1})]),(0,n.createElementVNode)("div",B,[(0,n.createElementVNode)("span",D,[M,(0,n.createElementVNode)("span",j,(0,n.toDisplayString)(L.countZeroCountProducts),1),(0,n.createTextVNode)(" "+(0,n.toDisplayString)(L.num_word(L.countOrdersToDay,["товар","товара","товаров"])),1)])])])])]),(0,n.createElementVNode)("div",z,[O,(0,n.createElementVNode)("div",H,[(0,n.createVNode)(A,{"chart-data":L.dataCheckouts,"chart-options":L.orderCheckoutChartOptions,"css-classes":["orderCheckout"],"chart-id":"orderCheckout"},null,8,["chart-data","chart-options"])])])],64)}]])},1096:(e,t,a)=>{a.r(t),a.d(t,{default:()=>H});var n=a(821),o=(0,n.createElementVNode)("title",null,null,-1),r=(0,n.createElementVNode)("meta",{content:"","head-key":"description",type:"description"},null,-1),l={class:"navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow"},s=(0,n.createElementVNode)("button",{"aria-controls":"sidebarMenu","aria-expanded":"false","aria-label":"Toggle navigation",class:"navbar-toggler d-md-none collapsed","data-bs-target":"#sidebarMenu","data-bs-toggle":"collapse",type:"button"},[(0,n.createElementVNode)("span",{class:"navbar-toggler-icon"})],-1),i=(0,n.createElementVNode)("a",{class:"navbar-brand col-md-3 col-lg-2 me-0 px-3",href:"/"}," Asay Jurek ",-1),c={class:"navbar-nav"},d={class:"nav-item text-nowrap"},u=(0,n.createTextVNode)(" Выйти "),h={id:"page"},m={class:"container-fluid"},p={class:"row"},v={id:"sidebarMenu",class:"col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"},f={class:"position-sticky pt-3"},w={class:"nav flex-column"},g={class:"nav-item"},V=(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"feather feather-home","aria-hidden":"true"},[(0,n.createElementVNode)("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),(0,n.createElementVNode)("polyline",{points:"9 22 9 12 15 12 15 22"})],-1),x=(0,n.createTextVNode)(" Главная "),N={class:"nav-item"},k=(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"feather feather-home","aria-hidden":"true"},[(0,n.createElementVNode)("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),(0,n.createElementVNode)("polyline",{points:"9 22 9 12 15 12 15 22"})],-1),y=(0,n.createTextVNode)(" Заказы "),E={class:"nav-item"},b=(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"feather feather-home","aria-hidden":"true"},[(0,n.createElementVNode)("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),(0,n.createElementVNode)("polyline",{points:"9 22 9 12 15 12 15 22"})],-1),C=(0,n.createTextVNode)(" Товары "),T={class:"nav-item"},_=(0,n.createElementVNode)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",stroke:"currentColor","stroke-width":"2","stroke-linecap":"round","stroke-linejoin":"round",class:"feather feather-home","aria-hidden":"true"},[(0,n.createElementVNode)("path",{d:"M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"}),(0,n.createElementVNode)("polyline",{points:"9 22 9 12 15 12 15 22"})],-1),B=(0,n.createTextVNode)(" Пользователи "),D=(0,n.createStaticVNode)('<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"><span>Saved reports</span><a class="link-secondary" href="#" aria-label="Add a new report"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg></a></h6><ul class="nav flex-column mb-2"><li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Current month </a></li><li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Last quarter </a></li><li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Social engagement </a></li><li class="nav-item"><a class="nav-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Year-end sale </a></li></ul>',2),M={class:"col-md-9 ms-sm-auto col-lg-10 px-md-4"};var j=a(4865),z=a.n(j);a(9680);const O={name:"Layout",components:{},data:function(){return{}},methods:{},created:function(){},beforeMount:function(){z().done()}};const H=(0,a(3744).Z)(O,[["render",function(e,t,a,j,z,O){var H=(0,n.resolveComponent)("Head"),S=(0,n.resolveComponent)("Link");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)(H,null,{default:(0,n.withCtx)((function(){return[o,r]})),_:1}),(0,n.createElementVNode)("header",l,[s,i,(0,n.createElementVNode)("div",c,[(0,n.createElementVNode)("div",d,[(0,n.createVNode)(S,{as:"button",class:"nav-link bg-transparent border-0 px-3",href:"/logout?is_admin=1",method:"post"},{default:(0,n.withCtx)((function(){return[u]})),_:1})])])]),(0,n.createElementVNode)("div",h,[(0,n.createElementVNode)("div",m,[(0,n.createElementVNode)("div",p,[(0,n.createElementVNode)("nav",v,[(0,n.createElementVNode)("div",f,[(0,n.createElementVNode)("ul",w,[(0,n.createElementVNode)("li",g,[(0,n.createVNode)(S,{class:(0,n.normalizeClass)(["nav-link",{active:"/admin"===e.$page.url}]),"aria-current":"page",href:"/admin"},{default:(0,n.withCtx)((function(){return[V,x]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",N,[(0,n.createVNode)(S,{class:(0,n.normalizeClass)(["nav-link",{active:e.$page.url.startsWith("/admin/orders")}]),"aria-current":"page",href:"/admin/orders"},{default:(0,n.withCtx)((function(){return[k,y]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",E,[(0,n.createVNode)(S,{class:(0,n.normalizeClass)(["nav-link",{active:"/admin/products"===e.$page.url}]),"aria-current":"page",href:"/admin"},{default:(0,n.withCtx)((function(){return[b,C]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",T,[(0,n.createVNode)(S,{class:(0,n.normalizeClass)(["nav-link",{active:"/admin/users"===e.$page.url}]),"aria-current":"page",href:"/admin"},{default:(0,n.withCtx)((function(){return[_,B]})),_:1},8,["class"])])]),D])]),(0,n.createElementVNode)("main",M,[(0,n.renderSlot)(e.$slots,"default")])])])])],64)}]])}}]);
//# sourceMappingURL=935.js.map