function init() {
  cargar_asesor();
}

function cargar_asesor() {
    $.post("../ajax/asesor.php?op=selectAsesor_todos",function(r){
        $("#asesor").html(r);
        $("#asesor").selectpicker('refresh');
    })
}

function total_cliente_x_asesor(idasesor){
    
    $.post("../ajax/asesor.php?op=total_cliente_x_asesor",{idasesor:idasesor},function(r){
        console.log("total_cliente_x_asesor(idasesor)",idasesor);
        console.log("El servidor trae",r)
        $("#total_clientes").val($.trim(r));
    })
}

$(document).on('change', '#asesor', function(event) {
    // $('#servicioSelecionado').val($("#asesor option:selected").text());
    let idasesor_selec = $("#asesor option:selected").val();
    // console.log(idasesor_selec);
    total_cliente_x_asesor(idasesor_selec);
});








init();