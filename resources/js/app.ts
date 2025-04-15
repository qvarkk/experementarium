import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {setupInterceptors} from "./Api/interceptors";
import api from "./Api/axios";

setupInterceptors(api);

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) })
            .use(plugin);

        app.config.globalProperties.$api = api;

        app.mount(el);
    },
})
