/*=========================================================================================
    File Name: bar.js
    Description: Chartjs bar chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
   Version: 3.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Bar chart
// ------------------------------
$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#bar-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each horizontal bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'left'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: false,
            text: 'Chart.js Horizontal Bar Chart'
        }
    };

    // Chart Data
    var chartData = {
        labels: ["Prensista", "Obrero", "Supervisor", "Almasenero","Contador","Auditor","Secretaria","Seguridad","Limpieza","Administrador","Distribuidor","Chofer","Diseñador","Marqueting","Editor","Publicista","Vendedor","Director","Asistente","Revisor"],
        datasets: [{
            label: "Catidad de Emplados",
            data: [1, 1, 1, 1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
            backgroundColor: "#28D094",
            hoverBackgroundColor: "rgba(22,211,154,.9)",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'horizontalBar',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var lineChart = new Chart(ctx, config);
});