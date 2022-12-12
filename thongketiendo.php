<?php
require_once 'config.php';
include "layout.php";
?>
<style>
    .otherclass {
        color: red;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
<figure class="highcharts-figure">
    <div id="container" style="margin-left: 80px;width: 900px;"></div>
    <p class="highcharts-description">
        <!-- Chart showing browser market shares. Clicking on individual columns
        brings up more detailed data. This chart makes use of the drilldown
        feature in Highcharts to easily switch between datasets. -->
    </p>
    <button type="button" style="margin-left: 450px;margin-top:30px ;" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="home.php" style="text-decoration: none;color: #fff;">trang chủ</a></button>
</figure>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
            const days = 10;
            $.ajax({
                    url: 'ajaxthongketiendo.php',
                    dataType: 'json',
                    data: {
                        days
                    },
                })
                .done(function(response) {
                    const arr = Object.values(response[0]);
                    const arrDetail = [];
                    Object.values(response[1]).forEach((each) => {
                        each.data = Object.values(each.data);
                        arrDetail.push(each);
                    })
                    console.log(response);
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'
                        },
                        color: {
                           
                        },
                        title: {
                            align: 'left',
                            text: 'thống kê tiến độ lệnh sản xuất'
                        },
                        accessibility: {
                            announceNewData: {
                                enabled: true
                            }
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'tiến độ %'
                            }

                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.1f}'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
                        },

                        series: [{
                            name: "lệnh sản xuất",
                            colorByPoint: true,
                            data: arr
                        }],
                        drilldown: {
                            breadcrumbs: {
                                position: {
                                    align: 'right'
                                }
                            },
                            series: arrDetail
                        }
                    });

                })
        }

    )
</script>