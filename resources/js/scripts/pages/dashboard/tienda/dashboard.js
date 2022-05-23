$( document ).ready(function() {
    let pedidos = JSON.parse($('#pedidos').val());
    let $orderChart = document.querySelector('#order-chart');
    let $statisticsProfitChart = document.querySelector('#statistics-profit-chart');


    let pedidosTotales = [];
    let sumaPedidos = 0;

    pedidos.forEach(function(pedidosMes) {
        pedidosTotales.push(pedidosMes.totalPedidos);
        sumaPedidos += pedidosMes.totalPedidos;
    });
    $('#totalPedidos').text(sumaPedidos)

    // Pedidos
    let orderChartOptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        colors: [window.colors.solid.warning],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [
            {
                name: 'Orders',
                data: pedidosTotales
            }
        ],
        xaxis: {
            labels: {
                show: false
            },
            axisBorder: {
                show: false
            }
        },
        yaxis: [
            {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                padding: { left: 0, right: 0 }
            }
        ],
        tooltip: {
            x: { show: false }
        }
    };
    let orderChart = new ApexCharts($orderChart, orderChartOptions);

    // Ingresos
    let statisticsProfitChartOptions = {
        chart: {
            height: 70,
            type: 'line',
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            }
        },
        grid: {
            borderColor: '#EBEBEB',
            strokeDashArray: 5,
            xaxis: {
                lines: {
                    show: true
                }
            },
            yaxis: {
                lines: {
                    show: false
                }
            },
            padding: {
                top: -30,
                bottom: -10
            }
        },
        stroke: {
            width: 4
        },
        colors: [window.colors.solid.info],
        series: [
            {
                name: 'Ingresos',
                data: [0, 20, 5, 30, 15, 45]
            }
        ],
        markers: {
            size: 2,
            colors: window.colors.solid.info,
            strokeColors: window.colors.solid.info,
            strokeWidth: 2,
            strokeOpacity: 1,
            strokeDashArray: 0,
            fillOpacity: 1,
            discrete: [
                {
                    seriesIndex: 0,
                    dataPointIndex: 5,
                    fillColor: '#ffffff',
                    strokeColor: window.colors.solid.info,
                    size: 5
                }
            ],
            shape: 'circle',
            radius: 2,
            hover: {
                size: 3
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Dec"],
            labels: {
                show: true,
                style: {
                    fontSize: '0px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            show: false
        },
        tooltip: {
            x: {
                show: false
            }
        }
    };
    let statisticsProfitChart = new ApexCharts($statisticsProfitChart, statisticsProfitChartOptions);

    // Inicializamos las gráficas
    statisticsProfitChart.render();
    orderChart.render();
})
