<?php exit; ?>

<div id="content"></div>
<script type="module" async>
    const h1 = '<h1>Hola soy el Home - Dashboard :)</h1>';
    const h3 = `<h3><a href="{{host}}user-log/out">salir</a></h3>`;
    const list = '<div id="list"></div>';
    const rtoken = '<input type="hidden" id="token" value="{{token}}" />';
    const content = h1+h3+list+rtoken;
    document.getElementById('content').innerHTML = content;

    const token = document.getElementById('token').value;
    const frag = document.createDocumentFragment();

    const get = await fetch(`{{host}}user/list`,{
        method:'post',
        body: JSON.stringify({ token }),
        headers:{ 'Content-Type': 'application/json' }
    });

    if( get.status == '200' ){
        let info = await get.json();
        info.items.forEach(element => {
            let p = document.createElement('p');
            p.innerText = `Usuario: ${element.usuario}\nCorreo: ${element.correo}`;
            frag.appendChild(p);
        });
        document.getElementById('list').appendChild(frag);
    }
    else{
        alert( get.status )
    }
</script>