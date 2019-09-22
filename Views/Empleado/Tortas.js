/*=========================================================================================
    File Name: doughnut.js
    Description: Chartjs simple doughnut chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
   Version: 3.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Doughnut chart
// ------------------------------
$(window).on("load", function(){

    $.ajax({
        url: '../../Controllers/Empleado/ReporteE.php',
        type: 'GET',
        success: function(response){
            // let M1 = 0;
            // M2,M3,F1,F2,F3;
            // console.log(response);
            let tasks = JSON.parse(response);
            console.log(tasks);
            let template = '';
            tasks.forEach(task =>{
                E1 = task.Casado;
                E2 = task.Divorciado;
                E3 = task.Soltero;
                E4 = task.Viudo;

                //Get the context of the Chart canvas element we want to select
                var ctx = $("#simple-doughnut-chart");

                // Chart Options
                var chartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    responsiveAnimationDuration:500,
                };

                // Chart Data
                var chartData = {
                    labels: ["Soltero", "Casado", "Divorciado", "Viudo"],
                    datasets: [{
                        label: "My First dataset",
                        data: [E1, E2, E3, E4],
                        backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D','#FF4558', '#28D094'],
                    }]
                };

                var config = {
                    type: 'doughnut',

                    // Chart Options
                    options : chartOptions,

                    data : chartData
                };

                // Create the chart
                var doughnutSimpleChart = new Chart(ctx, config);
            });
        }
    })
});