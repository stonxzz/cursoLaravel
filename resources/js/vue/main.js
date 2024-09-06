import { createApp } from "vue";

//Tailwind
import '../../css/vue.css'

//oruga
import Oruga from '@oruga-ui/oruga-next';



//Material design
import "@mdi/font/css/materialdesignicons.min.css"


import axios from "axios";

import App from "./App.vue";
import router from "./router";

const app = createApp(App).use(Oruga).use(router)

app.config.globalProperties.$axios = axios
window.axios = axios

app.mount('#app')