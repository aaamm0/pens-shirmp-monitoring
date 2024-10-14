<div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Temperature </h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-thermometer-half"></i>
                </div>
                <div class="ps-3">
                    <h6>20°C</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">pH</span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-droplet"></i>
                </div>
                <div class="ps-3">
                    <h6>7.5</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xxl-3 col-md-6">
    <div class="card info-card sales-card">
        <div class="card-body">
            <h5 class="card-title">Salinity</h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-hexagon"></i>
                </div>
                <div class="ps-3">
                    <h6>15 ppt</h6>
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
                    <h6>3 mg/L</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>
                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>
        <div class="card-body">
            <h5 class="card-title">Temperature</h5> 
            <div id="temperature"></div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#temperature"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">pH</span></h5>

            <!-- Line Chart -->
            <div id="pH"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#pH"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Salinity</h5>

            <!-- Line Chart -->
            <div id="salinitas"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#salinitas"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>
<div class="col-6">
    <div class="card">
        <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="card-title">Dissolved Oxygen</h5>

            <!-- Line Chart -->
            <div id="do"></div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#do"), {
                        series: [{
                            name: 'Sales',
                            data: [31, 40, 28, 51, 42, 82, 56],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                                show: true, // Show toolbar with zoom features
                                tools: {
                                    zoom: true, // Enable zoom
                                    zoomin: true, // Enable zoom-in button
                                    zoomout: true, // Enable zoom-out button
                                    reset: true // Enable reset zoom button
                                },
                                autoSelected: 'zoom'
                            },
                            zoom: {
                                enabled: true, // Enable zoom
                                type: 'xy', // Zoom along both axes (x and y)
                                autoScaleYaxis: true,
                                zoomedArea: {
                                    fill: {
                                        color: '#90CAF9', // Fill color when zoomed
                                        opacity: 0.4
                                    },
                                    stroke: {
                                        color: '#0D47A1', // Border color
                                        opacity: 0.9,
                                        width: 1
                                    }
                                }
                            }
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        }
                    }).render();
                });
            </script>
        </div>
    </div>
</div>