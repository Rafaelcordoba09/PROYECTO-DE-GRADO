// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de empleados
function listNodos() {
    event.preventDefault();
    $.ajax({
            method: "get",
            url: "nodo.list.php"
        })
        .done(function(data) {
            $(".listNodos").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar empleado
function showFormNodo(id) {
    $.ajax({
            method: "get",
            url: "nodo.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmNodo").html(data);
        });
    $(".bg, .modalFrmNodo").show();
}

// Llama a la funcion de mostrar el formulario Editar empleado Nuevo
$(".showForm").click(function(event) {
    event.preventDefault();
    showFormNodo(0);
});

// Cerrar formulario Editar empleado
$(".modalFrmNodo").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmNodo").hide();
});

// Grabar datos del formulario Empleado
$(document).on("submit", "#frmNodo", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "nodo.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmNodo").hide();
                listNodos();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar empleado
// para editar sus datos en base a su id
$(".listNodos").on("click", ".edit", function(event) {
    event.preventDefault();
    var nodo_id = $(this).attr('data-id');
    showFormNodo(nodo_id);
});

// Eliminar empleado en base a su id
$(".listNodos").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_nodo = confirm("¿Está seguro de eliminar?");
    if (delete_nodo) {
        var nodo_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "nodo.delete.php?id=" + nodo_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listNodos();
                }
                alert(data.mensaje);
            });
    }
});