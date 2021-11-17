<?php exit('Error:' . rand()); ?>
<h1>Hola soy el Home - Dashboard :)</h1>

<h3>
    <a href="{{host}}user-log/out">salir</a>
</h3>

<div id="list"></div>

<input type="hidden" id="token" value="{{token}}" />

<script type="module">
let token=document.getElementById('token').value; const UserList=async ()=>{ let frag=document.createDocumentFragment(); const get=await fetch(`{{host}}user/list`,{ method:'post', body: JSON.stringify({ token}), headers:{ 'Content-Type': 'application/json'}}); if( get.status=='200' ){ let info=await get.json(); info.items.forEach(element=>{ let p=document.createElement('p'); p.innerText=`Usuario: ${element.usuario}\nCorreo: ${element.correo}`; frag.appendChild(p);}); document.getElementById('list').appendChild(frag);}else{ alert( get.status )}};UserList();
</script>