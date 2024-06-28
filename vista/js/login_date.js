$(document).ready(function(){
    var elemento_click = true;
    $(document).on("click","#create_count",function(){
        let texto = `
            <input type="text" name="" id="dni" placeholder="dni">
            <input type="password" name="" id="contra" placeholder="contraseña">

            <input type="submit" value="Iniciar Secion">
            <div class="border"></div>
            <p class="create-pages" id="create_count"><i>Crear cuenta</i></p>
        `;
        let texto1 = `
            <input type="text" name="" id="nombre" placeholder="nombre">
            <input type="text" name="" id="dni" placeholder="dni">
            <input type="password" name="" id="contra" placeholder="contraseña">

            <input type="submit" value="Validar Cuenta">
            <div class="border"></div>
            <p class="create-pages" id="create_count"><i>Iniciar secion</i></p>
        `;
        if(elemento_click){
            document.getElementById("login-form").innerHTML = texto1;
            elemento_click = false;
        }else{
            
            document.getElementById("login-form").innerHTML = texto;
            elemento_click = true;
        }

    });

    $('#login-form').submit(function (e){
        e.preventDefault();
        let  valor_pas = document.getElementById('contra').value;
        const postdata = {
            nombre:(!elemento_click)?$("#nombre").val():"",
            dni:$('#dni').val(),
            contrasenia:$("#contra").val()
        };
        let direccion = `./modelo/task-kill/${(elemento_click)?"logeo_datos.php":"registro_datos.php"}`;
        console.log(direccion);
        // return;
        $.post(direccion,postdata,function(response){
            console.log(response);
            const datos = response;
            if(datos > 0){
                alert("datos correctos");
                localStorage.setItem("valor_aux",datos);
                window.location.reload();
            }else{
                alert("datos incorrectos");
            }
        });
    });
});