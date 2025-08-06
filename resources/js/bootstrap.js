/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * CSRF Token configuration
 */
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Global error handling for AJAX requests
 */
window.axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response?.status === 419) {
            // CSRF token mismatch - refresh page
            window.location.reload();
        }
        
        if (error.response?.status === 422) {
            // Validation errors
            const errors = error.response.data.errors;
            if (errors && typeof window.DLHUtils !== 'undefined') {
                const firstError = Object.values(errors)[0][0];
                window.DLHUtils.showNotification(firstError, 'error');
            }
        }
        
        return Promise.reject(error);
    }
);

/**
 * Laravel Echo (optional - for real-time features)
 * Uncomment if you plan to use WebSockets/Broadcasting
 */
// import Echo from 'laravel-echo';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });