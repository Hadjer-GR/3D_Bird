import axios from "axios";

const axiosPlugin = {
    install(Vue) {
      // Set a base URL for your API requests
      axios.defaults.baseURL = 'https://api.example.com';
  
      // Set common headers (if needed)
      axios.defaults.headers.common['Authorization'] = "Bearer "+localStorage.getItem("token");
  
      // Add Axios to the Vue instance
      Vue.prototype.$axios = axios;
    },
  };
  
  export default axiosPlugin;