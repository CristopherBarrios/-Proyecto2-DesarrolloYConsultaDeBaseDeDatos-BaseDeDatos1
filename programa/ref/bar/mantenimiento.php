<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hospital</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../../img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/fav/favicon-16x16.png">
    <link rel="manifest" href="../../img/fav/site.webmanifest">

    <link rel="stylesheet" href="../../css/barra.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    

</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">

                </span>

                <div class="text logo-text">
                    <span class="name">Proyecto</span>
                    <span class="profession">Hospital</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="bar.php">
                            
                            <i class='bx bx-heart icon' ></i>
                            <span class="text ">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="medicamento.php">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Medicamento</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="expediente.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text ">Expediente</span>
                        </a>
                    </li>

                    <li class="search-box">
                        <a href="mantenimiento.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Mantenimiento</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="admin.php">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Reporteria</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                        <i class='bx bx-search icon'></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>



                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../../../index.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
        <div class="text">Mantenimiento de Usuarios</div>
        <div>
            <form action="../../php/actions/insertar.php" method="POST" enctype="multipart/form-data">
                <div class="form-container">
                    <h2 class="form-title">Agrega nuevos Usuarios</h2>
                    <div class="form-group">
                        <label for="doc_name">Nombre:</label>
                        <input name="name" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad de salud:</label>
                        <select required name="opcion" class="form-control">
                                        <option hidden value="Escoja">Selecciona una opción</option>
								
								
								
									<?php
									require('../../php/conectar/conexion.php');
									$res2 =  pg_query($con,"SELECT * FROM establecimiento ORDER BY estab_id ASC");
									while($row2 = pg_fetch_array($res2))
									{
										?>
										<option value="<?php echo $row2['estab_id']?>"> <?php echo $row2['nombre'];?></option>";
										<?php 
									} ?>



								</select>
                    </div>
                    <div class="form-group">
                        <label for="informacion">Información:</label>
                        <textarea name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" class="btn btn-primary" value="Agregar">
                    </div>
                </div>
            </form>
        </div>




        <div class="separacion">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container">
                    <h2 class="form-title">Actualizar Informacion Usuarios</h2>
                    <div class="form-group">
                        <label for="doc_name">Nombre:</label>
                        <input name="doc_name" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad de salud:</label>
                        <select required name="opcion" class="form-control">
                                        <option hidden value="Escoja">Selecciona una opción</option>
								
								
								
									<?php
									require('../../php/conectar/conexion.php');
									$res2 =  pg_query($con,"SELECT * FROM establecimiento ORDER BY estab_id ASC");
									while($row2 = pg_fetch_array($res2))
									{
										?>
										<option value="<?php echo $row2['estab_id']?>"> <?php echo $row2['nombre'];?></option>";
										<?php 
									} ?>



								</select>
                    </div>
                    <div class="form-group">
                        <label for="informacion">Información:</label>
                        <textarea name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <input name="submit" type="submit" class="btn btn-primary" value="Modificar">
                    </div>
                </div>
            </form>
        </div>



        <div class="separacion">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container">
                    <h2 class="form-title">Historial de traslado</h2>
                    <div class="form-group">
                        <label for="doc_name">Nombre:</label>
                        <input name="name" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad de salud:</label>
                        <select required name="opcion" class="form-control">
                                        <option hidden value="Escoja">Selecciona una opción</option>
								
								
								
									<?php
									require('../../php/conectar/conexion.php');
									$res2 =  pg_query($con,"SELECT * FROM establecimiento ORDER BY estab_id ASC");
									while($row2 = pg_fetch_array($res2))
									{
										?>
										<option value="<?php echo $row2['estab_id']?>"> <?php echo $row2['nombre'];?></option>";
										<?php 
									} ?>



								</select>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de inicio en que laboro</label>
                        <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha final</label>
                        <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="unidad">Unidad de salud a la que se traslada:</label>
                        <select required name="opcion" class="form-control">
                                        <option hidden value="Escoja">Selecciona una opción</option>
								
								
								
									<?php
									require('../../php/conectar/conexion.php');
									$res2 =  pg_query($con,"SELECT * FROM establecimiento ORDER BY estab_id ASC");
									while($row2 = pg_fetch_array($res2))
									{
										?>
										<option value="<?php echo $row2['estab_id']?>"> <?php echo $row2['nombre'];?></option>";
										<?php 
									} ?>



								</select>
                    </div>
                    <div class="form-group">
                        <label for="informacion">Información:</label>
                        <textarea name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></textarea>
                    </div>

                    <div class="form-group">
                        <input name="submit" type="submit" class="btn btn-primary " value="Trasladar">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Dark mode";
    }else{
        modeText.innerText = "Light mode";
        
    }
});
    </script>

</body>
</html>