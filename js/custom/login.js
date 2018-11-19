$(document).ready(function () {

    $('#inputEmail, #inputPassword').on('focus', function(){
        $('#errorMessage').text("");
    });

    $('#loginButton').on('click', function (e) {
        e.preventDefault();
        var username = $('#inputEmail').val();
        var password = $('#inputPassword').val();
        if (isNotEmpty($('#inputEmail')) && isNotEmpty($('#inputPassword'))) {
            $('.preloader').css('display','block').fadeIn("swing", function () {
                $.ajax({
                    url: "index.php",
                    method: 'POST',
                    data: {
                        login: 1,
                        username: username,
                        password: password
                    },
                    success: function (response) {
                        if (response == "failed") {
                            $('.preloader').fadeOut('1000s',
                                'swing',
                                function () {
                                    $(
                                        '#errorMessage'
                                    ).text(
                                        "Access Denied"
                                    ).css('display',
                                        'block');
                                });

                        }

                        if (response == "success") {
                            $('.preloader').fadeOut('1000s',
                                'swing',
                                function () {
                                    window.location =
                                        'welcome.php';

                                });

                        }

                    },
                    dataType: 'text'
                });

            });
        }



    });

    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '1px solid red');
            return false;
        } else
            caller.css('border', '');

        return true;
    }
});