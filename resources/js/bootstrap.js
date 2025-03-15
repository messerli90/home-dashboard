import axios from 'axios';
import Alpine from 'alpinejs'
import resize from '@alpinejs/resize'

// Initialize Axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Initialize Alpine.js
window.Alpine = Alpine
Alpine.plugin(resize)
Alpine.start()
