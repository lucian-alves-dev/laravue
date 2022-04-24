import { createApp } from 'vue'
import App from './App.vue'
import Automator from "./plugins/automator";
import Formatter from "./plugins/formatter";
import FlexLoader from "./plugins/flex-loader";

const app = createApp(App);
app.config.globalProperties.Automator = Automator;
app.config.globalProperties.Formatter = Formatter;
app.config.globalProperties.FlexLoader = FlexLoader;
app.mount('#app');