function init() {
  cargar_cliente();
}

function cargar_cliente() {
    $.post("../ajax/cliente.php?op=selectCliente_todos",function(r){
        $("#idcliente").html(r);
        $("#idcliente").selectpicker('refresh');
    })
}

function total_pedido_x_cliente(idcliente){
    
    $.post("../ajax/pedido.php?op=total_pedido_x_cliente",{idcliente:idcliente},function(r){
        console.log("total_pedido_x_cliente(idcliente)",idcliente);
        console.log("El servidor trae",r)
        $("#total_pedidos").val($.trim(r));
    })
}

$(document).on('change', '#idcliente', function(event) {
    // $('#servicioSelecionado').val($("#idcliente option:selected").text());
    let idcliente_selec = $("#idcliente option:selected").val();
    // console.log(idcliente_selec);
    total_pedido_x_cliente(idcliente_selec);
});








init();