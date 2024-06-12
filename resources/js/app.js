import './bootstrap';
import '../css/app.css';
import '../src/js/plugins/jquery/dist/jquery.min.js';
import 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js';
import '../src/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js';
import '../src/vendor/js-cookie/js.cookie.js';
import '../src/js/argon.js';
import 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el)
            .component('font-awesome-icon', FontAwesomeIcon);
    },
    progress: {
        color: '#4B5563',
    },
});
