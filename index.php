<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
<div class="container">
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Login</div>
      <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
    </div>
    <div class="right">
      <svg viewBox="0 0 320 300">
        <defs>
          <linearGradient
                          inkscape:collect="always"
                          id="linearGradient"
                          x1="13"
                          y1="193.49992"
                          x2="307"
                          y2="193.49992"
                          gradientUnits="userSpaceOnUse">
            <stop
                  style="stop-color:#ff00ff;"
                  offset="0"
                  id="stop876" />
            <stop
                  style="stop-color:#ff0000;"
                  offset="1"
                  id="stop878" />
          </linearGradient>
        </defs>
        <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
      </svg>
      <div class="form">
        <label for="email">Email</label>
        <input type="email" id="email">
        <label for="password">Password</label>
        <input type="password" id="password">
        <input type="submit" id="submit" value="Submit">
      </div>
    </div>
  </div>
</div>
<script> src="index.js"</script>

</body>
</html>
=======
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="estilsDelIndex.css">
    <link rel="icon" href="IconaP2.png" type="image/png">
</head>
<body>
    <div>
    <img src="" alt="" title="">
    <button onclick="Iniciar_ocult()" title="Registre o inicia sesio">Inicia sesio</button>
    </div>
    <div id="Iniciar-ocult" class="Iniciar-ocult">
        <div class="ocult-content">
            <div>
                <button onclick="Ocult_registre()">X</button>
            </div>
            <h3>Inici de sesio</h3>
            <label for=""></label>
            <input type="text">
            <label for=""></label>
            <input type="text">
            
            <div class="button-center">
                <button onclick="">Accedeix</button>
                <label for="">No tens un comte?<button onclick="Registrar_ocult()">Registrat!</button></label>
            </div>
        </div>
    </div>
    <div id="Registrar-ocult" class="Registrar-ocult">
        <div class="ocult-content">
            <div>
                <button onclick="Ocult_registre()">X</button>
            </div>
            <h3>Registat</h3>
            <label for="">Usuari</label>
            <input type="text">
            <label for="">Contrasenya</label>
            <input type="text">
            <label for="">Repeteix la contrasenya</label>
            <input type="text">
            
            <div class="button-center">
                <button onclick="">Registrat</button>
                <label for="">Tens un comte?<button onclick="Iniciar_ocult()">Inicia sesio</button></label>
            </div>
        </div>
    </div>
    <div>
    <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
        <button title="">
            <a href=""></a>
        </button>
    </div>
    <div class="Titul_principal">
    <h1 title="Titul principal">Agenda Sostenible Figuerenca</h1>
    </div>
    <script>
    function Iniciar_ocult() {
        document.getElementById('Iniciar-ocult').style.display = 'flex';
        document.getElementById('Registrar-ocult').style.display = 'none';
    }
    function Registrar_ocult() {
        document.getElementById('Registrar-ocult').style.display = 'flex';
        document.getElementById('Iniciar-ocult').style.display = 'none';
    }
    function Ocult_registre() {
        document.getElementById('Registrar-ocult').style.display = 'none';
        document.getElementById('Iniciar-ocult').style.display = 'none';
    }
    </script>
</body>
</html>
>>>>>>> 9a21dbb2e4751fac3bd11d1e7764ae3435ebc629
