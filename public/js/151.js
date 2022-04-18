"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[151,319],{9623:(e,t,n)=>{n.d(t,{Z:()=>i});var a=n(4015),r=n.n(a),o=n(3645),c=n.n(o)()(r());c.push([e.id,".nested-enter-active[data-v-921a56a4],.nested-leave-active[data-v-921a56a4]{transition:all .3s ease-in-out}.nested-leave-active[data-v-921a56a4]{transition-delay:.1s}.nested-enter-from[data-v-921a56a4],.nested-leave-to[data-v-921a56a4]{opacity:0;transform:translateX(200px)}.nested-enter-active .inner[data-v-921a56a4],.nested-leave-active .inner[data-v-921a56a4]{transition:all 1s ease-in-out}.nested-enter-active .inner[data-v-921a56a4]{transition-delay:10s}.nested-enter-from .inner[data-v-921a56a4],.nested-leave-to .inner[data-v-921a56a4]{opacity:.001;transform:translateX(30px)}","",{version:3,sources:["webpack://./resources/js/Shared/BigCart.vue"],names:[],mappings:"AA0DA,4EACE,8BACF,CAGA,sCACE,oBACF,CAEA,sEAGE,SAAU,CADV,2BAEF,CAGA,0FAEE,6BACF,CAGA,6CACE,oBACF,CAEA,oFAQE,YAAc,CANd,0BAOF",sourcesContent:['<template>\n  <transition :duration="500" name="nested">\n    <div v-show="opened" id="big-cart" class="py-3">\n      <div class="row mx-0">\n        <div class="col-12 bg-white">\n          <button class="btn bg-transparent fw-normal text-uppercase ms-auto w-auto d-flex px-3 py-3"\n                  @click="switchOpened"\n          >\n            {{ $t(\'components.BigCart.close\') }}\n          </button>\n        </div>\n      </div>\n\n      <div class="row big-cart-items-list mx-0 gy-md-3 gy-4 mt-0">\n        <div v-for="i in 20" class="col-12 item">\n          <div class="row">\n            <div class="col-4 col-md-4">\n              <img alt="Item Name" class="img-fluid border-0" src="https://placeimg.com/720/1280/any">\n            </div>\n            <div class="col">\n              <div class="row">\n                <div class="col-12">\n                  <h5 class="item-name">ВИНТАЖНОЕ ПАЛЬТО ИЗ ХЛОПКА</h5>\n                </div>\n                <div class="col-12">\n                  <span class="item-price">100 000 ₸ </span>\n                </div>\n                <div class="col-12">\n                  <button class="btn bg-transparent px-0 py-3 mt-2 remove-item">Удалить из корзины</button>\n                </div>\n              </div>\n            </div>\n          </div>\n        </div>\n      </div>\n\n\n    </div>\n  </transition>\n</template>\n\n<script>\nexport default {\n  name: "BigCart",\n  emits: [\'switchedOpened\'],\n  data: () => ({\n    opened: false\n  }),\n  methods: {\n    switchOpened() {\n      this.opened = !this.opened\n      this.$emit(\'switchedOpened\', this.opened)\n    }\n  }\n}\n<\/script>\n\n<style scoped>\n.nested-enter-active, .nested-leave-active {\n  transition: all 0.3s ease-in-out;\n}\n\n/* delay leave of parent element */\n.nested-leave-active {\n  transition-delay: .1s;\n}\n\n.nested-enter-from,\n.nested-leave-to {\n  transform: translateX(200px);\n  opacity: 0;\n}\n\n/* we can also transition nested elements using nested selectors */\n.nested-enter-active .inner,\n.nested-leave-active .inner {\n  transition: all 1s ease-in-out;\n}\n\n/* delay enter of nested element */\n.nested-enter-active .inner {\n  transition-delay: 10s;\n}\n\n.nested-enter-from .inner,\n.nested-leave-to .inner {\n  transform: translateX(30px);\n  /*\n  \tHack around a Chrome 96 bug in handling nested opacity transitions.\n    This is not needed in other browsers or Chrome 99+ where the bug\n    has been fixed.\n  */\n  opacity: 0.001;\n}\n</style>'],sourceRoot:""}]);const i=c},8151:(e,t,n)=>{n.r(t),n.d(t,{default:()=>s});var a=n(821),r={class:"container"},o=(0,a.createElementVNode)("h1",null,"Test",-1),c=(0,a.createTextVNode)("На about");const i={name:"Index",layout:n(9319).default,components:{}};const s=(0,n(3744).Z)(i,[["render",function(e,t,n,i,s,l){var d=(0,a.resolveComponent)("Link");return(0,a.openBlock)(),(0,a.createElementBlock)("div",r,[o,(0,a.createVNode)(d,{href:"/about"},{default:(0,a.withCtx)((function(){return[c]})),_:1}),(0,a.createElementVNode)("p",null,(0,a.toDisplayString)(e.$store.state.currencies.currency.name),1)])}]])},9319:(e,t,n)=>{n.r(t),n.d(t,{default:()=>ge});var a=n(821),r=(0,a.createElementVNode)("meta",{type:"description",content:"{{ seo.description}}","head-key":"description"},null,-1),o=(0,a.createElementVNode)("div",{class:"darken-for-opened-cart"},null,-1),c={class:"mt-3"};var i=n(3907),s={class:"navbar navbar-expand navbar-light bg-transparent"},l={class:"container"},d=(0,a.createElementVNode)("button",{class:"navbar-toggler",type:"button","data-toggle":"collapse","data-target":"#navbarNav","aria-controls":"navbarNav","aria-expanded":"false","aria-label":"Toggle navigation"},[(0,a.createElementVNode)("span",{class:"navbar-toggler-icon"})],-1),u={class:"collapse navbar-collapse justify-content-center",id:"navbarNav"},p={class:"navbar-nav text-uppercase"},m={class:"nav-item"},v=(0,a.createTextVNode)(" Новые поступления "),f={class:"nav-item"},g=(0,a.createTextVNode)(" Подборка недели "),b={class:"nav-item"};const h={name:"SubMenu",emits:["switchBigCart"],methods:{openCart:function(){this.$emit("switchBigCart")}}};var w=n(3744);const y=(0,w.Z)(h,[["render",function(e,t,n,r,o,c){var i=(0,a.resolveComponent)("Link");return(0,a.openBlock)(),(0,a.createElementBlock)("nav",s,[(0,a.createElementVNode)("div",l,[d,(0,a.createElementVNode)("div",u,[(0,a.createElementVNode)("ul",p,[(0,a.createElementVNode)("li",m,[(0,a.createVNode)(i,{class:(0,a.normalizeClass)(["nav-link",{active:"Users/Index"===e.$page.component}]),href:"/"},{default:(0,a.withCtx)((function(){return[v]})),_:1},8,["class"])]),(0,a.createElementVNode)("li",f,[(0,a.createVNode)(i,{class:(0,a.normalizeClass)(["nav-link",{active:"Users/About"===e.$page.component}]),href:"/about"},{default:(0,a.withCtx)((function(){return[g]})),_:1},8,["class"])]),(0,a.createElementVNode)("li",b,[(0,a.createElementVNode)("button",{class:"btn border-0 shadow-none rounded-0 bg-transparent text-dark",onClick:t[0]||(t[0]=function(){return c.openCart&&c.openCart.apply(c,arguments)})}," Корзина ")])])])])])}]]);var N={class:"navbar navbar-expand navbar-light bg-transparent"},E={class:"container"},C={class:"collapse navbar-collapse",id:"navbarNavPrimary"},V={class:"navbar-nav text-uppercase w-100"},k={class:"nav-item dropdown"},O={class:"nav-link dropdown-toggle",href:"#",id:"navbarDropdown",role:"button","data-bs-toggle":"dropdown","aria-expanded":"false"},x={class:"dropdown-menu","aria-labelledby":"navbarDropdown"},B=["onClick"],S={class:"name-currency"},A={class:"nav-item dropdown me-auto"},D={class:"nav-link dropdown-toggle",href:"#",id:"navbarDropdown",role:"button","data-bs-toggle":"dropdown","aria-expanded":"false"},j={class:"dropdown-menu","aria-labelledby":"navbarDropdown"},P={class:"name-currency"},T={class:"name-currency"},_=(0,a.createElementVNode)("li",{class:"nav-item mx-auto"},[(0,a.createElementVNode)("img",{src:"public/img/menu-logo.png",class:"img-fluid",alt:"Asay Jurek Logo"})],-1),L={class:"nav-item dropdown ms-auto pe-3 left-border"},F=(0,a.createElementVNode)("a",{href:"#",class:"nav-link btn bg-transparent dropdown-toggle p-0",id:"userDropdown",role:"button","data-bs-toggle":"dropdown","aria-expanded":"false"},[(0,a.createElementVNode)("i",{class:"far fa-user"})],-1),M={class:"dropdown-menu dropdown-menu-end","aria-labelledby":"userDropdown"},Z={class:""},I=(0,a.createTextVNode)("Вход"),z={class:""},G=(0,a.createTextVNode)("Регистрация"),U={class:"nav-item ps-3"},X=[(0,a.createElementVNode)("i",{class:"far fa-shopping-bag"},null,-1)];function q(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function H(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?q(Object(n),!0).forEach((function(t){R(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):q(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function R(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}const J={name:"Menu",emits:["switchBigCart"],computed:H({},(0,i.rn)("currencies",{currency:function(e){return e.currency},currencies:function(e){return e.all_currencies}})),methods:H(H(H({},(0,i.nv)("currencies",["setCurrency"])),(0,i.nv)("i18n",["setLocale"])),{},{openCart:function(){this.$emit("switchBigCart")},locale:function(e){this.setLocale({locale:e,i18n:this.$i18n})}})},Q=(0,w.Z)(J,[["render",function(e,t,n,r,o,c){var i=(0,a.resolveComponent)("Link");return(0,a.openBlock)(),(0,a.createElementBlock)("nav",N,[(0,a.createElementVNode)("div",E,[(0,a.createElementVNode)("div",C,[(0,a.createElementVNode)("ul",V,[(0,a.createElementVNode)("li",k,[(0,a.createElementVNode)("a",O,(0,a.toDisplayString)(e.currency.short_name),1),(0,a.createElementVNode)("ul",x,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(e.currencies,(function(t){return(0,a.openBlock)(),(0,a.createElementBlock)("li",null,[(0,a.createElementVNode)("a",{class:(0,a.normalizeClass)(["dropdown-item",t.id===e.currency.id?"active":""]),href:"#",onClick:function(n){return e.setCurrency(t)}},[(0,a.createTextVNode)((0,a.toDisplayString)(t.short_name)+" ",1),(0,a.createElementVNode)("span",S,(0,a.toDisplayString)(t.translate[e.$i18n.locale].name),1)],10,B)])})),256))])]),(0,a.createElementVNode)("li",A,[(0,a.createElementVNode)("a",D,(0,a.toDisplayString)("ru"===e.$i18n.locale?"RUS":"ENG"),1),(0,a.createElementVNode)("ul",j,[(0,a.createElementVNode)("li",null,[(0,a.createElementVNode)("a",{class:(0,a.normalizeClass)(["dropdown-item","ru"===e.$i18n.locale?"active":""]),href:"#",onClick:t[0]||(t[0]=function(e){return c.locale("ru")})},[(0,a.createTextVNode)((0,a.toDisplayString)(e.$t("locales.ru.title"))+" ",1),(0,a.createElementVNode)("span",P,(0,a.toDisplayString)(e.$t("locales.ru.description")),1)],2)]),(0,a.createElementVNode)("li",null,[(0,a.createElementVNode)("a",{class:(0,a.normalizeClass)(["dropdown-item","en"===e.$i18n.locale?"active":""]),href:"#",onClick:t[1]||(t[1]=function(e){return c.locale("en")})},[(0,a.createTextVNode)((0,a.toDisplayString)(e.$t("locales.en.title"))+" ",1),(0,a.createElementVNode)("span",T,(0,a.toDisplayString)(e.$t("locales.en.description")),1)],2)])])]),_,(0,a.createElementVNode)("li",L,[F,(0,a.createElementVNode)("ul",M,[(0,a.createElementVNode)("li",Z,[(0,a.createVNode)(i,{href:"/",class:"dropdown-item"},{default:(0,a.withCtx)((function(){return[I]})),_:1})]),(0,a.createElementVNode)("li",z,[(0,a.createVNode)(i,{href:"/",class:"dropdown-item"},{default:(0,a.withCtx)((function(){return[G]})),_:1})])])]),(0,a.createElementVNode)("li",U,[(0,a.createElementVNode)("button",{class:"nav-link btn bg-transparent p-0",onClick:t[2]||(t[2]=function(){return c.openCart&&c.openCart.apply(c,arguments)})},X)])])])])])}]]);var Y={id:"big-cart",class:"py-3"},K={class:"row mx-0"},W={class:"col-12 bg-white"},ee={class:"row big-cart-items-list mx-0 gy-md-3 gy-4 mt-0"},te={class:"col-12 item"},ne=[function(e){return(0,a.pushScopeId)("data-v-921a56a4"),e=e(),(0,a.popScopeId)(),e}((function(){return(0,a.createElementVNode)("div",{class:"row"},[(0,a.createElementVNode)("div",{class:"col-4 col-md-4"},[(0,a.createElementVNode)("img",{alt:"Item Name",class:"img-fluid border-0",src:"https://placeimg.com/720/1280/any"})]),(0,a.createElementVNode)("div",{class:"col"},[(0,a.createElementVNode)("div",{class:"row"},[(0,a.createElementVNode)("div",{class:"col-12"},[(0,a.createElementVNode)("h5",{class:"item-name"},"ВИНТАЖНОЕ ПАЛЬТО ИЗ ХЛОПКА")]),(0,a.createElementVNode)("div",{class:"col-12"},[(0,a.createElementVNode)("span",{class:"item-price"},"100 000 ₸ ")]),(0,a.createElementVNode)("div",{class:"col-12"},[(0,a.createElementVNode)("button",{class:"btn bg-transparent px-0 py-3 mt-2 remove-item"},"Удалить из корзины")])])])],-1)}))];const ae={name:"BigCart",emits:["switchedOpened"],data:function(){return{opened:!1}},methods:{switchOpened:function(){this.opened=!this.opened,this.$emit("switchedOpened",this.opened)}}};var re=n(3379),oe=n.n(re),ce=n(9623),ie={insert:"head",singleton:!1};oe()(ce.Z,ie);ce.Z.locals;const se=(0,w.Z)(ae,[["render",function(e,t,n,r,o,c){return(0,a.openBlock)(),(0,a.createBlock)(a.Transition,{duration:500,name:"nested"},{default:(0,a.withCtx)((function(){return[(0,a.withDirectives)((0,a.createElementVNode)("div",Y,[(0,a.createElementVNode)("div",K,[(0,a.createElementVNode)("div",W,[(0,a.createElementVNode)("button",{class:"btn bg-transparent fw-normal text-uppercase ms-auto w-auto d-flex px-3 py-3",onClick:t[0]||(t[0]=function(){return c.switchOpened&&c.switchOpened.apply(c,arguments)})},(0,a.toDisplayString)(e.$t("components.BigCart.close")),1)])]),(0,a.createElementVNode)("div",ee,[((0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(20,(function(e){return(0,a.createElementVNode)("div",te,ne)})),64))])],512),[[a.vShow,e.opened]])]})),_:1})}],["__scopeId","data-v-921a56a4"]]);var le=n(9038),de=n(4865),ue=n.n(de);function pe(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function me(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?pe(Object(n),!0).forEach((function(t){ve(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):pe(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function ve(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}const fe={name:"Layout",components:{Menu:Q,SubMenu:y,BigCart:se},data:function(){return{openedBigCart:!1}},computed:(0,i.rn)(["currencies"]),setup:function(){return{seo:(0,a.computed)((function(){return(0,le.qt)().props.value.seo}))}},methods:me(me({},(0,i.nv)({initialCurrencies:"currencies/initial"})),{},{callSwitchStatusBigCart:function(){this.$refs["big-cart"].switchOpened()},eventSwitchedOpenedBigCart:function(e){var t=this;this.openedBigCart=e;var n=$(".darken-for-opened-cart");e?($("body").css("overflow","hidden"),setTimeout((function(){console.log(n),n.click((function(){t.openedBigCart&&t.callSwitchStatusBigCart()}))}),100)):($("body").css("overflow","auto"),n.unbind("click"))}}),created:function(){this.$nextTick((function(){document.querySelector(".darken-for-opened-cart").addEventListener("animationstart",(function(e){console.log(123),"fade-in"===e.animationName&&e.target.classList.add("did-fade-in")})),document.querySelector(".darken-for-opened-cart").addEventListener("animationend",(function(e){console.log(1111),"fade-out"===e.animationName&&e.target.classList.remove("did-fade-in")}))}))},beforeMount:function(){if(null!==this.currencies.last_update){var e=new Date(this.currencies.last_update),t=((new Date).getTime()-e.getTime())/60/60/1e3;Math.floor(t)>1&&this.initialCurrencies()}else this.initialCurrencies();ue().done()}},ge=(0,w.Z)(fe,[["render",function(e,t,n,i,s,l){var d=(0,a.resolveComponent)("Head"),u=(0,a.resolveComponent)("big-cart"),p=(0,a.resolveComponent)("Menu"),m=(0,a.resolveComponent)("SubMenu");return(0,a.openBlock)(),(0,a.createElementBlock)(a.Fragment,null,[(0,a.createVNode)(d,null,{default:(0,a.withCtx)((function(){return[(0,a.createElementVNode)("title",null,(0,a.toDisplayString)(i.seo.title),1),r]})),_:1}),(0,a.createVNode)(u,{ref:"big-cart",onSwitchedOpened:l.eventSwitchedOpenedBigCart},null,8,["onSwitchedOpened"]),(0,a.createElementVNode)("div",{id:"page",class:(0,a.normalizeClass)(e.openedBigCart?"opened":"")},[o,(0,a.createVNode)(p,{onSwitchBigCart:l.callSwitchStatusBigCart},null,8,["onSwitchBigCart"]),(0,a.createVNode)(m,{onSwitchBigCart:l.callSwitchStatusBigCart},null,8,["onSwitchBigCart"]),(0,a.createElementVNode)("div",c,[(0,a.renderSlot)(e.$slots,"default")])],2)],64)}]])}}]);
//# sourceMappingURL=151.js.map