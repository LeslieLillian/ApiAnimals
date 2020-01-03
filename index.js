$(document).ready(function(){
        $("#btn_todos").click(function(){
            $.ajax({
                type: "GET",
                datatype: "JSON",
                url: "php/consulta_animales.php"
            }).done(function(respuesta){
                var json_respuesta = JSON.parse(respuesta);
                for (var index = 0; index < json_respuesta["animal"].length; index++) {
                    console.log("ID: "+json_respuesta["animal"][index]["Id"] + ". Tipo: "+json_respuesta["animal"][index]["Tipo"] + ". Nombre: "+json_respuesta["animal"][index]["Nombre"]);
                }
        })
    })

        $("#btn_fechas").click(function(){
            var fecha_inicio = $("#fecha_inicio").val();
            var fecha_final = $(".fecha_final").val();
        $.ajax({
            type: "POST",
            datatype: "JSON",
            url: "php/consultar_fechas.php",
            data: {fecha_inicio:fecha_inicio,fecha_final:fecha_final}
        }).done(function(respuesta){
            console.log(respuesta);
            var json_respuesta = JSON.parse(respuesta);
            for (var index = 0; index < json_respuesta["animal"].length; index++) {
                console.log("ID: "+json_respuesta["animal"][index]["Id"] + ". Fecha: "+json_respuesta["animal"][index]["Fecha"]);
            }
            $.ajax({
                type: "POST",
                datatype: "JSON",
                url: "php/insertar_animales.php",
                data: {arreglo:respuesta}
            }).done(function(resp2){
                console.log(resp2);
                var json_respuesta2 = JSON.parse(resp2);
                if (json_respuesta2["animal"] == true) {
                    alert("Registros insertados correctamente.");
                } else {
                    alert("Ocurrio un error: " +json_respuesta2["mensaje"]);
                }
            })
        })
    })
})
