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
        <div class="text">Expediente del Paciente</div>
        <div class="">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-container2">
                    <h2 class="form-title">Pacientes</h2>
                    <table>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="fecha">Nombre:</label>
                                    <input name="nombre" id="info1" class="form-control" placeholder="Ingrese el nombre"></input>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label hidden = "hidden"> Apellido:</label>
                                    <input name="apellido" id="info2" class="form-control" placeholder="Ingrese el apellido"></input>
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
            <div class="form-container2">
                <h1 class="form-title">Resultados</h1>
                <table class="mi-tabla">
                    <?php
                    require('../../php/conectar/conexion.php');
                    
                    if(isset($_POST["submit"])){
                        $pnom = $_POST["nombre"];
                        $pap = $_POST["apellido"];
                        if($pnom != "" AND $pap != " "){
                            $getid = "SELECT pac_id FROM paciente
                            WHERE nombre = '".$pnom."' AND apellido = '".$pap."'";
                            $id = pg_query($con,$getid);
                            $rowid = pg_fetch_array($id);

                            $sql = "SELECT e.estado AS ahora FROM estado e INNER JOIN paciente ON e.paciente = '".$rowid['pac_id']."'";
                            $estquery = pg_query($con,$sql);
                            $estado = pg_fetch_array($estquery);
                            echo "
                                <thead>
                                    <tr class='bg-primary titulo'>
                                        <th><h2>Estado:</h2></th>
                                    </tr>
                                </thead>
                                
                                <tr>
                                    <td> <h3>".$estado['ahora']."</h3></td>
                                </tr>
                                ";

                            $sql = "SELECT e.nombre, c.fecha FROM establecimiento e 
                                INNER JOIN cita c ON e.estab_id = c.establecimiento
                                WHERE c.paciente = ".$rowid['pac_id']." ORDER BY c.fecha DESC";
                            $estab = pg_query($con,$sql);
                            echo"
                                <tr></tr>
                                <thead>
                                    <tr class='bg-primary titulo'>
                                        <th><h2>Citas Registradas:</h2></th>
                                    </tr>
                                </thead>";
                            if(pg_num_rows($estab) > 0){
                                echo "
                                    <thead>
                                        <tr >
                                            <th>Establecimiento</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>";
                                while($row = pg_fetch_array($estab)){
                                    echo"
                                        <tr>
                                            <td>".$row['nombre']."</td>
                                            <td>".$row['fecha']."</td>
                                        </tr>
                                    ";
                                }
                            }else{
                                echo"<tr><td> --NO SE ENCUENTRA INFORMACIÓN ALMACENADA PARA ESTE CAMPO-- </td></tr>";
                            }

                            $sql = "SELECT DISTINCT m.nombre AS mnombre, m.especialidad AS especialidad, e.nombre as establecimiento
                            FROM medico m 
                            INNER JOIN diagnostico d ON d.medico = m.medico_id
                            INNER JOIN trabajo t ON t.medico = m.medico_id
                            INNER JOIN establecimiento e ON t.establecimiento = e.estab_id
                            WHERE d.paciente = '".$rowid['pac_id']."' AND t.medico = d.medico";
                            $meds = pg_query($con,$sql);
                            
                            echo"<thead>
                                    <tr class='bg-primary titulo'>
                                        <th><h2>Medicos que lo han tratado:</h2></th>
                                    </tr>
                                </thead>";

                            if(pg_num_rows($meds) > 0){
                                echo "
                                    <thead>
                                    <tr >
                                        <th>Nombre</th>
                                        <th>Especialidad</th>
                                        <th>Lugar de atención</th>
                                    </tr>
                                </thead>";
                                while($row = pg_fetch_array($meds)){
                                    echo "
                                        <tr>
                                            <td>".$row['mnombre']."</td>
                                            <td>".$row['especialidad']."</td>
                                            <td>".$row['establecimiento']."</td>
                                        </tr>";
                                }
                                
                            }else{
                                echo"<tr><td> --NO SE ENCUENTRA INFORMACIÓN ALMACENADA PARA ESTE CAMPO-- </td></tr>";
                            }

                            $sql = "SELECT d.paciente, d.medico, enf.nombre AS enfermedad, d.evolucion AS info,
                             ins.nombre AS medicina, d.info_medicina, r.resultado FROM diagnostico d
                            INNER JOIN enfermedad enf ON enf.enfermedad_id = d.enfermedad
                            INNER JOIN insumos ins ON ins.insumo_id = d.medicina
                            INNER JOIN resultado r ON d.diagnostico_id = r.diagnostico
                            where d.paciente =".$rowid['pac_id']." ORDER BY d.diagnostico_id";
                            $diags = pg_query($con,$sql);

                            echo "
                                <thead>
                                    <tr class='bg-primary titulo'>
                                        <th><h2>Diagnosticos:</h2></th>
                                    </tr>
                                </thead>";
                            if(pg_num_rows($diags)>0){
                                echo "
                                    <thead>
                                    <tr >
                                        <th>Enfermedad</th>
                                        <th>Informacion/Evolucion</th>
                                        <th>Medicamento</th>
                                        <th>Instrucciones del Medicamento</th>
                                        <th>Resultado</th>
                                    </tr>
                                </thead>";
                                $enf = ""; $pac = ""; $medico=""; $medi = "";
                                while($row = pg_fetch_array($diags)){
                                    if($row['enfermedad'] == $enf AND $row['paciente'] == $pac AND $row['medico'] == $medico){
                                        if($medi != $row['medicina']){
                                            echo "
                                                <tr>
                                                    <td>----</td>
                                                    <td>----</td>
                                                    <td>".$row['medicina']."</td>
                                                    <td>----</td>
                                                    <td>----</td>
                                                </tr>";
                                        }
                                    }
                                    else{
                                        echo "
                                        <tr>
                                            <td>".$row['enfermedad']."</td>
                                            <td>".$row['info']."</td>
                                            <td>".$row['medicina']."</td>
                                            <td>".$row['info_medicina']."</td>
                                            <td>".$row['resultado']."</td>
                                        </tr>";
                                    }
                                    $medi = strval($row['medicina']);
                                    $enf = strval($row['enfermedad']);
                                    $pac = strval($row['paciente']);
                                    $medico = strval($row['medico']);
                                }
                            }else{
                                echo"<tr><td> --NO SE ENCUENTRA INFORMACIÓN ALMACENADA PARA ESTE CAMPO-- </td></tr>";
                            }

                            $sql = "SELECT p.nombre, p.apellido, m.nombre as mnombre,m.apellido as mapellido,est.nombre as enombre, pro.tipo, 
                            CASE
                                WHEN upper(pro.tipo) = 'EXAMEN'
                                    THEN e.nombre
                                WHEN upper(pro.tipo) = 'CIRUGIA'
                                    THEN c.nombre
                                END pnombre
                            from procedimientos pro
                            inner join examenes e on pro.id_tipo = e.examen_id
                            inner join cirugia c on c.cirugia_id = pro.id_tipo
                            inner join paciente p on pro.paciente = p.pac_id
                            inner join medico m on pro.medico = m.medico_id 
                            inner join establecimiento est on pro.establecimiento = est.estab_id
                            WHERE pro.paciente = ".$rowid['pac_id'];

                            $res =  pg_query($con,$sql);

                            echo"
                                <thead>
                                    <tr>
                                        <th><h2>Procedimientos:</h2></th>
                                    </tr>
                                </thead>";

                            if(pg_num_rows($res) > 0){
                                echo "
                                <thead>
                                    <tr class='bg-primary titulo'>
                                        <th>Paciente</th>
                                        <th>Medico</th>
                                        <th>Establecimiento</th>
                                        <th>Tipo</th>
                                        <th>Procedimiento</th>
                                    </tr>
                                </thead>";
                                while($row = pg_fetch_array($res)){
                                    echo "
                                        <tr>
                                            <td>".$row['nombre']." ".$row['apellido']."</td>
                                            <td>".$row['mnombre']." ".$row['mapellido']."</td>
                                            <td>".$row['enombre']. "</td>
                                            <td>".$row['tipo']. "</td>
                                            <td>".$row['pnombre']. "</td>
                                        </tr>";
                                }
                            }
                            else{
                                echo"<tr><td> --NO SE ENCUENTRA INFORMACIÓN ALMACENADA PARA ESTE CAMPO-- </td></tr>";
                            }

                        }
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
