<h1>Hola soy el Home - Dashboard :)</h1>

<div id="list"></div>

<script>
    const list = document.getElementById('list');
    const frag = document.createDocumentFragment();
    const nombre = '';
    const token  = 'ejRaoYqUzFsre3BqfF2OAXxXTJjeFTosmA==';
    const getList = async () => {
        let get = await fetch(`{{host}}api/v1/services/user/user-list.php`,{
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
    };getList();
</script>