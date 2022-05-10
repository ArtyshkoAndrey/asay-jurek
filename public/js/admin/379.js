"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[379,913],{1429:(e,t,a)=>{a.d(t,{Z:()=>S});var n,r,l,o,s,i,c,d,u,m,p,f,h,v,b=a(7244);function g(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}function N(e,t){w(e,t),t.add(e)}function V(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}function E(e,t,a){w(e,t),t.set(e,a)}function w(e,t){if(t.has(e))throw new TypeError("Cannot initialize the same private elements twice on an object")}function y(e,t){return function(e,t){if(t.get)return t.get.call(e);return t.value}(e,C(e,t,"get"))}function k(e,t,a){if(!t.has(e))throw new TypeError("attempted to get private field on non-instance");return a}function x(e,t,a){return function(e,t,a){if(t.set)t.set.call(e,a);else{if(!t.writable)throw new TypeError("attempted to set read only private field");t.value=a}}(e,C(e,t,"set"),a),a}function C(e,t,a){if(!t.has(e))throw new TypeError("attempted to "+a+" private field on non-instance");return t.get(e)}function A(e,t){return void 0!==e?e:t}function T(){var e=this,t=document.body.querySelectorAll(".toast-".concat(y(this,p))),a=[];t.forEach((function(n,r){n instanceof HTMLElement&&(0===r&&a.push(0),t[r+1]instanceof HTMLElement&&a.push(a[r]+n.offsetHeight),n.style[y(e,f)[0]]=a[r]+y(e,d)*r+"px")}))}const S={Toast:(n=new WeakMap,r=new WeakMap,l=new WeakMap,o=new WeakMap,s=new WeakMap,i=new WeakMap,c=new WeakMap,d=new WeakMap,u=new WeakMap,m=new WeakMap,p=new WeakMap,f=new WeakMap,h=new WeakSet,v=new WeakSet,function(){function e(t){var a=this;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),N(this,v),N(this,h),E(this,n,{writable:!0,value:void 0}),E(this,r,{writable:!0,value:void 0}),E(this,l,{writable:!0,value:void 0}),E(this,o,{writable:!0,value:void 0}),E(this,s,{writable:!0,value:void 0}),E(this,i,{writable:!0,value:void 0}),E(this,c,{writable:!0,value:void 0}),E(this,d,{writable:!0,value:void 0}),E(this,u,{writable:!0,value:void 0}),E(this,m,{writable:!0,value:void 0}),E(this,p,{writable:!0,value:void 0}),E(this,f,{writable:!0,value:void 0}),V(this,"element",void 0),V(this,"bootstrapToast",void 0),x(this,n,k(this,h,A).call(this,t.body,"")),x(this,r,k(this,h,A).call(this,t.animation,!0)),x(this,l,k(this,h,A).call(this,t.autohide,!0)),x(this,o,k(this,h,A).call(this,t.btnClose,!0)),x(this,s,k(this,h,A).call(this,t.btnCloseWhite,!1)),x(this,i,k(this,h,A).call(this,t.className,"")),x(this,c,k(this,h,A).call(this,t.delay,3e3)),x(this,d,k(this,h,A).call(this,t.gap,16)),x(this,u,k(this,h,A).call(this,t.header,"")),x(this,m,k(this,h,A).call(this,t.margin,"1rem")),x(this,p,k(this,h,A).call(this,t.placement,"top-right")),x(this,f,y(this,p).split("-"));var g='<button type="button" hidden class="btn-close flex-shrink-0" data-bs-dismiss="toast" aria-label="Close"></button>',w='style="margin:'.concat(y(this,m),";").concat(y(this,f)[0],":0;").concat(y(this,f)[1],":").concat(y(this,r)?"-50%":0,';z-index:1081"'),C=document.createElement("template");C.innerHTML='<div class="toast position-fixed toast-'.concat(y(this,p)," ").concat(y(this,i),'" ').concat(w,' role="alert" aria-live="assertive" aria-atomic="true">\n\t\t\t\t<div class="toast-header" hidden><div class="d-flex align-items-center flex-grow-1">').concat(y(this,u),"</div>").concat(g,'</div>\n\t\t\t\t<div class="toast-body"><div class="d-flex w-100"><div class="flex-grow-1">').concat(y(this,n),"</div>").concat(g,"</div></div>\n\t\t\t</div>");var S=C.content.firstChild;if(S instanceof HTMLDivElement){var M=S.querySelectorAll(".btn-close");M.forEach((function(e){y(a,o)&&e.removeAttribute("hidden"),y(a,s)&&e.classList.add("btn-close-white")})),""!==y(this,u)&&(S.querySelector(".toast-header").removeAttribute("hidden"),M[1].remove()),this.element=S}document.body.insertAdjacentElement("afterbegin",this.element),this.bootstrapToast=new b.FN(this.element,{animation:y(this,r),autohide:y(this,l),delay:y(this,c)}),this.element.addEventListener("hidden.bs.toast",(function(){a.element.remove(),k(a,v,T).call(a)})),this.element.addEventListener("show.bs.toast",(function(){var e=a,t=setInterval((function(){if(e.element.offsetHeight>0){if(clearInterval(t),y(e,r)){var a=1e3*parseFloat(getComputedStyle(e.element).transitionDuration);e.element.style.transition="all ".concat(4*a,"ms cubic-bezier(0.16, 1, 0.3, 1), opacity ").concat(a,"ms linear"),e.element.style[y(e,f)[1]]=0}k(e,v,T).call(e)}}),0)}))}var t,a,w;return t=e,(a=[{key:"show",value:function(){this.bootstrapToast.show()}},{key:"hide",value:function(){this.bootstrapToast.hide()}}])&&g(t.prototype,a),w&&g(t,w),Object.defineProperty(t,"prototype",{writable:!1}),e}())}},369:(e,t,a)=>{a.d(t,{Z:()=>c});var n=a(4015),r=a.n(n),l=a(3645),o=a.n(l),s=a(8679),i=o()(r());i.i(s.Z),i.push([e.id,".spinner{margin-bottom:30px!important;margin-left:auto!important;margin-right:auto!important}","",{version:3,sources:["webpack://./resources/js/admin/Pages/Admins/Order/Index.vue"],names:[],mappings:"AAGA,SAGE,4BAAA,CAFA,0BAAA,CACA,2BAAF",sourcesContent:['\r\n@import "v3-infinite-loading/lib/style.css";\r\n\r\n.spinner {\r\n  margin-left: auto !important;\r\n  margin-right: auto !important;\r\n  margin-bottom: 30px !important;\r\n}\r\n'],sourceRoot:""}]);const c=i},379:(e,t,a)=>{a.r(t),a.d(t,{default:()=>U});var n=a(821),r=(0,n.createElementVNode)("title",null,"Заказы на сайте",-1),l=(0,n.createElementVNode)("div",{class:"d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"},[(0,n.createElementVNode)("h1",{class:"h2"},"Заказы")],-1),o={class:"row justify-content-center"},s={class:"col-12 col-md-10"},i={class:"card"},c={class:"card-body"},d={class:"row gy-3"},u={class:"col-12 col-md-6 col-lg-3"},m={class:"col-12 col-md-6 col-lg-3"},p=(0,n.createElementVNode)("option",{value:null},"Все заказы",-1),f=["value"],h=(0,n.createElementVNode)("div",{class:"col-12 col-md-auto"},[(0,n.createElementVNode)("button",{class:"h-100 btn btn-dark rounded-0",type:"submit"}," Фильтровать ")],-1),v={class:"row justify-content-center mt-5"},b={class:"col-12 col-md-10"},g={class:"card px-3"},N={class:"card-body"},V={class:"table table-hover"},E=(0,n.createElementVNode)("thead",null,[(0,n.createElementVNode)("tr",null,[(0,n.createElementVNode)("th",{scope:"col"},"№"),(0,n.createElementVNode)("th",{scope:"col"},"Покупатель"),(0,n.createElementVNode)("th",{scope:"col"},"Статус"),(0,n.createElementVNode)("th",{scope:"col"},"Стоимость")])],-1),w=["onClick"],y={scope:"row"},k=(0,n.createElementVNode)("br",null,null,-1),x={class:"small"},C={key:0},A=(0,n.createTextVNode)(" | "),T={class:"small"},S=(0,n.createElementVNode)("span",null,null,-1);var M=a(7757),_=a.n(M),W=a(3913),B=a(1429),D=a(8296),j=a.n(D),$=a(9680),I=a(9038);function q(e,t,a,n,r,l,o){try{var s=e[l](o),i=s.value}catch(e){return void a(e)}s.done?t(i):Promise.resolve(i).then(n,r)}function L(e){return function(e){if(Array.isArray(e))return O(e)}(e)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return O(e,t);var a=Object.prototype.toString.call(e).slice(8,-1);"Object"===a&&e.constructor&&(a=e.constructor.name);if("Map"===a||"Set"===a)return Array.from(e);if("Arguments"===a||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(a))return O(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function O(e,t){(null==t||t>e.length)&&(t=e.length);for(var a=0,n=new Array(t);a<t;a++)n[a]=e[a];return n}const z={name:"Index",layout:W.default,components:{InfiniteLoading:j()},data:function(){return{orders:[],page:2,noResult:!1,message:"",form:(0,I.cI)({q:null,status:null})}},computed:{serverOrder:function(){var e;return null!==(e=this.$page.props.orders)&&void 0!==e?e:null},orderStatuses:function(){var e;return null!==(e=this.$page.props.orderStatuses)&&void 0!==e?e:[]},formData:function(){return this.$page.props.formData}},mounted:function(){var e;this.form.defaults({q:this.formData.q,status:this.formData.status}),this.form.reset(),this.serverOrder?(e=this.orders).push.apply(e,L(this.serverOrder.data)):new B.Z.Toast({body:"Ошибка в принятии данный от сервера",className:"border-0 bg-warning text-dark",btnCloseWhite:!1,autohide:!0,delay:3e3}).show()},methods:{colorColumn:function(e){return"cancel"===e?"table-danger":"delivered"===e?"table-primary":"not_paid"===e?"table-warning":"paid"===e?"table-primary":"success"===e?"table-success":void 0},loadDataFromServer:function(e){var t,a=this;return(t=_().mark((function t(){var n;return _().wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,axios.get("/admin/orders",{params:{page:a.page,is_json:!0,q:a.form.q,status:a.form.status}});case 3:(n=t.sent).data.payload.orders.data.length>0?setTimeout((function(){var t;a.page++,(t=a.orders).push.apply(t,L(n.data.payload.orders.data)),e.loaded(),a.page>n.data.payload.orders.last_page&&e.complete()}),1e3):e.complete(),t.next=10;break;case 7:t.prev=7,t.t0=t.catch(0),e.error();case 10:case"end":return t.stop()}}),t,null,[[0,7]])})),function(){var e=this,a=arguments;return new Promise((function(n,r){var l=t.apply(e,a);function o(e){q(l,n,r,o,s,"next",e)}function s(e){q(l,n,r,o,s,"throw",e)}o(void 0)}))})()},submit:function(){this.form.get("/admin/orders")},openOrder:function(e){$.Inertia.get("/admin/orders/"+e)}}};var F=a(3379),H=a.n(F),Z=a(369),P={insert:"head",singleton:!1};H()(Z.Z,P);Z.Z.locals;const U=(0,a(3744).Z)(z,[["render",function(e,t,a,M,_,W){var B=(0,n.resolveComponent)("Head"),D=(0,n.resolveComponent)("InfiniteLoading");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)(B,null,{default:(0,n.withCtx)((function(){return[r]})),_:1}),l,(0,n.createElementVNode)("div",o,[(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("div",i,[(0,n.createElementVNode)("div",c,[(0,n.createElementVNode)("form",{onSubmit:t[2]||(t[2]=(0,n.withModifiers)((function(){return W.submit&&W.submit.apply(W,arguments)}),["prevent"]))},[(0,n.createElementVNode)("div",d,[(0,n.createElementVNode)("div",u,[(0,n.withDirectives)((0,n.createElementVNode)("input",{id:"q","aria-describedby":"q",class:"form-control rounded-0",name:"q","onUpdate:modelValue":t[0]||(t[0]=function(t){return e.form.q=t}),placeholder:"Найти...",type:"text"},null,512),[[n.vModelText,e.form.q]])]),(0,n.createElementVNode)("div",m,[(0,n.withDirectives)((0,n.createElementVNode)("select",{name:"status","aria-label":"","onUpdate:modelValue":t[1]||(t[1]=function(t){return e.form.status=t}),class:"form-select rounded-0"},[p,((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(W.orderStatuses,(function(e){return(0,n.openBlock)(),(0,n.createElementBlock)("option",{value:e.value},(0,n.toDisplayString)(e.name),9,f)})),256))],512),[[n.vModelSelect,e.form.status]])]),h])],32)])])])]),(0,n.createElementVNode)("div",v,[(0,n.createElementVNode)("div",b,[(0,n.createElementVNode)("div",g,[(0,n.createElementVNode)("div",N,[(0,n.createElementVNode)("table",V,[E,(0,n.createElementVNode)("tbody",null,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)(e.orders,(function(e){return(0,n.openBlock)(),(0,n.createElementBlock)("tr",{class:(0,n.normalizeClass)(W.colorColumn(e.status)),style:{cursor:"pointer"},onClick:function(t){return W.openOrder(e.id)}},[(0,n.createElementVNode)("th",y,(0,n.toDisplayString)(e.id),1),(0,n.createElementVNode)("td",null,[(0,n.createTextVNode)((0,n.toDisplayString)(e.user_name)+" ",1),k,(0,n.createElementVNode)("span",x,(0,n.toDisplayString)(e.created_at),1),e.payment_at?((0,n.openBlock)(),(0,n.createElementBlock)("span",C,[A,(0,n.createElementVNode)("span",T,(0,n.toDisplayString)(e.payment_at),1)])):(0,n.createCommentVNode)("",!0)]),(0,n.createElementVNode)("td",null,(0,n.toDisplayString)(e.status_translation),1),(0,n.createElementVNode)("td",null,(0,n.toDisplayString)(new Intl.NumberFormat("ru-Ru").format(e.cost))+" ₸",1)],10,w)})),256))])]),(0,n.createVNode)(D,{"first-load":!1,orders:e.orders,onInfinite:W.loadDataFromServer},{complete:(0,n.withCtx)((function(){return[S]})),_:1},8,["orders","onInfinite"])])])])])],64)}]])},3913:(e,t,a)=>{a.r(t),a.d(t,{default:()=>te});var n=a(821),r=(0,n.createElementVNode)("title",null,null,-1),l=(0,n.createElementVNode)("meta",{content:"","head-key":"description",type:"description"},null,-1),o={class:"navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow"},s=(0,n.createElementVNode)("button",{"aria-controls":"sidebarMenu","aria-expanded":"false","aria-label":"Toggle navigation",class:"navbar-toggler d-md-none collapsed","data-bs-target":"#sidebarMenu","data-bs-toggle":"collapse",type:"button"},[(0,n.createElementVNode)("span",{class:"navbar-toggler-icon"})],-1),i=(0,n.createElementVNode)("a",{class:"navbar-brand col-md-3 col-lg-2 me-0 px-3",href:"/"}," Asay Jurek ",-1),c={class:"navbar-nav"},d={class:"nav-item text-nowrap"},u=(0,n.createTextVNode)(" Выйти "),m={id:"page"},p={class:"container-fluid"},f={class:"row"},h={id:"sidebarMenu",class:"col-md-3 col-lg-2 ps-2 d-md-block bg-light sidebar collapse"},v={class:"position-sticky pt-3"},b={class:"nav flex-column"},g={class:"nav-item"},N=(0,n.createElementVNode)("i",{class:"fa-regular fa-chart-line pe-3"},null,-1),V=(0,n.createTextVNode)(" Главная "),E={class:"nav-item"},w=(0,n.createElementVNode)("i",{class:"fa-regular fa-money-check-pen pe-3"},null,-1),y=(0,n.createTextVNode)(" Заказы "),k={class:"nav-item"},x=(0,n.createElementVNode)("i",{class:"fa-regular fa-bags-shopping pe-3"},null,-1),C=(0,n.createTextVNode)(" Товары "),A={class:"nav-item"},T=(0,n.createElementVNode)("i",{class:"fa-regular fa-users pe-3"},null,-1),S=(0,n.createTextVNode)(" Пользователи "),M=(0,n.createElementVNode)("h6",{class:"sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"},[(0,n.createElementVNode)("span",null,"Настройки"),(0,n.createElementVNode)("a",{"aria-label":"Add a new report",class:"link-secondary",href:"#"})],-1),_={class:"nav flex-column mb-2"},W={class:"nav-item"},B=(0,n.createElementVNode)("i",{class:"fa-regular fa-magnifying-glass-dollar pe-3"},null,-1),D=(0,n.createTextVNode)(" SEO "),j={class:"nav-item"},I=(0,n.createElementVNode)("i",{class:"fa-regular fa-shop pe-3"},null,-1),q=(0,n.createTextVNode)(" Магазины "),L={class:"nav-item"},O=(0,n.createElementVNode)("i",{class:"fa-brands fa-yandex pe-3"},null,-1),z=(0,n.createTextVNode)(" Яндекс метрика "),F={class:"nav-item"},H=(0,n.createElementVNode)("i",{class:"fa-regular fa-gear pe-3"},null,-1),Z=(0,n.createTextVNode)(" Настройки товаров "),P=(0,n.createElementVNode)("h6",{class:"sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"},[(0,n.createElementVNode)("span",null,"Быстрый доступ"),(0,n.createElementVNode)("a",{"aria-label":"Add a new report",class:"link-secondary",href:"#"})],-1),U={class:"nav flex-column mb-2"},R={class:"nav-item"},G=(0,n.createElementVNode)("i",{class:"fa-regular fa-cart-plus pe-3"},null,-1),J=(0,n.createTextVNode)(" Создать товар "),K={class:"col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5"};var Q=a(4865),X=a.n(Q),Y=(a(9680),a(7244));const ee={name:"Layout",components:{},data:function(){return{}},methods:{},created:function(){},beforeMount:function(){X().done()},mounted:function(){var e=new Y.UO($("#sidebarMenu"),{toggle:!1});$(".nav-link").click((function(){window.innerWidth<=768&&e.toggle()}))}};const te=(0,a(3744).Z)(ee,[["render",function(e,t,a,$,Q,X){var Y=(0,n.resolveComponent)("Head"),ee=(0,n.resolveComponent)("Link");return(0,n.openBlock)(),(0,n.createElementBlock)(n.Fragment,null,[(0,n.createVNode)(Y,null,{default:(0,n.withCtx)((function(){return[r,l]})),_:1}),(0,n.createElementVNode)("header",o,[s,i,(0,n.createElementVNode)("div",c,[(0,n.createElementVNode)("div",d,[(0,n.createVNode)(ee,{as:"button",class:"nav-link bg-transparent border-0 px-3",href:"/logout?is_admin=1",method:"post"},{default:(0,n.withCtx)((function(){return[u]})),_:1})])])]),(0,n.createElementVNode)("div",m,[(0,n.createElementVNode)("div",p,[(0,n.createElementVNode)("div",f,[(0,n.createElementVNode)("nav",h,[(0,n.createElementVNode)("div",v,[(0,n.createElementVNode)("ul",b,[(0,n.createElementVNode)("li",g,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:"/admin"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin"},{default:(0,n.withCtx)((function(){return[N,V]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",E,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:e.$page.url.startsWith("/admin/orders")},"nav-link"]),"aria-current":"page",href:"/admin/orders"},{default:(0,n.withCtx)((function(){return[w,y]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",k,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:"/admin/products"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/products"},{default:(0,n.withCtx)((function(){return[x,C]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",A,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:e.$page.url.startsWith("/admin/users")},"nav-link"]),"aria-current":"page",href:"/admin/users"},{default:(0,n.withCtx)((function(){return[T,S]})),_:1},8,["class"])])]),M,(0,n.createElementVNode)("ul",_,[(0,n.createElementVNode)("li",W,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:e.$page.url.startsWith("/admin/seos")},"nav-link"]),"aria-current":"page",href:"/admin/seos"},{default:(0,n.withCtx)((function(){return[B,D]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",j,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:e.$page.url.startsWith("/admin/shops")},"nav-link"]),"aria-current":"page",href:"/admin/shops"},{default:(0,n.withCtx)((function(){return[I,q]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",L,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:"/admin/settings/yandex-metrics"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/settings/yandex-metrics"},{default:(0,n.withCtx)((function(){return[O,z]})),_:1},8,["class"])]),(0,n.createElementVNode)("li",F,[(0,n.createVNode)(ee,{class:(0,n.normalizeClass)([{active:"/admin/settings/products"===e.$page.url},"nav-link"]),"aria-current":"page",href:"/admin/settings/products"},{default:(0,n.withCtx)((function(){return[H,Z]})),_:1},8,["class"])])]),P,(0,n.createElementVNode)("ul",U,[(0,n.createElementVNode)("li",R,[(0,n.createVNode)(ee,{class:"nav-link",href:"/admin/product/create"},{default:(0,n.withCtx)((function(){return[G,J]})),_:1})])])])]),(0,n.createElementVNode)("main",K,[(0,n.renderSlot)(e.$slots,"default")])])])])],64)}]])}}]);
//# sourceMappingURL=379.js.map