function busqueda() {
    fi = document.getElementById("inicio").value;
    ff = document.getElementById("final").value;
    ma = document.getElementById("maquina").value;
    ord = document.getElementById("orden").value;

    if (fi != "" && ff != "" && ma != null && ord != null) {
        document.getElementById("resultados").innerHTML = "";
        //alert(fi + " " + ff + " " + ma + " " + ord + " ")
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultados").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getdatos.php?fi=" + fi + "&ff=" + ff + "&ma=" + ma + "&ord=" + ord, true);
        xmlhttp.send();
    } else {
        alert("Debe diligenciar todos los datos del reporte");
    }
}

function busqueda_s() {
    fi = document.getElementById("inicio").value;
    ff = document.getElementById("final").value;
    ma = document.getElementById("maquina").value;
    ord = document.getElementById("orden").value;
    if (fi != "" && ff != "" && ma != null && ord != null) {
        document.getElementById("resultados").innerHTML = "";
        //alert(fi + " " + ff + " " + ma + " " + ord + " ")
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("resultados").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getdatossv.php?fi=" + fi + "&ff=" + ff + "&ma=" + ma + "&ord=" + ord, true);
        xmlhttp.send();
    } else {
        alert("Debe diligenciar todos los datos del reporte");
    }
}

function factura(t) {
    f = document.getElementById("f").value;
    if (f != "") {
        //alert(f + " " + t)
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                alert("Factura asociada en la Base de Datos");
                document.getElementById("f").disabled = true;
            }
        };
        xmlhttp.open("GET", "sendfactura.php?f=" + f + "&t=" + t, true);
        xmlhttp.send();
    } else {
        alert("Debe diligenciar el numero de factura");
    }
}