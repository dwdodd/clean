<h1>Hola soy el Home - Dashboard :)</h1>

<h3><a href="{{host}}user-log/out">salir</a></h3>

<input type="hidden" id="token" value="{{token}}" />

<div id="list"></div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const getList = async () => {
            const list = document.getElementById('list');
            const frag = document.createDocumentFragment();
            const nombre = '';
            const token  = document.getElementById('token').value;
            const get = await fetch(`api/v1/services/user/user-list.php`,{
                method:'post',
                body: JSON.stringify({ nombre, token }),
                headers:{ 'Content-Type': 'application/json' }
            });
            if( get.ok ){
                let info = await get.json();
                info.items.forEach(element => {
                    let p = document.createElement('p');
                    p.innerText = `Usuario: ${element.usuario}\nCorreo: ${element.correo}`;
                    frag.appendChild(p);
                });list.appendChild(frag);
            }else{
                alert( get.status )
            }
        }
        getList();
    });
</script>