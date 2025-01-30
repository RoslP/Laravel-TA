import './bootstrap';
import { createApp } from 'vue';
import ProductTableComponent from './components/Product/ProductTableComponent.vue';

const app = createApp({});
app.component('product-table-component', ProductTableComponent);

app.mount('#app');
