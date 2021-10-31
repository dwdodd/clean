<h1>Hola soy el Home - Dashboard :)</h1>
<p id="list"></p>

<script>
    let list = document.getElementById('list');
    const getList = async () => {
        let get  = await fetch(`/clean/app//api/test/list-name.php?nombre=mi&format=1`);
        let info = await get.json();
        let data = '';
        
        info.items.forEach(element => {
            data += `
                Usuario: ${element.usuario}<br>
                Correo: ${element.correo}<br><br>
            `;
        });

        list.innerHTML = data;
    }
    getList();
</script>