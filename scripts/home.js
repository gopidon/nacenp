/**
 * Created by gopi on 3/19/15.
 */
$(document).ready(function() {



    var show=10;


    //On page load get all announcements by batch

    function getAllAnnouncementsByBatch(){
        $('#spinner').introLoader({ animation: {  options: { stop:false,fixed:false } } });
        $.ajax({
            type: "GET",
            url: 'admin/announcement/getAllAnnouncementsByBatch?show='+show,
            cache: false,
            success: function(data)
            {
                if(data){
                    data = $.parseJSON(data);
                    var loadmore = (data[data.length-1])["load-more"];
                    data = data.slice(0,data.length-1);
                    var html="";
                    $.each(data, function(index,value){
                        html +=  "<div class='post'>"+
                        "<div class='post-content'>"+
                        "<h3><a href='admin/announcement/viewAnnouncement?id="+value['announcement_id']+"'>"+value['announcement_title']+"</a></h3>"+
                        "<p>"+
                        "submitted by "+value['user_display_name']+ " on "+value['announcement_date'] +
                        "</p>"+
                        "</div>"+
                        "</div>";
                    });

                    $("#announcements").html(html);
                    if(!loadmore){
                        $(".load-more").hide();
                    }
                }
                else{

                }
            },
            error: function(error){
                alert("Error fetching announcements:"+error);
            },
            complete: function(){
                var loader = $('#spinner').data('introLoader');
                loader.stop();
            }
        });
    }

    getAllAnnouncementsByBatch();


    function getAnnouncementsByBatch(title){
        $('#spinner').introLoader({ animation: {  options: { stop:false, fixed:false } } });
        $.ajax({
            type: "GET",
            url: 'admin/announcement/getAnnouncementsByBatch?show='+show+'&title='+title,
            cache: false,
            success: function(data)
            {
                if(data){
                    data = $.parseJSON(data);
                    var loadmore = (data[data.length-1])["load-more"];
                    data = data.slice(0,data.length-1);
                    var html="";
                    $.each(data, function(index,value){
                        html +=  "<div class='post'>"+
                        "<div class='post-content'>"+
                        "<h3><a href='admin/announcement/viewAnnouncement?id="+value['announcement_id']+"'>"+value['announcement_title']+"</a></h3>"+
                        "<p>"+
                        "submitted by "+value['user_display_name']+ " on "+value['announcement_date'] +
                        "</p>"+
                        "</div>"+
                        "</div>";
                    });
                    $("#announcements").html(html);
                    if(!loadmore){
                        $(".load-more").hide();
                    }
                }
                else{

                }
            },
            error: function(error){
                alert("Error fetching announcements:"+error);
            },
            complete: function(){
                var loader = $('#spinner').data('introLoader');
                loader.stop();
            }
        });
    }


    var delay = (function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();


    $("#search").keyup(function() {
        delay(function(e){
            var text = $("#search").val().trim();
            if(text=="")
            {
                getAllAnnouncementsByBatch();
            }
            else{
                getAnnouncementsByBatch(text);
            }

        }, 400 );
    });

    $(document).on("click", ".load-more", function(e) {
        e.preventDefault();
        show+=10;
        var text = $("#search").val().trim();
        if(text=="")
        {
            getAllAnnouncementsByBatch();
        }
        else{
            getAnnouncementsByBatch(text);
        }
    });


});