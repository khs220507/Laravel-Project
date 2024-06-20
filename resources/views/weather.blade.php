<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Dashboard</title>
    <!-- Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div id="app">
        <weather-bar :t1h-value="{{ $t1hValue }}" :reh-value="{{ $rehValue }}"></weather-bar>
    </div>

    <script>
        Vue.component('weather-bar', {
            props: ['t1hValue', 'rehValue'],
            template: `
                <div>
                    <canvas id="weatherChart"></canvas>
                </div>
            `,
            mounted() {
                this.renderChart();
            },
            methods: {
                renderChart() {
                    const ctx = document.getElementById('weatherChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Temperature (℃)', 'Humidity (%)'],
                            datasets: [{
                                label: 'Weather Data',
                                data: [this.t1hValue, this.rehValue],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
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
        });

        new Vue({
            el: '#app'
        });
    </script>
</body>
</html>


