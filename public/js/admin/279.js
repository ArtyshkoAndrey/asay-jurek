"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[279,913],{5279:(e,t,a)=>{a.r(t),a.d(t,{default:()=>ne});var r=a(821),n=(0,r.createElementVNode)("title",null,"Административная панель сайта",-1),l=(0,r.createElementVNode)("div",{class:"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"},[(0,r.createElementVNode)("h1",{class:"h2"},"Главная")],-1),o={class:"row gy-3 gy-lg-0 mb-5"},s={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},c={class:"toast h-100 text-white bg-primary w-100 show"},d={class:"toast-header"},i=(0,r.createElementVNode)("strong",{class:"me-auto"},"Новые заказы",-1),u=(0,r.createElementVNode)("small",null,"Подробнее",-1),m={class:"toast-body"},p={class:"fs-6"},N=(0,r.createElementVNode)("span",{class:"fw-bold"},"Подтверждении",-1),V={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},f={class:"toast h-100 text-white bg-primary w-100 show"},h={class:"toast-header"},g=(0,r.createElementVNode)("strong",{class:"me-auto"},"На сегодня",-1),E=(0,r.createElementVNode)("small",null,"Подробнее",-1),v={class:"toast-body"},b={class:"fs-6"},k=(0,r.createTextVNode)("Пользователи сайта создали "),x={class:"fw-bold"},y={class:"col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3"},w={class:"toast h-100 bg-warning w-100 show"},C={class:"toast-header"},_=(0,r.createElementVNode)("strong",{class:"me-auto"},"Товары",-1),D=(0,r.createElementVNode)("small",null,"Подробнее",-1),T={class:"toast-body"},O={class:"fs-6"},$=(0,r.createTextVNode)(" У вас закончились "),B={class:"fw-bold"},S={class:"row gy-3"},z={class:"col-12"},L={class:"card"},P={class:"card-body"},M=(0,r.createElementVNode)("h5",{class:"card-title"},"Продажи в течении года",-1),W={class:"col-12"},Z={class:"card"},j={class:"card-body"},A={key:0,class:"card-title mb-5"},F={key:1,class:"table table-hover"},I=(0,r.createElementVNode)("thead",null,[(0,r.createElementVNode)("tr",null,[(0,r.createElementVNode)("th",{scope:"col"},"№"),(0,r.createElementVNode)("th",{scope:"col"},"Покупатель"),(0,r.createElementVNode)("th",{scope:"col"},"Статус"),(0,r.createElementVNode)("th",{scope:"col"},"Стоимость")])],-1),R=["onClick"],H={scope:"row"},J=(0,r.createElementVNode)("br",null,null,-1),U={class:"small"},q={key:0},G=(0,r.createTextVNode)(" | "),K={class:"small"},Q={key:2},X=[(0,r.createElementVNode)("h5",{class:"text-center"},"Сегодня не было заказов",-1)];var Y=a(3913),ee=a(3764),te=a(2728),ae=a(9680);te.kL.register(te.Dx,te.u,te.De,te.jn,te.f$,te.od,te.uw);const re={name:"Index",layout:Y.default,components:{Line:ee.x1},data:function(){return{}},computed:{orderCheckouts:function(){return this.$page.props.orderCheckouts},dataCheckouts:function(){return{labels:this.orderCheckouts.month,datasets:[{label:"Кол-во заказов за год",backgroundColor:"#007bff",data:this.orderCheckouts.count,fill:!1,borderColor:"#007bff",tension:.2,pointRadius:1.5,borderWidth:2}]}},orderCheckoutChartOptions:function(){return{responsive:!0,maintainAspectRatio:!1}},countOrdersPrepare:function(){return this.$page.props.countOrdersPrepare},countOrdersToDay:function(){return this.$page.props.countOrdersToDay},countZeroCountProducts:function(){return this.$page.props.countZeroCountProducts},toDayOrders:function(){var e;return null!==(e=this.$page.props.toDayOrders)&&void 0!==e?e:[]}},methods:{num_word:function(e,t){var a=(e=Math.abs(e)%100)%10;return e>10&&e<20?t[2]:a>1&&a<5?t[1]:1===a?t[0]:t[2]},openOrder:function(e){ae.Inertia.get("/admin/orders/"+e)}}};const ne=(0,a(3744).Z)(re,[["render",function(e,t,a,Y,ee,te){var ae=(0,r.resolveComponent)("Head"),re=(0,r.resolveComponent)("Link"),ne=(0,r.resolveComponent)("Line");return(0,r.openBlock)(),(0,r.createElementBlock)(r.Fragment,null,[(0,r.createVNode)(ae,null,{default:(0,r.withCtx)((function(){return[n]})),_:1}),l,(0,r.createElementVNode)("div",o,[(0,r.createElementVNode)("div",s,[(0,r.createElementVNode)("div",c,[(0,r.createElementVNode)("div",d,[i,(0,r.createVNode)(re,{href:"/admin/orders?status=prepare"},{default:(0,r.withCtx)((function(){return[u]})),_:1})]),(0,r.createElementVNode)("div",m,[(0,r.createElementVNode)("span",p,[(0,r.createTextVNode)((0,r.toDisplayString)(te.countOrdersPrepare)+" "+(0,r.toDisplayString)(te.num_word(te.countOrdersPrepare,["заказ","заказа","заказов"]))+" на ",1),N])])])]),(0,r.createElementVNode)("div",V,[(0,r.createElementVNode)("div",f,[(0,r.createElementVNode)("div",h,[g,(0,r.createVNode)(re,{href:"/admin"},{default:(0,r.withCtx)((function(){return[E]})),_:1})]),(0,r.createElementVNode)("div",v,[(0,r.createElementVNode)("span",b,[k,(0,r.createElementVNode)("span",x,(0,r.toDisplayString)(te.countOrdersToDay),1),(0,r.createTextVNode)(" "+(0,r.toDisplayString)(te.num_word(te.countOrdersToDay,["заказ","заказа","заказов"])),1)])])])]),(0,r.createElementVNode)("div",y,[(0,r.createElementVNode)("div",w,[(0,r.createElementVNode)("div",C,[_,(0,r.createVNode)(re,{href:"/admin"},{default:(0,r.withCtx)((function(){return[D]})),_:1})]),(0,r.createElementVNode)("div",T,[(0,r.createElementVNode)("span",O,[$,(0,r.createElementVNode)("span",B,(0,r.toDisplayString)(te.countZeroCountProducts),1),(0,r.createTextVNode)(" "+(0,r.toDisplayString)(te.num_word(te.countOrdersToDay,["товар","товара","товаров"])),1)])])])])]),(0,r.createElementVNode)("div",S,[(0,r.createElementVNode)("div",z,[(0,r.createElementVNode)("div",L,[(0,r.createElementVNode)("div",P,[M,(0,r.createVNode)(ne,{"chart-data":te.dataCheckouts,"chart-options":te.orderCheckoutChartOptions,"css-classes":["orderCheckout"],"chart-id":"orderCheckout"},null,8,["chart-data","chart-options"])])])]),(0,r.createElementVNode)("div",W,[(0,r.createElementVNode)("div",Z,[(0,r.createElementVNode)("div",j,[te.toDayOrders.length>0?((0,r.openBlock)(),(0,r.createElementBlock)("h5",A,"Новые заказы на сегодня")):(0,r.createCommentVNode)("",!0),te.toDayOrders.length>0?((0,r.openBlock)(),(0,r.createElementBlock)("table",F,[I,(0,r.createElementVNode)("tbody",null,[((0,r.openBlock)(!0),(0,r.createElementBlock)(r.Fragment,null,(0,r.renderList)(te.toDayOrders,(function(e){return(0,r.openBlock)(),(0,r.createElementBlock)("tr",{style:{cursor:"pointer"},onClick:function(t){return te.openOrder(e.id)}},[(0,r.createElementVNode)("th",H,(0,r.toDisplayString)(e.id),1),(0,r.createElementVNode)("td",null,[(0,r.createTextVNode)((0,r.toDisplayString)(e.user_name)+" ",1),J,(0,r.createElementVNode)("span",U,(0,r.toDisplayString)(e.created_at),1),e.payment_at?((0,r.openBlock)(),(0,r.createElementBlock)("span",q,[G,(0,r.createElementVNode)("span",K,(0,r.toDisplayString)(e.payment_at),1)])):(0,r.createCommentVNode)("",!0)]),(0,r.createElementVNode)("td",null,(0,r.toDisplayString)(e.status_translation),1),(0,r.createElementVNode)("td",null,(0,r.toDisplayString)(new Intl.NumberFormat("ru-Ru").format(e.cost))+" ₸",1)],8,R)})),256))])])):((0,r.openBlock)(),(0,r.createElementBlock)("div",Q,X))])])])])],64)}]])},3913:(e,t,a)=>{a.r(t),a.d(t,{default:()=>te});var r=a(821),n=(0,r.createElementVNode)("title",null,null,-1),l=(0,r.createElementVNode)("meta",{content:"","head-key":"description",type:"description"},null,-1),o={class:"navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow"},s=(0,r.createElementVNode)("button",{"aria-controls":"sidebarMenu","aria-expanded":"false","aria-label":"Toggle navigation",class:"navbar-toggler d-md-none collapsed","data-bs-target":"#sidebarMenu","data-bs-toggle":"collapse",type:"button"},[(0,r.createElementVNode)("span",{class:"navbar-toggler-icon"})],-1),c=(0,r.createElementVNode)("a",{class:"navbar-brand col-md-3 col-lg-2 me-0 px-3",href:"/"}," Asay Jurek ",-1),d={class:"navbar-nav"},i={class:"nav-item text-nowrap"},u=(0,r.createTextVNode)(" Выйти "),m={id:"page"},p={class:"container-fluid"},N={class:"row"},V={id:"sidebarMenu",class:"col-md-3 col-lg-2 ps-2 d-md-block bg-light sidebar collapse"},f={class:"position-sticky pt-3"},h={class:"nav flex-column"},g={class:"nav-item"},E=(0,r.createElementVNode)("i",{class:"fa-regular fa-chart-line pe-3"},null,-1),v=(0,r.createTextVNode)(" Главная "),b={class:"nav-item"},k=(0,r.createElementVNode)("i",{class:"fa-regular fa-money-check-pen pe-3"},null,-1),x=(0,r.createTextVNode)(" Заказы "),y={class:"nav-item"},w=(0,r.createElementVNode)("i",{class:"fa-regular fa-bags-shopping pe-3"},null,-1),C=(0,r.createTextVNode)(" Товары "),_={class:"nav-item"},D=(0,r.createElementVNode)("i",{class:"fa-regular fa-users pe-3"},null,-1),T=(0,r.createTextVNode)(" Пользователи "),O=(0,r.createElementVNode)("h6",{class:"sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"},[(0,r.createElementVNode)("span",null,"Настройки"),(0,r.createElementVNode)("a",{"aria-label":"Add a new report",class:"link-secondary",href:"#"})],-1),B={class:"nav flex-column mb-2"},S={class:"nav-item"},z=(0,r.createElementVNode)("i",{class:"fa-regular fa-magnifying-glass-dollar pe-3"},null,-1),L=(0,r.createTextVNode)(" SEO "),P={class:"nav-item"},M=(0,r.createElementVNode)("i",{class:"fa-regular fa-shop pe-3"},null,-1),W=(0,r.createTextVNode)(" Магазины "),Z={class:"nav-item"},j=(0,r.createElementVNode)("i",{class:"fa-brands fa-yandex pe-3"},null,-1),A=(0,r.createTextVNode)(" Яндекс метрика "),F={class:"nav-item"},I=(0,r.createElementVNode)("i",{class:"fa-regular fa-gear pe-3"},null,-1),R=(0,r.createTextVNode)(" Настройки товаров "),H=(0,r.createElementVNode)("h6",{class:"sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"},[(0,r.createElementVNode)("span",null,"Быстрый доступ"),(0,r.createElementVNode)("a",{"aria-label":"Add a new report",class:"link-secondary",href:"#"})],-1),J={class:"nav flex-column mb-2"},U={class:"nav-item"},q=(0,r.createElementVNode)("i",{class:"fa-regular fa-cart-plus pe-3"},null,-1),G=(0,r.createTextVNode)(" Создать товар "),K={class:"col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5"};var Q=a(4865),X=a.n(Q),Y=(a(9680),a(7244));const ee={name:"Layout",components:{},data:function(){return{}},methods:{},created:function(){},beforeMount:function(){X().done()},mounted:function(){var e=new Y.UO($("#sidebarMenu"),{toggle:!1});$(".nav-link").click((function(){window.innerWidth<=768&&e.toggle()}))}};const te=(0,a(3744).Z)(ee,[["render",function(e,t,a,$,Q,X){var Y=(0,r.resolveComponent)("Head"),ee=(0,r.resolveComponent)("Link");return(0,r.openBlock)(),(0,r.createElementBlock)(r.Fragment,null,[(0,r.createVNode)(Y,null,{default:(0,r.withCtx)((function(){return[n,l]})),_:1}),(0,r.createElementVNode)("header",o,[s,c,(0,r.createElementVNode)("div",d,[(0,r.createElementVNode)("div",i,[(0,r.createVNode)(ee,{as:"button",class:"nav-link bg-transparent border-0 px-3",href:"/logout?is_admin=1",method:"post"},{default:(0,r.withCtx)((function(){return[u]})),_:1})])])]),(0,r.createElementVNode)("div",m,[(0,r.createElementVNode)("div",p,[(0,r.createElementVNode)("div",N,[(0,r.createElementVNode)("nav",V,[(0,r.createElementVNode)("div",f,[(0,r.createElementVNode)("ul",h,[(0,r.createElementVNode)("li",g,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:"/admin"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin"},{default:(0,r.withCtx)((function(){return[E,v]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",b,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:e.$page.url.startsWith("/admin/orders")},"nav-link"]),"aria-current":"page",href:"/admin/orders"},{default:(0,r.withCtx)((function(){return[k,x]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",y,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:"/admin/products"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/products"},{default:(0,r.withCtx)((function(){return[w,C]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",_,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:e.$page.url.startsWith("/admin/users")},"nav-link"]),"aria-current":"page",href:"/admin/users"},{default:(0,r.withCtx)((function(){return[D,T]})),_:1},8,["class"])])]),O,(0,r.createElementVNode)("ul",B,[(0,r.createElementVNode)("li",S,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:e.$page.url.startsWith("/admin/seos")},"nav-link"]),"aria-current":"page",href:"/admin/seos"},{default:(0,r.withCtx)((function(){return[z,L]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",P,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:e.$page.url.startsWith("/admin/shops")},"nav-link"]),"aria-current":"page",href:"/admin/shops"},{default:(0,r.withCtx)((function(){return[M,W]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",Z,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:"/admin/settings/yandex-metrics"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/settings/yandex-metrics"},{default:(0,r.withCtx)((function(){return[j,A]})),_:1},8,["class"])]),(0,r.createElementVNode)("li",F,[(0,r.createVNode)(ee,{class:(0,r.normalizeClass)([{active:"/admin/settings/products"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/settings/products"},{default:(0,r.withCtx)((function(){return[I,R]})),_:1},8,["class"])])]),H,(0,r.createElementVNode)("ul",J,[(0,r.createElementVNode)("li",U,[(0,r.createVNode)(ee,{class:"nav-link",href:"/admin/product/create"},{default:(0,r.withCtx)((function(){return[q,G]})),_:1})])])])]),(0,r.createElementVNode)("main",K,[(0,r.renderSlot)(e.$slots,"default")])])])])],64)}]])}}]);
//# sourceMappingURL=279.js.map