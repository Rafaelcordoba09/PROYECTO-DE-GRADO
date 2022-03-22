$(".graficax1").click(function(event) {
    var ruta;
    var leyenda = "Eventos por Nodo";
    var fechai = document.getElementById("finicial").value;
    var fechaf = document.getElementById("ffinal").value;
    if (fechai != "" && fechaf != "") {
        var nodo = $("#filtrox option:selected").val();
        rutax = "ggrafico.php?fi=" + fechai + "&&ff=" + fechaf + "&&ti=" + nodo + "&&ti2=r"
        ggrafico(fechai, fechaf, rutax, leyenda);
    } else {
        alert("Debe establecer fecha de inicio y final");
    }
});
$(".graficax2").click(function(event) {
    var ruta;
    var leyenda = "Eventos por Nodo";
    var fechai = document.getElementById("finicial").value;
    var fechaf = document.getElementById("ffinal").value;
    if (fechai != "" && fechaf != "") {
        var nodo = $("#filtrox option:selected").val();
        rutax = "ggrafico.php?fi=" + fechai + "&&ff=" + fechaf + "&&ti=" + nodo + "&&ti2=n"
        ggrafico(fechai, fechaf, rutax, leyenda);
    } else {
        alert("Debe establecer fecha de inicio y final");
    }
});

$(".graficax3").click(function(event) {
    var ruta;
    var leyenda = "Estado de Incidentes";
    var fechai = document.getElementById("finicial").value;
    var fechaf = document.getElementById("ffinal").value;
    if (fechai != "" && fechaf != "") {
        var nodo = $("#filtrox option:selected").val();
        rutax = "ggrafico.php?fi=" + fechai + "&&ff=" + fechaf + "&&ti=" + nodo + "&&ti2=e"
        ggrafico(fechai, fechaf, rutax, leyenda);
    } else {
        alert("Debe establecer fecha de inicio y final");
    }
});

$(".graficax4").click(function(event) {
    var ruta;
    var leyenda = "Tiempo de Solución Incidentes en Horas";
    var fechai = document.getElementById("finicial").value;
    var fechaf = document.getElementById("ffinal").value;
    if (fechai != "" && fechaf != "") {
        var nodo = $("#filtrox option:selected").val();
        rutax = "ggrafico.php?fi=" + fechai + "&&ff=" + fechaf + "&&ti=" + nodo + "&&ti2=t"
        ggrafico(fechai, fechaf, rutax, leyenda);
    } else {
        alert("Debe establecer fecha de inicio y final");
    }
});



function getRandomColor() {
    var r = Math.floor(Math.random() * 255);
    var g = Math.floor(Math.random() * 255);
    var b = Math.floor(Math.random() * 255);
    var a = 1;
    return "rgba(" + r + "," + g + "," + b + "," + a + ")";
}

function graficar(data, titulo) {
    $('#miGrafico').remove();
    $('#contenedor').append('<canvas id="miGrafico" height="400%"><canvas>');
    var c = $('#miGrafico');
    var ctx = c.get(0).getContext("2d");
    var container = c.parent();
    var $container = $(container);
    c.attr('width', $container.width()); //max width
    c.attr('height', $container.height()); //max heig
    var nombre = [];
    var stock = [];
    var colori = [];
    var bordercolori = [];
    var max = 100;
    var steps = 10;
    var pie = []
    var chartData = []
    var valores = []
    var tg = $("#tipograf option:selected").val();
    if (tg == "barras") {
        for (var i in data) {
            var l = data[i].nombre;
            var m = data[i].valor;
            var x = [0, l];
            var y = [
                [100],
                [m]
            ];
            chartData.push({
                label: x[1],
                fillColor: getRandomColor(),
                data: y[1]
            });
            x.pop();
            y.pop();
        }
    } else

    {
        for (var i in data) {
            nombre.push(data[i].nombre);
            valores.push(data[i].valor);
            colori.push(getRandomColor());
        }
    }
    console.log(chartData);
    /* for (var i in data) {
                    nombre.push(data[i].nombre);
                    stock.push(data[i].stock);
                    colori.push(getRandomColor());
                }
        
                };*/
    /*    var chartData = [{
            label: xValues[0],
            fillColor: getRandomColor(),
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: yValues[0]
        },
        {
            label: xValues[0],
            fillColor: getRandomColor(),
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: yValues[0]

        }
    ]*/
    // console.log(chartData);
    var barChartData = {
        labels: [titulo],
        datasets: chartData
    }

    var Other = {
        labels: nombre,
        datasets: [{
            fillColor: "rgba(200,187,205,0.2)",
            strokeColor: "rgba(200,187,205,1)",
            pointColor: "rgba(200,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: valores
        }]
    }

    var Piex = {
        labels: nombre,
        datasets: [{
            data: valores
        }]
    }

    var options = {
        responsive: true,
        animation: true,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        multiTooltipTemplate: "<%= datasetLabel %> : <%= value %>"
    }

    if (tg == "barras") {
        new Chart(ctx).Bar(barChartData, options);
    }
    if (tg == "lineas") {
        new Chart(ctx).Line(Other, options);
    }
    if (tg == "pastel") {
        var pieChartCanvas = ctx;
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [];
        var pieda = []
        for (var i in data) {
            pieda = {
                value: parseInt(data[i].valor),
                color: getRandomColor(),
                label: data[i].nombre
            };
            PieData.push(pieda);
        }

        var pieOptions = {
            segmentShowStroke: true,
            segmentStrokeColor: "#fff",
            segmentStrokeWidth: 2,
            percentageInnerCutout: 50, // This is 0 for Pie charts
            animationSteps: 100,
            animationEasing: "easeOutBounce",
            animateRotate: true,
            animateScale: false,
            responsive: true,
            maintainAspectRatio: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        pieChart.Pie(PieData, pieOptions);
    }
    if (tg == "radar") {
        new Chart(ctx).Radar(Other, options);
    }


}

function ggrafico(fechai, fechaf, rutax, leyenda) {
    var canvasx = document.getElementById("miGrafico");
    $.ajax({
        url: rutax,
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
            if (data.length == 1) {
                leyenda = data[0].nombre;
            }
            graficar(data, leyenda);
        },
        error: function(data) {
            console.log(data);
        }
    });


}