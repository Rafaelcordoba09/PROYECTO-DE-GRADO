// Añadir plugin a la tabla elegida
// En este caso enlazado con la tabla con id #table
$('#table').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

// Listado de empleados
// Mediante AJAX llama la lista de equipos
function listProblemas() {
    filtro = $('#filtrox').val();
    $.ajax({

            method: "get",
            url: "problema.list.php?filtro=" + filtro
        })
        .done(function(data) {
            $(".listProblemas").html(data);
        });
}

// Mediante AJAX muestra el formulario Editar Equipo
function showFormProblema1(id) {
    $.ajax({
            method: "get",
            url: "problema1.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmProblema").html(data);
        });
    $(".bg, .modalFrmProblema").show();
}

function showFormProblema2(id) {
    $.ajax({
            method: "get",
            url: "problema2.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmProblema").html(data);
        });
    $(".bg, .modalFrmProblema").show();
}

function showFormProblema3(id) {
    $.ajax({
            method: "get",
            url: "problema3.newedit.php?id=" + id
        })
        .done(function(data) {
            $(".modalFrmProblema").html(data);
        });
    $(".bg, .modalFrmProblema").show();
}

$("#filtrox").change(function(event) {
    listProblemas();
});

// Llama a la funcion de mostrar el formulario Editar Equipo Nuevo



$(".showForm1").click(function(event) {
    event.preventDefault();
    showFormProblema1(0);
});

$(".showForm2").click(function(event) {
    event.preventDefault();
    showFormProblema2(0);
});

$(".showForm3").click(function(event) {
    event.preventDefault();
    showFormProblema3(0);
});

// Cerrar formulario Editar Equipo
$(".modalFrmProblema").on("click", ".hideForm", function(event) {
    event.preventDefault();
    $(".bg, .modalFrmProblema").hide();
});

// Grabar datos del formulario Equipo
$(document).on("submit", "#frmProblema", function(event) {
    event.preventDefault();

    $.ajax({
            method: "post",
            url: "problema.save.php",
            data: $(this).serialize()
        })
        .done(function(data) {
            if (data.resultado) {
                $(".bg, .modalFrmProblema").hide();
                listProblemas();
            }
            alert(data.mensaje);
        });
});

// Llama a la funcion de mostrar el formulario Editar Equipo
// para editar sus datos en base a su id
$(".listProblemas").on("click", ".edit", function(event) {
    event.preventDefault();
    var problema_id = $(this).attr('data-id');
    showFormProblema1(problema_id);
});

// Eliminar Equipo con  base a su id3

$(".listProblemas").on("click", ".delete", function(event) {
    event.preventDefault();
    var delete_problema = confirm("¿Está seguro de eliminar?");
    if (delete_problema) {
        var problema_id = $(this).attr('data-id');
        $.ajax({
                method: "get",
                url: "problema.delete.php?id=" + problema_id
            })
            .done(function(data) {
                if (data.resultado) {
                    listProblemas();
                }
                alert(data.mensaje);
            });
    }
});