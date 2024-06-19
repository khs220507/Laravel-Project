import './bootstrap';

import Vue from 'vue';
import WeatherComponent from './components/WeatherComponent.vue';

const app = new Vue({
  el: '#app',
  components: {
    WeatherComponent
  }
});