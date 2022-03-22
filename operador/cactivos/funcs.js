// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de equipos
function listActivos() {

    $.ajax({

            method: "get",
            url: "detalle.list.php?filtro=" + filtro
        })
        .done(function(data) {
            $(".listDetalles").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar Equipo
function showFormIncidente(id) {
    $.ajax({
            method: "get",
            url: "detalle.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmDetalle").html(data);
        });
    $(".bg, .modalFrmDetalle").show();
}

$("#filtrox").change(function(event) {
    listDetalles();
});

// Llama a la funcion de mostrar el formulario Editar Equipo Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormDetalle(0);
});

// Cerrar formulario Editar Equipo
$(".modalFrmDetalle").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmDetalle").hide();
});

// Grabar datos del formulario Equipo
$(document).on("submit", "#frmDetalle", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "detalle.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmActivo").hide();
                listDetalles();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar Equipo
// para editar sus datos en base a su id
$(".listDetalles").on("click", ".edit", function(event) {
    event.preventDefault();
    var detalle_id = $(this).attr('data-id');
    showFormIncidente(detalle_id);
});

// Eliminar Equipo con  base a su id3

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