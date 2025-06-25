import { createApp } from 'vue';
import GerechtFilter from './components/GerechtFilter.vue';

const app = createApp({});

// Register globale component
app.component('GerechtFilter', GerechtFilter);

// Mount op een specifiek element in je Blade
app.mount('#app');

document.addEventListener('vue:add-menu-item', function(e) {
    window.addMenuItem(e.detail);
});