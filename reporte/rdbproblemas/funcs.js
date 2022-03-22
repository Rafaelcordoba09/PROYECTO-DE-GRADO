// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table

$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de tramos
// Mediante AJAX llama la lista de tramos
function listTramos() {
    filtro = $('#filtrox').val();
    //alert(filtro);
    $.ajax({
            method: "get",
            url: "tramo.list.php?filtro=" + filtro
        })
        .done(function(data) {
            $(".listTramos").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar tramo
function showFormTramo(id) {
    $.ajax({
            method: "get",
            url: "tramo.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmTramo").html(data);
        });
    $(".bg, .modalFrmTramo").show();
}

// Llama a la funcion de mostrar el formulario Editar tramo Nuevo
$("#filtrox").change(function(event) {
    listTramos();
});

$(".showForm").click(function(event) {
    event.preventDefault();
    showFormTramo(0);
});

// Cerrar formulario Editar tramo
$(".modalFrmTramo").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmTramo").hide();
});

// Grabar datos del formulario tramo
$(document).on("submit", "#frmTramo", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "tramo.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmTramo").hide();
                listTramos();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar tramo
// para editar sus datos en base a su id
$(".listTramos").on("click", ".edit", function(event) {
    event.preventDefault();
    var tramo_id = $(this).attr('data-id');
    showFormTramo(tramo_id);
});

// Eliminar tramo en base a su id
$(".listTramos").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_tramo = confirm("¿Está seguro de eliminar?");
    if (delete_tramo) {
        var tramo_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "tramo.delete.php?id=" + tramo_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listTramos();
                }
                alert(data.mensaje);
            });
    }
});