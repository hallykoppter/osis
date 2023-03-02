<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/hasil_style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ed17974c3a.js" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous">
    </script>
    <title>OSIS | {{ $title }}</title>
</head>
<body>

<style>
    #chartdiv {
        width: 80%;
        height: 300px;
    }
</style>

    {{-- Header --}}
    <div class="header fixed-top justify-content-between">
        <div class="logo">
            <i class="fa-solid fa-check-to-slot me-2"></i>
            <span class="title"> OSIS | e-Lection</span>
        </div>
        <div class="poweredby">
            <div class="smp rounded-circle">
                <img src="/img/smp.png" class="img-fluidd" alt="smp">
            </div>
            <div class="osis rounded-circle">
                <img src="/img/osis.png" class="img-fluidd" alt="osis">
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="pembungkus">
        <div class="content">
            <h2 class="mt-2">
                HASIL PEMILIHAN SUARA
            </h2>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-2">
                    <button class="btn btn-primary" onclick="display()">Tampilkan Hasil</button>
                </div>
            </div>
            <div class="row justify-content-center">
                    <div id="chartdiv" class="chart" style="display: none;"></div>
            </div>
            <div class="row mt-5 justify-content-around">
                @foreach ( $calon as $c)
                    <div class="card text-light" id="card" style="width: 16rem; background-color: {{$c->warna}};">
                        <img src="/img/calon.jpg" class="card-img-top mt-2" alt="...">
                        <div class="card-body">
                            <p class="card-text">
                                <h3>Calon Nomor {{ $c->nomor }}</h3>
                            </p>
                            <p class="card-text border border-top-1">
                                <h5>{{ $c->nama1 }}</h5>
                                <h5>{{ $c->nama2 }}</h5>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        function display() {
            document.querySelector('.chart').style.display = 'block';
        }
    </script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
    function display() {
        document.querySelector('.chart').style.display = 'block';
    am5.ready(function() {


    // Data
    am5.net.load("/data_2.json").then(function(result){
        var allData = am5.JSONParser.parse(result.response);


    console.log(allData);

    // var allData = {
    //     "2002": {
    //         "Calon 1": 0,
    //         "Calon 2": 0,
    //         "Calon 3": 0
    //     },
    //     "2003": {
    //         "Calon 1": 50,
    //         "Calon 2": 28,
    //         "Calon 3": 30
    //     },
    //     "2004": {
    //         "Calon 1": 72,
    //         "Calon 2": 80,
    //         "Calon 3": 75
    //     },
    //     "2005": {
    //         "Calon 1": 89,
    //         "Calon 2": 102,
    //         "Calon 3": 128
    //     },
    //     "2006": {
    //         "Calon 1": 192,
    //         "Calon 2": 168,
    //         "Calon 3": 152
    //     }
    // };

    // console.log(allData);

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("chartdiv");

    root.numberFormatter.setAll({
    numberFormat: "#a",

    // Group only into M (millions), and B (billions)
    bigNumberPrefixes: [
        { number: 1e6, suffix: "M" },
        { number: 1e9, suffix: "B" }
    ],

    // Do not use small number prefixes at all
    smallNumberPrefixes: []
    });

    var stepDuration = 5000;


    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([am5themes_Animated.new(root)]);


    // Create chart
    // https://www.amcharts.com/docs/v5/charts/xy-chart/
    var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: true,
    panY: true,
    wheelX: "none",
    wheelY: "none"
    }));


    // We don't want zoom-out button to appear while animating, so we hide it at all
    chart.zoomOutButton.set("forceHidden", true);


    // Create axes
    // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
    var yRenderer = am5xy.AxisRendererY.new(root, {
    minGridDistance: 15,
    inversed: true
    });
    // hide grid
    yRenderer.grid.template.set("visible", false);

    var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
    maxDeviation: 0,
    categoryField: "network",
    renderer: yRenderer
    }));

    var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
    maxDeviation: 0,
    min: 0,
    strictMinMax: true,
    extraMax: 0.1,
    renderer: am5xy.AxisRendererX.new(root, {})
    }));

    xAxis.set("interpolationDuration", stepDuration / 10);
    xAxis.set("interpolationEasing", am5.ease.linear);


    // Add series
    // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
    xAxis: xAxis,
    yAxis: yAxis,
    valueXField: "value",
    categoryYField: "network"
    }));

    // Rounded corners for columns
    series.columns.template.setAll({ cornerRadiusBR: 5, cornerRadiusTR: 5 });

    // Make each column to be of a different color
    series.columns.template.adapters.add("fill", function (fill, target) {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    series.columns.template.adapters.add("stroke", function (stroke, target) {
    return chart.get("colors").getIndex(series.columns.indexOf(target));
    });

    // Add label bullet
    series.bullets.push(function () {
    return am5.Bullet.new(root, {
        locationX: 1,
        sprite: am5.Label.new(root, {
        text: "{valueXWorking.formatNumber('#.# a')}",
        fill: root.interfaceColors.get("alternativeText"),
        centerX: am5.p100,
        centerY: am5.p50,
        populateText: true
        })
    });
    });

    var label = chart.plotContainer.children.push(am5.Label.new(root, {
    text: "1",
    fontSize: "2em",
    opacity: 0.2,
    x: am5.p100,
    y: am5.p100,
    centerY: am5.p100,
    centerX: am5.p100
    }));

    // Get series item by category
    function getSeriesItem(category) {
    for (var i = 0; i < series.dataItems.length; i++) {
        var dataItem = series.dataItems[i];
        if (dataItem.get("categoryY") == category) {
        return dataItem;
        }
    }
    }

    // Axis sorting
    function sortCategoryAxis() {
    // sort by value
    series.dataItems.sort(function (x, y) {
        return y.get("valueX") - x.get("valueX"); // descending
        //return x.get("valueX") - y.get("valueX"); // ascending
    });

    // go through each axis item
    am5.array.each(yAxis.dataItems, function (dataItem) {
        // get corresponding series item
        var seriesDataItem = getSeriesItem(dataItem.get("category"));
        if (seriesDataItem) {
        // get index of series data item
        var index = series.dataItems.indexOf(seriesDataItem);
        // calculate delta position
        var deltaPosition =
            (index - dataItem.get("index", 0)) / series.dataItems.length;
        // set index to be the same as series data item index
        if (dataItem.get("index") != index) {
            dataItem.set("index", index);
            // set deltaPosition instanlty
            dataItem.set("deltaPosition", -deltaPosition);
            // animate delta position to 0
            dataItem.animate({
            key: "deltaPosition",
            to: 0,
            duration: stepDuration / 2,
            easing: am5.ease.out(am5.ease.cubic)
            });
        }
        }
    });
    // sort axis items by index.
    // This changes the order instantly, but as deltaPosition is set, they keep in the same places and then animate to true positions.
    yAxis.dataItems.sort(function (x, y) {
        return x.get("index") - y.get("index");
    });
    }

    var time = 0;

    // update data with values each 1.5 sec
    var interval = setInterval(function () {
    time++;

    if (time > 7) {
        clearInterval(interval);
        clearInterval(sortInterval);
    }

    updateData();
    }, stepDuration);

    var sortInterval = setInterval(function () {
    sortCategoryAxis();
    }, 100);

    function setInitialData() {
    var d = allData[time];

    for (var n in d) {
        series.data.push({ network: n, value: d[n] });
        yAxis.data.push({ network: n });
    }
    }

    function updateData() {
    var itemsWithNonZero = 0;

    if (allData[time]) {
        label.set("text", time.toString());

        am5.array.each(series.dataItems, function (dataItem) {
        var category = dataItem.get("categoryY");
        var value = allData[time][category];

        if (value > 0) {
            itemsWithNonZero++;
        }

        dataItem.animate({
            key: "valueX",
            to: value,
            duration: stepDuration,
            easing: am5.ease.linear
        });
        dataItem.animate({
            key: "valueXWorking",
            to: value,
            duration: stepDuration,
            easing: am5.ease.linear
        });
        });

        yAxis.zoom(0, itemsWithNonZero / yAxis.dataItems.length);
    }
    }

    setInitialData();
    setTimeout(function () {
    time++;
    updateData();
    }, 50);

    // Make stuff animate on load
    // https://www.amcharts.com/docs/v5/concepts/animations/
    series.appear(1000);
    chart.appear(1000, 100);
    }).catch(function(result) {
        console.log("Error loading " + result.xhr.responseURL);
    });


    })}; // end am5.ready()

    </script>
</body>
</html>
