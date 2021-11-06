<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Bienvenido, estas en el index</h1>
    <div class="login">
        <input type="text" id="correo" />
        <input type="text" id="clave" />
        <button id="btn-login">Acceder</button>
    </div>
    <input type="hidden" id="token-csrf" value="{@CSRF}"/>
    <script src="{{host}}app/assets/js/login.js" type="module"></script>
</body>
</html>