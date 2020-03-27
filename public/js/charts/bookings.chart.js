/* ==============================================
    Bar Chart Main
============================================== */
$.getJSON("http://127.0.0.1:8000/chart/booking", function (incomeChartJson) {

    var barChartLabels,
        barChartData1Values,
        barChartData1Backgrounds,
        barChartData1Hovers,
        barChartData2Values,
        barChartData2Backgrounds,
        barChartData2Hovers;

    barChartLabels = incomeChartJson.dayOfTheWeek ;
    barChartData1Values = incomeChartJson.bookings ;
    // barChartData2Values = incomeChartJson

    var bookingChartValConfig = {
        type: 'bar',
        options: {
            tooltips: {
                backgroundColor: "rgba(10, 10, 10, 0.85)",
                xPadding: 30,
                yPadding: 20,
                multiKeyBackground: 'transparent',
            },
            scales: {
                xAxes: [{
                    barPercentage: 0.3,
                    display: true,
                    // stacked: true,
                    gridLines: {
                        display: false,
                        color: '#fafafa'
                    },
                    ticks: {
                        fontColor: "#777"
                    }
                }],
                yAxes: [{
                    display: true,
                    // stacked: true,
                    gridLines: {
                        display: false,
                        color: '#fafafa'
                    },
                    ticks: {
                        fontColor: "#777",
                        max: 60,
                        min: 0
                    },
                }]
            },
            legend: {
                display: true,
                labels: {
                    fontColor: 'rgb(77, 77, 77)',
                    padding: 30,
                    boxWidth: 6,
                    usePointStyle: true,
                }
            },
            layout: {
                 padding: {
                     bottom: 0
                 }
             }
        },
        data: {
            labels: barChartLabels,
            datasets: [{
                    label: "   Active Bookings",
                    backgroundColor: "rgba(254, 156, 44, 0.84)",
                    borderColor: "rgba(254, 156, 44, 0.84)",
                    hoverBackgroundColor: "rgba(254, 156, 44, 0.84)",
                    borderWidth: 10,
                    data: barChartData1Values,
                },
                // {
                //     label: "   Cancelled Bookings",
                //     backgroundColor: "rgba(236, 236, 236, 1)",
                //     borderColor: "rgba(236, 236, 236, 1)",
                //     hoverBackgroundColor: "rgba(236, 236, 236, 1)",
                //     borderWidth: 10,
                //     data: barChartData2Values,
                // }
            ]
        }
    };

    bookingChartVal = new Chart('bookingChart', bookingChartValConfig);
});
