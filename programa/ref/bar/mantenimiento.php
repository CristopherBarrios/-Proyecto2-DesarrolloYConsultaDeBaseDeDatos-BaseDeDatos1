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
                        <label for="doc_name">Apellido:</label>
                        <input name="ape" type="text" id="doc_ape" class="form-control" placeholder="Ingresa el apellido" required>
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


        <style>
        .mi-tabla {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;

        }
        .mi-tabla td, .mi-tabla th {
            width: 25%;
            padding: 10px;
            word-wrap: break-word;
            /* border: 1px solid gray; */
            border-bottom: 1px solid gray;
        }
        </style>
        <div class="separacion">
            <?php
                require('../../php/conectar/conexion.php');
                $sql = "SELECT * FROM users ORDER BY date_added ASC";
                $res =  pg_query($con,$sql);
            ?>
            <div class="form-container2">
                <h2 class="form-title">Usuarios</h2>
                <table class="mi-tabla">
                    <thead>
                        <tr class="bg-primary titulo">
                            <th>ID</th>
				            <th>Nombre</th>
                            <th>Apellido</th>
				            <th>Unidad de salud</th>
				            <th>Información</th>
				            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    while($row = pg_fetch_array($res)){
                        $fecha1=$row['date_added'];
                        $fecha2=date("d-m-Y",strtotime($fecha1));
                        echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['apellido']."</td>
                            <td>".$row['health_unit']."</td>
                            <td>".$row['information']."</td>
                            <td>".$fecha2. "</td>
                            <td>
                            <form action='../../php/actions/eliminar.php?id=".$row['id']."' method='POST'>
                                <input name='eliminar' type='submit' class='btn btn-danger' value='ELIMINAR' onclick='return confirm(\"¿Seguro que deseas eliminar este registro?\")' >
                            </form>
                            <br>
                            <form action='../ventanaModificar/ventanaModificar.php?id=".$row['id']."'method='POST' enctype='multipart/form-data'>
                                <input name='submit' type='submit' class='btn btn-primary' value='MODIFICAR'  >
                            </form> 
                        </td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>



        <div class="separacion">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container">
                    <h2 class="form-title">Trasladar Usuario</h2>
                    <div class="form-group">
                        <label for="doc_name">Nombre:</label>
                        <input name="doc_name" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="doc_ape">Apellido:</label>
                        <input name="doc_ape" type="text" id="doc_ape" class="form-control" placeholder="Ingresa el apellido" required>
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
                        <input name="modificar" type="submit" class="btn btn-primary" value="Modificar">
                        <?php require('../../php/conectar/conexion.php');

                            if(isset($_POST['modificar'])){
                                $nom = $_POST['doc_name'];
                                $ape = $_POST['doc_ape'];
                                $hu = $_POST['opcion'];

                                if($nom != "" AND $ape != ""  AND $hu != ""){
                                    $sql = "SELECT information, date_added from users WHERE name='$nom' AND apellido ='$ape'";
                                    $res = pg_query($con,$sql);
                                    $info = pg_fetch_array($res);
                                    

                                    $sql = "INSERT INTO users(name, health_unit, information, date_added, apellido)
                                    VALUES ('$nom', '$hu','".$info['information']."','".$info['date_added']."'
                                    ,'$ape')";
                                    $res = pg_query($con, $sql);

                                    $sql = "SELECT medico_id FROM medico WHERE nombre='$nom' AND apellido = '$ape'";
                                    $id = pg_query($con,$sql);
                                    $rowid = pg_fetch_array($id);

                                    $sql = "UPDATE trabajo SET establecimiento = '$hu' WHERE medico ='".$rowid['medico_id']."'";
                                    $res = pg_query($con,$sql);
                                }
                                
                            }

                        ?>
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
                        <input name="hname" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="doc_name">Apellido:</label>
                        <input name="hape" type="text" id="doc_ape" class="form-control" placeholder="Ingresa el apellido" required>
                    </div>
                    <div class="form-group">
                        <input name="history" type="submit" class="btn btn-primary " value="Revisar">
                    </div>
                    <table class="mi-tabla">
                            <?php
                                if(isset($_POST['history'])){
                                    $nom = $_POST['hname']; $ape = $_POST['hape'];
                                    if($nom != "" AND $ape != ""){
                                        $sql = "SELECT name, apellido, health_unit, e.nombre as estab
                                        FROM users 
                                        INNER JOIN establecimiento e ON e.estab_id = users.health_unit::INTEGER
                                        WHERE name='$nom' AND apellido='$ape'";
                                        $res = pg_query($con,$sql);
                                        if(pg_num_rows($res) > 0){
                                            echo "
                                                <thead>
                                                <tr >
                                                    <th>Nombre  Apellido</th>
                                                    <th>ID Establecimiento</th>
                                                    <th>Lugar de trabajo</th>
                                                </tr>
                                                </thead>";
                                            while($row = pg_fetch_array($res)){
                                                echo "
                                                    <tr>
                                                        <td>".$row['name']." ".$row['apellido']."</td>
                                                        <td>".$row['health_unit']."</td>
                                                        <td>".$row['estab']."</td>
                                                    </tr>";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </table>
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