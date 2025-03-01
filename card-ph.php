<!-- <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Temperature </h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-thermometer-half"></i>
                </div>
                <div class="ps-3">
                    <h6 id="temp">--°C</h6>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">pH</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-droplet"></i>
                </div>
                <div class="ps-3">
                    <h6 id="ph">--</h6>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Salinity</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-hexagon"></i>
                </div>
                <div class="ps-3">
                    <h6 id="salinity">--</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Dissolved Oxygen</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cloud"></i>
                </div>
                <div class="ps-3">
                    <h6 id="dissolveOxygen">--</h6>
                </div>
            </div>
        </div>
    </div>

</div> -->
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Sensor</h5>
                <div id="datasensor" style="width: 100%;"></div>
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const chartOptions = {
                            series: [{
                                name: 'pH',
                                data: [0]
                            }],
                            chart: {
                                type: 'area',
                                height: window.innerWidth < 768 ? 250 : 350,
                                width: "100%",
                                toolbar: {
                                    show: true,
                                    tools: {
                                        zoom: true,
                                        zoomin: true,
                                        zoomout: true,
                                        reset: true
                                    },
                                    autoSelected: 'zoom'
                                },
                                zoom: {
                                    enabled: true,
                                    type: 'xy',
                                    autoScaleYaxis: true
                                }
                            },
                            markers: {
                                size: 4
                            },
                            colors: ['#36A2EB'],
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.4,
                                    stops: [0, 90, 100]
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth',
                                width: 2
                            },
                            xaxis: {
                                type: 'datetime',
                                categories: []
                            },
                            tooltip: {
                                x: {
                                    format: 'dd/MM/yy HH:mm'
                                }
                            },
                            responsive: [{
                                    breakpoint: 768,
                                    options: {
                                        chart: {
                                            height: 250
                                        },
                                        markers: {
                                            size: 2
                                        }
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    options: {
                                        chart: {
                                            height: 200
                                        },
                                        markers: {
                                            size: 1
                                        }
                                    }
                                }
                            ]
                        };

                        const chart = new ApexCharts(document.querySelector("#datasensor"), chartOptions);
                        chart.render();

                        function updateChart() {
                            fetch('get-chart-data.php')
                                .then(response => response.json())
                                .then(data => {
                                    const phs = data.map(item => item.ph);
                                    const timestamps = data.map(item => item.timestamp);

                                    chart.updateOptions({
                                        series: [{
                                            name: 'pH',
                                            data: phs
                                        }],
                                        xaxis: {
                                            categories: timestamps
                                        }
                                    });
                                })
                                .catch(error => console.error('Error fetching data:', error));
                        }

                        setInterval(updateChart, 5000);
                    });
                </script>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-12">
        <div class="card info-card d-flex flex-column align-items-center justify-content-center">
            <div class="card-body text-center">
                <h5 class="card-title">pH</h5>
                <div class="chart-container d-flex justify-content-center align-items-center" style="width: 350px; height: 355px;">
                    <div id="pHChart"></div>
                    <h3 id="pHValue" class="position-absolute text-secondary" style="font-size: 24px; font-weight: bold;"></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const minDO = 0;
        const maxDO = 50;

        let doChart = new ApexCharts(document.querySelector("#pHChart"), {
            series: [0], // Default value
            chart: {
                type: 'radialBar',
                height: 400
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '60%'
                    },
                    track: {
                        background: '#bfbbbd'
                    },
                    dataLabels: {
                        show: false
                    }
                }
            },
            colors: ['#36A2EB'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 300
                    }
                }
            }]
        });

        doChart.render();

        function updateDOChart() {
            fetch('get-card-data.php')
                .then(response => response.json())
                .then(data => {
                    let pHValue = parseFloat(data.ph).toFixed(2);
                    let normalizedValue = Math.max(minDO, Math.min(pHValue, maxDO));
                    let seriesValue = ((normalizedValue - minDO) / (maxDO - minDO)) * 100;

                    doChart.updateSeries([seriesValue]);
                    document.getElementById("pHValue").innerText = pHValue;
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        setInterval(updateDOChart, 5000);
        updateDOChart();
    });
</script>