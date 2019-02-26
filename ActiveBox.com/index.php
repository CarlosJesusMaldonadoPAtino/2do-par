<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
   <body class="text-center">
    <form class="form-signin">
  <img class="mb-4" src="img/logotipo.png">
  <h1 id="text1" class="h3 mb-3 font-weight-normal">Inicio Sesion</h1>
  <label for="inputEmail" class="sr-only">Correo Electronico</label>
  <input type="email" id="inputEmail" class="form-control" placeholder="Dirección de correo" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recuerdame
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" id= "buttonSign" type="button">Iniciar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  
<script>
//Estructura Basica de JQuery $().();
// $ es un alias llamado jquery, normalente llamado mediante pesitos, se ha de usar la palabra reservada cuando exista otro framework, por lo que se debera usar el comando jquery Dento de parentesis siempre deberan ir selectores, llevando 3 comillas solo el selector del navegador no llevara comillas
//Despues van los multiples eventos, dependen del selector y del hacer algo
//parametros o funciones, tambien denominados callbacks, se le pude poner un parametro o callback
//function(){} FUNCION ANONIMA
//function hazalgo(){ Dentro de llaves se hara el show }) 
//ERROR Corregir el tipo ede Dato de Submit -> Button
//  $("#buttonSing").click(function hazalgo(e){
//    e.preventDefault();
//CONSOLA = DEBUG

  //$(document).ready(function{});
  //  $("#buttonSing").click(function hazalgo(){
  //   alert("Hola");
  // });

    $("#buttonSign").click(function(){
    let correo = $("#inputEmail").val();
    // Obtener Valor del email
    let pass = $("#inputPassword").val();
    // Obtener el valor de Password
    let obj = {
      "action" : "login",
      "correo" : correo,
      "password" : pass  
    };
    if (correo == "" || pass == "") {
      //  Si usuario y contraseña estan vacios imprimir = 3 
       alert("Ingresa Correo y Contraseña [ERROR-03]");
    } 
    else{
    $.post('includes/_funciones.php', obj, function() {});
    }
    
});
</script>
</body>
</html>