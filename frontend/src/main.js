import { createApp } from 'vue'
import App from './App.vue'
import Formatter from "./plugins/formatter";

const app = createApp(App);
app.use(Formatter);
app.mount('#app');