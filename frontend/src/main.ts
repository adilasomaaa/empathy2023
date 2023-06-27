import { createApp } from 'vue';
import App from '@/App.vue';
import axios from 'axios';
import { useAuth } from './stores/auth';
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import "leaflet/dist/leaflet.css";
const app = createApp(App);

axios.defaults.withCredentials = true;
axios.defaults.baseURL = 'http://localhost:8000/';
app.config.globalProperties.$backend = "http://localhost:8000/";
// pinia store
import { createPinia } from 'pinia';

const store = createPinia();

app.use(store);

const auth = useAuth()

await auth.getUser();

import router from '@/router';
app.use(router);

// main app css
import '@/assets/css/app.css';

// perfect scrollbar
import PerfectScrollbar from 'vue3-perfect-scrollbar';
app.use(PerfectScrollbar);

//vue-meta
import { createHead } from '@vueuse/head';
const head = createHead();
app.use(head);

// set default settings
import appSetting from '@/app-setting';
appSetting.init();

//vue-i18n
import i18n from '@/i18n';
app.use(i18n);

// tippy tooltips
import { TippyPlugin } from 'tippy.vue';
app.use(TippyPlugin);

//input mask
import Maska from 'maska';
app.use(Maska);

//markdown editor
import VueEasymde from 'vue3-easymde';
import 'easymde/dist/easymde.min.css';
app.use(VueEasymde);

// popper
import Popper from 'vue3-popper';
app.component('Popper', Popper);

// json to excel
import vue3JsonExcel from 'vue3-json-excel';
app.use(vue3JsonExcel);

app.directive('can', (el, binding) =>{
    // if(auth.ability.includes(binding.value.permission)){
    //     el.style.display = 'block';
    // }else{
    //     el.style.display = 'none';
    // }
});

app.component('l-map',LMap)
app.component('l-tile-layer',LTileLayer)
app.component('l-marker',LMarker)
app.mount('#app');