
$( document ).ready(function() {
    $('#registerButton').click(function(){
        $("#loginBox").css("display", "none");
        $("#registerBox").css("display", "block");
        $("#loginHeader").css("display", "none");
        $("#registerHeader").css("display", "block");
        $("#loginFooter").css("display", "none");
        $("#registerFooter").css("display", "block");
    });
    $('#login').click(function(){
        $("#loginBox").css("display", "block");
        $("#registerBox").css("display", "none");
        $("#loginHeader").css("display", "block");
        $("#registerHeader").css("display", "none");
        $("#loginFooter").css("display", "block");
        $("#registerFooter").css("display", "none");
    });
    $('#loginModal').on('hidden.bs.modal', function (e) {
        $(this)
          .find("input,textarea,select")
             .val('')
             .end()
          .find("input[type=checkbox], input[type=radio]")
             .prop("checked", "")
             .end();
    });
});
