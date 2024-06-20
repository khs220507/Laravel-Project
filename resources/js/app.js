import Vue from 'vue';
import WeatherBar from './components/WeatherBar.vue';

// Register the component globally
Vue.component('weather-bar', WeatherBar);

const app = new Vue({
  el: '#app'
});
