<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="../../img/fav/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/fav/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/fav/favicon-16x16.png">
    <link rel="manifest" href="../../img/fav/site.webmanifest">
    
    <title>Hospital</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/materialize.min.css">
    <link rel="stylesheet" href="../../css/tooplate.css">
</head>

<body id="survey" class="font-weight-light">
    <div class="container tm-container-max-800">
        <div class="row">
            <div class="col-12">
                <header class="mt-5 mb-5 text-center">
                    <h1 class="font-weight-light tm-form-title">Hospital</h1>
                    <p class="tm-form-description">Ejemplos de cosas</p>
                </header>
                <form action="" method="post">
                    <div class="tm-bg-black tm-form-block">
                        <p class="mb-4">1. bla bla bal bla bla bla bla bla bla bla bla bla bla</p>
                        <ul class="ml-3">
                            <li>
                                <label>
                                    <input class="with-gap" name="group1" value="value1" type="radio" />
                                    <span>A. Nose</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input class="with-gap" name="group1" value="value2" type="radio" />
                                    <span>B. Menos</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input class="with-gap" name="group1" value="value3" type="radio" />
                                    <span>C. Peor</span>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input class="with-gap" name="group1" value="value4" type="radio" />
                                    <span>D. Saber</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="tm-bg-black tm-form-block">
                        <p class="mb-4">2. tres tristes tigres tragan trigo en un trigal</p>
                        <div class="row">
                            <div class="col-xl-6 mb-4">
                                <textarea class="p-3" name="description" cols="30" rows="4" placeholder="Desbribalo papa"></textarea>
                            </div>
                            <div class="col-xl-6">
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="choice1" class="filled-in" checked="checked" />
                                            <span>pa que</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="choice2" class="filled-in" checked="checked" />
                                            <span>Pues si we</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" name="choice3" class="filled-in" />
                                            <span>Nel bro</span>
                                        </label>
                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                    <div class="tm-bg-black tm-form-block">
                        <p class="mb-4">3. tra tra tra tra tra pa tum tra tra tra tra</p>
                        <div class="row mb-4">
                            <div class="col-xl-6">
                                <div class="input-field">
                                    <select name="occupation" id="occupation">
                                        <option value="">Cual es tu chamba</option>
                                        <option value="1">Profe de bases</option>
                                        <option value="2">Peluche</option>
                                        <option value="3">Lavar carros</option>
                                        <option value="4">Hacer logins</option>
                                        <option value="5">Comprar estrellas</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <select name="income" id="income">
                                        <option value="">Cuanto Ganas?</option>
                                        <option value="25">$25,000</option>
                                        <option value="45">$45,000</option>
                                        <option value="65">$65,000</option>
                                        <option value="85">$85,000</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <select name="age" id="age">
                                        <option value="">Ya estar ruco?</option>
                                        <option value="18">18-24</option>
                                        <option value="25">25-34</option>
                                        <option value="35">35-49</option>
                                        <option value="50">50-65</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-field">
                                    <input placeholder="Nombresito" name="name" id="name" type="text" class="validate">
                                </div>
                                <div class="input-field">
                                    <input placeholder="Correocito" name="email" id="email" type="text" class="validate">
                                </div>
                                <label class="mr-4">
                                    <input class="with-gap" name="gender" type="radio" value="m" />
                                    <span>Hombre</span>
                                </label>
                                <label>
                                    <input class="with-gap" name="gender" type="radio" value="f" />
                                    <span>Mujer</span>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <textarea class="p-3" name="message" id="message" cols="30" rows="3" placeholder="Insulteme (opcional)"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="waves-effect btn-large">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <footer class="row tm-mt-big mb-3">
            <div class="col-xl-12">
                <p class="text-center grey-text text-lighten-2 tm-footer-text-small">
                    Copyright &copy; 2023 Company Name
                    
                </p>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        });
    </script>
</body>

</html>