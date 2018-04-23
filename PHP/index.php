<!DOCTYPE html>
<html lang="en">

<head>
    <?php
 include '/Conexion/conexion.php';
    SESSION_START();
    if(!isset($_SESSION['usuario']))
    {
       echo "<script type=\"text/javascript\">
alert(\"Invalid File:Please Upload CSV File.\");
</script>";
         exit();

    }


?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FYLSA</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>

<body>

    <style>
    .table-fixed thead {
  width: 100%;
}
.table-fixed tbody {
  height: 150px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
    </style>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-stacked">
                <li class="sidebar-brand">
                    <a href="#">
                       FYLSA
                    </a>
                </li>


                          <li id="import"><a data-toggle="tab" href="#importar" ><i class="glyphicon glyphicon-download-alt"></i> Importar</a></li>
                        <li id="user" ><a data-toggle="collapse" data-target="#list_usuarios"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
                        <ul id="list_usuarios" class="collapse" style="list-style-type:none">
                            <li><a data-toggle="tab" href="#usuarios" ><i class="	glyphicon glyphicon-th-list"></i> Lista de Usuarios</a></li>
                            <li><a data-toggle="tab" href="#usuarios_Agregar" ><i class="	glyphicon glyphicon-plus"></i> Agregar</a></li>
                        </ul>
                          <li><a data-toggle="tab" href="#cotizar"><i class="glyphicon glyphicon-th-list"></i> Cotizar</a></li>




            </ul>

        </div>
        <!-- /#sidebar-wrapper -->
        <nav class="navbar navbar-default">
  <div class="container-fluid">

   <div class="navbar-header">
      <button type="submit" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  href="#menu-toggle" id="menu-toggle" class="navbar-brand" href="#"><span class="glyphicon glyphicon-menu-hamburger"></span>FYLSA</a>
    </div>
        <ul class="nav navbar-nav navbar-right">
       <li><a href="#" ><span class="glyphicon glyphicon-user"></span><label id="usuario"><?php echo $_SESSION['usuario'];?></label> </a></li>
      <li><a href="salir.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

    </ul>
  </div>
</nav>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">

                      <div class="tab-content">

<!--IMPORTAR-->
                          <div id="importar" class="tab-pane fade">
                                <div class="col-md-3 hidden-phone"></div>
                           <div class="col-md-6" id="form-login">
                    <form class="well" action="Listado/upload.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Import CSV/Excel file</legend>
                            <div class="control-group">
                                <div class="control-label">
                                    <label>CSV/Excel File:</label>
                                </div>
                                <div class="controls form-group">
                                    <input type="file" name="csv" id="file" class="input-large form-control">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">

                                <button type="submit" id="submit" name="Import" class="btn btn-success btn-flat btn-lg pull-right button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                                <form class="well" action="Listado/truncate.php" method="get" >
                                    <fieldset>
                            <legend>Borrar Base de Datos(Material)</legend>
                                 <button type="submit" id="btnBorrar"class="btn btn-danger btn-flat btn-lg pull-right button-loading" onclick="borrar();">Borrar</button>
                                    </fieldset>
                               </form>

                </div>


                          </div>
<!--FIN DE IMPORTAR-->
<!--COTIZAR-->
                                              <div id="cotizar" class="tab-pane fade in active">
                                                <h3>Cotizar</h3>

                                                                          <ul class="nav nav-tabs">
                                              <li class="active"><a data-toggle="tab" href="#home">Datos de la empresa</a></li>
                                              <li><a data-toggle="tab" href="#menu1">Producto</a></li>

                                            </ul>

                                            <div class="tab-content">
                                              <div id="home" class="tab-pane fade in active">
                                                <h3>Informacion de la empresa</h3>

                                                  <form action="Cotizacion/generarpdf.php" method="post">
                                                      <div class="panel panel-primary">
                                                           <div class="panel-heading"> Cotizacion</div>
                                                         <div class="panel-body">
                                                              <div class="col-md-6">

                                                         <label>NO.Cotizacion</label>   <input type="text" class="form-control" name="factura" required="true" >
                                                         <label>Cliente</label>   <input type="text" class="form-control" name="cliente" required="true" >
                                                         <label>A quien va dirigido</label>   <input type="text" class="form-control" name="dirigido" required="true" >
                                                         <label>Condiciones de pago</label>   <input type="text" class="form-control" name="condiciones" required="true" >
                                                         <label>Tiempo de Entrega</label>   <input type="text" class="form-control" name="tiempo" required="true">
                                                            </div>
                                                              <div class="col-md-6">
                                                         <label>Descripcion</label> <textarea class="form-control" rows="10" name="descripcion" required="true"></textarea>
                                                                  <div>
                                                                       <label>Total</label>   <input type="numbre" class="form-control" name="totalt" required="true" id="totalt" readonly >
                                                                  </div>
                                                                  <div >
                                                                       <input type="hidden" name="length" id="tam">
                                                                  </div>
                                                  </div>
                                                             <div class="col-lg-12"  style="overflow: auto;" >
                                                             <h3 id=""><label for="tabla10">Productos</label></h3>
                                                             <table class="table" id="tbcarrito"  >
                                                                    <tr>
                                                                      <input type="hidden" value="Clave" name="thclave">  <th>Clave</th>
                                                                       <input type="hidden" value="Descripcion" name="thdescripcion"> <th>Descripcion</th>
                                                                       <input type="hidden" value="Suministro/Instalacion" name="thsum"> <th>Sum/Ins</th>
                                                                      <input type="hidden" value="Cantidad" name="thcantidad">  <th>Cantidad</th>
                                                                        <th>Precio Suministro</th>
                                                                      <input type="hidden" value="Precio Mano de Obra" name="thpmo">  <th>Precio M.Obra</th>
                                                                      <input type="hidden" value="Precio Venta" name="thpreciov">  <th>Subtotal</th>
                                                                 </tr>
                                                                  </table>
                                                                 </div>
                                                          </div>
                                                          <div class="panel-footer">
                                                              <input type="submit" class="btn btn-success" value="Crear PDF">
                                                          </div>
                                                      </div>
                                                  </form>

                                              </div>
                                              <div id="menu1" class="tab-pane fade">

                                                       <h3>Datos del Producto</h3>
                                                  <div class="col-md-2">
                                                     <label>Clave</label>   <input type="text" class="form-control" id="clave1" >
                                                  </div>
                                                   <div class="col-md-6">
                                                       <label>Descripcion</label> <input type="text" class="form-control" id="descripcion" >
                                                  </div>
                                                  <div class="col-md-2">
                                                       <label>Cantidad</label><input type="number" class="form-control" id="cant" required="true"  >
                                                  </div>
                                                   <div class="col-md-2">
                                                       <label>U/M</label><input type="text" class="form-control" id="um" required="true"  >
                                                  </div>

                                                    <div class="col-md-3">
                                                       <label>Precio Suministro</label> <input type="text" class="form-control" id="precio" >
                                                  </div>

                                                    <div class="col-md-3">
                                                       <label>Precio M.Obra</label><input type="number" class="form-control" id="pmo"  >
                                                  </div>
                                                   <div class="col-md-3">
                                                       <label>S/M</label>
                                                       <select class="form-control" id="sum">
                                                                            <option>Suministro</option>
                                                                            <option>Instalacion</option>
                                                                            <option>Suministro e Instalacion</option>


                                                        </select>
                                                  </div>
                                                      <div class="col-md-3">
                                                       <label>Agregar</label><br><button class="btn btn-default" onclick="calcularp();">Agregar <span class="glyphicon glyphicon-plus"></span></button>
                                                  </div>
                                                   <br><br><br> <br><br>  <br> <br>





                     <div >
                         <div >
                          <div class="panel panel-primary">
                            <div class="panel-heading">
                                   <form accept-charset="utf-8" method="post">
                                                           <label>Buscar por Descripcion:</label>
                                                            <div class="input-group">
                                                              <input type="text" class="form-control" placeholder="Buscar por..." name="busqueda" id="busqueda" autocomplete="off" onkeydown="myFunction();" >
                                                              <span class="input-group-btn">
                                                                <button class="btn btn-default" type="button" onclick="buscar();"><span class="glyphicon glyphicon-search"></span></button>
                                                              </span>
                                                            </div><!-- /input-group -->

                               </form>
                            </div>

                                <div>
                            <table class="table table-fixed" id="tblistado">
                              <thead >
                               <tr>
                                  <th class="col-xs-2">Clave</th><th class="col-xs-6">Descripcion</th><th class="col-xs-1">UM</th><th class="col-xs-1">Precio M.Obra</th><th class="col-xs-2">Precio Sum</th>
                              </tr>
                              </thead>

                                <tbody id="resultadoBusqueda">

                                </tbody>



                            </table>
                          </div>
                      </div>
                    </div>


















                                               </div>


                                              </div>

                                            </div>



                         </div>
<!--FIN DE COTIZAR-->
<!--USUARIOS-->
                          <div id="usuarios" class="tab-pane fade">




                                                                  <!--
                                                                  Tabla de usuarios
                                                                 -->
                     <div class="panel panel-default">
                         <div class="panel-heading">
                              <h3 class="panel-title pull-left">
                                  Nomina
                                 </h3>


                             <div class="clearfix"></div>
                         </div>
                         <div class="panel-body">
                           <table class="table table-bordered table-hover specialCollapse" id="tbusuario">
                              <tr>
                                  <th>Nombre</th>
                                    <th>Puesto</th>
                                      <th>Cuenta</th>
                              </tr>
                               <div id="tbresponse">
                               
                               </div>
                               <!--
                              <tr>
                                <td>Allan Francisco Julian Novoa</td>
                                  <td>Departamento de TI</td>
                                    <td>0123456789</td>
                              </tr>
                             -->
                           </table>
                          </div>
                     </div>







                        </div>

<!--Agregar Usuarios-->
                          <div id="usuarios_Agregar" class="tab-pane fade">
                                    <div class="container" style="margin-top:30px" id="new_user">
                                        <div class="col-md-10 col-md-offset-1">
                                  <div class="panel panel-default">
                                <div class="panel-heading"><h3 class="panel-title"><strong>Agregar Nuevo Empleado </strong></h3>

                                </div>

                                <div class="panel-body">
                                 <form role="form" action="Usuarios/add_user.php" method="post">

                                          <div class="row">
                                              <div class="col-xs-12 col-sm-12 col-md-12">
                                                  <div class="form-group">
                                                      <input type="text" name="nombre" id="first_name" class="form-control" placeholder="Nombre" tabindex="1" required>
                                                  </div>
                                              </div>


                                          </div>
                                          <div class="form-group">
                                              <input type="text" name="puesto" id="display_name" class="form-control " placeholder="Puesto" tabindex="3" required>
                                          </div>
                                          <div class="form-group">
                                              <input type="email" name="correo" id="email" class="form-control " placeholder="Correo Electronico" tabindex="4" required>
                                          </div>
                                          <div class="row">
                                              <div class="col-xs-12 col-sm-6 col-md-6">
                                                  <div class="form-group">
                                                      <input type="text" name="cuenta" id="password" class="form-control " placeholder="Num. Cuenta" tabindex="5" required>
                                                  </div>
                                              </div>
                                              <!--<div class="col-xs-12 col-sm-6 col-md-6">
                                                  <div class="form-group">
                                                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
                                                  </div>-->
                                              </div>
                                          </div>

                                          <div class="panel-footer">
                                              <button type="submit" class="btn btn-success">Agregar Usuario</button>
                                          </div>




                                </form>
                                </div>
                                </div>
                                </div>
                                </div>
  </div>



                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
      <!-- Modales de Errores -->





    <!-- /#wrapper -->



    <!-- jQuery -->

    <script src="../js/jquery.js"></script>
     <script src="../js/myjs.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>



    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });


    </script>

</body>

</html>
