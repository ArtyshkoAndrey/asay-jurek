(self.webpackChunk=self.webpackChunk||[]).push([[773],{9172:(e,n,t)=>{"use strict";var o=t(4865),r=t.n(o),i=t(821),s=t(9038),l=t(1966),a=t(9680),c=t(9150);const u=JSON.parse('{"locales":{"ru":{"title":"RUS","description":"Русский"},"en":{"title":"ENG","description":"Английский"}},"components":{"BigCart":{"close":"Закрыть"}},"dropdown-user":{"login":"Войти","register":"Регистрация","profile":"Профиль","order":"Мои заказы","logout":"Выйти"},"login":{"inputs":{"password":"Пароль","remember":"Запомнить меня"},"buttons":{"login":"Войти"}}}'),d=JSON.parse('{"locales":{"ru":{"title":"RUS","description":"Russian"},"en":{"title":"ENG","description":"English"}},"components":{"BigCart":{"close":"Close"}},"dropdown-user":{"login":"Login","register":"Register","profile":"Profile","order":"My Order","logout":"Logout"},"login":{"inputs":{"password":"Password","remember":"Remember me"},"buttons":{"login":"Login"}}}');function m(e,n){e.locale=n,console.log(n),axios.defaults.headers.common["Accept-Language"]=n,document.querySelector("html").setAttribute("lang",n)}var g=t(3907),p=t(3168),f=t(6455),w=t.n(f);const h={namespaced:!0,state:function(){return{currency_id:1,currency:{id:null,name:null,short_name:null},all_currencies:[],last_update:null}},mutations:{initialCurrencies:function(e,n){var t=n.currencies.find((function(e){return e.default}));e.all_currencies=n.currencies,e.currency=t,e.currency_id=t.id,e.last_update=new Date,console.log(e.all_currencies)},setCurrency:function(e,n){e.currency=n,e.currency_id=n.id}},actions:{initial:function(e){var n=e.commit,t=e.dispatch;axios.get("/api/currencies").then((function(e){n("initialCurrencies",e.data.payload)})).catch((function(e){if(console.warn(e),e instanceof Error){var n=e.hasOwnProperty("response")?e.response.data.payload.message:e.message;w().fire({title:"Ошибка загрузки данных валют",html:n+"<br> <br> Обратитесь к администратору сайта",icon:"error",allowOutsideClick:!1,confirmButtonText:"Перезагрузить"}).then((function(e){e.isConfirmed&&w().fire({title:"Ожидайте",html:"Подключение к серверу",timer:1500,showConfirmButton:!1,allowOutsideClick:!1,timerProgressBar:!0}).then((function(e){e.dismiss===w().DismissReason.timer&&t("initial")}))}))}}))},setCurrency:function(e,n){(0,e.commit)("setCurrency",n)}}};const v={namespaced:!0,state:function(){return{locale:"ru",locales:["ru","en"]}},mutations:{setLocale:function(e,n){console.log(n),m(n.i18n,n.locale),e.locale=n.locale,localStorage.setItem("locale",n.locale)},startSite:function(e,n){m(n.i18n,localStorage.getItem("locale")?localStorage.getItem("locale"):e.locale)}},actions:{setLocale:function(e,n){(0,e.commit)("setLocale",n)}}};var y=new p.ZP({storage:window.localStorage});const b=(0,g.MT)({modules:{currencies:h,i18n:v},plugins:[y.plugin]});t(7333);var C=Promise.all([t.e(898),t.e(581)]).then(t.bind(t,9581));(0,s.yP)({resolve:function(e){var n=t(4985)("./".concat(e));return n.layout=n.layout||C,n},setup:function(e){var n=e.el,t=e.App,o=e.props,l=e.plugin;r().start();var a=function(){var e={ru:u,en:d};e=Object.assign(e);var n=localStorage.getItem("locale")?localStorage.getItem("locale"):"ru",t={locale:n,fallbackLocale:"en",globalInjection:!0,messages:e};localStorage.setItem("locale",n);var o=(0,c.o)(t);return m(o,t.locale),o}();(0,i.createApp)({render:function(){return(0,i.h)(t,o)}}).use(l).use(b).use(a).component("Link",s.rU).component("Head",s.Fb).mount(n)}}).then((function(e){})),l.I.init({delay:10,color:"#89171A",includeCSS:!0,showSpinner:!0}),a.Inertia.on("start",(function(){return r().start()})),a.Inertia.on("finish",(function(){return r().done()}))},7333:(e,n,t)=>{"use strict";t.r(n);t(7244);window._=t(6486);t(9755);window.$=t(9755),window.axios=t(9669),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest"},5874:()=>{},4985:(e,n,t)=>{var o={"./Users/About":[3399,898,399],"./Users/About.vue":[3399,898,399],"./Users/Index":[8923,898,923],"./Users/Index.vue":[8923,898,923],"./Users/Login":[8926,898,926],"./Users/Login.vue":[8926,898,926]};function r(e){if(!t.o(o,e))return Promise.resolve().then((()=>{var n=new Error("Cannot find module '"+e+"'");throw n.code="MODULE_NOT_FOUND",n}));var n=o[e],r=n[0];return Promise.all(n.slice(1).map(t.e)).then((()=>t(r)))}r.keys=()=>Object.keys(o),r.id=4985,e.exports=r},4654:()=>{}},e=>{var n=n=>e(e.s=n);e.O(0,[170,898],(()=>(n(9172),n(5874))));e.O()}]);
//# sourceMappingURL=app.js.map