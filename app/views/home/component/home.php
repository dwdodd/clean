<h1>Hola soy el Home - Dashboard :)</h1>

<div id="list"></div>

<script>
    const list = document.getElementById('list');
    const frag = document.createDocumentFragment();
    const getList = async () => {
        let get = await fetch(`{{host}}app/api/services/user/user-list.php`);
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