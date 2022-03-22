function listTramos() {
    filtro = $('#filtrox').val();
    //alert(filtro);
    $.ajax({
            method: "get",
            url: "tramo.list.tramos.php?nodo=" + filtro
        })
        .done(function(data) {
            $("#filtroy").html(data);
        });
}


$("#filtrox").change(function(event) {
    listTramos();
});