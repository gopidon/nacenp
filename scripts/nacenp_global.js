$(function(){
    $('.nacenpDatePicker').datepicker(
        {
            dateFormat: "mm/dd/yy"


        }

    );


    $('.nacenpTimePicker').timepicker(
        {
            timeFormat: "H:i",
            minTime: "06:00",
            maxTime:"18:30"

        }

    );
});


var nacenpConstants = {


}



$(document).ready(function()
{
    if(!window.console)
    {
        window.console = {log: function(){} };
    }





    html_escape = function(unsafe) {
        return unsafe
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }



});