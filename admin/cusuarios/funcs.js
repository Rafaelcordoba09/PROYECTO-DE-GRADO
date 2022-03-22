// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de empleados
function listUsuarios() {
    event.preventDefault();
    $.ajax({
            method: "get",
            url: "usuario.list.php"
        })
        .done(function(data) {
            $(".listUsuarios").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar empleado
function showFormUsuario(id) {
    $.ajax({
            method: "get",
            url: "usuario.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmUsuario").html(data);
        });
    $(".bg, .modalFrmUsuario").show();
}

// Llama a la funcion de mostrar el formulario Editar empleado Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormUsuario(0);
});

// Cerrar formulario Editar empleado
$(".modalFrmUsuario").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmUsuario").hide();
});

// Grabar datos del formulario Empleado
$(document).on("submit", "#frmUsuario", function(event) {
    event.preventDefault();
    $.ajax({
            method: "post",
            url: "usuario.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmUsuario").hide();
                listUsuarios();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar empleado
// para editar sus datos en base a su id
$(".listUsuarios").on("click", ".edit", function(event) {
    event.preventDefault();
    var usuario_id = $(this).attr('data-id');
    showFormUsuario(usuario_id);
});

// Eliminar empleado en base a su id
$(".listUsuarios").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_usuario = confirm("¿Está seguro de eliminar?");
    if (delete_usuario) {
        var usuario_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "usuario.delete.php?id=" + usuario_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listUsuarios();
                }
                alert(data.mensaje);
            });
    }
});