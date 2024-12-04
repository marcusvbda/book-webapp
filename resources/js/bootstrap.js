import axios from 'axios';
import Toastify from 'toastify-js'
import "toastify-js/src/toastify.css"

window.axios = axios;
window.Toastify = Toastify

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
