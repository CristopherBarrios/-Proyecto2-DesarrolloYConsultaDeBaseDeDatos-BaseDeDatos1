<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

                    <li class="nav-link">
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

                    <li class="search-box">
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
        <div class="text">Reporteria</div>

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
            <div class="form-container2">
                <h2 class="form-title">1. El top 10 de las enfermedades más mortales</h2>
                <table class="mi-tabla">
                    <thead>
                        <tr class="bg-primary titulo">
                            <th>Columna1</th>
				            <th>Columna2</th>
				            <th>Columna3</th>
				            <th>Columna4</th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="separacion">
                <div class="form-container2">
                    <h2 class="form-title">2. Top 10 de los médicos que más pacientes han atendido</h2>
                    <table class="mi-tabla">
                        <thead>
                            <tr class="bg-primary titulo">
                                <th>Columna1</th>
				                <th>Columna2</th>
				                <th>Columna3</th>
				                <th>Columna4</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="separacion">
                <div class="form-container2">
                    <h2 class="form-title">3. El top 5 de los pacientes con más asistencias a alguna unidad de salud y que debe de incluir su información general (peso, altura, índice de masa corporal, etc.)</h2>
                    <table class="mi-tabla">
                        <thead>
                            <tr class="bg-primary titulo">
                                <th>Columna1</th>
				                <th>Columna2</th>
				                <th>Columna3</th>
				                <th>Columna4</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="separacion">
                <div class="form-container2">
                    <h2 class="form-title">4. Reporte medicinas o suministros que están a punto de terminarse para una unidad de salud dada</h2>
                    <table class="mi-tabla">
                        <thead>
                            <tr class="bg-primary titulo">
                                <th>Columna1</th>
				                <th>Columna2</th>
				                <th>Columna3</th>
				                <th>Columna4</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="separacion">
                <div class="form-container2">
                    <h2 class="form-title">5. Reporte de las 3 unidades de salud (hospitales, centros de salud y clínicas) que más pacientes atienden </h2>
                    <table class="mi-tabla">
                        <thead>
                            <tr class="bg-primary titulo">
                                <th>Columna1</th>
				                <th>Columna2</th>
				                <th>Columna3</th>
				                <th>Columna4</th>
                            </tr>
                        </thead>

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
