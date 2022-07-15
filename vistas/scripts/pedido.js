var tabla


function init() {
    mostrarform(false);
    listar();
    cargar_producto();
    cargar_cliente();
    $("#formulario").on("submit",function(e){
        guardaryeditar(e);
    })
}

function limpiar(){
    $("#idpedido").val("");
    $("#cantidad").val("");
    // $("#idproducto").val("");
    // $("#idcliente").val("");
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
            url:'../ajax/pedido.php?op=listar',
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
        url:"../ajax/pedido.php?op=guardaryeditar",
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

function mostrar(idpedido){
    $.post("../ajax/pedido.php?op=mostrar",{idpedido:idpedido},function(data,status){
        console.log(data);
        data = JSON.parse(data);
        mostrarform(true);
        $("#cantidad").val(data.cantidad);
        $('#idproducto').selectpicker('val',[data.idproducto]);
        $("#idasesor").val(data.idasesor);
        $("#idpedido").val(data.idpedido);
        $("#idproducto_pe").val(data.idproducto_pe);
        $('#idcliente').selectpicker('val', [data.idcliente]);
        
        $("#detalle_pedido").val(data.detalle_pedido);
        $("#total").val(data.total);
       
    })
}

function eliminar(idpedido){
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
            $.post("../ajax/pedido.php?op=eliminar",{idpedido:idpedido},function(data){
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

function cargar_producto(){
    $.post("../ajax/producto.php?op=selectProducto_todos",function(r){
        // console.log(r);
        $("#idproducto").html(r);
        $("#idproducto").selectpicker('refresh');
    })
}

function cargar_cliente(){
    $.post("../ajax/cliente.php?op=selectCliente_todos",function(r){
        // console.log(r);
        $("#idcliente").html(r);
        $("#idcliente").selectpicker('refresh');
    })
}

//producto listar
$(document).on('change', '#idproducto', function(event) {
    let idproducto_selec = $("#idproducto option:selected").val();
    let precio_unitario  = $('option:selected', this).attr("data-precio_unitario");
    calcular_precio_total(precio_unitario);


    console.log("idproducto",idproducto_selec);
});

//cliente listar
$(document).on('change', '#idcliente', function(event) {
    let idcliente_selec = $("#idcliente option:selected").val();
    let idasesor_selec  = $('option:selected', this).attr("data-idasesor");
    $("#idasesor").val(idasesor_selec);


    console.log("idasesor",idasesor_selec);
    console.log("idcliente",idcliente_selec);
});

function  calcular_precio_total(precio_unitario){
    console.log("calcular_precio_total(precio_unitario)");
    const cantidad = $("#cantidad").val();
    const precio_total = cantidad*precio_unitario;
    $("#total").val(precio_total);
}



function pagar(idpedido){
    bootbox.confirm("¿Estas seguro de pagar el Pedido?",function(result){
        if(result){
            $.post("../ajax/pedido.php?op=activar",{idpedido : idpedido},function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function no_pagar(idpedido){
    bootbox.confirm("¿Estas seguro de NO pagar el Pedido?",function(result){
        if(result){
            $.post("../ajax/pedido.php?op=desactivar",{idpedido : idpedido},function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();