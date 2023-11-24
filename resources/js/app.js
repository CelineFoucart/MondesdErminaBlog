import './bootstrap';

import Alpine from 'alpinejs';
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import "bootstrap-icons/font/bootstrap-icons.css";
import App from './App.vue';
import TomSelect from 'tom-select/dist/js/tom-select.base.js';
import 'tom-select/dist/css/tom-select.default.min.css';
import TomSelect_remove_button from 'tom-select/dist/js/plugins/remove_button.js';

window.Alpine = Alpine;
Alpine.start();

const pinia = createPinia()
const app = createApp(App);
app.use(pinia)
app.mount("#app");

TomSelect.define('remove_button', TomSelect_remove_button);
new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}});