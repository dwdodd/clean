import host from "./base_url.js";

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('btn-login').addEventListener('click', async () => {
        let correo = document.getElementById('correo').value;
        let clave  = document.getElementById('clave').value;
        let token  = document.getElementById('token-csrf').value;

        if(!correo.trim() || !clave.trim()) return alert('Ingresar credenciales');

        correo = CryptoJS.AES.encrypt(JSON.stringify(correo),fdecoderto,{ format: CryptoJSAesJson }).toString();
        clave  = CryptoJS.AES.encrypt(JSON.stringify(clave),fdecoderto,{ format: CryptoJSAesJson }).toString();

        let get = await fetch(`${host}user-log/in`,{
            method:'post',
            body: JSON.stringify({ correo, clave, token }),
            headers:{ 'Content-Type': 'application/json' }
        });

        if( get.ok ){
            let info = await get.json();
            if(info.code == 3) alert(info.message);
            if(info.code == 1) window.location = `${host}home`;
        }
        else{alert( get.status );}
    });
});