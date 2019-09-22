$(document).ready(function() {

    //Console.log("Daniel");
    fetchTask();
    ReporteA();

    $('#task-result').hide();

    // $('#search').on('keyup', function(e) {
    //     if ($('#search').val()) {
    //         let search = $('#search').val();
    //         //console.log(search);
    //         $.ajax({
    //             url: '../../controllers/Estudiante/LogicaBuscarEstudiante.php',
    //             type: 'POST',
    //             data: { search },
    //             success: function(response) {
    //                 let task = JSON.parse(response);
    //                 //console.log(task);
    //                 let template = '';
    //                 task.forEach(task => {
    //                     edad = Edad(task.FechaNacimiento)
    //                     template += `
    //                     <tr taskIdEstudiante="${task.IdEstudiante}">
    //                         <td>${task.IdEstudiante}</td>
    //                         <td>${task.NombreCompleto}</td> 
    //                         <td>${edad}</td>   
    //                         <td>
    //                             <button class="task-item">
    //                                 Actualizar
    //                             </button>
    //                         </td>  
    //                         <td>
    //                             <button class="Mostrar">
    //                                 Mostrar Mas
    //                             </button>
    //                         </td>            
    //                         <td>
    //                             <button class="task-delete">
    //                                 Delete
    //                             </button>
    //                         </td>   
    //                     </tr>
    //                     `
    //                 });
    //                 $('#tasks').html(template);
    //             }
    //         })
    //     }else{
    //         fetchTask();
    //     }
    // })

    

    $('#txtApellidoPaterno').on('keyup', function(e) {   
        if ($('#txtApellidoPaterno').val()) {
            let ApellidoPaterno = $('#txtApellidoPaterno').val();
            let ApellidoMaterno = $('#txtApellidoMaterno').val();
            let PrimerNombre = $('#txtPrimerNombre').val();
            let SegundoNombre = $('#txtSegundoNombre').val();
            const Datos={
                txtApellidoPaterno: ApellidoPaterno,
                txtApellidoMaterno: ApellidoMaterno,
                txtPrimerNombre: PrimerNombre,
                txtSegundoNombre: SegundoNombre
            };
            // console.log(ApellidoPaterno);
            $.post('../../Controllers/Empleado/LoguicaBuscarEmpleado.php', Datos , function(response) {
                // console.log(response);
                let tasks = JSON.parse(response);
                // console.log(tasks);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr taskCiEmpleado="${task.CiEmpleado}" NombreCompleto="${task.NombreCompleto}">
                            <td>${task.CiEmpleado}</td>
                            <td>${task.NombreCompleto}</td>  
                            <td>${edad}</td>    
                            <td>${task.Cargo}</td>
                            <td>
                                <button class="btn btn-info btn-min-width mr-1 mb-1 Mostrar">
                                    Ver mas
                                </button>
                            </td>         
                        </tr>
                        `
                });
                $('#tasks').html(template);
            });
        }else{
            fetchTask();
        }
    });

    $('#txtApellidoMaterno').on('keyup', function(e) {   
        if ($('#txtApellidoMaterno').val()) {
            let ApellidoPaterno = $('#txtApellidoPaterno').val();
            let ApellidoMaterno = $('#txtApellidoMaterno').val();
            let PrimerNombre = $('#txtPrimerNombre').val();
            let SegundoNombre = $('#txtSegundoNombre').val();
            const Datos={
                txtApellidoPaterno: ApellidoPaterno,
                txtApellidoMaterno: ApellidoMaterno,
                txtPrimerNombre: PrimerNombre,
                txtSegundoNombre: SegundoNombre
            };
            // console.log(ApellidoPaterno);
            $.post('../../Controllers/Empleado/LoguicaBuscarEmpleado.php', Datos , function(response) {
                // console.log(response);
                let tasks = JSON.parse(response);
                // console.log(tasks);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr taskCiEmpleado="${task.CiEmpleado}" NombreCompleto="${task.NombreCompleto}">
                            <td>${task.CiEmpleado}</td>
                            <td>${task.NombreCompleto}</td>  
                            <td>${edad}</td>    
                            <td>${task.Cargo}</td>
                            <td>
                                <button class="btn btn-info btn-min-width mr-1 mb-1 Mostrar">
                                    Ver mas
                                </button>
                            </td>         
                        </tr>
                        `
                });
                $('#tasks').html(template);
            });
        }else{
            fetchTask();
        }
    });

    $('#txtPrimerNombre').on('keyup', function(e) {   
        if ($('#txtPrimerNombre').val()) {
            let ApellidoPaterno = $('#txtApellidoPaterno').val();
            let ApellidoMaterno = $('#txtApellidoMaterno').val();
            let PrimerNombre = $('#txtPrimerNombre').val();
            let SegundoNombre = $('#txtSegundoNombre').val();
            const Datos={
                txtApellidoPaterno: ApellidoPaterno,
                txtApellidoMaterno: ApellidoMaterno,
                txtPrimerNombre: PrimerNombre,
                txtSegundoNombre: SegundoNombre
            };
            // console.log(ApellidoPaterno);
            $.post('../../Controllers/Empleado/LoguicaBuscarEmpleado.php', Datos , function(response) {
                // console.log(response);
                let tasks = JSON.parse(response);
                // console.log(tasks);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr taskCiEmpleado="${task.CiEmpleado}" NombreCompleto="${task.NombreCompleto}">
                            <td>${task.CiEmpleado}</td>
                            <td>${task.NombreCompleto}</td>  
                            <td>${edad}</td>    
                            <td>${task.Cargo}</td>
                            <td>
                                <button class="btn btn-info btn-min-width mr-1 mb-1 Mostrar">
                                    Ver mas
                                </button>
                            </td>         
                        </tr>
                        `
                });
                $('#tasks').html(template);
            });
        }else{
            fetchTask();
        }
    });

    $('#txtSegundoNombre').on('keyup', function(e) {   
        if ($('#txtSegundoNombre').val()) {
            let ApellidoPaterno = $('#txtApellidoPaterno').val();
            let ApellidoMaterno = $('#txtApellidoMaterno').val();
            let PrimerNombre = $('#txtPrimerNombre').val();
            let SegundoNombre = $('#txtSegundoNombre').val();
            const Datos={
                txtApellidoPaterno: ApellidoPaterno,
                txtApellidoMaterno: ApellidoMaterno,
                txtPrimerNombre: PrimerNombre,
                txtSegundoNombre: SegundoNombre
            };
            // console.log(ApellidoPaterno);
            $.post('../../Controllers/Empleado/LoguicaBuscarEmpleado.php', Datos , function(response) {
                // console.log(response);
                let tasks = JSON.parse(response);
                // console.log(tasks);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr taskCiEmpleado="${task.CiEmpleado}" NombreCompleto="${task.NombreCompleto}">
                            <td>${task.CiEmpleado}</td>
                            <td>${task.NombreCompleto}</td>  
                            <td>${edad}</td>    
                            <td>${task.Cargo}</td>
                            <td>
                                <button class="btn btn-info btn-min-width mr-1 mb-1 Mostrar">
                                    Ver mas
                                </button>
                            </td>         
                        </tr>
                        `
                });
                $('#tasks').html(template);
            });
        }else{
            fetchTask();
        }
    });

    function fetchTask(){
        $.ajax({
            url: '../../Controllers/Empleado/LoguicaMostrarEmpleados.php',
            type: 'GET',
            success: function(response){
                // console.log(response);
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr taskCiEmpleado="${task.CiEmpleado}" NombreCompleto="${task.NombreCompleto}">
                            <td>${task.CiEmpleado}</td>
                            <td>${task.NombreCompleto}</td>  
                            <td>${edad}</td>    
                            <td>${task.Cargo}</td>
                            <td>
                                <button class="btn btn-info btn-min-width mr-1 mb-1 Mostrar">
                                    Ver mas
                                </button>
                            </td>         
                        </tr>
                        `
                });
                $('#tasks').html(template);
            }
        });
    }

    $(document).on('click', '.Mostrar', function(){
        // AbrirModalReporte();
        let element = $(this)[0].parentElement.parentElement;
        let CiEmpleado = $(element).attr('taskCiEmpleado');
        $('#CiEmpleado').val(CiEmpleado);
        let NombreCompleto = $(element).attr('NombreCompleto');
        // console.log(CiEmpleado);
        var hoy = hoyFecha();
        // let fechaActual = $('#Fecha').val();

        $('#Nombre').html(NombreCompleto);

        const Datos={
            txtCiEmpleado: CiEmpleado,
            txtFechaActual: hoy
            // txtFechaActual: fechaActual
        };

        $('#FechaDia').html(hoy);   
        // console.log(f);
        $.post('../../Controllers/Empleado/LoguicaMostrarHorasDia.php', Datos , function(response) {
            // console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            var TotalH = 0;
            // console.log(tasks);
            tasks.forEach(task =>{
                template += `
                    <tr>
                        <td>${task.HoraIngreso}</td>
                        <td>${task.HoraSalida}</td>  
                        <td>${task.TotalHoras}</td> 
                    </tr>`
                    TotalH = TotalH + parseInt(task.TotalHoras);
            });
            if(TotalH < 8){
                template += `
                    <tr>
                        <td></td>
                        <td></td>
                        <td bgcolor="#FFFF00">${TotalH}</td>
                    </tr>`
            }else{
                template += `
                    <tr>
                        <td></td>
                        <td></td>
                        <td>${TotalH}</td>
                    </tr>`
            }
            $('#DiaHoras').html(template);
        });

        var fecha = new Date();
        var inicio = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate() - fecha.getDay() + 1);
        var fin = new Date(fecha.getFullYear(), fecha.getMonth(), fecha.getDate() + 5 - fecha.getDay());
        let FechaInicio = Fecha(inicio);
        let FechaFin = Fecha(fin);

        const DatosSemana={
            txtCiEmpleado: CiEmpleado,
            txtFechaInicio: FechaInicio,
            txtFechaFin: FechaFin
            // txtFechaActual: fechaActual
        };
        
        $('#FechaSemana').html(FechaInicio+" - "+FechaFin);

        $.post('../../Controllers/Empleado/LoguicaMostrarHorasSemana.php', DatosSemana , function(response) {
            // console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            // console.log(tasks);
            tasks.forEach(task =>{
                template += `
                    <tr>
                        <td>${task.Lunes}</td>
                        <td>${task.Martes}</td>
                        <td>${task.Miercoles}</td>
                        <td>${task.Jueves}</td>
                        <td>${task.Viernes}</td>
                        <td>${task.TotalHoras}</td> 
                    </tr>`
            });
            $('#SemanaHoras').html(template);
        });
    });


    // // ESTUDIANTE
    // $("#SiHayCi").hide();

    // // $('#txtCi').removeAttr("required");
    // // $('#txtFotoCarAmv').removeAttr("required");
    // // $('#txtFotoCarRev').removeAttr("required");
    // // $("#txtFotoCarAmv").hide();
    // // $("#txtFotoCarRev").hide();
    // // $("#target").hide();
    // // $("#label").hide();
    // // $("#label1").hide();
    // // $("#label2").hide();

    // $("#edad").hide();

    // // $("#target").blur(function() {
    // //     var HayCi = 1; 
    // //     $("#txtFotoCarAmv").show();
    // //     $("#txtFotoCarRev").show();
    // // });

    $("#FechaDiaHoras").blur(function() {   
        let CiEmpleado = $('#CiEmpleado').val();
        // console.log(CiEmpleado);
        let fechaActual = $("#FechaDiaHoras").val()

        const Datos={
            txtCiEmpleado: CiEmpleado,
            txtFechaActual: fechaActual
        };

        $('#FechaDia').html(fechaActual);
        // console.log(CiEmpleado);
        // console.log(fechaActual);
        $.post('../../Controllers/Empleado/LoguicaMostrarHorasDia.php', Datos , function(response) {
            // console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            var TotalH = 0;
            // console.log(tasks);
            tasks.forEach(task =>{
                template += `
                    <tr>
                        <td>${task.HoraIngreso}</td>
                        <td>${task.HoraSalida}</td>  
                        <td>${task.TotalHoras}</td> 
                    </tr>`
                    TotalH = TotalH + parseInt(task.TotalHoras);
            });
            if(TotalH < 8){
                template += `
                    <tr>
                        <td></td>
                        <td></td>
                        <td bgcolor="#FFFF00">${TotalH}</td>
                    </tr>`
            }else{
                template += `
                    <tr>
                        <td></td>
                        <td></td>
                        <td>${TotalH}</td>
                    </tr>`
            }
            $('#DiaHoras').html(template);
        });
    });

    $("#Mes").blur(function() {   
        let Mes = $('#Mes').val();
        let CiEmpleado = $('#CiEmpleado').val();
        // console.log(CiEmpleado);

        const Datos={
            txtCiEmpleado: CiEmpleado,
            txtMes: Mes
        };

        // $('#FechaDia').html(fechaActual);
        // console.log(CiEmpleado);
        // console.log(fechaActual);
        $.post('../../Controllers/Empleado/LoguicaMostrarHorasMes.php', Datos , function(response) {
            console.log(response);
            let tasks = JSON.parse(response);
            let template = '';
            // console.log(tasks);
            tasks.forEach(task =>{
                template += `
                    <tr>
                        <td>${task.Lunes}</td>
                        <td>${task.Martes}</td>
                        <td>${task.Miercoles}</td>
                        <td>${task.Jueves}</td>
                        <td>${task.Viernes}</td>
                        <td>${task.TotalHoras}</td> 
                    </tr>`
            });
            $('#MesHoras').html(template);
        });
    });

    function Edad(FechaNacimiento) {
        var fechaNace = new Date(FechaNacimiento);
        var fechaActual = new Date()

        var mes = fechaActual.getMonth();
        var dia = fechaActual.getDate();
        var año = fechaActual.getFullYear();

        fechaActual.setDate(dia);

        fechaActual.setMonth(mes);

        fechaActual.setFullYear(año);

        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));

        return edad;
    }
    // $(document).on('click', '#cerrarReporte', function(){
    //     CerrarModalReporte();
    // })
    
    // function AbrirModalReporte(){
    //     $("#ventanaModalReporte").slideDown("slow");
    // }
    
    // function CerrarModalReporte(){
    //     $("#ventanaModalReporte").slideUp("fast");
    // }
    // $(document).on('click', '#cerrarActuailizar', function(){
    //     CerrarModalActuailizar();
    // })
    
    // function AbrirModalActuailizar(){
    //     $("#ventanaModalActuailizar").slideDown("slow");
    // }
    
    // function CerrarModalActuailizar(){
    //     $("#ventanaModalActuailizar").slideUp("fast");
    // }
    

    function hoyFecha(){
        var hoy = new Date();
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yyyy = hoy.getFullYear();
        
        dd = addZero(dd);
        mm = addZero(mm);

        return yyyy+'/'+mm+'/'+dd;
    }

    function addZero(i) {
        if (i < 10) {
            i = '0' + i;
        }
        return i;
    }

    function Fecha(fecha){
        var hoy = fecha;
        var dd = hoy.getDate();
        var mm = hoy.getMonth()+1;
        var yyyy = hoy.getFullYear();
        
        dd = addZero(dd);
        mm = addZero(mm);

        return yyyy+'/'+mm+'/'+dd;
    }

    

    function ReporteA(){
        $.ajax({
            url: '../../Controllers/Empleado/ReorteA.php',
            type: 'GET',
            success: function(response){
                // console.log(response);
                let tasks = JSON.parse(response);
                // console.log(tasks);
                let template = '';
                tasks.forEach(task =>{
                    edad = Edad(task.FechaNacimiento);
                    template += `
                        <tr>
                            <td>${task.Cargo}</td>
                            <td>${task.TotalHoras}</td>  
                            </td>         
                        </tr>
                        `
                });
                $('#ReporteA').html(template);
            }
        });
    }

});