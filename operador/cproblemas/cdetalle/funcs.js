// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de empleados
function listDetalles() {
    event.preventDefault();
    $.ajax({
            method: "get",
            url: "detalle.list.php"
        })
        .done(function(data) {
            $(".listDetalles").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar empleado
function showFormDetalle(id) {
    $.ajax({
            method: "get",
            url: "detalle.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmDetalle").html(data);
        });
    $(".bg, .modalFrmDetalle").show();
}

function showFormDetalleC(id) {
    $.ajax({
            method: "get",
            url: "detallec.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmDetalleC").html(data);
        });
    $(".bg, .modalFrmDetalleC").show();
}

// Llama a la funcion de mostrar el formulario Editar empleado Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormDetalle(0);
});

$(".showFormy").click(function(event) {
    event.preventDefault();
    showFormDetalleC(0);
});

// Cerrar formulario Editar empleado
$(".modalFrmDetalle").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmDetalle").hide();
});

$(".modalFrmDetalleC").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmDetalleC").hide();
});


$(document).on("submit", "#frmDetalleC", function(event) {
    event.preventDefault();
    var file_data = $('#adjunto').prop('files')[0];
    var form_data = new FormData();
    form_data.append('fk_id_problema', document.getElementById("fk_id_incidente").value);
    form_data.append('fecha', document.getElementById("fecha").value);
    form_data.append('hora', document.getElementById("hora").value);
    form_data.append('accion', document.getElementById("accion").value);
    form_data.append('tipo_falla', document.getElementById("tipo_falla").value);
    form_data.append('causa_falla', document.getElementById("causa_falla").value);
    form_data.append('no_clientes', document.getElementById("no_clientes").value);
    form_data.append('adjunto', file_data);
    $.ajax({
        url: 'detallec.save.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function() {
            alert('Ticket Cerrado');
            location.href = "../principal_problemas.php";
        }
    });
});
// Grabar datos del formulario Empleado
$(document).on("submit", "#frmDetalle", function(event) {
    event.preventDefault();
    $.ajax({
            method: "post",
            url: "detalle.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmDetalle").hide();
                listDetalles();
            }
        });
});

// Llama a la funcion de mostrar el formulario Editar empleado
// para editar sus datos en base a su id
$(".listDetalles").on("click", ".edit", function(event) {
    event.preventDefault();
    var detalle_id = $(this).attr('data-id');
    showFormDetalle(detalle_id);
});

// Eliminar empleado en base a su id
$(".listDetalles").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_detalle = confirm("¿Está seguro de eliminar?");
    if (delete_detalle) {
        var detalle_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "detalle.delete.php?id=" + detalle_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listDetalles();
                }
                alert(data.mensaje);
            });
    }
});