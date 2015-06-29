/**
 * Created by gopi on 3/24/15.
 */
$(document).ready(function(){
    $("#batchId").change(function(e){
        var batchId = $("#batchId").val();
        $.ajax({
            type: "GET",
            url: 'admin/session/getSessionsByBatch?batchId='+batchId,
            cache: false,
            success: function(data)
            {
                //clear all
                data = $.parseJSON(data);
                $("#sessionId").find("option").remove();
                $("#sessionId").append('<option value="-1" selected>Select</option>');
                for(var i=0; i<data.length; i++){
                    $("#sessionId").append('<option value="'+data[i]["session_id"]+'">'+data[i]["session_name"]+'</option>');
                }
            },
            error: function(error){

            }
        });
    });

    //renderDurationChart();

    $('#sessionId').change(function(e)
    {
        if($('#sessionId').val() != -1){
            renderDurationChart();
            renderContentChart();
            renderPresChart();
            renderRelChart();

            renderClassChart();
            renderReadingChart();
            renderInteractiveChart();
            renderVisualChart();
        }

    });


    function renderDurationChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBDurationPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#durationLoading').show();
                    $.plot($("#durationChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#durationLoading').hide();
                }
                else{
                    $("#durationChart").html("");
                    $("#durationChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

    function renderContentChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBContentPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#contentLoading').show();
                    $.plot($("#contentChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#contentLoading').hide();
                }
                else{
                    $("#contentChart").html("");
                    $("#contentChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

    function renderPresChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBPresPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#presLoading').show();
                    $.plot($("#presChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#presLoading').hide();
                }
                else{
                    $("#presChart").html("");
                    $("#presChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

    function renderRelChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBRelPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#relLoading').show();
                    $.plot($("#relChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#relLoading').hide();
                }
                else{
                    $("#relChart").html("");
                    $("#relChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }



    function renderClassChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBClassPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#classLoading').show();
                    $.plot($("#classChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#classLoading').hide();
                }
                else{
                    $("#classChart").html("");
                    $("#classChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

    function renderReadingChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBReadingPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#readingLoading').show();
                    $.plot($("#readingChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#readingLoading').hide();
                }
                else{
                    $("#readingChart").html("");
                    $("#readingChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

    function renderInteractiveChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBInteractivePieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#interactiveLoading').show();
                    $.plot($("#interactiveChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#interactiveLoading').hide();
                }
                else{
                    $("#interactiveChart").html("");
                    $("#interactiveChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }


    function renderVisualChart(){
        var sessionId = $("#sessionId").val();
        var batchId = $("#batchId").val();
        $.ajax({
            url: 'admin/fbreports/getFBVisualPieData?batchId='+batchId+'&sessionId='+sessionId,
            type: "GET",
            dataType:"json",
            cache: false,
            success: function(jsonData)
            {
                if(jsonData.length>0){
                    $('#visualLoading').show();
                    $.plot($("#visualChart"), jsonData,{
                        series: {
                            pie: {
                                show: true,
                                label:{
                                    radius: 3/4,
                                    formatter: function (label, series) {
                                        return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + " = " + series.data[0][1] + '<br/>' +
                                            "(" + Math.round(series.percent) + "%)" + '</div>';
                                    },
                                    background: {
                                        opacity: 0.6,
                                        color: '#000'
                                    }
                                }
                            }},
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }

                    });
                    $('#visualLoading').hide();
                }
                else{
                    $("#visualChart").html("");
                    $("#visualChart").append("<h1 style='text-align: center;vertical-align: middle;line-height: 300px'>No data</h1>");
                }


            }

        });
    }

});