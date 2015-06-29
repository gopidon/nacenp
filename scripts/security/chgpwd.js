/**
 * Created by gopi on 3/5/15.
 */
$(document).ready(function()
{

    $("#chgPwdForm").submit(


        function (event) {
            //alert($("#password").val());

            $("#oldPasswd").val(CryptoJS.SHA1($("#oldPasswd").val()));
            $("#newPasswd").val(CryptoJS.SHA1($("#newPasswd").val()));

        }

    );



});