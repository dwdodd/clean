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
    <input type="text" id="token-csrf" value="{@CSRF}"/>

    <script>
        document.getElementById('btn-login').addEventListener('click', async () => {
            let correo = document.getElementById('correo').value;
            let clave  = document.getElementById('clave').value;

            if(!correo.trim() || !clave.trim()) return alert('Ingresar credenciales');

            let get = await fetch(`{{host}}api/v1/services/user/user-login.php`,{
                method:'post',
                body: JSON.stringify({ correo, clave }),
                headers:{ 'Content-Type': 'application/json' }
            });
            if( get.ok ){
                let info = await get.json();
                if(info.code == 3) return alert(info.message);
                if(info.code == 1) window.location = '{{host}}home'
            }
            else{alert( get.status );}
        });
    </script>
</body>
</html>