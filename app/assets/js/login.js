import host from "./base_url.js";

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('btn-login').addEventListener('click', async () => {
        let correo = document.getElementById('correo').value;
        let clave  = document.getElementById('clave').value;
        let token  = document.getElementById('token-csrf').value;

        if(!correo.trim() || !clave.trim()) return alert('Ingresar credenciales');

        let get = await fetch(`${host}api/v1/services/user/user-login.php`,{
            method:'post',
            body: JSON.stringify({ correo, clave, token }),
            headers:{ 'Content-Type': 'application/json' }
        });

        if( get.ok ){
            let info = await get.json();
            if(info.code == 3) return alert(info.message);
            if(info.code == 1) window.location = `${host}home`;
        }
        else{alert( get.status );}
    });
});