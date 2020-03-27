$.getJSON("js/visitorsChartVal.json", function (data) {

    var lineChartLabels,
        lineChartData1Values;

    lineChartLabels = data.map(function (e) {
        return e.label;
    });
    lineChartData1Values = data.map(function (e) {
        return e.value;
    });

    var visitorsChartConfig = {
        type: 'line',
        options: {
            responsive: true,
            tooltips: {
                backgroundColor: "rgba(10, 10, 10, 0.85)",
                xPadding: 30,
                yPadding: 15,
                multiKeyBackground: 'rgba(0, 0, 0, 0)',
            },
            layout: {
                padding: {
                    left: 15,
                    right: 15
                }
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        color: 'rgba(249, 249, 249, 0.0)'
                    },
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontColor: "#555",
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        color: 'rgba(249, 249, 249, 0.0)'
                    },
                    ticks: {
                        max: 26,
                        min: 10,
                        fontColor: "#555",
                    },
                }]
            },
            legend: {
                display: false,
                labels: {
                    fontColor: '#3e3e3e',
                    padding: 0,
                    boxWidth: 6,
                    usePointStyle: true,
                }
            }
        },
        data: {
            labels: lineChartLabels,
            datasets: [{
                label: " New visitors",
                fill: true,
                lineTension: 0.35,
                backgroundColor: config.gradientTransparent,
                borderColor: config.gradientPrimary,
                pointBorderColor: config.gradientPrimary,
                pointHoverBackgroundColor: config.gradientPrimary,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                borderWidth: 2,
                pointBackgroundColor: config.gradientPrimary,
                pointBorderWidth: 2,
                pointHoverRadius: 2,
                pointBorderColor: "rgba(236, 165, 21, 0.85)",
                pointHoverBorderColor: "rgba(236, 165, 21, 0.85)",
                pointHoverBorderWidth: 15,
                pointRadius: 0,
                pointHitRadius: 5,
                data: lineChartData1Values,
                spanGaps: false
            }]
        }
    };

    visitorsChart = new Chart('visitorsChart', visitorsChartConfig);
});
