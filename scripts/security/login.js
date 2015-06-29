/**
 * Created by gopi on 3/5/15.
 */
$(document).ready(function()
{

    $("#loginForm").submit(


        function (event) {
            //alert($("#password").val());

            $("#password").val(CryptoJS.SHA1($("#password").val()));

        }

    );



});