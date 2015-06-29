$(document).ready(function(){

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        events: 'ot/fetchCalendarEvents',
        eventClick: function(calEvent, jsEvent, view) {

            $('#title').text("Title: "+calEvent.title);
            $('#speaker').text("Speaker: "+calEvent.speaker);
            $('#timings').text("Timings: "+calEvent.session_from+" to "+calEvent.session_to);
            $('#vModal').modal({
                show: true
            });


        }
    })





});

