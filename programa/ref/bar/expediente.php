<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="../../css/barra.css">
    

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
                            <i class='bx bx-search icon'></i>
                            <span class="text ">Buscar</span>
                        </a>
                    </li>


                    <li class="search-box">
                        <a href="expediente.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text ">Expediente</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="mantenimiento.php">
                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Mantenimiento</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
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
        <div class="text">Expediente del Paciente</div>
        <div class="">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container2">
                    <h2 class="form-title">Pacientes</h2>
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="doc_name">Nombre:</label>
                                    <input name="doc_name" type="text" id="doc_name" class="form-control" placeholder="Ingresa el nombre" required>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="unidad">Unidad de salud:</label>
                                    <select name="opcion" id="unidad" class="form-control" required>
                                        <option disabled selected>Selecciona una opción</option>
                                        <option value="opcion1">Opción 1</option>
                                        <option value="opcion2">Opción 2</option>
                                        <option value="opcion3">Opción 3</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="informacion">Información:</label>
                                    <textarea name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="fecha">Fecha:</label>
                                    <input name="fecha" type="date" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                    <input name="submit" type="submit" class="btn btn-primary" value="Buscar">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>





        <div class="separacion">
            <?php
                require('../../php/conectar/conexion.php');
                $sql = "SELECT * FROM users ORDER BY name ASC";
                $res =  pg_query($con,$sql);
            ?>
            <div class="form-container2">
                <h2 class="form-title">Resultados</h2>
                <table>
                    <thead>
                        <tr class="bg-primary titulo">
                            <th>ID</th>
				            <th>Nombre</th>
				            <th>Unidad de salud</th>
				            <th>Información</th>
				            <th>Fecha</th>
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
                            <td>".$row['health_unit']."</td>
                            <td>".$row['information']."</td>
                            <td>".$fecha2. "</td>
                            <td>
                            <form action='../../php/actions/eliminar.php?id=".$row['id']."' method='POST' enctype='multipart/form-data'>
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
