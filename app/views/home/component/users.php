<style>
    h1.body{
        background-color:blueviolet;
        color: white;
    }
</style>

<h1 class="body" id="body">Welcome users</h1>

<script type="module">
    import hello from "{{host}}/app/assets/js/components/welcome.js";

    let h1_body = document.getElementById('body');
    
    h1_body.innerHTML = hello;
</script>