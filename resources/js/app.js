import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import "bootstrap-icons/font/bootstrap-icons.css";
import App from './App.vue';

window.Alpine = Alpine;
Alpine.start();

const pinia = createPinia()
const app = createApp(App);
app.use(pinia)
app.mount("#app");
