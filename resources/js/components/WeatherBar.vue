<template>
    <div>
      <canvas id="weatherChart"></canvas>
    </div>
  </template>
  
  <script>
  import { Chart } from 'chart.js';
  
  export default {
    props: {
      data: {
        type: Object,
        required: true
      }
    },
    mounted() {
      this.renderChart();
    },
    methods: {
      renderChart() {
        const ctx = document.getElementById('weatherChart').getContext('2d');
        const items = this.data.response.body.items.item;
  
        const categories = items.map(item => item.category);
        const values = items.map(item => parseFloat(item.obsrValue));
  
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: categories,
            datasets: [{
              label: 'Weather Data',
              data: values,
              backgroundColor: 'rgba(54, 162, 235, 0.2)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      }
    }
  };
  </script>
  
  <style scoped>
  #weatherChart {
    max-width: 600px;
    margin: 0 auto;
  }
  </style>
  