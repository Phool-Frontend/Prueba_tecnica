var tabla


function init() {
    mostrarform(false);
    listar();
    cargar_asesor();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#idcliente").val("");
    $("#nombres").val("");
    $("#apellidos").val("");
    $("#correo").val("");
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
            url:'../ajax/cliente.php?op=listar',
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
        url:"../ajax/cliente.php?op=guardaryeditar",
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

function mostrar(idcliente){
    $.post("../ajax/cliente.php?op=mostrar",{idcliente:idcliente},function(data,status){
        console.log(data);
        data = JSON.parse(data);
        mostrarform(true);
        $("#nombres").val(data.nombres);
        $("#apellidos").val(data.apellidos);
        $("#correo").val(data.correo);
        $('#idasesor').selectpicker('val', [data.idasesor]);
        $("#idcliente").val(data.idcliente);
    })
}

function eliminar(idcliente){
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
            $.post("../ajax/cliente.php?op=eliminar",{idcliente:idcliente},function(data){
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

function cargar_asesor() {
    $.post("../ajax/asesor.php?op=selectAsesor_todos",function(r){
        $("#idasesor").html(r);
        $("#idasesor").selectpicker('refresh');
    })
}



init();