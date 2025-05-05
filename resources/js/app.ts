import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
    theme: {
        themes:{
            light: {
                colors:{
                    primary: '#FFFFFF',
                    'surface-variant': '#000000',
                },
                variables:{
                    'border-opacity': 1,
                }
            }
        }
    }
  })

createInertiaApp({
    title: title => title ? `${title} - ЛабЗавр` : 'ЛабЗавр',
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .mount(el);
    },
});
