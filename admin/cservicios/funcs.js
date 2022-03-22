// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de servicios
function listServicios() {
    //event.preventDefault();
    filtro = $('#filtrox').val();
    $.ajax({
            method: "get",
            url: "servicio.list.php?filtro=" + filtro
        })
        .done(function(data) {
            $(".listServicios").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar servicio
function showFormServicio(id) {
    $.ajax({
            method: "get",
            url: "servicio.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmServicio").html(data);
        });
    $(".bg, .modalFrmServicio").show();
}

$("#filtrox").change(function(event) {
    listServicios();
});

// Llama a la funcion de mostrar el formulario Editar servicio Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormServicio(0);
});

// Cerrar formulario Editar servicio
$(".modalFrmServicio").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmServicio").hide();
});

// Grabar datos del formulario Servicio
$(document).on("submit", "#frmServicio", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "servicio.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmServicio").hide();
                listServicios();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar servicio
// para editar sus datos en base a su id
$(".listServicios").on("click", ".edit", function(event) {
    event.preventDefault();
    var servicio_id = $(this).attr('data-id');
    showFormServicio(servicio_id);
});

// Eliminar servicio con  base a su id3

$(".listServicios").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_servicio = confirm("¿Está seguro de eliminar?");
    if (delete_servicio) {
        var servicio_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "servicio.delete.php?id=" + servicio_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listServicios();
                }
                alert(data.mensaje);
            });
    }
});