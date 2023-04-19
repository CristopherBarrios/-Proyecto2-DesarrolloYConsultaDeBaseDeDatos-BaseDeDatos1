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
                        <a href="reporteria.php">
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
        <div class="text">Expediente del Paciente</div>
        <div class="">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container2">
                    <h2 class="form-title">Pacientes</h2>
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="doc_name">tipo:</label>
                                    <select name="opcion" id="unidad" class="form-control" required>
                                        <option disabled selected>Selecciona una opción</option>
                                        <option value="opcion1">Examen</option>
                                        <option value="opcion2">Cirugia</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="informacion">Medico:</label>
                                    <input name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></input>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="fecha">Paciente:</label>
                                    <input name="informacion" id="informacion" class="form-control" placeholder="Ingresa la información"></input>
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
                $sql = "SELECT * FROM Procedimientos";
                $res =  pg_query($con,$sql);
            ?>
            <div class="form-container2">
                <h2 class="form-title">Resultados</h2>
                <table class="mi-tabla">
                    <thead>
                        <tr class="bg-primary titulo">
                            <th>proced_id</th>
				            <th>tipo</th>
				            <th>id_tipo</th>
				            <th>medico</th>
				            <th>paciente</th>
                        </tr>
                    </thead>
                    <?php
                    while($row = pg_fetch_array($res)){
                        echo "
                        <tr>
                            <td>".$row['proced_id']."</td>
                            <td>".$row['tipo']."</td>
                            <td>".$row['id_tipo']."</td>
                            <td>".$row['medico']."</td>
                            <td>".$row['paciente']. "</td>

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
