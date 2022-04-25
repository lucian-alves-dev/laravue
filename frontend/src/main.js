import { createApp } from 'vue';
import App from './App.vue';
import Api from "./plugins/api";
import Automator from "./plugins/automator";
import Formatter from "./plugins/formatter";
import FlexLoader from "./plugins/flex-loader";

const app = createApp(App);
app.config.globalProperties.Api = Api;
app.config.globalProperties.Automator = Automator;
app.config.globalProperties.Formatter = Formatter;
app.config.globalProperties.FlexLoader = FlexLoader;
app.mount('#app');