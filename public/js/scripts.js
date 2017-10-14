
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

    $('#confirmRegisterButton').click(function() {
        $("#registerForm").submit();
    });

    function isEmailValid(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function isUsernameValid(username) {
        var re = /^[^\s]{6,}$/;
        return re.test(username);
    }

    function isPasswordValid(password) {
        var re = /^[^\s]{6,}$/;
        return re.test(password);
    }

    function isPasswordMatched(password1, password2) {
        return password1 == password2;
    }

    function showWarning(id) {
        $("#formRegister" + id).attr('class', 'form-group has-danger');
        $("#register" + id).attr('class', 'form-control form-control-danger');
    }

    function hideWarning(id) {
        $("#formRegister" + id).attr('class', 'form-group');
        $("#register" + id).attr('class', 'form-control');
    }
});
