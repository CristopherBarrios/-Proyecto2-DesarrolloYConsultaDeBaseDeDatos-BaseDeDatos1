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
        <div class="text">Modificar</div>
            <div class="form-container2">
                            <script type="text/javascript">
                                function tipo(val){
                                    console.log("sientra");
                                    if(val.value == "Diagnóstico"){
                                        document.getElementById("d1").style.display="block";
                                        document.getElementById("bd1").style.display="block";
                                        document.getElementById("d2").style.display="block";
                                        document.getElementById("bd2").style.display="block";
                                        document.getElementById("d4").style.display="block";
                                        document.getElementById("bd4").style.display="block";
                                        document.getElementById("d5").style.display="block";
                                        document.getElementById("bd5").style.display="block";
                                        document.getElementById("p1").style.display="none";
                                        document.getElementById("bp1").style.display="none";
                                        document.getElementById("p2").style.display="none";
                                        document.getElementById("bp2").style.display="none";
                                        document.getElementById("p3").style.display="none";
                                        document.getElementById("bp3").style.display="none";
                                        document.getElementById("p4").style.display="none";
                                        document.getElementById("bp4").style.display="none";
                                    }
                                    else{
                                        document.getElementById("d1").style.display="none";
                                        document.getElementById("bd1").style.display="none";
                                        document.getElementById("d2").style.display="none";
                                        document.getElementById("bd2").style.display="none";
                                        document.getElementById("d4").style.display="none";
                                        document.getElementById("bd4").style.display="none";
                                        document.getElementById("d5").style.display="none";
                                        document.getElementById("bd5").style.display="none";
                                        document.getElementById("p1").style.display="block";
                                        document.getElementById("bp1").style.display="block";
                                        document.getElementById("p2").style.display="block";
                                        document.getElementById("bp2").style.display="block";
                                        document.getElementById("p3").style.display="block";
                                        document.getElementById("bp3").style.display="block";
                                        document.getElementById("p4").style.display="block";
                                        document.getElementById("bp4").style.display="block";
                                    }
                                    document.getElementById("btn").style.display="block";
                                }
                            </script>
                <table class="table">
                    <tr id = "tr1">
                        <th colspan="5" class="bg-primary text-center" ><h2>MODIFICA EL EXPEDIENTE</h2></th></tr>
                    <tr class="bg-primary" id = "tr2">
                        <th>Nombre Paciente:</th>
		                <th>Apellido Paciente:</th>
		                <th></th>
                        <th></th>
                        <th></th>
	                </tr>
                    <tr class="bg-info" id = "tr3">
                        <td>
                            <input REQUIRED name="name" type="text" class="form-control" placeholder="Nombre" value="">
                        </td>
                        <td>
                            <input REQUIRED name="apellido" type="text" class="form-control" placeholder="Apellido" value="">
                        </td>
                    </tr >
                    <tr>
                        <th>Nombre Medico</th>
                        <th>Apellido Medico</th>
                    </tr>
                        <td>
                            <input REQUIRED name="mname" type="text" class="form-control" placeholder="Nombre" value="">
                        </td>
                        <td>
                            <input REQUIRED name="mapellido" type="text" class="form-control" placeholder="Apellido" value="">
                        </td>
                    <tr>
                    <tr><th>Tipo</th></tr>
                    <tr>
                           
                           <td>
                               <select required name="opcion" class="form-control" onchange="tipo(this);">
                                   <option disabled selected>Selecciona una opción</option>
   
                                   <option value="Diagnóstico">Diagnóstico</option>
                                   <option value="Procedimiento">Procedimiento</option>
   
                               </select>
                           </td>
                    </tr>
	                
                    <tr>
                        <th id ="d1" style="display: none;">Enfermedad</th>
                        <td><input  name="bd1" id = "bd1" type="input" class="form-control" placeholder="Enfermedad" style="display: none;"></td>
                        <th id ="d2" style="display: none;">Evolución</th>
                        <td><input  name="bd2" id = "bd2" type="input" class="form-control"  placeholder="Evolución" style="display: none;"></td>
                        
                    </tr>
                    <tr>
                        <th id ="d4" style="display: none;">Medicina</th>
                        <td><input  name="bd4" id = "bd4" type="input" class="form-control" placeholder="Medicina" style="display: none;"></td>
                        <th id ="d5" style="display: none;">Instrucciones del Medicamento</th>
                        <td><input  name="bd5" id = "bd5" type="input" class="form-control" placeholder="Instrucciones" style="display: none;"></td>
                    </tr>
                    <tr>
                        <th id ="p1" style="display: none;">Tipo</th>
                        <th>
                            <select required name="bp1" id="bp1" class="form-control" style="display:none;">
                                <option disabled selected>Selecciona una opción</option>
                                <option value="Examen">Examen</option>
                                <option value="Cirugia">Cirugia</option>

                            </select>
                        </th>
                        <th id ="p2" style="display: none;">Id del Procedimiento</th>
                        <td><input  name="bp2" id = "bp2" type="input" class="form-control" placeholder="ID" style="display: none;"></td>
                    </tr>
                    
                    <tr>
                        <th id ="p3" style="display: none;">Medico</th>
                        <td><input  name="bp3" id = "bp3" type="input" class="form-control" placeholder="Medico" style="display: none;"></td>
                        <th id ="p4" style="display: none;">Establecimiento</th>
                        <td><input  name="bp4" id = "bp4" type="input" class="form-control" placeholder="Establecimiento" style="display: none;"></td>
                    </tr>
                    <tr>
                        <td><input id="btn" name="submit" type="submit" class='btn btn-primary no-underline' style="display:none;" value="MODIFICAR" > </td>
                    </tr>
                </table>
                <br><br>
            </div>
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
            <table class="mi-tabla">
                <?php
                    require('../../php/conectar/conexion.php');
                                
                    if(isset($_POST["submit"])){
        
                        function coma($variable){
                            $variable .= ",";
                        }
                        
                        
                        echo"entra1";
                
                        $ptipo = $_POST['opcion']; $nom = $_POST['name']; $ape = $_POST['apellido']; $mnom = $_POST['mname']; $mape = $_POST['mapellido']; 
                        if($ptipo != "" AND $nom != "" AND $ape != "" AND $mnom != "" AND $mape != ""){
                            echo"entra2";
                            $getpac = "SELECT pac_id FROM paciente WHERE nombre = '$nom' AND apellido = '$ape'";
                            $qpac = pg_query($con, $getpac);
                            $getmed = "SELECT medico_id FROM paciente WHERE nombre = '$mnom' AND apellido = '$mape'";
                            $qmed = pg_query($con, $getmed);
                            $band = false;
                            $cont = 0;
                            $enf = $_POST['bd1']; $evo = $_POST['bd2']; $dmed = $_POST['bd3']; $medi = $_POST['bd4']; $infom = $_POST['bd5'];
                            $tipo = $_POST['bp1']; $id = $_POST['bp2']; $pmed = $_POST['bp3']; $estab = $_POST['bp4'];
                            if($ptipo = "Diagnóstico"){
                                echo"entra3";
                                $sql = "UPDATE diagnostico SET ";
                                if($enf != ""){
                                    $getnef = "SELECT enfermedad_id FROM enfermedad WHERE nombre='$enf'";
                                    $qenf = pg_query($getenf);
                                    $sql .= "enfermedad = '".$qenf['enfermedad_id']. "'";
                                    $band = true; $cont++;
                                }
                                if($evo != ""){
                                    if($cont > 0){
                                        coma($sql);
                                    }
                                    $sql .= "evolucion = '$evo' ";
                                    $band = true; $cont++;
                                }
                                if($medi != ""){
                                    if($cont > 0){
                                        coma($sql);
                                    }
                                    $getins = "SELECT insumo_id FROM insumos WHERE nombre='$enf'";
                                    $qins = pg_query($getins);
                                    $sql .= "medicina = '".$qins['insumo_id']."'";
                                    $band = true; $cont++;
                                }
                                if($infom != ""){
                                    if($cont > 0){
                                        coma($sql);
                                    }
                                    $sql .= "info_medicina = '$infom' ";
                                    $band = true; $cont++;
                                }
                                if($band){
                                    $sql .= " WHERE medico = '".$qmed['medico_id']." ' AND paciente ='".$qpac['pac_id']."'";
                                    echo $sql;
                                    $query = pg_query($con,$sql);
                                }
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