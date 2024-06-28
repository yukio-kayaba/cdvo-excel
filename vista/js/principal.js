var dato_table = "";
$(document).ready(function(){
    // $(document).on("click","#subir_ar",function(e){
    //     // console.log(e)
    //     console.log("archivo en linea");
    //     const archivo = document.getElementById("archivo");
    //     let archivo_date = archivo.files[0];
    //     let formData = new FormData();
    //     formData.append("archivo_excel",archivo_date);
    //     $.ajax({
    //         url:"./modelo/task-kill/subir_archivos.php",
    //         type:"POST",
    //         data:formData,
    //         processData: false,
    //         contentType: false,
    //         success:function(respuesta){
    //             let datos = "";
    //             if(respuesta == "no existe"){
    //                 console.log("archivo vacio");
    //                 alert("ingrese un valor y no lo deje vacio");
    //                 return;
    //             }
    //             datos = JSON.parse(respuesta);
    //             dato_table = JSON.stringify(datos); 
    //             let tabla = document.createElement("table");
    //             let contenido  = `
    //                 <caption>
    //                     Vista previa de datos
    //                 </caption>
    //                 <thead>
    //                     <tr>
    //             `;
    //             let cantidad_dato = datos[0].length;
    //             for (let i = 0; i < datos[0].length ; i++) {
    //                 contenido +=`<th scope="col">${datos[0][i]}</th>`;
    //             }
    //             contenido += `
    //                     </tr>
    //                 </thead>
    //                 <tbody>
    //             `;
    //             for (let i = 1; i < datos.length; i++){
    //                 let contenido_dato = "<tr>";
    //                 if(datos[i].length > cantidad_dato){
    //                     for (let u = 1; u < datos[i].length; u++){
    //                         contenido_dato += `<td>${datos[i][u]}</td>`;                            
    //                     }
    //                 }else{
    //                     datos[i].forEach(element => {
    //                         contenido_dato += `<td>${element}</td>`;                            
    //                     });
    //                 }
    //                 contenido_dato += "</tr>";
    //                 contenido += contenido_dato;
    //             }
    //             contenido += "</tbody>"; 
    //             tabla.innerHTML = contenido;
    //             console.log(dato_table);
    //             let boton = document.createElement("button");
    //             document.getElementById("tabla").appendChild(tabla);
    //         }
    //     })
    // });


    $(document).on("click","#servidor",function(){
        console.log("enviando");

        let dato_prueba = {
            "datos":dato_table,
            "titulo":"archivo_excel",
            "opcion":1
        };
        console.log(dato_prueba);
        // return;
        $.ajax({
            url: './modelo/task-kill/convertir_sql.php',
            type: 'POST', 
            data: dato_prueba, 
            success: function(response){
                console.log('Respuesta del servidor:', response);
            }
        });
    }); 
    const dato = document.getElementById("archivo");
    dato.addEventListener("change",function(){
        console.log("archivo en linea");
        const archivo = document.getElementById("archivo");
        let archivo_date = archivo.files[0];
        let formData = new FormData();
        formData.append("archivo_excel",archivo_date);
        $.ajax({
            url:"./modelo/task-kill/subir_archivos.php",
            type:"POST",
            data:formData,
            processData: false,
            contentType: false,
            success:function(respuesta){
                let datos = "";
                let dato_nuevo = [];
                if(respuesta == "no existe"){
                    console.log("archivo vacio");
                    alert("ingrese un valor y no lo deje vacio");
                    return;
                }
                datos = JSON.parse(respuesta);
                // dato_table = JSON.stringify(datos); 
                let tabla = document.createElement("table");
                let contenido  = `
                    <caption>
                        Vista previa de datos
                    </caption>
                    <thead>
                        <tr>
                `;
                let cantidad_dato = datos[0].length;
                for (let i = 0; i < datos[0].length ; i++) {
                    contenido +=`<th scope="col">${datos[0][i]}</th>`;

                }
                dato_nuevo.push(datos[0]);
                contenido += `
                        </tr>
                    </thead>
                    <tbody>
                `;
                for (let i = 1; i < datos.length; i++){
                    let contenido_dato = "<tr>";
                    let inserta_array = [];
                    if(datos[i].length > cantidad_dato){
                        for (let u = 1; u < datos[i].length; u++){
                            contenido_dato += `<td>${datos[i][u]}</td>`;
                            inserta_array.push(datos[i][u]);           
                        }
                    }else{
                        datos[i].forEach(element => {
                            contenido_dato += `<td>${element}</td>`;  
                            inserta_array.push(element);           
                        });
                    }
                    dato_nuevo.push(inserta_array);
                    contenido_dato += "</tr>";
                    contenido += contenido_dato;
                }
                contenido += "</tbody>"; 
                tabla.innerHTML = contenido;
                // console.log(dato_table);
                
                // console.log(dato_nuevo);
                dato_table = JSON.stringify(dato_nuevo);
                document.getElementById("tabla").appendChild(tabla);
            }
        })
    });
    
    // document.addEventListener("DOMContentLoaded",function(){
    // });
});