var tabla


function init() {
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#idproducto").val("");
    $("#nombre").val("");
    $("#tipo").val("");
    $("#cantidad").val("");
    $("#precio_unitario").val("");
}

function mostrarform(flag){
    limpiar();
    if(flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();

    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

function cancelarform(){
    limpiar();
    mostrarform(false);
}

function listar(){
    tabla=$("#tbllistado").dataTable({
        "aProcessing":true,//Activamos el procedimiento del datable
        "aServerSide":true,//Paginacion y filtrado realizados por el servidor
        dom:'Bfrtip',//Definimos los elementos del control de tabla
        buttons:[
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax":{
            url:'../ajax/producto.php?op=listar',
            type:"get",
            dataType:"json",
            error:function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy":true,
        "iDisplayLength":5,//Paginacion 
        "order":[[0,"desc"]]//Ordenar (columna,orden)
    }).DataTable();
}
 
function guardaryeditar(e){
    e.preventDefault();//No se activara la accion predeterminada del evento¡
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url:"../ajax/producto.php?op=guardaryeditar",
        type:"POST",
        data:formData,
        contentType:false,
        processData:false,
        success:function(datos){
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();
}

function mostrar(idproducto){
    $.post("../ajax/producto.php?op=mostrar",{idproducto:idproducto},function(data,status){
        console.log(data);
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre);
        $("#tipo").val(data.tipo);
        $("#cantidad").val(data.cantidad);
        $("#precio_unitario").val(data.precio_unitario);
        $("#idproducto").val(data.idproducto);
    })
}

function eliminar(idproducto){
    Swal.fire({
        title: 'Estas seguro de eliminarlo ?',
        text: "Al eliminarlo no se podra recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../ajax/producto.php?op=eliminar",{idproducto:idproducto},function(data){
                // console.log($.trim(data) );
                tabla.ajax.reload();
                
                if($.trim(data) === 'true'){
                    Swal.fire(
                        'Eliminado!',
                        'Se elimino correctamente',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        'No se puede eliminar tiene un FK',
                        'error'
                    )
                }
            })
        }
    })
    
}


init();