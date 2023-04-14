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
        <div class="text">Modificar</div>
<?php
require('../../php/conectar/conexion.php');
$id = $_REQUEST['id'];

$sql = "SELECT * FROM users WHERE id='$id'";

$res =  pg_query($con, $sql);
$row = pg_fetch_array($res);
?>

        <form action="../../php/actions/modificar.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th colspan="5" class="bg-primary text-center" >MODIFICA EL EXPEDIENTE</th></tr>
                <tr class="bg-primary">
                    <th>Nombre: <?php echo  $row['name'];?></th>
		            <th>Unidad de salud</th>
                    <th>Información</th>
		            <th>Fecha</th>
		            <th></th>
	            </tr>
	            <tr class="bg-info">
                    <td>
                        <input REQUIRED name="name" type="text" class="form-control" placeholder="Nombre" value="">
                    </td>
                    <td>
                            <select required name="opcion" class="btn">
                                <option disabled selected>Selecciona una opción</option>

                                <option value="opcion1">Opción 1</option>
                                <option value="opcion2">Opción 2</option>
                                <option value="opcion3">Opción 3</option>

                            </select>
                    </td>
                    <td>
                        <input REQUIRED name="informacion" type="text" class="form-control" placeholder="Nombre" value="">
                    </td>
                    <td><input REQUIRED name="fecha" type="date" class="form-control" placeholder="Fecha" value="<?php echo $fecha = $row['date_added'];?>"></td>
                    <td><input  name="modificar" type="submit" class="btn btn-success" value="MODIFICAR" > </td>
                </tr>
            </table>
            <br><br>
        </form>

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