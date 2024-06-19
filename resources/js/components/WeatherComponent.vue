<template>
    <div>
      <h1>Weather in {{ city }}</h1>
      <p>Temperature: {{ weather.main.temp }}°K</p>
      <p>Weather: {{ weather.weather[0].description }}</p>
    </div>
  </template>
  
  <script>
  export default {
    props: ['weather'],
    data() {
      return {
        city: 'Berlin'
      };
    }
  };
  </script>
  
  <style scoped>
  h1 {
    font-size: 2em;
    margin-bottom: 0.5em;
  }
  </style>
  