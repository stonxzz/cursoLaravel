import { createApp } from "vue";
//oruga
import Oruga from '@oruga-ui/oruga-next';

//Material design
import "@mdi/font/css/materialdesignicons.min.css"


import axios from "axios";

import App from "./App.vue";

const app = createApp(App).use(Oruga)

app.config.globalProperties.$axios = axios
window.axios = axios

app.mount('#app')