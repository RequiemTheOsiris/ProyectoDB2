/*=========================================================================================
    File Name: column.js
    Description: Chartjs column chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
   Version: 3.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Column chart
// ------------------------------
$(window).on("load", function(){
    // let M1,M2,M3,F1,F2,F3;

    $.ajax({
        url: '../../Controllers/Empleado/ReporteD.php',
        type: 'GET',
        success: function(response){
            // let M1 = 0;
            // M2,M3,F1,F2,F3;
            // console.log(response);
            let tasks = JSON.parse(response);
            // console.log(tasks);
            // let template = '';
            tasks.forEach(task =>{
                M1 = task.AM;
                M2 = task.BM;
                M3 = task.CM;
                F1 = task.AF;
                F2 = task.BF;
                F3 = task.CF;
                // edad = Edad(task.FechaNacimiento);
                // template += `
                //     <tr>
                //         <td>${task.Cargo}</td>
                //         <td>${task.TotalHoras}</td>  
                //         </td>         
                //     </tr>
                    // `
                    var ctx = $("#column-chart");

                    // Chart Options
                    var chartOptions = {
                        // Elements options apply to all of the options unless overridden in a dataset
                        // In this case, we are setting the border of each bar to be 2px wide and green
                        elements: {
                            rectangle: {
                                borderWidth: 2,
                                borderColor: 'rgb(0, 255, 0)',
                                borderSkipped: 'bottom'
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
                            display: true,
                            text: ''
                        }
                    };
                
                    // Chart Data
                    var chartData = {
                        labels: ["2017","2018","2019"],
                        datasets: [{
                            label: "Hombres",
                            data: [M1,M2,M3],
                            backgroundColor: "#28D094",
                            hoverBackgroundColor: "rgba(22,211,154,.9)",
                            borderColor: "transparent"
                        }, {
                            label: "Mujeres",
                            data: [F1 ,F2 ,F3],
                            backgroundColor: "#F98E76",
                            hoverBackgroundColor: "rgba(249,142,118,.9)",
                            borderColor: "transparent"
                        }]
                    };
                
                    var config = {
                        type: 'bar',
                
                        // Chart Options
                        options : chartOptions,
                
                        data : chartData
                    };
                
                    // Create the chart
                    var lineChart = new Chart(ctx, config);
            });
        }
    });

    // console.log(M1);

    //Get the context of the Chart canvas element we want to select
    // var ctx = $("#column-chart");

    // // Chart Options
    // var chartOptions = {
    //     // Elements options apply to all of the options unless overridden in a dataset
    //     // In this case, we are setting the border of each bar to be 2px wide and green
    //     elements: {
    //         rectangle: {
    //             borderWidth: 2,
    //             borderColor: 'rgb(0, 255, 0)',
    //             borderSkipped: 'bottom'
    //         }
    //     },
    //     responsive: true,
    //     maintainAspectRatio: false,
    //     responsiveAnimationDuration:500,
    //     legend: {
    //         position: 'top',
    //     },
    //     scales: {
    //         xAxes: [{
    //             display: true,
    //             gridLines: {
    //                 color: "#f3f3f3",
    //                 drawTicks: false,
    //             },
    //             scaleLabel: {
    //                 display: true,
    //             }
    //         }],
    //         yAxes: [{
    //             display: true,
    //             gridLines: {
    //                 color: "#f3f3f3",
    //                 drawTicks: false,
    //             },
    //             scaleLabel: {
    //                 display: true,
    //             }
    //         }]
    //     },
    //     title: {
    //         display: true,
    //         text: 'Chart.js Bar Chart'
    //     }
    // };

    // // Chart Data
    // var chartData = {
    //     labels: ["2017","2018","2019"],
    //     datasets: [{
    //         label: "Hombres",
    //         data: [65,70,56],
    //         backgroundColor: "#28D094",
    //         hoverBackgroundColor: "rgba(22,211,154,.9)",
    //         borderColor: "transparent"
    //     }, {
    //         label: "Mujeres",
    //         data: [28 ,40 ,50],
    //         backgroundColor: "#F98E76",
    //         hoverBackgroundColor: "rgba(249,142,118,.9)",
    //         borderColor: "transparent"
    //     }]
    // };

    // var config = {
    //     type: 'bar',

    //     // Chart Options
    //     options : chartOptions,

    //     data : chartData
    // };

    // // Create the chart
    // var lineChart = new Chart(ctx, config);
});