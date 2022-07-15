var tabla


function init() {
    mostrarform(false);
    listar();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#idasesor").val("");
    $("#nombre").val("");
    $("#codigo").val("");
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
            url:'../ajax/asesor.php?op=listar',
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
        url:"../ajax/asesor.php?op=guardaryeditar",
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

function mostrar(idasesor){
    $.post("../ajax/asesor.php?op=mostrar",{idasesor:idasesor},function(data,status){
        console.log(data);
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombre").val(data.nombre);
        $("#codigo").val(data.codigo);
        $("#idasesor").val(data.idasesor);
    })
}

function eliminar(idasesor){
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
            $.post("../ajax/asesor.php?op=eliminar",{idasesor:idasesor},function(data){
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

function insertar_datos_mysql(){
    $.post("../ajax/asesor.php?op=insertar_datos_mysql",function(data,status){
        console.log($.trim(data));
    })
}



init();