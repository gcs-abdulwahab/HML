import './bootstrap';
import * as bootstrap from 'bootstrap';

import { createApp } from 'vue';
import router from './router';

import main from './components/index.vue';

let app = createApp(main);

app.use(router)
app.mount('#app')
