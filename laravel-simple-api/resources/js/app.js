import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler';
import ProductsGrid from './components/ProductsGrid.vue';
import CategoriesList from './components/CategoriesList.vue';

const app = createApp({});
app.component('products-grid', ProductsGrid);
app.component('categories-list', CategoriesList);
app.mount('#app');
