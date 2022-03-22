// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de equipos
function listIncidentes() {
    filtro = $('#filtrox').val();
    $.ajax({

            method: "get",
            url: "incidente.list.php?filtro=" + filtro
        })
        .done(function(data) {
            $(".listIncidentes").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar Equipo
function showFormIncidente(id) {
    $.ajax({
            method: "get",
            url: "incidente.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmIncidente").html(data);
        });
    $(".bg, .modalFrmIncidente").show();
}

$("#filtrox").change(function(event) {
    listIncidentes();
});

// Llama a la funcion de mostrar el formulario Editar Equipo Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormIncidente(0);
});

// Cerrar formulario Editar Equipo
$(".modalFrmIncidente").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmIncidente").hide();
});

// Grabar datos del formulario Equipo
$(document).on("submit", "#frmIncidente", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "incidente.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmIncidente").hide();
                listIncidentes();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar Equipo
// para editar sus datos en base a su id
$(".listIncidentes").on("click", ".edit", function(event) {
    event.preventDefault();
    var incidente_id = $(this).attr('data-id');
    showFormIncidente(incidente_id);
});

// Eliminar Equipo con  base a su id3

$(".listIncidentes").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_incidente = confirm("¿Está seguro de eliminar?");
    if (delete_incidente) {
        var incidente_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "incidente.delete.php?id=" + incidente_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listIncidentes();
                }
                alert(data.mensaje);
            });
    }
});