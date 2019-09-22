<?php
	session_start();
	$CiEmpleado=$_SESSION['CiEmpleado'];
	if($CiEmpleado==null || $CiEmpleado==''){
		header("Location:../../index.php");
		die();
	}
	// echo $CiUsuario;
?>
<?php include '../web/mainBegin.php'; ?>
<?php include '../web/mainHeader.php'; ?>
<?php include '../web/mainMenu.php'; ?>

<input type="hidden" id="CiEmpleado">

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <!-- <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Administrador</h3> -->
                    <!-- <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Tables</a>
                                </li>
                                <li class="breadcrumb-item active">Basic Tables
                                </li>
                            </ol>
                        </div>
                    </div> -->
                <!-- </div>
            </div> -->
            <div class="content-body">

                <!-- Contextual classes start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lista de Empleados</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <!-- <p>Mostrando Empleados <b> Activos</b></p> -->
                                    <form class="form">
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Filtros de Busqueda</h4>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Apellido Paterno</label>
                                                        <input type="text" id="txtApellidoPaterno" class="form-control" placeholder="Apellido Paterno" name="lname">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Apellido Materno</label>
                                                        <input type="text" id="txtApellidoMaterno" class="form-control" placeholder="Apellido Materno" name="lname">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput2">Primer Nombre</label>
                                                        <input type="text" id="txtPrimerNombre" class="form-control" placeholder="Primer Nombre" name="lname">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">Segundo Nombre</label>
                                                        <input type="text" id="txtSegundoNombre" class="form-control" placeholder="Segundo Nombre" name="fname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput3">Ci</label>
                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Ci" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput3">Edad</label>
                                                        <input type="text" id="projectinput3" class="form-control" placeholder="Edad" name="email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput5">Cargo</label>
                                                        <select id="projectinput5" name="interested" class="form-control">
                                                            <option value="none" selected="" disabled="">Buscar por</option>
                                                            <option value="design">Prensista</option>
                                                            <option value="development">Obrero</option>
                                                            <option value="illustration">Supervisor</option>
                                                            <option value="branding">Almasenero</option>
                                                            <option value="video">Contador</option>
                                                            <option value="video">Auditor</option>
                                                            <option value="video">Secretaria</option>
                                                            <option value="video">Seguridad</option>
                                                            <option value="video">Limpieza</option>
                                                            <option value="video">Administrador</option>
                                                            <option value="video">Distribuidor</option>
                                                            <option value="video">Chofer</option>
                                                            <option value="video">Diseñador</option>
                                                            <option value="video">Marqueting</option>
                                                            <option value="video">Editor</option>
                                                            <option value="video">Publicista</option>
                                                            <option value="video">Vendedor</option>
                                                            <option value="video">Director</option>
                                                            <option value="video">Asistente</option>
                                                            <option value="video">Revisor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Ci</th>
                                                    <th>Nombre</th>
                                                    <th>Edad</th>
                                                    <th>Cargo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tasks">
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes end -->

                <!-- Contextual classes start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Mostrando reportes por DIA</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <p>Ingreso y Salida por dia Trabajado</p>
                                    <input type="date" id="FechaDiaHoras" >
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Ingreso</th>
                                                    <th>Salida</th>
                                                    <th>Total Horas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="DiaHoras">
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes end -->

                <!-- Contextual classes start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Mostrando reportes por SEMANA</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <p>Mostrando todos los Dias de la SEMANA</p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miercoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Total Horas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="SemanaHoras">
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes end -->

                <!-- Contextual classes start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Mostrando reportes por MES</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <!-- <p>Mostrando todos los Dias de la Mes</p> -->
                                    <!-- <select name="select">
                                        <option value="01">Enero</option> 
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>
                                    </select> -->
                                    <!-- <div class="form-group mb-1 col-sm-12 col-md-2"> -->
                                        <!-- <label for="profession">Profession</label> -->
                                        <!-- <br> -->
                                        <!-- <select class="form-control" id="profession">
                                            <option selected="" disabled="">Select Option</option>
                                            <option value="01">Enero</option> 
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select> -->
                                        <input type="month" id="Mes" class="form-control">
                                        <br>
                                    <!-- </div> -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Lunes</th>
                                                    <th>Martes</th>
                                                    <th>Miercoles</th>
                                                    <th>Jueves</th>
                                                    <th>Viernes</th>
                                                    <th>Total Horas</th>
                                                </tr>
                                            </thead>
                                            <tbody id="MesHoras">
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes end -->

                <!-- Contextual classes start -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reporte: A</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <p>Listar todos aquellos cargos donde tengan más de 20 empleados. Cada cargo  debe estar con su respectiva cantidad de empleados. </p>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Cargo</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ReporteA">
        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contextual classes end -->

                <!-- Column Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Cantidad de Hombre y Mugeres en los ultimos 3 Años</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <canvas id="column-chart" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Simple Doughnut Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Reporte E</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <canvas id="simple-doughnut-chart" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bar Chart</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <canvas id="bar-chart" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../modern-admin/app-assets/vendors/js/charts/chart.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<script type="text/javascript" src="./Baras.js"></script> 
<!-- <script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/bar.js"></script> -->
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/bar-stacked.js"></script>
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/bar-multi-axis.js"></script>
<script type="text/javascript" src="Grafica.js"></script> 
<!-- <script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/column.js"></script> -->
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/column-stacked.js"></script>
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/bar/column-multi-axis.js"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page JS-->
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/pie-doughnut/pie.js"></script>
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/pie-doughnut/pie-simple.js"></script>
<script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut.js"></script>
<script type="text/javascript" src="Tortas.js"></script> 
<!-- <script src="../../modern-admin/app-assets/js/scripts/charts/chartjs/pie-doughnut/doughnut-simple.js"></script> -->
<!-- END: Page JS-->

<script src="../../lib/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="app.js"></script> 

<?php include '../web/mainFooter.php'; ?>
<?php include '../web/mainEnd.php'; ?>

   